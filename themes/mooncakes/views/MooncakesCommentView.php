<?php

require_once 'Blorg/views/BlorgCommentView.php';

/**
 *
 * @package   Blörgy
 * @copyright 2011-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class MooncakesCommentView extends BlorgCommentView
{
	// general display methods
	// {{{ protected function displayHeader()

	protected function displayHeader(BlorgComment $comment)
	{
		$heading_tag = new SwatHtmlTag('h4');
		$heading_tag->class = 'comment-title';

		$heading_tag->open();

		$this->displayAuthor($comment);
		$this->displayPermalink($comment);

		$heading_tag->close();

		$this->displayLink($comment);
	}

	// }}}

	// part display methods
	// {{{ protected function displayPermalink()

	protected function displayPermalink(BlorgComment $comment)
	{
		if ($this->getMode('permalink') > SiteView::MODE_NONE) {
			$link = $this->getLink('permalink');
			if ($link === false) {
				$permalink_tag = new SwatHtmlTag('span');
			} else {
				$permalink_tag = new SwatHtmlTag('a');
				if ($link === true) {
					$permalink_tag->href =
						$this->getRelativeUri($comment);
				} else {
					$permalink_tag->href = $link;
				}
			}
			$permalink_tag->class = 'permalink';
			$permalink_tag->open();

			// display machine-readable date in UTC
			$abbr_tag = new SwatHtmlTag('abbr');
			$abbr_tag->class = 'comment-published';
			$abbr_tag->title = $comment->createdate->getISO8601();

			// display human-readable date in local time
			$date = clone $comment->createdate;
			$date->convertTZ($this->app->default_time_zone);
			$abbr_tag->setContent(
				$date->formatLikeIntl('h:mm a  •  d MMMM yyyy'));

			$abbr_tag->display();

			$permalink_tag->close();
		}
	}

	// }}}
}

?>
