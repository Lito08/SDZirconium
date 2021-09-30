-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 08:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdzirconium`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-03-31 07:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` bigint(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  `userEmail` varchar(120) DEFAULT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactusquery`
--

CREATE TABLE `contactusquery` (
  `id` bigint(20) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` bigint(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `parcel` int(11) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `name`, `parcel`, `CreationDate`, `UpdationDate`) VALUES
(2, 'J&T', 0, '2021-09-27 08:48:17', NULL),
(3, 'DHL', 0, '2021-09-27 08:50:11', NULL),
(4, 'Grab', 0, '2021-09-27 08:50:19', NULL),
(5, 'Poslaju', 0, '2021-09-27 13:22:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` bigint(20) NOT NULL,
  `MembershipName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `MembershipName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Premium', '2021-09-27 08:28:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `ptype` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(120) NOT NULL,
  `brand` varchar(120) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ribbon` varchar(120) NOT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `delivery` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ptype`, `title`, `price`, `quantity`, `brand`, `description`, `ribbon`, `Vimage1`, `Vimage2`, `Vimage3`, `delivery`, `date`, `pid`) VALUES
(2, '1', 'Oyster', '169.00', 0, '', 'Best oyster that lito loves to eat', '', 'oyster1.jpg', 'oyster2.jpg', 'oyster3.jpeg', '', '2021-09-26 21:06:35', 0),
(3, '1', 'Salmon King', '140.00', 0, '', 'The best salmon in the world that came from New Zealand.', '', 'salmon.jpg', 'salmon1.jpg', 'salmon2.jpg', '', '2021-09-26 21:58:38', 0),
(4, '1', 'King Crab', '200.00', 0, '', 'Big juicy tender crab that is very soft when bite into. ', '', 'kc1.jpg', 'kc2.jpg', 'kc3.jpg', '', '2021-09-26 22:01:33', 0),
(5, '7', 'Iphone 13', '4889.00', 0, '', 'Very expensive and not worth it.', '', 'iphone13.jpg', 'iphone13two.png', 'iphone13three.png', '', '2021-09-27 08:54:04', 0),
(6, '4', 'Pig', '99999999.99', 0, '', 'Oink oink', '', 'pp.jpg', 'pp2.jpg', 'pp3.jpg', '', '2021-09-27 13:24:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `user_id`, `full_name`, `user_name`, `email`, `password`, `date`) VALUES
(1, 9223372036854775807, 'Arca Creation', 'arca', 'arcacreation08@gmail.com', 'Dy081201', '2021-09-21 12:03:54'),
(2, 299040, 'Arca Creation', 'arcacreation', 'arcacreation08@gmail.com', 'Dy081201', '2021-09-24 11:32:53'),
(3, 947281033177, 'Arca Creation', 'arcacreation', 'arcacreation08@gmail.com', 'Dy081201', '2021-09-24 11:33:37'),
(4, 0, 'Lito', 'lito08', 'danielyusoff08@gmail.com', 'e7ef31af97f4c58006e4a917bffbefd4', '2021-09-24 12:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(20) NOT NULL,
  `typename` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `typename`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Frozen', '2021-09-24 09:18:20', NULL),
(2, 'Groceries', '2021-09-24 09:27:07', NULL),
(3, 'Fresh Groceries', '2021-09-24 09:27:27', NULL),
(4, 'Fresh Products', '2021-09-24 09:27:40', NULL),
(5, 'Confectioneries', '2021-09-24 09:27:48', NULL),
(6, 'Health & Beauty', '2021-09-24 09:29:56', NULL),
(7, 'Electronics', '2021-09-24 09:30:11', NULL),
(8, 'Sports & Lifestyle', '2021-09-24 09:30:19', NULL),
(9, 'Babies & Toys', '2021-09-24 09:30:28', NULL),
(10, 'Books', '2021-09-24 09:30:32', NULL),
(11, 'Appliances', '2021-09-24 09:30:38', NULL),
(12, 'Automotive & Motorcycles', '2021-09-24 09:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `full_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `email`, `password`, `date`, `full_name`, `country`, `city`, `gender`) VALUES
(8, 714356712141, 'mhmnal', 'hondsturm@gmail.com', 'asas', '2021-09-11 06:16:56', 'abdul ', 'Malaysia', 'teluk intan', 'male'),
(9, 4786, 'mhmnal', 'hondsturm@gmail.com', 'asas', '2021-09-11 06:18:38', 'abdul muhaimin bin abdul rahman', 'Malaysia', 'teluk intan', 'male'),
(10, 4366481086090, 'danielyusoff08', 'danielyusoff08@gmail.com', 'Dy081201', '2021-09-12 06:15:21', 'Daniel Yusoff', 'Malaysia', 'Kuala Lumpur', 'male'),
(11, 88281811861, 'lit0', 'danielyusoff081201@gmail.com', 'Dy081201', '2021-09-12 07:30:43', 'Daniel Yusoff', 'Malaysia', 'Kuala Lumpur', 'male'),
(12, 50567253012, 'fareesnazmi', 'fareesnazmi2@gmail.com', 'olive3881', '2021-09-12 17:17:37', 'FAREES NAZMI', 'Malaysia', 'SHAH ALAM', 'male'),
(13, 9223372036854775807, 'yeens', 'ultrashaheen@gmail.com', 'kosong1234', '2021-09-13 05:13:27', 'ahmad shaheen yazid', 'Indoneisa', 'muar', 'female'),
(16, 5167606861003116, 'dickson', 'dickson@gmail.com', 'Dy081201', '2021-09-27 13:17:55', 'Dickson', 'Malaysia', 'Kuala Lumpur', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `contactusquery`
--
ALTER TABLE `contactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `last_name` (`email`),
  ADD KEY `first_name` (`full_name`),
  ADD KEY `country` (`country`),
  ADD KEY `city` (`city`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactusquery`
--
ALTER TABLE `contactusquery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
