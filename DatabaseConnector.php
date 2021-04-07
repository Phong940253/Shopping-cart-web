<?php
class DatabaseConnector
{
    public $dbConnection = null;
    public function __construct()
    {
        $hostName = "db4free.net";
        $userName = "phong940253";
        $passWord = "01676940253";
        $databaseName = "phong940253";
        $port = 3306;
        try {
            $this->dbConnection = new mysqli($hostName, $userName, $passWord, $databaseName, $port);
        } catch (\mysqli_sql_exception $e) {
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