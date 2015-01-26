<?php
namespace Framework\Autoloader;

class Autoloader
{
    /**
     * List of paths
     *
     * @var array
     */
    private $_paths = [];

    /**
     * If you need to add a package in a different folder
     *
     * @param string $path
     */
    public function addPath($path)
    {
        $this->_paths[] = $path;
    }

    /**
     * This method will register the autoloader
     */
    public function register()
    {
        spl_autoload_register([$this, 'load']);
    }

    /**
     * This method will try to load a class
     *
     * @param string $className
     * @return boolean
     */
    public function load($className)
    {
        $className = ltrim($className, '\\');
        $fileName  = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        foreach($this->_paths as $path)
        {
            $path = $path.DIRECTORY_SEPARATOR.$fileName;
            if(!file_exists($path))
            {
                continue;
            }
            require_once $path;
        }
        return false;
    }
}