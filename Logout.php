<?php
include './classes/User.php';

AUth::logout();
unset($_SESSION['message']);
unset( $_SESSION['message_login']);


unset($_SESSION['getDataInformation_fullName']);
unset( $_SESSION['getDataInformation_birthday']);
unset($_SESSION['getDataInformation_phoneNumber']);
unset($_SESSION['getDataInformation_email']);
unset($_SESSION['getDataInformation_sex'] );
unset($_SESSION['getDataInformation_address']);
unset($_SESSION['getDataInformation_username']);
unset($_SESSION['dataUser']);

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


if(isset($_SESSION['login_dashboard'])){
    unset($_SESSION['login_dashboard']);
    header("location:./home.php");
}






?>  