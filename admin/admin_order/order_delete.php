<?php
include '/xampp/htdocs/TheCoffeeHouse/classes/User.php';
if(isset($_POST['confirm_cart_id'])) //nếu có tồn tại $_POST['id'] không
{
    $id=$_POST['confirm_cart_id'];
   

    $infor_cart_product =Auth::find_cart_with_id($id);

    $delete_cart_by_admin=[
        'email'=>$infor_cart_product['email'], 
        'time_order'=>$infor_cart_product['time_order']
    ];
    Auth::delete_cart_by_admin($delete_cart_by_admin);
    $delete_order = Auth::delete_order($id);
  
    header("location:./index.php");
}else{
    $_SESSION['message']="this order not found";

}