<?php

require_once 'TestCase.php';

class ArchiveTestCase extends TestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('archive');
		$this->assertNoExceptions();

		// make sure there are years displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//ul[@class='blorg-archive-years']"));

		// make sure there are months displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//ul[@class='blorg-archive-years']/li/ul/li"));
	}

	// }}}
}

?>
