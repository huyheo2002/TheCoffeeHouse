<?php
    require_once "../../classes/DB.php";
    // chọn ảnh từ file và đẩy lên web
    const IMAGE_PATH = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
    const MENU_PATH = "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "menu" . DIRECTORY_SEPARATOR;
    $formData = array_merge(array(), $_POST);    
    $formData = array_merge($formData, $_FILES);
    $sql = "SELECT * FROM `products` WHERE (`id` = :id)";
    $products = DB::execute($sql, [
        "id" => $_GET["id"],
    ]);    

    $product = array();
    if (!empty($products)) {
        $product = array_merge(array(), $products[0]);
    }

    if ($formData["image"]["size"] !== 0) {
        $file = $formData["image"];
        $extension = current(array_slice(explode(".", $file["name"]), -1));
        $fileName = MENU_PATH . uniqid().".".$extension;
        move_uploaded_file($file["tmp_name"], IMAGE_PATH . $fileName);
        
        if (!empty($product["image"])) {
            // Xoá file cũ
            if (file_exists(IMAGE_PATH . $product["image"])) {
                unlink(IMAGE_PATH . $product["image"]);
            }
        }
    }
    
    // Lưu dữ liệu
    $data = [        
        "id" => $product["id"] ?? -1,
        "image" => $fileName ?? $product["image"],
        "title" => $formData["title"],
        "value" => $formData["value"],
        "category_id" => $formData["category_id"],
        "desc" => $formData["desc"],
    ];

    $sql = "UPDATE `products` 
            SET `image` = :image, `title` = :title, `value` = :value, `category_id` = :category_id, `description` = :desc
            WHERE `id` = :id
    ";
    DB::execute($sql, $data);

    header("Location: ". "index.php");
