<?php
    require_once "../../classes/DB.php";
    // chọn ảnh từ file và đẩy lên web
    const IMAGE_PATH = ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
    const MENU_PATH = "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . "menu" . DIRECTORY_SEPARATOR;
        
    $formData = array_merge(array(), $_POST);
    $formData = array_merge($formData, $_FILES);    
    
    if ($formData["image"]["size"] !== 0) {
        $file = $formData["image"];        
        $extension = current(array_slice(explode(".", $file["name"]), -1));        
        $fileName = MENU_PATH . uniqid().".".$extension;
        move_uploaded_file($file["tmp_name"], IMAGE_PATH . $fileName);
    }

    // Lưu dữ liệu
    $data = [        
        "image" => $fileName ?? null,
        "title" => $formData["title"],
        "value" => $formData["value"],
        "category_id" => $formData["category_id"],
        "desc" => $formData["desc"],
    ];

    $sql = "INSERT INTO `products`(`id`, `image`, `title`, `value`, `category_id`, `description`) VALUES (NULL, :image, :title, :value, :category_id, :desc) ";
    DB::execute($sql, $data);

    header("Location: ". "index.php");
