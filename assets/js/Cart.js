export class Cart {
    constructor() {
        this.arrData = [];
        this.isOpened = false;

        this.reset();
    }

    reset() {
        this.arrData = [];
        this.renderData();
        this.countItems();
    }

    add(obj) {
        this.arrData.push(obj);
    }

    renderData() {
        let dataList = document.querySelector(".cart__list");
        let self = this;
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

        /**
         * @how Lấy rất nhiều action, sau đó gán onclick của nó :V 
         * cách này hơi bất ổn nhưng được cái dùng innerHTML như ở trên được    
         */
        let actionList = document.querySelectorAll(".cart__list .cart__action");
        actionList.forEach(
            (obj, index) => obj.onclick = () => self.deleteItem(index)
        );
    }

    countItems() {
        let cartBadge = document.querySelector(".cart__badge");
        let count = document.querySelector(".cart__badge p");
        
        if(this.arrData.length <= 0) {
            cartBadge.style.display = "none";
            // return;
        } else{
            count.innerHTML = `${this.arrData.length}`;
            cartBadge.style.display = "block";
        }

        
    }

    deleteItem(index){
        this.arrData.splice(index, 1);
        this.renderData();
    }

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
