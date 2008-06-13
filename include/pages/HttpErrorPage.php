<?php

require_once 'Site/pages/SiteHttpErrorPage.php';

/**
 * @package   Blorgy
 * @copyright 2008 silverorange
 */
class HttpErrorPage extends SiteHttpErrorPage
{
	// build phase
	// {{{ public function build()

	public function build()
	{
		parent::build();

		/*
		echo '<pre>';
		echo $this->app->config->site;
		echo '</pre>';
		exit;
		$this->layout->data->site_title = $this->app->config->site->title;
		*/
		$this->layout->data->site_title = 'Site Title';
	}

	// }}}

	// finalize phase
	// {{{ public function finalize()

	public function finalize()
	{
		parent::finalize();

		$this->layout->addHtmlHeadEntry(new SwatStyleSheetHtmlHeadEntry(
			'styles/http-error-page.css'));
	}

	// }}}
}

?>