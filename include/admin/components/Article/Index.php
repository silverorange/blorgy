<?php

require_once 'Site/admin/components/Article/Index.php';

/**
 * Index page for articles with instance support
 *
 * @package   Blörgy
 * @copyright 2008-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticleIndex extends SiteArticleIndex
{
	// {{{ protected function getWhereClause()

	protected function getWhereClause(SwatView $view)
	{
		$instance_id = $this->app->getInstanceId();
		$sql = sprintf('Article.parent %s %s and instance %s %s',
			SwatDB::equalityOperator($this->id),
			$this->app->db->quote($this->id, 'integer'),
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'));

		return $sql;
	}

	// }}}
}

?>
