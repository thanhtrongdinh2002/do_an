<?php
ob_start();
$id = $_GET['iddanhmuc'];
$r = "SELECT * FROM `danhmuc` WHERE iddanhmuc='$id'";
$sql = mysqli_query($conn, $r);
$row = mysqli_fetch_array($sql);
?>

<h2>Sửa nhóm sản phẩm</h2>
<div class="update-product">
    <form action="" class="update" method="POST" enctype="multipart/form-data">
        <div class="update-form">
            <input type="hidden" name="id" value="<?php echo $row['iddanhmuc'] ?>">
            <div>
                <label for="">Tên nhóm danh mục</label>
                <input type="text" name="tendanhmuc" value="<?php echo $row['tendanhmuc'] ?>">
            </div>
            
            <div>
                <input type="submit" name="update" class="update-button" value="Cập nhật">
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $danhmuc = $_POST['tendanhmuc'];
        $id = $_GET['iddanhmuc'];

        $u = "UPDATE `danhmuc` SET tendanhmuc = '$danhmuc' WHERE iddanhmuc ='$id' ";
        $re = mysqli_query($conn, $u);
        header("Refresh:0;url=index.php?url=list-danhmuc");
    }
    ob_get_flush();
    ?>
</div>