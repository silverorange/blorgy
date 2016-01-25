<?php

require_once 'Site/admin/components/Article/Search.php';

/**
 * Search page for articles with instance support
 *
 * @package   Blörgy
 * @copyright 2008-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticleSearch extends SiteArticleSearch
{
	// {{{ protected function getWhereClause()

	protected function getWhereClause()
	{
		if ($this->where_clause === null) {
			$this->where_clause = parent::getWhereClause();

			$instance_id = $this->app->getInstanceId();
			$this->where_clause.= sprintf(' and instance %s %s',
				SwatDB::equalityOperator($instance_id),
				$this->app->db->quote($instance_id, 'integer'));
		}

		return $this->where_clause;
	}

	// }}}
}

?>
