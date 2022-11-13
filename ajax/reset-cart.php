<?php
  
    // kiểm tra session đã bắt đầu chưa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["cart"] = [];
    

   