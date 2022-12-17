<?php
include './classes/User.php';

$err = [];
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $err['email'] = 'Bạn chưa nhập email';
    }
    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }


    if (empty($err)) {

        $dataLogin = [
            'email' => $_POST['email'],
            // 'password'=>$pass
        ];


        Auth::login($dataLogin);
       
        if($_SESSION['authority_id']==1){
            header("location:./admin/DashBoard/index.php");
        }
        if($_SESSION['authority_id']==2){
            header("location:./admin/DashBoard/index.php");
        }
        if($_SESSION['authority_id']==3){
            header("location:./menu.php");
        }
    }
}



// session_start();
if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "Logout.php";
    $_SESSION['login_menu'] = "login";

    $my_order='Quản lý đơn hàng';
    $my_order_link='my_order.php';
} else {
    $a = "Tài khoản";
    $linkC = "Register.php";
}

// phần truy xuất dữ liệu từ sql :v (ko sửa phần dưới)
require_once("./classes/DB.php");

// $conn = DB::getConnection();
// $sql = "select * from user";
$sql = "select products.id, image, title, `value`, name from products, category where category.id = products.category_id";
$products = DB::execute($sql);

// viết json :v (éo viết json nữa :v)
// file_put_contents(
//     './assets/data/products.json',
//     json_encode($products)
// );

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/menu.css">
    <link rel="stylesheet" href="./assets/responsive/menuRespon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./assets/responsive/baseRespon.css">
    <link rel="stylesheet" href="./assets/responsive/menuRespon.css">
    <title>Menu</title>
</head>

<body>
    <div id="main">
        <!-- header -->
        <div class="header__wrap">
            <div class="header">
                <div class="header__logo">
                    <a href="./home.php">
                        <img src="./assets/img/items-hot/header_logo.jpg" alt="">
                    </a>
                </div>
                <!-- btn header menu mobile -->
                <div class="header__menu-mobile">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <!-- end btn menu -->
                <div class="header__nav">
                    <!-- btn header close -->
                    <div class="header__nav-close-mobile">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <!-- end btn header close -->
                    <ul class="list__nav">
                        <li><a href="./coffee.php">Cà phê</a></li>
                        <li><a href="./tea.php">Trà</a></li>
                        <li><a href="./menu.php">Menu
                                <i class="fas fa-sort-down"></i>
                                <ul class="subnav">
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__menu">Tất cả</h3>
                                            <div class="content__menu"></div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__menu">Cà phê</h3>
                                            <div class="content__menu">
                                                <p>Cà Phê Việt Nam</p>
                                                <p>Cà Phê Máy</p>
                                                <p>Cold Brew</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__menu">Trà</h3>
                                            <div class="content__menu">
                                                <p>Trà trái cây</p>
                                                <p>Trà sữa Macchiato</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__menu">Món khác</h3>
                                            <div class="content__menu">
                                                <p>Đá xay</p>
                                                <p>Matcha - Socola</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__menu">Bánh & Snack</h3>
                                            <div class="content__menu">
                                                <p>Bánh mặn</p>
                                                <p>Bánh ngọt</p>
                                                <p>Snack</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__menu">Tại nhà</h3>
                                            <div class="content__menu">
                                                <p>Cà phê tại nhà</p>
                                                <p>Trà tại nhà</p>
                                            </div>
                                        </a></li>
                                </ul>
                            </a></li>
                        <li><a href="./story.php">Chuyện cà phê và Trà
                                <i class="fas fa-sort-down"></i>
                                <ul class="subnav">
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__story">Coffeeholic</h3>
                                            <div class="content__story">
                                                <p>#chuyencaphe</p>
                                                <p>#phacaphe</p>
                                                <p>#phatra</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__story">Teaholic</h3>
                                            <div class="content__story">
                                                <p>#phatra</p>
                                                <p>#cauchuyenvetra</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a href="">
                                            <h3 class="title__story">Blog</h3>
                                            <div class="content__story">
                                                <p>#inthemood</p>
                                                <p>#Review</p>
                                                <p>#HumanofTCH</p>
                                            </div>
                                        </a></li>
                                </ul>
                            </a></li>
                        <li><a href="./shop.php">Cửa hàng</a></li>
                        <li><a href="./tuyendung.php" target="_blank">Tuyển dụng</a></li>
                        <li><a href="./KhaiTruong.php">Ưu đãi thành viên</a></li>
                        <!--Thay doi khi dang nhap-->
                        <?php if (isset($_SESSION['message'])) { ?>
                            <li class="nav-item dropdown d-flex" style="padding: 0 0" title="<?php echo $_SESSION['dataUser'] ?>">
                                <div class="overlay__textUser">
                                    <a class=" dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $a ?>
                                    </a>
                                </div>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo $linkB ?>" target="_blank"><?php echo $b ?></a></li>
                                    <li><a class="dropdown-item" href="<?php echo $my_order_link ?>" ><?php echo $my_order ?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo $linkD ?>">Đăng xuất</a></li>

                                </ul>
                            </li>

                        <?php } ?>
                        <?php if (!isset($_SESSION['message'])) { ?>
                            <li class="js-login"><a>
                                    <?php echo $a ?>
                                    <i class="fa-solid fa-user"></i>
                                </a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- container-menu -->
        <div class="menu__Container">
            <div class="menu__Sidebar">
                <ul class="menu__listItems">
                    <li class="menu__itemsBlock"><a href="#" class="menu__items menu__items-link" id="menu__item-1">
                            <div class="menu__dotCoffee visible" id="dotCoffee-1">
                                <img src="./assets/img/menu/coffee-beans1.png" alt="">
                            </div>
                            <p class="menu__text glow">Tất Cả</p>
                        </a></li>
                    <li class="menu__itemsBlock"><a href="#" class="menu__items menu__items-link" id="menu__item-2">
                            <div class="menu__dotCoffee" id="dotCoffee-2">
                                <img src="./assets/img/menu/coffee-beans1.png" alt="">
                            </div>
                            <p class="menu__text">Cà Phê</p>
                            <ul class="menu__subnav">
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Cà Phê Việt Nam</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Cà Phê Máy</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Cold Brew</a></li>
                            </ul>
                        </a></li>
                    <li class="menu__itemsBlock"><a href="#" class="menu__items menu__items-link" id="menu__item-3">
                            <div class="menu__dotCoffee" id="dotCoffee-3">
                                <img src="./assets/img/menu/coffee-beans1.png" alt="">
                            </div>
                            <p class="menu__text">Trà</p>
                            <ul class="menu__subnav">
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Trà Trái Cây</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Trà Sữa Macchiato</a></li>
                            </ul>
                        </a></li>
                    <li class="menu__itemsBlock"><a href="#" class="menu__items menu__items-link" id="menu__item-4">
                            <div class="menu__dotCoffee" id="dotCoffee-4">
                                <img src="./assets/img/menu/coffee-beans1.png" alt="">
                            </div>
                            <p class="menu__text">Món Khác</p>
                            <ul class="menu__subnav">
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Đá Xay</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Matcha - Socola</a></li>
                            </ul>
                        </a></li>
                    <li class="menu__itemsBlock"><a href="#" class="menu__items menu__items-link" id="menu__item-5">
                            <div class="menu__dotCoffee" id="dotCoffee-5">
                                <img src="./assets/img/menu/coffee-beans1.png" alt="">
                            </div>
                            <p class="menu__text">Bánh</p>
                            <ul class="menu__subnav">
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Bánh Mặn</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Bánh Ngọt</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Snack</a></li>
                            </ul>
                        </a></li>
                    <li class="menu__itemsBlock"><a href="#" class="menu__items menu__items-link" id="menu__item-6">
                            <div class="menu__dotCoffee" id="dotCoffee-6">
                                <img src="./assets/img/menu/coffee-beans1.png" alt="">
                            </div>
                            <p class="menu__text">Tại Nhà</p>
                            <ul class="menu__subnav">
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Cà Phê Tại Nhà</a></li>
                                <li class="menu__subnav-items"><a href="#" class="menu__subnav-link menu__items-link" onclick="isCheckPropagation(event)">Trà Tại Nhà</a></li>
                            </ul>
                        </a></li>
                </ul>
            </div>
            <div class="menu__content">
                <div class="menuContent__wrap">
                    <div class="menu__promote">
                        <img src="./assets/img/menu/menuPromote.jpg" alt="">
                    </div>
                    <!-- coffee VN -->
                    <!-- menu items-hot -->
                    <div class="itemsHot__wrap">
                        <!-- cà phê việt nam -->
                        <h3 class="title__itemTea">Cà Phê Việt Nam</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "CoffeeVN")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- cà phê máy -->
                        <h3 class="title__itemTea">Cà Phê Máy</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "MachineCoffee")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Cold brew -->
                        <h3 class="title__itemTea">Cold Brew</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "ColdBrew")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Trà trái cây -->
                        <h3 class="title__itemTea">Trà Trái Cây</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "FruitTea")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Trà sữa Macchiato -->
                        <h3 class="title__itemTea">Trà Sữa Macchiato</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "MacchiatoMilkTea")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Đá xay -->
                        <h3 class="title__itemTea">Đá Xay</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "GrindIce")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- matcha - socola -->
                        <h3 class="title__itemTea">Matcha - Socola</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "MatchaSocola")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Bánh mặn -->
                        <h3 class="title__itemTea">Bánh Mặn</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "SaltyCake")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Bánh ngọt -->
                        <h3 class="title__itemTea">Bánh Ngọt</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "SweetCake")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- snack -->
                        <h3 class="title__itemTea">Snack</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "Snack")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>

                        <!-- Cà phê tại nhà -->
                        <h3 class="title__itemTea">Cà Phê Tại Nhà</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "CoffeeAtHome")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                        <!-- Trà tại nhà -->
                        <h3 class="title__itemTea">Trà Tại Nhà</h3>
                        <ul class="itemsHot__list">
                            <?php
                            foreach ($products as $product) {
                                if (!strcmp($product["name"], "TeaAtHome")) {
                            ?>
                                    <li><a href="<?= './product-detail.php?id=' . $product['id'] ?>">
                                            <div class="itemHot__imgWrap">
                                                <img src="<?= $product["image"] ?>" alt="">
                                            </div>
                                            <div class="itemHot__content" title="<?= $product["title"] ?>">
                                                <h3 class="itemHot__title">
                                                    <?= $product["title"] ?>
                                                </h3>
                                                <p class="itemHot__value">
                                                    <?= $product["value"] ?> đ
                                                </p>
                                            </div>
                                        </a>
                                        <div class="itemHot__cart" onclick="isCheckPropagation(event)" id="btnAddToCart" data-product-id="<?= $product['id'] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="footer__wrap">
            <div class="footer">
                <div class="footer__introduce">
                    <h4 class="introduce__title">Giới thiệu</h4>
                    <ul class="introduce__list">
                        <li><a href="">Về Chúng Tôi</a></li>
                        <li><a href="">Sản phẩm</a></li>
                        <li><a href="">Khuyến mãi</a></li>
                        <li><a href="">Chuyện cà phê</a></li>
                        <li><a href="">Cửa Hàng</a></li>
                        <li><a href="">Tuyển dụng</a></li>
                    </ul>
                </div>
                <div class="footer__rules">
                    <h4 class="rules__title">Điều khoản</h4>
                    <ul class="rules__list">
                        <li><a href="">Điều khoản sử dụng</a></li>
                        <li><a href="">Quy tắc bảo mật</a></li>
                    </ul>
                </div>
                <div class="footer__hotline">
                    <h4 class="hotline__phone">
                        <i class="fas fa-phone"></i>
                        <p>Đặt hàng: 1800 6936</p>
                    </h4>
                    <h4 class="hotline__contact">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Liên hệ</p>
                    </h4>
                    <p class="hotline__address">
                        Tầng 3-4 Hub Building 195/10E Điện Biên Phủ, P.15 , Q.Bình Thạnh, TP.Hồ Chí Minh
                    </p>
                </div>
                <div class="footer__socials">
                    <div class="social_bg">
                        <img src="./assets/img/items-hot/footerBgLogo.jpg" alt="" class="social__bgImg">
                        <div class="social__logo">
                            <img src="./assets/img/items-hot/footerLogo.jpg" alt="">
                        </div>
                        <div class="social__desc">
                            <div class="social__name">
                                <p>The Coffee House</p>
                                <div class="verifi">
                                    <img src="./assets/img/items-hot/verifi.png" alt="">
                                </div>
                            </div>
                            <div class="social__inter">602.577 lượt thích</div>
                        </div>
                        <div class="social__interacWrap-botton">
                            <div class="social__like">
                                <i class="fab fa-facebook-square"></i>
                                <p>Thích Trang</p>
                            </div>
                            <div class="social__share">
                                <i class="fas fa-share"></i>
                                <p>Chia Sẻ</p>
                            </div>
                        </div>
                    </div>
                    <div class="social__icon">
                        <i class="fab fa-facebook-square"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart -->
        <?php
        include "./cart.php";
        ?>
    </div>

    <!-- Modal login-->
    <div class="modal js-modal">
        <div class="modal__container js-modalContainer">
            <div class="modal__header">
                <div class="modal__header__title">
                    Chào mừng bạn đến với The Coffee House
                </div>
                <!-- head để img nếu thích :v -->
                <!-- <img src="./assets/img/base/modalLogin-loginhead.png" alt=""> -->
            </div>

            <div class="modal__close js-modal-close">
                <!-- <i class="fas fa-times modal__close-ic"></i> -->
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="clear"></div>

            <div class="modal__body">
                <!-- attribute for trong thẻ label chỉ sd với id -->
                <form action="" method="post">
                    <label for="modal-user" class="modal__label">
                        <i class="fas fa-user"></i>
                        Email:
                    </label>
                    <input id="modal-user" name="email" type="text" class="modal__input-user" placeholder="Email">
                    <div id="emailHelp" class="text-danger">
                        <span><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                    </div>

                    <label for="modal-pass" class="modal__label">
                        <i class="fas fa-key"></i>
                        Mật Khẩu:
                    </label>
                    <input id="modal-pass" name="password" type="password" class="modal__input-pass" placeholder="Mật Khẩu">
                    <div class="text-danger">
                        <span><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                    </div>
                    <button class="modal__login" type="submit" name="submit">
                        Đăng Nhập
                    </button>
                </form>
            </div>


            <div class="modal__footer">
                <div class="modal__footer-head">
                    <a href="">Hỗ trợ</a>
                    <a href="<?php echo $linkC ?>" target="_blank">Đăng ký</a>
                </div>

                <p class="modal__footer-subhead">Hoặc đăng nhập bằng các tài khoản sau</p>

                <div class="modal__footer-icon">
                    <img src="./assets/img/base/modalLogin-ggchr.png" alt="">
                    <img src="./assets/img/base/modalLogin-ios.png " alt="">
                    <img src="./assets/img/base/modalLogin-fb.png" alt="">
                    <img src="./assets/img/base/modalLogin-twitter.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal detail product -->
    <!-- <div class="modal js-modal products">
        <div class="modal__container js-modalContainer product">
            <div class="modal__header">
                <div class="modal__header__title product">
                    Chi tiết sản phẩm
                </div>                
            </div>

            <div class="modal__body product">
                <div class="modal__content product">
                    <div class="modal__content__imgWrap">
                        <img src="./assets/img/menu/BM1.jpg" alt="">
                    </div>
                    <div class="modal__content__info">
                        <div class="modal__content__info-wrap">
                            <h3 class="modal__content__title">
                                Bánh mì
                            </h3>
                            <p class="modal__content__value">45000 đ</p>
                            <div class="modal__content__desc-wrap product">
                                <p class="modal__content__desc">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a 
                                galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
                                of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                            </div>
                            
                        </div>
                        <div class="modal__content__action">
                            <div class="modal__content__btnReturn">trở về</div>
                            <div class="modal__content__btnAddToCart">thêm vào giỏ hàng</div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="modal__footer">                        
            </div>
        </div>
    </div> -->

    <script>        
        // tránh lan truyền sự kiện (truyền vào event con)
        function isCheckPropagation(e) {
            e.stopPropagation();
        }
    </script>
    <script src="./assets/js/base.js"></script>
    <script src="./assets/js/menu.js" type="module"></script>
    <script src="./assets/js/Cart.js"></script>
    <!-- jquery -->
    <script>
        $(document).ready(function() {
            <?php if (isset($_SESSION['message_login'])) { ?>
                let products = document.querySelectorAll(".itemHot__cart");
                products.forEach((product) => {
                    $(product).click(() => {
                        let productId = product.dataset.productId;
                        addToCart(productId);
                        
                        // $_GET("./add_to_cart.php", {'productID':productId}, function(data) {alert(data);});
                           
                    })
                })
                <?php } if (!isset($_SESSION['message_login'])) { ?>let products = document.querySelectorAll(".itemHot__cart");
                products.forEach((product) => {
                    $(product).click(() => {
                        // const loginHead = document.querySelectorAll(".itemHot__cart")
                        // loginHead.addEventListener ("click",modal.classList.add("open"))
                        alert("Bạn cần đăng nhập trước!")
                    })
                }) <?php } ?>
        });
    </script>
</body>

</html>