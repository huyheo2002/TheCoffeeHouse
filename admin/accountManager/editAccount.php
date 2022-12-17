<?php
include "../../classes/User.php";
//lấy thông tin theo email
$email = null;
$user = null;
if ($_GET['email']) {
    $email = $_GET['email'];
    $user = Auth::find($email);
} else {
    header("location:./admin.php");
}
//

$err = [];
if (isset($_POST['submit'])) {
    $email = $user['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username)) {
        $err['username'] = 'Bạn chưa nhập tài khoản';
    }
    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataUpdate = [
            'username' => $_POST['username'],
            'email' => $user['email'],
            'password' => $pass
            // 'password'=>$_POST['password']
        ];

        Auth::update($dataUpdate);
        if (isset($_SESSION['message_update'])) {
            header('location:./admin.php');
            unset($_SESSION['message_update']);
        }
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
                    <h2 class="content__title">Tài khoản: <?php echo $user['username'] ?></h2>

                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tên tài khoản</label>
                        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
                        <div class="text-danger">
                            <?php echo (isset($err['username'])) ? $err['username'] : "" ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="text" name="password" placeholder="Nhập mật khẩu cần sửa" class="form-control" id="exampleInputPassword1">
                        <div class="text-danger">
                            <?php echo (isset($err['password'])) ? $err['password'] : "" ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                   
                </form>


            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>