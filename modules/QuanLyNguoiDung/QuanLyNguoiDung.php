<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/QuanLyNguoiDung.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/style.css"/>
    <script src="/lib/jquery.min.js"></script>
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/header.php";
?>
<script>
    $(document).ready(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/TaiKhoan.html");
        $(".ThongTinTuyChon li a[class!='active']").click((e) => {
            $(".ThongTinTuyChon li .active").toggleClass("active");
            if (e.target.nodeName != "A") {
                $(e.target.parentElement).toggleClass("active");
            } else {
                $(e.target).toggleClass("active");
            }
            $(".Khung-ben-phai").empty();
        });
    });
</script>
<div class="PhanChung">
    <div class="ThungChua">
        <div class="KhungChung">
            <aside class="MucTuyChon">
                <div class="TenNguoiDung">
                    <img src="/img/no_avatar.png"/>
                    <div class="info">
                        Tài khoản
                        <b></b>
                    </div>
                </div>
                <ul class="ThongTinTuyChon">
                    <li>
                        <a class="Thong-tin-tai-khoan active">
                            <img src="/img/info.svg" class="icon">
                            <span>Thông tin sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="Thong-bao-cua-toi">
                            <img class="icon" src="/img/Thong-bao.svg">
                            <span>Thông báo của tôi</span>
                        </a>
                    </li>
                    <li>
                        <a class="Quan-ly-don-hang">
                            <img class="icon" src="/img/Quan-li-don-hang.svg">
                            <span>Quản lý đơn hàng</span>
                        </a>
                    </li>
                    <li>
                        <a class="Dia-chi">
                            <img class="icon" src="/img/Dia-chi.svg">
                            <span>Địa chỉ</span>
                        </a>
                    </li>
                    <li>
                        <a class="Thong-tin-thanh-toan">
                            <img class="icon" src="/img/Thong-tin-thanh-toan.svg">
                            <span>Thông tin thanh toán</span>
                        </a>
                    </li>
                    <li>
                        <a class="Nhan-xet">
                            <img class="icon" src="/img/Nhan-xet.svg">
                            <span>Nhận xét sản phẩm đã mua</span>
                        </a>
                    </li>
                    <li>
                        <a class="San-pham-da-xem">
                            <img class="icon" src="/img/Da-xem.svg">
                            <span>Sản phẩm đã xem</span>
                        </a>
                    </li>
                    <li>
                        <a class="San-pham-yeu-thich">
                            <img class="icon" src="/img/like.svg">
                            <span>Sản phẩm yêu thích</span>
                        </a>
                    </li>
                    <li>
                        <a class="Mua-sau">
                            <img class="icon" src="/img/later.svg">
                            <span>Mua sau</span>
                        </a>
                    </li>
                    <li>
                        <a class="Hoi-dap">
                            <img class="icon" src="/img/Hoi-dap.svg">
                            <span>Hỏi đáp</span>
                        </a>
                    </li>
                    <li>
                        <a class="Ma-giam-gia">
                            <img class="icon" src="/img/Sale.svg">
                            <span>Mã giảm giá</span>
                        </a>
                    </li>
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
