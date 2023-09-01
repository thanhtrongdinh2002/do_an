<?php
$id = $_GET['idsp'];
$r = "SELECT * FROM `sanpham` WHERE idsp=$id";
$sql = mysqli_query($conn, $r);
$row = mysqli_fetch_array($sql);
?>
<div class="ctsp">
    <div><img src="images/<?php echo $row["hinhanh"]; ?>" alt=""></div>
    <div class="information">
        <div><?php echo $row['tensp']; ?></div>
        <div class="price-product"><?php echo number_format($row['gia'], 0, ",", "."); ?><div>₫</div>
        </div>
        <div>
            <ul class="product-attributes">
                <li><?php echo $row['dienap']; ?></li>
                <li><?php echo $row['kichthuoc']; ?></li>
                <li><?php echo $row['chatlieu']; ?></li>
                <li><?php echo $row['anhsang']; ?></li>
                <li><?php echo $row['chongnuoc']; ?></li>
                <li><?php echo $row['xuatxu']; ?></li>
                <li><?php echo $row['baohanh']; ?></li>
            </ul>
        </div>
        <a href="index.php?url=khachhang&idsp=<?php echo $row['idsp']?>"><input style="cursor:pointer;width:250px; margin-right:90px;" type="submit" name="muangay" value="Mua ngay"></a>
        <a href="index.php?url=giohang&idsp=<?php echo $row['idsp']?>"><input style="background:#2b87ff;cursor:pointer; width:250px;" type="submit" name="them" value="Thêm vào giỏ hàng"></a>

    </div>
    <?php
    if(isset($_POST['them'])){
        $idsp = $_POST['idsp'];
        $iduser = $_COOKIE['iduser'];
    
        $r = "SELECT * FROM `giohang` WHERE idsp = '$idsp' AND iduser = '$iduser'";
        $sql = mysqli_query($conn, $r);
    
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_array($sql)) {
                $sl = $row['soluong'] + 1;
                $gh = "UPDATE `giohang` SET soluong = '$sl' WHERE idsp = '$idsp' AND iduser = '$iduser'";
                $ugh = mysqli_query($conn, $gh);
            }
        } else {
            $i = 1;
            $re = "INSERT INTO `giohang` (iduser,idsp,soluong) VALUE ('$iduser','$idsp','$i')";
            $result = mysqli_query($conn, $re);
        }
    }
    
    ?>
    <div class="other-product">
        <div>
            <h2>Các khuyến mãi và chính sách bảo hành</h2>
        </div>
    </div>
</div>