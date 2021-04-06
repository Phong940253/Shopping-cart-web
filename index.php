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
//    $connect = connect_db::getConnection();
//    connect_db::closeConnection($connect);
    ?>
    <script>
        $(document).ready(function(){
            $(".header-account-container").click(function(){
                $(".overlay").css("visibility", "visible");
            });
            // hien menu dang nhap

            $(".btn-close").click(function () {
                $(".overlay").css("visibility", "collapse");
            });
            // dong menu dang nhap

            $(".login-with-email").click(function () {
                $(".style-login-with-phone").hide();
                $(".style-login-with-email").show();
            })
            // mo dang nhap voi email

            $(".btn-action").click(function () {
                $(".style-login-with-email").hide();
                $(".style-login-with-phone").show();
            })
            // mo dang nhap voi dien thoai

            $(".show-password, .hide-password").on('click', function() {
                var passwordId = $(this).parents('div:first').find('input').attr('id');
                console.log(passwordId);
                if ($(this).hasClass('show-password')) {
                    $("#" + passwordId).attr("type", "text");
                    $(this).parent().find(".show-password").hide();
                    $(this).parent().find(".hide-password").show();
                } else {
                    $("#" + passwordId).attr("type", "password");
                    $(this).parent().find(".hide-password").hide();
                    $(this).parent().find(".show-password").show();
                }
            });
            // an hien password

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
                    <div class="style-login-with-email style-login">
                        <button class="btn-action">
                            <img src="./img/action.png" alt="arrow">
                        </button>
                        <div class="heading">
                            <h4>Đăng nhập bằng email</h4>
                            <p>Nhập email và mật khẩu tài khoản</p>
                        </div>
                        <form>
                            <div class="input input-fill">
                                <input type="email" name="email" placeholder="acb@email.com" value="">
                            </div>
                            <div class="input input-fill">
                                <input type="password" placeholder="Mật khẩu" value="" id="password">
                                <span class="show-password">Hiện</span>
                                <span class="hide-password">Ẩn</span>
                            </div>
                            <button>Đăng nhập</button>
                        </form>
                        <p class="forgot-pass">Quên mật khẩu?</p>
                        <p class="create-account">
                            Chưa có tài khoản?
                            <span>Tạo tài khoản</span>
                        </p>
                    </div>
                    <div class="style-login-with-phone style-login">
                        <div class="heading">
                            <h4>Xin chào</h4>
                            <p>Đăng nhập hoặc tạo tài khoản</p>
                        </div>
                        <form>
                            <div class="input input-fill">
                                <input type="tel" name="tel" placeholder="Số điện thoại" value="">
                            </div>
                            <button>Tiếp tục</button>
                        </form>
                        <p class="login-with-email">Đăng nhập bằng email</p>
                        <div class="style-social">
                            <p class="social-heading">
                                <span>Hoặc tiếp tục bằng</span>
                            </p>
                            <ul class="social__items">
                                <li class="social__item">
                                    <img src="./img/facebook.png" alt="facebook">
                                </li>
                                <li class="social__item">
                                    <img src="./img/google.png" alt="google">
                                </li>

                            </ul>
                            <p class="note">Bằng việc tiếp tục, bạn đã chấp nhận
                                <a href="">điều khoản sử dụng</a>
                            </p>
                        </div>
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