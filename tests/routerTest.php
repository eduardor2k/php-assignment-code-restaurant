<?php
require_once 'Base.php';

class routerTest extends PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $router = new \Framework\Router\Router();

        $route = new \Framework\Router\Route();

        $routeText = "/\\/(?P<controller>[a-z]+)\\/?(?P<action>[a-z]+)?\\/?(?P<id>[0-9]+)?\\/?/";
        $route->setMethod('POST');
        $route->setRoute($routeText);
        $route->setAction('test');

        $this->assertEquals('test',$route->getAction());
        $this->assertEquals($routeText,$route->getRoute());
        $this->assertEquals('POST',$route->getMethod());

        $router->addRoute($route);
        $router->addRoutes(array($route));

        $_SERVER['REQUEST_URI'] = '/adress';
        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        $request = new \Framework\Http\Request($_SERVER);

        $this->assertEquals(
            array(
                0 => '/adress',
                'controller' => 'adress',
                1 => 'adress'
            )
            ,$router->match($request));

        $_SERVER['REQUEST_URI'] = '/';

        $request = new \Framework\Http\Request($_SERVER);
        $this->assertEquals(array(),$router->match($request));
    }
}