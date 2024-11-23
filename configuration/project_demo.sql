-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 04:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create database project_demo;
use project_demo;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `ma_san_pham` varchar(30) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `gia_san_pham` varchar(50) NOT NULL,
  `tong_tien` varchar(100) NOT NULL,
  `so_luong_san_pham` varchar(30) NOT NULL,
  `thong_tin_nguoi_mua` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ma_san_pham` varchar(30) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `gia_san_pham` varchar(30) NOT NULL,
  `anh_san_pham` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ma_san_pham`, `ten_san_pham`, `gia_san_pham`, `anh_san_pham`) VALUES
(6, 'HH01', 'Hoa Hồng', '11000', '1.jpg'),
(7, 'HH02', 'Hoa Hường', '9000', '2.jpg'),
(8, 'HH03', 'Hoa Hồng Tím', '15000', '3.jpg'),
(9, 'HH04', 'Hoa Hồng Trắng', '12500', '4.jpg'),
(10, 'HH05', 'Hoa Hồng Vàng', '15000', '5.jpg'),
(11, 'HH06', 'Hoa Sen', '14000', '6.jpg'),
(12, 'HH07', 'Hoa Cúc', '10000', '7.jpg'),
(13, 'HH08', 'Hoa Đại', '14000', '8.jpg'),
(14, 'HH09', 'Hoa Vạn thọ', '10000', '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ten_dang_nhap` varchar(100) NOT NULL,
  `mat_khau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ten_dang_nhap`, `mat_khau`) VALUES
(1, 'admin', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
