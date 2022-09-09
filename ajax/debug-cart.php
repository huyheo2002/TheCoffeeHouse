<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

var_dump($_SESSION["cart"]);
die;
