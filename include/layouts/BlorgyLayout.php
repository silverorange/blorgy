<?php

require_once 'Swat/SwatNavBar.php';
require_once 'Swat/SwatHtmlTag.php';
require_once 'Swat/SwatStyleSheetHtmlHeadEntry.php';
require_once 'Site/layouts/SiteLayout.php';
require_once 'Site/SiteSidebar.php';
require_once 'Site/SiteGadgetFactory.php';
require_once 'Site/dataobjects/SiteGadgetInstanceWrapper.php';
require_once 'Blorg/dataobjects/BlorgFileImage.php';

/**
 * @package   Blörgy
 * @copyright 2008-2010 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class BlorgyLayout extends SiteLayout
{
	// {{{ public properties

	/**
	 * Page navigation bar
	 *
	 * @var SwatNavBar
	 */
	public $navbar;

	// }}}
	// {{{ protected properties

	/**
	 * @var SiteSidebar
	 */
	protected $sidebar;

	// }}}

	// init phase
	// {{{ public function init()

	public function init()
	{
		parent::init();
		$this->data->meta = '';
		$this->initNavBar();
		$this->initSideBar();
	}

	// }}}
	// {{{ protected function initNavBar()

	protected function initNavBar()
	{
		$this->navbar = new SwatNavBar();
		$this->navbar->link_last_entry = false;
		$this->navbar->separator = ' › ';
		$this->navbar->id = 'nav_bar';
		$this->navbar->createEntry(Blorg::_('Home'), '.');
	}

	// }}}
	// {{{ protected function initSideBar()

	protected function initSideBar()
	{
		$this->sidebar = new SiteSidebar();

		$gadget_instances = false;

		if (isset($this->app->memcache)) {
			$gadget_instances = $this->app->memcache->get('gadget_instances');
		}

		if ($gadget_instances === false) {
			$sql = sprintf('select * from GadgetInstance
				where instance %s %s
				order by displayorder',
				SwatDB::equalityOperator($this->app->getInstanceId()),
				$this->app->db->quote($this->app->getInstanceId(), 'integer'));

			$gadget_instances = SwatDB::query($this->app->db, $sql,
				SwatDBClassMap::get('SiteGadgetInstanceWrapper'));

			$gadget_instances->loadAllSubRecordsets('setting_values',
				SwatDBClassMap::get('SiteGadgetInstanceSettingValueWrapper'),
				'GadgetInstanceSettingValue', 'gadget_instance');

			if (isset($this->app->memcache)) {
				$this->app->memcache->set('gadget_instances',
					$gadget_instances);
			}
		} else {
			$gadget_instances->setDatabase($this->app->db);
		}

		foreach ($gadget_instances as $gadget_instance) {
			$gadget = SiteGadgetFactory::get($this->app, $gadget_instance);
			$this->sidebar->add($gadget);
		}

		$this->sidebar->init();
	}

	// }}}

	// process phase
	// {{{ public function process()

	public function process()
	{
		parent::process();
		$this->processSideBar();
	}

	// }}}
	// {{{ protected function processSideBar()

	protected function processSideBar()
	{
		$this->sidebar->process();
	}

	// }}}

	// build phase
	// {{{ public function build()

	public function build()
	{
		parent::build();

		$this->startCapture('analytics');
		$this->displayGoogleAnalytics();
		$this->endCapture();

		$this->startCapture('tagline');
		$this->displayTagLine();
		$this->endCapture();
	}

	// }}}
	// {{{ protected function displayGoogleAnalytics()

	protected function displayGoogleAnalytics()
	{
		$js = $this->app->analytics->getGoogleAnalyticsInlineJavascript();
		if ($js != null) {
			Swat::displayInlineJavaScript($js);
		}
	}

	// }}}
	// {{{ protected function displayTagLine()

	protected function displayTagLine()
	{
		$tagline = $this->app->config->site->tagline;
		if ($tagline != '') {
			$tagline_div = new SwatHtmlTag('div');
			$tagline_div->class = 'tagline';
			$tagline_div->setContent($tagline);
			$tagline_div->display();
		}
	}

	// }}}

	// finalize phase
	// {{{ public function finalize()

	public function finalize()
	{
		parent::finalize();

		$this->addHtmlHeadEntrySet(Blorg::getHtmlHeadEntrySet($this->app));

		$this->finalizeNavBar();
		$this->finalizeSideBar();
		$this->finalizeTitle();
		$this->finalizeBaseCss();
		$this->finalizeTheme();
	}

	// }}}
	// {{{ protected function finalizeBaseCss()

	protected function finalizeBaseCss()
	{
		$yui = new SwatYUI(array('reset', 'fonts', 'base'));
		$this->addHtmlHeadEntrySet($yui->getHtmlHeadEntrySet());

		$this->addHtmlHeadEntry(new SwatStyleSheetHtmlHeadEntry(
			'styles/base.css'));
	}

	// }}}
	// {{{ protected function finalizeNavBar()

	protected function finalizeNavBar()
	{
		if ($this->navbar->getCount() > 1) {
			$this->startCapture('navbar');
			$this->navbar->display();
			$this->endCapture();
			$this->addHtmlHeadEntrySet($this->navbar->getHtmlHeadEntrySet());
		} else {
			$this->data->navbar = '';
		}
	}

	// }}}
	// {{{ protected function finalizeSideBar()

	protected function finalizeSideBar()
	{
		$this->startCapture('sidebar');
		$this->sidebar->display();
		$this->endCapture();

		$this->addHtmlHeadEntrySet($this->sidebar->getHtmlHeadEntrySet());
	}

	// }}}
	// {{{ protected function finalizeTitle()

	protected function finalizeTitle()
	{
		$this->finalizeHtmlTitle();
		$this->finalizeHeaderTitle();
		$this->finalizePageTitle();
	}

	// }}}
	// {{{ protected function finalizePageTitle()

	/**
	 * Finalizes the page title
	 */
	protected function finalizePageTitle()
	{
		$page_title = $this->data->title;

		if ($page_title != '') {
			$header_tag = new SwatHtmlTag('h2');
			$header_tag->id = 'page_title';
			$header_tag->setContent($page_title, true);
			$this->data->title = $header_tag->__toString();
		}
	}

	// }}}
	// {{{ protected function finalizeHtmlTitle()

	/**
	 * Finalizes the page title displayed in the HTML head
	 */
	protected function finalizeHtmlTitle()
	{
		$site_title = $this->app->config->site->title;
		$page_title = SwatString::stripXHTMLTags($this->data->title);

		if ($page_title != '') {
			$this->data->html_title = sprintf('%s - %s',
				SwatString::minimizeEntities($page_title),
				SwatString::minimizeEntities($site_title));
		} elseif ($this->data->html_title != '') {
			$this->data->html_title.= sprintf(' - %s',
				SwatString::minimizeEntities($site_title));
		} else {
			$this->data->html_title =
				SwatString::minimizeEntities($site_title);
		}
	}

	// }}}
	// {{{ protected function finalizeHeaderTitle()

	/**
	 * Finalizes the title displayed in the page header
	 */
	protected function finalizeHeaderTitle()
	{
		$this->startCapture('header_title');
		$this->displayHeaderTitle();
		$this->endCapture();
	}

	// }}}
	// {{{ protected function finalizeTheme()

	protected function finalizeTheme()
	{
		$css_file = $this->app->theme->getCssFile();
		if ($css_file !== null) {
			$this->addHtmlHeadEntry(new SwatStyleSheetHtmlHeadEntry(
				$css_file));
		}

		$favicon_file = $this->app->theme->getFaviconFile();
		if ($favicon_file !== null) {
			$this->addHtmlHeadEntry(new SwatLinkHtmlHeadEntry(
				$favicon_file, 'shortcut icon', 'image/x-icon'));
		}
	}

	// }}}
	// {{{ protected function displayHeaderTitle()

	protected function displayHeaderTitle()
	{
		if ($this->app->config->blorg->header_image === null)
			$this->displayHeaderTitleText();
		else
			$this->displayHeaderTitleImage();
	}

	// }}}
	// {{{ protected function displayHeaderTitleImage()

	protected function displayHeaderTitleImage()
	{
		$source = $this->app->getPage()->getSource();
		$site_title = $this->app->config->site->title;

		$h1_tag = new SwatHtmlTag('h1');

		if ($site_title != '') {
			$h1_tag->title = $site_title;
		}

		$h1_tag->open();

		if ($source != '') {
			$a_tag = new SwatHtmlTag('a');
			$a_tag->accesskey = '1';
			$a_tag->href = '.';
			$a_tag->open();
		}

		$class = SwatDBClassMap::get('BlorgFile');
		$blorg_file = new $class();
		$blorg_file->setDatabase($this->app->db);
		$blorg_file->load(intval($this->app->config->blorg->header_image));

		$img_tag = new SwatHtmlTag('img');
		$img_tag->src = $blorg_file->getRelativeUri();
		$img_tag->alt = $site_title;
		$img_tag->class = 'header-image clearfix';
		$img_tag->display();

		if ($source != '') {
			$a_tag->close();
		}

		$h1_tag->close();
	}

	// }}}
	// {{{ protected function displayHeaderTitleText()

	protected function displayHeaderTitleText()
	{
		$source = $this->app->getPage()->getSource();
		$site_title = $this->app->config->site->title;

		$h1_tag = new SwatHtmlTag('h1');
		$h1_tag->title = $site_title;
		$h1_tag->open();

		echo '<span>';

		if ($source == '') {
			echo SwatString::minimizeEntities($site_title);
		} else {
			$a_tag = new SwatHtmlTag('a');
			$a_tag->accesskey = '1';
			$a_tag->href = '.';
			$a_tag->setContent($site_title);
			$a_tag->display();
		}

		echo '</span>';

		$h1_tag->close();
	}

	// }}}
}

?>
