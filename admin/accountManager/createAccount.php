<?php
require_once "../../classes/User.php";
$err = [];
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];
    $authority_id=$_POST['op_authority'];

    if (empty($username)) {
        $err['username'] = ' /Bạn chưa nhập tên';
    }
    if (empty($email)) {
        $err['email'] = ' /Bạn chưa nhập email';
    }
    if (empty($password)) {
        $err['password'] = ' /Bạn chưa nhập mật khẩu';
    }
    if ($password != $rPassword) {
        $err['rPassword'] = ' /Mật khẩu không khớp';
    }

    if (!isset($_POST['cb'])) {
        $err['cb'] = 'Vui lòng đọc các điều khoản!';
    }
    if ($_POST['op_authority']==0) {
        $err['op_authority'] = ' /Vui lòng chọn quyền đăng nhập';
    }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataRegister = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'authority_id'=>$_POST['op_authority'],
            'password' => $pass
            // 'password'=>$_POST['password']
        ];

        Auth::register($dataRegister);
        $_SESSION['message_Register'] = "Create success";
        header("location:./index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-favico" href="./resources/images/main/logo/favicon.ico">
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/fix.css">
</head>

<body>
    <div id="main">
        <!-- <div class="header">This is Header :v</div> -->
        <div class="body">
            <?php
            include "../Component/Sidebar.php";
            ?>
            <div class="body__content">
                <?php
                include "../Component/Header.php";
                ?>
                <div class="content__main show">
                    <div class="content__listBtn" style="margin-bottom: 15px">

                        <button class="content__btnExit">
                            <a href="../accountManager/index.php">Thoát</a>
                        </button>
                    </div>
                </div>

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
                    <br>
                    <label class="form-label" for="form1Example23">Chọn quyền</label><span class="text-danger"><?php echo (isset($err['op_authority'])) ? $err['op_authority'] : "" ?></span>
                    <br>
                    <select class="form-select" aria-label="Default select example" name="op_authority">
                        <option value="0"selected></option>
                        <option value="1">Admin</option>
                        <option value="2">Nhân viên</option>
                        <option value="3">Người dùng</option>
                    </select>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" name="cb" type="checkbox" value="" id="form1Example3" />
                            <label class="form-check-label" for="form1Example3"><a href="#!">Xác nhận tạo mới 1 tài khoản</a> </label>
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
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
</body>

</html>