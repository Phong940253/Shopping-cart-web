<?php
class DatabaseConnector
{
    public $dbConnection = null;
    public function __construct()
    {
        $hostName = "us-cdbr-east-04.cleardb.com";
        $userName = "b322709dcd3c03";
        $passWord = "f2b49543";
        $databaseName = "heroku_d8ef7bf1662f8ca";
        $port = 3306;
        try {
            $this->dbConnection = new mysqli($hostName, $userName, $passWord, $databaseName, $port);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->dbConnection;
    }

    public function __destruct()
    {
        mysqli_close($this->dbConnection);
    }
}
?>