-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 12:20 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30
create database priotizen;
use priotizen;

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
(1, '5er4wfw9ok', 'Admin_lgu1@gmail.com', 'admin', 'Admin', 'Pending', 0),
(2, '73ad5qri84q', 'juandelacruz@gmail.com', 'delacruz', 'user', 'Verified', 1),
(3, '5j64080mdqg', 'christian@gmail.com', 'reyes', 'user', 'Pending', 1),
(4, 'i2tejdgjy4d', 'streetwear@gmail.com', 'padon', 'company', 'Pending', 1),
(5, 'xbw8cw0n9qi', 'alma@gmail.com', 'Ramos', 'user', 'Verified', 1),
(6, '3ekhuyjowhh', 'organic@gmail.com', 'organic', 'company', 'Pending', 1),
(7, '2gl1hip5cvn', 'juan@gmail.com', 'Santos', 'user', 'Pending', 1),
(8, 'pymfeew8vy', 'Admin_lgu2@gmail.com', 'admin2', 'admin', 'Pending', 0),
(9, 'g8xl7x8ymzg', 'mario@gmail.com', 'Lim', 'user', 'Pending', 1),
(10, 'nxqf64vfnek', 'christian@gmail.com', 'Abarquez', 'user', 'Pending', 0),
(11, 'ax49l5yjxag', 'ss@gmail.com', 'stopshop', 'company', 'Pending', 1);

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
(1, '73ad5qri84q', 'Aliwekwek', 'None', '12'),
(2, '5j64080mdqg', 'Aliwekwek', 'Avenida', '13'),
(3, 'xbw8cw0n9qi', 'Baay', 'None', '21'),
(4, '2gl1hip5cvn', 'Capandanan', 'None', '89'),
(5, 'g8xl7x8ymzg', 'Estanza', 'None', '34'),
(6, 'nxqf64vfnek', 'Dorongan', 'None', '65'),
(7, '73ad5qri84q', '[object HTMLSelectElement]', '[object HTMLSelectElement]', '[object HTMLInputElement]');

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
(1, 'Jordan F. Estrada', 'Admin_lgu1@gmail.com', 'default.png', '09123456788', '5er4wfw9ok'),
(2, 'Erika A. Vergara', 'Admin_lgu2@gmail.com', 'default.png', '0988776655', 'pymfeew8vy');

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
  `store_id` varchar(45) DEFAULT NULL,
  `address` varchar(20) NOT NULL DEFAULT 'Lingayen'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `email`, `image`, `number`, `store_id`, `address`) VALUES
(1, 'Street Wear Urban', 'streetwear@gmail.com', 'default.png', '09876543210', 'i2tejdgjy4d', 'Lingayen'),
(2, 'Organic Shop', 'organic@gmail.com', 'default.png', '09998887766', '3ekhuyjowhh', 'Lingayen'),
(3, 'Stop & Shop', 'ss@gmail.com', 'default.png', '09113355778', 'ax49l5yjxag', 'Lingayen');

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
(1, 'empty.jpg', 'empty.jpg', '73ad5qri84q'),
(2, 'empty.jpg', 'empty.jpg', '5j64080mdqg'),
(3, 'empty.jpg', 'empty.jpg', 'xbw8cw0n9qi'),
(4, 'empty.jpg', 'empty.jpg', '2gl1hip5cvn'),
(5, 'empty.jpg', 'empty.jpg', 'g8xl7x8ymzg'),
(6, 'empty.jpg', 'empty.jpg', 'nxqf64vfnek');

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
(1, 'xbw8cw0n9qi', '3ekhuyjowhh', '6548fa5d3ab23', 'Completed'),
(2, 'xbw8cw0n9qi', '3ekhuyjowhh', '6548fa5d3ab23', 'Completed'),
(4, 'xbw8cw0n9qi', '3ekhuyjowhh', '65491b92eade3', 'Completed'),
(7, 'xbw8cw0n9qi', '3ekhuyjowhh', '65491cff399eb', 'Completed'),
(8, 'xbw8cw0n9qi', '3ekhuyjowhh', '65491ff875f5e', 'Completed'),
(9, 'xbw8cw0n9qi', '3ekhuyjowhh', '6548fa5d3ab23', 'Completed'),
(10, 'xbw8cw0n9qi', '3ekhuyjowhh', '6549262700cd1', 'Completed'),
(11, 'xbw8cw0n9qi', '3ekhuyjowhh', '654928ba8b8c2', 'Completed'),
(12, 'xbw8cw0n9qi', '3ekhuyjowhh', '6549294d9282c', 'Completed'),
(13, 'xbw8cw0n9qi', '3ekhuyjowhh', '654929e358bbc', 'Pending');

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
(1, '6548fa5d3ab23', 200, 12, 'receipt_5j64080mdqg.jpg', '2023-11-06 14:38:21', 'i2tejdgjy4d', '3ekhuyjowhh'),
(2, '6548fb33134d0', 500, 12, 'receipt_5j64080mdqg.jpg', '2023-11-06 14:41:55', '3ekhuyjowhh', '3ekhuyjowhh'),
(3, '654900ecac3df', 600, 12, 'receipt_5j64080mdqg.jpg', '2023-11-06 15:06:20', 'ax49l5yjxag', '3ekhuyjowhh'),
(4, '65491b92eade3', 1000, 12, 'receipt_73ad5qri84q.jpg', '2023-11-06 17:00:02', '3ekhuyjowhh', '3ekhuyjowhh'),
(5, '65491bff6ccba', 600, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-11-06 17:01:51', 'null', '3ekhuyjowhh'),
(6, '65491ca484ec0', 400, 12, 'receipt_2gl1hip5cvn.jpg', '2023-11-06 17:04:36', 'null', '3ekhuyjowhh'),
(7, '65491cff399eb', 1200, 12, 'receipt_2gl1hip5cvn.jpg', '2023-11-06 17:06:07', '3ekhuyjowhh', '3ekhuyjowhh'),
(8, '65491ff875f5e', 560, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-11-06 17:18:48', 'ax49l5yjxag', '3ekhuyjowhh'),
(9, '6549234da09c8', 800, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-11-06 17:33:01', 'ax49l5yjxag', 'xbw8cw0n9qi'),
(10, '6549262700cd1', 800, 12, 'receipt_g8xl7x8ymzg.jpg', '2023-11-06 17:45:11', 'i2tejdgjy4d', 'g8xl7x8ymzg'),
(11, '654928ba8b8c2', 900, 12, 'receipt_g8xl7x8ymzg.jpg', '2023-11-06 17:56:10', '3ekhuyjowhh', 'g8xl7x8ymzg'),
(12, '6549294d9282c', 560, 12, 'receipt_2gl1hip5cvn.jpg', '2023-11-06 17:58:37', 'ax49l5yjxag', '2gl1hip5cvn'),
(13, '654929e358bbc', 900, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-11-06 18:01:07', 'ax49l5yjxag', 'xbw8cw0n9qi');

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
(1, '73ad5qri84q', '{\"lname\":\"Dela Cruz\",\"fname\":\"Juan \",\"mname\":\"A\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Aliwekwek\",\"birth00\":\"01\",\"birth01\":\"1\",\"birth10\":\"15\",\"birth11\":\"5\",\"birth20\":\"55\",\"birth22\":\"5\",\"birth_place\":\"off\",\"status\":\"single\",\"sex\":\"male\",\"contact\":\"09012345678\",\"email\":\"juandelacruz@gmail.com\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"Juan A. Dela Cruz\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"off\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"off\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"on\",\"e6\":\"off\",\"e7\":\"off\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"off\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"on\",\"t5\":\"off\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"off\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"off\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"off\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"off\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"off\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"off\",\"isMedno\":\"off\"}', 'unknown.jpg'),
(2, '5j64080mdqg', '{\"lname\":\"Reyes\",\"fname\":\"Christian\",\"mname\":\"B\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Aliwekwek\",\"birth00\":\"03\",\"birth01\":\"3\",\"birth10\":\"10\",\"birth11\":\"0\",\"birth20\":\"51\",\"birth22\":\"1\",\"birth_place\":\"off\",\"status\":\"married\",\"sex\":\"male\",\"contact\":\"09513314673\",\"email\":\"christian@gmail.com\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"Christian B. Reyes\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"off\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"off\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"off\",\"e6\":\"off\",\"e7\":\"off\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"off\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"off\",\"t5\":\"off\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"off\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"off\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"off\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"off\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"off\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"off\",\"isMedno\":\"off\"}', 'unknown.jpg'),
(3, '2gl1hip5cvn', '{\"lname\":\"Santos\",\"fname\":\"Juan\",\"mname\":\"C.\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Capandanan\",\"birth00\":\"11\",\"birth01\":\"1\",\"birth10\":\"05\",\"birth11\":\"5\",\"birth20\":\"65\",\"birth22\":\"5\",\"birth_place\":\"off\",\"status\":\"married\",\"sex\":\"male\",\"contact\":\"09112233445\",\"email\":\"juan@gmail.com\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"Juan C. Santos\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"off\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"off\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"off\",\"e6\":\"off\",\"e7\":\"off\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"off\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"off\",\"t5\":\"off\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"off\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"off\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"off\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"off\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"off\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"off\",\"isMedno\":\"off\"}', 'unknown.jpg'),
(4, 'nxqf64vfnek', '{\"lname\":\"Abarquez\",\"fname\":\"Christian\",\"mname\":\"F.\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Dorongan\",\"birth00\":\"02\",\"birth01\":\"2\",\"birth10\":\"17\",\"birth11\":\"7\",\"birth20\":\"45\",\"birth22\":\"5\",\"birth_place\":\"off\",\"status\":\"married\",\"sex\":\"male\",\"contact\":\"09224466881\",\"email\":\"christian@gmail.com\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"Christian F. Abarquez\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"off\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"off\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"off\",\"e6\":\"off\",\"e7\":\"off\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"off\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"off\",\"t5\":\"off\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"off\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"off\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"off\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"off\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"off\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"off\",\"isMedno\":\"off\"}', 'unknown.jpg');

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
(1, '73ad5qri84q', '5er4wfw9ok', 'Created', '2023-11-06 13:17:29'),
(2, '5j64080mdqg', '5er4wfw9ok', 'Created', '2023-11-06 13:22:14'),
(3, 'xbw8cw0n9qi', '5er4wfw9ok', 'Created', '2023-11-06 13:51:23'),
(4, '2gl1hip5cvn', '5er4wfw9ok', 'Created', '2023-11-06 13:55:39'),
(5, 'g8xl7x8ymzg', '5er4wfw9ok', 'Created', '2023-11-06 14:04:21'),
(6, 'nxqf64vfnek', '5er4wfw9ok', 'Created', '2023-11-06 14:07:07'),
(7, 'xbw8cw0n9qi', '5er4wfw9ok', 'Edited', '2023-11-06 17:18:01'),
(8, '73ad5qri84q', '5er4wfw9ok', 'Edited', '2023-11-06 18:04:56'),
(9, '73ad5qri84q', '5er4wfw9ok', 'Edited', '2023-11-07 17:29:01'),
(10, '73ad5qri84q', '5er4wfw9ok', 'Edited', '2023-11-07 17:32:57');

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
(1, 'Juan', 'A', 'Dela Cruz', 'juandelacruz@gmail.com', '1955-01-15', 'single', 'male', '[object HTMLSelectElement]', '09012345678', '18315', '73ad5qri84q', 'default.png', 'senior citizen', 'Filipino', 'Dela Cruz', '09012345670', 'Aliwekwek'),
(2, 'Christian', 'B', 'Reyes', 'christian@gmail.com', '1951-03-10', 'married', 'male', 'Aliwekwek', '09513314673', '67481', '5j64080mdqg', 'default.png', 'senior citizen', 'Filipino', 'Reyes', '09513314670', 'Aliwekwek'),
(3, 'Alma', 'J.', 'Ramos', 'alma@gmail.com', '', 'single', 'female', 'Baay', '09998765432', 'PWD001', 'xbw8cw0n9qi', 'default.png', 'pwd', 'Filipino', 'Ramos', '09998765430', 'Baay'),
(4, 'Juan', 'C.', 'Santos', 'juan@gmail.com', '1965-11-05', 'married', 'male', 'Capandanan', '09112233445', 'PWD002', '2gl1hip5cvn', 'default.png', 'pwd', 'Filipino', 'Santos', '09112233440', 'Capandanan'),
(5, 'Mario', 'G. ', 'Lim', 'mario@gmail.com', '1990-06-12', 'single', 'male', 'Estanza', '09556633778', 'Pwd003', 'g8xl7x8ymzg', 'default.png', 'pwd', 'Filipino', 'Lim', '09556633770', 'Estanza'),
(6, 'Christian', 'F.', 'Abarquez', 'christian@gmail.com', '1945-02-17', 'married', 'male', 'Dorongan', '09224466881', '73522', 'nxqf64vfnek', 'default.png', 'senior citizen', 'Filipino', 'Abarquez', '09224466880', 'Dorongan');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
