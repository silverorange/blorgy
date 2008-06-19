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
		if ($source_exp[0] == 'a')
			$this->relocateArticle();
		elseif ($source_exp[0] == 'authors')
			$this->relocateAuthor();
		elseif ($source_exp[0] == 'rss')
			$this->relocateFeed();
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
	// {{{ private function relocateArticle()

	private function relocateArticle()
	{
		$source = explode('/', $_GET['source']);

		//remove "a" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->app->relocate('article');
		else
			$this->app->relocate('article/'.implode('/', $source));
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
	// {{{ private function relocateFeed()

	private function relocateFeed()
	{
		$source = explode('/', $_GET['source']);

		//remove "rss" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->app->relocate('feed');
		elseif ($source[0] == 'replies')
			$this->app->relocate('feed/comments');
		elseif ($source[0] == 'sideblog')
			$this->app->relocate('feed');
		elseif ($source[0] == 'categories' && count($source) == 2) {
			$this->app->relocate('tag/'.$source[1].'/feed');
		}
	}

	// }}}
}

?>
