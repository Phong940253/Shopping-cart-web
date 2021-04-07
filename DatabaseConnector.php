<?php
class DatabaseConnector
{
    private $dbConnection = null;
    public function __construct()
    {
        $hostName = getenv('DB_HOST');
        $userName = getenv('DB_USERNAME');
        $passWord = getenv('DB_PASSWORD');
        $databaseName = getenv('DB_DATABASE');
        $port = getenv('DB_PORT');
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