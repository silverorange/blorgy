<?php

require_once 'Admin/pages/AdminDBEdit.php';
require_once 'Admin/exceptions/AdminNotFoundException.php';
require_once 'NateGoSearch/NateGoSearch.php';
require_once 'SwatDB/SwatDB.php';
require_once 'Swat/SwatDate.php';
require_once 'Site/admin/components/Article/Edit.php';

/**
 * Edit page for articles with instance support
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticleEdit extends SiteArticleEdit
{
	// init phase
	// {{{ protected function initArticle()

	protected function initArticle()
	{
		$class_name = SwatDBClassMap::get('SiteArticle');
		$this->edit_article = new $class_name();
		$this->edit_article->setDatabase($this->app->db);

		if ($this->id !== null) {
			$instance = $this->app->getInstance();
			if (!$this->edit_article->load($this->id, $instance)) {
				throw new AdminNotFoundException(
					sprintf(Site::_('Article with id "%s" not found.'),
						$this->id));
			}
		}
	}

	// }}}

	// process phase
	// {{{ protected function validateShortname()

	protected function validateShortname($shortname)
	{
		$instance_id = $this->app->getInstanceId();
		$sql = sprintf('select count(id) from Article
			where shortname = %s and
				instance %s %s and
				parent %s %s
				and id %s %s',
			$this->app->db->quote($shortname, 'text'),
			SwatDB::equalityOperator($instance_id),
			$this->app->db->quote($instance_id, 'integer'),
			SwatDB::equalityOperator($this->parent),
			$this->app->db->quote($this->parent, 'integer'),
			SwatDB::equalityOperator($this->id, true),
			$this->app->db->quote($this->id, 'integer'));

		return (SwatDB::queryOne($this->app->db, $sql) == 0);
	}

	// }}}
	// {{{ protected function saveArticle()

	protected function saveArticle()
	{
		if ($this->id === null) {
			$this->edit_article->instance = $this->app->getInstanceId();
		}
		parent::saveArticle();
	}

	// }}}
}

?>
