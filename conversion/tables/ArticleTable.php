<?php

require_once 'Swat/SwatString.php';

class ArticleTable extends ConversionTable
{
	// {{{ public properties

	public $parents = array();

	// }}}
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'articles';
		$this->dst_table = 'Article';

		// must always be cleared due to mangling done in finalize
		$this->clear_data = true;

		$field = new ConversionField();
		$field->src_field = 'integer:articleid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ArticleParentField('integer:parent');
		$this->addField($field);

		$field = new ConversionTextField('title');
		$this->addField($field);

		$field = new ConversionTextField('description');
		$this->addField($field);

		$field = new ConversionTextField('bodytext');
		$this->addField($field);

		$field = new ConversionDateField('date:createdate');
		$this->addField($field);

		$field = new ConversionField('integer:displayorder');
		$this->addField($field);

		$field = new ConversionBooleanField();
        $field->src_field = 'hidden';
        $field->dst_field = 'show';
        $field->inverse = true;
        $this->addField($field);

		$field = new ConversionTextField('shortname');
		$this->addField($field);
	}

	// }}}
	// {{{ protected function getSourceSQL()

	protected function getSourceSQL()
	{
		$select_list = array();

		foreach ($this->fields as $field) {
			if ($field->src_field === null)
				$select_list[] = '0';
			elseif ($field->src_field->name == 'hidden')
				$select_list[] = 'cast(hidden as integer)';
			else
				$select_list[] = $field->src_field->name;
		}

		$sql = sprintf('select %s from %s where 1=1',
			implode(', ', $select_list),
			$this->src_table);

		$sql.= ' and site in (select siteid from sites where keep_articles = true)';

		return $sql;
	}

	// }}}
}

class ArticleParentField extends ConversionField
{
	private $parents = array();

	// {{{ public function convertData()

	public function convertData($data)
	{
		$row = &$this->table->getCurrentRow();
		$id = $row[$this->table->getFieldIndexByDestinationName('id')];

		if ($data == 0)
			$data = null;

		$this->table->parents[$id] = $data;

		return null;
	}

	// }}}
	// {{{ public function finalize()

	public function finalize()
	{
		$base_sql = 'update Article set parent = %s where id = %s';

		foreach ($this->table->parents as $id => $parent) {
			$sql = sprintf($base_sql,
				$this->table->process->dst_db->quote($parent, 'integer'),
				$this->table->process->dst_db->quote($id, 'integer'));

			SwatDB::exec($this->table->process->dst_db, $sql);
		}
	}

	// }}}
}

?>
