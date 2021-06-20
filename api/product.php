<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class product extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    protected $thamso = [
        "userId" => "",
        "title" => "",
        "metaTitle" => "",
        "slug" => "",
        "type" => "",
        "sku" => "",
        "price" => "",
        "discount" => "",
        "quantity" => "",
        "shop" => "",
        "createdAt" => "",
        "updatedAt" => "",
        "publishedAt" => "",
        "startsAt" => "",
        "endsAt" => "",
        "content" => "",
        "image" => ""
    ];

    function create()
    {
        if ($this->method == "POST") {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $query = "INSERT INTO product (";
            $now = date("Y-m-d H:i:s");
            $this->thamso["createdAt"] = "'{$now}'";
            $this->thamso["updatedAt"] = "'{$now}'";
            foreach ($this->thamso as $key => $value) {
                $query .= $key . ", ";
                if ($key != "createdAt" && $key != "updatedAt") {
                    if ($key == "userId" || $key == "type" || $key == "quantity" || $key == "shop") {
                        $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "{$this->params[$key]}";
                    } else {
                        $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "'{$this->params[$key]}'";
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

    function getall()
    {
        if ($this->method == "POST") {
            $query = "select * from product limit {$this->params["start"]}, {$this->params["end"]}";
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

$product = new product();
