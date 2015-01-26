<?php
// We load the autoloader
include __DIR__.'/../vendor/Framework/Autoloader/Autoloader.php';

// We tell the autoloader wich folder will contain our packages or classes
$autoloader = new \Framework\Autoloader\Autoloader();
$autoloader->register();
$autoloader->addPath(__DIR__.'/../vendor');
$autoloader->addPath(__DIR__.'/../app');
