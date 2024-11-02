-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2024 lúc 10:50 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_xettuyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_so`
--

CREATE TABLE `ho_so` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nganh_id` int(11) DEFAULT NULL,
  `diem_toan` float DEFAULT NULL,
  `diem_ly` float DEFAULT NULL,
  `diem_hoa` float DEFAULT NULL,
  `hoc_ba` varchar(255) DEFAULT NULL,
  `trang_thai` enum('da_duyet','chua_duyet','khong_duyet') DEFAULT 'chua_duyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_xet_tuyen`
--

CREATE TABLE `nganh_xet_tuyen` (
  `id_nganh` int(11) NOT NULL,
  `ten_nganh` varchar(255) NOT NULL,
  `khoi_xet_tuyen` varchar(100) NOT NULL,
  `thoi_gian` date NOT NULL,
  `trang_thai` enum('hien','an') DEFAULT 'an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nganh_xet_tuyen`
--

INSERT INTO `nganh_xet_tuyen` (`id_nganh`, `ten_nganh`, `khoi_xet_tuyen`, `thoi_gian`, `trang_thai`) VALUES
(1, 'Công nghệ thông tin', 'A00,A01', '2024-09-22', 'hien'),
(2, 'Quản trị kinh doanh', 'D01, A00', '2024-09-20', 'hien'),
(3, 'Kinh tế', 'A00,D01', '2024-09-15', 'hien'),
(4, 'Kinh Doanh', 'D01', '2024-10-29', 'hien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_quyen_giao_vien`
--

CREATE TABLE `phan_quyen_giao_vien` (
  `id` int(11) NOT NULL,
  `giao_vien_id` int(11) NOT NULL,
  `nganh_xet_tuyen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_type` enum('hoc_sinh','giao_vien','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `user_type`, `created_at`) VALUES
(6, 'hgquan', '123', 'Hoàng Gia Quân', 'hoanggiaquan212@gmail.com', 'hoc_sinh', '2024-10-22 02:41:14'),
(7, 'hgquan1', '123', 'Hoàng Gia Quân', 'quanhoang6789a@gmail.com', 'giao_vien', '2024-10-22 08:23:31'),
(8, '--quan', '123', 'Hoàng Gia Quân', 'quanhoang6789a@gmail.com ', 'giao_vien', '2024-10-22 08:47:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ho_so`
--
ALTER TABLE `ho_so`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `nganh_id` (`nganh_id`);

--
-- Chỉ mục cho bảng `nganh_xet_tuyen`
--
ALTER TABLE `nganh_xet_tuyen`
  ADD PRIMARY KEY (`id_nganh`);

--
-- Chỉ mục cho bảng `phan_quyen_giao_vien`
--
ALTER TABLE `phan_quyen_giao_vien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giao_vien_id` (`giao_vien_id`),
  ADD KEY `nganh_xet_tuyen_id` (`nganh_xet_tuyen_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ho_so`
--
ALTER TABLE `ho_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nganh_xet_tuyen`
--
ALTER TABLE `nganh_xet_tuyen`
  MODIFY `id_nganh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phan_quyen_giao_vien`
--
ALTER TABLE `phan_quyen_giao_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ho_so`
--
ALTER TABLE `ho_so`
  ADD CONSTRAINT `ho_so_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ho_so_ibfk_2` FOREIGN KEY (`nganh_id`) REFERENCES `nganh_xet_tuyen` (`id_nganh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phan_quyen_giao_vien`
--
ALTER TABLE `phan_quyen_giao_vien`
  ADD CONSTRAINT `phan_quyen_giao_vien_ibfk_1` FOREIGN KEY (`giao_vien_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phan_quyen_giao_vien_ibfk_2` FOREIGN KEY (`nganh_xet_tuyen_id`) REFERENCES `nganh_xet_tuyen` (`id_nganh`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
