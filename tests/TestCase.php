<?php

require_once 'PHPUnit/Framework/TestCase.php';

class TestCase extends PHPUnit_Framework_TestCase
{
	const WORKING_DIR = 'work-gauthierm';
	const INSTANCE    = 'ceoblues';

	// {{{ protected properties

	protected $base_href = '';

	// }}}
	// {{{ public function setUp()

	public function setUp()
	{
		$this->base_href = 'http://zest/blorgy-'.self::INSTANCE.'/'.
			self::WORKING_DIR.'/www/';
	}

	// }}}
}

?>
