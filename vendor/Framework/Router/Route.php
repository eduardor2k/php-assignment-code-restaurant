<?php
namespace Framework\Router;

class Route
{
    /**
     * Default method
     *
     * @var string
     */
    private $_method = 'GET';

    /**
     * Default action
     *
     * @var string
     */
    private $_action = 'index';

    /**
     * Default route
     *
     * @var string
     */
    private $_route = '/';

    /**
     * Main constructor
     */
    public function __construct()
    {
        // Nothing
    }

    /**
     * Sets the action
     *
     * @param string $action
     */
    public function setAction($action)
    {
        $this->_action = $action;
    }

    /**
     * Sets the method
     *
     * @param string $method
     */
    public function setMethod($method)
    {
        $this->_method = $method;
    }

    /**
     * Sets the route
     *
     * @param string $route Regular Expression
     */
    public function setRoute($route)
    {
        $this->_route = $route;
    }

    /**
     * Returns the route
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->_route;
    }

    /**
     * Returns the action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * Returns the method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }
}