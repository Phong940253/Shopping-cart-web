const item = {
  "itemName": "Giày",
  "itemSummary": "Lorem ipsum dolor sit lorenm i amet, consectetur adipisicing elit. Eum, ea, ducimus!",
};


$(document).ready(() => {
  for (i = 0; i <= 5; i += 1) {
    $.post("/modules/component/item.php", item, (reponse) =>{
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
    // $(".list-product").load("", , () => {
    //
    // });
  }
});
