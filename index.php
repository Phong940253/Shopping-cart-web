<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include_once './vendor/autoload.php';
    require("./inc/header.php");
    $connect = connect_db::getConnection();
    connect_db::closeConnection($connect);
    ?>
</body>

</html>