const profilePerson = [
  "firstName", "middleName", "lastName", "mobile", "email", "intro", "gender",
];

const replaceInput = (input, span) => {
  if (input.val() != "") {
    if (typeof (span.attr("value")) == "undefined") {
      span.attr("value", span.html());
    }
    span.html("");
  } else {
    span.html(span.attr("value"));
  }
};

const loadData = () => {
  profilePerson.map((u, i) => {
    $("#" + u).val(user[u]);
    if (u != "gender" && u != "intro") {
      const input = $("#" + u);
      const span = input.next().children();
      replaceInput(input, span);
    }
  });
};

$(document).ready(function() {
  $(".Khung-ben-phai").on("input", (e) => {
    const input = $(e.target);
    const span = $(e.target).next().children();
    replaceInput(input, span);
  });

  $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/TaiKhoan.html", () => {
    process.then(() => {
      loadData();
    });
  });
  $(".ThongTinTuyChon li a[class!='active']").click((e) => {
    $(".ThongTinTuyChon li .active").toggleClass("active");
    if (e.target.nodeName != "A") {
      $(e.target.parentElement).toggleClass("active");
    } else {
      $(e.target).toggleClass("active");
    }
    $(".Khung-ben-phai").empty();
  });
  $(".Thong-bao-cua-toi").click(function() {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Thongbao.html");
  });
  $(".Thong-tin-tai-khoan").click(function() {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/TaiKhoan.html", () => {
      loadData();
    });
  });
  $(".Quan-ly-don-hang").click(function() {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/QuanLyDonHang.html");
  });
  $(".Dia-chi").click(function() {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Diachi.html");
  });
  $(".Khung-ben-phai").on("click", ".btn-8", () => {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/ThemDiachi.html");
  });
  $(".Nhan-xet").click(function() {
    $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Nhanxet.html");
  });
  // $(".PhanChung").on("click", ".btn-5", () => {
  //     $(".PhanChung").load("/")
  // })
  $(".Khung-ben-phai").on("click", "#update", (e) => {
    const form = new FormData();

    profilePerson.map((u, i) => {
      form.append(u, $("#" + u).val());
    });
    console.log(form);
    const settings = {
      "url": "localhost/api/user.php/edit",
      "method": "POST",
      "processData": false,
      "mimeType": "multipart/form-data",
      "contentType": false,
      "data": form,
    };

    // $.ajax(settings).then((response) => {
    //
    // });
  });
});


// $( ".Thong-bao-cua-toi" ).on( "click", function( event ) {
//     $(".Khung-ben-phai").load("/modules/QuanLyNguoiDung/Thongbao.html");
// });
