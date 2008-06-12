<?php

require_once '../include/layouts/BlorgyLayout.php';

/**
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class FolLayout extends BlorgyLayout
{
	// {{{ protected function finalizeBaseCss()

	protected function finalizeBaseCss()
	{
		//$yui = new SwatYUI(array('reset', 'fonts', 'base'));
		//$this->addHtmlHeadEntrySet($yui->getHtmlHeadEntrySet());

		//$this->addHtmlHeadEntry(new SwatStyleSheetHtmlHeadEntry('styles/base.css'));
		$this->addHtmlHeadEntry(new SwatStyleSheetHtmlHeadEntry('themes/fol/styles/reset.css'));
	}

	// }}}
}

?>
