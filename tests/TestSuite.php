<?php

chdir(dirname(__FILE__));

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

if (!defined('PHPUnit_MAIN_METHOD')) {
	define('PHPUnit_MAIN_METHOD', 'TestSuite::main');
}

class TestSuite
{
	public static function main()
	{
		PHPUnit_TextUI_TestRunner::run(self::suite());
	}

	public static function suite()
	{
		$suite = new PHPUnit_Framework_TestSuite('All Tests');

		$directory = new DirectoryIterator('cases');
		foreach ($directory as $file) {
			if (substr($file, 0, 1) !== '.' && substr($file, -4) === '.php') {
				require_once $file->getRealPath();
				$class_name = substr($file, 0, -4);
				$suite->addTestSuite($class_name);
			}
		}

		return $suite;
	}
}

if (PHPUnit_MAIN_METHOD == 'TestSuite::main') {
	TestSuite::main();
}

?>
