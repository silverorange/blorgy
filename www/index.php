<?php

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('site');
	PackageConfig::addPackage('admin');
	PackageConfig::addPackage('blorg');
	PackageConfig::addPackage('xml-atom');
	PackageConfig::addPackage('hot-date');
	PackageConfig::addPackage('nate-go-search');
	PackageConfig::addPackage('concentrate');
}

/*
function shutdownDebug() {
	$usage = getrusage();
	if ($usage["ru_utime.tv_sec"] >= 29) {
		error_log('Timeout! '.$usage["ru_utime.tv_sec"]."s - ".
			$_SERVER['SCRIPT_URI']." - ".
			$_SERVER['HTTP_USER_AGENT']." - ".
			date("F j, Y, g:i a"));
	}
}
register_shutdown_function('shutdownDebug');
*/

require_once '../include/Application.php';


$config_filename = dirname(__FILE__).'/../blorgy.ini';
$app = new Application('blorgy', $config_filename);
$app->run();

?>
