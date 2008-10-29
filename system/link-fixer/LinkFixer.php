<?php

require_once 'Site/SiteCommandLineApplication.php';
require_once 'Site/SiteConfigModule.php';
require_once 'Site/SiteDatabaseModule.php';

/**
 * Fixes bad links in the comments table
 *
 * Should only need to be run once.
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class LinkFixer extends SiteCommandLineApplication
{
	// {{{ public properties

	/**
	 * A convenience reference to the database object
	 *
	 * @var MDB2_Driver
	 */
	public $db;

	// }}}
	// {{{ public function run()

	public function run()
	{
		$this->initModules();
		$this->parseCommandLineArguments();

		$bad_links  = file('bad-links.txt');
		$good_links = file('good-links.txt');

		if (count($bad_links) == count($good_links)) {
			echo "BEGIN TRANSACTION;\n";
			foreach ($bad_links as $i => $bad) {
				$bad = rtrim($bad); // strip newline
				$good = rtrim($good_links[$i]); // strip newline

				printf("update BlorgComment set link = %s where link = %s;\n",
					$this->db->quote($good, 'text'),
					$this->db->quote($bad, 'text'));
			}
			echo "COMMIT TRANSACTION;\n\n";
		}
	}

	// }}}
	// {{{ protected function getDefaultModuleList()

	/**
	 * Gets the list of modules to load for this application
	 *
	 * @return array the list of modules to load for this application.
	 *
	 * @see SiteApplication::getDefaultModuleList()
	 */
	protected function getDefaultModuleList()
	{
		return array(
			'config'   => 'SiteConfigModule',
			'database' => 'SiteDatabaseModule',
		);
	}

	// }}}
	// {{{ protected function configure()

	/**
	 * Configures modules of this application before they are initialized
	 *
	 * @param SiteConfigModule $config the config module of this application to
	 *                                  use for configuration other modules.
	 */
	protected function configure(SiteConfigModule $config)
	{
		parent::configure($config);
		$this->database->dsn = $config->database->dsn;
	}

	// }}}
}

?>
