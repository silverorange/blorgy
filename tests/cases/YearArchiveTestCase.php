<?php

require_once 'TestCase.php';

class YearArchiveTestCase extends TestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('archive/2008');
		$this->assertNoExceptions();

		// make sure there are months displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//ul[@class='blorg-archive-months']"));

		// make sure there are posts displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//ul[@class='blorg-archive-months']/li/".
				"ul[@class='entries']/li/".
				"div[contains(@class, 'entry')]"));
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		$this->selenium->open('archive/1900');
		$this->assertNotFound();
	}

	// }}}
}

?>
