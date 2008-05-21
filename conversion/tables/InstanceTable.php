<?php

class InstanceTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'sites';
		$this->dst_table = 'Instance';

		$field = new ConversionField();
		$field->src_field = 'integer:siteid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ConversionTextField('shortname');
		$field->src_charset = 'UTF-8';
		$this->addField($field);
	}

	// }}}
	// {{{ protected function getSourceSQL()

	protected function getSourceSQL()
	{
		$sql = parent::getSourceSQL();
		$sql.= ' and keep = true';

		return $sql;
	}

	// }}}
}

?>
