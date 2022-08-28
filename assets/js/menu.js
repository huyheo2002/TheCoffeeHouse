import { Cart } from "./Cart.js";
import { CoffeeVN } from "./Items/CoffeeVN.js";
import { MachineCoffee } from "./Items/MachineCoffee.js";
import { ColdBrew } from "./Items/ColdBrew.js";

// CART 
let cart = new Cart();
var btnToggleCart = document.querySelector(".btn__cart");
var btnCloseCart = document.querySelector(".cart__btnClose");

btnToggleCart.onclick = function(){
    cart.renderData();
    cart.toggle();
};
btnCloseCart.onclick = function(){
    cart.close();
};

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
console.log(items)
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

// render html
// array items
// cà phê việt nam
let dataCoffeeVN = [
    {
        image: "./assets/img/menu/CPVN1.jpg",
        title: "Bạc Sỉu Đá",
        value: "29.000 đ"
    },
    {
        image: "./assets/img/menu/CPVN2.jpg",
        title: "Bạc Sỉu Nóng",
        value: "35.000 đ"
    },
    {
        image: "./assets/img/menu/CPVN3.jpg",
        title: "Cà Phê Đen Đá",
        value: "29.000 đ"
    },
    {
        image: "./assets/img/menu/CPVN4.jpg",
        title: "Cà Phê Đen Nóng",
        value: "35.000 đ"
    },
    {
        image: "./assets/img/menu/CPVN5.jpg",
        title: "Cà Phê Sữa Đá",
        value: "29.000 đ"
    },
    {
        image: "./assets/img/menu/CPVN6.jpg",
        title: "Cà Phê Sữa Đá Chai Fresh 250ml",
        value: "79.000 đ"
    },
    {
        image: "./assets/img/menu/CPVN7.jpg",
        title: "Cà Phê Sữa Nóng",
        value: "35.000 đ"
    }

];
let arrCoffeeVN = dataCoffeeVN.map(
    (obj) => new CoffeeVN(obj.image, obj.title, obj.value)
);

// cà phê máy
let dataMachineCoffee = [
    {
        image: "./assets/img/menu/CPM1.jpg",
        title: "Latte Táo Lê Quế Nóng",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/CPM2.jpg",
        title: "Latte Táo Lê Quế Đá",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/CPM3.jpg",
        title: "Latte Táo Lê Quế Chai Fresh 500ml",
        value: "109.000 đ"
    },
    {
        image: "./assets/img/menu/CPM4.jpg",
        title: "Mocha Nóng",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/CPM5.jpg",
        title: "Mocha Đá",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/CPM6.jpg",
        title: "Espresso Nóng",
        value: "40.000 đ"
    },
    {
        image: "./assets/img/menu/CPM6.jpg",
        title: "Espresso Đá",
        value: "45.000 đ"
    },
    {
        image: "./assets/img/menu/CPM9.jpg",
        title: "Cappuccino Đá",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/CPM10.jpg",
        title: "Americano Nóng",
        value: "40.000 đ"
    },
    {
        image: "./assets/img/menu/CPM11.jpg",
        title: "Latte Đá",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/CPM12.jpg",
        title: "Caramel Macchiato Nóng",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/CPM13.jpg",
        title: "Caramel Macchiato Đá",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/CPM14.jpg",
        title: "Latte Nóng",
        value: "40.000 đ"
    },
    {
        image: "./assets/img/menu/CPM15.jpg",
        title: "Americano Đá",
        value: "40.000 đ"
    }
    

];
let arrMachineCoffee = dataMachineCoffee.map(
    (obj) => new MachineCoffee(obj.image, obj.title, obj.value)
);

// Coldbrew
let dataColdBrew = [
    {
        image: "./assets/img/menu/CB1.jpg",
        title: "Cold Brew Sữa Tươi",
        value: "45.000 đ"
    },
    {
        image: "./assets/img/menu/CB2.jpg",
        title: "Cold Brew Truyền Thống",
        value: "45.000 đ"
    }

]
let arrColdBrew = dataColdBrew.map(
    (obj) => new ColdBrew(obj.image, obj.title, obj.value)
)

// Trà trái cây
let arrFruitTea = [
    {
        image: "./assets/img/menu/TTC1.jpeg",
        title: "Trà Dưa Đào Sung Túc",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/TTC2.jpeg",
        title: "Trà Sen Nhân Sum Vầy",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/TCC3.jpg",
        title: "Trà Long Nhãn Hạt Chia",
        value: "45.000 đ"
    },
    {
        image: "./assets/img/menu/TCC4.jpg",
        title: "Trà Long Nhãn Hạt Chia Nóng",
        value: "52.000 đ"
    },
    {
        image: "./assets/img/menu/TCC5.jpg",
        title: "Trà Hạt Sen Đá",
        value: "45.000 đ"
    },
    {
        image: "./assets/img/menu/TCC6.jpg",
        title: "Trà Hạt Sen Nóng ",
        value: "52.000 đ"
    },
    {
        image: "./assets/img/menu/TCC7.jpg",
        title: "Trà Đào Cam Sả Đá",
        value: "45.000 đ"
    },
    {
        image: "./assets/img/menu/TCC8.jpg",
        title: "Trà Đào Cam Sả Nóng",
        value: "52.000 đ"
    },
    {
        image: "./assets/img/menu/TCC9.jpg",
        title: "Trà Đào Cam Sả Chai Fresh 500ml",
        value: "109.000 đ"
    }
]

// Trà sữa macchiato
let arrMacchiatoMilkTea = [
    {
        image: "./assets/img/menu/TSM1.jpg",
        title: "Caramel Macchiato Đá",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/TSM2.jpg",
        title: "Hồng Trà Latte Macchiato",
        value: "55.000 đ"
    },
    {
        image: "./assets/img/menu/TSM3.jpg",
        title: "Hồng Trà Sữa Nóng",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/TSM4.jpg",
        title: "Hồng Trà Sữa Trân Châu",
        value: "55.000 đ"
    },
    {
        image: "./assets/img/menu/TSM5.jpg",
        title: "Latte Táo Lê Quế Đá",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/TSM6.jpg",
        title: "Trà Đen Macchiato ",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/TSM7.jpg",
        title: "Trà Sữa Mắc Ca Trân Châu Trắng",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/TSM8.jpg",
        title: "Trà Sữa Masala Chai Nóng",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/TSM9.jpg",
        title: "Trà Sữa Masala Chai Trân Châu Chai Fresh 500ml",
        value: "109.000 đ"
    },
    {
        image: "./assets/img/menu/TSM10.jpeg",
        title: "Trà Sữa Masala Chai Trân Châu Đá",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/TSM11.jpg",
        title: "Trà Sữa Oolong Nướng Nóng",
        value: "50.000 đ"
    },
    {
        image: "./assets/img/menu/TSM12.jpg",
        title: "Trà Sữa Oolong Nướng Chân Châu",
        value: "55.000 đ"
    },
    {
        image: "./assets/img/menu/TSM13.jpg",
        title: "Trà Sữa Oolong Nướng Trân Châu Chai 500ml",
        value: "99.000 đ"
    }
]

// Đá xay
let arrGrindIce = [
    {
        image: "./assets/img/menu/DX1.jpg",
        title: "Cà Phê Đá Xay",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/DX2.jpg",
        title: "Chanh Sả Đá Xay",
        value: "49.000 đ"
    },
    {
        image: "./assets/img/menu/DX3.jpg",
        title: "Chocolate Đá Xay",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/DX4.jpg",
        title: "Cookie Đá Xay",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/DX5.jpg",
        title: "Đào Việt Quất Đá Xay",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/DX6.jpg",
        title: "Matcha Đá Xay ",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/DX7.jpg",
        title: "Sinh Tố Việt Quất",
        value: "59.000 đ"
    }
]

// matcha - socola
let arrMatchaSocola = [
    {
        image: "./assets/img/menu/MCSCL1.jpg",
        title: "Chocolate Đá",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/MCSCL2.jpg",
        title: "Chocolate Đá Xay",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/MCSCL3.jpg",
        title: "Chocolate Nóng",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/MCSCL4.jpg",
        title: "Matcha Đá Xay",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/MCSCL5.jpg",
        title: "Matcha Latte Đá",
        value: "59.000 đ"
    },
    {
        image: "./assets/img/menu/MCSCL6.jpg",
        title: "Matcha Latte Nóng ",
        value: "59.000 đ"
    }
]

// bánh mặn
let arrSaltyCake = [
    {
        image: "./assets/img/menu/BM1.jpg",
        title: "Bánh Mì Que Pate",
        value: "12.000 đ"
    },
    {
        image: "./assets/img/menu/BM2.jpg",
        title: "Bánh Mì Que Pate Cay",
        value: "12.000 đ"
    },
    {
        image: "./assets/img/menu/BM3.jpg",
        title: "Bánh Mì VN Thịt Nguội",
        value: "29.000 đ"
    },
    {
        image: "./assets/img/menu/BM4.jpg",
        title: "Chà Bông Phô Mai",
        value: "32.000 đ"
    },
    {
        image: "./assets/img/menu/BM5.jpg",
        title: "Croissant Trứng Muối",
        value: "35.000 đ"
    }
]

// bánh ngọt
let arrSweetCake = [
    {
        image: "./assets/img/menu/BN1.jpg",
        title: " Mochi Kem Dừa Dứa",
        value: "19.000 đ"
    },
    {
        image: "./assets/img/menu/BN2.jpg",
        title: "Mochi Kem Phúc Bồn Tử",
        value: "19.000 đ"
    },
    {
        image: "./assets/img/menu/BN3.jpg",
        title: "Mochi Kem Việt Quất",
        value: "19.000 đ"
    },
    {
        image: "./assets/img/menu/BN4.jpg",
        title: "Mochi Kem Xoài",
        value: "19.000 đ"
    },
    {
        image: "./assets/img/menu/BN5.jpg",
        title: "Mouse Gấu Chocolate",
        value: "39.000 đ"
    },
    {
        image: "./assets/img/menu/BN6.jpg",
        title: "Mouse Passion Cheese",
        value: "29.000 đ"
    },
    {
        image: "./assets/img/menu/BN7.jpg",
        title: "Mouse Red Velvet",
        value: "29.000 đ"
    },
    {
        image: "./assets/img/menu/BN8.jpg",
        title: "Mouse Tiramisu",
        value: "32.000 đ"
    }
]

// snack
let arrSnack = [
    {
        image: "./assets/img/menu/SN1.jpg",
        title: "Mít Sấy",
        value: "20.000 đ"
    }
]

// cà phê tại nhà
let arrCoffeeAtHome = [
    {
        image: "./assets/img/menu/CPTN1.jpeg",
        title: "Cà Phê Rang Xay Original 1 Túi 1KG",
        value: "235.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN2.jpg",
        title: "Cà Phê Rang Xay Original 1250gr",
        value: "60.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN3.jpeg",
        title: "Cà Phê Hòa Tan Đậm Vị Việt Túi 40x16G",
        value: "99.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN4.jpg",
        title: "Cà Phê Sữa Đá Hòa Tan Hộp 10 gói",
        value: "44.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN5.jpg",
        title: "Cà Phê Sữa Đá Hòa Tan Đậm Vị Hộp 18 gói x 16gr",
        value: "48.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN6.jpg",
        title: "Cà Phê Sữa Đá Hòa Tan Túi 25 x 22gr",
        value: "99.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN7.jpg",
        title: "Cà Phê Rich Finish Gu Đậm Tinh Tế 350gr",
        value: "90.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN8.jpg",
        title: "Cà Phê Peak Flavor Hương Thơm Đỉnh Cao 350gr",
        value: "90.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN9.jpg",
        title: "Cà Phê Arabica",
        value: "100.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN10.jpg",
        title: "Cà Phê Sữa đá Pack 6 lon",
        value: "84.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN11.jpg",
        title: "Thùng 24 Lon Cà Phê Sữa Đá",
        value: "269.000 đ"
    },{
        image: "./assets/img/menu/CPTN12.jpg",
        title: "Combo Quà Tết 2022",
        value: "321.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN13.jpg",
        title: "Combo 3 Hộp Cà Phê Sữa Đá Hòa Tan Đậm vị Hộp 18 gói x 16gr",
        value: "109.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN14.jpg",
        title: "Combo 3 Hộp Cà Phê Sữa Đá Hòa Tan",
        value: "109.000 đ"
    },
    {
        image: "./assets/img/menu/CPTN15.jpg",
        title: "Combo 2 Cà Phê Rang Xay Original 1250gr",
        value: "99.000 đ"
    }
]

// trà tại nhà
let arrTeaAtHome = [
    {
        image: "./assets/img/menu/TTN1.jpg",
        title: "Combo Quà Tết 2022",
        value: "321.000 đ"
    },
    {
        image: "./assets/img/menu/TTN2.jpg",
        title: "Giftset Trà Tearoma",
        value: "169.000 đ"
    },
    {
        image: "./assets/img/menu/TTN3.jpg",
        title: "Combo 3 hoopj trà Lài Túi Lọc Tearoma",
        value: "69.000 đ"
    },
    {
        image: "./assets/img/menu/TTN4.jpg",
        title: "Combo 3 hộp trà Sen túi lọc Tearoma",
        value: "69.000 đ"
    },
    {
        image: "./assets/img/menu/TTN5.jpg",
        title: "Combo 3 hộp trà Đào túi lọc Tearoma",
        value: "69.000 đ"
    },
    {
        image: "./assets/img/menu/TTN6.jpg",
        title: "Combo 3 hộp trà Oolong túi lọc Tearoma",
        value: "69.000 đ"
    },
    {
        image: "./assets/img/menu/TTN7.jpg",
        title: "Trà Đào Túi Lọc Tearoma 20 x 2gr",
        value: "28.000 đ"
    },
    {
        image: "./assets/img/menu/TTN8.jpg",
        title: "Trà Lài Túi Lọc Tearoma 20 x 2gr",
        value: "28.000 đ"
    },
    {
        image: "./assets/img/menu/TTN9.jpg",
        title: "Trà Oolong Túi lọc Tearoma 20 x 2gr",
        value: "28.000 đ"
    },
    {
        image: "./assets/img/menu/TTN10.jpg",
        title: "Trà Sen Túi Lọc Tearoma 20 x 2gr",
        value: "28.000 đ"
    },
    {
        image: "./assets/img/menu/TTN11.jpg",
        title: "Trà Xanh Lá Tearoma 100gr",
        value: "75.000 đ"
    },{
        image: "./assets/img/menu/TTN12.jpg",
        title: "Trà Sen Lá Tearoma 100gr",
        value: "80.000 đ"
    },
    {
        image: "./assets/img/menu/TTN13.jpg",
        title: "Trà Oolong Lá Tearoma 100gr",
        value: "100.000 đ"
    },
    {
        image: "./assets/img/menu/TTN14.jpg",
        title: "Trà Lài Lá Tearoma 100gr",
        value: "80.000 đ"
    }
]

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
            cart.open();
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
            cart.open();
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
            cart.open();
        }
    }
}

// load trà hoa quả :V
const listItemsFruitTea = document.querySelectorAll(".itemsHot__list")[3];
function loadFruitTea() {
    listItemsFruitTea.innerHTML = "";
    for (let i = 0; i < arrFruitTea.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrFruitTea[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrFruitTea[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrFruitTea[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsFruitTea.innerHTML += str;
    }
}

// load trà sữa macchiato :V
const listItemsMacchiatoMilkTea = document.querySelectorAll(".itemsHot__list")[4];
function loadMacchiatoMilkTea() {
    listItemsMacchiatoMilkTea.innerHTML = "";
    for (let i = 0; i < arrMacchiatoMilkTea.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrMacchiatoMilkTea[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrMacchiatoMilkTea[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrMacchiatoMilkTea[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsMacchiatoMilkTea.innerHTML += str;
    }
}

// load đá xay :V
const listItemsGrindIce = document.querySelectorAll(".itemsHot__list")[5];
function loadGrindIce() {
    listItemsGrindIce.innerHTML = "";
    for (let i = 0; i < arrGrindIce.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrGrindIce[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrGrindIce[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrGrindIce[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsGrindIce.innerHTML += str;
    }
}

// load matcha - socola :V
const listItemsMatchaSocola = document.querySelectorAll(".itemsHot__list")[6];
function loadMatchaSocola() {
    listItemsMatchaSocola.innerHTML = "";
    for (let i = 0; i < arrMatchaSocola.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrMatchaSocola[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrMatchaSocola[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrMatchaSocola[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsMatchaSocola.innerHTML += str;
    }
}

// load bánh mặn :V
const listItemsSaltyCake = document.querySelectorAll(".itemsHot__list")[7];
function loadSaltyCake() {
    listItemsSaltyCake.innerHTML = "";
    for (let i = 0; i < arrSaltyCake.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrSaltyCake[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrSaltyCake[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrSaltyCake[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsSaltyCake.innerHTML += str;
    }
}

// load bánh ngọt :V
const listItemsSweetCake = document.querySelectorAll(".itemsHot__list")[8];
function loadSweetCake() {
    listItemsSweetCake.innerHTML = "";
    for (let i = 0; i < arrSweetCake.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrSweetCake[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrSweetCake[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrSweetCake[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsSweetCake.innerHTML += str;
    }
}

// load snack :V
const listItemsSnack = document.querySelectorAll(".itemsHot__list")[9];
function loadSnack() {
    listItemsSnack.innerHTML = "";
    for (let i = 0; i < arrSnack.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrSnack[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrSnack[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrSnack[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsSnack.innerHTML += str;
    }
}

// load cà phê tại nhà :V
const listItemsCoffeeAtHome = document.querySelectorAll(".itemsHot__list")[10];
function loadCoffeeAtHome() {
    listItemsCoffeeAtHome.innerHTML = "";
    for (let i = 0; i < arrCoffeeAtHome.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrCoffeeAtHome[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrCoffeeAtHome[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrCoffeeAtHome[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsCoffeeAtHome.innerHTML += str;
    }
}

// load cà phê tại nhà :V
const listItemsTeaAtHome = document.querySelectorAll(".itemsHot__list")[11];
function loadTeaAtHome() {
    listItemsTeaAtHome.innerHTML = "";
    for (let i = 0; i < arrTeaAtHome.length; i++) {
        let str = `
            <li><a href="">
                <div class="itemHot__imgWrap">
                    <img src="${arrTeaAtHome[i].image}" alt="">
                </div>
                <div class="itemHot__content">
                    <h3 class="itemHot__title">
                        ${arrTeaAtHome[i].title}
                    </h3>
                    <p class="itemHot__value">
                        ${arrTeaAtHome[i].value}
                    </p>
                </div>
            </a></li>
        `;
        listItemsTeaAtHome.innerHTML += str;
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





