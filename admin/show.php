<?php
include_once "/xampp/htdocs/TheCoffeeHouse/classes/User.php";

$email = null;
$user = null;
if ($_GET['email']) {
    $email = $_GET['email'];
    $user = Auth::find($email);
} else {
    header("location:./admin.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Show User</title>
</head>

<body>
    <div class="container">
        <div>
            <h1>Show User</h1>
        </div>

        <?php if ($user) { ?>
            <h1>User Information</h1>

            <h3>Name : <?php echo $user['username'] ?></h3>
            <h3>Email: <?php echo $user['email'] ?></h3>
        <?php } else { ?>
            <h1>User Not Found</h1>
            <a href="./admin.php" class="btn btn-primary">Back to list</a>

        <?php } ?>
        <a href="./admin.php" class="btn btn-primary">Back to list</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>