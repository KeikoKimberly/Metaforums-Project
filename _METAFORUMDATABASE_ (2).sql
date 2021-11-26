-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 11:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project3`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `userid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 1,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `silent` int(11) NOT NULL DEFAULT 0,
  `abuse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `email`, `username`, `password`, `vkey`, `verified`, `role`, `time`, `status`, `silent`, `abuse`) VALUES
(16, 'keikokimberly18@gmail.com', 'keikokimberly', 'bae5e3208a3c700e3db642b6631e95b9', '7380253669c50290d3bfcd284a68a647', 1, 1, '2021-11-25 00:03:50', 1, 0, 1),
(19, 'keiko.octavina@binus.ac.id', 'binusian', 'bae5e3208a3c700e3db642b6631e95b9', '77c4cebdb489c0749c7c5f654398b208', 1, 2, '2021-11-21 11:42:16', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_title` varchar(150) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_title`, `category_desc`) VALUES
(1, 'Game', 'This is the Game Category'),
(2, 'Education', 'This is the education category'),
(3, 'Fun fact', 'This is Fun fact category');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `postsid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `postsid`, `userid`) VALUES
(2, 'teskomennnn', 99, 0),
(4, 'tesssss', 99, 15),
(5, 'tes kome denpasar', 97, 15),
(8, 'seruu', 0, 15),
(14, 'jadi deh', 101, 15),
(15, 'jago juga ', 101, 15),
(16, 'coment', 0, 15),
(17, 'coba', 0, 15),
(18, 'errr', 0, 15),
(19, 'komen', 100, 15),
(20, 'komwn 123', 100, 15),
(21, 'tes komen lagi', 97, 15),
(23, 'bagus', 113, 15),
(24, 'baussss', 113, 15),
(27, 'lho', 113, 15),
(28, 'lho', 113, 15),
(29, 'lho', 113, 15),
(30, 'tes', 113, 15),
(31, 'tes', 113, 15),
(32, '12333', 113, 15),
(33, '12333', 113, 15),
(34, 'tes', 113, 15),
(35, '12333', 113, 15),
(36, 'kwnPA', 112, 15),
(37, 'tes', 106, 15),
(38, 'hoo\r\n', 106, 15),
(39, 'tesss', 115, 18),
(40, 'belum commenty', 116, 19),
(41, 'binusuniversity', 116, 19),
(43, 'tes', 112, 19),
(45, 'keren', 126, 19),
(47, 'tes komen', 133, 16),
(48, 'hari ke 7', 124, 16),
(50, 'bagus', 109, 16),
(51, 'tes komen', 112, 16);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `post` text NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` int(30) NOT NULL,
  `postid` int(11) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userid`, `post`, `likes`, `date`, `category`, `postid`, `verified`, `view`) VALUES
(109, 16, 'coba bikin lagi game', 0, '2021-11-23 03:51:37', 1, 4691873, 1, 11),
(112, 16, 'seru jg lama\"', 0, '2021-11-25 00:18:01', 2, 2147483647, 1, 49),
(118, 16, 'game pagi hari', 0, '2021-11-21 05:11:17', 1, 2147483647, 1, 3),
(119, 16, 'tesrfghfffffff', 0, '2021-11-21 06:31:18', 3, 537672861, 1, 9),
(124, 16, 'ini funfact hari ke 4', 0, '2021-11-23 00:38:46', 3, 2147483647, 1, 14),
(125, 19, 'ini funfact', 0, '2021-11-21 09:57:08', 3, 2147483647, 1, 0),
(129, 19, 'game seru lagi', 0, '2021-11-21 10:09:49', 1, 2147483647, 1, 0),
(130, 19, 'funfactsssss', 0, '2021-11-21 10:10:19', 3, 2147483647, 1, 0),
(131, 19, 'tessssss', 0, '2021-11-25 00:19:47', 1, 2147483647, 1, 3),
(132, 19, 'game mlam hari', 0, '2021-11-21 10:53:56', 1, 7280, 1, 1),
(133, 16, 'tes esukasi traman rama', 0, '2021-11-25 00:31:43', 2, 2147483647, 1, 48),
(134, 16, 'tes post edukasi banned ga', 0, '2021-11-22 23:14:07', 2, 71411565, 1, 8),
(135, 16, 'game mario bross', 0, '2021-11-24 23:09:13', 1, 826734138, 1, 15),
(136, 16, 'tes main game', 0, '2021-11-25 00:35:49', 1, 2147483647, 1, 11),
(138, 19, 'tes bikin game', 0, '2021-11-25 00:36:44', 1, 2147483647, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
