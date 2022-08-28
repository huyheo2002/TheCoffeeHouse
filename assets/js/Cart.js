export class Cart {
    constructor() {
        this.arrData = [];
        this.isOpened = false;
    }

    add(obj) {
        this.arrData.push(obj);
    }

    renderData() {
        let dataList = document.querySelector(".cart__list");
        console.log(dataList);
        dataList.innerHTML = this.arrData.reduce(
            (html, currentObj) => html += `
                <li><a>
                    <div class="cart__imgWrap">
                        <img src="${currentObj.image}" alt="">
                    </div>
                    <div class="cart__info">
                        <h4 class="cart__info-title">${currentObj.title}</h4>
                        <p class="cart__info-value">${currentObj.value}</p>
                    </div>
                    <div class="cart__action">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </a></li>     
            `,
            ""
        );
    }

    reset() {
        let dataList = document.querySelector(".cart__list");
        let cartBadge = document.querySelector(".cart__badge");
        let count = document.querySelector(".cart__badge p");
        dataList.innerHTML = "";
        this.arrData = [];
        cartBadge.style.display = "none";
        count.innerHTML = `${this.arrData.length}`;

    }

    countItems() {
        let cartBadge = document.querySelector(".cart__badge");
        let count = document.querySelector(".cart__badge p");
        if(this.arrData.length <= 0){
            cartBadge.style.display = "none";
        }else{
            count.innerHTML = `${this.arrData.length}`;
            cartBadge.style.display = "block";
        }
    }
    // hỏng cm :V
    // deleteItem(index){
    //     let dataItems = document.querySelectorAll(".cart__list li");
    //     console.log(dataItems);
    //     for(let i=0; i<dataItems.length; i++){
    //         if(index == i){
    //             console.log("xóa đc :V");
    //             this.arrData.splice(i, 1);
    //         }
    //     }
    // }

    toggle() {
        if (this.isOpened) {
            this.close();
        } else {
            this.open();
        }
    }

    open() {
        this.renderData();
        
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
