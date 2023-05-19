<?php
require_once __DIR__ . '/DB.php';


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
        $sql = "insert into user(email, username, password, authority_id) values(:email, :username, :password, :authority_id)";
        DB::execute($sql, $dataRegister);
    }

    static public function registerInfor($dataRegisterInfor)
    {
        $sql = "insert into information(email) values(:email)";
        DB::execute($sql, $dataRegisterInfor);
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
            $checkPass = password_verify($_POST['password'], $user['password']); //đối chiếu mật khẩu nhập vào và mật khẩu trên SQL xem có trùng nhau không?
            if ($checkPass == true) {
                $_SESSION['message'] = "Login success";
                $_SESSION['message_login'] = "Login success";
                $_SESSION['dataUser'] = $user['username'];
                $_SESSION['dataEmail'] = $user['email'];
                $_SESSION['authority_id']=$user['authority_id'];
                Auth::getDataInformation($dataLogin);
            } else {
                $_SESSION['wrongPassword'] = "Sai mật khẩu!";
            }
        } else {
            $_SESSION['wrongEmail'] = "email không tồn tại!";
        }
    }


    //ham lay du lieu khi dang ton tai SESSION dang nhap
    static public function checkLogin($dataLogin)
    {
        if (isset($_SESSION['message'])) {
            $user = Auth::attempt($dataLogin);
            if (count($user) > 0) {
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
        $check = DB::execute($sql, $dataUpdate);
        return count($check) > 0 ? $check[0] : [];
        if (count($check) > 0) {
            $_SESSION['message_update'] = "update success";
        }
    }

    //ham xoa du lieu trong bang user thong qua email
    static public function delete($email)
    {
        $sql = "delete from user where email=:email";
        $dataDelete = ['email' => $email];
        DB::execute($sql, $dataDelete);
    }

    //lay thong tin trong bang information thong qua email trong bang user
    static public function getDataInformation($dataLogin)
    {
        $sql = "SELECT * FROM information,user WHERE user.email=information.email AND user.email=:email";

        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }

    //xử lý dữ liệu cho information
    static public function getDataInformation2($dataLogin)
    {
        $user = Auth::getDataInformation($dataLogin);
        if (count($user) > 0) {
            $_SESSION['getDataInformation_fullName'] = $user['fullName'];
            $_SESSION['getDataInformation_birthday'] = $user['birthday'];
            $_SESSION['getDataInformation_phoneNumber'] = $user['phoneNumber'];
            $_SESSION['getDataInformation_email'] = $user['email'];
            $_SESSION['getDataInformation_sex'] = $user['sex'];
            $_SESSION['getDataInformation_address'] = $user['address'];
            $_SESSION['getDataInformation_username'] = $user['username'];
            unset($_SESSION['dataUser']);
            $_SESSION['dataUser'] = $user['username'];
        }
    }
    //cập nhật thông tin cho bảng information
    static public function updateInformation($dataUpdateInformation)
    {
        $sql = "update information set fullName=:fullName, birthday=:birthday, phoneNumber=:phoneNumber, sex=:sex, address=:address where email=:email";
        $check = DB::execute($sql, $dataUpdateInformation);
        return count($check) > 0 ? $check[0] : [];
        if (count($check) > 0) {
            $_SESSION['message_update_information'] = "update success";
        }
    }


    //cập nhật username trong bản user thông qua email
    static public function updateUser($dataUpdateUser)
    {
        $sql = "update user set username=:username where email=:email";
        $check = DB::execute($sql, $dataUpdateUser);
        return count($check) > 0 ? $check[0] : [];
        if (count($check) > 0) {
            $_SESSION['message_update_user'] = "update success";
        }
    }


    //hiển thị toàn bộ dữ liệu trong bảng products
    static public function loadDataProduct()
    {
        $sql = "select * from products";
        $products = DB::execute($sql);

        return $products;
    }


    //lấy toàn bộ thông tin trong bản producs theo id
    static public function findProducts($id)
    {
        $sql = "select * from products where id=:id";
        $dataFindProduct = ['id' => $id];

        $products = DB::execute($sql, $dataFindProduct);
        return count($products) > 0 ? $products[0] : [];
    }


    //ham them moi mot san pham
    static public function CreateProduct($dataCreateProduct)
    {
        $sql = "insert into products(image, title, value,category_id,description) values(:image, :title, :value,:category_id,:description)";
        DB::execute($sql, $dataCreateProduct);
    }

    //ham xoa du lieu trong bang product thong qua id
    static public function deleteProduct($id)
    {
        $sql = "delete from products where id=:id";
        $dataDeleteProduct = ['id' => $id];
        DB::execute($sql, $dataDeleteProduct);
    }

    //cập nhật san pham thong qua id
    static public function updateProduct($dataUpdateProduct)
    {
        $sql = "update products set image=:image, title=:title, value=:value,category_id=:category_id, description=:description where id=:id";
        $check = DB::execute($sql, $dataUpdateProduct);
        return count($check) > 0 ? $check[0] : [];
        if (count($check) > 0) {
            header("location:./adminProduct.php");
        }
    }

    //cập nhật giỏ hàng (cart)
    static public function updateCart($dataUpdateCart)
    {
        $sql = "insert into cart(email, id) values(:email, :id)";
        DB::execute($sql, $dataUpdateCart);
    }


    //reset giỏ hàng (cart)
    static public function delete_cart($email)
    {
        $sql = "delete from cart where email =:email";
        $data_delete_cart = ['email' => $email];
        DB::execute($sql, $data_delete_cart);
    }


    static public function update_order($data_update_order)
    {
        $sql = "insert into user_order(email, cart_status, time_order, code_order, cost_order) values(:email, :cart_status, CURRENT_TIMESTAMP, :code_order, :cost_order)";
        DB::execute($sql, $data_update_order);
    }

    //cap nhat thoi gian dat hng cho bang cart
    static public function update_cart_time($email)
    {
        $sql = "update cart set time_order=CURRENT_TIMESTAMP where email =:email and time_order=''";
        $dataUpdateCartTime = ['email' => $email];
        DB::execute($sql, $dataUpdateCartTime);
    }


    //hiển thị dữ liệu của bảng user_order
    static public function load_order()
    {
        $sql = "select * from user_order";
        $order = DB::execute($sql);
        return $order;
    }

    //hiển thị chi tiết sản phẩm đã order
    static public function load_detail_order($data_load_detail_order)
    {
        $sql = "select * from cart,products where cart.id=products.id and cart.email=:email and cart.time_order=:time";
        $load_detail_order = DB::execute($sql, $data_load_detail_order);
        return $load_detail_order;
    }

    //xóa order
    static public function delete_order($id)
    {
        $sql = "delete  from user_order where confirm_cart_id=:confirm_cart_id";
        $data_delete_order = ['confirm_cart_id' => $id];
        DB::execute($sql, $data_delete_order);
    }


    //lấy thông tin đơn hàng theo id order
    static public function find_cart_with_id($id)
    {
        $sql = "select * from user_order where confirm_cart_id=:confirm_cart_id";
        $dataFindProduct = ['confirm_cart_id' => $id];

        $products = DB::execute($sql, $dataFindProduct);
        return count($products) > 0 ? $products[0] : [];
    }


    //xóa đơn hàng trong bảng cart
    static public function delete_cart_by_admin($delete_cart_by_admin)
    {
        $sql = "delete  from cart where email=:email and time_order=:time_order";
        DB::execute($sql, $delete_cart_by_admin);
    }
}
