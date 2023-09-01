<div>
    <ul class="menu">
        <a href="index.php"><i class="fa-sharp fa-solid fa-house"></i></a>
        <?php
        $r = "SELECT * FROM `danhmuc`";
        $sql = mysqli_query($conn, $r);
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <li><a href="index.php?url=danhmucsp&iddanhmuc=<?php echo $row['iddanhmuc']?>"><?php echo $row['tendanhmuc'] ?></a>
                <ul class="sub-menu">
                    <?php
                    $id = $row['iddanhmuc'];
                    $re = "SELECT * FROM `nhomsanpham` WHERE iddanhmuc = $id";
                    $result = mysqli_query($conn, $re);
                    if (mysqli_num_rows($result) > 0) {
                        while ($con = mysqli_fetch_array($result)) {
                    ?>
                            <li><a href="index.php?url=nhomsanpham&idnhom=<?php echo $con['idnhom'] ?>"><?php echo $con['tennhom'] ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                    <a href=""><i class="fa-sharp fa-solid fa-chevron-down"></i></a>
                <?php
                }
                ?>
            </li>

        <?php
        }
        ?>
        <a href="index.php?url=giohang"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
        <?php
        $iduser = $_COOKIE['iduser'];
        $e = "SELECT * FROM `giohang` WHERE iduser = '$iduser' ";
        $ex = mysqli_query($conn, $e);
        $list = array();
        while($g = mysqli_fetch_array($ex)){
            $list[] = $g;
        }
        ?>
        <div class="cart-number">
            <?php echo count($list)?>
        </div>
        
    </ul>
</div>