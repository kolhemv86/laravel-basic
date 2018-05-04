-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 11:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `type` enum('CHECKING','CREDIT CARD','FLOORING','PETTY CASH','OTHER') NOT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dept` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `cellno` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carrier` int(11) DEFAULT NULL,
  `vacapercent` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carswholesale` int(11) DEFAULT NULL,
  `carconsign` int(11) DEFAULT NULL,
  `wage` float(6,2) DEFAULT NULL,
  `two_week_salary` decimal(10,2) DEFAULT NULL,
  `basepay` float(7,2) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `name`, `lname`, `dept`, `email`, `password`, `role`, `cellno`, `carrier`, `vacapercent`, `carswholesale`, `carconsign`, `wage`, `two_week_salary`, `basepay`, `notes`, `pin`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin', '10,11,12,13', 'admin@admin.com', '$2y$10$sPEHRQRhRSqotLffQJ0lDOkFDh62I8WO8Z6XOrDLnVPqRHaH1qaP2', 1, '456789889', 1, NULL, NULL, NULL, 4.50, '40.00', 23.00, 'n/A', NULL, 'Active', 'glmSFXR82vP50s3s3jSYeKdlvhsHnugLcUgBjGjp9tOhSCxHUns2FWjDlSXw', '2017-05-02 01:09:13', '2018-04-16 00:22:08'),
(2, 'sid', 'siddhraj', 'raulji', '7', 'manoj@webmynesystems.com', '$2y$10$AHZI/BWizJpWE2VS9L6zReilk8eX6HVn0LuZgplT9.hGZmvREWAcK', 3, '1234567890', 3, NULL, NULL, NULL, 4.50, '40.00', 20.00, 'not', NULL, 'Active', 'OaoKI5L6DpcCUkWbuxfWTy5zMAY0pZFg10ogYGGLnlZ6ymds5gXl2IJhzYw2', '2017-05-31 01:53:43', '2017-12-19 18:58:26'),
(5, 'kolhemv86', 'manoj', 'kolhe', '9,10', 'ermanojkolhe@gmail.com', '$2y$10$19Du7S0OhLYkct3ngsqxfOfDOIMcJJlFtlaLQhGD3ysbzk2SRAAMm', 3, '1234567890', 1, NULL, NULL, NULL, 4.50, '40.00', 23.00, 'nothing', NULL, 'Active', 'HJFoopyHTAHvhBzGp4ZLqS5ZRpssRWGSEsUGrM8KxDQl6YGQhaCMsdxlGOKp', '2017-05-31 02:33:00', '2017-12-19 19:06:12'),
(18, 'bhupendra', 'Bhupendra', 'Mistry', '11,12', '26bhupendra@gmail.com', '$2y$10$rwjBK/h9sJ6rEnsJ8WcaDejaZViLf6jAlJDGzN6eZ9p8vM/0OK2.i', 3, '9685574153', 1, NULL, NULL, NULL, 10.00, '40.00', 100.00, 'Sales person', NULL, 'Active', NULL, '2018-01-12 02:22:38', '2018-01-12 02:22:38'),
(17, 'manoj86', 'hits', 'kolhe', '8', 'testing.mehul2016@gmail.com', '$2y$10$SkYX/Nq53kIRdXrAXIQ1.OiP7sgUVtVq76V3ure3jF6kXc0bDmc12', 3, '123456789', 2, NULL, NULL, NULL, 4.50, '40.00', 20.00, 'not', NULL, 'Active', 'Cpg2EWljcPE0L3WSeOqgROOtrB1AQsxMs6Pq7CTHNiBGapJUEilmSAbCjtue', '2018-01-11 18:24:29', '2018-01-18 23:53:15'),
(19, 'mehul', 'Mehul', 'Soni', '10,11', 'testing.mehul2016@gmail.com', '$2y$10$y4PIpm8vuHzcXixuI.aaj.nx3nkidCruR14b1Sj6Vln9Xwvl9Rp0W', 1, '9898123456', 2, NULL, NULL, NULL, 12.00, '10.00', 20.00, 'test', NULL, 'Active', NULL, '2018-03-28 05:09:52', '2018-04-26 01:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `sid`, `cid`, `created_at`, `updated_at`) VALUES
(1, 'vadodara', 2, 1, NULL, NULL),
(4, 'Bharuch', 2, 1, '2017-12-07 05:05:50', '2017-12-07 05:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `isdn_no` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `isdn_no`, `created_at`, `updated_at`) VALUES
(1, 'India', '+91', '2017-05-09 12:20:56', '2017-12-06 09:54:26'),
(2, 'USA', '+1', '2017-05-09 12:23:00', '2017-05-09 12:23:00'),
(3, 'Australia', '+94', '2017-09-21 13:11:29', '2017-09-21 13:29:00'),
(5, 'Bhutan', '+86', '2017-09-21 13:25:57', '2017-09-21 13:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `email_temp_id` int(11) UNSIGNED NOT NULL,
  `email_temp_receiver` char(1) DEFAULT NULL,
  `email_temp_name` varchar(100) DEFAULT NULL,
  `email_temp_desc` varchar(150) DEFAULT NULL,
  `email_temp_subject` varchar(100) DEFAULT NULL,
  `email_temp_body` text,
  `email_temp_status` char(1) DEFAULT NULL,
  `email_temp_type` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'maruti', '2017-12-11 12:13:43', '2017-12-11 12:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `mid`, `created_at`, `updated_at`) VALUES
(1, 'wagnor', 2, '2017-12-11 12:13:58', '2017-12-11 12:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `modulename` varchar(200) DEFAULT NULL,
  `uri` text,
  `subid` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `modulename`, `uri`, `subid`, `status`, `created_at`, `updated_at`) VALUES
(2, 'siteconfig', 'control_panel/siteconfig', 27, 1, '2017-12-07 09:08:23', '2017-12-12 10:46:13'),
(3, 'country', 'control_panel/country', 27, 1, '2017-12-07 09:08:23', '2017-12-12 10:46:18'),
(4, 'state', 'control_panel/state', 27, 1, '2017-12-07 09:08:23', '2017-12-12 10:46:25'),
(5, 'city', 'control_panel/city', 27, 1, '2017-12-07 09:08:23', '2017-12-12 10:46:30'),
(12, 'module', 'control_panel/module', 27, 1, '2017-12-07 09:08:23', '2017-12-12 10:46:45'),
(27, 'Setup', 'control_panel/', 0, 1, '2017-12-12 10:45:47', '2017-12-12 10:45:47'),
(55, 'access', 'control_panel/access', 0, 0, NULL, NULL),
(59, 'Home', 'control_panel/home', 27, 1, '2018-01-10 04:41:39', '2018-01-22 10:41:40'),
(63, 'dashboard', 'control_panel/dashboard', 27, 1, '2018-02-28 05:03:03', '2018-03-05 05:02:14'),
(80, 'Role', 'control_panel/role', 27, 1, '2018-05-04 07:35:53', '2018-05-04 07:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'news letter 1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', '2017-06-02 08:51:42', '2017-06-02 09:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `newssubscribe`
--

CREATE TABLE `newssubscribe` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A' COMMENT 'A:Active D: Deactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newssubscribe`
--

INSERT INTO `newssubscribe` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ermanojkolhe@gmail.com', 'A', NULL, '2017-12-06 11:43:40'),
(3, 'ketulpatel@webmynesystems.com', 'A', '2017-12-06 07:00:00', '2017-12-06 07:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('siddhrajraulji@gmail.com', '$2y$10$EEJ4AD78T0aQzNCf3e471uY4BESLQlnIl5ZtSt6XiKtLZwZYNtdSm', '2017-05-12 11:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-12-11 14:23:26', '2017-12-11 11:15:17'),
(2, 'Manager', '2017-12-08 11:30:20', '2017-12-18 11:01:07'),
(3, 'Sales Person', '2017-12-08 11:30:45', '2017-12-18 11:01:27'),
(5, 'Tech', '2017-12-20 10:54:25', '2017-12-20 10:54:25'),
(6, 'User', '2017-12-20 10:54:58', '2017-12-20 10:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `add_action` enum('0','1') NOT NULL DEFAULT '0',
  `edit_action` enum('0','1') NOT NULL DEFAULT '0',
  `delete_action` enum('0','1') NOT NULL DEFAULT '0',
  `view_action` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `module_id`, `add_action`, `edit_action`, `delete_action`, `view_action`, `created_at`, `updated_at`) VALUES
(20, 2, 2, '0', '0', '0', '0', '2017-12-11 10:13:58', '2018-02-28 10:36:23'),
(21, 2, 5, '0', '0', '0', '0', '2017-12-11 10:13:58', '2018-02-28 10:36:23'),
(22, 2, 6, '0', '0', '0', '1', '2017-12-11 10:13:58', '2018-02-28 10:36:24'),
(23, 2, 7, '0', '0', '0', '0', '2017-12-11 10:13:58', '2018-02-28 10:36:23'),
(981, 5, 19, '0', '0', '0', '0', '2017-12-20 10:54:43', '2018-01-09 10:44:22'),
(982, 5, 6, '0', '0', '0', '0', '2017-12-20 10:54:43', '2018-01-09 10:44:22'),
(983, 5, 20, '0', '0', '0', '0', '2017-12-20 10:54:43', '2018-01-09 10:44:22'),
(984, 5, 30, '0', '0', '0', '1', '2017-12-20 10:54:43', '2018-01-09 10:44:22'),
(985, 5, 32, '0', '0', '0', '0', '2017-12-20 10:54:43', '2018-01-09 10:44:22'),
(986, 5, 34, '0', '0', '0', '0', '2017-12-20 10:54:43', '2018-01-09 10:44:22'),
(1475, 3, 20, '0', '0', '0', '1', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1476, 3, 30, '1', '1', '0', '1', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1477, 3, 52, '1', '1', '1', '1', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1478, 3, 2, '0', '0', '0', '0', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1479, 3, 3, '0', '0', '0', '0', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1480, 3, 4, '0', '0', '0', '0', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1481, 3, 5, '0', '0', '0', '0', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1482, 3, 7, '0', '0', '0', '0', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1483, 3, 12, '0', '0', '0', '0', '2018-01-05 11:54:51', '2018-01-18 07:14:51'),
(1632, 1, 18, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:33'),
(1633, 1, 1, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1634, 1, 11, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1635, 1, 24, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1636, 1, 25, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1637, 1, 26, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1638, 1, 31, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1639, 1, 33, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1640, 1, 35, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1641, 1, 36, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1642, 1, 37, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1643, 1, 38, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:34'),
(1644, 1, 39, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:33'),
(1645, 1, 40, '1', '1', '1', '1', '2018-01-09 07:43:03', '2018-04-24 12:32:33'),
(1646, 1, 41, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1647, 1, 53, '1', '1', '1', '0', '2018-01-09 07:43:04', '2018-04-24 12:32:31'),
(1648, 1, 19, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1649, 1, 6, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1650, 1, 20, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1651, 1, 30, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1652, 1, 32, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1653, 1, 34, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1654, 1, 42, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1655, 1, 43, '1', '1', '1', '0', '2018-01-09 07:43:04', '2018-04-24 12:32:31'),
(1656, 1, 44, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1657, 1, 45, '1', '1', '1', '0', '2018-01-09 07:43:04', '2018-04-24 12:32:31'),
(1658, 1, 46, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1659, 1, 47, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:33'),
(1660, 1, 50, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1661, 1, 52, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1662, 1, 27, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1663, 1, 2, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1664, 1, 3, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1665, 1, 4, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-05-04 07:44:13'),
(1666, 1, 5, '1', '1', '1', '1', '2018-01-09 07:43:04', '2018-04-24 12:32:32'),
(1667, 1, 7, '1', '1', '1', '1', '2018-01-09 07:43:05', '2018-04-24 12:32:32'),
(1668, 1, 12, '1', '1', '1', '1', '2018-01-09 07:43:05', '2018-04-24 12:32:32'),
(1669, 1, 54, '1', '1', '1', '0', '2018-01-09 08:58:48', '2018-04-24 12:32:31'),
(1671, 6, 18, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1672, 6, 1, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1673, 6, 11, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1674, 6, 24, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1675, 6, 25, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1676, 6, 26, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1677, 6, 31, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1678, 6, 33, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1679, 6, 35, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1680, 6, 36, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1681, 6, 37, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1682, 6, 38, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1683, 6, 39, '0', '0', '0', '0', '2018-01-09 09:52:18', '2018-01-09 10:09:13'),
(1684, 6, 40, '0', '0', '0', '0', '2018-01-09 09:52:19', '2018-01-09 10:09:13'),
(1685, 6, 41, '0', '0', '0', '0', '2018-01-09 09:52:19', '2018-01-09 10:09:13'),
(1686, 6, 53, '0', '0', '0', '0', '2018-01-09 09:52:19', '2018-01-09 10:09:13'),
(1687, 6, 54, '0', '0', '0', '0', '2018-01-09 09:52:19', '2018-01-09 10:09:13'),
(1695, 2, 18, '0', '0', '0', '1', '2018-01-09 10:44:59', '2018-02-28 10:36:24'),
(1696, 2, 1, '0', '0', '0', '1', '2018-01-09 10:44:59', '2018-02-28 10:36:24'),
(1697, 2, 11, '0', '0', '0', '1', '2018-01-09 10:44:59', '2018-02-28 10:36:24'),
(1698, 2, 24, '0', '0', '0', '1', '2018-01-09 10:44:59', '2018-02-28 10:36:24'),
(1699, 2, 25, '0', '0', '0', '1', '2018-01-09 10:44:59', '2018-02-28 10:36:24'),
(1700, 2, 26, '0', '0', '0', '1', '2018-01-09 10:44:59', '2018-02-28 10:36:24'),
(1701, 2, 31, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1702, 2, 33, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1703, 2, 35, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1704, 2, 36, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1705, 2, 37, '0', '1', '0', '1', '2018-01-09 10:45:00', '2018-05-03 12:46:47'),
(1706, 2, 38, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1707, 2, 39, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1708, 2, 40, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1709, 2, 41, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1710, 2, 53, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1711, 2, 54, '0', '0', '0', '0', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1712, 2, 19, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1713, 2, 20, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1714, 2, 30, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:24'),
(1715, 2, 32, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1716, 2, 34, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1717, 2, 42, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1718, 2, 43, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1719, 2, 44, '0', '1', '0', '1', '2018-01-09 10:45:00', '2018-05-03 12:47:02'),
(1720, 2, 45, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1721, 2, 46, '0', '0', '0', '1', '2018-01-09 10:45:00', '2018-02-28 10:36:23'),
(1722, 2, 47, '0', '0', '0', '1', '2018-01-09 10:45:01', '2018-02-28 10:36:23'),
(1723, 2, 50, '0', '0', '0', '0', '2018-01-09 10:45:01', '2018-02-28 10:36:23'),
(1724, 2, 52, '0', '0', '0', '1', '2018-01-09 10:45:01', '2018-02-28 10:36:23'),
(1725, 3, 42, '0', '0', '0', '1', '2018-01-09 13:03:21', '2018-01-18 07:14:51'),
(1726, 3, 1, '0', '0', '0', '0', '2018-01-09 13:07:35', '2018-01-18 07:14:51'),
(1727, 1, NULL, '0', '0', '0', '0', '2018-01-09 13:53:40', '2018-04-24 12:32:31'),
(1737, 1, 59, '0', '0', '0', '1', '2018-01-10 04:41:39', '2018-04-24 12:32:32'),
(1738, 2, 59, '0', '0', '0', '1', '2018-01-10 04:41:39', '2018-02-28 10:36:23'),
(1739, 3, 59, '0', '0', '0', '1', '2018-01-10 04:41:39', '2018-01-18 07:14:51'),
(1740, 5, 59, '0', '0', '0', '1', '2018-01-10 04:41:39', '2018-01-10 04:41:39'),
(1741, 6, 59, '0', '0', '0', '1', '2018-01-10 04:41:40', '2018-01-10 04:41:40'),
(1742, 3, 44, '0', '0', '0', '1', '2018-01-10 05:56:10', '2018-01-18 07:14:51'),
(1743, 3, 27, '0', '0', '0', '0', '2018-01-11 09:38:08', '2018-01-18 07:14:51'),
(1744, 1, 60, '0', '0', '0', '1', '2018-01-11 09:41:42', '2018-04-24 12:32:31'),
(1745, 2, 60, '0', '0', '0', '0', '2018-01-11 09:41:42', '2018-02-28 10:36:23'),
(1746, 3, 60, '0', '0', '0', '1', '2018-01-11 09:41:42', '2018-01-18 07:14:51'),
(1747, 5, 60, '0', '0', '0', '0', '2018-01-11 09:41:42', '2018-01-11 09:41:42'),
(1748, 6, 60, '0', '0', '0', '0', '2018-01-11 09:41:42', '2018-01-11 09:41:42'),
(1749, 1, 61, '0', '0', '0', '1', '2018-01-12 05:30:10', '2018-04-24 12:32:33'),
(1750, 2, 61, '0', '0', '0', '0', '2018-01-12 05:30:10', '2018-02-28 10:36:23'),
(1751, 3, 61, '0', '0', '0', '1', '2018-01-12 05:30:10', '2018-01-18 07:14:51'),
(1752, 5, 61, '0', '0', '0', '0', '2018-01-12 05:30:10', '2018-01-12 05:30:10'),
(1753, 6, 61, '0', '0', '0', '0', '2018-01-12 05:30:10', '2018-01-12 05:30:10'),
(1754, 3, 19, '0', '0', '0', '1', '2018-01-12 05:35:18', '2018-01-18 07:14:51'),
(1755, 3, 50, '0', '0', '0', '0', '2018-01-12 06:56:05', '2018-01-18 07:14:51'),
(1756, 1, 62, '0', '0', '0', '0', '2018-01-12 09:06:14', '2018-04-24 12:32:31'),
(1757, 2, 62, '0', '0', '0', '0', '2018-01-12 09:06:14', '2018-02-28 10:36:23'),
(1758, 3, 62, '0', '0', '0', '0', '2018-01-12 09:06:14', '2018-01-18 07:14:51'),
(1759, 5, 62, '0', '0', '0', '0', '2018-01-12 09:06:14', '2018-01-12 09:06:14'),
(1760, 6, 62, '0', '0', '0', '0', '2018-01-12 09:06:14', '2018-01-12 09:06:14'),
(1766, 3, 43, '1', '1', '1', '1', '2018-01-12 10:09:12', '2018-01-18 07:14:51'),
(1767, 3, 34, '0', '1', '0', '1', '2018-01-12 13:05:59', '2018-01-18 07:18:51'),
(1768, 1, 63, '0', '0', '0', '1', '2018-02-28 05:03:03', '2018-04-24 12:32:32'),
(1769, 2, 63, '0', '0', '0', '0', '2018-02-28 05:03:03', '2018-02-28 10:36:23'),
(1770, 3, 63, '0', '0', '0', '0', '2018-02-28 05:03:03', '2018-02-28 05:03:03'),
(1771, 5, 63, '0', '0', '0', '0', '2018-02-28 05:03:03', '2018-02-28 05:03:03'),
(1772, 6, 63, '0', '0', '0', '0', '2018-02-28 05:03:03', '2018-02-28 05:03:03'),
(1773, 1, 64, '0', '0', '0', '0', '2018-02-28 05:18:29', '2018-04-24 12:32:31'),
(1774, 2, 64, '0', '0', '0', '1', '2018-02-28 05:18:29', '2018-02-28 10:36:23'),
(1775, 3, 64, '0', '0', '0', '0', '2018-02-28 05:18:29', '2018-02-28 05:18:29'),
(1776, 5, 64, '0', '0', '0', '0', '2018-02-28 05:18:29', '2018-02-28 05:18:29'),
(1777, 6, 64, '0', '0', '0', '0', '2018-02-28 05:18:30', '2018-02-28 05:18:30'),
(1778, 1, 65, '0', '0', '0', '1', '2018-02-28 13:54:18', '2018-04-24 12:32:32'),
(1779, 2, 65, '0', '0', '0', '0', '2018-02-28 13:54:18', '2018-02-28 13:54:18'),
(1780, 3, 65, '0', '0', '0', '0', '2018-02-28 13:54:18', '2018-02-28 13:54:18'),
(1781, 5, 65, '0', '0', '0', '0', '2018-02-28 13:54:18', '2018-02-28 13:54:18'),
(1782, 6, 65, '0', '0', '0', '0', '2018-02-28 13:54:18', '2018-02-28 13:54:18'),
(1783, 1, 66, '1', '1', '1', '1', '2018-03-01 06:49:10', '2018-04-24 12:32:32'),
(1784, 2, 66, '0', '0', '0', '0', '2018-03-01 06:49:13', '2018-03-01 06:49:13'),
(1785, 3, 66, '0', '0', '0', '0', '2018-03-01 06:49:15', '2018-03-01 06:49:15'),
(1786, 5, 66, '0', '0', '0', '0', '2018-03-01 06:49:15', '2018-03-01 06:49:15'),
(1787, 6, 66, '0', '0', '0', '0', '2018-03-01 06:49:15', '2018-03-01 06:49:15'),
(1788, 1, 49, '1', '1', '1', '1', '2018-03-01 12:46:06', '2018-04-24 12:32:33'),
(1789, 1, 67, '0', '0', '0', '1', '2018-03-06 06:51:54', '2018-04-24 12:32:32'),
(1790, 2, 67, '0', '0', '0', '0', '2018-03-06 06:51:54', '2018-03-06 06:51:54'),
(1791, 3, 67, '0', '0', '0', '0', '2018-03-06 06:51:54', '2018-03-06 06:51:54'),
(1792, 5, 67, '0', '0', '0', '0', '2018-03-06 06:51:54', '2018-03-06 06:51:54'),
(1793, 6, 67, '0', '0', '0', '0', '2018-03-06 06:51:54', '2018-03-06 06:51:54'),
(1794, 1, 68, '1', '1', '1', '1', '2018-03-06 13:20:58', '2018-04-24 12:32:32'),
(1795, 2, 68, '0', '0', '0', '0', '2018-03-06 13:20:58', '2018-03-06 13:20:58'),
(1796, 3, 68, '0', '0', '0', '0', '2018-03-06 13:20:58', '2018-03-06 13:20:58'),
(1797, 5, 68, '0', '0', '0', '0', '2018-03-06 13:20:58', '2018-03-06 13:20:58'),
(1798, 6, 68, '0', '0', '0', '0', '2018-03-06 13:20:58', '2018-03-06 13:20:58'),
(1799, 1, 69, '1', '1', '1', '1', '2018-03-07 10:53:20', '2018-04-24 12:32:32'),
(1800, 2, 69, '0', '0', '0', '0', '2018-03-07 10:53:20', '2018-03-07 10:53:20'),
(1801, 3, 69, '0', '0', '0', '0', '2018-03-07 10:53:20', '2018-03-07 10:53:20'),
(1802, 5, 69, '0', '0', '0', '0', '2018-03-07 10:53:20', '2018-03-07 10:53:20'),
(1803, 6, 69, '0', '0', '0', '0', '2018-03-07 10:53:20', '2018-03-07 10:53:20'),
(1804, 1, 70, '1', '1', '1', '0', '2018-03-07 13:45:54', '2018-04-24 12:32:31'),
(1805, 2, 70, '0', '0', '0', '0', '2018-03-07 13:45:54', '2018-03-07 13:45:54'),
(1806, 3, 70, '0', '0', '0', '0', '2018-03-07 13:45:54', '2018-03-07 13:45:54'),
(1807, 5, 70, '0', '0', '0', '0', '2018-03-07 13:45:54', '2018-03-07 13:45:54'),
(1808, 6, 70, '0', '0', '0', '0', '2018-03-07 13:45:54', '2018-03-07 13:45:54'),
(1809, 1, 71, '0', '0', '0', '0', '2018-03-15 12:06:01', '2018-04-24 12:32:31'),
(1810, 2, 71, '0', '0', '0', '0', '2018-03-15 12:06:01', '2018-03-15 12:06:01'),
(1811, 3, 71, '0', '0', '0', '0', '2018-03-15 12:06:01', '2018-03-15 12:06:01'),
(1812, 5, 71, '0', '0', '0', '0', '2018-03-15 12:06:01', '2018-03-15 12:06:01'),
(1813, 6, 71, '0', '0', '0', '0', '2018-03-15 12:06:01', '2018-03-15 12:06:01'),
(1814, 1, 72, '0', '0', '0', '1', '2018-03-20 07:41:35', '2018-04-24 12:32:32'),
(1815, 2, 72, '0', '0', '0', '0', '2018-03-20 07:41:35', '2018-03-20 07:41:35'),
(1816, 3, 72, '0', '0', '0', '0', '2018-03-20 07:41:35', '2018-03-20 07:41:35'),
(1817, 5, 72, '0', '0', '0', '0', '2018-03-20 07:41:35', '2018-03-20 07:41:35'),
(1818, 6, 72, '0', '0', '0', '0', '2018-03-20 07:41:35', '2018-03-20 07:41:35'),
(1819, 1, 73, '1', '1', '1', '1', '2018-03-23 06:33:24', '2018-04-24 12:32:33'),
(1820, 2, 73, '0', '0', '0', '0', '2018-03-23 06:33:24', '2018-03-23 06:33:24'),
(1821, 3, 73, '0', '0', '0', '0', '2018-03-23 06:33:24', '2018-03-23 06:33:24'),
(1822, 5, 73, '0', '0', '0', '0', '2018-03-23 06:33:25', '2018-03-23 06:33:25'),
(1823, 6, 73, '0', '0', '0', '0', '2018-03-23 06:33:25', '2018-03-23 06:33:25'),
(1824, 1, 74, '1', '1', '1', '0', '2018-03-28 13:11:07', '2018-04-24 12:32:31'),
(1825, 2, 74, '0', '0', '0', '0', '2018-03-28 13:11:07', '2018-03-28 13:11:07'),
(1826, 3, 74, '0', '0', '0', '0', '2018-03-28 13:11:07', '2018-03-28 13:11:07'),
(1827, 5, 74, '0', '0', '0', '0', '2018-03-28 13:11:07', '2018-03-28 13:11:07'),
(1828, 6, 74, '0', '0', '0', '0', '2018-03-28 13:11:07', '2018-03-28 13:11:07'),
(1829, 1, 75, '1', '1', '1', '1', '2018-04-02 07:34:00', '2018-04-24 12:32:33'),
(1830, 2, 75, '0', '0', '0', '0', '2018-04-02 07:34:00', '2018-04-02 07:34:00'),
(1831, 3, 75, '0', '0', '0', '0', '2018-04-02 07:34:00', '2018-04-02 07:34:00'),
(1832, 5, 75, '0', '0', '0', '0', '2018-04-02 07:34:00', '2018-04-02 07:34:00'),
(1833, 6, 75, '0', '0', '0', '0', '2018-04-02 07:34:00', '2018-04-02 07:34:00'),
(1834, 1, 76, '1', '1', '1', '1', '2018-04-03 06:53:40', '2018-04-24 12:32:33'),
(1835, 2, 76, '0', '0', '0', '0', '2018-04-03 06:53:40', '2018-04-03 06:53:40'),
(1836, 3, 76, '0', '0', '0', '0', '2018-04-03 06:53:40', '2018-04-03 06:53:40'),
(1837, 5, 76, '0', '0', '0', '0', '2018-04-03 06:53:40', '2018-04-03 06:53:40'),
(1838, 6, 76, '0', '0', '0', '0', '2018-04-03 06:53:40', '2018-04-03 06:53:40'),
(1839, 1, 77, '0', '0', '0', '1', '2018-04-03 12:39:26', '2018-04-24 12:32:32'),
(1840, 2, 77, '0', '0', '0', '0', '2018-04-03 12:39:26', '2018-04-03 12:39:26'),
(1841, 3, 77, '0', '0', '0', '0', '2018-04-03 12:39:26', '2018-04-03 12:39:26'),
(1842, 5, 77, '0', '0', '0', '0', '2018-04-03 12:39:26', '2018-04-03 12:39:26'),
(1843, 6, 77, '0', '0', '0', '0', '2018-04-03 12:39:26', '2018-04-03 12:39:26'),
(1844, 1, 78, '0', '0', '0', '1', '2018-04-20 11:03:16', '2018-04-24 12:32:31'),
(1845, 2, 78, '0', '0', '0', '0', '2018-04-20 11:03:16', '2018-04-20 11:03:16'),
(1846, 3, 78, '0', '0', '0', '0', '2018-04-20 11:03:16', '2018-04-20 11:03:16'),
(1847, 5, 78, '0', '0', '0', '0', '2018-04-20 11:03:16', '2018-04-20 11:03:16'),
(1848, 6, 78, '0', '0', '0', '0', '2018-04-20 11:03:16', '2018-04-20 11:03:16'),
(1849, 1, 79, '1', '1', '1', '1', '2018-04-24 08:58:32', '2018-04-24 12:32:33'),
(1850, 2, 79, '0', '0', '0', '0', '2018-04-24 08:58:32', '2018-04-24 08:58:32'),
(1851, 3, 79, '0', '0', '0', '0', '2018-04-24 08:58:32', '2018-04-24 08:58:32'),
(1852, 5, 79, '0', '0', '0', '0', '2018-04-24 08:58:32', '2018-04-24 08:58:32'),
(1853, 6, 79, '0', '0', '0', '0', '2018-04-24 08:58:32', '2018-04-24 08:58:32'),
(1854, 1, 80, '1', '1', '1', '1', '2018-05-04 07:35:53', '2018-05-04 07:35:53'),
(1855, 2, 80, '0', '0', '0', '0', '2018-05-04 07:35:53', '2018-05-04 07:35:53'),
(1856, 3, 80, '0', '0', '0', '0', '2018-05-04 07:35:53', '2018-05-04 07:35:53'),
(1857, 5, 80, '0', '0', '0', '0', '2018-05-04 07:35:53', '2018-05-04 07:35:53'),
(1858, 6, 80, '0', '0', '0', '0', '2018-05-04 07:35:53', '2018-05-04 07:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE `site_config` (
  `site_config_id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `site_URL` varchar(100) DEFAULT NULL,
  `site_logo` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `from_name` varchar(100) DEFAULT NULL,
  `from_email` varchar(100) DEFAULT NULL,
  `reply_name` varchar(100) DEFAULT NULL,
  `reply_email` varchar(100) DEFAULT NULL,
  `record_per_page` int(4) DEFAULT NULL,
  `Safe_Urls` char(1) DEFAULT '0',
  `maintenance_flag` char(1) DEFAULT NULL,
  `CurrentSkin` varchar(100) DEFAULT NULL,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `currency_exponent` varchar(5) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `dealer` varchar(255) DEFAULT NULL,
  `multi_language` char(1) NOT NULL DEFAULT 'N' COMMENT 'Multiple Language Allowed',
  `tax_rate` float(18,2) DEFAULT '0.00',
  `site_place` varchar(100) NOT NULL,
  `site_code` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `notes` text,
  `documentation_fee` decimal(10,2) DEFAULT '0.00',
  `title_fee` decimal(10,2) DEFAULT '0.00',
  `pack_fee` decimal(10,2) DEFAULT '0.00',
  `dealer_number` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`site_config_id`, `site_name`, `site_URL`, `site_logo`, `admin_email`, `admin_name`, `from_name`, `from_email`, `reply_name`, `reply_email`, `record_per_page`, `Safe_Urls`, `maintenance_flag`, `CurrentSkin`, `currency_symbol`, `currency_exponent`, `company_name`, `dealer`, `multi_language`, `tax_rate`, `site_place`, `site_code`, `address`, `phone`, `website`, `tagline`, `notes`, `documentation_fee`, `title_fee`, `pack_fee`, `dealer_number`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Startup', 'http://ws-srv-php/projects/LaravelStartup', 'fdown.png', 'testing.manojkolhe@gmail.com', 'dms', 'dms', 'testing.manojkolhe@gmail.com', 'ckp12035@yahoo.co.in', 'ckp12035@yahoo.co.in', 10, '', '', 'default', '$', '1', 'Boise Auto Clearance', '1046', 'N', 6.00, 'india', 'DMS', '5300 W FAIRWIEW AVE,BOISE,ID 83706', '208-991-2224', 'http://ws-srv-php/projects/DMS/', 'Smart Buy', NULL, '199.00', '14.00', '929.00', '1046', 'BOISE', 'ID', '83706', '2018-03-07 00:00:00', '2018-05-04 09:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `cid` int(11) NOT NULL,
  `tax_rate` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `cid`, `tax_rate`, `created_at`, `updated_at`) VALUES
(2, 'Gujarat', 1, '6.00', '2017-05-09 13:04:54', '2018-04-23 06:52:11'),
(3, 'Idaho', 2, '6.00', '2017-05-10 06:03:38', '2018-05-02 12:17:49'),
(4, 'Rajasthan', 1, '0.00', '2017-05-10 08:34:26', '2017-12-06 12:42:18'),
(5, 'Punjab', 1, '0.00', '2017-12-06 12:43:04', '2017-12-06 12:43:04'),
(6, 'Washington', 2, '0.00', '2017-12-27 06:41:55', '2017-12-27 06:41:55'),
(7, 'Illinois', 2, '0.00', '2017-12-27 06:42:05', '2017-12-27 06:42:05'),
(8, 'Alaska', 2, '0.00', '2017-12-27 06:42:14', '2017-12-27 06:42:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pin` (`pin`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`email_temp_id`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newssubscribe`
--
ALTER TABLE `newssubscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `site_config`
--
ALTER TABLE `site_config`
  ADD PRIMARY KEY (`site_config_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `email_temp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newssubscribe`
--
ALTER TABLE `newssubscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1859;

--
-- AUTO_INCREMENT for table `site_config`
--
ALTER TABLE `site_config`
  MODIFY `site_config_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `makeidconstraint` FOREIGN KEY (`mid`) REFERENCES `make` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `fck_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
