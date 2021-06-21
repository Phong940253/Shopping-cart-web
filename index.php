<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!--    <meta name="google-signin-client_id" content="684006131040-71e176oqhcvps4omhe3c6sc02qppnaal.apps.googleusercontent.com">-->
    <link rel="stylesheet" href="/css/style.css">
    <script src="/lib/jquery.min.js"></script>
    <script src="/lib/slick/slick.js"></script>
    <script src="/js/serviceworker.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="/lib/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/lib/slick/slick-theme.css"/>
    <link href="/vendor/components/font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
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

<div>
    <div class="slick-slider bg-dark w-75 mx-5" style="height: 125px;">
        <div><h4 class="p-0"><img src="/img/poster0.png"></h4></div>
        <div><h4 class="p-0"><img src="/img/poster1.png"></h4></div>
        <div><h4 class="p-0"><img src="/img/poster2.png"></h4></div>
        <div><h4 class="p-0"><img src="/img/poster3.png"></h4></div>
        <div><h4 class="p-0"><img src="/img/poster4.png"></h4></div>
    </div>
    <div class="m-3">
        <div class="m-5">
            <div class="box-shadow border today-suggestion d-flex justify-content-center">
                    GỢI Ý HÔM NAY
            </div>
            <div class="d-flex flex-row ">
                <div class="box-shadow suggest-item">
                    Dành cho bạn
                </div>
                <div class="box-shadow suggest-item">
                    Hàng mới
                </div>
            </div>
        </div>
        <div class="list-product d-flex flex-row flex-wrap justify-content-center">

        </div>
    </div>
    <script src="/js/home.js">
    </script>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php';
?>
<!--    --><?php
//    include_once "./DatabaseConnector.php";
//    $Database = new DatabaseConnector();
//    echo "connect success";
//    ?>
<script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>