<h2>Thêm danh mục sản phẩm</h2>
<form action="" class="add" method="POST" enctype="multipart/form-data">
    <div class="add-form">
        <div>
            <label for="">Tên danh mục</label>
            <input style="color:black ;" type="text" name="tendanhmuc">
        </div>
        <div>
            <input type="submit" name="them" value="Thêm">
        </div>
    </div>
</form>

<?php
if (isset($_POST['them'])) {
    $danhmuc = $_POST['tendanhmuc'];

    if ($danhmuc == '') {
        echo "Bạn cần điền đầy đủ thông tin !";
    } else {
        $r = "insert into danhmuc(tendanhmuc) 
            values('$danhmuc')";
        $sql = mysqli_query($conn, $r);
        header("Refresh:0;url=index.php?url=list-danhmuc");
    }
}
?>