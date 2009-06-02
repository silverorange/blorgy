<?php

require_once 'TestCase.php';
require_once 'Testing/Selenium.php';

class SeleniumTestCase extends TestCase
{
	// {{{ public function setUp()

	public function setUp()
	{
		parent::setUp();

		$this->selenium = new Testing_Selenium(
			'*chrome /usr/local/bin/firefox-bin',
			$this->base_href
		);

		$this->selenium->start();
	}

	// }}}
	// {{{ public function tearDown()

	public function tearDown()
	{
		$this->selenium->stop();
		parent::tearDown();
	}

	// }}}
	// {{{ protected function assertNoExceptions()

	protected function assertNoExceptions()
	{
		$this->assertFalse(
			$this->selenium->isElementPresent(
				'xpath=//div[@class=\'swat-exception\']'
			),
			'One or more exceptions are present on the page.'
		);
	}

	// }}}
	// {{{ protected function assertNotFound()

	protected function assertNotFound()
	{
		$this->assertTrue(
			$this->selenium->isTextPresent(
				'Sorry, we couldn’t find the page you were looking for.'
			),
			'Expected "not found" message not present.'
		);
	}

	// }}}
	// {{{ protected function assertHasPosts()

	protected function assertHasPosts()
	{
		// make sure there are posts displayed
		$this->assertTrue(
			$this->selenium->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[contains(@class, 'entry-content')]"
			),
			'No posts are present on the page.'
		);
	}

	// }}}
}

?>
