<?php

require_once 'SwatDB/SwatDB.php';
require_once 'Site/pages/SiteXhtmlExceptionPage.php';

/**
 * @package   Blorgy
 * @copyright 2008-2016 silverorange
 */
class ExceptionPage extends SiteXhtmlExceptionPage
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
		elseif (substr($_GET['source'], 0, 9) == 'index.cfm')
			$this->relocateReallyOldPage();
	}

	// }}}
	// {{{ private function relocateArchive()

	private function relocateArchive()
	{
		$source = explode('/', $_GET['source']);

		//remove "archives" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->relocate('archive');
		elseif (is_numeric($source[0]))
			$this->relocate('archive/'.implode('/', $source));
		else
			$this->relocate('tag/'.implode('/', $source));
	}

	// }}}
	// {{{ private function relocateArticle()

	private function relocateArticle()
	{
		$source = explode('/', $_GET['source']);

		//remove "a" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->relocate('article');
		else
			$this->relocate('article/'.implode('/', $source));
	}

	// }}}
	// {{{ private function relocateAuthor()

	private function relocateAuthor()
	{
		$source = explode('/', $_GET['source']);

		//remove "authors" from the start of the array
		array_shift($source);

		if (count($source) == 0)
			$this->relocate('author');
		else
			$this->relocate('author/'.implode('/', $source));
	}

	// }}}
	// {{{ private function relocateFeed()

	private function relocateFeed()
	{
		$source = explode('/', $_GET['source']);

		//remove "rss" from the start of the array
		array_shift($source);

		if (end($source) == '')
			array_pop($source);

		if (count($source) == 0)
			$this->relocate('feed');
		elseif ($source[0] == 'replies')
			$this->relocate('feed/comments');
		elseif ($source[0] == 'sideblog')
			$this->relocate('feed');
		elseif ($source[0] == 'categories' && count($source) == 2)
			$this->relocate('tag/'.$source[1].'/feed');
	}

	// }}}
	// {{{ private function relocateReallyOldPage()

	private function relocateReallyOldPage()
	{
		if (isset($_GET['article']))
			$this->relocateReallyOldPost($_GET['article']);
		elseif (isset($_GET['name']))
			$this->relocateReallyOldAuthor($_GET['name']);
	}

	// }}}
	// {{{ private function relocateReallyOldPost()

	private function relocateReallyOldPost($id)
	{
		$post = new BlorgPost();
		$post->setDatabase($this->app->db);
		$post->load($id, $this->app->getInstance());

		if ($post->id === null)
			return;

		$path = $this->app->config->blorg->path.'archive';

		$date = clone $post->publish_date;
		$date->convertTZ($this->app->default_time_zone);
		$year = $date->getYear();
		$month_name = BlorgPageFactory::$month_names[$date->getMonth()];

		$url = sprintf('%s/%s/%s/%s',
			$path,
			$year,
			$month_name,
			$post->shortname);

		$this->relocate($url);
	}

	// }}}
	// {{{ private function relocateReallyOldAuthor()

	private function relocateReallyOldAuthor($name)
	{
		$this->relocate('author/'.$name);
	}

	// }}}
	// {{{ private function relocate()

	private function relocate($uri)
	{
		// do a 301 permanent relocate
		$this->app->relocate($uri, null, null, true);
	}
	// }}}
}

?>
