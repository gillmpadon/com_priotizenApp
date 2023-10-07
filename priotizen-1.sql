-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 03:53 PM
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
  `passcode` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `email`, `passcode`) VALUES
(13, 1, 'juandelacruz1@gmail.com', 'juan'),
(2, 2, 'mariasantos2@gmail.com', 'password2'),
(3, 3, 'pedroreyes3@gmail.com', 'password3'),
(4, 4, 'johndsmith4@gmail.com', 'password4'),
(5, 5, 'annajohnson5@gmail.com', 'password5'),
(6, 6, 'robertlee6@gmail.com', 'password6'),
(7, 7, 'lindabrown7@gmail.com', 'password7'),
(8, 8, 'michaelmiller8@gmail.com', 'password8'),
(9, 9, 'sarahtaylor9@gmail.com', 'password9'),
(10, 10, 'davidanderson10@gmail.com', 'password10');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`) VALUES
(1, 'SM Mega Mall'),
(2, 'Jollibee'),
(3, 'Robinsons'),
(4, 'Ayala Malls'),
(5, 'Mercury Drug'),
(6, 'Mang Inasal'),
(7, 'Puregold'),
(8, 'McDonalds'),
(9, 'Gaisano Mall'),
(10, 'Watsons');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `reciept_id` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `company_id`, `reciept_id`, `status`) VALUES
(1, 1, 1, 1, 'Completed'),
(2, 2, 2, 2, 'Pending'),
(3, 3, 3, 3, 'Completed'),
(4, 4, 4, 4, 'Pending'),
(5, 5, 5, 5, 'Pending'),
(6, 6, 6, 6, 'Completed'),
(7, 7, 7, 7, 'Pending'),
(8, 8, 8, 8, 'Completed'),
(9, 9, 9, 9, 'Pending'),
(10, 10, 10, 10, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `receipt_id` bigint(15) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `img_receipt` varchar(200) NOT NULL,
  `img_product` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `receipt_id`, `price`, `discount`, `img_receipt`, `img_product`, `date`) VALUES
(1, 3857320579, 100, 10, 'receipt1.jpg', 'product1.jpg', '2023-06-14 12:31:11'),
(2, 5063602705, 250, 20, 'receipt2.jpg', 'product2.jpg', '2023-06-13 02:31:11'),
(3, 4746052030, 80, 5, 'receipt3.jpg', 'product3.jpg', '2023-06-13 12:31:11'),
(4, 7539452284, 150, 12, 'receipt4.jpg', 'product4.jpg', '2023-06-13 12:31:11'),
(5, 6459105571, 200, 0, 'receipt5.jpg', 'product5.jpg', '2023-06-13 12:31:11'),
(6, 8677171253, 50, 7, 'receipt6.jpg', 'product6.jpg', '2023-06-13 12:31:11'),
(7, 7008539794, 300, 15, 'receipt7.jpg', 'product7.jpg', '2023-06-13 12:31:11'),
(8, 8011185459, 120, 8, 'receipt8.jpg', 'product8.jpg', '2023-06-13 12:31:11'),
(9, 2030308158, 180, 0, 'receipt9.jpg', 'product9.jpg', '2023-06-13 12:31:11'),
(10, 1117984660, 90, 6, 'receipt10.jpg', 'product10.jpg', '2023-06-14 12:31:11');

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
  `bdate` date DEFAULT NULL,
  `status_rs` varchar(20) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `number` bigint(15) DEFAULT NULL,
  `valid_id` varchar(200) NOT NULL,
  `app_id` int(12) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `conditions` varchar(20) DEFAULT NULL,
  `nationality` varchar(45) NOT NULL DEFAULT 'Pilipino',
  `family_name` varchar(45) NOT NULL,
  `family_contact` bigint(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verified`
--

INSERT INTO `verified` (`id`, `fname`, `mi`, `lname`, `email`, `bdate`, `status_rs`, `gender`, `address`, `number`, `valid_id`, `app_id`, `photo`, `conditions`, `nationality`, `family_name`, `family_contact`) VALUES
(1, 'Juan', 'A', 'Dela Cruz', 'juandelacruz1@gmail.com', '1940-05-22', 'widowed', 'Male', '123 Manila St, Manila, Philippines', 9123456781, '1940-7127-0197', 988334622, 'juan.png', 'senior citizen', 'Pilipino', 'Dela Cruz', 9123456782),
(2, 'Maria', 'B', 'Santos', 'mariasantos2@gmail.com', '1938-11-30', 'married', 'Female', '456 Cebu Ave, Cebu City, Philippines', 9123456783, '1938-9606-7437', 491939467, 'maria.png', 'senior citizen', 'Pilipino', 'Santos', 9123456784),
(3, 'Pedro', 'C', 'Reyes', 'pedroreyes3@gmail.com', '1985-02-15', 'single', 'Male', '789 Davao Rd, Davao City, Philippines', 9123456785, '1985-8369-9535', 294693498, 'pedro.png', 'disabled', 'Pilipino', 'Reyes', 9123456786),
(4, 'John', 'D', 'Smith', 'johndsmith4@gmail.com', '1990-09-12', 'single', 'Male', '246 New York St, New York, USA', 9123456787, '1990-2570-4244', 797649117, 'john.png', 'disabled', 'Pilipino', 'Smith', 9123456788),
(5, 'Anna', 'E', 'Johnson', 'annajohnson5@gmail.com', '1988-07-25', 'married', 'Female', '789 London Ave, London, UK', 9123456789, '1988-3509-4815', 304165120, 'anna.png', 'senior citizen', 'Pilipino', 'Johnson', 9123456790),
(6, 'Robert', 'F', 'Lee', 'robertlee6@gmail.com', '1975-03-10', 'divorced', 'Male', '321 Sydney St, Sydney, Australia', 9123456791, '1975-3550-3305', 827878276, 'robert.png', 'disabled', 'Pilipino', 'Lee', 9123456792),
(7, 'Linda', 'G', 'Brown', 'lindabrown7@gmail.com', '1955-12-18', 'widowed', 'Female', '654 Paris Ave, Paris, France', 9123456793, '1955-5877-9468', 426896047, 'linda.png', 'senior citizen', 'Pilipino', 'Brown', 9123456794),
(8, 'Michael', 'H', 'Miller', 'michaelmiller8@gmail.com', '1982-04-05', 'married', 'Male', '987 Berlin St, Berlin, Germany', 9123456795, '1982-9708-0139', 450845438, 'michael.png', 'disabled', 'Pilipino', 'Miller', 9123456796),
(9, 'Sarah', 'I', 'Taylor', 'sarahtaylor9@gmail.com', '1995-01-29', 'single', 'Female', '741 Tokyo Ave, Tokyo, Japan', 9123456797, '1995-1572-7441', 873539076, 'sarah.png', 'disabled', 'Pilipino', 'Taylor', 9123456798),
(10, 'David', 'J', 'Anderson', 'davidanderson10@gmail.com', '1998-06-07', 'single', 'Male', '369 Rome St, Rome, Italy', 9123456799, '1998-2490-0130', 215159096, 'david.png', 'disabled', 'Pilipino', 'Anderson', 9123456800);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
