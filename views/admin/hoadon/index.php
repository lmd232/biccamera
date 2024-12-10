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
    <title>Quản lý hóa đơn</title>
</head>
<body name="hoadon">
    <div class="wrapper">
        <?php include_once "./views/admin/header.php"?>
        <div class="content">
            <?php include_once "./views/admin/sidebar.php"?>
            <div class="content-page">
                <div class="title">
                    <h4>Quản lý hóa đơn</h4>
                </div>
                <div class="quanly">
                    <table class="table-list">
                        <thead>
                            <tr>
                                <th class="txt-center" width="200">Họ tên</th>
                                <th class="txt-center" width="100">Địa chỉ</th>
                                <th class="txt-center" width="100">Số điện thoại</th>
                                <th class="txt-center" width="90">Tổng tiền</th>
                                <th class="txt-center" width="180">Phương thức thanh toán</th> <!-- Cột mới -->
                                <th class="txt-center" width="100">Trạng thái</th>
                                <th class="txt-center" width="120">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($hoadon->num_rows > 0) while($row = $hoadon->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row["ten"] ?></td>
                                        <td><?php echo $row["diachi"] ?></td>
                                        <td><?php echo $row["sdt"] ?></td>
                                        <td><?php echo number_format($row['tongtien'], 0, ',', '.') . ' đ'; ?></td>
                                        <td><?php echo $row["phuongthuc"] == 'cod' ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua QR' ?></td> <!-- Hiển thị phương thức thanh toán -->                                    

                                        <td class="txt-center"><?php switch ($row["trangthai"]) {
                                                case 0 : { echo 'Chờ duyệt'; break; }
                                                case 1 : { echo 'Đã duyệt'; break; }
                                                case 2 : { echo 'Đang giao'; break; }
                                                case 3 : { echo 'Hoàn thành'; break; }
                                            } ?></td>
                                        <td class="txt-center btn-thaotac">
                                            <a href="?role=admin&page=hoadon&action=chitiet&id=<?php echo $row["id"] ?>" class="view"><i class="fa fa-eye"></i></a>
                                            <a href="?role=admin&page=hoadon&action=duyet&id=<?php echo $row["id"] ?>" class="edit"><i class="fa fa-check-circle"></i></a>
                                            <a onclick="return confirm('Chắc chắn xóa?')" href="?role=admin&page=hoadon&action=xoa&id_xoa=<?php echo $row["id"] ?>" class="delete"><i class="fa fa-trash"></i></a></td>
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
