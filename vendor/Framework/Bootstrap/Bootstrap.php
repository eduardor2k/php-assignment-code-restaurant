<?php
namespace Framework\Bootstrap;

/**
 * Class Bootstrap
 *
 * @package Framework\Bootstrap
 */
class Bootstrap
{
    public function init($currentDir)
    {
        // We init the router
        $routes = new \Framework\Router\Router();
        $routes->addRoutes(include $currentDir.'/../app/routes.php');


        $serviceProvider = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $serviceProvider->register('DatabaseProvider','\Framework\Db\SQLite',array($currentDir.'/../database/default'));

        // We build the request with the current petition data
        $request = new \Framework\Http\Request($_SERVER);
        $request->import($_POST);
        $request->import($_GET);

        // We create the response object
        $response = new \Framework\Http\Response();
        // We create the default view
        $view = new \Framework\View\Rest($response);
        // We init the database

        // We inititialize the dispatcher
        $dispatcher = new \Framework\Dispatcher\Dispatcher($routes,$response);

        $data = null;
        try
        {
            // We dispatch the request
            $data = $dispatcher->dispatch($request,$view);
        }
        catch(\Exception $e)
        {
            $response->setStatusCode(400);
            $data = array(
                'status' => 'exception',
                'code_error' => $e->getCode(),
                'message' => $e->getMessage()
            );
        }
        // We render everything
        $response->render();
        $view->render($data);
    }
}