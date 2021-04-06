<?php
include_once './vendor/autoload.php';

class api extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    function random_user()
    {
        if ($this->method == "GET") {
            $connect = connect_db::getConnection();
            $query = "select * from users ORDER BY RAND() LIMIT 1";
            $result = $connect->query($query);
            connect_db::closeConnection($connect);
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $this->response(200, $data);
        }
    }
}

$user = new api();
