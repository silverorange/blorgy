<?php

require_once 'TestCase.php';

class AjaxProxyTestCase extends TestCase
{
	// {{{ public function testLastFm()

	public function testLastFm()
	{
		$this->selenium->open('ajax/last.fm/gauthierm');
		$this->assertNoExceptions();
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=/recenttracks"));
	}

	// }}}
	// {{{ public function testInvalidService()

	public function testInvalidService()
	{
		$this->selenium->open('ajax/invalidservicethattotallydoesnotexist');
		$this->assertNotFound();
	}

	// }}}
}

?>
