-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2019 at 05:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pickadova`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('admin','subadmin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'subadmin',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_condition` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `live_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_expiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inactive_duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `live_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pause_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `bump_up_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `feature_expiry` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_percentage` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo_expire` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `report_txt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_super`, `type`, `image`, `remember_token`, `terms_and_condition`, `created_at`, `updated_at`, `live_amount`, `live_expiry`, `inactive_duration`, `live_message`, `pause_message`, `feature_amount`, `bump_up_amount`, `feature_expiry`, `user_percentage`, `photo_expire`, `report_txt`, `live_verification`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$gP.4E6OlxnvxRk.tSavASen2Mc3DXpamTnZp.orSH2aCuTjMhsAHq', 1, 'admin', '1571663758-money.png', NULL, '<p><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">Terms of service</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;(also known as&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">terms of use</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;and&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">terms and conditions</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">, commonly abbreviated as&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">TOS</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;or&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">ToS</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">,&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">ToU</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;or&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">T&amp;C</b><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">) are the&nbsp;</span><font color=\"#0b0080\" face=\"sans-serif\"><span style=\"background: none rgb(255, 255, 255); font-size: 14px;\">legal agreements</span></font><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;between a&nbsp;</span><font color=\"#0b0080\" face=\"sans-serif\"><span style=\"background: none rgb(255, 255, 255); font-size: 14px;\">service provider</span></font><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;and a person who wants to use that service. The person must agree to abide by the terms of service in order to use the offered service.</span><sup id=\"cite_ref-AOLd_1-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px; color: rgb(34, 34, 34); font-family: sans-serif;\"><a href=\"https://en.wikipedia.org/wiki/Terms_of_service#cite_note-AOLd-1\" style=\"color: rgb(11, 0, 128); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">[1]</a></sup><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">&nbsp;Terms of service can also be merely a&nbsp;</span><font color=\"#0b0080\" face=\"sans-serif\"><span style=\"background: none rgb(255, 255, 255); font-size: 14px;\">disclaimer</span></font><span style=\"color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px;\">, especially regarding the use of websites.</span><br></p>', NULL, '2019-10-22 13:04:46', '0', '30', '5', 'HOW IS IT GOING11', 'YOUR PROFILE IS NOT VISIBLE TO PUBLIC', '10', '1', '1', '53', '10', 'Hi People, Please Report any fake Profiles, or Technical issues', 'Your profile is not verified please complete your profile');

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

DROP TABLE IF EXISTS `block_user`;
CREATE TABLE IF NOT EXISTS `block_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `boys_testimonial`
--

DROP TABLE IF EXISTS `boys_testimonial`;
CREATE TABLE IF NOT EXISTS `boys_testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boys_testimonial`
--

INSERT INTO `boys_testimonial` (`id`, `user_id`, `mobile_no`, `remark`, `created_at`, `updated_at`) VALUES
(1, '11', '2546314562', 'This is test testimonial', '2019-10-21 07:03:09', '2019-10-21 07:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `reply_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment_user_id`, `name`, `comment`, `reply_comment`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'Pankaj', 'Here is my first comment 😍😍😊😎', NULL, NULL, NULL),
(2, NULL, '1', 'Pankaj', 'Here is my first comment 😍😍😊😎', NULL, NULL, NULL),
(3, NULL, '1', 'Pankaj', 'Here is my first comment 😍😍😊😎', NULL, '2019-09-13 07:10:38', '2019-09-13 07:10:38'),
(4, NULL, '1', 'Pankaj', 'Here is my first comment 😍😍😊😎', '1', '2019-09-13 07:12:02', '2019-09-13 07:12:02'),
(18, '5', '1', 'varshu@', 'Hello dear can i talk to you...', '1', '2019-09-17 06:51:47', '2019-09-17 06:51:47'),
(16, '1', '2', 'NAmsd', 'gfhfghfghfghfghghfghfg🙁😍😍', NULL, '2019-09-17 06:04:27', '2019-09-17 06:04:27'),
(17, '12', '1', 'varsha', 'hello dera how r u can i  talk to you..', NULL, '2019-09-17 06:18:39', '2019-09-17 06:18:39'),
(9, '1', '1', 'Andrew', 'asfafa', NULL, '2019-09-13 08:52:08', '2019-09-13 08:52:08'),
(10, '1', '1', 'Andrew', 'asfafa', NULL, '2019-09-13 08:52:09', '2019-09-13 08:52:09'),
(11, '6', '1', '3343', '34334', NULL, '2019-09-13 08:53:28', '2019-09-13 08:53:28'),
(12, '6', '1', 'we', 'this is a very long paragraph to test....this is a very long paragraph to test....this is a very long paragraph to test....', NULL, '2019-09-13 08:54:02', '2019-09-13 08:54:02'),
(15, '2', '2', 'Unknown', '😂😉😯', NULL, '2019-09-17 04:19:03', '2019-09-17 04:19:03'),
(19, '10', '10', 'dd', 'jghrfggf', NULL, '2019-09-17 07:24:33', '2019-09-17 07:24:33'),
(20, '10', '10', 'Jugal kishore Sharma', '😈', NULL, '2019-09-17 07:24:56', '2019-09-17 07:24:56'),
(21, '10', '10', 'minimouse', '😥', NULL, '2019-09-17 07:25:17', '2019-09-17 07:25:17'),
(22, '5', '1', 'pnakaj', '😋', NULL, '2019-09-17 07:27:10', '2019-09-17 07:27:10'),
(23, '5', '2', 'Testing', 'Testing about 🙁😠😼', NULL, '2019-09-17 07:50:11', '2019-09-17 07:50:11'),
(24, '1', '1', 'varshu@', 'its dear not dera', NULL, '2019-09-17 08:19:45', '2019-09-17 08:19:45'),
(25, '1', '0', 'Ad,min', '🙄😝😁', NULL, '2019-09-18 03:11:58', '2019-09-18 03:11:58'),
(26, '5', NULL, 'anuj dubey', 'Hello dear can i talk to you...       Hello dear can i talk to you...        Hello dear can i talk to you...', NULL, '2019-09-18 03:57:12', '2019-09-18 03:57:12'),
(27, '5', NULL, 'anuj dubey', 'Hello dear can i talk to you...       Hello dear can i talk to you...        Hello dear can i talk to you...', NULL, '2019-09-18 03:57:13', '2019-09-18 03:57:13'),
(28, '11', '11', 'Jugal kishore Sharma', '👌', NULL, '2019-09-19 07:34:45', '2019-09-19 07:34:45'),
(29, '12', '12', 'Andrew', 'wwewewewew', NULL, '2019-09-24 09:52:26', '2019-09-24 09:52:26'),
(30, '11', '11', 'George Tesla', '🙁😢', NULL, '2019-09-25 00:27:32', '2019-09-25 00:27:32'),
(31, '11', '11', 'George Tesla', '😕😦👎', NULL, '2019-09-25 00:29:55', '2019-09-25 00:29:55'),
(32, '11', NULL, 'Testing', '😓😦', NULL, '2019-09-25 00:30:21', '2019-09-25 00:30:21'),
(33, '11', '11', 'George Tesla', '😀😒', NULL, '2019-09-25 00:40:13', '2019-09-25 00:40:13'),
(34, '11', '11', 'George Tesla', '😥😨', NULL, '2019-09-25 00:45:26', '2019-09-25 00:45:26'),
(47, '11', NULL, 'mini', '🙁', '28', '2019-10-04 13:18:55', '2019-10-04 13:18:55'),
(36, '11', '11', 'George Tesla', 'yes😨😪😗😕', NULL, '2019-09-25 04:28:15', '2019-09-25 04:28:15'),
(37, '11', '11', 'George Tesla', 'hello😂😁', '36', '2019-09-25 04:29:58', '2019-09-25 04:29:58'),
(38, '11', '11', 'George Tesla', 'hello its reply of comment 😀😀😃😃😃😂😂😂', '31', '2019-09-25 04:42:01', '2019-09-25 04:42:01'),
(39, '11', '11', 'George Tesla', 'Yes its reply😥😙😾😝😝', '31', '2019-09-25 04:42:27', '2019-09-25 04:42:27'),
(40, '11', '11', 'George Tesla', '😍😍😍😍😍😍😍😍', NULL, '2019-09-25 04:45:23', '2019-09-25 04:45:23'),
(41, '11', '11', 'George Tesla', '😍😍😍😍😍', 'null', '2019-09-25 04:46:26', '2019-09-25 04:46:26'),
(42, '11', '11', 'George Tesla', '🙂🙂🙂🙂', 'null', '2019-09-25 04:47:08', '2019-09-25 04:47:08'),
(43, '11', '11', 'George Tesla', '😜😛😛😛😛🙁😀😁😃😄', '28', '2019-09-25 04:48:30', '2019-09-25 04:48:30'),
(44, '11', '11', 'George Tesla', '🙂🙁😐😏😒😓😔😕😖😗😙😚🙈🙉🙉', '28', '2019-09-25 04:52:00', '2019-09-25 04:52:00'),
(45, '12', '12', 'Test Tsss343', '😒😒😓', NULL, '2019-09-26 09:19:28', '2019-09-26 09:19:28'),
(46, '12', '12', 'Test Tsss343', 'fdgsfdsaffsaafa', NULL, '2019-10-02 15:01:07', '2019-10-02 15:01:07'),
(48, '11', '11', 'George Tesla', 'sadsad', '28', '2019-10-05 07:11:46', '2019-10-05 07:11:46'),
(49, '11', '11', 'George Tesla', 'fdgdfgdfg', '36', '2019-10-07 12:17:20', '2019-10-07 12:17:20'),
(50, '11', '11', 'George Tesla', 'hii 5th replty', '28', '2019-10-07 12:17:51', '2019-10-07 12:17:51'),
(51, '11', '11', 'George Tesla', 'hii 5th replty', '28', '2019-10-07 12:17:52', '2019-10-07 12:17:52'),
(52, '12', '11', 'George Tesla', 'i am fine🙂🙂', '17', '2019-10-07 13:34:42', '2019-10-07 13:34:42'),
(53, '11', '11', 'George Tesla', 'test😗😩😪😪😪😫😫😫', NULL, '2019-10-07 13:46:25', '2019-10-07 13:46:25'),
(54, '11', '11', 'George Tesla', 'test😗😩😪😪😪😫😫😫', NULL, '2019-10-07 13:46:26', '2019-10-07 13:46:26'),
(55, '11', '11', 'George Tesla', 'hello', NULL, '2019-10-07 14:01:26', '2019-10-07 14:01:26'),
(56, '19', '19', 'Anwar aaa', '5454455454', NULL, '2019-10-13 11:14:33', '2019-10-13 11:14:33'),
(57, '19', '0', 'admin', '4554545488777777777777777777777', NULL, '2019-10-14 12:09:29', '2019-10-14 12:09:29'),
(58, '24', '24', 'FSDFSAAF AFDS', 'sssds', NULL, '2019-10-15 07:33:32', '2019-10-15 07:33:32'),
(59, '17', '17', 'Ema Smith', 'helllo everyone', NULL, '2019-10-15 10:19:25', '2019-10-15 10:19:25'),
(60, '17', '17', 'Ema Smith', 'Hello🙁😊', '59', '2019-10-15 10:23:48', '2019-10-15 10:23:48'),
(61, '17', '17', 'Ema Smith', 'Why?', '60', '2019-10-15 10:24:52', '2019-10-15 10:24:52'),
(62, '17', '17', 'Ema Smith', 'dfssd😑', '61', '2019-10-15 10:25:28', '2019-10-15 10:25:28'),
(63, '17', '17', 'Ema Smith', 'test', NULL, '2019-10-15 10:31:58', '2019-10-15 10:31:58'),
(64, '17', '17', 'Ema Smith', 'testing reply🙁🙂', '63', '2019-10-15 10:32:54', '2019-10-15 10:32:54'),
(65, '17', '17', 'Ema Smith', 'is it working fine?🙂', NULL, '2019-10-15 10:36:44', '2019-10-15 10:36:44'),
(66, '17', '17', 'Ema Smith', 'Yes its working fine😀', '65', '2019-10-15 10:37:09', '2019-10-15 10:37:09'),
(67, '17', '17', 'Ema Smith', 'yes it\'s working😉😊', NULL, '2019-10-15 10:45:42', '2019-10-15 10:45:42'),
(68, '17', '17', 'Ema Smith', 'yes😉', '67', '2019-10-15 10:46:59', '2019-10-15 10:46:59'),
(69, '17', '17', 'Ema Smith', 'ok', '67', '2019-10-15 10:47:17', '2019-10-15 10:47:17'),
(70, '24', '24', 'FSDFSAAF AFDS', 'ddfddfd', '58', '2019-10-16 11:22:19', '2019-10-16 11:22:19'),
(71, '25', NULL, 'ASF', 'FA FA SDSFA FS ASF SF  FSFS AFSF S FSAF SA😆😆😆😆', NULL, '2019-10-16 23:43:13', '2019-10-16 23:43:13'),
(72, '25', NULL, 'SFSASAF ASF', 'FAFASAFS  SFS FASFAFSA  SFASF ASF A FSAFSA😒😒😒', NULL, '2019-10-16 23:43:30', '2019-10-16 23:43:30'),
(73, '25', NULL, 'AFSFASFS', 'SFAFSAFSAFSA F SA FSAF SFSA FA SSF AF SAFSA', NULL, '2019-10-16 23:43:43', '2019-10-16 23:43:43'),
(74, '25', NULL, 'DSF', 'FASFAS  FSA FSA SFA FSAS FASF AFS AF SA😨😨😨', NULL, '2019-10-16 23:44:00', '2019-10-16 23:44:00'),
(75, '25', NULL, 'ASF', 'FFSSFASFASFA  FSA SFAF SA SFA SFA', NULL, '2019-10-16 23:44:15', '2019-10-16 23:44:15'),
(76, '25', NULL, 'ASFFSA', 'FSAF SA SFA AS FSAF SAFSA 😀😀😀', NULL, '2019-10-16 23:44:38', '2019-10-16 23:44:38'),
(77, '25', NULL, 'FAS ASFA', 'ASFF SA  SFA FSASAF FSAASF AFS  SFA', NULL, '2019-10-16 23:44:55', '2019-10-16 23:44:55'),
(78, '24', '24', 'FSDFSAAF AFDS', 'here😂😂😂', '58', '2019-10-18 14:32:35', '2019-10-18 14:32:35'),
(79, '24', '24', 'FSDFSAAF AFDS', '2121😍😍', NULL, '2019-10-18 14:33:12', '2019-10-18 14:33:12'),
(80, '21', '26', 'Leeson yang', 'hahahaha😖😦😱🙀', NULL, '2019-10-18 21:25:38', '2019-10-18 21:25:38'),
(81, '23', '26', 'Leeson yang', 'another profile', NULL, '2019-10-18 21:26:45', '2019-10-18 21:26:45'),
(82, '24', NULL, 'ASASF', 'ASFFASFAS', NULL, '2019-10-19 02:47:57', '2019-10-19 02:47:57'),
(83, '24', NULL, 'ASFSAF', 'FASFASFASAFSFAS😈😈😈', NULL, '2019-10-19 02:48:13', '2019-10-19 02:48:13'),
(84, '27', '27', 'tom yang', 'hey', NULL, '2019-10-20 04:16:54', '2019-10-20 04:16:54'),
(85, '23', NULL, '45654', 'hggjhgjhjghjh😈😈😈', NULL, '2019-10-21 08:02:37', '2019-10-21 08:02:37'),
(86, '23', NULL, '545', '54664465654😑😑😑', '85', '2019-10-21 08:03:03', '2019-10-21 08:03:03'),
(87, '24', '11', 'George Tesla', '😈😈😈', NULL, '2019-10-21 13:48:57', '2019-10-21 13:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint_user_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `complaint_user_id`, `name`, `complaint`, `created_at`, `updated_at`) VALUES
(3, '2', '2', 'test', 'Unknown comment found😀😅😕😉😓😈', '2019-09-17 04:24:40', '2019-09-17 04:24:40'),
(2, '12', '0', 'Admin', 'Comment from admin😖😍😎', '2019-09-16 01:13:58', '2019-09-16 01:13:58'),
(4, '12', '2', '123', '54564646🙂', '2019-09-17 04:25:13', '2019-09-17 04:25:13'),
(5, '12', '2', 'Test Name', 'Complaint from unknown user', '2019-09-17 04:32:21', '2019-09-17 04:32:21'),
(6, '1', '0', 'ADMIN', 'Hello', '2019-09-17 04:35:11', '2019-09-17 04:35:11'),
(7, '5', '2', 'sadsa', 'fsafsafa😌😌', '2019-09-17 07:50:50', '2019-09-17 07:50:50'),
(8, '5', NULL, 'hhj', 'juihuiyhui gyuyguygyg', '2019-09-18 04:49:19', '2019-09-18 04:49:19'),
(9, '5', NULL, 'kapil', 'hii', '2019-09-18 04:51:09', '2019-09-18 04:51:09'),
(10, '11', '11', 'George Tesla', '😅😪', '2019-09-25 00:35:14', '2019-09-25 00:35:14'),
(11, '11', '11', 'George Tesla', '😧😧', '2019-09-25 00:41:18', '2019-09-25 00:41:18'),
(12, '11', '11', 'George Tesla', '😥😭😠😡', '2019-09-25 00:47:07', '2019-09-25 00:47:07'),
(13, '1', '0', 'admin', '😡😠', '2019-09-25 00:57:38', '2019-09-25 00:57:38'),
(14, '24', '24', 'FSDFSAAF AFDS', '65445545454😄😄😄😄', '2019-10-18 14:32:57', '2019-10-18 14:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `custom_field`
--

DROP TABLE IF EXISTS `custom_field`;
CREATE TABLE IF NOT EXISTS `custom_field` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` tinyint(4) NOT NULL DEFAULT '0',
  `input_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_field`
--

INSERT INTO `custom_field` (`id`, `label`, `name`, `required`, `input_type`, `option`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Title', NULL, 1, 'text', NULL, NULL, NULL, NULL),
(2, 'Language', NULL, 1, 'select', '[\"English\",\"Chinese\"]', NULL, NULL, '2019-09-18 02:15:44'),
(3, 'Whatsapp', NULL, 1, 'contact', NULL, '1568792780-phone1.png', NULL, NULL),
(4, 'WeChat', NULL, 1, 'contact', NULL, '1568811748-message.png', NULL, '2019-09-18 07:32:28'),
(5, 'Viber', NULL, 1, 'contact', NULL, '1568792809-call.png', NULL, NULL),
(7, 'Anns', NULL, 1, 'select', '[\"Facea\",\"dsfdd\"]', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_value`
--

DROP TABLE IF EXISTS `custom_field_value`;
CREATE TABLE IF NOT EXISTS `custom_field_value` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `counter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_field_value`
--

INSERT INTO `custom_field_value` (`id`, `user_id`, `custom_id`, `value`, `created_at`, `updated_at`, `counter`) VALUES
(1, '11', '1', 'testing', NULL, '2019-10-23 05:05:03', '0'),
(2, '11', '2', 'Chinese', NULL, '2019-10-23 05:05:03', '0'),
(3, '11', '3', '654654465654', NULL, '2019-10-23 05:05:03', '5'),
(4, '11', '4', '6546544', NULL, '2019-10-23 05:05:03', '1'),
(5, '11', '5', '6565465', NULL, '2019-10-23 05:05:03', '1'),
(20, '1', '5', '8956895689', NULL, '2019-09-25 21:45:32', '1'),
(19, '1', '4', '7897897897', NULL, '2019-10-06 13:59:46', '2'),
(18, '1', '3', '1231423123', NULL, '2019-09-25 21:45:33', '1'),
(17, '1', '2', 'Chinese', NULL, '2019-09-20 03:12:34', '0'),
(16, '1', '1', 'test', NULL, '2019-09-20 03:12:34', '0'),
(11, '2', '1', 'testing', NULL, '2019-09-18 23:49:55', '0'),
(12, '2', '2', 'English', NULL, '2019-09-18 23:49:55', '0'),
(13, '2', '3', '4545454545', NULL, '2019-09-18 23:49:55', '0'),
(14, '2', '4', '4545454545', NULL, '2019-09-18 23:49:55', '0'),
(15, '2', '5', '4545454545', NULL, '2019-09-18 23:49:55', '0'),
(21, '12', '1', 'sdsssss', NULL, '2019-09-27 12:41:52', '0'),
(22, '12', '2', 'English', NULL, '2019-09-27 12:41:52', '0'),
(23, '12', '3', '024452555', NULL, '2019-10-02 14:43:44', '1'),
(24, '12', '4', '545454', NULL, '2019-09-27 12:41:52', '0'),
(25, '12', '5', '00444545', NULL, '2019-09-27 12:41:52', '0'),
(26, '12', '7', 'Facea', NULL, '2019-09-27 12:41:52', '0'),
(27, '11', '7', 'Facea', NULL, '2019-10-23 05:05:03', '0'),
(28, '17', '1', 'testing', NULL, '2019-10-05 11:58:52', '0'),
(29, '17', '2', 'English', NULL, '2019-10-05 11:58:52', '0'),
(30, '17', '7', 'Facea', NULL, '2019-10-05 11:58:52', '0'),
(31, '17', '3', '8457845784', NULL, '2019-10-18 06:51:16', '7'),
(32, '17', '4', '8457845784', NULL, '2019-10-05 13:15:36', '4'),
(33, '17', '5', '8956487598', NULL, '2019-10-18 06:51:17', '6'),
(34, '18', '1', 'Testing', NULL, NULL, '0'),
(35, '18', '2', 'English', NULL, NULL, '0'),
(36, '18', '7', 'Facea', NULL, NULL, '0'),
(37, '18', '3', '44875545', NULL, NULL, '0'),
(38, '18', '4', '548754', NULL, NULL, '0'),
(39, '18', '5', '54825', NULL, NULL, '0'),
(40, '19', '1', 'testing', NULL, NULL, '0'),
(41, '19', '2', 'English', NULL, NULL, '0'),
(42, '19', '7', 'Facea', NULL, NULL, '0'),
(43, '19', '3', '3433', NULL, '2019-10-13 11:46:31', '1'),
(44, '19', '4', '3433', NULL, '2019-10-13 11:46:33', '1'),
(45, '19', '5', '34333', NULL, '2019-10-13 11:46:34', '1'),
(46, '20', '1', 'testing', NULL, NULL, '0'),
(47, '20', '2', 'English', NULL, NULL, '0'),
(48, '20', '7', 'Facea', NULL, NULL, '0'),
(49, '20', '3', '0000', NULL, NULL, '0'),
(50, '20', '4', '000', NULL, NULL, '0'),
(51, '20', '5', '000', NULL, NULL, '0'),
(52, '21', '1', '55454', NULL, NULL, '0'),
(53, '21', '2', 'English', NULL, NULL, '0'),
(54, '21', '7', 'Facea', NULL, NULL, '0'),
(55, '21', '3', '313131', NULL, NULL, '0'),
(56, '21', '4', '3123131', NULL, NULL, '0'),
(57, '21', '5', '313131', NULL, NULL, '0'),
(58, '22', '1', 'greatye', NULL, NULL, '0'),
(59, '22', '2', 'English', NULL, NULL, '0'),
(60, '22', '7', 'Facea', NULL, NULL, '0'),
(61, '22', '3', '65321213', NULL, NULL, '0'),
(62, '22', '4', '654654', NULL, NULL, '0'),
(63, '22', '5', '654650', NULL, NULL, '0'),
(64, '23', '1', '4845', NULL, NULL, '0'),
(65, '23', '2', 'Chinese', NULL, NULL, '0'),
(66, '23', '7', 'Facea', NULL, NULL, '0'),
(67, '23', '3', '654654', NULL, '2019-10-21 08:02:20', '1'),
(68, '23', '4', '654654', NULL, '2019-10-21 08:02:21', '1'),
(69, '23', '5', '654653', NULL, '2019-10-21 08:02:22', '1'),
(70, '24', '1', 'testing', NULL, '2019-10-18 13:13:59', '0'),
(71, '24', '2', 'English', NULL, '2019-10-18 13:13:59', '0'),
(72, '24', '7', 'dsfdd', NULL, '2019-10-18 13:13:59', '0'),
(73, '24', '3', '654654', NULL, '2019-10-21 09:43:33', '1'),
(74, '24', '4', '564654', NULL, '2019-10-21 09:43:36', '1'),
(75, '24', '5', '564654', NULL, '2019-10-21 09:43:35', '1'),
(76, '25', '1', 'test', NULL, NULL, '0'),
(77, '25', '2', 'English', NULL, NULL, '0'),
(78, '25', '7', 'Facea', NULL, NULL, '0'),
(79, '25', '3', '8457895689', NULL, '2019-10-15 12:16:07', '1'),
(80, '25', '4', '8475956895', NULL, '2019-10-15 12:16:05', '1'),
(81, '25', '5', '8596859648', NULL, '2019-10-15 12:16:06', '1'),
(82, '28', '1', '25', NULL, NULL, '0'),
(83, '28', '2', 'English', NULL, NULL, '0'),
(84, '28', '7', 'Facea', NULL, NULL, '0'),
(85, '28', '3', '452452', NULL, NULL, '0'),
(86, '28', '4', '456456456', NULL, NULL, '0'),
(87, '28', '5', '4536456345', NULL, NULL, '0'),
(88, '27', '1', '5151', NULL, '2019-10-20 13:13:29', '0'),
(89, '27', '2', 'English', NULL, '2019-10-20 13:13:29', '0'),
(90, '27', '7', 'Facea', NULL, '2019-10-20 13:13:29', '0'),
(91, '27', '3', '3424242', NULL, '2019-10-20 13:13:29', '0'),
(92, '27', '4', '245232536', NULL, '2019-10-20 13:13:29', '0'),
(93, '27', '5', '63463636', NULL, '2019-10-20 13:13:29', '0'),
(94, '29', '1', 'TopS', NULL, NULL, '0'),
(95, '29', '2', 'English', NULL, NULL, '0'),
(96, '29', '7', 'dsfdd', NULL, NULL, '0'),
(97, '29', '3', '546456456', NULL, NULL, '0'),
(98, '29', '4', '5445654654', NULL, NULL, '0'),
(99, '29', '5', '564456564', NULL, NULL, '0'),
(100, '31', '1', 'testing11', NULL, NULL, '0'),
(101, '31', '2', 'English', NULL, NULL, '0'),
(102, '31', '7', 'Facea', NULL, NULL, '0'),
(103, '31', '3', '3343', NULL, NULL, '0'),
(104, '31', '4', '3433', NULL, NULL, '0'),
(105, '31', '5', '3433', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `counter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` enum('Image','Video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Image',
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `like` bigint(20) NOT NULL DEFAULT '0',
  `admin_approval` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `user_id`, `name`, `lock`, `counter`, `type`, `amount`, `like`, `admin_approval`, `created_at`, `updated_at`, `extension`, `video_type`) VALUES
(7, '17', '1569331363-user2.jpg', 1, '5', 'Image', '10', 0, 0, NULL, '2019-10-14 10:19:10', 'jpg', NULL),
(6, '1', '1568976896-face8.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(8, '17', '1569331378-user4.jpg', 0, '2', 'Image', '0', 0, 0, NULL, '2019-10-07 13:09:18', 'jpg', NULL),
(9, '17', '1569331396-user3.jpg', 0, '3', 'Image', '0', 1, 0, NULL, '2019-10-18 06:51:43', 'jpg', NULL),
(19, '12', '1570027811-Mini_1275_GT_01.jpg', 1, '0', 'Image', '0', 0, 0, NULL, '2019-10-04 13:14:44', 'jpg', NULL),
(20, '12', '1570028339-image.jpg', 0, '2', 'Image', '0', 0, 0, NULL, '2019-10-11 11:48:47', 'jpg', NULL),
(64, '11', '1570281450-y2mate.com - shawn_mendes_and_camila_cabello_seorita_lyrics_wfQHVYTMEsM_360p.mp4', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mp4', 'file'),
(63, '11', '1570281200-Screen Recording 2019-07-01 at 15.47.13 (convert-video-online.com).mp4', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mp4', 'file'),
(62, '11', '1570281156-y2mate.com - shawn_mendes_and_camila_cabello_seorita_lyrics_wfQHVYTMEsM_360p.mp4', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mp4', 'file'),
(61, '11', '1570281054-VID20191005183934.mp4', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mp4', 'file'),
(32, '1', '1570094829-t4.jpg', 0, '2', 'Image', '0', 0, 0, NULL, '2019-10-16 11:33:56', 'jpg', NULL),
(33, '1', '1570094829-t3.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(34, '1', '1570094829-t2.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(35, '1', '1570094829-t1.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(60, '11', '1570280198-Screen Recording 2019-07-01 at 15.47.13 (convert-video-online.com).mp4', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mp4', 'file'),
(59, '11', '1570279646-VID20191005181410.mp4', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mp4', 'file'),
(57, '11', '1570257843-tail2.jpeg', 1, '4', 'Image', '10', 1, 1, NULL, '2019-10-19 09:41:25', 'jpeg', NULL),
(54, '1', '1570104859-s2.jpg', 0, '1', 'Image', '0', 0, 0, NULL, '2019-10-16 11:32:14', 'jpg', NULL),
(49, '11', '1570104113-s1.jpg', 1, '8', 'Image', '243', 0, 0, NULL, '2019-10-19 09:36:11', 'jpg', NULL),
(50, '11', '1570104163-s2.jpg', 1, '6', 'Image', '1', 0, 1, NULL, '2019-10-19 09:44:35', 'jpg', NULL),
(51, '11', '1570104228-s1.jpg', 0, '4', 'Image', '0', 0, 0, NULL, '2019-10-17 08:37:01', 'jpg', NULL),
(55, '1', '1570104859-s1.jpg', 0, '2', 'Image', '0', 0, 0, NULL, '2019-10-16 11:32:01', 'jpg', NULL),
(56, '11', '1570193346-573228.jpg', 1, '1', 'Image', '1', 1, 0, NULL, '2019-10-17 10:17:36', 'jpg', NULL),
(75, '11', '1571301749-profile.jpg', 1, '12', 'Image', '2', 5, 0, NULL, '2019-10-17 13:39:23', 'jpg', NULL),
(83, '11', 'https://youtu.be/CnR89iQalNs', 0, '0', 'Video', '0', 0, 0, NULL, NULL, NULL, 'link'),
(68, '12', '1570623740-trim.DEECE352-8CBA-4688-BD80-9C52F48B7EE8.MOV', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mov', 'file'),
(69, '19', '1570794646-image.jpg', 0, '0', 'Image', '0', 1, 0, NULL, '2019-10-22 08:57:49', 'jpg', NULL),
(70, '19', '1570794957-B695AEA6-CAB5-4DD7-82F8-E1802212BE70.jpeg', 0, '3', 'Image', '0', 0, 0, NULL, '2019-10-14 12:09:59', 'jpeg', NULL),
(71, '19', '1570795010-4A46BB7E-11C4-4498-89FB-898F4F4CAF9E.jpeg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpeg', NULL),
(72, '24', '1571055170-image.jpg', 0, '2', 'Image', '0', 0, 0, NULL, '2019-10-16 11:31:19', 'jpg', NULL),
(73, '24', '1571055949-trim.AD86F413-ECB7-427A-9219-2708F966C1F6.MOV', 0, '0', 'Video', '0', 0, 0, NULL, NULL, 'mov', 'file'),
(76, '24', '1571408838-Mini_1275_GT_01.jpg', 0, '1', 'Image', '0', 2, 0, NULL, '2019-10-21 09:43:09', 'jpg', NULL),
(77, '24', '1571408876-the-great-australian-bight-7.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(78, '24', '1571408902-wp2529526.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(79, '24', '1571409039-pexels-photo-210186.jpeg', 0, '1', 'Image', '0', 0, 0, NULL, '2019-10-18 14:31:44', 'jpeg', NULL),
(80, '28', 'https://www.youtube.com/watch?v=CnR89iQalNs', 0, '0', 'Video', '0', 0, 0, NULL, NULL, NULL, 'link'),
(81, '28', '1571576227-apl-1.jpg', 0, '6', 'Image', '0', 1, 0, NULL, '2019-10-22 13:13:08', 'jpg', NULL),
(82, '28', '1571576227-galv1.jpg', 0, '0', 'Image', '0', 0, 0, NULL, NULL, 'jpg', NULL),
(84, '11', 'https://www.youtube.com/embed/B0QfcmO4B98', 0, '0', 'Video', '0', 0, 0, NULL, NULL, NULL, 'link');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_09_09_135747_create_admin_table', 1),
(7, '2019_09_11_093833_add_age_to_users', 2),
(8, '2019_09_11_100216_create_services_table', 3),
(9, '2019_09_11_114000_add_services_to_users', 4),
(10, '2019_09_11_114758_create_media_table', 4),
(11, '2019_09_12_053727_add_extension_to_media', 5),
(12, '2019_09_12_083849_create_comments_table', 6),
(13, '2019_09_12_084632_create_complaints_table', 6),
(14, '2019_09_12_095334_add_string_in_stat_date_to_users', 7),
(15, '2019_09_13_052836_add_terms_and_condition_to_admin', 7),
(16, '2019_09_13_094314_add_mobile_and_viber_to_users', 8),
(17, '2019_09_13_123248_add_name_to_comments', 9),
(18, '2019_09_14_052322_add_name_to_complaints', 10),
(19, '2019_09_14_062348_create_custom_field_table', 11),
(20, '2019_09_14_085832_create_custom_field_value_table', 12),
(21, '2019_09_16_122806_add_live_and_expiry_live_to_users', 13),
(22, '2019_09_17_051332_add_live_amount_and_expiry_to_admin', 14),
(23, '2019_09_17_084216_add_live_message_and_pause_message_to_admin', 15),
(24, '2019_09_17_133439_create_states_table', 16),
(25, '2019_09_18_060115_add_icon_to_custom_field', 17),
(26, '2019_09_21_052747_create_packages_table', 18),
(27, '2019_09_21_092220_create_transation_table', 19),
(28, '2019_09_24_120846_add_damage_to_users', 20),
(29, '2019_09_25_111206_add_counter_to_custom_field_value', 21),
(30, '2019_09_25_115243_add_mobile_counter_to_users', 22),
(31, '2019_09_25_135226_add_online_to_users', 23),
(32, '2019_09_26_052959_add_wallet_to_users', 24),
(33, '2019_09_26_085559_add_feature_amount_to_admin', 25),
(34, '2019_09_26_091743_add_feature_profile_to_users', 26),
(35, '2019_09_26_105453_add_payment_method_transation', 27),
(36, '2019_09_26_123409_add_inactive_duration_admin', 28),
(37, '2019_09_27_120125_add_bump_up_to_admin', 29),
(38, '2019_09_27_120623_add_bump_up_to_users', 29),
(39, '2019_09_27_180019_add_feature_expiry_to_admin', 30),
(40, '2019_10_02_175937_add_auto_pump_up_to_users', 31),
(41, '2019_10_03_152131_add_lat_and_lang_to_states', 32),
(42, '2019_10_04_183302_create_reports_table', 33),
(43, '2019_10_07_182411_add_counter_to_media', 34),
(44, '2019_10_11_103142_create_notification_table', 35),
(45, '2019_10_11_143802_add_notification_type_to_notification', 36),
(46, '2019_10_11_160836_add_status_to_report', 37),
(47, '2019_10_14_125516_add_amount_to_media', 38),
(48, '2019_10_14_165841_create_photo_unlock_table', 39),
(49, '2019_10_16_173453_add_user_percentage_and_photo_expire_to_admin', 40),
(50, '2019_10_17_144439_add_photo_user_id_and_user_amount_to_photo_unlock', 41),
(51, '2019_10_17_152552_add_like_to_media', 42),
(52, '2019_10_17_165009_add_unlock_id_to_transation', 43),
(53, '2019_10_17_191621_create_block_user_table', 44),
(54, '2019_10_18_114023_add_admin_approval_to_media', 45),
(55, '2019_10_18_120233_create_notice_table', 46),
(56, '2019_10_19_163334_create_notice_send_table', 47),
(57, '2019_10_21_114254_create_boys_testimonial_table', 48),
(58, '2019_10_21_182427_add_image_to_admin', 49),
(59, '2019_10_22_105605_add_report_txt_to_admin', 50),
(60, '2019_10_22_124022_add_live_verification_to_admin', 51);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `message`, `created_at`, `updated_at`) VALUES
(5, 'Hello, Please note that from today onward all the account will be inactive....', '2019-10-21 15:18:05', '2019-10-21 15:18:05'),
(3, 'Hello people what is going on....', '2019-10-18 14:39:10', '2019-10-18 14:39:10'),
(4, 'dee', '2019-10-19 09:49:16', '2019-10-19 09:49:16'),
(6, 'Hello, Please note that from today onward all the account will be inactive....111', '2019-10-21 15:18:50', '2019-10-21 15:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `notice_send`
--

DROP TABLE IF EXISTS `notice_send`;
CREATE TABLE IF NOT EXISTS `notice_send` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `notice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_send`
--

INSERT INTO `notice_send` (`id`, `notice_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(31, '3', '24', 1, '2019-10-21 15:10:23', '2019-10-21 15:10:57'),
(30, '3', '25', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(29, '3', '18', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(28, '3', '17', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(27, '3', '11', 1, '2019-10-21 15:10:23', '2019-10-22 11:10:40'),
(26, '3', '10', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(25, '3', '9', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(24, '3', '8', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(23, '3', '7', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(22, '3', '6', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(21, '3', '5', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(20, '3', '4', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(19, '3', '3', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(18, '3', '2', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(17, '3', '1', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(32, '3', '27', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(33, '3', '29', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(34, '3', '28', 0, '2019-10-21 15:10:23', '2019-10-21 15:10:23'),
(35, '4', '1', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(36, '4', '2', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(37, '4', '3', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(38, '4', '4', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(39, '4', '5', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(40, '4', '6', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(41, '4', '7', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(42, '4', '8', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(43, '4', '9', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(44, '4', '10', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(45, '4', '11', 1, '2019-10-21 15:17:19', '2019-10-22 11:10:45'),
(46, '4', '17', 1, '2019-10-21 15:17:19', '2019-10-22 13:42:35'),
(47, '4', '18', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(48, '4', '25', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(49, '4', '24', 1, '2019-10-21 15:17:19', '2019-10-21 15:17:36'),
(50, '4', '27', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(51, '4', '29', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(52, '4', '28', 0, '2019-10-21 15:17:19', '2019-10-21 15:17:19'),
(53, '5', '1', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(54, '5', '2', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(55, '5', '3', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(56, '5', '4', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(57, '5', '5', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(58, '5', '6', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(59, '5', '7', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(60, '5', '8', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(61, '5', '9', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(62, '5', '10', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(63, '5', '11', 11, '2019-10-21 15:18:13', '2019-10-22 05:15:00'),
(64, '5', '17', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(65, '5', '18', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(66, '5', '25', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(67, '5', '24', 1, '2019-10-21 15:18:13', '2019-10-21 23:17:35'),
(68, '5', '27', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(69, '5', '29', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(70, '5', '28', 0, '2019-10-21 15:18:13', '2019-10-21 15:18:13'),
(71, '6', '1', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(72, '6', '2', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(73, '6', '3', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(74, '6', '4', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(75, '6', '5', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(76, '6', '6', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(77, '6', '7', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(78, '6', '8', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(79, '6', '9', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(80, '6', '10', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(81, '6', '11', 11, '2019-10-21 15:18:59', '2019-10-22 05:15:49'),
(82, '6', '17', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(83, '6', '18', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(84, '6', '25', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(85, '6', '24', 1, '2019-10-21 15:18:59', '2019-10-21 23:17:32'),
(86, '6', '27', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(87, '6', '29', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59'),
(88, '6', '28', 0, '2019-10-21 15:18:59', '2019-10-21 15:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reciever_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('User','Admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `notification_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `sender_id`, `reciever_id`, `title`, `message`, `link`, `type`, `notification_type`, `status`, `created_at`, `updated_at`) VALUES
(1, '11', '0', 'Verification Request', 'George Tesla is requested for verification', 'admin/view_advertise_profile/11', 'Admin', 'Verification', 1, '2019-10-11 09:17:02', '2019-10-11 09:45:14'),
(2, '20', '0', 'Verification Request', 'test1 test is requested for verification', 'admin/view_advertise_profile/20', 'Admin', 'Verification', 1, '2019-10-13 12:13:08', '2019-10-13 12:13:19'),
(3, '29', '0', 'Verification Request', 'Melody Wilson is requested for verification', 'admin/view_advertise_profile/29', 'Admin', 'Verification', 1, '2019-10-21 08:20:48', '2019-10-21 08:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `amount`, `bonus`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Sliver', '50', '10', NULL, NULL, NULL),
(3, 'Bronzee', '100', '25', NULL, NULL, NULL),
(4, 'Gold', '150', '45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_unlock`
--

DROP TABLE IF EXISTS `photo_unlock`;
CREATE TABLE IF NOT EXISTS `photo_unlock` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_unlock`
--

INSERT INTO `photo_unlock` (`id`, `photo_id`, `user_id`, `email`, `amount`, `link`, `expiry_date`, `txn_id`, `payment_status`, `created_at`, `updated_at`, `photo_user_id`, `user_amount`, `user_percentage`) VALUES
(1, '75', NULL, 'pankaj.laabhaa@gmail.com', '2', '04_10_49_PM1571301749-profile.jpg', '2019-10-27 16:10', '0UU828563W619083F', 'Completed', '2019-10-17 10:39:56', '2019-10-17 11:41:10', '11', '1.06', '53'),
(2, '75', '11', 'pankaj.laabhaa1@gmail.com', '2', '07_09_16_PM1571301749-profile.jpg', '2019-10-27 19:09', '0SG95673H55267125', 'Completed', '2019-10-17 13:38:28', '2019-10-21 15:19:33', '11', '1.06', '53'),
(3, '57', NULL, 'laabhaatechnologies@gmail.com', '10', '03_08_04_PM1570257843-tail2.jpeg', '2019-10-29 15:08', '27968655H8305733D', 'Completed', '2019-10-19 09:37:31', '2019-10-19 09:41:10', '11', '5.3', '53'),
(4, '7', '24', 'justjap@mail.com', '10', NULL, NULL, NULL, 'Pending', '2019-10-20 12:34:26', '2019-10-20 12:34:26', '17', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `name`, `email`, `title`, `report`, `status`, `ip`, `device_address`, `created_at`, `updated_at`) VALUES
(1, '11', 'George Tesla', 'pankaj.laabhaa@gmail.com', 'Fake Profile', 'fdsfsdf', 0, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-11 10:10:48', '2019-10-19 09:26:32'),
(2, '25', 'Lucy Kento', 'pankaj.laabhaa@gmail.com', 'Technical Issue', 'hjkjhjkkhjhjkjkhhjk', 0, '193.115.84.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 14:44:41', '2019-10-19 09:26:28'),
(3, NULL, 'Anwar', 'anwer_nadir2006@hotmail.com', 'Fake Profile', 'Anwar is fake,', 1, '193.115.84.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', '2019-10-18 14:46:30', '2019-10-19 12:08:02'),
(4, '11', 'George Tesla', 'pankaj.laabhaa1@gmail.com', 'Technical Issue', 'dfdsgdfghfh', 1, '116.206.148.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-19 09:24:13', '2019-10-19 10:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`) VALUES
(5, 'HangOut', '2019-09-12 09:06:22', '2019-09-12 09:06:22'),
(2, 'Chating', '2019-09-11 05:10:57', '2019-09-11 05:10:57'),
(3, 'Video Calling', '2019-09-11 05:21:48', '2019-09-11 05:21:48'),
(4, 'Voice calling', '2019-09-11 05:23:19', '2019-09-11 05:23:19'),
(6, 'Coffe', '2019-09-18 03:23:03', '2019-09-18 03:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-21.0827296',
  `lang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '95.3874376',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `short_name`, `created_at`, `updated_at`, `lat`, `lang`) VALUES
(1, 'South Australia', 'SA', '2019-09-17 23:26:16', '2019-09-18 07:22:06', '-31.7273532', '125.9895605'),
(2, 'Queensland', 'QLD', '2019-09-17 23:27:32', '2019-09-17 23:27:32', '-21.1355002', '137.5998301'),
(3, 'New South Wales', 'NSW', '2019-09-17 23:27:50', '2019-09-17 23:27:50', '-16.243569', '128.891088'),
(4, 'Tasmania', 'TAS', '2019-09-17 23:28:07', '2019-09-17 23:28:07', '-41.6159308', '144.7828774'),
(5, 'Victoria', 'VIC', '2019-09-17 23:28:20', '2019-09-17 23:28:20', '-36.0154218', '140.4115695'),
(6, 'Western Australia', 'WA', '2019-09-17 23:28:36', '2019-09-17 23:28:36', '-24.9744101', '111.8524098');

-- --------------------------------------------------------

--
-- Table structure for table `transation`
--

DROP TABLE IF EXISTS `transation`;
CREATE TABLE IF NOT EXISTS `transation` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unlock_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cr',
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wallet',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transation`
--

INSERT INTO `transation` (`id`, `user_id`, `order_id`, `amount`, `discount`, `package_id`, `unlock_id`, `type`, `txn_id`, `payment`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(1, '17', 'PIC-000001', '50', '10', '2', NULL, 'Wallet', '1S849969XF0165204', 'cr', 'Paypal', 'Completed', '2019-09-28 06:38:36', '2019-09-28 06:39:19'),
(2, '17', 'PIC-000002', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-09-28 06:39:37', '2019-09-28 06:39:37'),
(3, '17', 'PIC-000003', '0.05', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-09-28 06:39:43', '2019-09-28 06:39:43'),
(4, '17', 'PIC-000004', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-09-28 06:46:26', '2019-09-28 06:46:26'),
(5, '11', 'PIC-000005', '10', NULL, '0', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-09-28 14:02:21', '2019-09-28 14:02:21'),
(6, '18', 'PIC-000006', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-09-30 11:03:19', '2019-09-30 11:03:19'),
(7, '11', 'PIC-000007', '50', '10', '2', NULL, 'Wallet', '35H86718DN713902J', 'cr', 'Paypal', 'Completed', '2019-10-01 12:00:36', '2019-10-01 12:01:33'),
(8, '11', 'PIC-000008', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 06:02:25', '2019-10-02 06:02:25'),
(9, '11', 'PIC-000009', '0.05', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 06:02:46', '2019-10-02 06:02:46'),
(10, '11', 'PIC-000010', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 06:07:57', '2019-10-02 06:07:57'),
(11, '11', 'PIC-000011', '10', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 06:09:42', '2019-10-02 06:09:42'),
(12, '17', 'PIC-000012', '0.5', NULL, NULL, NULL, 'Admin', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-02 06:26:14', '2019-10-02 06:26:14'),
(13, '17', 'PIC-000013', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 12:13:32', '2019-10-02 12:13:32'),
(14, '11', 'PIC-000014', '0.05', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 12:21:42', '2019-10-02 12:21:42'),
(15, '11', 'PIC-000015', '0.1', NULL, '0', NULL, 'Wallet', '9U358681HU9814217', 'cr', 'Paypal', 'Pending', '2019-10-02 12:57:37', '2019-10-02 12:58:24'),
(16, '11', 'PIC-000016', '10.1', NULL, '0', NULL, 'Wallet', '9G7164998M272911W', 'cr', 'Paypal', 'Pending', '2019-10-02 12:59:06', '2019-10-02 12:59:34'),
(17, '11', 'PIC-000017', '10.01', NULL, '0', NULL, 'Wallet', '5BN087117S7060130', 'cr', 'Paypal', 'Completed', '2019-10-02 13:05:04', '2019-10-02 13:07:27'),
(18, '11', 'PIC-000018', '0.05', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 13:52:49', '2019-10-02 13:52:49'),
(19, '11', 'PIC-000019', '0.05', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-02 13:52:49', '2019-10-02 13:52:49'),
(50, '11', 'PIC-000020', '10', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-04 12:49:41', '2019-10-04 12:49:41'),
(51, '12', 'PIC-000021', '150', '45', '4', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-04 13:13:50', '2019-10-04 13:13:50'),
(52, '12', 'PIC-000022', '150', '45', '4', NULL, 'Wallet', '2P782875XY949360G', 'cr', 'Paypal', 'Completed', '2019-10-04 13:40:05', '2019-10-04 13:41:10'),
(53, '12', 'PIC-000023', '0.05', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-04 14:16:41', '2019-10-04 14:16:41'),
(54, '17', 'PIC-000024', '10', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-05 10:25:47', '2019-10-05 10:25:47'),
(55, '11', 'PIC-000025', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-05 12:38:15', '2019-10-05 12:38:15'),
(56, '11', 'PIC-000026', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-07 12:13:19', '2019-10-07 12:13:19'),
(57, '11', 'PIC-000027', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-09 06:21:05', '2019-10-09 06:21:05'),
(58, '12', 'PIC-000028', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-10 10:40:19', '2019-10-10 10:40:19'),
(59, '19', 'PIC-000029', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-10 11:33:59', '2019-10-10 11:33:59'),
(60, '11', 'PIC-000030', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-11 10:00:19', '2019-10-11 10:00:19'),
(61, '8', 'PIC-000031', '50', '10', '2', NULL, 'Wallet', '3XX21295KR124313A', 'cr', 'Paypal', 'Completed', '2019-10-11 11:37:47', '2019-10-11 11:38:36'),
(62, '19', 'PIC-000032', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-11 11:56:31', '2019-10-11 11:56:31'),
(63, '19', 'PIC-000033', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-11 11:56:32', '2019-10-11 11:56:32'),
(64, '19', 'PIC-000034', '100', '25', '3', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-11 11:59:26', '2019-10-11 11:59:26'),
(65, '19', 'PIC-000035', '55', NULL, NULL, NULL, 'Admin', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-11 12:05:06', '2019-10-11 12:05:06'),
(66, '11', 'PIC-000036', '10', NULL, '0', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-11 12:41:27', '2019-10-11 12:41:27'),
(67, '11', 'PIC-000037', '10', NULL, '0', NULL, 'Wallet', '7BA07064F1638624L', 'cr', 'Paypal', 'Completed', '2019-10-11 12:44:21', '2019-10-11 12:45:01'),
(68, '11', 'PIC-000038', '10', NULL, '0', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-11 12:45:10', '2019-10-11 12:45:10'),
(69, '11', 'PIC-000039', '50', '10', '2', NULL, 'Wallet', '0R52120481194260P', 'cr', 'Paypal', 'Completed', '2019-10-11 12:55:08', '2019-10-11 12:55:45'),
(70, '19', 'PIC-000040', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 11:03:55', '2019-10-13 11:03:55'),
(71, '19', 'PIC-000041', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 11:25:16', '2019-10-13 11:25:16'),
(72, '20', 'PIC-000042', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 12:14:12', '2019-10-13 12:14:12'),
(73, '21', 'PIC-000043', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 12:18:05', '2019-10-13 12:18:05'),
(74, '22', 'PIC-000044', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 12:21:21', '2019-10-13 12:21:21'),
(75, '23', 'PIC-000045', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 12:23:36', '2019-10-13 12:23:36'),
(76, '24', 'PIC-000046', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-13 12:26:11', '2019-10-13 12:26:11'),
(77, '24', 'PIC-000047', '11', NULL, NULL, NULL, 'Admin', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-14 12:39:43', '2019-10-14 12:39:43'),
(78, '24', 'PIC-000048', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-14 12:40:02', '2019-10-14 12:40:02'),
(79, '24', 'PIC-000049', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-14 12:44:30', '2019-10-14 12:44:30'),
(80, '11', 'PIC-000050', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-14 12:59:02', '2019-10-14 12:59:02'),
(81, '11', 'PIC-000051', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-14 13:29:10', '2019-10-14 13:29:10'),
(82, '17', 'PIC-000052', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 09:05:58', '2019-10-15 09:05:58'),
(83, '17', 'PIC-000053', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 09:06:08', '2019-10-15 09:06:08'),
(84, '17', 'PIC-000054', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 09:10:37', '2019-10-15 09:10:37'),
(85, '17', 'PIC-000055', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 09:14:02', '2019-10-15 09:14:02'),
(86, '17', 'PIC-000056', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 10:57:13', '2019-10-15 10:57:13'),
(87, '25', 'PIC-000057', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 11:54:27', '2019-10-15 11:54:27'),
(88, '25', 'PIC-000058', '50', '10', '2', NULL, 'Wallet', '9YF19473DH426342X', 'cr', 'Paypal', 'Pending', '2019-10-15 11:55:08', '2019-10-15 11:55:47'),
(89, '25', 'PIC-000059', '50', '10', '2', NULL, 'Wallet', '3TA996200T965334E', 'cr', 'Paypal', 'Pending', '2019-10-15 12:02:25', '2019-10-15 12:02:50'),
(90, '25', 'PIC-000060', '50', '10', '2', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-15 12:10:09', '2019-10-15 12:10:09'),
(91, '25', 'PIC-000061', '50', '10', '2', NULL, 'Wallet', '6E026060WA954403H', 'cr', 'Paypal', 'Completed', '2019-10-15 12:11:42', '2019-10-15 12:12:17'),
(92, '25', 'PIC-000062', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-15 12:15:10', '2019-10-15 12:15:10'),
(93, '24', 'PIC-000063', '100', NULL, NULL, NULL, 'Admin', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-16 07:55:53', '2019-10-16 07:55:53'),
(94, '24', 'PIC-000064', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-16 07:56:10', '2019-10-16 07:56:10'),
(95, '24', 'PIC-000065', '150', '45', '4', NULL, 'Wallet', '20G86617RY5924328', 'cr', 'Paypal', 'Completed', '2019-10-16 11:09:06', '2019-10-16 11:10:10'),
(96, '11', 'PIC-000066', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-17 05:11:15', '2019-10-17 05:11:15'),
(97, '11', 'PIC-000067', '1.06', NULL, NULL, '1', 'Photo', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-17 11:41:10', '2019-10-17 11:41:10'),
(98, '11', 'PIC-000068', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-17 13:41:50', '2019-10-17 13:41:50'),
(99, '24', 'PIC-000069', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-18 06:52:56', '2019-10-18 06:52:56'),
(100, '24', 'PIC-000070', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-19 02:45:16', '2019-10-19 02:45:16'),
(101, '3', 'PIC-000071', '0', NULL, '0', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-19 09:32:45', '2019-10-19 09:32:45'),
(102, '3', 'PIC-000072', '10', NULL, '0', NULL, 'Wallet', '03044876J8981170G', 'cr', 'Paypal', 'Completed', '2019-10-19 09:33:10', '2019-10-19 09:34:19'),
(103, '11', 'PIC-000073', '5.3', NULL, NULL, '3', 'Photo', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-19 09:41:10', '2019-10-19 09:41:10'),
(104, '28', 'PIC-000074', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-20 13:00:05', '2019-10-20 13:00:05'),
(105, '27', 'PIC-000075', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-20 13:09:01', '2019-10-20 13:09:01'),
(106, '24', 'PIC-000076', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 08:06:09', '2019-10-21 08:06:09'),
(107, '29', 'PIC-000077', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 08:19:45', '2019-10-21 08:19:45'),
(108, '29', 'PIC-000078', '50', NULL, NULL, NULL, 'Admin', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-21 08:23:13', '2019-10-21 08:23:13'),
(109, '29', 'PIC-000079', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 08:23:35', '2019-10-21 08:23:35'),
(110, '29', 'PIC-000080', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 08:23:42', '2019-10-21 08:23:42'),
(111, '11', 'PIC-000081', '50', '10', '2', NULL, 'Wallet', '1EX5273393426051P', 'cr', 'Paypal', 'Completed', '2019-10-21 09:52:33', '2019-10-21 09:53:26'),
(112, '11', 'PIC-000082', '1', NULL, NULL, NULL, 'BumpUp', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 09:54:46', '2019-10-21 09:54:46'),
(113, '11', 'PIC-000083', '0', NULL, '0', NULL, 'Wallet', NULL, 'cr', 'Paypal', 'Pending', '2019-10-21 13:40:49', '2019-10-21 13:40:49'),
(114, '11', 'PIC-000084', '1.06', NULL, NULL, '2', 'Photo', NULL, 'Cr', 'Wallet', 'Completed', '2019-10-21 15:19:33', '2019-10-21 15:19:33'),
(115, '31', 'PIC-000085', '0', NULL, NULL, NULL, 'Live', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 15:24:22', '2019-10-21 15:24:22'),
(116, '31', 'PIC-000086', '50', '10', '2', NULL, 'Wallet', '05C0981871310543Y', 'cr', 'Paypal', 'Completed', '2019-10-21 15:25:08', '2019-10-21 15:25:46'),
(117, '31', 'PIC-000087', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-21 15:26:18', '2019-10-21 15:26:18'),
(118, '11', 'PIC-000088', '10', NULL, NULL, NULL, 'Feature', NULL, 'Dr', 'Wallet', 'Completed', '2019-10-22 12:59:16', '2019-10-22 12:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` float DEFAULT NULL,
  `lang` float DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_method` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `damage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'noimage.jpg',
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci,
  `type` enum('Advertise','Browser') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Browser',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification` tinyint(4) NOT NULL DEFAULT '0',
  `account_verification` tinyint(4) NOT NULL DEFAULT '0',
  `online` tinyint(4) NOT NULL DEFAULT '1',
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `live_status` enum('OFF','ON','Pause') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OFF',
  `live_expiry` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_counter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `feature_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bump_up` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `auto_pump_up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `address`, `lat`, `lang`, `ip`, `device_address`, `state`, `contact_method`, `mobile_no`, `height`, `whatsapp_no`, `city`, `damage`, `age`, `start_work`, `end_work`, `image`, `services`, `about_me`, `type`, `email_verified_at`, `email_verification`, `account_verification`, `online`, `wallet`, `remember_token`, `created_at`, `updated_at`, `live_status`, `live_expiry`, `mobile_counter`, `feature_profile`, `bump_up`, `auto_pump_up`) VALUES
(1, 'Test', 'profile', 'pankaj.laabhaa2@gmail.com', '$2y$10$iu/VTdK0WzxeMnv8NRyWM./hypNqx9IpeC95TooyPMgMzVfVOEIkq', 'Indooroopilly Shopping Centre, Moggill Road, Indooroopilly SA, Australia', -33.8889, 151.125, '116.206.148.54', NULL, 'SA', '8456789564', '4564456445', NULL, '8456784526', 'Bhopal', '0', '28', '{\"mon\":\"12 : 09 PM\",\"tue\":\"4 : 12 PM\",\"wed\":\"4 : 15 PM\",\"thu\":\"2 : 15 PM\",\"fri\":\"1 : 15 PM\",\"sat\":\"1 : 15 PM\",\"sun\":\"4 : 12 PM\"}', '{\"mon\":\"1 : 15 PM\",\"tue\":\"1 : 15 PM\",\"wed\":\"1 : 15 PM\",\"thu\":\"1 : 15 PM\",\"fri\":\"1 : 15 PM\",\"sat\":\"1 : 15 PM\",\"sun\":\"1 : 15 PM\"}', '1569414454-1568876794-user-05.jpg', '5,2,3,4', '<p>😰😘😘😘😙😌😴😯😗😗sadjasdjsahdsadas</p>', 'Advertise', NULL, 1, 1, 0, '0', '', '2019-09-11 03:14:02', '2019-10-23 05:44:53', 'OFF', '2019-10-17 09:29', '3', NULL, '0', '0'),
(2, 'Testing1', 'Profile', 'lokesh.laabhaa@gmail.com', '$2y$10$g/7OuNe0FxO5eBiaHPWtcuxEzlaYzLpkioDIGLbpo.fjIXddX7y7u', 'Indore,OLD, India', 22.7196, 75.8577, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.96 Safari/537.36', 'QLD', NULL, '145612451', NULL, '8457965895', 'Indore', '0', '28', '{\"mon\":\"10:02\",\"tue\":\"12:00\",\"wed\":null,\"thu\":\"04:05\",\"fri\":\"05:00\",\"sat\":\"10:00\",\"sun\":\"11:00\"}', '{\"mon\":\"10:12\",\"tue\":\"12:05\",\"wed\":\"05:00\",\"thu\":\"04:56\",\"fri\":\"12:00\",\"sat\":\"18:00\",\"sun\":\"17:00\"}', '1570863514YccsGHSIpB-user.png', '2,4', '<pre style=\"text-align: center; \"><b>This is test about me&nbsp;</b></pre><h3 style=\"text-align: center; \"><b><u>This is test about me&nbsp;</u></b></h3>', 'Advertise', NULL, 1, 1, 1, '0', 'GNgzGVQCdJGEs2n9UAa0mMMmGQlKUsmwW9f00v3isDHXbt9efgArA4kTQXxX', '2019-09-11 07:10:08', '2019-10-23 05:44:53', 'Pause', '2019-10-19 05:03', '0', NULL, '0', '0'),
(3, 'jiniii', 'jams', 'vikas.laabhaa@gmail.com', '$2y$10$7lVtaxdNEbRd7S5BAnkAu.YUmkbqriwQV6VwXncZu2bC7f0RqF8eu', 'Indore Railway Station, Nehru Park Road, Vallabh Nagar, Indore, Madhya Pradesh, India', 22.7172, 75.8684, '116.206.148.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, NULL, '7058956874', NULL, NULL, NULL, '0', '21', NULL, NULL, '1571388717HVm0zMEKCF-user.png', NULL, NULL, 'Browser', NULL, 1, 1, 1, '10', '3BbHVO3WQgSQMxl7ZeAxCDN7cOTmss29uoCj2QTG8En0D5C2oT1WPyz8eB2D', '2019-09-11 08:21:24', '2019-10-21 09:58:52', 'OFF', NULL, '0', NULL, '0', '0'),
(4, 'leo', 'jams', 'deepika.laabhaa1@gmail.com', '$2y$10$zQn03rxsBDRzn9TBnmPE/Ox2inJTRbiLJfZPk4.PBSdfDphoFLjyO', 'India Gate, New Delhi, Delhi, India', 28.6111, 77.2345, '116.206.148.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, '0', '29', NULL, NULL, 'noimage.jpg', NULL, NULL, 'Browser', NULL, 1, 1, 1, '0', 'NCd70grkbBZDpt4MC12vkRncxa2C6VMYGEpj9D5CaaEI5h2fQYKoHUnLuj04', '2019-09-11 08:23:11', '2019-09-19 06:52:38', 'OFF', NULL, '0', NULL, '0', '0'),
(5, 'Georgia', 'Smith', 'georgiiasmith@gmail.com', '$2y$10$7GVtlKtp7JBfPI7xgWKGlu6ze2B3QDT3T5FqNfu70bfDQN4fwSlNu', 'Indira Gandhi International Airport (DEL),NSW, Delhi, India', 28.5562, 77.1, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.96 Safari/537.36', 'NSW', NULL, NULL, NULL, '8457965895', 'Indore', '0', '28', '{\"mon\":\"11:00\",\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":\"18:00\",\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1569414524-1568289847-kayla1.png', '5,2,3,4', '<p style=\"font-size: 16px; float: left; letter-spacing: 0.2px;\"><span style=\"font-size: 14px; font-weight: 700;\"><br class=\"Apple-interchange-newline\"><br class=\"Apple-interchange-newline\">This is a dummy paragraph for display purposes only.</span><br><br>This is a dummy paragraph for display purposes only.This is a dummy paragraph for display purposes only.This is a dummy paragraph for display purposes only.This is</p><p class=\"p_bold\" style=\"font-size: 16px; float: left; letter-spacing: 0.2px;\">dummy paragraph for display purposes only.&nbsp;<img src=\"http://laabhaa.co.in/Projects/pickadova.com/public/images/smile.png\" style=\"margin-left: 35px; width: 70px;\"></p>', 'Advertise', NULL, 1, 1, 1, '0', 'FyYZnTrSvc833FAtMU7OYw0t0t2r75IWptaLmjGhEemwHUQJ6ZcwncPwdZj0', '2019-09-12 06:19:21', '2019-09-25 06:58:44', 'OFF', NULL, '0', NULL, '0', '0'),
(6, 'Kalya', 'Smith', 'kalyasmith@gmail.com', '$2y$10$fxbZgf.w2WRnhRI2lfxd4uRJTNeSHMkMPAHqGsPNeFtHLmCvVL5L6', 'Bombay,TAS, India', 19.076, 72.8777, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.96 Safari/537.36', 'TAS', NULL, NULL, NULL, '8456952635', 'Bombay', '0', '25', '{\"mon\":\"05:05\",\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":\"23:55\",\"sun\":null}', '{\"mon\":\"05:05\",\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":\"02:55\",\"sun\":null}', '1569414545-1568293967-cate_1.jpg', '2,3,4', '<p>Its all about&nbsp; me</p><p><br></p>', 'Advertise', NULL, 1, 1, 1, '0', '841614', '2019-09-12 06:43:51', '2019-09-25 21:45:09', 'OFF', NULL, '1', NULL, '0', '0'),
(7, 'Ann', 'Anna', 'anwer_nadir2005@hotmail.com', '$2y$10$IrzSFoEHBXVU1EvwSTqU/uYlAPPT.1EJWnqAL/Y17SLYrKFVJsCse', 'Adelaide, 3rd Main Road, Chamrajpet, Bengaluru, Karnataka, India', 12.9587, 77.5657, '193.115.71.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, '0', '22', NULL, NULL, 'noimage.jpg', NULL, NULL, 'Browser', NULL, 0, 1, 1, '0', '', '2019-09-12 09:01:38', '2019-10-21 15:20:47', 'OFF', NULL, '0', NULL, '0', '0'),
(8, 'kiya', 'jams', 'laabhaa@gmail.com', '$2y$10$hI6kXk8FrrrTeDRRzdYu6uvGaH75G44Ta5bdQL3y.ZggOQmpT.s.y', 'Udaipur, Rajasthan, India', 24.5854, 73.7125, '116.206.148.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, '0', '25', NULL, NULL, '1570856669hzyEf67lJ8-user.png', NULL, NULL, 'Browser', NULL, 1, 0, 1, '60', 'zPv6TOW86pLYjXXCXx8vkjzOxLLJ8ORbaS3Wo5AEa9JHk3k7QEUmT96gSBcs', '2019-09-17 06:48:53', '2019-10-12 05:04:29', 'OFF', NULL, '0', NULL, '0', '0'),
(9, 'john', 'marsh', 'ruchi.laabhaa@gmail.com', '$2y$10$NV4yZ1NF1GVQmByJ6NZcmuAViVUqHKVbunGWAybfjCCW6LjlQfFMS', 'Delhi, India', 28.6863, 77.2218, '116.206.148.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, 'noimage.jpg', NULL, NULL, 'Browser', NULL, 1, 1, 1, '0', '636148', '2019-09-17 06:57:04', '2019-09-21 23:11:01', 'OFF', NULL, '0', NULL, '0', '0'),
(10, 'jiniii123', 'jams', 'nikita.laabhaa@gmail.com', '$2y$10$aBvIZglUl9/SM3B3OGX8u.kyCz2I.JPvOVjrXmvTil3IQURA73E8e', 'Indore,VIC, India', 22.7196, 75.8577, '116.206.148.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'VIC', '4543545', '9109285994', NULL, '35435435', 'indore', '0', '25', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', 'noimage.jpg', '5,2,3,4', '<p>hfghg</p>', 'Advertise', NULL, 1, 1, 1, '0', 'RhEcZfMruZ2WSXTdzyD1GjfWSUzOlYQwYfFMdHmjSd59R6mIgCSg4LM49hW5', '2019-09-17 07:01:02', '2019-10-23 05:44:53', 'OFF', '2019-10-11 13:20', '0', '2019-09-27 11:27:53', '0', '0'),
(11, 'George', 'Tesla', 'pankaj.laabhaa1@gmail.com', '$2y$10$zQn03rxsBDRzn9TBnmPE/Ox2inJTRbiLJfZPk4.PBSdfDphoFLjyO', 'Perth WA, Australia', -31.9505, 115.86, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36', 'WA', 'Call & Text', '4578965895', '5.8', NULL, 'Oakleigh South', '94', '18', '{\"mon\":\"3 : 08 AM\",\"tue\":\"12 : 13 PM\",\"wed\":\"3 : 13 PM\",\"thu\":null,\"fri\":null,\"sat\":\"2 : 13 PM\",\"sun\":\"2 : 13 PM\"}', '{\"mon\":\"3 : 08 AM\",\"tue\":\"10 : 13 PM\",\"wed\":\"5 : 13 PM\",\"thu\":null,\"fri\":null,\"sat\":\"3 : 13 PM\",\"sun\":\"5 : 13 PM\"}', '1570862876uV5GcPp4GT-user.png', '2,3,4', '<p>😲😰😰😬😭fdsfdsfds😬😪<br></p>', 'Advertise', NULL, 1, 1, 0, '117.06', 'Wm9VE8ctV3xAcPeGPENUPIAK0NyR56qUBlVqhWBrdw7PqEqMNTap8ira7tgK', '2019-09-18 08:29:54', '2019-10-23 05:05:03', 'ON', '2019-11-13 18:59', '5', '2019-10-23 18:29:16', '2019-10-21 15:24:46', '0'),
(12, 'Test', 'Tsss', 'anwer_nadir2007@hotmail.com', '$2y$10$uL42ucO.e3fWn9ybOniqCOehXq2asdOne0/tcicfjxRQHUmMpI7yO', 'Sydney NSW, Australia', -33.8688, 151.209, '58.106.99.31', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', 'NSW', NULL, '04111111544', NULL, NULL, 'Holden Hill', '100', '35', '{\"mon\":\"4 : 05 PM\",\"tue\":\"4 : 05 PM\",\"wed\":\"4 : 05 PM\",\"thu\":\"4 : 05 PM\",\"fri\":\"4 : 05 PM\",\"sat\":\"4 : 05 PM\",\"sun\":\"4 : 05 PM\"}', '{\"mon\":\"4 : 05 PM\",\"tue\":\"4 : 05 PM\",\"wed\":\"4 : 05 PM\",\"thu\":\"4 : 05 PM\",\"fri\":\"4 : 05 PM\",\"sat\":\"4 : 05 PM\",\"sun\":\"4 : 05 PM\"}', '1569414621-1568961405-007_large.png', '5,2,4', '<p>😘😘😘😘😘😘<b>Hello People</b></p>', 'Advertise', NULL, 0, 1, 1, '184.95', '687458', '2019-09-20 01:03:32', '2019-10-10 11:21:54', 'ON', '2019-10-27', '1', '2019-10-12 16:10:19', '2019-10-04 19:46:41', '1'),
(16, 'Test11', 'Test11', 'justjap12@gmail.com', '$2y$10$BFmKEB9gnpqB22/nEDCziuFpNpD5n4NKeK4.l87/wbHXa6NyhLZQ2', 'Pooraka SA, Australia', -34.8244, 138.627, '193.115.78.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, NULL, NULL, NULL, 'Pooraka', '0', NULL, NULL, NULL, 'noimage.jpg', NULL, NULL, 'Browser', NULL, 0, 1, 1, '0', '916996', '2019-09-21 23:38:14', '2019-09-21 23:53:14', 'OFF', NULL, '0', NULL, '0', '0'),
(17, 'Ema', 'Smith', 'rupesh.laabhaa@gmail.com', '$2y$10$hI6kXk8FrrrTeDRRzdYu6uvGaH75G44Ta5bdQL3y.ZggOQmpT.s.y', 'Indian Ocean Drive, Ledge Point WA, Australia', -31.0971, 115.41, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.75 Safari/537.36', 'WA', NULL, '8456789455', NULL, NULL, 'Ledge Point', '100', '28', '{\"mon\":\"5 : 28 PM\",\"tue\":\"5 : 28 PM\",\"wed\":\"5 : 28 PM\",\"thu\":\"5 : 28 PM\",\"fri\":\"5 : 28 PM\",\"sat\":\"5 : 28 PM\",\"sun\":\"5 : 28 PM\"}', '{\"mon\":\"5 : 28 PM\",\"tue\":\"5 : 28 PM\",\"wed\":\"5 : 28 PM\",\"thu\":\"5 : 28 PM\",\"fri\":\"5 : 28 PM\",\"sat\":\"5 : 28 PM\",\"sun\":\"5 : 28 PM\"}', '1569414644-1569331363-user2.jpg', '5,6', NULL, 'Advertise', NULL, 1, 1, 1, '17.70', 'YnJ321OAuYy03oYVsv9Yyw5YO815rMjZfzmntI3NPbcIeBRVXto0XLdoV4W4', '2019-09-24 07:45:54', '2019-10-16 07:46:30', 'ON', '2019-11-14 14:44', '5', '2019-10-16 14:36:08', '2019-10-15 16:27:13', '1'),
(18, 'Ong', 'Siyi', 'ongsiyi@gmail.com', '$2y$10$yVSas3hYOsAA/W2UK3WNsuQTpywaQZoXU7YWaFOLrE/LNHkALh83q', 'Bedford Park SA, Australia', -35.021, 138.568, '58.106.99.31', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '04112545455', NULL, NULL, 'Bedford Park', '150', '25', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', 'noimage.jpg', '5,2,3', NULL, 'Advertise', NULL, 1, 1, 1, '0', '795946', '2019-09-30 10:58:36', '2019-10-23 05:44:53', 'OFF', '2019-10-01 16:33', '0', NULL, '0', '0'),
(19, 'Anwar', 'aaa', 'justjap1@mail.com', '$2y$10$F59d9AYzOYhL78KGfRc.Renikj/q6qB3.6EDbk5B1GtHpyeQb0ba2', '4 Jacobsen Cre', -34.849, 138.671, '193.114.127.214', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '0883691899', NULL, NULL, 'Holden Hill', '500', '20', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1570966162z7lObJmt09-user.png', '2', NULL, 'Advertise', NULL, 0, 1, 1, '45', '037693', '2019-10-10 11:29:32', '2019-10-23 05:44:53', 'OFF', '2019-10-14 16:55', '7', '2019-10-15 16:33:55', '0', '0'),
(25, 'Lucy', 'Kento', 'pankaj.laabhaa@gmail.com', '$2y$10$Gg/hib/v1rRA.xquZWu0V.H41Ml65XQw3K9zF13FT9hE4eicQ083a', 'Tesselaar Tulip Festival, Monbulk Road, Silvan VIC, Australia', -37.845, 145.424, '116.206.148.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'VIC', NULL, '8452456985', NULL, NULL, 'Silvan', '100', '25', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', 'noimage.jpg', NULL, NULL, 'Advertise', NULL, 1, 0, 1, '50', 'M2eNLucn6xyUBzY5HV0Lws9PShd00oMwtJN6m4dVg3wfKKpLyfCJmDvLa9JX', '2019-10-15 11:42:52', '2019-10-15 12:16:03', 'ON', '2019-11-14 17:24', '1', '2019-10-16 17:45:10', '0', '0'),
(20, 'test1', 'test', 'justjap2@mail.com', '$2y$10$RhmpnjC5RRVpskED.ycXYOpECLtkW.tvTHHP5ko3TaQya8eMgQq4G', 'Holden Hill SA, Australia', -34.849, 138.671, '220.244.20.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '04111', NULL, NULL, 'Holden Hill', '351', '22', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1570968652RfXjqRa7mP-user.png', '5,2', NULL, 'Advertise', NULL, 0, 1, 1, '0', 'ngOCPXA4VSPmjfyzBGYB0sNlsr2x0IMabiPlr6d3ZExmiefzoC9edBIXXNoG', '2019-10-13 12:09:57', '2019-10-13 12:15:11', 'ON', '2019-11-12 17:44', '0', NULL, '0', '0'),
(21, 'test2', 'test2', 'justjap3@mail.com', '$2y$10$wkONoP7w3zquzEwYAboOL.3fF6XZNSOwvJcn11LH1OyqVvrD.iBda', 'Elizabeth South SA, Australia', -34.7413, 138.656, '220.244.20.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '62330', NULL, NULL, 'Elizabeth South', '545', '55', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '15709690214vwjzHmDsp-user.png', NULL, NULL, 'Advertise', NULL, 0, 1, 1, '0', '7IxzlyuGpBl9MrM54kYuREgoJj0LJ9KIm0P2M2nVxoglnumZ0IISkzW3XF9d', '2019-10-13 12:15:50', '2019-10-13 12:18:40', 'ON', '2019-11-12 17:48', '0', NULL, '0', '0'),
(22, 'Test4', 'test', 'justjap4@mail.com', '$2y$10$gtyU/OMzKwz3ERf8cBhxBOxHN.9qu/e2m/kM.2TKwTKnncHE01KdW', 'Marion SA, Australia', -35, 138.552, '220.244.20.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '654654654', NULL, NULL, 'Marion', '150', '22', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1570969216r3akWzO8F6-user.png', NULL, NULL, 'Advertise', NULL, 0, 1, 1, '0', 'yw2fU6rUH84TIDta7WlfjP19PGRjKQnDPgwLG5G6Qhc3oIsnm98nCgAVJBBk', '2019-10-13 12:19:11', '2019-10-13 12:21:51', 'ON', '2019-11-12 17:51', '0', NULL, '0', '0'),
(23, 'ANDRE', 'ASS', 'justjap5@mail.com', '$2y$10$AG6gBYbLrQ9OuoRFPXo8JeFwWlcUOJVgWvSEfi1E0r/gmfSyisw/W', 'Marion SA, Australia', -35, 138.552, '220.244.20.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '654654654', NULL, NULL, 'Marion', '150', '22', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', 'noimage.jpg', NULL, NULL, 'Advertise', NULL, 0, 1, 1, '0', 'h5dBts9jl52JQaoYR70iVYoSb9XB829pXNg0rM57BQAMA96gr4Uf1sY74LiY', '2019-10-13 12:22:14', '2019-10-13 12:24:07', 'ON', '2019-11-12 17:53', '0', NULL, '0', '0'),
(24, 'FSDFSAAF', 'AFDS', 'justjap@mail.com', '$2y$10$ZKB64/1FAZpTtP4mvbat0.9vXWuun1lBshKzNgb549jf18zw333IK', 'Marion SA, Australia', -35, 138.552, '220.244.20.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '564654', NULL, NULL, 'Thebarton', '545', '55', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', 'noimage.jpg', '5,2', NULL, 'Advertise', NULL, 1, 1, 1, '264', 'XMPhRvUgHBVRZA2q6V9SVPpC0sXlwviUXxueUBeQ3shROkJ51aFC6TYny3Cm', '2019-10-13 12:24:28', '2019-10-21 09:43:32', 'ON', '2019-11-12 17:56', '2', '2019-10-22 13:36:09', '2019-10-19 08:15:16', '0'),
(26, 'Leeson', 'yang', 'galvtechtrailers1@gmail.com', '$2y$10$PBieyklZtTR79Wl34CrBuO55vgul1Be.Kf0OHMiVpgHiytE.SXlCi', 'Seacombe Road, Sturt SA, Australia', -35.0286, 138.553, '36.255.51.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, NULL, NULL, NULL, 'Sturt', NULL, NULL, NULL, NULL, 'noimage.jpg', NULL, NULL, 'Browser', NULL, 0, 0, 1, '0', '299357', '2019-10-17 14:24:14', '2019-10-21 08:10:33', 'OFF', NULL, '0', NULL, '0', '0'),
(27, 'tom', 'yang', 'briahi.logistic5@magnumx.site', '$2y$10$vPGvtrgFsXcEGB.jEETec.w2ZGL5LatsSvQnFeISlGzBTpvGtRK22', 'franklin', NULL, NULL, '36.255.51.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'TAS', NULL, '514545451', NULL, NULL, NULL, '5415', '13', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1571545182f7331kh7rc-user.png', NULL, '<p><span style=\"color: rgb(84, 84, 84); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: normal;\">Passage is an responsive WordPress theme built specifically for churches – with extended sermons, donations, and events management. It’s beautiful, clean and professional. We built this theme specifically for churches, and is flexible enough to use for lots projects. Passage includes easy to use live customizers and drag &amp; drop builders and is capable of handling a ton including staff members, sermons, catalogs, custom logins, selling stuff, blogs, filterable galleries, and almost anything that you can think up! We pride ourselves on how well this theme works out of the box, so if you run into any issues, please don’t hesitate to let us know at our dedicated support forum. Check out our feature list below!</span></p>', 'Advertise', NULL, 1, 0, 1, '0', 'VPoXJH8XiKALD87Vvo4PgRODpalWa9C1o04KYXGHFnCVxsxGdcqWbGELufWo', '2019-10-20 04:08:07', '2019-10-20 13:16:56', 'ON', '2019-11-19 18:39', '0', NULL, '0', '0'),
(29, 'Melody', 'Wilson', 'galvtechtrailers@gmail.com', '$2y$10$7XOnP4YSPJlTIJxqUxcLpOhCOJZ/wVQGiDcTXCi5JL6mE7msctmTi', 'Holden Hill SA, Australia', -34.849, 138.671, '45.124.203.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'SA', NULL, '0411445544', NULL, NULL, 'Holden Hill', '351', '20', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1571645880jaxQsqZEOF-user.png', '5,2', NULL, 'Advertise', NULL, 1, 0, 1, '39', '127953', '2019-10-21 08:11:36', '2019-10-21 15:30:02', 'ON', '2019-11-20 13:49', '1', '2019-10-22 13:53:35', '2019-10-21 13:53:42', '0'),
(28, 'lisa', 'lala', 'pri.ma@taucoindo.site', '$2y$10$ag.gCIePajz6NbY7eCo/SuQ7NhYJCX.UIBACEha5OKxd9EJMrPHwK', 'Woodville SA, Australia', -34.878, 138.538, '36.255.51.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'SA', NULL, '04125235887', NULL, NULL, 'Woodville', '500', '35', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', 'noimage.jpg', NULL, '<p><span style=\"color: rgb(84, 84, 84); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 16px; letter-spacing: normal;\">The Idea Behind This Theme We wanted to build something awesome that helps churches, staff members, and the people they serve. Something that would enhance the church experience for users, increase engagement and retention, decrease confusion, and that focused on the details of how this could work for that majority of church communities out there. So, with that in mind, we build Passage.</span></p>', 'Advertise', NULL, 1, 0, 1, '0', 'KStzkvuQLKPxDQMjlTdQYYvLFKtQTJecpX667sVF85NPvL84wDekLgcoB9F7', '2019-10-20 12:28:05', '2019-10-20 13:00:05', 'ON', '2019-11-19 18:30', '0', NULL, '0', '0'),
(30, 'Jessica', 'Grenn', 'anwer_nadir2004@hotmail.com', '$2y$10$c8NxujsPmQUElgCEzpKIPuEIExc7FwwWVj/pCLKuBIf/zSA071B7y', 'Henley Beach SA, Australia', -34.92, 138.494, '193.115.84.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'SA', NULL, NULL, NULL, NULL, 'Henley Beach', NULL, NULL, NULL, NULL, 'noimage.jpg', NULL, NULL, 'Browser', NULL, 0, 0, 1, '0', 'F1Sud9Zbt5GXBBr63ccGjDEHNm15O967WjxkU624gZHiaOevTtrqeoBtysag', '2019-10-21 15:21:24', '2019-10-21 15:22:20', 'OFF', NULL, '0', NULL, '0', '0'),
(31, 'Anwar', 'Greenn', 'anwer_nadir2006@hotmail.com', '$2y$10$ZWTDM8TKicW4rbge5l2H7elHya8Ah46O3ugTKpav4MdfnDe4dUbgO', '4 Jacobsen Cre', -34.92, 138.494, '193.115.84.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'SA', NULL, '0883691899', NULL, NULL, 'Henley Beach', '350', '22', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '{\"mon\":null,\"tue\":null,\"wed\":null,\"thu\":null,\"fri\":null,\"sat\":null,\"sun\":null}', '1571671476BW1j2UbFQa-user.png', NULL, NULL, 'Advertise', NULL, 1, 0, 1, '50', '9nXLCIohl1ReU50Od63y282SiN8dZwH70WRPLWmPUFQ8GEJO663gZJvj5fEm', '2019-10-21 15:22:40', '2019-10-21 15:45:39', 'Pause', '2019-11-20 20:54', '0', '2019-10-22 20:56:18', '0', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
