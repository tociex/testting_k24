-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2023 at 05:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_member`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_member`
--

CREATE TABLE `mst_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_member`
--

INSERT INTO `mst_member` (`id_member`, `nama`, `password`, `no_hp`, `tgl_lahir`, `email`, `jk`, `NIK`, `image`, `date_created`) VALUES
(1, 'member', '$2y$10$ebOKXdVsfZbvFZSThb5vKezDg2cdpzMTUSH/G/4K7kuY3Xa/Na/by', '77777', '2023-01-17', 'member@mail.com', 'Wanita', '555', 'index4.png', '2023-01-12'),
(3, 'misal', '$2y$10$ic4HlKnY8sR/8cHCLGyl.un9zrj5FSZx9HI/HbCoRtIe8d.ISunKe', '5352525', '2023-01-24', 'misalia@mail.com', 'Pria', '52355235', '', '2023-01-20'),
(4, 'mili', '$2y$10$hU/UGKWhHGv2nbG6N4c0oeY6b4W3UZ3ULCToeRo.N.ffHzWtrdCB6', '42424', '2023-01-03', 'mili@mail.com', 'Pria', '8899', '', '2023-01-20'),
(5, 'asfffa', '$2y$10$DQhbbRpvBZXAgzndcgZ.uu7ArrF.E2WnqN2NtfbUnX7dL.GLGhSku', '325352', '2023-01-08', 'maili@mail.com', 'Wanita', '423423424', '', '2023-01-20'),
(6, 'miilaaa', '$2y$10$LsPeQk0jSE1WWSn9dz2a0eA6x4TgTuJy.hnVlIa1oN5m0RbZTsOFi', '5355345', '2023-01-26', 'miilaaa@m.l', 'Pria', '995756', '', '2023-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `password` text NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `nama`, `password`, `date_created`) VALUES
(15, 'admin', '$2y$10$VUEKgUN6JfiE.Ka7.yKXI.Arwpcvy2IP1JV.csFCQFMGYPfCbkayO', '2019-10-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_member`
--
ALTER TABLE `mst_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_member`
--
ALTER TABLE `mst_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
