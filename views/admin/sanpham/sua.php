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
    <title>Sửa sản phẩm</title>
</head>
<body name="sanpham">
<div class="wrapper">
    <?php include_once "./views/admin/header.php"?>
    <div class="content">
        <?php include_once "./views/admin/sidebar.php"?>
        <div class="content-page">
            <div class="title">
                <h4>Sửa sản phẩm</h4>
            </div>
            <div class="ct">
                <div class="thongtinchung box-form">
                    <span class="f-title">Thông tin chung</span>
                    <div>
                        <form action="?role=admin&page=sanpham&action=sua&id_sua=<?php echo $sanpham['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="f-item f-ten">
                                <label for="">Tên sản phẩm </label>
                                <input type="text" name="ten" value="<?php echo $sanpham["ten"] ?>" required>
                            </div>
                            <div class="f-item f-loai">
                                <label for="">Loại </label>
                                <select name="loai">
                                    <?php while ($row = $loai->fetch_assoc()) { ?>
                                        <option value="<?php echo $row["id"] ?>"
                                            <?php if($sanpham["loai"] == $row["id"]) echo "selected" ?>
                                        ><?php echo $row["ten"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="f-item f-sl">
                                <label for="">số lượng</label>
                                <input type="number" name="sl" value="<?php echo $sanpham["sl"] ?>" required>
                            </div>
                            <div class="f-item f-gia">
                                <label for="">Giá </label>
                                <input type="text" name="gia" value="<?php echo $sanpham["gia"] ?>" required>
                            </div>
                            <div class="f-item f-dacdiem">
                                <label for="">Đặc điểm nổi bật </label>
                                <input type="text" name="dacdiemnoibat" value="<?php echo $sanpham["dacdiemnoibat"] ?>" required>
                            </div>
                            <div class="f-item f-anh">
                                <label for="">Ảnh minh họa </label>
                                <input type="file" name="anh" value="<?php echo $sanpham["anhminhhoa"] ?>" >
                                <input type="hidden" name="anh_cu" value="<?php echo $sanpham["anhminhhoa"] ?>">
                            </div>
                            <div class="f-item f-mota">
                                <label for="">Mô tả </label>
                                <textarea name="mota" rows="5" required><?php echo $sanpham["mota"] ?></textarea>
                            </div>

                            <div class="btn-them" style="float: right; margin-right: 80px;">
                                <button><i class="fa fa-pencil"></i>Sửa</button>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>