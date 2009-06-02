<?php

require_once 'FeedTestCase.php';

class CommentsAtomTestCase extends FeedTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->load('feed/comments');
		$this->assertNoExceptions();
		$this->assertFeedElementsPresent();

		// make sure subtitle is correct
		$subtitle = $this->xpath->evaluate(
			"string(/atom:feed/atom:subtitle/text())"
		);

		$this->assertEquals(
			'Recent Comments',
			$subtitle,
			'Comments Atom feed subtitle is not "Recent Comments".'
		);

		$this->assertEntryElementsPresent();
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->load('feed/comments');
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
}

?>
