-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 07:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `id_assign` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`id_assign`, `id_course`, `id_user`) VALUES
(2, 10, 27),
(4, 11, 39),
(5, 13, 37),
(6, 9, 38),
(8, 14, 43),
(9, 18, 52),
(10, 17, 51);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id_register` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id_register`, `id_course`, `id_user`) VALUES
(29, 9, 36),
(31, 13, 36),
(32, 9, 40),
(33, 12, 40),
(34, 13, 40),
(35, 9, 41),
(36, 13, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id_room` int(11) NOT NULL,
  `name_room` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id_room`, `name_room`) VALUES
(14, '132-A4'),
(16, '201-A4'),
(5, '226-A4'),
(8, '226-C5'),
(15, '230-A4'),
(9, '232-B4'),
(12, '233-A2'),
(1, '245-A3'),
(17, '312-A2'),
(13, '312-A4'),
(11, '323-A2'),
(4, '327-A2'),
(7, '328-A4'),
(6, '332-A4'),
(2, '345-A3'),
(3, '347-A3'),
(10, '432-C5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id_semester` int(11) NOT NULL,
  `name_semester` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_semester`
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
-- Table structure for table `tb_course`
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
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`id_course`, `code_course`, `name_course`, `days`, `lesson`, `id_room`, `id_semester`, `startdate`, `enddate`, `credit`, `status`) VALUES
(9, 'cse480', 'Công nghệ web', 'Thứ Hai', '1-3', 7, 8, '2021-10-30', '2021-11-18', 3, 1),
(10, 'attt-21-1', 'An toàn thông tin', 'Thứ Ba', '4-6', 5, 1, '2021-10-15', '2021-11-04', 3, 0),
(11, 'csdl112', 'Cơ sở dữ liệu', 'Thứ Tư', '10-12', 4, 4, '2021-08-18', '2021-09-29', 3, 0),
(12, 'tkud', 'Thống kê ứng dụng', 'Thứ Tư', '7-9', 7, 1, '2021-09-23', '2021-10-31', 3, 1),
(13, 'AI117', 'Trí tuệ nhân tạo', 'Thứ Năm', '1-3', 5, 5, '2021-09-30', '2021-11-04', 3, 1),
(14, 'tacn', 'Tiếng Anh chuyên ngành', 'Thứ Năm', '4-6', 3, 6, '2021-11-15', '2021-12-30', 3, 1),
(15, 'ktct', 'Kinh tế chính trị', 'Thứ ba', '7-9', 5, 6, '2021-12-20', '2022-01-24', 2, 1),
(17, 'qtcsdl', 'Quản trị cơ sở dữ liệu', 'Thứ Năm', '1-3', 5, 7, '2022-01-24', '2022-03-14', 3, 1),
(18, 'ltnc', 'Lập trình nâng cao', 'Thứ hai', '1-3', 7, 7, '2022-01-24', '2022-03-14', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
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
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `code_user`, `role`, `fullname`, `email`, `sex`, `birthdate`, `phone`, `pass`) VALUES
(27, '19610307', 2, 'Nguyễn Giang', '19610307@gmail.com', 'Nữ', '2021-10-15', 976543256, '202cb962ac59075b964b07152d234b70'),
(36, '19610311', 3, 'Hoàng Hà Giang', 'giang@gmail.com', 'Nam', '2001-07-08', 976543876, '202cb962ac59075b964b07152d234b70'),
(37, '18610302', 2, 'Nguyễn Ngọc Bảo', 'bao@gmail.com', 'Nam', '1986-07-09', 97443256, '202cb962ac59075b964b07152d234b70'),
(38, 'teacher12', 2, 'Ngọc Lục Bảo', 'bao@gmail.com', 'Nữ', '1989-11-03', 988843876, '202cb962ac59075b964b07152d234b70'),
(39, 'teacher1234', 2, 'Nguyễn Hoàng Huy', 'huy@gmail.com', 'Nam', '1986-02-14', 989893876, '202cb962ac59075b964b07152d234b70'),
(40, '19991108', 3, 'Trần Quốc Hưng', 'hung@gmail.com', 'Nam', '1999-08-11', 989893999, '202cb962ac59075b964b07152d234b70'),
(41, '19930604', 3, 'Nguyễn Việt Hùng', 'hung11@vaka.com', 'Nam', '1998-11-13', 987843876, '202cb962ac59075b964b07152d234b70'),
(43, 'teacher567', 2, 'Đinh Khánh Hà', 'ha@gmail.com', 'Nam', '1985-02-11', 989893876, '202cb962ac59075b964b07152d234b70'),
(44, '10257264', 3, 'Phạm Thị Hương', 'pth@gmail.com', 'Nữ', '2000-12-05', 945278531, '202cb962ac59075b964b07152d234b70'),
(45, '16475826', 3, 'Trần Mạnh Trung', 'tmt@yahoo.com', 'Nam', '2002-04-06', 345726428, '202cb962ac59075b964b07152d234b70'),
(46, '17584547', 3, 'Nguyễn Nam Hải', 'nnh@gmail.com', 'Nam', '2001-06-05', 986524837, '202cb962ac59075b964b07152d234b70'),
(47, '18547268', 3, 'Nguyễn Thúy Liễu', 'ntl@gmail.com', 'Nữ', '1999-02-07', 962485375, '202cb962ac59075b964b07152d234b70'),
(48, '19642578', 3, 'Nguyễn Tường San', 'nts@yahoo.com', 'Nữ', '2000-12-15', 995634851, '202cb962ac59075b964b07152d234b70'),
(49, '17524685', 3, 'Phạm Phương Nam', 'pph@gmail.com', 'Nam', '2001-06-18', 956347258, '202cb962ac59075b964b07152d234b70'),
(50, 'teacher285', 2, 'Nguyễn Thị Anh', 'nta@gmai.com', 'Nữ', '1975-12-06', 95427652, '202cb962ac59075b964b07152d234b70'),
(51, 'teacher965', 2, 'Phạm Tiến Cường', 'ptc@gmail.com', 'Nam', '1980-05-09', 965247825, '202cb962ac59075b964b07152d234b70'),
(52, 'teacher329', 2, 'Nguyễn Hồng Hạnh', 'nhh@gmail.com', 'Nữ', '1977-01-05', 953478515, '202cb962ac59075b964b07152d234b70'),
(53, 'teacher227', 2, 'Phạm Công Thành', 'pct@gmail.com', 'Nam', '1994-02-21', 967854759, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `code` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `last_name`, `email`, `password`, `registration_date`, `status`, `code`) VALUES
(2, 'Ngoc', 'Khánh', 'meoc419@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-11-05 07:43:04', 1, 'e7eceaa18f128423c1cadf3202f434e2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`id_assign`),
  ADD KEY `tbl_assign_ibfk_1` (`id_course`),
  ADD KEY `tbl_assign_ibfk_2` (`id_user`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id_register`),
  ADD KEY `tbl_register_ibfk_1` (`id_course`),
  ADD KEY `tbl_register_ibfk_2` (`id_user`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id_room`),
  ADD UNIQUE KEY `name_room` (`name_room`);

--
-- Indexes for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id_course`),
  ADD UNIQUE KEY `code_course` (`code_course`),
  ADD KEY `tb_course_ibfk_1` (`id_room`),
  ADD KEY `tb_course_ibfk_2` (`id_semester`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `code_user` (`code_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `id_assign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD CONSTRAINT `tbl_assign_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`),
  ADD CONSTRAINT `tbl_assign_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);

--
-- Constraints for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`),
  ADD CONSTRAINT `tbl_register_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);

--
-- Constraints for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD CONSTRAINT `tb_course_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `tbl_room` (`id_room`),
  ADD CONSTRAINT `tb_course_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tbl_semester` (`id_semester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
