// function to set cookie
const setCookie = (cname, cvalue, exdays) => {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  const expires = `expires=${d.toUTCString()}`;
  document.cookie = `${cname}=${cvalue};${expires};path=/`;
};

// get or read cookie
const getCookie =(cname) => {
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
};

const howHomePage = ()=> {
  // validate jwt to verify access
  const jwt = getCookie("jwt");
  $.post("api/validate_token.php", JSON.stringify({jwt})).done((result) => {
  });
};

const loadDataForHeader = (reponse) => {
  $(".account-label span").text(reponse.data.firstName + " " + reponse.data.middleName + " " + reponse.data.lastName);
  $(".user-style-no-wrap").text("Tài khoản");
};

const checkValid = (phone) => {
  const regex = new RegExp("(84|0[3|5|7|8|9])+([0-9]{8})\\b", "g");
  return regex.test(phone);
};
