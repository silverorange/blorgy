<?php

require_once 'Testing/Selenium.php';
require_once 'PHPUnit/Framework/TestCase.php';

class TestCase extends PHPUnit_Framework_TestCase
{
	const WORKING_DIR = 'live';
	const INSTANCE    = 'aov';

	// {{{ protected function initSelenium()

	protected function initSelenium($secure = false)
	{
		$uri = 'http://zest/blorgy-'.self::INSTANCE.'/'.
			self::WORKING_DIR.'/www/';

		$this->selenium = new Testing_Selenium(
			'*custom /usr/local/bin/firefox-bin', $uri);
	}

	// }}}
	// {{{ public function sharedAssertions()

	public function sharedAssertions()
	{
		$this->assertFalse($this->selenium->isElementPresent(
			'xpath=//div[@class=\'swat-exception\']'));
	}

	// }}}
}

?>
