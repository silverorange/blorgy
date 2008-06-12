<?php

class BlorgPostTagBindingTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'post_attribute';
		$this->dst_table = 'BlorgPostTagBinding';

		$this->addDep('BlorgPost');
		$this->addDep('BlorgTag');
		$this->addDep('Instance');

		$field = new ConversionField('integer:post');
		$this->addField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:attribute';
		$field->dst_field = 'integer:tag';
		$this->addField($field);
	}

	// }}}
	// {{{ protected function getSourceSQL()

	protected function getSourceSQL()
	{
		$sql = parent::getSourceSQL();

		$sql.= ' and attribute in (select attributeid from attributes
			where site in (select siteid from sites where keep = true)
				and hidden != \'0\')';

		return $sql;
	}

	// }}}
}

?>
