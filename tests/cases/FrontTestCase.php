<?php

require_once 'TestCase.php';

class FrontTestCase extends TestCase
{
	// {{{ public function testResults()

	public function testResults()
	{
		$this->selenium->open('');
		$this->assertNoExceptions();

		// make sure there are posts displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[contains(@class, 'entry-content')]"));

		// make sure footer summary is there
		$this->assertTrue($this->selenium->isTextPresent(
			'posts, displaying 1 to 10'));
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->selenium->open('page2');
		$this->assertNoExceptions();

		// make sure there are posts displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[contains(@class, 'entry-content')]"));

		// make sure footer summary is correct
		$this->assertTrue($this->selenium->isTextPresent(
			'posts, displaying 11 to 20'));
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->selenium->open('page20000');
		$this->assertTrue($this->selenium->isTextPresent(
			'Sorry, we couldn’t find the page you were looking for.'));
	}

	// }}}
}

?>
