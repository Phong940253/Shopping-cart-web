<?php
include_once $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
echo '
<div class="header">
    <div class="container">
        <div class="middle_wrap">
            <div class="middle_left_container">
                <div class="logo_menu">
                    <div class="style_logo">
                        <a class="logo no-underline">
                            <b class="logo no-underline">
                                SHOP
                            </b>
                        </a>
                    </div>
                    <div class="style-wrapper">
                        <a class="menu-button">
                            <img class="hamburger-menu" src="/img/hamburger-menu.png" />
                            <div class="wrap">
                                <span>Danh Mục</span>
                                <span class="text-icon">
                                    Sản Phẩm
                                    <img src="/img/arow.png" />
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="form-search-root">
                    <div class="form-search-form">
                        <input type="text" data-view-id="main_search_form_input" placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn ..." class="form-search-input"></input>
                        <button data-view-id="main_search_form_button" class="form-search-button">
                            <img class="icon-search" src="/img/search.png" />
                            Tìm Kiếm
                        </button>
                    </div>
                </div>
            </div>
            <div class="header-user">
                <div class="header-account-container">
                    <img class="profile-icon" src="/img/profile.png" />
                    <span class="user-style-item-text">
                        <span class="user-style-no-wrap">
                            Đăng Nhập / Đăng Ký
                        </span>
                        <span class="account-label">
                            <span>
                                Tài Khoản
                            </span>
                            <img class="arrow-icon" src="/img/arow.png" />
                        </span>
                    </span>
                </div>
                <div class="header-user-shortcut-cart">
                    <a>
                        <div class="user-style-item">
                            <div class="cart-wrapper">
                                <img class="cart-icon" src="/img/cart.png" />
                                <span class="num-cart-item">0</span>
                            </div>
                            <span>Giỏ hàng</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_root"></div>
</div>
<script>
    $(document).ready(function(){
        $(".header-account-container").click(function(){
            $("#login-with-phone").load("/modules/login/login-with-phone.html")
            $("#login-with-email").empty();
            $("#login-with-pass").empty();
            $("div.loader").empty();
            $(".overlay").css("visibility", "visible");    
        })
        // hien menu dang nhap

        $(".btn-close").click(function () {
            $(".overlay").css("visibility", "collapse");
            $("#login-with-phone").empty();
            $("#login-with-email").empty();
            $("#login-with-pass").empty();
            $("div.loader").empty();
        })
        // dong menu dang nhap

        $(".style-login-with-phone").on("click", ".login-with-email", function () {
            $("#login-with-email").load("/modules/login/login-with-email.html");
            $("#login-with-phone").empty();
            $("#login-with-phone").empty();
        })
        // mo dang nhap voi email

        $("#login-with-email, #login-with-pass").on("click", ".btn-action", function () {
            $("#login-with-phone").load("/modules/login/login-with-phone.html")
            $("#login-with-email").empty();
            $("#login-with-pass").empty();
        })
        // mo dang nhap voi dien thoai

        $("#login-with-email, #login-with-pass").on("click", ".show-password, .hide-password", function () {
            var passwordId = $(this).parents(\'div:first\').find(\'input\').attr(\'id\');
            console.log(passwordId);
            if ($(this).hasClass(\'show-password\')) {
                $("#" + passwordId).attr("type", "text");
                $(this).parent().find(".show-password").hide();
                $(this).parent().find(".hide-password").show();
            } else {
                $("#" + passwordId).attr("type", "password");
                $(this).parent().find(".hide-password").hide();
                $(this).parent().find(".show-password").show();
            }
        })
        // an hien password
        
        $("#login-with-phone").on("submit", "#submitPhoneForm", function (e) {
            $("div.loader").load("/modules/load/loader.html")
            e.preventDefault(); // avoid to execute the actual submit of the form.
            let form = $("#submitPhoneForm");
            let url = form.attr("action");
            $("#login-with-phone").empty()
            $.ajax({
                type: form.attr("method"),
                url: url,
                data: form.serialize()
            }).always(function(data) {
                $("#login-with-email").empty();
                $("#login-with-phone").empty();
                $("div.loader").empty();
                let reponse = JSON.parse(data.responseText.substring(5));
                if (reponse["success"]) {
                    $("#login-with-pass").load("/modules/login/login-with-pass.html", () => {
                        $("div.heading p b").text(reponse["data"]["0"]["mobile"]);
                        $("#login-with-pass").on("submit", "#submitFormPassword", (e) => {
                             e.preventDefault();
                             let passwordHash = $("#submitFormPassword div.input input").val();
                             if (passwordHash == reponse["data"]["0"]["passwordHash"]) {
                                 setCookie("")
                             }
                        });
                    });
                } else {
                    $("#login-with-pass").load("/modules/login/login-with-pass.html");
                    alert("Failed!");
                }
            });
        });
            
        
    });
</script>
<div class="overlay">
    <div class="overlay-content">
        <div class="overlay-root">
            <button class="btn-close">
                <img src="/img/close-button.png"/>
            </button>
            <div class="style-left">
                <div id="login-with-email" class="style-login-with-email style-login"></div>
                <div id="login-with-phone" class="style-login-with-phone style-login"></div>
                <div id="login-with-pass" class="style-login-with-pass style-login"></div>
                <div class="loader" style="display: flex; align-items: center; flex: 1; flex-direction: column;"></div>
            </div>
            <div class="style-right">
                <img src="/img/icon.png" width="203">
                <div class="content">
                    <h4>Mua sắm tại Team-IT</h4>
                    <span>Siêu ưu đãi mỗi ngày</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/Login.js"></script>
';
