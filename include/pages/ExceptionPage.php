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

		$source_exp = explode('/', $_GET['source']);

		if ($source_exp[0] == 'archives')
			$this->relocateArchive();
		elseif ($source_exp[0] == 'authors')
			$this->relocateAuthor();
	}

	// }}}
	// {{{ private function relocateArchive()

	private function relocateArchive()
	{
		$source = explode('/', $_GET['source']);

		//remove "archives" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->app->relocate('archive');
		else
			$this->app->relocate('archive/'.implode('/', $source));
	}

	// }}}
	// {{{ private function relocateAuthor()

	private function relocateAuthor()
	{
		$source = explode('/', $_GET['source']);

		//remove "authors" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->app->relocate('author');
		else
			$this->app->relocate('author/'.implode('/', $source));
	}

	// }}}
}

?>
