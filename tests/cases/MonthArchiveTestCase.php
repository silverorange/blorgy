<?php

require_once 'SeleniumTestCase.php';

class MonthArchiveTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->open('archive/2006/november');
		$this->assertNoExceptions();
		$this->assertHasPosts();
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		$this->open('archive/1900/january');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testInvalidMonth()

	public function testInvalidMonth()
	{
		$this->open('archive/2006/foo');
		$this->assertNotFound();
	}

	// }}}
}

?>
