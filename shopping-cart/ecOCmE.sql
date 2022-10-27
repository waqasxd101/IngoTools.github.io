-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 06:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(22) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(22) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_qty` int(11) NOT NULL DEFAULT 1,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_code`) VALUES
(1, 'Portable highpressure washer', '90000', 1, 'img/ingco portable highpressure washer hpwr15028.png', 'p1000'),
(2, 'Generator 4m international 2000kg', '75000', 1, 'img/ingco generator 4m international 2000kg.png', 'p1001'),
(3, 'MMa welding machine', '65000', 1, 'img/ingco inverter mma welding machine ing mma-16.png', 'p1002'),
(4, ' MMA welding machine mmac202', '15000', 1, 'img/ingco MMA welding machine mmac202 at best price.png', 'p1003'),
(5, 'Brushless Hammer', '25000', 1, 'img/ingco brushless hammer cordless power  impact  .png', 'p1004'),
(6, 'Cord less Drill', '35000', 1, 'img/ingco cord less drill cdt 2128180 in pakistan.png', 'p1005'),
(7, ' Cutt off Machine', '15000', 1, 'img/ingco cutt off machine COS35528 manila Philippine.png', 'p1006'),
(8, '25 kv Generator', '25000', 1, 'img/ingco tools 25 kv made in pakistan.png', 'p1007'),
(9, 'High pressure Washer', '25000', 1, 'img/ingco brand high pressure washer machinery lathe weld.png', 'p1007'),
(11, 'Angle Grinder', '35000', 1, 'img/ingco angle grinder 850w AG850382.png', 'p1005'),
(12, 'Planner Electric', '15000', 1, 'img/ingco planner electric 1050watts.png', 'p1006'),
(13, 'Plastering Trowel', '25000', 1, 'img/plastering trowel with teeth ingco tools south africa.png', 'p1007'),
(14, 'Impact Drill', '25000', 1, 'img/toolkit set with impact drill 650w-101pcs-ingco.png', 'p1007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_2` (`product_code`),
  ADD KEY `product_code` (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--