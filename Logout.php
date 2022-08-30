<?php
include './classes/User.php';

AUth::logout();
unset($_SESSION['message']);

if(isset($_SESSION['login_home'])){
    unset($_SESSION['login_home']);
    header("location:./home.php");
}
if(isset($_SESSION['login_Coffee'])){
    unset($_SESSION['login_Coffee']);
    header("location:./coffee.php");
}
if(isset($_SESSION['login_tea'])){
    unset($_SESSION['login_tea']);
    header("location:./tea.php");
}
if(isset($_SESSION['login_menu'])){
    unset($_SESSION['login_menu']);
    header("location:./menu.php");
}
if(isset($_SESSION['login_story'])){
    unset($_SESSION['login_story']);
    header("location:./story.php");
}
if(isset($_SESSION['login_shop'])){
    unset($_SESSION['login_shop']);
    header("location:./shop.php");
}
if(isset($_SESSION['login_KhaiTruong'])){
    unset($_SESSION['login_KhaiTruong']);
    header("location:./KhaiTruong.php");
}


?>  