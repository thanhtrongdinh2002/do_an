<h2>Thêm nhóm sản phẩm</h2>
<form action="" class="add" method="POST" enctype="multipart/form-data">
    <div class="add-form">
        <div>
            <label for="">Tên nhóm</label>
            <input style="color:black;" type="text" name="tennhom">
        </div>
        <div>
        <select name="danhmuc" style="margin-left:10px;">
            <h2>Chọn danh mục</h2>
            <?php
            $r = "SELECT * FROM `danhmuc`";
            $sql = mysqli_query($conn, $r);
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <option value="<?php echo $row['iddanhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div>
            <input type="submit" name="them" value="Thêm">
        </div>
    </div>
</form>

<?php
if (isset($_POST['them'])) {
    $tennhom = $_POST['tennhom'];
    $danhmuc = $_POST['danhmuc'];

    if ($tennhom == '') {
        echo "Bạn cần điền đầy đủ thông tin !";
    } else {
        $r = "insert into nhomsanpham(tennhom,iddanhmuc) 
            values('$tennhom','$danhmuc')";
        $sql = mysqli_query($conn, $r);
        header("Refresh:0;url=index.php?url=list-nhomsp");
    }
}
?>