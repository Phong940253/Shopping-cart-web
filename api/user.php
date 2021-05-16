<?php
include_once './restfull.php';
include_once '../DatabaseConnector.php';
require_once '../vendor/autoload.php';
use \Firebase\JWT\JWT;
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
            $query = "select * from user where email = '" . $this->params["email"] . "' OR mobile = '" . $this->params["mobile"] . "'";
            error_log(print_r($query, true));
            $result = $database->getConnection()->query($query);
            $this->res["data"] = array();
            $num = $result->num_rows;
            try {
                    if ($num > 0) {
                        $this->res["data"] = $result->fetch_assoc();
                        $this->res["success"] = true;

                        //setup token
                        $key = "Phong";
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $issued_at = time();
                        $expiration_time = $issued_at + (60 * 60 * 24 * 30); // valid for 1 hour
                        $issuer = "team-it";
                        $token = array(
                            "iat" => $issued_at,
                            "exp" => $expiration_time,
                            "iss" => $issuer,
                            "nbf" => $issued_at,
                            "data" => array(
                                "id" => $this->res["data"]["id"],
                                "firstName" => $this->res["data"]["firstName"],
                                "middleName" => $this->res["data"]["middleName"],
                                "lastName" => $this->res["data"]["id"],
                                "mobile" => $this->res["data"]["mobile"],
                                "email" => $this->res["data"]["email"]
                            )
                        );
                        $jwt = JWT::encode($token, $key, 'RS256');
                        $this->res["jwt"] = $jwt;
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
