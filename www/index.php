<?php
/**
 * @copyright  Copyright (C) 2012 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// Set error reporting for development
error_reporting(-1);

// Define required paths
define('JPATH_ROOT',          dirname(__DIR__));
define('JPATH_CONFIGURATION', JPATH_ROOT . '/etc');
define('JPATH_THEMES',        JPATH_ROOT . '/www');
define('JPATH_TEMPLATES',     JPATH_ROOT . '/tpl');

$path = realpath(JPATH_ROOT . '/vendor/autoload.php');

// Load the Composer autoloader
if (!$path)
{
	echo 'ERROR: Composer not properly set up! Run "composer install" or see README.md for more details.' . PHP_EOL;

	exit(1);
}

include JPATH_ROOT . '/vendor/autoload.php';

// Execute the application.
(new Epicdoc\Application)
	->execute();
