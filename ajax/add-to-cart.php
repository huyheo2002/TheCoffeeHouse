<?php
    // kiểm tra session đã bắt đầu chưa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    if (isset($_POST["id"])) {
        array_push($_SESSION["cart"], $_POST["id"]);
    }