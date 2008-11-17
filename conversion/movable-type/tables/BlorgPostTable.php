<?php

require_once 'Swat/SwatString.php';
require_once 'Blorg/dataobjects/BlorgPost.php';

class BlorgPostTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'posts';
		$this->dst_table = 'BlorgPost';
		$this->trim = true;
		$this->empty_to_null = true;

		$this->addDep('Instance');

		$field = new ConversionField();
		$field->src_field = 'integer:postid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:37';
		$field->dst_field = 'integer:instance';
		$this->addField($field);

		$field = new BlorgPostShortnameField('shortname');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField('title');
		$this->addField($field);

		$field = new ConversionTextField('bodytext');
		$this->addField($field);

		$field = new ConversionTextField();
		$field->src_field = 'moretext';
		$field->dst_field = 'extended_bodytext';
		$this->addField($field);

		$field = new ConversionDateField('createdate');
		$field->src_tz_id = 'America/Halifax';
		$this->addField($field);

		$field = new ConversionDateField();
		$field->src_field = 'postdate';
		$field->dst_field = 'publish_date';
		$field->src_tz_id = 'America/Halifax';
		$this->addField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:replystatus';
		$field->dst_field = 'integer:comment_status';
		$this->addField($field);

		$field = new ConversionField('integer:author');
		$this->addField($field);

		$field = new ConversionBooleanField();
		$field->src_field = 'hidden';
		$field->dst_field = 'enabled';
		$field->inverse = true;
		$this->addField($field);
	}

	// }}}
	// {{{ protected function clearDestinationTable()

	protected function clearDestinationTable()
	{
		$sql = sprintf('delete from %s where instance = %s',
			$this->dst_table,
			$this->process->dst_db->quote($this->process->instance, 'integer'));

		return SwatDB::exec($this->process->dst_db, $sql);
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
		if ($iteration === 0 && preg_match('/^[a-z0-9_-]+$/', $text))
			return $text;

		$shortname = SwatString::condenseToName($text);

		if ($iteration != 0)
			$shortname = $shortname.((string) $iteration);

		$sql = sprintf('select id from BlorgPost where shortname = %s
			and instance = %s',
			$this->table->process->dst_db->quote($shortname, 'text'),
			$this->table->process->dst_db->quote(
				$this->table->process->instance, 'integer'));

		$rs = SwatDB::query($this->table->process->dst_db, $sql);

		if (count($rs) == 0)
			return $shortname;
		else
			return $this->generateShortname($text, $iteration + 1);
	}

	// }}}
}

?>
