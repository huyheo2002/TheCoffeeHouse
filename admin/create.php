<?php
include_once "/xampp/htdocs/TheCoffeeHouse//classes/User.php";

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

        Auth::register($dataRegister);
        $_SESSION['message_Register'] = "Create success";
        header('location:./admin.php');
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create user</title>
</head>

<body>
    <div class="container">
        
        <div>
                <!-- attribute for trong thẻ label chỉ sd với id -->
                <form action="" method="post">
                        <!-- Email input -->
                        <h1>Đăng ký tài khoản</h1>
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Địa chỉ email</label> <span class="text-danger"><?php echo (isset($err['email'])) ? $err['email'] : "" ?></span>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Tài khoản</label><span class="text-danger"><?php echo    (isset($err['username'])) ? $err['username'] : "" ?></span>
                            
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Mật khẩu</label>  <span class="text-danger"><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                            
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
                                <label class="form-check-label" for="form1Example3"><a href="#!">Xác nhận tạo mới 1 tài khoản fake</a> </label>
                            </div>
                        </div>
                        <div class="text-danger" style="text-align:center ;">
                            <span><?php echo (isset($err['cb'])) ? $err['cb'] : "" ?></span>
                        </div>

                        <!-- Submit button -->

                        <button style="width: 100%;" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Đăng ký</button>

                        <!-- <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div> -->

                    </form>
            </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>