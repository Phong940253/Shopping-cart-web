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
  });
}

function loadDataForHeader(reponse) {
  $(".account-label span").text(reponse.data.firstName + " " + reponse.data.middleName + " " + reponse.data.lastName);
  $(".user-style-no-wrap").text("Tài khoản");
}
