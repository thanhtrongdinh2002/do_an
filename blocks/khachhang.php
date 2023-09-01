<?php

$id = $_GET['idsp'];
$r = "SELECT * FROM `sanpham` WHERE idsp=$id";
$sql = mysqli_query($conn, $r);
$row = mysqli_fetch_array($sql);
?>
<?php
if (isset($_GET['idgiohang'])) {
    $iduser = $_COOKIE['iduser'];
    $idgiohang = $_GET['idgiohang'];
    $u = "SELECT * FROM `khachhang` WHERE iduser = '$iduser' ";
    $result = mysqli_query($conn, $u);
    if (mysqli_num_rows($result) > 0) {
?>
        <script>
            window.location.href = 'index.php?url=muahang&idsp=<?php echo $id ?>&iduser=<?php echo $iduser ?>&idgiohang=<?php echo $idgiohang ?> ';
        </script>
    <?php
    }
}
if (isset($_COOKIE['iduser']) && empty($_GET['idgiohang'])) {
    $iduser = $_COOKIE['iduser'];
    $u = "SELECT * FROM `khachhang` WHERE iduser = '$iduser' ";
    $result = mysqli_query($conn, $u);
    if (mysqli_num_rows($result) > 0) {
    ?>
        <script>
            window.location.href = 'index.php?url=muahang&idsp=<?php echo $id ?>&iduser=<?php echo $iduser ?>';
        </script>
<?php
    }
}
?>

<div class="khachhang">
    <form action="" method="GET">
        <div class="form-khachhang">
            <h2>Thông tin khách hàng</h2>
            <div>
                <label for="">Họ tên</label>
                <input type="text" name="hotenkh">
            </div>
            <div>
                <label for="">Ngày sinh</label>
                <input type="date" name="ngaysinh">
            </div>
            <div>
                <label for="">Địa chỉ</label>
                <input type="text" name="diachi">
            </div>
            <div>
                <label for="">Số điện thoại</label>
                <input type="text" name="sdt">
            </div>
            <?php
            if (isset($_GET['idgiohang']) && !empty($_GET['idgiohang'])) {
                $idgiohang = $_GET['idgiohang'];
            ?>
                <input type="hidden" name="idgiohang" value="<?php echo $idgiohang ?>">
            <?php
            }
            ?>

            <input type="hidden" name="tensp" value="<?php echo $row['tensp']?>">
            <input type="hidden" name="hinhanh" value="<?php echo $row['hinhanh']?>">
            <input type="hidden" name="gia" value="<?php echo number_format($row['gia'], 0, ",", ".")?>">
            <input type="hidden" name="baohanh" value="<?php echo $row['baohanh']?>">
            <div class="btn">
                <button type="submit" name="denmuahang">Đến mua hàng </button>
            </div>
        </div>
    </form>
</div>
<?php
    if (isset($_GET['denmuahang'])) {
        $id = $_GET['idsp'];
        if ($_GET['hotenkh'] == "" || $_GET['diachi'] == "" || $_GET['sdt'] == "" || !is_numeric($_GET['sdt'])) {
    ?>
            <div class="thongbao"><?php echo "Bạn cần nhập đầy đủ thông tin !"; ?></div>
            <?php
        } else {
            $hinhanh = $_GET['hinhanh'];
            $iduser = $_COOKIE['iduser'];
            $hotenkh = $_GET['hotenkh'];
            $ngaysinh = $_GET['ngaysinh'];
            $diachi = $_GET['diachi'];
            $sdt = $_GET['sdt'];


            $thongtinkh = "insert into khachhang(hotenkh,ngaysinh,diachi,sdt,iduser) values ('$hotenkh','$ngaysinh','$diachi','$sdt','$iduser')";
            $re = mysqli_query($conn, $thongtinkh);
            if (isset($_GET['idgiohang'])) {
                $idgiohang = $_GET['idgiohang'];
            ?>
                <script>
                    window.location.href = 'index.php?url=muahang&idsp=<?php echo $id ?>&iduser=<?php echo $iduser ?>&idgiohang=<?php echo $idgiohang?>';
                </script>
            <?php
            } else {
            ?>
                <script>
                    window.location.href = 'index.php?url=muahang&idsp=<?php echo $id ?>&iduser=<?php echo $iduser ?>';
                </script>
            <?php
            }
            ?>


    <?php
        }
    }
    ?>