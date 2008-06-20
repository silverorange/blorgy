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
	// {{{ protected function displayHeaderTitleText()

	protected function displayHeaderTitleText()
	{
		$site_title = $this->app->config->site->title;

		$h1_tag = new SwatHtmlTag('h1');
		$h1_tag->title = $site_title;
		$h1_tag->open();

		echo '<span>';

		$source = $this->app->getPage()->getSource();
		if ($source != '') {
			$a_tag = new SwatHtmlTag('a');
			$a_tag->accesskey = '1';
			$a_tag->href = '.';
			$a_tag->open();
		}

		$words = explode(' ', $site_title);
		$count = 0;

		$word_span = new SwatHtmlTag('span');
		$letter_span = new SwatHtmlTag('span');
		$letter_span->class = 'first-letter';

		$num_words = count($words);
		foreach ($words as $word) {
			$word = trim($word);
			if ($word != '') {
				$count++;

				$word_span->class = sprintf('title-%s', $count);
				$word_span->open();

				$letter_span->setContent(substr($word, 0, 1));
				$letter_span->display();
				echo SwatString::minimizeEntities(substr($word, 1));

				$word_span->close();

				// don't display a space for the last word
				if ($count < $num_words) {
					echo ' ';
				}
			}
		}

		if ($source != '') {
			$a_tag->close();
		}

		echo '</span>';

		$h1_tag->close();
	}

	// }}}
}

?>
