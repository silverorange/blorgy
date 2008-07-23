<?php

require_once '../include/layouts/BlorgyLayout.php';

/**
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class SpeakergeekLayout extends BlorgyLayout
{
	// {{{ protected function finalizeBaseCss()

	protected function finalizeBaseCss()
	{
		// Use custom reset.css as copied from the FOL theme
		$this->addHtmlHeadEntry(new SwatStyleSheetHtmlHeadEntry(
			'themes/speakergeek/styles/reset.css'));
	}

	// }}}
}

?>
