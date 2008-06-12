<?php

require_once 'Swat/SwatNavBar.php';
require_once 'Swat/SwatHtmlTag.php';
require_once 'Swat/SwatStyleSheetHtmlHeadEntry.php';
require_once 'Site/layouts/SiteLayout.php';
require_once 'Blorg/BlorgSidebar.php';
require_once 'Blorg/BlorgGadgetFactory.php';
require_once 'Blorg/dataobjects/BlorgGadgetInstanceWrapper.php';

/**
 * @package   Blörgy
 * @copyright 2008 silverorange
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
	 * @var BlorgSidebar
	 */
	protected $sidebar;

	// }}}

	// init phase
	// {{{ public function init()

	public function init()
	{
		parent::init();
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
		$this->sidebar = new BlorgSidebar();

		$sql = sprintf('select * from BlorgGadgetInstance
			where instance %s %s
			order by displayorder',
			SwatDB::equalityOperator($this->app->getInstanceId()),
			$this->app->db->quote($this->app->getInstanceId(), 'integer'));

		$gadget_instances = SwatDB::query($this->app->db, $sql,
			SwatDBClassMap::get('BlorgGadgetInstanceWrapper'));

		foreach ($gadget_instances as $gadget_instance) {
			$gadget = BlorgGadgetFactory::get($this->app, $gadget_instance);
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

		$this->startCapture('google_analytics');
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
		$google_account = $this->app->config->analytics->google_account;

		if ($google_account !== null) {
			$src = ($this->app->isSecure()) ?
				'https://ssl.google-analytics.com/urchin.js' :
				'http://www.google-analytics.com/urchin.js';

			$script_tag = new SwatHtmlTag('script');
			$script_tag->type = 'text/javascript';
			$script_tag->src = $src;
			$script_tag->setContent('');
			$script_tag->display();

			$javascript = sprintf(
				"_uacct = '%s';\n".
				"urchinTracker();",
				$google_account);

			Swat::displayInlineJavaScript($javascript);
		}
	}

	// }}}
	// {{{ protected function displayTagLine()

	protected function displayTagLine()
	{
		$tagline = $this->app->config->site->tagline;
		if ($site_title != '') {
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
		$this->finalizeHeaderTitle();
		$this->finalizeHtmlTitle();
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
		$site_title = $this->app->config->site->title;
		if ($site_title != '') {
			$h1_tag = new SwatHtmlTag('h1');
			$h1_tag->title = $site_title;
			$h1_tag->open();

			echo '<span>';

			$source = $this->app->getPage()->getSource();
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
	}

	// }}}
}

?>
