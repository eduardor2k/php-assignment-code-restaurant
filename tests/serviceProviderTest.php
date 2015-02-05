<?php
class serviceProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Framework\ServiceProvider\ServiceNotFoundException
     */
    public function testDefault()
    {
        $service = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $service->get('ServiceThatDoesNotExist');
    }
}