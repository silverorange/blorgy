<?php

require_once 'TestCase.php';

class TagTestCase extends TestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('tag/freeopensource');
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
		$this->selenium->open('tag/freeopensource/page2');
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
		$this->selenium->open('tag/freeopensource/page20000');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testInvalidTag()

	public function testInvalidTag()
	{
		$this->selenium->open('tag/thistagdoesnotexist');
		$this->assertNotFound();
	}

	// }}}
}

?>
