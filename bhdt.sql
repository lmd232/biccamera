-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 10, 2024 lúc 02:04 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bhdt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `ngay` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `id_sp`, `noidung`, `hoten`, `ngay`, `trangthai`) VALUES
(10, 23, 'Đẹp quá', 'Thảo', '2024-12-10 04:59:57', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_sp` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `gia` int(11) NOT NULL DEFAULT 0,
  `soluong` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_sp`, `id_hd`, `gia`, `soluong`) VALUES
(7, 35, 4390000, 1),
(7, 36, 4390000, 1),
(10, 34, 16990000, 1),
(10, 39, 16990000, 1),
(13, 31, 3990000, 1),
(15, 37, 4990000, 1),
(23, 63, 12990000, 1),
(25, 61, 13990000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL DEFAULT 0,
  `phuongthuc` enum('cod','qr') NOT NULL DEFAULT 'cod',
  `trangthai` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `ghichu`, `ngaytao`, `khachhang_id`, `tongtien`, `phuongthuc`, `trangthai`) VALUES
(31, '', '2024-12-06 07:11:17', 8, 3990000, 'cod', 3),
(34, '', '2024-12-06 14:18:41', 9, 16990000, 'cod', 3),
(35, '', '2024-12-06 14:19:52', 10, 4390000, 'cod', 3),
(36, '', '2024-12-06 14:20:26', 11, 4390000, 'cod', 3),
(37, '', '2024-12-06 15:52:46', 12, 4990000, 'cod', 0),
(39, '', '2024-12-09 14:02:28', 14, 16990000, 'cod', 0),
(51, '', '2024-12-10 02:09:54', 13, 16980000, 'cod', 0),
(57, 'hi', '2024-12-10 02:37:11', 18, 12880000, 'cod', 0),
(61, '', '2024-12-10 02:46:04', 19, 13990000, 'qr', 0),
(63, '', '2024-12-10 05:23:19', 20, 12990000, 'qr', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `sdt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten`, `diachi`, `sdt`) VALUES
(8, 'Duyen', 'Hà Nội', '0962852518'),
(9, 'Mai', 'Thái Bình', '0387808305'),
(10, 'Khuyen', 'Ninh Bình', '0867642920'),
(11, 'My', 'Hà Nội', '0812021203'),
(12, 'Chau', 'Hà Nội', '0963177802'),
(13, 'Duc', 'Hà Nội', '0962034155'),
(14, 'Thanh', 'Hà Nội', '0963177245'),
(15, 'msi', 'msi', 'mdi'),
(16, 'linh', 'Hà Nội', '0962852519'),
(17, 'thao', 'vietnam', '0987808307'),
(18, 'Hạnh', 'Ninh Bình', '0789608309'),
(19, 'Lành', 'Cao Bằng', '0812021206'),
(20, 'Thiện', 'Đắk Lắk', '0962034100');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `ten`, `mota`) VALUES
(4, 'Điện thoại', 'Điện thoại'),
(5, 'Laptop', 'Laptop'),
(6, 'Đồng hồ', 'Đồng hồ'),
(7, 'Phụ kiện', 'Phụ kiện'),
(9, 'Máy tính bảng', 'Máy tính bảng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `loai` int(11) NOT NULL,
  `mota` text NOT NULL,
  `dacdiemnoibat` text DEFAULT NULL,
  `gia` int(11) NOT NULL DEFAULT 0,
  `anhminhhoa` text DEFAULT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `loai`, `mota`, `dacdiemnoibat`, `gia`, `anhminhhoa`, `sl`) VALUES
(7, 'Samsung Galaxy A21s', 4, 'Chiếc điện thoại với những đột phá đầy ấn tượng, Samsung Galaxy A21s sở hữu 4 camera sau đa chức năng, camera trước nằm ngay trong tấm kính màn hình, mang đến trải nghiệm màn hình lớn hấp dẫn hơn bao giờ hết.', 'Bộ 4 camera 48MP;Siêu pin dung lượng 5000mAh', 4390000, './views/assets/image/637267175905809175_SaS-A21s-den-1.jpg', 6),
(9, 'Oppo Reno3 8GB-128GB', 4, 'Chiếc “camera phone” thế hệ mới nhất đã xuất hiện, OPPO Reno3 sở hữu 4 camera sau đẳng cấp và camera chuyên selfie đêm 44MP cực chất sẽ nâng tầm trải nghiệm nhiếp ảnh của bạn, mang đến sự sáng tạo đầy thú vị.', 'Camera selfi đêm 44MP;4 Camera 48MP - Zom 20x', 8490000, './views/assets/image/637236780184025189_reno-3-den-1.jpg', 2),
(10, 'Samsung Galaxy Note 10+', 4, 'Chiếc điện thoại cao cấp nhất, màn hình lớn nhất, mang trên mình sức mạnh đáng kinh ngạc của một chiếc máy tính và hệ thống 4 camera sau chuyên nghiệp, đó chính là Samsung Galaxy Note 10+, nơi quyền năng mới được thể hiện.', 'Chiếc điện thoại cao cấp nhất;Sức mạnh đáng kinh ngạc', 16990000, './views/assets/image/637008711602926121_SS-note-10-pl-den-1-1.jpg', 1),
(11, 'Vivo Y30 4GB - 128GB', 4, 'Sở hữu màn hình cực lớn, dung lượng pin lên tới 5000 mAh, 4 camera sau thời thượng và bộ nhớ trong 128GB, Vivo Y30 sẵn sàng cho cuộc sống năng động, tràn đầy niềm vui của bạn.', '4 camera sau thời thượng;Pin trâu 5000 mAh', 4990000, './views/assets/image/637251375337089908_vivo-y30-xanh-1.jpg', 5),
(12, 'Samsung Galaxy S10+ (128GB)', 4, 'Chiếc điện thoại màn hình Infinity-O lớn nhất, camera xuất sắc nhất và hiệu năng mạnh mẽ nhất của Samsung đã xuất hiện. Galaxy S10+ dẫn đầu xu thế, mang trên mình các công nghệ tiên tiến của tương lai và là một tác phẩm nghệ thuật đích thực.', 'Cảm biến vân tay siêu âm;Quay video 4K HDR10+', 13990000, './views/assets/image/636863659522918468_ss-galaxy-s10-plus-xanh-1.jpg', 1),
(13, 'Vsmart Active 3 6GB-64GB', 4, 'Không có giá chênh lệch nhiều so với phiên bản 4GB nhưng Vsmart Active 3 6GB-64GB cho bạn trải nghiệm đa nhiệm tốt hơn, hứa hẹn sử dụng được lâu dài hơn và tránh khỏi những hiện tượng lag giật.', 'Camera trượt sành điệu;Màn hình sắc nét 6.39 inch', 3990000, './views/assets/image/637133775510221830_Vsmart-active-3-green-1.jpg', 6),
(15, 'Realme 6i 4GB-128GB', 4, 'Realme 6i gói gọn hàng loạt ưu điểm đáng mơ ước vào trong một smartphone tầm trung. Trở thành chủ nhân của chiếc điện thoại này, bạn sẽ có được trải nghiệm hiệu năng ấn tượng nhờ chip xử lý Helio G80 mạnh mẽ, viên pin lớn 5.000 mAh sạc siêu nhanh và thỏa sức chụp ảnh tuyệt vời qua camera 48MP AI.', 'Bộ 4 camera AI;Cấu hình mạnh mẽ', 4990000, './views/assets/image/637227349699080396_realme-6i-xanh-1.jpg', 5),
(22, 'Laptop HP 14s', 5, 'Laptop HP 14s-dq5121TU i3 1215U/8GB/512GB/14\'FHD/Win11 đảm bảo về khả năng xử lý mạnh mẽ cũng như đa nhiệm mượt mà, hiệu suất vượt trội. ', 'Thiết Kế Mỏng Nhẹ, Năng Động;Màn Hình Sống Động, Sắc Nét', 11190000, './views/assets/image/laptop_hp14s.jpg', 5),
(23, 'Apple Watch Series 9 GPS', 6, 'Apple Watch Series 9 GPS + Cellular 45mm viền nhôm dây vải là chiếc đồng hồ thông minh mạnh mẽ và vô cùng phong cách. Bạn sẽ có một chiếc Apple Watch màn hình lớn, vi xử lý S9 quyền năng, dây đeo thoải mái và kiểu dáng sang trọng.', 'Thông minh hơn với chip S9;Chăm sóc sức khỏe hữu ích', 12990000, './views/assets/image/applewatch.jpg', 7),
(24, 'Đế sạc đôi không dây Samsung', 7, 'Sạc đôi không dây Samsung 15W là một lựa chọn hoàn hảo dành cho ai có nhiều thiết bị Samsung hỗ trợ sạc không dây. Sản phẩm đi kèm với công nghệ sạc nhanh không dây, thiết kế mỏng nhẹ và nhiều tính năng an toàn tích hợp.', 'Sạc cho hai thiết bị cùng lúc;Bảo vệ thiết bị trong quá trình sạc', 1720000, './views/assets/image/desackhongday.jpg', 3),
(25, 'iPad Mini 7 2024 Wifi 128GB', 9, 'Cùng trải nghiệm sức mạnh tuyệt vời bên trong chiếc tablet nhỏ gọn đa năng, iPad Mini 2024 ghi điểm nhờ chip xử lý A17 Pro cực mạnh cùng bộ công cụ Apple Intelligence tiện lợi. Sản phẩm lên kệ với bốn màu sắc đẹp mắt và hoạt động tương thích với bút Apple Pencil Pro.', 'Camera Ultra Wide linh hoạt; Chip xử lý A17 cực mạnh', 13990000, './views/assets/image/ipadmini7.jpg', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `display_name`, `password`, `ngay_tao`) VALUES
(1, 'admin', 'Người quản trị', 'admin', '2020-06-15 09:21:22');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_sp`,`id_hd`),
  ADD KEY `id_hd` (`id_hd`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hang` (`loai`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loai`) REFERENCES `loai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
