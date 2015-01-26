<?php
namespace Framework\View;

class Rest implements \Framework\View\InterfaceView
{
    /**
     * View constructor
     *
     * @param \Framework\Http\Response $response
     */
    public function __construct(\Framework\Http\Response $response)
    {
        $response->addHeader('Content-Type','application/json');
    }

    /**
     * Renders the view
     *
     * @param array $data
     */
    public function render($data)
    {
        echo json_encode($data);
    }
}