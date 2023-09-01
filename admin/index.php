<?php
require '../connect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['quyen'])) {
    if ($_SESSION['quyen'] != 1) {
        header("location:../index.php");
    }
} else {
    header("location:admin-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="admin-css/menu.css">
    <link rel="stylesheet" href="admin-css/add-product.css">
    <link rel="stylesheet" href="admin-css/list-product.css">
    <link rel="stylesheet" href="admin-css/update-product.css">
    <link rel="stylesheet" href="admin-css/index.css">
    <link rel="stylesheet" href="admin-css/list-nhomsp.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "menu.php"
    ?>
    <?php
    if (isset($_GET["url"])) {
        require $_GET['url']. ".php";
    } else {
        require "list-product.php";
    }
    ?>

</body>

</html>