<?php

require_once 'Site/admin/components/Article/Delete.php';

/**
 * Delete confirmation page for articles with instance support
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticleDelete extends SiteArticleDelete
{
	// process phase
	// {{{ protected function processDBData()

	protected function processDBData()
	{
		AdminDBDelete::processDBData();

		$instance_id = $this->app->getInstanceId();
		$sql = sprintf('select parent from Article
			where id = %s and instance %s %s',
			$this->app->db->quote($this->getFirstItem(), 'integer'),
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'));

		$this->parent_id = SwatDB::queryOne($this->app->db, $sql);

		$item_list = $this->getItemList('integer');
		$sql = sprintf('delete from Article
			where id in (%s) and instance %s %s',
			$item_list,
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'));

		$num = SwatDB::exec($this->app->db, $sql);
		$message = new SwatMessage(sprintf(Site::ngettext(
			'One article has been deleted.',
			'%s articles have been deleted.', $num),
			SwatString::numberFormat($num)));

		$this->app->messages->add($message);
	}

	// }}}

	// build phase
	// {{{ protected function buildInternal()

	protected function buildInternal()
	{
		AdminDBDelete::buildInternal();

		$item_list = $this->getItemList('integer');
		$instance_id = $this->app->getInstanceId();
		$where_clause = sprintf('id in (%s) and instance %s %s',
			$item_list,
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'));

		$dep = new AdminListDependency();
		$dep->setTitle(Site::_('article'), Site::_('articles'));
		$dep->entries = AdminListDependency::queryEntries($this->app->db,
			'Article', 'integer:id', null, 'text:title', 'title',
			$where_clause, AdminDependency::DELETE);

		$this->getDependencies($dep, $item_list);

		$message = $this->ui->getWidget('confirmation_message');
		$message->content = $dep->getMessage();
		$message->content_type = 'text/xml';

		if ($dep->getStatusLevelCount(AdminDependency::DELETE) === 0)
			$this->switchToCancelButton();
	}

	// }}}
}

?>
