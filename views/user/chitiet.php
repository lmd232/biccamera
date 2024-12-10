<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sanpham["ten"]; ?></title>
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
        <div class="chitiet-info">
            <div class="chitiet-tieude">
                <?php echo $sanpham["ten"]; ?>
            </div>
            <div class="chitiet-mota">
                <div class="chitiet-img">
                    <div class="ct-image">
                        <img src="<?php echo $sanpham["anhminhhoa"]; ?>" alt="">
                    </div>
                    <div class="chitiet-gia">
                        <div>
                            <div class="ct-gia">
                                <p>Giá</p>
                                <p><?php echo number_format($sanpham['gia'], 0, ',', '.') . ' đ'; ?></p>
                            </div>
                        </div>
                        <div class="ct-giaohang">
                            <i class="fa fa-clock-o"></i>
                            <span>GIAO HÀNG TRONG 1 GIÒ 63 TỈNH THÀNH</span>
                        </div>
                        <div class="ct-kmdacbiet">
                            <p>Khuyến mãi đặc biệt</p>
                            <div>
                                <ul>
                                    <li>Trả góp 0%, trả trước chỉ 469,000đ </li>
                                    <li>Tặng suất mua Đồng hồ thời trang giảm đến 40% </li>
                                    <li>Mua gói bảo hành chính hãng mở rộng 24 tháng giá 269,000đ.  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ct-muangay">
                            <a href="?role=user&action=themgiohang&loai=muangay&id=<?php echo $sanpham["id"];  ?>"><button>MUA NGAY</button></a>
                            <a href="?role=user&action=themgiohang&loai=themvaogio&id=<?php echo $sanpham["id"];  ?>"><button class="btn-themvaogio">THÊM VÀO GIỎ</button></a>
                        </div>
                    </div>
                </div>
                <div class="chitiet-hop">
                    <p>Trong hộp có</p>
                    <div>
                        <i class="fa fa-archive"></i>
                        <span>Máy, Sạc, Cáp, Sách hướng dẫn, cây lấy sim</span>
                    </div>
                    <p>BicCamera cam kết</p>
                    <ul class="menu-camket">
                        <li><i class="fa fa-star"></i> Hàng chính hãng</li>
                        <li><i class="fa fa-shield"></i> Bảo hành 12 Tháng chính hãng</li>
                        <li><i class="fa fa-truck"></i> Giao hàng miễn phí toàn quốc trong 60 phút</li>
                        <li><i class="fa fa-map-marker"></i> Bảo hành nhanh tại BicCamera trên toàn quốc</li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="chitiet-thongso">
            <div class="dacdiem">
                <div class="dacdiem-tieude">Mô tả</div>
                <div class="dacdiem-nd">
                    <?php echo $sanpham["mota"] ?>
                </div>
            </div>
            <div class="thongso">
                <div class="thongso-tieude">Thông số</div>
                <div class="thongso-nd">

                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="chitiet-binhluan">
            <div class="binhluan-tieude">Bình luận</div>
            <div class="binhluan-nd">
                <form action="?role=user&action=binhluan&id=<?php echo $sanpham["id"]; ?>" method="post">
                    <input type="text" name="ten" placeholder="Họ tên" required>
                    <textarea name="noidung" rows="3" required placeholder="Nội dung"></textarea>
                    <div><button>Gửi bình luận</button></div>
                </form>
                <div class="binhluan-danhsach">
                    <?php
                        if($binhluan->num_rows > 0) while($dong = $binhluan->fetch_assoc()) {
                    ?>
                            <div class="binhluan-item">
                                <div class="binhluan-avatar">
                                    <?php
                                        echo substr($dong["hoten"],0,1);
                                    ?>
                                </div>
                                <div class="binhluan-content">
                                    <p class="bl-ten"><b><?php echo $dong["hoten"]; ?></b><span class="bl-ngay"><?php echo $dong["ngay"]; ?></span></p>
                                    <p class="bl-content"><?php echo $dong["noidung"]; ?></p>
                                </div>
                            </div>
                    <?php } ?>

                </div>
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