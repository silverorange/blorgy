<?php

require_once 'Swat/Swat.php';
require_once 'Swat/SwatHtmlHeadEntrySet.php';
require_once 'Swat/SwatLinkHtmlHeadEntry.php';
require_once 'Site/Site.php';
require_once 'Site/SiteViewFactory.php';
require_once 'Admin/Admin.php';

/**
 * Container for package wide static methods
 *
 * @package   Blörgy
 * @copyright 2008-2016 silverorange
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
	// {{{ private function __construct()

	/**
	 * Prevent instantiation of this static class
	 */
	private function __construct()
	{
	}

	// }}}
}

SwatDBClassMap::addPath(dirname(__FILE__).'/dataobjects');
SwatDBClassMap::add('SiteArticle', 'Article');

?>
