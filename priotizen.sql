-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 01:50 PM
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
  `account_id` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `passcode` varchar(45) DEFAULT NULL,
  `account_type` varchar(10) DEFAULT 'User',
  `account_status` varchar(10) DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `email`, `passcode`, `account_type`, `account_status`) VALUES
(1, '4lb8i4du698', 'gillbertmpadon@gmail.com', 'padon', 'user', 'Completed'),
(2, '4lb8i4du700', 'admin@gmail.com', 'admin', 'admin', 'Completed'),
(5, 'h6zgel8bc1i', 'test@gmail.com', 'test', 'user', 'Pending'),
(15, 'nd3bq5p45r', 'sm@gmail.com', '12345', 'company', 'Pending'),
(16, '49oo8unqfq7', '123', '123', 'user', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `image` varchar(200) DEFAULT 'image.png',
  `number` varchar(20) DEFAULT '1234567910',
  `admin_id` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `image`, `number`, `admin_id`) VALUES
(1, 'gin', 'admin@gmail.com', 'image.png', '1234567910', '4lb8i4du700'),
(2, '123', '123', '123.jpg', '123', '49oo8unqfq7');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `image` varchar(200) DEFAULT 'image.png',
  `number` varchar(20) DEFAULT '1234567910',
  `store_id` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `image`, `number`, `store_id`) VALUES
(6, 'SM MEGA', 'sm@gmail.com', 'SM MEGA.jpg', '12345', 'nd3bq5p45r');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `id` int(11) NOT NULL,
  `psa` varchar(150) DEFAULT 'empty.jpg',
  `med` varchar(150) DEFAULT 'empty.jpg',
  `user_id` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id`, `psa`, `med`, `user_id`) VALUES
(1, 'empty.jpg', 'empty.jpg', '4lb8i4du698'),
(2, 'test_psa.png', 'test_med.png', 'h6zgel8bc1i');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `company_id` varchar(45) DEFAULT NULL,
  `reciept_id` varchar(20) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `company_id`, `reciept_id`, `status`) VALUES
(1, 'h6zgel8bc1i', 'nd3bq5p45r', '652a8d8a211b0', 'Completed');

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
  `company_id` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `receipt_id`, `price`, `discount`, `img_receipt`, `date`, `company_id`, `user_id`) VALUES
(1, '652a8d8a211b0', 1200, 20, 'receipt_h6zgel8bc1i.png', '2023-10-14 12:46:02', 'nd3bq5p45r', 'h6zgel8bc1i');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `admin_id` varchar(45) DEFAULT NULL,
  `action` varchar(10) NOT NULL DEFAULT 'Created',
  `time_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`id`, `user_id`, `admin_id`, `action`, `time_edited`) VALUES
(1, '4lb8i4du698', '4lb8i4du700', 'Edited', '2023-10-14 08:52:19'),
(4, 'h6zgel8bc1i', '4lb8i4du700', 'Created', '2023-10-14 11:16:47');

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
(1, 'Kyoya', 'm', 'padon', 'gillbertmpadon@gmail.com', '01-20-2001', 'single', 'male', 'Uha', '09707281718', '123', '4lb8i4du698', 'gin_dp.png', 'disabled', 'Pilipino', 'padon', '09066110267', 'ALIWEKWEK'),
(4, 'test', 'test', 'test', 'test@gmail.com', '2010-01-01', 'single', 'male', 'Uha', '123', '123', 'h6zgel8bc1i', 'test_dp.png', 'senior citizen', 'Pilipino', 'padon', '123', 'ALIWEKWEK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
