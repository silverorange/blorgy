<?php

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('site');
	PackageConfig::addPackage('admin');
	PackageConfig::addPackage('blorg');
}

require_once '../../include/admin/BlorgyAdminApplication.php';

$config_filename = dirname(__FILE__).'/../../blorgy.ini';
$app = new GalleryAdminApplication('blorgyadmin', $config_filename);
$app->run();

?>
