
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
                loadDataForHeader(reponse);
                setCookie("jwt", reponse.jwt, 30);
                $(".overlay").css("visibility", "collapse");
              } else {
                $("#login-with-pass").load("/modules/login/login-with-pass.html");
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
    }).catch((e) => {
      $("div.loader").empty();
      $("#login-with-phone").load("/modules/login/login-with-phone.html");
      console.log(e);
    });
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
