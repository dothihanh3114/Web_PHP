-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2024 at 04:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

CREATE TABLE `chitiethd` (
  `idhd` int NOT NULL,
  `idsp` int NOT NULL,
  `slban` int NOT NULL,
  `dongia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`idhd`, `idsp`, `slban`, `dongia`) VALUES
(0, 4, 1, 340000),
(12, 4, 1, 340000),
(12, 7, 1, 455000),
(13, 1, 1, 340000),
(13, 2, 1, 250000),
(13, 3, 1, 270000),
(14, 1, 1, 340000);

-- --------------------------------------------------------

--
-- Table structure for table `dangnhap`
--

CREATE TABLE `dangnhap` (
  `idnv` int NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` int NOT NULL,
  `quyen` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `idct` int NOT NULL,
  `tenct` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tenndd` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sdt` int NOT NULL,
  `stk` int NOT NULL,
  `mst` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gia`
--

CREATE TABLE `gia` (
  `idgia` int NOT NULL,
  `idsp` int NOT NULL,
  `dongianhap` int NOT NULL,
  `ngayad` date NOT NULL,
  `chon` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `dongiaban` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gia`
--

INSERT INTO `gia` (`idgia`, `idsp`, `dongianhap`, `ngayad`, `chon`, `dongiaban`) VALUES
(1, 1, 240000, '2024-01-02', '1', 340000),
(2, 2, 345000, '2024-01-23', '1', 250000),
(3, 3, 255000, '2024-01-19', '1', 270000),
(4, 4, 255000, '2024-01-23', '1', 340000),
(5, 5, 345000, '2024-01-02', '1', 543300),
(6, 6, 255000, '2024-01-23', '1', 543300),
(7, 7, 345000, '2024-01-23', '1', 455000);

-- --------------------------------------------------------

--
-- Table structure for table `hangsx`
--

CREATE TABLE `hangsx` (
  `idhang` int NOT NULL,
  `tenhang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hangsx`
--

INSERT INTO `hangsx` (`idhang`, `tenhang`) VALUES
(1, 'SamSung'),
(2, 'Dell'),
(3, 'Apple'),
(4, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `idhd` int NOT NULL,
  `idkh` int NOT NULL,
  `ngaymua` date NOT NULL,
  `noidung` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phuongthuctt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`idhd`, `idkh`, `ngaymua`, `noidung`, `phuongthuctt`) VALUES
(9, 1, '2024-04-03', 'Mua hang online.', 1),
(10, 1, '2024-04-03', 'Mua hang online.', 1),
(11, 1, '2024-04-03', 'Mua hang online.', 2),
(12, 1, '2024-04-03', 'Mua hang online.', 2),
(13, 2, '2024-04-03', 'Mua hang online.', 3),
(14, 2, '2024-04-08', 'Mua hang online.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `idkh` int NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `quyentruycap` int NOT NULL,
  `diachikh` varchar(50) NOT NULL,
  `sdtkh` int NOT NULL,
  `mstkh` int NOT NULL,
  `emailkh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`idkh`, `tenkh`, `tendangnhap`, `password`, `quyentruycap`, `diachikh`, `sdtkh`, `mstkh`, `emailkh`) VALUES
(1, 'Quản trị viên', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0, '123 Nguyễn Lương Bằng', 2334667, 12345679, 'admin@gmail.com'),
(2, 'Đỗ Thị Khánh Hân', 'han', '827ccb0eea8a706c4c34a16891f84e7b', 1, '123 Hòa Nhơn, Hòa Vang', 9248645, 23456777, 'han@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `idloaisp` int NOT NULL,
  `tenloaisp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`idloaisp`, `tenloaisp`) VALUES
(1, 'Điện thoại'),
(2, 'Ô tô'),
(3, 'Laptop'),
(4, 'Tivi'),
(5, 'Linh kiện máy tính'),
(7, 'ipad');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `idncc` int NOT NULL,
  `tenncc` int NOT NULL,
  `diachi` int NOT NULL,
  `sdt` int NOT NULL,
  `tennguoiddncc` int NOT NULL,
  `stkncc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int NOT NULL,
  `tennv` int NOT NULL,
  `diachinv` int NOT NULL,
  `sdtnv` int NOT NULL,
  `stknv` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int NOT NULL,
  `tensp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hddsp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `chitietsp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `idloaisp` int NOT NULL,
  `idncc` int NOT NULL,
  `idgia` int NOT NULL,
  `idhang` int NOT NULL,
  `motasp` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `hddsp`, `chitietsp`, `idloaisp`, `idncc`, `idgia`, `idhang`, `motasp`) VALUES
(1, 'Điện Thoại', 'a7.png', 'Hiện đại', 1, 1, 1, 1, 'Nội dung Sản phẩm:\n\nSau mổi 2000 Ticket thì hệ thống sẽ ngẩu nhiên chọn 3 Ticket nhận được 1 Iphone 15 Pro Max 512Gb màu ngẩu nhiên với giá 0 VNĐ \n\n1. Điều kiện, thủ tục cụ thể: \n\n- Tất cả khách hàng có tài khoản mua sắm trên sàn giao dịch thương mại điện tử Lazada đều được quyền tham gia. \n'),
(2, 'Điện Thoại Sam Sung', 'a6.png', 'Hiện đại', 2, 2, 2, 1, 'iPhone là dòng điện thoại thông minh được sản xuất bởi Apple Inc. sử dụng hệ điều hành iOS di động của riêng Apple. Chiếc iPhone thế hệ đầu tiên được CEO Apple lúc bấy giờ là Steve Jobs công bố vào ngày 9 tháng 1 năm 2007. Kể từ đó, Apple đã phát hành các mẫu iPhone và cập nhật iOS mới hàng năm. Tính đến ngày 1 tháng 11 năm 2018, đã có hơn 2,2 tỷ chiếc iPhone được bán ra. Tính đến năm 2022, iPhone chiếm 15,6% thị phần điện thoại thông minh toàn cầu.[15]\r\n\r\niPhone là chiếc điện thoại di động đầu tiên sử dụng công nghệ cảm ứng đa điểm[16] Kể từ khi ra mắt, iPhone đã có màn hình lớn hơn, quay video, khả năng chống nước và nhiều tính năng trợ năng. Cho đến iPhone 8 và 8 Plus, iPhone đều có một nút duy nhất trên bảng điều khiển phía trước với cảm biến vân tay Touch ID. Kể từ iPhone X, các mẫu iPhone đã chuyển sang thiết kế màn hình phía trước gần như không viền với nhận dạng khuôn mặt Face ID và chuyển đổi ứng dụng được kích hoạt bằng cử chỉ. Touch ID vẫn được sử dụng cho dòng iPhone SE giá'),
(3, 'Điện Thoại Apple', 'a8.png', 'Đắt đỏ', 3, 3, 3, 1, 'iPhone là dòng điện thoại thông minh được sản xuất bởi Apple Inc. sử dụng hệ điều hành iOS di động của riêng Apple. Chiếc iPhone thế hệ đầu tiên được CEO Apple lúc bấy giờ là Steve Jobs công bố vào ngày 9 tháng 1 năm 2007. Kể từ đó, Apple đã phát hành các mẫu iPhone và cập nhật iOS mới hàng năm. Tính đến ngày 1 tháng 11 năm 2018, đã có hơn 2,2 tỷ chiếc iPhone được bán ra. Tính đến năm 2022, iPhone chiếm 15,6% thị phần điện thoại thông minh toàn cầu.[15]\r\n\r\niPhone là chiếc điện thoại di động đầu tiên sử dụng công nghệ cảm ứng đa điểm[16] Kể từ khi ra mắt, iPhone đã có màn hình lớn hơn, quay video, khả năng chống nước và nhiều tính năng trợ năng. Cho đến iPhone 8 và 8 Plus, iPhone đều có một nút duy nhất trên bảng điều khiển phía trước với cảm biến vân tay Touch ID. Kể từ iPhone X, các mẫu iPhone đã chuyển sang thiết kế màn hình phía trước gần như không viền với nhận dạng khuôn mặt Face ID và chuyển đổi ứng dụng được kích hoạt bằng cử chỉ. Touch ID vẫn được sử dụng cho dòng iPhone SE.'),
(4, 'Điện Thoại Sam Sung', 'a6.png', 'Hiện đại', 5, 4, 4, 1, 'iPhone là dòng điện thoại thông minh được sản xuất bởi Apple Inc. sử dụng hệ điều hành iOS di động của riêng Apple. Chiếc iPhone thế hệ đầu tiên được CEO Apple lúc bấy giờ là Steve Jobs công bố vào ngày 9 tháng 1 năm 2007. Kể từ đó, Apple đã phát hành các mẫu iPhone và cập nhật iOS mới hàng năm. Tính đến ngày 1 tháng 11 năm 2018, đã có hơn 2,2 tỷ chiếc iPhone được bán ra. Tính đến năm 2022, iPhone chiếm 15,6% thị phần điện thoại thông minh toàn cầu.[15]\r\n\r\niPhone là chiếc điện thoại di động đầu tiên sử dụng công nghệ cảm ứng đa điểm[16] Kể từ khi ra mắt, iPhone đã có màn hình lớn hơn, quay video, khả năng chống nước và nhiều tính năng trợ năng. Cho đến iPhone 8 và 8 Plus, iPhone đều có một nút duy nhất trên bảng điều khiển phía trước với cảm biến vân tay Touch ID. Kể từ iPhone X, các mẫu iPhone đã chuyển sang thiết kế màn hình phía trước gần như không viền với nhận dạng khuôn mặt Face ID và chuyển đổi ứng dụng được kích hoạt bằng cử chỉ. Touch ID vẫn được sử dụng cho dòng iPhone SE giá'),
(5, 'Điện Thoại Apple', 'a7.png', 'Đắt đỏ', 6, 6, 1, 3, 'iPhone là dòng điện thoại thông minh được sản xuất bởi Apple Inc. sử dụng hệ điều hành iOS di động của riêng Apple. Chiếc iPhone thế hệ đầu tiên được CEO Apple lúc bấy giờ là Steve Jobs công bố vào ngày 9 tháng 1 năm 2007. Kể từ đó, Apple đã phát hành các mẫu iPhone và cập nhật iOS mới hàng năm. Tính đến ngày 1 tháng 11 năm 2018, đã có hơn 2,2 tỷ chiếc iPhone được bán ra. Tính đến năm 2022, iPhone chiếm 15,6% thị phần điện thoại thông minh toàn cầu.[15]\r\n\r\niPhone là chiếc điện thoại di động đầu tiên sử dụng công nghệ cảm ứng đa điểm[16] Kể từ khi ra mắt, iPhone đã có màn hình lớn hơn, quay video, khả năng chống nước và nhiều tính năng trợ năng. Cho đến iPhone 8 và 8 Plus, iPhone đều có một nút duy nhất trên bảng điều khiển phía trước với cảm biến vân tay Touch ID. Kể từ iPhone X, các mẫu iPhone đã chuyển sang thiết kế màn hình phía trước gần như không viền với nhận dạng khuôn mặt Face ID và chuyển đổi ứng dụng được kích hoạt bằng cử chỉ. Touch ID vẫn được sử dụng cho dòng iPhone SE giá'),
(6, 'Điện Thoại', 'a7.png', 'Hiện đại', 0, 0, 6, 4, 'Nội dung Sản phẩm:\r\n\r\nSau mổi 2000 Ticket thì hệ thống sẽ ngẩu nhiên chọn 3 Ticket nhận được 1 Iphone 15 Pro Max 512Gb màu ngẩu nhiên với giá 0 VNĐ \r\n\r\n1. Điều kiện, thủ tục cụ thể: \r\n\r\n- Tất cả khách hàng có tài khoản mua sắm trên sàn giao dịch thương mại điện tử Lazada đều được quyền tham gia. \r\n'),
(7, 'Điện Thoại Apple', 'a8.png', 'Đắt đỏ', 7, 7, 7, 5, 'iPhone là dòng điện thoại thông minh được sản xuất bởi Apple Inc. sử dụng hệ điều hành iOS di động của riêng Apple. Chiếc iPhone thế hệ đầu tiên được CEO Apple lúc bấy giờ là Steve Jobs công bố vào ngày 9 tháng 1 năm 2007. Kể từ đó, Apple đã phát hành các mẫu iPhone và cập nhật iOS mới hàng năm. Tính đến ngày 1 tháng 11 năm 2018, đã có hơn 2,2 tỷ chiếc iPhone được bán ra. Tính đến năm 2022, iPhone chiếm 15,6% thị phần điện thoại thông minh toàn cầu.[15]\r\n\r\niPhone là chiếc điện thoại di động đầu tiên sử dụng công nghệ cảm ứng đa điểm[16] Kể từ khi ra mắt, iPhone đã có màn hình lớn hơn, quay video, khả năng chống nước và nhiều tính năng trợ năng. Cho đến iPhone 8 và 8 Plus, iPhone đều có một nút duy nhất trên bảng điều khiển phía trước với cảm biến vân tay Touch ID. Kể từ iPhone X, các mẫu iPhone đã chuyển sang thiết kế màn hình phía trước gần như không viền với nhận dạng khuôn mặt Face ID và chuyển đổi ứng dụng được kích hoạt bằng cử chỉ. Touch ID vẫn được sử dụng cho dòng iPhone SE giá');

-- --------------------------------------------------------

--
-- Table structure for table `ton`
--

CREATE TABLE `ton` (
  `idsp` int NOT NULL,
  `slton` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`idnv`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`idct`);

--
-- Indexes for table `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`idgia`),
  ADD UNIQUE KEY `sanpham` (`idsp`);

--
-- Indexes for table `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`idhang`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhd`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idkh`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idloaisp`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`idncc`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD UNIQUE KEY `loaisp` (`idloaisp`),
  ADD UNIQUE KEY `nhacungcap` (`idncc`);

--
-- Indexes for table `ton`
--
ALTER TABLE `ton`
  ADD PRIMARY KEY (`idsp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idkh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idloaisp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
