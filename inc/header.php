<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
?>
<!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
<script src="/js/publicFunction.js"></script>
<div class="header-head">
    <div class="container-header">
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
                    <img class="profile-icon" src="/img/profile.png"/>
                    <span class="user-style-item-text">
                        <span class="user-style-no-wrap">
                            Đăng Nhập / Đăng Ký
                        </span>
                        <span class="account-label">
                            <span>
                                Tài Khoản
                            </span>
                            <img class="arrow-icon" src="/img/arow.png"/>
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
<script src="/js/autoLogin.js"></script>
<script src="/js/Autho.js"></script>

