<?php
namespace Framework\Router;

class Router
{
    /**
     * @var \Framework\Router\Route[]
     */
    private $_routes = [];

    /**
     * This method will add a route
     *
     * @param \Framework\Router\Route $route
     */
    public function addRoute($route)
    {
        $this->_routes[] = $route;
    }

    /**
     * This method will add a route
     *
     * @param \Framework\Router\Route[] $routes
     */
    public function addRoutes($routes)
    {
        $this->_routes = array_merge($routes,$this->_routes);
    }

    /**
     * Match all the routes against the request
     *
     * @param \Framework\Http\Request $request
     * @return array
     */
    public function match($request)
    {
        foreach($this->_routes as $route)
        {
            if(!preg_match($route->getRoute(),$request->getPath(),$match))
            {
                continue;
            }
            return $match;
        }
        return array();
    }
}