<?php

require_once 'SeleniumTestCase.php';

class YearArchiveTestCase extends SeleniumTestCase
{
	// {{{ class constants

	const MAX_POSTS = 50;

	// }}}
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->open('archive/2008');
		$this->assertNoExceptions();

		// make sure there are months displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-months']"
			),
			'Month list is not present on year archive page.'
		);

		// make sure there are posts displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-months']/li/".
				"ul[@class='entries']/li/".
				"div[contains(@class, 'entry')]"
			),
			'Posts are not displayed on year archive page.'
		);
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->loadPagedYear();

		$year = $this->getText("xpath=//*[@id='page_title']");

		// make sure footer summary is correct
		$end = self::MAX_POSTS;
		$text  = sprintf('posts in %s, displaying 1 to %s', $year, $end);
		$this->assertTrue(
			$this->isTextPresent($text),
			'Footer text is not present on first page of paginated year '.
			'archive page.'
		);

		// open second page
		$location = $this->getLocation();
		$this->open($location.'/page2');

		// make sure footer summary is correct
		$start = self::MAX_POSTS + 1;
		$text  = sprintf('posts in %s, displaying %s to', $year, $start);
		$this->assertTrue(
			$this->isTextPresent($text),
			'Footer text is not present on second page of paginated year '.
			'archive page.'
		);

		// make sure there are months displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-months']"
			),
			'Months list is not present on second page of paginated year '.
			'archive page.'
		);

		// make sure there are posts displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//ul[@class='blorg-archive-months']/li/".
				"ul[@class='entries']/li/".
				"div[contains(@class, 'entry')]"
			),
			'Posts are not displayed on second page of paginated year '.
			'archive page.'
		);
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->loadPagedYear();

		$location = $this->getLocation();

		$this->open($location.'/page20000');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		$this->open('archive/1900');
		$this->assertNotFound();
	}

	// }}}
	// {{{ protected function loadPagedYear()

	protected function loadPagedYear()
	{
		$this->addPagedYearLocator();

		$this->open('archive');
		$this->assertNoExceptions();

		$this->click('pagedyear='.self::MAX_POSTS);

		$this->waitForPageToLoad(30000);
		$this->assertNoExceptions();
	}

	// }}}
	// {{{ protected function addPagedYearLocator()

	/**
	 * Adds a location strategy the selects year links where the number of
	 * posts is greater than the specified value. This is used to select
	 * year pages that will be paginated.
	 *
	 * Example use: <code>pagedyear=50</code> will select the first year page
	 * link where the number of posts is greater than 50.
	 */
	protected function addPagedYearLocator()
	{
		$function = <<<JAVASCRIPT
	var iterator = inDocument.evaluate(
		"//ul[@class='blorg-archive-years']/li/" +
		"h4[@class='blorg-archive-year-title']",
		inDocument, null, XPathResult.ORDERED_NODE_SNAPSHOT,
		null);

	var node = iterator.iterateNext()
	var foundNode = null

	while (node) {
		var text = node.textContent;
		var matches = /\(([0-9]+) posts?\)$/.exec(text);
		if (matches.length > 0) {
			if (parseInt(matches[1]) > parseInt(locator)) {
				foundNode = inDocument.evaluate('a', node, null,
					XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;

				break;
			}
		}
		node = iterator.iterateNext();
	}

	return foundNode;
JAVASCRIPT;

		$this->addLocationStrategy('pagedyear', $function);
	}

	// }}}
}

?>
