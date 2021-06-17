<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <meta name="google-signin-client_id" content="684006131040-71e176oqhcvps4omhe3c6sc02qppnaal.apps.googleusercontent.com">
    <link rel="stylesheet" href="./css/style.css">
    <script src="lib/jquery.min.js"></script>
    <script src="lib/slick/slick.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css"/>
</head>

<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
?>
<script>
    $(document).ready(function () {
        $('.slick-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
</script>


<div class="slick-slider">
    <div><h3>1</h3></div>
    <div><h3>2</h3></div>
    <div><h3>3</h3></div>
    <div><h3>4</h3></div>
    <div><h3>5</h3></div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php';
?>
<!--    --><?php
//    include_once "./DatabaseConnector.php";
//    $Database = new DatabaseConnector();
//    echo "connect success";
//    ?>
</body>

</html>