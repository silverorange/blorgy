<?php

require_once 'FeedTestCase.php';

class TagAtomTestCase extends FeedTestCase
{
	// {{{ class constants

	const MAX_POSTS = 20;

	// }}}
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadTagFeed();
		$this->assertNoErrors();
		$this->assertFeedElementsPresent();

		// also check for alternative link
		$list = $this->xpath->query("/atom:feed/atom:link[@rel='alternate']");
		$this->assertEquals(
			1,
			$list->length,
			'Number of alternative links in tag atom feed is not 1.'
		);

		// make sure subtitle is correct
		$subtitle = $this->xpath->evaluate(
			"string(/atom:feed/atom:subtitle/text())"
		);

		$this->assertContains(
			'Posts Tagged:',
			$subtitle,
			'Tag atom subtitle does not contain the string "Posts Tagged:".'
		);

		$this->assertEntryElementsPresent();
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->loadPagedTagFeed();
		$this->assertNoErrors();
		$this->assertPaginationWorks();
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->loadPagedTagFeed();
		$this->assertNoErrors();

		$this->load($this->location.'/page20000');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testInvalidTag()

	public function testInvalidTag()
	{
		$this->load('tag/thistagtotallydoesnotexist/feed');
		$this->assertNotFound();
	}

	// }}}
	// {{{ protected function loadTagFeed()

	protected function loadTagFeed()
	{
		$this->load('tag');
		$this->assertNoErrors();

		// find tag page links
		$list = $this->xpath->query(
			"//html:ul[@class='blorg-archive-tags']/html:li/".
			"html:h4[@class='blorg-archive-tag-title']/html:a/@href"
		);

		$href = null;

		if ($list->length > 0) {
			$href = $list->item(0)->nodeValue;
		}

		if ($href === null) {
			$this->markTestSkipped(
				'No tags feeds are available for this instance.'
			);
		}

		// load tag feed
		$this->load($href.'/feed');
	}

	// }}}
	// {{{ protected function loadPagedTagFeed()

	protected function loadPagedTagFeed()
	{
		$this->load('tag');
		$this->assertNoErrors();

		$list = $this->xpath->query(
			"//html:ul[@class='blorg-archive-tags']/html:li/".
			"html:h4[@class='blorg-archive-tag-title']"
		);

		$href = null;

		foreach ($list as $node) {
			$text = $node->textContent;
			$matches = array();
			if (preg_match('/\(([0-9]+) posts?\)$/', $text, $matches) === 1) {
				if (intval($matches[1]) > self::MAX_POSTS) {
					$href = $this->xpath->evaluate(
						"string(html:a/@href)",
						$node
					);

					break;
				}
			}
		}

		if ($href === null) {
			$this->markTestSkipped(
				'No paged tag feeds are available for this instance.'
			);
		}

		// load paged tag feed
		$this->load($href.'/feed');
	}

	// }}}
}

?>
