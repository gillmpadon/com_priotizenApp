-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 08:20 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `priotizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `passcode` varchar(45) DEFAULT NULL,
  `account_type` varchar(10) DEFAULT 'User',
  `account_status` varchar(10) DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `email`, `passcode`, `account_type`, `account_status`) VALUES
(1, NULL, 'gillbertmpadon@gmail.com', 'padon', 'User', 'Pending'),
(2, 1, 'sm@gmail.com', 'padon', 'Store', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `image` varchar(200) DEFAULT 'image.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `image`) VALUES
(1, 'SM Mega Mall', 'SM@gmail.com', 'image.png'),
(2, 'Jollibee', 'Jollibee@gmail.com', 'image.png'),
(3, 'Robinsons', 'Robinsons@gmail.com', 'image.png'),
(4, 'Ayala Malls', 'Ayala@gmail.com', 'image.png'),
(5, 'Mercury Drug', 'Mercury@gmail.com', 'image.png'),
(6, 'Mang Inasal', 'Mang@gmail.com', 'image.png'),
(7, 'Puregold', 'Puregold@gmail.com', 'image.png'),
(8, 'McDonalds', 'McDonalds@gmail.com', 'image.png'),
(9, 'Gaisano Mall', 'Gaisano@gmail.com', 'image.png'),
(10, 'Watsons', 'Watsons@gmail.com', 'image.png');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `id` int(11) NOT NULL,
  `psa` varchar(200) DEFAULT NULL,
  `med` varchar(200) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `psa`, `med`, `user_id`) VALUES
(1, 'receipt1.jpg', 'receipt3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `reciept_id` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `company_id`, `reciept_id`, `status`) VALUES
(1, 1, 1, '1', 'Completed'),
(2, 1, 1, '2', 'Completed'),
(3, 3, 3, '3', 'Completed'),
(4, 4, 4, '4', 'Pending'),
(5, 5, 5, '5', 'Pending'),
(6, 6, 6, '6', 'Completed'),
(7, 7, 7, '7', 'Pending'),
(8, 8, 8, '8', 'Completed'),
(9, 9, 9, '9', 'Pending'),
(10, 10, 10, '10', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img_receipt` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `receipt_id`, `price`, `discount`, `img_receipt`, `date`, `company_id`, `user_id`) VALUES
(1, '3857320579', 100, 10, 'receipt1.jpg', '2023-10-08 09:54:20', 1, 1),
(2, '5063602705', 250, 20, 'receipt2.jpg', '2023-10-08 09:54:20', NULL, NULL),
(3, '4746052030', 80, 5, 'receipt3.jpg', '2023-10-08 09:54:20', NULL, NULL),
(4, '7539452284', 150, 12, 'receipt4.jpg', '2023-10-08 09:54:20', NULL, NULL),
(5, '6459105571', 200, 0, 'receipt5.jpg', '2023-10-08 09:54:20', NULL, NULL),
(6, '8677171253', 50, 7, 'receipt6.jpg', '2023-10-08 09:54:20', NULL, NULL),
(7, '7008539794', 300, 15, 'receipt7.jpg', '2023-10-08 09:54:20', NULL, NULL),
(8, '8011185459', 120, 8, 'receipt8.jpg', '2023-10-08 09:54:20', NULL, NULL),
(9, '2030308158', 180, 0, 'receipt9.jpg', '2023-10-08 09:54:20', NULL, NULL),
(10, '1117984660', 90, 6, 'receipt10.jpg', '2023-10-08 09:54:20', NULL, NULL),
(12, '6522909ded76a', 123, 123, 'receipt_12.png', '2023-10-08 11:21:01', 1, 12),
(13, '65229193c2dea', 123, 123, 'receipt_12.png', '2023-10-08 11:25:07', 1, 12),
(14, '6522939ba4182', 123, 11, 'receipt_123.png', '2023-10-08 11:33:47', 1, 123),
(15, '652293f182b80', 123, 11, 'receipt_123.png', '2023-10-08 11:35:13', 1, 123),
(16, '652294f2a94fb', 12, 2, 'receipt_12.png', '2023-10-08 11:39:30', 1, 12),
(17, '6522950233b65', 12, 2, 'receipt_12.png', '2023-10-08 11:39:46', 1, 12),
(18, '65229523b2aa1', 12, 2, 'receipt_12.png', '2023-10-08 11:40:19', 1, 1),
(19, '65229ffd17747', 123, 123, 'receipt_1.png', '2023-10-08 12:26:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `verified`
--

CREATE TABLE `verified` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mi` varchar(5) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `bdate` varchar(20) DEFAULT NULL,
  `status_rs` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT 'Male',
  `address` varchar(100) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `valid_id` varchar(200) DEFAULT NULL,
  `app_id` varchar(15) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `conditions` varchar(20) DEFAULT NULL,
  `nationality` varchar(45) NOT NULL DEFAULT 'Pilipino',
  `family_name` varchar(45) DEFAULT NULL,
  `family_contact` varchar(15) DEFAULT NULL,
  `brgy` varchar(45) DEFAULT 'Tiniguiban'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`id`, `fname`, `mi`, `lname`, `email`, `bdate`, `status_rs`, `gender`, `address`, `number`, `valid_id`, `app_id`, `photo`, `conditions`, `nationality`, `family_name`, `family_contact`, `brgy`) VALUES
(1, 'gillbert', '', 'padon', 'gillbertmpadon@gmail.com', '', 'single', 'male', 'Uha', '', '', '', 'unknown.jpg', 'senior citizen', 'Pilipino', '', '', 'ALIWEKWEK'),
(2, 'hillbert', '', 'padon', 'hillbertmpadon@gmail.com', '', 'single', 'male', 'Uha', '', '', '', 'unknown.jpg', 'senior citizen', 'Pilipino', '', '', 'ALIWEKWEK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verified`
--
ALTER TABLE `verified`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
