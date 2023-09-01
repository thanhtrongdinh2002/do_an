<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['quyen']);
    header("location:admin-login.php");
}
?>
