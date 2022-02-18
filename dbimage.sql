-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 10:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbimage`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `details`, `images`, `title`) VALUES
(106, 'so clean, so good', '620e5354e55489.34094196.jpg', 'Pag mahal mo ISOGO mo '),
(107, 'Ayon sa post ng ex-kapamilya na si Robin Padilla sa Instagram siya ay nababaliw na simula nang inagawan ni Aljur ang crush nyang si AJ Raval na isang anak den ng sikat na Action Star', '620e53b75408f2.86091116.gif', 'Robin Padilla Nabuang na!'),
(108, 'MANILA, Philippines — Presidential aspirant and former Senator Ferdinand “Bongbong” Marcos Jr. on Saturday insisted that he obtained a degree from the University of Oxford.\r\n', '620e53fe0ed774.18720090.jpeg', 'New Love Team ng bayan, totoo nga ba?'),
(109, 'haha', '620f611a8a93a1.66687835.jpg', 'mga bembol jejemon'),
(110, 'Isang lalakeng bente anyos ang pinaghahanap ng  otoridadd sa pagpaslang ng inosenteng ipis', '620f61a7262ab5.08323141.jpg', 'WANTED DEAD OR ALIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
