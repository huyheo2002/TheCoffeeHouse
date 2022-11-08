<?php
    include '../classes/User.php';
    // kiểm tra session đã bắt đầu chưa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["cart"] = [];
    

    $email=$_SESSION['dataEmail'];
    Auth::delete_cart($email);