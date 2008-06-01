<?php

require_once '../include/layouts/BlorgyLayout.php';

/**
 * Layout for the Default theme
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class DefaultLayout extends BlorgyLayout
{
	// finalize phase
	// {{{ public function finalize()

	public function finalize()
	{
		parent::finalize();

		$yui = new SwatYUI(array('reset', 'fonts', 'base'));
		$this->addHtmlHeadEntrySet($yui->getHtmlHeadEntrySet());
	}

	// }}}
}

?>
