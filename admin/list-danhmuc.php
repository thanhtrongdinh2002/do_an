<?php
ob_start();
?>
<div class="list-product">
<h1>Danh sách danh mục </h1>
    <button style="margin-left: 15px;"><a href="index.php?url=add-danhmuc">Thêm danh mục</a></button>

    <table style="width: 98%; margin-top:1%;">
        <tr>
            <th>Tên danh mục</th>
            <th>edit</th>
            <th>delete</th>
            
        </tr>
        <tr>
            <?php
            $r = "SELECT * FROM `danhmuc` order by iddanhmuc DESC";
            $sql = mysqli_query($conn, $r);
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <td><?php echo $row['tendanhmuc'] ?></td>
            
                <td><a style="color:black;" href="index.php?url=update-danhmuc&iddanhmuc=<?php echo $row['iddanhmuc'] ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $row['iddanhmuc']?>" name="iddanhmuc">
                        <input style="border:none; outline:none;" type="submit" value="" name="delete"><i style="cursor: pointer;" class="fa-sharp fa-solid fa-trash"></i>
                    </form>
                </td>
                <?php
                if (isset($_POST['delete'])) {
                    $danhmuc = $_POST['iddanhmuc'];
                    $result = "DELETE FROM `danhmuc` WHERE iddanhmuc ='$danhmuc'";
                    $x = mysqli_query($conn, $result);
                    header("refresh:0;url=index.php?url=list-danhmuc");
                   
                }

                ?>
        </tr>
    <?php
            }
            ob_end_flush();

    ?>


    </table>
</div>