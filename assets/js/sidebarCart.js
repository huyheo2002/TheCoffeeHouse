var btnMenu = document.querySelector(".btn__cart");
var btnClose = document.querySelector(".cart__btnClose");
var sidebar = document.querySelector(".cart__sidebar");
var arrData = [];
var dataList = document.querySelector(".cart__list");
var body = document.getElementsByTagName("body")
var x = true;

function addToCart(obj) {
    arrData.push(obj);
}
btnMenu.addEventListener("click" , function(){
    dataList.innerHTML = arrData.reduce(
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
    console.log(dataList);
    x = !x;
    if(x){
        sidebar.animate([
            {right: "-405px"}
        ], {
            duration: 1000
        })

        setTimeout(function(){
            sidebar.style.display = "none";
            // sidebar.style.right = "-405px"
        },1000)
    } else{
        sidebar.style.display = "block";
        sidebar.style.right = "-405px"
        sidebar.animate([
            {right: "0px"}
        ], {
            duration: 1000
        })

        setTimeout(function(){
            sidebar.style.display = "block";
            sidebar.style.right = "0"
        },1000)
    }
})

btnClose.addEventListener("click" , function(){
    sidebar.animate([
        {right: "-405px"}
    ], {
        duration: 1000
    })

    setTimeout(function(){
        sidebar.style.display = "none";
    },1000)
})