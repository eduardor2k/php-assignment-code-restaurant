<?php
namespace Framework\Dispatcher;

class Dispatcher
{
    /**
     * @var \Framework\Router\Router
     */
    private $_router;

    /**
     * @var
     */
    private $_response;

    /**
     * Main constructor
     *
     * @param \Framework\Router\Router $router
     * @param \Framework\Http\Response $response
     */
    public function __construct($router = null, $response = null)
    {
        $this->_router = $router;
        if(!$this->_router)
        {
            $this->_router = new \Framework\Router\Router();
        }

        $this->_response = $response;
        if(!$this->_response)
        {
            $this->_response = new \Framework\Http\Response();
        }
    }

    /**
     * This method will dispatch
     *
     * @param \Framework\Http\Request $request
     * @param \Framework\View\InterfaceView $view
     * @throws ControllerNotFoundException;
     */
    public function dispatch(
        \Framework\Http\Request $request,
        \Framework\View\InterfaceView $view)
    {
        $route = $this->_router->match($request);
        if(!$route)
        {
            $this->_response->setStatusCode(404);
        }
        if(!isset($route['controller']))
        {
            throw new ControllerNotFoundException('Controller Not found');
        }
        if(!isset($route['action']))
        {
            $route['action'] = 'index';
        }
        $route['action'] = strtolower($request->getMethod()).ucfirst($route['action']).'Action';

        $className = "\\".ucfirst($route['controller'])."\\Controller\\".ucfirst($route['controller']);
        if (!class_exists($className))
        {
            throw new ClassNotFoundException('Class "'.$className.'" Not found');
        }
        $controller = new $className($request,$this->_response,$view);
        return $controller->$route['action']();
    }
}

class ClassNotFoundException extends \Exception{}
class ControllerNotFoundException extends \Exception{}
class RouteNotFoundException extends \Exception{}