<?php
require_once '../../classes/User.php';
$_SESSION['login_dashboard'] = "login";
?>

<div class="body__sidebar">
    <div class="body__sidebar_logo">
        <a href="../Dashboard/index.php">
            <img src="../../assets/img/logoAdmin.jpg" alt="">
        </a>
    </div>
    <div class="body__sidebar_user">
    </div>
    <h3 class="sidebar__title">Quản lý hệ thống</h3>
    <ul class="body__sidebar_list">
        <li><a href="../../home.php">
                <i class="fa-solid fa-bars"></i>
                <p class="body__sidebar_text">Trang chủ</p>
            </a></li>
     
        <li><a href="../admin_order/index.php">
                <i class="fa-solid fa-bars"></i>
                <p class="body__sidebar_text">Quản lý đơn hàng</p>
            </a></li>

        <!-- <li><a href="">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý người dùng</p>
        </a></li>
        <li><a href="../ProductManager/index.php">
            <i class="fa-solid fa-bars"></i>
            <p class="body__sidebar_text">Quản lý Sản Phẩm</p>
        </a></li> -->
    </ul>
    <?php if($_SESSION['authority_id']==1){   ?>
    <h3 class="sidebar__title">Quản lý Nâng Cao</h3>
    <ul class="body__sidebar_list">
    <li><a href="../ProductManager/index.php">
                <i class="fa-solid fa-bars"></i>
                <p class="body__sidebar_text">Quản lý sản phẩm</p>
            </a></li>
        <li><a href="../accountManager/index.php">
                <i class="fa-solid fa-bars"></i>
                <p class="body__sidebar_text">Quản lý tài khoản</p>
            </a></li>
        <!-- <li><a href="">
                <i class="fa-solid fa-bars"></i>
                <p class="body__sidebar_text">Quản lý gì đấy :vvv</p>
            </a></li> -->
    </ul>
    <?php }?>
</div>