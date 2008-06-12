<?php

require_once 'Blorg/dataobjects/BlorgComment.php';

class BlorgCommentTable extends ConversionTable
{
	// {{{ public function init()

	public function init()
	{
		$this->src_table = 'replies';
		$this->dst_table = 'BlorgComment';

		$this->addDep('BlorgPost');

		$field = new ConversionField();
		$field->src_field = 'integer:replyid';
		$field->dst_field = 'integer:id';
		$this->addField($field);
		$this->setIDField($field);

		$field = new ConversionField('integer:post');
		$this->addField($field);

		$field = new ConversionField();
		$field->src_field = 'integer:owner';
		$field->dst_field = 'integer:author';
		$this->addField($field);

		$field = new ConversionTextField('fullname');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField('email');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionTextField();
		$field->src_charset = 'UTF-8';
		$field->src_field = 'href';
		$field->dst_field = 'link';
		$this->addField($field);

		$field = new ConversionTextField('bodytext');
		$field->src_charset = 'UTF-8';
		$this->addField($field);

		$field = new ConversionDateField('createdate');
		$field->src_tz_id = 'America/Halifax';
		$this->addField($field);

		$field = new BlorgCommentStatusField();
		$field->src_field = 'integer:hidden';
		$field->dst_field = 'integer:status';
		$this->addField($field);

		$field = new ConversionTextField();
		$field->src_charset = 'UTF-8';
		$field->src_field = 'remoteip';
		$field->dst_field = 'ip_address';
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
			elseif ($field->src_field->name == 'spam')
				$select_list[] = 'cast(spam as integer)';
			else
				$select_list[] = $field->src_field->name;
		}

		$sql = sprintf('select %s from %s where 1=1',
			implode(', ', $select_list),
			$this->src_table);

		$sql.= ' and spam = \'0\'';

		$sql.= ' and post in (select postid from posts
			where site in (select siteid from sites where keep = true))';

		return $sql;
	}

	// }}}
}

class BlorgCommentStatusField extends ConversionField
{
	// {{{ public function convertData()

	public function convertData($data)
	{
		$data = parent::convertData($data);

		$status = BlorgComment::STATUS_PUBLISHED;

		if ($data === true)
			$status = BlorgComment::STATUS_UNPUBLISHED;

		return $status;
	}

	// }}}
}

?>
