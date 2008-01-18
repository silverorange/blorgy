<?php

require_once 'SwatDB/SwatDBClassMap.php';
require_once 'Blorg/admin/BlorgAdminApplication.php';

SwatDBClassMap::addPath(dirname(__FILE__).'/../dataobjects');

/**
 * Web application class for an administering this site
 *
 * @package   Blorgy
 * @copyright 2008 silverorange
 */
class BlorgyAdminApplication extends BlorgAdminApplication
{
	// {{{ protected function initModules()

	protected function initModules()
	{
		parent::initModules();

		// append instance name to secure base URIs
		if (substr($this->secure_base_uri, 0, 1) !== '/') {
			$this->base_uri = str_replace('/blorgy/',
				'/'.$_SERVER['SERVER_NAME'].'/', $this->base_uri);

            $this->secure_base_uri = str_replace('/blorgy/',
                '/blorgy-'.$this->instance->getInstance()->shortname.'/',
                $this->secure_base_uri);
		}
	}

	// }}}
}

?>
