<?php

class BlorgAuthorTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'adminusers';
		$this->dst_table = 'BlorgAuthor';

		$this->addDep('Instance');

		$field = new ConversionField();
		$field->src_field = 'integer:userid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ConversionBooleanField();
		$field->src_field = 'feature';
		$field->dst_field = 'show';
		$this->addField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:site';
		$field->dst_field = 'integer:instance';
		$this->addField($field);

		$field = new ConversionTextField();
		$field->src_field = 'username';
		$field->dst_field = 'shortname';
		$this->addField($field);

		$field = new ConversionTextField('name');
		$this->addField($field);

		$field = new ConversionTextField('bodytext');
		$this->addField($field);

		$field = new ConversionTextField('description');
		$this->addField($field);
	}

	// }}}
	// {{{ protected function getSourceSQL()

	protected function getSourceSQL()
	{
		$sql = parent::getSourceSQL();
		$sql.= ' and site in (select siteid from sites where keep = true)';

		return $sql;
	}

	// }}}
}

?>
