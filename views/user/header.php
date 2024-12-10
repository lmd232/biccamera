<div class="header">
    <div class="logo">
        <a href="index.php"><img src="./views/assets/image/logo.png"></a>
    </div>
    <div class="search">
        <form action="?role=user&action=timkiem" method="post">
            <input type="text" placeholder="Nhập tên thiết bị cần tìm" name="search">
            <button>    <i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="cart">
        <a href="?role=user&action=giohang" style="color: #fff;">
            <i class="fa fa-shopping-cart" style="font-size: 30px;"></i>
            <div class="cart-sl" style="display: <?php if(!isset($_SESSION["giohang"])) echo 'none'; else if(count($_SESSION["giohang"]) == 0) echo 'none'; ?>;">
                <span><?php
                    if(isset($_SESSION["giohang"])) echo count($_SESSION["giohang"]);
                    ?></span>
            </div>
        </a>
    </div>
</div>