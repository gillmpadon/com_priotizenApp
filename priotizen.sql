-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 01:52 AM
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
(1, 1, 'gillbertmpadon@gmail.com', 'padon', 'User', 'Pending'),
(2, 2, 'johndoe@gmail.com', 'johndoe123', 'User', 'Active'),
(3, 3, 'janedoe@gmail.com', 'janedoe456', 'Store', 'Pending'),
(4, 4, 'michaelsmith@gmail.com', 'michaelsmith789', 'User', 'Active'),
(5, 5, 'emilybrown@gmail.com', 'emilybrown123', 'User', 'Pending'),
(6, 6, 'danielwilson@gmail.com', 'danielwilson456', 'Store', 'Active'),
(7, 7, 'elladavis@gmail.com', 'elladavis123', 'User', 'Active'),
(8, 8, 'christopherlee@gmail.com', 'christopherlee456', 'User', 'Pending'),
(9, 9, 'sarahjones@gmail.com', 'sarahjones123', 'Store', 'Active'),
(10, 10, 'matthewclark@gmail.com', 'matthewclark456', 'User', 'Active');

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
(10, 'Watsons', 'Watsons@gmail.com', 'image.png'),
(11, 'ABC Electronics', 'abcelectronics@gmail.com', 'electronics.png'),
(12, 'XYZ Furniture', 'xyzfurniture@gmail.com', 'furniture.png'),
(13, 'Green Gardens', 'greengardens@gmail.com', 'gardens.png'),
(14, 'Red Auto Parts', 'redautoparts@gmail.com', 'autoparts.png'),
(15, 'Sunrise Cafe', 'sunrisecafe@gmail.com', 'cafe.png'),
(16, 'Healthy Grocers', 'healthygrocers@gmail.com', 'grocers.png'),
(17, 'Tech Innovators', 'techinnovators@gmail.com', 'tech.png'),
(18, 'Blue Fashion', 'bluefashion@gmail.com', 'fashion.png'),
(19, 'City Pharmacy', 'citypharmacy@gmail.com', 'pharmacy.png');

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
(1, 'empty.jpg', 'empty.jpg', 1),
(2, 'john_psa.png', 'john_med.png', 2),
(3, 'jane_psa.png', 'jane_med.png', 3),
(4, 'michael_psa.png', 'michael_med.png', 4),
(5, 'emily_psa.png', 'emily_med.png', 5),
(6, 'daniel_psa.png', 'daniel_med.png', 6),
(7, 'ella_psa.png', 'ella_med.png', 7),
(8, 'christopher_psa.png', 'christopher_med.png', 8),
(9, 'sarah_psa.png', 'sarah_med.png', 9),
(10, 'matthew_psa.png', 'matthew_med.png', 10);

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
(1, 1, 1, 'receipt1000', 'Pending'),
(2, 2, 2, '12345678', 'Pending'),
(3, 3, 3, '87654321', 'Completed'),
(4, 4, 4, '98765432', 'Pending'),
(5, 5, 5, '21098765', 'Completed'),
(6, 6, 6, '34567890', 'Pending'),
(7, 7, 7, '43210987', 'Completed'),
(8, 8, 8, '56789012', 'Pending'),
(9, 9, 9, '90123456', 'Completed'),
(10, 10, 10, '65432109', 'Pending');

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
(1, 'receipt1000', 500, 250, 'empty.jpg', '2023-10-12 23:48:30', 1, 1),
(2, 'receipt1001', 50, 10, 'receipt_1001.jpg', '2023-10-12 23:50:16', 2, 2),
(3, 'receipt1002', 75, 15, 'receipt_1002.jpg', '2023-10-12 23:50:16', 3, 3),
(4, 'receipt1003', 100, 20, 'receipt_1003.jpg', '2023-10-12 23:50:16', 4, 4),
(5, 'receipt1004', 60, 12, 'receipt_1004.jpg', '2023-10-12 23:50:16', 5, 5),
(6, 'receipt1005', 80, 16, 'receipt_1005.jpg', '2023-10-12 23:50:16', 6, 6),
(7, 'receipt1006', 45, 9, 'receipt_1006.jpg', '2023-10-12 23:50:16', 7, 7),
(8, 'receipt1007', 55, 11, 'receipt_1007.jpg', '2023-10-12 23:50:16', 8, 8),
(9, 'receipt1008', 70, 14, 'receipt_1008.jpg', '2023-10-12 23:50:16', 9, 9),
(10, 'receipt1009', 90, 18, 'receipt_1009.jpg', '2023-10-12 23:50:16', 10, 10);

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
(1, 'gillbert', 'm', 'padon', 'gillbertmpadon@gmail.com', '04-19-2001', 'single', 'Male', 'Tiniguiban', '09707281718', '10000001', '10000001', 'empty.jpg', 'Disabled', 'Pilipino', 'Padon', '09066110267', 'Tiniguiban'),
(2, 'John', 'A', 'Doe', 'johndoe@gmail.com', '1985-03-15', 'Married', 'Male', '123 Main St', '555-123-4567', '123456', '7890', 'john.jpg', 'None', 'American', 'Doe', '555-987-6543', 'Exampleville'),
(3, 'Jane', 'B', 'Smith', 'janedoe@gmail.com', '1990-07-22', 'Single', 'Female', '456 Elm St', '555-789-0123', '789012', '1234', 'jane.jpg', 'Asthma', 'Canadian', 'Smith', '555-210-9876', 'Sampletown'),
(4, 'Michael', 'C', 'Johnson', 'michaelsmith@gmail.com', '1982-11-30', 'Married', 'Male', '789 Oak St', '555-345-6789', '345678', '5678', 'michael.jpg', 'Diabetes', 'Australian', 'Johnson', '555-123-4567', 'Testville'),
(5, 'Emily', 'D', 'Brown', 'emilybrown@gmail.com', '1987-05-18', 'Single', 'Female', '987 Pine St', '555-432-1098', '432109', '9012', 'emily.jpg', 'None', 'British', 'Brown', '555-234-5678', 'Trytown'),
(6, 'Daniel', 'E', 'Wilson', 'danielwilson@gmail.com', '1975-09-25', 'Married', 'Male', '234 Cedar St', '555-567-8901', '567890', '3456', 'daniel.jpg', 'Hypertension', 'Irish', 'Wilson', '555-345-6789', 'Testville'),
(7, 'Ella', 'F', 'Davis', 'elladavis@gmail.com', '1989-01-10', 'Single', 'Female', '345 Maple St', '555-432-1098', '432109', '8901', 'ella.jpg', 'Asthma', 'Scottish', 'Davis', '555-987-6543', 'Sampletown'),
(8, 'Christopher', 'G', 'Lee', 'christopherlee@gmail.com', '1978-04-05', 'Married', 'Male', '789 Oak St', '555-567-8901', '567890', '3456', 'christopher.jpg', 'Hypertension', 'Irish', 'Lee', '555-345-6789', 'Testville'),
(9, 'Sarah', 'H', 'Jones', 'sarahjones@gmail.com', '1984-10-15', 'Married', 'Female', '543 Birch St', '555-890-1234', '890123', '6789', 'sarah.jpg', 'None', 'Canadian', 'Jones', '555-987-6543', 'Exampleville'),
(10, 'Matthew', 'I', 'Clark', 'matthewclark@gmail.com', '1980-06-20', 'Single', 'Male', '678 Pine St', '555-456-7890', '456789', '8901', 'matthew.jpg', 'Diabetes', 'American', 'Clark', '555-234-5678', 'Trytown');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
