<?php
session_start();
include_once("models/Model.php");
class UserController
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function home() {
        // Lấy danh sách sản phẩm từ model
        $sanpham = $this->model->laySanPham(); 
    
        // Lấy danh sách sản phẩm bán chạy
        $sp_banchay = $this->model->thongKeMuaNhieu(); 
    
        // Truyền dữ liệu vào view
        include_once "views/user/home.php";
    }

    public function timKiem() {
        if(isset($_POST["search"])) {
            $sanpham = $this->model->TK($_POST["search"]);
        }
        include_once  "views/user/search.php";
    }

    public function chiTiet() {
        $id = $_GET["id"];
        $sanpham = $this->model->laySanPhamId($id)->fetch_assoc();
        $binhluan = $this->model->layBinhLuanCT($id);
        include_once  "views/user/chitiet.php";
    }

    public function themBinhLuan() {
        $id = $_GET["id"];
        if($this->model->BL($id,$_POST["ten"], $_POST["noidung"])) {
            header("Location: ?role=user&action=chitiet&id=$id");
            echo '<script>alert("Đã gửi bình luận, chờ duyệt.")</script>';
        }
        else {
            echo 'Bình luận thất bại';
        }
    }

    public function gioHang() {
        include_once  "views/user/giohang.php";

    }
    public function themGioHang(){
        $id = $_GET["id"];
        $sanpham = $this->model->laySanPhamId($id)->fetch_assoc();
        if(isset($_SESSION["giohang"][$id])) {
            $_SESSION["giohang"][$id]["soluong"]++;
        }
        else {
            $sanpham = [
                'id' => $id,
                'ten' => $sanpham["ten"],
                'gia' => $sanpham["gia"],
                'anh' => $sanpham["anhminhhoa"],
                'soluong' => 1,
            ];
            $_SESSION["giohang"][$id] = $sanpham;
        }
        if($_GET["loai"] == "muangay") {
            header("Location: ?role=user&action=giohang");
        }
        else {
            header("Location: ?role=user&action=chitiet&id=$id");
        }

    }
    public function xoaGioHang() {
        $id = $_GET["id"];
        unset($_SESSION["giohang"][$id]);
        header("Location: ?role=user&action=giohang");
    }

    public function muaHang() {
        if (isset($_POST["hoten"])) {
            $phuongthuc = $_POST["phuongthuc"] ?? 'cod'; // Nếu không chọn gì, mặc định là COD
            if ($this->model->taoHoaDon($_POST["hoten"], $_POST["diachi"], $_POST["sdt"], $_POST["ghichu"], $_POST["tongtien"], $phuongthuc)) {
                $_SESSION["thongbao"] = "Đặt hàng thành công, chờ duyệt.";
                unset($_SESSION["giohang"]);
                header("Location: ?role=user&action=giohang");
            } else {
                echo "Mua thất bại";
            }
        }
    }

    public function tangGiamsl()
    {
        $id=$_GET["id"];
        if($_GET["action"]=="tang")
        {
             $_SESSION["giohang"][$id]["soluong"]++;
        }
        else
        {
            if($_SESSION["giohang"][$id]["soluong"] > 0)
             $_SESSION["giohang"][$id]["soluong"]--;
        }
        header("Location: ?role=user&action=giohang");
    }

    public function sanpham() {
        $loai = isset($_GET['loai']) ? (int)$_GET['loai'] : null;
        $sanpham = $loai ? $this->model->laySanPhamTheoLoai($loai) : $this->model->layTatCaSanPham();
    
        // Nếu là AJAX, trả về danh sách sản phẩm với đầy đủ thông tin
        if (isset($_GET['loai'])) {
            foreach ($sanpham as $item) {
                echo '<div class="phone-item">';
                echo '<a href="?role=user&action=chitiet&id='.$item['id'].'">';
                echo '<p class="phone-name">'.$item["ten"].'</p>';
                echo '<p class="phone-price">'.number_format($item['gia'], 0, ',', '.').' đ</p>';
                echo '<div class="phone-desc">';
                echo '<div class="phone-km">';
                $dacdiem = explode(";", $item["dacdiemnoibat"]);
                foreach ($dacdiem as $dd) {
                    echo '<div class="km-item">';
                    echo '<i class="fa fa-check-circle"></i>';
                    echo '<span>'.$dd.'</span>';
                    echo '</div>';
                }
                echo '<div class="list-km">';
                echo '<p class="list-km-title">Khuyến mại</p>';
                echo '<div class="list-km-item">';
                echo '<img src="./views/assets/image/0d.PNG" alt="">';
                echo '<p>Trả góp trả trước chỉ 469.000đ</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="phone-img">';
                echo '<img src="'.$item["anhminhhoa"].'" alt="">';
                echo '</div>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
            exit; // Kết thúc AJAX
        }
    
        $loaiList = $this->model->layLoai();
        include_once "views/user/sanpham.php";
    }       
    
    public function laySanPhamTheoLoai() {
        $loai = $_GET['loai'] ?? null; // Lấy loại từ URL
        $sanpham = $this->model->laySanPhamTheoLoai($loai);
    
        // Hiển thị danh sách sản phẩm dưới dạng HTML
        foreach ($sanpham as $item) {
            echo '<div class="phone-item">';
            echo '<a href="?role=user&action=chitiet&id='.$item['id'].'">';
            echo '<img src="'.$item['anhminhhoa'].'" alt="'.$item['ten'].'">';
            echo '<p class="phone-name">'.$item['ten'].'</p>';
            echo '<p class="phone-price">'.number_format($item['gia'], 0, ',', '.').' đ</p>';
            echo '</a>';
            echo '</div>';
        }
    }
    
}