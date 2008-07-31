<?php

require_once 'SeleniumTestCase.php';

class TagIndexTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('tag');
		$this->assertNoExceptions();

		// make sure there are tags displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//ul[@class='blorg-archive-tags']"));
	}

	// }}}
}

?>
