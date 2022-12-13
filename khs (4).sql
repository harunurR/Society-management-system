-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 07:50 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '1 admin, 2 user',
  `forget_key` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 deleted,1 active, 2 inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`id`, `name`, `contact`, `email`, `image`, `password`, `role`, `forget_key`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `last_login`, `login_ip`) VALUES
(1, 'irfan', '01837604100', 'admin@email.com', NULL, 'a083e3e5c9f5489e1e06394fb6573e157c97804a', 1, '2cb1059900cbb33e53900968972b27cf', 1, '2021-10-25 07:16:07', '2021-10-25 07:16:07', 1, 1, '2021-11-13 04:51:27', '103.140.205.141');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_debit_voucher`
--

CREATE TABLE `tbl_debit_voucher` (
  `debit_voucher_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `voucher_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `current_date` date NOT NULL,
  `pay_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `debit_sum` int(11) NOT NULL,
  `credit_sum` int(11) NOT NULL,
  `cheque_no` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque_dt` date DEFAULT NULL,
  `bank` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rec_date` datetime NOT NULL,
  `approve` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_debit_voucher`
--

INSERT INTO `tbl_debit_voucher` (`debit_voucher_id`, `my_id`, `voucher_no`, `current_date`, `pay_name`, `pay_status`, `purpose`, `debit_sum`, `credit_sum`, `cheque_no`, `cheque_dt`, `bank`, `rec_date`, `approve`, `createdBy`) VALUES
(1, 1, '1001', '2021-11-02', 'Karim', 'pay_to', 'Salary', 5000, 5000, '152665', '0000-00-00', '', '0000-00-00 00:00:00', 0, 1),
(2, 1, '1002', '2021-11-03', 'RAhim', 'pay_to', 'Night Guard', 2000, 2000, '152665', '2021-11-03', 'gfhfg', '2021-11-03 02:01:34', 0, 1),
(3, 1, '1003', '2021-11-04', 'Jalal', 'pay_to', 'Salary', 5500, 5500, '45855', '2021-11-09', 'gfhfg', '2021-11-08 02:03:06', 0, 1),
(4, 1, '1004', '2021-11-05', 'khalil', 'pay_to', 'night guards salary', 2800, 2800, '', '2021-11-08', '', '2021-11-08 02:04:14', 0, 1),
(5, 1, '1005', '2021-11-06', 'Bank', 'pay_to', 'Electricity bill', 6000, 6000, '', '2021-11-08', '', '2021-11-08 02:05:48', 0, 1),
(6, 1, '1006', '2021-11-07', 'Office Rent', 'pay_to', 'Office Rent', 25000, 25000, '', '0000-00-00', '', '2021-11-08 02:10:26', 0, 1),
(7, 1, '1007', '2021-11-08', 'Paint', '', 'Asad', 2500, 2500, '', '0000-00-00', '', '2021-11-08 02:11:28', 0, 1),
(8, 1, '1008', '2021-11-09', 'For Paint', 'pay_to', 'For Paint', 3500, 3500, '', '0000-00-00', '', '2021-11-08 02:12:21', 0, 1),
(9, 1, '1010', '2021-11-11', 'Subscription Fee', 'pay_by', 'Subscription Fee', 10000, 10000, '', '0000-00-00', '', '2021-11-11 00:00:00', 0, 1),
(10, 1, '1011', '2021-11-16', 'Subscription Fee', 'pay_by', 'Subscription Fee', 8000, 8000, '', '0000-00-00', '', '2021-11-16 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_devoucher_bkdn`
--

CREATE TABLE `tbl_devoucher_bkdn` (
  `devoucher_bkdn_id` int(11) NOT NULL,
  `debit_voucher_id` int(11) NOT NULL,
  `particulars` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `table_id` int(11) NOT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_devoucher_bkdn`
--

INSERT INTO `tbl_devoucher_bkdn` (`devoucher_bkdn_id`, `debit_voucher_id`, `particulars`, `account_code`, `table_name`, `table_id`, `debit`, `credit`) VALUES
(1, 1, 'Paid to Karim', '52001001-Staff Salary', 'tbl_fcoa_bkdn_sub', 1, 5000, 0),
(2, 1, 'Paid to Karim', '11002-Bank', 'tbl_fcoa_bkdn', 2, 0, 5000),
(3, 2, 'Paid to Rahim', '52001002-Night Guard Salary', 'tbl_fcoa_bkdn_sub', 2, 2000, 0),
(4, 2, 'Paid to Rahim', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 0, 2000),
(5, 3, 'Paid to Jalal', '52001001-Staff Salary', 'tbl_fcoa_bkdn_sub', 1, 5500, 0),
(6, 3, 'Paid to Jalal', '11002-Bank', 'tbl_fcoa_bkdn', 2, 0, 5500),
(7, 4, 'Paid to Khalil', '52001002-Night Guard Salary', 'tbl_fcoa_bkdn_sub', 2, 2800, 0),
(8, 4, 'Paid to Khalil', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 0, 2800),
(9, 5, 'Paid electricity bill', '52002-Electricity Bill', 'tbl_fcoa_bkdn', 4, 6000, 0),
(10, 5, 'Paid electricity bill', '11002-Bank', 'tbl_fcoa_bkdn', 2, 0, 6000),
(11, 6, 'Office Rent for nov', '52004001-Office Rent', 'tbl_fcoa_bkdn_sub', 5, 25000, 0),
(12, 6, 'Office Rent for nov', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 0, 25000),
(13, 7, 'Paint expense', '52005-Paint', 'tbl_fcoa_bkdn', 7, 2500, 0),
(14, 7, 'Paint expense', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 0, 2500),
(15, 8, 'Paint expense', '52005-Paint', 'tbl_fcoa_bkdn', 7, 3500, 0),
(16, 8, 'Paint expense', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 0, 3500),
(17, 9, 'cash', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 10000, 0),
(18, 9, 'Subscription Fee', '41001-Subscription', 'tbl_fcoa_bkdn', 11, 0, 10000),
(19, 10, 'cash', '11001002-Main Cash', 'tbl_fcoa_bkdn_sub', 4, 8000, 0),
(20, 10, 'Subscription Fee', '41001-Subscription', 'tbl_fcoa_bkdn', 11, 0, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fcoa`
--

CREATE TABLE `tbl_fcoa` (
  `fcoa_id` int(11) NOT NULL,
  `fcoa_master_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `fcoa` varchar(500) NOT NULL,
  `fcoa_code` varchar(50) DEFAULT NULL,
  `fcoa_balance` int(11) DEFAULT NULL,
  `rec_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fcoa`
--

INSERT INTO `tbl_fcoa` (`fcoa_id`, `fcoa_master_id`, `my_id`, `fcoa`, `fcoa_code`, `fcoa_balance`, `rec_date`) VALUES
(1, 1, 1, 'Current Assets', '1100', 0, '2021-11-06 14:24:37'),
(2, 1, 1, 'Fixed Assets', '1200', 0, '2021-11-04 00:52:33'),
(3, 1, 1, 'Other Assets', '1300', 0, '2015-04-08 12:43:54'),
(4, 2, 1, 'Current Liabilities', '2100', 0, '2015-04-08 12:44:33'),
(5, 2, 1, 'Long Term Liabilities', '2200', 0, '2015-04-08 12:45:10'),
(6, 2, 1, 'Other Liabilities', '2300', 0, '2015-04-08 12:45:31'),
(7, 3, 1, 'Capital', '3100', 0, '2015-04-08 12:46:16'),
(8, 4, 1, 'Operating Income', '4100', 0, '2021-11-03 21:58:49'),
(9, 4, 1, 'Non operating Income', '4200', 0, '2020-08-24 18:55:27'),
(10, 4, 1, 'Other Income', '43000', 0, '2021-11-05 01:37:44'),
(11, 4, 1, 'Other Revenue Stamp', '4400', 0, '2015-04-08 16:08:16'),
(12, 5, 1, 'Capital Expenses', '5100', 0, '2015-04-08 13:17:47'),
(13, 5, 1, 'Revenue Expenses', '5200', 0, '2015-04-08 13:18:51'),
(15, 3, 1, 'Provisions', '3200', 0, '2021-11-04 00:54:05'),
(16, 1, 1, 'Intengible Assets', '121212', 5000, '2021-11-06 14:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fcoa_bkdn`
--

CREATE TABLE `tbl_fcoa_bkdn` (
  `fcoa_bkdn_id` int(11) NOT NULL,
  `fcoa_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `fcoa_bkdn` varchar(500) NOT NULL,
  `bkdn_code` varchar(50) DEFAULT NULL,
  `bkdn_balance` int(11) DEFAULT NULL,
  `rec_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fcoa_bkdn`
--

INSERT INTO `tbl_fcoa_bkdn` (`fcoa_bkdn_id`, `fcoa_id`, `my_id`, `fcoa_bkdn`, `bkdn_code`, `bkdn_balance`, `rec_date`) VALUES
(1, 1, 1, 'Cash', '11001', 0, '2021-11-08 01:25:57'),
(2, 1, 1, 'Bank', '11002', 0, '2021-11-08 01:26:15'),
(3, 13, 1, 'Salary', '52001', 0, '2021-11-08 01:26:47'),
(4, 13, 1, 'Electricity Bill', '52002', 0, '2021-11-08 01:32:27'),
(5, 13, 1, 'Miscellanous expense', '52003', 0, '2021-11-08 01:32:32'),
(6, 13, 1, 'Rent Expense', '52004', 0, '2021-11-08 01:33:15'),
(7, 13, 1, 'Paint', '52005', 0, '2021-11-08 01:33:56'),
(8, 13, 1, 'Stationary Expense', '52006', 0, '2021-11-08 01:34:29'),
(9, 13, 1, 'Repair & Maintenance', '52007', 0, '2021-11-08 01:35:00'),
(10, 13, 1, 'Clean Expense', '52007', 0, '2021-11-08 01:35:32'),
(11, 8, 1, 'Subscription', '41001', 0, '2021-11-08 01:38:53'),
(12, 8, 1, 'Income from Garbage', '41002', 0, '2021-11-08 01:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fcoa_bkdn_sub`
--

CREATE TABLE `tbl_fcoa_bkdn_sub` (
  `fcoa_bkdn_sub_id` int(11) NOT NULL,
  `fcoa_bkdn_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `fcoa_bkdn_sub` varchar(500) NOT NULL,
  `sub_code` varchar(50) DEFAULT NULL,
  `sub_balance` int(11) DEFAULT NULL,
  `rec_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fcoa_bkdn_sub`
--

INSERT INTO `tbl_fcoa_bkdn_sub` (`fcoa_bkdn_sub_id`, `fcoa_bkdn_id`, `my_id`, `fcoa_bkdn_sub`, `sub_code`, `sub_balance`, `rec_date`) VALUES
(1, 3, 1, 'Staff Salary', '52001001', 0, '2021-11-08 01:37:11'),
(2, 3, 1, 'Night Guard Salary', '52001002', 0, '2021-11-08 01:38:09'),
(3, 1, 1, 'Petty Cash', '11001001', 0, '2021-11-08 01:41:49'),
(4, 1, 1, 'Main Cash', '11001002', 0, '2021-11-08 01:42:14'),
(5, 6, 1, 'Office Rent', '52004001', 0, '2021-11-08 02:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fcoa_master`
--

CREATE TABLE `tbl_fcoa_master` (
  `fcoa_master_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `fcoa_master` varchar(500) NOT NULL,
  `master_code` varchar(50) DEFAULT NULL,
  `master_balance` int(11) DEFAULT NULL,
  `rec_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fcoa_master`
--

INSERT INTO `tbl_fcoa_master` (`fcoa_master_id`, `my_id`, `fcoa_master`, `master_code`, `master_balance`, `rec_date`, `update_date`) VALUES
(1, 1, 'Assets', '1000', 0, '2021-11-03 10:50:32', NULL),
(2, 1, 'Liabilities', '2000', 0, '2015-04-05 18:21:25', NULL),
(3, 1, 'Capital', '3000', 0, '2021-11-05 01:37:18', NULL),
(4, 1, 'Income', '4000', 0, '2015-04-05 18:21:59', NULL),
(5, 1, 'Expense', '5000', 0, '2015-04-05 18:22:15', '2021-10-31 00:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_ledger`
--

CREATE TABLE `tbl_general_ledger` (
  `general_ledger_id` int(4) NOT NULL,
  `journal_title` varchar(100) DEFAULT NULL,
  `dr` int(11) DEFAULT NULL,
  `cr` int(11) DEFAULT NULL,
  `rec_date` datetime NOT NULL,
  `my_id` int(11) NOT NULL,
  `jv_id` int(11) NOT NULL,
  `fy_id` int(11) DEFAULT NULL,
  `fcoa_master_id` int(11) DEFAULT NULL,
  `fcoa_id` int(11) DEFAULT NULL,
  `fcoa_bkdn_id` int(11) DEFAULT NULL,
  `fcoa_bkdn_sub_id` int(11) DEFAULT NULL,
  `debit_voucher_id` int(11) DEFAULT NULL,
  `devoucher_bkdn_id` int(11) DEFAULT NULL,
  `credit_voucher_id` int(11) DEFAULT NULL,
  `crvoucher_bkdn_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_general_ledger`
--

INSERT INTO `tbl_general_ledger` (`general_ledger_id`, `journal_title`, `dr`, `cr`, `rec_date`, `my_id`, `jv_id`, `fy_id`, `fcoa_master_id`, `fcoa_id`, `fcoa_bkdn_id`, `fcoa_bkdn_sub_id`, `debit_voucher_id`, `devoucher_bkdn_id`, `credit_voucher_id`, `crvoucher_bkdn_id`) VALUES
(1, 'Paid to Karim', 5000, NULL, '2021-11-02 01:44:43', 1, 1001, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL),
(2, 'Paid to Karim', NULL, 5000, '2021-11-02 01:44:52', 1, 1001, NULL, NULL, NULL, 2, NULL, 1, 2, NULL, NULL),
(3, 'Paid to Rahim', 2000, NULL, '2021-11-03 02:01:34', 1, 1002, NULL, NULL, NULL, NULL, 2, 2, 3, NULL, NULL),
(4, 'Paid to Rahim', NULL, 2000, '2021-11-03 02:01:34', 1, 1002, NULL, NULL, NULL, NULL, 4, 2, 4, NULL, NULL),
(5, 'Paid to Jalal', 5500, NULL, '2021-11-04 02:03:06', 1, 1003, NULL, NULL, NULL, NULL, 1, 3, 5, NULL, NULL),
(6, 'Paid to Jalal', NULL, 5500, '2021-11-04 02:03:06', 1, 1003, NULL, NULL, NULL, 2, NULL, 3, 6, NULL, NULL),
(7, 'Paid to Khalil', 2800, NULL, '2021-11-05 02:04:14', 1, 1004, NULL, NULL, NULL, NULL, 2, 4, 7, NULL, NULL),
(8, 'Paid to Khalil', NULL, 2800, '2021-11-05 02:04:14', 1, 1004, NULL, NULL, NULL, NULL, 4, 4, 8, NULL, NULL),
(9, 'Paid electricity bill', 6000, NULL, '2021-11-06 02:05:48', 1, 1005, NULL, NULL, NULL, 4, NULL, 5, 9, NULL, NULL),
(10, 'Paid electricity bill', NULL, 6000, '2021-11-06 02:05:48', 1, 1005, NULL, NULL, NULL, 2, NULL, 5, 10, NULL, NULL),
(11, 'Office Rent for nov', 25000, NULL, '2021-11-07 02:10:26', 1, 1006, NULL, NULL, NULL, NULL, 5, 6, 11, NULL, NULL),
(12, 'Office Rent for nov', NULL, 25000, '2021-11-07 02:10:26', 1, 1006, NULL, NULL, NULL, NULL, 4, 6, 12, NULL, NULL),
(13, 'Paint expense', 2500, NULL, '2021-11-08 02:11:28', 1, 1007, NULL, NULL, NULL, 7, NULL, 7, 13, NULL, NULL),
(14, 'Paint expense', NULL, 2500, '2021-11-08 02:11:28', 1, 1007, NULL, NULL, NULL, NULL, 4, 7, 14, NULL, NULL),
(15, 'Paint expense', 3500, NULL, '2021-11-08 02:12:21', 1, 1009, NULL, NULL, NULL, 7, NULL, 8, 15, NULL, NULL),
(16, 'Paint expense', NULL, 3500, '2021-11-08 02:12:21', 1, 1009, NULL, NULL, NULL, NULL, 4, 8, 16, NULL, NULL),
(17, 'cash', 10000, NULL, '2021-11-11 00:00:00', 1, 1010, NULL, NULL, NULL, NULL, 4, 9, 17, NULL, NULL),
(18, 'Subscription Fee', NULL, 10000, '2021-11-11 00:00:00', 1, 1010, NULL, NULL, NULL, 11, NULL, 9, 18, NULL, NULL),
(19, 'cash', 8000, NULL, '2021-11-16 00:00:00', 1, 1011, NULL, NULL, NULL, NULL, 4, 10, 19, NULL, NULL),
(20, 'Subscription Fee', NULL, 8000, '2021-11-16 00:00:00', 1, 1011, NULL, NULL, NULL, 11, NULL, 10, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_voucher`
--

CREATE TABLE `tbl_general_voucher` (
  `general_voucher_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `rec_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_general_voucher`
--

INSERT INTO `tbl_general_voucher` (`general_voucher_id`, `my_id`, `voucher_no`, `rec_date`) VALUES
(1, 1, '1001', '2021-11-02 01:43:37'),
(2, 1, '1002', '2021-11-03 02:01:34'),
(3, 1, '1003', '2021-11-04 02:03:06'),
(4, 1, '1004', '2021-11-05 02:04:14'),
(5, 1, '1005', '2021-11-06 02:05:48'),
(6, 1, '1006', '2021-11-07 02:10:26'),
(7, 1, '1007', '2021-11-08 02:11:28'),
(8, 1, '1008', '2021-11-09 02:12:21'),
(9, 1, '1009', '2021-11-11 16:47:23'),
(10, 1, '1010', '2021-11-11 16:47:54'),
(11, 1, '1011', '2021-11-16 12:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house_owner`
--

CREATE TABLE `tbl_house_owner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `alt_contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `per_add` text,
  `status` int(11) DEFAULT '1' COMMENT '0 deleted , 1 active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_house_owner`
--

INSERT INTO `tbl_house_owner` (`id`, `name`, `contact`, `alt_contact`, `email`, `per_add`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Aziz', '01898989898', '01989089081', 'azizi@gmail.com', ' 2 no Gate', 1, NULL, NULL, NULL, NULL),
(2, 'Jalal', '01865656255', '01565068560', 'jalal@gmail.com', 'Agrabad', 1, NULL, NULL, NULL, NULL),
(3, 'Halim', '01464644764', '01328905116', 'halim@gmail.com', 'Muradpur', 1, NULL, '2021-11-10 01:07:33', NULL, 1),
(4, 'Farid', '01326566562', '01765656260', 'asd@gmail.com', 'Bohoddarhut', 1, NULL, NULL, NULL, NULL),
(7, 'Irfan', '01837604100', '01979604100', 'sirirfanmajid@gmail.com', 'Kajir dewry', 1, '2021-10-30 06:09:11', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house_owner_flat`
--

CREATE TABLE `tbl_house_owner_flat` (
  `id` int(11) NOT NULL,
  `house_owner_id` int(11) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `flat_no` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 deleted1 active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_house_owner_flat`
--

INSERT INTO `tbl_house_owner_flat` (`id`, `house_owner_id`, `house_no`, `flat_no`, `amount`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '30', '3', '5000.00', 1, NULL, NULL, NULL, NULL),
(2, 2, '50', '1a', '6000.00', 1, NULL, NULL, NULL, NULL),
(3, 3, '25', '5', '4000.00', 1, NULL, '2021-11-10 01:07:33', NULL, 1),
(4, 4, '12', '2A', '8000.00', 1, NULL, NULL, NULL, NULL),
(7, 7, '30', '2', '5000.00', 1, '2021-10-30 06:09:11', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house_owner_payment`
--

CREATE TABLE `tbl_house_owner_payment` (
  `id` int(11) NOT NULL,
  `house_owner_id` int(11) NOT NULL,
  `pay_amount` decimal(8,2) NOT NULL,
  `actual_amount` decimal(8,2) NOT NULL,
  `pdate` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 active 2 hit account',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_house_owner_payment`
--

INSERT INTO `tbl_house_owner_payment` (`id`, `house_owner_id`, `pay_amount`, `actual_amount`, `pdate`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '0.00', '5000.00', '2021-11-16', 0, '2021-11-11 19:11:00', '2021-11-16 06:25:55', 1, 1),
(2, 2, '6000.00', '6000.00', '2021-11-11', 2, '2021-11-11 19:11:00', '2021-11-11 22:03:53', 1, 1),
(3, 3, '4000.00', '4000.00', '2021-11-11', 2, '2021-11-11 19:11:00', '2021-11-11 22:03:56', 1, 1),
(6, 4, '0.00', '8000.00', '2021-11-11', 2, '2021-11-11 19:11:33', '2021-11-11 19:29:45', 1, 1),
(7, 7, '0.00', '5000.00', '2021-11-11', 2, '2021-11-11 19:11:33', '2021-11-11 19:31:54', 1, 1),
(8, 4, '8000.00', '8000.00', '2021-11-16', 2, '2021-11-16 05:52:04', '2021-11-16 06:37:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slogan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_debit_voucher`
--
ALTER TABLE `tbl_debit_voucher`
  ADD PRIMARY KEY (`debit_voucher_id`);

--
-- Indexes for table `tbl_devoucher_bkdn`
--
ALTER TABLE `tbl_devoucher_bkdn`
  ADD PRIMARY KEY (`devoucher_bkdn_id`);

--
-- Indexes for table `tbl_fcoa`
--
ALTER TABLE `tbl_fcoa`
  ADD PRIMARY KEY (`fcoa_id`);

--
-- Indexes for table `tbl_fcoa_bkdn`
--
ALTER TABLE `tbl_fcoa_bkdn`
  ADD PRIMARY KEY (`fcoa_bkdn_id`);

--
-- Indexes for table `tbl_fcoa_bkdn_sub`
--
ALTER TABLE `tbl_fcoa_bkdn_sub`
  ADD PRIMARY KEY (`fcoa_bkdn_sub_id`);

--
-- Indexes for table `tbl_fcoa_master`
--
ALTER TABLE `tbl_fcoa_master`
  ADD PRIMARY KEY (`fcoa_master_id`);

--
-- Indexes for table `tbl_general_ledger`
--
ALTER TABLE `tbl_general_ledger`
  ADD PRIMARY KEY (`general_ledger_id`);

--
-- Indexes for table `tbl_general_voucher`
--
ALTER TABLE `tbl_general_voucher`
  ADD PRIMARY KEY (`general_voucher_id`);

--
-- Indexes for table `tbl_house_owner`
--
ALTER TABLE `tbl_house_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_house_owner_flat`
--
ALTER TABLE `tbl_house_owner_flat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_house_owner_payment`
--
ALTER TABLE `tbl_house_owner_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_debit_voucher`
--
ALTER TABLE `tbl_debit_voucher`
  MODIFY `debit_voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_devoucher_bkdn`
--
ALTER TABLE `tbl_devoucher_bkdn`
  MODIFY `devoucher_bkdn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_fcoa`
--
ALTER TABLE `tbl_fcoa`
  MODIFY `fcoa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_fcoa_bkdn`
--
ALTER TABLE `tbl_fcoa_bkdn`
  MODIFY `fcoa_bkdn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_fcoa_bkdn_sub`
--
ALTER TABLE `tbl_fcoa_bkdn_sub`
  MODIFY `fcoa_bkdn_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_fcoa_master`
--
ALTER TABLE `tbl_fcoa_master`
  MODIFY `fcoa_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_general_ledger`
--
ALTER TABLE `tbl_general_ledger`
  MODIFY `general_ledger_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_general_voucher`
--
ALTER TABLE `tbl_general_voucher`
  MODIFY `general_voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_house_owner`
--
ALTER TABLE `tbl_house_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_house_owner_flat`
--
ALTER TABLE `tbl_house_owner_flat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_house_owner_payment`
--
ALTER TABLE `tbl_house_owner_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
