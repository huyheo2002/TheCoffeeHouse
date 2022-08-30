
var isCheckLoginOrNotLogin = document.querySelector("a#navbarDropdown");
if(isCheckLoginOrNotLogin == null){
    // modal login
    // phần modal-login
    const loginHead = document.querySelector(".js-login")
    const modal = document.querySelector(".js-modal")
    const modalContainer = document.querySelector(".js-modalContainer")
    const modalClose =document.querySelector(".js-modal-close")

    // hàm hiển thị modal login (thêm class open vào modal)
    function showModalLogin () {
        modal.classList.add("open")
    }

    // hàm ẩn modal login (xóa class open khỏi của modal)
    function hideModalLogin () {
        modal.classList.remove("open")
    }

    // nghe hành vi click vào phần login trên header
    loginHead.addEventListener ("click",showModalLogin)

    // nghe hành vi click vào phần close trong modal
    modalClose.addEventListener ("click",hideModalLogin)

    modal.addEventListener("click",hideModalLogin )

    modalContainer.addEventListener ("click", function(event) {
        event.stopPropagation()
    })
}else{
    // btnExit header 
    var btnUser = document.querySelector("li.nav-item.dropdown");
    var btnInfoUser = document.querySelector("ul.dropdown-menu");
    var isCheckUser = false;

    btnUser.addEventListener("click", function(){
        isCheckUser = !isCheckUser;
        if(isCheckUser){
            btnInfoUser.style.display = "block";
        }else{
            btnInfoUser.style.display = "none";
        }
    })
}



