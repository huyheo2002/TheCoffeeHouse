
<?php
include './classes/User.php';
if(isset($_POST['submit'])){
    $data_update_order = [
        'email' => $_SESSION['dataEmail'],
        'cart_status' => 'Thanh toán khi nhận hàng'
    ];
    Auth::update_order($data_update_order);
    header('location:./menu.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./pay.php">Back</a>
    <form action="" method="post">
        <button type="submit" name="submit">Xác nhận đơn hàng</button>
    </form>
    
</body>
</html>