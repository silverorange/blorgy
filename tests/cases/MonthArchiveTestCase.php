<?php

require_once 'TestCase.php';

class MonthArchiveTestCase extends TestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('archive/2006/november');
		$this->assertNoExceptions();

		// make sure there are posts displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[contains(@class, 'entry-content')]"));
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		$this->selenium->open('archive/1900/january');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testInvalidMonth()

	public function testInvalidMonth()
	{
		$this->selenium->open('archive/2006/foo');
		$this->assertNotFound();
	}

	// }}}
}

?>
