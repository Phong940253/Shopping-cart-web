<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class productreview extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    protected $thamso = [
        "productId" => "",
        "parentId" => "",
        "title" => "",
        "rating" => "",
        "published" => "",
        "createdAt" => "",
        "publishedAt" => "",
        "content" => ""
    ];

    function create()
    {
        if ($this->method == "POST") {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $now = date("Y-m-d H:i:s");
            $this->thamso["published"] = empty($this->params["published"]) ? 1 : $this->params["published"];
            $this->thamso["publishedAt"] = ($this->thamso["published"] == 0) ? "NULL" : "'" . $now . "'";
            $query = "INSERT INTO product_review (";
            foreach ($this->thamso as $key => $value) {
                $query .= $key . ", ";
                if ($key != "published" && $key != "publishedAt") {
                    if ($key == "createdAt") {
                        $this->thamso[$key] = "'{$now}'";
                    } elseif ($key == "title" || $key == "content") {
                        $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "'{$this->params[$key]}'";
                    } else {
                        $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "{$this->params[$key]}";
                    }
                }
            }
            $query = substr($query, 0,-2) . ") VALUE (";
            foreach ($this->thamso as $value) {
                $query .= "{$value}, ";
            }
            $query = substr($query, 0,-2) . ")";
            $this->_submmit_create_query($query);
        }
    }

    function getBy()
    {
        if ($this->method == "GET") {
            $query = "select * from product_review where";
            $dem = 0;
            foreach ($this->params as $key => $value) {
                if (!empty($value)) {
                    if ($key == "title" || $key == "createdAt" || $key == "publishedAt" || $key == "content") {
                        $query .= " {$key}='{$value}' and";
                        $dem++;
                    } else {
                        $query .= " {$key}={$value} and";
                        $dem++;
                    }
                }
            }
            if ($dem > 0) {
                $query = substr($query, 0, -3);
            } else {
                $query = "select * from product_review";
            }
            $database = new DatabaseConnector();
            $this->res["data"] = array();
            $result = $database->getConnection()->query($query);
            try {
                while ($row = $result->fetch_assoc()) {
                    $this->res["data"][] = $row;
                }
                $this->res["success"] = true;
                $this->res["message"] = "Search success!";
            } catch (Exception $e) {
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

$productreview = new productreview();
