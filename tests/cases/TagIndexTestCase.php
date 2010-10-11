<?php

require_once 'SeleniumTestCase.php';

class TagIndexTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->open('tag');
		$this->assertNoErrors();

		// make sure there are tags displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-tags']"
			),
			'Tag list is not present on tag index page.'
		);
	}

	// }}}
}

?>
