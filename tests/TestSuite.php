<?php

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

class TestSuite
{
	public static function main()
	{
		PHPUnit_TextUI_TestRunner::run(self::suite());
	}

	public static function suite()
	{
		$suite = new PHPUnit_Framework_TestSuite('All Tests');

		$dir = dirname(__FILE__);
		chdir($dir);
		$files = scandir('cases');
		foreach ($files as $file) {
			if (substr($file, 0, 1) !== '.' && substr($file, -4) === '.php') {
				require_once $dir.'/cases/'.$file;
				$class = substr($file, 0, -4);
				$suite->addTestSuite($class);
			}
		}

		return $suite;
	}
}

?>
