<?php

require_once 'SeleniumTestCase.php';

class SearchTestCase extends SeleniumTestCase
{
	// tests
	// {{{ public function testResults()

	public function testResults()
	{
		$this->selenium->open('search?keywords=test');
		$this->assertNoExceptions();
		$this->assertFalse(
			$this->selenium->isTextPresent('No results found for'),
			'No results text is incorrectly displayed when there are results.'
		);
	}

	// }}}
	// {{{ public function testNoResults()

	public function testNoResults()
	{
		$this->selenium->open('search?keywords=qwefoiqewfoiqewoibfoibqewf');
		$this->assertNoExceptions();
		$this->assertTrue(
			$this->selenium->isTextPresent('No results found for'),
			'No results text is not displayed when there are no results.'
		);
	}

	// }}}
	// {{{ public function testSpellCheck()

	public function testSpellCheckResults()
	{
		$this->selenium->open('search?keywords=delicius');
		$this->assertNoExceptions();
		$this->assertTrue(
			$this->selenium->isTextPresent('Did you mean'),
			'Spell checking suggestion text is not displayed for misspellings.'
		);
	}

	// }}}
	// {{{ public function testPostPagination()

	public function testPostPagination()
	{
		$this->selenium->open('search?keywords=test&type=post&page=2');
		$this->assertNoExceptions();

		$this->assertTrue(
			$this->selenium->isTextPresent('Page 2'),
			'Page number text is not present on second page of post search '.
			'results.'
		);

		$this->assertTrue(
			$this->selenium->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[contains(@class, 'entry-content')]"
			),
			'No posts are displayed on second page of search results.'
		);

		$this->assertFalse(
			$this->selenium->isTextPresent('Article Search Results'),
			'Article search results are displayed on second page of post '.
			'search results.'
		);
	}

	// }}}
	// {{{ public function testArticlePagination()

	public function testArticlePagination()
	{
		$this->selenium->open('search?keywords=test&type=article&page=2');
		$this->assertNoExceptions();

		$this->assertTrue(
			$this->selenium->isTextPresent('Page 2'),
			'Page number text is not present on second page of article '.
			'search results.'
		);

		$this->assertTrue(
			$this->selenium->isTextPresent('Article Search Results'),
			'Article search results title is not present on second page of '.
			'article search results.'
		);

		$this->assertFalse(
			$this->selenium->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[contains(@class, 'entry-content')]"
			),
			'Posts are displayed on second page of article search results.'
		);
	}

	// }}}
}

?>
