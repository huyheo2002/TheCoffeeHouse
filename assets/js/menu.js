import * as data from "./DataLoader.js"
import { Cart } from "./Cart.js";
import { CoffeeVN } from "./Items/CoffeeVN.js";
import { MachineCoffee } from "./Items/MachineCoffee.js";
import { ColdBrew } from "./Items/ColdBrew.js";
import { FruitTea } from "./Items/FruitTea.js";
import { MacchiatoMilkTea } from "./Items/MacchiatoMilkTea.js";
import { GrindIce } from "./Items/GrindIce.js";
import { MatchaSocola } from "./Items/MatchaSocola.js";
import { SaltyCake } from "./Items/SaltyCake.js";
import { SweetCake } from "./Items/SweetCake.js";
import { Snack } from "./Items/Snack.js";
import { CoffeeAtHome } from "./Items/CoffeeAtHome.js";
import { TeaAtHome } from "./Items/TeaAtHome.js";



// CART 
let cart = new Cart();
var btnToggleCart = document.querySelector(".btn__cart");
var btnCloseCart = document.querySelector(".cart__btnClose");
var btnResetCart = document.querySelector(".cart__footer-btnReset");

btnToggleCart.onclick = function(){
    cart.toggle();
    cart.renderData();
};

btnCloseCart.onclick = function(){
    cart.close();
};
btnResetCart.addEventListener("click", function(){
    cart.reset();
    cart.close();
})

// SIDEBAR :v

// click sidebar show this list item it and hide list items other
// items in sidebar wrap subitems
const sidebarItemAll = document.querySelectorAll(".menu__itemsBlock");
// icon items in sidebar
const sidebarDotCoffee = document.querySelectorAll(".menu__dotCoffee");
// get text main in sidebar
const sidebarItemsTextAll = document.querySelectorAll(".menu__itemsBlock .menu__text");
// subitems in sidebar (get dot :V)
const sidebarSubItemAllDot = document.querySelectorAll(".menu__subnav-items");
// subitems in sidebar (text and show content)
const sidebarSubItemAll = document.querySelectorAll(".menu__subnav-items > a.menu__subnav-link");
const contentTitle = document.querySelectorAll(".title__itemTea");

var items = document.querySelectorAll(".itemsHot__list li");
// click items change color and show icon
// click items and show content
sidebarItemAll[0].addEventListener("click", function(){
    resetAll();
    loadAll();
    sidebarItemsTextAll[0].classList.add("glow");
    sidebarDotCoffee[0].classList.add("visible");
})

sidebarItemAll[1].addEventListener("click", function(){
    resetAll();    
    contentTitle[0].classList.remove("hide");
    sidebarItemsTextAll[1].classList.add("glow");
    sidebarDotCoffee[1].classList.add("visible");
    contentTitle[1].classList.remove("hide");
    contentTitle[2].classList.remove("hide");
    loadCoffeeVN();
    loadMachineCoffee();
    loadColdBrew();
})

sidebarItemAll[2].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[2].classList.add("glow");
    sidebarDotCoffee[2].classList.add("visible");
    contentTitle[3].classList.remove("hide");
    contentTitle[4].classList.remove("hide");
    loadFruitTea();
    loadMacchiatoMilkTea();    
})

sidebarItemAll[3].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[3].classList.add("glow");
    sidebarDotCoffee[3].classList.add("visible");
    contentTitle[5].classList.remove("hide");
    contentTitle[6].classList.remove("hide");
    loadMatchaSocola();
    loadGrindIce();   
})

sidebarItemAll[4].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[4].classList.add("glow");
    sidebarDotCoffee[4].classList.add("visible");
    contentTitle[7].classList.remove("hide");
    contentTitle[8].classList.remove("hide");
    contentTitle[9].classList.remove("hide");
    loadSaltyCake();
    loadSweetCake();
    loadSnack();   
})

sidebarItemAll[5].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[5].classList.add("glow");
    sidebarDotCoffee[5].classList.add("visible");
    contentTitle[10].classList.remove("hide");
    contentTitle[11].classList.remove("hide");
    loadCoffeeAtHome();
    loadTeaAtHome();  
})

// click subItems show content and glow text
sidebarSubItemAll[0].addEventListener("click", function(){
    // reset title and content all
    resetAll();
    // text(wrap subitems) main glow in sidebar
    sidebarItemsTextAll[1].classList.add("glow");
    // show icon text-main in sidebar
    sidebarDotCoffee[1].classList.add("visible");
    // text glow in sidebar
    sidebarSubItemAll[0].classList.add("glow");
    // dot glow in sidebar
    sidebarSubItemAllDot[0].classList.add("glow");
    // show title this content
    contentTitle[0].classList.remove("hide");
    // show items this content
    loadCoffeeVN();
})

sidebarSubItemAll[1].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[1].classList.add("glow");
    sidebarDotCoffee[1].classList.add("visible");
    sidebarSubItemAll[1].classList.add("glow");
    sidebarSubItemAllDot[1].classList.add("glow");    
    contentTitle[1].classList.remove("hide");
    loadMachineCoffee();
})

sidebarSubItemAll[2].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[1].classList.add("glow");
    sidebarDotCoffee[1].classList.add("visible");
    sidebarSubItemAll[2].classList.add("glow");
    sidebarSubItemAllDot[2].classList.add("glow");
    contentTitle[2].classList.remove("hide");
    loadColdBrew();
})

sidebarSubItemAll[3].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[2].classList.add("glow");
    sidebarDotCoffee[2].classList.add("visible");
    sidebarSubItemAll[3].classList.add("glow");
    sidebarSubItemAllDot[3].classList.add("glow");
    contentTitle[3].classList.remove("hide");
    loadFruitTea();
})

sidebarSubItemAll[4].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[2].classList.add("glow");
    sidebarDotCoffee[2].classList.add("visible");
    sidebarSubItemAll[4].classList.add("glow");
    sidebarSubItemAllDot[4].classList.add("glow");
    contentTitle[4].classList.remove("hide");
    loadMacchiatoMilkTea();
})

sidebarSubItemAll[5].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[3].classList.add("glow");
    sidebarDotCoffee[3].classList.add("visible");
    sidebarSubItemAll[5].classList.add("glow");
    sidebarSubItemAllDot[5].classList.add("glow");
    contentTitle[5].classList.remove("hide");
    loadGrindIce();
})

sidebarSubItemAll[6].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[3].classList.add("glow");
    sidebarDotCoffee[3].classList.add("visible");
    sidebarSubItemAll[6].classList.add("glow");
    sidebarSubItemAllDot[6].classList.add("glow");
    contentTitle[6].classList.remove("hide");
    loadMatchaSocola();
})

sidebarSubItemAll[7].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[4].classList.add("glow");
    sidebarDotCoffee[4].classList.add("visible");
    sidebarSubItemAll[7].classList.add("glow");
    sidebarSubItemAllDot[7].classList.add("glow");
    contentTitle[7].classList.remove("hide");
    loadSaltyCake();
})

sidebarSubItemAll[8].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[4].classList.add("glow");
    sidebarDotCoffee[4].classList.add("visible");
    sidebarSubItemAll[8].classList.add("glow");
    sidebarSubItemAllDot[8].classList.add("glow");
    contentTitle[8].classList.remove("hide");
    loadSweetCake();
})

sidebarSubItemAll[9].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[4].classList.add("glow");
    sidebarDotCoffee[4].classList.add("visible");
    sidebarSubItemAll[9].classList.add("glow");
    sidebarSubItemAllDot[9].classList.add("glow");
    contentTitle[9].classList.remove("hide");
    loadSnack();
})

sidebarSubItemAll[10].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[5].classList.add("glow");
    sidebarDotCoffee[5].classList.add("visible");
    sidebarSubItemAll[10].classList.add("glow");
    sidebarSubItemAllDot[10].classList.add("glow");
    contentTitle[10].classList.remove("hide");
    loadCoffeeAtHome();
})

sidebarSubItemAll[11].addEventListener("click", function(){
    resetAll();
    sidebarItemsTextAll[5].classList.add("glow");
    sidebarDotCoffee[5].classList.add("visible");
    sidebarSubItemAll[11].classList.add("glow");
    sidebarSubItemAllDot[11].classList.add("glow");
    contentTitle[11].classList.remove("hide");
    loadTeaAtHome();
})


// CONTENT :V

// Array map trong JavaScript là phương thức trong Array Object, có tác dụng xử lý tuần tự và tạo mảng mới từ các phần tử trong mảng ban đầu.
// arrObj.map( callback(value, index, array) )
let arrCoffeeVN = data.coffeeVN.map(
    (obj) => new CoffeeVN(obj.image, obj.title, obj.value)
);

let arrMachineCoffee = data.machineCoffee.map(
    (obj) => new MachineCoffee(obj.image, obj.title, obj.value)
);

let arrColdBrew = data.coldBrew.map(
    (obj) => new ColdBrew(obj.image, obj.title, obj.value)
);

let arrFruitTea = data.fruitTea.map(
    (obj) => new FruitTea(obj.image, obj.title, obj.value)
);

let arrMacchiatoMilkTea = data.macchiatoMilkTea.map(
    (obj) => new MacchiatoMilkTea(obj.image, obj.title, obj.value)
);

let arrGrindIce = data.grindIce.map(
    (obj) => new GrindIce(obj.image, obj.title, obj.value)
);

let arrMatchaSocola = data.matchaSocola.map(
    (obj) => new MatchaSocola(obj.image, obj.title, obj.value)
);

let arrSaltyCake = data.saltyCake.map(
    (obj) => new SaltyCake(obj.image, obj.title, obj.value)
);

let arrSweetCake = data.sweetCake.map(
    (obj) => new SweetCake(obj.image, obj.title, obj.value)
);

let arrSnack = data.snack.map(
    (obj) => new Snack(obj.image, obj.title, obj.value)
);

let arrCoffeeAtHome = data.coffeeAtHome.map(
    (obj) => new CoffeeAtHome(obj.image, obj.title, obj.value)
);

let arrTeaAtHome = data.teaAtHome.map(
    (obj) => new TeaAtHome(obj.image, obj.title, obj.value)
);

// func render

// load coffeeVN
const listItemsCoffeeVN = document.querySelectorAll(".itemsHot__list")[0];
function loadCoffeeVN() {
    listItemsCoffeeVN.innerHTML = arrCoffeeVN.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsCoffeeVNItems = listItemsCoffeeVN.children;

    for (let i = 0; i < listItemsCoffeeVNItems.length; i++) {
        let obj = arrCoffeeVN[i];
        listItemsCoffeeVNItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load cà phê máy :V
const listItemsMachineCoffee = document.querySelectorAll(".itemsHot__list")[1];
function loadMachineCoffee() {
    listItemsMachineCoffee.innerHTML = arrMachineCoffee.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsMachineCoffeeItems = listItemsMachineCoffee.children;

    for (let i = 0; i < listItemsMachineCoffeeItems.length; i++) {
        let obj = arrMachineCoffee[i];
        listItemsMachineCoffeeItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load cold brew :V
const listItemsColdBrew = document.querySelectorAll(".itemsHot__list")[2];
function loadColdBrew() {
    listItemsColdBrew.innerHTML = arrColdBrew.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsColdBrewItems = listItemsColdBrew.children;

    for (let i = 0; i < listItemsColdBrewItems.length; i++) {
        let obj = arrColdBrew[i];
        listItemsColdBrewItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load trà hoa quả :V
const listItemsFruitTea = document.querySelectorAll(".itemsHot__list")[3];
function loadFruitTea() {
    listItemsFruitTea.innerHTML = arrFruitTea.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsFruitTeaItems = listItemsFruitTea.children;

    for (let i = 0; i < listItemsFruitTeaItems.length; i++) {
        let obj = arrFruitTea[i];
        listItemsFruitTeaItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load trà sữa macchiato :V
const listItemsMacchiatoMilkTea = document.querySelectorAll(".itemsHot__list")[4];
function loadMacchiatoMilkTea() {
    listItemsMacchiatoMilkTea.innerHTML = arrMacchiatoMilkTea.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsMacchiatoMilkTeaItems = listItemsMacchiatoMilkTea.children;

    for (let i = 0; i < listItemsMacchiatoMilkTeaItems.length; i++) {
        let obj = arrMacchiatoMilkTea[i];
        listItemsMacchiatoMilkTeaItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load đá xay :V
const listItemsGrindIce = document.querySelectorAll(".itemsHot__list")[5];
function loadGrindIce() {
    listItemsGrindIce.innerHTML = arrGrindIce.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsGrindIceItems = listItemsGrindIce.children;

    for (let i = 0; i < listItemsGrindIceItems.length; i++) {
        let obj = arrGrindIce[i];
        listItemsGrindIceItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load matcha - socola :V
const listItemsMatchaSocola = document.querySelectorAll(".itemsHot__list")[6];
function loadMatchaSocola() {
    listItemsMatchaSocola.innerHTML = arrMatchaSocola.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsMatchaSocolaItems = listItemsMatchaSocola.children;

    for (let i = 0; i < listItemsMatchaSocolaItems.length; i++) {
        let obj = arrMatchaSocola[i];
        listItemsMatchaSocolaItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load bánh mặn :V
const listItemsSaltyCake = document.querySelectorAll(".itemsHot__list")[7];
function loadSaltyCake() {
    listItemsSaltyCake.innerHTML = arrSaltyCake.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsSaltyCakeItems = listItemsSaltyCake.children;

    for (let i = 0; i < listItemsSaltyCakeItems.length; i++) {
        let obj = arrSaltyCake[i];
        listItemsSaltyCakeItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load bánh ngọt :V
const listItemsSweetCake = document.querySelectorAll(".itemsHot__list")[8];
function loadSweetCake() {
    listItemsSweetCake.innerHTML = arrSweetCake.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsSweetCakeItems = listItemsSweetCake.children;

    for (let i = 0; i < listItemsSweetCakeItems.length; i++) {
        let obj = arrSweetCake[i];
        listItemsSweetCakeItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load snack :V
const listItemsSnack = document.querySelectorAll(".itemsHot__list")[9];
function loadSnack() {
    listItemsSnack.innerHTML = arrSnack.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsSnackItems = listItemsSnack.children;

    for (let i = 0; i < listItemsSnackItems.length; i++) {
        let obj = arrSnack[i];
        listItemsSnackItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load cà phê tại nhà :V
const listItemsCoffeeAtHome = document.querySelectorAll(".itemsHot__list")[10];
function loadCoffeeAtHome() {
    listItemsCoffeeAtHome.innerHTML = arrCoffeeAtHome.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsCoffeeAtHomeItems = listItemsCoffeeAtHome.children;

    for (let i = 0; i < listItemsCoffeeAtHomeItems.length; i++) {
        let obj = arrCoffeeAtHome[i];
        listItemsCoffeeAtHomeItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load trà tại nhà :V
const listItemsTeaAtHome = document.querySelectorAll(".itemsHot__list")[11];
function loadTeaAtHome() {
    listItemsTeaAtHome.innerHTML = arrTeaAtHome.reduce(
        (html, currentObj) => html += currentObj.render(), 
        ""
    );
    let listItemsTeaAtHomeItems = listItemsTeaAtHome.children;

    for (let i = 0; i < listItemsTeaAtHomeItems.length; i++) {
        let obj = arrTeaAtHome[i];
        listItemsTeaAtHomeItems.item(i).onclick = function() {
            cart.add(obj);
            cart.countItems();
            cart.renderData();
        }
    }
}

// load items khi vào trang
function loadAll(){
    loadCoffeeVN();
    loadMachineCoffee();
    loadColdBrew();
    loadFruitTea();
    loadMacchiatoMilkTea();
    loadMatchaSocola();
    loadSaltyCake();
    loadSweetCake();
    loadSnack();
    loadCoffeeAtHome();
    loadTeaAtHome();
    loadGrindIce();

    // load content title
    for(let i=0; i < contentTitle.length; i++){
        contentTitle[i].classList.remove("hide");
    }
}

function resetAll(){
    // reset content list items
    listItemsCoffeeVN.innerHTML = "";
    listItemsMachineCoffee.innerHTML = "";
    listItemsColdBrew.innerHTML = "";
    listItemsFruitTea.innerHTML = "";
    listItemsMacchiatoMilkTea.innerHTML = "";
    listItemsGrindIce.innerHTML = "";
    listItemsMatchaSocola.innerHTML = "";
    listItemsSaltyCake.innerHTML = "";
    listItemsSweetCake.innerHTML = "";
    listItemsSnack.innerHTML = "";
    listItemsCoffeeAtHome.innerHTML = "";
    listItemsTeaAtHome.innerHTML = "";

    // reset content title
    for(let i=0; i < contentTitle.length; i++){
        contentTitle[i].classList.add("hide");
    }

    // reset color sub-text in sidebar
    for(let i=0; i < sidebarSubItemAll.length; i++){
        sidebarSubItemAll[i].classList.remove("glow");
    }

    // reset dot glow in sidebar
    for(let i=0; i < sidebarSubItemAllDot.length; i++){
        sidebarSubItemAllDot[i].classList.remove("glow");
    }

    // reset text-main glow in sidebar
    for(let i=0; i< sidebarItemsTextAll.length; i++){
        sidebarItemsTextAll[i].classList.remove("glow");
    }

    // reset icon text-main in sidebar
    for(let i=0; i< sidebarDotCoffee.length; i++){
        sidebarDotCoffee[i].classList.remove("visible");
    }
    
}

// khi load trang
window.addEventListener("load", loadAll());

// SCROLL :v

// scroll content change glow items in sidebar
// const viewportWidth = document.documentElement.clientWidth;
// const viewportHeight = document.documentElement.clientHeight;
// console.log(viewportWidth + " view port width");
// console.log(viewportHeight + " view port width");

// console.log("get items h1");
// const topElement = contentTitle[0].getBoundingClientRect().top;
// const leftElement = contentTitle[0].getBoundingClientRect().left;
// const rightElement = contentTitle[0].getBoundingClientRect().right;
// const bottomElement = contentTitle[0].getBoundingClientRect().bottom;

// const widthElement = contentTitle[0].getBoundingClientRect().width;
// const heightElement = contentTitle[0].getBoundingClientRect().height;

// console.log(topElement + " top");
// console.log(leftElement + " left");
// console.log(rightElement + " right");
// console.log(bottomElement + " bottom");

// console.log(widthElement + " widthElement");
// console.log(heightElement + " heightElement");

// let a = window.scrollY;
// console.log(a);

// function resetScroll(){
//     // reset text-main glow in sidebar
//     for(let i=0; i< sidebarItemsTextAll.length; i++){
//         sidebarItemsTextAll[i].classList.remove("glow");
//     }

//     // reset icon text-main in sidebar
//     for(let i=0; i< sidebarDotCoffee.length; i++){
//         sidebarDotCoffee[i].classList.remove("visible");
//     }

//     // reset color sub-text in sidebar
//     for(let i = 0; i < sidebarSubItemAll.length; i++){
//         sidebarSubItemAll[i].classList.remove("glow");
//     }

//     // reset icon text-main in sidebar
//     for(let i=0; i< sidebarDotCoffee.length; i++){
//         sidebarDotCoffee[i].classList.remove("visible");
//     }

//     // reset dot glow in sidebar
//     for(let i=0; i < sidebarSubItemAllDot.length; i++){
//         sidebarSubItemAllDot[i].classList.remove("glow");
//     }
// }

// hỏng cm :v
// document.addEventListener("scroll", function(){
//     const viewportHeight = document.documentElement.clientHeight;    
//     for(let i = 0; i < contentTitle.length; i++){
//         const topElement = contentTitle[i].getBoundingClientRect().top;
//         const windowScrollY = window.scrollY;
//         // scroll in all items
//         // default
//         if(windowScrollY == 0){
//             resetScroll();
//             sidebarItemsTextAll[0].classList.add("glow");
//             sidebarDotCoffee[0].classList.add("visible");            
//         }

//         if(viewportHeight > topElement){
//             if(i == 0 || i == 1 || i == 2){
//                 resetScroll();
//                 // show dot glow : 
//                 if(i==0) sidebarSubItemAllDot[0].classList.add("glow");
//                 if(i==1) sidebarSubItemAllDot[1].classList.add("glow");
//                 if(i==2) sidebarSubItemAllDot[2].classList.add("glow");
//                 sidebarItemsTextAll[1].classList.add("glow");
//                 sidebarDotCoffee[1].classList.add("visible");
//             }
//             if(i == 3 || i == 4){
//                 resetScroll();         
//                 if(i==3) sidebarSubItemAllDot[3].classList.add("glow");
//                 if(i==4) sidebarSubItemAllDot[4].classList.add("glow");  
//                 sidebarItemsTextAll[2].classList.add("glow");
//                 sidebarDotCoffee[2].classList.add("visible");
//             }
//             if(i == 5 || i == 6){
//                 resetScroll();
//                 if(i==5) sidebarSubItemAllDot[5].classList.add("glow");
//                 if(i==6) sidebarSubItemAllDot[6].classList.add("glow");            
//                 sidebarItemsTextAll[3].classList.add("glow");
//                 sidebarDotCoffee[3].classList.add("visible");
//             }
//             if(i == 7 || i == 8 || i == 9){
//                 resetScroll();
//                 if(i==7) sidebarSubItemAllDot[7].classList.add("glow");
//                 if(i==8) sidebarSubItemAllDot[8].classList.add("glow");
//                 if(i==9) sidebarSubItemAllDot[9].classList.add("glow");
//                 sidebarItemsTextAll[4].classList.add("glow");
//                 sidebarDotCoffee[4].classList.add("visible");
//             }
//             if(i == 10 || i == 11){
//                 resetScroll();     
//                 if(i==10) sidebarSubItemAllDot[10].classList.add("glow");
//                 if(i==11) sidebarSubItemAllDot[11].classList.add("glow");      
//                 sidebarItemsTextAll[5].classList.add("glow");
//                 sidebarDotCoffee[5].classList.add("visible");
//             }
            
//             sidebarSubItemAll[i].classList.add("glow");
//         }        

//         // console.log(topElement + " top E");
//         // console.log(viewportHeight + " viewport height")
//     }
// })





