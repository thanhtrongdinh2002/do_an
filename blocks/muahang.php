<?php
$id = $_GET['idsp'];
$r = "SELECT * FROM `sanpham` WHERE idsp=$id";
$sql = mysqli_query($conn, $r);
$row = mysqli_fetch_array($sql);
?>
<?php
$iduser = $_COOKIE['iduser'];
$u = "SELECT * FROM `khachhang` WHERE iduser=$iduser";
$re = mysqli_query($conn, $u);
$result = mysqli_fetch_array($re);
?>
<div class="form-donhang">
    <div>
        <h1>Hóa đơn</h1>
        <form action="" method="POST">
            <div>
                <label for="">Họ tên khách hàng: </label>
                <input type="text" readonly name="hotenkh" style="border:none; outline:none;" value="<?php echo $result['hotenkh'] ?>"><br>
            </div>
            <div>
                <label for="">Địa chỉ: </label>
                <input type="text" readonly name="diachi" style="border:none; outline:none;" value="<?php echo $result['diachi'] ?>"><br>
            </div>
            <div>
                <label for="">Số điện thoại: </label>
                <input type="text" readonly name="sdt" style="border:none; outline:none;" value="<?php echo $result['sdt'] ?>"><br>
            </div>
            <h3 style="margin-top:20px ;">Thông tin sản phẩm</h3><br>
            <div>
                <input type="hidden" readonly name="hinhanh" value="<?php echo $row['hinhanh'] ?>">
                <img style="width: 100%; height:400px;" src="images/<?php echo $row['hinhanh'] ?>" alt=""><br>
            </div>
            <div>
                <label for="">Tên sản phẩm: </label>
                <input type="text" readonly name="tensp" style="border:none; outline:none;" value="<?php echo $row['tensp'] ?>"><br>
            </div>
            <div class="gia-donhang">
                <label for="">Giá: </label>
                <div><?php echo number_format($row['gia'], 0, ",", ".") ?>₫</div><br>
            </div>

            <?php
            if (isset($_GET['idgiohang'])) {
                $idgh = $_GET['idgiohang'];
                $t = "SELECT * FROM `giohang` WHERE idgiohang = '$idgh'";
                $g = mysqli_query($conn, $t);
                $gh = mysqli_fetch_array($g)
            ?>
                <input type="hidden" name="idgiohang" value="<?php echo $idgh ?>">
                <div>
                    <label for="">Số lượng</label>
                    <input type="text" name="soluong" value="<?php echo $gh['soluong'] ?>">
                </div>
                <div style="margin-top: 10px;">
                    <?php
                    $total = $gh['soluong'] * $row['gia'];
                    ?>
                    <label for="">Tổng: </label>
                    <input type="hidden" name="tong" value="<?php echo $total ?>">
                    <div style="flex:5;"><?php echo number_format($total, 0, ",", ".") ?>₫</div>
                    <input type="hidden" name="gia" value="<?php echo $row['gia'] ?>">

                </div>
            <?php
            } else {
            ?>
                <div>
                    <label for="">Số lượng</label>
                    <input type="text" name="soluong" value="1">
                </div>
                <div>
                    <label for="">Tổng</label>
                    <?php
                    $total = $row['gia'] * 1;
                    ?>
                    <div><?php echo number_format($total, 0, ",", ".") ?>₫</div>
                    <input type="hidden" name="tong" value="<?php echo $total ?>">
                </div>
            <?php
            }
            ?>

            <div>
                <input class="xacnhan" type="submit" name="xacnhan" value="mua ngay">
            </div>
        </form>
    </div>
</div>


<?php
if (isset($_POST['xacnhan'])) {
    $idsp = $_GET['idsp'];
    $iduser = $_COOKIE['iduser'];
    $sl = $_POST['soluong'];
    $tong = $_POST['tong'];

    $hoadon = "insert into hoadon(iduser,idsp,soluong,tong) values ('$iduser','$idsp','$sl','$tong')";
    if ($result = mysqli_query($conn, $hoadon)) {
        if (isset($_POST['idgiohang'])) {
            $id = $_GET['idsp'];
            $r = "DELETE FROM `giohang` WHERE idsp = '$id'";
            $sql = mysqli_query($conn, $r);
?>
            <script>
                alert("Đặt hàng thành công !");
                location.href = 'index.php?url=giohang';
            </script>
        <?php
        }else{
        ?>
            <script>
                alert("Đặt hàng thành công !");
                location.href = 'index.php';
            </script>
<?php
        }
    }
}
?>
<?php

?>