<?php

require_once 'Site/SiteArticlePageFactory.php';

/**
 * Instance-aware article page factory
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class ArticlePageFactory extends SiteArticlePageFactory
{
	// {{{ protected function findArticle()

	/**
	 * Gets an article id from the given article path
	 *
	 * @param SiteWebApplication $app
	 * @param string $path
	 *
	 * @return integer the database identifier corresponding to the given
	 *                  article path or null if no such identifier exists.
	 */
	protected function findArticle(SiteWebApplication $app, $path)
	{
		if (!SwatString::validateUtf8($path))
			throw new SiteException(
				sprintf('Path is not valid UTF-8: ‘%s’', $path));

		// trim at 254 to prevent database errors
		$path = substr($path, 0, 254);
		$instance_id = $app->getInstanceId();
		$sql = sprintf('select findArticle(%s, %s)',
			$app->db->quote($path, 'text'),
			$app->db->quote($instance_id, 'integer'));

		$article_id = SwatDB::queryOne($app->db, $sql);
		return $article_id;
	}

	// }}}
}

?>
