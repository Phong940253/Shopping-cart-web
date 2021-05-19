<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class product extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    function create()
    {
        if ($this->method == "POST") {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $database = new DatabaseConnector();
            $query = "INSERT INTO product (userId, title, metaTitle, slug, summary, type, sku, price, discount, quantity, shop, createdAt, startsAt, endsAt, content) VALUES (" . $this->params['userId'] . ", '" . $this->params['title'] . "', '" . $this->params['metaTitle'] . "', '" . $this->params['slug'] . "', '" . $this->params['summary'] . "', " . $this->params['type'] . ", '" . $this->params['sku'] . "', " . $this->params['price'] . ", " . $this->params['discount'] . ", " . $this->params['quantity'] . ", " . $this->params['shop'] . ", '" . date("Y-m-d H:i:s") . "', '" . $this->params['startsAt'] . "', '" . $this->params['endsAt'] . "', '" . $this->params['content'] . "')";
            try {
                $result = $database->getConnection()->query($query);
                if ($result) {
                    $this->res["success"] = true;
                    $this->res["message"] = "Create success!";
                } else {
                    $this->res["message"] = "ERROR: could not to insert user, $query";
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            $this->response(201, $this->res);
        }
    }

    function getall()
    {
        if ($this->method == "GET") {
            $database = new DatabaseConnector();
            $query = "select * from product";
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

    function edit()
    {
        //TODO
    }

    function delete()
    {
        //TODO
    }
}

$product = new product();
