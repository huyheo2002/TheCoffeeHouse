<?php
require_once "../../classes/DB.php";

$sql = "SELECT *  
        FROM `products` 
        WHERE (`products`.`id` = :id)";
$products = DB::execute($sql, [
    "id" => $_GET["id"] ?? -1,
]);

$product = array();
if (!empty($products)) {
    $product = array_merge(array(), $products[0]);
}

// var_dump($product);
// die;

$sql = "SELECT `category`.`id`, `category`.`name` FROM `category` ";

$categories = DB::execute($sql);

// var_dump($categories);
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
    <link rel="stylesheet" href="../css/form.css">
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
                    <h2 class="content__title">Chỉnh sửa sản phẩm</h2>
                    <?php
                    if (!empty($product)) {
                    ?>
                        <form action="doEdit.php?id=<?= $product["id"] ?>" method="POST" enctype="multipart/form-data">
                            <div class="item">
                                <label for="id">ID :</label>
                                <input type="text" name="id" id="id" disabled value="<?= $product["id"] ?>">
                            </div>
                            <div class="item">
                                <label for="image">Ảnh :</label>
                                <input type="file" name="image" id="image">
                                <img src="<?= "../../" . $product["image"] ?>" alt="Không có ảnh chọn ảnh khác ik :(" style="max-height: 150px; max-width: 150px;">
                            </div>
                            <div class="item">
                                <label for="title">Tên :</label>
                                <input type="text" name="title" id="title" value="<?= $product["title"] ?>">
                            </div>
                            <div class="item">
                                <label for="value">Giá :</label>
                                <input type="text" name="value" id="value" value="<?= $product["value"] ?>">
                            </div>
                            <div class="item">
                                <label for="category_id">Danh mục :</label>
                                <select name="category_id" id="category_id" style="min-width: 150px">
                                    <?php
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                    ?>
                                            <option value="<?= $category["id"] ?>"<?php if(!strcmp($product["category_id"], $category["id"])) echo " selected" ?>><?= $category["name"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="item">
                                <label for="desc">Mô tả :</label>
                                <textarea name="desc" id="desc" style="width: 100%"><?= $product["description"] ?></textarea>
                            </div>

                            <div class="content__listBtn">
                                <input type="submit" value="Chỉnh sửa" class="content__btnAdd">
                                <a class="content__btnExit" href="./index.php">Trở về</a>
                            </div>
                        </form>
                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>

</html>