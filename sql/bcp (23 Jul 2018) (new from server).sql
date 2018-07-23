-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 02:25 PM
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
(0, 'ADM0000', 'Super Admin', 'Jalan', '1978-04-04', '0816263612', 'admin0@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '0000-00-00 00:00:00', '', '2018-04-03 15:27:06', ''),
(2, 'ADM00001', 'Admin Default', '', '0000-00-00', '', 'admin1@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-07-23 17:43:31', 'active', '2017-12-14 06:35:41', ''),
(3, 'TNT00000', 'Tenant Admin', '', '0000-00-00', '', 'tenant.admin@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-03-21 11:49:08', '', '2018-03-20 16:19:35', ''),
(13, 'TNT00004', 'Mr. Lee Byung-chule', 'Jl. Pahlawan 123', '0000-00-00', '08123212323', 'lee@samsung.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123125', '', '2018-07-20 16:07:39', 'ACTIVE', '2018-03-20 16:55:40', 'img/upload/TNT00004/profpic.jpg'),
(14, 'TNT00005', 'Mr. Lei Jun', 'Jl. Pahlawan 123', '1969-12-16', '08123123123', 'lei@xiaomi.com', 'e10adc3949ba59abbe56e057f20f883e', '12321232123213', '', '2018-07-20 14:43:22', 'ACTIVE', '2018-03-20 16:58:19', ''),
(15, 'CUS00000004', 'Bayu', 'Jl. Bayu Wangi 10', '1999-03-06', '08123123123', 'customer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-07-20 15:48:28', 'ACTIVE', '2018-03-20 17:46:47', 'img/upload/CUS00000004/profpic.jpg'),
(16, 'DLV00005', 'Anto', 'Gg. Ijan 60', '1969-12-16', '08123123123', 'deliverer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123', '', '2018-07-20 14:41:46', 'ACTIVE', '2018-03-20 18:11:23', ''),
(17, 'DLV00006', 'Dudung', 'Jalan Soekarno Hatta no 800', '1992-04-04', '089993213123', 'deliverer2@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '3212361527351273', '', '2018-07-20 14:43:52', 'ACTIVE', '2018-04-27 14:51:33', ''),
(18, 'CUS00000005', 'Didin', 'Jalan Hasanuddin no 55', '1990-03-23', '081232323232', 'customer5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '323627361273', '', '2018-07-20 14:46:05', 'ACTIVE', '2018-04-30 11:09:45', 'img/upload/CUS00000005/profpic.jpg'),
(19, 'TNT00006', 'Chen Ming Yong', 'Jalan Banyuwangi no 222', '1910-02-16', '08128868673', 'chen@oppo.com', 'e10adc3949ba59abbe56e057f20f883e', '96178263871628371', '', '0000-00-00 00:00:00', 'ACTIVE', '2018-07-10 14:50:00', ''),
(20, 'CUS00000006', 'nasigoreng', 'jl maju mundur buntu', '2008-07-13', '08123456789', 'nasigoreng@gmail.com', '3345d4066fb9607e6cc772fa578e9dcd', '', '', '2018-07-20 21:32:11', 'ACTIVE', '2018-07-13 06:56:16', 'img/upload/CUS00000006/profpic.jpg'),
(21, 'TNT00007', 'Padi', 'jl maju mundur buntu', '2018-07-13', '08123456789', 'lapaknasi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456789101112', '', '2018-07-18 20:38:53', 'ACTIVE', '2018-07-13 07:00:23', 'img/upload/TNT00007/profpic.jpg'),
(22, 'DLV00007', 'dicky septian', 'jalan santai', '0000-00-00', '085624360909', 'dicky@cyberia.co.id', 'e10adc3949ba59abbe56e057f20f883e', '123456789', '', '2018-07-18 20:22:06', 'ACTIVE', '2018-07-13 07:12:52', ''),
(23, 'DLV00008', 'Dendeng', 'Jalan Patimura no 44 Bekasi', '1998-07-09', '082136812783', 'deliverer3@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '32978234978537', '', '2018-07-20 15:24:31', 'ACTIVE', '2018-07-18 13:25:14', ''),
(24, 'TNT00008', 'Budi', 'jalan kiri kanan OK', '2018-07-27', '08123456789', 'gadgetku@gmail.com', '714d4169491c666339e9ed8e06fa44b7', '1234567891011121', '', '2018-07-20 15:43:47', 'ACTIVE', '2018-07-20 07:54:01', 'img/upload/TNT00008/profpic.jpg'),
(25, 'CUS00000007', 'dicky', 'jalan jalan', '0000-00-00', '085761829', 'dicky.s.n@gmail.com', 'f8cd52a3cae3edf7e1e3501f7f39ee40', '', 'img/upload/CUS00000007/idpic.jpg', '2018-07-20 15:25:02', 'ACTIVE', '2018-07-20 07:55:35', 'img/upload/CUS00000007/profpic.jpg'),
(26, 'CUS00000008', 'Kenzo', 'Jl. Paris Kaliki 123', '1990-07-03', '084565555152', 'kenji_prahyudi@yahoo.com', '6572bdaff799084b973320f43f09b363', '23321321321231', '', '2018-07-23 19:17:25', 'ACTIVE', '2018-07-20 08:08:05', ''),
(27, 'TNT00009', 'Joko', 'Jalan belok kiri terus saja', '2018-07-31', '08123456789', 'kolektorhp@gmail.com', '326d9bb7851493df556c9be98fac4d08', '1234567891011121', '', '2018-07-20 15:33:21', 'ACTIVE', '2018-07-20 08:32:07', 'img/upload/TNT00009/profpic.jpg'),
(28, 'TNT00010', 'Kenzo', 'Jl. Paris Kaliki 123', '1990-07-03', '89595535135', 'kenji.prahyudi@gmail.com', '6572bdaff799084b973320f43f09b363', '1239812893218', '', '2018-07-23 19:08:24', 'ACTIVE', '2018-07-20 08:34:18', 'img/upload/TNT00010/profpic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `admin_id` varchar(15) NOT NULL DEFAULT '',
  `account_id` int(15) NOT NULL,
  `hour_avalaible` varchar(50) NOT NULL DEFAULT '',
  `notif_order` int(11) NOT NULL DEFAULT '0',
  `notif_reward` int(11) NOT NULL DEFAULT '0',
  `notif_hot_item` int(11) NOT NULL DEFAULT '0',
  `notif_promoted_item` int(11) NOT NULL DEFAULT '0',
  `notif_bidding` int(11) NOT NULL DEFAULT '0',
  `notif_payment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `account_id`, `hour_avalaible`, `notif_order`, `notif_reward`, `notif_hot_item`, `notif_promoted_item`, `notif_bidding`, `notif_payment`) VALUES
(1, 'ADM00001', 2, '10.00-22.00', 0, 0, 0, 0, 0, 0);

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
(1, '2018-03-28 03:42:04', 1005000, 4, 57);

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
(1, '2018-04-03 11:42:59', 1300000, 4, 57),
(2, '2018-04-03 11:43:06', 1800000, 4, 57),
(3, '2018-07-09 09:59:15', 30000, 4, 71),
(4, '2018-07-09 09:59:34', 40000, 4, 71),
(5, '2018-07-18 14:26:57', 30000, 5, 80),
(6, '2018-07-18 14:41:41', 60000, 5, 80),
(7, '2018-07-20 07:21:27', 300000, 4, 82),
(8, '2018-07-20 07:27:56', 1000000, 4, 83),
(9, '2018-07-20 07:29:24', 1300000, 5, 83),
(10, '2018-07-20 07:44:11', 300000, 6, 85),
(11, '2018-07-20 07:48:12', 1200000, 5, 87),
(12, '2018-07-20 07:48:44', 1600000, 5, 87),
(13, '2018-07-20 07:50:07', 700000, 5, 86),
(14, '2018-07-20 07:51:34', 2000000, 5, 87),
(15, '2018-07-20 07:51:56', 2200000, 5, 87),
(16, '2018-07-20 07:53:21', 3800000, 4, 87),
(17, '2018-07-20 07:53:38', 4000000, 5, 87),
(18, '2018-07-20 07:57:59', 4600000, 6, 87),
(19, '2018-07-20 08:01:03', 4800000, 6, 87),
(20, '2018-07-20 08:01:12', 5600000, 7, 87),
(21, '2018-07-20 08:03:32', 1500000, 5, 86),
(22, '2018-07-20 08:13:28', 1700000, 4, 86),
(23, '2018-07-20 08:20:20', 1900000, 6, 86);

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
  `delivery_type` varchar(16) NOT NULL DEFAULT '',
  `point_received` int(11) NOT NULL DEFAULT '0',
  `setting_reward_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `bill_id`, `date_created`, `date_closed`, `total_payable`, `customer_id`, `shipping_address_id`, `shipping_charge_id`, `delivery_method`, `delivery_type`, `point_received`, `setting_reward_id`) VALUES
(21, 'BIL000000021', '2018-03-21 00:54:12', '2018-03-28 00:54:12', 6180000, 4, 4, 18, 'JNE', '', 0, 5),
(22, 'BIL000000022', '2018-03-28 10:42:17', '2018-03-30 10:42:17', 1005000, 4, NULL, NULL, '', '', 0, 5),
(23, 'BIL000000023', '2018-04-03 19:10:54', '2018-04-03 19:10:54', 1800000, 4, NULL, NULL, '', '', 0, 5),
(24, 'BIL000000024', '2018-04-03 19:14:50', '2018-04-03 19:14:50', 1300000, 4, NULL, NULL, '', '', 0, 5),
(25, 'BIL000000025', '2018-04-03 19:15:13', '2018-04-02 19:15:13', 1800000, 4, NULL, NULL, '', '', 0, 5),
(26, 'BIL000000026', '2018-04-03 19:15:46', '2018-04-04 19:15:46', 1300000, 4, 4, 19, 'TIKI', '', 0, 5),
(27, 'BIL000000027', '2018-04-23 23:49:45', '2018-04-24 23:49:45', 1950000, 4, 4, 20, 'JNE', '', 0, 5),
(28, 'BIL000000028', '2018-04-30 21:25:01', '2018-05-01 21:25:01', 1800000, 4, 4, 22, 'TIKI', '', 0, 5),
(29, 'BIL000000029', '2018-04-30 21:28:30', '2018-05-01 21:28:30', 0, 4, 4, 21, 'TIKI', '', 0, 5),
(30, 'BIL000000030', '2018-04-30 21:49:36', '2018-05-01 21:49:36', 0, 4, 4, 23, 'JNE', '', 0, 5),
(31, 'BIL000000031', '2018-05-02 10:36:48', '2018-05-03 10:36:48', 2280000, 4, 4, 24, 'GOJEK', '', 0, 5),
(32, 'BIL000000032', '2018-05-09 10:53:00', '2018-05-10 10:53:00', 1800000, 4, 4, 25, 'JNE', '', 0, 5),
(33, 'BIL000000033', '2018-05-11 16:39:20', '2018-05-12 16:39:20', 6500000, 4, 4, 26, 'JNE', '', 0, 5),
(34, 'BIL000000034', '2018-06-12 16:49:30', '2018-06-13 16:49:30', 6100000, 4, 4, 27, 'JNE', '', 0, 5),
(35, 'BIL000000035', '2018-06-12 17:16:12', '2018-06-13 17:16:12', 3800000, 4, 4, 28, 'JNE', '', 0, 5),
(36, 'BIL000000036', '2018-06-19 22:28:00', '2018-06-20 22:28:00', 6100000, 5, 5, 29, 'JNE', '', 0, 5),
(37, 'BIL000000037', '2018-06-19 22:57:19', '2018-06-20 22:57:19', 100000, 5, 5, 30, 'JNE', '', 0, 5),
(38, 'BIL000000038', '2018-06-20 12:35:53', '2018-06-21 12:35:53', 25000, 4, 4, 31, 'JNE', '', 0, 5),
(39, 'BIL000000039', '2018-07-02 19:11:21', '2018-07-03 19:11:21', 21008000, 4, 4, 32, 'JNE', '', 0, 5),
(40, 'BIL000000040', '2018-07-05 18:17:16', '2018-07-06 18:17:16', 4999000, 4, 4, 33, 'jne', '', 0, 5),
(41, 'BIL000000041', '2018-07-05 18:24:57', '2018-07-06 18:24:57', 6432000, 4, 7, 34, 'jne', '', 0, 5),
(42, 'BIL000000042', '2018-07-05 18:43:38', '2018-07-06 18:43:38', 3861000, 4, 8, 35, 'jne', '', 0, 5),
(43, 'BIL000000043', '2018-07-06 15:06:27', '2018-07-07 15:06:27', 25000, 4, 4, 36, '', '', 0, 5),
(44, 'BIL000000044', '2018-07-06 15:36:06', '2018-07-07 15:36:06', 25000, 4, 4, 37, '', '', 0, 5),
(45, 'BIL000000045', '2018-07-09 15:42:05', '2018-07-10 15:42:05', 4239000, 4, 4, 38, 'jne', 'CTC', 0, 5),
(46, 'BIL000000046', '2018-07-09 15:49:40', '2018-07-10 15:49:40', 1000000, 4, 4, 39, '', '', 0, 5),
(47, 'BIL000000047', '2018-07-13 15:39:44', '2018-07-14 15:39:44', 10011000, 4, 7, 40, 'jne', 'REG', 0, 5),
(48, 'BIL000000048', '2018-07-13 15:47:08', '2018-07-14 15:47:08', 24010000, 6, 9, 41, 'jne', 'OKE', 0, 5),
(49, 'BIL000000049', '2018-07-16 17:20:27', '2018-07-17 17:20:27', 1809000, 4, 4, 42, 'jne', 'CTC', 0, 5),
(50, 'BIL000000050', '2018-07-18 16:05:31', '2018-07-19 16:05:31', 2289000, 4, 4, 43, 'jne', 'CTC', 0, 5),
(51, 'BIL000000051', '2018-07-18 16:17:06', '2018-07-19 16:17:06', 1809000, 4, 4, 44, 'jne', 'CTC', 0, 5),
(52, 'BIL000000052', '2018-07-18 16:20:33', '2018-07-19 16:20:33', 1809000, 4, 4, 45, 'jne', 'CTC', 0, 5),
(53, 'BIL000000053', '2018-07-18 16:22:49', '2018-07-19 16:22:49', 1809000, 4, 4, 46, 'jne', 'CTC', 0, 5),
(54, 'BIL000000054', '2018-07-18 16:26:51', '2018-07-19 16:26:51', 2289000, 4, 4, 47, 'jne', 'CTC', 0, 5),
(55, 'BIL000000055', '2018-07-18 16:30:08', '2018-07-19 16:30:08', 1859000, 4, 4, 48, 'jne', 'CTC', 0, 5),
(56, 'BIL000000056', '2018-07-18 16:37:10', '2018-07-19 16:37:10', 1809000, 4, 4, 49, 'jne', 'CTC', 0, 5),
(57, 'BIL000000057', '2018-07-18 16:40:57', '2018-07-19 16:40:57', 1859000, 4, 4, 50, 'tiki', 'REG', 0, 5),
(58, 'BIL000000058', '2018-07-18 16:43:31', '2018-07-19 16:43:31', 2289000, 4, 4, 51, 'jne', 'CTC', 0, 5),
(59, 'BIL000000059', '2018-07-18 16:51:16', '2018-07-19 16:51:16', 1809000, 4, 4, 52, 'jne', 'CTC', 0, 5),
(60, 'BIL000000060', '2018-07-18 16:54:03', '2018-07-19 16:54:03', 1859000, 4, 4, 53, 'jne', 'CTC', 0, 5),
(61, 'BIL000000061', '2018-07-18 17:04:17', '2018-07-19 17:04:17', 2289000, 5, 5, 54, 'jne', 'CTC', 0, 5),
(62, 'BIL000000062', '2018-07-18 17:15:35', '2018-07-19 17:15:35', 2239000, 5, 5, 55, 'jne', 'CTC', 0, 5),
(63, 'BIL000000063', '2018-07-18 18:26:19', '2018-07-19 18:26:19', 25000, 5, 5, 56, '', '', 0, 5),
(64, 'BIL000000064', '2018-07-18 18:31:59', '2018-07-19 18:31:59', 25000, 5, 5, 57, '', '', 0, 5),
(65, 'BIL000000065', '2018-07-18 18:37:07', '2018-07-19 18:37:07', 25000, 5, 5, 58, '', '', 0, 5),
(66, 'BIL000000066', '2018-07-18 18:42:52', '2018-07-19 18:42:52', 25000, 5, 5, 59, '', '', 0, 5),
(67, 'BIL000000067', '2018-07-18 18:45:37', '2018-07-19 18:45:37', 1809000, 5, 5, 60, 'jne', 'CTC', 0, 5),
(68, 'BIL000000068', '2018-07-18 18:46:44', '2018-07-19 18:46:44', 2289000, 5, 5, 61, 'jne', 'CTC', 0, 5),
(69, 'BIL000000069', '2018-07-18 18:53:18', '2018-07-19 18:53:18', 1809000, 5, 5, 62, 'jne', 'CTC', 0, 5),
(70, 'BIL000000070', '2018-07-18 18:58:20', '2018-07-19 18:58:20', 1809000, 5, 5, 63, 'jne', 'CTC', 0, 5),
(71, 'BIL000000071', '2018-07-18 19:02:59', '2018-07-19 19:02:59', 1809000, 5, 5, 64, 'jne', 'CTC', 0, 5),
(72, 'BIL000000072', '2018-07-18 19:05:22', '2018-07-19 19:05:22', 1859000, 5, 5, 65, 'jne', 'CTC', 0, 5),
(73, 'BIL000000073', '2018-07-18 19:10:29', '2018-07-19 19:10:29', 1809000, 5, 5, 66, 'jne', 'CTC', 0, 5),
(74, 'BIL000000074', '2018-07-18 19:17:30', '2018-07-19 19:17:30', 1809000, 5, 5, 67, 'jne', 'CTC', 0, 5),
(75, 'BIL000000075', '2018-07-18 19:24:31', '2018-07-19 19:24:31', 1809000, 5, 5, 68, 'jne', 'CTC', 0, 5),
(76, 'BIL000000076', '2018-07-18 19:30:39', '2018-07-19 19:30:39', 1809000, 5, 5, 69, 'jne', 'CTC', 0, 5),
(77, 'BIL000000077', '2018-07-18 19:32:40', '2018-07-19 19:32:40', 25000, 5, 5, 70, '', '', 0, 5),
(78, 'BIL000000078', '2018-07-18 19:42:33', '2018-07-19 19:42:33', 25000, 5, 5, 71, '', '', 0, 5),
(79, 'BIL000000079', '2018-07-18 19:44:59', '2018-07-19 19:44:59', 25000, 5, 5, 72, '', '', 0, 5),
(80, 'BIL000000080', '2018-07-18 19:52:06', '2018-07-19 19:52:06', 300000, 5, 5, 73, '', '', 0, 5),
(81, 'BIL000000081', '2018-07-18 20:32:13', '2018-07-19 20:32:13', 400000, 4, 4, 74, 'cyberku', '', 0, 5),
(82, 'DEP000000082', '2018-07-18 20:47:45', '2018-07-19 20:47:45', 100000, 5, NULL, NULL, '', '', 0, 5),
(83, 'DEP000000083', '2018-07-18 20:56:45', '2018-07-19 20:56:45', 100000, 5, NULL, NULL, '', '', 0, 5),
(84, 'DEP000000084', '2018-07-18 21:16:39', '2018-07-19 21:16:39', 100000, 5, NULL, NULL, '', '', 0, 5),
(85, 'DEP000000085', '2018-07-18 21:23:34', '2018-07-19 21:23:34', 100000, 5, NULL, NULL, '', '', 0, 5),
(86, 'DEP000000086', '2018-07-18 21:26:22', '2018-07-19 21:26:22', 100000, 5, NULL, NULL, '', '', 0, 5),
(87, 'BIL000000087', '2018-07-18 21:27:29', '2018-07-19 21:27:29', 1808500, 5, 5, 75, 'pos', 'Paket Kilat Khus', 0, 5),
(88, 'BIL000000088', '2018-07-18 21:44:44', '2018-07-19 21:44:44', 14854000, 5, 5, 76, 'jne', 'CTCYES', 0, 5),
(89, 'BIL000000089', '2018-07-18 21:47:00', '2018-07-19 21:47:00', 99000, 5, 5, 87, 'jne', '', 0, 5),
(90, 'BIL000000090', '2018-07-20 13:52:49', '2018-07-21 13:52:49', 9650000, 6, 9, 78, 'jne', 'OKE', 0, 5),
(91, 'BIL000000091', '2018-07-20 14:03:35', '2018-07-21 14:03:35', 1810000, 6, 9, 79, 'jne', 'OKE', 0, 5),
(92, 'BIL000000092', '2018-07-20 14:04:23', '2018-07-21 14:04:23', 1859000, 5, 5, 80, 'jne', 'CTC', 0, 5),
(93, 'BIL000000093', '2018-07-20 14:11:06', '2018-07-21 14:11:06', 10015000, 4, 4, 81, 'tiki', 'ONS', 0, 5),
(94, 'BIL000000094', '2018-07-20 14:13:52', '2018-07-21 14:13:52', 1818000, 4, 4, 82, 'pos', 'Paketpos Dangero', 0, 5),
(95, 'BIL000000095', '2018-07-20 14:14:18', '2018-07-21 14:14:18', 10005000, 4, 4, 83, 'tiki', 'ECO', 0, 5),
(96, 'BIL000000096', '2018-07-20 14:17:44', '2018-07-21 14:17:44', 10009000, 4, 4, 84, 'jne', 'CTC', 0, 5),
(97, 'BIL000000097', '2018-07-20 14:23:53', '2018-07-21 14:23:53', 309000, 4, 4, 85, 'tiki', '', 0, 5),
(98, 'BIL000000098', '2018-07-20 14:29:28', '2018-07-21 14:29:28', 1009000, 4, 4, 86, 'jne', '', 0, 5),
(99, 'DEP000000099', '2018-07-20 14:40:15', '2018-07-21 14:40:15', 100000, 6, NULL, NULL, '', '', 0, 5),
(100, 'DEP000000100', '2018-07-20 14:57:38', '2018-07-21 14:57:38', 100000, 7, NULL, NULL, '', '', 0, 5),
(101, 'DEP000000101', '2018-07-20 15:00:15', '2018-07-21 15:00:15', 100000, 7, NULL, NULL, '', '', 0, 5),
(102, 'BIL000000102', '2018-07-20 15:02:48', '2018-07-21 15:02:48', 5610000, 7, 11, 88, 'jne', '', 0, 5),
(103, 'BIL000000103', '2018-07-20 15:09:51', '2018-07-21 15:09:51', 3611000, 8, 12, 89, 'jne', 'REG', 0, 5),
(104, 'BIL000000104', '2018-07-20 15:10:44', '2018-07-21 15:10:44', 1810000, 7, 11, 90, 'jne', 'OKE', 0, 5),
(105, 'BIL000000105', '2018-07-20 15:13:23', '2018-07-21 15:13:23', 1870000, 8, 12, 91, 'tiki', 'ONS', 0, 5),
(106, 'BIL000000106', '2018-07-20 15:19:40', '2018-07-21 15:19:40', 5009000, 7, 11, 92, 'jne', 'OKE', 0, 5),
(107, 'BIL000000107', '2018-07-23 19:08:58', '2018-07-24 19:08:58', 13459000, 8, 12, 93, 'jne', 'OKE', 0, 5),
(108, 'BIL000000108', '2018-07-23 19:12:13', '2018-07-24 19:12:13', 7260000, 8, 12, 94, 'jne', 'OKE', 0, 5);

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
(7, 'BRD000007', 'Oppo', 'China'),
(8, 'BRD000008', 'Lainnya', 'Lainnya');

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
(9, 'Aksesoris Handphone', 'Pelengkap Handphone'),
(10, 'Lainnya', 'Lainnya');

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
  `upline_id` int(15) DEFAULT NULL,
  `notif_inbox` int(11) NOT NULL DEFAULT '0',
  `notif_dispute` int(11) NOT NULL DEFAULT '0',
  `notif_transaction` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `account_id`, `verified_mark`, `credit_amount`, `reward_points`, `deposit_status`, `upline_id`, `notif_inbox`, `notif_dispute`, `notif_transaction`) VALUES
(4, 'CUS00000004', 15, '', 0, 7164, 1, NULL, 0, 0, 0),
(5, 'CUS00000005', 18, '', 0, 3131, 1, NULL, 0, 0, 0),
(6, 'CUS00000006', 20, '', 0, 2401, 1, NULL, 0, 0, 0),
(7, 'CUS00000007', 25, '', 0, 1061, 1, NULL, 0, 0, 0),
(8, 'CUS00000008', 26, '', 0, 361, 0, NULL, 0, 0, 0);

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
(6, 'DLV00006', 17, 'B 2333 BB', 'Pick Up untuk barang besar'),
(7, 'DLV00007', 22, 'd1223jo', 'grand livina'),
(8, 'DLV00008', 23, 'R 3123 RR', 'Truk Angkut Besar Sekali Banget');

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
(1, 'DSP000000001', '', '2018-06-19', 15, 13, '', 35),
(2, 'DSP000000002', '', '2018-07-09', 15, 13, '', 43),
(3, 'DSP000000003', '', '2018-07-20', 25, 13, '', 102);

-- --------------------------------------------------------

--
-- Table structure for table `dispute_text`
--

CREATE TABLE `dispute_text` (
  `id` int(10) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(1000) NOT NULL DEFAULT '',
  `image_name` varchar(256) DEFAULT NULL,
  `sender_id` int(15) NOT NULL,
  `dispute_id` int(15) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispute_text`
--

INSERT INTO `dispute_text` (`id`, `date_sent`, `text`, `image_name`, `sender_id`, `dispute_id`, `is_read`) VALUES
(1, '2018-06-19 11:39:25', 'tes', NULL, 15, 1, 1),
(2, '2018-06-19 11:47:16', 'tes lg', NULL, 15, 1, 1),
(3, '2018-06-19 12:08:16', 'walah', NULL, 15, 1, 1),
(4, '2018-06-20 15:28:08', 'ini yang saya kirim', 'img/upload/TNT00004/dispute//4.jpg', 13, 1, 1),
(5, '2018-06-20 15:29:53', 'coba', '', 13, 1, 1),
(6, '2018-06-20 15:30:03', 'atau mau minum', 'img/upload/TNT00004/dispute//6.jpg', 13, 1, 1),
(7, '2018-06-20 15:30:55', 'grafik emosi', 'img/upload/TNT00004/dispute/1/7.jpg', 13, 1, 1),
(8, '2018-06-20 15:31:32', 'database', '', 13, 1, 1),
(9, '2018-06-20 15:31:43', 'yang gini bos mau ga', 'img/upload/TNT00004/dispute/1/9.jpg', 13, 1, 1),
(10, '2018-06-20 15:31:51', 'stok tipis bos hehe', '', 13, 1, 1),
(11, '2018-06-20 15:32:26', 'bagus', '', 13, 1, 1),
(12, '2018-06-20 15:37:09', 'haha boleh deh kirim link aja', 'img/upload/CUS00000004/dispute/1/12.jpg', 15, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doku`
--

CREATE TABLE `doku` (
  `id` int(11) NOT NULL,
  `transidmerchant` varchar(125) NOT NULL,
  `totalamount` double NOT NULL,
  `words` varchar(200) NOT NULL,
  `statustype` varchar(1) NOT NULL,
  `response_code` varchar(50) NOT NULL,
  `approvalcode` char(6) NOT NULL,
  `trxstatus` varchar(50) NOT NULL,
  `payment_channel` int(2) NOT NULL,
  `paymentcode` int(8) NOT NULL,
  `session_id` varchar(48) NOT NULL,
  `bank_issuer` varchar(100) NOT NULL,
  `creditcard` varchar(16) NOT NULL,
  `payment_date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `verifyid` varchar(30) NOT NULL,
  `verifyscore` int(3) NOT NULL,
  `verifystatus` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doku`
--

INSERT INTO `doku` (`id`, `transidmerchant`, `totalamount`, `words`, `statustype`, `response_code`, `approvalcode`, `trxstatus`, `payment_channel`, `paymentcode`, `session_id`, `bank_issuer`, `creditcard`, `payment_date_time`, `verifyid`, `verifyscore`, `verifystatus`) VALUES
(1, 'PAY000000040', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(2, 'PAY000000041', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(40, 'PAY000000065', 1809000, 'e34b6647443e1606d1c3289cf0d7c3acf796e10b', 'P', '0000', '930710', 'Success', 15, 0, 'qnVsKZafVlWGPKOivlVf', 'Bank Mandiri', '', '2018-07-18 19:24:55', '', -1, 'NA'),
(39, 'PAY000000064', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(38, 'coba 37', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(37, 'PAY000000063', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(36, 'PAY000000062', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(35, 'PAY000000061', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(33, 'PAY000000060', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(32, 'PAY000000059', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(31, 'PAY000000058', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(30, 'PAY000000057', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(29, 'PAY000000056', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(28, 'PAY000000055', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(27, 'PAY000000054', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(25, 'PAY000000053', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(26, 'PAY000000052', 2239000, '59ef2cf99d84cd30342e6c1750826c650c87952f', 'P', '0000', '754069', 'Success', 15, 0, 'fuav154MIJxHVxyxFxBb', 'Bank Mandiri', '', '2018-07-18 17:16:09', '', -1, 'NA'),
(41, 'PAY000000066', 1809000, 'f73c858165081be90037101100e7b2d8998d77b6', 'P', '0000', '747423', 'Success', 15, 0, 'bCQjfDi5CvXWJ2G6vTTF', 'Bank Mandiri', '', '2018-07-18 19:31:05', '', -1, 'NA'),
(42, 'PAY000000067', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(43, 'PAY000000068', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(44, 'PAY000000069', 25000, 'f4346d9b11d526cfb9929247ff1a1a08f69df4f5', 'P', '0000', '617744', 'Success', 15, 0, 'qIDUIePw06vDBVhacAnr', 'Bank Mandiri', '', '2018-07-18 19:45:53', '', -1, 'NA'),
(45, 'PAY000000070', 25000, 'bd14d0306f08526b5d303a0dfe86a5ea707ec7b8', 'P', '0000', '267497', 'Success', 15, 0, 'JEWXCwhFZjNsklbTd7Dt', 'Bank Mandiri', '', '2018-07-18 19:53:12', '', -1, 'NA'),
(46, 'PAY000000071', 300000, '78f68e89082c157a5949f689794ed37c1d68ffe7', 'P', '0000', '898993', 'Success', 15, 0, 'PmAiaDNFbIYlEdh7Yu5G', 'Bank Mandiri', '', '2018-07-18 20:04:41', '', -1, 'NA'),
(47, 'PAY000000072', 25000, 'd1a57c4cc73a511e206ca2dd4f1a4cbefe222541', 'P', '0000', '404808', 'Success', 15, 0, 'aCahilRZCf0zb0KWDLpr', 'Bank Mandiri', '', '2018-07-18 20:32:51', '', -1, 'NA'),
(48, 'PAY000000073', 375000, '5c65fb466308a6050baad4ce7cb3b79e1b390a32', 'P', '0000', '350288', 'Success', 15, 0, 'EUfPEuATbaWoHAQjfnJD', 'Bank Mandiri', '', '2018-07-18 20:37:29', '', -1, 'NA'),
(49, 'PAY000000074', 100000, '49d02ddd8dcf1e801e3599c3bcbf69820490507f', 'P', '0000', '291206', 'Success', 4, 0, 'HMGkgnyexT6CV7BThXrr', 'CASH', '', '2018-07-18 20:48:58', '', -1, 'NA'),
(50, 'PAY000000075', 100000, '2053276c30ba72943ca55ac164d9e95fcbef254d', 'P', '0000', '291207', 'Success', 4, 0, 'qJQnjljfBir25yC3rqsl', 'CASH', '', '2018-07-18 20:57:40', '', -1, 'NA'),
(51, 'PAY000000076', 100000, '07c4ac16ede80231b9d9b97f6d1ddcc5d60fcb3d', 'P', '0000', '291208', 'Success', 4, 0, 'yqkLEHapxBBMVYT5uJFl', 'CASH', '', '2018-07-18 21:17:03', '', -1, 'NA'),
(52, 'PAY000000077', 100000, 'be955790733f2135e33cf0463887b50a4e38ec8b', 'P', '0000', '291209', 'Success', 4, 0, 'PgVSyGnEhnJGgdn89Ogr', 'CASH', '', '2018-07-18 21:23:52', '', -1, 'NA'),
(53, 'PAY000000078', 100000, '4a899986de72d37aea9ca70e59917735b4a687a1', 'P', '0000', '291210', 'Success', 4, 0, 'T6uLXB0CH8JiPJ6YIRcK', 'CASH', '', '2018-07-18 21:26:43', '', -1, 'NA'),
(54, 'PAY000000079', 1808500, 'f9707e6ed0aeca22d74429073c7eb31ede00fbd5', 'P', '0000', '613603', 'Success', 15, 0, 'TJZnubF2gHatKiQDwyEE', 'Bank Mandiri', '', '2018-07-18 21:27:56', '', -1, 'NA'),
(55, 'PAY000000057', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(56, 'PAY000000057', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(57, 'PAY000000080', 14854000, '06352b4f5526f47a9737fa061c864e453b564530', 'P', '0000', '043765', 'Success', 15, 0, 'ahy67X2MLR2saRL5XKcb', 'Bank Mandiri', '', '2018-07-18 21:45:33', '', -1, 'NA'),
(58, 'PAY000000081', 90000, 'ba6332d71b2a5b03b085010346963a95b4dcdb1d', 'P', '0000', '598537', 'Success', 15, 0, 'DpUUZFlERs2YfZORVgjQ', 'Bank Mandiri', '', '2018-07-18 21:55:31', '', -1, 'NA'),
(59, 'PAY000000082', 9650000, 'b44d051265fcef861731a6c3e8504d914bc799e0', 'P', '0008', '', 'Failed', 4, 0, 'ZKhgJcCxnv76r6amR45p', 'CASH', '', '2018-07-20 14:02:19', '', -1, 'NA'),
(60, 'PAY000000082', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(61, 'PAY000000082', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(62, 'PAY000000083', 1810000, '284f9bb7d8bb6b80f29460a7d7053e264e9a4398', 'P', '0000', '317370', 'Success', 15, 0, 'zU4LsL9IqC7fJbsNF54H', 'Bank Mandiri', '', '2018-07-20 14:07:07', '', -1, 'NA'),
(63, 'PAY000000084', 1859000, 'a62e719a4a8cbdc6cfa27a984ec417d475b6461e', 'P', '0000', '617315', 'Success', 15, 0, 'Dc0ZgyJAh6BTKPmZqK0m', 'Bank Mandiri', '', '2018-07-20 14:05:34', '', -1, 'NA'),
(64, 'PAY000000083', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(65, 'PAY000000085', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(66, 'PAY000000086', 1818000, 'bf33e5cc675e818168c82a5560ccaed627ac0aec', 'P', '0000', '884191', 'Success', 15, 0, 'r1NKiBG4356weDhttWW0', 'Bank Mandiri', '', '2018-07-20 14:14:29', '', -1, 'NA'),
(67, 'PAY000000087', 10005000, 'fe7a0083d6f99b08547875224d616f1fd26a8825', 'P', '0000', '247158', 'Success', 15, 0, 'jidPOqsmIXiyQnCmcSdP', 'Bank Mandiri', '', '2018-07-20 14:15:47', '', -1, 'NA'),
(68, 'PAY000000088', 10009000, '6b0233164bc4e32cd83bb4506d286aec6e7bba0e', 'P', '0000', '452716', 'Success', 15, 0, 'PfyHF9CaEaeqSSSS6TDM', 'Bank Mandiri', '', '2018-07-20 14:18:10', '', -1, 'NA'),
(69, 'PAY000000045', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(70, 'PAY000000089', 309000, '75691b49091083721ecd3fef85fb0906bef93ff4', 'P', '0000', '778665', 'Success', 15, 0, 'OCRHOqY2XSkG3TWEHiE7', 'Bank Mandiri', '', '2018-07-20 14:28:01', '', -1, 'NA'),
(71, 'PAY000000090', 1009000, 'a73a10961527ddb07f831ab669eb52f0327a9644', 'P', '0000', '964678', 'Success', 15, 0, 'R5i7NVrnnUP6tnEfhLaz', 'Bank Mandiri', '', '2018-07-20 14:31:44', '', -1, 'NA'),
(72, 'PAY000000091', 9000, '5137d1c205d69f5285688adf88f13b9373695bf9', 'P', '0000', '592269', 'Success', 15, 0, 'LE7XXOyyfGJNqxOUgDyV', 'Bank Mandiri', '', '2018-07-20 14:35:00', '', -1, 'NA'),
(73, 'PAY000000092', 100000, '346cc8ef91a09248bc399d45fd5f5bf8497a42ba', 'P', '0000', '066708', 'Success', 15, 0, 'mOMVwEpmdKeHdefxsn6j', 'Bank Mandiri', '', '2018-07-20 14:42:19', '', -1, 'NA'),
(74, 'PAY000000093', 100000, 'c7fcab3526cffbeac85894f7f904d5e836f80491', 'P', '0000', '601694', 'Success', 15, 0, 'MV3NxogwmvYPFPVu2SMG', 'Bank Mandiri', '', '2018-07-20 14:58:27', '', -1, 'NA'),
(75, 'PAY000000094', 100000, '28d501b90ccdfdc79bcf875cf54fdc11f727ca36', 'P', '0000', '917218', 'Success', 15, 0, 'jXSJokaSFUQWQJgpllYy', 'Bank Mandiri', '', '2018-07-20 15:00:49', '', -1, 'NA'),
(76, 'PAY000000095', 5610000, '1b5053215386ba1dd647ae31b1a4bd319b84148f', 'P', '0000', '792055', 'Success', 15, 0, 'CJbWmEypeQtFiG8v7g9W', 'Bank Mandiri', '', '2018-07-20 15:06:07', '', -1, 'NA'),
(77, 'PAY000000096', 3611000, '8a8c6c67a6c03366d2ddd5b5cf8fae0a5f598e17', 'P', '0000', '274017', 'Success', 15, 0, 'YYbTzjQ9kCAkHuMYKHm9', 'Bank Mandiri', '', '2018-07-20 15:10:31', '', -1, 'NA'),
(78, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(79, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(80, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(81, 'PAY000000098', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(82, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(83, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(84, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(85, 'PAY000000097', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(86, 'PAY000000099', 5009000, '43dddfdac724f645a55eb6d148769a99dd43d694', 'P', '0000', '275570', 'Success', 2, 0, 'ncfmyO5vs1W2xoegbmSR', 'MANDIRI', '', '2018-07-20 15:20:59', '', -1, 'NA'),
(87, 'PAY000000098', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(88, 'PAY000000083', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(89, 'PAY000000083', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(90, 'PAY000000083', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(91, 'PAY000000083', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(92, 'PAY000000083', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(93, 'PAY000000100', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(94, 'PAY000000101', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, ''),
(95, 'PAY000000100', 0, '', '', '', '', 'Requested', 0, 0, '', '', '', '0000-00-00 00:00:00', '', 0, '');

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
(4, 4, 66),
(5, 4, 68),
(6, 4, 56),
(7, 4, 72),
(8, 5, 56),
(10, 6, 79),
(11, 6, 78),
(12, 6, 74),
(13, 6, 88);

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
(5, 'FED0000000005', 5, 'Admin mah saya kasih rating 5 aja gan, takut dibanned hehe', '', 4, 29),
(6, 'FED0000000006', 4, 'Ok', '', 4, 31),
(7, 'FED0000000007', 1, 'Bagus bagus', '', 4, 28),
(8, 'FED0000000008', 5, 'Oke service cepat. makasih', '', 5, 38),
(9, 'FED0000000009', 3, 'service bagus', 'terimakasih', 4, 51),
(10, 'FED0000000010', 5, 'Bagus ini. Berfungsi lagi seperti awal. Tapi lecet dikit. Jangan kasar dong pak', '', 4, 86),
(11, 'FED0000000011', 5, 'ulasan singkat mengenai produk ini...', '', 4, 30),
(12, 'FED0000000012', 5, 'barang bagus sipz terimakasih', '', 4, 99),
(13, 'FED0000000013', 5, 'Takut diblock kalo review nya jelek', '', 5, 88),
(14, 'FED0000000014', 5, 'Mantap. dibonusin earphone, mic, ampli, sama sound system 1 paket lengkap. Thank you Samsung!', '', 5, 87),
(15, 'FED0000000015', 5, 'Sipsipsipsipsipsipsipsip', '', 5, 37),
(16, 'FED0000000016', 5, 'ok', '', 7, 100),
(17, 'FED0000000017', 5, 'oke punya', 'terimakasih\n', 7, 104),
(18, 'FED0000000018', 5, 'Mauntepp bener', '', 6, 53);

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
(5, 'FOL00000005', 4, 4, '2018-03-20 18:43:51', '2018-05-01 17:35:40'),
(6, 'FOL00000006', 4, 4, '2018-05-01 17:35:44', '0000-00-00 00:00:00'),
(7, 'FOL00000007', 7, 6, '2018-07-13 08:29:50', '2018-07-13 08:51:27'),
(8, 'FOL00000008', 4, 6, '2018-07-13 08:49:02', '0000-00-00 00:00:00'),
(9, 'FOL00000009', 7, 6, '2018-07-13 08:51:28', '2018-07-13 08:51:32'),
(10, 'FOL00000010', 7, 6, '2018-07-13 08:51:34', '0000-00-00 00:00:00'),
(11, 'FOL00000011', 8, 6, '2018-07-20 08:19:40', '0000-00-00 00:00:00'),
(12, 'FOL00000012', 8, 4, '2018-07-20 08:26:57', '0000-00-00 00:00:00'),
(13, 'FOL00000013', 5, 4, '2018-07-20 08:27:02', '0000-00-00 00:00:00'),
(14, 'FOL00000014', 5, 6, '2018-07-20 08:28:28', '0000-00-00 00:00:00'),
(15, 'FOL00000015', 9, 6, '2018-07-20 08:40:31', '0000-00-00 00:00:00'),
(16, 'FOL00000016', 9, 4, '2018-07-20 08:42:01', '0000-00-00 00:00:00'),
(17, 'FOL00000017', 4, 8, '2018-07-20 08:48:49', '0000-00-00 00:00:00'),
(18, 'FOL00000018', 9, 8, '2018-07-20 08:48:55', '0000-00-00 00:00:00'),
(19, 'FOL00000019', 8, 8, '2018-07-20 08:49:02', '0000-00-00 00:00:00'),
(20, 'FOL00000020', 7, 8, '2018-07-20 08:49:24', '0000-00-00 00:00:00'),
(21, 'FOL00000021', 10, 8, '2018-07-20 08:50:24', '0000-00-00 00:00:00'),
(22, 'FOL00000022', 7, 4, '2018-07-20 08:51:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hot_item`
--

CREATE TABLE `hot_item` (
  `id` int(10) NOT NULL,
  `hot_item_id` varchar(15) NOT NULL DEFAULT '',
  `promo_price` float NOT NULL DEFAULT '0',
  `promo_description` varchar(1000) NOT NULL DEFAULT '',
  `date_expired_req` date NOT NULL DEFAULT '0000-00-00',
  `posted_item_id` int(15) NOT NULL,
  `is_done` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_item`
--

INSERT INTO `hot_item` (`id`, `hot_item_id`, `promo_price`, `promo_description`, `date_expired_req`, `posted_item_id`, `is_done`) VALUES
(1, 'HOT00000001', 6000000, 'Promo Pra-Puasa', '0000-00-00', 66, 1),
(2, 'HOT00000002', 1800000, 'Promo Puasa', '2018-07-31', 54, 1),
(3, 'HOT00000003', 6100000, 'Promo Puasa', '2018-07-31', 66, 1),
(4, 'HOT00000004', 4999000, 'Diskon banyak', '2018-07-31', 68, 1),
(5, 'HOT00000005', 10000000, 'Flash Sale', '2018-07-14', 77, 1),
(6, 'HOT00000006', 8000000, 'Flash Sale', '2018-07-13', 78, 1),
(7, 'HOT00000007', 4800000, 'Flash Sale', '2018-07-13', 79, 1),
(8, 'HOT00000008', 11000000, 'minta murah admin', '2018-08-20', 104, 1);

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
(14, 'MSG0000000014', '2018-04-28 12:37:04', 2, 17),
(15, 'MSG0000000015', '2018-04-30 14:50:26', 2, 13),
(16, 'MSG0000000016', '2018-04-30 15:32:37', 13, 16),
(17, 'MSG0000000017', '2018-04-30 15:58:53', 13, 15),
(18, 'MSG0000000018', '2018-06-19 16:02:25', 2, 18),
(19, 'MSG0000000019', '2018-06-19 16:39:39', 13, 18),
(20, 'MSG0000000020', '2018-07-13 07:13:11', 2, 22),
(21, 'MSG0000000021', '2018-07-13 08:50:58', 20, 21),
(22, 'MSG0000000022', '2018-07-18 12:59:08', 2, 20),
(23, 'MSG0000000023', '2018-07-18 13:33:38', 2, 21),
(24, 'MSG0000000024', '2018-07-18 13:33:38', 2, 23),
(25, 'MSG0000000025', '2018-07-18 13:38:26', 21, 15),
(26, 'MSG0000000026', '2018-07-20 08:02:48', 2, 25),
(27, 'MSG0000000027', '2018-07-20 08:22:58', 2, 26),
(28, 'MSG0000000028', '2018-07-20 08:53:05', 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `message_text`
--

CREATE TABLE `message_text` (
  `id` int(10) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(5000) NOT NULL DEFAULT '',
  `image_name` varchar(256) DEFAULT NULL,
  `sender_id` int(15) NOT NULL,
  `message_inbox_id` int(15) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_text`
--

INSERT INTO `message_text` (`id`, `date_sent`, `text`, `image_name`, `sender_id`, `message_inbox_id`, `is_read`) VALUES
(20, '2018-03-20 18:11:48', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: 86WMRJ', NULL, 2, 12, 0),
(21, '2018-03-20 18:11:48', 'Nama Pengirim: Anto, Kode OTP: T8BSGY', NULL, 2, 13, 1),
(22, '2018-03-24 07:31:05', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: Y2GG7R', NULL, 2, 12, 0),
(23, '2018-03-24 07:31:05', 'Nama Pengirim: Anto, Kode OTP: B7KPYN', NULL, 2, 13, 1),
(24, '2018-03-28 03:42:17', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.005.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/22\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(25, '2018-04-03 12:10:55', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/23\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(26, '2018-04-03 12:14:50', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.300.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/24\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(27, '2018-04-03 12:15:13', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/25\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(28, '2018-04-03 12:15:46', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.300.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/26\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(29, '2018-04-04 04:03:12', 'Nama Pengirim: Tenant Admin, Kode OTP: L02M5B', NULL, 2, 12, 0),
(30, '2018-04-04 04:03:12', 'Nama Pengirim: Anto, Kode OTP: C8R3T7', NULL, 2, 13, 1),
(31, '2018-04-28 12:37:04', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: 4EI1Y1', NULL, 2, 14, 0),
(32, '2018-04-28 12:37:04', 'Nama Pengirim: Dudung, Kode OTP: XMYBDJ', NULL, 2, 13, 1),
(33, '2018-04-30 14:25:01', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/28\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(34, '2018-04-30 14:36:41', 'Nama Pengirim: Tenant Admin, Kode OTP: YVJGMS', NULL, 2, 14, 0),
(35, '2018-04-30 14:36:41', 'Nama Pengirim: Dudung, Kode OTP: XTJWKN', NULL, 2, 13, 1),
(36, '2018-04-30 14:37:27', 'Okeey', NULL, 15, 13, 1),
(37, '2018-04-30 14:50:26', 'Nama Pengirim: Anto, Kode OTP: 4MTRAI', NULL, 2, 15, 1),
(38, '2018-04-30 14:50:26', 'Nama Pengirim: Bayu, Kode OTP: M50SO5', NULL, 2, 12, 0),
(39, '2018-04-30 15:32:51', 'Wah meledaknya berkeping2. beli baru wae?', NULL, 13, 16, 0),
(40, '2018-04-30 15:33:09', 'Iya lah ya uda ga bisa ini mah', NULL, 13, 16, 0),
(41, '2018-04-30 16:01:45', 'Buang beli baru kaka', NULL, 13, 17, 1),
(42, '2018-04-30 16:06:30', 'Nama Pengirim: Anto, Kode OTP: 003PSO', NULL, 13, 17, 1),
(43, '2018-05-02 03:57:35', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: 8RS9NF', NULL, 2, 14, 0),
(44, '2018-05-02 03:57:36', 'Nama Pengirim: Dudung, Kode OTP: GAQFSS', NULL, 2, 13, 1),
(45, '2018-05-09 03:53:00', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/32\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', NULL, 2, 13, 1),
(46, '2018-06-19 12:01:22', 'hehe', NULL, 13, 17, 1),
(47, '2018-06-19 12:02:34', 'bagus ga?', NULL, 13, 17, 1),
(48, '2018-06-19 16:02:25', 'Nama Pengirim: Tenant Admin, Kode OTP: X4EEEM', NULL, 2, 12, 0),
(49, '2018-06-19 16:02:25', 'Nama Pengirim: Mr. Lee Byung-chule, Kode OTP: A5U35V', NULL, 2, 12, 0),
(50, '2018-06-19 16:02:25', 'Nama Pengirim: Mr. Lei Jun, Kode OTP: TA175F', NULL, 2, 12, 0),
(51, '2018-06-19 16:02:25', 'Nama Pengirim: Anto, Kode OTP: LRJFIJ', NULL, 2, 13, 1),
(52, '2018-06-19 16:02:25', 'Nama Pengirim: Anto, Kode OTP: H82CFJ', NULL, 2, 18, 1),
(53, '2018-06-19 16:02:25', 'Nama Pengirim: Dudung, Kode OTP: 9FB8ZI', NULL, 2, 15, 1),
(54, '2018-06-19 16:02:25', 'Nama Pengirim: Didin, Kode OTP: 5WXXEN', NULL, 2, 14, 0),
(55, '2018-06-19 16:39:39', 'Nama Pengirim: Dudung, Kode OTP: DZFPQR', NULL, 13, 19, 1),
(56, '2018-06-20 14:09:46', 'coba', NULL, 13, 19, 1),
(57, '2018-06-20 14:13:22', 'tes', NULL, 13, 19, 1),
(58, '2018-06-20 14:14:23', 'asdf', NULL, 13, 19, 1),
(59, '2018-06-20 14:14:56', 'cobalagi', NULL, 13, 19, 1),
(60, '2018-06-20 14:18:37', 'tes', NULL, 13, 19, 1),
(61, '2018-06-20 14:46:28', 'tes', 'img/upload/TNT00004/message/19/61.jpg', 13, 19, 1),
(62, '2018-06-20 14:50:33', 'cobalagi', 'img/upload/TNT00004/message/19/62.jpg', 13, 19, 1),
(63, '2018-06-20 15:08:16', 'indeks', 'img/upload/TNT00004/message/19/63.jpg', 13, 19, 1),
(64, '2018-06-20 15:13:28', 'sudah', NULL, 13, 19, 1),
(65, '2018-06-20 15:14:06', 'coba', '', 13, 19, 1),
(66, '2018-06-20 15:14:42', 'tes', '', 13, 19, 1),
(67, '2018-06-20 15:15:00', 'tanpa', '', 13, 19, 1),
(68, '2018-06-20 15:15:16', 'orang', 'img/upload/TNT00004/message/19/68.jpg', 13, 19, 1),
(69, '2018-06-20 15:17:24', 'coba', '', 13, 19, 1),
(70, '2018-06-20 15:17:35', 'lagi', '', 13, 19, 1),
(71, '2018-06-20 15:18:05', 'again', '', 13, 19, 1),
(72, '2018-06-20 15:18:30', 'coba', '', 13, 19, 1),
(73, '2018-06-20 15:18:36', 'lagi', '', 13, 19, 1),
(74, '2018-06-20 15:19:01', 'lagi', '', 13, 19, 1),
(75, '2018-06-20 15:19:18', 'orang lagi', 'img/upload/TNT00004/message/19/75.jpg', 13, 19, 1),
(76, '2018-06-20 15:26:35', 'bagus nih', 'img/upload/TNT00004/message/17/76.jpg', 13, 17, 1),
(77, '2018-06-20 15:34:05', 'coba', 'img/upload/CUS00000004/message/17/77.jpg', 15, 17, 1),
(78, '2018-06-20 15:35:54', 'grafik', 'img/upload/CUS00000004/message/17/78.jpg', 15, 17, 1),
(79, '2018-06-29 04:09:40', 'Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran', '', 2, 15, 1),
(80, '2018-07-09 08:48:53', 'Nama Pengirim: Mr. Lee Byung-chule, Kode OTP: VWMDFC', '', 2, 14, 0),
(81, '2018-07-09 08:48:53', 'Nama Pengirim: Mr. Lei Jun, Kode OTP: AIX3A5', '', 2, 14, 0),
(82, '2018-07-09 08:48:53', 'Nama Pengirim: Dudung, Kode OTP: YIDB9L', '', 2, 13, 1),
(83, '2018-07-13 07:13:11', 'Nama Pengirim: dicky septian, Kode OTP: TXNWMG', '', 2, 15, 1),
(84, '2018-07-13 07:13:11', 'Nama Pengirim: Bayu, Kode OTP: QYQS7L', '', 2, 20, 0),
(85, '2018-07-13 07:30:54', 'test', '', 13, 17, 1),
(86, '2018-07-13 07:31:50', 'estimasi harga 1 juta', '', 13, 17, 1),
(87, '2018-07-13 07:32:05', 'estimasi harga 1 juta', '', 13, 17, 1),
(88, '2018-07-13 07:35:04', 'oke kerjakan', '', 15, 17, 1),
(89, '2018-07-13 07:35:21', 'siap', '', 13, 17, 1),
(90, '2018-07-13 07:52:27', 'Nama Pengirim: dicky septian, Kode OTP: 1O9ZO6', '', 13, 17, 1),
(91, '2018-07-13 08:25:43', 'Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran', '', 2, 15, 1),
(92, '2018-07-18 12:59:08', 'Nama Pengirim: Mr. Lee Byung-chule, Kode OTP: F1Y4T5', '', 2, 20, 0),
(93, '2018-07-18 12:59:08', 'Nama Pengirim: Tenant Admin, Kode OTP: F2XE6R', '', 2, 20, 0),
(94, '2018-07-18 12:59:08', 'Nama Pengirim: dicky septian, Kode OTP: 444SPJ', '', 2, 13, 1),
(95, '2018-07-18 12:59:08', 'Nama Pengirim: dicky septian, Kode OTP: 2Q8EZI', '', 2, 18, 1),
(96, '2018-07-18 12:59:08', 'Nama Pengirim: dicky septian, Kode OTP: JBWO4L', '', 2, 22, 1),
(97, '2018-07-18 12:59:08', 'Nama Pengirim: dicky septian, Kode OTP: 83JPZK', '', 2, 15, 1),
(98, '2018-07-18 12:59:08', 'Nama Pengirim: Didin, Kode OTP: FX9IMW', '', 2, 20, 0),
(99, '2018-07-18 13:03:18', 'Nama Pengirim: dicky septian, Kode OTP: YK6SZO', '', 13, 19, 1),
(100, '2018-07-18 13:33:38', 'Nama Pengirim: Dendeng, Kode OTP: 1QTF20', '', 2, 23, 0),
(101, '2018-07-18 13:33:38', 'Nama Pengirim: Bayu, Kode OTP: RJHZDB', '', 2, 24, 0),
(102, '2018-07-18 13:38:26', 'Nama Pengirim: Dendeng, Kode OTP: ADGVMI', '', 21, 25, 1),
(103, '2018-07-18 14:47:00', 'Selamat! Anda memenangkan lelang untuk barang Oppo F7 dengan harga Rp 60.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/89\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', '', 2, 18, 1),
(104, '2018-07-20 06:44:44', 'Nama Pengirim: dicky septian, Kode OTP: ICS9QQ', '', 13, 19, 1),
(105, '2018-07-20 07:00:51', 'Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran', '', 2, 15, 1),
(106, '2018-07-20 07:23:53', 'Selamat! Anda memenangkan lelang untuk barang Nokia X2 dengan harga Rp 300.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/97\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', '', 2, 13, 1),
(107, '2018-07-20 07:29:28', 'Selamat! Anda memenangkan lelang untuk barang vivo dengan harga Rp 1.000.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/98\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', '', 2, 13, 1),
(108, '2018-07-20 07:36:16', 'Nama Pengirim: Mr. Lee Byung-chule, Kode OTP: TF5U7J', '', 2, 14, 0),
(109, '2018-07-20 07:36:16', 'Nama Pengirim: Tenant Admin, Kode OTP: QCYFUE', '', 2, 14, 0),
(110, '2018-07-20 07:36:16', 'Nama Pengirim: Mr. Lei Jun, Kode OTP: L0QBRS', '', 2, 14, 0),
(111, '2018-07-20 07:36:16', 'Nama Pengirim: Dudung, Kode OTP: 70H16H', '', 2, 18, 1),
(112, '2018-07-20 07:36:16', 'Nama Pengirim: Dudung, Kode OTP: KGYYND', '', 2, 13, 1),
(113, '2018-07-20 07:36:16', 'Nama Pengirim: Dendeng, Kode OTP: QJ18K8', '', 2, 13, 1),
(114, '2018-07-20 07:36:16', 'Nama Pengirim: Tenant Admin, Kode OTP: 1HT7B1', '', 2, 24, 0),
(115, '2018-07-20 08:02:48', 'Selamat! Anda memenangkan lelang untuk barang Ipone X12 dengan harga Rp 5.600.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/102\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', '', 2, 26, 1),
(116, '2018-07-20 08:07:40', 'Nama Pengirim: Tenant Admin, Kode OTP: IPCSCX', '', 2, 24, 0),
(117, '2018-07-20 08:07:40', 'Nama Pengirim: Dendeng, Kode OTP: HEKUXO', '', 2, 26, 1),
(118, '2018-07-20 08:22:58', 'Nama Pengirim: Mr. Lee Byung-chule, Kode OTP: OR1UBT', '', 2, 14, 0),
(119, '2018-07-20 08:22:58', 'Nama Pengirim: Dudung, Kode OTP: C86A5I', '', 2, 27, 0),
(120, '2018-07-20 08:22:58', 'Nama Pengirim: Mr. Lee Byung-chule, Kode OTP: OIIV2Q', '', 2, 24, 0),
(121, '2018-07-20 08:22:58', 'Nama Pengirim: Dendeng, Kode OTP: 37YSS8', '', 2, 26, 1),
(122, '2018-07-20 08:53:05', 'Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran', '', 2, 28, 1),
(123, '2018-07-20 08:55:48', 'Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran', '', 2, 28, 1),
(124, '2018-07-20 08:56:17', 'Barang promosi sudah dikonfirmasi. Silakan cek produk untuk pembayaran', '', 2, 28, 0);

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

--
-- Dumping data for table `negotiated_price`
--

INSERT INTO `negotiated_price` (`id`, `negotiation_id`, `agreement_date`, `discounted_price`, `status`, `order_id`, `tenant_id`, `customer_id`) VALUES
(1, 'NGO0000000001', '2018-04-30 15:52:32', 10000, 'NOT_TAKEN', 30, 4, 4),
(2, 'NGO0000000002', '2018-06-19 16:19:22', 100000, 'NOT_TAKEN', 38, 4, 5),
(3, 'NGO0000000003', '2018-06-19 16:33:28', 100000, 'NOT_TAKEN', 38, 4, 5),
(4, 'NGO0000000004', '2018-06-19 16:38:02', 100000, 'NOT_TAKEN', 38, 4, 5),
(5, 'NGO0000000005', '2018-07-13 07:50:31', 1000000, 'NOT_TAKEN', 51, 4, 4),
(6, 'NGO0000000006', '2018-07-18 13:03:32', 300000, 'NOT_TAKEN', 85, 4, 5),
(7, 'NGO0000000007', '2018-07-18 13:36:40', 400000, 'NOT_TAKEN', 86, 7, 4);

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
  `delivery_receipt_no` varchar(64) NOT NULL DEFAULT '',
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

INSERT INTO `order_details` (`id`, `order_id`, `quantity`, `offered_price`, `sold_price`, `order_status`, `delivery_receipt_no`, `otp_deliverer_to_tenant`, `otp_deliverer_to_customer`, `collection_method`, `otp_customer_to_deliverer`, `otp_tenant_to_deliverer`, `date_repr_decided`, `billing_id`, `posted_item_variance_id`, `deliverer_id`, `tnt_paid_receipt_id`, `voucher_id`) VALUES
(21, 'ORD000000021', 1, 2280000, 2280000, 'DONE', '', 'Y2GG7R', '', '', 'B7KPYN', '', '0000-00-00 00:00:00', 21, 65, 5, 26, NULL),
(22, 'ORD000000022', 2, 1950000, 1950000, 'DONE', '', '86WMRJ', '', '', 'T8BSGY', '', '0000-00-00 00:00:00', 21, 62, 5, 26, NULL),
(23, 'ORD000000023', 1, 1005000, 1005000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 22, 68, NULL, NULL, NULL),
(24, 'ORD000000024', 1, 1800000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 23, 68, NULL, NULL, NULL),
(25, 'ORD000000025', 1, 1300000, 1300000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 24, 68, NULL, NULL, NULL),
(26, 'ORD000000026', 1, 1800000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 25, 68, NULL, NULL, NULL),
(27, 'ORD000000027', 1, 1300000, 1300000, 'DONE', '', 'L02M5B', '', '', 'C8R3T7', '', '0000-00-00 00:00:00', 26, 68, 5, NULL, NULL),
(28, 'ORD000000028', 1, 1950000, 1950000, 'DONE', '', '4EI1Y1', '', '', 'XMYBDJ', '', '0000-00-00 00:00:00', 27, 62, 6, 26, NULL),
(29, 'ORD000000029', 1, 1800000, 1800000, 'DONE', '', 'YVJGMS', '', '', 'XTJWKN', '', '0000-00-00 00:00:00', 28, 68, 6, NULL, NULL),
(30, 'ORD000000030', 0, 25000, 35000, 'DONE', '', 'AVXX7J', 'M50SO5', '', '003PSO', '4MTRAI', '0000-00-00 00:00:00', 30, 76, 5, 26, NULL),
(31, 'ORD000000031', 1, 2280000, 2280000, 'DONE', '', '8RS9NF', '', '', 'GAQFSS', '', '0000-00-00 00:00:00', 31, 64, 6, 26, NULL),
(32, 'ORD000000032', 1, 1800000, 1800000, 'DONE', '', 'X4EEEM', '', '', 'LRJFIJ', '', '0000-00-00 00:00:00', 32, 68, 5, NULL, NULL),
(33, 'ORD000000033', 1, 6500000, 6500000, 'DONE', '', 'A5U35V', '', '', 'LRJFIJ', '', '0000-00-00 00:00:00', 33, 75, 5, 26, NULL),
(34, 'ORD000000034', 1, 6500000, 6100000, 'DONE', '', 'A5U35V', '', '', 'LRJFIJ', '', '0000-00-00 00:00:00', 34, 75, 5, 26, NULL),
(35, 'ORD000000035', 1, 1950000, 1950000, 'DONE', '', 'A5U35V', '', '', 'LRJFIJ', '', '0000-00-00 00:00:00', 35, 62, 5, 26, NULL),
(36, 'ORD000000036', 1, 1850000, 1850000, 'PICKING_FROM_TENANT', '', 'TA175F', '', '', 'LRJFIJ', '', '0000-00-00 00:00:00', 35, 66, 5, NULL, NULL),
(37, 'ORD000000037', 1, 6500000, 6100000, 'DONE', '', 'A5U35V', '', '', 'H82CFJ', '', '0000-00-00 00:00:00', 36, 75, 5, 26, NULL),
(38, 'ORD000000038', 1, 25000, 100000, 'DONE', '', 'G1O35E', '5WXXEN', '', 'DZFPQR', '9FB8ZI', '0000-00-00 00:00:00', 37, 76, 6, 26, NULL),
(39, 'ORD000000039', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 38, 76, NULL, NULL, NULL),
(40, 'ORD000000040', 2, 5000000, 4999000, 'DONE', '', 'VWMDFC', '', '', 'YIDB9L', '', '0000-00-00 00:00:00', 39, 77, 6, 26, 1),
(41, 'ORD000000041', 2, 2280000, 2280000, 'DONE', '', 'VWMDFC', '', '', 'YIDB9L', '', '0000-00-00 00:00:00', 39, 64, 6, 26, 1),
(42, 'ORD000000042', 1, 6500000, 6500000, 'DONE', '', 'VWMDFC', '', '', 'YIDB9L', '', '0000-00-00 00:00:00', 39, 75, 6, 26, 1),
(43, 'ORD000000043', 1, 5000000, 4999000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 40, 77, NULL, NULL, NULL),
(44, 'ORD000000044', 2, 2280000, 2280000, 'DONE', '', 'VWMDFC', '', '', 'YIDB9L', '', '0000-00-00 00:00:00', 41, 64, 6, 26, NULL),
(45, 'ORD000000045', 1, 1850000, 1850000, 'DONE', '', 'AIX3A5', '', '', 'YIDB9L', '', '0000-00-00 00:00:00', 41, 66, 6, 27, NULL),
(46, 'ORD000000046', 2, 1950000, 1950000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 42, 62, NULL, NULL, 1),
(47, 'ORD000000047', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 43, 76, NULL, NULL, NULL),
(48, 'ORD000000048', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 44, 76, NULL, NULL, NULL),
(49, 'ORD000000049', 1, 2280000, 2280000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 45, 64, NULL, NULL, NULL),
(50, 'ORD000000050', 1, 1950000, 1950000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 45, 62, NULL, NULL, NULL),
(51, 'ORD000000051', 1, 25000, 1000000, 'DONE', '', '3WDIKY', 'QYQS7L', '', '1O9ZO6', 'TXNWMG', '0000-00-00 00:00:00', 46, 76, 7, 26, NULL),
(52, 'ORD000000052', 1, 12000000, 10000000, 'DONE', '', 'F2XE6R', '', '', '444SPJ', '', '0000-00-00 00:00:00', 47, 89, 7, NULL, NULL),
(53, 'ORD000000053', 3, 1200000, 8000000, 'DONE', '', 'F2XE6R', '', '', 'JBWO4L', '', '0000-00-00 00:00:00', 48, 90, 7, NULL, NULL),
(54, 'ORD000000054', 1, 1950000, 1800000, 'PICKING_FROM_TENANT', '', 'F1Y4T5', '', '', '444SPJ', '', '0000-00-00 00:00:00', 49, 62, 7, NULL, NULL),
(55, 'ORD000000055', 1, 2280000, 2280000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 50, 64, NULL, NULL, NULL),
(56, 'ORD000000056', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 51, 62, NULL, NULL, NULL),
(57, 'ORD000000057', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 52, 62, NULL, NULL, NULL),
(58, 'ORD000000058', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 53, 62, NULL, NULL, NULL),
(59, 'ORD000000059', 1, 2280000, 2280000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 54, 64, NULL, NULL, NULL),
(60, 'ORD000000060', 1, 1850000, 1850000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 55, 66, NULL, NULL, NULL),
(61, 'ORD000000061', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 56, 62, NULL, NULL, NULL),
(62, 'ORD000000062', 1, 1850000, 1850000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 57, 66, NULL, NULL, NULL),
(63, 'ORD000000063', 1, 2280000, 2280000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 58, 65, NULL, NULL, NULL),
(64, 'ORD000000064', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 59, 62, NULL, NULL, NULL),
(65, 'ORD000000065', 1, 1850000, 1850000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 60, 66, NULL, NULL, NULL),
(66, 'ORD000000066', 1, 2280000, 2280000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 61, 64, NULL, NULL, NULL),
(67, 'ORD000000067', 1, 2280000, 2280000, 'PICKING_FROM_TENANT', '', 'F1Y4T5', '', '', '2Q8EZI', '', '0000-00-00 00:00:00', 62, 64, 7, NULL, 1),
(68, 'ORD000000068', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 63, 84, NULL, NULL, NULL),
(69, 'ORD000000069', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 64, 84, NULL, NULL, NULL),
(70, 'ORD000000070', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 65, 84, NULL, NULL, NULL),
(71, 'ORD000000071', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 66, 88, NULL, NULL, NULL),
(72, 'ORD000000072', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 67, 62, NULL, NULL, NULL),
(73, 'ORD000000073', 1, 2280000, 2280000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 68, 65, NULL, NULL, NULL),
(74, 'ORD000000074', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 69, 62, NULL, NULL, NULL),
(75, 'ORD000000075', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 70, 62, NULL, NULL, NULL),
(76, 'ORD000000076', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 71, 63, NULL, NULL, NULL),
(77, 'ORD000000077', 1, 1850000, 1850000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 72, 66, NULL, NULL, NULL),
(78, 'ORD000000078', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 73, 62, NULL, NULL, NULL),
(79, 'ORD000000079', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 74, 62, NULL, NULL, NULL),
(80, 'ORD000000080', 1, 1950000, 1800000, 'PICKING_FROM_TENANT', '', 'F1Y4T5', '', '', '2Q8EZI', '', '0000-00-00 00:00:00', 75, 62, 7, NULL, NULL),
(81, 'ORD000000081', 1, 1950000, 1800000, 'PICKING_FROM_TENANT', '', 'F1Y4T5', '', '', '2Q8EZI', '', '0000-00-00 00:00:00', 76, 62, 7, NULL, NULL),
(82, 'ORD000000082', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 77, 76, NULL, NULL, NULL),
(83, 'ORD000000083', 1, 25000, 25000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 78, 76, NULL, NULL, NULL),
(84, 'ORD000000084', 1, 25000, 25000, 'PICKING_FROM_TENANT', '', 'PVLAOQ', 'FX9IMW', '', 'YK6SZO', '83JPZK', '0000-00-00 00:00:00', 79, 76, 7, NULL, NULL),
(85, 'ORD000000085', 1, 25000, 300000, 'PICKING_FROM_TENANT', '', 'HYS5XI', 'FX9IMW', '', 'ICS9QQ', '83JPZK', '0000-00-00 00:00:00', 80, 76, 7, NULL, NULL),
(86, 'ORD000000086', 1, 25000, 400000, 'DONE', '', 'DHEN5X', 'RJHZDB', '', 'ADGVMI', '1QTF20', '0000-00-00 00:00:00', 81, 84, 8, NULL, NULL),
(87, 'ORD000000087', 1, 1950000, 1800000, 'DONE', '98j99h89g78g87b', 'TF5U7J', '', '', '70H16H', '', '0000-00-00 00:00:00', 87, 62, 6, 26, NULL),
(88, 'ORD000000088', 1, 12000000, 10000000, 'DONE', '', 'QCYFUE', '', '', '70H16H', '', '0000-00-00 00:00:00', 88, 89, 6, NULL, NULL),
(89, 'ORD000000089', 1, 5000000, 4800000, 'DONE', '', 'QCYFUE', '', '', '70H16H', '', '0000-00-00 00:00:00', 88, 91, 6, NULL, NULL),
(90, 'ORD000000090', 1, 60000, 60000, 'DONE', '', 'QCYFUE', '', '', '70H16H', '', '0000-00-00 00:00:00', 89, 92, 6, NULL, NULL),
(91, 'ORD000000091', 2, 5000000, 4800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 90, 91, NULL, NULL, NULL),
(92, 'ORD000000092', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 91, 63, NULL, NULL, NULL),
(93, 'ORD000000093', 1, 1850000, 1850000, 'DONE', '98j99h89g78g87b', 'L0QBRS', '', '', '70H16H', '', '0000-00-00 00:00:00', 92, 66, 6, 27, NULL),
(94, 'ORD000000094', 1, 10000000, 10000000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 93, 93, NULL, NULL, NULL),
(95, 'ORD000000095', 1, 1950000, 1800000, 'DONE', '', 'TF5U7J', '', '', 'KGYYND', '', '0000-00-00 00:00:00', 94, 63, 6, 26, NULL),
(96, 'ORD000000096', 1, 10000000, 10000000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 95, 93, NULL, NULL, NULL),
(97, 'ORD000000097', 1, 10000000, 10000000, 'DONE', '', 'TF5U7J', '', '', 'KGYYND', '', '0000-00-00 00:00:00', 96, 94, 6, 26, NULL),
(98, 'ORD000000098', 1, 300000, 300000, 'DONE', '', 'QCYFUE', '', '', 'KGYYND', '', '0000-00-00 00:00:00', 97, 95, 6, NULL, NULL),
(99, 'ORD000000099', 1, 1000000, 1000000, 'DONE', '12345679642', '1HT7B1', '', '', 'QJ18K8', '', '0000-00-00 00:00:00', 98, 96, 8, NULL, NULL),
(100, 'ORD000000100', 1, 5600000, 5600000, 'DONE', 'bdg4567890', 'IPCSCX', '', '', 'HEKUXO', '', '0000-00-00 00:00:00', 102, 100, 8, NULL, NULL),
(101, 'ORD000000101', 2, 1950000, 1800000, 'PICKING_FROM_TENANT', '', 'OR1UBT', '', '', 'C86A5I', '', '0000-00-00 00:00:00', 103, 63, 6, NULL, NULL),
(102, 'ORD000000102', 1, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 104, 63, NULL, NULL, NULL),
(103, 'ORD000000103', 1, 1850000, 1850000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 105, 67, NULL, NULL, NULL),
(104, 'ORD000000104', 1, 5000000, 4999000, 'DONE', '', 'OIIV2Q', '', '', '37YSS8', '', '0000-00-00 00:00:00', 106, 77, 8, 26, NULL),
(105, 'ORD000000105', 1, 5000000, 4999000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 107, 77, NULL, NULL, NULL),
(106, 'ORD000000106', 2, 4250000, 4250000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 107, 118, NULL, NULL, NULL),
(107, 'ORD000000107', 1, 3700000, 3700000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 108, 114, NULL, NULL, 1),
(108, 'ORD000000108', 2, 1950000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '', '0000-00-00 00:00:00', 108, 63, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_history`
--

CREATE TABLE `order_status_history` (
  `id` int(11) NOT NULL,
  `order_status_history_id` varchar(128) NOT NULL DEFAULT '',
  `order_details_id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL DEFAULT '',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read_customer` tinyint(1) NOT NULL DEFAULT '0',
  `is_read_tenant` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status_history`
--

INSERT INTO `order_status_history` (`id`, `order_status_history_id`, `order_details_id`, `status`, `date_added`, `is_read_customer`, `is_read_tenant`) VALUES
(25, 'OST0000000025', 21, 'WAITING_FOR_PAYMENT', '2018-03-20 18:00:46', 1, 0),
(26, 'OST0000000026', 22, 'WAITING_FOR_PAYMENT', '2018-03-20 18:00:46', 1, 0),
(27, 'OST0000000027', 21, 'QUEUED', '2018-03-20 18:01:23', 1, 0),
(28, 'OST0000000028', 22, 'QUEUED', '2018-03-20 18:01:23', 1, 0),
(29, 'OST0000000029', 21, 'PICKING_FROM_TENANT', '2018-03-20 18:11:48', 1, 0),
(30, 'OST0000000030', 22, 'PICKING_FROM_TENANT', '2018-03-20 18:11:48', 1, 0),
(31, 'OST0000000031', 21, 'DELIVERING_TO_CUSTOMER', '2018-03-20 18:13:03', 1, 0),
(32, 'OST0000000032', 22, 'DELIVERING_TO_CUSTOMER', '2018-03-20 18:13:03', 1, 0),
(33, 'OST0000000033', 21, 'RECEIVED', '2018-03-20 18:27:55', 1, 0),
(34, 'OST0000000034', 22, 'RECEIVED', '2018-03-20 18:27:55', 1, 0),
(40, 'OST0000000040', 21, 'DONE', '2018-03-20 18:35:48', 1, 0),
(41, 'OST0000000041', 22, 'DONE', '2018-03-20 18:37:25', 1, 0),
(42, 'OST0000000042', 21, 'PICKING_FROM_TENANT', '2018-03-24 07:31:04', 1, 0),
(43, 'OST0000000043', 21, 'RECEIVED', '2018-03-26 07:48:31', 1, 0),
(44, 'OST0000000044', 21, 'RECEIVED', '2018-03-26 07:49:22', 1, 0),
(45, 'OST0000000045', 23, 'WAITING_FOR_PAYMENT', '2018-03-28 03:42:17', 1, 0),
(46, 'OST0000000046', 24, 'WAITING_FOR_PAYMENT', '2018-04-03 12:10:55', 1, 0),
(47, 'OST0000000047', 25, 'WAITING_FOR_PAYMENT', '2018-04-03 12:14:50', 1, 0),
(48, 'OST0000000048', 26, 'WAITING_FOR_PAYMENT', '2018-04-03 12:15:13', 1, 0),
(49, 'OST0000000049', 27, 'WAITING_FOR_PAYMENT', '2018-04-03 12:15:46', 1, 0),
(52, 'OST0000000052', 27, 'QUEUED', '2018-04-04 04:02:55', 1, 0),
(53, 'OST0000000053', 27, 'DELIVERING_TO_CUSTOMER', '2018-04-04 04:03:12', 1, 0),
(54, 'OST0000000054', 27, 'RECEIVED', '2018-04-04 04:04:04', 1, 0),
(55, 'OST0000000055', 27, 'DONE', '2018-04-04 04:04:37', 1, 0),
(56, 'OST0000000056', 28, 'WAITING_FOR_PAYMENT', '2018-04-23 16:50:28', 1, 0),
(57, 'OST0000000057', 28, 'QUEUED', '2018-04-23 16:54:52', 1, 0),
(58, 'OST0000000058', 28, 'PICKING_FROM_TENANT', '2018-04-28 12:37:04', 1, 0),
(59, 'OST0000000059', 28, 'DELIVERING_TO_CUSTOMER', '2018-04-30 10:52:23', 1, 0),
(60, 'OST0000000060', 28, 'RECEIVED', '2018-04-30 10:53:12', 1, 0),
(61, 'OST0000000061', 28, 'DONE', '2018-04-30 10:53:59', 1, 0),
(62, 'OST0000000062', 29, 'WAITING_FOR_PAYMENT', '2018-04-30 14:25:01', 1, 0),
(63, 'OST0000000063', 29, 'QUEUED', '2018-04-30 14:31:52', 1, 0),
(64, 'OST0000000064', 29, 'DELIVERING_TO_CUSTOMER', '2018-04-30 14:36:41', 1, 0),
(65, 'OST0000000065', 29, 'RECEIVED', '2018-04-30 14:37:54', 1, 0),
(66, 'OST0000000066', 29, 'RECEIVED', '2018-04-30 14:45:55', 1, 0),
(67, 'OST0000000067', 29, 'RECEIVED', '2018-04-30 14:46:29', 1, 0),
(68, 'OST0000000068', 29, 'DONE', '2018-04-30 14:47:11', 1, 0),
(69, 'OST0000000069', 30, 'WAITING_FOR_PAYMENT', '2018-04-30 14:49:40', 1, 0),
(70, 'OST0000000070', 30, 'QUEUED', '2018-04-30 14:49:43', 1, 0),
(71, 'OST0000000071', 30, 'PICKING_FROM_CUSTOMER', '2018-04-30 14:50:26', 1, 0),
(72, 'OST0000000072', 30, 'DELIVERING_TO_TENANT', '2018-04-30 14:56:20', 1, 0),
(73, 'OST0000000073', 30, 'TENANT_RECEIVED', '2018-04-30 14:57:25', 1, 0),
(74, 'OST0000000074', 30, 'TENANT_RECEIVED', '2018-04-30 15:00:25', 1, 0),
(75, 'OST0000000075', 30, 'QUEUED', '2018-04-30 16:02:36', 1, 0),
(76, 'OST0000000076', 30, 'PICKING_FROM_TENANT', '2018-04-30 16:06:29', 1, 0),
(77, 'OST0000000077', 30, 'DELIVERING_TO_CUSTOMER', '2018-04-30 16:07:27', 1, 0),
(78, 'OST0000000078', 30, 'RECEIVED', '2018-04-30 16:21:10', 1, 0),
(79, 'OST0000000079', 30, 'DONE', '2018-04-30 16:21:44', 1, 0),
(80, 'OST0000000080', 31, 'WAITING_FOR_PAYMENT', '2018-05-02 03:37:14', 1, 0),
(81, 'OST0000000081', 31, 'QUEUED', '2018-05-02 03:37:27', 1, 0),
(82, 'OST0000000082', 31, 'PICKING_FROM_TENANT', '2018-05-02 03:57:35', 1, 0),
(83, 'OST0000000083', 32, 'WAITING_FOR_PAYMENT', '2018-05-09 03:53:00', 1, 0),
(84, 'OST0000000084', 32, 'QUEUED', '2018-05-09 04:06:10', 1, 0),
(85, 'OST0000000085', 31, 'DELIVERING_TO_CUSTOMER', '2018-05-09 04:07:55', 1, 0),
(86, 'OST0000000086', 31, 'RECEIVED', '2018-05-09 04:09:15', 1, 0),
(87, 'OST0000000087', 31, 'DONE', '2018-05-09 04:09:55', 1, 0),
(88, 'OST0000000088', 33, 'WAITING_FOR_PAYMENT', '2018-05-11 09:57:35', 1, 0),
(89, 'OST0000000089', 33, 'QUEUED', '2018-05-11 10:03:25', 1, 0),
(90, 'OST0000000090', 34, 'WAITING_FOR_PAYMENT', '2018-06-12 09:49:43', 1, 1),
(91, 'OST0000000091', 34, 'QUEUED', '2018-06-12 09:51:31', 1, 1),
(92, 'OST0000000092', 35, 'WAITING_FOR_PAYMENT', '2018-06-12 10:16:16', 1, 1),
(93, 'OST0000000093', 36, 'WAITING_FOR_PAYMENT', '2018-06-12 10:16:16', 1, 0),
(94, 'OST0000000094', 35, 'QUEUED', '2018-06-12 10:16:34', 1, 1),
(95, 'OST0000000095', 36, 'QUEUED', '2018-06-12 10:16:34', 1, 0),
(96, 'OST0000000096', 37, 'WAITING_FOR_PAYMENT', '2018-06-19 15:28:07', 1, 1),
(97, 'OST0000000097', 37, 'QUEUED', '2018-06-19 15:28:20', 1, 1),
(98, 'OST0000000098', 37, 'QUEUED', '2018-06-19 15:35:09', 1, 1),
(99, 'OST0000000099', 38, 'WAITING_FOR_PAYMENT', '2018-06-19 15:57:29', 1, 1),
(100, 'OST0000000100', 38, 'QUEUED', '2018-06-19 15:57:33', 1, 1),
(101, 'OST0000000101', 32, 'DELIVERING_TO_CUSTOMER', '2018-06-19 16:02:24', 1, 0),
(102, 'OST0000000102', 33, 'PICKING_FROM_TENANT', '2018-06-19 16:02:24', 1, 0),
(103, 'OST0000000103', 34, 'PICKING_FROM_TENANT', '2018-06-19 16:02:24', 1, 1),
(104, 'OST0000000104', 35, 'PICKING_FROM_TENANT', '2018-06-19 16:02:24', 1, 1),
(105, 'OST0000000105', 36, 'PICKING_FROM_TENANT', '2018-06-19 16:02:24', 1, 0),
(106, 'OST0000000106', 37, 'PICKING_FROM_TENANT', '2018-06-19 16:02:24', 1, 1),
(107, 'OST0000000107', 38, 'PICKING_FROM_CUSTOMER', '2018-06-19 16:02:24', 1, 1),
(108, 'OST0000000108', 38, 'DELIVERING_TO_TENANT', '2018-06-19 16:17:28', 1, 1),
(109, 'OST0000000109', 38, 'TENANT_RECEIVED', '2018-06-19 16:18:44', 1, 1),
(112, 'OST0000000112', 38, 'QUEUED', '2018-06-19 16:38:09', 1, 1),
(113, 'OST0000000113', 38, 'PICKING_FROM_TENANT', '2018-06-19 16:39:39', 1, 1),
(114, 'OST0000000114', 38, 'DELIVERING_TO_CUSTOMER', '2018-06-19 16:40:26', 1, 0),
(115, 'OST0000000115', 38, 'RECEIVED', '2018-06-19 16:41:01', 1, 0),
(116, 'OST0000000116', 38, 'DONE', '2018-06-19 16:41:35', 1, 0),
(117, 'OST0000000117', 39, 'WAITING_FOR_PAYMENT', '2018-06-20 05:36:01', 1, 0),
(118, 'OST0000000118', 40, 'WAITING_FOR_PAYMENT', '2018-07-02 12:11:28', 1, 0),
(119, 'OST0000000119', 41, 'WAITING_FOR_PAYMENT', '2018-07-02 12:11:28', 1, 0),
(120, 'OST0000000120', 42, 'WAITING_FOR_PAYMENT', '2018-07-02 12:11:28', 1, 0),
(121, 'OST0000000121', 40, 'QUEUED', '2018-07-02 12:12:31', 1, 0),
(122, 'OST0000000122', 41, 'QUEUED', '2018-07-02 12:12:31', 1, 0),
(123, 'OST0000000123', 42, 'QUEUED', '2018-07-02 12:12:31', 1, 0),
(124, 'OST0000000124', 43, 'WAITING_FOR_PAYMENT', '2018-07-05 11:17:37', 1, 0),
(125, 'OST0000000125', 44, 'WAITING_FOR_PAYMENT', '2018-07-05 11:25:06', 1, 0),
(126, 'OST0000000126', 45, 'WAITING_FOR_PAYMENT', '2018-07-05 11:25:06', 1, 0),
(127, 'OST0000000127', 44, 'QUEUED', '2018-07-05 11:25:29', 1, 0),
(128, 'OST0000000128', 45, 'QUEUED', '2018-07-05 11:25:29', 1, 0),
(129, 'OST0000000129', 46, 'WAITING_FOR_PAYMENT', '2018-07-05 11:44:27', 1, 0),
(130, 'OST0000000130', 47, 'WAITING_FOR_PAYMENT', '2018-07-06 08:06:45', 1, 0),
(131, 'OST0000000131', 48, 'WAITING_FOR_PAYMENT', '2018-07-06 08:36:13', 1, 0),
(132, 'OST0000000132', 49, 'WAITING_FOR_PAYMENT', '2018-07-09 08:42:46', 1, 0),
(133, 'OST0000000133', 50, 'WAITING_FOR_PAYMENT', '2018-07-09 08:42:46', 1, 0),
(134, 'OST0000000134', 40, 'PICKING_FROM_TENANT', '2018-07-09 08:48:53', 1, 0),
(135, 'OST0000000135', 41, 'PICKING_FROM_TENANT', '2018-07-09 08:48:53', 1, 0),
(136, 'OST0000000136', 42, 'PICKING_FROM_TENANT', '2018-07-09 08:48:53', 1, 0),
(137, 'OST0000000137', 44, 'PICKING_FROM_TENANT', '2018-07-09 08:48:53', 1, 0),
(138, 'OST0000000138', 45, 'PICKING_FROM_TENANT', '2018-07-09 08:48:53', 1, 0),
(139, 'OST0000000139', 51, 'WAITING_FOR_PAYMENT', '2018-07-09 08:49:48', 1, 1),
(140, 'OST0000000140', 51, 'QUEUED', '2018-07-09 08:49:53', 1, 1),
(141, 'OST0000000141', 51, 'PICKING_FROM_CUSTOMER', '2018-07-13 07:13:11', 1, 1),
(142, 'OST0000000142', 51, 'DELIVERING_TO_TENANT', '2018-07-13 07:24:32', 1, 1),
(143, 'OST0000000143', 51, 'TENANT_RECEIVED', '2018-07-13 07:25:40', 1, 1),
(144, 'OST0000000144', 51, 'QUEUED', '2018-07-13 07:51:42', 1, 1),
(145, 'OST0000000145', 51, 'PICKING_FROM_TENANT', '2018-07-13 07:52:27', 1, 1),
(146, 'OST0000000146', 51, 'DELIVERING_TO_CUSTOMER', '2018-07-13 07:54:13', 1, 1),
(147, 'OST0000000147', 51, 'RECEIVED', '2018-07-13 07:59:23', 1, 1),
(148, 'OST0000000148', 51, 'DONE', '2018-07-13 07:59:49', 1, 1),
(149, 'OST0000000149', 52, 'WAITING_FOR_PAYMENT', '2018-07-13 08:39:56', 1, 0),
(150, 'OST0000000150', 52, 'QUEUED', '2018-07-13 08:40:04', 1, 0),
(151, 'OST0000000151', 53, 'WAITING_FOR_PAYMENT', '2018-07-13 08:47:19', 1, 0),
(152, 'OST0000000152', 53, 'QUEUED', '2018-07-13 08:47:23', 1, 0),
(153, 'OST0000000153', 54, 'WAITING_FOR_PAYMENT', '2018-07-16 10:20:31', 1, 0),
(154, 'OST0000000154', 54, 'QUEUED', '2018-07-16 10:20:34', 1, 0),
(155, 'OST0000000155', 55, 'WAITING_FOR_PAYMENT', '2018-07-18 09:05:41', 1, 0),
(156, 'OST0000000156', 56, 'WAITING_FOR_PAYMENT', '2018-07-18 09:17:14', 1, 0),
(157, 'OST0000000157', 57, 'WAITING_FOR_PAYMENT', '2018-07-18 09:20:35', 1, 0),
(158, 'OST0000000158', 58, 'WAITING_FOR_PAYMENT', '2018-07-18 09:22:54', 1, 0),
(159, 'OST0000000159', 59, 'WAITING_FOR_PAYMENT', '2018-07-18 09:27:07', 1, 0),
(160, 'OST0000000160', 60, 'WAITING_FOR_PAYMENT', '2018-07-18 09:30:10', 1, 0),
(161, 'OST0000000161', 61, 'WAITING_FOR_PAYMENT', '2018-07-18 09:37:17', 1, 0),
(162, 'OST0000000162', 62, 'WAITING_FOR_PAYMENT', '2018-07-18 09:41:06', 1, 0),
(163, 'OST0000000163', 63, 'WAITING_FOR_PAYMENT', '2018-07-18 09:43:35', 1, 0),
(164, 'OST0000000164', 64, 'WAITING_FOR_PAYMENT', '2018-07-18 09:51:20', 1, 0),
(165, 'OST0000000165', 65, 'WAITING_FOR_PAYMENT', '2018-07-18 09:54:11', 1, 0),
(166, 'OST0000000166', 66, 'WAITING_FOR_PAYMENT', '2018-07-18 10:04:24', 1, 0),
(167, 'OST0000000167', 67, 'WAITING_FOR_PAYMENT', '2018-07-18 10:15:51', 1, 0),
(168, 'OST0000000168', 67, 'QUEUED', '2018-07-18 10:16:21', 1, 0),
(169, 'OST0000000169', 68, 'WAITING_FOR_PAYMENT', '2018-07-18 11:26:33', 1, 0),
(170, 'OST0000000170', 69, 'WAITING_FOR_PAYMENT', '2018-07-18 11:32:06', 1, 0),
(171, 'OST0000000171', 70, 'WAITING_FOR_PAYMENT', '2018-07-18 11:37:09', 1, 0),
(172, 'OST0000000172', 71, 'WAITING_FOR_PAYMENT', '2018-07-18 11:42:57', 1, 0),
(173, 'OST0000000173', 72, 'WAITING_FOR_PAYMENT', '2018-07-18 11:45:42', 1, 0),
(174, 'OST0000000174', 73, 'WAITING_FOR_PAYMENT', '2018-07-18 11:46:49', 1, 0),
(175, 'OST0000000175', 74, 'WAITING_FOR_PAYMENT', '2018-07-18 11:53:22', 1, 0),
(176, 'OST0000000176', 75, 'WAITING_FOR_PAYMENT', '2018-07-18 11:58:25', 1, 0),
(177, 'OST0000000177', 76, 'WAITING_FOR_PAYMENT', '2018-07-18 12:03:04', 1, 0),
(178, 'OST0000000178', 77, 'WAITING_FOR_PAYMENT', '2018-07-18 12:05:28', 1, 0),
(179, 'OST0000000179', 78, 'WAITING_FOR_PAYMENT', '2018-07-18 12:10:32', 1, 0),
(180, 'OST0000000180', 79, 'WAITING_FOR_PAYMENT', '2018-07-18 12:17:33', 1, 0),
(181, 'OST0000000181', 80, 'WAITING_FOR_PAYMENT', '2018-07-18 12:24:34', 1, 1),
(182, 'OST0000000182', 80, 'QUEUED', '2018-07-18 12:25:11', 1, 1),
(183, 'OST0000000183', 81, 'WAITING_FOR_PAYMENT', '2018-07-18 12:30:42', 1, 0),
(184, 'OST0000000184', 81, 'QUEUED', '2018-07-18 12:31:22', 1, 0),
(185, 'OST0000000185', 82, 'WAITING_FOR_PAYMENT', '2018-07-18 12:32:46', 1, 0),
(186, 'OST0000000186', 83, 'WAITING_FOR_PAYMENT', '2018-07-18 12:42:38', 1, 0),
(187, 'OST0000000187', 84, 'WAITING_FOR_PAYMENT', '2018-07-18 12:45:02', 1, 1),
(188, 'OST0000000188', 84, 'QUEUED', '2018-07-18 12:46:07', 1, 1),
(189, 'OST0000000189', 85, 'WAITING_FOR_PAYMENT', '2018-07-18 12:52:22', 1, 1),
(190, 'OST0000000190', 85, 'QUEUED', '2018-07-18 12:53:20', 1, 1),
(191, 'OST0000000191', 54, 'PICKING_FROM_TENANT', '2018-07-18 12:59:08', 1, 0),
(192, 'OST0000000192', 67, 'PICKING_FROM_TENANT', '2018-07-18 12:59:08', 1, 0),
(193, 'OST0000000193', 80, 'PICKING_FROM_TENANT', '2018-07-18 12:59:08', 1, 1),
(194, 'OST0000000194', 81, 'PICKING_FROM_TENANT', '2018-07-18 12:59:08', 1, 0),
(195, 'OST0000000195', 84, 'PICKING_FROM_CUSTOMER', '2018-07-18 12:59:08', 1, 1),
(196, 'OST0000000196', 85, 'PICKING_FROM_CUSTOMER', '2018-07-18 12:59:08', 1, 1),
(197, 'OST0000000197', 52, 'DELIVERING_TO_CUSTOMER', '2018-07-18 12:59:08', 1, 0),
(198, 'OST0000000198', 53, 'DELIVERING_TO_CUSTOMER', '2018-07-18 12:59:08', 1, 0),
(199, 'OST0000000199', 84, 'DELIVERING_TO_TENANT', '2018-07-18 13:00:41', 1, 1),
(200, 'OST0000000200', 85, 'DELIVERING_TO_TENANT', '2018-07-18 13:00:41', 1, 1),
(201, 'OST0000000201', 84, 'TENANT_RECEIVED', '2018-07-18 13:02:34', 1, 1),
(202, 'OST0000000202', 85, 'TENANT_RECEIVED', '2018-07-18 13:02:34', 1, 1),
(203, 'OST0000000203', 84, 'PICKING_FROM_TENANT', '2018-07-18 13:03:18', 1, 1),
(204, 'OST0000000204', 85, 'QUEUED', '2018-07-18 13:05:00', 1, 1),
(205, 'OST0000000205', 53, 'RECEIVED', '2018-07-18 13:22:10', 1, 0),
(206, 'OST0000000206', 52, 'RECEIVED', '2018-07-18 13:22:12', 1, 0),
(207, 'OST0000000207', 86, 'WAITING_FOR_PAYMENT', '2018-07-18 13:32:21', 1, 1),
(208, 'OST0000000208', 86, 'QUEUED', '2018-07-18 13:33:13', 1, 1),
(209, 'OST0000000209', 86, 'PICKING_FROM_CUSTOMER', '2018-07-18 13:33:38', 1, 1),
(210, 'OST0000000210', 86, 'DELIVERING_TO_TENANT', '2018-07-18 13:34:42', 1, 1),
(211, 'OST0000000211', 86, 'TENANT_RECEIVED', '2018-07-18 13:35:18', 1, 1),
(212, 'OST0000000212', 86, 'QUEUED', '2018-07-18 13:37:34', 1, 1),
(213, 'OST0000000213', 86, 'PICKING_FROM_TENANT', '2018-07-18 13:38:26', 1, 1),
(214, 'OST0000000214', 86, 'DELIVERING_TO_CUSTOMER', '2018-07-18 13:39:01', 1, 0),
(215, 'OST0000000215', 86, 'RECEIVED', '2018-07-18 13:39:46', 1, 0),
(216, 'OST0000000216', 86, 'DONE', '2018-07-18 13:41:25', 1, 0),
(217, 'OST0000000217', 87, 'WAITING_FOR_PAYMENT', '2018-07-18 14:27:37', 1, 1),
(218, 'OST0000000218', 87, 'QUEUED', '2018-07-18 14:28:00', 1, 1),
(219, 'OST0000000219', 88, 'WAITING_FOR_PAYMENT', '2018-07-18 14:45:14', 1, 0),
(220, 'OST0000000220', 89, 'WAITING_FOR_PAYMENT', '2018-07-18 14:45:14', 1, 0),
(221, 'OST0000000221', 88, 'QUEUED', '2018-07-18 14:45:39', 1, 0),
(222, 'OST0000000222', 89, 'QUEUED', '2018-07-18 14:45:39', 1, 0),
(223, 'OST0000000223', 90, 'WAITING_FOR_PAYMENT', '2018-07-18 14:47:00', 1, 0),
(224, 'OST0000000224', 90, 'QUEUED', '2018-07-18 14:55:36', 1, 0),
(225, 'OST0000000225', 85, 'PICKING_FROM_TENANT', '2018-07-20 06:44:44', 1, 1),
(226, 'OST0000000226', 41, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:49:39', 1, 0),
(227, 'OST0000000227', 44, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:49:39', 1, 0),
(228, 'OST0000000228', 42, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:49:39', 1, 0),
(229, 'OST0000000229', 40, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:49:39', 1, 0),
(230, 'OST0000000230', 32, 'RECEIVED', '2018-07-20 06:50:14', 1, 0),
(231, 'OST0000000231', 35, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:50:31', 1, 0),
(232, 'OST0000000232', 33, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:50:31', 1, 0),
(233, 'OST0000000233', 34, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:50:31', 1, 0),
(234, 'OST0000000234', 37, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:50:31', 1, 0),
(235, 'OST0000000235', 45, 'DELIVERING_TO_CUSTOMER', '2018-07-20 06:52:22', 1, 0),
(236, 'OST0000000236', 40, 'RECEIVED', '2018-07-20 06:52:35', 1, 0),
(237, 'OST0000000237', 41, 'RECEIVED', '2018-07-20 06:52:35', 1, 0),
(238, 'OST0000000238', 42, 'RECEIVED', '2018-07-20 06:52:35', 1, 0),
(239, 'OST0000000239', 44, 'RECEIVED', '2018-07-20 06:52:35', 1, 0),
(240, 'OST0000000240', 45, 'RECEIVED', '2018-07-20 06:52:35', 1, 0),
(241, 'OST0000000241', 91, 'WAITING_FOR_PAYMENT', '2018-07-20 06:53:15', 1, 0),
(242, 'OST0000000242', 52, 'DONE', '2018-07-20 06:54:18', 1, 0),
(243, 'OST0000000243', 44, 'DONE', '2018-07-20 06:54:50', 1, 0),
(244, 'OST0000000244', 45, 'DONE', '2018-07-20 06:54:53', 1, 0),
(245, 'OST0000000245', 40, 'DONE', '2018-07-20 06:55:01', 1, 0),
(246, 'OST0000000246', 41, 'DONE', '2018-07-20 06:55:03', 1, 0),
(247, 'OST0000000247', 42, 'DONE', '2018-07-20 06:55:05', 1, 0),
(248, 'OST0000000248', 92, 'WAITING_FOR_PAYMENT', '2018-07-20 07:03:46', 1, 0),
(249, 'OST0000000249', 93, 'WAITING_FOR_PAYMENT', '2018-07-20 07:04:28', 1, 0),
(250, 'OST0000000250', 93, 'QUEUED', '2018-07-20 07:05:38', 1, 0),
(251, 'OST0000000251', 94, 'WAITING_FOR_PAYMENT', '2018-07-20 07:11:55', 1, 0),
(252, 'OST0000000252', 95, 'WAITING_FOR_PAYMENT', '2018-07-20 07:14:05', 1, 0),
(253, 'OST0000000253', 95, 'QUEUED', '2018-07-20 07:14:41', 1, 0),
(254, 'OST0000000254', 96, 'WAITING_FOR_PAYMENT', '2018-07-20 07:14:44', 1, 0),
(255, 'OST0000000255', 97, 'WAITING_FOR_PAYMENT', '2018-07-20 07:17:52', 1, 1),
(256, 'OST0000000256', 97, 'QUEUED', '2018-07-20 07:18:21', 1, 1),
(257, 'OST0000000257', 32, 'DONE', '2018-07-20 07:22:45', 1, 0),
(258, 'OST0000000258', 98, 'WAITING_FOR_PAYMENT', '2018-07-20 07:23:53', 1, 0),
(259, 'OST0000000259', 98, 'QUEUED', '2018-07-20 07:28:13', 1, 0),
(260, 'OST0000000260', 99, 'WAITING_FOR_PAYMENT', '2018-07-20 07:29:28', 1, 0),
(261, 'OST0000000261', 99, 'QUEUED', '2018-07-20 07:31:55', 1, 0),
(262, 'OST0000000262', 90, 'QUEUED', '2018-07-20 07:35:03', 1, 0),
(263, 'OST0000000263', 87, 'PICKING_FROM_TENANT', '2018-07-20 07:36:16', 1, 0),
(264, 'OST0000000264', 88, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:36:16', 1, 0),
(265, 'OST0000000265', 89, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:36:16', 1, 0),
(266, 'OST0000000266', 90, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:36:16', 1, 0),
(267, 'OST0000000267', 93, 'PICKING_FROM_TENANT', '2018-07-20 07:36:16', 1, 0),
(268, 'OST0000000268', 95, 'PICKING_FROM_TENANT', '2018-07-20 07:36:16', 1, 0),
(269, 'OST0000000269', 97, 'PICKING_FROM_TENANT', '2018-07-20 07:36:16', 1, 1),
(270, 'OST0000000270', 98, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:36:16', 1, 0),
(271, 'OST0000000271', 99, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:36:16', 1, 0),
(272, 'OST0000000272', 99, 'RECEIVED_BY_COURIER', '2018-07-20 07:37:33', 1, 0),
(273, 'OST0000000273', 99, 'DONE', '2018-07-20 07:41:34', 1, 0),
(274, 'OST0000000274', 33, 'RECEIVED', '2018-07-20 07:41:51', 1, 0),
(275, 'OST0000000275', 34, 'RECEIVED', '2018-07-20 07:41:51', 1, 0),
(276, 'OST0000000276', 35, 'RECEIVED', '2018-07-20 07:41:51', 1, 0),
(277, 'OST0000000277', 37, 'RECEIVED', '2018-07-20 07:41:53', 1, 0),
(278, 'OST0000000278', 98, 'RECEIVED', '2018-07-20 07:42:35', 1, 0),
(279, 'OST0000000279', 88, 'RECEIVED', '2018-07-20 07:42:42', 1, 0),
(280, 'OST0000000280', 89, 'RECEIVED', '2018-07-20 07:42:42', 1, 0),
(281, 'OST0000000281', 90, 'RECEIVED', '2018-07-20 07:42:42', 1, 0),
(282, 'OST0000000282', 87, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:43:13', 1, 0),
(283, 'OST0000000283', 95, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:43:13', 1, 0),
(284, 'OST0000000284', 97, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:43:13', 1, 1),
(285, 'OST0000000285', 93, 'DELIVERING_TO_CUSTOMER', '2018-07-20 07:43:31', 1, 0),
(286, 'OST0000000286', 95, 'RECEIVED', '2018-07-20 07:44:02', 1, 0),
(287, 'OST0000000287', 97, 'RECEIVED', '2018-07-20 07:44:02', 1, 1),
(288, 'OST0000000288', 87, 'RECEIVED_BY_COURIER', '2018-07-20 07:44:09', 1, 0),
(289, 'OST0000000289', 93, 'RECEIVED_BY_COURIER', '2018-07-20 07:44:09', 1, 0),
(290, 'OST0000000290', 93, 'DONE', '2018-07-20 07:44:37', 1, 0),
(291, 'OST0000000291', 90, 'DONE', '2018-07-20 07:44:45', 1, 0),
(292, 'OST0000000292', 88, 'DONE', '2018-07-20 07:44:53', 1, 0),
(293, 'OST0000000293', 89, 'DONE', '2018-07-20 07:45:20', 1, 0),
(294, 'OST0000000294', 87, 'DONE', '2018-07-20 07:45:45', 1, 0),
(295, 'OST0000000295', 37, 'DONE', '2018-07-20 07:46:42', 1, 0),
(296, 'OST0000000296', 100, 'WAITING_FOR_PAYMENT', '2018-07-20 08:02:48', 1, 0),
(297, 'OST0000000297', 100, 'QUEUED', '2018-07-20 08:06:12', 1, 0),
(298, 'OST0000000298', 100, 'DELIVERING_TO_CUSTOMER', '2018-07-20 08:07:40', 1, 0),
(299, 'OST0000000299', 100, 'RECEIVED_BY_COURIER', '2018-07-20 08:08:52', 1, 0),
(300, 'OST0000000300', 100, 'DONE', '2018-07-20 08:09:11', 1, 0),
(301, 'OST0000000301', 101, 'WAITING_FOR_PAYMENT', '2018-07-20 08:10:03', 1, 1),
(302, 'OST0000000302', 101, 'QUEUED', '2018-07-20 08:10:35', 1, 1),
(303, 'OST0000000303', 102, 'WAITING_FOR_PAYMENT', '2018-07-20 08:11:15', 1, 0),
(304, 'OST0000000304', 103, 'WAITING_FOR_PAYMENT', '2018-07-20 08:13:38', 1, 0),
(305, 'OST0000000305', 98, 'DONE', '2018-07-20 08:13:40', 1, 0),
(306, 'OST0000000306', 97, 'DONE', '2018-07-20 08:13:55', 1, 1),
(307, 'OST0000000307', 95, 'DONE', '2018-07-20 08:14:02', 1, 0),
(308, 'OST0000000308', 35, 'DONE', '2018-07-20 08:14:35', 1, 0),
(309, 'OST0000000309', 34, 'DONE', '2018-07-20 08:14:39', 1, 0),
(310, 'OST0000000310', 33, 'DONE', '2018-07-20 08:14:42', 1, 0),
(311, 'OST0000000311', 104, 'WAITING_FOR_PAYMENT', '2018-07-20 08:19:57', 1, 1),
(312, 'OST0000000312', 104, 'QUEUED', '2018-07-20 08:21:13', 1, 1),
(313, 'OST0000000313', 101, 'PICKING_FROM_TENANT', '2018-07-20 08:22:58', 0, 1),
(314, 'OST0000000314', 104, 'PICKING_FROM_TENANT', '2018-07-20 08:22:58', 1, 1),
(315, 'OST0000000315', 104, 'DELIVERING_TO_CUSTOMER', '2018-07-20 08:24:06', 1, 1),
(316, 'OST0000000316', 104, 'RECEIVED', '2018-07-20 08:25:32', 1, 1),
(317, 'OST0000000317', 104, 'DONE', '2018-07-20 08:25:44', 1, 1),
(318, 'OST0000000318', 53, 'DONE', '2018-07-23 09:00:50', 1, 0),
(319, 'OST0000000319', 105, 'WAITING_FOR_PAYMENT', '2018-07-23 12:09:11', 1, 0),
(320, 'OST0000000320', 106, 'WAITING_FOR_PAYMENT', '2018-07-23 12:09:11', 1, 0),
(321, 'OST0000000321', 107, 'WAITING_FOR_PAYMENT', '2018-07-23 12:12:41', 1, 0),
(322, 'OST0000000322', 108, 'WAITING_FOR_PAYMENT', '2018-07-23 12:12:41', 1, 0);

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
(12, 'PAY000000012', 'DOKU', '2018-04-04 04:02:54', '', 1300000, 26),
(13, 'PAY000000013', 'DOKU', '2018-04-23 16:54:52', '', 1950000, 27),
(14, 'PAY000000014', 'DOKU', '2018-04-30 14:28:54', '', 0, 29),
(15, 'PAY000000015', 'DOKU', '2018-04-30 14:31:52', '', 1800000, 28),
(16, 'PAY000000016', 'DOKU', '2018-04-30 16:02:36', '', 0, 30),
(17, 'PAY000000017', 'DOKU', '2018-05-02 03:37:27', '', 2280000, 31),
(18, 'PAY000000018', 'DOKU', '2018-05-09 04:06:10', '', 1800000, 32),
(19, 'PAY000000019', 'DOKU', '2018-05-11 10:03:25', '', 6500000, 33),
(20, 'PAY000000020', 'DOKU', '2018-06-12 09:51:31', '', 6100000, 34),
(21, 'PAY000000021', 'DOKU', '2018-06-12 10:16:34', '', 3800000, 35),
(22, 'PAY000000022', 'DOKU', '2018-06-19 15:35:09', '', 6100000, 36),
(23, 'PAY000000023', 'DOKU', '2018-06-19 15:57:33', '', 25000, 37),
(26, 'PAY000000026', '', '2018-06-19 16:38:09', '', 75000, 37),
(27, 'PAY000000027', 'DOKU', '0000-00-00 00:00:00', '', 0, 38),
(28, 'PAY000000028', 'DOKU', '2018-07-02 12:12:31', '', 21008000, 39),
(29, 'PAY000000029', 'DOKU', '0000-00-00 00:00:00', '', 0, 40),
(30, 'PAY000000030', 'DOKU', '2018-07-05 11:25:29', '', 6432000, 41),
(31, 'PAY000000031', 'DOKU', '0000-00-00 00:00:00', '', 0, 42),
(32, 'PAY000000032', 'DOKU', '0000-00-00 00:00:00', '', 0, 43),
(33, 'PAY000000033', 'DOKU', '0000-00-00 00:00:00', '', 0, 44),
(34, 'PAY000000034', 'DOKU', '0000-00-00 00:00:00', '', 0, 45),
(35, 'PAY000000035', 'DOKU', '2018-07-09 08:49:53', '', 25000, 46),
(36, 'PAY000000036', '', '2018-07-13 07:51:42', '', 975000, 46),
(37, 'PAY000000037', 'DOKU', '2018-07-13 08:40:04', '', 10011000, 47),
(38, 'PAY000000038', 'DOKU', '2018-07-13 08:47:23', '', 24010000, 48),
(39, 'PAY000000039', 'DOKU', '2018-07-16 10:20:34', '', 1809000, 49),
(40, 'PAY000000040', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 50),
(41, 'PAY000000041', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 51),
(42, 'PAY000000042', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 52),
(43, 'PAY000000043', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 53),
(44, 'PAY000000044', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 54),
(45, 'PAY000000045', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 55),
(46, 'PAY000000046', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 56),
(47, 'PAY000000047', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 57),
(48, 'PAY000000048', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 58),
(49, 'PAY000000049', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 59),
(50, 'PAY000000050', 'MANDIRI_VA', '0000-00-00 00:00:00', '', 0, 60),
(51, 'PAY000000051', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 61),
(52, 'PAY000000052', 'CREDITCARD', '2018-07-18 10:16:21', '', 2239000, 62),
(53, 'PAY000000053', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 63),
(54, 'PAY000000054', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 64),
(55, 'PAY000000055', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 65),
(56, 'PAY000000056', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 66),
(57, 'PAY000000057', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 67),
(58, 'PAY000000058', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 68),
(59, 'PAY000000059', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 69),
(60, 'PAY000000060', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 70),
(61, 'PAY000000061', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 71),
(62, 'PAY000000062', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 72),
(63, 'PAY000000063', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 73),
(64, 'PAY000000064', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 74),
(65, 'PAY000000065', 'CREDITCARD', '2018-07-18 12:25:11', '', 1809000, 75),
(66, 'PAY000000066', 'CREDITCARD', '2018-07-18 12:31:22', '', 1809000, 76),
(67, 'PAY000000067', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 77),
(68, 'PAY000000068', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 78),
(69, 'PAY000000069', 'CREDITCARD', '2018-07-18 12:46:07', '', 25000, 79),
(70, 'PAY000000070', 'CREDITCARD', '2018-07-18 12:53:20', '', 25000, 80),
(71, 'PAY000000071', '', '2018-07-18 13:05:00', '', 275000, 80),
(72, 'PAY000000072', 'CREDITCARD', '2018-07-18 13:33:13', '', 25000, 81),
(73, 'PAY000000073', '', '2018-07-18 13:37:34', '', 375000, 81),
(74, 'PAY000000074', '', '2018-07-18 13:49:06', '', 100000, 82),
(75, 'PAY000000075', '', '2018-07-18 13:57:43', '', 100000, 83),
(76, 'PAY000000076', '', '0000-00-00 00:00:00', '', 0, 84),
(77, 'PAY000000077', '', '0000-00-00 00:00:00', '', 0, 85),
(78, 'PAY000000078', '', '2018-07-18 14:26:45', '', 100000, 86),
(79, 'PAY000000079', 'CREDITCARD', '2018-07-18 14:28:00', '', 1808500, 87),
(80, 'PAY000000080', 'CREDITCARD', '2018-07-18 14:45:39', '', 14854000, 88),
(81, 'PAY000000081', 'CREDITCARD', '2018-07-18 14:55:36', '', 90000, 89),
(82, 'PAY000000082', 'DOKU', '0000-00-00 00:00:00', '', 0, 90),
(83, 'PAY000000083', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 91),
(84, 'PAY000000084', 'CREDITCARD', '2018-07-20 07:05:38', '', 1859000, 92),
(85, 'PAY000000085', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 93),
(86, 'PAY000000086', 'CREDITCARD', '2018-07-20 07:14:41', '', 1818000, 94),
(87, 'PAY000000087', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 95),
(88, 'PAY000000088', 'CREDITCARD', '2018-07-20 07:18:21', '', 10009000, 96),
(89, 'PAY000000089', 'CREDITCARD', '2018-07-20 07:28:13', '', 309000, 97),
(90, 'PAY000000090', 'CREDITCARD', '2018-07-20 07:31:55', '', 1009000, 98),
(91, 'PAY000000091', 'CREDITCARD', '2018-07-20 07:35:03', '', 9000, 89),
(92, 'PAY000000092', '', '2018-07-20 07:42:48', '', 100000, 99),
(93, 'PAY000000093', '', '0000-00-00 00:00:00', '', 0, 100),
(94, 'PAY000000094', '', '2018-07-20 08:00:57', '', 100000, 101),
(95, 'PAY000000095', 'CREDITCARD', '2018-07-20 08:06:12', '', 5610000, 102),
(96, 'PAY000000096', 'CREDITCARD', '2018-07-20 08:10:35', '', 3611000, 103),
(97, 'PAY000000097', 'MANDIRI_VA', '0000-00-00 00:00:00', '', 0, 104),
(98, 'PAY000000098', 'MANDIRI_VA', '0000-00-00 00:00:00', '', 0, 105),
(99, 'PAY000000099', 'MANDIRI_CLICKPAY', '2018-07-20 08:21:13', '', 5009000, 106),
(100, 'PAY000000100', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 107),
(101, 'PAY000000101', 'CREDITCARD', '0000-00-00 00:00:00', '', 0, 108);

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
(6, 'PTH0000000006', 130, '', '2018-04-04 04:02:55', 26, 4),
(7, 'PTH0000000007', 195, '', '2018-04-23 16:54:52', 27, 4),
(8, 'PTH0000000008', 0, '', '2018-04-30 14:28:54', 29, 4),
(9, 'PTH0000000009', 180, '', '2018-04-30 14:31:52', 28, 4),
(10, 'PTH0000000010', 0, '', '2018-04-30 14:49:43', 30, 4),
(11, 'PTH0000000011', 0, '', '2018-04-30 16:02:36', 30, 4),
(12, 'PTH0000000012', 228, '', '2018-05-02 03:37:27', 31, 4),
(13, 'PTH0000000013', 180, '', '2018-05-09 04:06:10', 32, 4),
(14, 'PTH0000000014', 650, '', '2018-05-11 10:03:25', 33, 4),
(15, 'PTH0000000015', 610, '', '2018-06-12 09:51:31', 34, 4),
(16, 'PTH0000000016', 380, '', '2018-06-12 10:16:35', 35, 4),
(17, 'PTH0000000017', 0, '', '2018-06-19 15:28:20', 36, 5),
(18, 'PTH0000000018', 610, '', '2018-06-19 15:35:09', 36, 5),
(19, 'PTH0000000019', 2, '', '2018-06-19 15:57:33', 37, 5),
(20, 'PTH0000000020', 10, '', '2018-06-19 16:20:39', 37, 5),
(21, 'PTH0000000021', 9, '', '2018-06-19 16:33:58', 37, 5),
(22, 'PTH0000000022', 7, '', '2018-06-19 16:38:09', 37, 5),
(23, 'PTH0000000023', 2100, '', '2018-07-02 12:12:31', 39, 4),
(24, 'PTH0000000024', 643, '', '2018-07-05 11:25:29', 41, 4),
(25, 'PTH0000000025', 2, '', '2018-07-09 08:49:53', 46, 4),
(26, 'PTH0000000026', 97, '', '2018-07-13 07:51:42', 46, 4),
(27, 'PTH0000000027', 1001, '', '2018-07-13 08:40:04', 47, 4),
(28, 'PTH0000000028', 2401, '', '2018-07-13 08:47:23', 48, 6),
(29, 'PTH0000000029', 180, '', '2018-07-16 10:20:34', 49, 4),
(30, 'PTH0000000030', 223, '', '2018-07-18 10:16:21', 62, 5),
(31, 'PTH0000000031', 180, '', '2018-07-18 12:25:11', 75, 5),
(32, 'PTH0000000032', 180, '', '2018-07-18 12:31:22', 76, 5),
(33, 'PTH0000000033', 2, '', '2018-07-18 12:46:07', 79, 5),
(34, 'PTH0000000034', 2, '', '2018-07-18 12:53:20', 80, 5),
(35, 'PTH0000000035', 27, '', '2018-07-18 13:05:00', 80, 5),
(36, 'PTH0000000036', 2, '', '2018-07-18 13:33:13', 81, 4),
(37, 'PTH0000000037', 37, '', '2018-07-18 13:37:34', 81, 4),
(38, 'PTH0000000038', 10, '', '2018-07-18 13:49:06', 82, 5),
(39, 'PTH0000000039', 10, '', '2018-07-18 13:57:43', 83, 5),
(40, 'PTH0000000040', 180, '', '2018-07-18 14:28:00', 87, 5),
(41, 'PTH0000000041', 1485, '', '2018-07-18 14:45:39', 88, 5),
(42, 'PTH0000000042', 9, '', '2018-07-18 14:55:36', 89, 5),
(43, 'PTH0000000043', 185, '', '2018-07-20 07:05:38', 92, 5),
(44, 'PTH0000000044', 181, '', '2018-07-20 07:14:41', 94, 4),
(45, 'PTH0000000045', 1000, '', '2018-07-20 07:18:21', 96, 4),
(46, 'PTH0000000046', 30, '', '2018-07-20 07:28:13', 97, 4),
(47, 'PTH0000000047', 100, '', '2018-07-20 07:31:55', 98, 4),
(48, 'PTH0000000048', 0, '', '2018-07-20 07:35:03', 89, 5),
(49, 'PTH0000000049', 561, '', '2018-07-20 08:06:12', 102, 7),
(50, 'PTH0000000050', 361, '', '2018-07-20 08:10:35', 103, 8),
(51, 'PTH0000000051', 500, '', '2018-07-20 08:21:13', 106, 7);

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
  `is_confirmed` tinyint(4) NOT NULL DEFAULT '0',
  `category_id` int(15) NOT NULL,
  `tenant_id` int(15) NOT NULL,
  `brand_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_item`
--

INSERT INTO `posted_item` (`id`, `posted_item_id`, `posted_item_name`, `price`, `date_posted`, `date_updated`, `date_expired`, `bidding_max_range`, `item_type`, `unit_weight`, `posted_item_description`, `image_one_name`, `is_confirmed`, `category_id`, `tenant_id`, `brand_id`) VALUES
(54, 'ITM000000054', 'Samsung Galaxy J5 2017', 1950000, '2018-03-20 17:39:29', '2018-06-05 11:26:41', NULL, 0, 'ORDER', 200, 'Handphone Mid Tierr', 'img/upload/TNT00004/ITM000000054/default.jpg', 0, 5, 4, 5),
(55, 'ITM000000055', 'Samsung Galaxy J7', 2280000, '2018-03-20 17:43:18', '2018-03-20 17:43:18', NULL, 0, 'ORDER', 195, 'Handphone Mid Tier', 'img/upload/TNT00004/ITM000000055/default.jpg', 0, 5, 4, 5),
(56, 'ITM000000056', 'Xiaomi Redmi Note 4', 1850000, '2018-03-20 17:45:00', '2018-03-20 17:45:00', NULL, 0, 'ORDER', 183, 'Handphone Xiaomi Mid Tier', 'img/upload/TNT00005/ITM000000056/default.jpg', 0, 5, 5, 6),
(57, 'ITM000000057', 'Djisamsung Not Balok', 1800000, '2018-03-28 03:40:49', '2018-04-03 11:43:06', '2018-04-03 17:00:00', 50000, 'BID', 150, 'Djisamsung bukan not angka', 'img/upload/ADM00001/ITM000000057/default.jpg', 1, 5, 0, 5),
(66, 'ITM000000066', 'Samsung S9', 6500000, '2018-04-09 05:41:47', '2018-04-09 05:41:47', NULL, 0, 'ORDER', 150, 'Samsung S9 Murah Cepat Baru', 'img/upload/TNT00004/ITM000000066/default.jpg', 0, 5, 4, 5),
(67, 'ITM000000067', '', 25000, '2018-04-27 11:05:59', '2018-04-27 11:05:59', NULL, 0, 'REPAIR', 1000, 'Servis Handphone Samsung. Konslet, Tidak Berfungsi, Meledak, dan lain-lain', '', 0, 5, 4, 5),
(68, 'ITM000000068', 'Xiaomi Note 4A', 5000000, '2018-06-20 06:55:12', '2018-07-20 06:47:41', NULL, 0, 'ORDER', 200, 'RAM		: 4GB\r\nWarna		: Hitam, Putih, Silver', 'img/upload/TNT00004/ITM000000068/default.jpg', 0, 5, 4, 6),
(70, 'ITM000000070', 'Samsung Galaxy J5', 10000, '2018-06-29 04:24:03', '2018-06-29 04:24:03', '2018-07-06 17:00:00', 10000, 'BID', 200, 'Samsung 2016', '', 1, 5, 0, 5),
(71, 'ITM000000071', 'Samsung Galaxy J5', 40000, '2018-06-29 04:24:23', '2018-07-09 09:59:34', '2018-07-12 17:00:00', 10000, 'BID', 200, 'Samsung 2016', 'img/upload/ADM00001/ITM000000071/default.jpg', 1, 5, 0, 5),
(72, 'ITM000000072', '', 25000, '2018-07-09 11:04:41', '2018-07-09 11:04:41', NULL, 0, 'REPAIR', 0, 'Semua tipe tablet merk Samsung', '', 0, 5, 4, 5),
(73, 'ITM000000073', '', 25000, '2018-07-13 08:56:56', '2018-07-13 08:56:56', NULL, 0, 'REPAIR', 1000, 'Service segala jenis HP Nokia', 'img/upload/TNT00007/ITM000000073/default.jpg', 0, 5, 7, 4),
(74, 'ITM000000074', 'Vivo Nex ', 9000000, '2018-07-13 07:16:23', '2018-07-13 07:16:23', NULL, 0, 'ORDER', 340, 'Vivo Nex Gen ', 'img/upload/TNT00007/ITM000000074/default.jpg', 0, 5, 7, 7),
(75, 'ITM000000075', 'Mi Note 8', 17000000, '2018-07-13 07:24:55', '2018-07-13 07:25:44', NULL, 0, 'ORDER', 430, 'Mi Note Terbaru		', 'img/upload/TNT00007/ITM000000075/default.jpg', 0, 5, 7, 6),
(76, 'ITM000000076', '', 25000, '2018-07-13 08:56:41', '2018-07-13 08:56:41', NULL, 0, 'REPAIR', 1000, 'Servis Laptop Semua Merk', 'img/upload/TNT00007/ITM000000076/default.jpg', 0, 7, 7, 4),
(77, 'ITM000000077', 'Ipone X12', 12000000, '2018-07-13 08:17:56', '2018-07-13 08:17:56', '2018-07-20 17:00:00', 0, 'FLASH', 340, 'Ipone Paling Laku', 'img/upload/ADM00001/ITM000000077/default.jpg', 1, 5, 0, 4),
(78, 'ITM000000078', 'Nokia', 1200000, '2018-07-13 08:19:53', '2018-07-13 08:19:53', '2018-07-20 17:00:00', 0, 'FLASH', 350, 'Nokia Jadul Yang Langka', 'img/upload/ADM00001/ITM000000078/default.jpg', 1, 5, 0, 8),
(79, 'ITM000000079', 'Laptop ASUS', 5000000, '2018-07-13 08:26:42', '2018-07-13 08:26:42', '2018-07-12 17:00:00', 0, 'FLASH', 2400, 'Laptop ASUS TERCANGGIH', 'img/upload/ADM00001/ITM000000079/default.jpg', 1, 7, 0, 8),
(80, 'ITM000000080', 'Oppo F7', 60000, '2018-07-18 13:44:43', '2018-07-18 14:41:41', '2018-07-16 17:00:00', 10000, 'BID', 200, 'Oppo baru 2018', 'img/upload/ADM00001/ITM000000080/default.jpg', 1, 5, 0, 7),
(81, 'ITM000000081', 'samsung s10', 10000000, '2018-07-20 06:51:06', '2018-07-20 06:51:06', NULL, 0, 'ORDER', 100, 'spesifikasi cek google 	', 'img/upload/TNT00004/ITM000000081/default.jpg', 0, 5, 4, 5),
(82, 'ITM000000082', 'Nokia X2', 300000, '2018-07-20 07:14:07', '2018-07-20 07:21:27', '2018-07-20 07:23:53', 100000, 'BID', 270, 'Nokia Terbaik', 'img/upload/ADM00001/ITM000000082/default.jpg', 1, 5, 0, 8),
(83, 'ITM000000083', 'vivo', 1300000, '2018-07-20 07:25:34', '2018-07-20 07:29:24', '2018-07-20 07:29:28', 100000, 'BID', 100, 'sdkas;dkaskd	', '', 1, 5, 0, 8),
(85, 'ITM000000085', 'Ipone X12', 300000, '2018-07-20 07:39:16', '2018-07-20 07:44:11', '2018-07-26 17:00:00', 100000, 'BID', 340, 'ivone', 'img/upload/ADM00001/ITM000000085/default.jpg', 1, 5, 0, 4),
(86, 'ITM000000086', 'Vivo Nex ', 1900000, '2018-07-20 07:45:45', '2018-07-20 08:20:20', '2018-07-30 17:00:00', 200000, 'BID', 350, 'vivo', 'img/upload/ADM00001/ITM000000086/default.jpg', 1, 5, 0, 8),
(87, 'ITM000000087', 'Ipone X12', 5600000, '2018-07-20 07:47:41', '2018-07-20 08:01:12', '2018-07-20 08:02:48', 200000, 'BID', 320, 'iponer', 'img/upload/ADM00001/ITM000000087/default.jpg', 1, 5, 0, 4),
(88, 'ITM000000088', 'Type B', 30000000, '2018-07-20 08:13:54', '2018-07-20 08:13:54', NULL, 0, 'ORDER', 100, 'Handphone setipis kertas', 'img/upload/TNT00008/ITM000000088/default.jpg', 0, 5, 8, 8),
(89, 'ITM000000089', 'Type A', 35000000, '2018-07-20 08:17:02', '2018-07-20 08:17:02', NULL, 0, 'ORDER', 90, 'Handpone Transparant Terbaik', 'img/upload/TNT00008/ITM000000089/default.jpg', 0, 5, 8, 8),
(90, 'ITM000000090', 'Samsung Z', 21000000, '2018-07-20 08:21:49', '2018-07-20 08:21:49', NULL, 0, 'ORDER', 275, 'Handphone Samsung Lipat Pertama di bekasi', 'img/upload/TNT00008/ITM000000090/default.jpg', 0, 5, 8, 5),
(91, 'ITM000000091', 'Samsung Watch Z', 8000000, '2018-07-20 08:23:27', '2018-07-20 08:23:27', NULL, 0, 'ORDER', 145, 'Handphone Jam Samsung terbaru', 'img/upload/TNT00008/ITM000000091/default.jpg', 0, 10, 8, 5),
(92, 'ITM000000092', 'Blackberry Next', 45000000, '2018-07-20 08:24:55', '2018-07-20 08:24:55', NULL, 0, 'ORDER', 340, 'Blackberry dengan hologram', 'img/upload/TNT00008/ITM000000092/default.jpg', 0, 5, 8, 8),
(93, 'ITM000000093', 'Nokia 1000', 1200000, '2018-07-20 08:35:05', '2018-07-20 08:35:05', NULL, 0, 'ORDER', 85, 'Handphone Kokia Legenda', 'img/upload/TNT00009/ITM000000093/default.jpg', 0, 5, 9, 8),
(94, 'ITM000000094', 'Emon Lovers', 5000000, '2018-07-20 08:36:05', '2018-07-20 08:36:05', NULL, 0, 'ORDER', 50, 'Lengkapi Koleksi Emon mu', 'img/upload/TNT00009/ITM000000094/default.jpg', 0, 5, 9, 8),
(95, 'ITM000000095', 'Classic Phone', 8000000, '2018-07-20 08:37:10', '2018-07-20 08:37:10', NULL, 0, 'ORDER', 300, 'Handphone Rasa Klasik', 'img/upload/TNT00009/ITM000000095/default.jpg', 0, 5, 9, 8),
(96, 'ITM000000096', 'Banana Phone', 2000000, '2018-07-20 08:38:01', '2018-07-20 08:38:01', NULL, 0, 'ORDER', 30, 'Harga Per Buah', 'img/upload/TNT00009/ITM000000096/default.jpg', 0, 5, 9, 8),
(97, 'ITM000000097', 'Sandal Phone', 5000000, '2018-07-20 08:39:04', '2018-07-20 08:39:04', NULL, 0, 'ORDER', 300, 'Harga Untuk Satu Pasang', 'img/upload/TNT00009/ITM000000097/default.jpg', 0, 5, 9, 8),
(98, 'ITM000000098', 'Jepit Phone', 5000000, '2018-07-20 08:40:11', '2018-07-20 08:40:11', NULL, 0, 'ORDER', 300, 'Harga Untuk Satu Pasang', 'img/upload/TNT00009/ITM000000098/default.jpg', 0, 5, 9, 8),
(99, 'ITM000000099', 'Samsung Galaxy Tab A', 3500000, '2018-07-20 08:41:13', '2018-07-20 08:41:13', NULL, 0, 'ORDER', 200, '10 Inch loh', 'img/upload/TNT00010/ITM000000099/default.jpg', 0, 6, 10, 5),
(100, 'ITM000000100', 'Nokia 2610', 3700000, '2018-07-20 08:42:04', '2018-07-20 08:42:04', NULL, 0, 'ORDER', 280, 'Nokia 2610 Terlaris', 'img/upload/TNT00009/ITM000000100/default.jpg', 0, 5, 9, 8),
(101, 'ITM000000101', 'Samsung Galaxy Tab S2', 7000000, '2018-07-20 08:42:27', '2018-07-20 08:42:27', NULL, 0, 'ORDER', 240, 'Bagus banget ini asli', 'img/upload/TNT00010/ITM000000101/default.jpg', 0, 6, 10, 5),
(102, 'ITM000000102', 'Samsung Galaxy Tab S3', 9500000, '2018-07-20 08:43:08', '2018-07-20 08:43:08', NULL, 0, 'ORDER', 250, 'Ini maksimal', 'img/upload/TNT00010/ITM000000102/default.jpg', 0, 6, 10, 5),
(103, 'ITM000000103', 'Siemens C32', 4250000, '2018-07-20 08:43:09', '2018-07-20 08:43:09', NULL, 0, 'ORDER', 300, 'Siemens Terbaru', 'img/upload/TNT00009/ITM000000103/default.jpg', 0, 5, 9, 8),
(104, 'ITM000000104', 'Xiaomi Z', 13000000, '2018-07-20 08:45:04', '2018-07-20 08:45:04', NULL, 0, 'ORDER', 70, 'Wirst Phone Xiaomi Terbaik', 'img/upload/TNT00008/ITM000000104/default.jpg', 0, 5, 8, 6);

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
(62, 'VAR0000000062', 'Warna', 'Putih', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 54),
(63, 'VAR0000000063', 'Warna', 'Hitam', 12, 'img/upload/TNT00004/ITM000000054/1-1.jpg', 'img/upload/TNT00004/ITM000000054/1-2.jpg', 'img/upload/TNT00004/ITM000000054/1-3.jpg', 54),
(64, 'VAR0000000064', 'Warna', 'Hitam', 0, 'img/upload/TNT00004/ITM000000055/0-1.jpg', 'img/upload/TNT00004/ITM000000055/0-2.jpg', 'img/default_item.png', 55),
(65, 'VAR0000000065', 'Warna', 'Putih', 7, 'img/upload/TNT00004/ITM000000055/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 55),
(66, 'VAR0000000066', 'Warna', 'Hitam', 0, 'img/upload/TNT00005/ITM000000056/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(67, 'VAR0000000067', 'Warna', 'Putih', 1, 'img/upload/TNT00005/ITM000000056/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(68, 'VAR0000000068', 'Warna', 'Hitam', -7, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 57),
(75, 'VAR0000000075', 'Warna', 'Hitam', 0, 'img/upload/TNT00004/ITM000000066/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 66),
(76, 'VAR0000000076', '', '', 990, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 67),
(77, 'VAR0000000077', 'Warna', 'Putih', 5, 'img/upload/TNT00004/ITM000000068/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 68),
(78, 'VAR0000000078', 'Warna', 'Hitam', 10, 'img/upload/TNT00004/ITM000000068/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 68),
(79, 'VAR0000000079', 'Warna', 'Silver', 10, 'img/upload/TNT00004/ITM000000068/2-1.jpg', 'img/default_item.png', 'img/default_item.png', 68),
(81, 'VAR0000000081', 'Warna', 'Putih', 1, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 70),
(82, 'VAR0000000082', 'Warna', 'Putih', 1, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 71),
(83, 'VAR0000000083', '', '', 100, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 72),
(84, 'VAR0000000084', '', '', 96, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 73),
(85, 'VAR0000000085', 'Warna', 'Rusty Gold', 5, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 74),
(86, 'VAR0000000086', 'Warna', 'Dark Black', 10, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 75),
(87, 'VAR0000000087', 'Warna', 'Misty Grey', 10, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 75),
(88, 'VAR0000000088', '', '', 99, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 76),
(89, 'VAR0000000089', 'Warna', 'Rusty Gold', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 77),
(90, 'VAR0000000090', 'Warna', 'Silver Grey', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 78),
(91, 'VAR0000000091', 'Warna', 'Dark Black', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 79),
(92, 'VAR0000000092', 'Warna', 'Bisa Pilih', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 80),
(93, 'VAR0000000093', 'Warna', 'putih', 0, 'img/upload/TNT00004/ITM000000081/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 81),
(94, 'VAR0000000094', 'Warna', 'hitam', 2, 'img/upload/TNT00004/ITM000000081/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 81),
(95, 'VAR0000000095', 'Warna', 'Sky Blue', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 82),
(96, 'VAR0000000096', 'Warna', 'hitam', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 83),
(98, 'VAR0000000098', 'Warna', 'silver grey', 1, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 85),
(99, 'VAR0000000099', 'Warna', 'Night Black', 1, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 86),
(100, 'VAR0000000100', 'Warna', 'grey', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 87),
(101, 'VAR0000000101', 'Warna', 'Clear', 2000, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 88),
(102, 'VAR0000000102', 'Warna', 'Clear', 1500, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 89),
(103, 'VAR0000000103', 'Warna', 'Black', 500, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 90),
(104, 'VAR0000000104', 'Warna', 'Midnight Black', 300, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 91),
(105, 'VAR0000000105', 'Warna', 'Black', 400, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 92),
(106, 'VAR0000000106', 'Warna', 'Silver Pink', 300, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 93),
(107, 'VAR0000000107', 'Warna', 'Emon Blue', 500, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 94),
(108, 'VAR0000000108', 'Warna', 'Choco', 400, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 95),
(109, 'VAR0000000109', 'Warna', 'Banana', 400, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 96),
(110, 'VAR0000000110', 'Warna', 'Midnight Blue', 200, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 97),
(111, 'VAR0000000111', 'Warna', 'Dark Grey', 200, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 98),
(112, 'VAR0000000112', 'Warna', 'Hitam', 100, 'img/upload/TNT00010/ITM000000099/0-1.jpg', 'img/upload/TNT00010/ITM000000099/0-2.jpg', 'img/default_item.png', 99),
(113, 'VAR0000000113', 'Warna', 'Putih', 100, 'img/upload/TNT00010/ITM000000099/1-1.jpg', 'img/upload/TNT00010/ITM000000099/1-2.jpg', 'img/default_item.png', 99),
(114, 'VAR0000000114', 'Warna', 'Black', 119, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 100),
(115, 'VAR0000000115', 'Warna', 'Hitam Kelam', 200, 'img/upload/TNT00010/ITM000000101/0-1.jpg', 'img/upload/TNT00010/ITM000000101/0-2.jpg', 'img/default_item.png', 101),
(116, 'VAR0000000116', 'Warna', 'Putih Bersih', 200, 'img/upload/TNT00010/ITM000000101/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 101),
(117, 'VAR0000000117', 'Warna', 'Putih', 200, 'img/upload/TNT00010/ITM000000102/0-1.jpg', 'img/upload/TNT00010/ITM000000102/0-2.jpg', 'img/default_item.png', 102),
(118, 'VAR0000000118', 'Warna', 'Silver', 198, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 103),
(119, 'VAR0000000119', 'Warna', 'Sunny Orange', 400, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 104);

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
(1, 'RDR00000001', 1, 4, '2018-04-24 08:45:00', 'PENDING'),
(2, 'RDR00000002', 2, 4, '2018-04-24 08:45:12', 'PENDING'),
(3, 'RDR00000003', 1, 4, '2018-04-24 08:47:09', 'PENDING'),
(4, 'RDR00000004', 3, 4, '2018-05-09 04:25:30', 'PENDING');

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
(1, 'RWD00000001', '2018-04-24 08:44:04', '2018-04-29 17:00:00', 100, 'Pulsa 100k Tri ke nomormu'),
(2, 'RWD00000002', '2018-04-24 08:44:23', '2018-04-27 17:00:00', 180, 'Pulsa 200k Tri ke nomormu juga'),
(3, 'RWD00000003', '2018-04-30 09:44:19', '2018-06-12 16:59:00', 1000, 'Handphone Baru dari Xiyaoming');

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
  `ro_province_id` int(11) NOT NULL,
  `province` varchar(256) NOT NULL,
  `ro_city_id` int(11) NOT NULL,
  `city` varchar(500) NOT NULL DEFAULT '',
  `kecamatan` varchar(500) NOT NULL DEFAULT '',
  `kelurahan` varchar(500) NOT NULL DEFAULT '',
  `postal_code` varchar(20) NOT NULL DEFAULT '',
  `address_detail` varchar(1000) NOT NULL DEFAULT '',
  `latitude` float NOT NULL DEFAULT '0',
  `longitude` float NOT NULL DEFAULT '0',
  `customer_id` int(15) NOT NULL,
  `is_primary` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `address_id`, `ro_province_id`, `province`, `ro_city_id`, `city`, `kecamatan`, `kelurahan`, `postal_code`, `address_detail`, `latitude`, `longitude`, `customer_id`, `is_primary`) VALUES
(4, 'ADD00000004', 9, 'Jawa Barat', 55, 'Bekasi', 'Bekasi Timur', 'Pahlawan', '12345', 'Jl. Bayu Wangi 12', 0, 0, 4, 1),
(5, 'ADD00000005', 9, 'Jawa Barat', 55, 'Bekasi', 'Bekasi Timur', 'Perempatan', '32123', 'Jl. Pahlawan 10', 0, 0, 5, 1),
(6, 'ADD00000006', 9, 'Jawa Barat', 55, 'Kota Bekasi', 'Bekasi Timur', 'Belajar', '45678', 'Jl. Kebijaksanaan 99', 0, 0, 4, 0),
(7, 'ADD00000007', 9, 'Jawa Barat', 23, 'Kota Bandung', 'Bojongloa Kaler', 'Jamika', '40231', 'Jl. Jamika 11', 0, 0, 4, 0),
(8, 'ADD00000008', 9, 'Jawa Barat', 23, 'Kota Bandung', 'Bojongloa Wetan', 'Kosambi', '42215', 'Jl. Ahmad Yani 123', 0, 0, 4, 0),
(9, 'ADD00000009', 9, 'Jawa Barat', 23, 'Kota Bandung', 'Parompong', 'Ciwaruga', '40153', 'Jl satu no dua', 0, 0, 6, 1),
(10, 'ADD00000010', 1, 'Bali', 114, 'Kota Denpasar', 'Burung Camar', 'Walet', '32123', 'Jl. Kuta 18', 0, 0, 5, 0),
(11, 'ADD00000011', 9, 'Jawa Barat', 24, 'Kabupaten Bandung Barat', '', '', '40397', 'jalan cimareme nomer 275', 0, 0, 7, 1),
(12, 'ADD00000012', 9, 'Jawa Barat', 23, 'Kota Bandung', 'Paskal', 'Kapal', '42121', 'Jl. Paris Kaliki 123', 0, 0, 8, 1);

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
(33, 'FEE0000000033', 11000, '', 0),
(34, 'FEE0000000034', 22000, '', 0),
(35, 'FEE0000000035', 11000, '', 0),
(36, 'FEE0000000036', 0, '', 0),
(37, 'FEE0000000037', 0, '', 0),
(38, 'FEE0000000038', 9000, '', 0),
(39, 'FEE0000000039', 0, '', 0),
(40, 'FEE0000000040', 11000, '', 0),
(41, 'FEE0000000041', 10000, '', 0),
(42, 'FEE0000000042', 9000, '', 0),
(43, 'FEE0000000043', 9000, '', 0),
(44, 'FEE0000000044', 9000, '', 0),
(45, 'FEE0000000045', 9000, '', 0),
(46, 'FEE0000000046', 9000, '', 0),
(47, 'FEE0000000047', 9000, '', 0),
(48, 'FEE0000000048', 9000, '', 0),
(49, 'FEE0000000049', 9000, '', 0),
(50, 'FEE0000000050', 9000, '', 0),
(51, 'FEE0000000051', 9000, '', 0),
(52, 'FEE0000000052', 9000, '', 0),
(53, 'FEE0000000053', 9000, '', 0),
(54, 'FEE0000000054', 9000, '', 0),
(55, 'FEE0000000055', 9000, '', 0),
(56, 'FEE0000000056', 0, '', 0),
(57, 'FEE0000000057', 0, '', 0),
(58, 'FEE0000000058', 0, '', 0),
(59, 'FEE0000000059', 0, '', 0),
(60, 'FEE0000000060', 9000, '', 0),
(61, 'FEE0000000061', 9000, '', 0),
(62, 'FEE0000000062', 9000, '', 0),
(63, 'FEE0000000063', 9000, '', 0),
(64, 'FEE0000000064', 9000, '', 0),
(65, 'FEE0000000065', 9000, '', 0),
(66, 'FEE0000000066', 9000, '', 0),
(67, 'FEE0000000067', 9000, '', 0),
(68, 'FEE0000000068', 9000, '', 0),
(69, 'FEE0000000069', 9000, '', 0),
(70, 'FEE0000000070', 0, '', 0),
(71, 'FEE0000000071', 0, '', 0),
(72, 'FEE0000000072', 0, '', 0),
(73, 'FEE0000000073', 0, '', 0),
(74, 'FEE0000000074', 0, '', 0),
(75, 'FEE0000000075', 8500, '', 0),
(76, 'FEE0000000076', 54000, '', 0),
(77, 'FEE0000000077', 30000, '', 0),
(78, 'FEE0000000078', 50000, '', 0),
(79, 'FEE0000000079', 10000, '', 0),
(80, 'FEE0000000080', 9000, '', 0),
(81, 'FEE0000000081', 15000, '', 0),
(82, 'FEE0000000082', 18000, '', 0),
(83, 'FEE0000000083', 5000, '', 0),
(84, 'FEE0000000084', 9000, '', 0),
(85, 'FEE0000000085', 9000, '', 0),
(86, 'FEE0000000086', 9000, '', 0),
(87, 'FEE0000000087', 9000, '', 0),
(88, 'FEE0000000088', 10000, '', 0),
(89, 'FEE0000000089', 11000, '', 0),
(90, 'FEE0000000090', 10000, '', 0),
(91, 'FEE0000000091', 20000, '', 0),
(92, 'FEE0000000092', 10000, '', 0),
(93, 'FEE0000000093', 10000, '', 0),
(94, 'FEE0000000094', 10000, '', 0);

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
  `account_id` int(15) NOT NULL,
  `unit_number` varchar(20) NOT NULL DEFAULT '',
  `floor` varchar(10) NOT NULL DEFAULT '',
  `bank_account` varchar(30) NOT NULL DEFAULT '',
  `bank_account_owner` varchar(200) NOT NULL DEFAULT '',
  `bank_name` varchar(200) NOT NULL DEFAULT '',
  `bank_branch` varchar(200) NOT NULL DEFAULT '',
  `selling_category` varchar(500) NOT NULL DEFAULT '',
  `is_open` tinyint(1) NOT NULL DEFAULT '0',
  `notif_inbox` int(11) NOT NULL DEFAULT '0',
  `notif_dispute` int(11) NOT NULL DEFAULT '0',
  `notif_transaction` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tenant_id`, `tenant_name`, `account_id`, `unit_number`, `floor`, `bank_account`, `bank_account_owner`, `bank_name`, `bank_branch`, `selling_category`, `is_open`, `notif_inbox`, `notif_dispute`, `notif_transaction`) VALUES
(0, 'TNT00000', 'Tenant Admin', 3, '0', '0', '', '', '', '', 'All', 1, 0, 0, 0),
(4, 'TNT00004', 'Samsung Official', 13, 'A-11', 'LG', '1234321234', 'Lee Bruce Bruce', 'BruCeA', 'LeeKumKee', 'Handphone dan Tablet', 1, 0, 0, 0),
(5, 'TNT00005', 'Xiaomi Official', 14, 'A-12', 'LG', '', '', '', '', 'Handphone dan Tablet', 1, 0, 0, 0),
(6, 'TNT00006', 'Oppo Official', 19, '22', 'GF', '5738927491', 'Chen Mingyong', 'BCA', 'Jamika', 'Handphone dan segala aksesorisnya', 1, 0, 0, 0),
(7, 'TNT00007', 'Lapak Nasi', 21, 'A1-01', 'GF', '123.456.789.10.11', 'Bapak Padi', 'Bank Anda', 'Bekasi', 'Handphone', 1, 0, 0, 0),
(8, 'TNT00008', 'GadgetKu', 24, 'B1-07', 'GF', '123456789000', 'Budi ', 'Bank Anda', 'Bekasi', 'Handphone', 1, 0, 0, 0),
(9, 'TNT00009', 'Kolektor HP', 27, 'C07-18', 'GF', '87654321', 'Joko', 'ABC', 'Kakilima', 'HP', 1, 0, 0, 0),
(10, 'TNT00010', 'Yamazaki Store', 28, 'YZ-1', '2', '8380799799', 'Kenji', 'BCA', 'Sudirman', 'Tablet', 1, 0, 0, 0);

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
(5, '5', 4, 54, NULL, 1, 100000, '2018-03-30 00:00:00', '2018-03-27 15:26:12'),
(6, '6', 4, 55, NULL, 1, 300000, '2018-05-31 00:00:00', '2018-05-17 13:21:36'),
(7, '7', 4, 66, 1, 1, 100000, '2018-05-16 00:00:00', '2018-04-30 21:19:51'),
(8, 'TBL00000008', 4, 54, 2, 1, 200000, '2018-07-31 00:00:00', '2018-05-15 10:17:27'),
(9, 'TBL00000009', 4, 66, 3, 1, 50000, '2018-07-31 00:00:00', '2018-05-26 19:15:58'),
(10, 'TBL00000010', 4, 68, 4, 1, 5000000, '2018-07-31 00:00:00', '2018-06-29 11:10:06'),
(11, 'TBL00000011', 0, 77, 5, 1, 0, '2018-07-21 00:00:00', '2018-07-13 15:17:56'),
(12, 'TBL00000012', 0, 78, 6, 1, 0, '2018-07-21 00:00:00', '2018-07-13 15:19:53'),
(13, 'TBL00000013', 4, 68, NULL, 1, 1000000, '2018-08-14 00:00:00', '2018-07-13 15:26:22'),
(14, 'TBL00000014', 0, 79, 7, 1, 0, '2018-07-21 00:00:00', '2018-07-13 15:26:42'),
(17, 'TBL00000017', 4, 81, NULL, 1, 50000, '2018-07-31 00:00:00', '2018-07-20 14:04:41'),
(18, 'TBL00000018', 8, 104, 8, 1, 1000000, '2018-08-20 00:00:00', '2018-07-20 15:53:40'),
(19, 'TBL00000019', 8, 104, NULL, 1, 1000000, '2018-08-20 00:00:00', '2018-07-20 15:57:36'),
(20, 'TBL00000020', 8, 91, NULL, 1, 1000000, '2018-08-20 00:00:00', '2018-07-20 15:57:21');

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
(14, 'TPR00000014', NULL, NULL, '', 1, 400000),
(15, 'TPR00000015', NULL, NULL, '', 1, 3700000),
(16, 'TPR00000016', NULL, NULL, '', 1, 76527000),
(17, 'TPR00000017', NULL, NULL, '', 1, 3700000),
(18, 'TPR00000018', NULL, NULL, '', 1, 76527000),
(19, 'TPR00000019', NULL, NULL, '', 1, 400000),
(20, 'TPR00000020', NULL, NULL, '', 1, 400000),
(21, 'TPR00000021', NULL, NULL, '', 1, 3700000),
(22, 'TPR00000022', NULL, NULL, '', 1, 76527000),
(23, 'TPR00000023', NULL, NULL, '', 1, 400000),
(24, 'TPR00000024', NULL, NULL, '', 1, 3700000),
(25, 'TPR00000025', NULL, NULL, '', 1, 76527000),
(26, 'TPR00000026', NULL, NULL, '', 1, 76527000),
(27, 'TPR00000027', NULL, NULL, '', 1, 3700000);

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
(1, 'VCR00000001', 50000, 'Voucher 50K untuk semua barang!!', '2018-07-02 12:10:25', '2018-07-31 00:00:00', 995, 'VOUCHER50', 1000000, 1);

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
(2, 1, 7),
(3, 1, 5),
(4, 1, 6);

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
-- Indexes for table `doku`
--
ALTER TABLE `doku`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding_live`
--
ALTER TABLE `bidding_live`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dispute`
--
ALTER TABLE `dispute`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dispute_text`
--
ALTER TABLE `dispute_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doku`
--
ALTER TABLE `doku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `favorite_item`
--
ALTER TABLE `favorite_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `following_tenant`
--
ALTER TABLE `following_tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hot_item`
--
ALTER TABLE `hot_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item_tag`
--
ALTER TABLE `item_tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_inbox`
--
ALTER TABLE `message_inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `order_status_history`
--
ALTER TABLE `order_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posted_item`
--
ALTER TABLE `posted_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `redeem_reward`
--
ALTER TABLE `redeem_reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `redeem_voucher`
--
ALTER TABLE `redeem_voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_reward`
--
ALTER TABLE `setting_reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
