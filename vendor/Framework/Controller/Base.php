<?php
namespace Framework\Controller;

/**
 * Base controller to be used by all controllers
 *
 * @package Framework\Controller
 */
class Base
{
    /**
     * Request object
     *
     * @var \Framework\Http\Request
     */
    private $_request;

    /**
     * Response object
     *
     * @var \Framework\Http\Response
     */
    private $_response;

    /**
     * Main controller
     *
     * @param \Framework\Http\Request $request
     * @param \Framework\Http\Response $response
     */
    public function __construct(\Framework\Http\Request $request,\Framework\Http\Response $response)
    {
        $this->_request = $request;
        $this->_response = $response;
    }

    /**
     * Returns the request object
     *
     * @return \Framework\Http\Request
     */
    public function getRequest()
    {
        return $this->_request;
    }

    /**
     * Returns the response object
     *
     * @return \Framework\Http\Response
     */
    public function getResponse()
    {
        return $this->_response;
    }

    /**
     * Overloading magic method __call, if a user calls a method that does not exists
     * we will throw MethodNotFoundException
     *
     * @param string $name
     * @param array $arguments
     * @throws MethodNotFoundException
     */
    public function __call($name, $arguments)
    {
        throw new MethodNotFoundException('Method "'.$name.'" not found');
    }
}

class MethodNotFoundException extends \Exception{}