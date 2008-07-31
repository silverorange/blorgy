<?php

require_once 'SeleniumTestCase.php';

class SearchTestCase extends SeleniumTestCase
{
	// tests
	// {{{ public function testResults()

	public function testResults()
	{
		$this->selenium->open('search?keywords=test');
		$this->assertNoExceptions();
		$this->assertFalse($this->selenium->isTextPresent(
			'No results found for'));
	}

	// }}}
	// {{{ public function testNoResults()

	public function testNoResults()
	{
		$this->selenium->open('search?keywords=qwefoiqewfoiqewoibfoibqewf');
		$this->assertNoExceptions();
		$this->assertTrue($this->selenium->isTextPresent(
			'No results found for'));
	}

	// }}}
	// {{{ public function testSpellCheck()

	public function testSpellCheckResults()
	{
		$this->selenium->open('search?keywords=delicius');
		$this->assertNoExceptions();
		$this->assertTrue($this->selenium->isTextPresent(
			'Did you mean'));
	}

	// }}}
	// {{{ public function testPostPagination()

	public function testPostPagination()
	{
		$this->selenium->open('search?keywords=test&type=post&page=2');
		$this->assertNoExceptions();
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
		$this->assertNoExceptions();
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
