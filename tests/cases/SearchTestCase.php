<?php

require_once 'SeleniumTestCase.php';

class SearchTestCase extends SeleniumTestCase
{
	// tests
	// {{{ public function testResults()

	public function testResults()
	{
		$this->open('search?keywords=test');
		$this->assertNoErrors();
		$this->assertFalse(
			$this->isTextPresent('No results found for'),
			'No results text is incorrectly displayed when there are results.'
		);
	}

	// }}}
	// {{{ public function testNoResults()

	public function testNoResults()
	{
		$this->open('search?keywords=qwefoiqewfoiqewoibfoibqewf');
		$this->assertNoErrors();
		$this->assertTrue(
			$this->isTextPresent('No results found for'),
			'No results text is not displayed when there are no results.'
		);
	}

	// }}}
	// {{{ public function testSpellCheck()

	public function testSpellCheckResults()
	{
		$this->open('search?keywords=delicius');
		$this->assertNoErrors();
		$this->assertTrue(
			$this->isTextPresent('Did you mean'),
			'Spell checking suggestion text is not displayed for misspellings.'
		);
	}

	// }}}
	// {{{ public function testPostPagination()

	public function testPostPagination()
	{
		$this->open('search?keywords=test&type=post&page=2');
		$this->assertNoErrors();

		$this->assertTrue(
			$this->isTextPresent('Page 2'),
			'Page number text is not present on second page of post search '.
			'results.'
		);

		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[contains(@class, 'entry-content')]"
			),
			'No posts are displayed on second page of search results.'
		);

		$this->assertFalse(
			$this->isTextPresent('Article Search Results'),
			'Article search results are displayed on second page of post '.
			'search results.'
		);
	}

	// }}}
	// {{{ public function testArticlePagination()

	public function testArticlePagination()
	{
		$this->open('search?keywords=test&type=article&page=2');
		$this->assertNoErrors();

		$this->assertTrue(
			$this->isTextPresent('Page 2'),
			'Page number text is not present on second page of article '.
			'search results.'
		);

		$this->assertTrue(
			$this->isTextPresent('Article Search Results'),
			'Article search results title is not present on second page of '.
			'article search results.'
		);

		$this->assertFalse(
			$this->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[contains(@class, 'entry-content')]"
			),
			'Posts are displayed on second page of article search results.'
		);
	}

	// }}}
}

?>
