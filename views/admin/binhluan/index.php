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
    <title>Quản lý bình luận</title>
</head>
<body name="binhluan">
<div class="wrapper">
    <?php include_once "./views/admin/header.php"?>
    <div class="content">
        <?php include_once "./views/admin/sidebar.php"?>
        <div class="content-page">
            <div class="title">
                <h4>Quản lý bình luận</h4>
            </div>
            <div class="quanly">
                <table class="table-list">
                    <thead>
                    <tr>
                        <th width="120">Tên</th>
                        <th>Nội dung</th>
                        <th>Bài viết</th>
                        <th class="txt-center" width="120">Ngày</th>
                        <th class="txt-center" width="100">Trạng thái</th>
                        <th class="txt-center" width="70">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($binhluan->num_rows > 0) while($row = $binhluan->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["hoten"] ?></td>
                            <td><?php echo $row["noidung"] ?></td>
                            <td><?php echo $row["ten"] ?></td>
                            <td class="txt-center"><?php echo $row["ngay"] ?></td>
                            <td class="txt-center"><a href="?role=admin&page=binhluan&action=duyet&id=<?php echo $row["id"] ?>" class="edit"><?php if($row["trangthai"] == 0) echo "Chờ duyệt"; else echo "Đã duyệt" ?></a>
                            </td>
                            <td class="txt-center btn-thaotac">
                                <a onclick="return confirm('Chắc chắn xóa?')" href="?role=admin&page=binhluan&action=xoa&id_xoa=<?php echo $row["id"] ?>" class="delete"><i class="fa fa-trash"></i></a></td>
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
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi",
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
