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
<body name="tonkho">
<div class="wrapper">
    <?php include_once "./views/admin/header.php"?>
    <div class="content">
        <?php include_once "./views/admin/sidebar.php"?>
        <div class="content-page">
            <div class="title">
                <h4>Thống kê tồn kho</h4>
            </div>
            <div class="quanly">
                <table class="table-list">
                    <thead>
                    <tr>
                        <th class="txt-center"></th>
                        <th>Tên</th>
                        <th class="txt-center">Loại</th>
                        <th class="txt-center">Số lượng tồn</th>
                        <th class="txt-center">Giá trị</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $row) {
                        $giaTri = $row["gia"] * $row["sl"];
                        ?>
                        <tr>

                            <td class="txt-center"><img src="<?php echo $row["anhminhhoa"] ?>" alt=""></td>
                            <td><?php echo $row["ten"] ?></td>
                            <td class="txt-center"><?php echo $row["tenloai"] ?></td>
                            <td class="txt-center"><?php echo $row["sl"] ?></td>
                            <td class="txt-center"><?php echo number_format($giaTri, 0, ',', '.') . ' đ'; ?></p></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    $(".table-list").dataTable({
        "bLengthChange": false,
        "pageLength": 5,
        "language": {
            "zeroRecords": "Không có bản ghi nào",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
            "infoEmpty": "Không có bản ghi nào",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Tìm kiếm",
            "paginate": {
                "first":      "Đầu",
                "last":       "Cuối",
                "next":       "Trang tiếp",
                "previous":   "Trang trước"
            },
        }
    });
</script>
</body>
</html>