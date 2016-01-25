<?php

require_once 'Site/admin/components/Article/Order.php';

/**
 * Order page for articles with instance support
 *
 * @package   Blörgy
 * @copyright 2008-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticleOrder extends SiteArticleOrder
{
	// {{{ protected function getWhereClause()

	protected function getWhereClause()
	{
		$where_clause = parent::getWhereClause();

		$instance_id = $this->app->getInstanceId();
		$where_clause.= sprintf(' and instance %s %s',
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'));

		return $where_clause;
	}

	// }}}
}

?>
