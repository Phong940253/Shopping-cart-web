<?php
include_once './vendor/autoload.php';
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
                            <img class="hamburger-menu" src="../img/hamburger-menu.png" />
                            <div class="wrap">
                                <span>Danh Mục</span>
                                <span class="text-icon">
                                    Sản Phẩm
                                    <img src="../img/arow.png" />
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="form-search-root">
                    <div class="form-search-form">
                        <input type="text" data-view-id="main_search_form_input" placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn ..." class="form-search-input"></input>
                        <button data-view-id="main_search_form_button" class="form-search-button">
                            <img class="icon-search" src="../img/search.png" />
                            Tìm Kiếm
                        </button>
                    </div>
                </div>
            </div>
            <div class="header-user">
                <div class="header-account-container">
                    <img class="profile-icon" src="../img/profile.png" />
                    <span class="user-style-item-text">
                        <span class="user-style-no-wrap">
                            Đăng Nhập / Đăng Ký
                        </span>
                        <span class="account-label">
                            <span>
                                Tài Khoản
                            </span>
                            <img class="arrow-icon" src="../img/arow.png" />
                        </span>
                    </span>
                </div>
                <div class="header-user-shortcut-cart">
                    <a>
                        <div class="user-style-item">
                            <div class="cart-wrapper">
                                <img class="cart-icon" src="../img/cart.png" />
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
</div>';
