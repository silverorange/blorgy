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
	// {{{ protected function getSourceRecordset()

	protected function getSourceRecordset($start_above = null)
	{
		$rows = new ArrayObject();

		$sql = $this->getPostsSourceSQL();
		$rs = SwatDB::query($this->process->src_db, $sql, null);
		while ($row = $rs->fetchRow())
			$rows[] = $row;

		$sql = $this->getSideBlogSourceSQL();
		$rs = SwatDB::query($this->process->src_db, $sql, null);
		while ($row = $rs->fetchRow())
			$rows[] = $row;

		return $rows;
	}

	// }}}
	// {{{ protected function getSourceRow()

	protected function getSourceRow($rows)
	{
		$row = current($rows);
		next($rows);

		if (!is_array($row))
			$row = null;

		return $row;
	}

	// }}}
	// {{{ protected function getPostsSourceSQL()

	protected function getPostsSourceSQL()
	{
		$select_list = array();

		foreach ($this->fields as $field) {
			if ($field->src_field === null)
				$select_list[] = '0';
			elseif ($field->src_field->name == 'hidden')
				$select_list[] = 'cast(hidden as integer)';
			elseif ($field->src_field->name == 'shortname')
				$select_list[] = 'title';
			else
				$select_list[] = $field->src_field->name;
		}

		$sql = sprintf('select %s from %s where 1=1',
			implode(', ', $select_list),
			$this->src_table);

		$sql.= ' and site in (select siteid from sites where keep = true)';

		return $sql;
	}

	// }}}
	// {{{ protected function getSideBlogSourceSQL()

	protected function getSideBlogSourceSQL()
	{
		$select_list = array();

		foreach ($this->fields as $field) {
			if ($field->src_field === null)
				$select_list[] = '0';
			elseif ($field->src_field->name == 'postid')
				$select_list[] = 'postid + 10000';
			elseif ($field->src_field->name == 'hidden')
				$select_list[] = 'cast(hidden as integer)';
			elseif ($field->src_field->name == 'shortname')
				$select_list[] = 'bodytext';
			elseif ($field->src_field->name == 'title')
				$select_list[] = 'null';
			elseif ($field->src_field->name == 'moretext')
				$select_list[] = 'null';
			elseif ($field->src_field->name == 'replystatus')
				$select_list[] = BlorgPost::COMMENT_STATUS_CLOSED;
			else
				$select_list[] = $field->src_field->name;
		}

		$sql = sprintf('select %s from sideblogposts where 1=1',
			implode(', ', $select_list));

		$sql.= ' and site in (select siteid from sites where keep = true)';

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

?>
