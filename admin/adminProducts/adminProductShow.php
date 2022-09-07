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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $products['title'] ?></title>
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

<body>

    <section class="vh-100" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="<?php echo $products['image'] ?>" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" >
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <h1><?php echo $products['title'] ?></h1>
                                        </div>

                                        <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; color: #E57905; font-weight: bold !important;"><?php echo $products['value'] ?>đ</h4>

                                        <div class="form-outline mb-4">
                                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">id:<?php echo $products['id'] ?></h3>
                                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">category_id:<?php echo $products['category_id'] ?></h3>
                                        </div>

                                        <br>
                                        <p style="letter-spacing: 1px;font-weight: bold !important;">Mô tả sản phẩm</p>
                                        <p><?php echo $products['description'] ?></p>
                                        <div class="pt-1 mb-4">
                                            <a href="./adminProduct.php"><button class="btn btn-dark btn-lg btn-block" type="button" style="background-color: rgb(229, 121, 5)!important;">Quay trở lại</button></a>                                         
                                        </div>
                                    </form>

                                </div>
                            </div>
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