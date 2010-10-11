<?php

require_once 'SeleniumTestCase.php';

class AuthorIndexTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->open('author');
		$this->assertNoErrors();

		// make sure there are authors displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[@class='author']/h4[@class='author-name']"
			),
			'No authors are displayed on the author index page.'
		);
	}

	// }}}
}

?>
