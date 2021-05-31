/**
 * Created by Sunda on 25/02/2020.
 */



(function ($) {
"use strict";




/*****************   Accordion ***********************/


var items = document.querySelectorAll(".accordion a");

function toggleAccordion() {
    this.classList.toggle("active");
    this.nextElementSibling.classList.toggle("active");
}

items.forEach(function (item) {
    return item.addEventListener("click", toggleAccordion);
});



/*****************   wombatSelect ***********************/




  var itemMenu = $('.menu-item-444 .dropdown-menu').children();

  $.each($(itemMenu), function (index, item) {

      $(item).html($(item).text());

  });


})(jQuery);