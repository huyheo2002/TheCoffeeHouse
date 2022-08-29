<?php
include './classes/User.php';

AUth::logout();
unset($_SESSION['message']);
header("location:./home.php");
?>