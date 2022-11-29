<?php
require_once "../../classes/User.php";
$users = Auth::getDataAll();

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
                        <a href="./createAccount.php" class="content__btnAdd">Thêm mới</a>
                        <!-- <button class="content__btnExit">
                            <a href="../DashBoard/index.php">Thoát</a>
                        </button> -->
                    </div>
                    <h2 class="content__title">Danh sách tài khoản</h2>
                    <table>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 15%">Tên người dùng</th>
                            <th style="width: 10%">Email</th>
                            <th style="width: 10%">Xem chi tiết</th>
                            <th style="width: 10%">Chỉnh sửa</th>
                            <th style="width: 10%">Xóa</th>
                        </tr>
                        <?php
                        if (!empty($users)) {
                            $i = 0;
                            foreach ($users as $user) {
                                $i++;
                        ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['email'] ?></td>


                                    <td class="list__action">
                                        <a href="./showAccount.php?email=<?= $user['email'] ?>">Xem chi tiết</a>
                                    </td>
                                    <td class="list__action">
                                        
                                        <a href="./editAccount.php?email=<?= $user['email'] ?>">Chỉnh sửa</a>
                                        
                                    </td>

                                    <td class="list__action">
                                        
                                        <form action="./deleteAccount.php" method="post" email="formDelete-<?= $user['email'] ?>" style="display: inline-block; width: 100%">
                                            <input type="hidden" name="email" value="<?= $user['email'] ?>">
                                            <!-- <a href="">Xóa</a> -->
                                            <input type="submit" email="<?= $user['email'] ?>" value="Xóa">
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
        <!-- <div class="footer">This is footer :vvv</div> -->
    </div>
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