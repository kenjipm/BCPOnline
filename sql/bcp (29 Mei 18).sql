-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 05:30 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) NOT NULL,
  `account_id` varchar(12) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL DEFAULT '',
  `address` varchar(500) NOT NULL DEFAULT '',
  `date_of_birth` date NOT NULL DEFAULT '0000-00-00',
  `phone_number` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `identification_no` varchar(50) NOT NULL DEFAULT '',
  `identification_pic` varchar(50) NOT NULL DEFAULT '',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_id`, `name`, `address`, `date_of_birth`, `phone_number`, `email`, `password`, `identification_no`, `identification_pic`, `last_login`, `status`, `date_joined`, `profile_pic`) VALUES
(0, 'ADM0000', '', '', '0000-00-00', '', '', 'bfd59291e825b5f2bbf1eb76569f8fe7', '', '', '0000-00-00 00:00:00', '', '2018-04-03 15:29:39', ''),
(2, 'ADM00001', 'Admin', '', '0000-00-00', '', 'admin1@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-06-05 18:12:41', 'active', '2017-12-14 06:35:41', ''),
(3, 'TNT00000', 'Tenant Admin', '', '0000-00-00', '', 'tenant.admin@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-03-21 11:46:15', '', '2018-03-20 16:19:35', ''),
(13, 'TNT00004', 'Mr. Lee Byung-chul', 'Jl. Pahlawan 121', '1910-02-12', '08123212321', 'lee@samsung.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123123', '', '2018-05-24 20:02:50', 'ACTIVE', '2018-03-20 16:55:40', ''),
(14, 'TNT00005', 'Mr. Lei Jun', 'Jl. Pahlawan 123', '1969-12-16', '08123123123', 'lei@xiaomi.com', 'e10adc3949ba59abbe56e057f20f883e', '12321232123213', '', '2018-05-02 10:42:56', 'ACTIVE', '2018-03-20 16:58:19', ''),
(15, 'CUS00000004', 'Bayu', 'Jl. Bayu Wangi 10', '1999-03-06', '08123123123', 'customer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'img/upload/CUS00000004/idpic.jpg', '2018-06-06 10:28:10', 'ACTIVE', '2018-03-20 17:46:47', 'img/upload/CUS00000004/profpic.jpg'),
(16, 'DLV00005', 'Anto', 'Gg. Ijan 60', '1969-12-16', '08123123123', 'deliverer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123', '', '2018-05-02 10:40:21', 'ACTIVE', '2018-03-20 18:11:23', ''),
(17, 'CUS00000005', 'Deden Sumaden', 'Jl. Bekasi Barat 321', '2004-03-04', '08123123123', 'customer2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'img/upload/CUS00000005/idpic.jpg', '2018-04-24 22:38:10', 'ACTIVE', '2018-03-21 04:06:19', 'img/upload/CUS00000005/profpic.jpg'),
(18, 'DLV00006', 'Andi', 'Gg. Ijan 62', '1999-11-11', '08123123321', 'deliverer2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '23112223132', '', '2018-03-26 22:36:37', 'ACTIVE', '2018-03-21 04:36:58', ''),
(19, 'TNT00006', 'dicky test', 'jalan kh noer ali 177', '1988-09-09', '08767536789', 'dicky@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '1231441209', '', '2018-03-21 14:07:01', 'ACTIVE', '2018-03-21 04:56:38', ''),
(20, 'CUS00000006', 'NasiGoreng', 'Jalan kaki lima belok kanan no 1 ', '2008-03-21', '08123456789', 'nasigoreng@gmail.com', '3345d4066fb9607e6cc772fa578e9dcd', '123456789101112', '', '2018-04-04 11:09:54', 'ACTIVE', '2018-03-21 05:55:23', ''),
(21, 'TNT00007', 'Oppa', 'Jl. Bekasi Raya 1', '1997-07-16', '08123213321', 'oppa@oppo.com', 'e10adc3949ba59abbe56e057f20f883e', '1232132132131', '', '2018-03-21 13:26:01', 'ACTIVE', '2018-03-21 06:24:51', ''),
(22, 'DLV00007', 'Andri', 'Jl Bekasi Utara 12', '1995-06-15', '0813123123231', 'deliverer3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '213213321231', '', '2018-03-26 22:36:44', 'ACTIVE', '2018-03-21 06:32:45', ''),
(23, 'CUS00000007', 'Budi', 'Jl. Budi Asih 11', '1991-03-14', '08321321321', 'customer3@gmail.com', '6572bdaff799084b973320f43f09b363', '1820380123800812', '', '2018-04-11 13:06:08', 'ACTIVE', '2018-03-26 13:47:22', ''),
(24, 'CUS00000008', 'bcp', 'jln kh noer ali 177', '2008-03-04', '085860004360', 'dicky.s.n@gmail.com', '8054668f768bad78adc5968058cf929d', '123456778', '', '0000-00-00 00:00:00', 'INACTIVE', '2018-03-28 04:19:44', ''),
(25, 'CUS00000009', 'Dadan', 'Jl Bekasi Selatan 12', '1990-03-22', '082122233341', 'customer4@gmail.com', '6572bdaff799084b973320f43f09b363', '3272132173892', '', '2018-03-28 11:56:32', 'ACTIVE', '2018-03-28 04:56:22', ''),
(27, 'TNT00008', 'rio', 'jln kh noer ali 177', '1998-04-01', '123456778890', 'dicky.s.n@gmail.com', 'd3754055449e7826cdc8563246ed1140', '12345678', '', '2018-04-04 10:40:18', 'ACTIVE', '2018-04-04 03:34:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `admin_id` varchar(15) NOT NULL DEFAULT '',
  `account_id` int(15) NOT NULL,
  `hour_avalaible` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `account_id`, `hour_avalaible`) VALUES
(1, 'ADM00001', 2, '10.00-22.00');

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `id` int(10) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid_price` float NOT NULL DEFAULT '0',
  `customer_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`id`, `bid_time`, `bid_price`, `customer_id`, `posted_item_id`) VALUES
(5, '2018-03-21 04:14:32', 2000000, 4, 59),
(6, '2018-03-21 04:16:33', 1700000, 5, 59),
(7, '2018-03-21 04:27:12', 2500000, 4, 59),
(8, '2018-03-21 07:06:37', 1800000, 6, 62),
(9, '2018-03-21 07:06:57', 1100000, 5, 62),
(10, '2018-03-21 07:07:50', 1100000, 4, 62),
(11, '2018-03-21 07:09:16', 2700000, 4, 62),
(12, '2018-03-21 07:09:27', 2500000, 6, 62),
(13, '2018-03-21 07:11:33', 3000000, 5, 62),
(14, '2018-03-21 07:12:02', 3700000, 6, 62),
(15, '2018-03-21 07:14:16', 4700000, 4, 62),
(16, '2018-03-25 07:17:15', 1100000, 4, 63);

-- --------------------------------------------------------

--
-- Table structure for table `bidding_live`
--

CREATE TABLE `bidding_live` (
  `id` int(11) NOT NULL,
  `bid_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid_price` int(11) NOT NULL DEFAULT '0',
  `customer_id` int(11) NOT NULL,
  `posted_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding_live`
--

INSERT INTO `bidding_live` (`id`, `bid_time`, `bid_price`, `customer_id`, `posted_item_id`) VALUES
(1, '2018-03-26 17:24:39', 1100000, 4, 63),
(2, '2018-03-26 17:26:44', 1010000, 4, 63),
(3, '2018-03-26 17:29:32', 1120000, 4, 63),
(4, '2018-03-26 17:30:01', 1130000, 4, 63),
(5, '2018-03-26 17:34:25', 1140000, 4, 63),
(6, '2018-03-26 17:34:33', 1220000, 4, 63),
(7, '2018-03-26 17:36:03', 1290000, 5, 63),
(8, '2018-03-26 17:36:52', 1340000, 5, 63),
(9, '2018-03-26 17:37:14', 1390000, 5, 63),
(10, '2018-03-28 03:40:51', 2200000, 4, 65),
(11, '2018-03-28 03:41:31', 2500000, 7, 65),
(12, '2018-03-28 03:42:04', 2525000, 4, 65),
(13, '2018-03-28 03:42:10', 2675000, 7, 65),
(14, '2018-03-28 03:42:26', 2750000, 4, 65),
(15, '2018-03-28 05:00:55', 1500000, 6, 66),
(16, '2018-03-28 05:01:13', 1740000, 4, 66),
(17, '2018-03-28 05:01:28', 1750000, 6, 66),
(18, '2018-03-28 05:01:33', 1990000, 9, 66),
(19, '2018-03-28 05:01:40', 2050000, 4, 66),
(20, '2018-03-28 05:01:51', 2180000, 7, 66),
(21, '2018-03-28 05:02:38', 2190000, 4, 66),
(22, '2018-03-28 05:02:53', 2280000, 4, 66),
(23, '2018-03-28 05:03:07', 2360000, 7, 66),
(24, '2018-03-28 05:05:38', 2370000, 4, 66),
(25, '2018-03-28 05:24:45', 2560000, 6, 66),
(26, '2018-04-03 09:16:20', 2630000, 4, 66),
(27, '2018-04-03 11:53:59', 2640000, 4, 66),
(28, '2018-04-03 11:55:41', 2650000, 4, 66),
(29, '2018-04-03 11:56:14', 2660000, 4, 66),
(30, '2018-04-03 11:56:59', 2670000, 4, 66),
(31, '2018-04-03 11:58:05', 2680000, 4, 66),
(32, '2018-04-17 13:03:13', 2710000, 4, 66),
(33, '2018-04-17 14:47:39', 2800000, 4, 66),
(34, '2018-04-23 16:10:47', 2810000, 4, 66),
(35, '2018-04-23 17:06:33', 2820000, 4, 66),
(36, '2018-04-24 09:32:20', 2830000, 4, 66),
(37, '2018-04-30 13:07:47', 2840000, 4, 66),
(38, '2018-04-30 13:11:01', 2850000, 4, 66),
(39, '2018-04-30 13:12:53', 2860000, 4, 66),
(40, '2018-04-30 13:14:02', 2870000, 4, 66),
(41, '2018-04-30 13:16:17', 2880000, 4, 66),
(42, '2018-04-30 13:19:28', 2890000, 4, 66),
(43, '2018-04-30 13:20:14', 2900000, 4, 66),
(44, '2018-04-30 13:26:43', 2910000, 4, 66),
(45, '2018-04-30 13:28:12', 2920000, 4, 66),
(46, '2018-04-30 13:30:16', 2930000, 4, 66),
(47, '2018-04-30 13:32:24', 2940000, 4, 66),
(48, '2018-04-30 13:38:56', 2950000, 4, 66),
(49, '2018-04-30 13:41:05', 2960000, 4, 66),
(50, '2018-04-30 13:41:47', 2970000, 4, 66),
(51, '2018-04-30 13:42:14', 2980000, 4, 66),
(52, '2018-04-30 13:42:34', 2990000, 4, 66),
(53, '2018-04-30 13:44:32', 3000000, 4, 66),
(54, '2018-04-30 13:44:54', 3010000, 4, 66),
(55, '2018-04-30 13:45:07', 3020000, 4, 66),
(56, '2018-05-01 17:11:17', 120000, 4, 89);

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(10) NOT NULL,
  `bill_id` varchar(15) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_closed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `total_payable` float NOT NULL DEFAULT '0',
  `customer_id` int(15) NOT NULL,
  `shipping_address_id` int(15) DEFAULT NULL,
  `shipping_charge_id` int(15) DEFAULT NULL,
  `delivery_method` varchar(500) NOT NULL DEFAULT '',
  `point_received` int(11) NOT NULL DEFAULT '0',
  `setting_reward_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `bill_id`, `date_created`, `date_closed`, `total_payable`, `customer_id`, `shipping_address_id`, `shipping_charge_id`, `delivery_method`, `point_received`, `setting_reward_id`) VALUES
(21, 'BIL000000021', '2018-03-21 00:54:12', '2018-03-22 00:54:12', 6180000, 4, 4, 18, 'JNE', 0, 5),
(22, 'BIL000000022', '2018-03-21 11:31:34', '2018-03-22 11:31:34', 2500000, 4, 4, 19, 'JNE', 0, 5),
(23, 'BIL000000023', '2018-03-21 12:05:13', '2018-03-22 12:05:13', 1950000, 4, 4, 20, 'JNE', 0, 5),
(24, 'BIL000000024', '2018-03-21 13:20:53', '2018-03-22 13:20:53', 7500000, 6, 6, 21, 'JNE', 0, 5),
(25, 'BIL000000025', '2018-03-21 13:29:50', '2018-03-22 13:29:50', 7000000, 6, 7, 22, 'JNE', 0, 5),
(26, 'BIL000000026', '2018-03-21 14:21:28', '2018-03-22 14:21:28', 4700000, 4, 4, 23, 'JNE', 0, 5),
(27, 'BIL000000027', '2018-03-25 12:42:40', '2018-03-26 12:42:40', 4230000, 4, 4, 24, 'JNE', 0, 5),
(28, 'BIL000000028', '2018-03-26 22:33:57', '2018-03-27 22:33:57', 1950000, 4, 4, 25, 'JNE', 0, 5),
(29, 'BIL000000029', '2018-03-27 16:19:48', '2018-03-28 16:19:48', 1950000, 7, 9, 26, 'JNE', 0, 5),
(30, 'BIL000000030', '2018-03-28 10:48:16', '2018-03-29 10:48:16', 3700000, 6, NULL, NULL, '', 0, 5),
(31, 'BIL000000031', '2018-03-28 10:48:37', '2018-03-29 10:48:37', 3700000, 6, NULL, NULL, '', 0, 5),
(32, 'BIL000000032', '2018-03-28 10:48:45', '2018-03-29 10:48:45', 3700000, 6, NULL, NULL, '', 0, 5),
(33, 'BIL000000033', '2018-03-28 10:56:32', '2018-03-29 10:56:32', 3700000, 6, NULL, NULL, '', 0, 5),
(34, 'BIL000000034', '2018-03-28 11:09:25', '2018-03-29 11:09:25', 2750000, 4, 4, 27, 'JNE', 0, 5),
(35, 'BIL000000035', '2018-03-28 12:34:08', '2018-03-29 12:34:08', 5750000, 4, 4, 28, 'TIKI', 0, 5),
(36, 'BIL000000036', '2018-04-03 17:37:37', '2018-04-04 17:37:37', 2630000, 4, 10, 32, 'JNE', 0, 5),
(37, 'BIL000000037', '2018-04-03 17:39:03', '2018-04-04 17:39:03', 2630000, 4, NULL, NULL, '', 0, 5),
(38, 'BIL000000038', '2018-04-18 10:26:00', '2018-04-19 10:26:00', 1950000, 4, 8, 29, 'JNE', 0, 5),
(39, 'BIL000000039', '2018-04-18 10:38:54', '2018-04-19 10:38:54', 1925000, 4, 4, 30, 'JNE', 0, 5),
(40, 'BIL000000040', '2018-04-24 00:16:39', '2018-04-25 00:16:39', 3500000, 4, 4, 31, 'JNE', 0, 5),
(41, 'BIL000000041', '2018-05-02 10:37:12', '2018-05-03 10:37:12', 1850000, 4, 10, 33, 'JNE', 0, 5),
(42, 'BIL000000042', '2018-05-11 15:38:57', '2018-05-12 15:38:57', 1950000, 4, 10, 34, 'JNE', 0, 5),
(43, 'BIL000000043', '2018-05-11 15:44:44', '2018-05-12 15:44:44', 2500000, 4, 10, 35, 'JNE', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) NOT NULL,
  `brand_id` varchar(15) NOT NULL DEFAULT '',
  `brand_name` varchar(500) NOT NULL DEFAULT '',
  `brand_description` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_id`, `brand_name`, `brand_description`) VALUES
(4, 'BRD000004', 'Apple', 'Mac'),
(5, 'BRD000005', 'Samsung', 'Korea'),
(6, 'BRD000006', 'Xiaomi', 'China'),
(7, 'BRD000007', 'Oppo', 'China');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(500) NOT NULL DEFAULT '',
  `category_description` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_description`) VALUES
(5, 'Handphone', 'Telepon Genggam'),
(6, 'Tablet', 'Handphone 7 inch ke atas'),
(7, 'Laptop', 'Komputer Portabel'),
(8, 'Aksesoris Laptop', 'Pelengkap Laptop'),
(9, 'Aksesoris Handphone', 'Pelengkap Handphone');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `customer_id` varchar(15) NOT NULL DEFAULT '',
  `account_id` int(15) NOT NULL,
  `verified_mark` varchar(100) NOT NULL DEFAULT '',
  `credit_amount` double NOT NULL DEFAULT '0',
  `reward_points` int(10) NOT NULL DEFAULT '0',
  `deposit_status` tinyint(4) NOT NULL DEFAULT '0',
  `upline_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `account_id`, `verified_mark`, `credit_amount`, `reward_points`, `deposit_status`, `upline_id`) VALUES
(4, 'CUS00000004', 15, '', 0, 4071, 0, NULL),
(5, 'CUS00000005', 17, '', 0, 0, 1, NULL),
(6, 'CUS00000006', 20, '', 0, 1450, 1, NULL),
(7, 'CUS00000007', 23, '', 0, 195, 1, NULL),
(8, 'CUS00000008', 24, '', 0, 0, 0, NULL),
(9, 'CUS00000009', 25, '', 0, 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `id` int(10) NOT NULL,
  `deliverer_id` varchar(15) NOT NULL DEFAULT '',
  `account_id` int(15) NOT NULL,
  `license_plate` varchar(20) NOT NULL DEFAULT '',
  `vehicle_desc` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliverer`
--

INSERT INTO `deliverer` (`id`, `deliverer_id`, `account_id`, `license_plate`, `vehicle_desc`) VALUES
(5, 'DLV00005', 16, 'B 1234 ABC', 'Motor Mio Hitam'),
(6, 'DLV00006', 18, 'B 1234 BCD', 'Motor Vario Hitam'),
(7, 'DLV00007', 22, 'B 1234 CDE', 'Motor Vario Putih');

-- --------------------------------------------------------

--
-- Table structure for table `dispute`
--

CREATE TABLE `dispute` (
  `id` int(10) NOT NULL,
  `dispute_id` varchar(15) NOT NULL DEFAULT '',
  `reason` varchar(1000) NOT NULL DEFAULT '',
  `date_created` date NOT NULL,
  `party_one_id` int(15) NOT NULL,
  `party_two_id` int(15) NOT NULL,
  `dispute_status` varchar(500) NOT NULL DEFAULT '',
  `order_detail_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispute`
--

INSERT INTO `dispute` (`id`, `dispute_id`, `reason`, `date_created`, `party_one_id`, `party_two_id`, `dispute_status`, `order_detail_id`) VALUES
(2, '2', '', '2018-03-21', 15, 3, '', 23),
(3, '3', '', '2018-03-25', 15, 13, '', 28),
(4, '4', '', '2018-03-27', 23, 13, '', 31),
(5, '5', '', '2018-04-23', 15, 13, '', 41),
(6, '6', '', '2018-04-24', 15, 27, '', 43),
(7, '7', '', '2018-05-02', 15, 14, '', 44),
(8, 'DSP000000008', '', '2018-05-22', 15, 13, '', 46);

-- --------------------------------------------------------

--
-- Table structure for table `dispute_text`
--

CREATE TABLE `dispute_text` (
  `id` int(10) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(1000) NOT NULL DEFAULT '',
  `sender_id` int(15) NOT NULL,
  `dispute_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispute_text`
--

INSERT INTO `dispute_text` (`id`, `date_sent`, `text`, `sender_id`, `dispute_id`) VALUES
(1, '2018-03-21 04:44:08', 'Ini sih S8 pak', 15, 2),
(2, '2018-03-27 10:00:21', 'Mr Lee, where is my handphone?', 23, 4),
(3, '2018-03-27 10:13:20', 'The dus is tergores', 23, 4),
(4, '2018-03-27 10:42:45', 'pak rusak', 15, 3),
(5, '2018-03-27 10:43:00', 'rusak gimana?', 13, 3),
(6, '2018-03-27 10:45:00', 'bagus ah', 13, 3),
(7, '2018-03-27 10:45:29', 'entahlah', 15, 3),
(8, '2018-04-23 16:37:39', 'Pak?', 15, 2),
(9, '2018-04-23 16:51:22', 'Apa S9 sih?', 15, 2),
(10, '2018-04-24 10:29:57', 'halo', 15, 6),
(11, '2018-04-24 10:37:59', 'sori2', 13, 3),
(12, '2018-04-30 15:17:25', 'Tolong segera dibalas ya Pak Lee.', 2, 4),
(13, '2018-05-02 03:41:58', 'Saya minta warna hitam', 15, 7),
(14, '2018-05-02 03:42:44', 'Mohon Mr Lei segera respon', 2, 7),
(15, '2018-05-02 03:43:49', 'Saya kirim warna putih', 14, 7),
(16, '2018-05-02 03:44:06', 'Waduh', 14, 7);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_item`
--

CREATE TABLE `favorite_item` (
  `id` int(10) NOT NULL,
  `customer_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_item`
--

INSERT INTO `favorite_item` (`id`, `customer_id`, `posted_item_id`) VALUES
(1, 6, 60),
(2, 4, 55),
(4, 4, 63),
(17, 5, 64),
(19, 4, 54);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `feedback_id` varchar(15) NOT NULL DEFAULT '',
  `rating` tinyint(4) NOT NULL DEFAULT '0',
  `feedback_text` varchar(5000) NOT NULL DEFAULT '',
  `feedback_reply` varchar(5000) NOT NULL DEFAULT '',
  `submitted_by` int(15) NOT NULL,
  `order_detail_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_id`, `rating`, `feedback_text`, `feedback_reply`, `submitted_by`, `order_detail_id`) VALUES
(4, 'FED0000000004', 5, 'Bagus, packaging rapi, mantap', '', 4, 21),
(5, 'FED0000000005', 5, 'Mantap', '', 4, 24),
(6, 'FED0000000006', 5, 'BAGUS', '', 4, 27),
(7, 'FED0000000007', 4, 'Warna dusnya terlalu cerah', 'Oh my God it\'s from the factory like that', 7, 31);

-- --------------------------------------------------------

--
-- Table structure for table `following_tenant`
--

CREATE TABLE `following_tenant` (
  `id` int(10) NOT NULL,
  `following_id` varchar(15) NOT NULL DEFAULT '',
  `tenant_id` int(15) NOT NULL,
  `customer_id` int(15) NOT NULL,
  `date_followed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_unfollowed` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following_tenant`
--

INSERT INTO `following_tenant` (`id`, `following_id`, `tenant_id`, `customer_id`, `date_followed`, `date_unfollowed`) VALUES
(5, 'FOL00000005', 4, 4, '2018-03-20 18:43:51', '2018-03-25 06:24:43'),
(6, 'FOL00000006', 6, 6, '2018-03-21 05:57:03', '0000-00-00 00:00:00'),
(7, 'FOL00000007', 0, 6, '2018-03-21 05:58:53', '0000-00-00 00:00:00'),
(8, 'FOL00000008', 0, 4, '2018-03-25 07:03:44', '0000-00-00 00:00:00'),
(9, 'FOL00000009', 5, 4, '2018-04-17 13:16:51', '2018-04-22 13:23:53'),
(10, 'FOL00000010', 4, 4, '2018-04-18 04:11:35', '2018-04-20 12:59:36'),
(11, 'FOL00000011', 8, 4, '2018-04-18 04:11:54', '0000-00-00 00:00:00'),
(12, 'FOL00000012', 4, 4, '2018-04-20 13:01:26', '2018-04-20 13:01:28'),
(13, 'FOL00000013', 5, 4, '2018-04-22 13:23:57', '2018-04-22 13:26:16'),
(14, 'FOL00000014', 5, 4, '2018-04-22 13:26:51', '2018-04-22 13:27:38'),
(15, 'FOL00000015', 5, 4, '2018-04-22 13:28:28', '2018-04-22 13:28:37'),
(16, 'FOL00000016', 5, 4, '2018-04-22 13:28:40', '2018-04-22 13:28:41'),
(17, 'FOL00000017', 4, 4, '2018-04-23 12:41:39', '2018-04-23 12:43:02'),
(18, 'FOL00000018', 4, 4, '2018-04-23 12:43:12', '2018-04-23 12:43:12'),
(19, 'FOL00000019', 4, 4, '2018-04-25 03:27:38', '2018-04-25 03:27:44'),
(20, 'FOL00000020', 4, 4, '2018-04-25 03:27:46', '2018-05-01 17:02:43'),
(21, 'FOL00000021', 4, 4, '2018-05-01 17:02:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hot_item`
--

CREATE TABLE `hot_item` (
  `id` int(10) NOT NULL,
  `hot_item_id` varchar(15) NOT NULL DEFAULT '',
  `promo_price` float NOT NULL DEFAULT '0',
  `promo_description` varchar(1000) NOT NULL DEFAULT '',
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_item`
--

INSERT INTO `hot_item` (`id`, `hot_item_id`, `promo_price`, `promo_description`, `posted_item_id`) VALUES
(1, 'HOT00000001', 1825000, 'Dahsyat', 54),
(2, 'HOT00000002', 1810000, 'Mantap', 56),
(3, 'HOT00000003', 2450000, 'Samsung Lucky J57', 84);

-- --------------------------------------------------------

--
-- Table structure for table `item_tag`
--

CREATE TABLE `item_tag` (
  `id` int(10) NOT NULL,
  `tag_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_inbox`
--

CREATE TABLE `message_inbox` (
  `id` int(10) NOT NULL,
  `inbox_id` varchar(15) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `party_one_id` int(15) NOT NULL,
  `party_two_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_inbox`
--

INSERT INTO `message_inbox` (`id`, `inbox_id`, `date_created`, `party_one_id`, `party_two_id`) VALUES
(12, 'MSG0000000012', '2018-03-20 18:11:48', 2, 16),
(13, 'MSG0000000013', '2018-03-20 18:11:48', 2, 15),
(14, 'MSG0000000014', '2018-03-21 04:37:12', 2, 18),
(15, 'MSG0000000015', '2018-03-21 05:58:19', 20, 3),
(16, 'MSG0000000016', '2018-03-21 06:33:36', 2, 22),
(17, 'MSG0000000017', '2018-03-21 06:33:36', 2, 20),
(18, 'MSG0000000018', '2018-03-27 10:10:22', 2, 23),
(19, 'MSG0000000019', '2018-04-03 08:50:13', 15, 3),
(20, 'MSG0000000020', '2018-04-23 12:55:39', 15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `message_text`
--

CREATE TABLE `message_text` (
  `id` int(10) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(5000) NOT NULL DEFAULT '',
  `sender_id` int(15) NOT NULL,
  `message_inbox_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_text`
--

INSERT INTO `message_text` (`id`, `date_sent`, `text`, `sender_id`, `message_inbox_id`) VALUES
(20, '2018-03-20 18:11:48', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: 86WMRJ', 2, 12),
(21, '2018-03-20 18:11:48', 'Nama Pengirim: Anto, Kode OTP: T8BSGY', 2, 13),
(22, '2018-03-21 04:31:34', 'Selamat! Anda memenangkan lelang untuk barang Samsung Galaxy S9 dengan harga Rp 2.500.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/22\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(23, '2018-03-21 04:37:12', 'Nama Pengirim: Tenant Admin, Kode OTP: 50ZSHZ', 2, 14),
(24, '2018-03-21 04:37:12', 'Nama Pengirim: Andi, Kode OTP: 87JE4K', 2, 13),
(25, '2018-03-21 05:06:31', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: MIW26Q', 2, 14),
(26, '2018-03-21 05:06:32', 'Nama Pengirim: Andi, Kode OTP: 0ZRAES', 2, 13),
(27, '2018-03-21 05:58:38', 'om admin, minta reward donk', 20, 15),
(28, '2018-03-21 06:33:36', 'Nama Pengirim: dicky test, Kode OTP: C7UUBC', 2, 16),
(29, '2018-03-21 06:33:36', 'Nama Pengirim: Oppa, Kode OTP: XRE5SG', 2, 16),
(30, '2018-03-21 06:33:36', 'Nama Pengirim: Andri, Kode OTP: 8DE1QQ', 2, 17),
(31, '2018-03-21 07:21:28', 'Selamat! Anda memenangkan lelang untuk barang iPhone 8 Plus dengan harga Rp 4.700.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/26\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(32, '2018-03-26 15:34:18', 'Nama Pengirim: Tenant Admin, Kode OTP: 59E7LN', 2, 12),
(33, '2018-03-26 15:34:18', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: DAVFEH', 2, 12),
(34, '2018-03-26 15:34:18', 'Nama Pengirim: Anto, Kode OTP: 3ZTE4K', 2, 13),
(35, '2018-03-27 10:10:22', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: IFQCCM', 2, 12),
(36, '2018-03-27 10:10:22', 'Nama Pengirim: Anto, Kode OTP: 9AUIQA', 2, 18),
(37, '2018-03-28 03:48:17', 'Selamat! Anda memenangkan lelang untuk barang iPhone 8 Plus dengan harga Rp 3.700.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/30\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 17),
(38, '2018-03-28 03:48:38', 'Selamat! Anda memenangkan lelang untuk barang iPhone 8 Plus dengan harga Rp 3.700.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/31\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 17),
(39, '2018-03-28 03:48:45', 'Selamat! Anda memenangkan lelang untuk barang iPhone 8 Plus dengan harga Rp 3.700.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/32\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 17),
(40, '2018-03-28 03:56:32', 'Selamat! Anda memenangkan lelang untuk barang iPhone 8 Plus dengan harga Rp 3.700.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/33\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 17),
(41, '2018-03-28 04:09:25', 'Selamat! Anda memenangkan lelang untuk barang iPhone X dengan harga Rp 2.750.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/34\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(42, '2018-03-28 04:12:09', 'Nama Pengirim: Tenant Admin, Kode OTP: OWRJTM', 2, 12),
(43, '2018-03-28 04:12:09', 'Nama Pengirim: Anto, Kode OTP: 0KY99T', 2, 13),
(44, '2018-03-28 05:34:45', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: JJZLAI', 2, 12),
(45, '2018-03-28 05:34:45', 'Nama Pengirim: Mr. Lei Jun, Kode OTP: WC82ND', 2, 12),
(46, '2018-03-28 05:34:45', 'Nama Pengirim: Anto, Kode OTP: JEINGU', 2, 13),
(47, '2018-04-03 08:50:21', 'Halo', 15, 19),
(48, '2018-04-03 10:37:38', 'Selamat! Anda memenangkan lelang untuk barang Oppo F7 dengan harga Rp 2.630.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/36\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(49, '2018-04-03 10:39:03', 'Selamat! Anda memenangkan lelang untuk barang Oppo F7 dengan harga Rp 2.630.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/37\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(50, '2018-04-23 13:54:53', 'coba', 15, 19),
(51, '2018-04-23 13:56:53', 'tes', 15, 19),
(52, '2018-04-23 14:39:56', 'tes', 15, 19),
(53, '2018-04-23 14:44:58', 'coba', 15, 19),
(54, '2018-04-23 15:03:27', 'terima kasih', 15, 13),
(55, '2018-04-23 17:42:57', 'Selamat malam', 15, 20),
(56, '2018-04-25 03:28:48', 'nuhun', 15, 13),
(57, '2018-05-02 03:38:11', 'Nama Pengirim: rio, Kode OTP: VF7SJT', 2, 12),
(58, '2018-05-02 03:38:11', 'Nama Pengirim: Mr. Lei Jun, Kode OTP: V2757W', 2, 12),
(59, '2018-05-02 03:38:11', 'Nama Pengirim: Anto, Kode OTP: 0QCGKC', 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `negotiated_price`
--

CREATE TABLE `negotiated_price` (
  `id` int(10) NOT NULL,
  `negotiation_id` varchar(15) NOT NULL DEFAULT '',
  `agreement_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discounted_price` float NOT NULL DEFAULT '0',
  `status` varchar(500) NOT NULL DEFAULT '',
  `order_id` int(15) NOT NULL,
  `tenant_id` int(15) NOT NULL,
  `customer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `order_id` varchar(15) NOT NULL DEFAULT '',
  `quantity` int(15) NOT NULL DEFAULT '0',
  `offered_price` float NOT NULL DEFAULT '0',
  `sold_price` float NOT NULL DEFAULT '0',
  `order_status` varchar(100) NOT NULL DEFAULT '',
  `otp_deliverer_to_tenant` varchar(20) NOT NULL DEFAULT '',
  `otp_deliverer_to_customer` varchar(20) NOT NULL DEFAULT '',
  `collection_method` varchar(1000) NOT NULL DEFAULT '',
  `otp_customer_to_deliverer` varchar(20) NOT NULL DEFAULT '',
  `otp_tenant_to_deliverer` varchar(20) NOT NULL DEFAULT '',
  `date_repr_decided` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `billing_id` int(15) NOT NULL,
  `posted_item_variance_id` int(15) NOT NULL,
  `deliverer_id` int(15) DEFAULT NULL,
  `tnt_paid_receipt_id` int(15) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `quantity`, `offered_price`, `sold_price`, `order_status`, `otp_deliverer_to_tenant`, `otp_deliverer_to_customer`, `collection_method`, `otp_customer_to_deliverer`, `otp_tenant_to_deliverer`, `date_repr_decided`, `billing_id`, `posted_item_variance_id`, `deliverer_id`, `tnt_paid_receipt_id`, `voucher_id`) VALUES
(21, 'ORD000000021', 1, 2280000, 2280000, 'DONE', '86WMRJ', '', '', 'T8BSGY', '', '0000-00-00 00:00:00', 21, 65, 5, 2, NULL),
(22, 'ORD000000022', 2, 1950000, 1950000, 'DONE', '86WMRJ', '', '', 'T8BSGY', '', '0000-00-00 00:00:00', 21, 62, 5, 2, NULL),
(23, 'ORD000000023', 1, 2500000, 2500000, 'DONE', '50ZSHZ', '', '', '87JE4K', '', '0000-00-00 00:00:00', 22, 70, 6, NULL, NULL),
(24, 'ORD000000024', 1, 1950000, 1950000, 'DONE', 'MIW26Q', '', '', '0ZRAES', '', '0000-00-00 00:00:00', 23, 62, 6, 2, NULL),
(25, 'ORD000000025', 3, 2500000, 2500000, 'DONE', 'C7UUBC', '', '', '8DE1QQ', '', '0000-00-00 00:00:00', 24, 71, 7, 3, NULL),
(26, 'ORD000000026', 2, 3500000, 3500000, 'DONE', 'XRE5SG', '', '', '8DE1QQ', '', '0000-00-00 00:00:00', 25, 72, 7, 1, NULL),
(27, 'ORD000000027', 1, 4700000, 4700000, 'DONE', '59E7LN', '', '', '3ZTE4K', '', '0000-00-00 00:00:00', 26, 73, 5, NULL, NULL),
(28, 'ORD000000028', 1, 1950000, 1950000, 'DONE', 'DAVFEH', '', '', '3ZTE4K', '', '0000-00-00 00:00:00', 27, 62, 5, 4, NULL),
(29, 'ORD000000029', 1, 2280000, 2280000, 'DONE', 'DAVFEH', '', '', '3ZTE4K', '', '0000-00-00 00:00:00', 27, 64, 5, 4, NULL),
(30, 'ORD000000030', 1, 1950000, 1950000, 'DONE', 'DAVFEH', '', '', '3ZTE4K', '', '0000-00-00 00:00:00', 28, 62, 5, 4, NULL),
(31, 'ORD000000031', 1, 1950000, 1950000, 'DONE', 'IFQCCM', '', '', '9AUIQA', '', '0000-00-00 00:00:00', 29, 63, 5, 5, NULL),
(32, 'ORD000000032', 1, 3700000, 3700000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 30, 73, NULL, NULL, NULL),
(33, 'ORD000000033', 1, 3700000, 3700000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 31, 73, NULL, NULL, NULL),
(34, 'ORD000000034', 1, 3700000, 3700000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 32, 73, NULL, NULL, NULL),
(35, 'ORD000000035', 1, 3700000, 3700000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 33, 73, NULL, NULL, NULL),
(36, 'ORD000000036', 1, 2750000, 2750000, 'DONE', 'OWRJTM', '', '', '0KY99T', '', '0000-00-00 00:00:00', 34, 76, 5, NULL, NULL),
(37, 'ORD000000037', 2, 1950000, 1950000, 'DONE', 'JJZLAI', '', '', 'JEINGU', '', '0000-00-00 00:00:00', 35, 62, 5, 7, NULL),
(38, 'ORD000000038', 1, 1850000, 1850000, 'DONE', 'WC82ND', '', '', 'JEINGU', '', '0000-00-00 00:00:00', 35, 66, 5, 6, NULL),
(39, 'ORD000000039', 1, 2630000, 2630000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 36, 77, NULL, NULL, NULL),
(40, 'ORD000000040', 1, 2630000, 2630000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 37, 77, NULL, NULL, NULL),
(41, 'ORD000000041', 1, 1950000, 1950000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 38, 62, NULL, NULL, NULL),
(42, 'ORD000000042', 1, 1950000, 1950000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 39, 62, NULL, NULL, 1),
(43, 'ORD000000043', 1, 3500000, 3500000, 'PICKING_FROM_TENANT', 'VF7SJT', '', '', '0QCGKC', '', '0000-00-00 00:00:00', 40, 79, 5, NULL, NULL),
(44, 'ORD000000044', 1, 1850000, 1850000, 'DONE', 'V2757W', '', '', '0QCGKC', '', '0000-00-00 00:00:00', 41, 66, 5, 8, NULL),
(45, 'ORD000000045', 1, 1950000, 1950000, 'QUEUED', '', '', '', '', '', '0000-00-00 00:00:00', 42, 62, NULL, NULL, NULL),
(46, 'ORD000000046', 1, 2500000, 2500000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 43, 135, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_history`
--

CREATE TABLE `order_status_history` (
  `id` int(11) NOT NULL,
  `order_status_history_id` varchar(128) NOT NULL DEFAULT '',
  `order_details_id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT '',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status_history`
--

INSERT INTO `order_status_history` (`id`, `order_status_history_id`, `order_details_id`, `status`, `date_added`) VALUES
(25, 'OST0000000025', 21, 'WAITING_FOR_PAYMENT', '2018-03-20 18:00:46'),
(26, 'OST0000000026', 22, 'WAITING_FOR_PAYMENT', '2018-03-20 18:00:46'),
(27, 'OST0000000027', 21, 'QUEUED', '2018-03-20 18:01:23'),
(28, 'OST0000000028', 22, 'QUEUED', '2018-03-20 18:01:23'),
(29, 'OST0000000029', 21, 'PICKING_FROM_TENANT', '2018-03-20 18:11:48'),
(30, 'OST0000000030', 22, 'PICKING_FROM_TENANT', '2018-03-20 18:11:48'),
(31, 'OST0000000031', 21, 'DELIVERING_TO_CUSTOMER', '2018-03-20 18:13:03'),
(32, 'OST0000000032', 22, 'DELIVERING_TO_CUSTOMER', '2018-03-20 18:13:03'),
(33, 'OST0000000033', 21, 'RECEIVED', '2018-03-20 18:27:55'),
(34, 'OST0000000034', 22, 'RECEIVED', '2018-03-20 18:27:55'),
(40, 'OST0000000040', 21, 'DONE', '2018-03-20 18:35:48'),
(41, 'OST0000000041', 22, 'DONE', '2018-03-20 18:37:25'),
(43, 'OST0000000043', 23, 'WAITING_FOR_PAYMENT', '2018-03-21 04:31:34'),
(44, 'OST0000000044', 23, 'QUEUED', '2018-03-21 04:34:59'),
(45, 'OST0000000045', 23, 'DELIVERING_TO_CUSTOMER', '2018-03-21 04:37:12'),
(46, 'OST0000000046', 23, 'RECEIVED', '2018-03-21 04:38:34'),
(47, 'OST0000000047', 24, 'WAITING_FOR_PAYMENT', '2018-03-21 05:05:19'),
(48, 'OST0000000048', 24, 'QUEUED', '2018-03-21 05:05:39'),
(49, 'OST0000000049', 24, 'PICKING_FROM_TENANT', '2018-03-21 05:06:31'),
(50, 'OST0000000050', 24, 'DELIVERING_TO_CUSTOMER', '2018-03-21 05:09:25'),
(51, 'OST0000000051', 24, 'RECEIVED', '2018-03-21 05:10:40'),
(52, 'OST0000000052', 24, 'DONE', '2018-03-21 05:11:11'),
(53, 'OST0000000053', 25, 'WAITING_FOR_PAYMENT', '2018-03-21 06:21:19'),
(54, 'OST0000000054', 25, 'QUEUED', '2018-03-21 06:22:26'),
(55, 'OST0000000055', 26, 'WAITING_FOR_PAYMENT', '2018-03-21 06:29:59'),
(56, 'OST0000000056', 26, 'QUEUED', '2018-03-21 06:30:05'),
(57, 'OST0000000057', 23, 'DONE', '2018-03-21 06:31:19'),
(58, 'OST0000000058', 25, 'PICKING_FROM_TENANT', '2018-03-21 06:33:36'),
(59, 'OST0000000059', 26, 'PICKING_FROM_TENANT', '2018-03-21 06:33:36'),
(60, 'OST0000000060', 26, 'DELIVERING_TO_CUSTOMER', '2018-03-21 06:35:15'),
(61, 'OST0000000061', 26, 'RECEIVED', '2018-03-21 06:36:47'),
(62, 'OST0000000062', 26, 'DONE', '2018-03-21 06:37:27'),
(63, 'OST0000000063', 25, 'DELIVERING_TO_CUSTOMER', '2018-03-21 06:49:17'),
(64, 'OST0000000064', 25, 'RECEIVED', '2018-03-21 06:52:19'),
(65, 'OST0000000065', 25, 'DONE', '2018-03-21 06:53:41'),
(66, 'OST0000000066', 27, 'WAITING_FOR_PAYMENT', '2018-03-21 07:21:28'),
(67, 'OST0000000067', 27, 'QUEUED', '2018-03-21 07:22:15'),
(68, 'OST0000000068', 27, 'QUEUED', '2018-03-21 07:22:16'),
(69, 'OST0000000069', 27, 'QUEUED', '2018-03-21 07:22:16'),
(70, 'OST0000000070', 28, 'WAITING_FOR_PAYMENT', '2018-03-25 05:44:01'),
(71, 'OST0000000071', 29, 'WAITING_FOR_PAYMENT', '2018-03-25 05:44:01'),
(72, 'OST0000000072', 28, 'QUEUED', '2018-03-25 05:47:00'),
(73, 'OST0000000073', 29, 'QUEUED', '2018-03-25 05:47:00'),
(74, 'OST0000000074', 30, 'WAITING_FOR_PAYMENT', '2018-03-26 15:34:00'),
(75, 'OST0000000075', 30, 'QUEUED', '2018-03-26 15:34:03'),
(76, 'OST0000000076', 27, 'DELIVERING_TO_CUSTOMER', '2018-03-26 15:34:17'),
(77, 'OST0000000077', 28, 'PICKING_FROM_TENANT', '2018-03-26 15:34:17'),
(78, 'OST0000000078', 29, 'PICKING_FROM_TENANT', '2018-03-26 15:34:17'),
(79, 'OST0000000079', 30, 'PICKING_FROM_TENANT', '2018-03-26 15:34:17'),
(80, 'OST0000000080', 27, 'RECEIVED', '2018-03-26 15:34:34'),
(81, 'OST0000000081', 28, 'DELIVERING_TO_CUSTOMER', '2018-03-26 15:37:40'),
(82, 'OST0000000082', 30, 'DELIVERING_TO_CUSTOMER', '2018-03-26 15:37:40'),
(83, 'OST0000000083', 29, 'DELIVERING_TO_CUSTOMER', '2018-03-26 15:37:40'),
(84, 'OST0000000084', 28, 'RECEIVED', '2018-03-26 15:37:55'),
(85, 'OST0000000085', 29, 'RECEIVED', '2018-03-26 15:37:55'),
(86, 'OST0000000086', 30, 'RECEIVED', '2018-03-26 15:37:55'),
(87, 'OST0000000087', 30, 'DONE', '2018-03-26 15:40:00'),
(88, 'OST0000000088', 28, 'DONE', '2018-03-26 15:42:57'),
(89, 'OST0000000089', 29, 'DONE', '2018-03-26 15:43:56'),
(90, 'OST0000000090', 27, 'DONE', '2018-03-26 15:45:47'),
(91, 'OST0000000091', 31, 'WAITING_FOR_PAYMENT', '2018-03-27 09:19:54'),
(92, 'OST0000000092', 31, 'QUEUED', '2018-03-27 09:20:01'),
(93, 'OST0000000093', 31, 'PICKING_FROM_TENANT', '2018-03-27 10:10:21'),
(94, 'OST0000000094', 31, 'DELIVERING_TO_CUSTOMER', '2018-03-27 10:11:07'),
(95, 'OST0000000095', 31, 'RECEIVED', '2018-03-27 10:12:20'),
(96, 'OST0000000096', 31, 'DONE', '2018-03-27 10:13:32'),
(97, 'OST0000000097', 32, 'WAITING_FOR_PAYMENT', '2018-03-28 03:48:16'),
(98, 'OST0000000098', 33, 'WAITING_FOR_PAYMENT', '2018-03-28 03:48:37'),
(99, 'OST0000000099', 34, 'WAITING_FOR_PAYMENT', '2018-03-28 03:48:45'),
(100, 'OST0000000100', 35, 'WAITING_FOR_PAYMENT', '2018-03-28 03:56:32'),
(101, 'OST0000000101', 36, 'WAITING_FOR_PAYMENT', '2018-03-28 04:09:25'),
(102, 'OST0000000102', 36, 'QUEUED', '2018-03-28 04:11:43'),
(103, 'OST0000000103', 36, 'DELIVERING_TO_CUSTOMER', '2018-03-28 04:12:08'),
(104, 'OST0000000104', 36, 'RECEIVED', '2018-03-28 04:14:01'),
(105, 'OST0000000105', 36, 'DONE', '2018-03-28 04:15:16'),
(106, 'OST0000000106', 37, 'WAITING_FOR_PAYMENT', '2018-03-28 05:34:12'),
(107, 'OST0000000107', 38, 'WAITING_FOR_PAYMENT', '2018-03-28 05:34:12'),
(108, 'OST0000000108', 37, 'QUEUED', '2018-03-28 05:34:16'),
(109, 'OST0000000109', 38, 'QUEUED', '2018-03-28 05:34:16'),
(110, 'OST0000000110', 37, 'PICKING_FROM_TENANT', '2018-03-28 05:34:45'),
(111, 'OST0000000111', 38, 'PICKING_FROM_TENANT', '2018-03-28 05:34:45'),
(112, 'OST0000000112', 37, 'DELIVERING_TO_CUSTOMER', '2018-03-28 05:35:31'),
(113, 'OST0000000113', 38, 'DELIVERING_TO_CUSTOMER', '2018-03-28 05:35:35'),
(114, 'OST0000000114', 37, 'RECEIVED', '2018-03-28 05:35:51'),
(115, 'OST0000000115', 38, 'RECEIVED', '2018-03-28 05:35:51'),
(116, 'OST0000000116', 38, 'DONE', '2018-03-28 05:36:15'),
(117, 'OST0000000117', 37, 'DONE', '2018-03-28 05:36:17'),
(118, 'OST0000000118', 39, 'WAITING_FOR_PAYMENT', '2018-04-03 10:37:38'),
(119, 'OST0000000119', 40, 'WAITING_FOR_PAYMENT', '2018-04-03 10:39:03'),
(120, 'OST0000000120', 41, 'WAITING_FOR_PAYMENT', '2018-04-18 03:26:15'),
(121, 'OST0000000121', 42, 'WAITING_FOR_PAYMENT', '2018-04-18 03:44:00'),
(122, 'OST0000000122', 43, 'WAITING_FOR_PAYMENT', '2018-04-23 17:16:46'),
(123, 'OST0000000123', 43, 'QUEUED', '2018-04-23 17:17:16'),
(124, 'OST0000000124', 44, 'WAITING_FOR_PAYMENT', '2018-05-02 03:37:26'),
(125, 'OST0000000125', 44, 'QUEUED', '2018-05-02 03:37:38'),
(126, 'OST0000000126', 43, 'PICKING_FROM_TENANT', '2018-05-02 03:38:11'),
(127, 'OST0000000127', 44, 'PICKING_FROM_TENANT', '2018-05-02 03:38:11'),
(128, 'OST0000000128', 44, 'DELIVERING_TO_CUSTOMER', '2018-05-02 03:39:13'),
(129, 'OST0000000129', 44, 'RECEIVED', '2018-05-02 03:40:25'),
(130, 'OST0000000130', 44, 'DONE', '2018-05-02 04:04:55'),
(131, 'OST0000000131', 45, 'WAITING_FOR_PAYMENT', '2018-05-11 08:39:16'),
(132, 'OST0000000132', 45, 'QUEUED', '2018-05-11 08:39:23'),
(133, 'OST0000000133', 46, 'WAITING_FOR_PAYMENT', '2018-05-11 08:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `payment_id` varchar(15) NOT NULL DEFAULT '',
  `payment_method` varchar(500) NOT NULL DEFAULT '',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `credit_card` varchar(500) NOT NULL DEFAULT '',
  `paid_amount` float NOT NULL DEFAULT '0',
  `billing_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `payment_method`, `payment_date`, `credit_card`, `paid_amount`, `billing_id`) VALUES
(11, 'PAY000000011', 'DOKU', '2018-03-20 18:01:23', '', 6180000, 21),
(12, 'PAY000000012', 'DOKU', '2018-03-21 04:34:59', '', 2500000, 22),
(13, 'PAY000000013', 'DOKU', '2018-03-21 05:05:39', '', 1950000, 23),
(14, 'PAY000000014', 'DOKU', '2018-03-21 06:22:26', '', 7500000, 24),
(15, 'PAY000000015', 'DOKU', '2018-03-21 06:30:05', '', 7000000, 25),
(16, 'PAY000000016', 'DOKU', '2018-03-21 07:22:16', '', 4700000, 26),
(17, 'PAY000000017', 'DOKU', '2018-03-25 05:47:00', '', 4230000, 27),
(18, 'PAY000000018', 'DOKU', '2018-03-26 15:34:03', '', 1950000, 28),
(19, 'PAY000000019', 'DOKU', '2018-03-27 09:20:01', '', 1950000, 29),
(20, 'PAY000000020', 'DOKU', '2018-03-28 04:11:43', '', 2750000, 34),
(21, 'PAY000000021', 'DOKU', '2018-03-28 05:34:16', '', 5750000, 35),
(22, 'PAY000000022', 'DOKU', '0000-00-00 00:00:00', '', 0, 38),
(23, 'PAY000000023', 'DOKU', '0000-00-00 00:00:00', '', 0, 39),
(24, 'PAY000000024', 'DOKU', '2018-04-23 17:17:16', '', 3500000, 40),
(25, 'PAY000000025', 'DOKU', '0000-00-00 00:00:00', '', 0, 36),
(26, 'PAY000000026', 'DOKU', '2018-05-02 03:37:38', '', 1850000, 41),
(27, 'PAY000000027', 'DOKU', '2018-05-11 08:39:23', '', 1950000, 42),
(28, 'PAY000000028', 'DOKU', '0000-00-00 00:00:00', '', 0, 43);

-- --------------------------------------------------------

--
-- Table structure for table `point_history`
--

CREATE TABLE `point_history` (
  `id` int(10) NOT NULL,
  `history_id` varchar(15) NOT NULL DEFAULT '',
  `point_received` int(11) NOT NULL,
  `point_description` varchar(500) DEFAULT NULL,
  `date_received` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `billing_id` int(15) NOT NULL DEFAULT '0',
  `customer_id` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_history`
--

INSERT INTO `point_history` (`id`, `history_id`, `point_received`, `point_description`, `date_received`, `billing_id`, `customer_id`) VALUES
(5, 'PTH0000000005', 618, '', '2018-03-20 18:01:23', 21, 4),
(6, 'PTH0000000006', 250, '', '2018-03-21 04:35:00', 22, 4),
(7, 'PTH0000000007', 195, '', '2018-03-21 05:05:39', 23, 4),
(8, 'PTH0000000008', 750, '', '2018-03-21 06:22:26', 24, 6),
(9, 'PTH0000000009', 700, '', '2018-03-21 06:30:05', 25, 6),
(10, 'PTH0000000010', 470, '', '2018-03-21 07:22:15', 26, 4),
(11, 'PTH0000000011', 470, '', '2018-03-21 07:22:16', 26, 4),
(12, 'PTH0000000012', 470, '', '2018-03-21 07:22:16', 26, 4),
(13, 'PTH0000000013', 423, '', '2018-03-25 05:47:00', 27, 4),
(14, 'PTH0000000014', 195, '', '2018-03-26 15:34:03', 28, 4),
(15, 'PTH0000000015', 195, '', '2018-03-27 09:20:01', 29, 7),
(16, 'PTH0000000016', 275, '', '2018-03-28 04:11:43', 34, 4),
(17, 'PTH0000000017', 575, '', '2018-03-28 05:34:16', 35, 4),
(18, 'PTH0000000018', 350, '', '2018-04-23 17:17:16', 40, 4),
(19, 'PTH0000000019', 185, '', '2018-05-02 03:37:38', 41, 4),
(20, 'PTH0000000020', 195, '', '2018-05-11 08:39:23', 42, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posted_item`
--

CREATE TABLE `posted_item` (
  `id` int(10) NOT NULL,
  `posted_item_id` varchar(15) NOT NULL DEFAULT '',
  `posted_item_name` varchar(500) NOT NULL DEFAULT '',
  `price` float NOT NULL DEFAULT '0',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expired` timestamp NULL DEFAULT NULL,
  `bidding_max_range` int(11) DEFAULT NULL,
  `item_type` varchar(500) NOT NULL DEFAULT '',
  `unit_weight` int(10) NOT NULL DEFAULT '0',
  `posted_item_description` varchar(1000) NOT NULL DEFAULT '',
  `image_one_name` varchar(500) NOT NULL DEFAULT '',
  `category_id` int(15) NOT NULL,
  `tenant_id` int(15) NOT NULL,
  `brand_id` int(15) NOT NULL,
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_item`
--

INSERT INTO `posted_item` (`id`, `posted_item_id`, `posted_item_name`, `price`, `date_posted`, `date_updated`, `date_expired`, `bidding_max_range`, `item_type`, `unit_weight`, `posted_item_description`, `image_one_name`, `category_id`, `tenant_id`, `brand_id`, `is_confirmed`) VALUES
(54, 'ITM000000054', 'Samsung Galaxy J5 2017', 1950000, '2018-03-20 17:39:29', '2018-03-20 17:39:29', NULL, 0, 'ORDER', 190, 'Handphone Mid Tier', 'img/upload/TNT00004/ITM000000054/default.jpg', 5, 4, 5, 0),
(55, 'ITM000000055', 'Samsung Galaxy J7', 2280000, '2018-03-20 17:43:18', '2018-03-20 17:43:18', NULL, 0, 'ORDER', 195, 'Handphone Mid Tier', 'img/upload/TNT00004/ITM000000055/default.jpg', 5, 4, 5, 0),
(56, 'ITM000000056', 'Xiaomi Redmi Note 4', 1850000, '2018-03-20 17:45:00', '2018-03-20 17:45:00', NULL, 0, 'ORDER', 183, 'Handphone Xiaomi Mid Tier', 'img/upload/TNT00005/ITM000000056/default.jpg', 5, 5, 6, 0),
(59, 'ITM000000059', 'Samsung Galaxy S9', 2000000, '2018-03-21 03:57:25', '2018-03-21 04:26:54', '2018-03-21 04:28:00', 1000000, 'BID', 200, 'Samsung Galaxy S9 Tahun 2018', 'img/upload/ADM00001/ITM000000059/default.jpg', 5, 0, 5, 0),
(60, 'ITM000000060', 'xiomi redmi 5 plus', 2500000, '2018-03-21 05:25:38', '2018-03-21 05:25:38', NULL, 0, 'ORDER', 2, 'xiomi redmi 5 plus', 'img/upload/TNT00006/ITM000000060/default.jpg', 5, 6, 6, 0),
(61, 'ITM000000061', 'oppo f7 32GB', 3500000, '2018-03-21 06:28:34', '2018-03-21 06:28:34', NULL, 0, 'ORDER', 300, 'oppo f7 terbaru ', 'img/upload/TNT00007/ITM000000061/default.jpg', 5, 7, 7, 0),
(62, 'ITM000000062', 'iPhone 8 Plus', 3700000, '2018-03-21 07:05:47', '2018-03-21 07:12:22', '2018-03-21 07:20:00', 1000000, 'BID', 200, 'iPhone terbaru 2018', 'img/upload/ADM00001/ITM000000062/default.jpg', 5, 0, 4, 0),
(63, 'ITM000000063', 'Samsung Galaxy S9', 1390000, '2018-03-25 05:55:00', '2018-03-26 17:37:14', '2018-03-27 16:59:00', 10000, 'BID', 210, 'Samsung Galaxy S9 Tahun 2018', 'img/upload/ADM00001/ITM000000063/default.jpg', 5, 0, 5, 0),
(64, 'ITM000000064', '', 25000, '2018-03-27 13:32:04', '2018-03-27 13:32:04', NULL, 0, 'REPAIR', 0, 'Servis Handphone Samsung', '', 5, 4, 5, 0),
(65, 'ITM000000065', 'iPhone X', 2750000, '2018-03-28 03:39:11', '2018-03-28 03:42:26', '2018-03-28 04:50:00', 25000, 'BID', 200, 'iPhone Best 2018', 'img/upload/ADM00001/ITM000000065/default.jpg', 5, 0, 4, 0),
(66, 'ITM000000066', 'Oppo F7', 3020000, '2018-03-28 04:59:07', '2018-04-30 13:45:07', '2018-04-29 10:39:03', 10000, 'BID', 200, 'HP Oppo Terbaru', 'img/upload/ADM00001/ITM000000066/default.jpg', 5, 0, 7, 1),
(68, 'ITM000000068', 'laptop lenovo', 3500000, '2018-04-04 03:36:20', '2018-04-04 03:36:20', NULL, 0, 'ORDER', 1000, 'laptop lenovo ideapad 340', 'img/upload/TNT00008/ITM000000068/default.jpg', 7, 8, 6, 0),
(84, 'ITM000000084', 'Samsung J57', 2500000, '2018-04-27 16:53:17', '2018-04-27 16:53:17', NULL, 0, 'ORDER', 140, 'Samsung Antara J5 atau J7', 'img/upload/TNT00004/ITM000000084/default.jpg', 5, 4, 5, 0),
(85, 'ITM000000085', 'Xiaomi Redmi', 4000000, '2018-04-27 17:01:42', '2018-04-27 17:01:42', NULL, 0, 'ORDER', 180, 'Xiaomi Redmi\r\n\r\nSpesifikasi:\r\n - RAM 4GB\r\n - Layar 5\"\r\n - Android Kitkat', 'img/upload/TNT00004/ITM000000085/default.jpg', 5, 4, 6, 0),
(89, 'ITM000000089', 'Samsung Galaxy J5', 120000, '2018-04-30 15:01:08', '2018-05-01 17:11:17', '2018-05-02 13:00:00', 10000, 'BID', 150, 'Samsung masih bagus', 'img/upload/ADM00001/ITM000000089/default.jpg', 5, 0, 5, 1),
(90, 'ITM000000090', 'Samsung J5', 2750000, '2018-05-02 03:23:34', '2018-05-02 03:23:34', NULL, 0, 'ORDER', 150, 'Samsung 2016\r\n\r\nRAM: 1GB\r\nStorage: 8GB\r\n4G: belum', 'img/upload/TNT00004/ITM000000090/default.jpg', 5, 4, 5, 0),
(91, 'ITM000000091', 'Samsung Galaxy J7', 10000, '2018-05-02 04:02:06', '2018-05-02 04:02:06', '2018-05-04 17:00:00', 10000, 'BID', 150, 'Samsung Galaxy 2017', 'img/upload/ADM00001/ITM000000091/default.jpg', 5, 0, 5, 1),
(92, 'ITM000000092', 'Oppo F7', 4199000, '2018-05-24 13:47:35', '2018-05-24 13:47:35', NULL, 0, 'ORDER', 180, 'Oppo Terbaru 2018\r\n\r\nNetwork Technology \r\nGSM / HSPA / LTE\r\nLaunch Announced 2018, March\r\nStatus Coming soon. Exp. release 2018, April 21st\r\nBody Dimensions 156 x 75.3 x 7.8 mm (6.14 x 2.96 x 0.31 in)\r\nWeight 158 g (5.57 oz)\r\nSIM Dual SIM (Nano-SIM, dual stand-by)\r\nDisplay Type LTPS IPS LCD capacitive touchscreen, 16M colors\r\nSize 6.23 inches, 96.9 cm2 (~82.5% screen-to-body ratio)\r\nResolution 1080 x 2280 pixels (~405 ppi density)\r\nMultitouch Yes\r\nProtection Corning Gorilla Glass 5\r\n- ColorOS 5.0\r\nPlatform OS Android 8.1 (Oreo)\r\nChipset Mediatek Helio P60\r\nCPU Octa-core (4x2.0 GHz Cortex-A73 & 4x2.0 GHz Cortex-A53)\r\nGPU Mali-G72 MP3\r\nMemory Card slot microSD, up to 256 GB (dedicated slot)\r\nInternal 64 GB, 4 GB RAM or 128 GB, 6 GB RAM\r\nCamera Primary 16 MP, f/1.8, phase detection autofocus, LED flash\r\nFeatures Geo-tagging, touch focus, face detection, HDR, panorama\r\nVideo 1080p@30fps\r\nSecondary 25 MP, f/2.0, 1080p\r\nSound Alert types Vibration; MP3, WAV ringtones\r\nLoudspeaker Yes\r\n3.5mm ', 'img/upload/TNT00004/ITM000000092/default.jpg', 5, 4, 7, 0),
(93, 'ITM000000093', 'Samsung Galaxy J7', 50000, '2018-05-24 14:08:48', '2018-05-24 14:08:48', '2018-05-30 17:00:00', 10000, 'BID', 180, 'BARU 2017', 'img/upload/ADM00001/ITM000000093/default.jpg', 5, 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posted_item_variance`
--

CREATE TABLE `posted_item_variance` (
  `id` int(10) NOT NULL,
  `detail_id` varchar(15) NOT NULL DEFAULT '',
  `var_type` varchar(100) NOT NULL DEFAULT '',
  `var_description` varchar(2000) NOT NULL DEFAULT '',
  `quantity_available` int(11) NOT NULL DEFAULT '0',
  `image_two_name` varchar(500) NOT NULL,
  `image_three_name` varchar(500) NOT NULL,
  `image_four_name` varchar(500) NOT NULL,
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_item_variance`
--

INSERT INTO `posted_item_variance` (`id`, `detail_id`, `var_type`, `var_description`, `quantity_available`, `image_two_name`, `image_three_name`, `image_four_name`, `posted_item_id`) VALUES
(62, 'VAR0000000062', 'Warna', 'Putih', 10, 'img/upload/TNT00004/ITM000000054/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 54),
(63, 'VAR0000000063', 'Warna', 'Hitam', 19, 'img/upload/TNT00004/ITM000000054/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 54),
(64, 'VAR0000000064', 'Warna', 'Hitam', 9, 'img/upload/TNT00004/ITM000000055/0-1.jpg', 'img/upload/TNT00004/ITM000000055/0-2.jpg', 'img/default_item.png', 55),
(65, 'VAR0000000065', 'Warna', 'Putih', 9, 'img/upload/TNT00004/ITM000000055/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 55),
(66, 'VAR0000000066', 'Warna', 'Hitam', 8, 'img/upload/TNT00005/ITM000000056/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(67, 'VAR0000000067', 'Warna', 'Putih', 10, 'img/upload/TNT00005/ITM000000056/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(70, 'VAR0000000070', 'Warna', 'Hitam', -1, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 59),
(71, 'VAR0000000071', 'warna', 'hitam', -1, 'img/upload/TNT00006/ITM000000060/0-1.jpg', 'img/upload/TNT00006/ITM000000060/0-2.jpg', 'img/upload/TNT00006/ITM000000060/0-3.jpg', 60),
(72, 'VAR0000000072', 'warna', 'hitam', 0, 'img/upload/TNT00007/ITM000000061/0-1.jpg', 'img/upload/TNT00007/ITM000000061/0-2.jpg', 'img/upload/TNT00007/ITM000000061/0-3.jpg', 61),
(73, 'VAR0000000073', 'Warna', 'Hitam', -5, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 62),
(74, 'VAR0000000074', 'Warna', 'Hitam', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 63),
(75, 'VAR0000000075', '', '', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 64),
(76, 'VAR0000000076', 'Warna', 'Putih', -1, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 65),
(77, 'VAR0000000077', 'Warna', 'Putih', -2, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 66),
(79, 'VAR0000000079', 'Warna', 'hitam', 0, 'img/upload/TNT00008/ITM000000068/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 68),
(135, 'VAR0000000135', 'Warna', 'Hitam', 9, 'img/upload/TNT00004/ITM000000084/0-1.jpg', 'img/upload/TNT00004/ITM000000084/0-2.jpg', 'img/upload/TNT00004/ITM000000084/0-3.jpg', 84),
(136, 'VAR0000000136', 'Warna', 'Putih', 5, 'img/upload/TNT00004/ITM000000084/1-1.jpg', 'img/upload/TNT00004/ITM000000084/1-2.jpg', 'img/default_item.png', 84),
(137, 'VAR0000000137', 'Warna', 'Merah', 3, 'img/upload/TNT00004/ITM000000084/2-1.jpg', 'img/default_item.png', 'img/default_item.png', 84),
(138, 'VAR0000000138', 'Warna', 'Hitam', 10, 'img/upload/TNT00004/ITM000000085/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 85),
(139, 'VAR0000000139', 'Warna', 'Putih', 5, 'img/upload/TNT00004/ITM000000085/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 85),
(142, 'VAR0000000142', 'Warna', 'Hitam', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 89),
(143, 'VAR0000000143', 'Warna', 'Putih', 10, 'img/upload/TNT00004/ITM000000090/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 90),
(144, 'VAR0000000144', 'Warna', 'Hitam', 20, 'img/upload/TNT00004/ITM000000090/1-1.jpg', 'img/upload/TNT00004/ITM000000090/1-2.jpg', 'img/default_item.png', 90),
(145, 'VAR0000000145', 'Warna', 'Hitam', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 91),
(146, 'VAR0000000146', 'Warna', 'Merah', 30, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 92),
(147, 'VAR0000000147', 'Warna', 'Hitam', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 93);

-- --------------------------------------------------------

--
-- Table structure for table `redeem_reward`
--

CREATE TABLE `redeem_reward` (
  `id` int(10) NOT NULL,
  `redeem_id` varchar(15) NOT NULL DEFAULT '',
  `reward_id` int(15) NOT NULL,
  `customer_id` int(15) NOT NULL,
  `date_redeemed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redeem_reward`
--

INSERT INTO `redeem_reward` (`id`, `redeem_id`, `reward_id`, `customer_id`, `date_redeemed`, `status`) VALUES
(1, 'RDR00000001', 1, 4, '2018-03-27 10:46:30', 'PENDING'),
(2, 'RDR00000002', 1, 4, '2018-04-27 11:31:59', 'PENDING'),
(3, 'RDR00000003', 1, 4, '2018-05-01 17:22:52', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `redeem_voucher`
--

CREATE TABLE `redeem_voucher` (
  `id` int(10) NOT NULL,
  `redeem_id` varchar(15) NOT NULL DEFAULT '',
  `voucher_id` int(15) NOT NULL,
  `billing_id` int(15) NOT NULL,
  `date_redeemed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id` int(10) NOT NULL,
  `reward_id` varchar(15) NOT NULL DEFAULT '',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expired` timestamp NULL DEFAULT NULL,
  `points_needed` int(10) NOT NULL DEFAULT '0',
  `reward_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `reward_id`, `date_added`, `date_expired`, `points_needed`, `reward_description`) VALUES
(1, 'RWD00000001', '2018-03-25 06:32:55', '2018-07-30 17:00:00', 200, 'Voucher Pulsa Tri 100K');

-- --------------------------------------------------------

--
-- Table structure for table `setting_reward`
--

CREATE TABLE `setting_reward` (
  `id` int(10) NOT NULL,
  `setting_reward_id` varchar(15) NOT NULL DEFAULT '',
  `base_percent` int(11) NOT NULL DEFAULT '100',
  `ratio_percent` int(11) NOT NULL DEFAULT '100',
  `price_per_point` int(10) NOT NULL DEFAULT '0',
  `point_get` int(10) NOT NULL DEFAULT '0',
  `event_name` varchar(500) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expired` datetime DEFAULT NULL,
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_reward`
--

INSERT INTO `setting_reward` (`id`, `setting_reward_id`, `base_percent`, `ratio_percent`, `price_per_point`, `point_get`, `event_name`, `date_created`, `date_expired`, `is_confirmed`) VALUES
(5, 'SRW000005', 50, 50, 10000, 1, 'Default', '2018-03-20 17:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(10) NOT NULL,
  `address_id` varchar(15) NOT NULL DEFAULT '',
  `city` varchar(500) NOT NULL DEFAULT '',
  `kecamatan` varchar(500) NOT NULL DEFAULT '',
  `kelurahan` varchar(500) NOT NULL DEFAULT '',
  `postal_code` varchar(20) NOT NULL DEFAULT '',
  `address_detail` varchar(1000) NOT NULL DEFAULT '',
  `latitude` float NOT NULL DEFAULT '0',
  `longitude` float NOT NULL DEFAULT '0',
  `customer_id` int(15) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `address_id`, `city`, `kecamatan`, `kelurahan`, `postal_code`, `address_detail`, `latitude`, `longitude`, `customer_id`, `is_primary`) VALUES
(4, 'ADD00000004', 'Bekasi', 'Bekasi Timur', 'Pahlawan', '12345', 'Jl. Bayu Wangi 12', 0, 0, 4, 0),
(5, 'ADD00000005', 'bandung', 'parompong', 'ciwaruga', '54321', 'jalan kaki lima belok kanan no 1', 0, 0, 6, 0),
(6, 'ADD00000006', 'bekasi', 'bekasi barat', 'kayuringin', '12345', 'jalan maju mundur belok kiri no 200', 0, 0, 6, 0),
(7, 'ADD00000007', 'jakarta', 'rawabuaya', 'buayadarat', '67890', 'jalan belok belok maju terus no 300', 0, 0, 6, 0),
(8, 'ADD00000008', 'Bekasi', 'Bekasi Timur', 'Lurah Bebek', '32123', 'Jl. Bekasi Dua 1', 0, 0, 4, 0),
(9, 'ADD00000009', 'Bekasi', 'Bekasi Timur', 'Banjar', '32423', 'Jl. Bekasi Tiga 2', 0, 0, 7, 1),
(10, 'ADD00000010', 'Bekasi', 'Bekasi Selatan', 'Kayuringin Jaya', '17144', 'Jl. Kasuari Raya 158', -6.23796, 0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `id` int(10) NOT NULL,
  `fee_id` varchar(15) NOT NULL DEFAULT '',
  `fee_amount` float NOT NULL DEFAULT '0',
  `fee_description` varchar(1000) NOT NULL DEFAULT '',
  `shipping_distance` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_charge`
--

INSERT INTO `shipping_charge` (`id`, `fee_id`, `fee_amount`, `fee_description`, `shipping_distance`) VALUES
(17, 'FEE0000000017', 0, '', 0),
(18, 'FEE0000000018', 0, '', 0),
(19, 'FEE0000000019', 0, '', 0),
(20, 'FEE0000000020', 0, '', 0),
(21, 'FEE0000000021', 0, '', 0),
(22, 'FEE0000000022', 0, '', 0),
(23, 'FEE0000000023', 0, '', 0),
(24, 'FEE0000000024', 0, '', 0),
(25, 'FEE0000000025', 0, '', 0),
(26, 'FEE0000000026', 0, '', 0),
(27, 'FEE0000000027', 0, '', 0),
(28, 'FEE0000000028', 0, '', 0),
(29, 'FEE0000000029', 0, '', 0),
(30, 'FEE0000000030', 0, '', 0),
(31, 'FEE0000000031', 0, '', 0),
(32, 'FEE0000000032', 0, '', 0),
(33, 'FEE0000000033', 0, '', 0),
(34, 'FEE0000000034', 0, '', 0),
(35, 'FEE0000000035', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) NOT NULL,
  `tag_name` varchar(100) NOT NULL DEFAULT '',
  `date_of_initial_used` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `id` int(10) NOT NULL,
  `tenant_id` varchar(15) NOT NULL DEFAULT '',
  `tenant_name` varchar(200) NOT NULL DEFAULT '',
  `bank_account` varchar(256) NOT NULL DEFAULT '',
  `account_id` int(15) NOT NULL,
  `unit_number` varchar(20) NOT NULL DEFAULT '',
  `floor` varchar(10) NOT NULL DEFAULT '',
  `selling_category` varchar(500) NOT NULL DEFAULT '',
  `is_open` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tenant_id`, `tenant_name`, `bank_account`, `account_id`, `unit_number`, `floor`, `selling_category`, `is_open`) VALUES
(0, 'TNT00000', 'Tenant Admin', '', 3, '0', '0', 'All', 1),
(4, 'TNT00004', 'Samsung Official', 'BCA 0851163190', 13, 'A-11', 'LG', 'Handphone dan Tablet', 1),
(5, 'TNT00005', 'Xiaomi Official', '', 14, 'A-12', 'LG', 'Handphone dan Tablet', 1),
(6, 'TNT00006', 'dicky test', '', 19, 'a01-01', 'LG', 'handphone', 1),
(7, 'TNT00007', 'Oppo Official', '', 21, 'A-15', 'LG', 'Handphone', 1),
(8, 'TNT00008', 'aerio computer', '123456', 27, '1a01-01', '01', 'computer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_bill`
--

CREATE TABLE `tenant_bill` (
  `id` int(10) NOT NULL,
  `tenant_bill_id` varchar(15) NOT NULL DEFAULT '',
  `tenant_id` int(15) NOT NULL,
  `posted_item_id` int(15) DEFAULT NULL,
  `hot_item_id` int(15) DEFAULT NULL,
  `admin_id` int(15) DEFAULT NULL,
  `payment_value` float NOT NULL DEFAULT '0',
  `payment_expiration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_bill`
--

INSERT INTO `tenant_bill` (`id`, `tenant_bill_id`, `tenant_id`, `posted_item_id`, `hot_item_id`, `admin_id`, `payment_value`, `payment_expiration`, `payment_date`) VALUES
(1, '1', 4, 54, NULL, NULL, 0, '0000-00-00 00:00:00', '2018-03-27 15:36:09'),
(2, '2', 4, 55, NULL, 1, 200000, '2018-03-28 00:00:00', '2018-03-13 00:00:00'),
(4, '4', 5, 56, 2, 1, 280000, '2018-04-30 00:00:00', '2018-04-17 17:17:49'),
(5, '5', 4, 84, NULL, 1, 250000, '2018-05-25 00:00:00', '0000-00-00 00:00:00'),
(6, '6', 4, 54, 1, 1, 1000000, '2018-05-31 00:00:00', '2018-05-02 10:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_pay_receipt`
--

CREATE TABLE `tenant_pay_receipt` (
  `id` int(10) NOT NULL,
  `tenant_receipt_id` varchar(15) NOT NULL DEFAULT '',
  `payment_period_start` timestamp NULL DEFAULT NULL,
  `payment_period_end` timestamp NULL DEFAULT NULL,
  `payment_purpose` varchar(1000) NOT NULL DEFAULT '',
  `admin_id` int(15) NOT NULL,
  `paid_amount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_pay_receipt`
--

INSERT INTO `tenant_pay_receipt` (`id`, `tenant_receipt_id`, `payment_period_start`, `payment_period_end`, `payment_purpose`, `admin_id`, `paid_amount`) VALUES
(1, 'TPR00000001', NULL, NULL, '', 1, 7000000),
(2, 'TPR00000002', NULL, NULL, '', 1, 8130000),
(3, 'TPR00000003', NULL, NULL, '', 1, 7500000),
(4, 'TPR00000004', NULL, NULL, '', 1, 6180000),
(5, 'TPR00000005', NULL, NULL, '', 1, 1950000),
(6, 'TPR00000006', NULL, NULL, '', 1, 1850000),
(7, 'TPR00000007', NULL, NULL, '', 1, 3900000),
(8, 'TPR00000008', NULL, NULL, '', 1, 1850000);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(10) NOT NULL,
  `voucher_id` varchar(15) NOT NULL DEFAULT '',
  `voucher_worth` float NOT NULL DEFAULT '0',
  `voucher_description` varchar(1000) NOT NULL DEFAULT '',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expired` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `voucher_stock` int(10) NOT NULL DEFAULT '0',
  `voucher_code` varchar(500) NOT NULL DEFAULT '',
  `min_order_price` int(11) NOT NULL DEFAULT '0',
  `use_per_day` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucher_id`, `voucher_worth`, `voucher_description`, `date_added`, `date_expired`, `voucher_stock`, `voucher_code`, `min_order_price`, `use_per_day`) VALUES
(1, 'VCR00000001', 25000, 'Bulan april, peralatan gadget lebih murah lho', '0000-00-00 00:00:00', '2018-04-30 23:59:00', 999, 'APRILTOOL', 1500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_brand`
--

CREATE TABLE `voucher_brand` (
  `id` int(10) NOT NULL,
  `voucher_id` int(15) NOT NULL,
  `brand_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_brand`
--

INSERT INTO `voucher_brand` (`id`, `voucher_id`, `brand_id`) VALUES
(1, 1, 4),
(2, 1, 5),
(3, 1, 6),
(4, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accountID` (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminID` (`admin_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `posted_item` (`posted_item_id`);

--
-- Indexes for table `bidding_live`
--
ALTER TABLE `bidding_live`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `posted_item_id` (`posted_item_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bill_id` (`bill_id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `add_fee` (`shipping_charge_id`),
  ADD KEY `address` (`shipping_address_id`),
  ADD KEY `setting_reward_id` (`setting_reward_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customerID` (`customer_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `upline_id` (`upline_id`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `delivererID` (`deliverer_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `dispute`
--
ALTER TABLE `dispute`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disputeID` (`dispute_id`),
  ADD KEY `disputeFor` (`party_one_id`),
  ADD KEY `submittedBy` (`party_two_id`),
  ADD KEY `order_det_id` (`order_detail_id`);

--
-- Indexes for table `dispute_text`
--
ALTER TABLE `dispute_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender_id`),
  ADD KEY `dispute` (`dispute_id`);

--
-- Indexes for table `favorite_item`
--
ALTER TABLE `favorite_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `fav_item` (`posted_item_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feedback_id` (`feedback_id`),
  ADD KEY `submitted_by` (`submitted_by`),
  ADD KEY `order_det` (`order_detail_id`);

--
-- Indexes for table `following_tenant`
--
ALTER TABLE `following_tenant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `following_id` (`following_id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `tenant` (`tenant_id`);

--
-- Indexes for table `hot_item`
--
ALTER TABLE `hot_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hot_item_id` (`hot_item_id`),
  ADD KEY `posted_item_id` (`posted_item_id`);

--
-- Indexes for table `item_tag`
--
ALTER TABLE `item_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`posted_item_id`),
  ADD KEY `tag` (`tag_id`);

--
-- Indexes for table `message_inbox`
--
ALTER TABLE `message_inbox`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inbox_id` (`inbox_id`),
  ADD KEY `party_one` (`party_one_id`),
  ADD KEY `party_two` (`party_two_id`);

--
-- Indexes for table `message_text`
--
ALTER TABLE `message_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender_id`),
  ADD KEY `inbox` (`message_inbox_id`);

--
-- Indexes for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `negotiation_id` (`negotiation_id`),
  ADD KEY `tenant` (`tenant_id`),
  ADD KEY `customer` (`customer_id`),
  ADD KEY `negotiated_price_ibfk_1` (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `bill` (`billing_id`),
  ADD KEY `deliverer` (`deliverer_id`),
  ADD KEY `tnt_paid_receipt` (`tnt_paid_receipt_id`),
  ADD KEY `posted_item_variance_id` (`posted_item_variance_id`),
  ADD KEY `order_details_ibfk_6` (`voucher_id`);

--
-- Indexes for table `order_status_history`
--
ALTER TABLE `order_status_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id` (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`),
  ADD KEY `bill` (`billing_id`);

--
-- Indexes for table `point_history`
--
ALTER TABLE `point_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `history_id` (`history_id`),
  ADD KEY `billing_id` (`billing_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `posted_item`
--
ALTER TABLE `posted_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`posted_item_id`),
  ADD KEY `category` (`category_id`),
  ADD KEY `brand` (`brand_id`),
  ADD KEY `tenant` (`tenant_id`);

--
-- Indexes for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `detail_id` (`detail_id`),
  ADD KEY `posted_item_id` (`posted_item_id`);

--
-- Indexes for table `redeem_reward`
--
ALTER TABLE `redeem_reward`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redeem_id` (`redeem_id`),
  ADD KEY `reward` (`reward_id`),
  ADD KEY `customer` (`customer_id`);

--
-- Indexes for table `redeem_voucher`
--
ALTER TABLE `redeem_voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `redeem_id` (`redeem_id`),
  ADD KEY `voucher` (`voucher_id`),
  ADD KEY `billing` (`billing_id`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reward_id` (`reward_id`);

--
-- Indexes for table `setting_reward`
--
ALTER TABLE `setting_reward`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_reward_id` (`setting_reward_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_id` (`address_id`),
  ADD KEY `customer` (`customer_id`);

--
-- Indexes for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_id` (`fee_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenantID` (`tenant_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenant_bill_id` (`tenant_bill_id`),
  ADD KEY `admin` (`admin_id`),
  ADD KEY `hot_item` (`hot_item_id`),
  ADD KEY `posted_item` (`posted_item_id`),
  ADD KEY `tenant` (`tenant_id`);

--
-- Indexes for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenant_receipt_id` (`tenant_receipt_id`),
  ADD KEY `admin` (`admin_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_id` (`voucher_id`);

--
-- Indexes for table `voucher_brand`
--
ALTER TABLE `voucher_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `voucher_id` (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bidding_live`
--
ALTER TABLE `bidding_live`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dispute`
--
ALTER TABLE `dispute`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dispute_text`
--
ALTER TABLE `dispute_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `favorite_item`
--
ALTER TABLE `favorite_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `following_tenant`
--
ALTER TABLE `following_tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hot_item`
--
ALTER TABLE `hot_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_tag`
--
ALTER TABLE `item_tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_inbox`
--
ALTER TABLE `message_inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_status_history`
--
ALTER TABLE `order_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posted_item`
--
ALTER TABLE `posted_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `redeem_reward`
--
ALTER TABLE `redeem_reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `redeem_voucher`
--
ALTER TABLE `redeem_voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_reward`
--
ALTER TABLE `setting_reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher_brand`
--
ALTER TABLE `voucher_brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `bidding_ibfk_2` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`);

--
-- Constraints for table `bidding_live`
--
ALTER TABLE `bidding_live`
  ADD CONSTRAINT `bidding_live_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `bidding_live_ibfk_2` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`);

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`shipping_charge_id`) REFERENCES `shipping_charge` (`id`),
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`id`),
  ADD CONSTRAINT `billing_ibfk_4` FOREIGN KEY (`setting_reward_id`) REFERENCES `setting_reward` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`upline_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD CONSTRAINT `deliverer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `dispute`
--
ALTER TABLE `dispute`
  ADD CONSTRAINT `dispute_ibfk_1` FOREIGN KEY (`party_one_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `dispute_ibfk_2` FOREIGN KEY (`party_two_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `dispute_ibfk_3` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`);

--
-- Constraints for table `dispute_text`
--
ALTER TABLE `dispute_text`
  ADD CONSTRAINT `dispute_text_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `dispute_text_ibfk_2` FOREIGN KEY (`dispute_id`) REFERENCES `dispute` (`id`);

--
-- Constraints for table `favorite_item`
--
ALTER TABLE `favorite_item`
  ADD CONSTRAINT `favorite_item_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `favorite_item_ibfk_2` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`submitted_by`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`);

--
-- Constraints for table `following_tenant`
--
ALTER TABLE `following_tenant`
  ADD CONSTRAINT `following_tenant_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `following_tenant_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`);

--
-- Constraints for table `hot_item`
--
ALTER TABLE `hot_item`
  ADD CONSTRAINT `hot_item_ibfk_1` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`);

--
-- Constraints for table `item_tag`
--
ALTER TABLE `item_tag`
  ADD CONSTRAINT `item_tag_ibfk_1` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`),
  ADD CONSTRAINT `item_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Constraints for table `message_inbox`
--
ALTER TABLE `message_inbox`
  ADD CONSTRAINT `message_inbox_ibfk_1` FOREIGN KEY (`party_one_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `message_inbox_ibfk_2` FOREIGN KEY (`party_two_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `message_text`
--
ALTER TABLE `message_text`
  ADD CONSTRAINT `message_text_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `message_text_ibfk_2` FOREIGN KEY (`message_inbox_id`) REFERENCES `message_inbox` (`id`);

--
-- Constraints for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  ADD CONSTRAINT `negotiated_price_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`),
  ADD CONSTRAINT `negotiated_price_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `negotiated_price_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`deliverer_id`) REFERENCES `deliverer` (`id`),
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`tnt_paid_receipt_id`) REFERENCES `tenant_pay_receipt` (`id`),
  ADD CONSTRAINT `order_details_ibfk_5` FOREIGN KEY (`posted_item_variance_id`) REFERENCES `posted_item_variance` (`id`),
  ADD CONSTRAINT `order_details_ibfk_6` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`);

--
-- Constraints for table `order_status_history`
--
ALTER TABLE `order_status_history`
  ADD CONSTRAINT `order_status_history_ibfk_1` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`);

--
-- Constraints for table `point_history`
--
ALTER TABLE `point_history`
  ADD CONSTRAINT `point_history_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`),
  ADD CONSTRAINT `point_history_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `posted_item`
--
ALTER TABLE `posted_item`
  ADD CONSTRAINT `posted_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `posted_item_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `posted_item_ibfk_3` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`);

--
-- Constraints for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  ADD CONSTRAINT `posted_item_variance_ibfk_1` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`);

--
-- Constraints for table `redeem_reward`
--
ALTER TABLE `redeem_reward`
  ADD CONSTRAINT `redeem_reward_ibfk_1` FOREIGN KEY (`reward_id`) REFERENCES `reward` (`id`),
  ADD CONSTRAINT `redeem_reward_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `redeem_voucher`
--
ALTER TABLE `redeem_voucher`
  ADD CONSTRAINT `redeem_voucher_ibfk_1` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`),
  ADD CONSTRAINT `redeem_voucher_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`);

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `shipping_address_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  ADD CONSTRAINT `tenant_bill_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `tenant_bill_ibfk_2` FOREIGN KEY (`hot_item_id`) REFERENCES `hot_item` (`id`),
  ADD CONSTRAINT `tenant_bill_ibfk_3` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`),
  ADD CONSTRAINT `tenant_bill_ibfk_4` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`);

--
-- Constraints for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  ADD CONSTRAINT `tenant_pay_receipt_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `voucher_brand`
--
ALTER TABLE `voucher_brand`
  ADD CONSTRAINT `voucher_brand_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `voucher_brand_ibfk_2` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
