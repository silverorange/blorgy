<?php

require_once 'SwatDB/SwatDB.php';
require_once 'Site/pages/SiteExceptionPage.php';

/**
 * @package   Blorgy
 * @copyright 2008 silverorange
 */
class ExceptionPage extends SiteExceptionPage
{
	// init phase
	// {{{ public function init()

	public function init()
	{
		parent::init();

		if (!isset($_GET['source']))
			return;

		if (substr($_GET['source'], 0, 9) == 'archives/')
			$this->relocateOldUrl();
	}

	// }}}
	// {{{ private function relocateOldUrl()

	private function relocateOldUrl()
	{
		$source = explode('/', $_GET['source']);

		//remove "archives" from the start of the array
		array_shift($source);

		// TODO: Relocate old URLs.  See this file in Gallery.
	}

	// }}}
}

?>
