<?php

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('site');
	PackageConfig::addPackage('admin');
	PackageConfig::addPackage('blorg');
	PackageConfig::addPackage('nate-go-search');
	PackageConfig::addPackage('concentrate');
}

require_once '../include/Application.php';

$config_filename = dirname(__FILE__).'/../blorgy.ini';
$app = new Application('blorgy', $config_filename);
$app->run();

?>
