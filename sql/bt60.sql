-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 17, 2023 lúc 07:54 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bt60`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

DROP TABLE IF EXISTS `giangvien`;
CREATE TABLE IF NOT EXISTS `giangvien` (
  `maGiangVien` int NOT NULL AUTO_INCREMENT,
  `tenGiangVien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaySinh` date NOT NULL,
  `chuyenNganh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioiThieu` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maGiangVien`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`maGiangVien`, `tenGiangVien`, `email`, `ngaySinh`, `chuyenNganh`, `gioiThieu`) VALUES
(1, 'Trần Thị Thu Phương', 'tttphuong@gmail.com', '2023-10-13', 'công nghệ thông tin', 'Giám đốc đào tạo Công Ty Cộng Đồng Việt • Úc Thạc Sỹ Tiếng Anh ĐH Southern Queensland ( Úc ) Chuyên gia đào tạo Internet Marketing Online Hơn 9 năm kinh nghiệm quản lý và giảng dạy tại các trường Cao Đẳng & Đại Học. Hơn 7 năm làm việc trong môi trườn'),
(2, 'Nguyễn Quốc Tuấn', 'nqtuan@gmail.com', '2023-10-13', 'công nghệ thông tin', ''),
(3, 'Phạm Ngọc Phát', 'pnphat@gmail.com', '2003-10-03', 'Nghệ thuật và thương mại', 'Hơn 7 năm làm việc trong môi trường 100% người nước ngoài đến từ Philippines, Singapore, Anh, Mỹ , Úc.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

DROP TABLE IF EXISTS `khoahoc`;
CREATE TABLE IF NOT EXISTS `khoahoc` (
  `maKhoaHoc` int NOT NULL AUTO_INCREMENT,
  `tenKhoaHoc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hocPhi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noiDung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maNganh` int NOT NULL,
  `idND` int NOT NULL,
  PRIMARY KEY (`maKhoaHoc`),
  KEY `maNganh` (`maNganh`),
  KEY `idND` (`idND`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`maKhoaHoc`, `tenKhoaHoc`, `hocPhi`, `noiDung`, `anh`, `maNganh`, `idND`) VALUES
(1, 'công nghệ thông tin', '10000000', 'nội dung', 'it3.jpg', 1, 0),
(2, 'Thiết kế đồ họa', '1000000', 'Lập trình hiệu ứng với Javascript và SVG\r\n', 'it2.jpg', 1, 0),
(3, 'Nghiệp vụ kế toán', '2000000', 'Khóa học setup hệ thống kinh doanh online từ đầu đến tự động hoàn toàn', 'ql1.jpg', 3, 0),
(4, 'Kinh doanh Online', '3000000', 'Khóa học setup hệ thống kinh doanh online từ đầu đến tự động hoàn toàn', 'kd_kn1.png', 2, 1),
(5, 'Tiếng Anh', '2670000', 'Khóa học setup hệ thống kinh doanh online từ đầu đến tự động hoàn toàn', 'il2.jpg', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhdaotao`
--

DROP TABLE IF EXISTS `nganhdaotao`;
CREATE TABLE IF NOT EXISTS `nganhdaotao` (
  `maNganh` int NOT NULL,
  `tenNganh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maNganh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhdaotao`
--

INSERT INTO `nganhdaotao` (`maNganh`, `tenNganh`) VALUES
(1, 'công nghệ thông tin'),
(2, 'Nghệ thuật và thương mại'),
(3, 'Quản lý'),
(4, 'Ngoại ngữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidungkh`
--

DROP TABLE IF EXISTS `noidungkh`;
CREATE TABLE IF NOT EXISTS `noidungkh` (
  `idND` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loTrinh` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maGiangVien` int NOT NULL,
  `loiIch` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idND`),
  UNIQUE KEY `maGiangVien` (`maGiangVien`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `noidungkh`
--

INSERT INTO `noidungkh` (`idND`, `heading`, `loTrinh`, `maGiangVien`, `loiIch`) VALUES
(1, ' <h2>Tiếng Anh giao tiếp hoạt động hàng ngày</h2><br>\n            <div>Hàng ngày trong giao tiếp bạn sẽ thường gặp các câu hỏi về nơi sống, về tương lai, sở thích, đây là những câu thông dụng mà bạn cần phải biết để đối đáp với người đối diện để khôn', '<h2>Lộ trình học tiếng Anh giao tiếp cơ bản</h2> <br> <br>\n                        <div style=\"margin-left: 10%;\">\n                            <p>Học phát âm đúng</p> <br>\n                            <p>Củng cố từ vựng</p> <br>\n                            <p>Tập trung luyện nghe</p> <br>\n                            <p>Học bài giao tiếp căn bản</p><br>\n                        </div>                        <div style=\"margin-left: 10%;\">\n                            <p>Học phát âm đúng</p> <br>\n                            <p>Củng cố từ vựng</p> <br>\n                      ', 3, '<div style=\"margin-left: 5%;\"><i style=\"font-size: 22px; margin-right: 10px;\" class=\"fa fa-check\" aria-hidden=\"true\"></i>Luyện phản xạ nghe nói, giao tiếp được ngay. <br> <br><i style=\"font-size: 22px; margin-right: 10px;\" class=\"fa fa-check\" aria-hidden=\"true\"></i>Học được thêm nhiều từ vựng mới về chủ đề sở thích, nơi ở, tương lai. <br> <br><i style=\"font-size: 22px; margin-right: 10px;\" class=\"fa fa-check\" aria-hidden=\"true\"></i> cấu trúc ngữ pháp các mẫu Yes/ No question, W-H question. <br> <br> <br></div>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `q&a`
--

DROP TABLE IF EXISTS `q&a`;
CREATE TABLE IF NOT EXISTS `q&a` (
  `id` int NOT NULL AUTO_INCREMENT,
  `noiDungCauHoi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noiDungTraLoi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maSinhVien` int NOT NULL,
  `maGiangVien` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `maSinhVien` (`maSinhVien`,`maGiangVien`),
  KEY `maGiangVien` (`maGiangVien`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `q&a`
--

INSERT INTO `q&a` (`id`, `noiDungCauHoi`, `noiDungTraLoi`, `maSinhVien`, `maGiangVien`) VALUES
(1, 'câu hỏi', 'trả lời', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

DROP TABLE IF EXISTS `sinhvien`;
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `maSinhVien` int NOT NULL AUTO_INCREMENT,
  `tenSinhVien` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaySinh` date NOT NULL,
  `gioitinh` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maSinhVien`),
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`maSinhVien`, `tenSinhVien`, `ngaySinh`, `gioitinh`, `email`) VALUES
(1, 'Phạm Ngọc Phát', '2023-10-13', 'male', 'pnphat@gmail.com'),
(5, 'Nguyễn Hoàng Lan ', '2023-10-06', 'male', 'lamnguy13579@gmail.com'),
(14, 'Test Student', '2023-10-12', 'male', 'phuongbeo2608@gmail.com'),
(16, 'đâsdasdasd', '2023-10-04', 'male', 'Ann@gmail.com'),
(22, 'aaa', '2023-10-05', 'male', 'Tu00@gmail.com'),
(23, 'Nguyễn Văn An ', '2023-11-22', 'male', 'AN123@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_gv_kh`
--

DROP TABLE IF EXISTS `sv_gv_kh`;
CREATE TABLE IF NOT EXISTS `sv_gv_kh` (
  `maSinhVien` int NOT NULL,
  `maGiangVien` int NOT NULL,
  `maKhoaHoc` int NOT NULL,
  KEY `maGiangVien` (`maGiangVien`,`maKhoaHoc`),
  KEY `maSinhVien` (`maSinhVien`),
  KEY `maKhoaHoc` (`maKhoaHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sv_gv_kh`
--

INSERT INTO `sv_gv_kh` (`maSinhVien`, `maGiangVien`, `maKhoaHoc`) VALUES
(5, 1, 4),
(14, 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieu`
--

DROP TABLE IF EXISTS `tailieu`;
CREATE TABLE IF NOT EXISTS `tailieu` (
  `maTaiLieu` int NOT NULL AUTO_INCREMENT,
  `tenTaiLieu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maGiangVien` int NOT NULL,
  `maKhoaHoc` int NOT NULL,
  `linkFile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`maTaiLieu`),
  KEY `maGiangVien` (`maGiangVien`),
  KEY `maKhoaHoc` (`maKhoaHoc`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tailieu`
--

INSERT INTO `tailieu` (`maTaiLieu`, `tenTaiLieu`, `maGiangVien`, `maKhoaHoc`, `linkFile`, `type`) VALUES
(15, 'Test', 3, 1, '/GIAODIEN/uploads/1698092090.docx', 'docx'),
(17, 'Test', 2, 1, '/GIAODIEN/uploads/1698092221.png', 'png'),
(24, 'Test', 3, 1, '/GIAODIEN/uploads/1698105302.docx', 'docx'),
(27, 'Test', 3, 1, '/GIAODIEN/uploads/1698105517.png', 'png'),
(28, 'Test', 3, 1, '/GIAODIEN/uploads/1698105560.png', 'png'),
(29, 'Test', 3, 1, '/GIAODIEN/uploads/1698106718.png', 'png'),
(32, 'Test', 3, 1, '/GIAODIEN/uploads/1698107095.docx', 'docx'),
(38, 'Test', 3, 1, '/GIAODIEN/uploads/1698107487.png', 'png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `hoTen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`hoTen`, `email`, `matkhau`, `role`) VALUES
('AAAAAAAA', 'AAAA@gmail.com', '1963f9ed', 0),
('ADMIN', 'Admin@gmail.com', '04d4421468ef0ec392074b2a5659ae7a', 2),
('AN', 'AN123@gmail.com', 'a5e70c01ebd28d3ae17178603ab92ab5', 0),
('Vũ Thu An ', 'Ann@gmail.com', 'be74f8f3b6b91032c5fcaf67eb6ca98a', 0),
('Trần Thị Chung', 'Chung11@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', 1),
('Giao vien test', 'giaovien@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', 1),
('Nguyễn Thị Huyền ', 'huyen123@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', 0),
('Pham Ngoc Khanh ', 'Khanh@gmail.com', '04d4421468ef0ec392074b2a5659ae7a', 1),
('Phạm Thị Hà Phương', 'lamnguy13579@gmail.com', '04d4421468ef0ec392074b2a5659ae7a', 0),
('Nguyễn Hoàng Lan', 'Lan00@gmail.com', '04d4421468ef0ec392074b2a5659ae7a', 1),
('Nguyễn Doanh Tú ', 'M', '04d4421468ef0ec392074b2a5659ae7a', 0),
('Nguyễn Quốc Tuấn', 'nqtuan@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', 0),
('Phạm Hà Phương ', 'Phuong123@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', 0),
('hé', 'phuongbeo2608@gmail.com', '1233f76f34b77f118b60476d9f924dd9', 0),
('Phạm Ngọc Phát', 'pnphat@gmail.com', 'a3876fafbc8b9b9d3820b6e3a610e3d2', 1),
('Trần Thị Thu Phương', 'tttphuong@gmail.com', '1234', 0),
('Trần Ngọc Tú', 'Tu00@gmail.com', 'Test123@', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`maNganh`) REFERENCES `nganhdaotao` (`maNganh`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `q&a`
--
ALTER TABLE `q&a`
  ADD CONSTRAINT `q&a_ibfk_1` FOREIGN KEY (`maSinhVien`) REFERENCES `sinhvien` (`maSinhVien`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `q&a_ibfk_2` FOREIGN KEY (`maGiangVien`) REFERENCES `giangvien` (`maGiangVien`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sv_gv_kh`
--
ALTER TABLE `sv_gv_kh`
  ADD CONSTRAINT `sv_gv_kh_ibfk_1` FOREIGN KEY (`maSinhVien`) REFERENCES `sinhvien` (`maSinhVien`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sv_gv_kh_ibfk_2` FOREIGN KEY (`maGiangVien`) REFERENCES `giangvien` (`maGiangVien`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sv_gv_kh_ibfk_3` FOREIGN KEY (`maKhoaHoc`) REFERENCES `khoahoc` (`maKhoaHoc`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `tailieu_ibfk_1` FOREIGN KEY (`maGiangVien`) REFERENCES `giangvien` (`maGiangVien`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tailieu_ibfk_2` FOREIGN KEY (`maKhoaHoc`) REFERENCES `khoahoc` (`maKhoaHoc`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
