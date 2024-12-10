<?php
session_start();
include_once("models/Model.php");

class AdminController
{

    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    //đăng nhập
    public function dangNhap() {
        include_once "views/admin/login/index.php";
        if(isset($_POST["username"])) {
            $user = $this->model->kiemTraDangNhap($_POST["username"],$_POST["password"]);
            if($user->num_rows > 0) {
                $user = $user->fetch_assoc();
                $_SESSION["display_name"] = $user["display_name"];
                header('Location: ?role=admin&page=sanpham');
            }
            else echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác.')</script>";
        }
    }

    public function dangXuat() {
        session_destroy();
        header('Location: ?role=admin&page=dangnhap');
        exit();
    }

    // điện thoại
    public function quanLySanPham()
    {
        $sanpham = $this->model->laySanPham();
        $data = [];
        while($row = $sanpham->fetch_assoc()) {
            $loai = $this->model->layLoaiId($row["loai"])->fetch_assoc();
            $row["tenloai"] = $loai["ten"];
            array_push($data,$row);
        }
        include_once "views/admin/sanpham/index.php";
    }
    public function themSanPham() {
        $loai = $this->model->layLoai();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Xử lý dữ liệu gửi từ form
            $ten = $_POST['ten'];
            $loai = $_POST['loai'];
            $gia = $_POST['gia'];
            $dacdiemnoibat = $_POST['dacdiemnoibat'];
            $mota = $_POST['mota'];
            $sl = $_POST['sl'];
    
            // Xử lý ảnh
            $ha_sp = '';
            if (isset($_FILES['anh']) && $_FILES['anh']['error'] === 0) {
                $target_dir = "./views/assets/image/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                $ha_sp = $target_file;
            }
    
            // Thêm sản phẩm vào cơ sở dữ liệu
            if ($this->model->themSanPham($ten, $loai, $gia, $dacdiemnoibat, $mota, $ha_sp, $sl)) {
                header('Location: ?role=admin&page=sanpham');
            } else {
                echo "Thêm sản phẩm thất bại!";
            }
        }
        include_once "views/admin/sanpham/them.php";
    }
    
    public function suaSanPham() {
        $id = $_GET["id_sua"];
        $loai = $this->model->layLoai();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten = $_POST['ten'];
            $loai_id = $_POST['loai'];
            $gia = $_POST['gia'];
            $dacdiemnoibat = $_POST['dacdiemnoibat'];
            $mota = $_POST['mota'];
            $sl = $_POST['sl'];
    
            // Xử lý ảnh
            $ha_sp = $_POST['anh_cu']; // Ảnh cũ
            if (isset($_FILES['anh']) && $_FILES['anh']['error'] === 0) {
                $target_dir = "./views/assets/image/";
                $target_file = $target_dir . basename($_FILES["anh"]["name"]);
                move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
                $ha_sp = $target_file; // Ảnh mới
            }
    
            // Thực hiện cập nhật sản phẩm
            if ($this->model->suaSanPham($id, $ten, $loai_id, $gia, $dacdiemnoibat, $mota, $ha_sp, $sl)) {
                header("Location: ?role=admin&page=sanpham");
            } else {
                echo "Sửa sản phẩm thất bại!";
            }
        }
    
        // Lấy thông tin sản phẩm hiện tại
        $sanpham = $this->model->laySanPhamId($id)->fetch_assoc();
        include_once "views/admin/sanpham/sua.php";
    }    

    public function xoaSanPham()
    {
        $id=$_GET["id_xoa"];
        if($this->model->xoaSanPham($id)) {
            header('Location: ?role=admin&page=sanpham');
        }
        else echo 'Xóa thất bại';
    }

    // loại điện thoại
    public function quanLyLoai()
    {
        $loai = $this->model->layLoai();
        include_once "views/admin/loai/index.php";
    }
    public function themLoai() {
        if(isset($_POST["ten"])) {
            if($this->model->themL($_POST["ten"],$_POST["mota"])) {
                header('Location: ?role=admin&page=loai');
            }
            else echo 'Thêm thất bại';
        }
        include_once "views/admin/loai/them.php";
    }
    public function suaLoai() {
        $id = $_GET["id_sua"];
        if(!isset($_POST["ten"])) $loai = $this->model->layLoaiId($id)->fetch_assoc();
        else {
            if($this->model->suaL($id,$_POST["ten"],$_POST["mota"])) {
                header('Location: ?role=admin&page=loai');
            }
            else echo 'Sửa thất bại';
        }
        include_once "views/admin/loai/sua.php";
    }
    public function xoaLoai()
    {
        $id=$_GET["id_xoa"];
        if($this->model->xoaL($id)) {
            header('Location: ?role=admin&page=loai');
        }
        else echo 'Xóa thất bại';
    }

    // hóa đơn
    public function quanLyHoaDon()
    {
        $hoadon = $this->model->layHoaDon();
        include_once "views/admin/hoadon/index.php";
    }
    public function duyetHoaDon() {
        $id = $_GET["id"];
        $hoadon = $this->model->layHoaDonId($id)->fetch_assoc();
        if(isset($_POST["trangthai"])) {
            if($this->model->duyetHD($id,$_POST["trangthai"])) {
                if($_POST["trangthai"] == 3) {
                    $chitiethoadon = $this->model->layChiTietHoaDon($id);
                    if($chitiethoadon->num_rows > 0) {
                        while ($row = $chitiethoadon->fetch_assoc()) {
                            $this->model->giamSoLuong($row["id_sp"],$row["soluong"]);
                        }
                    }
                }
                header("Location: ?role=admin&page=hoadon");
            }
            else echo "Duyệt thất bại";
        }
        include_once "views/admin/hoadon/duyet.php";
    }
    public function xoaHoaDon()
    {
        $id=$_GET["id_xoa"];
        if($this->model->xoaHD($id)) {
            header('Location: ?role=admin&page=hoadon');
        }
        else echo 'Xóa thất bại';
    }
    public function chiTietHoaDon() {
        $id = $_GET["id"];
        $chitiet = $this->model->chiTietHD($id);
        $data = [];
        while($row = $chitiet->fetch_assoc()) {
            $loai = $this->model->layLoaiId($row["loai"])->fetch_assoc();
            $row["tenloai"] = $loai["ten"];
            array_push($data,$row);
        }
        include_once "views/admin/hoadon/chitiet.php";
    }

    // bình luận
    public function quanLyBinhLuan()
    {
        $binhluan = $this->model->layBinhLuan();
        include_once "views/admin/binhluan/index.php";
    }
    public function duyetBinhLuan() {
        $id = $_GET["id"];
        $trangThai = 1;
        $binhluan = $this->model->layBinhLuanId($id)->fetch_assoc();
        if($binhluan["trangthai"] == 1) $trangThai = 0;
        if($this->model->duyetBL($id,$trangThai)) {
            header("Location: ?role=admin&page=binhluan");
        }
        else echo "Duyệt thất bại";
    }
    public function xoaBinhLuan()
    {
        $id=$_GET["id_xoa"];
        if($this->model->xoaBL($id)) {
            header('Location: ?role=admin&page=binhluan');
        }
        else echo 'Xóa thất bại';
    }
    public function thongke()
    {
        $ketqua=$this->model->thongkedulieu();
        include_once "views/admin/thongke/index.php";
    }

    public function tonKho() {
        $sanpham = $this->model->laySanPham();
        $data = [];
        while($row = $sanpham->fetch_assoc()) {
            $loai = $this->model->layLoaiId($row["loai"])->fetch_assoc();
            $row["tenloai"] = $loai["ten"];
            array_push($data,$row);
        }
        include_once "views/admin/tonkho/index.php";
    }

    public function muaNhieu() {
        $sanpham = $this->model->thongKeMuaNhieu();
        $data = [];
        while($row = $sanpham->fetch_assoc()) {
            $loai = $this->model->layLoaiId($row["loai"])->fetch_assoc();
            $row["tenloai"] = $loai["ten"];
            array_push($data,$row);
        }
        include_once "views/admin/muanhieu/index.php";
    }

}