<div class="list-search">
    <?php
    if (isset($_POST['tim-kiem']) && !empty($_POST['for-search'])) {
        $search = $_POST['for-search'];
        $r = "SELECT * FROM `sanpham` WHERE tensp LIKE '%$search%'";
        $sql = mysqli_query($conn, $r);
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_array($sql)) {
    ?>
                <div>
                    <div style="height: 310px; width:286px;">
                        <div><a href="index.php?url=chitietsp&idsp=<?php $row['idsp'] ?>"><img src="images/<?php echo $row['hinhanh']; ?>" alt=""></a></div>
                        <div class="name-product"><a href="index.php?url=chitietsp&idsp=<?php $row['idsp'] ?>"><?php echo $row['tensp']; ?></a></div>
                    </div>
                    <div class="price-product"><?php echo number_format($row['gia'], 0, ",", ".") ?>₫</div>
                </div>
            <?php
            }
        } else {
            ?>
            <div style="border:none; margn-top:20px; background:none; height:39vh; width:120%;"><?php echo "Sản phẩm tìm kiếm không tồn tại !" ?></div>
    <?php
        }
    }
    ?>
</div>