<?php
include '../../classes/User.php';

$orders = Auth::load_order();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-favico" href="./resources/images/main/logo/favicon.ico">
    <title>Quản lý đơn hàng</title>
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

                        <!-- <button class="content__btnExit">
                            <a href="../DashBoard/index.php">Thoát</a>
                        </button> -->
                    </div>
                    <h2 class="content__title">Danh sách đơn hàng</h2>
                    <table>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Thời gian đặt hàng</th>
                            <th scope="col">email khách hàng</th>
                            <th scope="col">Tình trạng thanh toán</th>
                            <th scope="col">Tổng giá (VNĐ)</th>
                            <th scope="col">xem chi tiết</th>
                            <th scope="col">xóa đơn hàng</th>
                        </tr>
                        <?php
                        if (!empty($orders)) {
                            foreach ($orders as $order) {
                                // var_dump($product);
                                // die;
                        ?>
                                <tr>
                                    <!-- <td>
                                        <div class="user-avatar" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center;">
                                            <img src="<?= "../../" . $product["image"] ?>" alt="Avatar" style="max-width: 100%; max-height: 100%;">
                                        </div>
                                    </td> -->
                                    <td><?php echo $order['code_order'] ?></td>
                                    <td><?php echo $order['time_order'] ?></td>
                                    <td><?php echo $order['email'] ?></td>
                                    <td><?php echo $order['cart_status'] ?></td>
                                    <td><?php echo $order['cost_order'] ?></td>
                                    <td class="list__action">
                                        <a href="./details.php?email=<?= $order['email'] ?>&time=<?= $order['time_order'] ?>&code_order=<?=$order['code_order'] ?>" class="btn btn-info">Xem chi tiết</a>
                                    </td>
                                    <td class="list__action">

                                        <form action="./order_delete.php" method="post" id="formDelete-<?= $order['confirm_cart_id'] ?>" style="display: inline-block; width: 100%">
                                            <input type="hidden" name="confirm_cart_id" value="<?= $order['confirm_cart_id'] ?>">
                                            <button class="btn btn-danger btn-delete" id="<?= $order['confirm_cart_id'] ?>">Xóa đơn hàng</button>
                                        </form>
                                    </td>
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
    <script>
        let deleteBtns = document.querySelectorAll('.btn-delete');
        deleteBtns.forEach(function(item) {
            item.addEventListener('click', function(event) {
                if (confirm("Xóa đơn hàng thành công!")) {
                    let id = this.getAttribute('id');
                    document.querySelector('formDelete-' + id).submit();
                }

            })
        })
    </script>
</body>


</html>