<?php


class Model
{
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli("localhost","root","","bhdt")  or die("Ket noi that bai");
        $this->conn->set_charset("UTF8");
    }
    
    public function kiemTraDangNhap($username,$password) {
        $sql = "select * from user where username = '$username' and password = '$password'";
        $result = $this->conn->query($sql);
        return $result;
    }

    // admin
    public function laySanPham() {
        $sql = "select * from sanpham";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function laySanPhamId($id) {
        $sql = "select * from sanpham where id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function themSanPham($ten, $loai, $gia, $dacdiemnoibat, $mota, $anhminhhoa, $sl) {
        $sql = "INSERT INTO sanpham (ten, loai, gia, dacdiemnoibat, mota, anhminhhoa, sl) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siisssi", $ten, $loai, $gia, $dacdiemnoibat, $mota, $anhminhhoa, $sl);
        return $stmt->execute();
    }
    
    public function suaSanPham($id, $ten, $loai, $gia, $dacdiemnoibat, $mota, $anhminhhoa, $sl) {
        $sql = "UPDATE sanpham 
                SET ten = ?, loai = ?, gia = ?, dacdiemnoibat = ?, mota = ?, anhminhhoa = ?, sl = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("siisssii", $ten, $loai, $gia, $dacdiemnoibat, $mota, $anhminhhoa, $sl, $id);
        return $stmt->execute();
    }    

    public function xoaSanPham($id)
    {
        $sql="delete from sanpham where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }

    //loại sản phẩm
    public function layLoai() {
        $sql = "select * from loai";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function layLoaiId($id) {
        $sql = "select * from loai where id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function themL($ten, $mota)
    {
        $sql= "insert into loai(ten,mota) values('$ten','$mota')";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function suaL($id, $ten,$mota)
    {
        $sql="update loai set ten='$ten', mota = '$mota' where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function xoaL($id)
    {
        $sql="delete from loai where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }

    // hóa đơn
    public function layHoaDon() {
        $sql = "select hoadon.*, khachhang.ten,khachhang.diachi,khachhang.sdt from hoadon inner join khachhang on khachhang.id = hoadon.khachhang_id";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function layHoaDonId($id) {
        $sql = "select hoadon.*, khachhang.ten,khachhang.diachi,khachhang.sdt from hoadon inner join khachhang on khachhang.id = hoadon.khachhang_id where hoadon.id = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function layChiTietHoaDon($id) {
        $sql = "select * from chitiethoadon where id_hd = $id";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function duyetHD($id, $trangthai)
    {
        $sql="update hoadon set trangthai=$trangthai where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function xoaHD($id)
    {
        $sql="delete from hoadon where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function chiTietHD($id) {
        $sql="select * from chitiethoadon inner join sanpham on chitiethoadon.id_sp = sanpham.id join hoadon on chitiethoadon.id_hd = hoadon.id join khachhang on hoadon.khachhang_id = khachhang.id where id_hd = $id";
        $result= $this->conn->query($sql);
        return $result;
    }

    // bình luận
    public function layBinhLuan() {
        $sql="select binhluan.*,sanpham.ten from binhluan inner join sanpham on binhluan.id_sp = sanpham.id";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function layBinhLuanId($id) {
        $sql="select * from binhluan where id = $id";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function duyetBL($id,$trangthai) {
        $sql="update binhluan set trangthai=$trangthai where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }
    public function xoaBL($id)
    {
        $sql="delete from binhluan where id=$id";
        $result= $this->conn->query($sql);
        return $result;
    }

    // user
    public function TK($search) {
        $sql ="select * from sanpham where ten like '%$search%'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function BL($id, $ten, $noidung) {
        $sql= "insert into binhluan(id_sp,noidung,hoten,trangthai) values($id,'$noidung','$ten',0)";
        $result= $this->conn->query($sql);
        return $result;
    }

    public function layBinhLuanCT($id) {
        $sql = "select * from binhluan where id_sp = $id and trangthai = 1";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function taoHoaDon($hoten, $diachi, $sdt, $ghichu, $tongtien, $phuongthuc) {
        // Kiểm tra thông tin khách hàng
        $sql = "SELECT * FROM khachhang WHERE sdt = '$sdt'";
        $result = $this->conn->query($sql);
        $khachhang_id = 0;
    
        if ($result->num_rows > 0) {
            $khachhang_id = $result->fetch_assoc()["id"];
        } else {
            $sql = "INSERT INTO khachhang (ten, diachi, sdt) VALUES ('$hoten', '$diachi', '$sdt')";
            if (!$this->conn->query($sql)) {
                echo "Lỗi thêm khách hàng: " . $this->conn->error;
                return false;
            }
            $khachhang_id = $this->conn->insert_id;
        }
    
        // Thêm hóa đơn
        $sql = "INSERT INTO hoadon (khachhang_id, ghichu, tongtien, trangthai, phuongthuc) VALUES 
                ($khachhang_id, '$ghichu', $tongtien, 0, '$phuongthuc')";
        if (!$this->conn->query($sql)) {
            echo "Lỗi thêm hóa đơn: " . $this->conn->error;
            return false;
        }
        $idHoaDon = $this->conn->insert_id;
    
        // Thêm chi tiết hóa đơn
        foreach ($_SESSION["giohang"] as $item) {
            $idSp = $item["id"];
            $gia = $item["gia"];
            $soluong = $item["soluong"];
            $sql = "INSERT INTO chitiethoadon (id_sp, id_hd, gia, soluong) VALUES ($idSp, $idHoaDon, $gia, $soluong)";
            if (!$this->conn->query($sql)) {
                echo "Lỗi thêm chi tiết hóa đơn: " . $this->conn->error;
                return false;
            }
        }
    
        return true;
    }    

    public function ktraHoaDon($id, $sl)
    {
        $sql= "select * from sanpham where id=$id";
        $result= $this->conn->query($sql)->fetch_assoc();
        if($result["sl"]<$sl)
            return false;
        return true;
    }

    public function thongkedulieu() {
        // Tính tổng doanh thu
        $sql="select * from hoadon where trangthai=3  ";
        $result= $this->conn->query($sql);
        $doanhthu= 0;
        while($dong=$result->fetch_assoc())
        {
            $doanhthu= $doanhthu + $dong["tongtien"];
        }

        // Tính tổng số lượng sản phẩm từ các hóa đơn đã thanh toán
        $sqlSanPham = "SELECT SUM(chitiethoadon.soluong) AS tongsanpham
            FROM chitiethoadon
            INNER JOIN hoadon ON hoadon.id = chitiethoadon.id_hd
            WHERE hoadon.trangthai = 3"; // Giả sử trạng thái 3 là đã hoàn thành mua hàng
        $resultSanPham = $this->conn->query($sqlSanPham);
        $tongSanPham = $resultSanPham->fetch_assoc()['tongsanpham'];

        // Tính tổng số khách hàng
        $sql = "SELECT COUNT(DISTINCT khachhang.id) AS tongkhachhang
                FROM hoadon 
                INNER JOIN khachhang ON hoadon.khachhang_id = khachhang.id
                WHERE hoadon.trangthai = 3";
        $result = $this->conn->query($sql);
        $tongkhachhang = 0;
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tongkhachhang = $row['tongkhachhang']; // lấy tổng số khách hàng đã thanh toán
        }

        // Tạo mảng dữ liệu để trả về
        $data = [
            "doanhthu" => $doanhthu, 
            "tongsanpham" => $tongSanPham, 
            "tongkhachhang" => $tongkhachhang 
        ];
        return $data;
    }

    public function giamSoLuong($id_sp, $soluong) {
        $sql = "update sanpham set sl = sl - $soluong where id = $id_sp";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function thongKeMuaNhieu() {
        $sql = "SELECT sanpham.*, 
                       COALESCE(COUNT(chitiethoadon.id_sp), 0) AS sp_count
                FROM sanpham
                LEFT JOIN chitiethoadon ON sanpham.id = chitiethoadon.id_sp
                GROUP BY sanpham.id
                ORDER BY sp_count DESC";
        $result = $this->conn->query($sql);
        return $result;
    }   
    
    // Lấy sản phẩm theo loại 
    public function laySanPhamTheoLoai($loai = null) {
        if ($loai) {
            $sql = "SELECT * FROM sanpham WHERE loai = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $loai);
        } else {
            $sql = "SELECT * FROM sanpham";
            $stmt = $this->conn->prepare($sql);
        }
        $stmt->execute();
        return $stmt->get_result();
    }
            

    // Lấy tất cả sản phẩm 
    public function layTatCaSanPham() {
        $sql = "SELECT * FROM sanpham";
        $result = $this->conn->query($sql);
        return $result;
    }
}