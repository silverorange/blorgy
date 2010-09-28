<?php

require_once 'SeleniumTestCase.php';

class ArchiveTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->open('archive');
		$this->assertNoExceptions();

		// make sure there are years displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-years']"
			),
			'The year list is missing on the archive page.'
		);

		// make sure there are months displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-years']/li/ul/li"
			),
			'No months are present in the years list on the archive page.'
		);
	}

	// }}}
}

?>
