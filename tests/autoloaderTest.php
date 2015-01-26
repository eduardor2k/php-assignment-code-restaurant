<?php
require_once 'Base.php';

class autoloaderTest extends PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $autoloader = new \Framework\Autoloader\Autoloader();
        $autoloader->addPath(__DIR__.'/../vendor');
        $autoloader->register();
        $this->assertEquals(false,$autoloader->load('\Framework\Autoloader\Autoloader'));
    }
}