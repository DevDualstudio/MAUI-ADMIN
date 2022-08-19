var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
};

$(document).ready(function(){
  $( '.active').click(function(){
    $('.active').removeClass("active");
    $(this).addClass("active");
  });
});