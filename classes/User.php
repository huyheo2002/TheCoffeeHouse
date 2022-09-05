<?php
include __DIR__ . './DB.php';

class Auth
{
    //lay toan bo du lieu tu bang user
    static public function getDataAll()
    {
        $sql = "select * from user";
        $users = DB::execute($sql);

        return $users;
    }

    //ham dang ky
    static public function register($dataRegister)
    {
        $sql = "insert into user(email, username, password) values(:email, :username, :password)";
        DB::execute($sql, $dataRegister);
    }

    //ham lay toan bo du lieu cua bang user qua email
    static public function getData($dataLogin)
    {
        $sql = "select * from user where email=:email";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }

    //ham dang nhap
    static public function attempt($dataLogin)
    {

        $sql = "select * from user where email=:email ";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }


    //ham xu ly thao tac du lieu sau dang nhap
    static public function login($dataLogin)
    {
        $user = Auth::attempt($dataLogin);

        if (count($user) > 0) {
            $checkPass = password_verify($_POST['password'], $user['password']);//đối chiếu mật khẩu nhập vào và mật khẩu trên SQL xem có trùng nhau không?
            if ($checkPass == true) {
                $_SESSION['message'] = "Login success";
                $_SESSION['message_login'] = "Login success";
                $_SESSION['dataUser'] = $user['username'];
                $_SESSION['dataEmail'] = $user['email'];
            }
            echo '<script>alert("Sai email hoặc mật khẩu!")</script>';
        } else {
            echo '<script>alert("Email không tồn tại!")</script>';
        }
    }


    //ham lay du lieu khi dang ton tai SESSION dang nhap
    static public function checkLogin($dataLogin)
    {
        if (isset($_SESSION['message'])) {
            $user = Auth::attempt($dataLogin);
            if (count($user) > 0){
                $_SESSION['user_username'] = $user['username'];
                $_SESSION['user_email'] = $user['email'];
            }
        }
    }


    //ham dang xuat
    static public function logout()
    {
        if (isset($_SESSION['message_Logout'])) {
            unset($_SESSION['message']);
            unset($_SESSION['dataUser']);
            unset($_SESSION['message_logout']);
            // header("location:./Login.php");
        }
    }



    //ham lay toan bo du lieu tu bang user thong qua email
    static public function find($email)
    {
        $sql = "select * from user where email=:email";
        $dataFind = ['email' => $email];

        $user = DB::execute($sql, $dataFind);

        return count($user) > 0 ? $user[0] : [];
    }


    //ham them cac du lieu trong bang user thong qua email
    static public function update($dataUpdate)
    {
        $sql = "update user set username=:username,password=:password where email=:email";
        $check= DB::execute($sql, $dataUpdate);
        return count($check) > 0 ? $check[0] : [];
        if(count($check) > 0){
            $_SESSION['message_update'] = "update success";
        }
        
        
    }

    //ham xoa du lieu trong bang user thong qua email
    static public function delete($email){
        $sql="delete from user where email=:email";
        $dataDelete=['email'=>$email];
        DB::execute($sql, $dataDelete);
    }
}
