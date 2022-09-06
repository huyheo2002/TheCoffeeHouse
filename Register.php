<?php
include './classes/User.php';

$err = [];
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];

    if (empty($username)) {
        $err['username'] = '/Bạn chưa nhập tên';
    }
    if (empty($email)) {
        $err['email'] = '/Bạn chưa nhập email';
    }
    if (empty($password)) {
        $err['password'] = '/Bạn chưa nhập mật khẩu';
    }
    if ($password != $rPassword) {
        $err['rPassword'] = '/Mật khẩu không khớp';
    }

    if (!isset($_POST['cb'])) {
        $err['cb'] = 'Vui lòng đọc các điều khoản!';
    }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataRegister = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $pass
            // 'password'=>$_POST['password']
        ];
        $dataRegisterInfor = ['email' => $_POST['email']];

        Auth::register($dataRegister);
        Auth::registerInfor($dataRegisterInfor);
        $_SESSION['message_Register'] = "Create success";
        header('location:./home.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <!--slide slick-->
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./assets/img/dangky/4.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/img/dangky/3.webp" class="d-block w-100" alt="...">
                            </div>

                            <div class="carousel-item">
                                <img src="./assets/img/dangky/6.webp" class="d-block w-100" alt="...">
                            </div>


                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!--end slide slick-->
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="" method="post">
                        <!-- Email input -->
                        <h1>Đăng ký tài khoản</h1>
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Địa chỉ email</label> <span class="text-danger"><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Tài khoản</label><span class="text-danger"><?php echo (isset($err['username'])) ? $err['username'] : "" ?></span>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Mật khẩu</label> <span class="text-danger"><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>

                        </div>

                        <!-- confirm input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="rPassword" id="form1Example23" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Nhập lại mật khẩu</label><span class="text-danger"><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : "" ?></span>

                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" name="cb" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"><a href="#!">Đồng ý với các điều khoản</a> <br></label>
                                <div class="text-danger" style="text-align:center ;">
                                    <span><?php echo (isset($err['cb'])) ? $err['cb'] : "" ?></span>
                                </div>
                            </div>
                        </div>


                        <!-- Submit button -->

                        <button style="width: 100%;" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Đăng ký</button>

                        <!-- <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div> -->

                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</html>