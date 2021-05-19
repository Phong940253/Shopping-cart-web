<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class productCategory extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    function create()
    {
        if ($this->method == "POST") {
            $query = "INSERT INTO product_category value ({$this->params["productId"]}, {$this->params["categoryId"]})";
            $this->_submit_create_query($query);
        }
    }

    function getBy()
    {
        if ($this->method == "GET") {
            $query = "select * from category where";
            $dem = 0;
            foreach ($this->params as $key => $value) {
                if (!is_null($value)) {
                    $query .= " {$key}={$value} and";
                    $dem++;
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

$productCategory = new productCategory();
