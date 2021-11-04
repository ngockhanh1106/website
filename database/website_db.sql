-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 02:19 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `id_assign` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_assign`
--

INSERT INTO `tbl_assign` (`id_assign`, `id_course`, `id_user`) VALUES
(2, 10, 27),
(4, 11, 27),
(5, 13, 37),
(6, 9, 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id_register` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_register`
--

INSERT INTO `tbl_register` (`id_register`, `id_course`, `id_user`, `status`) VALUES
(24, 13, 36, 1),
(25, 13, 41, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id_room` int(11) NOT NULL,
  `name_room` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_room`
--

INSERT INTO `tbl_room` (`id_room`, `name_room`) VALUES
(5, '226-A4'),
(1, '245-A3'),
(4, '327-A2'),
(7, '328-A4'),
(6, '332-A4'),
(2, '345-A3'),
(3, '347-A3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id_semester` int(11) NOT NULL,
  `name_semester` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_semester`
--

INSERT INTO `tbl_semester` (`id_semester`, `name_semester`) VALUES
(1, '1_2018_2019'),
(2, '2_2018_2019'),
(3, '1_2019_2020'),
(4, '2_2019_2020'),
(5, '1_2020_2021'),
(6, '2_2020_2021'),
(7, '1_2021_2022'),
(8, '2_2021_2022');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_course`
--

CREATE TABLE `tb_course` (
  `id_course` int(11) NOT NULL,
  `code_course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_room` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `credit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_course`
--

INSERT INTO `tb_course` (`id_course`, `code_course`, `name_course`, `days`, `lesson`, `id_room`, `id_semester`, `startdate`, `enddate`, `credit`, `status`, `amount`) VALUES
(9, 'cse480', 'Công nghệ web', 'Thứ Hai', '1-3', 7, 8, '2021-10-30', '2021-11-18', 3, 1, 0),
(10, 'attt-21-1', 'An toàn thông tin', 'Thứ Ba', '4-6', 5, 1, '2021-10-15', '2021-11-04', 3, 0, 0),
(11, 'csdl112', 'Cơ sở dữ liệu', 'Thứ Tư', '10-12', 4, 4, '2021-08-18', '2021-09-29', 3, 0, 0),
(12, 'tkud', 'Thống kê ứng dụng', 'Thứ Tư', '7-9', 7, 1, '2021-09-23', '2021-10-31', 3, 1, 0),
(13, 'AI117', 'Trí tuệ nhân tạo', 'Thứ Năm', '1-3', 5, 5, '2021-09-30', '2021-11-04', 3, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `code_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `phone` int(11) NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `code_user`, `role`, `fullname`, `email`, `sex`, `birthdate`, `phone`, `pass`) VALUES
(27, '19610307', 2, 'Nguyễn Giang', '19610307@gmail.com', 'nữ', '2021-10-15', 976543256, '202cb962ac59075b964b07152d234b70'),
(31, 'admin1', 1, 'admin', 'beo@gmail.com', 'lgbt', '2001-03-10', 987854269, '202cb962ac59075b964b07152d234b70'),
(36, '19610311', 3, 'Hoàng Hà Giang', 'giang@gmail.com', 'nam', '2001-07-08', 976543876, '202cb962ac59075b964b07152d234b70'),
(37, '18610302', 2, 'Nguyễn Ngọc Bảo', 'bao@gmail.com', 'nam', '1986-07-09', 97443256, '202cb962ac59075b964b07152d234b70'),
(38, 'teacher12', 2, 'Ngọc Lục Bảo', 'bao@gmail.com', 'nữ', '1989-11-03', 988843876, '202cb962ac59075b964b07152d234b70'),
(39, 'teacher1234', 2, 'Nguyễn Hoàng Huy', 'huy@gmail.com', 'nam', '1986-02-14', 989893876, '202cb962ac59075b964b07152d234b70'),
(40, '19991108', 3, 'Trần Quốc Hưng', 'hung@gmail.com', 'nam', '1999-08-11', 989893999, '202cb962ac59075b964b07152d234b70'),
(41, '19930604', 3, 'Nguyễn Việt Hùng', 'hung11@vaka.com', 'nam', '1998-11-13', 987843876, '202cb962ac59075b964b07152d234b70'),
(43, 'teacher567', 2, 'Đinh Khánh Hà', 'ha@gmail.com', 'nam', '1985-02-11', 989893876, '202cb962ac59075b964b07152d234b70');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`id_assign`),
  ADD KEY `tbl_assign_ibfk_1` (`id_course`),
  ADD KEY `tbl_assign_ibfk_2` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `tbl_register_ibfk_1` (`id_course`),
  ADD KEY `tbl_register_ibfk_2` (`id_user`);

--
-- Chỉ mục cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id_room`),
  ADD UNIQUE KEY `name_room` (`name_room`);

--
-- Chỉ mục cho bảng `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Chỉ mục cho bảng `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `code_course` (`code_course`),
  ADD KEY `tb_course_ibfk_1` (`id_room`),
  ADD KEY `tb_course_ibfk_2` (`id_semester`);

--
-- Chỉ mục cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `code_user` (`code_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `id_assign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD CONSTRAINT `tbl_assign_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`),
  ADD CONSTRAINT `tbl_assign_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);

--
-- Các ràng buộc cho bảng `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`),
  ADD CONSTRAINT `tbl_register_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);

--
-- Các ràng buộc cho bảng `tb_course`
--
ALTER TABLE `tb_course`
  ADD CONSTRAINT `tb_course_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `tbl_room` (`id_room`),
  ADD CONSTRAINT `tb_course_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tbl_semester` (`id_semester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
