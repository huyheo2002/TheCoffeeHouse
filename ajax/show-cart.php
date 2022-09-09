<?php
    require_once "../classes/DB.php";

    // kiểm tra session đã bắt đầu chưa
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    // json_encode($_SESSION["cart"]);

    $productIds = implode(",", $_SESSION["cart"]);

    $sql = "select id, image, title, value from products where id in (". $productIds .")";

    $products = DB::execute($sql);

    $countProducts = array_count_values($_SESSION["cart"]);
    $arrProduct = array_map(function($value, $key) use($products) {
        foreach($products as $product) {
            if ($product["id"] == $key) {
                return [
                    "id" => $product["id"],
                    "title" => $product["title"],
                    "image" => $product["image"],
                    "value" => $product["value"],
                    "count" => $value
                ];
            }
        }
    }, $countProducts, array_keys($countProducts));
    
    echo json_encode($arrProduct);

    