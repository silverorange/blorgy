<?php

require_once '../include/layouts/BlorgyLayout.php';

/**
 * Layout for the AOV theme
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class AovLayout extends BlorgyLayout
{
	// {{{ protected function finalizeSiteTitle()

	protected function finalizeSiteTitle()
	{
		$words = explode(' ', $this->app->config->site->title);
		$count = 0;


		$word_span = new SwatHtmlTag('span');
		$letter_span = new SwatHtmlTag('span');
		$letter_span->class = 'first-letter';

		ob_start();
		foreach ($words as $word) {
			$word = trim($word);
			if (strlen($word) > 0) {
				$count++;
				$word_span->class = sprintf('title-%s', $count);
				$word_span->open();
				$letter_span->open();
				echo substr($word, 0, 1);
				$letter_span->close();
				echo substr($word, 1);
				$word_span->close();
				echo ' ';
			}
		}
		$site_title = ob_get_clean();

		$source = $this->app->getPage()->getSource();
		if ($source === '') {
			$this->data->site_title = (string)$site_title;
		} else {
			$a_tag = new SwatHtmlTag('a');
			$a_tag->accesskey = '1';
			$a_tag->href = '.';
			$a_tag->setContent($site_title, 'text/xml');
			$this->data->site_title = $a_tag->__toString();
		}
	}

	// }}}
}

?>
