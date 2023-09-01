<?php

use function PHPSTORM_META\type;

ob_start();
$id = $_GET['idsp'];
$r = "SELECT * FROM `sanpham` WHERE idsp='$id'";
$sql = mysqli_query($conn, $r);
$row = mysqli_fetch_array($sql);
?>

<h2>Sửa sản phẩm</h2>
<div class="update-product">
    <form action="" class="update" method="POST" enctype="multipart/form-data">
        <div class="update-form">
            <input type="hidden" name="idsp" value="<?php echo $row['idsp'] ?>">
            <div>
                <label for="">Tên sản phẩm</label>
                <input type="text" name="tensp" value="<?php echo $row['tensp'] ?>">
            </div>
            <div class="update-image">
                <div>
                    <label style="margin-left:10px ;" for="">Hình ảnh</label>
                    <input type="file" name="hinhanh" value="">
                    <img style="width:100px;" src="../images/<?php echo $row['hinhanh'] ?>" alt="">
                </div>
            </div>
            <div>
                <label for="">Giá</label>
                <input type="text" name="gia" value="<?php echo $row['gia'] ?>">
            </div>
            <div>
                <label for="">Điện áp</label>
                <input type="text" name="dienap" value="<?php echo $row['dienap'] ?>">
            </div>
            <div>
                <label for="">Kích thước</label>
                <input type="text" name="kichthuoc" value="<?php echo $row['kichthuoc'] ?>">
            </div>
            <div>
                <label for="">Chất liệu</label>
                <input type="text" name="chatlieu" value="<?php echo $row['chatlieu'] ?>">
            </div>
            <div>
                <label for="">Ánh sáng</label>
                <input type="text" name="anhsang" value="<?php echo $row['anhsang'] ?>">
            </div>
            <div>
                <label for="">Chống nước</label>
                <input type="text" name="chongnuoc" value="<?php echo $row['chongnuoc'] ?>">
            </div>
            <div>
                <label for="">Bảo hành</label>
                <input type="text" name="baohanh" value="<?php echo $row['baohanh'] ?>">
            </div>
            <div>
                <label for="">Xuất xứ</label>
                <input type="text" name="xuatxu" value="<?php echo $row['xuatxu'] ?>">
            </div>
            <div>
                <label for="">Bóng</label>
                <input type="text" name="bong" value="<?php echo $row['bong'] ?>">
            </div>
            <label style="margin-left:10px ;" for="">Chọn nhóm:</label>
            <select name="chonnhom">
                <h2>Chon nhom</h2>
                <?php
                $t = "SELECT * FROM `nhomsanpham`";
                $s = mysqli_query($conn, $t);
                while ($nhomsp = mysqli_fetch_array($s)) {
                ?>
                    <option value="<?php echo $nhomsp['idnhom'] ?>"><?php echo $nhomsp['tennhom'] ?></option>
                <?php
                }
                ?>
            </select>
            <div>
                <input type="submit" name="update" class="update-button" value="Cập nhật">
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['idsp'];
        $idnhom = $_POST['chonnhom'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        $dienap = $_POST['dienap'];
        $kichthuoc = $_POST['kichthuoc'];
        $chatlieu = $_POST['chatlieu'];
        $anhsang = $_POST['anhsang'];
        $chongnuoc = $_POST['chongnuoc'];
        $baohanh = $_POST['baohanh'];
        $bong = $_POST['bong'];

        if ($_FILES['hinhanh']['name'] !== "") {
            $file = $_FILES['hinhanh']["tmp_name"];
            $path = "../images/" . $_FILES['hinhanh']['name'];
            $imageFileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                ?>
                <script>
                    alert("ảnh không đúng !");
                </script>
                <?php
                die;
            }else{
            move_uploaded_file($file, $path);
            }
        } else {
            $path = "";
        }
        if ($path == "") {
            $u = "UPDATE `sanpham` SET tensp='$tensp',gia='$gia',idnhom='$idnhom',dienap='$dienap',kichthuoc='$kichthuoc',
            chatlieu='$chatlieu',anhsang='$anhsang',chongnuoc='$chongnuoc',baohanh='$baohanh',bong='$bong' WHERE idsp='$id' ";
        } else {
            $u = "UPDATE `sanpham` SET tensp='$tensp', hinhanh='$path',gia='$gia',idnhom='$idnhom',dienap='$dienap',kichthuoc='$kichthuoc',
        chatlieu='$chatlieu',anhsang='$anhsang',chongnuoc='$chongnuoc',baohanh='$baohanh',bong='$bong' WHERE idsp='$id' ";
        }
        $re = mysqli_query($conn, $u);
        header("Refresh:0;url=index.php?url=list-product");
    }
    ob_get_flush();
    ?>
</div>