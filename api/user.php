<?php
include_once './restfull.php';
include_once '../DatabaseConnector.php';

class user extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    function random_user()
    {
        if ($this->method == "GET") {
            $database = new DatabaseConnector();
            $query = "select * from user ORDER BY RAND() LIMIT 1";
            $result = $database->getConnection()->query($query);
            $data = array();
            try {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $this->response(200, $data);
        }
    }

    function create() {
        if ($this->method == "POST") {
            $this->response(200, $this->params);
        }
    }
}

$user = new user();
