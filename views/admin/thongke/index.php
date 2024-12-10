<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./views/assets/css/admin.css">
    <link rel="stylesheet" href="./views/assets/css/datatables.min.css">
    <link rel="stylesheet" href="./views/assets/font-awesome-4.7.0/css/font-awesome.css">
    <script src="./views/assets/js/jquery-3.5.1.min.js"></script>
    <script src="./views/assets/js/jquery.dataTables.min.js"></script>
    <script src="./views/assets/js/admin.js"></script>
    <title>Thống kê</title>
</head>
<body name="thongke">
<div class="wrapper">
    <?php include_once "./views/admin/header.php"?>
    <div class="content">
        <?php include_once "./views/admin/sidebar.php"?>
        <div class="content-page">
            <div class="title">
                <h4>Thống kê</h4>
            </div>
            <div class="quanly">
                <div class="banner-thongke">
                    <div class="thongke-tien">
                        <div class="thongke-tieude">
                            Doanh thu
                        </div>
                        <i class="fa fa-money"></i>
                        <p><?php echo number_format($ketqua['doanhthu'], 0, ',', '.') . ' đ'; ?></p>
                    </div>
                    <div class="thongke-sanpham">
                        <div class="thongke-tieude">
                            Sản phẩm
                        </div>
                        <i class="fa fa-mobile"></i>
                        <p><?php  echo $ketqua["tongsanpham"]; ?></p>
                    </div>
                    <div class="thongke-khachhang">
                        <div class="thongke-tieude">
                            Khách hàng
                        </div>
                        <i class="fa fa-user"></i>
                        <p><?php  echo $ketqua["tongkhachhang"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>