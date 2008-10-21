#!/usr/bin/php
<?php

ini_set('include_path', '.:/so/sites/blorgy/pear/lib');

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('site');
	PackageConfig::addPackage('blorg');
}

ini_set('memory_limit', -1);
set_time_limit(9000);
proc_nice(19);

require_once 'LinkFixer.php';

$config_filename = dirname(__FILE__).'/../../blorgy.ini';
$fixer = new LinkFixer('blorgy_link_fixer',
	$config_filename,
	'Link Fixer',
	'Fixes bad links in the comments table the Blorgy site. Should only '.
	'need to be run once.');

$fixer->run();

?>
