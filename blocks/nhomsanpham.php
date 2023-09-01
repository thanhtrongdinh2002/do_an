<?php

$idnhom = $_GET["idnhom"];
$r = "SELECT * FROM `sanpham` WHERE idnhom = $idnhom";
$sql = mysqli_query($conn, $r);
?>
<div class="list-nhom">
    <?php
    while ($row = mysqli_fetch_array($sql)) {
    ?>
        <div>
            <div><a href="index.php?url=chitietsp&idsp=<?php echo $row['idsp']; ?>"><img src="images/<?php echo $row["hinhanh"]; ?>" alt=""></a></div>
            <div class="name-product"><a href="index.php?url=chitietsp&idsp=<?php echo $row['idsp']; ?>"><?php echo $row['tensp']; ?></a></div>
            <div class="price-product"><a href=""><?php echo number_format($row['gia'],0,",",".") ?>₫</a></div>
        </div>
    <?php
    }
    ?>
</div>