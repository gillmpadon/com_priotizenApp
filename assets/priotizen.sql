-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 05:34 PM
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
(1, '5er4wfw9ok', 'admin@gmail.com', 'admin', 'Admin', 'Pending', 0),
(4, '5er4wfw9os', '202080194@psu.palawan.edu.ph', 'padon', 'company', 'Pending', 1),
(5, '2gl1hip5cvn', 'gillbertmpadon@gmail.com', 'append', 'user', 'Verified', 1),
(6, '3ekhuyjowhh', 'organic@gmail.com', 'organic', 'company', 'Pending', 1),
(8, 'pymfeew8vy', 'Admin_lgu2@gmail.com', 'admin2', 'admin', 'Pending', 0),
(9, 'g8xl7x8ymzg', 'mario@gmail.com', 'Lim', 'user', 'Pending', 0),
(10, 'nxqf64vfnek', 'christian@gmail.com', '123123', 'user', 'Pending', 1),
(11, 'ax49l5yjxag', 'ss@gmail.com', 'stopshop', 'company', 'Pending', 1),
(12, 'ujmdbj0ewlb', 'test', 'Padon', 'user', 'Pending', 0),
(13, '71v82a1qej4', '124', 'ewan', 'user', 'Pending', 0),
(14, '91fxabzsdgc', 'kj', 'kj', 'user', 'Pending', 0),
(15, 'f03i0bddjbb', 'kj', 'kj', 'user', 'Pending', 0),
(18, 'jbu0z7n46e', 'error', 'error', 'user', 'Pending', 0),
(19, '58jrh5slj5v', 'gin123', 'gin123', 'user', 'Pending', 0),
(20, '58jrh5slj5v', 'gin123', 'gin123', 'user', 'Pending', 0),
(21, '58jrh5slj5v', 'gin123', 'gin123', 'user', 'Pending', 0),
(22, '58jrh5slj5v', 'gin123', 'gin123', 'user', 'Pending', 0),
(23, 'zla3jmegea', 'gillbertmpadon@gmail.com', 'gin123', 'user', 'Pending', 0),
(24, 'zla3jmegea', 'gillbertmpadon@gmail.com', 'gin123', 'user', 'Pending', 0),
(25, 'zla3jmegea', 'gillbertmpadon@gmail.com', 'gin123', 'user', 'Pending', 0),
(26, 'cn7tcym0r7e', 'garielle', 'garielle', 'user', 'Pending', 0),
(27, 'cn7tcym0r7e', 'garielle@gmail.com', 'garielle', 'user', 'Pending', 0),
(28, 'cn7tcym0r7e', 'garielle@gmail.com', 'garielle', 'user', 'Pending', 0),
(29, 'cn7tcym0r7e', 'garielle@gmail.com', 'garielle', 'user', 'Pending', 0),
(30, '41qr6e6koce', 'gillbertmpadon@gmail.com', 'garielle', 'user', 'Verified', 0),
(31, '0187m9r44to4', 'Ctrl', 'Ctrl ', 'user', 'Pending', 0),
(32, '1ij19zl0qkv', '12312', '12312', 'user', 'Pending', 0),
(33, 'yj2ga1sez1g', 'gillbertmpadon@gmail.com', '12313212', 'user', 'Pending', 0),
(34, 'cpukv0zbhn', 'dfsdfs@gmail.com', 'sdfsdf', 'user', 'Pending', 0);

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
(4, '2gl1hip5cvn', 'Baay', 'Avenida', '101'),
(5, 'g8xl7x8ymzg', 'Estanza', 'None', '34'),
(6, 'nxqf64vfnek', 'Dorongan', 'None', '65'),
(7, '73ad5qri84q', '[object HTMLSelectElement]', '[object HTMLSelectElement]', '[object HTMLInputElement]'),
(8, '2gl1hip5cvn', 'Baay', 'Avenida', '101'),
(12, '91fxabzsdgc', 'Aliwekwek', 'Avenida', 'kj'),
(9, '2gl1hip5cvn', 'Baay', 'Avenida', '101'),
(10, 'ujmdbj0ewlb', 'Aliwekwek', 'Avenida', '123'),
(11, '71v82a1qej4', 'Aliwekwek', 'Gov. Antonio U. Sison', '123123'),
(13, 'f03i0bddjbb', 'Aliwekwek', 'Avenida', 'kj'),
(14, 'o0co18tzb6r', 'Aliwekwek', 'Avenida', 'gin'),
(15, 'o0co18tzb6r', 'Aliwekwek', 'Avenida', 'gin'),
(16, 'jbu0z7n46e', 'Aliwekwek', 'Avenida', 'error'),
(17, '58jrh5slj5v', 'Aliwekwek', 'Avenida', ''),
(18, '58jrh5slj5v', 'Aliwekwek', 'Avenida', '123'),
(19, '58jrh5slj5v', 'Aliwekwek', 'Avenida', '123'),
(20, '58jrh5slj5v', 'Aliwekwek', 'Avenida', '123'),
(21, 'zla3jmegea', 'Aliwekwek', 'Avenida', 'gin123'),
(22, 'zla3jmegea', 'Aliwekwek', 'Avenida', 'gin123'),
(23, 'zla3jmegea', 'Aliwekwek', 'Avenida', 'gin123'),
(24, 'cn7tcym0r7e', 'Aliwekwek', 'Avenida', 'garielle'),
(25, 'cn7tcym0r7e', 'Aliwekwek', 'Avenida', 'garielle'),
(26, 'cn7tcym0r7e', 'Aliwekwek', 'Avenida', 'garielle'),
(27, 'cn7tcym0r7e', 'Aliwekwek', 'Avenida', 'garielle'),
(28, 'cn7tcym0r7e', 'Aliwekwek', 'Avenida', 'garielle'),
(29, '41qr6e6koce', 'Aliwekwek', 'Avenida', 'garielle'),
(30, '0187m9r44to4', 'Aliwekwek', 'Avenida', 'Ctrl '),
(31, '1ij19zl0qkv', 'Aliwekwek', 'Avenida', '12312'),
(32, 'yj2ga1sez1g', 'Aliwekwek', 'Avenida', '12313212'),
(33, 'cpukv0zbhn', 'Aliwekwek', 'Avenida', 'sdfsdfs');

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
(1, 'Street Wear Urban', '202080194@psu.palawan.edu.ph', 'default.png', '09876543210', '5er4wfw9ok', 'Lingayen'),
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
(6, 'empty.jpg', 'empty.jpg', 'nxqf64vfnek'),
(7, 'empty.jpg', 'empty.jpg', 'ujmdbj0ewlb'),
(8, 'empty.jpg', 'empty.jpg', '71v82a1qej4'),
(9, 'empty.jpg', 'empty.jpg', '91fxabzsdgc'),
(10, 'empty.jpg', 'empty.jpg', 'f03i0bddjbb'),
(11, 'empty.jpg', 'empty.jpg', 'o0co18tzb6r'),
(12, 'empty.jpg', 'empty.jpg', 'o0co18tzb6r'),
(13, 'empty.jpg', 'empty.jpg', 'jbu0z7n46e'),
(14, 'empty.jpg', 'empty.jpg', '58jrh5slj5v'),
(15, 'empty.jpg', 'empty.jpg', '58jrh5slj5v'),
(16, 'empty.jpg', 'empty.jpg', '58jrh5slj5v'),
(17, 'empty.jpg', 'empty.jpg', '58jrh5slj5v'),
(18, 'empty.jpg', 'empty.jpg', 'zla3jmegea'),
(19, 'empty.jpg', 'empty.jpg', 'zla3jmegea'),
(20, 'empty.jpg', 'empty.jpg', 'zla3jmegea'),
(21, 'empty.jpg', 'empty.jpg', 'cn7tcym0r7e'),
(22, 'empty.jpg', 'empty.jpg', 'cn7tcym0r7e'),
(23, 'empty.jpg', 'empty.jpg', 'cn7tcym0r7e'),
(24, 'empty.jpg', 'empty.jpg', 'cn7tcym0r7e'),
(25, 'empty.jpg', 'empty.jpg', 'cn7tcym0r7e'),
(26, 'empty.jpg', 'empty.jpg', '41qr6e6koce'),
(27, 'empty.jpg', 'empty.jpg', '0187m9r44to4'),
(28, 'empty.jpg', 'empty.jpg', '1ij19zl0qkv'),
(29, 'empty.jpg', 'empty.jpg', 'yj2ga1sez1g'),
(30, 'empty.jpg', 'empty.jpg', 'cpukv0zbhn');

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
(1, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(2, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(4, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(7, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(8, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(9, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(10, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(11, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(12, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Completed'),
(13, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Pending'),
(14, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Pending'),
(15, '2gl1hip5cvn', '5er4wfw9ok', '6548fa5d3ab23', 'Pending'),
(16, '2gl1hip5cvn ', '3ekhuyjowhh', '658aef6c08ca6', 'Pending');

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
(1, '6548fa5d3ab23', 200, 12, 'receipt_5j64080mdqg.jpg', '2023-12-03 17:37:36', '5er4wfw9ok', '2gl1hip5cvn'),
(2, '6548fa5d3ab23', 500, 12, 'receipt_5j64080mdqg.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(3, '6548fa5d3ab23', 600, 12, 'receipt_5j64080mdqg.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(4, '6548fa5d3ab23', 1000, 12, 'receipt_73ad5qri84q.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(5, '6548fa5d3ab23', 600, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(6, '6548fa5d3ab23', 400, 12, 'receipt_2gl1hip5cvn.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(7, '6548fa5d3ab23', 1200, 12, 'receipt_2gl1hip5cvn.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(8, '6548fa5d3ab23', 560, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '3ekhuyjowhh'),
(9, '6548fa5d3ab23', 800, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', 'xbw8cw0n9qi'),
(10, '6548fa5d3ab23', 800, 12, 'receipt_g8xl7x8ymzg.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', 'g8xl7x8ymzg'),
(11, '6548fa5d3ab23', 900, 12, 'receipt_g8xl7x8ymzg.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', 'g8xl7x8ymzg'),
(12, '6548fa5d3ab23', 560, 12, 'receipt_2gl1hip5cvn.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '2gl1hip5cvn'),
(13, '6548fa5d3ab23', 900, 12, 'receipt_xbw8cw0n9qi.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', 'xbw8cw0n9qi'),
(14, '6548fa5d3ab23', 1200, 20, 'receipt_73ad5qri84q.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '73ad5qri84q'),
(15, '6548fa5d3ab23', 500, 50, 'receipt_73ad5qri84q.jpg', '2023-12-02 17:37:36', '5er4wfw9ok', '73ad5qri84q'),
(16, '658aef6c08ca6', 1000, 20, 'receipt_2gl1hip5cvn .png', '2023-12-26 15:21:16', '3ekhuyjowhh', '2gl1hip5cvn ');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `all_data` text,
  `signature` varchar(200) DEFAULT NULL,
  `certificate` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `user_id`, `all_data`, `signature`, `certificate`) VALUES
(1, '73ad5qri84q', '{\"lname\":\"Dela Cruz\",\"fname\":\"Juan \",\"mname\":\"A\",\"ext\":\"off\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Aliwekwek\",\"birth00\":\"01\",\"birth01\":\"1\",\"birth10\":\"15\",\"birth11\":\"5\",\"birth20\":\"55\",\"birth22\":\"5\",\"birth_place\":\"off\",\"status\":\"single\",\"sex\":\"male\",\"contact\":\"09012345678\",\"email\":\"juandelacruz@gmail.com\",\"religion\":\"off\",\"ethnic\":\"off\",\"language\":\"off\",\"osca_id\":\"off\",\"gsis_id\":\"off\",\"tin_id\":\"off\",\"philhealth_id\":\"off\",\"org_id\":\"off\",\"gov_id\":\"off\",\"business\":\"off\",\"pension\":\"off\",\"spouse_lname\":\"off\",\"spouse_fname\":\"off\",\"spouse_mname\":\"off\",\"spouse_ext\":\"off\",\"fathers_fname\":\"off\",\"fathers_lname\":\"off\",\"fathers_mname\":\"off\",\"fathers_ext\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"mothers_ext\":\"off\",\"signature\":\"Juan A. Dela Cruz\",\"optical_others\":\"off\",\"hearing_others\":\"off\",\"social_others\":\"off\",\"cost_others\":\"off\",\"dental_others\":\"off\",\"month_income_others\":\"off\",\"resources_others\":\"off\",\"assets_others\":\"off\",\"income_checkbox_others\":\"off\",\"community_checkbox_others\":\"off\",\"technical_checkbox_others\":\"off\",\"\":\"off\",\"travel_yes\":\"off\",\"travel_no\":\"off\",\"e1\":\"off\",\"e2\":\"off\",\"e3\":\"off\",\"e4\":\"off\",\"e5\":\"on\",\"e6\":\"off\",\"e7\":\"off\",\"e8\":\"off\",\"e9\":\"off\",\"skill1\":\"off\",\"skill2\":\"off\",\"skill3\":\"off\",\"t1\":\"off\",\"t2\":\"off\",\"t3\":\"off\",\"t4\":\"on\",\"t5\":\"off\",\"t6\":\"off\",\"t7\":\"off\",\"t8\":\"off\",\"t9\":\"off\",\"t10\":\"off\",\"t11\":\"off\",\"t12\":\"off\",\"t13\":\"off\",\"t14\":\"off\",\"t15\":\"off\",\"t16\":\"off\",\"t17\":\"off\",\"t18\":\"off\",\"t19\":\"off\",\"t20\":\"off\",\"c1\":\"off\",\"c2\":\"off\",\"c3\":\"off\",\"c4\":\"off\",\"c5\":\"off\",\"c6\":\"off\",\"c7\":\"off\",\"c8\":\"off\",\"c9\":\"off\",\"c10\":\"off\",\"c11\":\"off\",\"c12\":\"off\",\"i1\":\"off\",\"i2\":\"off\",\"i3\":\"off\",\"i4\":\"off\",\"i5\":\"off\",\"i6\":\"off\",\"i7\":\"off\",\"i8\":\"off\",\"i9\":\"off\",\"i10\":\"off\",\"p1\":\"off\",\"p2\":\"off\",\"p3\":\"off\",\"p4\":\"off\",\"p5\":\"off\",\"p6\":\"off\",\"p7\":\"off\",\"s1\":\"off\",\"s2\":\"off\",\"s3\":\"off\",\"s4\":\"off\",\"s5\":\"off\",\"s6\":\"off\",\"s7\":\"off\",\"s8\":\"off\",\"s9\":\"off\",\"s10\":\"off\",\"s11\":\"off\",\"s12\":\"off\",\"a1\":\"off\",\"a2\":\"off\",\"a3\":\"off\",\"a4\":\"off\",\"a5\":\"off\",\"a6\":\"off\",\"per1\":\"off\",\"per2\":\"off\",\"per3\":\"off\",\"per4\":\"off\",\"per5\":\"off\",\"per6\":\"off\",\"per7\":\"off\",\"per8\":\"off\",\"per9\":\"off\",\"mon1\":\"off\",\"mon2\":\"off\",\"mon3\":\"off\",\"mon4\":\"off\",\"mon5\":\"off\",\"mon6\":\"off\",\"mon7\":\"off\",\"mon8\":\"off\",\"mon9\":\"off\",\"mon10\":\"off\",\"res1\":\"off\",\"res2\":\"off\",\"res3\":\"off\",\"res4\":\"off\",\"res5\":\"off\",\"med1\":\"off\",\"med2\":\"off\",\"med3\":\"off\",\"med4\":\"off\",\"med5\":\"off\",\"med6\":\"off\",\"med7\":\"off\",\"med8\":\"off\",\"medsub1\":\"off\",\"medsub2\":\"off\",\"medsub3\":\"off\",\"medsub4\":\"off\",\"medsub5\":\"off\",\"medsub6\":\"off\",\"medsub7\":\"off\",\"medsub8\":\"off\",\"den1\":\"off\",\"den2\":\"off\",\"opt1\":\"off\",\"opt2\":\"off\",\"opt3\":\"off\",\"hear1\":\"off\",\"hear2\":\"off\",\"soc1\":\"off\",\"soc2\":\"off\",\"soc3\":\"off\",\"soc4\":\"off\",\"soc5\":\"off\",\"soc6\":\"off\",\"cost1\":\"off\",\"cost2\":\"off\",\"cost3\":\"off\",\"cost4\":\"off\",\"listMed_1\":\"off\",\"listMed_2\":\"off\",\"listMed_3\":\"off\",\"listMed_4\":\"off\",\"listMed_5\":\"off\",\"listMed_6\":\"off\",\"listMed_7\":\"off\",\"listMed_8\":\"off\",\"listMed_9\":\"off\",\"fre1\":\"off\",\"fre2\":\"off\",\"fre3\":\"off\",\"isMedyes\":\"off\",\"isMedno\":\"off\"}', 'unknown.jpg', ''),
(2, 'g8xl7x8ymzg', '{\"new\":false,\"old\":true,\"valid_id\":\"sdfsdfsdf\",\"date\":\"\",\"lname\":\"Abarquez\",\"fname\":\"Christian\",\"mi\":\"J.\",\"suffix\":\"123\",\"bdate\":\"1990-06-12\",\"male\":false,\"female\":true,\"single\":false,\"separated\":false,\"cohabitation\":false,\"married\":false,\"widow\":false,\"deaf\":true,\"intellectual\":false,\"learning\":false,\"mental\":false,\"physical\":false,\"pyschosocial\":false,\"speech\":false,\"visual\":false,\"cancer\":false,\"rare\":false,\"congenital\":true,\"adhd\":false,\"cerebral\":false,\"palsy\":false,\"down\":false,\"cause_others_1\":false,\"cause_others_1_input\":\"\",\"acquired\":false,\"chronic\":false,\"injury\":false,\"cause_others_2\":false,\"cause_others_2_input\":\"\",\"house\":\"89\",\"brgy\":\"Dorongan\",\"municipality\":\"Lingayen\",\"province\":\"Pangasinan\",\"region\":\"Region I\",\"landline\":\"123\",\"number\":\"09998765432\",\"email\":\"christian@gmail.com\",\"none\":false,\"kindergarten\":true,\"elementary\":false,\"junior\":false,\"senior\":false,\"college\":false,\"vocational\":false,\"graduate\":false,\"managers\":true,\"professional\":false,\"technicians\":false,\"clerical\":false,\"service\":false,\"agricultural\":false,\"trade\":false,\"machine\":false,\"occupation\":false,\"forces\":false,\"job_others\":false,\"employed\":true,\"unemployed\":false,\"selfemployed\":false,\"regular\":true,\"seasonal\":false,\"casual\":false,\"emergency\":false,\"government\":true,\"private\":false,\"organization\":\"123\",\"contact\":\"09224466881\",\"office\":\"123\",\"tel\":\"123\",\"sss\":\"123\",\"gsis\":\"123\",\"pagibig\":\"123\",\"psn\":\"123\",\"philhealth\":\"123\",\"fathers_lname\":\"123\",\"fathers_fname\":\"123\",\"fathers_mname\":\"123\",\"mothers_lname\":\"123\",\"mothers_fname\":\"123\",\"mothers_mname\":\"123\",\"guardian1_lname\":\"123\",\"guardian1_fname\":\"123\",\"guardian1_mname\":\"123\",\"radio_applicant\":true,\"radio_guardian\":false,\"radio_representative\":false,\"aoplicant_lname\":\"123\",\"aoplicant_fname\":\"123\",\"aoplicant_mname\":\"123\",\"guardian_lname\":\"123\",\"guardian_fname\":\"123\",\"guardian_mname\":\"123\",\"representative_lname\":\"123\",\"representative_fname\":\"123\",\"representative_mname\":\"123\",\"license\":\"123\",\"license_lname\":\"123\",\"license_fname\":\"123\",\"license_mname\":\"123\",\"officer_lname\":\"123\",\"officer_fname\":\"123\",\"officer_mname\":\"123\",\"approving_lname\":\"123\",\"approving_fname\":\"123\",\"approving_mname\":\"123\",\"encoder_lname\":\"123\",\"encoder_fname\":\"123\",\"encoder_mname\":\"123\",\"reporting_unit\":\"123\",\"control_number\":\"123\"}', 'signature_g8xl7x8ymzg.png', 'certificate_rafael-izquierdo.png.png'),
(5, 'ujmdbj0ewlb', '{\"lname\":\"Padons\",\"fname\":\"Gin\",\"mname\":\"M\",\"ext\":\"\",\"region\":\"Region I\",\"province\":\"Pangasinan\",\"municipality\":\"Lingayen\",\"brgy\":\"Aliwekwek\",\"house\":\"123\",\"street\":\"Avenida\",\"birth00\":\"12\",\"birth01\":\"2\",\"birth10\":\"11\",\"birth11\":\"1\",\"birth20\":\"23\",\"birth22\":\"3\",\"\":false,\"birth_place\":\"palwawan\",\"status\":\"single\",\"sex\":\"male\",\"contact\":\"09707281718\",\"email\":\"test\",\"religion\":\"cccc\",\"ethnic\":\"cccc\",\"language\":\"cccc\",\"osca_id\":\"cccc\",\"gsis_id\":\"cccc\",\"tin_id\":\"cccc\",\"philhealth_id\":\"cccc\",\"org_id\":\"cccc\",\"gov_id\":\"cccc\",\"travel_yes\":true,\"travel_no\":false,\"business\":\"cccc\",\"pension\":\"cccc\",\"spouse_lname\":\"123\",\"spouse_fname\":\"123\",\"spouse_mname\":\"123\",\"spouse_ext\":\"123\",\"fathers_lname\":\"123\",\"fathers_fname\":\"123\",\"fathers_mname\":\"123\",\"fathers_ext\":\"123\",\"mothers_lname\":\"123\",\"mothers_fname\":\"123\",\"mothers_mname\":\"123\",\"mothers_ext\":\"123\",\"child1_name\":\"Fullname\",\"child1_occupation\":\"Occupation\",\"child1_income\":\"Income\",\"child1_age\":\"Age\",\"child1_work\":\"Working/not working\",\"child2_name\":\"1\",\"child2_occupation\":\"2\",\"child2_income\":\"3\",\"child2_age\":\"4\",\"child2_work\":\"5\",\"child3_name\":\"1\",\"child3_occupation\":\"2\",\"child3_income\":\"3\",\"child3_age\":\"4\",\"child3_work\":\"5\",\"child4_name\":\"1\",\"child4_occupation\":\"2\",\"child4_income\":\"3\",\"child4_age\":\"4\",\"child4_work\":\"5\",\"child5_name\":\"1\",\"child5_occupation\":\"2\",\"child5_income\":\"3\",\"child5_age\":\"4\",\"child5_work\":\"5\",\"others2_name\":\"1\",\"others2_job\":\"2\",\"others2_income\":\"3\",\"others2_age\":\"4\",\"others2_work\":\"5\",\"others3_name\":\"1\",\"others3_job\":\"2\",\"others3_income\":\"3\",\"others3_age\":\"4\",\"others3_work\":\"5\",\"others4_name\":\"1\",\"others4_job\":\"2\",\"others4_income\":\"3\",\"others4_age\":\"4\",\"others4_work\":\"5\",\"others5_name\":\"1\",\"others5_job\":\"2\",\"others5_income\":\"3\",\"others5_age\":\"4\",\"others5_work\":\"5\",\"elementary_level\":true,\"highschool_level\":false,\"post_graduate\":false,\"elementary_graduate\":false,\"college_graduate\":false,\"vocational\":false,\"highschool_graduate\":false,\"no_school\":false,\"skill1\":true,\"skill1_input\":\"123\",\"skill2\":false,\"skill2_input\":\"\",\"skill3\":false,\"skill3_input\":\"\",\"medical\":true,\"dental\":false,\"fishing\":false,\"engineering\":false,\"barber\":false,\"evangelization\":false,\"teaching\":false,\"counselling\":false,\"cooking\":false,\"carpenter\":false,\"masson\":false,\"tailor\":false,\"legal_services\":false,\"farming\":false,\"arts\":false,\"plumber\":false,\"sapatero\":false,\"chef\":false,\"millwright\":false,\"t20\":false,\"technical_checkbox_others\":\"\",\"community_medical\":true,\"organization_leader\":false,\"support_services\":false,\"counseling_referral\":false,\"resource_volunter\":false,\"sponsorship\":false,\"community_beutification\":false,\"friendly_visits\":false,\"religious\":false,\"c12\":false,\"community_checkbox_others\":\"\",\"alone\":true,\"spouse\":false,\"children\":false,\"grandchildren\":false,\"inlaws\":false,\"relative\":false,\"law_spouse\":false,\"care_institution\":false,\"friends\":false,\"no_privacy\":true,\"informal_settler\":false,\"high_cost_of_rent\":false,\"overcrowded_in_home\":false,\"no_permanent_house\":false,\"longing_for_quiet_living\":false,\"i10\":false,\"income_checkbox_others\":\"\",\"p7\":false,\"personal_checkbox_input\":\"\",\"salary\":true,\"relatives\":false,\"spouse_pension\":false,\"livestock\":false,\"own_pension\":false,\"spouse_salary\":false,\"share_crops\":false,\"fishing_income\":false,\"stocks\":false,\"insurance\":false,\"savings\":false,\"s12\":false,\"source_checkout_input\":\"\",\"house_assets\":true,\"farm_assets\":false,\"house_asset\":false,\"commercial_assets\":false,\"fishpond\":false,\"a6\":false,\"assets_others\":\"\",\"automobile\":true,\"personal_computer\":false,\"boarts\":false,\"heavy_equipment\":false,\"laptops\":false,\"drones\":false,\"motorcycle\":false,\"mobile_phones\":false,\"per9\":false,\"personsal_others\":\"\",\"60000_above\":true,\"50000_to_60000\":false,\"40000_to_50000\":false,\"30000_to_40000\":false,\"20000_to_30000\":false,\"10000_to_20000\":false,\"5000_to_10000\":false,\"1000_to_5000\":false,\"Below_1000\":false,\"mon10\":false,\"month_income_others\":\"\",\"lack_of_income\":true,\"loss_of_income\":false,\"skills\":false,\"livelihood\":false,\"res5\":false,\"resources_others\":\"\",\"blood_type\":false,\"medsub1\":false,\"medsub2\":false,\"medsub3\":false,\"medsub4\":false,\"medsub5\":false,\"physical_disability\":true,\"health_problems\":false,\"hypertension\":false,\"arthritis\":false,\"coronory_heart_disease\":false,\"diabetes\":false,\"chronic_kidney_disease\":false,\"alzheimer\":false,\"pulmonary_disease\":false,\"med8\":false,\"medical_others\":\"\",\"dental_care\":true,\"den2\":false,\"dental_others\":\"\",\"eye_impairment\":true,\"need_eye_care\":false,\"opt3\":false,\"optical_others\":\"\",\"hear1\":true,\"hear2\":false,\"hearing_others\":\"\",\"soc1\":false,\"soc2\":false,\"soc3\":false,\"soc4\":false,\"soc5\":false,\"soc6\":false,\"social_others\":\"\",\"high_cost_of_medicines\":true,\"lack_of_medicines\":false,\"high_of_medical_attention\":false,\"cost4\":false,\"cost_others\":\"\",\"listMed_1\":\"123\",\"listMed_2\":\"\",\"listMed_3\":\"\",\"listMed_4\":\"\",\"listMed_5\":\"\",\"listMed_6\":\"\",\"listMed_7\":\"\",\"listMed_8\":\"\",\"listMed_9\":\"\",\"isMedyes\":true,\"isMedno\":false,\"fre1\":true,\"fre2\":false,\"fre3\":false}', 'unknown.jpg', NULL),
(3, '2gl1hip5cvn', '{\"new\":false,\"old\":false,\"valid_id\":\"\",\"date\":\"\",\"lname\":\"Abarquez\",\"fname\":\"Christian\",\"mi\":\"J.\",\"suffix\":\"\",\"bdate\":\"1990-06-12\",\"male\":false,\"female\":false,\"single\":false,\"separated\":false,\"cohabitation\":false,\"married\":false,\"widow\":false,\"deaf\":true,\"intellectual\":false,\"learning\":false,\"mental\":false,\"physical\":false,\"pyschosocial\":false,\"speech\":false,\"visual\":false,\"cancer\":false,\"rare\":false,\"congenital\":true,\"adhd\":false,\"cerebral\":false,\"palsy\":false,\"down\":false,\"cause_others_1\":false,\"cause_others_1_input\":\"\",\"acquired\":false,\"chronic\":false,\"injury\":false,\"cause_others_2\":false,\"cause_others_2_input\":\"\",\"house\":\"89\",\"brgy\":\"Dorongan\",\"municipality\":\"Lingayen\",\"province\":\"Pangasinan\",\"region\":\"Region I\",\"landline\":\"\",\"number\":\"09998765432\",\"email\":\"christian@gmail.com\",\"none\":false,\"kindergarten\":true,\"elementary\":false,\"junior\":false,\"senior\":false,\"college\":false,\"vocational\":false,\"graduate\":false,\"managers\":true,\"professional\":false,\"technicians\":false,\"clerical\":false,\"service\":false,\"agricultural\":false,\"trade\":false,\"machine\":false,\"occupation\":false,\"forces\":false,\"job_others\":false,\"employed\":true,\"unemployed\":false,\"selfemployed\":false,\"regular\":false,\"seasonal\":true,\"casual\":false,\"emergency\":false,\"government\":true,\"private\":false,\"organization\":\"\",\"contact\":\"09224466881\",\"office\":\"\",\"tel\":\"\",\"sss\":\"\",\"gsis\":\"\",\"pagibig\":\"\",\"psn\":\"\",\"philhealth\":\"\",\"fathers_lname\":\"off\",\"fathers_fname\":\"off\",\"fathers_mname\":\"off\",\"mothers_lname\":\"off\",\"mothers_fname\":\"off\",\"mothers_mname\":\"off\",\"guardian_lname\":\"\",\"guardian_fname\":\"\",\"guardian_mname\":\"\",\"radio_applicant\":false,\"radio_guardian\":false,\"radio_representative\":false,\"aoplicant_lname\":\"\",\"aoplicant_fname\":\"\",\"aoplicant_mname\":\"\",\"representative_lname\":\"\",\"representative_fname\":\"\",\"representative_mname\":\"\",\"\":\"\",\"license_lname\":\"\",\"license_fname\":\"\",\"license_mname\":\"\",\"officer_lname\":\"\",\"officer_fname\":\"\",\"officer_mname\":\"\",\"approving_lname\":\"\",\"approving_fname\":\"\",\"approving_mname\":\"\",\"encoder_lname\":\"\",\"encoder_fname\":\"\",\"encoder_mname\":\"\",\"reporting_unit\":\"\",\"control_number\":\"\"}', 'signature_2gl1hip5cvn.png', 'certificate_Screenshot 2023-11-21 174649.png.png'),
(7, '91fxabzsdgc', 'test', 'unknown.jpg', NULL),
(8, 'f03i0bddjbb', 'test', 'signature_f03i0bddjbb.png', NULL),
(9, 'o0co18tzb6r', 'test', 'unknown.jpg', NULL),
(10, 'o0co18tzb6r', 'test', 'unknown.jpg', NULL),
(11, 'jbu0z7n46e', 'test', 'unknown.jpg', NULL),
(12, '58jrh5slj5v', 'test', 'unknown.jpg', NULL),
(13, '58jrh5slj5v', 'test', 'unknown.jpg', NULL),
(14, '58jrh5slj5v', 'test', 'unknown.jpg', NULL),
(15, '58jrh5slj5v', 'test', 'unknown.jpg', NULL),
(16, 'zla3jmegea', 'test', 'unknown.jpg', NULL),
(17, 'zla3jmegea', 'test', 'unknown.jpg', NULL),
(18, 'zla3jmegea', 'test', 'unknown.jpg', NULL),
(19, 'cn7tcym0r7e', 'test', 'unknown.jpg', NULL),
(20, 'cn7tcym0r7e', 'test', 'unknown.jpg', NULL),
(21, 'cn7tcym0r7e', 'test', 'unknown.jpg', NULL),
(22, 'cn7tcym0r7e', 'test', 'unknown.jpg', NULL),
(23, 'cn7tcym0r7e', 'test', 'unknown.jpg', NULL),
(24, '41qr6e6koce', 'test', 'unknown.jpg', NULL),
(25, '0187m9r44to4', 'test', 'unknown.jpg', NULL),
(26, '1ij19zl0qkv', 'test', 'unknown.jpg', NULL),
(27, 'yj2ga1sez1g', 'test', 'unknown.jpg', NULL),
(28, 'cpukv0zbhn', 'test', 'unknown.jpg', NULL);

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
(1, '73ad5qri84q', '5er4wfw9ok', 'Created', '2023-12-03 17:37:16'),
(2, '5j64080mdqg', '5er4wfw9ok', 'Created', '2023-12-03 17:37:16'),
(3, 'xbw8cw0n9qi', '5er4wfw9ok', 'Created', '2023-12-03 17:37:16'),
(4, '2gl1hip5cvn', '5er4wfw9ok', 'Created', '2023-12-03 17:37:16'),
(5, 'g8xl7x8ymzg', '5er4wfw9ok', 'Created', '2023-12-03 17:37:16'),
(6, 'nxqf64vfnek', '5er4wfw9ok', 'Created', '2023-12-03 17:37:16'),
(7, 'xbw8cw0n9qi', '5er4wfw9ok', 'Edited', '2023-12-03 17:37:16'),
(8, '73ad5qri84q', '5er4wfw9ok', 'Edited', '2023-12-03 17:37:16'),
(9, '73ad5qri84q', '5er4wfw9ok', 'Edited', '2023-12-03 17:37:16'),
(10, '73ad5qri84q', '5er4wfw9ok', 'Edited', '2023-12-03 17:37:16'),
(11, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 11:55:37'),
(12, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 11:57:59'),
(13, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 12:04:09'),
(14, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 12:04:24'),
(15, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 12:04:46'),
(16, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 12:05:20'),
(17, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 12:05:30'),
(18, '2gl1hip5cvn', '5er4wfw9ok', 'Edited', '2023-12-13 12:11:14'),
(19, 'ujmdbj0ewlb', '5er4wfw9ok', 'Created', '2023-12-13 13:02:01'),
(20, '71v82a1qej4', '5er4wfw9ok', 'Created', '2023-12-13 13:34:15'),
(21, '71v82a1qej4', '5er4wfw9ok', 'Edited', '2023-12-13 14:12:00'),
(22, '71v82a1qej4', '5er4wfw9ok', 'Edited', '2023-12-13 14:18:01'),
(23, 'ujmdbj0ewlb', '5er4wfw9ok', 'Edited', '2023-12-13 14:18:50'),
(24, 'ujmdbj0ewlb', '5er4wfw9ok', 'Edited', '2023-12-13 16:04:00'),
(25, 'ujmdbj0ewlb', '5er4wfw9ok', 'Edited', '2023-12-13 16:36:29'),
(26, '91fxabzsdgc', '5er4wfw9ok', 'Created', '2023-12-17 15:19:46'),
(27, 'f03i0bddjbb', '5er4wfw9ok', 'Created', '2023-12-17 15:20:04'),
(28, 'o0co18tzb6r', '5er4wfw9ok', 'Created', '2023-12-26 11:58:06'),
(29, 'o0co18tzb6r', '5er4wfw9ok', 'Created', '2023-12-26 11:58:17'),
(30, 'jbu0z7n46e', '5er4wfw9ok', 'Created', '2023-12-26 12:02:20'),
(31, '58jrh5slj5v', '5er4wfw9ok', 'Created', '2023-12-26 13:18:29'),
(32, '58jrh5slj5v', '5er4wfw9ok', 'Created', '2023-12-26 13:18:37'),
(33, '58jrh5slj5v', '5er4wfw9ok', 'Created', '2023-12-26 13:18:53'),
(34, '58jrh5slj5v', '5er4wfw9ok', 'Created', '2023-12-26 13:19:38'),
(35, 'zla3jmegea', '5er4wfw9ok', 'Created', '2023-12-26 13:20:59'),
(36, 'zla3jmegea', '5er4wfw9ok', 'Created', '2023-12-26 13:22:40'),
(37, 'zla3jmegea', '5er4wfw9ok', 'Created', '2023-12-26 13:23:02'),
(38, 'cn7tcym0r7e', '5er4wfw9ok', 'Created', '2023-12-26 13:26:00'),
(39, 'cn7tcym0r7e', '5er4wfw9ok', 'Created', '2023-12-26 13:26:08'),
(40, 'cn7tcym0r7e', '5er4wfw9ok', 'Created', '2023-12-26 13:26:20'),
(41, 'cn7tcym0r7e', '5er4wfw9ok', 'Created', '2023-12-26 13:27:48'),
(42, 'cn7tcym0r7e', '5er4wfw9ok', 'Created', '2023-12-26 13:28:47'),
(43, '41qr6e6koce', '5er4wfw9ok', 'Created', '2023-12-26 13:29:10'),
(44, '0187m9r44to4', '5er4wfw9ok', 'Created', '2023-12-26 14:45:20'),
(45, '1ij19zl0qkv', '5er4wfw9ok', 'Created', '2023-12-26 14:52:52'),
(46, 'yj2ga1sez1g', '5er4wfw9ok', 'Created', '2023-12-26 14:57:11'),
(47, 'cpukv0zbhn', '5er4wfw9ok', 'Created', '2023-12-26 15:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `valid_id`
--

CREATE TABLE `valid_id` (
  `id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `user_type` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valid_id`
--

INSERT INTO `valid_id` (`id`, `user_id`, `fname`, `lname`, `user_type`) VALUES
(1, '19673', 'Federico', 'Arias', 'Senior Citizen'),
(2, '24682', 'Nila', 'Prado', 'Senior Citizen'),
(3, '20976', 'Linda', 'Carani', 'Senior Citizen'),
(4, '17640', 'Andres', 'Castro', 'Senior Citizen'),
(5, '26221', 'Mario', 'Melchor', 'Senior Citizen'),
(6, '01-5522-008-422', 'Rowena', 'Cruz', 'PWD'),
(7, '01-5522-008-571', 'Precious Holy', 'Ocampo', 'PWD'),
(8, '01-5522-08-0816', 'Geanabelle', 'Mejia', 'PWD'),
(9, '01-5522-008-886', 'Jenalyn', 'Mamaril', 'PWD'),
(10, '01- 5522-088-713', 'Mildred', 'Dela Cruz', 'PWD');

-- --------------------------------------------------------

--
-- Table structure for table `verified`
--

CREATE TABLE `verified` (
  `id` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mi` varchar(15) DEFAULT NULL,
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
(8, 'gin', 'm', 'ewan', '124', '2023-12-06', 'single', 'male', 'Aliwekwek', '124', '1245', '71v82a1qej4', 'unkown.jpg', 'pwd', 'Filipino', '124', '124', 'Aliwekwek'),
(3, 'Alma', 'J.', 'Ramos', 'gillbertmpadon@gmail.com', '1990-06-13', 'single', 'female', 'Baay', '09998765432', 'PWD002', '2gl1hip5cvn', 'default.png', 'pwd', 'English', 'Ramos', '09998765430', 'Baay'),
(7, 'Gin', 'M', 'Padon', 'test', '2023-12-11', 'single', 'male', 'Aliwekwek', '09707281718', '12345', 'ujmdbj0ewlb', 'unkown.jpg', 'senior citizen', 'Filipino', 'test', 'test', 'Aliwekwek'),
(5, 'Mario', 'G. ', 'Lim', 'mario@gmail.com', '1990-06-12', 'single', 'male', 'Estanza', '09556633778', 'Pwd003', 'g8xl7x8ymzg', 'default.png', 'pwd', 'Filipino', 'Lim', '09556633770', 'Estanza'),
(6, 'Christian', 'F.', 'Abarquez', 'christian@gmail.com', '1945-02-17', 'married', 'male', 'Dorongan', '09224466881', '73522', 'nxqf64vfnek', 'default.png', 'senior citizen', 'Filipino', 'Abarquez', '09224466880', 'Dorongan'),
(9, 'wjerkjkj', 'kj', 'kj', 'kj', '2023-12-13', 'single', 'male', 'Aliwekwek', 'j', 'kj', '91fxabzsdgc', 'wjerkjkj_dp.png', 'senior citizen', 'Filipino', 'jk', 'j', 'Aliwekwek'),
(10, 'wjerkjkj', 'kj', 'kj', 'kj', '2023-12-13', 'single', 'male', 'Aliwekwek', 'j', 'kj', 'f03i0bddjbb', 'wjerkjkj_dp.png', 'pwd', 'Filipino', 'jk', 'j', 'Aliwekwek'),
(13, 'error', 'error', 'error', 'error', '1952-05-26', 'single', 'male', 'Aliwekwek', 'error', 'error', 'jbu0z7n46e', 'error_dp.png', 'pwd', 'Filipino', 'error', 'error', 'Aliwekwek'),
(14, 'garielle', 'garielle', 'garielle', 'garielle@gmail.com', '2023-12-20', 'single', 'male', 'Aliwekwek', 'garielle', 'garielle', 'cn7tcym0r7e', 'garielle_dp.png', 'senior citizen', 'Filipino', 'garielle', 'garielle', 'Aliwekwek'),
(15, 'garielle', 'garielle', 'garielle', 'gillbertmpadon@gmail.com', '2023-12-20', 'single', 'male', 'Aliwekwek', 'garielle', 'garielle', '41qr6e6koce', 'garielle_dp.png', 'senior citizen', 'Filipino', 'garielle', 'garielle', 'Aliwekwek'),
(18, '12313212', '12313212', '12313212', 'gillbertmpadon@gmail.com', '2023-12-09', 'single', 'male', 'Aliwekwek', '12313212', '12313212', 'yj2ga1sez1g', 'unkown.jpg', 'senior citizen', 'Filipino', '12313212', '12313212', 'Aliwekwek'),
(19, 'sadfsdf', 'sdfsdf', 'sdfsdf', 'dfsdfs@gmail.com', '2023-12-28', 'single', 'male', 'Aliwekwek', 'sdfsdf', 'sdfsdfs', 'cpukv0zbhn', 'sadfsdf_dp.png', 'senior citizen', 'Filipino', 'sdfsdf', 'sdfsdfsdf', 'Aliwekwek');

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
-- Indexes for table `valid_id`
--
ALTER TABLE `valid_id`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_history`
--
ALTER TABLE `user_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `valid_id`
--
ALTER TABLE `valid_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `verified`
--
ALTER TABLE `verified`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
