<?php

require_once 'TestCase.php';

class PostTestCase extends TestCase
{
	// {{{ class constants

	const COMMENT_FULLNAME = 'John Smith';
	const COMMENT_LINK     = 'http://www.example.com/';
	const COMMENT_EMAIL    = 'test@example.com';
	const COMMENT_BODYTEXT = 'This is a test comment left by Selenium.';

	// }}}
	// {{{ public function testLoad()

	public function testLoad()
	{
		$this->selenium->open('archive/2006/november/actsofvolition');
		$this->assertNoExceptions();

		// make sure the post is displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"h3[@class='entry-title']"));

		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[contains(@class, 'entry')]/".
			"div[@class='entry-content']"));

		// make sure the comments are displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[@class='entry-comments']"));

		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[@class='entry-comments']/".
			"div[@class='comment']/".
			"h4[@class='comment-title']"));

		// make sure the comment form is displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//form[@id='comment_edit_form']"));
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		$this->selenium->open('archive/2006/november/thispostdoesnotexist');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testValidateComment()

	public function testValidateComment()
	{
		$this->selenium->open('archive/2006/november/actsofvolition');
		$this->assertNoExceptions();

		// make sure the comment form is displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//form[@id='comment_edit_form']"));

		// just enter the link
		$this->selenium->type('link',     self::COMMENT_LINK);

		$this->selenium->click('post_button');
		$this->selenium->waitForPageToLoad(30000);

		$this->assertTrue($this->selenium->isTextPresent(
			'The Name field is required.'));

		$this->assertTrue($this->selenium->isTextPresent(
			'The Comment field is required.'));

		$this->assertEquals(self::COMMENT_LINK,
			$this->selenium->getValue('link'));
	}

	// }}}
	// {{{ public function testPreviewComment()

	public function testPreviewComment()
	{
		$this->selenium->open('archive/2006/november/actsofvolition');
		$this->assertNoExceptions();
		$this->enterComment();

		$this->selenium->click('preview_button');
		$this->selenium->waitForPageToLoad(30000);
		$this->assertTrue($this->selenium->isTextPresent(
			'Your comment has not yet been published.'));

		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//div[@id='comment']"));

		$this->assertEquals(self::COMMENT_FULLNAME,
			$this->selenium->getValue('fullname'));

		$this->assertEquals(self::COMMENT_LINK,
			$this->selenium->getValue('link'));

		$this->assertEquals(self::COMMENT_EMAIL,
			$this->selenium->getValue('email'));

		$this->assertEquals(self::COMMENT_BODYTEXT,
			$this->selenium->getValue('bodytext'));

		$this->assertEquals(
			self::COMMENT_BODYTEXT,
			$this->selenium->getText(
				"xpath=//div[@id='comment']/div[@class='comment-content']/p"));
	}

	// }}}
	// {{{ public function testRememberMeCookie()

	public function testRememberMeCookie()
	{
	}

	// }}}
	// {{{ public function testPostComment()

	public function testPostComment()
	{
	}

	// }}}
	// {{{ protected function enterComment()

	protected function enterComment()
	{
		// make sure the comment form is displayed
		$this->assertTrue($this->selenium->isElementPresent(
			"xpath=//form[@id='comment_edit_form']"));

		$this->selenium->type('fullname', self::COMMENT_FULLNAME);
		$this->selenium->type('link',     self::COMMENT_LINK);
		$this->selenium->type('email',    self::COMMENT_EMAIL);
		$this->selenium->type('bodytext', self::COMMENT_BODYTEXT);
	}

	// }}}
}

?>
