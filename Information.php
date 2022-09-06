<?php
include './classes/User.php';
$dataLogin = [
    'email' => $_SESSION['dataEmail']

];

Auth::checkLogin($dataLogin);

$err = [];
//doi mat khau
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];


    if (empty($password)) {
        $err['password'] = 'Bạn chưa nhập mật khẩu';
    }
    if ($rPassword != $password) {
        $err['password'] = 'Mật khẩu không khớp';
    }


    if (empty($err)) {
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $dataUpdate = [
            'username' => $_SESSION['user_username'],
            'email' => $_SESSION['user_email'],
            
            'password'=>$pass
        ];

        Auth::update($dataUpdate);
        if (isset($_SESSION['message_update'])) {
            header('location:./information.php');
            unset($_SESSION['message_update']);
        }
    }
}


//cap nhat thong tin

Auth::getDataInformation2($dataLogin);
if (isset($_POST['update'])) {

    $dataUpdateInformation = [
        'fullName' => $_POST['fullName'],
        'sex' => $_SESSION['getDataInformation_sex'],
        'birthday' => $_POST['birthday'],
        'phoneNumber' => $_POST['phoneNumber'],
        'address' => $_POST['address'],
        'email' => $_SESSION['dataEmail']
        // 'password'=>$_POST['password']
    ];
    $dataUpdateUser = [
        'username'=>$_POST['username'],
        'email' => $_SESSION['dataEmail']
        // 'password'=>$_POST['password']
    ];
    Auth::updateInformation($dataUpdateInformation);
    Auth::updateUser($dataUpdateUser);
    if (isset($_SESSION['message_update_information']) && isset($_SESSION['message_update_user'])) {
        header('location:./information.php');
        
        unset($_SESSION['message_update_information']);
        unset($_SESSION['message_update_user']);
       
        
    }
    header("refresh: 0");
    exit();
}





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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</head>

<body style="background-color: #FFF7E6;">
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">

                        <div class="container">


                            <!-- Pills navs -->
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Thông tin tài khoản</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Sửa thông tin</a>
                                </li>
                            </ul>
                            <!-- Pills navs -->

                            <!-- Pills content -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

                                    <div class="text-center mb-3">
                                        <!--set avatar user-->
                                        <h1 style="text-align:center ;"><?php echo $_SESSION['user_username'] ?></h1>

                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="">Họ & tên: </label>
                                        <label for=""><?php echo $_SESSION['getDataInformation_fullName'] ?></label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="">Giới tính: </label>
                                        <label for=""><?php echo $_SESSION['getDataInformation_sex'] ?></label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="">Ngày sinh: </label>
                                        <label for=""><?php echo $_SESSION['getDataInformation_birthday'] ?></label>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="">Số điện thoại: </label>
                                        <label for=""><?php echo $_SESSION['getDataInformation_phoneNumber'] ?></label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="loginPassword">Địa chỉ email:</label>
                                        <label for=""><?php echo $_SESSION['user_email'] ?></label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="">Địa chỉ giao hàng: </label>
                                        <label for=""><?php echo $_SESSION['getDataInformation_address'] ?></label>
                                    </div>

                                    <!-- 2 column grid layout -->
                                    <!-- <div class="row mb-4">
                                        <div class="col-md-6 d-flex justify-content-center">
                                            
                                            <div class="form-check mb-3 mb-md-0">
                                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                                <label class="form-check-label" for="loginCheck"> Remember me </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 d-flex justify-content-center">
                                           
                                            <a href="#!">Forgot password?</a>
                                        </div>
                                    </div>

                                    
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                                    
                                    <div class="text-center">
                                        <p>Not a member? <a href="#!">Register</a></p>
                                    </div> -->

                                </div>
                                <!--sua thong tin-->
                                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">


                                    <div class="accordion" id="accordionExample">

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Thông tin chi tiết
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <form action="" method="post">
                                                        <!-- Email input -->
                                                        <label for="modal-user" class="modal__label">
                                                            Họ & tên:
                                                        </label>
                                                        <input id="modal-user" name="fullName" type="text" class="modal__input-user" value="<?php echo $_SESSION['getDataInformation_fullName'] ?>">


                                                        <!-- <div class="d-flex justify-content-around align-items-center mb-4"> -->
                                                        <!-- Checkbox -->

                                                        <div class="form-check">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Giới tính</th>
                                                                        <th scope="col">
                                                                        <td><input class="form-check-input" name="cb" type="radio" value="cbNam" id="form1Example3" checked />Nam</td>
                                                                        </th>
                                                                        <th scope="col">
                                                                        <td><input class="form-check-input" name="cb" type="radio" value="cbNu" id="form1Example3" />Nữ</td>
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                            </table>


                                                        </div>
                                                        <label for="modal-pass" class="modal__label">
                                                            Tên tài khoản
                                                        </label>
                                                        <input id="modal-pass" name="username" type="text" class="modal__input-pass" value="<?php echo $_SESSION['getDataInformation_username'] ?>">


                                                        <label for="modal-pass" class="modal__label">
                                                            Ngày sinh (Năm/Tháng/Ngày)
                                                        </label>
                                                        <input id="modal-pass" name="birthday" type="text" class="modal__input-pass" value="<?php echo $_SESSION['getDataInformation_birthday'] ?>">


                                                        <label for="modal-pass" class="modal__label" type="text" class="modal__input-pass">
                                                            Số điện thoại
                                                        </label>
                                                        <input id="modal-pass" name="phoneNumber" type="text" class="modal__input-pass" value="<?php echo $_SESSION['getDataInformation_phoneNumber'] ?>">


                                                        <label for="modal-pass" class="modal__label">
                                                            địa chỉ giao hàng
                                                        </label>
                                                        <input id="modal-pass" name="address" type="text" class="modal__input-pass" value="<?php echo $_SESSION['getDataInformation_address'] ?>">


                                                        <!-- Submit button -->

                                                        <button style="width: 100%;" type="submit" name="update" class="btn btn-primary btn-lg btn-block">Cập nhật</button>



                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Noi dung 2-->

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Đổi mật khẩu
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    <form action="" method="post">
                                                        <!-- Email input -->
                                                        <!-- <div class="form-outline mb-4">
                                                            <label for="modal-pass" class="modal__label" type="text" class="modal__input-pass">
                                                                Địa chỉ email của tài khoản
                                                            </label>
                                                            
                                                        </div> -->

                                                        <!-- Password input -->
                                                        <div class="form-outline mb-4">
                                                            <label for="modal-pass" class="modal__label" class="modal__input-pass">
                                                                Nhập mật khẩu mới
                                                            </label>
                                                            <input id="modal-pass" name="password" type="password" class="modal__input-pass"> <span class="text-danger"><?php echo (isset($err['password'])) ? $err['password'] : "" ?></span>
                                                        </div>

                                                        <!-- confirm input -->
                                                        <div class="form-outline mb-4">
                                                            <label for="modal-pass" class="modal__label" class="modal__input-pass">
                                                                Nhập lại mật khẩu mới
                                                            </label>
                                                            <input id="modal-pass" name="rPassword" type="password" class="modal__input-pass"> <span class="text-danger"><?php echo (isset($err['rPassword'])) ? $err['rPassword'] : "" ?></span>

                                                        </div>




                                                        <!-- Submit button -->
                                                        <button style="width: 100%;" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Thay đổi</button>


                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        <!--Noi dung 3-->

                                        <!-- <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Accordion Item #3
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                            <!-- Pills content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</html>