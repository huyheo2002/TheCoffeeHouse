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
        header("location:./home.php");
    }
}



session_start();
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





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
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
    <div class="container">




        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is hidden by default,
                        until the collapse plugin adds the appropriate classes that we use to style each
                        element. These classes control the overall appearance, as well as the showing and
                        hiding via CSS transitions. You can modify any of this with custom CSS or
                        overriding our default variables. It's also worth noting that just about any HTML
                        can go within the <strong>.accordion-body</strong>, though the transition does
                        limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-mdb-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by
                        default, until the collapse plugin adds the appropriate classes that we use to
                        style each element. These classes control the overall appearance, as well as the
                        showing and hiding via CSS transitions. You can modify any of this with custom CSS
                        or overriding our default variables. It's also worth noting that just about any
                        HTML can go within the <strong>.accordion-body</strong>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-mdb-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default,
                        until the collapse plugin adds the appropriate classes that we use to style each
                        element. These classes control the overall appearance, as well as the showing and
                        hiding via CSS transitions. You can modify any of this with custom CSS or
                        overriding our default variables. It's also worth noting that just about any HTML
                        can go within the <strong>.accordion-body</strong>, though the transition does
                        limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</html>