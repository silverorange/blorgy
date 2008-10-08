<?php

require_once 'Site/SiteArticleSearchEngine.php';

/**
 * Article search engine for Blörgy that does instance-specific search results
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticleSearchEngine extends SiteArticleSearchEngine
{
	// {{{ protected function getWhereClause()

	protected function getWhereClause()
	{
		$instance_id = $this->app->getInstanceId();

		$clause = sprintf('where Article.searchable = %s and
			Article.instance %s %s',
			$this->app->db->quote(true, 'boolean'),
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'));

		return $clause;
	}

	// }}}
}

?>
