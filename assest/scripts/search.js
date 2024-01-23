function search() {
  let input = document.getElementById("inputSearch");
  let filter = input.value.toUpperCase();
  let ul = document.getElementById("cards");
  let li = ul.getElementsByClassName("card");

  // Перебирайте все элементы списка и скрывайте те, которые не соответствуют поисковому запросу
  for (let i = 0; i < li.length; i++) {
      let a = li[i].getElementsByTagName("a")[0];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
          li[i].style.display = "";
      } else {
          li[i].style.display = "none";
      }
  }
}

document.addEventListener('keypress', search);

function a2 () {
    document.location.href = "http://127.0.0.1:5500/Catalog_page.html";
}
document.addEventListener('keypress', a2);