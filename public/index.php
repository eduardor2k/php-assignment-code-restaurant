<?php
error_reporting(-1);
ini_set('display_errors', 'On');

// We check the current php version
if (version_compare(phpversion(), '5.5', '<')) {
    echo 'Please use PHP 5.5 or above'; die;
}

// We load the autoloader
include __DIR__.'/../vendor/Framework/Autoloader/Autoloader.php';

// We tell the autoloader wich folder will contain our packages or classes
$autoloader = new \Framework\Autoloader\Autoloader();
$autoloader->register();
$autoloader->addPath(__DIR__.'/../vendor');
$autoloader->addPath(__DIR__.'/../app');

$bootstrap = new Framework\Bootstrap\Bootstrap();
$bootstrap->init(__DIR__);