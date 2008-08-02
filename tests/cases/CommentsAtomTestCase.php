<?php

require_once 'FeedTestCase.php';

class CommentsAtomTestCase extends FeedTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadFeed($this->base_href.'feed/comments');
		$this->assertNoExceptions();
		$this->assertFeedElementsPresent();

		// make sure subtitle is correct
		$subtitle = $this->xpath->evaluate(
			"string(/atom:feed/atom:subtitle/text())");

		$this->assertEquals('Recent Comments', $subtitle);

		$this->assertEntryElementsPresent();
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->loadFeed($this->base_href.'feed/comments');
		$this->assertNoExceptions();
		$this->assertPaginationWorks();
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->loadFeed($this->base_href.'feed/comments/page20000');

		// make sure there was an exception
		$list = $this->xpath->query("//html:div[@class='swat-exception']");
		$this->assertNotEquals(0, $list->length);

		// make sure response code was 404
		$this->assertEquals(404, $this->request_info['http_code']);
	}

	// }}}
}

?>
