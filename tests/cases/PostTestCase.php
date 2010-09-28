<?php

require_once 'SeleniumTestCase.php';

class PostTestCase extends SeleniumTestCase
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
		$this->loadCommentablePost();

		// make sure the post is displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"h3[@class='entry-title']"
			),
			'Entry title is not present on post page.'
		);

		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[contains(@class, 'entry')]/".
				"div[@class='entry-content']"
			),
			'Entry content is not present on post page.'
		);

		// make sure the comments are displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[@class='entry-comments']"
			),
			'Comments are not present on post page.'
		);

		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[@class='entry-comments']/".
				"div[@class='comment']/".
				"h4[@class='comment-title']"
			),
			'Comment titles are not displayed on comments on post page.'
		);

		// make sure the comment form is displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//form[@id='comment_edit_form']"
			),
			'Comment submission form is not displayed on post page.'
		);
	}

	// }}}
	// {{{ public function testNotFound()

	public function testNotFound()
	{
		// TODO: ensure the year and month are valid for this blorg
		$this->open('archive/2006/november/thispostdoesnotexist');
		$this->assertNotFound();
	}

	// }}}
	// {{{ public function testValidateComment()

	public function testValidateComment()
	{
		$this->loadCommentablePost();

		$this->assertNoExceptions();

		// make sure the comment form is displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//form[@id='comment_edit_form']"
			),
			'Comment submission form is not displayed on post page.'
		);

		// just enter the link
		$this->type('link', self::COMMENT_LINK);

		$this->click('post_button');
		$this->waitForPageToLoad(30000);

		$this->assertTrue(
			$this->isTextPresent(
				'The Name field is required.'
			),
			'Comment "fullname" field validation text is not present.'
		);

		$this->assertTrue(
			$this->isTextPresent(
				'The Comment field is required.'
			),
			'Comment "bodytext" field validation text is not present.'
		);

		$this->assertEquals(
			self::COMMENT_LINK,
			$this->getValue('link'),
			'Link value is not preserved when comment form is submitted.'
		);
	}

	// }}}
	// {{{ public function testPreviewComment()

	public function testPreviewComment()
	{
		$this->loadCommentablePost();

		$this->enterComment();

		$this->click('preview_button');
		$this->waitForPageToLoad(30000);
		$this->assertTrue(
			$this->isTextPresent(
				'Your comment has not yet been published.'
			),
			'Preview notice is not displayed when previewing comment.'
		);

		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[@id='comment']"
			),
			'Comment preview is not displayed with previewing comment.'
		);

		$this->assertEquals(
			self::COMMENT_FULLNAME,
			$this->getValue('fullname'),
			'Comment "fullname" value is not preserved when previewing.'
		);

		$this->assertEquals(
			self::COMMENT_LINK,
			$this->getValue('link'),
			'Comment "link" value is not preserved when previewing.'
		);

		$this->assertEquals(
			self::COMMENT_EMAIL,
			$this->getValue('email'),
			'Comment "email" value is not preserved when previewing.'
		);

		$this->assertEquals(
			self::COMMENT_BODYTEXT,
			$this->getValue('bodytext'),
			'Comment "bodytext" value is not preserved when previewing.'
		);

		$this->assertEquals(
			self::COMMENT_BODYTEXT,
			$this->getText(
				"xpath=//div[@id='comment']/div[@class='comment-content']/p"
			),
			'Preview comment bodytext is not the same as submitted bodytext.'
		);
	}

	// }}}
	// {{{ public function testRememberMeCookie()

	public function testRememberMeCookie()
	{
		$this->loadCommentablePost();

		$this->assertNotContains(
			$this->config->getInstance().'_comment_credentials=',
			$this->getCookie(),
			'Comment credentials cookie contains data when it should not.'
		);

		$this->enterComment();

		$this->check('remember_me');
		$this->click('post_button');
		$this->waitForPageToLoad(30000);

		$this->assertContains(
			$this->config->getInstance().'_comment_credentials=',
			$this->getCookie(),
			'Comment credentials cookie does not save properly.'
		);
	}

	// }}}
	// {{{ public function testPostComment()

	public function testPostComment()
	{
		$this->loadCommentablePost();

		$this->enterComment();

		// don't remember credentials
		$this->uncheck('remember_me');

		$this->click('post_button');
		$this->waitForPageToLoad(30000);
		$this->assertTrue(
			$this->isTextPresent(
				'Your comment has been published.'
			),
			'Comment publication message is not displayed.'
		);

		// make sure form was cleared
		$this->assertEquals(
			'',
			$this->getValue('fullname'),
			'Comment "fullname" field is not cleared.'
		);

		$this->assertEquals(
			'',
			$this->getValue('link'),
			'Comment "link" field is not cleared.'
		);

		$this->assertEquals(
			'',
			$this->getValue('email'),
			'Comment "email" field is not cleared.'
		);

		$this->assertEquals(
			'',
			$this->getValue('bodytext'),
			'Comment "bodytext" field is not cleared.'
		);

		// get new comment id
		$location = $this->getLocation();
		$location_exp = explode('#', $location);
		$comment_id = end($location_exp);

		// make sure new comment exists
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[@id='{$comment_id}']"
			),
			'New comment is not displayed with post.'
		);

		// make sure new comment bodytext displayed
		$this->assertEquals(
			self::COMMENT_BODYTEXT,
			$this->getText(
				"xpath=//div[@id='{$comment_id}']/".
				"div[@class='comment-content']/p"
			),
			'New comment bodytext is not equal to submitted bodytext.'
		);
	}

	// }}}
	// {{{ public function testExtendedBodytext()

	public function testExtendedBodytext()
	{
		$this->loadExtendedPost();

		// make sure extended bodytext is displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//div[contains(@class, 'entry-content-extended')]"
			),
			'Extended bodytext is not displayed on post page.'
		);
	}

	// }}}
	// {{{ protected function enterComment()

	protected function enterComment()
	{
		// make sure the comment form is displayed
		$this->assertTrue(
			$this->isElementPresent(
				"xpath=//form[@id='comment_edit_form']"
			),
			'Comment submission form is not displayed on post page.'
		);

		$this->type('fullname', self::COMMENT_FULLNAME);
		$this->type('link',     self::COMMENT_LINK);
		$this->type('email',    self::COMMENT_EMAIL);
		$this->type('bodytext', self::COMMENT_BODYTEXT);
	}

	// }}}
	// {{{ protected function loadCommentablePost()

	protected function loadCommentablePost()
	{
		$this->open('');
		$this->assertNoExceptions();

		$comment_link_xpath =
			"xpath=//div[contains(@class, 'entry')]/".
			"div[@class='entry-subtitle']/".
			"a[@class='comment-count' and ".
				"contains(text(), 'leave a comment') = false]";

		// page through posts until we find a commentable post
		while (!$this->isElementPresent($comment_link_xpath)) {
			$this->click(
				"xpath=//div[@class='swat-pagination']/a[last()]"
			);

			$this->waitForPageToLoad(30000);
			$this->assertNoExceptions();
		}

		$element = $this->click($comment_link_xpath);
		$this->waitForPageToLoad(30000);
		$this->assertNoExceptions();
	}

	// }}}
	// {{{ protected function loadExtendedPost()

	protected function loadExtendedPost()
	{
		$this->open('');
		$this->assertNoExceptions();

		$extended_link_xpath =
			"xpath=//div[contains(@class, 'entry')]/".
			"div[@class='entry-read-more']/a";

		// page through posts until we find a commentable post
		while (!$this->isElementPresent($extended_link_xpath)) {
			$this->click(
				"xpath=//div[@class='swat-pagination']/a[last()]"
			);

			$this->waitForPageToLoad(30000);
			$this->assertNoExceptions();
		}

		$element = $this->click($extended_link_xpath);
		$this->waitForPageToLoad(30000);
		$this->assertNoExceptions();
	}

	// }}}
}

?>
