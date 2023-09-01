<?php
ob_start()
?>
<div class="list-product">
    <h1 style="width:30%; margin: 10px 0 0 20px;">Danh sách sản phẩm</h1>
    <div class="btn-main">
        <button><a href="index.php?url=add-product">Thêm sản phẩm</a></button>
        <button><a href="index.php?url=list-nhomsp">Cập nhật nhóm sản phẩm</a></button>
        <button><a href="index.php?url=list-danhmuc">Cập nhật danh mục sản phẩm</a></button>
    </div>

    <table>
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Thông tin sản phẩm</th>
            <th>edit</th>
            <th>detele</th>
        </tr>
        <tr>
            <?php
            $r = "SELECT * FROM `sanpham` order by idsp DESC";
            $sql = mysqli_query($conn, $r);
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <td><img style="width:300px ;height:300px;" src="../images/<?php echo $row['hinhanh'] ?>" alt=""></td>
                <td><?php echo $row['tensp'] ?></td>
                <td><?php echo number_format($row['gia'], 0, ",", ".") ?>₫</td>
                <td style="text-align: left; padding: 10px;"><?php echo $row['dienap'] ?><br>
                    chất liệu: <?php echo $row['chatlieu'] ?><br>
                    kích thước: <?php echo $row['kichthuoc'] ?><br>
                    ánh sáng: <?php echo $row['anhsang'] ?><br>
                    bảo hành: <?php echo $row['baohanh'] ?><br>
                    xuất xứ: <?php echo $row['xuatxu'] ?><br>
                    bóng: <?php echo $row['bong'] ?><br>
                </td>
                <td><a style="color:black;" href="index.php?url=update-product&idsp=<?php echo $row['idsp'] ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $row['idsp'] ?>" name="idsp">
                        <input style="border:none; outline:none;" type="submit" value="" name="delete"><i style="cursor: pointer;" class="fa-sharp fa-solid fa-trash"></i>
                    </form>
                </td>
                <?php
                if (isset($_POST['delete'])) {
                    $id = $_POST['idsp'];
                    $result = "DELETE FROM `sanpham` WHERE idsp='$id'";
                    $x = mysqli_query($conn, $result);
                    header("refresh:0;url=index.php?url=list-product");
                    // echo "<script> windown.location.href='list-product.php'</script>";
                }

                ?>
        </tr>
    <?php
            }
            ob_end_flush();

    ?>
    </tr>