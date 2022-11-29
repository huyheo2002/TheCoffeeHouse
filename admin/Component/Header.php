<?php

?>

<ul class="header nav nav-tabs">
    <div class="nav-item"></div>
    <li class="nav-item dropdown">
        <a class="header__avtUser nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle" src="../../assets/img/base/profile.png" alt="">
        </a>
        <div class="dropdown-menu">
            <?php
            // if (Auth::user()->role_id != Role::OF["student"]) {
            ?>
            <a class="dropdown-item" href="">Vào giao diện quản lý</a>
            <?php
            // }
            ?>
            <a class="dropdown-item" href="">Hồ sơ của bạn</a>
            <a class="dropdown-item" href="../../Logout.php">Đăng xuất</a>
        </div>
    </li>
</ul>