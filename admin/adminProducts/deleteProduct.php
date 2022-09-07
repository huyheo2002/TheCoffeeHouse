<?php
include '/xampp/htdocs/TheCoffeeHouse/classes/User.php';
if(isset($_POST['id'])) //nếu có tồn tại $_POST['email'] không
{
    $id=$_POST['id'];
    Auth::deleteProduct($id);
    $_SESSION['message']="Delete success";
    header('location:./adminProduct.php');
    unset($_SESSION['message']);
}else{
    $_SESSION['message']="product not found";
    header('location:./adminProduct.php');
    unset($_SESSION['message']);
}
        