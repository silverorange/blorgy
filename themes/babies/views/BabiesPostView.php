<?php

require_once 'Blorg/views/BlorgPostView.php';

/**
 * Custom post view for the 'babies' theme
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class BabiesPostView extends BlorgPostView
{
	// {{{ public function __construct()

	public function __construct(SiteApplication $app)
	{
		parent::__construct($app);
		$this->setPartMode('author', BlorgView::MODE_NONE);
	}

	// }}}

	// general display methods
	// {{{ protected function displayHeader()

	/**
	 * Displays the title and meta information for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displayHeader(BlorgPost $post)
	{
		if ($this->isHeaderVisible($post)) {
			$this->displayTitle($post);
		}
	}

	// }}}
	// {{{ protected function displayBody()

	protected function displayBody(BlorgPost $post)
	{
		$this->displayBodytext($post);

		if ($this->getMode('permalink') > BlorgView::MODE_NONE)
			$this->displaySubHeader($post);

		$this->displayExtendedBodytext($post);
	}

	// }}}
	// {{{ protected function displaySubHeader()

	/**
	 * Displays the title and meta information for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displaySubHeader(BlorgPost $post)
	{
		ob_start();
		$this->displayPermalink($post);
		$permalink = ob_get_clean();

		ob_start();
		$this->displayCommentCount($post);
		$comment_count = ob_get_clean();

		echo '<div class="entry-subtitle">';

		/*
		 * Comment count is shown if and only if comment_count element is shown
		 * AND the following:
		 * - comments are locked AND there is one or more visible comment OR
		 * - comments are open OR
		 * - comments are moderated.
		 */
		$show_comment_count =
			(strlen($comment_count) > 0 &&
				(($post->comment_status == BlorgPost::COMMENT_STATUS_LOCKED &&
					count($post->getVisibleComments()) > 0) ||
				$post->comment_status == BlorgPost::COMMENT_STATUS_OPEN ||
				$post->comment_status == BlorgPost::COMMENT_STATUS_MODERATED));

		if ($show_comment_count) {
			printf('posted on %s | %s', $permalink, $comment_count);
		} else {
			echo 'posted on '.$permalink;
		}

		echo '</div>';
	}

	// }}}
}

?>
