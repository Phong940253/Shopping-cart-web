<?php
class connect_db
{
    public static function getConnection()
    {
        //khai báo biến host
        $hostName = 'db4free.net';
        // khai báo biến username
        $userName = 'phong940253';
        //khai báo biến password
        $passWord = '01676940253';
        // khai báo biến databaseName
        $databaseName = 'phong940253';
        // khởi tạo kết nối
        $port = 3306;
        $connect = new mysqli($hostName, $userName, $passWord, $databaseName, $port);
        return $connect;
    }
    public static function closeConnection($link)
    {
        mysqli_close($link);
    }
}
?>