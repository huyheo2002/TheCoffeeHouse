<?php
include '/xampp/htdocs/TheCoffeeHouse/classes/User.php';
$id = null;
$products = null;

if ($_GET['id']) {
    $id = $_GET['id'];
    $products = Auth::findProducts($id);
} else {
    header("location:./adminProducts/adminproduct.php");
}

$err = [];
if (isset($_POST['submit'])) {

    $image = $_POST['image'];
    $title = $_POST['title'];
    $value= $_POST['value'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    if (empty($image)) {
        $err['image'] = '/không được bỏ trống!!!';
    }
    if (empty($title)) {
        $err['title'] = '/không được bỏ trống!!!';
    }
    if (empty($value)) {
        $err['value'] = '/không được bỏ trống!!!';
    }
    if (empty($category_id)) {
        $err['category_id'] = '/không được bỏ trống!!!';
    }
    if (empty($description)) {
        $err['description'] = '/không được bỏ trống!!!';
    }

    if (!isset($_POST['cb'])) {
        $err['cb'] = 'Vui lòng chọn ô này!!';
    }


    if (empty($err)) {
        $dataUpdateProduct = [
            'id'=> $id,
            'image' => $_POST['image'],
            'title' => $_POST['title'],
            'value' => $_POST['value'],
            'category_id' => $_POST['category_id'],
            'description' => $_POST['description']
            // 'password'=>$_POST['password']
        ];

        Auth::updateProduct($dataUpdateProduct);
        header("location:./adminproduct.php");
       
        
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

    <title>Sửa thông tin sản phẩm</title>
</head>

<body>
    <div class="container">

        <div>
            <!-- attribute for trong thẻ label chỉ sd với id -->
            <form action="" method="post">
                <!-- Email input -->
                <h1 style="text-align:center ;">Chỉnh sửa thông tin sản phẩm</h1>
                <a href="./adminProduct.php" class="btn btn-primary">Quay trở lại</a>
                <br>
                <br>
                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example13">đường link ảnh</label><span class="text-danger"><?php echo (isset($err['image'])) ? $err['image'] : "" ?></span>
                    <input type="text" name="image" id="form1Example13" class="form-control form-control-lg" value="<?php echo $products['image'] ?>" /> 

                </div>


                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example23">title (tên của sản phẩm)</label> <span class="text-danger"><?php echo (isset($err['title'])) ? $err['title'] : "" ?></span>
                    <input type="text" name="title" id="form1Example23" class="form-control form-control-lg" value="<?php echo $products['title'] ?>" />

                </div>

                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example23">value (Giá tiền)</label> <span class="text-danger"><?php echo (isset($err['value'])) ? $err['value'] : "" ?></span>
                    <input type="text" name="value" id="form1Example23" class="form-control form-control-lg" value="<?php echo $products['value'] ?>" />

                </div>
                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example23">category_id(id của giỏ hàng)</label> <span class="text-danger"><?php echo (isset($err['category_id'])) ? $err['category_id'] : "" ?></span>
                    <input type="text" name="category_id" id="form1Example23" class="form-control form-control-lg" value="<?php echo $products['category_id'] ?>"/>

                </div>
                <div class="form-outline mb-4">

                    <label class="form-label" for="form1Example23">description(Mô tả sản phẩm)</label> <span class="text-danger"><?php echo (isset($err['description'])) ? $err['description'] : "" ?></span>
                    <input type="text" name="description" id="form1Example23" class="form-control form-control-lg" value="<?php echo $products['description'] ?>" />

                </div>




                <div class="d-flex justify-content-around align-items-center mb-4">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" name="cb" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3"><a href="#!">Xác nhận chỉnh sửa</a> </label>
                    </div>
                </div>
                <div class="text-danger" style="text-align:center ;">
                    <span><?php echo (isset($err['cb'])) ? $err['cb'] : "" ?></span>
                </div>

                <!-- Submit button -->

                <button style="width: 100%;" type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Cập nhật</button>

                <!-- <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div> -->

            </form>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>