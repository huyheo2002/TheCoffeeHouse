<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                <tr>
                    <th scope="row" class="index-product">1</th>
                    <td class="image-product-wrap">
                        <img src="./assets/img/menu/BM1.jpg" alt="">
                    </td>
                    <td class="name-product">Bánh mì</td>
                    <td class="value-product">35đ</td>
                    <td class="count-product">2</td>
                </tr>
                <tr>
                    <th scope="row" class="index-product">2</th>
                    <td class="image-product-wrap">
                        <img src="./assets/img/menu/BM1.jpg" alt="">
                    </td>
                    <td class="name-product">Bánh mì 1</td>
                    <td class="value-product">22đ</td>
                    <td class="count-product">4</td>
                </tr>
                <tr>
                    <th scope="row" class="index-product">3</th>
                    <td class="image-product-wrap">
                        <img src="./assets/img/menu/BM1.jpg" alt="">
                    </td>
                    <td class="name-product">Bành mì 2</td>
                    <td class="value-product">125 đ</td>
                    <td class="count-product">1</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" scope="col">Tổng tiền thanh toán : <p class="sumValue" style="margin-bottom: 0;">180.000 đ</p></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="product__action">
        <div class="product__btnCancel">
            <a href="./menu.php">Thoát</a>
        </div>
        <div class="product__btnAddToCart" id="btnAddToCart">Thanh toán</div>                                    
    </div>
</body>
</html>