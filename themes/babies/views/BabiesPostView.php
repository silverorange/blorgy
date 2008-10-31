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

		$date = clone $post->publish_date;
		$date->convertTZ($this->app->default_time_zone);
		$formatted_date = $date->format(SwatDate::DF_DATE_SHORT);

		if ($show_comment_count) {
			printf('posted on %s | %s | %s', $formatted_date, $comment_count,
				$permalink);
		} else {
			echo 'posted on '.$formatted_date.' | '.$permalink;
		}

		if (count($post->tags) > 0) {
			echo ' | tagged: ';
			$this->displayTags($post);
		}

		echo '<div class="external-links">';
echo '
<div class="external-link">
<script type="text/javascript">
digg_url = "'.$this->app->getBaseHref().$this->getPostRelativeUri($post).'"
digg_skin = "compact";
</script>';

echo <<<EOF
<script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script>
</div>
<div class="external-link">
<img src="http://static.delicious.com/img/delicious.small.gif" height="10" width="10" alt="Delicious" />
<a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&amp;noui&amp;jump=close&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title), 'delicious','toolbar=no,width=550,height=550'); return false;"> Bookmark this on Delicious</a>
</div>

EOF;
		echo '</div>';

		echo '</div>';
	}

	// }}}
	// {{{ protected function displayPermalink()

	/**
	 * Displays the date permalink for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displayPermalink(BlorgPost $post)
	{
		if ($this->getMode('permalink') > BlorgView::MODE_NONE) {
			$link = $this->getLink('permalink');
			if ($link === false) {
				$permalink_tag = new SwatHtmlTag('span');
			} else {
				$permalink_tag = new SwatHtmlTag('a');
				if ($link === true) {
					$permalink_tag->href = $this->getPostRelativeUri($post);
				} else {
					$permalink_tag->href = $link;
				}
			}
			$permalink_tag->class = 'permalink';
			$permalink_tag->open();
			echo 'permalink';
			$permalink_tag->close();
		}
	}

	// }}}
}

?>
