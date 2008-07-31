<?php

require_once 'SeleniumTestCase.php';

class TagTestCase extends SeleniumTestCase
{
	// {{{ class constants

	const MAX_POSTS = 10;

	// }}}
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadPagedTag();

		$this->assertHasPosts();

		// make sure footer summary is there
		$text = sprintf('posts, displaying 1 to %s', self::MAX_POSTS);
		$this->assertTrue($this->selenium->isTextPresent($text));
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->loadPagedTag();

		$location = $this->selenium->getLocation();

		$this->selenium->open($location.'/page2');
		$this->assertNoExceptions();
		$this->assertHasPosts();

		// make sure footer summary is correct
		$start = self::MAX_POSTS + 1;
		$end   = self::MAX_POSTS * 2;
		$text  = sprintf('posts, displaying %s to %s', $start, $end);
		$this->assertTrue($this->selenium->isTextPresent($text));
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->loadPagedTag();

		$location = $this->selenium->getLocation();

		$this->selenium->open($location.'/page20000');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testInvalidTag()

	public function testInvalidTag()
	{
		$this->selenium->open('tag/thistagtotallydoesnotexist');
		$this->assertNotFound();
	}

	// }}}
	// {{{ protected function loadPagedTag()

	protected function loadPagedTag()
	{
		$this->addPagedTagLocator();

		$this->selenium->open('tag');
		$this->assertNoExceptions();

		$this->selenium->click('pagedtag='.self::MAX_POSTS);

		$this->selenium->waitForPageToLoad(30000);
		$this->assertNoExceptions();
	}

	// }}}
	// {{{ protected function addPagedTagLocator()

	/**
	 * Adds a location strategy the selects tag links where the number of
	 * posts is greater than the specified value. This is used to select
	 * tag pages that will be paginated.
	 *
	 * Example use: <code>pagedtag=50</code< will select the first tag page
	 * link where the number of posts is greater than 50.
	 */
	protected function addPagedTagLocator()
	{
		$function = <<<JAVASCRIPT
	var iterator = inDocument.evaluate(
		"//ul[@class='blorg-archive-tags']/li/" +
		"h4[@class='blorg-archive-tag-title']",
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

		$this->selenium->addLocationStrategy('pagedtag', $function);
	}

	// }}}
}

?>
