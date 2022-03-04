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
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(36, 'tubol', '$2y$10$.7102Na2EZwDBNGBSHPzQOnAmyr4ZWSOSoYEsBAzL0hKSLpiJj.DS', 'mark.17dullavin@gmail.com'),
(37, 'tae', '$2y$10$0NM8V.pc1SD37ebPYtCIE.CDdblwRDSz1pAXih01MaaPgggxSssRu', 't.lasagna27@gmail.com'),
(38, 'hanna.jejemon', '$2y$10$5/wNrbJNCIN9nSLEmY562eMmuDwMt6znjj9kID4L..X25LMtzc/uu', 'dullavinhannas@gmail.com'),
(44, 'haha', '$2y$10$.Cym1.CKYCrHgulZC4AstO1rOJu2EUo9OTd4dUVQsE.BPqtzRwmiG', ''),
(45, 'marklouie', '$2y$10$nE23yLPdGC5Fcr6/tyzyMePUR4oOeb2NqbwW8pUGQTR3emR2QSxXS', ''),
(46, 'danica', '$2y$10$sq.IsMyeYmXK8hIajy/3Ju6knALrIiDwWTQ1rVNyw.g8f9I4HL.DW', ''),
(47, 'acinad', '$2y$10$zgvjwb5q9P8LHd56U35NN.3a0VqJBYV1CnNGTAOZyRVW0xsdI8h/G', ''),
(48, 'danicatubol123', '$2y$10$OQ4AVkaq2P7SxUtm/j3qaOY8cTTyg9lC/U14UUffzAYttTNR82Uuy', ''),
(49, 'inday', '$2y$10$bhnweaWy0CLT2u43FQPEjevMjnpF45F7SXwMfV4Eusc3FbLHwmWoy', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
