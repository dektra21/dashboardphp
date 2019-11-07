-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 07:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`) VALUES
(1, 'Sekolah'),
(2, 'aokwokwko'),
(3, 'anaja'),
(4, 'Jadwal Hari Ini');

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(11) NOT NULL,
  `todo` varchar(255) NOT NULL,
  `assign` date NOT NULL,
  `status` varchar(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`id`, `todo`, `assign`, `status`, `user_id`, `category_id`) VALUES
(14, 'Olahraga', '2019-11-07', '1', 10, 4),
(17, 'asasasa', '2019-11-07', '1', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `to_do_list`
--

CREATE TABLE `to_do_list` (
  `id` int(11) NOT NULL,
  `todo` int(255) NOT NULL,
  `assign` date NOT NULL,
  `status` varchar(2) NOT NULL,
  `idcategories` int(11) NOT NULL,
  `namecategories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `password2`, `name`, `email`) VALUES
(1, 'dektra21', '$2y$10$XTK8KDTLIAdN1nkWprlqg.yo/ZsezTjGALgfYVP47cbJGklfqFR2m', 'dektra234', 'DEKTRA', 'dektra@gmail.com'),
(2, 'dektra', '$2y$10$UtGJTpHvKkz8fE6ojg0JKeJ.lfqi41XfDnwDl5FZW8yw3X0XUoNQi', 'kokoko', 'dektragantenkwokwkw', 'wishnuahmadensa@gmail.com'),
(3, 'asasa', '$2y$10$PDzW.KYwK1nfBZ1bAq91.eKO3SX.K9kyuaWgDkhA2mAEkcQvxNT12', 'asasas', 'asasasaas', 'asasiap@gmail.com'),
(4, 'saasas', '$2y$10$yHk9MCfiqHr5W3JnSKpNbeesv68h2b3FQJEmTSfgmctzuivuFeG8W', 'fgfgfg', 'asasasaas12', 'aryadwipayana_putra@yahoo.co.id'),
(5, 'dewade', '$2y$10$92E3WHk3rU4fVtEG/L6m8OzPEjshIdxMTWM5juFiQ21Xo3oAE0B2W', 'dewade123', 'Bagus Gede', 'dewade@gmail.com'),
(6, 'dektra09', '$2y$10$8erxTVbQkGHK2.MPez07fu3E39MX0UzTpD3aQy7rg2BTCsuPOMmtm', 'dektra123', 'dektraa21', 'dektra09@gmail.com'),
(7, 'asiap123', '$2y$10$v/8wJuwZSOXH3sZC4zJ36Oskj39FraYViU06/ncjMhYUaoWfpMymO', 'ashiapp', 'attahalilintar', 'atta@gmail.com'),
(8, 'asasas', '$2y$10$s84EiQ3yez/dPExGVFUqvewur2L72Q1Rcqq4tiCIds1.CvTLdCHJK', 'dektra456', 'dektragantenk', 'asasiap@gmail.com'),
(9, 'wadewade', '$2y$10$uqpFzFjVYRJEj/quFZQ1wu5LCS07ckoEIo6zNIOx8uXZy2TT8qCy.', 'sdsdsd', 'anjaymabar', 'asasasasasa@gmail.com'),
(10, 'asaasiap', '$2y$10$txJsnZm06RrQEYaPZovGFevGa9tTmKQBmXNTF0J6tll0ZffXp.QLW', 'asaasiap', 'Atta Halilintar', 'asaasiap123@gmail.com'),
(11, 'dektraaa21', '$2y$10$5YkAT2oA4vYBOMJEAWlNkuR2Vx.2R0XsKfhqeNNna4rjLJsWluHwe', 'dektra123', 'Dektra Sangat Ganteng', 'dektraa21@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `to_do_list`
--
ALTER TABLE `to_do_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `to_do_list`
--
ALTER TABLE `to_do_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
