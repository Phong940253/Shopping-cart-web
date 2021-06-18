$(document).ready(function () {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiBan/ThongTin.html");
    $(".ThongTinTuyChon li a[class!='active']").click((e) => {
        $(".ThongTinTuyChon li .active").toggleClass("active");
        if (e.target.nodeName != "A") {
            $(e.target.parentElement).toggleClass("active");
        } else {
            $(e.target).toggleClass("active");
        }
        $(".Khung-ben-phai").empty();
    });
    $(".Thong-tin-tai-khoan").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiBan/ThongTin.html")
    })
    $(".Thong-bao-cua-toi").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiBan/ThongBaoShop.html")
    })
    $(".Quan-ly-san-pham").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiBan/QuanLySanPhamShop.html")
    })
    $(".Them-san-pham").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiBan/ThemSanPham.html")
    })
});
