<?php

    CONST DB_TYPE = "mysql";
    CONST DB_HOST = "localhost";
    CONST DB_NAME = "thecoffeehouse";
    CONST USER_NAME = "root";
    CONST USER_PASSWORD = "";

    // cách 1: 
    $connection = new PDO(
        DB_TYPE.":host=".DB_HOST. ";dbname=" .DB_NAME,
        USER_NAME, 
        USER_PASSWORD        
    );

    // cách 2:
    try{
        $connection = new PDO(
            DB_TYPE.":host=".DB_HOST. ";dbname=" .DB_NAME,
            USER_NAME, 
            USER_PASSWORD
        );
    } catch(Exception $exception){
        throw new Exception("connection fail");
    }

    // Prepared Statement 
    // Với MySqli
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES (?, ?, ?)";


    // Với PDO
    $sql = "INSERT INTO persons (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";



    // Named Parameters
    // với PDO
    $mail = "testEmail@gmail.com";
    $params = array(':username' => 'test', ':email' => $mail);

    $pdo->prepare('
        SELECT * FROM users
        WHERE username = :username
        AND email = :email'
    );

    $pdo->execute($params);

    // với sqli
    $mail = "testEmail@gmail.com";
    $query = $mysqli->prepare('
        SELECT * FROM users
        WHERE username = ?
        AND email = ?'
    );

    $query->bind_param('user123', 'test', $mail);
    $query->execute();

?>