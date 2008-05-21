<?php

class BlorgAuthorTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'adminusers';
		$this->dst_table = 'BlorgAuthor';

		$field = new ConversionField();
		$field->src_field = 'integer:userid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

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
}

?>
