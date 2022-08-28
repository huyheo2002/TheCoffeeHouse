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
                <li><a href="">
                    <div class="cart__imgWrap">
                        <img src="${currentObj.image}" alt="">
                    </div>
                    <div class="cart__info">
                        <h4 class="cart__info-title">${currentObj.title}</h4>
                        <p class="cart__info-value">${currentObj.value}</p>
                    </div>
                </a></li>     
            `,
            ""
        );
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
