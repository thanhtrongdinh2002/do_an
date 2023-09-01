<div class="main-product">
    <div class="menu-main-product">
        <div class="menu-product-left">
            <a href="#">Sản phẩm nổi bật</a>
        </div>
    </div>
    <div class="list-product">
        <?php
        $r = "SELECT * FROM `sanpham` limit 10 ";
        $sql = mysqli_query($conn, $r);
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <div>
                <div style="height: 310px; width:277px;">
                    <div><a href="index.php?url=chitietsp&idsp=<?php echo $row['idsp']; ?>"><img src="images/<?php echo $row["hinhanh"]; ?>" alt=""></a></div>
                    <div class="name-product"><a href="index.php?url=chitietsp&idsp=<?php echo $row['idsp']; ?>"><?php echo $row['tensp']; ?></a></div>
                </div>
                <div class="price-product"><a href=""><?php echo number_format($row['gia'], 0, ",", ".") ?>₫</a></div>
            </div>
        <?php
        }
        ?>
    </div>

</div>