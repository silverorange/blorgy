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
		$field->dst_field = 'visible';
		$this->addField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:site';
		$field->dst_field = 'integer:instance';
		$this->addField($field);

		$field = new BlorgAuthorShortnameField();
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
		$select_list = array();

		foreach ($this->fields as $field) {
			if ($field->src_field->name == 'feature')
				$select_list[] = 'cast(feature as integer)';
			else
				$select_list[] = $field->src_field->name;
		}

		$sql = sprintf('select %s from %s where 1=1',
			implode(', ', $select_list),
			$this->src_table);

		$sql.= ' and site in (select siteid from sites where keep = true)
			and (userid in (select author from posts where site in
			(select siteid from sites where keep = true)) or userid in
			(select owner from replies where site in
			(select siteid from sites where keep = true)))';

		return $sql;
	}

	// }}}
}

class BlorgAuthorShortnameField extends ConversionTextField
{
	// {{{ public function convertData()

	public function convertData($data)
	{
		$data = parent::convertData($data);

		$row = &$this->table->getCurrentRow();
		$instance = $row[$this->table->getFieldIndexByDestinationName('instance')];

		// generate a shortname
		return $this->generateShortname($instance, $data);
	}

	// }}}
	// {{{ private function generateShortname()

	private function generateShortname($instance, $text, $iteration = 0)
	{
		$shortname = SwatString::condenseToName($text);

		if ($iteration != 0)
			$shortname = $shortname.((string) $iteration);

		$sql = 'select id from BlorgAuthor
			where shortname = %s and instance = %s';

		$sql = sprintf($sql,
			$this->table->process->dst_db->quote($shortname, 'text'),
			$this->table->process->dst_db->quote($instance, 'integer'));

		$rs = SwatDB::query($this->table->process->dst_db, $sql);

		if (count($rs) == 0)
			return $shortname;
		else
			return $this->generateShortname($instance, $text, $iteration + 1);
	}

	// }}}
}

?>
