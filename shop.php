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



// session_start();
if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "Logout.php";
    $_SESSION['login_shop'] = "login";
} else {
    $a = "Tài khoản";
    $linkC = "Register.php";
}

require_once("./classes/DB.php");
    $sql = 'select * from shops';
    $test = DB::execute($sql);
    // var_dump($test);
    // die;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/shop_fix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        <!-- Content-->
        <div class="content__wrap">

            <div class="poster">
                <img src="./assets/img/shop/poster.png" alt="">
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
                                     <a href=""> Hà Nội (38)</a>
                                </div>

                            </li>
                            <li>    
                                 <a href="">Tp Hồ Chí Minh (74)</a>
                                
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
                <div class="shopHot_Wrap">
                <ul class = "shop_list">
                    <?php
                        foreach ($test as $tes){
                     ?>
                        
                        <li>
                            <div class="shopList_ImgWrap">
                               <img src="<?= $tes['image']  ?> " alt="" srcset="">
                            </div>
                            <div class = "ShopList_content">
                                <h2>
                                    <?= $tes['title']  ?>
                                </h2>
                               <!-- <div class="btn"> -->
                               <div class="Map">
                                    <a href="">Xem Bản Đồ</a>
                               </div>
                               
                               <!-- </div> -->
                               <div class="List_share">
                                <p> Chia sẻ trên : </p>
                                <i  title = "chia sẻ qua facebook " class="fa-brands fa-facebook fa-lg"></i>
                                <i  title = "chia sẻ qua tin nhắn " class="fab fa-facebook-messenger fa-lg"></i>
                                <i  title = "coppy link" class="fas fa-link fa-lg"></i>
                               </div>
                                
                                <p>
                                    <?= $tes['address']  ?>
                                </p>
                                <p>
                                    <?= $tes['time_open']  ?>
                                </p>
                            </div>
                            <div class="List_option">
                                <div  class="List_option1">
                                    <p>
                                        <i class="fa-solid fa-car"></i> Có chỗ để xe hơi 
                                    </p>
                                    <p>
                                        <i class="fa-regular fa-face-smile"></i> Thân thiện với gia đình
                                    </p>
                                   
                                </div>
                                <i class="fa-solid fa-shop"></i> Phục vụ tại chỗ
                            </div>
                           
                        </li>
                         <?php 
                        }
                         ?>
                </ul>
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

</html>