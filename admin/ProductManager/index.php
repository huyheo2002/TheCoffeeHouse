<?php
require_once "../../classes/DB.php";
$sql = "SELECT `products`.`id`, `products`.`image`, `products`.`title`, `products`.`value`, `category`.`name`, `products`.`description`  FROM `products`, `category` WHERE (`products`.`category_id` = `category`.`id`)";
$products = DB::execute($sql);
// var_dump($products);
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-favico" href="./resources/images/main/logo/favicon.ico">
    <title>Admin</title>
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
                        <a href="./create.php" class="content__btnAdd">Thêm mới</a>
                        <button class="content__btnExit">
                            <a href="../DashBoard/index.php">Thoát</a>
                        </button>
                    </div>
                    <h2 class="content__title">Danh sách sản phẩm</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">Ảnh</th>
                            <th style="width: 15%">Tên</th>
                            <th style="width: 10%">Giá</th>
                            <th style="width: 10%">Danh mục</th>
                            <th style="width: 35%">Mô tả</th>
                            <th style="width: 20%">Hoạt động</th>
                        </tr>
                        <?php
                        if (!empty($products)) {
                            foreach ($products as $product) {
                                // var_dump($product);
                                // die;
                        ?>
                                <tr>
                                    <td>
                                        <div class="user-avatar" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center;">
                                            <img src="<?= "../../" . $product["image"] ?>" alt="Avatar" style="max-width: 100%; max-height: 100%;">
                                        </div>
                                    </td>
                                    <td><?= $product["title"] ?></td>
                                    <td><?= $product["value"] ?> đ</td>
                                    <td><?= $product["name"] ?></td>
                                    <td><?= $product["description"] ?></td>
                                    <td class="list__action">
                                        <a href="edit.php?id=<?= $product["id"] ?>">Chỉnh sửa</a>
                                        <form action="doDelete.php" method="post" style="display: inline-block; width: 100%">
                                            <input type="hidden" name="id" value="<?= $product["id"] ?>">
                                            <!-- <a href="">Xóa</a> -->
                                            <input type="submit" value="Xóa">
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
</body>

</html>