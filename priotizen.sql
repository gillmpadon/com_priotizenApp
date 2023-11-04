-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 01:50 PM
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
  `account_type` varchar(10) DEFAULT 'user',
  `account_status` varchar(10) DEFAULT 'Pending',
  `isfirstlogin` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `email`, `passcode`, `account_type`, `account_status`, `isfirstlogin`) VALUES
(1, '12345', '12345@gmail.com', '12345', 'admin', 'Pending', 0),
(3, '7rta1hhg6kw', 'garielle@gmail.com', 'mark', 'company', 'Pending', 1),
(4, 'wwcc8byo39b', 'gin@gmail.com', '123123', 'admin', 'Pending', 0),
(5, 'ro7sbk5k52', '123', 'gingin', 'user', 'Verified', 1);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `brgy` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `house` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `brgy`, `street`, `house`) VALUES
(1, '4lb8i4du69s', 'Aliwekwek', 'Avenida', ''),
(2, 'ob0x5c9fo8o', 'Aliwekwek', 'Avenida', '123'),
(3, 'hkvhms0sq85', 'Quibaol', 'Panfilo Lopez', 'test'),
(4, 'm0r8oowgqzc', 'Aliwekwek', 'Avenida', ''),
(5, 'ob0x5c9fo8o', 'Aliwekwek', 'Avenida', '123'),
(6, '4lb8i4du698', 'Quibaol', 'Panfilo Lopez', 'test'),
(7, 'ptushpr1n2', 'Aliwekwek', 'Avenida', '12'),
(8, 'jaco6xnkpd8', 'Aliwekwek', 'Avenida', ''),
(9, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(10, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(11, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(12, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(13, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(14, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(15, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(16, 'rdcvf14z8j', 'Aliwekwek', 'Avenida', ''),
(17, '50448f64jo4', 'Aliwekwek', 'Avenida', ''),
(18, '50448f64jo4', 'Aliwekwek', 'Avenida', ''),
(19, '50448f64jo4', 'Aliwekwek', 'Avenida', '123123'),
(20, '50448f64jo4', 'Aliwekwek', 'Avenida', '123123'),
(21, 'ro7sbk5k52', 'Aliwekwek', 'Avenida', '123');

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
(1, 'Gin', '12345@gmail.com', 'image.png', '1234567910', '12345'),
(2, 'gin', 'gin@gmail.com', 'gin.png', '123123', 'wwcc8byo39b');

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
(6, 'SM MEGA', 'sm@gmail.com', 'SM MEGA.jpg', '12345', 'nd3bq5p45r'),
(7, 'mark', 'gin@gmail.com', 'unkown.jpg', '00005556454654', 'qtv17wtld6'),
(9, 'Garielle', 'garielle@gmail.com', 'Garielle.png', '123456789', '7rta1hhg6kw');

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
(1, 'empty.jpg', 'empty.jpg', 'ro7sbk5k52');

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
(1, '4lb8i4du698', 'nd3bq5p45r', '652a8d8a211b0', 'Completed'),
(2, 'ro7sbk5k52', '7rta1hhg6kw', '654626d35f6fa', 'Completed');

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
(1, '654626d35f6fa', 1000, 50, 'receipt_ro7sbk5k52.png', '2023-11-04 11:11:15', '7rta1hhg6kw', 'ro7sbk5k52');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `all_data` text,
  `signature` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `user_id`, `all_data`, `signature`) VALUES
(1, 'ro7sbk5k52', '{\"lname\":\"test\",\"fname\":\"test gin\",\"mname\":\"test\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Aliwekwek\",\"birth00\":\"11\",\"birth01\":\"1\",\"birth10\":\"04\",\"birth11\":\"4\",\"birth20\":\"23\",\"birth22\":\"3\",\"birth_place\":\"off\",\"status\":\"single\",\"sex\":\"male\",\"contact\":\"test\",\"email\":\"123\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"off\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"herhehehe\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"on\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"off\",\"e6\":\"off\",\"e7\":\"off\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"on\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"off\",\"t5\":\"on\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"on\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"off\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"off\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"off\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"off\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"off\",\"isMedno\":\"off\"}', 'unknown.jpg');

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
(1, 'ro7sbk5k52', '4lb8i4du700', 'Created', '2023-11-03 17:16:54'),
(2, 'ro7sbk5k52', '4lb8i4du700', 'Edited', '2023-11-03 17:17:43'),
(3, 'ro7sbk5k52', 'wwcc8byo39b', 'Edited', '2023-11-04 11:49:17'),
(4, 'ro7sbk5k52', 'wwcc8byo39b', 'Edited', '2023-11-04 11:50:41'),
(5, 'ro7sbk5k52', 'wwcc8byo39b', 'Edited', '2023-11-04 12:11:22'),
(6, 'ro7sbk5k52', 'wwcc8byo39b', 'Edited', '2023-11-04 12:12:39');

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
  `nationality` varchar(45) NOT NULL DEFAULT 'Filipino',
  `family_name` varchar(45) DEFAULT NULL,
  `family_contact` varchar(15) DEFAULT NULL,
  `brgy` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`id`, `fname`, `mi`, `lname`, `email`, `bdate`, `status_rs`, `gender`, `address`, `number`, `valid_id`, `app_id`, `photo`, `conditions`, `nationality`, `family_name`, `family_contact`, `brgy`) VALUES
(1, 'test gin', 'test', 'test', '123', '2001-11-04', 'single', 'male', 'Aliwekwek', 'test', '123', 'ro7sbk5k52', 'test_dp.png', 'pwd', 'Filipino', '123', '123', 'Aliwekwek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
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
-- Indexes for table `test`
--
ALTER TABLE `test`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
