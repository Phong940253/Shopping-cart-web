const data = getCookie("jwt");
let user;
const formData = new FormData();
formData.append("jwt", data);
$.ajax({
  type: "POST",
  url: "/api/user.php/authoWithJwt",
  processData: false,
  contentType: false,
  data: formData,
}).then((response)=>{
  if (response.success) {
    user = response.data;
    console.log("login success");
    loadDataForHeader(response);
  } else {
    console.log("not login");
  }
}).catch((e) => {
  console.log(e);
});
