<?php
include_once './restfull.php';
include_once '../DatabaseConnector.php';

class user extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    function create() {
        if ($this->method == "POST") {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $database = new DatabaseConnector();
            $query = "INSERT INTO user (firstName, middleName, lastName, mobile, email, passwordHash, admin, vendor, registeredAt, intro, profile) VALUES ('" . $this->params['firstName'] . "', '" . $this->params['middleName'] . "', '" . $this->params['lastName'] . "', '" . $this->params['mobile'] . "', '" . $this->params['email'] . "', '" . $this->params['passwordHash'] . "', '" . $this->params['admin'] . "', '" . $this->params['vendor'] . "', '"  . date("Y-m-d H:i:s") . "', '" . $this->params['intro'] . "', '" . $this->params['profile'] . "')";
            try {
                $result = $database->getConnection()->query($query);
                if ($result) {
                    $this->res["success"] = true;
                } else {
                    $this->res["message"] = "ERROR: could not to insert user, $query";
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            $this->response(200, $this->res);
        }
    }

    function getall() {
        if ($this->method == "GET") {
            $database = new DatabaseConnector();
            $query = "select * from user";
            $result = $database->getConnection()->query($query);
            $this->res["data"] = array();
            try {
                while ($row = $result->fetch_assoc()) {
                    $this->res["data"][] = $row;
                }
                $this->res["success"] = true;
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            $this->response(200, $this->res);
        }
    }

    function login() {
        if ($this->method == "POST") {
            $database = new DatabaseConnector();
            $query = "select mobile, email, passwordHash from user";
            $result = $database->getConnection()->query($query);
            $data = array();
            $this->res["data"] = array();
            try {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                foreach ($data as $datum) {
                    if (!empty($datum["mobile"])) {
                        if ($datum["mobile"] == $this->params["mobile"]) {
                            $this->res["success"] = true;
                            $this->res["data"][] = $datum;
                            break;
                        }
                    } else if (!empty($datum["email"])) {
                        if ($datum["email"] == $this->params["email"]) {
                            $this->res["success"] = true;
                            $this->res["data"][] = $datum;
                            break;
                        }
                    }
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            $this->response(200, $this->res);
        }
    }
}

$user = new user();
