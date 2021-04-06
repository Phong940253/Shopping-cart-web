<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./vendor/jquery.min.js"></script>
</head>

<body>
    <?php
    include_once './vendor/autoload.php';
    require("./inc/header.php");
//    $connect = connect_db::getConnection();
//    connect_db::closeConnection($connect);
    ?>
    <script>
        $(document).ready(function(){
            $(".header-account-container").click(function(){
                $(".overlay").css("visibility", "visible");
            });
            $(".btn-close").click(function () {
                $(".overlay").css("visibility", "collapse");
            });
            // $(document).on("click", function(event){
            //     if(!$(event.target).closest(".overlay-content").length){
            //         $(".overlay").css("visibility", "collapse");
            //     }
            // });
        });
    </script>
    <div class="overlay">
        <div class="overlay-content">
            <div class="overlay-root">
                <button class="btn-close">
                    <img src="../img/close-button.png"/>
                </button>
                <div class="style-left">
                    <div class="style-login-with-email">
                        <div class="heading">
                            <h4>Đăng nhập bằng email</h4>
                            <p>Nhập email và mật khẩu tài khoản</p>
                        </div>
                        <form>
                            <div class="input input-fill">
                                <input type="email" name="email" placeholder="acb@email.com" value="">
                            </div>
                            <div class="input input-fill">
                                <input type="password" placeholder="Mật khẩu" value="">
                                <span class="show-pass">Hiện</span>
                            </div>
                            <button>Đăng nhập</button>
                        </form>
                        <p class="forgot-pass">Quên mật khẩu?</p>
                        <p class="create-account">
                            Chưa có tài khoản?
                            <span>Tạo tài khoản</span>
                        </p>
                    </div>
                </div>
                <div class="style-right">
                    <img src="../img/icon.png" width="203">
                    <div class="content">
                        <h4>Mua sắm tại Team-IT</h4>
                        <span>Siêu ưu đãi mỗi ngày</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>