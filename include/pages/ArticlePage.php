<?php

require_once 'Site/pages/SiteArticlePage.php';

/**
 * A page for loading and displaying articles on Blörgy
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticlePage extends SiteArticlePage
{
	// build phase
	// {{{ protected function buildNavBar()

	protected function buildNavBar()
	{
		if ($this->path !== null) {
			$navbar = $this->layout->navbar;
			$link = 'article';
			foreach ($this->path as $path_entry) {
				$link.= '/'.$path_entry->shortname;
				$navbar->createEntry($path_entry->title, $link);
			}
		}
	}

	// }}}
	// {{{ protected function displaySubArticle()

	/**
	 * Displays an article as a sub-article
	 *
	 * @param SiteArticle $article the article to display.
	 * @param string $path an optional string containing the path to the
	 *                      article being displayed. If no path is provided,
	 *                      the path of the current page is used.
	 */
	protected function displaySubArticle(SiteArticle $article, $path = null)
	{
		if ($path === null)
			$path = $this->path;

		$anchor_tag = new SwatHtmlTag('a');
		$anchor_tag->href = 'article/'.$path.'/'.$article->shortname;
		$anchor_tag->class = 'sub-article';
		$anchor_tag->setContent($article->title);

		$dt_tag = new SwatHtmlTag('dt');
		$dt_tag->id = sprintf('sub_article_%s', $article->shortname);

		$dt_tag->open();
		$anchor_tag->display();
		$dt_tag->close();

		if ($article->description != '')
			echo '<dd>', $article->description, '</dd>';
	}

	// }}}
}

?>
