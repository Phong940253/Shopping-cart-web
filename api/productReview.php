<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class productReview extends restful_api
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
            $this->thamso["published"] = is_null($this->params["published"]) ? 1 : $this->params["published"];
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
            $this->_submit_create_query($query);
        }
    }

    function getBy()
    {
        if ($this->method == "GET") {
            $query = "select * from product_category where";
            $dem = 0;
            foreach ($this->params as $key => $value) {
                if (!is_null($value)) {
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
                $query = "select * from product_category";
            }
            $this->_submit_search_query($query);
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

$productreview = new productReview();
