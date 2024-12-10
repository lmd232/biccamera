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

    <?php include_once "./views/user/header.php" ?>
    <?php include_once "./views/user/menu.php" ?>
    <div class="content box-giohang">
        <?php if (!isset($_SESSION["giohang"])) { ?>
            <div class="giohangrong">
                <i class="fa fa-shopping-cart"></i>
                <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
            </div>
        <?php } else if (count($_SESSION["giohang"]) == 0) { ?>
            <div class="giohangrong">
                <i class="fa fa-shopping-cart"></i>
                <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
            </div>
        <?php } else { ?>
            <div class="giohang-danhsach">
                <p class="giohang-tieude">GIỎ HÀNG CỦA BẠN
                    <span>(<?php echo count($_SESSION["giohang"]) ?> sản phẩm)</span></p>
                <div class="giohang-noidung">
                    <div class="giohang-sanpham">
                        <?php
                        $tongTien = 0;
                        foreach ($_SESSION["giohang"] as $item) {
                            $tongTien += $item["gia"] * $item["soluong"];
                            ?>
                            <div class="giohang-item">
                                <div class="giohang-img">
                                    <img src="<?php echo $item["anh"]; ?>" alt="">
                                </div>
                                <div class="giohang-ten">
                                    <p><?php echo $item["ten"]; ?></p>
                                    <p><?php echo number_format($item['gia'], 0, ',', '.') . ' đ'; ?></p>
                                </div>
                                <div class="giohang-xoa">
                                    <a href="?role=user&action=xoagiohang&id=<?php echo $item["id"]; ?>"><i class="fa fa-times"></i></a>
                                </div>
                            
                                <div class="giohang-soluong">
                                    <a href="?role=user&action=giam&id=<?php echo $item["id"]; ?>">-</a>
                                    <input type="text" readonly value="<?php echo $item["soluong"]; ?>">
                                    <a href="?role=user&action=tang&id=<?php echo $item["id"]; ?>">+</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        <?php } ?>
                    </div>
                    <div class="giohang-tongtien">
                        <span><b>Tổng tiền: </b></span>
                        <span><?php echo number_format($tongTien, 0, ',', '.') . ' đ'; ?></span>
                    </div>
                    <div class="giohang-muahang">
                        <p class="muahang-tieude">Thông tin mua hàng</p>
                        <form action="?role=user&action=muahang" method="post">
                            <div class="muahang-item">
                                <label for="">Họ và tên: </label>
                                <input type="text" name="hoten" required placeholder="Nhập họ tên">
                                <input type="hidden" name="tongtien" value="<?php echo $tongTien; ?>">
                            </div>
                            <div class="muahang-item">
                                <label for="">Địa chỉ: </label>
                                <input type="text" name="diachi" required placeholder="Nhập địa chỉ">
                            </div>
                            <div class="muahang-item">
                                <label for="">Số điện thoại: </label>
                                <input type="text" name="sdt" required placeholder="Nhập số điện thoại">
                            </div>
                            <div class="muahang-item">
                                <label for="">Ghi chú: </label>
                                <textarea name="ghichu" rows="3" placeholder="Nhập ghi chú"></textarea>
                            </div>
                            <div class="muahang-item">
                                <label for="">Phương thức thanh toán: </label>
                                <select name="phuongthuc" id="phuongthuc" required>
                                    <option value="cod" selected>Thanh toán khi nhận hàng (COD)</option>
                                    <option value="qr">Thanh toán qua QR Code</option>
                                </select>
                            </div>
                            <div class="muahang-item muahang-btn">
                                <button>ĐẶT HÀNG</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="footer">
        <!-- Footer content -->
    </div>

</div>

<!-- Popup QR Code -->
<div id="qr-popup" class="qr-popup">
    <div class="qr-popup-content">
        <span class="close-popup" onclick="closePopup()">X</span>
        <img src="./views/assets/image/qr_code.jpg" alt="QR Code">
    </div>
</div>

<script>
    // Chỉ hiển thị popup khi thay đổi phương thức thanh toán
    document.getElementById("phuongthuc").addEventListener("change", function () {
        if (this.value === "qr") {
            document.getElementById("qr-popup").style.display = "flex";  // Hiển thị popup QR khi chọn phương thức thanh toán là QR
        } else {
            closePopup();  // Đóng popup nếu phương thức thanh toán không phải QR
        }
    });

    // Hàm đóng popup
    function closePopup() {
        document.getElementById("qr-popup").style.display = "none";  // Đóng popup QR
    }

    // Ngăn popup hiển thị khi thay đổi số lượng sản phẩm
    document.querySelectorAll(".giohang-soluong a").forEach(function (button) {
        button.addEventListener("click", function () {
            // Không làm gì khi thay đổi số lượng (không ảnh hưởng đến popup)
        });
    });
</script>

<style>
    /* Popup Styles */
    .qr-popup {
        display: none;  /* Ẩn popup mặc định */
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 50%;  /* Đặt vị trí popup từ giữa màn hình */
        transform: translateY(-50%);  /* Dịch chuyển lên trên để căn giữa theo chiều dọc */
        width: 100%;
        height: 100%;  /* Nền đen phủ toàn bộ màn hình */
        background-color: rgba(0, 0, 0, 0.8);  /* Nền mờ đen phủ toàn bộ */
        justify-content: center;
        align-items: center;
    }

    .qr-popup-content {
        position: relative;  /* Đảm bảo vị trí của các phần tử con được căn chỉnh so với phần tử này */
        background: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        width: 80%;
        max-width: 400px;
        height: 50%;  /* Popup chiếm một nửa chiều cao màn hình */
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;  /* Ẩn thanh cuộn */
    }

    .qr-popup-content img {
        width: 70%;  /* Chiếm 2/3 chiều rộng của popup */
        height: auto;  /* Giữ tỷ lệ chiều cao của hình ảnh */
        object-fit: contain;  /* Giữ tỷ lệ hình ảnh */
    }

    .close-popup {
        position: absolute;  /* Đặt vị trí tuyệt đối của nút so với phần tử cha */
        top: 10px;  /* Cách 10px từ trên */
        left: 10px;  /* Cách 10px từ trái */
        cursor: pointer;
        font-size: 20px;  /* Kích thước chữ */
        color: #333;  /* Màu sắc chữ */
        font-weight: bold;  /* Làm đậm chữ */
    }
</style>
<?php ?>
<?php if(isset($_SESSION["thongbao"])) { ?>
<script>
    alert("<?php echo $_SESSION["thongbao"]; ?>")
</script>
<?php unset($_SESSION["thongbao"]); } ?>

<div class="phone-hot" style="padding: 0px 50px 50px 50px;">
            <h3 style="text-align:center; padding: 10px 35px 45px;">CÁC HÃNG NỔI BẬT</h3>
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

</body>
</html>


