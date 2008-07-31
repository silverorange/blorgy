<?php

require_once 'FeedTestCase.php';

class AtomTestCase extends FeedTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadFeed($this->base_href.'feed');

		// make sure there are no exceptions
		$list= $this->xpath->query("//html:div[@class='swat-exception']");
		$this->assertEquals(0, $list->length);

		// make sure the main feed elements are present
		$list= $this->xpath->query("/atom:feed/atom:generator");
		$this->assertEquals(1, $list->length);

		$list = $this->xpath->query("/atom:feed/atom:id");
		$this->assertEquals(1, $list->length);

		$list = $this->xpath->query("/atom:feed/atom:link[@rel='self']");
		$this->assertEquals(1, $list->length);

		$list = $this->xpath->query("/atom:feed/atom:link[@rel='alternate']");
		$this->assertEquals(1, $list->length);

		$list = $this->xpath->query("/atom:feed/atom:subtitle");
		$this->assertEquals(1, $list->length);

		$list = $this->xpath->query("/atom:feed/atom:title");
		$this->assertEquals(1, $list->length);

		$list = $this->xpath->query("/atom:feed/atom:updated");
		$this->assertEquals(1, $list->length);
	}

	// }}}
	// {{{ public function testPagination()

	public function testPagination()
	{
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
	}

	// }}}
}

?>
