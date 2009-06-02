<?php

require_once 'SeleniumTestCase.php';

class AuthorTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadAuthor();

		// make sure the author is displayed
		$this->assertTrue(
			$this->selenium->isElementPresent(
				"xpath=//div[@class='author']/h3[@class='author-name']"
			),
			'Author name is not present on author page.'
		);

		$this->assertTrue(
			$this->selenium->isElementPresent(
				"xpath=//div[@class='author']/div[@class='author-content']"
			),
			'Author description is not present on author page.'
		);

		// make sure there are posts displayed
		// TODO: some blorgs don't display posts on the author page
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		// TODO: some blorgs don't display posts on the author page
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		// TODO: some blorgs don't display posts on the author page
	}

	// }}}
	// {{{ public function testInvalidAuthor()

	public function testInvalidAuthor()
	{
		$this->selenium->open('author/thisisnotavalidauthor');
		$this->assertNotFound();
	}

	// }}}
	// {{{ protected function loadAuthor()

	protected function loadAuthor()
	{
		$this->selenium->open('author');
		$this->assertNoExceptions();

		$this->selenium->click(
			"xpath=//div[@class='author']/h4[@class='author-name']/a"
		);

		$this->selenium->waitForPageToLoad(30000);
		$this->assertNoExceptions();
	}

	// }}}
}

?>
