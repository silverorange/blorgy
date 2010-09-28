<?php

require_once 'SeleniumTestCase.php';

class AjaxProxyTestCase extends SeleniumTestCase
{
	// {{{ public function testLastFm()

	public function testLastFm()
	{
		$this->open('ajax/last.fm/gauthierm');
		$this->assertNoExceptions();
		$this->assertTrue(
			$this->isElementPresent("xpath=/recenttracks"),
			'The recenttracks element is not present in Last.fm AJAX proxy.'
		);
	}

	// }}}
	// {{{ public function testInvalidService()

	public function testInvalidService()
	{
		$this->open('ajax/invalidservicethattotallydoesnotexist');
		$this->assertNotFound();
	}

	// }}}
}

?>
