<?php

require_once '../include/layouts/BlorgyLayout.php';

/**
 * Layout for the Nostalgia theme
 *
 * @package   Blörgy
 * @copyright 2008-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class NostalgiaLayout extends BlorgyLayout
{
	// {{{ protected function displayHeaderTitle()

	protected function displayHeaderTitle()
	{
		parent::displayHeaderTitle();
		echo '<div><img src="themes/nostalgia/images/rainbow.png" alt="Rainbow!" height="5" width="100%" /></div>';
	}

	// }}}
	// {{{ protected function finalizeBaseCss()

	protected function finalizeBaseCss()
	{
	}

	// }}}
}

?>
