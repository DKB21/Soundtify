-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artistID` int(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(20) NOT NULL,
  `avafile` varchar(1024) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artistID`, `email`, `password`, `name`, `avafile`, `date`) VALUES
(7, 'sol7@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Sol7', 'sol7ava.jpg', '2023-03-12'),
(11, 'doankimbang210703@gmail.com', '5d3f7ea573739d361cfd90eaa70a225b', 'kb21', 'heehe.jpg', '2023-03-13'),
(12, 'mck@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'RPT MCK', 'mckava.jpg', '2023-03-10'),
(13, 'ngot@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Ngọt', 'ngotava.jpg', '2023-03-10'),
(14, 'bray@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'B Ray', 'brayava.jpg', '2023-03-10'),
(15, 'tlinh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'tlinh', 'tlinhava.jpg', '2023-03-10'),
(16, 'mnaive@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'M NAIVE', 'mnaiveava.jpg', '2023-03-10'),
(17, 'lowg@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Low G', 'lowgava.jpg', '2023-03-10'),
(18, 'chillies@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Chillies', 'chilliesava.jpg', '2023-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `artistFollowID` int(255) NOT NULL,
  `artistGetFollowID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`artistFollowID`, `artistGetFollowID`) VALUES
(12, 15),
(15, 12),
(11, 13),
(11, 12),
(11, 18);

-- --------------------------------------------------------

--
-- Table structure for table `likesong`
--

CREATE TABLE `likesong` (
  `artistID` int(255) NOT NULL,
  `songID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likesong`
--

INSERT INTO `likesong` (`artistID`, `songID`) VALUES
(11, 2),
(11, 3),
(11, 4),
(11, 10),
(11, 14),
(11, 5),
(11, 1),
(11, 7),
(11, 13),
(11, 16);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `songID` int(255) NOT NULL,
  `artistID` int(255) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `songfile` varchar(1024) NOT NULL,
  `songimg` varchar(1024) NOT NULL,
  `uploaddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`songID`, `artistID`, `title`, `songfile`, `songimg`, `uploaddate`) VALUES
(1, 12, 'Chìm Sâu', 'chimsau.mp3', 'chimsau.jpg', '2023-03-12'),
(2, 12, 'Anh Đã Ổn Hơn', 'anhdaonhon.mp3', 'anhdaonhon.jpg', '2023-03-10'),
(3, 12, 'Suit & Tie ft. Hoàng Tôn', 'suitntie.mp3', 'suitntie.jpg', '2023-03-10'),
(4, 13, 'Em dạo này', 'emdaonay.mp3', 'emdaonay.jpg', '2023-03-10'),
(5, 13, 'Thấy Chưa', 'thaychua.mp3', 'thaychua.jpg', '2023-03-10'),
(6, 14, 'Thói Quen', 'thoiquen.mp3', 'thoiquen.jpg', '2023-03-10'),
(7, 15, 'Nếu lúc đó', 'neulucdo.mp3', 'neulucdo.jpg', '2023-03-13'),
(8, 16, 'bientan', 'bientan.mp3', 'bientan.jpg', '2023-03-11'),
(9, 17, 'Đơn Giản', 'dongian.mp3', 'dongian.jpg', '2023-03-12'),
(10, 14, 'Hoàn Hảo', 'hoanhao.mp3', 'hoanhao.jpg', '2023-03-10'),
(11, 7, 'iceman ft. MCK', 'iceman.mp3', 'iceman.jpg', '2023-03-10'),
(12, 11, 'chẳng giống giáng sinh - MCK ft. Lu version', 'ChangGiongNoelMCKxLu.wav', 'noellofigil.jpg', '2023-03-08'),
(13, 12, 'badtrip', 'badtrip.mp3', 'anhdaonhon.jpg', '2023-03-12'),
(14, 13, 'LẦN CUỐI', 'lancuoi.mp3', 'lancuoi.jpg', '2023-03-12'),
(15, 12, 'Tại Vì Sao', 'taivisao.mp3', 'taivisao.jpg', '2023-03-11'),
(16, 18, 'Vùng Ký Ức', 'vungkyuc.mp3', 'vungkyuc.jpg', '2023-03-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artistID`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`songID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artistID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `songID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
