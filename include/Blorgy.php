<?php

require_once 'Swat/Swat.php';
require_once 'Swat/SwatHtmlHeadEntrySet.php';
require_once 'Swat/SwatLinkHtmlHeadEntry.php';
require_once 'Site/Site.php';
require_once 'Admin/Admin.php';
require_once 'Blorg/BlorgViewFactory.php';

/**
 * Container for package wide static methods
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
abstract class Blorgy
{
	// {{{ constants

	/**
	 * The package identifier
	 */
	const PACKAGE_ID = 'Blorgy';

	// }}}
	// {{{ public static function getConfigDefinitions()

	/**
	 * Gets configuration definitions used by Blörgy
	 *
	 * Applications should add these definitions to their config module before
	 * loading the application configuration.
	 *
	 * This contains default configuration values which may be overridden in
	 * a loaded configuration file.
	 *
	 * @return array the configuration definitions used by this package.
	 *
	 * @see SiteConfigModule::addDefinitions()
	 */
	public static function getConfigDefinitions()
	{
		return array(
			// Theme to use.
			'site.theme' => 'default',
		);
	}

	// }}}
	// {{{ public static function getHtmlHeadEntrySet()

	/**
	 * Gets site-wide HTML head entries for sites using Blörg
	 *
	 * Applications may add these head entries to their layout.
	 *
	 * @return SwatHtmlHeadEntrySet the HTML head entries used by Blörg.
	 */
	public static function getHtmlHeadEntrySet(SiteApplication $app)
	{
		$set = new SwatHtmlHeadEntrySet();

		$blorg_base_href = $app->config->blorg->path;

		$recent_posts = new SwatLinkHtmlHeadEntry(
			$blorg_base_href.'atom', 'alternate',
			'application/atom+xml', Blorg::_('Recent Posts'));

		$recent_replies = new SwatLinkHtmlHeadEntry(
			$blorg_base_href.'atom/replies', 'alternate',
			'application/atom+xml', Blorg::_('Recent Replies'));

		$set->addEntry($recent_posts);
		$set->addEntry($recent_replies);

		return $set;
	}

	// }}}
	// {{{ private function __construct()

	/**
	 * Prevent instantiation of this static class
	 */
	private function __construct()
	{
	}

	// }}}
}

?>
