<?php

require_once 'Blorg/BlorgPageFactory.php';

/**
 * Adds custom search results page
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class BlorgyBlorgPageFactory extends BlorgPageFactory
{
	// {{{ protected function getPageMap()

	protected function getPageMap()
	{
		$map = parent::getPageMap();
		$map['^search$'] = 'SearchResultsPage';
		return $map;
	}

	// }}}
}

?>
