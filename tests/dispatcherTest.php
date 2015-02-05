<?php
class dispatcherTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Framework\Dispatcher\ControllerNotFoundException
     */
    public function testControllerNotFound()
    {
        $_SERVER['REQUEST_URI'] = '/';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = new \Framework\Http\Request($_SERVER);
        $response = new \Framework\Http\Response();

        $dispatcher = new \Framework\Dispatcher\Dispatcher();
        $dispatcher->dispatch($request,new \Framework\View\Rest($response));
    }

    public function testDefault()
    {
        $_SERVER['REQUEST_URI'] = '/adress';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = new \Framework\Http\Request($_SERVER);
        $response = new \Framework\Http\Response();

        $router = new \Framework\Router\Router();

        $route = new \Framework\Router\Route();
        $routeText = "/\\/(?P<controller>[a-z]+)\\/?(?P<action>[a-z]+)?\\/?(?P<id>[0-9]+)?\\/?/";
        $route->setRoute($routeText);

        $router->addRoute($route);

        $dispatcher = new \Framework\Dispatcher\Dispatcher($router,$response);
        $this->assertEquals(array(),$dispatcher->dispatch($request,new \Framework\View\Rest($response)));
    }
}