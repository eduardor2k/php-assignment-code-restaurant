<?php
namespace Framework\Http;

class Request
{
    /**
     * Current path
     *
     * @var string
     */
    protected $_path = '/';

    /**
     * Current method
     *
     * @var string
     */
    protected $_method = 'GET';

    /**
     * List of parameters
     *
     * @var array $_parameters
     */
    protected $_parameters = array();

    /**
     * Main constructor
     *
     * @param array $server
     */
    public function __construct($server)
    {
        $this->_path = parse_url($server['REQUEST_URI'], PHP_URL_PATH);
        $this->_method = $server['REQUEST_METHOD'];
    }

    /**
     * This method will import all the parameters
     */
    public function import($params)
    {
        $this->_parameters = array_merge($this->_parameters,$params);
    }

    /**
     * Returns a parameter
     *
     * @param string $name
     * @param integer $filter
     * @return mixed
     */
    public function getParameter($name,$filter = null)
    {
        if(!isset($this->_parameters[$name]))
        {
            return false;
        }
        if($filter === null)
        {
            return $this->_parameters[$name];
        }
        return filter_var($this->_parameters[$name],$filter);
    }

    /**
     * Returns the path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * Returns the request Method: GET, PUT, DELETE
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }
}