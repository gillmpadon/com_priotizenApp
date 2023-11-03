-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 04:51 PM
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
  `account_status` varchar(10) DEFAULT 'Pending',
  `isfirstlogin` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `email`, `passcode`, `account_type`, `account_status`, `isfirstlogin`) VALUES
(1, '4lb8i4du69s', 'gillbertmpadon@gmail.com', '123', 'user', 'Completed', 1),
(2, '4lb8i4du700', 'admin@gmail.com', 'admin', 'admin', 'Completed', 0),
(5, '4lb8i4du698', 'test@gmail.com', 'test', 'user', 'Pending', 0),
(15, 'nd3bq5p45r', 'sm@gmail.com', '123123', 'company', 'Pending', 1),
(16, '49oo8unqfq7', '123', '123', 'user', 'Pending', 0),
(17, 'h35eq8qs1tq', '', '', 'user', 'Pending', 0),
(18, 'm0r8oowgqzc', '123', '123', 'user', 'Pending', 0),
(19, 'ob0x5c9fo8o', 'test', 'test', 'user', 'Pending', 0),
(20, 'hkvhms0sq85', 'tset', 'padon', 'user', 'Pending', 0),
(21, 'ptushpr1n2', 'test2', 'test2', 'user', 'Pending', 0);

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
(1, 'm0r8oowgqzc', 'Aliwekwek', 'Avenida', ''),
(2, 'ob0x5c9fo8o', 'Aliwekwek', 'Avenida', '123'),
(3, 'hkvhms0sq85', 'Quibaol', 'Panfilo Lopez', 'test'),
(4, 'm0r8oowgqzc', 'Aliwekwek', 'Avenida', ''),
(5, 'ob0x5c9fo8o', 'Aliwekwek', 'Avenida', '123'),
(6, '4lb8i4du698', 'Quibaol', 'Panfilo Lopez', 'test'),
(7, 'ptushpr1n2', 'Aliwekwek', 'Avenida', '12');

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
(2, 'test_psa.png', 'test_med.png', 'h6zgel8bc1i'),
(3, 'empty.jpg', 'empty.jpg', 'h35eq8qs1tq'),
(4, 'empty.jpg', 'empty.jpg', 'm0r8oowgqzc'),
(5, 'empty.jpg', 'empty.jpg', 'ob0x5c9fo8o'),
(6, 'empty.jpg', 'empty.jpg', 'hkvhms0sq85'),
(7, 'empty.jpg', 'empty.jpg', 'ptushpr1n2');

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
(8, '4lb8i4du698', '{\"lname\":\"test\",\"fname\":\"hehe\",\"mname\":\"test\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Aliwekwek\",\"birth00\":\"10\",\"birth01\":\"0\",\"birth10\":\"31\",\"birth11\":\"1\",\"birth20\":\"23\",\"birth22\":\"3\",\"birth_place\":\"off\",\"status\":\"single\",\"sex\":\"male\",\"contact\":\"test\",\"email\":\"test@gmail.com\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"gin\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"off\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"off\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"off\",\"e6\":\"off\",\"e7\":\"on\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"off\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"off\",\"t5\":\"off\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"off\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"on\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"on\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"on\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"on\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"on\",\"isMedno\":\"off\"}', '4lb8i4du698_sign.png'),
(18, 'ptushpr1n2', '{\"new\":false,\"old\":false,\"valid_id\":\"\",\"date\":\"\",\"lname\":\"test2\",\"fname\":\"test2\",\"mi\":\"test2\",\"suffix\":\"\",\"bdate\":false,\"male\":false,\"female\":false,\"single\":false,\"separated\":false,\"cohabitation\":false,\"married\":false,\"widow\":false,\"deaf\":false,\"intellectual\":false,\"learning\":false,\"mental\":false,\"physical\":false,\"pyschosocial\":false,\"speech\":false,\"visual\":false,\"cancer\":false,\"rare\":false,\"congenital\":false,\"adhd\":false,\"cerebral\":false,\"palsy\":false,\"down\":false,\"cause_others_1\":false,\"cause_others_1_input\":\"\",\"acquired\":false,\"chronic\":false,\"injury\":false,\"cause_others_2\":false,\"cause_others_2_input\":\"\",\"house\":\"12\",\"brgy\":\"Aliwekwek \",\"municipality\":\"Lingayen\",\"province\":\"Pangasinan\",\"region\":\"Region 1\",\"landline\":\"\",\"number\":\"test2\",\"email\":\"test2\",\"none\":false,\"kindergarten\":false,\"elementary\":false,\"junior\":false,\"senior\":false,\"college\":false,\"vocational\":false,\"graduate\":true,\"managers\":false,\"professional\":false,\"technicians\":false,\"clerical\":false,\"service\":false,\"agricultural\":false,\"trade\":false,\"machine\":false,\"occupation\":false,\"forces\":false,\"job_others\":false,\"employed\":false,\"unemployed\":false,\"selfemployed\":true,\"regular\":true,\"seasonal\":false,\"casual\":false,\"emergency\":false,\"government\":false,\"private\":true,\"organization\":\"\",\"contact\":\"\",\"office\":\"\",\"tel\":\"\",\"sss\":\"\",\"gsis\":\"\",\"pagibig\":\"\",\"psn\":\"\",\"philhealth\":\"\",\"fathers_lname\":\"\",\"fathers_fname\":\"\",\"fathers_mname\":\"\",\"mothers_lname\":\"\",\"mothers_fname\":\"\",\"mothers_mname\":\"\",\"guardian_lname\":\"sdf\",\"guardian_fname\":\"\",\"guardian_mname\":\"\",\"radio_applicant\":false,\"radio_guardian\":true,\"radio_representative\":false,\"aoplicant_lname\":\"\",\"aoplicant_fname\":\"\",\"aoplicant_mname\":\"\",\"representative_lname\":\"\",\"representative_fname\":\"\",\"representative_mname\":\"\",\"\":\"\",\"license_lname\":\"\",\"license_fname\":\"\",\"license_mname\":\"\",\"officer_lname\":\"\",\"officer_fname\":\"\",\"officer_mname\":\"\",\"approving_lname\":\"\",\"approving_fname\":\"\",\"approving_mname\":\"\",\"encoder_lname\":\"\",\"encoder_fname\":\"\",\"encoder_mname\":\"\",\"reporting_unit\":\"\",\"control_number\":\"\",\"fullname\":\"sdfsd\",\"full_address\":\"fsdfdsf\",\"full_province\":\"\",\"full_region\":\"\",\"full_disease\":\"\",\"another_disease\":\"\",\"type_disability\":\"\",\"issue_date\":\"\",\"requirement\":\"\"}', NULL);

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
(10, 'hkvhms0sq85', '4lb8i4du700', 'Created', '2023-11-01 15:02:12'),
(11, 'ptushpr1n2', '4lb8i4du700', 'Created', '2023-11-03 10:52:18');

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
(18, 'gillbert', 'test', 'padon', 'tset', '', 'single', 'male', 'Quibaol', 'test', 'test', 'hkvhms0sq85', 'unkown.jpg', 'senior citizen', 'Pilipino', 'test', 'test', 'Quibaol'),
(19, 'test2', 'test2', 'test2', 'test2', '', 'single', 'male', 'Aliwekwek', 'test2', 'test2', 'ptushpr1n2', 'test2_dp.png', 'senior citizen', 'Pilipino', 'test2', 'test2', 'Aliwekwek');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
