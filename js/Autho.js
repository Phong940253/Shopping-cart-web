closeLogin = () => {
  $(".overlay").css("visibility", "collapse");
  $("#login-with-phone").empty();
  $("#login-with-email").empty();
  $("#login-with-pass").empty();
  $("div.loader").empty();
};

const checkWrongPhone = (value) => {
  console.log("call wrong");
  const isWrong = !checkValid(value);
  if (isWrong) {
    $(".error-mess").text("Số điện thoại không đúng định dạng.");
  } else {
    $(".error-mess").empty();
  }
  return isWrong;
};

$(document).ready(() => {
  $(".header-account-container").hover(()=>{
    $(".user-dropdown").show();
  }, ()=>{
    $(".user-dropdown").hide();
  });

  $(".header-account-container").click(() => {
    $("#login-with-phone").load("modules/login/login-with-phone.html");
    $("#login-with-email").empty();
    $("#login-with-pass").empty();
    $("div.loader").empty();
    $(".overlay").css("visibility", "visible");
  });

  // hien menu dang nhap

  $(".btn-close").click(() => {
    closeLogin();
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

  $("#login-with-phone").on("input", (e) => {
    const value = $(e.target)[0].value;
    checkWrongPhone(value);
  });

  // an hien password

  $("#login-with-phone").on("submit", "#submitPhoneForm", (e) => {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    if (!checkWrongPhone($(".input-fill input")[0].value)) {
      $("div.loader").load("/modules/load/loader.html", () => {
        const form = $("#submitPhoneForm");
        const phone = $(".input-fill input")[0].value;
        console.log(phone);
        const url = form.attr("action");
        $("#login-with-phone").empty();
        $("#login-with-email").empty();
        $.ajax({
          type: form.attr("method"),
          url,
          data: form.serialize(),
        }).then((data) => {
          $("#login-with-phone").empty();
          $("div.loader").empty();
          const reponse = data;
          let method;
          if (reponse.success) {
            method = "login";
          } else {
            method = "create";
          }
          $("#login-with-pass").load("/modules/login/login-with-pass.html", () => {
            $("div.heading p b").text(reponse.data.mobile);
            if (method == "create") {
              $("div.heading p").text("Số điện thoại của bạn chưa đăng kí, vui lòng nhập mật khẩu để đăng kí tài khoản!");
              $("#submitFormPassword Button").html("Đăng Ký");
            }
            $("#login-with-pass").on("submit", "#submitFormPassword", (e) => {
              e.preventDefault();
              $("div.loader").load("/modules/load/loader.html", () => {
                // create from data
                const data = new FormData($("#submitFormPassword")[0]);
                let url;
                if (method == "create") {
                  url = "/api/user.php/create";
                  data.append("mobile", phone);
                  data.append("vendor", "0");
                  data.append("admin", "0");
                } else {
                  url = "/api/user.php/autho";
                  data.append("id", reponse.data.id);
                }
                $("#login-with-pass").empty();
                $.ajax({
                  type: "POST",
                  url: url,
                  processData: false,
                  contentType: false,
                  data: data,
                }).then((reponse) => {
                  $("div.loader").empty();
                  if (reponse.success) {
                    loadDataForHeader(reponse);
                    setCookie("jwt", reponse.jwt, 30);
                    $(".overlay").css("visibility", "collapse");
                  } else {
                    $("#login-with-pass").load("/modules/login/login-with-pass.html");
                    alert(method == "create" ? "thông tin nhập vào không hợp lệ!": "sai tài khoản hoặc mặt khẩu!");
                  }
                  $("#login-with-pass").off("submit", "#submitFormPassword" );
                }).catch((e) => {
                  alert("Có lỗi với hệ thống");
                  $("div.loader").empty();
                  $("#login-with-pass").load("/modules/login/login-with-pass.html", ()=>{
                    $("div.heading p").text("Số điện thoại của bạn chưa đăng kí, vui lòng nhập mật khẩu để đăng kí tài khoản!");
                    $("#submitFormPassword Button").html("Đăng Ký");
                  });
                  console.log(e);
                  $("#login-with-pass").off("submit", "#submitFormPassword" );
                });
              });
            });
          });
        }).catch((e) => {
          $("#login-with-phone").load("/modules/login/login-with-phone.html").then(() => {
            $("div.loader").empty();
          });
          console.log(e);
        });
      });
    }
  });
});

function onSignIn(googleUser) {
  const profile = googleUser.getBasicProfile();
  console.log("ID: " + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log("Name: " + profile.getName());
  console.log("Image URL: " + profile.getImageUrl());
  console.log("Email: " + profile.getEmail()); // This is null if the 'email' scope is not present.
}

function signOut() {
  const auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function() {
    console.log("User signed out.");
  });
}


// window.onLoadCallback = function() {
//   gapi.auth2.init({
//     client_id: "684006131040-71e176oqhcvps4omhe3c6sc02qppnaal.apps.googleusercontent.com",
//   });
//   gapi.signin2.render("g-signin2", {
//     "scope": "profile email openid",
//     "width": 200,
//     "height": 40,
//     "longtitle": true,
//     "theme": "dark",
//     "onsuccess": function(googleUser) {
//       console.log("Logged in as: " + googleUser.getBasicProfile().getName());
//     },
//     "onfailure": function(e) {
//       console.warn("Google Sign-In failure: " + e.error);
//     },
//   });
// };
