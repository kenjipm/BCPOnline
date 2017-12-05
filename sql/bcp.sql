-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 10:31 AM
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
  `address` varchar(500) NOT NULL DEFAULT '',
  `date_of_birth` date NOT NULL DEFAULT '0000-00-00',
  `phone_number` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `identification_no` varchar(50) NOT NULL DEFAULT '',
  `identification_pic` varchar(50) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `additional_fee`
--

CREATE TABLE `additional_fee` (
  `id` int(10) NOT NULL,
  `fee_id` varchar(15) NOT NULL DEFAULT '',
  `fee_amount` float NOT NULL DEFAULT '0',
  `fee_description` varchar(1000) NOT NULL DEFAULT '',
  `shipping_distance` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `add_fee_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(500) NOT NULL DEFAULT '',
  `category_description` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `reward_points` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `dispute`
--

CREATE TABLE `dispute` (
  `id` int(10) NOT NULL,
  `dispute_id` varchar(15) NOT NULL DEFAULT '',
  `reason` varchar(1000) NOT NULL DEFAULT '',
  `date_created` date NOT NULL,
  `dispute_for` int(15) NOT NULL,
  `submitted_by` int(15) NOT NULL,
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
  `sender` int(15) NOT NULL,
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
  `rating` varchar(100) NOT NULL DEFAULT '',
  `feedback_text` varchar(5000) NOT NULL DEFAULT '',
  `feedback_reply` varchar(5000) NOT NULL DEFAULT '',
  `submitted_by` int(15) NOT NULL,
  `feedback_for` int(15) NOT NULL,
  `order_det_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `message_inbox`
--

CREATE TABLE `message_inbox` (
  `id` int(10) NOT NULL,
  `inbox_id` varchar(15) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `party_one` int(15) NOT NULL,
  `party_two` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_text`
--

CREATE TABLE `message_text` (
  `id` int(10) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(5000) NOT NULL DEFAULT '',
  `sender` int(15) NOT NULL,
  `message_inbox_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `posted_item_id` int(15) NOT NULL,
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
  `collection_code` varchar(500) NOT NULL DEFAULT '',
  `collection_method` varchar(1000) NOT NULL DEFAULT '',
  `cust_rec_code` varchar(500) NOT NULL DEFAULT '',
  `tent_repr_rec_code` varchar(500) NOT NULL DEFAULT '',
  `date_repr_decided` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `billing_id` int(15) NOT NULL,
  `posted_item_id` int(15) NOT NULL,
  `deliverer_id` int(15) NOT NULL,
  `tnt_paid_receipt_id` int(15) NOT NULL,
  `voucher_cut_price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `item_type` varchar(500) NOT NULL DEFAULT '',
  `quantity_avalaible` int(10) NOT NULL DEFAULT '0',
  `unit_weight` int(10) NOT NULL DEFAULT '0',
  `posted_item_description` varchar(1000) NOT NULL DEFAULT '',
  `image_one_name` varchar(500) NOT NULL DEFAULT '',
  `image_two_name` varchar(500) NOT NULL DEFAULT '',
  `image_three_name` varchar(500) NOT NULL DEFAULT '',
  `image_four_name` varchar(500) NOT NULL DEFAULT '',
  `category_id` int(15) NOT NULL,
  `tenant_id` int(15) NOT NULL,
  `brand_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `latitude` varchar(500) NOT NULL DEFAULT '',
  `customer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `account_id` int(15) NOT NULL,
  `unit_number` varchar(20) NOT NULL DEFAULT '',
  `floor` varchar(10) NOT NULL DEFAULT '',
  `selling_category` varchar(500) NOT NULL DEFAULT '',
  `is_open` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `payment_period_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `brand_id` int(15) NOT NULL,
  `voucher_code` varchar(500) NOT NULL DEFAULT ''
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
-- Indexes for table `additional_fee`
--
ALTER TABLE `additional_fee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_id` (`fee_id`);

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
  ADD KEY `add_fee` (`add_fee_id`),
  ADD KEY `address` (`shipping_address_id`);

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
  ADD KEY `account_id` (`account_id`);

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
  ADD KEY `disputeFor` (`dispute_for`),
  ADD KEY `submittedBy` (`submitted_by`),
  ADD KEY `order_det_id` (`order_det_id`);

--
-- Indexes for table `dispute_text`
--
ALTER TABLE `dispute_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
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
  ADD KEY `feedback_for` (`feedback_for`),
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
  ADD KEY `party_one` (`party_one`),
  ADD KEY `party_two` (`party_two`);

--
-- Indexes for table `message_text`
--
ALTER TABLE `message_text`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `inbox` (`message_inbox_id`);

--
-- Indexes for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `negotiation_id` (`negotiation_id`),
  ADD KEY `posted_item` (`posted_item_id`),
  ADD KEY `tenant` (`tenant_id`),
  ADD KEY `customer` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `bill` (`billing_id`),
  ADD KEY `posted_item` (`posted_item_id`),
  ADD KEY `deliverer` (`deliverer_id`),
  ADD KEY `tnt_paid_receipt` (`tnt_paid_receipt_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`),
  ADD KEY `bill` (`billing_id`);

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
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_id` (`address_id`),
  ADD KEY `customer` (`customer_id`);

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
  ADD UNIQUE KEY `voucher_id` (`voucher_id`),
  ADD KEY `voucher_brand` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `additional_fee`
--
ALTER TABLE `additional_fee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_inbox`
--
ALTER TABLE `message_inbox`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_text`
--
ALTER TABLE `message_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posted_item`
--
ALTER TABLE `posted_item`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`add_fee_id`) REFERENCES `additional_fee` (`id`),
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD CONSTRAINT `deliverer_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `dispute`
--
ALTER TABLE `dispute`
  ADD CONSTRAINT `dispute_ibfk_1` FOREIGN KEY (`dispute_for`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `dispute_ibfk_2` FOREIGN KEY (`submitted_by`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `dispute_ibfk_3` FOREIGN KEY (`order_det_id`) REFERENCES `order_details` (`id`);

--
-- Constraints for table `dispute_text`
--
ALTER TABLE `dispute_text`
  ADD CONSTRAINT `dispute_text_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `account` (`id`),
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
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`feedback_for`) REFERENCES `account` (`id`),
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
  ADD CONSTRAINT `message_inbox_ibfk_1` FOREIGN KEY (`party_one`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `message_inbox_ibfk_2` FOREIGN KEY (`party_two`) REFERENCES `account` (`id`);

--
-- Constraints for table `message_text`
--
ALTER TABLE `message_text`
  ADD CONSTRAINT `message_text_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `message_text_ibfk_2` FOREIGN KEY (`message_inbox_id`) REFERENCES `message_inbox` (`id`);

--
-- Constraints for table `negotiated_price`
--
ALTER TABLE `negotiated_price`
  ADD CONSTRAINT `negotiated_price_ibfk_1` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`),
  ADD CONSTRAINT `negotiated_price_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `negotiated_price_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`posted_item_id`) REFERENCES `posted_item` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`deliverer_id`) REFERENCES `deliverer` (`id`),
  ADD CONSTRAINT `order_details_ibfk_4` FOREIGN KEY (`tnt_paid_receipt_id`) REFERENCES `tenant_pay_receipt` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`billing_id`) REFERENCES `billing` (`id`);

--
-- Constraints for table `posted_item`
--
ALTER TABLE `posted_item`
  ADD CONSTRAINT `posted_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `posted_item_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `posted_item_ibfk_3` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`);

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
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
