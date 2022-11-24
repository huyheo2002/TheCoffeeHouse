
<?php
include './classes/User.php';
// if(isset($_POST['submit'])){
//     $data_update_order = [
//         'email' => $_SESSION['dataEmail'],
//         'cart_status' => 'Thanh toán khi nhận hàng'
//     ];
//     Auth::update_order($data_update_order);

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    <a href="./pay.php">Back</a>
    <button id="btnPayPay">Xác nhận đơn hàng</button>
   


    <script>
        $(document).ready(function() {
            $("#btnPayPay").click(function() {                
                $.ajax({
                    url: "./ajax/reset-cart.php",
                    method: "POST",
                    data: {

                    },
                    success: function() {
                        alert("Đặt hàng thành công!");
                        <?php 
                    $data_update_order = [
                        'email' => $_SESSION['dataEmail'],
                        'cart_status' => 'Thanh toán khi nhận hàng'
                    ];
                    Auth::update_order($data_update_order);
                    Auth::update_cart_time($_SESSION['dataEmail']);
                    ?>
                        window.location.replace("./menu.php");
                    }
                });
            });

        })

    </script>
    

    
</body>

</html>