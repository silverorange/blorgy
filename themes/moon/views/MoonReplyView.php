<?php

require_once 'Blorg/views/BlorgReplyView.php';

/**
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class MoonReplyView extends BlorgReplyView
{
	// general display methods
	// {{{ protected function displayHeader()

	protected function displayHeader(BlorgReply $reply)
	{
		$heading_tag = new SwatHtmlTag('h4');
		$heading_tag->class = 'reply-title';

		$heading_tag->open();

		$this->displayPermalink($reply);
		$this->displayAuthor($reply);

		$heading_tag->close();

		$this->displayLink($reply);
	}

	// }}}

	// part display methods
	// {{{ protected function displayPermalink()

	protected function displayPermalink(BlorgReply $reply)
	{
		if ($this->getMode('permalink') > BlorgView::MODE_NONE) {
			$link = $this->getLink('permalink');
			if ($link === false) {
				$permalink_tag = new SwatHtmlTag('span');
			} else {
				$permalink_tag = new SwatHtmlTag('a');
				if ($link === true) {
					$permalink_tag->href = $this->getReplyRelativeUri($reply);
				} else {
					$permalink_tag->href = $link;
				}
			}
			$permalink_tag->class = 'permalink';
			$permalink_tag->open();

			// display machine-readable date in UTC
			$abbr_tag = new SwatHtmlTag('abbr');
			$abbr_tag->class = 'reply-published';
			$abbr_tag->title =
				$reply->createdate->getDate(DATE_FORMAT_ISO_EXTENDED);

			// display human-readable date in local time
			$date = clone $reply->createdate;
			$date->convertTZ($this->app->default_time_zone);
			$abbr_tag->setContent($date->format('%i:%M %p | %e %B %Y'));
			$abbr_tag->display();

			$permalink_tag->close();
		}
	}

	// }}}
}

?>
