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
            $database = new DatabaseConnector();
            $query = "INSERT INTO user (firstName, middleName, lastName, mobile, email, passwordHash, admin, vendor, registeredAt, intro, profile) VALUES ('" . $this->params['firstName'] . "', '" . $this->params['middleName'] . "', '" . $this->params['lastName'] . "', '" . $this->params['mobile'] . "', '" . $this->params['email'] . "', '" . $this->params['passwordHash'] . "', '" . $this->params['admin'] . "', '" . $this->params['vendor'] . "', '"  . date("Y-m-d") . "', '" . $this->params['intro'] . "', '" . $this->params['profile'] . "')";
            $result = $database->getConnection()->query($query);
            if ($result) {
                $this->response(201, $this->params);
            } else {
                $this->response(500, "ERROR: Could not able to execute $query.");
            }
        }
    }

    function getall() {
        if ($this->method == "GET") {
            $database = new DatabaseConnector();
            $query = "select * from user";
            $result = $database->getConnection()->query($query);
            $data = array();
            try {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
                $this->response(500, "ERROR");
            }
            $this->response(200, $data);
        }
    }
}

$user = new user();
