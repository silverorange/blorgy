<?php

require_once 'PHPUnit/Framework/TestCase.php';

class TestCase extends PHPUnit_Framework_TestCase
{
	// {{{ protected properties

	/**
	 * @var string
	 */
	protected $base_href = '';

	/**
	 * @var string
	 */
	protected $instance = '';

	// }}}
	// {{{ private properties

	/**
	 * @var integer
	 */
	private $old_error_level;

	// }}}
	// {{{ __construct()

	public function __construct($name = null)
	{
		parent::__construct($name);
		@include_once dirname(__FILE__).'/config.php';
	}

	// }}}
	// {{{ public function setUp()

	public function setUp()
	{
		if (   !isset($GLOBALS['Blorgy_FunctionalTest_Config'])
			|| !is_array($GLOBALS['Blorgy_FunctionalTest_Config'])
		) {
			$this->markTestSkipped('Functional test configuration is missing.');
		}

		$config = $GLOBALS['Blorgy_FunctionalTest_Config'];

		if (   !isset($config['working_dir'])
			|| !isset($config['instance'])
			|| !isset($config['base_href'])
		) {
			$this->markTestSkipped(
				'Functional test configuration is missing or incorrect.'
			);
		}

		$this->olde_error_level = error_reporting(E_ALL | E_STRICT);

		$this->instance = $config['instance'];

		if (strpos($config['base_href'], '%s') === false) {
			$this->base_href = $config['base_href'];
		} else {
			$this->base_href = sprintf(
				$config['base_href'],
				$config['instance'],
				$config['working_dir']
			);
		}
	}

	// }}}
	// {{{ public function tearDown()

	public function tearDown()
	{
		error_reporting($this->old_error_level);
	}

	// }}}
}

?>
