<?php

require_once 'Testing/Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class TestCase extends PHPUnit_Framework_TestCase
{
	const WORKING_DIR = 'work-gauthierm';
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
}

?>
