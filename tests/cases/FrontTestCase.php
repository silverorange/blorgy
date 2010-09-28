<?php

require_once 'SeleniumTestCase.php';

class FrontTestCase extends SeleniumTestCase
{
	// {{{ class constants

	const MAX_POSTS = 10;

	// }}}
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->open('');
		$this->assertNoExceptions();
		$this->assertHasPosts();

		// make sure footer summary is there
		$text = sprintf('posts, displaying 1 to %s', self::MAX_POSTS);
		$this->assertTrue(
			$this->isTextPresent($text),
			'Footer summary text is not present on front page.'
		);
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->open('page2');
		$this->assertNoExceptions();
		$this->assertHasPosts();

		// make sure footer summary is correct
		$start = self::MAX_POSTS + 1;
		$text  = sprintf('posts, displaying %s to', $start);
		$this->assertTrue(
			$this->isTextPresent($text),
			'Footer summary text is not present on second page.'
		);
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->open('page20000');
		$this->assertNotFound();
	}

	// }}}
}

?>
