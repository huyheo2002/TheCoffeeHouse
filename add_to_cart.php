<?php
include './classes/User.php';
$productID = $_GET['productID'];
$dataUpdateCart = [
    'id' => $_GET['productID'],
    'email' => $_SESSION['dataEmail']
];
Auth::updateCart($dataUpdateCart);

