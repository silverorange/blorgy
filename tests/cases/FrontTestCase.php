<?php

require_once 'TestCase.php';

class FrontTestCase extends TestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('');
		$this->assertNoExceptions();
		$this->assertHasPosts();

		// make sure footer summary is there
		$this->assertTrue($this->selenium->isTextPresent(
			'posts, displaying 1 to 10'));
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->selenium->open('page2');
		$this->assertNoExceptions();
		$this->assertHasPosts();

		// make sure footer summary is correct
		$this->assertTrue($this->selenium->isTextPresent(
			'posts, displaying 11 to 20'));
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->selenium->open('page20000');
		$this->assertNotFound();
	}

	// }}}
}

?>
