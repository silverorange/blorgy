<?php

class BlorgTagTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'attributes';
		$this->dst_table = 'BlorgTag';

		$field = new ConversionField();
		$field->src_field = 'integer:attributeid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:site';
		$field->dst_field = 'integer:instance';
		$this->addField($field);

		$field = new ConversionTextField('shortname');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField('title');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionDateField('createdate');
		$field->src_tz_id = 'America/Halifax';
		$this->addField($field);
	}

	// }}}
	// {{{ protected function getSourceSQL()

	protected function getSourceSQL()
	{
		$sql = parent::getSourceSQL();
		// TODO: import all sites, not just aov
		$sql.= ' and site = 1';

		return $sql;
	}

	// }}}
}

?>
