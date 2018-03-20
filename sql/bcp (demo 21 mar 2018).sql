-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 07:50 PM
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
(2, 'ADM00001', 'Admin Default', '', '0000-00-00', '', 'admin1@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-03-21 01:01:43', 'active', '2017-12-14 06:35:41', ''),
(3, 'TNT00000', 'Tenant Admin', '', '0000-00-00', '', 'tenant.admin@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '0000-00-00 00:00:00', '', '2018-03-20 16:19:35', ''),
(13, 'TNT00004', 'Mr. Lee Byung-chul', 'Jl. Pahlawan 121', '1910-02-12', '08123212321', 'lee@samsung.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123123', '', '2018-03-21 01:12:29', 'ACTIVE', '2018-03-20 16:55:40', ''),
(14, 'TNT00005', 'Mr. Lei Jun', 'Jl. Pahlawan 123', '1969-12-16', '08123123123', 'lei@xiaomi.com', 'e10adc3949ba59abbe56e057f20f883e', '12321232123213', '', '2018-03-21 00:43:46', 'ACTIVE', '2018-03-20 16:58:19', ''),
(15, 'CUS00000004', 'Bayu', 'Jl. Bayu Wangi 10', '1999-03-06', '08123123123', 'customer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-03-21 01:17:17', 'ACTIVE', '2018-03-20 17:46:47', 'img/upload/CUS00000004/profpic.jpg'),
(16, 'DLV00005', 'Anto', 'Gg. Ijan 60', '1969-12-16', '08123123123', 'deliverer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123', '', '2018-03-21 01:11:57', 'ACTIVE', '2018-03-20 18:11:23', '');

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
(21, 'BIL000000021', '2018-03-21 00:54:12', '2018-03-22 00:54:12', 6180000, 4, 4, 18, 'JNE', 0, 5);

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
(4, 'CUS00000004', 15, '', 0, 618, 0, NULL);

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
(5, 'DLV00005', 16, 'B 1234 ABC', 'Motor Mio Hitam');

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
  `order_detail_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback_id`, `rating`, `feedback_text`, `feedback_reply`, `submitted_by`, `order_detail_id`) VALUES
(4, 'FED0000000004', 5, 'Bagus, packaging rapi, mantap', '', 4, 21);

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
(5, 'FOL00000005', 4, 4, '2018-03-20 18:43:51', '0000-00-00 00:00:00');

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
(13, 'MSG0000000013', '2018-03-20 18:11:48', 2, 15);

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
(21, '2018-03-20 18:11:48', 'Nama Pengirim: Anto, Kode OTP: T8BSGY', 2, 13);

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
(21, 'ORD000000021', 1, 2280000, 2280000, 'DONE', '86WMRJ', '', '', 'T8BSGY', '', '0000-00-00 00:00:00', 21, 65, 5, NULL, NULL),
(22, 'ORD000000022', 2, 1950000, 1950000, 'DONE', '86WMRJ', '', '', 'T8BSGY', '', '0000-00-00 00:00:00', 21, 62, 5, NULL, NULL);

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
(41, 'OST0000000041', 22, 'DONE', '2018-03-20 18:37:25');

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
(11, 'PAY000000011', 'DOKU', '2018-03-20 18:01:23', '', 6180000, 21);

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
(5, 'PTH0000000005', 618, '', '2018-03-20 18:01:23', 21, 4);

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
(54, 'ITM000000054', 'Samsung Galaxy J5 2017', 1950000, '2018-03-20 17:39:29', '2018-03-20 17:39:29', NULL, 0, 'ORDER', 190, 'Handphone Mid Tier', 'img/upload/TNT00004/ITM000000054/default.jpg', 5, 4, 5),
(55, 'ITM000000055', 'Samsung Galaxy J7', 2280000, '2018-03-20 17:43:18', '2018-03-20 17:43:18', NULL, 0, 'ORDER', 195, 'Handphone Mid Tier', 'img/upload/TNT00004/ITM000000055/default.jpg', 5, 4, 5),
(56, 'ITM000000056', 'Xiaomi Redmi Note 4', 1850000, '2018-03-20 17:45:00', '2018-03-20 17:45:00', NULL, 0, 'ORDER', 183, 'Handphone Xiaomi Mid Tier', 'img/upload/TNT00005/ITM000000056/default.jpg', 5, 5, 6);

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
(62, 'VAR0000000062', 'Warna', 'Putih', 18, 'img/upload/TNT00004/ITM000000054/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 54),
(63, 'VAR0000000063', 'Warna', 'Hitam', 20, 'img/upload/TNT00004/ITM000000054/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 54),
(64, 'VAR0000000064', 'Warna', 'Hitam', 10, 'img/upload/TNT00004/ITM000000055/0-1.jpg', 'img/upload/TNT00004/ITM000000055/0-2.jpg', 'img/default_item.png', 55),
(65, 'VAR0000000065', 'Warna', 'Putih', 9, 'img/upload/TNT00004/ITM000000055/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 55),
(66, 'VAR0000000066', 'Warna', 'Hitam', 10, 'img/upload/TNT00005/ITM000000056/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(67, 'VAR0000000067', 'Warna', 'Putih', 10, 'img/upload/TNT00005/ITM000000056/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 56);

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
  `date_expired` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_reward`
--

INSERT INTO `setting_reward` (`id`, `setting_reward_id`, `base_percent`, `ratio_percent`, `price_per_point`, `point_get`, `event_name`, `date_created`, `date_expired`) VALUES
(5, 'SRW000005', 50, 50, 10000, 1, 'Default', '2018-03-20 17:00:00', NULL);

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
(4, 'ADD00000004', 'Bekasi', 'Bekasi Timur', 'Pahlawan', '12345', 'Jl. Bayu Wangi 12', 0, 0, 4);

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
(18, 'FEE0000000018', 0, '', 0);

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
  `selling_category` varchar(500) NOT NULL DEFAULT '',
  `is_open` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tenant_id`, `tenant_name`, `account_id`, `unit_number`, `floor`, `selling_category`, `is_open`) VALUES
(0, 'TNT00000', 'Tenant Admin', 3, '0', '0', 'All', 1),
(4, 'TNT00004', 'Samsung Official', 13, 'A-11', 'LG', 'Handphone dan Tablet', 1),
(5, 'TNT00005', 'Xiaomi Official', 14, 'A-12', 'LG', 'Handphone dan Tablet', 1);

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
  `date_expired` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `voucher_stock` int(10) NOT NULL DEFAULT '0',
  `voucher_code` varchar(500) NOT NULL DEFAULT '',
  `min_order_price` int(11) NOT NULL DEFAULT '0',
  `use_per_day` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `following_tenant`
--
ALTER TABLE `following_tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hot_item`
--
ALTER TABLE `hot_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item_tag`
--
ALTER TABLE `item_tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message_inbox`
--
ALTER TABLE `message_inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_status_history`
--
ALTER TABLE `order_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posted_item`
--
ALTER TABLE `posted_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voucher_brand`
--
ALTER TABLE `voucher_brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
