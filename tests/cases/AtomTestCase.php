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
		$this->loadFeed($this->base_href.'feed');
		$this->assertNoExceptions();

		// get next page
		$href = $this->xpath->evaluate(
			"string(/atom:feed/atom:link[@rel='next']/@href)");

		$this->assertNotEquals('', $href);

		// load next page
		$this->loadFeed($href);
		$this->assertNoExceptions();

		// get last page
		$href = $this->xpath->evaluate(
			"string(/atom:feed/atom:link[@rel='last']/@href)");

		$this->assertNotEquals('', $href);

		// load last page
		$this->loadFeed($href);
		$this->assertNoExceptions();

		// make sure there is no next page
		$list = $this->xpath->query("/atom:feed/atom:link[@rel='next']");
		$this->assertEquals(0, $list->length);

		// get prev page
		$href = $this->xpath->evaluate(
			"string(/atom:feed/atom:link[@rel='previous']/@href)");

		$this->assertNotEquals('', $href);

		// load prev page
		$this->loadFeed($href);
		$this->assertNoExceptions();

		// get first page
		$href = $this->xpath->evaluate(
			"string(/atom:feed/atom:link[@rel='first']/@href)");

		$this->assertNotEquals('', $href);

		// load first page
		$this->loadFeed($href);
		$this->assertNoExceptions();
	}

	// }}}
	// {{{ public function testInvalidPagination()

	public function testInvalidPagination()
	{
		$this->loadFeed($this->base_href.'feed/page20000');

		// make sure there was an exception
		$list = $this->xpath->query("//html:div[@class='swat-exception']");
		$this->assertNotEquals(0, $list->length);

		// make sure response code was 404
		$this->assertEquals(404, $this->request_info['http_code']);
	}

	// }}}
}

?>
