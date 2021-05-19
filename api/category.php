<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/api/restful.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/DatabaseConnector.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class category extends restful_api
{
    function __construct()
    {
        parent::__construct();
    }

    protected $thamso = [
        "parentId" => "",
        "title" => "",
        "metaTitle" => "",
        "slug" => "",
        "content" => ""
    ];

    function create()
    {
        if ($this->method == "POST") {
            $query = "INSERT INTO category (";
            foreach ($this->thamso as $key => $value) {
                $query .= $key . ", ";
                if ($key == "parentId") {
                    $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "{$this->params[$key]}";
                } else {
                    $this->thamso[$key] = (is_null($this->params[$key])) ? "NULL" : "'{$this->params[$key]}'";
                }

            }
            $query = substr($query, 0, -2) . ") VALUE (";
            foreach ($this->thamso as $value) {
                $query .= "{$value}, ";
            }
            $query = substr($query, 0, -2) . ")";
            $this->_submmit_create_query($query);
        }
    }

    function getBy()
    {
        if ($this->method == "GET") {
            $query = "select * from category where";
            $dem = 0;
            foreach ($this->params as $key => $value) {
                if (!empty($value)) {
                    if ($key == "parentId") {
                        $query .= " {$key}={$value} and";
                        $dem++;
                    } else {
                        $query .= " {$key}='{$value}' and";
                        $dem++;
                    }
                }
            }
            if ($dem > 0) {
                $query = substr($query, 0, -3);
            } else {
                $query = "select * from category";
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

$category = new category();
