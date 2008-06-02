#!/usr/bin/php
<?php

/**
 * Builds and updates the NateGoSearch index for Blorgy
 *
 * OPTIONS
 * -a  or  --all
 *    Indexes all content rather than just queued content.
 *
 * -v  or  --verbose level
 *    Sets the level of verbosity of the indexer. Pass 0 to turn off all
 *    output.
 */

ini_set('include_path', '.:/so/sites/blorgy/pear/lib');

@include_once 'PackageConfig.php';
if (class_exists('PackageConfig')) {
	PackageConfig::addPackage('swat');
	PackageConfig::addPackage('site');
	PackageConfig::addPackage('blorg');
	PackageConfig::addPackage('nate-go-search');
}

ini_set('memory_limit', -1);
set_time_limit(9000);
proc_nice(19);

require_once 'Blorg/BlorgNateGoSearchIndexer.php';

$config_filename = dirname(__FILE__).'/../../blorgy.ini';
$indexer = new BlorgNateGoSearchIndexer('blorgy_search_indexer',
	$config_filename,
	'Search Indexer',
	'Builds and updates the NateGoSearch index for the Blorgy site');

$indexer->run();

?>
