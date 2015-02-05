<?php
class adressTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test adress all and get id
     *
     * @expectedException \Framework\Controller\MethodNotFoundException
     */
    public function testAll()
    {
        $_SERVER['REQUEST_URI'] = '/';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = new \Framework\Http\Request($_SERVER);
        $response = new \Framework\Http\Response();

        $servide = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $servide->register('DatabaseProvider','\Framework\Db\SQLite',array(__DIR__.'/../database/default'));

        $controller = new \Adress\Controller\Adress($request,$response);
        $this->assertEquals(false,$controller->getTruncateTableAction());
        $this->assertEquals(array(),$controller->getIndexAction());

        $request->import(array('id' => 1));
        $this->assertEquals(array(),$controller->getIndexAction());
        $this->assertEquals(404,$response->getStatusCode());
        $response->addHeader('location','http://www.google.com');
        $this->assertEquals(array('location' => 'http://www.google.com'),$response->getHeaders());
        $this->assertEquals(null,$response->render());

        $this->assertEquals('GET',$request->getMethod());
        $this->assertEquals('/',$request->getPath());
        $this->assertEquals(1,$request->getParameter('id'));

        $controller->controllerThatDoesNotExists();
    }

    /**
     * Test adress all and get id
     *
     */
    public function testPost()
    {
        $_SERVER['REQUEST_URI'] = '/adress';
        $_SERVER['REQUEST_METHOD'] = 'POST';

        $data = array(
            'id' => 1,
            'name' => 'Test name',
            'phone' => '123',
            'adress' => 'Test adress',
        );

        $request = new \Framework\Http\Request($_SERVER);
        $request->import($data);
        $response = new \Framework\Http\Response();

        $servide = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $servide->register('DatabaseProvider','\Framework\Db\SQLite',array(__DIR__.'/../database/default'));

        $controller = new \Adress\Controller\Adress($request,$response);
        $this->assertEquals($data,$controller->postIndexAction());
    }

    /**
     * Test update adress
     */
    public function testPut()
    {
        $_SERVER['REQUEST_URI'] = '/adress';
        $_SERVER['REQUEST_METHOD'] = 'PUT';

        $data = array(
            'id' => 1,
            'name' => 'Test 2 name',
            'phone' => '1234',
            'adress' => 'Test 2 adress',
        );

        $request = new \Framework\Http\Request($_SERVER);
        $request->import($data);
        $response = new \Framework\Http\Response();

        $servide = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $servide->register('DatabaseProvider','\Framework\Db\SQLite',array(__DIR__.'/../database/default'));

        $controller = new \Adress\Controller\Adress($request,$response);
        $this->assertEquals($data,$controller->putIndexAction());

        $request->import(array('id' => 5));
        $this->assertEquals(array(),$controller->putIndexAction());
        $this->assertEquals(404,$response->getStatusCode());
    }

    /**
     * Test update adress
     */
    public function testDelete()
    {
        $_SERVER['REQUEST_URI'] = '/adress';
        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        $data = array(
            'id' => 1
        );

        $request = new \Framework\Http\Request($_SERVER);
        $request->import($data);
        $response = new \Framework\Http\Response();

        $servide = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $servide->register('DatabaseProvider','\Framework\Db\SQLite',array(__DIR__.'/../database/default'));

        $controller = new \Adress\Controller\Adress($request,$response);
        $this->assertEquals(false,$controller->deleteIndexAction());

        $request->import(array('id' => 20));
        $this->assertEquals(array(),$controller->deleteIndexAction());
        $this->assertEquals(404,$response->getStatusCode());
    }
    /**
     * Test update adress
     */
    public function testGetCreateTable()
    {
        $_SERVER['REQUEST_URI'] = '/adress/CreteTable/';
        $_SERVER['REQUEST_METHOD'] = 'GET';

        $request = new \Framework\Http\Request($_SERVER);
        $response = new \Framework\Http\Response();

        $servide = \Framework\ServiceProvider\ServiceProvider::getInstance();
        $servide->register('DatabaseProvider','\Framework\Db\SQLite',array(__DIR__.'/../database/default'));

        $controller = new \Adress\Controller\Adress($request,$response);
        $this->assertEquals(false,$controller->getCreateTableAction());
    }
}