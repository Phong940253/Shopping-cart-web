<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/QuanLyNguoiBan.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <script src="/lib/jquery.min.js"></script>
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
?>
<script src="/js/QuanLyNguoiBan.js"></script>
<!--<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'/>-->
<!--<script src="/js/Diachi.js"></script>-->
<div class="PhanChung">
    <div class="ThungChua">
        <div class="KhungChung">
            <aside class="MucTuyChon">
                <!--                <div class="TenNguoiBan">-->
                <!--                    <img src="/img/no_avatar.png"/>-->
                <!--                    <div class="info">-->
                <!--                        Tài khoản Shop-->
                <!--                        <b></b>-->
                <!--                    </div>-->
                <!--                    -->
                <!--                </div>-->
                <div style="margin-top: 5px; display: flex; justify-content: center; background: #fff">
                    <div class="card p-3">
                        <div style="display: flex; align-items: center; flex-direction: column">
                            <div style="flex-direction: row" class="TenNguoiBan">
                                <div class="avatar-wrapper">
                                    <img class="profile-pic" src="/img/no_avatar.png" />
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" type="file" accept="image/*"/>
                                </div>
                                Tên shop
                            </div>
                            <div style="color: #ffffff;margin-left: 3px; display: flex; flex-direction: row;width: 250px;  justify-content: space-evenly; margin-bottom: 10px;">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    <span>1.5k</span>
                                    <a id="btn-outline" >
                                        <svg height="30" width="120" xmlns="http://www.w3.org/2000/svg">
                                            <rect class="shape" height="30" width="120"></rect>
                                        </svg>
                                        <div class="text">Người theo dõi</div>
                                    </a>

<!--                                    <button style="border-radius: 4px"  class="custom-btn btn-4"><span>Người theo dõi</span></button>-->
                                </div>
                                <div style="display: flex; flex-direction: column; align-items: center">
                                    <span>500</span>
                                    <a id="btn-outline" >
                                        <svg height="30" width="120" xmlns="http://www.w3.org/2000/svg">
                                            <rect class="shape" height="30" width="120"></rect>
                                        </svg>
                                        <div class="text">Đang theo dõi</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="ThongTinTuyChon">
                    <li>
                        <a class="Thong-tin-tai-khoan active">
                            <img src="/img/info.svg" class="icon">
                            <span>Thông tin shop</span>
                        </a>
                    </li>
                    <li>
                        <a class="Thong-bao-cua-toi">
                            <img class="icon" src="/img/Thong-bao.svg">
                            <span>Thông báo của shop</span>
                        </a>
                    </li>
                    <li>
                        <a class="Quan-ly-san-pham">
                            <img class="icon" src="/img/Quan-li-don-hang.svg">
                            <span>Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="Them-san-pham">
                            <img class="icon" src="/img/new-product.svg">
                            <span>Thêm sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="Danh-muc-san-pham">
                            <img class="icon" src="/img/list.svg">
                            <span>Danh mục sản phẩm</span>
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <a class="Dia-chi">-->
<!--                            <img class="icon" src="/img/Dia-chi.svg">-->
<!--                            <span>Địa chỉ</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <!--                    <li>-->
                    <!--                        <a class="Thong-tin-thanh-toan">-->
                    <!--                            <img class="icon" src="/img/Thong-tin-thanh-toan.svg">-->
                    <!--                            <span>Thông tin thanh toán</span>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
                </ul>
            </aside>
            <div class="Khung-ben-phai"></div>
        </div>
    </div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php';
?>

</body>
</html>
