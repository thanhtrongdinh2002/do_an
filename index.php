<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/chitietsp.css">
    <link rel="stylesheet" href="css/muahang.css">
    <link rel="stylesheet" href="css/khachhang.css">
    <link rel="stylesheet" href="css/nhomsanpham.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/giohang.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "connect.php";

    ?>

    <?php
    require "blocks/banner.php"
    ?>

    <?php
    //tạo biến uid bằng cách sử dụng biến cookies của php
    $iduser = $_COOKIE['iduser'];
    //nếu ui bằng null thì cho biến uid random
    if ($_COOKIE['iduser'] == null) {
        $iduser = rand(0, 10000000);
    }
    // tạo cookies với php
    setcookie('iduser', $iduser, time() + (86400 * 1), "/");
    ?>

    <?php
    require "blocks/menu.php"
    ?>
    <?php
    if (isset($_GET["url"])) {
        require "blocks/" . $_GET["url"] . ".php";
    } else {
        require "blocks/product.php";
    }
    ?>

    <?php
    require "blocks/footer.php"
    ?>
</body>

</html>