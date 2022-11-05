<?php
    require_once "../classes/DB.php";
    include '../classes/User.php';
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


    $dataUpdateCart = [
        'id' =>  $_POST["id"],
        'email' => $_SESSION['dataEmail']
    ];
    Auth::updateCart($dataUpdateCart);


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

