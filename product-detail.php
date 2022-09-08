<?php

require_once "./classes/DB.php";
require_once './classes/User.php';

// login
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
        header("location:./menu.php");
    }
}



// session_start();
if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "Logout.php";
    $_SESSION['login_menu'] = "login";
} else {
    $a = "Tài khoản";
    $linkC = "Register.php";
}

// product-detail
    $product_Id = $_GET["id"] ?? -1;

    $sql = "select * from products where id = :product_Id";

    $products = DB::execute($sql, ["product_Id" => $product_Id]);

    // var_dump($products);
    // die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/menu.css">
    <link rel="stylesheet" href="./assets/css/product-detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Product Detail</title>
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
                <div class="header__nav">
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
                            <li class="nav-item dropdown d-flex" style="padding: 0 0" title="<?php echo $_SESSION['dataUser']?>">
                                <div class="overlay__textUser">
                                    <a class=" dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $a ?>
                                    </a>
                                </div>  
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo $linkB ?>" target="_blank"><?php echo $b ?></a></li>
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

        <!-- body- product detail -->
        <?php
            if(empty($products)){
                ?>
                    <h1 class="product__error">Không có sản phẩm này</h1>
                <?php

            }else{
                ?>
                    <div class="body__product">
                        <h1 class="product__title">Chi tiết sản phẩm</h1>
                        <div class="product__container">
                            <div class="product__imgWrap">
                                <img src="<?= $products[0]["image"] ?>" alt="">
                            </div>
                            <div class="product__content">
                                <div class="product__info">
                                    <h3 class="product__name"><?= $products[0]["title"] ?></h3>
                                    <p class="product__value"><?= $products[0]["value"] ?> đ</p>
                                    <p class="product__desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
                                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="product__action">
                                    <div class="product__btnCancel">Cancel</div>
                                    <div class="product__btnAddToCart" id="btnAddToCart">Add to Cart</div>

                                    <!-- jquery -->
                                    <script>
                                        $(document).ready(function () {
                                            $("#btnAddToCart").click(function() {
                                                $.ajax({
                                                    url: "./ajax/add-to-cart.php",
                                                    method: "POST",
                                                    data: {
                                                        id: <?= $product_Id ?>
                                                    },
                                                    success: function(data){
                                                        console.log("oke :V")
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>        

        <!-- cart -->
        <div class="btn__cart-wrap">
            <a class="btn__cart" href="./ajax/debug-cart.php">                
                <i class="fa-solid fa-cart-shopping" id="cart__logo"></i>
            </a>
            <div class="cart__badge">
                <i class="fa-solid fa-star">
                    <p class="count">1</p>
                </i>
            </div>
        </div>

        <div class="cart__sidebar">
            <div class="cart__sidebar-overlay">
                <header class="cart__title">
                    <h3 class="cart__title-text">Thông báo</h3>
                    <div class="cart__btnClose">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </header>
                <ul class="cart__list">
                    <li><a href="">
                            <div class="cart__imgWrap">
                                <img src="./assets/img/menu/BM1.jpg" alt="">
                            </div>
                            <div class="cart__info">
                                <h4 class="cart__info-title">hi</h4>
                                <p class="cart__info-value">124.000đ</p>
                            </div>
                        </a></li>

                </ul>

                <footer class="cart__footer">
                    <div class="cart__footer-btnReset">Reset</div>
                    <div class="cart__footer-btnBuy">Thanh toán</div>
                </footer>
            </div>
        </div>
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
        // fetch("./assets/data/products.json")
        // .then(res => res.json())
        // .then(data => {
        //     console.log(data);
        //     document.querySelector(".btnTest").onclick = () => console.log(data);
        // })
        // .catch(err => console.log(err));
        function isCheckPropagation(e) {
            e.stopPropagation();
        }
    </script>
    <script src="./assets/js/base.js"></script>
    <!-- <script src="./assets/js/menu.js" type="module"></script> -->
</body>

</html>



