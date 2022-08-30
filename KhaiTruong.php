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
        header("location:./KhaiTruong.php");
    }
}



// session_start();
if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "Logout.php";
    $_SESSION['login_KhaiTruong']="login";
} else {
    $a = "Tài khoản";
    $linkC = "Register.php";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ưu đãi thành viên</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/KhaiTruong.css">
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
                        <li><a href="./tuyendung.php" target ="_blank">Tuyển dụng</a></li>
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
            <!--content-->
             <div class="content__wrap">
                <div class="container">
                    <div class="content__left">
                       <h1>
                        MỪNG KHAI TRƯƠNG THE COFFEE HOUSE THE PARK HOME
                      
                       <br>
                        NHẬN NGAY ƯU ĐÃI GIẢM 20%
                       </h1>
                       <div class="content__left__sale">
                           <p>
                            🔸 Giảm 20% cho món nước, bánh, snack
                            <br>
                            🔸 Không áp dụng cho cà phê gói/lon, trà Tearoma, chai Fresh, topping, các loại combo & vật phẩm lưu niệm
                            <br>
                            🔸 Áp dụng cho dịch vụ Giao hàng, Mang đi, Mua tại cửa hàng
                            <br>
                            🔸 Thời gian lấy coupon: 11/03 - 31/03/2022 (có thể kết thúc sớm hơn dự kiến do số lượng coupon giới hạn)
                            <br>
                            🔸 Ưu đãi có hạn dùng trong 10 ngày
                            <br>
                            🔸 Không áp dụng các chương trình khuyến mãi song song
                           </p>

                       </div>
                       <div style= " text-align: center;background-color: rgba(229, 121, 5, 1); width: 300px; height: 40px; padding: 10px; border-radius: 5px; margin-top: 20px;">
                           <a style= "text-decoration: none; color: white ; font-weight: 600px;" href=""> Nhận Code Khuyến Mãi</a>
                       </div>
                         <img src="./assets/img/KhaiTruongNhaMoi/Home.png" alt="">
                    </div>
                    <img style= " width: 42%; height: 100%; position: absolute; margin-left: 273.5px;" src="./assets/img/KhaiTruongNhaMoi/Bgr_right.png" alt=""> 
                    <!--content__right-->
                    <div class="content__right">
                        <div>
                            <div class="content__right_img">
                                <img src="./assets/img/KhaiTruongNhaMoi/Store.png" alt="">
                            </div>
                            <img src="./assets/img/KhaiTruongNhaMoi/img_content.png" alt="">
                           
                        </div>
                            <div class="Note1">
                                <div class="Note">
                                    <a  style= " text-decoration: none;color: black; font-weight: 600px;" href=""> Xem cửa hàng</a>
                                </div>
                              <ul style=" margin-left: 340px; margin-top: -35px; font-size: 16px; ">
                                chia sẻ: 
                                <li style="display: inline-block; margin-bottom: -4px;">
                                    <img style= "width: 25px; height: 25px;" src="./assets/img/KhaiTruongNhaMoi/facebook.png" alt="">
                                </li>
                                <li style="display: inline-block; margin-bottom: -4px;">
                                    <img style= "width: 25px; height: 25px;" src="./assets/img/KhaiTruongNhaMoi/zalo.png" alt="">
                                </li>
                                <li style="display: inline-block; margin-bottom: -4px;">
                                    <img style= "width: 25px; height: 25px;" src="./assets/img/KhaiTruongNhaMoi/message.png" alt="">
                                </li>
                                <li style="display: inline-block; margin-bottom: -4px;">
                                    <img style= "width: 25px; height: 25px;" src="./assets/img/KhaiTruongNhaMoi/Link.png" alt="">
                                </li>

                              </ul>
                            </div>
                    </div>
                    
                </div>        
        </div> 
           <!-- Footer-->
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
</html>