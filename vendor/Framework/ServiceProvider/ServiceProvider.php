<?php
namespace Framework\ServiceProvider;

/**
 * Class ServiceProvider
 *
 * @package Framework\ServiceProvider
 */
class ServiceProvider
{
    /**
     * @var
     */
    private static $instance;

    /**
     * List of services
     *
     * @var array
     */
    private $_services = array();

    /**
     * Disabled constructor
     */
    private function __construct()
    {
        // Private constructor
    }

    /**
     * Singleton
     *
     * @return ServiceProvider
     */
    public static function getInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Register a service
     *
     * @param string $name
     * @param string $className
     * @param array $params
     */
    public function register($name,$className,$params)
    {
        $this->_services[$name] = array('class_name' => $className, 'parameters' => $params);
    }

    /**
     * This method will return the service
     *
     * @param string $name
     * @return mixed
     * @throws ServiceNotFoundException
     */
    public function get($name)
    {
        if(!isset($this->_services[$name]))
        {
            throw new ServiceNotFoundException('Service "'.$name.'" Not Found');
        }
        $reflect  = new \ReflectionClass($this->_services[$name]['class_name']);
        return $reflect->newInstanceArgs($this->_services[$name]['parameters']);
    }
}

class ServiceNotFoundException extends \Exception{};