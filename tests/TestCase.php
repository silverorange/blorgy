<?php

require_once 'Testing/Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class TestCase extends PHPUnit_Framework_TestCase
{
	const WORKING_DIR = 'live';
	const INSTANCE    = 'aov';

	// {{{ public function setUp()

	public function setUp()
	{
		$uri = 'http://zest/blorgy-'.self::INSTANCE.'/'.
			self::WORKING_DIR.'/www/';

		$this->selenium = new Testing_Selenium(
			'*custom /usr/local/bin/firefox-bin', $uri);

		$this->selenium->start();
	}

	// }}}
	// {{{ public function tearDown()

	public function tearDown()
	{
		$this->selenium->stop();
	}

	// }}}
	// {{{ protected function assertNoExceptions()

	protected function assertNoExceptions()
	{
		$this->assertFalse($this->selenium->isElementPresent(
			'xpath=//div[@class=\'swat-exception\']'));
	}

	// }}}
	// {{{ protected function assertNotFound()

	protected function assertNotFound()
	{
		$this->assertTrue($this->selenium->isTextPresent(
			'Sorry, we couldn’t find the page you were looking for.'));
	}

	// }}}
	// {{{ protected function assertHasPosts()

	protected function assertHasPosts()
	{
		// make sure there are posts displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[contains(@class, 'entry-content')]"));
	}

	// }}}
}

?>
