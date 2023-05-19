<?php
require_once "./classes/DB.php";

include './classes/User.php';
// kiểm tra session đã bắt đầu chưa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

// json_encode($_SESSION["cart"]);

$productIds = implode(",", $_SESSION["cart"]);

if (strlen($productIds) == 0) $productIds = "-1";
// var_dump($productIds);
// die;

$sql = "select id, image, title, value from products where id in (" . $productIds . ")";

$products = DB::execute($sql);

$countProducts = array_count_values($_SESSION["cart"]);
// var_dump($countProducts);
// die;
$arrProduct = array_map(function ($value, $key) use ($products) {
    foreach ($products as $product) {
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
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Thanh toán</title>
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

        /* fix modal :v */
        .modal__body {
            margin-top: 20px;
        }

        .modal__body_codeOrder {
            color: #191919;
            padding: 5px 0;
            text-align: center;
        }

        .modal__body_codeOrderimp {
            color: #ea8025;
            letter-spacing: 3px;
        }

        .modal__btnPayWrapper {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .modal__bodyOrderSuccess {
            width: 150px;
            height: 150px;
            margin: auto;
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
                foreach ($arrProduct as $product) {
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
                    <th colspan="5" scope="col">Tổng tiền thanh toán : <p class="sumValue" style="margin-bottom: 0;"><?= array_reduce($arrProduct, fn ($total, $item) => ($total + $item["value"] * $item["count"])) ?> đ</p>
                    </th>
                    <!-- ++ gs -->
                    <?php $_SESSION['price'] = array_reduce($arrProduct, fn ($total, $item) => ($total + $item["value"] * $item["count"])); ?>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- <h4>Chọn phương thức thanh toán</h4> -->
    <div class="product__action" style="margin-bottom: 35px">
        <div class="product__btnCancel">
            <a href="./home.php">Thoát</a>
        </div>

        <div class="product__btnAddToCart js-login">
            Đặt hàng
        </div>

        <a href="./online_pay.php">
            <div class="product__btnAddToCart">
                Thanh toán Online
            </div>
        </a>
    </div>

    <!-- Modal -->
    <div class="modal js-modal">
        <div class="modal__container js-modalContainer">
            <div class="modal__header">
                <div class="modal__header__title">
                    Xác nhận đơn hàng
                </div>
                <!-- head để img nếu thích :v -->
                <!-- <img src="./assets/img/base/modalLogin-loginhead.png" alt=""> -->
            </div>

            <!-- <div class="modal__close js-modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="clear"></div> -->

            <div class="modal__body">
                <!-- <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                    <img src="./assets/img/payTick.png" alt="" class="modal__bodyOrderSuccess">
                </div> -->

                <form action="./pay.php" method="post">
                    <label for="modal-user" class="modal__label">
                        <i class="fas fa-user"></i>
                        Địa chỉ nhận hàng:
                    </label>
                    <input id="modal-user" name="address" type="text" class="modal__input-user" placeholder="Vui lòng nhập địa chỉ nhận hàng">
                    <div id="emailHelp" class="text-danger">
                        <span><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                    </div>

                    <label for="modal-pass" class="modal__label">
                        <i class="fas fa-key"></i>
                        Số điện thoại người nhận:
                    </label>
                    <input id="modal-pass" name="phone" type="number" class="modal__input-pass" placeholder="Vui lòng nhập số điện thoại">
                    <div class="text-danger">
                        <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                    </div>
                </form>

                <h4 class="modal__body_codeOrder">Hãy xác nhận lại đơn hàng của bạn</h4>
                <h4 class="modal__body_codeOrder">
                    Mã đơn hàng của bạn là:
                    <span class="modal__body_codeOrderimp">
                        <?= $codeOrder = rand(100000, 999999) ?>
                    </span>
                </h4>
                <h4 class="modal__body_codeOrder">
                    Tổng tiền thanh toán của bạn là:
                    <span class="modal__body_codeOrderimp">
                        <?= array_reduce($arrProduct, fn ($total, $item) => ($total + $item["value"] * $item["count"])) ?> VNĐ
                    </span>
                </h4>

                <div class="modal__btnPayWrapper">
                    <button class="modal__login js-modal-close" id="btnCancel" type="submit" name="submit" style="margin-right: 10px">
                        Hủy
                    </button>

                    <button class="modal__login" id="btnConfirm" type="submit" name="submit" style="margin-left: 10px">
                        Xác nhận
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal order -->
    <div class="modal js-modalConfirm">
        <div class="modal__container js-modalContainerConfirm">
            <div class="modal__header">
                <div class="modal__header__title">
                    Đặt hàng thành công
                </div>
            </div>

            <div class="modal__body">
                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                    <img src="./assets/img/shipper.png" alt="" class="modal__bodyOrderSuccess">
                </div>

                <h4 class="modal__body_codeOrder">Đơn hàng của bạn đang được giao vui lòng chờ trong chốc lát</h4>
                <h4 class="modal__body_codeOrder">
                    Mã đơn hàng của bạn là:
                    <span class="modal__body_codeOrderimp">
                        <?= $codeOrder ?>
                    </span>
                </h4>
                <h4 class="modal__body_codeOrder">
                    Tổng tiền thanh toán của bạn là:
                    <span class="modal__body_codeOrderimp">
                        <?= array_reduce($arrProduct, fn ($total, $item) => ($total + $item["value"] * $item["count"])) ?> VNĐ
                    </span>
                </h4>

                <div class="modal__btnPayWrapper">
                    <button class="modal__login js-modal-close" id="btnReturn" type="submit" name="submit" style="margin-right: 10px">
                        Quay về trang chủ
                    </button>

                    <button class="modal__login" id="btnContinueBuy" type="submit" name="submit" style="margin-left: 10px">
                        Tiếp tục mua hàng
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="./assets/js/base.js"></script> -->
    <script>
        // modal xác nhận đơn hàng
        // modal login
        // phần modal-login
        const loginHead = document.querySelector(".js-login")
        const modal = document.querySelector(".js-modal")
        const modalContainer = document.querySelector(".js-modalContainer")
        const modalClose = document.querySelector(".js-modal-close")

        // hàm hiển thị modal login (thêm class open vào modal)
        function showModalLogin() {
            modal.classList.add("open")
        }

        // hàm ẩn modal login (xóa class open khỏi của modal)
        function hideModalLogin() {
            modal.classList.remove("open")
        }

        // nghe hành vi click vào phần login trên header
        loginHead.addEventListener("click", showModalLogin)

        // nghe hành vi click vào phần close trong modal
        modalClose.addEventListener("click", hideModalLogin)

        modal.addEventListener("click", hideModalLogin)

        modalContainer.addEventListener("click", function(event) {
            event.stopPropagation()
        })

        // modal đặt hàng thành công :V
        // modal confirm
        // phần modal-login
        const btnConfirm = document.querySelector("#btnConfirm")
        const modalConfirm = document.querySelector(".js-modalConfirm")
        const modalContainerConfirm = document.querySelector(".js-modalContainerConfirm")
        const modalCloseConfirm = document.querySelector(".js-modal-closeConfirm")
        // check data :v 
        const inpAddress = document.querySelector("#modal-user");
        const inpPhone = document.querySelector("#modal-pass");
        // console.log(typeof inpAddress);

        // hàm hiển thị modal login (thêm class open vào modal)
        function showModalPayOrder() {
            if (inpAddress.value !== "" && inpPhone.value !== "" && (inpPhone.value.length === 10 || inpPhone.value.length === 11)) {
                modalConfirm.classList.add("open")
                modal.classList.remove("open")
                inpAddress.style.borderColor = "#ccc";
                inpPhone.style.borderColor = "#ccc";
                inpPhone.value = "";
                
            } else {
                if (inpAddress.value === "") {
                    inpAddress.placeholder = "Bạn chưa nhập địa chỉ";
                    inpAddress.style.borderColor = "red";
                    inpPhone.value = "";
                }

                if (inpPhone.value === "") {
                    inpPhone.placeholder = "Bạn chưa nhập số điện thoại";
                    inpPhone.style.borderColor = "red";
                }

                if (!(inpPhone.value.length == 10 || inpPhone.value.length == 11)) {
                    inpPhone.placeholder = "Bạn vui lòng nhập đúng số điện thoại";
                    inpPhone.style.borderColor = "red";
                    inpPhone.value = "";
                }
            }
        }

        // hàm ẩn modal login (xóa class open khỏi của modal)
        function hideModalPayOrder() {
            modalConfirm.classList.remove("open")
        }

        // nghe hành vi click vào phần login trên header
        btnConfirm.addEventListener("click", showModalPayOrder)

        // nghe hành vi click vào phần close trong modal
        // modalCloseConfirm.addEventListener("click", hideModalPayOrder)

        modalConfirm.addEventListener("click", hideModalPayOrder)

        modalContainerConfirm.addEventListener("click", function(event) {
            event.stopPropagation()
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#btnReturn").click(function() {
                $.ajax({
                    url: "./ajax/reset-cart.php",
                    method: "POST",
                    data: {

                    },
                    success: function() {
                        window.location.replace("./home.php");
                    }
                });
            });

            $("#btnContinueBuy").click(function() {
                $.ajax({
                    url: "./ajax/reset-cart.php",
                    method: "POST",
                    data: {

                    },
                    success: function() {
                        window.location.replace("./menu.php");
                    }
                });
            });

            $("#btnConfirm").click(function() {
                $.ajax({
                    url: "./ajax/reset-cart.php",
                    method: "POST",
                    data: {

                    },
                    success: function() {
                        // console.log("hello0");
                        <?php
                            $data_update_order = [
                                'email' => $_SESSION['dataEmail'],
                                'code_order'=>$codeOrder,
                                'cart_status' => 'Thanh toán khi nhận hàng',
                                'cost_order'=> array_reduce($arrProduct, fn ($total, $item) => ($total + $item["value"] * $item["count"]))                
                            ];
                            Auth::update_order($data_update_order);
                            Auth::update_cart_time($_SESSION['dataEmail']);
                        ?>

                    }
                });
            });
        })
    </script>
</body>


</html>