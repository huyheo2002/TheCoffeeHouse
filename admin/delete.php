<?php
include "/xampp/htdocs/TheCoffeeHouse/classes/User.php";
if(isset($_POST['email'])) //nếu có tồn tại $_POST['email'] không
{
    $email=$_POST['email'];
    Auth::delete($email);
    $_SESSION['message']="Delete success";
    header("location:./admin.php");
    unset($_SESSION['message']);
}else{
    $_SESSION['message']="User not found";
    header("location:./admin.php");
    unset($_SESSION['message']);
}
        