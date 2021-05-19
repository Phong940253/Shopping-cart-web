<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class productreview extends restful_api
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
            $now = date("Y-m-d H:i:s");
            $published = empty($this->params["published"]) ? 1 : $this->params["published"];
            $publishAt = ($published == 0) ? "NULL" : "'" . $now . "'";
            $parentId = empty($this->params["parentId"]) ? "NULL" : $this->params["parentId"];
            $query = "INSERT INTO product_review (productId, parentId, title, rating, published, createdAt, publishedAt, content, userId) VALUES ({$this->params['productId']}, {$parentId}, '{$this->params['title']}', {$this->params['rating']}, {$published}, '{$now}', {$publishAt}, '{$this->params['content']}', {$this->params['userId']})";
            error_log(print_r($query, true));
            try {
                $result = $database->getConnection()->query($query);
                if ($result) {
                    $this->res["success"] = true;
                    $this->res["message"] = "Create success!";
                } else {
                    $this->res["message"] = "ERROR: could not to insert product review, $query";
                }
            } catch (Exception $e) {
                error_log(print_r($e->getMessage(), true));
                $this->response(500, $this->res);
            }
            $this->response(201, $this->res);
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
