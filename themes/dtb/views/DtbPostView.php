<?php

require_once 'Blorg/views/BlorgPostView.php';

/**
 * Custom post view for the 'Detal Tango Bravo' theme
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class DtbPostView extends BlorgPostView
{
	// {{{ public function __construct()

	public function __construct(SiteApplication $app)
	{
		parent::__construct($app);
		$this->setPartMode('author', SiteView::MODE_NONE);
	}

	// }}}

	// general display methods
	// {{{ protected function displaySubHeader()

	/**
	 * Displays the title and meta information for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displaySubHeader(BlorgPost $post)
	{
		ob_start();
		$this->displayAuthor($post);
		$author = ob_get_clean();

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
				(($post->comment_status == SiteCommentStatus::LOCKED &&
					$post->getVisibleCommentCount() > 0) ||
				$post->comment_status == SiteCommentStatus::OPEN ||
				$post->comment_status == SiteCommentStatus::MODERATED));

		if (strlen($author) > 0) {
			if ($show_comment_count) {
				printf(Blorg::_('Posted by %s on %s | %s'),
					$author, $permalink, $comment_count);
			} else {
				printf(Blorg::_('Posted by %s on %s'), $author, $permalink);
			}
		} else {
			if ($show_comment_count) {
				printf('%s  %s', $permalink, $comment_count);
			} else {
				echo $permalink;
			}
		}

		echo '</div>';
	}

	// }}}

	// part display methods
	// {{{ protected function displayPermalink()

	/**
	 * Displays the date permalink for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displayPermalink(BlorgPost $post)
	{
		if ($this->getMode('permalink') > SiteView::MODE_NONE) {
			$link = $this->getLink('permalink');
			if ($link === false) {
				$permalink_tag = new SwatHtmlTag('span');
			} else {
				$permalink_tag = new SwatHtmlTag('a');
				if ($link === true) {
					$permalink_tag->href = $this->getRelativeUri($post);
				} else {
					$permalink_tag->href = $link;
				}
			}
			$permalink_tag->class = 'permalink';
			$permalink_tag->open();

			// display machine-readable date in UTC
			$abbr_tag = new SwatHtmlTag('abbr');
			$abbr_tag->class = 'published';
			$abbr_tag->title =
				$post->publish_date->getDate(DATE_FORMAT_ISO_EXTENDED);

			// display human-readable date in local time
			$date = clone $post->publish_date;
			$date->convertTZ($this->app->default_time_zone);
			$abbr_tag->setContent($date->format('%i:%M %P, %A, %B %e, %Y'));
			$abbr_tag->display();

			$permalink_tag->close();
		}
	}

	// }}}
}

?>
