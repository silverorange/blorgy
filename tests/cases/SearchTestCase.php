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

	public function testSpellCheckResults()
	{
		$this->selenium->open('search?keywords=delicius');
		$this->assertTrue($this->selenium->isTextPresent(
			'Did you mean'));
	}

	// }}}
	// {{{ public function testPostPagination()

	public function testPostPagination()
	{
		$this->selenium->open('search?keywords=test&type=post&page=2');
		$this->assertTrue($this->selenium->isTextPresent('Page 2'));
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[contains(@class, 'entry-content')]"));

		$this->assertFalse($this->selenium->isTextPresent(
			'Article Search Results'));
	}

	// }}}
	// {{{ public function testArticlePagination()

	public function testArticlePagination()
	{
		$this->selenium->open('search?keywords=test&type=article&page=2');
		$this->assertTrue($this->selenium->isTextPresent('Page 2'));
		$this->assertTrue($this->selenium->isTextPresent(
			'Article Search Results'));

		$this->assertFalse($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[contains(@class, 'entry-content')]"));
	}

	// }}}
}

?>
