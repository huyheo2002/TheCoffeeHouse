<?php
    require_once "../../classes/DB.php";

    const IMAGE_PATH = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
    const MENU_PATH = "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "menu" . DIRECTORY_SEPARATOR;
    $formData = array_merge(array(), $_POST);
    $formData = array_merge($formData, $_FILES);
    
    $sql = "SELECT * FROM `products` WHERE (`id` = :id)";
    $products = DB::execute($sql, [
        "id" => $formData["id"],
    ]);

    $product = array();
    if (!empty($products)) {
        $product = array_merge(array(), $products[0]);
    }

    if (!empty($product["image"])) {
        // Xoá file cũ
        if (file_exists(IMAGE_PATH . $product["image"])) {
            unlink(IMAGE_PATH . $product["image"]);
        }
    }

    $sql = "DELETE FROM `products` WHERE (`id` = :id)";
    DB::execute($sql, [
        "id" => $formData["id"],
    ]);
    
    header("Location: ". "index.php");
