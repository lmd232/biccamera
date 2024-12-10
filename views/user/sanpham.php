<?php
include_once "../models/Model.php"; // Kết nối đến model

$model = new Model(); // Khởi tạo đối tượng Model

// Lấy danh sách loại sản phẩm
$loaiList = $model->layLoai(); // Hàm này trả về danh sách các loại sản phẩm

// Xử lý lọc sản phẩm theo loại
$loai = isset($_GET['loai']) ? $_GET['loai'] : ''; // Lấy giá trị 'loai' từ URL (nếu có)
$sanpham = $model->laySanPhamTheoLoai($loai); // Lấy danh sách sản phẩm theo loại
?>

<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" href="./views/assets/css/home.css">
    <link rel="stylesheet" href="./views/assets/font-awesome-4.7.0/css/font-awesome.css">
    <script src="./views/assets/js/jquery-3.5.1.min.js"></script>
    <style>
        .filter {
            padding: 20px;
            text-align: center;
        }

        .filter ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .filter li {
            cursor: pointer;
            background: #f0f0f0;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .filter li:hover {
            background: #ddd;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php include_once "./views/user/header.php"; ?>
        <?php include_once "./views/user/menu.php"; ?>

        <!-- Bộ lọc loại sản phẩm -->
        <div class="filter">
            <h3 style="padding: 35px;">TẤT CẢ SẢN PHẨM</h3>
            <ul>
                <li class="filter-link" data-loai="">Tất cả sản phẩm</li>
                <?php while ($row = $loaiList->fetch_assoc()) : ?>
                    <li class="filter-link" data-loai="<?php echo $row['id']; ?>"><?php echo $row['ten']; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>

        <div class="phone-hot">
            <div class="phone-content" id="product-list" style="padding: 20px 25px 20px 50px;">
                <?php $i = 0;
                if ($sanpham->num_rows > 0) foreach ($sanpham as $item) {
                    if($i == 24) break;
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
                                                <span><?php echo $dd ?></span>
                                            </div>
                                    <?php } ?>
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
                <?php $i++; } ?>
            </div>
        </div>

        <script>
            // Khi chọn loại sản phẩm
            document.querySelectorAll('.filter-link').forEach(function (link) {
                link.addEventListener('click', function () {
                    let loai = this.getAttribute('data-loai');
                    loadProducts(loai);
                });
            });

            // Hàm tải sản phẩm qua AJAX
            function loadProducts(loai) {
                let xhr = new XMLHttpRequest();
                xhr.open('GET', `?role=user&action=sanpham&loai=${loai}`, true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Đổ dữ liệu trả về vào container sản phẩm
                        document.getElementById('product-list').innerHTML = xhr.responseText;
                    } else {
                        console.error("Lỗi khi tải sản phẩm");
                    }
                };
                xhr.send();
            }   
        </script> 

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
</body>
</html>
