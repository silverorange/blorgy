<?php

require_once 'TestConfig.php';
require_once 'PHPUnit/Extensions/SeleniumTestCase.php';

class SeleniumTestCase extends PHPUnit_Extensions_SeleniumTestCase
{
	// {{{ protected properties

	/**
	 * @var TestConfig
	 */
	protected $config;

	// }}}
	// {{{ public function __construct()

	public function __construct(
		$name = null,
		array $data = array(),
		$data_name = ''
	) {
		parent::__construct($name, $data, $data_name);

		$this->config = new TestConfig(
			$this,
			dirname(__FILE__) . '/config.php'
		);
	}

	// }}}
	// {{{ public function setUp()

	public function setUp()
	{
		parent::setUp();

		$this->config->setUp();

//		$this->setBrowser('*chrome /usr/bin/firefox');
		$this->setBrowser('*chrome');
		$this->setBrowserUrl($this->config->getBaseHref());
		$this->start();
	}

	// }}}
	// {{{ public function tearDown()

	public function tearDown()
	{
//		$this->stop();
		parent::tearDown();
		$this->config->tearDown();
	}

	// }}}
	// {{{ public function assertPreConditions()

	public function assertPreConditions()
	{
		$this->windowMaximize();
	}

	// }}}
	// {{{ protected function assertNoExceptions()

	protected function assertNoExceptions()
	{
		$this->assertFalse(
			$this->isElementPresent(
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
			$this->isTextPresent(
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
			$this->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[contains(@class, 'entry-content')]"
			),
			'No posts are present on the page.'
		);
	}

	// }}}
}

?>
