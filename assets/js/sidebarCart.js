var btnMenu = document.querySelector(".btn__cart");
var btnClose = document.querySelector(".cart__btnClose");
var sidebar = document.querySelector(".cart__sidebar");
var body = document.getElementsByTagName("body")
var x = true;

btnMenu.addEventListener("click" , function(){
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