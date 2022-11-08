<?php
    require_once "./classes/DB.php";

    // kiểm tra session đã bắt đầu chưa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    // json_encode($_SESSION["cart"]);

    $productIds = implode(",", $_SESSION["cart"]);

    $sql = "select id, image, title, value from products where id in (". $productIds .")";

    $products = DB::execute($sql);

    $countProducts = array_count_values($_SESSION["cart"]);
    $arrProduct = array_map(function($value, $key) use($products) {
        foreach($products as $product) {
            if ($product["id"] == $key) {
                return [
                    "id" => $product["id"],
                    "title" => $product["title"],
                    "image" => $product["image"],
                    "value" => $product["value"],
                    "count" => $value
                ];
            }
        }
    }, $countProducts, array_keys($countProducts));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Thanh toán</title>
    <style>
        th{
            text-align: center;
        }

        .table td, .table th {
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

        .image-product-wrap img{
            width: 100%;
            height: 100%;
        }

        .name-product{
            width: 40%;
        }

        .value-product{
            width: 20%;
        }

        .count-product{
            width: 15%;
            text-align: center;
        }

        .table td, .table th {
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

        .product__btnCancel, .product__btnAddToCart{
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

        .product__btnCancel:hover, .product__btnAddToCart:hover{
            box-shadow: inset 200px 0 0 0 #fff;
            color: #ea8025;
        }

        .product__btnCancel a{
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .product__btnCancel:hover a {
            color: #ea8025;
        }
    </style>
</head>
<body>
    <h4 class="title">Thanh toán sản phẩm</h4>
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
                    foreach($arrProduct as $product){
                ?>
                        <tr>
                            <th scope="row" class="index-product"><?= $i++ ?></th>
                            <td class="image-product-wrap">
                                <img src="<?= $product["image"] ?>" alt="">
                            </td>
                            <td class="name-product"><?= $product["title"] ?></td>
                            <td class="value-product"><?= $product["value"] ?> đ</td>
                            <td class="count-product"><?= $product["count"] ?></td>
                        </tr>
                <?php
                    }
                ?>                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" scope="col">Tổng tiền thanh toán : <p class="sumValue" style="margin-bottom: 0;"><?= array_reduce($arrProduct, fn($total, $item) => ($total + $item["value"] * $item["count"]) )?> đ</p></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="product__action" style="margin-bottom: 35px">
        <div class="product__btnCancel">
            <a href="./menu.php">Thoát</a>
        </div>
        <div class="product__btnAddToCart" id="btnPayPay">
            Thanh toán
        </div>                                    
    </div>
    
    <script>
        $(document).ready(function() {
            $("#btnPayPay").click(function(){
                $.ajax({
                    url: "./ajax/reset-cart.php",
                    method: "POST",
                    data: {
                        
                    },
                    success: function(){                                  
                       alert("Thanh toán thành công");
                       window.location.replace("./menu.php");                                               
                    }
                });
            });
            
        })
    </script>
</body>
</html>