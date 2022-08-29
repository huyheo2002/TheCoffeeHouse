<?php
include_once "/xampp/htdocs/TheCoffeeHouse//classes/User.php";

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
    $email=$user['email'];
    $username=$_POST['password'];
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
        if(isset ($_SESSION['message_update'])){
            header('location:./admin.php');
            unset($_SESSION['message_update']);
        }
        
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
            <h1>Edit User</h1>
        </div>
        
        <div>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" name="username" value="<?= $user['name']?>"  class="form-control">
                    <div class="text-danger">
                        <?php echo isset($err['username']) ? $err['name'] : "" ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="text" name="password" value="<?= $user['password']?>" class="form-control" id="exampleInputPassword1">
                    <div class="text-danger">
                        <?php echo isset($err['password']) ? $err['password'] : "" ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                <a href="./admin.php" class="btn btn-primary">Back to list</a>
            </form>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>