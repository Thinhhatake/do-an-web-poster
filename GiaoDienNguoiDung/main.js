
window.onscroll = function() {myFunction()};
var header = document.getElementById("myHeader");
var menu_item = document.getElementById("menu_item");
var sticky = header.offsetTop;
var sticky2 = menu_item.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    menu_item.classList.add("sticky2");
  } else {
    header.classList.remove("sticky");
    menu_item.classList.remove("sticky2");
  }
}
