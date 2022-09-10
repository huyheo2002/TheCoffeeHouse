class Cart {
    constructor() {
        this.isOpened = false;
    }

    toggle() {
        if (this.isOpened) {
            this.close();
        } else {
            this.open();
        }
    }

    open() {        
        if (this.isOpened) {
            return;
        }
        
        let sidebar = document.querySelector(".cart__sidebar");
        sidebar.style.display = "block";
        sidebar.style.right = "-405px";
        sidebar.animate(
            [
                {right: "0px"}
            ], 
            {
                duration: 1000
            }
        );

        setTimeout(function() {
            sidebar.style.display = "block";
            sidebar.style.right = "0"
        }, 1000);

        this.isOpened = true;
    }

    close() {
        if (!this.isOpened) {
            return;
        }

        let sidebar = document.querySelector(".cart__sidebar");
        sidebar.animate(
            [
                {right: "-405px"}
            ], 
            {
                duration: 1000
            }
        );
    
        setTimeout(function() {
            sidebar.style.display = "none";
        }, 1000);

        this.isOpened = false;
    }
}

// CART 
let cart = new Cart();
var btnToggleCart = document.querySelector(".btn__cart");
var btnCloseCart = document.querySelector(".cart__btnClose");
var btnResetCart = document.querySelector(".cart__footer-btnReset");

btnToggleCart.onclick = function(){
    cart.toggle();
};

btnCloseCart.onclick = function(){
    cart.close();
};

btnResetCart.addEventListener("click", function(){
    cart.close();
})

function showCart () {
    $.ajax({
        url: "./ajax/show-cart.php",
        method: "POST",
        data: {
            
        },
        success: function(data){
            var dataProducts = jQuery.parseJSON(data);
            // console.log(dataProducts);
            $(".cart__list").html("");
            
            dataProducts.forEach((product) => {
                let listItems = $(`
                    <li><a href="">
                        <div class="cart__imgWrap">
                            <img src="${product.image}" alt="">
                        </div>
                        <div class="cart__info">
                            <div class="cart__info-descProduct">
                                <h4 class="cart__info-title">${product.title}</h4>
                                <p class="cart__info-value">${product.value} đ</p>
                            </div>
                            <div class="cart__info-count">
                                ${product.count}
                            </div>                                                
                        </div>
                    </a></li>
                `)
                .appendTo($(".cart__list"));                                    
            })
            
        }
        
    });
}

function resetCart () {
    $.ajax({
        url: "./ajax/reset-cart.php",
        method: "POST",
        data: {
            
        },
        success: function(){                                  
            $(".cart__list").html("");
            $("#cart__badge").css("display", "none");
            $("#cart__badge .count").html("0");                                                                        
        }
    });
}

function addToCart (product_Id) {
    $.ajax({
        url: "./ajax/add-to-cart.php",
        method: "POST",
        data: {
            id: product_Id
        },
        success: function(data){
            var dataProducts = jQuery.parseJSON(data);
            let cnt = dataProducts.reduce((total, dataProduct) => (total + dataProduct.count), 0);
            $("#cart__badge .count").html(cnt);
            if(cnt >= 0){
                $("#cart__badge").css("display", "block");
            }else{
                $("#cart__badge").css("display", "none");
            }

            $("#cart__list").html("");
            // console.log($("#cart__list"));
            console.log(dataProducts);        
            dataProducts.forEach((product) => {
                // console.log(product);
                let listItems = $(`
                    <li><a href="">
                        <div class="cart__imgWrap">
                            <img src="${product.image}" alt="">
                        </div>
                        <div class="cart__info">
                            <div class="cart__info-descProduct">
                                <h4 class="cart__info-title">${product.title}</h4>
                                <p class="cart__info-value">${product.value} đ</p>
                            </div>
                            <div class="cart__info-count">
                                ${product.count}
                            </div>                                                
                        </div>
                    </a></li>
                `)
                .appendTo($(".cart__list"));                                    
            })
            
        }
    });
}

$(document).ready(() => {
    $.ajax({
        url: "./ajax/show-cart.php",
        method: "POST",
        data: {
            
        },
        success: function(data){
            var dataProducts = jQuery.parseJSON(data);
            let cnt = dataProducts.reduce((total, dataProduct) => (total + dataProduct.count), 0);
            $("#cart__badge .count").html(cnt);
            if(cnt >= 0){
                $("#cart__badge").css("display", "block");
            }else{
                $("#cart__badge").css("display", "none");
            }

            // $(".cart__list").html("");
            
            // dataProducts.forEach((product) => {
            //     let listItems = $(`
            //         <li><a href="">
            //             <div class="cart__imgWrap">
            //                 <img src="${product.image}" alt="">
            //             </div>
            //             <div class="cart__info">
            //                 <div class="cart__info-descProduct">
            //                     <h4 class="cart__info-title">${product.title}</h4>
            //                     <p class="cart__info-value">${product.value} đ</p>
            //                 </div>
            //                 <div class="cart__info-count">
            //                     ${product.count}
            //                 </div>                                                
            //             </div>
            //         </a></li>
            //     `)
            //     .appendTo($(".cart__list"));                                    
            // })
            
        }
        
    });
})





