<?php

require_once 'FeedTestCase.php';

class AtomTestCase extends FeedTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->load('feed');
		$this->assertNoErrors();
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

		$this->assertEquals(
			'Recent Posts',
			$subtitle,
			'Atom subtitle does not equal "Recent Posts"'
		);

		$this->assertEntryElementsPresent();
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
		$this->load('feed');
		$this->assertNoErrors();
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
