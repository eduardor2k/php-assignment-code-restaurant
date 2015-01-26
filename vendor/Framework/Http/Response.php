<?php
namespace Framework\Http;

class Response
{
    /**
     * Status Code
     *
     * @var integer
     */
    protected $_status_code = 200;

    protected $_headers = [];

    /**
     * Status Text
     *
     * @var array
     */
    /*protected $status_code_text = [
        '100' => 'Continue',
        '101' => 'Switching Protocols',
        '200' => 'OK',
        '201' => 'Created',
        '202' => 'Accepted',
        '203' => 'Non-Authoritative Information',
        '204' => 'No Content',
        '205' => 'Reset Content',
        '206' => 'Partial Content',
        '300' => 'Multiple Choices',
        '301' => 'Moved Permanently',
        '302' => 'Found',
        '303' => 'See Other',
        '304' => 'Not Modified',
        '305' => 'Use Proxy',
        '307' => 'Temporary Redirect',
        '400' => 'Bad Request',
        '401' => 'Unauthorized',
        '402' => 'Payment Required',
        '403' => 'Forbidden',
        '404' => 'Not Found',
        '405' => 'Method Not Allowed',
        '406' => 'Not Acceptable',
        '407' => 'Proxy Authentication Required',
        '408' => 'Request Timeout',
        '409' => 'Conflict',
        '410' => 'Gone',
        '411' => 'Length Required',
        '412' => 'Precondition Failed',
        '413' => 'Request Entity Too Large',
        '414' => 'Request-URI Too Long',
        '415' => 'Unsupported Media Type',
        '416' => 'Requested Range Not Satisfiable',
        '417' => 'Expectation Failed',
        '500' => 'Internal Server Error',
        '501' => 'Not Implemented',
        '502' => 'Bad Gateway',
        '503' => 'Service Unavailable',
        '504' => 'Gateway Timeout',
        '505' => 'HTTP Version Not Supported',
    ];*/

    /**
     * Sets the status code
     *
     * @param integer $code
     */
    public function setStatusCode($code)
    {
        $this->_status_code = $code;
    }

    /**
     * Sets the status code
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->_status_code;
    }

    /**
     * This method will allow you to add a header
     *
     * @param string $name
     * @param string $value
     */
    public function addHeader($name,$value)
    {
        $this->_headers[$name] = $value;
    }


    /**
     * This method will allow you to add a header
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * This method will render the response, setting up all the headers
     */
    public function render()
    {
        http_response_code($this->_status_code);
        foreach($this->_headers as $name => $value)
        {
            @header($name.':'.$value);
        }
    }
}