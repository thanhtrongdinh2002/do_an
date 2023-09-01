<?php
$iddanhmuc = $_GET['iddanhmuc'];
$t = "SELECT * FROM `danhmuc` WHERE iddanhmuc = '$iddanhmuc'";
$s = mysqli_query($conn, $t);
$danhmuc = mysqli_fetch_array($s);
?>
<h3 style="margin: 15px 0 0 30px;">Sản phẩm thuộc danh mục: <?php echo $danhmuc['tendanhmuc'] ?></h3>
<?php
$r = "SELECT * FROM `nhomsanpham` WHERE iddanhmuc = '$iddanhmuc'";
$sql = mysqli_query($conn, $r);
?>
<div style="min-height:38vh;">
<?php
while ($row = mysqli_fetch_array($sql)) {
    $idnhom = $row['idnhom'];
    $e = "SELECT * FROM `sanpham` WHERE idnhom = '$idnhom'";
    $re = mysqli_query($conn, $e);
?>
    <div class="list-product">
        <?php
        while ($result = mysqli_fetch_array($re)) {
        ?> <div>
                <div style="height: 310px; width:277px;">
                    <div><a href="index.php?url=chitietsp&idsp=<?php echo $result['idsp']; ?>"><img src="images/<?php echo $result["hinhanh"]; ?>" alt=""></a></div>
                    <div class="name-product"><a href="index.php?url=chitietsp&idsp=<?php echo $result['idsp']; ?>"><?php echo $result['tensp']; ?></a></div>
                </div>
                <div class="price-product"><a href=""><?php echo number_format($result['gia'], 0, ",", ".") ?>₫</a></div>
            </div>

        <?php
        }
        ?>
    </div>
<?php
}
?>
</div>