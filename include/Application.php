<?php

require_once 'Swat/exceptions/SwatException.php';
require_once 'Swat/SwatError.php';
require_once 'Swat/SwatForm.php';
require_once 'SwatDB/SwatDBClassMap.php';
require_once 'Site/SiteWebApplication.php';
require_once 'Site/SiteConfigModule.php';
require_once 'Site/SiteCookieModule.php';
require_once 'Site/SiteDatabaseModule.php';
require_once 'Site/SiteMultipleInstanceModule.php';
require_once 'Site/SiteTimerModule.php';
require_once 'Site/SiteMemcacheModule.php';
require_once 'Site/SiteMessagesModule.php';
require_once 'Blorg/Blorg.php';
require_once 'Blorgy.php';
require_once '../include/ThemeModule.php';

SwatDBClassMap::addPath(dirname(__FILE__).'/dataobjects');

//define('SWATDB_DEBUG', true);

/**
 * Blörgy web application
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class Application extends SiteWebApplication
{
	// {{{ protected function initModules()

	protected function initModules()
	{
		parent::initModules();

		// append instance name to base URIs
		if (substr($this->secure_base_uri, 0, 1) !== '/') {
			$this->base_uri = str_replace('/blorgy/',
				'/'.$_SERVER['SERVER_NAME'].'/', $this->base_uri);

			$this->secure_base_uri = str_replace('/blorgy/',
				'/blorgy-'.$this->instance->getInstance()->shortname.'/',
				$this->secure_base_uri);
		}

		$this->theme->set($this->config->site->theme);
	}

	// }}}
	// {{{ protected function resolvePage()

	/**
	 * Resolves page from a source string
	 *
	 * @return SitePage the appropriate page for the given source string.
	 */
	protected function resolvePage($source)
	{
		$path = $this->explodeSource($source);

		if (count($path) == 0)
			$tag = 'front';
		else
			$tag = $path[0];

		$layout  = $this->resolveLayout($tag, $source);

		switch ($tag) {
		case 'httperror':
			require_once '../include/pages/HttpErrorPage.php';
			$page = new HttpErrorPage($this, $layout);
			break;

		case 'exception':
			require_once 'pages/ExceptionPage.php';
			$page = new ExceptionPage($this, $layout);
			break;

		case 'article':
			array_shift($path);
			require_once '../include/ArticlePageFactory.php';
			$factory = new ArticlePageFactory($this);
			$factory->setDefaultArticlePage('ArticlePage');
			$page = $factory->resolvePage(implode($path, '/'), $layout);
			break;

		default:
			require_once '../include/BlorgyBlorgPageFactory.php';
			$factory = new BlorgyBlorgPageFactory($this);
			$page = $factory->resolvePage($source, $layout);
			break;
		}

		$page->setSource($source);
		return $page;
	}

	// }}}
	// {{{ protected function resolveLayout()

	/**
	 * @return SiteLayout
	 */
	protected function resolveLayout($tag, $source)
	{
		switch ($tag) {
		case 'httperror':
			require_once 'Site/layouts/SiteLayout.php';
			$layout = new SiteLayout($this,
				'../include/layouts/xhtml/http-error.php');

			break;

		case 'exception':
		default:
			require_once '../include/layouts/BlorgyLayout.php';

			$class_name    = $this->theme->getLayoutClass('BlorgyLayout');
			$template_file = $this->theme->getTemplateFile(
				'../include/layouts/xhtml/template.php');

			$layout = new $class_name($this, $template_file);

			break;
		}

		return $layout;
	}

	// }}}
	// {{{ protected function getDefaultModuleList()

	protected function getDefaultModuleList()
	{
		return array(
			'config'   => 'SiteConfigModule',
			'cookie'   => 'SiteCookieModule',
			'database' => 'SiteDatabaseModule',
			'instance' => 'SiteMultipleInstanceModule',
			'theme'    => 'ThemeModule',
			'timer'    => 'SiteTimerModule',
			'memcache' => 'SiteMemcacheModule',
		);
	}

	// }}}
	// {{{ protected function addConfigDefinitions()

	/**
	 * Adds configuration definitions to the config module of this application
	 *
	 * @param SiteConfigModule $config the config module of this application to
	 *                                  witch to add the config definitions.
	 */
	protected function addConfigDefinitions(SiteConfigModule $config)
	{
		parent::addConfigDefinitions($config);
		$config->addDefinitions(Blorg::getConfigDefinitions());
		$config->addDefinitions(Blorgy::getConfigDefinitions());
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

		SwatForm::$default_salt = $config->swat->form_salt;

		$this->database->dsn = $config->database->dsn;
		$this->setBaseUri($config->uri->base);
		$this->setSecureBaseUri($config->uri->secure_base);
		$this->default_time_zone =
			new Date_TimeZone($config->date->time_zone);

		setlocale(LC_ALL, $config->i18n->locale);

		$this->memcache->server = $config->memcache->server;
		$this->memcache->app_ns = $config->memcache->app_ns;
	}

	// }}}
}

?>
