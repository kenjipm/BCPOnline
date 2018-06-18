-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 03:04 PM
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
(0, 'ADM0000', 'Super Admin', 'Jalan', '1978-04-04', '0816263612', 'admin0@cyberia.com', '6572bdaff799084b973320f43f09b363', '', '', '0000-00-00 00:00:00', '', '2018-04-03 15:27:06', ''),
(2, 'ADM00001', 'Admin Default', '', '0000-00-00', '', 'admin1@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-06-13 13:03:56', 'active', '2017-12-14 06:35:41', ''),
(3, 'TNT00000', 'Tenant Admin', '', '0000-00-00', '', 'tenant.admin@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-03-21 11:49:08', '', '2018-03-20 16:19:35', ''),
(13, 'TNT00004', 'Mr. Lee Byung-chule', 'Jl. Pahlawan 123', '1910-02-13', '08123212323', 'lee@samsung.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123125', '', '2018-06-13 13:03:41', 'ACTIVE', '2018-03-20 16:55:40', ''),
(14, 'TNT00005', 'Mr. Lei Jun', 'Jl. Pahlawan 123', '1969-12-16', '08123123123', 'lei@xiaomi.com', 'e10adc3949ba59abbe56e057f20f883e', '12321232123213', '', '2018-05-03 20:23:01', 'ACTIVE', '2018-03-20 16:58:19', ''),
(15, 'CUS00000004', 'Bayu', 'Jl. Bayu Wangi 10', '1999-03-06', '08123123123', 'customer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '2018-06-18 16:15:54', 'ACTIVE', '2018-03-20 17:46:47', 'img/upload/CUS00000004/profpic.jpg'),
(16, 'DLV00005', 'Anto', 'Gg. Ijan 60', '1969-12-16', '08123123123', 'deliverer1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123123123123', '', '2018-04-30 23:21:01', 'ACTIVE', '2018-03-20 18:11:23', ''),
(17, 'DLV00006', 'Dudung', 'Jalan Soekarno Hatta no 800', '1992-04-04', '089993213123', 'deliverer2@cyberia.com', 'e10adc3949ba59abbe56e057f20f883e', '3212361527351273', '', '2018-05-09 11:09:12', 'ACTIVE', '2018-04-27 14:51:33', ''),
(18, 'CUS00000005', 'Didin', 'Jalan Hasanuddin no 55', '1990-03-23', '081232323232', 'customer5@gmail.com', '6572bdaff799084b973320f43f09b363', '323627361273', '', '2018-05-09 11:08:40', 'ACTIVE', '2018-04-30 11:09:45', '');

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
(2, '2018-04-03 11:43:06', 1800000, 4, 57);

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
(21, 'BIL000000021', '2018-03-21 00:54:12', '2018-03-28 00:54:12', 6180000, 4, 4, 18, 'JNE', 0, 5),
(22, 'BIL000000022', '2018-03-28 10:42:17', '2018-03-30 10:42:17', 1005000, 4, NULL, NULL, '', 0, 5),
(23, 'BIL000000023', '2018-04-03 19:10:54', '2018-04-03 19:10:54', 1800000, 4, NULL, NULL, '', 0, 5),
(24, 'BIL000000024', '2018-04-03 19:14:50', '2018-04-03 19:14:50', 1300000, 4, NULL, NULL, '', 0, 5),
(25, 'BIL000000025', '2018-04-03 19:15:13', '2018-04-02 19:15:13', 1800000, 4, NULL, NULL, '', 0, 5),
(26, 'BIL000000026', '2018-04-03 19:15:46', '2018-04-04 19:15:46', 1300000, 4, 4, 19, 'TIKI', 0, 5),
(27, 'BIL000000027', '2018-04-23 23:49:45', '2018-04-24 23:49:45', 1950000, 4, 4, 20, 'JNE', 0, 5),
(28, 'BIL000000028', '2018-04-30 21:25:01', '2018-05-01 21:25:01', 1800000, 4, 4, 22, 'TIKI', 0, 5),
(29, 'BIL000000029', '2018-04-30 21:28:30', '2018-05-01 21:28:30', 0, 4, 4, 21, 'TIKI', 0, 5),
(30, 'BIL000000030', '2018-04-30 21:49:36', '2018-05-01 21:49:36', 0, 4, 4, 23, 'JNE', 0, 5),
(31, 'BIL000000031', '2018-05-02 10:36:48', '2018-05-03 10:36:48', 2280000, 4, 4, 24, 'GOJEK', 0, 5),
(32, 'BIL000000032', '2018-05-09 10:53:00', '2018-05-10 10:53:00', 1800000, 4, 4, 25, 'JNE', 0, 5),
(33, 'BIL000000033', '2018-05-11 16:39:20', '2018-05-12 16:39:20', 6500000, 4, 4, 26, 'JNE', 0, 5),
(34, 'BIL000000034', '2018-06-12 16:49:30', '2018-06-13 16:49:30', 6100000, 4, 4, 27, 'JNE', 0, 5),
(35, 'BIL000000035', '2018-06-12 17:16:12', '2018-06-13 17:16:12', 3800000, 4, 4, 28, 'JNE', 0, 5);

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
  `upline_id` int(15) DEFAULT NULL,
  `notif_inbox` int(11) NOT NULL DEFAULT '0',
  `notif_dispute` int(11) NOT NULL DEFAULT '0',
  `notif_transaction` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `account_id`, `verified_mark`, `credit_amount`, `reward_points`, `deposit_status`, `upline_id`, `notif_inbox`, `notif_dispute`, `notif_transaction`) VALUES
(4, 'CUS00000004', 15, '', 0, 1791, 1, NULL, 0, 0, 0),
(5, 'CUS00000005', 18, '', 0, 0, 0, NULL, 0, 0, 0);

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
(6, 'DLV00006', 17, 'B 2333 BB', 'Pick Up untuk barang besar');

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

--
-- Dumping data for table `favorite_item`
--

INSERT INTO `favorite_item` (`id`, `customer_id`, `posted_item_id`) VALUES
(2, 4, 54),
(4, 4, 66);

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
(7, 'FED0000000007', 5, 'Bagus bagus', '', 4, 28);

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
(6, 'FOL00000006', 4, 4, '2018-05-01 17:35:44', '0000-00-00 00:00:00');

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
(2, 'HOT00000002', 1800000, 'Promo Puasa', '0000-00-00', 54, 1),
(3, 'HOT00000003', 6100000, 'Promo Puasa', '2018-06-30', 66, 1);

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
(17, 'MSG0000000017', '2018-04-30 15:58:53', 13, 15);

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
(22, '2018-03-24 07:31:05', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: Y2GG7R', 2, 12),
(23, '2018-03-24 07:31:05', 'Nama Pengirim: Anto, Kode OTP: B7KPYN', 2, 13),
(24, '2018-03-28 03:42:17', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.005.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/22\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(25, '2018-04-03 12:10:55', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/23\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(26, '2018-04-03 12:14:50', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.300.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/24\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(27, '2018-04-03 12:15:13', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/25\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(28, '2018-04-03 12:15:46', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.300.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/26\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(29, '2018-04-04 04:03:12', 'Nama Pengirim: Tenant Admin, Kode OTP: L02M5B', 2, 12),
(30, '2018-04-04 04:03:12', 'Nama Pengirim: Anto, Kode OTP: C8R3T7', 2, 13),
(31, '2018-04-28 12:37:04', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: 4EI1Y1', 2, 14),
(32, '2018-04-28 12:37:04', 'Nama Pengirim: Dudung, Kode OTP: XMYBDJ', 2, 13),
(33, '2018-04-30 14:25:01', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/28\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13),
(34, '2018-04-30 14:36:41', 'Nama Pengirim: Tenant Admin, Kode OTP: YVJGMS', 2, 14),
(35, '2018-04-30 14:36:41', 'Nama Pengirim: Dudung, Kode OTP: XTJWKN', 2, 13),
(36, '2018-04-30 14:37:27', 'Okeey', 15, 13),
(37, '2018-04-30 14:50:26', 'Nama Pengirim: Anto, Kode OTP: 4MTRAI', 2, 15),
(38, '2018-04-30 14:50:26', 'Nama Pengirim: Bayu, Kode OTP: M50SO5', 2, 12),
(39, '2018-04-30 15:32:51', 'Wah meledaknya berkeping2. beli baru wae?', 13, 16),
(40, '2018-04-30 15:33:09', 'Iya lah ya uda ga bisa ini mah', 13, 16),
(41, '2018-04-30 16:01:45', 'Buang beli baru kaka', 13, 17),
(42, '2018-04-30 16:06:30', 'Nama Pengirim: Anto, Kode OTP: 003PSO', 13, 17),
(43, '2018-05-02 03:57:35', 'Nama Pengirim: Mr. Lee Byung-chul, Kode OTP: 8RS9NF', 2, 14),
(44, '2018-05-02 03:57:36', 'Nama Pengirim: Dudung, Kode OTP: GAQFSS', 2, 13),
(45, '2018-05-09 03:53:00', 'Selamat! Anda memenangkan lelang untuk barang Djisamsung Not Balok dengan harga Rp 1.800.000,-. Harap segera konfirmasi alamat dan pengiriman melalui link berikut: <a href=\'/BCPOnline/customer/billing_unconfirmed/32\'>KONFIRMASI ALAMAT DAN PENGIRIMAN</a>', 2, 13);

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
(1, 'NGO0000000001', '2018-04-30 15:52:32', 10000, 'NOT_TAKEN', 30, 4, 4);

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
(21, 'ORD000000021', 1, 2280000, 2280000, 'DONE', 'Y2GG7R', '', '', 'B7KPYN', '', '0000-00-00 00:00:00', 21, 65, 5, 3, NULL),
(22, 'ORD000000022', 2, 1950000, 1950000, 'DONE', '86WMRJ', '', '', 'T8BSGY', '', '0000-00-00 00:00:00', 21, 62, 5, 3, NULL),
(23, 'ORD000000023', 1, 1005000, 1005000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 22, 68, NULL, NULL, NULL),
(24, 'ORD000000024', 1, 1800000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 23, 68, NULL, NULL, NULL),
(25, 'ORD000000025', 1, 1300000, 1300000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 24, 68, NULL, NULL, NULL),
(26, 'ORD000000026', 1, 1800000, 1800000, 'WAITING_FOR_PAYMENT', '', '', '', '', '', '0000-00-00 00:00:00', 25, 68, NULL, NULL, NULL),
(27, 'ORD000000027', 1, 1300000, 1300000, 'DONE', 'L02M5B', '', '', 'C8R3T7', '', '0000-00-00 00:00:00', 26, 68, 5, NULL, NULL),
(28, 'ORD000000028', 1, 1950000, 1950000, 'DONE', '4EI1Y1', '', '', 'XMYBDJ', '', '0000-00-00 00:00:00', 27, 62, 6, 3, NULL),
(29, 'ORD000000029', 1, 1800000, 1800000, 'DONE', 'YVJGMS', '', '', 'XTJWKN', '', '0000-00-00 00:00:00', 28, 68, 6, NULL, NULL),
(30, 'ORD000000030', 0, 25000, 35000, 'DONE', 'AVXX7J', 'M50SO5', '', '003PSO', '4MTRAI', '0000-00-00 00:00:00', 30, 76, 5, 4, NULL),
(31, 'ORD000000031', 1, 2280000, 2280000, 'DONE', '8RS9NF', '', '', 'GAQFSS', '', '0000-00-00 00:00:00', 31, 64, 6, NULL, NULL),
(32, 'ORD000000032', 1, 1800000, 1800000, 'QUEUED', '', '', '', '', '', '0000-00-00 00:00:00', 32, 68, NULL, NULL, NULL),
(33, 'ORD000000033', 1, 6500000, 6500000, 'QUEUED', '', '', '', '', '', '0000-00-00 00:00:00', 33, 75, NULL, NULL, NULL),
(34, 'ORD000000034', 1, 6500000, 6100000, 'QUEUED', '', '', '', '', '', '0000-00-00 00:00:00', 34, 75, NULL, NULL, NULL),
(35, 'ORD000000035', 1, 1950000, 1950000, 'QUEUED', '', '', '', '', '', '0000-00-00 00:00:00', 35, 62, NULL, NULL, NULL),
(36, 'ORD000000036', 1, 1850000, 1850000, 'QUEUED', '', '', '', '', '', '0000-00-00 00:00:00', 35, 66, NULL, NULL, NULL);

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
(42, 'OST0000000042', 21, 'PICKING_FROM_TENANT', '2018-03-24 07:31:04'),
(43, 'OST0000000043', 21, 'RECEIVED', '2018-03-26 07:48:31'),
(44, 'OST0000000044', 21, 'RECEIVED', '2018-03-26 07:49:22'),
(45, 'OST0000000045', 23, 'WAITING_FOR_PAYMENT', '2018-03-28 03:42:17'),
(46, 'OST0000000046', 24, 'WAITING_FOR_PAYMENT', '2018-04-03 12:10:55'),
(47, 'OST0000000047', 25, 'WAITING_FOR_PAYMENT', '2018-04-03 12:14:50'),
(48, 'OST0000000048', 26, 'WAITING_FOR_PAYMENT', '2018-04-03 12:15:13'),
(49, 'OST0000000049', 27, 'WAITING_FOR_PAYMENT', '2018-04-03 12:15:46'),
(52, 'OST0000000052', 27, 'QUEUED', '2018-04-04 04:02:55'),
(53, 'OST0000000053', 27, 'DELIVERING_TO_CUSTOMER', '2018-04-04 04:03:12'),
(54, 'OST0000000054', 27, 'RECEIVED', '2018-04-04 04:04:04'),
(55, 'OST0000000055', 27, 'DONE', '2018-04-04 04:04:37'),
(56, 'OST0000000056', 28, 'WAITING_FOR_PAYMENT', '2018-04-23 16:50:28'),
(57, 'OST0000000057', 28, 'QUEUED', '2018-04-23 16:54:52'),
(58, 'OST0000000058', 28, 'PICKING_FROM_TENANT', '2018-04-28 12:37:04'),
(59, 'OST0000000059', 28, 'DELIVERING_TO_CUSTOMER', '2018-04-30 10:52:23'),
(60, 'OST0000000060', 28, 'RECEIVED', '2018-04-30 10:53:12'),
(61, 'OST0000000061', 28, 'DONE', '2018-04-30 10:53:59'),
(62, 'OST0000000062', 29, 'WAITING_FOR_PAYMENT', '2018-04-30 14:25:01'),
(63, 'OST0000000063', 29, 'QUEUED', '2018-04-30 14:31:52'),
(64, 'OST0000000064', 29, 'DELIVERING_TO_CUSTOMER', '2018-04-30 14:36:41'),
(65, 'OST0000000065', 29, 'RECEIVED', '2018-04-30 14:37:54'),
(66, 'OST0000000066', 29, 'RECEIVED', '2018-04-30 14:45:55'),
(67, 'OST0000000067', 29, 'RECEIVED', '2018-04-30 14:46:29'),
(68, 'OST0000000068', 29, 'DONE', '2018-04-30 14:47:11'),
(69, 'OST0000000069', 30, 'WAITING_FOR_PAYMENT', '2018-04-30 14:49:40'),
(70, 'OST0000000070', 30, 'QUEUED', '2018-04-30 14:49:43'),
(71, 'OST0000000071', 30, 'PICKING_FROM_CUSTOMER', '2018-04-30 14:50:26'),
(72, 'OST0000000072', 30, 'DELIVERING_TO_TENANT', '2018-04-30 14:56:20'),
(73, 'OST0000000073', 30, 'TENANT_RECEIVED', '2018-04-30 14:57:25'),
(74, 'OST0000000074', 30, 'TENANT_RECEIVED', '2018-04-30 15:00:25'),
(75, 'OST0000000075', 30, 'QUEUED', '2018-04-30 16:02:36'),
(76, 'OST0000000076', 30, 'PICKING_FROM_TENANT', '2018-04-30 16:06:29'),
(77, 'OST0000000077', 30, 'DELIVERING_TO_CUSTOMER', '2018-04-30 16:07:27'),
(78, 'OST0000000078', 30, 'RECEIVED', '2018-04-30 16:21:10'),
(79, 'OST0000000079', 30, 'DONE', '2018-04-30 16:21:44'),
(80, 'OST0000000080', 31, 'WAITING_FOR_PAYMENT', '2018-05-02 03:37:14'),
(81, 'OST0000000081', 31, 'QUEUED', '2018-05-02 03:37:27'),
(82, 'OST0000000082', 31, 'PICKING_FROM_TENANT', '2018-05-02 03:57:35'),
(83, 'OST0000000083', 32, 'WAITING_FOR_PAYMENT', '2018-05-09 03:53:00'),
(84, 'OST0000000084', 32, 'QUEUED', '2018-05-09 04:06:10'),
(85, 'OST0000000085', 31, 'DELIVERING_TO_CUSTOMER', '2018-05-09 04:07:55'),
(86, 'OST0000000086', 31, 'RECEIVED', '2018-05-09 04:09:15'),
(87, 'OST0000000087', 31, 'DONE', '2018-05-09 04:09:55'),
(88, 'OST0000000088', 33, 'WAITING_FOR_PAYMENT', '2018-05-11 09:57:35'),
(89, 'OST0000000089', 33, 'QUEUED', '2018-05-11 10:03:25'),
(90, 'OST0000000090', 34, 'WAITING_FOR_PAYMENT', '2018-06-12 09:49:43'),
(91, 'OST0000000091', 34, 'QUEUED', '2018-06-12 09:51:31'),
(92, 'OST0000000092', 35, 'WAITING_FOR_PAYMENT', '2018-06-12 10:16:16'),
(93, 'OST0000000093', 36, 'WAITING_FOR_PAYMENT', '2018-06-12 10:16:16'),
(94, 'OST0000000094', 35, 'QUEUED', '2018-06-12 10:16:34'),
(95, 'OST0000000095', 36, 'QUEUED', '2018-06-12 10:16:34');

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
(21, 'PAY000000021', 'DOKU', '2018-06-12 10:16:34', '', 3800000, 35);

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
(16, 'PTH0000000016', 380, '', '2018-06-12 10:16:35', 35, 4);

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
(57, 'ITM000000057', 'Djisamsung Not Balok', 1800000, '2018-03-28 03:40:49', '2018-04-03 11:43:06', '2018-04-03 17:00:00', 50000, 'BID', 150, 'Djisamsung bukan not angka', 'img/upload/ADM00001/ITM000000057/default.jpg', 0, 5, 0, 5),
(66, 'ITM000000066', 'Samsung S9', 6500000, '2018-04-09 05:41:47', '2018-04-09 05:41:47', NULL, 0, 'ORDER', 150, 'Samsung S9 Murah Cepat Baru', 'img/upload/TNT00004/ITM000000066/default.jpg', 0, 5, 4, 5),
(67, 'ITM000000067', '', 25000, '2018-04-27 11:05:59', '2018-04-27 11:05:59', NULL, 0, 'REPAIR', 0, 'Servis Handphone Samsung. Konslet, Tidak Berfungsi, Meledak, dan lain-lain', '', 0, 5, 4, 5);

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
(62, 'VAR0000000062', 'Warna', 'Putih', 17, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 54),
(63, 'VAR0000000063', 'Warna', 'Hitam', 20, 'img/upload/TNT00004/ITM000000054/1-1.jpg', 'img/upload/TNT00004/ITM000000054/1-2.jpg', 'img/upload/TNT00004/ITM000000054/1-3.jpg', 54),
(64, 'VAR0000000064', 'Warna', 'Hitam', 9, 'img/upload/TNT00004/ITM000000055/0-1.jpg', 'img/upload/TNT00004/ITM000000055/0-2.jpg', 'img/default_item.png', 55),
(65, 'VAR0000000065', 'Warna', 'Putih', 9, 'img/upload/TNT00004/ITM000000055/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 55),
(66, 'VAR0000000066', 'Warna', 'Hitam', 9, 'img/upload/TNT00005/ITM000000056/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(67, 'VAR0000000067', 'Warna', 'Putih', 10, 'img/upload/TNT00005/ITM000000056/1-1.jpg', 'img/default_item.png', 'img/default_item.png', 56),
(68, 'VAR0000000068', 'Warna', 'Hitam', -7, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 57),
(75, 'VAR0000000075', 'Warna', 'Hitam', 2, 'img/upload/TNT00004/ITM000000066/0-1.jpg', 'img/default_item.png', 'img/default_item.png', 66),
(76, 'VAR0000000076', '', '', 0, 'img/default_item.png', 'img/default_item.png', 'img/default_item.png', 67);

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

INSERT INTO `shipping_address` (`id`, `address_id`, `city`, `kecamatan`, `kelurahan`, `postal_code`, `address_detail`, `latitude`, `longitude`, `customer_id`, `is_primary`) VALUES
(4, 'ADD00000004', 'Bekasi', 'Bekasi Timur', 'Pahlawan', '12345', 'Jl. Bayu Wangi 12', 0, 0, 4, 1);

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
(28, 'FEE0000000028', 0, '', 0);

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
  `selling_category` varchar(500) NOT NULL DEFAULT '',
  `is_open` tinyint(1) NOT NULL DEFAULT '0',
  `notif_inbox` int(11) NOT NULL DEFAULT '0',
  `notif_dispute` int(11) NOT NULL DEFAULT '0',
  `notif_transaction` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tenant_id`, `tenant_name`, `account_id`, `unit_number`, `floor`, `bank_account`, `selling_category`, `is_open`, `notif_inbox`, `notif_dispute`, `notif_transaction`) VALUES
(0, 'TNT00000', 'Tenant Admin', 3, '0', '0', '', 'All', 1, 0, 0, 0),
(4, 'TNT00004', 'Samsung Official', 13, 'A-11', 'LG', '', 'Handphone dan Tablet', 1, 0, 0, 0),
(5, 'TNT00005', 'Xiaomi Official', 14, 'A-12', 'LG', '', 'Handphone dan Tablet', 1, 0, 0, 0);

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
(8, 'TBL00000008', 4, 54, 2, 1, 200000, '2018-05-31 00:00:00', '2018-05-15 10:17:27'),
(9, 'TBL00000009', 4, 66, 3, 1, 50000, '2018-06-30 00:00:00', '2018-05-26 19:15:58');

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
(3, 'TPR00000003', NULL, NULL, '', 1, 8130000),
(4, 'TPR00000004', NULL, NULL, '', 1, 0);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `following_tenant`
--
ALTER TABLE `following_tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_status_history`
--
ALTER TABLE `order_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `point_history`
--
ALTER TABLE `point_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posted_item`
--
ALTER TABLE `posted_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `posted_item_variance`
--
ALTER TABLE `posted_item_variance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenant_bill`
--
ALTER TABLE `tenant_bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tenant_pay_receipt`
--
ALTER TABLE `tenant_pay_receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_brand`
--
ALTER TABLE `voucher_brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
