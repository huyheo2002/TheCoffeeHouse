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
        header("location:./shop.php");
    }
}



session_start();
if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "dangxuat.php";
} else {
    $a = "Tài khoản";
    $linkC = "dangky.php";
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div id="main">
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
                        <li><a href="./story1.php">Chuyện cà phê và Trà
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
                            <li class="nav-item dropdown d-flex" style="padding: 0 0">
                                <a class=" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $a ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?php echo $linkB ?>"><?php echo $b ?></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo $linkD ?>">Đăng xuất</a></li>

                                </ul>
                            </li>

                        <?php } ?>
                        <?php if (!isset($_SESSION['message'])) { ?>
                            <li class="js-login">
                                <p class="nav__login">
                                    <?php echo $a ?>
                                    <i class="fa-solid fa-user"></i>
                                </p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <!-- Content-->
        <div class="content__wrap">

            <div class="poster">
                <img src="./assets/img/shop/untitled_design_64d7e90f1ee04cdaa5fa3ae45c4cf56b.png" alt="">
                <h2 style="text-align: center; font-size: 24px; color: #fff;position: absolute ; margin-top: -150px ; left: 29%;">
                    Hệ thống 146 cửa hàng The Coffe House toàn quốc
                </h2>

            </div>
            <div class="container">
                <div class=" sidebar__page">
                    <div class="sidebar__page1">
                        <p style="font-size: 18px; margin-bottom: 15px;">
                            Theo khu vực
                        </p>
                        <ul id="navbar">
                            <li>
                                <div class="Now">
                                    <a href="">Tp Hồ Chí Minh (74)</a>
                                </div>

                            </li>
                            <li>
                                <a href=""> Hà Nội (38)</a>
                            </li>
                            <li>
                                <a href=""> Hải Phòng (8) </a>
                            </li>
                            <li>
                                <a href="">Đà Nẵng (5)</a>
                            </li>
                            <li>
                                <a href="">Tây Ninh (2)</a>
                            </li>
                            <li><a href="">Cần Thơ (2)</a></li>
                            <li><a href="">Nha Trang (3)</a></li>
                            <li>
                                <a href=""> Kiên Giang (3)</a>
                            </li>
                            <li>
                                <a href="">Nghệ An (3) </a>
                            </li>
                            <li>
                                <a href=""> Hà Tĩnh (1)</a>
                            </li>
                            <li>
                                <a href=""> Bà Rịa Vũng Tàu (3)</a>
                            </li>
                            <li>
                                <a href=""> Đồng Nai (1)</a>
                            </li>
                            <li>
                                <a href="">Hưng Yên (1)</a>
                            </li>
                            <li>
                                <a href="">Bắc Ninh (1)</a>
                            </li>
                            <li>
                                <a href=""> Huế (1)</a>
                            </li>
                            <li>
                                <a href=""> Thanh Hóa (2)</a>
                            </li>
                            <li>
                                <a href="">Bình Dương (1)</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content__right">
                    <p>
                        Khám phá 74 cửa hàng của chúng tôi ở Tp Hồ Chí Minh
                    </p>
                    <select style="width: 260px; height: 40px; background-color:white; margin-top: 20px; padding: 0;border-radius: 5px;">
                        <option>
                            Quận/ Huyện
                        </option>
                        <option value="Bình Chánh"> Bình Chánh</option>
                        <option value="Bình Thạnh"> Bình Thạnh</option>
                        <option value="Bình Tân"> Bình Tân</option>
                        <option value="Gò Vấp"> Gò Vấp</option>
                        <option value=" Phú Thuận"> Quận 1</option>
                        <option value="Quận 1"> Quận 1</option>
                        <option value="Quận 3"> Quận 3</option>
                        <option value="Quận 4"> Quận 4</option>
                        <option value="Quận 5"> Quận 5</option>
                        <option value="Quận 6"> Quận 6</option>
                        <option value="Quận 7"> Quận 7</option>
                        <option value="Quận 10"> Quận 10</option>
                        <option value="Quận 11"> Quận 11</option>
                        <option value="Quận Tân Bình"> Quận Tân Bình</option>

                    </select>
                    <!--List_img-->
                    <div class="list_img">
                        <div class="list_img_left">
                            <img src="./assets/img/shop/tch-kiosk-nguyen-thi-thap-1_6a2cfc312ea94dfaae316f1a81977a24.png" alt="">
                            <p style="margin-top: 10px; font-weight: 600; font-size: 18px ;">
                                HCM Now Nguyễn Thị Thập
                            </p>
                            <div class="Map">
                                <a style="text-decoration: none; color: #EA8025; font-size: 16px ;font-weight:600;" href="">Xem Bản Đồ</a>
                            </div>
                            <ul style="display: flex;">
                                <li>
                                    Chia sẻ trên:
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 5px;">
                                        <img src="./assets/img/shop/59439.png" alt="">
                                    </div>

                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/zalo.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/facebook-messenger-icon.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/iconmonstr-link-thin.png" alt="">
                                    </div>
                                </li>

                            </ul>
                            <hr style="border: 2px solid ;color:rgb(104, 100, 100); margin-top: 10px; margin-bottom: 10px; ">
                            <h5>
                                436-438 Nguyễn Thị Thập , P. Tân Quý , Quận 7, Tp HCM
                            </h5>
                            <h5>
                                7:00 - 22:00
                            </h5>
                            <div style=" display: inline; ">
                                <span style="display: inline;">
                                    <img style="width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 155220.png" alt=""> Có chỗ mua xe hơi
                                    <img style="width: 24px; height: 24px; margin-left: 20px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558331.png" alt=""> Phục vụ tại chỗ
                                </span>
                            </div>
                            <div style="margin-bottom: 30px;">
                                <span">
                                    <img style=" margin-top: 10px ;width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558582.png" alt=""> Mua mang đi
                                    </span>
                            </div>
                            <!--2-->
                            <img src="./assets/img/shop/hcm-lu-gia1__1__e0a622da07ab48b8bb7a542f088b7233.png" alt="">
                            <p style="margin-top: 10px; font-weight: 600; font-size: 18px ;">
                                HCM Lữ Gia
                            </p>
                            <div class="Map">
                                <a style="text-decoration: none; color: #EA8025; font-size: 16px ;font-weight:600;" href="">Xem Bản Đồ</a>
                            </div>
                            <ul style="display: flex;">
                                <li>
                                    Chia sẻ trên:
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 5px;">
                                        <img src="./assets/img/shop/59439.png" alt="">
                                    </div>

                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/zalo.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/facebook-messenger-icon.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/iconmonstr-link-thin.png" alt="">
                                    </div>
                                </li>

                            </ul>
                            <hr style="border: 2px solid ;color:rgb(104, 100, 100); margin-top: 10px; margin-bottom: 10px; ">
                            <h5>
                                64A Lữ Gia, Phường 15, Quận 11, Hồ Chí Minh
                            </h5>
                            <h5>
                                7:00 - 22:00
                            </h5>
                            <div style=" display: inline; ">
                                <span style="display: inline;">
                                    <img style="width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 155220.png" alt=""> Có chỗ mua xe hơi
                                    <img style="width: 24px; height: 24px; margin-left: 20px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558331.png" alt=""> Phục vụ tại chỗ
                                </span>
                            </div>
                            <div>
                                <span>
                                    <img style=" margin-top: 10px ;width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558582.png" alt=""> Mua mang đi
                                </span>
                            </div>

                        </div>
                        <!-- IMG-Right -->
                        <!--1-->
                        <div class="list_img_right">
                            <img src="./assets/img/shop/phamhung_bd67d2bbc9ef43cbb2917f10f3dd6800.png" alt="">
                            <p style="margin-top: 10px; font-weight: 600; font-size: 18px ;">
                                HCM Now Phạm Hùng
                            </p>
                            <div class="Map">
                                <a style="text-decoration: none; color: #EA8025; font-size: 16px ;font-weight:600;" href="">Xem Bản Đồ</a>
                            </div>
                            <ul style="display: flex;">
                                <li>
                                    Chia sẻ trên:
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 5px;">
                                        <img src="./assets/img/shop/59439.png" alt="">
                                    </div>

                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/zalo.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/facebook-messenger-icon.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/iconmonstr-link-thin.png" alt="">
                                    </div>
                                </li>

                            </ul>
                            <hr style="border: 2px solid ;color:rgb(104, 100, 100); margin-top: 10px; margin-bottom: 10px; ">
                            <h5>
                                Siêu thị Kingfoodmart, Số 10 Phạm Hùng, Phường 4, Bình Chánh, Thành phố Hồ Chí Minh
                            </h5>
                            <h5>
                                7:00 - 22:00
                            </h5>
                            <div style=" display: inline; ">
                                <span style="display: inline;">
                                    <img style="width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 155220.png" alt=""> Có chỗ mua xe hơi
                                    <img style="width: 24px; height: 24px; margin-left: 20px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558331.png" alt=""> phục vụ tại chỗ
                                </span>
                            </div>
                            <div style="margin-bottom: 30px;">
                                <span>
                                    <img style=" margin-top: 10px ;width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558582.png" alt=""> Mua mang đi
                                </span>
                            </div>
                            <!--2-->
                            <img src="./assets/img/shop/hcm_tinh_lo_10_1_0426474b62eb4fa98785c0161ab3a08e.png" alt="">
                            <p style="margin-top: 10px; font-weight: 600; font-size: 18px ;">
                                HCM Tỉnh Lộ 10
                            </p>
                            <div class="Map">
                                <a style="text-decoration: none; color: #EA8025; font-size: 16px ;font-weight:600;" href="">Xem Bản Đồ</a>
                            </div>
                            <ul style="display: flex;">
                                <li>
                                    Chia sẻ trên:
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 5px;">
                                        <img src="./assets/img/shop/59439.png" alt="">
                                    </div>

                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/zalo.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/facebook-messenger-icon.png" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div style=" border: 1px solid ; width: 24px; height: 24px; margin-left: 10px;">
                                        <img style="width:100%" src="./assets/img/shop/iconmonstr-link-thin.png" alt="">
                                    </div>
                                </li>

                            </ul>
                            <hr style="border: 2px solid ;color:rgb(104, 100, 100); margin-top: 10px; margin-bottom: 10px; ">
                            <h5>
                                516 Tỉnh Lộ 10, Bình Trị Đông, Bình Tân, Hồ Chí Minh
                            </h5>
                            <h5>
                                7:00 - 21:30
                            </h5>
                            <div style=" display: inline; ">
                                <span style="display: inline;">
                                    <img style="width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 155220.png" alt=""> Có chỗ mua xe hơi
                                    <img style="width: 24px; height: 24px; margin-left: 20px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558331.png" alt=""> Phục vụ tại chỗ
                                </span>
                            </div>
                            <div>
                                <span>
                                    <img style=" margin-top: 10px ;width: 24px; height: 24px;" src="./assets/img/shop/Ảnh chụp màn hình 2022-03-19 1558582.png" alt=""> Mua mang đi
                                </span>
                            </div>

                        </div>
                    </div>
                    <div style="border: 1px solid black; border-radius: 8px; margin-top: 70px ; margin-left: 320px ; width: 250px; height: 40px; text-align: center; padding: 6px;">
                        <a style=" text-decoration: none;  font-size: 16px; font-weight: 500; color: black;" href=""> Xem Thêm</a>
                    </div>
                </div>
            </div>

            <!-- </div> -->
            <!-- Footer-->
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

        <!-- Modal -->
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
        <script src="./assets/js/base.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</html>