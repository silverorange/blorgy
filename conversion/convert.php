#!/usr/bin/php
<?php

ini_set('include_path', '/so/sites/blorgy/pear/lib');
proc_nice(10);
set_time_limit(130000);
ini_set('memory_limit', '-1');

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('conversion');
	PackageConfig::addPackage('blorg');
	PackageConfig::addPackage('admin');
	PackageConfig::addPackage('site');
}

require_once 'Conversion/ConversionProcess.php';

$process = new ConversionProcess();
$process->src_dsn = 'pgsql://php@dancy/blogs';
$process->dst_dsn = 'pgsql://php@zest/BlorgyNew';
$process->instance = 1;

if ($_SERVER['argc'] < 1)
	exit();

$args = $_SERVER['argv'];
array_shift($args);
$clear_data = false;

foreach ($args as $arg) {
	switch ($arg) {
	case '-C':
		$clear_data = true;
		break;
	default:
		require_once $arg;
		$class_name = substr(basename($arg), 0, -4);
		$reflector = new ReflectionClass($class_name);
		if (!$reflector->isAbstract()) {
			$table = new $class_name;
			$table->clear_data = $clear_data;
			$process->addTable($table);
		}
	}
}

$process->run();

?>
