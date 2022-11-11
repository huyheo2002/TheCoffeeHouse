<?php
include './classes/User.php';




if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "Logout.php";
    $e="Quản lý";
    $linkE="./admin/adminFirst.php";
    $_SESSION['login_home'] = "login";

    $my_order='Quản lý đơn hàng';
    $my_order_link='my_order.php';
} else {
    $a = "Tài khoản";
    $linkC = "Register.php";
}



$products=Auth::loadDataProduct();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/responsive/baseRespon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- test branch -->
    <div id="main">
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
                    <div class="header__nav-close-mobile">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <ul class="list__nav">
                        <li><a href="./coffee.php">Cà phê</a></li>
                        <li><a href="./tea.php">Trà</a></li>
                        <li><a href="./menu.php">Menu
                            <i class="fas fa-sort-down"></i>
                            <ul class="subnav">
                                <li class="subnav__items"><a>
                                        <h3 class="title__menu">Tất cả</h3>
                                        <div class="content__menu"></div>
                                    </a></li>
                                <li class="subnav__items"><a>
                                        <h3 class="title__menu">Cà phê</h3>
                                        <div class="content__menu">
                                            <p>Cà Phê Việt Nam</p>
                                            <p>Cà Phê Máy</p>
                                            <p>Cold Brew</p>
                                        </div>
                                    </a></li>
                                <li class="subnav__items"><a>
                                        <h3 class="title__menu">Trà</h3>
                                        <div class="content__menu">
                                            <p>Trà trái cây</p>
                                            <p>Trà sữa Macchiato</p>
                                        </div>
                                    </a></li>
                                <li class="subnav__items"><a>
                                        <h3 class="title__menu">Món khác</h3>
                                        <div class="content__menu">
                                            <p>Đá xay</p>
                                            <p>Matcha - Socola</p>
                                        </div>
                                    </a></li>
                                <li class="subnav__items"><a>
                                        <h3 class="title__menu">Bánh & Snack</h3>
                                        <div class="content__menu">
                                            <p>Bánh mặn</p>
                                            <p>Bánh ngọt</p>
                                            <p>Snack</p>
                                        </div>
                                    </a></li>
                                <li class="subnav__items"><a>
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
                                    <li class="subnav__items"><a>
                                            <h3 class="title__story">Coffeeholic</h3>
                                            <div class="content__story">
                                                <p>#chuyencaphe</p>
                                                <p>#phacaphe</p>
                                                <p>#phatra</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a>
                                            <h3 class="title__story">Teaholic</h3>
                                            <div class="content__story">
                                                <p>#phatra</p>
                                                <p>#cauchuyenvetra</p>
                                            </div>
                                        </a></li>
                                    <li class="subnav__items"><a>
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
                            <!-- thêm biến chứa username vào title -->                                                     
                            <li class="nav-item dropdown d-flex" style="padding: 0 0" title="<?php echo $_SESSION['dataUser']?>">
                                <div class="overlay__textUser">
                                    <a class=" dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $a ?>
                                    </a>
                                </div>                                
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo $linkB ?>" target="_blank"><?php echo $b ?></a></li>
                                    <li><a class="dropdown-item" href="<?php echo $my_order_link ?>"><?php echo $my_order ?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <?php if($_SESSION['dataEmail'] =="admin@gmail.com"){ ?>
                                    <li><a class="dropdown-item" href="<?php echo $linkE ?>" target="_blank"><?php echo $e ?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <?php } ?>
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
    </div>

    

    
    <script>        

    </script>
    <script src="./assets/js/base.js"></script>
    <script src="./assets/js/home.js"></script>
</body>

</html>