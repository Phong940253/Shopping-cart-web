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
    $(".Thong-bao-cua-toi").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Thongbao.html")
    })
    $(".Thong-tin-tai-khoan").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/TaiKhoan.html")
    })
    $(".Quan-ly-don-hang").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/QuanLyDonHang.html")
    })
    $(".Dia-chi").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Diachi.html")
    })
    $(".Khung-ben-phai").on("click", ".btn-8", () => {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/ThemDiachi.html")
    })
    $(".Nhan-xet").click(function () {
        $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Nhanxet.html")
    })
    // $(".PhanChung").on("click", ".btn-5", () => {
    //     $(".PhanChung").load("/")
    // })
});


// $( ".Thong-bao-cua-toi" ).on( "click", function( event ) {
//     $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Thongbao.html");
// });

