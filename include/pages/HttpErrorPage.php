<?php

require_once 'Site/pages/SiteHttpErrorPage.php';

/**
 * @package   Blorgy
 * @copyright 2008 silverorange
 */
class HttpErrorPage extends SiteHttpErrorPage
{
	// init phase
	// {{{ public function init()

	public function init()
	{
		parent::init();

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
