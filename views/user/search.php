<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Điện thoại, Laptop, Tablet, Phụ kiện chính hãng giá tốt nhất</title>
    <link rel="stylesheet" href="./views/assets/css/home.css">
    <link rel="stylesheet" href="./views/assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./views/assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <script src="./views/assets/js/jquery-3.5.1.min.js"></script>
    <script src="./views/assets/OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script src="./views/assets/js/home.js"></script>
</head>
<body>
<div class="wrapper">

    <?php include_once "./views/user/header.php"?>
    <?php include_once "./views/user/menu.php"?>
    <div class="content">
        <div class="phone-hot">
            <div class="title">
                <h3>Kết quả tìm kiếm với từ khóa <?php echo '<b>"'.$_POST["search"].'"</b>' ?></h3>
            </div>
            <div class="phone-content">
                <?php
                if ($sanpham->num_rows > 0) { foreach ($sanpham as $item) {
    
                    ?>
                    <div class="phone-item">
                        <a href="?role=user&action=chitiet&id=<?php echo $item["id"] ?>">
                            <p class="phone-name"><?php echo $item["ten"] ?></p>
                            <p class="phone-price"><?php echo number_format($item['gia'], 0, ',', '.') . ' đ'; ?></p>
                            <div class="phone-desc">
                                <div class="phone-km">
                                    <?php
                                    $dacdiem = explode(";", $item["dacdiemnoibat"]);
                                    foreach ($dacdiem as $dd) {
                                        ?>
                                        <div class="km-item">
                                            <i class="fa fa-check-circle"></i>
                                            <span><?php echo $dd?></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="list-km">
                                        <p class="list-km-title">Khuyến mại</p>
                                        <div>
                                            <div class="list-km-item">
                                                <img src="./views/assets/image/0d.PNG" alt="">
                                                <p>Trả góp trả trước chỉ 469.000đ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="phone-img">
                                    <img src="<?php echo $item["anhminhhoa"] ?>" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } } else { ?>
                    <p>Không tìm thấy kết quả nào</p>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="phone-hot" style="padding: 20px 50px 50px 50px;">
            <h3 style="text-align:center; padding: 35px;">CÁC HÃNG NỔI BẬT</h3>
            <div class="brands-container">
                <div class="brands">
                    <div class="brand-item">
                        <img src="./views/assets/image/apple.png" alt="Apple">
                    </div>
                    <div class="brand-item">
                        <img src="./views/assets/image/samsung_logo.jpg" alt="Samsung">
                    </div>
                    <div class="brand-item">
                        <img src="./views/assets/image/dell.jpg" alt="Dell">
                    </div>
                    <div class="brand-item">
                        <img src="./views/assets/image/citizen.png" alt="Citizen">
                    </div>
                    <div class="brand-item">
                        <img src="./views/assets/image/vivo.png" alt="Vivo">
                    </div>
                    <div class="brand-item">
                        <img src="./views/assets/image/car.png" alt="Cartier">
                    </div>
                    <div class="brand-item">
                        <img src="./views/assets/image/asus.png" alt="Asus">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3 class="footer-title">BICCAMERA</h3>
                <p class="footer-text">
                    Think big and dream big
                </p>
            </div>

            <!-- Opening Time -->
            <div class="footer-section">
                <h3 class="footer-title">Giờ mở cửa</h3>
                <ul class="footer-list">
                    <li>Thứ 2 - Chủ Nhật: <span>Từ 10:00 Đến 21:00</span></li>
                </ul>
            </div>

            <!-- Information -->
            <div class="footer-section">
                <h3 class="footer-title">Thông tin</h3>
                <ul class="footer-list">
                    <li>
                        <i class="fa fa-map-marker"></i> Tokyo, Nhật Bản
                    </li>
                    <li>
                        <i class="fa fa-phone"></i> (81) 362608111
                    </li>
                </ul>
            </div>
        </div>
    </footer>

</div>
</body>
</html>