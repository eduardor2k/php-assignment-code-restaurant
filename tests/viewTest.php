<?php
require_once 'Base.php';

class viewTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testDefault()
    {
        $this->expectOutputRegex('/\[\]/');

        $response = new \Framework\Http\Response();

        $view = new \Framework\View\Rest($response);
        $view->render(array());
    }
}