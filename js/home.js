const site = 0;
const limit = 10;


$(document).ready(() => {
  const form = new FormData();
  form.append("start", site);
  form.append("end", site + limit);
  const settings = {
    "url": "/api/product.php/getall",
    "method": "POST",
    "processData": false,
    "mimeType": "multipart/form-data",
    "contentType": false,
    "data": form,
  };
  $.ajax(settings).then((response) => {
    const data = JSON.parse(response);
    console.log(typeof data);
    data.data.map((u, i) => {
      $.post("/modules/component/item.php", u, (reponse) =>{
        $(".list-product").append(reponse);
        const circle = document.querySelector(".color-option");
        circle.addEventListener("click", (e) => {
          const target = e.target;
          if (target.classList.contains("circle")) {
            circle.querySelector(".active").classList.remove("active");
            target.classList.add("active");
            document.querySelector(".main-images .active").classList.remove("active");
            document.querySelector(`.main-images .${target.id}`).classList.add("active");
          }
        });
      });
    });
  });


  // $(".list-product").load("", , () => {
  //
  // });
});
