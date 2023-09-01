<?php
ob_start();
?>
<div class="list-product">
<h1>Danh sách nhóm</h1>
    <button style="margin-left:15px;"><a href="index.php?url=add-nhomsp">Thêm nhóm</a></button>

    <table style="width: 98%; margin-top:1%;">
        <tr>
            <th>Tên nhóm</th>
            <th>edit</th>
            <th>detele</th>
        </tr>
        <tr>
            <?php
            $r = "SELECT * FROM `nhomsanpham` order by idnhom DESC";
            $sql = mysqli_query($conn, $r);
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <td><?php echo $row['tennhom'] ?></td>
            
                <td><a style="color:black;" href="index.php?url=update-nhomsp&idnhom=<?php echo $row['idnhom'] ?>"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $row['idnhom'] ?>" name="idnhom">
                        <input style="border:none; outline:none; " type="submit" value="" name="delete"><i style="cursor: pointer;" class="fa-sharp fa-solid fa-trash"></i>
                    </form>
                </td>
                <?php
                if (isset($_POST['delete'])) {
                    $idnhom = $_POST['idnhom'];
                    $result = "DELETE FROM `nhomsanpham` WHERE idnhom='$idnhom'";
                    $x = mysqli_query($conn, $result);
                    header("refresh:0;url=index.php?url=list-nhomsp");
                   
                }

                ?>
        </tr>
    <?php
            }
            ob_end_flush();

    ?>


    </table>
</div>