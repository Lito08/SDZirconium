-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 07:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
-- Table structure for table `frozen`
--

CREATE TABLE `frozen` (
  `pid` bigint(20) NOT NULL,
  `title` varchar(120) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `quantity` int(120) NOT NULL,
  `type` varchar(120) NOT NULL,
  `brand` varchar(120) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img1` varchar(120) NOT NULL,
  `img2` varchar(120) NOT NULL,
  `img3` varchar(120) NOT NULL,
  `delivery` varchar(120) NOT NULL,
  `order` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 41803431668, 'Lito08', '', 'Dy081201', '2021-09-08 06:20:02', '', '', '', ''),
(2, 6246852455, 'danielyusoff08', '', 'Dy081201', '2021-09-08 06:21:34', '', '', '', ''),
(3, 7145409035, 'shaheen', '', 'Dy081201', '2021-09-08 07:06:07', '', '', '', ''),
(8, 714356712141, 'mhmnal', 'hondsturm@gmail.com', 'asas', '2021-09-11 06:16:56', 'abdul ', 'Malaysia', 'teluk intan', 'male'),
(9, 4786, 'mhmnal', 'hondsturm@gmail.com', 'asas', '2021-09-11 06:18:38', 'abdul muhaimin bin abdul rahman', 'Malaysia', 'teluk intan', 'male'),
(10, 4366481086090, 'danielyusoff08', 'danielyusoff08@gmail.com', 'Dy081201', '2021-09-12 06:15:21', 'Daniel Yusoff', 'Malaysia', 'Kuala Lumpur', 'male'),
(11, 88281811861, 'lit0', 'danielyusoff081201@gmail.com', 'Dy081201', '2021-09-12 07:30:43', 'Daniel Yusoff', 'Malaysia', 'Kuala Lumpur', 'male'),
(12, 50567253012, 'fareesnazmi', 'fareesnazmi2@gmail.com', 'olive3881', '2021-09-12 17:17:37', 'FAREES NAZMI', 'Malaysia', 'SHAH ALAM', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frozen`
--
ALTER TABLE `frozen`
  ADD PRIMARY KEY (`pid`);

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
-- AUTO_INCREMENT for table `frozen`
--
ALTER TABLE `frozen`
  MODIFY `pid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
