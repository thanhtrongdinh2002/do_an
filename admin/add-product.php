<?php
require '../connect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['quyen'])) {
    if ($_SESSION['quyen'] != 1) {
        header("location:../index.php");
    }
} else {
    header("location:admin-login.php");
}
?>
<h2>Thêm sản phẩm</h2>
<form action="" class="add" method="POST" enctype="multipart/form-data">
    <div class="add-form">
        <div class="add-image">
            <div>
                <label style="margin-left:8px ;" for="images">Hình ảnh</label>
                <input type="file" name="images" id="images">
            </div>
        </div>
        <div>
            <label for="">Tên sản phẩm</label>
            <input type="text" name="tensp">
        </div>
        <div>
            <label for="">Giá</label>
            <input type="text" name="gia">
        </div>
        <div>
            <label for="">điện áp</label>
            <input type="text" name="dienap">
        </div>
        <div>
            <label for="">Kích thước</label>
            <input type="text" name="kichthuoc">
        </div>
        <div>
            <label for="">Chất liệu</label>
            <input type="text" name="chatlieu">
        </div>
        <div>
            <label for="">Ánh sáng</label>
            <input type="text" name="anhsang">
        </div>
        <div>
            <label for="">Chống nước</label>
            <input type="text" name="chongnuoc">
        </div>
        <div>
            <label for="">Bảo hành</label>
            <input type="text" name="baohanh">
        </div>
        <div>
            <label for="">Xuất xứ</label>
            <input type="text" name="xuatxu">
        </div>
        <div>
            <label for="">Bóng</label>
            <input type="text" name="bong">
        </div>
        <label style="margin-left:10px ;" for="chonnhom">Chọn nhóm:</label>
        <select name="chonnhom" style="margin-left:10px;">
            <h2>Chọn nhóm</h2>
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
            <input type="submit" name="them" value="Thêm">
        </div>
    </div>
</form>

<?php
if (isset($_POST['them'])) {
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $idnhom = $_POST['chonnhom'];
    $dienap = $_POST['dienap'];
    $kichthuoc = $_POST['kichthuoc'];
    $chatlieu = $_POST['chatlieu'];
    $anhsang = $_POST['anhsang'];
    $chongnuoc = $_POST['chongnuoc'];
    $baohanh = $_POST['baohanh'];
    $bong = $_POST['bong'];

    if ($tensp == '' || $gia == '' || $idnhom == '' || $dienap == '' || $chatlieu == '' || $anhsang == '' || $chongnuoc == '' || $baohanh == '' || $bong == '') {
        echo "Bạn cần điền đầy đủ thông tin !";
    } else {
        $file = $_FILES['images']['tmp_name'];
        $path = "../images/". $_FILES['images']['name'];
        if (move_uploaded_file($file, $path)) {
            $r = "insert into sanpham(tensp,gia,hinhanh,idnhom,dienap,kichthuoc,chatlieu,anhsang,chongnuoc,baohanh,bong) 
            values('$tensp','$gia','$path','$idnhom','$dienap','$kichthuoc','$chatlieu','$anhsang','$chongnuoc','$baohanh','$bong')";
            $sql = mysqli_query($conn, $r);
            echo "Thêm sản phẩm thành công";
        }
    }
}
?>