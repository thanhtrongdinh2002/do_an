<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<link rel="stylesheet" href="admin-css/admin-login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

<h1>WELCOME TO WEB ADMIN </h1>

<div class="wrapper">
    <form action="" id="form-login" method="POST">
        <h3 class="form-heading">ĐĂNG NHẬP</h3>
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" class="form-input" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input type="password" name="password" class="form-input" placeholder="Mật khẩu">
            <div class="eye">
                <i class="fa-solid fa-eye"></i>
            </div>
        </div>
        <input type="submit" name="submit" value="Đăng nhập" class="form-submit">

    </form>
</div>



<div class="thongbao">
    <?php
    require "../connect.php";


    if (isset($_POST['submit'])) {
        $u = $_POST["username"];
        $p = $_POST["password"];
        $r = "SELECT * FROM `taikhoan` WHERE user='$u' and pass='$p' ";
        $sql = mysqli_query($conn, $r);
        if (mysqli_num_rows($sql) > 0) {
            header("Location:index.php");
            $_SESSION['user'] = $u;
            $row = mysqli_fetch_array($sql);
            $_SESSION['quyen'] = $row['quyen'];
        }else{
           ?>
           <!-- <script>
            alert("tài khoản hoặc mật khẩu không chính xác !");
           </script> -->
           <?php
        }
    } 
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="admin.js/login.js"></script>