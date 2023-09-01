<div class="wrap">
    <div class="logo">STORE</div>
    
    <div class="header">
        
        <div class="header-top">
        </div>
        <div class="header-bottom">
            <form action="index.php?url=search" method="POST">
                <input type="text" name="for-search" placeholder="Tìm kiếm...">
                <button type="submit" name="tim-kiem"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></button>
            </form>
        </div>
        <?php
        if(isset($_GET['tim-kiem']) && empty($_GET['for-search'])){
            ?>
            <script>
                alert('khong');
            </script>
            <?php
        }
        ?>
    </div>
    