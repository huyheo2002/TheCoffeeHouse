<?php
include '/xampp/htdocs/TheCoffeeHouse//classes/User.php';

$users = Auth::getDataAll();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>OVER LORD</title>
    <link rel="stylesheet" href="./admin.css">
</head>

<body class="body">
    <div class="container">
        <div>
            <h1 style="text-align:center ;">QUẢN LÝ TÀI KHOẢN</h1>
        </div>
        <div>
            <h5 style="text-align:center ;">Đây là trang quyền lực nhất, nó chỉ giành cho 1 trong 41 vị đấng tối cao của Ainz Ool Gown</h5>
        </div>
        <br>
        <div style="text-align:center; margin-bottom: 50px">
            <a href="./adminFirst.php" class="btn btn-primary">Quay trở lại</a>
            <a href="./create.php" class="btn btn-primary">Create clone account</a>
        </div>

        <div>
            <?php if (count($users) > 0) { ?>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hành động</th>
                            <th scope="col">Khai tử</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['username'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td>
                                    <a href="./show.php?email=<?= $user['email'] ?>" class="btn btn-info">Show</a>
                                    <a href="./edit.php?email=<?= $user['email'] ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form action="./delete.php" method="post" email="formDelete-<?= $user['email'] ?>">
                                        <input type="hidden" name="email" value="<?= $user['email'] ?>">
                                        <button class="btn btn-danger btn-delete" email="<?= $user['email'] ?>">Delete</button>
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

</html>