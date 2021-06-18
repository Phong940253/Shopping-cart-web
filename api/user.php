<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/database/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/api/restful.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/php/encryptPassword.php";

use \Firebase\JWT\JWT;

class user extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    protected $thamso = [
        "firstName" => "",
        "middleName" => "",
        "lastName" => "",
        "mobile" => "",
        "email" => "",
        "passwordHash" => "",
        "admin" => "",
        "vendor" => "",
        "registeredAt" => "",
        "intro" => "",
        "profile" => "",
        "gender" => ""
    ];

    function create()
    {
        if ($this->method == "POST") {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $jwt = $this->createJwt($this->params['phone'], date("Y-m-d H:i:s"));
            $query = "INSERT INTO user (";
            foreach ($this->thamso as $key => $value) {
                $query .= $key . ", ";
                if ($key == "registeredAt") {
                    $now = date("Y-m-d H:i:s");
                    $this->thamso[$key] = "'{$now}'";
                } elseif ($key == "passwordHash") {
                    $passwordEncrypt = encrypt($this->params["passwordHash"]);
                    $this->thamso[$key] = "'{$passwordEncrypt}'";
                } elseif ($key == "admin" || $key == "vendor" || $key == "gender") {
                    $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "{$this->params[$key]}";
                } else {
                    $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "'{$this->params[$key]}'";
                }
            }
            $query .= "jwt" . ", ";
            $this->thamso['jwt'] = "'{$jwt}'";
            $query = substr($query, 0, -2) . ") VALUE (";
            foreach ($this->thamso as $value) {
                $query .= "{$value}, ";
            }
            $query = substr($query, 0, -2) . ")";
            $this->res["jwt"] = $jwt;
            $this->_submit_create_query($query);
        }
    }

    function getall()
    {
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
                $this->response(500, $this->res);
            }
            $this->response(200, $this->res);
        }
    }

    function get()
    {
        if ($this->method == "POST") {
            $database = new DatabaseConnector();
            $query = "select * from user where id = " . $this->params["id"];
            $result = $database->getConnection()->query($query);
            $this->res["data"] = array();
            $num = $result->num_rows;
            try {
                if ($num > 0) {
                    $this->res["data"] = $result->fetch_assoc();
                    $this->res["success"] = true;
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            if ($this->res["success"])
                $this->response(200, $this->res);
            $this->response(200, $this->res);
        }
    }

    function edit()
    {
        if ($this->method == "POST") {
            if (!is_null($this->params["password"])) {
                $this->params["passwordHash"] = encrypt($this->params["password"]);
                unset($this->params["password"]);
            }
            $query = "UPDATE user SET";
            $dem = 0;
            foreach ($this->params as $key => $value) {
                if (!is_null($value)) {
                    if ($key != "id") {
                        if ($key == "admin" || $key == "vendor") {
                            $query .= " {$key}={$value},";
                            $dem++;
                        } else {
                            $query .= " {$key}='{$value}',";
                            $dem++;
                        }
                    }
                }
            }
            try {
                if ($dem > 0) {
                    if (substr($query, -1) == ",") {
                        $query = substr($query, 0, -1);
                    }
                    $query .= " WHERE id={$this->params["id"]}";
                    $database = new DatabaseConnector();
                    $this->res["success"] = $database->getConnection()->query($query);
                    if ($this->res["success"] === TRUE) {
                        $this->res["message"] = "Edit success!";
                    } else {
                        $this->res["message"] = "ERROR: could not to edit user";
                    }
                } else {
                    $this->res["message"] = "ERROR: Nothing edit!";
                }
            } catch (Exception $e) {
                $this->response(500, $this->res);
            }
            $this->response(200, $this->res);
        }
    }

    function delete()
    {
        if ($this->method == "DELETE") {
            //TODO
        }
    }

    function login()
    {
        if ($this->method == "POST") {
            $database = new DatabaseConnector();
            $query = "select id, mobile from user where email = '" . $this->params["email"] . "' OR mobile = '" . $this->params["mobile"] . "'";
            error_log(print_r($query, true));
            $result = $database->getConnection()->query($query);
            $this->res["data"] = array();
            $num = $result->num_rows;
            try {
                if ($num > 0) {
                    $this->res["data"] = $result->fetch_assoc();
                    $this->res["success"] = true;
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            if ($this->res["success"])
                $this->response(200, $this->res);
            $this->response(200, $this->res);
        }
    }

    function autho()
    {
        if ($this->method == "POST") {
            $database = new DatabaseConnector();
            $query = "select * from user where id = " . $this->params["id"];
            error_log(print_r($query, true));
            $result = $database->getConnection()->query($query);
            $this->res["data"] = array();
            $num = $result->num_rows;
            try {
                if ($num > 0) {
                    $this->res["data"] = $result->fetch_assoc();
                    $passwordHash = encrypt($this->params["password"]);
                    if ($this->res["data"]["passwordHash"] == $passwordHash) {
                        $this->res["success"] = true;

                        //setup token
                        $jwt = $this->createJwt($this->res['data']["id"], $this->res["data"]["registeredAt"]);
                        $queryUpdate = "update user set jwt = '{$jwt}' where id = '{$this->params['id']}'";
                        $result = $database->getConnection()->query($queryUpdate);

                        $this->res["jwt"] = $jwt;
                    }
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            $this->res["data"] = [
                "id" => $this->res['data']['id'],
                "firstName" => $this->res['data']['firstName'],
                "middleName" => $this->res['data']['middleName'],
                "lastName" => $this->res['data']['lastName']
            ];
            if ($this->res["success"]) {
                $this->res["message"] = "Login success!";
                $this->response(200, $this->res);
            }
            $this->res["message"] = "ERROR: wrong password!";
            $this->response(200, $this->res);
        }
    }

    function checkJwt($jwt)
    {
        $database = new DatabaseConnector();
        $query = "select * from user where jwt = '{$jwt}'";
        $result = $database->getConnection()->query($query);
//        error_log(print_r($query, true));
        $data = array();
        $num = $result->num_rows;
        try {
            if ($num > 0) {
                $data = $result->fetch_assoc();
                return array(true, $data);
            }
        } catch (Exception $e) {
            error_log(print_r($e->getMessage(), true));
            return array(false, $data);
        }
        return array(false, $data);
    }

    function authoWithJwt()
    {
        if ($this->method == "POST") {
            try {

                $data = $this->checkJwt($this->params["jwt"]);
                $this->res['data'] = $data[1];
                $this->res['success'] = $data[0];
                $this->response(200, $this->res);
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
        }
    }

    function createJwt($id, $registeredAt) {
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
                "registeredAt" => $this->res["data"]["registeredAt"],
            )
        );
        $jwt = JWT::encode($token, $key);
        return $jwt;
    }

}

$user = new user();
