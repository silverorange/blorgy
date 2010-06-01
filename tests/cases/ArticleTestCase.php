<?php

require_once 'SeleniumTestCase.php';

class ArticleTestCase extends SeleniumTestCase
{
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->loadArticle();

		// make sure the title is displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//h2[@id='page_title']"));
	}

	// }}}
	// {{{ protected function loadArticle()

	protected function loadArticle()
	{
		$this->selenium->open('');
		$this->assertNoExceptions();

		$article_link_xpath =
			"xpath=//div[contains(@class, 'blorg-article-gadget')]/".
			"div[@class='site-gadget-content']/ul/li/div[position()=1]/a";

		// check for articles
		if (!$this->selenium->isElementPresent($article_link_xpath)) {
			$this->markTestSkipped('Test blog has no articles.');
		}

		// visit first article
		$this->selenium->click($article_link_xpath);
		$this->selenium->waitForPageToLoad(30000);
		$this->assertNoExceptions();
	}

	// }}}
}

?>
