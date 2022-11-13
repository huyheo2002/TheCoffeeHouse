<?php

include '/xampp/htdocs/TheCoffeeHouse/classes/User.php';

$email = null;
$time = null;

if ($_GET['email']) {
    $email = $_GET['email'];
    $time = $_GET['time'];
    $data_load_detail_order=['email'=>$email,'time'=>$time];
    $lists = Auth::load_detail_order( $data_load_detail_order);
} else {
    header("location:./admin_order.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Chi tiết đơn hàng</title>
    <style>
        th {
            text-align: center;
        }

        .table td,
        .table th {
            border: 1px solid #000;
        }

        .table thead th {
            border-bottom: 1px solid #000;
        }

        .title {
            padding: 15px 25px;
        }

        /* layout */
        .index-product {
            width: 15%;
            text-align: center;
        }

        .image-product-wrap {
            width: 10%;
            height: auto;
        }

        .image-product-wrap img {
            width: 100%;
            height: 100%;
        }

        .name-product {
            width: 40%;
        }

        .value-product {
            width: 20%;
        }

        .count-product {
            width: 15%;
            text-align: center;
        }

        .table td,
        .table th {
            vertical-align: unset;
        }

        .sumValue {
            display: inline-block;
            font-size: 16px;
            font-weight: 400;
        }

        /* action */
        .product__action {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .product__btnCancel,
        .product__btnAddToCart {
            width: 200px;
            height: 45px;
            line-height: 45px;
            text-align: center;
            background-color: #ea8025;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            border: #ea8025 1px solid;
            text-transform: uppercase;
            border-radius: 10px;
            cursor: pointer;
            transition: all linear 0.5s;
            user-select: none;
        }

        .product__btnCancel:hover,
        .product__btnAddToCart:hover {
            box-shadow: inset 200px 0 0 0 #fff;
            color: #ea8025;
        }

        .product__btnCancel a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .product__btnCancel:hover a {
            color: #ea8025;
        }

        h4 {
            text-align: center;
        }

        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body>
    <div class="product__btnCancel">
        <a href="./admin_order.php">Trở lại</a>
    </div>
    <h4 class="title">Danh sách sản phẩm</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Số thứ tự</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($lists as $list) {
                ?>
                    <tr>
                        <th scope="row" class="index-product"><?= $i++ ?></th>
                        <td class="image-product-wrap">
                            <img src="<?= $list["image"] ?>" alt="">
                        </td>
                        <td class="name-product"><?= $list["title"] ?></td>
                        <td class="value-product"><?= $list["value"] ?> đ</td>
                        <td class="count-product"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            
        </table>
    </div>
   

    <!-- <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= $_SESSION['price'] ?>" title="Link to Google.com" /> -->



</body>


</html>