var menuitemsBlock = document.querySelectorAll(".menu__itemsBlock");
var menuItems = document.querySelectorAll(".menu__items");
var menuDotCoffee = document.querySelectorAll(".menu__dotCoffee");
var i;

// click sidebar show icon + change text color
function clickListMenu(item , dotCoffee){
    for( i = 0 ;i < menuItems.length ; i++){
        menuItems[i].className = menuItems[i].className.replace("menu__items menu__item-glow","menu__items")
    }
    document.getElementById(item).className += " menu__item-glow"
    for(i=0 ; i < menuDotCoffee.length ; i++){
        menuDotCoffee[i].className = menuDotCoffee[i].className.replace("menu__dotCoffee dotCoffee__original" , "menu__dotCoffee")
    }
    document.getElementById(dotCoffee).className += " dotCoffee__original"
}