<?php
include '/xampp/htdocs/TheCoffeeHouse/classes/User.php';

$orders=Auth::load_order();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>??????????</title>
    <link rel="stylesheet" href="./admin.css">
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

<body class="body">
    <div class="container">
        <div>
            <h1 style="text-align:center ;">Quản lý đơn hàng</h1>
        </div>
        <div>
            <!-- <h5>Đây là trang quyền lực nhất, nó chỉ giành cho 1 trong 41 vị đấng tối cao của Ainz Ool Gown</h5> -->
        </div>
        <br>
        <div style="text-align:center; margin-bottom: 50px">
            <a href="/TheCoffeeHouse/admin/adminFirst.php" class="btn btn-primary">Quay trở lại</a>
        </div>

        <!-- <br>
        <br>
        <div>
            <h5>Dưới đây là danh sách các tài khoản và sinh mạng của chúng nằm trong tay bạn. Bạn có thể làm mọi thứ (kể cả việc khai tử)</h5>
            <h6 style="text-align:center ;">(Hãy thể hiện sự ân ái của bạn thông qua việc ban cho chúng một cái chết không đau đớn)</h6> -->
    </div>
    <div>
        <?php if (count($orders) > 0) { ?>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">email khách hàng</th>
                        <th scope="col">Tình trạng thanh toán</th>
                        <th scope="col">xem chi tiết</th>
                        <th scope="col">xóa đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order) { ?>
                        <tr>
                            <td><?php echo $order['confirm_cart_id'] ?></td>
                            <td><?php echo $order['email'] ?></td>
                            <td><?php echo $order['cart_status'] ?></td>
                            <td>
                                <a href="./list_order.php?email=<?= $order['email'] ?>" class="btn btn-info">Xem chi tiết</a>
                            </td>

                            <td>
                                <form action="./deleteProduct.php" method="post" id="formDelete-<?= $order['email'] ?>">
                                    <input type="hidden" name="id" value="<?= $order['email']?>">
                                    <button class="btn btn-danger btn-delete" id="<?= $order['email']?>">Xóa đơn hàng</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } else { ?>
            <h2> No Data.</h2>
        <?php } ?>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        let deleteBtns = document.querySelectorAll('.btn-delete');
        deleteBtns.forEach(function(item) {
            item.addEventListener('click', function(event) {
                if (confirm("Delete user")) {
                    let id = this.getAttribute('id');
                    document.querySelector('formDelete-' + id).submit();
                }

            })
        })
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</html>