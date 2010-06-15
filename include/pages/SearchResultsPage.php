<?php

require_once 'Blorg/pages/BlorgSearchResultsPage.php';
require_once dirname(__FILE__).'/../ArticleSearchEngine.php';

/**
 * Page for displaying search results on Blörgy.
 *
 * Includes instance-specific article search results.
 *
 * @package   Blörgy
 * @copyright 2008-2010 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class SearchResultsPage extends BlorgSearchResultsPage
{
	// {{{ public function __construct()

	public function __construct(SiteAbstractPage $page)
	{
		parent::__construct($page);
		$this->ui_xml = dirname(__FILE__).'/search-results.xml';
	}

	// }}}

	// init phase
	// {{{ public function init()

	public function init()
	{
		$this->addSearchDataField('type');
		parent::init();
	}

	// }}}

	// build phase
	// {{{ protected function buildResults()

	protected function buildResults()
	{
		$searched = false;
		$fulltext_result = $this->searchFulltext();

		if ($this->hasSearchDataValue('type')) {
			$type = $this->getSearchDataValue('type');

			if ($type === 'article') {
				$this->ui->getWidget('article_results_frame')->title = null;
				$this->buildArticles($fulltext_result);
			} else {
				$this->buildPosts($fulltext_result);
			}

		} elseif (count($this->getSearchDataValues()) > 0) {

			$this->buildArticles($fulltext_result);
			$this->buildPosts($fulltext_result);

			if ($fulltext_result !== null) {
				$this->buildMisspellings($fulltext_result);
				$fulltext_result->saveHistory();
			}

			$searched = true;
		}

		return $searched;
	}

	// }}}
	// {{{ protected function buildTitle()

	protected function buildTitle()
	{
		if ($this->hasSearchDataValue('type') &&
			$this->getSearchDataValue('type') === 'article') {
				$this->layout->data->title = Blorg::_('Article Search Results');
		} else {
			parent::buildTitle();
		}
	}

	// }}}
	// {{{ protected function getFulltextTypes()

	protected function getFulltextTypes()
	{
		$types = parent::getFulltextTypes();
		$types[] = 'article';
		return $types;
	}

	// }}}

	// build phase - posts
	// {{{ protected function instantiateArticleSearchEngine()

	protected function instantiateArticleSearchEngine()
	{
		$engine = new ArticleSearchEngine($this->app);
		$this->setSearchEngine('article', $engine);
		return $engine;
	}

	// }}}
	// {{{ protected function getArticlePathPrefix()

	protected function getArticlePathPrefix()
	{
		return 'article';
	}

	// }}}
}

?>
