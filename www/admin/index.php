<?php

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('site');
	PackageConfig::addPackage('admin');
	PackageConfig::addPackage('blorg');
	PackageConfig::addPackage('hot-date');
	PackageConfig::addPackage('net-notifier');
}

require_once '../../include/admin/BlorgyAdminApplication.php';

$config_filename = dirname(__FILE__).'/../../blorgy.ini';
$app = new BlorgyAdminApplication('blorgyadmin', $config_filename);
$app->run();

?>
