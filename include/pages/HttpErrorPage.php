<?php

require_once 'Site/pages/SiteHttpErrorPage.php';

/**
 * @package   Blorgy
 * @copyright 2008-2016 silverorange
 */
class HttpErrorPage extends SiteHttpErrorPage
{
	// build phase
	// {{{ public function build()

	public function build()
	{
		parent::build();

		if ($this->app->config->site->title === null)
			$this->layout->data->site_title = '';
		else
			$this->layout->data->site_title = $this->app->config->site->title;
	}

	// }}}
}

?>
