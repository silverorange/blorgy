<?php

require_once 'Swat/SwatString.php';

class BlorgPostTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'posts';
		$this->dst_table = 'BlorgPost';

		$field = new ConversionField();
		$field->src_field = 'integer:postid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:site';
		$field->dst_field = 'integer:instance';
		$this->addField($field);

		$field = new BlorgPostShortnameField('shortname');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField('title');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField('bodytext');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField();
		$field->src_charset = 'UTF-8';
		$field->src_field = 'moretext';
		$field->dst_field = 'extended_bodytext';
		$this->addField($field);

		$field = new ConversionDateField('createdate');
		$field->src_tz_id = 'America/Halifax';
		$this->addField($field);

		$field = new ConversionDateField();
		$field->src_field = 'postdate';
		$field->dst_field = 'post_date';
		$field->src_tz_id = 'America/Halifax';
		$this->addField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:replystatus';
		$field->dst_field = 'integer:reply_status';
		$this->addField($field);

		$field = new BlorgPostAuthorField('integer:author');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionBooleanField();
		$field->src_field = 'hidden';
		$field->dst_field = 'enabled';
		$field->inverse = true;
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

		// TODO: import all sites, not just aov
		$sql.= ' and site = 1';

		return $sql;
	}

	// }}}
}

class BlorgPostShortnameField extends ConversionTextField
{
	// {{{ public function convertData()

	public function convertData($data)
	{
		$data = parent::convertData($data);

		// generate a shortname
		return $this->generateShortname($data);
	}

	// }}}
	// {{{ private function generateShortname()

	private function generateShortname($text, $iteration = 0)
	{
		$shortname = SwatString::condenseToName($text);

		if ($iteration != 0)
			$shortname = $shortname.((string) $iteration);

		$sql = sprintf('select id from BlorgPost where shortname = %s',
			$this->table->process->dst_db->quote($shortname, 'text'));

		$rs = SwatDB::query($this->table->process->dst_db, $sql);

		if (count($rs) == 0)
			return $shortname;
		else
			return $this->generateShortname($text, $iteration + 1);
	}

	// }}}
}

class BlorgPostAuthorField extends ConversionTextField
{
	// {{{ public function convertData()

	public function convertData($data)
	{
		$data = parent::convertData($data);

		// TODO: map users
		return 8;
	}

	// }}}
}

?>
