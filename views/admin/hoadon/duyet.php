<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./views/assets/css/admin.css">
    <link rel="stylesheet" href="./views/assets/font-awesome-4.7.0/css/font-awesome.css">
    <script src="./views/assets/js/jquery-3.5.1.min.js"></script>
    <script src="./views/assets/js/admin.js"></script>
    <title>Duyệt hóa đơn</title>
</head>
<body name="hoadon">
<div class="wrapper">
    <?php include_once "./views/admin/header.php"?>
    <div class="content">
        <?php include_once "./views/admin/sidebar.php"?>
        <div class="content-page">
            <div class="title">
                <h4>Duyệt hóa đơn</h4>
            </div>
            <div class="ct">
                <div>
                    <form action="" method="post">
                        <div class="f-item" style="width: 90% !important;">
                            <label for="">Trạng thái </label>
                            <select name="trangthai">
                                <option value="0" <?php if($hoadon["trangthai"] == 0) echo 'selected'; ?>>Chờ duyệt</option>
                                <option value="1" <?php if($hoadon["trangthai"] == 1) echo 'selected'; ?>>Đã duyệt</option>
                                <option value="2" <?php if($hoadon["trangthai"] == 2) echo 'selected'; ?>>Đang giao</option>
                                <option value="3" <?php if($hoadon["trangthai"] == 3) echo 'selected'; ?>>Hoàn thành</option>
                            </select>
                        </div>
                        <div class="btn-them" style="float: right; margin-right: 80px;">
                            <button><i class="fa fa-check"></i>Cập nhật</button>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>