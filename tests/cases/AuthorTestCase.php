<?php

require_once 'TestCase.php';

class AuthorIndexTestCase extends TestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('author/steven');
		$this->assertNoExceptions();

		// make sure there are authors displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[@class='author']/h3[@class='author-name']"));

		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[@class='author']/div[@class='author-content']"));

		// make sure there are posts displayed
		// TODO: AOV doesn't display posts on the author page
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		// TODO: AOV doesn't display posts on the author page
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		// TODO: AOV doesn't display posts on the author page
	}

	// }}}
	// {{{ public function testInvalidAuthor()

	public function testInvalidAuthor()
	{
		$this->selenium->open('author/thisisnotavalidauthor');
		$this->assertNotFound();
	}

	// }}}
}

?>
