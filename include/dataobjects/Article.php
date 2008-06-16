<?php

/**
 * Instance-aware article
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class Article extends SiteArticle
{
	// {{{ protected function init()

	protected function init()
	{
		parent::init();
		$this->registerInternalProperty('instance', 'SiteInstance');
	}

	// }}}
	// {{{ public function load()

	/**
	 * Loads this article 
	 *
	 * @param integer $id the database id of this article.
	 * @param SiteInstance $instance optional. The instance to load the article
	 *                                in. If the application does not use
	 *                                instances, this should be null. If
	 *                                upsecified, the instance is not checked.
	 *
	 * @return boolean true if this article was loaded and false if it was not.
	 */
	public function load($id, SiteInstance $instance = null)
	{
		$this->checkDB();

		$loaded = false;
		$row = null;
		if ($this->table !== null && $this->id_field !== null) {
			$id_field = new SwatDBField($this->id_field, 'integer');

			$sql = sprintf('select * from %s where %s = %s',
				$this->table,
				$id_field->name,
				$this->db->quote($id, $id_field->type));

			$instance_id  = ($instance === null) ? null : $instance->id;
			if ($instance_id !== null) {
				$sql.=sprintf(' and instance %s %s',
					SwatDB::equalityOperator($instance_id),
					$this->db->quote($instance_id, 'integer'));
			}

			$rs = SwatDB::query($this->db, $sql, null);
			$row = $rs->fetchRow(MDB2_FETCHMODE_ASSOC);
		}

		if ($row !== null) {
			$this->initFromRow($row);
			$this->generatePropertyHashes();
			$loaded = true;
		}

		return $loaded;
	}

	// }}}
}

?>
