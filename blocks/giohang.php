
<div style="min-height:80vh;">
    <table class="giohang">
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Thanh toán</th>
            <th>Edit</th>
        </tr>
        <?php
        $iduser = $_COOKIE['iduser'];

        $r = "SELECT * FROM `giohang` INNER JOIN `sanpham` ON giohang.idsp LIKE sanpham.idsp WHERE giohang.iduser = '$iduser'";
        $sql = mysqli_query($conn, $r);
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_array($sql)) {
                $total = $row['soluong'] * $row['gia'];
        ?>

                <tr>
                    <td style="width: 250px;">
                        <div style=" height:248px;">
                            <img style="width:100%;" src="images/<?php echo $row['hinhanh'] ?>" alt="">
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php echo $row['tensp']; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                            <?php echo number_format($row['gia'], 0, ",", "."); ?>₫
                        </div>
                    </td>
                    <td>
                        <div class="number">
                            <form action="" method="POST">
                                <input type="hidden" name="idsp" value="<?php echo $row['idsp'] ?>">
                                <input type="hidden" name="soluong" value="<?php echo $row['soluong'] ?>">
                                <button type="submit" class="minus" name="minus"><i class="fa-solid fa-minus"></i></button>
                            </form>
                            <div style="padding:0 7px; border-top: 0.5px solid blue; border-bottom: 0.5px solid blue;">
                                <?php echo $row['soluong']; ?>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" name="idsp" value="<?php echo $row['idsp'] ?>">
                                <input type="hidden" name="soluong" value="<?php echo $row['soluong'] ?>">
                                <button type="submit" class="plus" name="plus"><i class="fa-solid fa-plus"></i></button>
                            </form>

                        </div>
                    </td>
                    <td>
                        <div>
                            <?php echo number_format($total, 0, ",", "."); ?>₫
                        </div>
                    </td>
                    <td>
                        <div>
                            <button class="payment" type="submit" name="thanh_toan"><a href="index.php?url=khachhang&idsp=<?php echo $row['idsp'] ?>&idgiohang=<?php echo $row['idgiohang']?>">Thanh toán</a></button>
                        </div>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="idsp" value="<?php echo $row['idsp'] ?>">
                            <button style="background:none; border:none; width:100%; cursor:pointer; " name="xoa"><i style="font-size: 25px;" class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
        <?php
            }
        } else {
            ?>
            <div style="display:flex; justify-content:center; margin-top:20px; font-size:20px; font-weight:700;">
                <?php echo "Giỏ hàng trống !";?>
            </div>
            <?php
        }
        ?>
    </table>
</div>
<?php
if (isset($_POST['minus'])) {
    $id = $_POST['idsp'];
    $sl = $_POST['soluong'];
    if ($sl == 1) {
        $r = "DELETE FROM `giohang` WHERE idsp = '$id' AND iduser = '$iduser'";
    } else {
        $sl = $sl - 1;
        $r = "UPDATE `giohang` SET soluong = '$sl' WHERE idsp = '$id' AND iduser = '$iduser'";
    }
    $sql = mysqli_query($conn, $r);
    // header("Refresh:0");
    echo ("<meta http-equiv='refresh' content='0'>");
}
if (isset($_POST['plus'])) {
    $id = $_POST['idsp'];
    $sl = $_POST['soluong'] + 1;
    $r = "UPDATE `giohang` SET soluong = '$sl' WHERE idsp = '$id' AND iduser = '$iduser'";
    $sql = mysqli_query($conn, $r);
    // header("Refresh:0");
    echo ("<meta http-equiv='refresh' content='0'>");
}
if (isset($_POST['xoa'])) {
    $id = $_POST['idsp'];
    $r = "DELETE FROM `giohang` WHERE idsp = '$id' AND iduser = '$iduser'";
    $sql = mysqli_query($conn, $r);
    echo ("<meta http-equiv='refresh' content='0'>");
}
?>