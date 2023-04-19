-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 05:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(5, 'Drinks', 'drinksivcon.jpg', 'Yes', 'Yes'),
(6, 'Main', 'main course.jpg', 'Yes', 'Yes'),
(7, 'Desserts', 'desserts.jpg', 'Yes', 'Yes'),
(8, 'Breakfasts', 'breakfasticon.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `image_name` varchar(250) DEFAULT NULL,
  `caterory_id` int(11) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `price`, `image_name`, `caterory_id`, `featured`, `active`) VALUES
(1, 'berry shake', '250', 'berry shake.jpg', 1, 'Yes', 'Yes'),
(2, 'crape', '400', 'Food-Name-4207.jpg', 1, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Sheetal Mulmi', 'Sheetal', 'a41acc7effe601de1dc2099a4e2fdd7c'),
(2, 'Shreeya Mulmi', 'Shreeya', '644e3cfeeeffd25cb84b974a9e700078'),
(6, 'sili lama', 'lam', '009b252fd6a94cdf79746f598eda27c8'),
(8, 'nm msnb', 'nbdfkj', '8289ca14f7f6a627a33705280e530f06'),
(9, 'lover boy', ' bchj', '3a3274300fa377fc1aaa83d4c7e4db9c'),
(12, 'Soham Shrestha', 'Soham', 'd75ec1437860b1fefb162c15d586ae3a'),
(13, 'lover girl', 'girl', '6f0a06244ee16316bab83bb63d67ff25'),
(14, 'silly', 'bghsdu', 'c888cc40314523099ec7360361ae143c');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
