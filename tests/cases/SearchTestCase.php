<?php

require_once 'TestCase.php';

class SearchTestCase extends TestCase
{
	// {{{ public function setUp()

	public function setUp()
	{
		$this->initSelenium(true);
		$this->selenium->start();
	}

	// }}}
	// {{{ public function tearDown()

	public function tearDown()
	{
		$this->selenium->stop();
	}

	// }}}

	// tests
	// {{{ public function testResults()

	public function testResults()
	{
		$this->selenium->open('search?keywords=test');
		$this->assertFalse($this->selenium->isTextPresent(
			'No results found for'));
	}

	// }}}
	// {{{ public function testNoResults()

	public function testNoResults()
	{
		$this->selenium->open('search?keywords=qwefoiqewfoiqewoibfoibqewf');
		$this->assertTrue($this->selenium->isTextPresent(
			'No results found for'));
	}

	// }}}
	// {{{ public function testSpellCheck()

	public function testNoResults()
	{
		$this->selenium->open('search?keywords=delicius');
		$this->assertTrue($this->selenium->isTextPresent(
			'Did you mean'));
	}

	// }}}
}

?>
