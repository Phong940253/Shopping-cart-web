<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./lib/jquery.min.js"></script>
</head>

<body>
    <?php
    include_once './vendor/autoload.php';
    require("./inc/header.php");
    ?>



    <div class="slider slider-nav">
        <div><h3>1</h3></div>
        <div><h3>2</h3></div>
        <div><h3>3</h3></div>
        <div><h3>4</h3></div>
        <div><h3>5</h3></div>
    </div>

    <?php
    include_once './inc/footer.php';
    ?>
<!--    --><?php
//    include_once "./DatabaseConnector.php";
//    $Database = new DatabaseConnector();
//    echo "connect success";
//    ?>
</body>

</html>