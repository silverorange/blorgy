<?php

require_once 'FeedTestCase.php';

class PostAtomTestCase extends FeedTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadCommentsFeed();
		$this->assertNoExceptions();
		$this->assertFeedElementsPresent();

		// also check for alternative link
		$list = $this->xpath->query("/atom:feed/atom:link[@rel='alternate']");
		$this->assertEquals(
			1,
			$list->length,
			'Number of alternative links in atom feed is not 1.'
		);

		// make sure subtitle is correct
		$subtitle = $this->xpath->evaluate(
			"string(/atom:feed/atom:subtitle/text())"
		);

		$this->assertContains(
			'Comments on ',
			$subtitle,
			'Post atom subtitle does not contain the string "Comments on ".'
		);

		// check for post author
		$list = $this->xpath->query("/atom:feed/atom:author/atom:name");
		$this->assertEquals(
			1,
			$list->length,
			'Post atom feed does not contain exactly 1 author.'
		);

		$this->assertEntryElementsPresent();
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		$this->load('archive/2008/january/thispostdoesnotexist/feed');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->loadCommentsFeed(50);
		$this->assertNoExceptions();
		$this->assertPaginationWorks();
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->load('feed/comments/page200000');
		$this->assertNotFound();
	}

	// }}}
	// {{{ protected function loadCommentsFeed()

	protected function loadCommentsFeed($min_comments = 0)
	{
		$href       = null;
		$more_pages = true;
		$page       = 1;

		// page through posts until we find a post with comments
		while ($more_pages) {
			$this->loadHtml('page'.$page);
			$this->assertNoExceptions();

			$comment_links = $this->xpath->query(
				"//html:div[contains(@class, 'entry')]/".
				"html:div[@class='entry-subtitle']/".
				"html:a[@class='comment-count' and ".
				"contains(text(), 'leave a comment') = false]"
			);

			foreach ($comment_links as $node) {
				$matches = array();
				$exp = '/^([0-9]+) comments$/';
				if (preg_match($exp, $node->nodeValue, $matches) === 1) {
					if ($matches[1] > $min_comments) {
						$href = $node->getAttribute('href');
						if (($pos = strpos($href, '#')) !== false) {
							$href = substr($href, 0, $pos);
						}
						break 2;
					}
				}
			}

			$next_link = $this->xpath->query(
				"//html:div[@class='swat-pagination']/".
				"html:a[contains(text(), 'Older')]/@href"
			);

			$more_pages = ($next_link->length > 0);
			$page++;
		}

		if ($href === null) {
			$this->markTestSkipped(
				'No posts with at least '.$min_comments.' comments are '.
				'available for this instance.'
			);
		}

		// load post comments feed
		$this->load($href.'/feed');
	}

	// }}}
}

?>
