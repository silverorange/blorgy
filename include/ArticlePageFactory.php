<?php

require_once 'Site/SiteArticlePageFactory.php';
require_once '../include/pages/ArticlePage.php';

/**
 * Instance-aware article page factory
 *
 * @package   Blörgy
 * @copyright 2008-2016 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticlePageFactory extends SiteArticlePageFactory
{
	// {{{ protected function getArticleId()

	/**
	 * Gets an article id from the given article path
	 *
	 * @param string $path
	 *
	 * @return integer the database identifier corresponding to the given
	 *                  article path or null if no such identifier exists.
	 */
	protected function getArticleId($path)
	{
		// don't try to find articles with invalid UTF-8 in the path
		if (!SwatString::validateUtf8($path)) {
			require_once('Site/exceptions/SitePathInvalidUtf8Exception.php');
			throw new SitePathInvalidUtf8Exception(
				sprintf(
					'Path is not valid UTF-8: ‘%s’',
					SwatString::escapeBinary($path)
				),
				0,
				$path
			);
		}

		// don't try to find articles with more than 254 characters in the path
		if (strlen($path) > 254) {
			require_once('Site/exceptions/SitePathTooLongException.php');
			throw new SitePathTooLongException(
				sprintf('Path is too long: ‘%s’', $path));
		}

		$instance_id = $this->app->getInstanceId();
		return SwatDB::executeStoredProcOne($this->app->db,
			'findArticle', array(
				$this->app->db->quote($path, 'text'),
				$this->app->db->quote($instance_id, 'integer'),
			));
	}

	// }}}
}

?>
