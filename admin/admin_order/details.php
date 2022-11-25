<?php
include '../../classes/User.php';

$email = null;
$time = null;
$code_order=null;

if ($_GET['email']) {
    $email = $_GET['email'];
    $time = $_GET['time'];
    $code_order=$_GET['code_order'];
    $data_load_detail_order = ['email' => $email, 'time' => $time];
    $lists = Auth::load_detail_order($data_load_detail_order);
} else {
    header("location:./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-favico" href="./resources/images/main/logo/favicon.ico">
    <title>Chi tiết đơn đặt hàng</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/fix.css">
</head>

<body>
    <div id="main">
        <!-- <div class="header">This is Header :v</div> -->
        <div class="body">
            <?php
            include "../Component/Sidebar.php";
            ?>
            <div class="body__content">
                <?php
                include "../Component/Header.php";
                ?>
                <div class="content__main show">
                    <div class="content__listBtn" style="margin-bottom: 15px">
                        <h3>Mã đơn hàng: <?php echo"$code_order"; ?></h3>
                        <button class="content__btnExit">
                            <a href="../admin_order/index.php">Trở lại</a>
                        </button>
                    </div>
                    <h2 class="content__title">Chi tiết đơn hàng</h2>
                    <table>
                        <tr>
                            <th scope="col">Số thứ tự</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá tiền</th>
                            <!-- <th scope="col">Số lượng</th> -->
                        </tr>
                        <?php
                        if (!empty($lists)) {
                            $i = 1;
                            foreach ($lists as $list) {
                                // var_dump($product);
                                // die;
                        ?>
                                <tr>
                                    
                                    <th scope="row" class="index-product"><?= $i++ ?></th>
                                    <!-- <td class="image-product-wrap">
                                        <img src="<?= $list["image"] ?>" alt="">
                                    </td> -->
                                    <td>
                                        <div class="user-avatar" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center;">
                                            <img src="<?= "../../" . $list["image"] ?>" alt="Avatar" style="max-width: 100%; max-height: 100%;">
                                        </div>
                                    </td>
                                    <td class="name-product"><?= $list["title"] ?></td>
                                    <td class="value-product"><?= $list["value"] ?> đ</td>
                                    <!-- <td class="count-product"></td> -->
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>

</html>