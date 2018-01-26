-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 10:39 AM
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
(1, 'TNT00001', 'Jordan', 'Jalan Pelajar Pejuang no 55', '1987-12-14', '0812312322', 'djisamsung@hotmail.com', 'a3dcb4d229de6fde0db5686dee47145d', '327213217385', '', '2018-01-16 19:09:45', 'active', '2017-12-07 15:02:07', ''),
(2, 'ADM00001', 'Dewa', 'Jalan Pejuang Pelajar no 56', '1987-12-05', '08214214233', 'admin1@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', '327213217384', '', '2018-01-22 10:12:02', 'active', '2017-12-14 06:35:41', ''),
(3, 'CUS00001', 'Billy', 'Jalan Pelajar Pejuang no 57', '1997-12-20', '081298798222', 'billy@hotmail.com', '89c246298be2b6113fb10ba80f3c6956', '327213217382', 'CUS00004', '2018-01-21 18:46:21', 'active', '2017-12-14 06:41:45', ''),
(4, 'DLV00001', 'Dori', 'Jalan Jendral Sudirman 543', '1991-12-12', '082131271322', 'dori@gmail.com', 'c5548e74ec3c08a867e8eac9cc6cf90e', '327213217381', '327212037812', '2018-01-10 15:25:34', 'inactive', '2017-12-25 11:35:00', ''),
(5, 'DLV00002', 'Rido', 'Jalan Pejuang Pelajar no 2', '1991-01-19', '08123312312', 'rido@gmail.com', 'c5548e74ec3c08a867e8eac9cc6cf90e', '327212037813', '327212037812', '2018-01-08 10:13:49', 'active', '2018-01-01 16:38:24', ''),
(8, 'TNT00003', 'Michael', 'Jalan Pelajar Pejuang No 57', '1987-11-24', '08132221333', 'xiyaoming@hotmail.com', 'a3dcb4d229de6fde0db5686dee47145d', '327213217382', '', '2018-01-21 18:48:30', 'ACTIVE', '2018-01-10 10:29:15', ''),
(9, 'DLV00003', 'Dodo', 'Jalan Jendral Sudirman No 534', '1992-12-12', '082131271333', 'dodo@gmail.com', 'c5548e74ec3c08a867e8eac9cc6cf90e', '327213247381', '', '2018-01-21 15:45:28', 'ACTIVE', '2018-01-10 10:41:02', '');

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
  `shipping_address_id` int(15) NOT NULL,
  `shipping_charge_id` int(15) NOT NULL,
  `delivery_method` varchar(500) NOT NULL DEFAULT '',
  `point_received` int(11) NOT NULL DEFAULT '0',
  `setting_reward_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `bill_id`, `date_created`, `date_closed`, `total_payable`, `customer_id`, `shipping_address_id`, `shipping_charge_id`, `delivery_method`, `point_received`, `setting_reward_id`) VALUES
(2, 'BIL00001', '2017-12-25 00:00:00', '2017-12-25 01:00:00', 1000000, 1, 1, 1, '', 0, 1),
(3, 'BIL000000003', '2018-01-08 10:10:08', '2018-01-09 10:10:08', 7500000, 1, 1, 2, 'CYBERIA', 0, 1);

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
(1, 'BRD000001', 'Brand 1', 'Deskripsi Brand 1'),
(2, 'BRD000002', 'Djisamsung', 'Merk Handphone Ternama'),
(3, 'BRD000003', 'Xiyaoming', 'Brand Xiyaoming');

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
(1, 'Kategori 1', 'Deskripsi Kategori 1'),
(3, 'Handphone', 'Kategori untuk Handphone'),
(4, 'Laptop', 'Ya laptop aja sih');

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
(1, 'CUS00001', 3, 'UNVERIFIED', 0, 0, 0, NULL);

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
(1, 'DLV00001', 4, 'B 3321 EB', 'Vespa Anti Mogok'),
(2, 'DLV00002', 5, 'B 3322 BE', 'Vespa Mungkin Mogok'),
(3, 'DLV00003', 9, 'B 3121 BB', 'Vespa Susah Mogok');

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
  `order_det_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `favorite_item`
--

CREATE TABLE `favorite_item` (
  `id` int(10) NOT NULL,
  `customer_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `order_det_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_id`, `rating`, `feedback_text`, `feedback_reply`, `submitted_by`, `order_det_id`) VALUES
(1, 'FED0000000001', 5, 'Bagus lah mantep2 pokonya recommended!', '', 3, 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `item_tag`
--

CREATE TABLE `item_tag` (
  `id` int(10) NOT NULL,
  `tag_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_tag`
--

INSERT INTO `item_tag` (`id`, `tag_id`, `posted_item_id`) VALUES
(1, 12, 12),
(2, 13, 12),
(3, 14, 12),
(4, 15, 12),
(5, 16, 18),
(6, 17, 18);

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
(2, 'MSG0000000002', '2018-01-21 08:44:36', 2, 8),
(3, 'MSG0000000003', '2018-01-21 08:44:36', 2, 9),
(4, 'MSG0000000004', '2018-01-21 11:46:57', 3, 1),
(5, 'MSG0000000005', '2018-01-22 03:09:21', 8, 3);

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
(3, '2018-01-21 08:44:36', 'Nama Pengirim: Dodo, Kode OTP: 2VR5BF', 2, 2),
(4, '2018-01-21 08:44:36', 'Nama Pengirim: Billy, Kode OTP: Z980JN', 2, 3),
(5, '2018-01-22 03:09:21', 'Nama Pengirim: Dodo, Kode OTP: X71KQG', 8, 5);

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
(25, 'NGO0000000025', '2018-01-21 11:27:42', 250000, 'NOT_TAKEN', 6, 3, 1);

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
  `voucher_cut_price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `quantity`, `offered_price`, `sold_price`, `order_status`, `otp_deliverer_to_tenant`, `otp_deliverer_to_customer`, `collection_method`, `otp_customer_to_deliverer`, `otp_tenant_to_deliverer`, `date_repr_decided`, `billing_id`, `posted_item_variance_id`, `deliverer_id`, `tnt_paid_receipt_id`, `voucher_cut_price`) VALUES
(3, 'ORD00001', 1, 1000000, 1000000, 'DELIVERING_TO_CUSTOMER', '46EGX1', '', 'DELIVER', '5FZSSQ', '', '0000-00-00 00:00:00', 2, 3, 2, NULL, 0),
(4, 'ORD00002', 1, 2000000, 1900000, 'DELIVERING_TO_CUSTOMER', '46EGX1', '', 'DELIVER', '5FZSSQ', '', '0000-00-00 00:00:00', 2, 8, 2, NULL, 100000),
(5, 'ORD000000005', 1, 7500000, 7500000, 'RECEIVED', 'OY7MJX', '', '', 'RWPIUC', '', '0000-00-00 00:00:00', 3, 9, 1, NULL, 0),
(6, 'ORD00003', 1, 25000, 0, 'QUEUED', '', '', 'DELIVER', '', '', '0000-00-00 00:00:00', 3, 41, NULL, NULL, 0);

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
(1, 'PAY000000001', 'KLIKBCA', '2018-01-08 03:10:37', '', 7500000, 3);

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
  `brand_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posted_item`
--

INSERT INTO `posted_item` (`id`, `posted_item_id`, `posted_item_name`, `price`, `date_posted`, `date_updated`, `date_expired`, `bidding_max_range`, `item_type`, `unit_weight`, `posted_item_description`, `image_one_name`, `category_id`, `tenant_id`, `brand_id`) VALUES
(10, 'ITM000000010', 'Djisamsung Galasy Tujuh', 6000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Galasy Baru', '', 1, 1, 1),
(12, 'ITM000000012', 'Xi Yaoming', 3500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 200, '#Hape merk #XiYaoming keluaran terbaru #new #best', '', 1, 1, 1),
(13, 'ITM000000013', 'Djisamsung Galasy 7.5', 7500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Handphone Djisamsung terbaru banget', '3 - Open Recruitment.jpg', 3, 1, 2),
(14, 'ITM000000014', 'Djisamsung Not Balok', 6000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Bukan Djisamsung not angka', '', 3, 1, 2),
(15, 'ITM000000015', 'Djisamsung J etkoster', 4200000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Djisamsung ngebut', 'eyes.png', 3, 1, 2),
(16, 'ITM000000016', 'Djisamsung Galasy 7.75', 7750000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Handphone Djisamsung keluaran terbarunya terbaru', '', 3, 1, 2),
(17, 'ITM000000017', 'Djisamsung Galasy Tujuh Setengah', 7500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Handphone Djisamsung keluaran terbaru', 'img/upload/TNT00001/ITM000000017/default.jpg', 3, 1, 2),
(18, 'ITM000000018', 'Xiaomay EC 6', 6000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 160, 'Xiaomay Dua Ribu Tujuhbelas #2017 #baru', 'img/default_item.png', 3, 3, 1),
(19, 'ITM000000019', 'Xiaomay EC 7', 7000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 170, 'Xiaomay keluaran terbaru', 'img/upload/TNT00003/ITM000000019/default.jpg', 3, 3, 1),
(30, 'ITM000000030', 'Xiaomay EC 8', 8000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 180, 'Xiaomay baru anyar', 'img/upload/TNT00003/ITM000000030/default.jpg', 3, 3, 1),
(31, 'ITM000000031', 'Xiaomay EC 8.5', 7500000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 100, 'Xiaomay baru anyar', 'img/upload/TNT00003/ITM000000031/default.jpg', 3, 3, 1),
(37, 'ITM000000037', 'Xiyaoming M2', 2000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 200, 'Xioming Baru Lama', 'img/upload/TNT00003/ITM000000037/default.jpg', 3, 3, 1),
(38, 'ITM000000038', 'Xiyaoming M3', 3000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 300, 'Xiyaoming lebih baru dari M2', 'img/upload/TNT00003/ITM000000038/default.jpg', 3, 3, 1),
(39, 'ITM000000039', 'Xiyaoming M4', 4000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, 'ORDER', 250, 'Xiaoming agak berat', 'img/upload/TNT00003/ITM000000039/default.jpg', 3, 3, 1),
(41, 'ITM000000041', '', 25000, '2018-01-16 12:29:26', '2018-01-16 12:29:26', NULL, NULL, 'REPAIR', 0, 'Servis Handphone Djisamsung semua tipe', '', 3, 1, 2),
(42, 'ITM000000042', '', 25000, '2018-01-16 14:45:50', '2018-01-16 14:45:50', NULL, NULL, 'REPAIR', 0, 'Servis Laptop Xiyaoming Bebas Apa Aja', '', 4, 3, 3);

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
(3, 'VAR0000000003', 'Warna', 'Putih', 3, '', '', '', 10),
(4, 'VAR0000000004', 'Warna', 'Hitam', 2, '', '', '', 10),
(5, 'VAR0000000005', 'Warna', 'Pelangi', 4, '', '', '', 10),
(7, 'VAR0000000007', 'Warna', 'Hitam', 2, '', '', '', 12),
(8, 'VAR0000000008', 'Warna', 'Kuning', 1, '', '', '', 12),
(9, 'VAR0000000009', 'Warna', 'Putih', 2, '', '', '', 13),
(10, 'VAR0000000010', 'Warna', 'Kuning', 2, '', '', '', 14),
(11, 'VAR0000000011', 'Warna', 'Merah', 3, '', '', '', 15),
(12, 'VAR0000000012', 'Warna', 'Hijau', 3, '', '', '', 16),
(13, 'VAR0000000013', 'Warna', 'Jingga', 2, '', '', '', 17),
(14, 'VAR0000000014', 'Warna', 'Hologram', 2, '', '', '', 18),
(15, 'VAR0000000015', 'Warna', 'Pelangi', 1, '', '', '', 18),
(16, 'VAR0000000016', 'Warna', 'Coklat', 2, '', '', '', 19),
(17, 'VAR0000000017', 'Warna', 'Abu', 4, '', '', '', 19),
(27, 'VAR0000000027', 'Warna', 'Merah', 3, '', '', '', 30),
(35, 'VAR0000000035', 'Warna', 'Putih', 3, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 37),
(36, 'VAR0000000036', 'Warna', 'Hitam', 4, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 37),
(37, 'VAR0000000037', 'Warna', 'Kuning', 2, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 38),
(38, 'VAR0000000038', 'Warna', 'Jingga', 4, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 38),
(39, 'VAR0000000039', 'Warna', 'Abu', 2, 'img/upload/TNT00003/ITM000000039/0-1.jpg', 'img/upload/TNT00003/ITM000000039/0-2.jpg', '', 39),
(40, 'VAR0000000040', 'Warna', 'Kuning', 1, 'img/upload/TNT00003/ITM000000039/1-1.jpg', '', '', 39),
(41, 'VAR0000000041', '', '', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 42);

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
(1, 'RWD00000001', '0000-00-00 00:00:00', '2017-12-28 17:00:00', 450, 'Reward berupa handphone dari tenant A');

-- --------------------------------------------------------

--
-- Table structure for table `setting_reward`
--

CREATE TABLE `setting_reward` (
  `id` int(10) NOT NULL,
  `setting_reward_id` varchar(15) NOT NULL DEFAULT '',
  `base_percent` int(11) NOT NULL DEFAULT '100',
  `ratio_percent` int(11) NOT NULL DEFAULT '100',
  `event_name` varchar(500) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_reward`
--

INSERT INTO `setting_reward` (`id`, `setting_reward_id`, `base_percent`, `ratio_percent`, `event_name`, `date_created`, `date_expired`) VALUES
(1, 'SRW00001', 50, 50, 'Normal', '2018-01-26 09:34:40', NULL);

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
  `customer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `address_id`, `city`, `kecamatan`, `kelurahan`, `postal_code`, `address_detail`, `latitude`, `longitude`, `customer_id`) VALUES
(1, 'ADR0001', 'Bandung', 'Cicendo', 'Arjuna', '40222', 'Jalan Pejuang Pelajar', -2, 4.23, 1);

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
(1, 'CRG0001', 10000, 'Sepuluh ribu saja', 4.2),
(2, 'FEE0000000002', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) NOT NULL,
  `tag_name` varchar(100) NOT NULL DEFAULT '',
  `date_of_initial_used` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `date_of_initial_used`) VALUES
(12, 'Hape', '2017-12-20'),
(13, 'XiYaoming', '2017-12-20'),
(14, 'new', '2017-12-20'),
(15, 'best', '2017-12-20'),
(16, '2017', '2018-01-12'),
(17, 'baru', '2018-01-12');

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
  `selling_category` varchar(500) NOT NULL DEFAULT '',
  `is_open` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tenant_id`, `tenant_name`, `account_id`, `unit_number`, `floor`, `selling_category`, `is_open`) VALUES
(1, 'TNT00001', 'Djisamsung', 1, '75', '4', 'Handphone', 1),
(3, 'TNT00003', 'Xiyaoming', 8, '79', 'LG', 'Handphone dan Tablet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_bill`
--

CREATE TABLE `tenant_bill` (
  `id` int(10) NOT NULL,
  `tenant_bill_id` varchar(15) NOT NULL DEFAULT '',
  `tenant_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL,
  `hot_item_id` int(15) NOT NULL,
  `admin_id` int(15) NOT NULL,
  `payment_value` float NOT NULL DEFAULT '0',
  `payment_expiration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `voucher_stock` int(10) NOT NULL DEFAULT '0',
  `voucher_code` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucher_id`, `voucher_worth`, `voucher_description`, `date_added`, `voucher_stock`, `voucher_code`) VALUES
(2, 'VCR00000002', 50000, 'Potongan Harga 50 Ribu Rupiah', '0000-00-00 00:00:00', 5, 'VCR5523');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_brand`
--

CREATE TABLE `voucher_brand` (
  `voucher_id` int(15) NOT NULL,
  `brand_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_brand`
--

INSERT INTO `voucher_brand` (`voucher_id`, `brand_id`) VALUES
(2, 2);

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
  ADD KEY `order_det_id` (`order_det_id`);

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
  ADD KEY `order_det` (`order_det_id`);

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
  ADD KEY `posted_item_variance_id` (`posted_item_variance_id`);

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
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `voucher_id` (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dispute`
--
ALTER TABLE `dispute`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dispute_text`
--
ALTER TABLE `dispute_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_item`
--
ALTER TABLE `favorite_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `following_tenant`
--
ALTER TABLE `following_tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hot_item`
--
ALTER TABLE `hot_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_tag`
--
ALTER TABLE `item_tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_inbox`
--
ALTER TABLE `message_inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posted_item`
--
ALTER TABLE `posted_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `redeem_reward`
--
ALTER TABLE `redeem_reward`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `dispute_ibfk_3` FOREIGN KEY (`order_det_id`) REFERENCES `order_details` (`id`);

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
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`submitted_by`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`order_det_id`) REFERENCES `order_details` (`id`);

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
  ADD CONSTRAINT `order_details_ibfk_5` FOREIGN KEY (`posted_item_variance_id`) REFERENCES `posted_item_variance` (`id`);

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
