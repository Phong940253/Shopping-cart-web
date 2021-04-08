<?php
require_once '../vendor/autoload.php';
class restful_api
{
    protected $method   = '';
    protected $endpoint = '';
    protected $params   = array();
    protected $file     = null;

    protected function response($status_code, $data = NULL)
    {
        header($this->_build_http_header_string($status_code));
        header("Content-Type: application/json");
        echo json_encode($data);
        die();

    }
    private function _build_http_header_string($status_code)
    {
        $status = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );
        return "HTTP/1.1 " . $status_code . " " . $status[$status_code];
    }

    public function __construct()
    {
        $this->_input();
        $this->_process_api();
    }
    private function _input()
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");

        $this->params = explode('/', trim($_SERVER['PATH_INFO'], '/'));
        echo $this->params;
        $this->endpoint = array_shift($this->params);

        $method = $_SERVER['REQUEST_METHOD'];
        $allow_method = array('GET', 'POST', 'PUT', 'DELETE');

        if (in_array($method, $allow_method)) {
            $this->method = $method;
        }

        switch ($this->method) {
            case 'POST':
                $this->params = $_POST;
                break;

            case 'GET':
                break;

            case 'PUT':
                $this->file = file_get_contents("php://input");
                break;

            case 'DELETE':
                break;

            default:
                $this->response(500, "Invalid Method");
                break;
        }
    }
    private function _process_api()
    {
        if (method_exists($this, $this->endpoint)) {
            $this->{$this->endpoint}();
        } else {
            $this->response(500, "Unknown endpoint");
        }
    }
}
?>
