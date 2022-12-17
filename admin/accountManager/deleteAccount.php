<?php
require_once "../../classes/User.php";

if(isset($_POST['email'])) //nếu có tồn tại $_POST['email'] không
{
    $email=$_POST['email'];
    Auth::delete($email);
    $_SESSION['message']="Delete success";
    header("location:./index.php");
    unset($_SESSION['message']);
}else{
    $_SESSION['message']="User not found";
    header("location:./index.php");
    unset($_SESSION['message']);
}
        