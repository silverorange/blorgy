<?php

require_once 'FeedTestCase.php';

class AtomTestCase extends FeedTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->load('feed');
		$this->assertNoExceptions();
		$this->assertFeedElementsPresent();

		// also check for alternative link
		$list = $this->xpath->query("/atom:feed/atom:link[@rel='alternate']");
		$this->assertEquals(1, $list->length);

		// make sure subtitle is correct
		$subtitle = $this->xpath->evaluate(
			"string(/atom:feed/atom:subtitle/text())");

		$this->assertEquals('Recent Posts', $subtitle);

		$this->assertEntryElementsPresent();
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->load('feed');
		$this->assertNoExceptions();
		$this->assertPaginationWorks();
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->load('feed/page20000');
		$this->assertNotFound();
	}

	// }}}
}

?>
