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
        header("location:./story.php");
    }
}



// session_start();
if (isset($_SESSION['message'])) {
    $a = "Chào mừng: " . $_SESSION['dataUser'];
    $b = "Thông tin của tôi";
    $linkB = "information.php";
    $linkD = "Logout.php";
    $_SESSION['login_home'] = "login";
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
    <title>Chuyện cà phê và Trà</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/story1.css">
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
        <div class="content__warp">
            <div class="content1">

                <h3>
                    Chuyện cà phê và nhà
                    <h1 style="background: orange; width: 40px; height: 5px; margin-top: -20px; margin-bottom: 10px ;margin-left: 630px;">
                    </h1>
                    <!-- <hr style="border: 4px solid rgb(212, 120, 14); width:50px; margin-top: 15px; margin-left: 90px; border-radius: 10px;"> -->
                </h3>


                <p>
                    The Coffee House sẽ là nơi mọi người xích lại gần nhau, đề cao giá trị kết nối con người và sẻ chia thân tình bên
                    những tách cà phê, ly trà đượm hương, truyền cảm hứng về lối sống hiện đại.
                </p>
                <div class="list">
                    <span class=" New">
                        <a href="">Tất cả</a>
                    </span>
                    <span> <a href=""> Coffeholic</a></span>
                    <span>
                        <a href="">Teaholic</a>
                    </span>
                    <span><a href="">Blog</a></span>
                </div>
            </div>
            <div class="content2">
                <div class="content2__left">
                    <div>
                        <img src="./assets/img/Chuyện nhà/left_img_1.png" alt="">
                    </div>
                    <div>
                        <a href=""> NĂM MỚI , UỐNG " KHỞI ĐẦU SUNG"- NHẬN LÌ XÌ KHỦNG TẠI THE COFFE HOUSE </a>
                        <h5> 21/01/2022</h5>
                        <p>Không chỉ mở cửa tưng bừng khắp cả nước, The Coffee House còn chơi lớn - lì xì cực khủng cho khách hàng ghé quán dịp Tết.</p>
                        <h5> inthemood </h5>

                    </div>
                </div>
                <div class="content2__right">
                    <div>
                        <img src="./assets/img/Chuyện nhà/right_img_1.png" alt="">
                    </div>
                    <div>

                        <a href="">NHỮNG LOẠI TRÀ CÓ HƯƠNG VÀ VỊ “ĐỔ GỤC” KHÁCH THĂM XUÂN NHÀ BẠN</a>
                        <h5> 21/01/2022</h5>
                        <p>Tết đang “lấp ló đầu ngõ” và bạn đang chuẩn bị cho một năm mới an khang, sum vầy. Tìm kiếm những thức trà, thức bánh thật ngon để tiếp đãi khách đến thăm nhà. Nếu vậy, Nhà sẽ bật mí những loại trà có hương và vị “đổ gục” những vị khách đến thăm xuân nhà bạn nhé!</p>
                        <h5> inthemood </h5>
                    </div>

                </div>
            </div>
            <div class="content3">
                <div class="content3__left">
                    <img src="./assets/img/Chuyện nhà/coffeholic_left.png" alt="">

                </div>
                <div class="content3__right">
                    <div>
                        <h4> Coffeholic</h4>
                    </div>
                    <div class="content3__right__warp">
                        <img src="./assets/img/Chuyện nhà/coffeholic_1.png" alt="">
                        <div class="content3__right__warp1">
                            <a href="">CÁCH NHẬN BIẾT HƯƠNG VỊ CÀ PHÊ ROBUSTA NGUYÊN CHẤT DỄ DÀNG NHẤT</a>
                            <h5> 11/03/2022</h5>
                            <p style="margin-left: 30px; margin-right: 130px;">
                                Cùng Arabica, Robusta cũng là loại cà phê nổi tiếng được sử dụng phổ biến...
                            </p>
                        </div>
                    </div>
                    <div class="content3__right__warp">
                        <img src="./assets/img/Chuyện nhà/coffeholic_2.png" alt="">
                        <div class="content3__right__warp1">
                            <a href="">BẬT MÍ NHIỆT ĐỘ LÝ TƯỞNG ĐỂ PHA CÀ PHÊ NGON, ĐẬM ĐÀ HƯƠNG VỊ</a>
                            <h5> 07/03/2022</h5>
                            <p style="margin-left: 30px;margin-right: 100px;">
                                Nhiệt độ nước là một yếu tố quan trọng để có thể tạo nên những...
                            </p>
                            <h5> phacaphe </h5>
                        </div>
                    </div>
                    <div class="content3__right__warp">
                        <img src="./assets/img/Chuyện nhà/coffeholic_3.png" alt="">
                        <div class="content3__right__warp1">
                            <a href="">CÁCH PHA CÀ PHÊ PHIN THƠM NGON TRÒN VỊ</a>
                            <h5> 04/03/2022</h5>
                            <p style="margin-left: 30px;margin-right: 90px;">
                                Có nhiều cách để pha một ly cà phê ngon, nhưng đối với nhiều người...
                            </p>
                            <h5> phacaphe </h5>
                        </div>
                    </div>
                    <div class="Note">
                        <div class="sreach">
                            <a href="">Tìm hiểu thêm</a>

                        </div>
                    </div>
                </div>

            </div>
            <div class="content4">
                <div class="content4__left">
                    <div>
                        <h4>
                            Teaholic
                        </h4>
                    </div>
                    <div class="content4__left__warp">
                        <img src="./assets/img/Chuyện nhà/teaholic_left_1.png" alt="">
                        <div class="content4__left__warp1">
                            <a href="">CÁCH KHAI ẤM TỬ SA ĐỂ GỢI VỊ NGON CỦA TRÀ</a>
                            <h5> 09/03/2022</h5>
                            <p style="margin-left: 20px; margin-right: 50px; font-size: 15px;margin-top: 20px;">
                                Đối với giới trà đạo đã quá quen thuộc với ấm tử sa vì nó...
                            </p>
                            <h5> phatra </h5>
                        </div>
                    </div>
                    <div class="content4__left__warp">
                        <img src="./assets/img/Chuyện nhà/teaholic_left_2.png" alt="">
                        <div class="content4__left__warp1">
                            <a href="">THƯỞNG TRÀ THEO TỪNG MÙA TRONG NĂM</a>
                            <h5> 02/03/2022</h5>
                            <p style="margin-left: 20px; margin-right: 20px; font-size: 15px; margin-top: 20px;">
                                Mỗi mùa sẽ có những loại trà thích hợp với cơ thể của bạn. Vì...
                        </div>
                    </div>
                    <div class="content4__left__warp">
                        <img src="./assets/img/Chuyện nhà/teaholic_left_3.png" alt="">
                        <div class="content4__left__warp1">
                            <a href="">KHÁC BIỆT CƠ BẢN GIỮA TRÀ XANH VÀ TRÀ ĐEN</a>
                            <h5> 19/01/2022</h5>
                            <p style="margin-left: 20px; margin-right: 50px; font-size: 15px;margin-top: 20px;">
                                Trà xanh và trà đen là hai thức trà được yêu thích và sử dụng...
                            <h5> cauchuyenvetra </h5>
                        </div>
                    </div>
                    <div class="Note">
                        <div class="sreach">
                            <a href="">Tìm hiểu thêm</a>

                        </div>
                    </div>
                </div>
                <!-- content4 -right -->
                <div class="content4__right">
                    <div>
                        <img src="./assets/img/Chuyện nhà/teaholic_right.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="content5">
                <div class="content5__left">
                    <img src="./assets/img/Chuyện nhà/blog_left.png" alt="">
                </div>
                <div class="content5__right">
                    <div>
                        <h4> Blog</h4>
                    </div>
                    <div class="content5__right__warp">
                        <img src="./assets/img/Chuyện nhà/blog_img_1.png" alt="">
                        <div class="content5__right__warp1">
                            <a href="">LỄ TÌNH NHÂN, CÙNG CRUSH ĐI ĐÂU?</a>
                            <h6 style="display: inline-block; margin: 40px 0px 10px -360px; color: rgba(0, 0, 0, 0.45);;"> 14/02/2022</h6>
                            <p style="margin-left: 30px;margin-right: 100px;">
                                Tadaaaa, hết Tết thì Valentine đầy yêu thương lại đang đến rồi nè. Lễ tình...
                            </p>
                            <h5> inthemood </h5>
                        </div>
                    </div>
                    <div class="content5__right__warp">
                        <img src="./assets/img/Chuyện nhà/blog_img_2.png" alt="">
                        <div class="content5__right__warp1">
                            <a href="">THE COFFEE HOUSE - QUÁN CÀ PHÊ LÝ TƯỞNG ĐỂ HỘI HỌP BẠN BÈ MÙA TẾT NÀY</a>
                            <h5> 01/02/2022</h5>
                            <p style="margin-left: 30px;">
                                Những ngày cuối năm, đầu năm mới, bạn lên kế hoạch để gặp gỡ những...
                            </p>
                            <h5> inthemood </h5>
                        </div>
                    </div>
                    <div class="content5__right__warp">
                        <img src="./assets/img/Chuyện nhà/blog_img_3.png" alt="">
                        <div class="content5__right__warp1">
                            <a href="">CHAI FRESH LUÔN BÊN BẠN TRONG MỌI KHOẢNH KHẮC</a>
                            <h5> 24/1/2022</h5>
                            <p style="margin-left: 30px; margin-right: 30px;">
                                Với sự kết nối của The Coffee House, những thức trà và cà phê dạng...
                            </p>
                            <h5> Review </h5>
                        </div>
                    </div>
                    <div class="Note">
                        <div class="sreach2">
                            <a href="">Tìm hiểu thêm</a>

                        </div>
                    </div>

                </div>

            </div>


        </div>
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