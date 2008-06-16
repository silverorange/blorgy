<?php

/**
 * Instance-aware article
 *
 * @package   Blörgy
 * @copyright 2008 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class Article extends SiteArticle
{
	// {{{ protected function init()

	protected function init()
	{
		parent::init();
		$this->registerInternalProperty('instance', 'SiteInstance');
	}

	// }}}
}

?>
