<?php
ob_start();
$id = $_GET['idnhom'];
$r = "SELECT * FROM `nhomsanpham` WHERE idnhom='$id'";
$sql = mysqli_query($conn, $r);
$row = mysqli_fetch_array($sql);
?>

<h2>Sửa nhóm sản phẩm</h2>
<div class="update-product">
    <form action="" class="update" method="POST" enctype="multipart/form-data">
        <div class="update-form">
            <input type="hidden" name="id" value="<?php echo $row['idnhom'] ?>">
            <div>
                <label for="">Tên nhóm sản phẩm</label>
                <input type="text" name="tennhom" value="<?php echo $row['tennhom'] ?>">
            </div>
            <div>
                <select name="danhmuc" style="margin-left:10px;">
                    <h2>Chọn danh mục</h2>
                    <?php
                    $t = "SELECT * FROM `danhmuc`";
                    $s = mysqli_query($conn, $t);
                    while ($result = mysqli_fetch_array($s)) {
                    ?>
                        <option value="<?php echo $result['iddanhmuc'] ?>"><?php echo $result['tendanhmuc'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" name="update" class="update-button" value="Cập nhật">
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $tennhom = $_POST['tennhom'];
        $danhmuc = $_POST['danhmuc'];
        $id = $_GET['idnhom'];

        $u = "UPDATE `nhomsanpham` SET tennhom='$tennhom', iddanhmuc = '$danhmuc' WHERE idNhom='$id' ";
        $re = mysqli_query($conn, $u);
        header("Refresh:0;url=index.php?url=list-nhomsp");
    }
    ob_get_flush();
    ?>
</div>