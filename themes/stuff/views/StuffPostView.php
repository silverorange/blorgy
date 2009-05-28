<?php

require_once 'Blorg/views/BlorgPostView.php';

/**
 * Custom post view for the silverorange Stuff website
 *
 * This view displays the first image file of the post in a special div before
 * the post body.
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class StuffPostView extends BlorgPostView
{
	// general display methods
	// {{{ protected function displayHeader()

	/**
	 * Displays the title and meta information for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displayHeader(BlorgPost $post)
	{
		if ($this->isHeaderVisible($post)) {
			$this->displayTitle($post);
			$this->displaySubHeader($post);
			$this->displayImage($post);
		}
	}

	// }}}
	// {{{ protected function displaySubHeader()

	/**
	 * Displays the title and meta information for a weblog post
	 *
	 * @param BlorgPost $post
	 */
	protected function displaySubHeader(BlorgPost $post)
	{
		if ($this->getMode('bodytext') > SiteView::MODE_NONE &&
			$this->getImage($post) !== null) {
			$author = '';
		} else {
			ob_start();
			$this->displayAuthor($post);
			$author = ob_get_clean();
		}

		ob_start();
		$this->displayPermalink($post);
		$permalink = ob_get_clean();

		ob_start();
		$this->displayCommentCount($post);
		$comment_count = ob_get_clean();

		echo '<div class="entry-subtitle">';

		/*
		 * Comment count is shown if and only if comment_count element is shown
		 * AND the following:
		 * - comments are locked AND there is one or more visible comment OR
		 * - comments are open OR
		 * - comments are moderated.
		 */
		$show_comment_count =
			($comment_count != '' &&
				(($post->comment_status == BlorgPost::COMMENT_STATUS_LOCKED &&
					count($post->getVisibleComments()) > 0) ||
				$post->comment_status == BlorgPost::COMMENT_STATUS_OPEN ||
				$post->comment_status == BlorgPost::COMMENT_STATUS_MODERATED));

		if ($author != '') {
			if ($show_comment_count) {
				printf(Blorg::_('Posted by %s on %s - %s'),
					$author, $permalink, $comment_count);
			} else {
				printf(Blorg::_('Posted by %s on %s'), $author, $permalink);
			}
		} else {
			if ($show_comment_count) {
				printf('%s - %s', $permalink, $comment_count);
			} else {
				echo $permalink;
			}
		}

		echo '</div>';
	}

	// }}}
	// {{{ protected function displayImage()

	protected function displayImage(BlorgPost $post)
	{
		// borrow display mode from bodytext part
		if ($this->getMode('bodytext') > SiteView::MODE_NONE) {

			$image = $this->getImage($post);

			if ($image !== null) {
				// borrow link mode from title part
				$link = $this->getLink('title');
				echo '<div class="entry-image">';


				if ($link !== false) {
					$a_tag = new SwatHtmlTag('a');
					if (is_string($link)) {
						$a_tag->href = $link;
					} else {
						$a_tag->href = $this->getRelativeUri($post);
					}
					$a_tag->title = $post->getTitle();
					$a_tag->open();
				}

				$img_tag = $image->getImgTag('thumb');
				if ($image->description !== null) {
					$img_tag->title = $image->description;
				}
				$img_tag->display();

				if ($link !== false) {
					$a_tag->close();
				}

				ob_start();
				$this->displayAuthor($post);
				$author = ob_get_clean();

				if ($author != '') {
					echo '<span>';
					printf(Blorg::_('Review by %s'), $author);
					echo '</span>';
				}

				echo '</div>';
			}
		}
	}

	// }}}

	// helper methods
	// {{{ protected function getImage()

	protected function getImage(BlorgPost $post)
	{
		$files = $post->files;
		$image = null;

		// get first image from the post
		foreach ($files as $file) {
			if ($file->image !== null) {
				$image = $file->image;
			}
		}

		return $image;
	}

	// }}}
}

?>
