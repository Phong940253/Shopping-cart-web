// function to set cookie
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  const expires = `expires=${d.toUTCString()}`;
  document.cookie = `${cname}=${cvalue};${expires};path=/`;
}

// get or read cookie
function getCookie(cname) {
  const name = `${cname}=`;
  const decodedCookie = decodeURIComponent(document.cookie);
  const ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === " ") {
      c = c.substring(1);
    }

    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function showHomePage() {
  // validate jwt to verify access
  const jwt = getCookie("jwt");
  $.post("api/validate_token.php", JSON.stringify({jwt})).done((result) => {

    // home page html will be here
  });

  // show login page on error will be here
}

$(document).ready(() => {
  $(".header-account-container").click(() => {
    $("#login-with-phone").load("modules/login/login-with-phone.html");
    $("#login-with-email").empty();
    $("#login-with-pass").empty();
    $("div.loader").empty();
    $(".overlay").css("visibility", "visible");
  });

  // hien menu dang nhap

  $(".btn-close").click(() => {
    $(".overlay").css("visibility", "collapse");
    $("#login-with-phone").empty();
    $("#login-with-email").empty();
    $("#login-with-pass").empty();
    $("div.loader").empty();
  });

  // dong menu dang nhap

  $(".style-login-with-phone").on("click", ".login-with-email", () => {
    $("#login-with-email").load("/modules/login/login-with-email.html");
    $("#login-with-phone").empty();
    $("#login-with-pass").empty();
  });

  // mo dang nhap voi email

  $("#login-with-email, #login-with-pass").on("click", ".btn-action", () => {
    $("#login-with-phone").load("/modules/login/login-with-phone.html");
    $("#login-with-email").empty();
    $("#login-with-pass").empty();
  });

  // mo dang nhap voi dien thoai

  $("#login-with-email, #login-with-pass").on("click", ".show-password, .hide-password", function() {
    const passwordId = $(this).parents("div:first").find("input").attr("id");
    console.log(passwordId);
    if ($(this).hasClass("show-password")) {
      $(`#${passwordId}`).attr("type", "text");
      $(this).parent().find(".show-password").hide();
      $(this).parent().find(".hide-password").show();
    } else {
      $(`#${passwordId}`).attr("type", "password");
      $(this).parent().find(".hide-password").hide();
      $(this).parent().find(".show-password").show();
    }
  });

  // an hien password

  $("#login-with-phone").on("submit", "#submitPhoneForm", (e) => {
    $("div.loader").load("/modules/load/loader.html");
    e.preventDefault(); // avoid to execute the actual submit of the form.
    const form = $("#submitPhoneForm");
    const url = form.attr("action");
    $("#login-with-phone").empty();
    $.ajax({
      type: form.attr("method"),
      url,
      data: form.serialize(),
    }).then((data) => {
      $("#login-with-email").empty();
      $("#login-with-phone").empty();
      $("div.loader").empty();
      console.log(data);
      const reponse = data;
      if (reponse.success) {
        $("#login-with-pass").load("/modules/login/login-with-pass.html", () => {
          $("div.heading p b").text(reponse.data.mobile);
          $("#login-with-pass").on("submit", "#submitFormPassword", (e) => {
            $("div.loader").load("/modules/load/loader.html");
            e.preventDefault();
            // create from data
            const data = new FormData($("#submitFormPassword")[0]);
            $("#login-with-pass").empty();
            data.append("id", reponse.data.id);
            console.log(data);
            $.ajax({
              type: "POST",
              url: "/api/user.php/autho",
              processData: false,
              contentType: false,
              data: data,
            }).then((reponse) => {
              $("div.loader").empty();
              if (reponse.success) {
                alert("Đăng nhập thành công!");
              } else {
                alert("sai tài khoản hoặc mặt khẩu!");
              }
            }).catch((e) => {
              alert("Có lỗi với hệ thống");
              $("div.loader").empty();
              $("#login-with-pass").load("/modules/login/login-with-pass.html");
              console.log(e);
            });
          });
        });
      } else {
        $("#login-with-phone").load("/modules/login/login-with-phone.html");
        alert("Không tồn tại tài khoản!");
      }
    }).catch((e)=> {
      $("div.loader").empty();
      $("#login-with-phone").load("/modules/login/login-with-phone.html");
      console.log(e);
    });
  });
});
