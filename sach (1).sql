-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2026 lúc 01:15 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id` int(11) NOT NULL,
  `ten_sach` varchar(200) NOT NULL,
  `tac_gia` varchar(150) NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id`, `ten_sach`, `tac_gia`, `gia`, `so_luong`, `mo_ta`, `created`, `modified`) VALUES
(1, 'Dế Mèn phiêu lưu ký', 'Tô Hoài', 65000.00, 20, '', NULL, '2026-10-27 10:47:23'),
(2, 'Mắt biếc', 'Nguyễn Nhật Ánh', 110000.00, 12, NULL, NULL, NULL),
(3, 'Lão Hạc', 'Nam Cao', 45000.00, 25, NULL, NULL, NULL),
(4, 'Hoàng tử bé', 'Antoine de Saint Exupéry', 85000.00, 18, NULL, NULL, NULL),
(5, 'Tôi thấy hoa vàng trên cỏ xanh', 'Nguyễn Nhật Ánh', 125000.00, 15, NULL, NULL, NULL),
(6, 'Nhập môn PHP', 'Tác giả minh họa', 150000.00, 10, NULL, NULL, NULL),
(7, 'Cơ sở dữ liệu', 'Tác giả minh họa', 135000.00, 14, NULL, NULL, NULL),
(9, 'Lập trình hướng đối tượng', 'Tác giả minh họa', 145000.00, 9, NULL, NULL, NULL),
(10, 'Phân tích hệ thống', 'Tác giả minh họa', 170000.00, 6, NULL, NULL, NULL),
(11, 'Học SQL', 'Tác giả minh họa', 120000.00, 0, NULL, NULL, NULL),
(12, 'HTML và CSS', 'Tác giả minh họa', 130000.00, 11, NULL, NULL, NULL),
(16, 'Cậu Vàng', 'Nam Cao', 100.00, 5, 'Sách Hay', '2026-10-27 10:45:03', '2026-10-27 10:45:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
