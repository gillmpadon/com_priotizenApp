-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 04:09 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30
drop database priotizen;
create database priotizen;
use priotizen;
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
  `account_status` varchar(10) DEFAULT 'Pending',
  `isfirstlogin` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `email`, `passcode`, `account_type`, `account_status`, `isfirstlogin`) VALUES
(1, '4lb8i4du698', 'gillbertmpadon@gmail.com', '123', 'user', 'Completed', 1),
(2, '4lb8i4du700', 'admin@gmail.com', 'admin', 'admin', 'Completed', 0),
(5, 'h6zgel8bc1i', 'test@gmail.com', 'test', 'user', 'Pending', 0),
(15, 'nd3bq5p45r', 'sm@gmail.com', '123123', 'company', 'Pending', 1),
(16, '49oo8unqfq7', '123', '123', 'user', 'Pending', 0),
(17, 'h35eq8qs1tq', '', '', 'user', 'Pending', 0),
(18, 'm0r8oowgqzc', '123', '123', 'user', 'Pending', 0),
(19, 'ob0x5c9fo8o', 'test', 'test', 'user', 'Pending', 0),
(20, 'hkvhms0sq85', 'tset', 'padon', 'user', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_id` varchar(45) DEFAULT NULL,
  `brgy` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `house` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`user_id`, `brgy`, `street`, `house`) VALUES
('m0r8oowgqzc', 'Aliwekwek', 'Avenida', ''),
('ob0x5c9fo8o', 'Aliwekwek', 'Avenida', '123'),
('hkvhms0sq85', 'Quibaol', 'Panfilo Lopez', 'test');

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
-- Table structure for table `applicant_med`
--

CREATE TABLE `applicant_med` (
  `user_id` varchar(45) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `ethnic` varchar(45) DEFAULT NULL,
  `language_spoken` varchar(45) DEFAULT NULL,
  `osca_id` varchar(45) DEFAULT NULL,
  `gsis` varchar(45) DEFAULT NULL,
  `tin` varchar(45) DEFAULT NULL,
  `philhealth` varchar(45) DEFAULT NULL,
  `org_id` varchar(45) DEFAULT NULL,
  `gov_id` varchar(45) DEFAULT NULL,
  `travel` varchar(45) DEFAULT NULL,
  `business` varchar(45) DEFAULT NULL,
  `pension` varchar(45) DEFAULT NULL,
  `spouse_lname` varchar(45) DEFAULT NULL,
  `spouse_fname` varchar(45) DEFAULT NULL,
  `spouse_mname` varchar(45) DEFAULT NULL,
  `spouse_ext` varchar(45) DEFAULT NULL,
  `fathers_fname` varchar(45) DEFAULT NULL,
  `fathers_lname` varchar(45) DEFAULT NULL,
  `fathers_mname` varchar(45) DEFAULT NULL,
  `fathers_ext` varchar(45) DEFAULT NULL,
  `mothers_fname` varchar(45) DEFAULT NULL,
  `mothers_lname` varchar(45) DEFAULT NULL,
  `mothers_mname` varchar(45) DEFAULT NULL,
  `mothers_ext` varchar(45) DEFAULT NULL,
  `children_name` varchar(255) DEFAULT NULL,
  `children_job` varchar(255) DEFAULT NULL,
  `children_income` varchar(255) DEFAULT NULL,
  `children_age` varchar(255) DEFAULT NULL,
  `children_isworking` varchar(55) DEFAULT NULL,
  `others_name` varchar(45) DEFAULT NULL,
  `others_job` varchar(45) DEFAULT NULL,
  `others_income` varchar(45) DEFAULT NULL,
  `others_age` varchar(45) DEFAULT NULL,
  `others_isworking` varchar(45) DEFAULT NULL,
  `education_level` varchar(45) DEFAULT NULL,
  `share_skill` varchar(255) DEFAULT NULL,
  `technical_skill` varchar(45) DEFAULT NULL,
  `community` varchar(255) DEFAULT NULL,
  `living` varchar(255) DEFAULT NULL,
  `source_income` varchar(255) DEFAULT NULL,
  `assests` varchar(100) DEFAULT NULL,
  `personal` varchar(100) DEFAULT NULL,
  `monthly_income` varchar(100) DEFAULT NULL,
  `problem` varchar(100) DEFAULT NULL,
  `health` varchar(100) DEFAULT NULL,
  `hearing` varchar(100) DEFAULT NULL,
  `emotional` varchar(100) DEFAULT NULL,
  `dental` varchar(100) DEFAULT NULL,
  `optical` varchar(100) DEFAULT NULL,
  `difficulty` varchar(100) DEFAULT NULL,
  `list_of_medicine` varchar(255) DEFAULT NULL,
  `ismaintenance` varchar(40) DEFAULT NULL,
  `ifyes_maintenance` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_psa`
--

CREATE TABLE `applicant_psa` (
  `user_id` varchar(45) DEFAULT NULL,
  `applicant` varchar(45) DEFAULT NULL,
  `date_applied` datetime DEFAULT NULL,
  `disability` varchar(45) DEFAULT NULL,
  `educational` varchar(45) DEFAULT NULL,
  `occupation` varchar(45) DEFAULT NULL,
  `employment` varchar(45) DEFAULT NULL,
  `types_emp` varchar(45) DEFAULT NULL,
  `status_emp` varchar(45) DEFAULT NULL,
  `org_affiliated` varchar(45) DEFAULT NULL,
  `org_contact` varchar(45) DEFAULT NULL,
  `org_address` varchar(45) DEFAULT NULL,
  `org_no` varchar(45) DEFAULT NULL,
  `id_sss` varchar(45) DEFAULT NULL,
  `id_gsis` varchar(45) DEFAULT NULL,
  `id_pagibig` varchar(45) DEFAULT NULL,
  `id_psn` varchar(45) DEFAULT NULL,
  `id_philhealth` varchar(45) DEFAULT NULL,
  `fathers_fname` varchar(45) DEFAULT NULL,
  `fathers_lname` varchar(45) DEFAULT NULL,
  `fathers_mname` varchar(45) DEFAULT NULL,
  `mothers_fname` varchar(45) DEFAULT NULL,
  `mothers_lname` varchar(45) DEFAULT NULL,
  `mothers_mname` varchar(45) DEFAULT NULL,
  `guardian_fname` varchar(45) DEFAULT NULL,
  `guardian_lname` varchar(45) DEFAULT NULL,
  `guardian_mname` varchar(45) DEFAULT NULL,
  `physician_fname` varchar(45) DEFAULT NULL,
  `physician_lname` varchar(45) DEFAULT NULL,
  `physician_mname` varchar(45) DEFAULT NULL,
  `pro_fname` varchar(45) DEFAULT NULL,
  `pro_lname` varchar(45) DEFAULT NULL,
  `pro_mname` varchar(45) DEFAULT NULL,
  `app_fname` varchar(45) DEFAULT NULL,
  `app_lname` varchar(45) DEFAULT NULL,
  `app_mname` varchar(45) DEFAULT NULL,
  `encoder_fname` varchar(45) DEFAULT NULL,
  `encoder_lname` varchar(45) DEFAULT NULL,
  `encoder_mname` varchar(45) DEFAULT NULL,
  `unit_name` varchar(45) DEFAULT NULL,
  `control_no` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(2, 'test_psa.png', 'test_med.png', 'h6zgel8bc1i'),
(3, 'empty.jpg', 'empty.jpg', 'h35eq8qs1tq'),
(4, 'empty.jpg', 'empty.jpg', 'm0r8oowgqzc'),
(5, 'empty.jpg', 'empty.jpg', 'ob0x5c9fo8o'),
(6, 'empty.jpg', 'empty.jpg', 'hkvhms0sq85');

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
(1, '4lb8i4du698', 'nd3bq5p45r', '652a8d8a211b0', 'Completed');

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
(1, '652a8d8a211b0', 1200, 20, 'receipt_h6zgel8bc1i.png', '2023-11-01 14:09:14', 'nd3bq5p45r', '4lb8i4du698');

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
(1, '4lb8i4du698', '4lb8i4du700', 'Edited', '2023-11-01 02:14:00'),
(4, 'h6zgel8bc1i', 'nd3bq5p45r', 'Created', '2023-10-14 11:16:47'),
(5, 'h35eq8qs1tq', '4lb8i4du700', 'Created', '2023-10-31 18:00:41'),
(6, 'm0r8oowgqzc', '4lb8i4du700', 'Created', '2023-10-31 18:06:21'),
(7, 'ob0x5c9fo8o', '4lb8i4du700', 'Created', '2023-10-31 18:15:20'),
(8, '4lb8i4du698', '4lb8i4du700', 'Edited', '2023-11-01 02:17:50'),
(9, '4lb8i4du698', '4lb8i4du700', 'Edited', '2023-11-01 02:19:23'),
(10, 'hkvhms0sq85', '4lb8i4du700', 'Created', '2023-11-01 15:02:12');

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
(7, 'test', 'test', 'test', 'test@gmail.com', '2023-10-31', 'single', 'male', 'Aliwekwek', 'test', 'test', '4lb8i4du698', 'unkown.jpg', 'senior citizen', 'Pilipino', 'test', 'test', 'Aliwekwek'),
(8, 'John', 'D', 'Doe', 'john@example.com', '1990-01-01', 'single', 'male', '123 Main St', '123-456-7890', 'ID123', 'APP001', 'john.jpg', 'none', 'Pilipino', 'Doe', '123-456-7890', 'Tiniguiban'),
(9, 'Jane', 'A', 'Smith', 'jane@example.com', '1985-05-15', 'married', 'female', '456 Elm St', '987-654-3210', 'ID456', 'APP002', 'jane.jpg', 'senior citizen', 'Pilipino', 'Smith', '987-654-3210', 'Tiniguiban'),
(10, 'Michael', 'J', 'Johnson', 'michael@example.com', '1992-11-30', 'single', 'male', '789 Oak St', '555-123-4567', 'ID789', 'APP003', 'michael.jpg', 'none', 'Pilipino', 'Johnson', '555-123-4567', 'Tiniguiban'),
(11, 'Emily', 'C', 'Brown', 'emily@example.com', '1980-09-20', 'divorced', 'female', '567 Pine St', '777-888-9999', 'ID567', 'APP004', 'emily.jpg', 'senior citizen', 'Pilipino', 'Brown', '777-888-9999', 'Tiniguiban'),
(12, 'William', 'R', 'Taylor', 'william@example.com', '1975-03-10', 'married', 'male', '890 Cedar St', '111-222-3333', 'ID890', 'APP005', 'william.jpg', 'none', 'Pilipino', 'Taylor', '111-222-3333', 'Tiniguiban'),
(13, 'Sarah', 'K', 'Wilson', 'sarah@example.com', '1988-07-25', 'single', 'female', '234 Birch St', '222-333-4444', 'ID234', 'APP006', 'sarah.jpg', 'senior citizen', 'Pilipino', 'Wilson', '222-333-4444', 'Tiniguiban'),
(14, 'David', 'M', 'Martinez', 'david@example.com', '1991-12-05', 'married', 'male', '345 Walnut St', '444-555-6666', 'ID345', 'APP007', 'david.jpg', 'none', 'Pilipino', 'Martinez', '444-555-6666', 'Tiniguiban'),
(15, 'Olivia', 'E', 'Lee', 'olivia@example.com', '1982-06-15', 'married', 'female', '678 Maple St', '333-111-9999', 'ID678', 'APP008', 'olivia.jpg', 'senior citizen', 'Pilipino', 'Lee', '333-111-9999', 'Tiniguiban'),
(16, 'James', 'W', 'Garcia', 'james@example.com', '1987-08-10', 'single', 'male', '456 Redwood St', '666-999-7777', 'ID456', 'APP009', 'james.jpg', 'none', 'Pilipino', 'Garcia', '666-999-7777', 'Tiniguiban'),
(17, 'Sophia', 'L', 'Anderson', 'sophia@example.com', '1995-04-02', 'single', 'female', '890 Oakwood St', '555-777-8888', 'ID890', 'APP010', 'sophia.jpg', 'senior citizen', 'Pilipino', 'Anderson', '555-777-8888', 'Tiniguiban'),
(18, 'gillbert', 'test', 'padon', 'tset', '', 'single', 'male', 'Quibaol', 'test', 'test', 'hkvhms0sq85', 'unkown.jpg', 'senior citizen', 'Pilipino', 'test', 'test', 'Quibaol');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
