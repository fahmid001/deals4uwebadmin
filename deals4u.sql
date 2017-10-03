-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 06:39 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog_tbl`
--

CREATE TABLE IF NOT EXISTS `activitylog_tbl` (
  `id` int(11) NOT NULL,
  `client_ip` varchar(50) NOT NULL,
  `browser` varchar(150) NOT NULL,
  `mac_address` varchar(60) NOT NULL,
  `action_type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `address_details`
--

CREATE TABLE IF NOT EXISTS `address_details` (
  `id` int(11) NOT NULL,
  `ref_deals_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_details`
--

INSERT INTO `address_details` (`id`, `ref_deals_id`, `category_id`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 3),
(4, 4, 4),
(5, 5, 7),
(6, 6, 4),
(7, 7, 7),
(8, 7, 8),
(9, 7, 10),
(10, 8, 7),
(11, 8, 10),
(12, 8, 13),
(13, 9, 3),
(14, 9, 4),
(15, 10, 4),
(16, 10, 6),
(17, 10, 7),
(18, 11, 3),
(19, 12, 3),
(20, 13, 3),
(21, 14, 3),
(22, 14, 4),
(23, 14, 7),
(24, 15, 3),
(25, 15, 4),
(26, 16, 3),
(27, 16, 4),
(28, 17, 3),
(29, 17, 5),
(30, 18, 3),
(31, 18, 4),
(32, 18, 5),
(33, 19, 3),
(34, 19, 4),
(35, 20, 4),
(36, 20, 5),
(37, 20, 6),
(38, 21, 3),
(39, 21, 4),
(40, 22, 3),
(41, 23, 3),
(42, 23, 4),
(43, 24, 3),
(44, 24, 4),
(45, 24, 5),
(46, 25, 3),
(47, 25, 4),
(48, 26, 3),
(49, 26, 4),
(50, 27, 3),
(51, 27, 4),
(52, 27, 5);

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_user_tbl` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_tbl`
--

INSERT INTO `admin_user_tbl` (`id`, `full_name`, `email`, `password`, `date`) VALUES
(1, 'ICE Technologies', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `brand_address_tbl`
--

CREATE TABLE IF NOT EXISTS `brand_address_tbl` (
  `id` int(11) NOT NULL,
  `ref_dealinfo_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_address_tbl`
--

INSERT INTO `brand_address_tbl` (`id`, `ref_dealinfo_id`, `cat_id`, `address`, `lat`, `lng`, `date`) VALUES
(1, 1, NULL, 'Dhaka', 23.780943, 90.279373, '2017-04-20'),
(2, 2, NULL, 'Eves Center (4th, 6th and 7th Floor), House no A1/47, East Nasirabad, Chittagong- 4212.', 22.369295, 91.818413, '2017-04-20'),
(3, 3, NULL, 'Dhaka', 23.780943, 90.279373, '2017-04-20'),
(4, 4, NULL, '35/36, Mehedibag , Chittagong', 23.819582, 90.436844, '2017-04-20'),
(5, 5, NULL, 'Bashudhara,Dhaka', 23.780636, 90.419327, '2017-04-20'),
(6, 6, NULL, 'Vogue lifestyle lounge, Level 5, Block –B, Jamuna Future park ltd, Ka - 244, Progati Shorani, Baridhara, Dhaka-1229.', 23.779465, 90.403687, '2017-04-20'),
(7, 7, NULL, 'Add 1', 23.781496, 90.365746, '2017-04-22'),
(8, 7, NULL, 'Add 2', 23.832029, 90.386757, '2017-04-22'),
(9, 7, NULL, 'Add 3', 23.826786, 90.360725, '2017-04-22'),
(10, 7, NULL, '', 23.782654, 90.401566, '2017-04-22'),
(11, 8, NULL, 'address agoda 1', 23.784489, 90.401634, '2017-04-22'),
(12, 9, NULL, 'Dhaka', 23.219999, 90.209999, '2017-04-24'),
(13, 9, NULL, '', 23.817339, 90.407890, '2017-04-24'),
(14, 10, NULL, 'dhaka', 23.330000, 90.250000, '2017-04-24'),
(15, 10, NULL, '', 23.549999, 90.849998, '2017-04-24'),
(16, 11, NULL, '4234234234', 23.787708, 90.402069, '2017-04-24'),
(17, 12, NULL, 'Vogue lifestyle lounge, Level 5, Block –B, Jamuna Future park ltd, Ka - 244, Progati Shorani, Baridhara, Dhaka-1229', 23.333300, 90.444000, '2017-04-24'),
(18, 13, NULL, 'LASER CHAIN SKIN CENTRE LTD, Hossain Plaza, House-1 (4th Floor), Road 28 (Old), Road 15 (New), Near Sobhanbag Mosque, Dhanmondi, Dhaka.', 23.825108, 90.421715, '2017-04-24'),
(19, 14, NULL, 'Brac Services Limited', 23.835302, 90.417931, '2017-04-24'),
(20, 15, NULL, 'erwer', 23.219999, 90.330002, '2017-04-24'),
(21, 16, NULL, '2342342', 23.811478, 90.423820, '2017-04-24'),
(22, 17, NULL, 'Dhaka', 23.761793, 90.431717, '2017-04-24'),
(23, 18, NULL, 'asd', 23.764317, 90.431000, '2017-04-24'),
(24, 19, NULL, 'asd', 23.762535, 90.419975, '2017-04-24'),
(25, 20, NULL, 'e', 23.794250, 90.403023, '2017-04-24'),
(26, 21, NULL, 'erter', 23.793999, 90.411667, '2017-04-25'),
(27, 22, NULL, '34534', 23.795334, 90.413963, '2017-04-25'),
(28, 23, NULL, 'Vogue lifestyle lounge, Level 5, Block –B, Jamuna Future park ltd, Ka - 244, Progati Shorani, Baridhara, Dhaka-1229', 23.778662, 90.416679, '2017-04-26'),
(29, 24, NULL, 'Vogue lifestyle lounge, Level 5, Block –B, Jamuna Future park ltd, Ka - 244, Progati Shorani, Baridhara, Dhaka-1229', 23.780901, 90.415787, '2017-04-26'),
(30, 25, NULL, 'Dhaka', 2222.000000, 2222.000000, '2017-04-26'),
(31, 26, NULL, 'TEST', 23.333300, 90.555496, '2017-04-27'),
(32, 27, NULL, 'Dhaka', 23.555500, 93.333298, '2017-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `brand_dealinfo_tbl`
--

CREATE TABLE IF NOT EXISTS `brand_dealinfo_tbl` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `start_date` varchar(20) DEFAULT '0',
  `end_date` date DEFAULT NULL,
  `input_date_status` int(2) NOT NULL DEFAULT '0',
  `category` varchar(255) DEFAULT NULL,
  `ref_brand_id` int(11) DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4,
  `url` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `ref_reject_msg_id` int(11) NOT NULL DEFAULT '0',
  `hitcount` int(11) DEFAULT NULL,
  `notification_flag` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_dealinfo_tbl`
--

INSERT INTO `brand_dealinfo_tbl` (`id`, `banner_image`, `title`, `keyword`, `mobile`, `start_date`, `end_date`, `input_date_status`, `category`, `ref_brand_id`, `details`, `url`, `flag`, `ref_reject_msg_id`, `hitcount`, `notification_flag`, `date`) VALUES
(1, '20170420140918.png', '10% DISCOUNT AT BISHWO RANG', 'gp, star, fashion', '', '2017-04-20', '2017-06-30', 0, '3', 23, '<p><strong>GP STAR will Enjoy 10% OFF on All Products (Clothing &amp; Accessories).</strong></p>', 'https://www.grameenphone.com/star-program/special-offers/bishwo-rang', 2, 1, 26, 0, '2017-04-20 14:09:18'),
(2, '20170420141152.png', '15% DISCOUNT AT HAMMER STRENGTH.', 'gp, fashion', '+8801730343034', '2017-04-20', '2017-06-30', 0, '3', 23, '<p><strong>GP STAR customers can enjoy discount at Hammer Strength Fitness and Training Center</strong></p><p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>10% Discount for daily &amp; Monthly usage (both male and Female)</strong></p><p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>15% Discount on Quarterly, Half yearly, yearly and Lifetime (both male and Female)</strong></p><p>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>VAT, AIT or other applicable charges will be added</strong></p><p><strong>Discount can be availed as many times as a GP STAR can</strong></p>', 'https://www.grameenphone.com/star-program/special-offers/hammer-strength', 1, 0, 32, 0, '2017-04-20 14:11:52'),
(3, '20170420141340.png', '10% DISCOUNT AT KAY KRAFT.', 'lifestyle, gp, start', '', '2017-04-20', '2017-06-30', 0, '3', 23, '<p><strong>10% OFF on all Products</strong></p>', 'https://www.grameenphone.com/star-program/special-offers/kay-kraft-1', 1, 0, 37, 0, '2017-04-20 14:13:40'),
(4, '20170420141615.png', 'UPTO 30% DISCOUNT AT MAX HOSPITAL LIMITED', 'health, beauty, gp star', '+8801797584583', '2017-04-20', '2017-06-30', 0, '4', 23, '<p>GP STAR customers can enjoy discount at MAX HOSPITAL LIMITED &amp; MAX DIAGNOSTIC LTD.</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 30% discount on pathological investigation.</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 20% discount on all imaging investigations (X-Ray, USG, ETT, ECHO, ECG, endoscopy and colonoscopy) &amp; service charge of hospital bill.</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10% discount on ambulance service charge.</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VAT, AIT or other applicable charges will be added.</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Discount can be availed as many times as a GP STAR can</p>', 'https://www.grameenphone.com/star-program/special-offers/max-hospital-limited', 1, 0, 28, 0, '2017-04-20 14:16:15'),
(5, '20170420142116.png', '25% DISCOUNT ON MEMBERSHIP AT DHAKA REGENCY ', 'travel, gp , star', '+8801713332540', '2017-04-20', '2017-12-31', 0, '7', 23, '<p><strong>25% OFF on Premier Club New Membership (Save Tk. 5,500) &amp; Renewal (Save Tk. 5,000) for GP Platinum Plus &amp; Platinum STAR Customers. FREE voucher valued Tk 1.70 Lac to redeem at Dhaka Regency Hotel &amp; Resort.</strong></p>', 'https://www.grameenphone.com/star-program/special-offers/dhaka-regency-hotel-resort', 1, 0, 36, 0, '2017-04-20 14:21:16'),
(6, '20170420142258.png', 'UPTO 40% OFF VOGUE LIFESTYLE LOUNGE SERVICES', 'gp,star', '+8801777773637', '2017-04-20', '2017-10-31', 0, '4', 23, '<p><strong>This campaign is applicable for GP STAR (</strong>Gold, Platinum &amp; Platinum Plus<strong>).</strong></p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>40% OFF</strong> on Membership (3month, 6month &amp; 1 year) at Vogue Lifestyle Lounge for Gym and Swimming Pool.</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>10% OFF</strong> on SPA &amp; SALON (Men &amp; Women).</p>', 'https://www.grameenphone.com/star-program/special-offers/vogue-lifestyle-lounge', 2, 1, 1, 0, '2017-04-20 14:22:58'),
(7, '20170422065612.png', 'EBL AGODA 10% DISCOUNT ', 'travel, hotel, ebl, agoda, 10% ', '', '2017-04-22', '2017-04-20', 1, '7,8,10,', 24, '', 'www.iceb.com ', 1, 0, 3, 0, '2017-04-22 06:56:12'),
(8, '20170422071125.png', 'EBL AGODA 10% AND 8%', 'travel, agoda, ebl, 8% 10% ', '+8801713030540', '2017-04-22', '2017-04-30', 1, '7,10,13,', 24, '<p>Before booking a visa application centre (VAC) appointment on&nbsp;<a target="_blank" href="https://www.gov.uk/apply-uk-visa?utm_source=visa-application-form&amp;utm_medium=internal-link&amp;utm_campaign=svv-apply-visa">AccessUK</a>, you will be asked to confirm the type of appointment you want. Please note that when you are applying for a Tier 4 Student visa, you are required to book the appointment as follows:</p><ol><li>Select appointment location</li><li>Select appointment type which should be&nbsp;&lsquo;PBS Tier 4 Student&rsquo;.<p>Please note: if you are applying under Tier 4 you should only pick up the Tier 4 student option and&nbsp;not&nbsp;the Standard appointment.</p></li><li>Select appointment Date and Time.</li></ol><p>If you book an appointment in the wrong category, the VAC will not be able to accept your application, when you reach the VAC to submit your application and biometric information, as per the Tier 4 appointment.</p>', 'www.agoda.com', 1, 0, 42, 0, '2017-04-22 07:11:25'),
(9, '20170424043118.png', 'TESTING', 'gp, health, fashion', '+880111111111', '2017-04-24', '2017-04-28', 1, '3,4,', 23, '<p>asdasasdasdas</p>\r\n', 'google.com', 1, 0, 18, 0, '2017-04-24 04:31:18'),
(10, '20170424043216.png', 'ASDASD', 'asdasd', '+88554333333', '2017-04-26', '2017-04-28', 1, '4,6,7,', 23, '', 'google.com', 1, 0, 10, 0, '2017-04-24 04:32:16'),
(11, '20170424045901.png', 'WERWERWERWER', 'werwerwer', '+8842342222423', '2017-04-24', '2017-04-24', 0, '3,', 1, '<p>23423423</p>\r\n', '23423423423', 1, 0, 3, 0, '2017-04-24 04:59:01'),
(12, '20170424050155.png', 'GP', '01777773637', '+8801777773637', '2017-04-24', '2017-04-30', 0, '3,', 23, '<p><strong>This campaign is applicable for GP STAR (</strong>Gold, Platinum &amp; Platinum Plus<strong>).</strong></p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>40% OFF</strong> on Membership (3month, 6month &amp; 1 year) at Vogue Lifestyle Lounge for Gym and Swimming Pool.</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>10% OFF</strong> on SPA &amp; SALON (Men &amp; Women).</p>\r\n', 'https://www.grameenphone.com/star-program/special-offers/vogue-lifestyle-lounge', 1, 0, 15, 0, '2017-04-24 05:01:55'),
(13, '20170424080036.png', '20% DISCOUNT AT LASER CHAIN SKIN CENTRE LTD', 'Gp', '+8801111111113', '2017-04-24', '2017-04-24', 0, '3,', 1, '<p><strong>20% DISCOUNT ON ALL SERVICE AND BEAUTY CARE SOLUTIONS.</strong></p>\r\n', 'https://www.grameenphone.com/star-program/special-offers/laser-chain-skin-centre-ltd', 1, 0, 1, 0, '2017-04-24 08:00:36'),
(14, '20170424092548.png', 'ENJOY UPTO 20% OFF AT BRAC SERVICES ', 'gp, fashion, hotel', '+8801715222222', '2017-04-24', '2017-04-29', 1, '3,4,7,', 28, '<p><strong>GPSTAR teams up with Brac Services to offer 20% discount on room, restaurant and venue rent. Please visit above link for more details of the offer. </strong></p>\r\n', 'https://www.grameenphone.com/star-program/special-offers/brac-services-ltd', 1, 0, 12, 0, '2017-04-24 09:25:48'),
(15, '20170424095316.png', 'RWERWER', 'werwerw', '+8833333333333', '2017-04-24', '2017-04-26', 1, '3,4,', 1, '<p>erwer</p>\r\n', 'werwerwe', 1, 0, 6, 0, '2017-04-24 09:53:16'),
(16, '20170424095559.png', 'WERWer', 'werwerwer', '+8834234234234', '2017-04-24', '2017-04-26', 1, '3,4,', 29, '<p>234234</p>\r\n', '3423423', 1, 0, 13, 0, '2017-04-24 09:55:59'),
(17, '20170424130020.png', 'ENJOY UPTO 20% OFF AT BRAC SERVICES', 'gp star', '+8811111111113', '2017-04-24', '2017-04-26', 1, '3,5,', 23, '<p><strong>GPSTAR teams up with Brac Services to offer 20% discount on room, restaurant and venue rent. Please visit above link for more details of the offer. </strong></p>\r\n', 'google.com', 1, 0, 33, 0, '2017-04-24 13:00:20'),
(18, '20170424130805.png', 'ASDASD', 'gp', '+8877777777777', '2017-04-24', '2017-04-25', 1, '3,4,5,', 23, '<p>asdas</p>\r\n', 'asd', 1, 0, 9, 0, '2017-04-24 13:08:05'),
(19, '20170424131815.png', 'SADASDAS', 'asdasdasd', '+8822222222222', '2017-04-25', '2017-04-27', 1, '3,4,', 28, '<p>sadas</p>\r\n', 'asdas', 1, 0, 30, 0, '2017-04-24 13:18:15'),
(20, '20170424131838.png', 'ASDASD', 'asdasdasddas', '+8833333333333', '2017-04-24', '2017-04-24', 1, '4,5,6,', 28, '<p>sdasd</p>\r\n', 'fr', 1, 0, 5, 0, '2017-04-24 13:18:38'),
(21, '20170425042103.png', 'GDFGDFG', 'dfgdfg', '+8844444444444', '2017-04-25', '2017-04-25', 0, '3,4,', 1, '<p>ert</p>\r\n', 'tertert', 1, 0, 1, 0, '2017-04-25 04:21:03'),
(22, '20170425063452.png', 'ERTERTERTERTERT', 'etertertertert', '+8844444444444', '2017-04-25', '2017-04-25', 0, '3', 1, '<p>43534534</p>\r\n', '3454', 1, 0, 4, 0, '2017-04-25 06:34:52'),
(24, '20170426093732.png', 'UPTO 40% OFF VOGUE LIFESTYLE LOUNGE SERVICES', 'Robi', '+8801700000000', '2017-04-26', '2017-04-30', 1, '3,4,5', 1, '<p><strong>This campaign is applicable for GP STAR (</strong>Gold, Platinum &amp; Platinum Plus<strong>).</strong></p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>40% OFF</strong> on Membership (3month, 6month &amp; 1 year) at Vogue Lifestyle Lounge for Gym and Swimming Pool.</p>\r\n\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>10% OFF</strong> on SPA &amp; SALON (Men &amp; Women).</p>\r\n', 'https://www.grameenphone.com/star-program/special-offers/vogue-lifestyle-lounge', 1, 0, 17, 0, '2017-04-26 09:37:32'),
(25, '20170426130935.png', '20% DISCOUNT AT LASER CHAIN SKIN CENTRE LTD', 'Gp', '+8801900000000', '2017-04-26', '2017-04-30', 1, '3,4', 1, '<p><strong>20% DISCOUNT ON ALL SERVICE AND BEAUTY CARE SOLUTIONS.</strong></p>', 'https://www.grameenphone.com/star-program/special-offers/laser-chain-skin-centre-ltd', 1, 0, 7, 0, '2017-04-26 13:09:35'),
(26, '20170427133845.png', 'TEST', 'gretting', '+8800000000000', '2017-04-27', '2017-04-30', 1, '3,4', 1, '<p>TEST</p>', 'TEST', 1, 0, 7, 0, '2017-04-27 13:38:45'),
(27, '20170430111931.png', 'UPTO 40% OFF VOGUE LIFESTYLE LOUNGE SERVICES', 'Gp offer', '+8801777773637', '2017-04-30', '2017-04-30', 1, '3,4,5', 1, '<p>test</p>', 'abc', 1, 0, 9, 0, '2017-04-30 11:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `brand_list`
--

CREATE TABLE IF NOT EXISTS `brand_list` (
  `id` int(11) NOT NULL,
  `brand_title` varchar(255) DEFAULT NULL,
  `brand_details` text
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `brand_list`
--

INSERT INTO `brand_list` (`id`, `brand_title`, `brand_details`) VALUES
(1, 'GP Star', 'GP Star'),
(2, 'EBL VISA', 'EBL VISA'),
(3, 'APEX Footwear', 'APEX Footwear'),
(4, 'Cats Eye', 'Cats Eye'),
(5, 'AMEX City Bank', 'AMEX City Bank'),
(6, 'Aarong', 'Aarong'),
(7, 'Diamond World', 'Diamond World'),
(8, 'Gitanjali', 'Gitanjali'),
(10, 'Sailor', 'Sailor'),
(11, 'Kids Paradise', 'Kids Paradise'),
(12, 'Gloria Jeans', 'Gloria Jeans'),
(13, 'Burger King', 'Burger King'),
(14, 'Coffee Bean and Tea Leaf', 'Coffee Bean and Tea Leaf'),
(15, 'Pizza Hut', 'Pizza Hut'),
(16, 'KFC', 'KFC'),
(17, 'Artisti Collection', 'Artisti Collection'),
(23, 'GP Star', NULL),
(24, 'EBL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand_user_tbl`
--

CREATE TABLE IF NOT EXISTS `brand_user_tbl` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4,
  `contact_person_1` varchar(255) DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `mobile_1` varchar(50) DEFAULT NULL,
  `contact_person_2` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `mobile_2` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_user_tbl`
--

INSERT INTO `brand_user_tbl` (`id`, `brand_name`, `brand_logo`, `address`, `contact_person_1`, `email_1`, `mobile_1`, `contact_person_2`, `email_2`, `mobile_2`, `email`, `mobile`, `website`, `password`, `date`, `status`) VALUES
(4, '1', '20170424033034.png', 'Dhaka', 'Asif Iqbal', 'abc@abc.co', '01900000000', 'Altaf Hosain', 'abc@abc.co', '01900000000', 'user@user.com', '01800000000', 'acebook.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-11', 1),
(11, '23', '20170420130140.png', 'Dhaka', 'test2', 'test2@gmail.com', '01700000000', 'test2', 'test2@gmail.com', '01700000000', 'gpstar@deals4u.com', '+8801700000000', 'test2', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-20', 1),
(12, '24', '20170420130802.png', '', 'test', 'test', '0190000000', 'test', 'test', '0190000000', 'ebl@deals4u.com', '+8801900000000', 'test', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-20', 1),
(13, '26', '20170423101159.png', 'rwerwe', 'rwerwe', 'wer@erewr.ewrw', '44444444444', '444erer', 'wer@erewr.ewrw', '44444444444', 'eqwe@ewwe.wew', '77777777777', 'ewrwerwe', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-23', 1),
(14, '27', '', 'Dhaka', 'Malik', 'm@g.com', '4', 'Asif', 'a@g.com', '2', 'asif.malik@ice.com', '01844165805', 'a.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-23', 1),
(15, '28', '20170424091526.png', 'Dhaka', 'Asif', 'a@g.com', '4', 'Malik', 'm@g.com', '4', 'eye@gmail.com', '0', 'google.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-24', 1),
(16, '29', '20170424095038.png', 'tert', 'erterterte', 'erwr@rwerwe.rr', '22222222222', 'rtert', 'erwr@rwerwe.rr', '22222222222', 'rich@rich.com', '11111111111', 'ter', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `category_details` text
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_title`, `category_details`) VALUES
(3, 'Fashion and Lifestyle', 'Fashion and  Lifestyle'),
(4, 'Health Beauty', 'Health Beauty'),
(5, 'Furniture', 'Furniture'),
(6, 'Home Appliance', 'Home Appliance'),
(7, 'Travel', 'Travel'),
(8, 'Entertainment', 'Entertainment'),
(9, 'Food', 'Food'),
(10, 'E-commerce', 'E-commerce'),
(11, 'GP Star', 'GP Star'),
(12, 'American Express', 'American Express'),
(13, 'EBL Visa', 'EBL Visa'),
(14, 'Banking Cards', ''),
(15, 'Testing Category', 'Test Category'),
(16, 'Men''s Shirt', 'Insert all men''s shirt category here');

-- --------------------------------------------------------

--
-- Table structure for table `device_info_tbl`
--

CREATE TABLE IF NOT EXISTS `device_info_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `platform` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_info_tbl`
--

INSERT INTO `device_info_tbl` (`id`, `user_id`, `device_token`, `device_id`, `platform`) VALUES
(2, 31, 'cCyOE3O21aA:APA91bFQwVqHyTOhmeBojDeSHxoqcLU3ePQOct6ylq3ImuxD6KfJxzv1ugZkFIizFgKjD9WOOCRJPhqtle9v9w5YYacHf7Lfu6UtT-MnWxeQCMQk3oyMg2wPC0SvNo3RWjCIR5hv-Igg', '4e992a78d4b1633', 'android'),
(3, NULL, 'eNC3DTePqgU:APA91bFfQyyPjwjBSRRpGoMuEBmJfeWTneSLMCwXb3YEhZ8zLaO8FOopIHNd318yIyQzr56Xb3LFdEmKEW4wpiLMh-ACWNg-7ROrVx9qErHtj-SUw93s5_RNuSPAvTrOv27EJgmrw5cE', 'ef464e50c033f64f', 'android'),
(4, NULL, 'ecAiWkAs1Tc:APA91bEbgdlRvAnpemAoccj2L9qJIMoeFnjG70FDiuy_ACB1C148l3oc35QGE0JG5ePYYZnJdG9vrb-k4z0GzFvZ_aRqDO3eswCopgdE5kX7IIsMOe-YYmJvU_Lm22tBsZwa0bxu7SMq', 'f1d5842ae51e18a2', 'android'),
(5, NULL, 'foz4i4sAayY:APA91bEXjRgReGXvmKdzqYjamUat9LrCTTnTXSFEhO4TlH01tUPcY9u3-Oq7I9r9fyWrCWE10hVdzILH8zAFsQi9E9yGfzGO6hIM7wZcIT-W5QaOV3pcPPMLYqUwVL1FfFi00lEeQK9S', '1a32ab518fbf12d7', 'android'),
(6, 31, 'cECIdiTzSTE:APA91bFB16rStlEaFhlLHTi_Qie3Z7hnua_83ZEktyO2qVSyaJDiQ9SqkORNsNxOT9Zq1pRnkTaMb8PPLKCVqvPbi5vzUHzmL1GXCOdaP-SKGU5RV1qSfHMWnOpzBiJ833ppHpUTatWK', '2930cebf3622b4e0', 'android'),
(7, NULL, 'eWywD7RFYJI:APA91bHxRz6eWnGo7B4mAhG3NuP0nQPkDa1Cc8eSKn3-LNgAc2lX0NOHysafeYou8T6UccZ3_qieMe8o3eFx26elLKO4NJf8z8-yt1HfFdoZeHsRuXrXjPHE-YZOxRAJAUyCyq81WdAS', '7f5d8eec9bd7d54d', 'android'),
(8, NULL, 'f54i9VuuCB8:APA91bEMANVKBDkGYrZcnSOtdvMrlRdhYi1AxqDh5E0fdxXK02zMUkGOk0Slsy1YTzNHvExCvsoUlZnBEuyU0QK1zoPuPrENiWTqIrjTN0b00yVarhzRpmqygZa8CH8EQVW8VTAG7oor', 'c9756e3756cc5479', 'android'),
(9, NULL, 'c51FB2Ykt3Y:APA91bHvuMckxULtMELG02U4umDn84ixSALjYHTrh1tRaiY1oYftDM7f-pe8CFQBXiMT6oV-dKRPAnYP6Cjhgg6GuY0TagTF-0Srgp-dIlGCYRbHaO1uJiBxJ_01gnwdS8ntMZiSpbqC', 'b4f2ca058facbb7a', 'android'),
(10, NULL, 'f_Wf4WNCQN8:APA91bErh5dSSGXQ-J-gFIEqgn4Lb95mMal99w8h-m3vjEARkXMWqt5qJfVWlacF8mFVTVvL_WaqOiJwrNXjm5Vb4ebqgK2ivF_JuNEDJC58gOxVbTHKeFrL3SsQ1Yjo41rEuwEOQm7f', '5502b3a3ea8f5a34', 'android'),
(11, NULL, 'c6gF1IGFWgc:APA91bG2uyT3pgLqS1OQ-v5mGsmT66EgV5MQUM8X8qVvRD_JTX-yWO5LHsYWkaiPnDRIjwZDLP_2nWSYkIEz-RNlE8jWJwfLt_hhHd-Ark4dHa-ZuOP18ISd8Lku4UBa5-_B0wsUq5tt', '8287d0ce033bc3dc', 'android'),
(12, NULL, 'fAsKjVcDCvg:APA91bFH4MauuBir5csTfdRaQY50E4WGyikAwEb-7akkvD9jvoZ8-KdQE20NfIEHCTe7wblVO57KxbMemDSXf1CVr0ptCRKyutE3y4kZesNF79GlPgfb9Llwbjo60lhwvR4ssxWgsfFE', 'e46e302b40af1e8b', 'android'),
(13, NULL, 'dH2PLUgil6g:APA91bGOjzlsSV86cQDZTLaShmEoEl2tp4nYlhoJr3yqWZoMsNw62K8EuBpt0UxpzHSn7BdOeBz5mlnG17nmvowKNz61BHIHqSVuMqfdjXakXTzAChpJOajNLZBeMS37cTit-Ey7xH1M', 'f5fafe436b1ba93a', 'android');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_tbl`
--

CREATE TABLE IF NOT EXISTS `favorite_tbl` (
  `id` int(11) NOT NULL,
  `fav_id` int(11) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_tbl`
--

INSERT INTO `favorite_tbl` (`id`, `fav_id`, `device_id`, `email`, `created_at`, `updated_at`) VALUES
(50, 4, '4e992a78d4b1633', NULL, '2017-04-20', NULL),
(61, 2, '4e992a78d4b1633', NULL, '2017-04-22', NULL),
(87, 3, '4e992a78d4b1633', NULL, '2017-04-23', NULL),
(123, 28, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(124, 28, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(125, 28, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(126, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(127, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(128, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(129, 5, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(130, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(131, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(132, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(133, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(134, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(135, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(136, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(137, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(138, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(139, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(140, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(141, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(142, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(143, 3, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(152, 2, '4e992a78d4b1633', NULL, '2017-04-24', NULL),
(170, 7, '4e992a78d4b1633', NULL, '2017-04-25', NULL),
(216, 4, '4e992a78d4b1633', NULL, '2017-04-25', NULL),
(217, 5, 'ef464e50c033f64f', NULL, '2017-04-25', NULL),
(248, 2, NULL, 'asif.malik@icebd.com', '2017-04-27', NULL),
(255, 4, '4e992a78d4b1633', 'asif.malik@icebd.com', '2017-04-27', NULL),
(256, 3, '4e992a78d4b1633', 'asif.malik@icebd.com', '2017-04-27', NULL),
(257, 1, '4e992a78d4b1633', 'asif.malik@icebd.com', '2017-04-27', NULL),
(262, 6, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-27', NULL),
(265, 2, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-27', NULL),
(266, 5, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-27', NULL),
(267, 3, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(268, 7, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(269, 1, '8287d0ce033bc3dc', 'rubaiyat.jamil@gmail.com', '2017-04-28', NULL),
(270, 2, '8287d0ce033bc3dc', 'rubaiyat.jamil@gmail.com', '2017-04-28', NULL),
(271, 14, '8287d0ce033bc3dc', 'rubaiyat.jamil@gmail.com', '2017-04-28', NULL),
(272, 4, '8287d0ce033bc3dc', 'rubaiyat.jamil@gmail.com', '2017-04-28', NULL),
(273, 4, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(274, 1, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(275, 8, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(276, 10, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(277, 11, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(278, 12, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(279, 13, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(280, 15, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(281, 14, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(282, 16, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(283, 23, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(284, 17, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(285, 24, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(286, 24, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(287, 24, '4e992a78d4b1633', 'asif.malik@gmail.com', '2017-04-28', NULL),
(288, 3, '2930cebf3622b4e0', 'icetestingset@gmail.com', '2017-04-30', NULL),
(289, 2, '2930cebf3622b4e0', 'icetestingset@gmail.com', '2017-04-30', NULL),
(290, 6, '4e992a78d4b1633', 'asif.malik@icebd.com', '2017-04-30', NULL),
(291, 5, '2930cebf3622b4e0', 'asif.malik@icebd.com', '2017-04-30', NULL),
(292, 7, '2930cebf3622b4e0', 'asif.malik@icebd.com', '2017-04-30', NULL),
(293, 8, '2930cebf3622b4e0', 'asif.malik@icebd.com', '2017-04-30', NULL),
(294, 23, '4e992a78d4b1633', 'asif.malik@icebd.com', '2017-04-30', NULL),
(295, 1, '2930cebf3622b4e0', 'icetestingset@gmail.com', '2017-04-30', NULL),
(296, 23, '2930cebf3622b4e0', 'icetestingset@gmail.com', '2017-04-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `images`, `description`, `date`) VALUES
(1, '20170423103907.png', 'test message', '2017-04-23'),
(2, '20170423104217.png', 'test', '2017-04-23'),
(3, '20170423164958.png', 'test', '2017-04-23'),
(4, '20170423165023.png', 'test', '2017-04-23'),
(5, '20170424064832.png', 'test from admin', '2017-04-24'),
(6, '20170424064834.png', 'test from admin', '2017-04-24'),
(7, '20170424064932.png', 'test', '2017-04-24'),
(8, '20170424065241.png', 'test', '2017-04-24'),
(9, '20170424065757.png', 'test', '2017-04-24'),
(10, '20170424094104.png', 'Greeting Message Testing', '2017-04-24'),
(11, '20170424101249.png', 'Greeting Message Testing 2', '2017-04-24'),
(12, '20170424102156.png', 'Greeting Message Testing 3', '2017-04-24'),
(13, '20170427060708.png', 'test', '2017-04-27'),
(14, '20170427060816.png', 'test', '2017-04-27'),
(15, '20170427061047.png', 'test', '2017-04-27'),
(16, '20170427061211.png', 'rrrr', '2017-04-27'),
(17, '20170427062510.png', 'test', '2017-04-27'),
(18, '20170427074921.png', 'test', '2017-04-27'),
(19, '20170427075036.png', 'test', '2017-04-27'),
(20, '20170427075139.png', 'test', '2017-04-27'),
(21, '20170427075318.png', 'eeee', '2017-04-27'),
(22, '20170427082836.png', 'yyy', '2017-04-27'),
(23, '20170427082934.png', 'yyy', '2017-04-27'),
(24, '20170427083118.png', 'ppp', '2017-04-27'),
(25, '20170427083351.png', 'ooo', '2017-04-27'),
(26, '20170427083639.png', 'test', '2017-04-27'),
(27, '20170427084409.png', 'sss', '2017-04-27'),
(28, '20170427085138.png', '123', '2017-04-27'),
(29, '20170427085552.png', 'sss', '2017-04-27'),
(30, '20170427085706.png', 'ddd', '2017-04-27'),
(31, '20170427085942.png', '123', '2017-04-27'),
(32, '20170427091303.png', 'ttt', '2017-04-27'),
(33, '20170427091908.png', 'ppp', '2017-04-27'),
(34, '20170427093039.png', 'zzz', '2017-04-27'),
(35, '20170427093203.png', 'zzz', '2017-04-27'),
(36, '20170427093611.png', 'ppp', '2017-04-27'),
(37, '20170427100055.png', 'rrr', '2017-04-27'),
(38, '20170427100248.png', 'ooo', '2017-04-27'),
(39, '20170427100540.png', 'ooo', '2017-04-27'),
(40, '20170427100828.png', 'ooo', '2017-04-27'),
(41, '20170427101130.png', 'ooo', '2017-04-27'),
(42, '20170427101737.png', 'ppp', '2017-04-27'),
(43, '20170427101958.png', 'iii', '2017-04-27'),
(44, '20170427102904.png', 'test', '2017-04-27'),
(45, '20170427103133.png', 'test', '2017-04-27'),
(46, '20170427104206.png', 'good', '2017-04-27'),
(47, '20170427104444.png', 'zooo', '2017-04-27'),
(48, '20170427104602.png', 'zoooooo', '2017-04-27'),
(49, '20170427105047.png', 'test', '2017-04-27'),
(50, '20170427105320.png', 'test 2', '2017-04-27'),
(51, '20170427105605.png', 'Lolipop', '2017-04-27'),
(52, '20170427105827.png', 'Tiger', '2017-04-27'),
(53, '20170427110515.png', 'Lion', '2017-04-27'),
(54, '20170427110624.png', 'Pithon', '2017-04-27'),
(55, '20170427133332.png', 'Python', '2017-04-27'),
(56, '20170427133619.png', 'rwerwerwer', '2017-04-27'),
(57, '20170430100619.png', 'testing', '2017-04-30'),
(58, '20170430100719.png', 'testing', '2017-04-30'),
(59, '20170430101309.png', 'testing', '2017-04-30'),
(60, '20170430101742.png', 'Elephant', '2017-04-30'),
(61, '20170430101937.png', 'testing', '2017-04-30'),
(62, '20170430104348.png', 'testing', '2017-04-30'),
(63, '20170430123048.png', 'Admin Message Testing 1', '2017-04-30'),
(64, '20170430123556.png', 'Admin Message Testing 2', '2017-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `message_grd_log_tbl`
--

CREATE TABLE IF NOT EXISTS `message_grd_log_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_grd_tbl`
--

CREATE TABLE IF NOT EXISTS `message_grd_tbl` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_grd_tbl`
--

INSERT INTO `message_grd_tbl` (`id`, `image`, `title`, `date`) VALUES
(1, 'http://54.191.10.107/deals4uwebadmin/public/images/1.jpg', 'welcome message', '2017-04-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_log_tbl`
--

CREATE TABLE IF NOT EXISTS `message_log_tbl` (
  `id` int(11) NOT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `ref_message_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `push_noti_send` int(1) NOT NULL DEFAULT '0',
  `isDeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_log_tbl`
--

INSERT INTO `message_log_tbl` (`id`, `device_id`, `user_id`, `device_token`, `ref_message_id`, `message`, `image`, `date`, `status`, `push_noti_send`, `isDeleted`) VALUES
(2, 'ef464e50c033f64f', NULL, 'eNC3DTePqgU:APA91bFfQyyPjwjBSRRpGoMuEBmJfeWTneSLMCwXb3YEhZ8zLaO8FOopIHNd318yIyQzr56Xb3LFdEmKEW4wpiLMh-ACWNg-7ROrVx9qErHtj-SUw93s5_RNuSPAvTrOv27EJgmrw5cE', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(3, 'f1d5842ae51e18a2', NULL, 'ecAiWkAs1Tc:APA91bEbgdlRvAnpemAoccj2L9qJIMoeFnjG70FDiuy_ACB1C148l3oc35QGE0JG5ePYYZnJdG9vrb-k4z0GzFvZ_aRqDO3eswCopgdE5kX7IIsMOe-YYmJvU_Lm22tBsZwa0bxu7SMq', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(4, '1a32ab518fbf12d7', NULL, 'foz4i4sAayY:APA91bEXjRgReGXvmKdzqYjamUat9LrCTTnTXSFEhO4TlH01tUPcY9u3-Oq7I9r9fyWrCWE10hVdzILH8zAFsQi9E9yGfzGO6hIM7wZcIT-W5QaOV3pcPPMLYqUwVL1FfFi00lEeQK9S', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(6, '7f5d8eec9bd7d54d', NULL, 'eWywD7RFYJI:APA91bHxRz6eWnGo7B4mAhG3NuP0nQPkDa1Cc8eSKn3-LNgAc2lX0NOHysafeYou8T6UccZ3_qieMe8o3eFx26elLKO4NJf8z8-yt1HfFdoZeHsRuXrXjPHE-YZOxRAJAUyCyq81WdAS', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(7, 'c9756e3756cc5479', NULL, 'f54i9VuuCB8:APA91bEMANVKBDkGYrZcnSOtdvMrlRdhYi1AxqDh5E0fdxXK02zMUkGOk0Slsy1YTzNHvExCvsoUlZnBEuyU0QK1zoPuPrENiWTqIrjTN0b00yVarhzRpmqygZa8CH8EQVW8VTAG7oor', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(8, 'b4f2ca058facbb7a', NULL, 'c51FB2Ykt3Y:APA91bHvuMckxULtMELG02U4umDn84ixSALjYHTrh1tRaiY1oYftDM7f-pe8CFQBXiMT6oV-dKRPAnYP6Cjhgg6GuY0TagTF-0Srgp-dIlGCYRbHaO1uJiBxJ_01gnwdS8ntMZiSpbqC', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '0', 1, 0),
(9, '5502b3a3ea8f5a34', NULL, 'f_Wf4WNCQN8:APA91bErh5dSSGXQ-J-gFIEqgn4Lb95mMal99w8h-m3vjEARkXMWqt5qJfVWlacF8mFVTVvL_WaqOiJwrNXjm5Vb4ebqgK2ivF_JuNEDJC58gOxVbTHKeFrL3SsQ1Yjo41rEuwEOQm7f', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(10, '8287d0ce033bc3dc', NULL, 'c6gF1IGFWgc:APA91bG2uyT3pgLqS1OQ-v5mGsmT66EgV5MQUM8X8qVvRD_JTX-yWO5LHsYWkaiPnDRIjwZDLP_2nWSYkIEz-RNlE8jWJwfLt_hhHd-Ark4dHa-ZuOP18ISd8Lku4UBa5-_B0wsUq5tt', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '0', 1, 0),
(11, 'e46e302b40af1e8b', NULL, 'fAsKjVcDCvg:APA91bFH4MauuBir5csTfdRaQY50E4WGyikAwEb-7akkvD9jvoZ8-KdQE20NfIEHCTe7wblVO57KxbMemDSXf1CVr0ptCRKyutE3y4kZesNF79GlPgfb9Llwbjo60lhwvR4ssxWgsfFE', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(12, 'f5fafe436b1ba93a', NULL, 'dH2PLUgil6g:APA91bGOjzlsSV86cQDZTLaShmEoEl2tp4nYlhoJr3yqWZoMsNw62K8EuBpt0UxpzHSn7BdOeBz5mlnG17nmvowKNz61BHIHqSVuMqfdjXakXTzAChpJOajNLZBeMS37cTit-Ey7xH1M', 62, 'testing', '20170430104348.png', '2017-04-30 00:00:00', '1', 1, 0),
(14, 'ef464e50c033f64f', NULL, 'eNC3DTePqgU:APA91bFfQyyPjwjBSRRpGoMuEBmJfeWTneSLMCwXb3YEhZ8zLaO8FOopIHNd318yIyQzr56Xb3LFdEmKEW4wpiLMh-ACWNg-7ROrVx9qErHtj-SUw93s5_RNuSPAvTrOv27EJgmrw5cE', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(15, 'f1d5842ae51e18a2', NULL, 'ecAiWkAs1Tc:APA91bEbgdlRvAnpemAoccj2L9qJIMoeFnjG70FDiuy_ACB1C148l3oc35QGE0JG5ePYYZnJdG9vrb-k4z0GzFvZ_aRqDO3eswCopgdE5kX7IIsMOe-YYmJvU_Lm22tBsZwa0bxu7SMq', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(16, '1a32ab518fbf12d7', NULL, 'foz4i4sAayY:APA91bEXjRgReGXvmKdzqYjamUat9LrCTTnTXSFEhO4TlH01tUPcY9u3-Oq7I9r9fyWrCWE10hVdzILH8zAFsQi9E9yGfzGO6hIM7wZcIT-W5QaOV3pcPPMLYqUwVL1FfFi00lEeQK9S', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(17, '2930cebf3622b4e0', 37, 'clK6aDfGLI8:APA91bHZ7sx7IXchExKuqVbYrQu-mxF27rhXk4Q3YAGzRJAk7-3Ra_Bo9cFU2e41_gdsg9qGRO1bE0DuPUHlw45rgqs20Xdxc7Lr2QzrP0Z1pnCqIPn99A4Ghkq4yN6pLBgmVWSuEAck', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(18, '7f5d8eec9bd7d54d', NULL, 'eWywD7RFYJI:APA91bHxRz6eWnGo7B4mAhG3NuP0nQPkDa1Cc8eSKn3-LNgAc2lX0NOHysafeYou8T6UccZ3_qieMe8o3eFx26elLKO4NJf8z8-yt1HfFdoZeHsRuXrXjPHE-YZOxRAJAUyCyq81WdAS', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(19, 'c9756e3756cc5479', NULL, 'f54i9VuuCB8:APA91bEMANVKBDkGYrZcnSOtdvMrlRdhYi1AxqDh5E0fdxXK02zMUkGOk0Slsy1YTzNHvExCvsoUlZnBEuyU0QK1zoPuPrENiWTqIrjTN0b00yVarhzRpmqygZa8CH8EQVW8VTAG7oor', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(20, 'b4f2ca058facbb7a', NULL, 'c51FB2Ykt3Y:APA91bHvuMckxULtMELG02U4umDn84ixSALjYHTrh1tRaiY1oYftDM7f-pe8CFQBXiMT6oV-dKRPAnYP6Cjhgg6GuY0TagTF-0Srgp-dIlGCYRbHaO1uJiBxJ_01gnwdS8ntMZiSpbqC', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '0', 1, 0),
(21, '5502b3a3ea8f5a34', NULL, 'f_Wf4WNCQN8:APA91bErh5dSSGXQ-J-gFIEqgn4Lb95mMal99w8h-m3vjEARkXMWqt5qJfVWlacF8mFVTVvL_WaqOiJwrNXjm5Vb4ebqgK2ivF_JuNEDJC58gOxVbTHKeFrL3SsQ1Yjo41rEuwEOQm7f', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(22, '8287d0ce033bc3dc', NULL, 'c6gF1IGFWgc:APA91bG2uyT3pgLqS1OQ-v5mGsmT66EgV5MQUM8X8qVvRD_JTX-yWO5LHsYWkaiPnDRIjwZDLP_2nWSYkIEz-RNlE8jWJwfLt_hhHd-Ark4dHa-ZuOP18ISd8Lku4UBa5-_B0wsUq5tt', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '0', 1, 0),
(23, 'e46e302b40af1e8b', NULL, 'fAsKjVcDCvg:APA91bFH4MauuBir5csTfdRaQY50E4WGyikAwEb-7akkvD9jvoZ8-KdQE20NfIEHCTe7wblVO57KxbMemDSXf1CVr0ptCRKyutE3y4kZesNF79GlPgfb9Llwbjo60lhwvR4ssxWgsfFE', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(24, 'f5fafe436b1ba93a', NULL, 'dH2PLUgil6g:APA91bGOjzlsSV86cQDZTLaShmEoEl2tp4nYlhoJr3yqWZoMsNw62K8EuBpt0UxpzHSn7BdOeBz5mlnG17nmvowKNz61BHIHqSVuMqfdjXakXTzAChpJOajNLZBeMS37cTit-Ey7xH1M', 63, 'Admin Message Testing 1', '20170430123048.png', '2017-04-30 00:00:00', '1', 1, 0),
(26, 'ef464e50c033f64f', NULL, 'eNC3DTePqgU:APA91bFfQyyPjwjBSRRpGoMuEBmJfeWTneSLMCwXb3YEhZ8zLaO8FOopIHNd318yIyQzr56Xb3LFdEmKEW4wpiLMh-ACWNg-7ROrVx9qErHtj-SUw93s5_RNuSPAvTrOv27EJgmrw5cE', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(27, 'f1d5842ae51e18a2', NULL, 'ecAiWkAs1Tc:APA91bEbgdlRvAnpemAoccj2L9qJIMoeFnjG70FDiuy_ACB1C148l3oc35QGE0JG5ePYYZnJdG9vrb-k4z0GzFvZ_aRqDO3eswCopgdE5kX7IIsMOe-YYmJvU_Lm22tBsZwa0bxu7SMq', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(28, '1a32ab518fbf12d7', NULL, 'foz4i4sAayY:APA91bEXjRgReGXvmKdzqYjamUat9LrCTTnTXSFEhO4TlH01tUPcY9u3-Oq7I9r9fyWrCWE10hVdzILH8zAFsQi9E9yGfzGO6hIM7wZcIT-W5QaOV3pcPPMLYqUwVL1FfFi00lEeQK9S', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(30, '7f5d8eec9bd7d54d', NULL, 'eWywD7RFYJI:APA91bHxRz6eWnGo7B4mAhG3NuP0nQPkDa1Cc8eSKn3-LNgAc2lX0NOHysafeYou8T6UccZ3_qieMe8o3eFx26elLKO4NJf8z8-yt1HfFdoZeHsRuXrXjPHE-YZOxRAJAUyCyq81WdAS', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(31, 'c9756e3756cc5479', NULL, 'f54i9VuuCB8:APA91bEMANVKBDkGYrZcnSOtdvMrlRdhYi1AxqDh5E0fdxXK02zMUkGOk0Slsy1YTzNHvExCvsoUlZnBEuyU0QK1zoPuPrENiWTqIrjTN0b00yVarhzRpmqygZa8CH8EQVW8VTAG7oor', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(32, 'b4f2ca058facbb7a', NULL, 'c51FB2Ykt3Y:APA91bHvuMckxULtMELG02U4umDn84ixSALjYHTrh1tRaiY1oYftDM7f-pe8CFQBXiMT6oV-dKRPAnYP6Cjhgg6GuY0TagTF-0Srgp-dIlGCYRbHaO1uJiBxJ_01gnwdS8ntMZiSpbqC', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '0', 1, 0),
(33, '5502b3a3ea8f5a34', NULL, 'f_Wf4WNCQN8:APA91bErh5dSSGXQ-J-gFIEqgn4Lb95mMal99w8h-m3vjEARkXMWqt5qJfVWlacF8mFVTVvL_WaqOiJwrNXjm5Vb4ebqgK2ivF_JuNEDJC58gOxVbTHKeFrL3SsQ1Yjo41rEuwEOQm7f', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(34, '8287d0ce033bc3dc', NULL, 'c6gF1IGFWgc:APA91bG2uyT3pgLqS1OQ-v5mGsmT66EgV5MQUM8X8qVvRD_JTX-yWO5LHsYWkaiPnDRIjwZDLP_2nWSYkIEz-RNlE8jWJwfLt_hhHd-Ark4dHa-ZuOP18ISd8Lku4UBa5-_B0wsUq5tt', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '0', 1, 0),
(35, 'e46e302b40af1e8b', NULL, 'fAsKjVcDCvg:APA91bFH4MauuBir5csTfdRaQY50E4WGyikAwEb-7akkvD9jvoZ8-KdQE20NfIEHCTe7wblVO57KxbMemDSXf1CVr0ptCRKyutE3y4kZesNF79GlPgfb9Llwbjo60lhwvR4ssxWgsfFE', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0),
(36, 'f5fafe436b1ba93a', NULL, 'dH2PLUgil6g:APA91bGOjzlsSV86cQDZTLaShmEoEl2tp4nYlhoJr3yqWZoMsNw62K8EuBpt0UxpzHSn7BdOeBz5mlnG17nmvowKNz61BHIHqSVuMqfdjXakXTzAChpJOajNLZBeMS37cTit-Ey7xH1M', 64, 'Admin Message Testing 2', '20170430123556.png', '2017-04-30 00:00:00', '1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_user_tbl`
--

CREATE TABLE IF NOT EXISTS `mobile_user_tbl` (
  `id` int(11) NOT NULL,
  `ref_role_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_user_tbl`
--

INSERT INTO `mobile_user_tbl` (`id`, `ref_role_id`, `full_name`, `email`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 3, 'Fahmid', 'fahmid@icebd.com', NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Fahmid', 'fahmid2@icebd.com', '0111111111', NULL, NULL),
(4, 3, 'asif', 'hhh@h.com', NULL, NULL, NULL),
(5, 3, 'xdfa', 'ffs@h.com', NULL, NULL, NULL),
(6, 3, 'ehh', 'gwfwf@bd.com', NULL, NULL, NULL),
(7, 3, 'malik', 'as@gmail.com', NULL, NULL, NULL),
(8, 3, 'ddd', 'sddd@g.com', NULL, NULL, NULL),
(9, 3, 'sss', 'g@g.com', NULL, NULL, NULL),
(10, 3, 'hhh', 'kk@j.com', NULL, NULL, NULL),
(11, 3, 'uyu', 'h@n.com', NULL, NULL, NULL),
(12, 3, 'h', 'g@x.com', NULL, NULL, NULL),
(13, 3, 'h', 'n@m.com', NULL, NULL, NULL),
(14, 3, 'Noman', 'abdullah.noman@icebd.com', NULL, NULL, NULL),
(15, 3, 'h', 'k@v.com', NULL, NULL, NULL),
(16, 3, 'ha', 'b@m.com', NULL, NULL, NULL),
(17, 3, 'hahah', 's@k.com', NULL, NULL, NULL),
(18, 3, 'rubaiyat jamil', 'rjamil@icebd.com', NULL, NULL, NULL),
(19, 3, 'asdasd', 'asdas@asdasd.com', NULL, NULL, NULL),
(20, 3, 'sads', 'sad@v.com', NULL, NULL, NULL),
(21, 3, 'sadasd', 'asdas@sd.com', NULL, NULL, NULL),
(22, 3, 'tt', 'h@h.com', NULL, NULL, NULL),
(23, 3, 'Asif Md. Malik', 'asif96malik@gmail.com', NULL, NULL, NULL),
(24, 3, 'i', 'jj@n.com', NULL, NULL, NULL),
(25, 3, 'ffd', 's@b.com', NULL, NULL, NULL),
(26, 3, 'Mritunjoy Roy', 'mritunjoy.roy@icebd.com', NULL, NULL, NULL),
(27, 3, 'sss', 'vv@b.com', NULL, NULL, NULL),
(28, 3, 'Mritunjoy Saha', 'mritunjoy.roy@gmail.com', NULL, NULL, NULL),
(29, 3, 'Dewan Momen', 'dewan.momen@icebd.com', NULL, NULL, NULL),
(30, 3, 'monowar', 'monowar@g.com', NULL, NULL, NULL),
(31, 3, 'asif', 'asif.malik@icebd.com', NULL, NULL, NULL),
(32, 3, 'asif', 'asjj@g.com', NULL, NULL, NULL),
(33, 3, 'jj', 'asjj@gmail.com', NULL, NULL, NULL),
(34, 3, 'rubaiyat jamil', 'rubaiyat.jamil@gmail.com', NULL, NULL, NULL),
(35, 3, 'Rubaiyat', 'rubaiyat.jamil@icebd.com', NULL, NULL, NULL),
(36, 3, 'fahmid', 'fahmid789@gmail.com', NULL, NULL, NULL),
(37, 3, 'ice tech', 'icetestingset@gmail.com', NULL, NULL, NULL),
(38, 3, 'name', 'email', NULL, NULL, NULL),
(39, 3, NULL, '', NULL, NULL, NULL),
(40, 3, 'AA', 'b@g.com', NULL, NULL, NULL),
(41, 3, 'name', 'email@email.com', NULL, NULL, NULL),
(42, 3, 'fffff', 'f@n.jjj', NULL, NULL, NULL),
(43, 3, 'dddd', 'dddd@www.com', NULL, NULL, NULL),
(44, 3, 'ddd@aa.com', 'ddd@aaa.com', NULL, NULL, NULL),
(45, 3, 'me', 'me@you.we', NULL, NULL, NULL),
(46, 3, 'Anamul Habib', 'anamulht@gmail.com', NULL, NULL, NULL),
(47, 3, 'a maul', 'a@b.com', NULL, NULL, NULL),
(48, 3, 'Anamul Habib', 'anamul.habib@icebd.com', NULL, NULL, NULL),
(49, 3, 'aaa', 'bb@bb.com', NULL, NULL, NULL),
(50, 3, 'trtr', 'ffd@vb.vv', NULL, NULL, NULL),
(51, 3, 'James', 'james@baul.com', NULL, NULL, NULL),
(52, 3, 'aa', 'aa@ad.com', NULL, NULL, NULL),
(53, 3, 'asif', 'asif.malik@gmail.com', NULL, NULL, NULL),
(54, 3, 'AA', 'abc@dd.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_log_tbl`
--

CREATE TABLE IF NOT EXISTS `notification_log_tbl` (
  `id` int(11) NOT NULL,
  `ref_deals_id` int(11) NOT NULL,
  `success` int(11) DEFAULT NULL,
  `fails` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_log_tbl`
--

INSERT INTO `notification_log_tbl` (`id`, `ref_deals_id`, `success`, `fails`, `date`) VALUES
(1, 21, 1, 0, '2017-04-27 05:04:35'),
(2, 20, 1, 0, '2017-04-27 05:40:15'),
(4, 26, NULL, NULL, '2017-04-27 13:41:28'),
(5, 27, 2, 1, '2017-04-30 11:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `notification_message_tbl`
--

CREATE TABLE IF NOT EXISTS `notification_message_tbl` (
  `id` int(11) NOT NULL,
  `ref_deals_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_message_tbl`
--

INSERT INTO `notification_message_tbl` (`id`, `ref_deals_id`, `image`, `title`, `date`) VALUES
(1, 27, '20170430111931.png', 'UPTO 40% OFF VOGUE LIFESTYLE LOUNGE SERVICES', '2017-04-30 11:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `reject_message_tbl`
--

CREATE TABLE IF NOT EXISTS `reject_message_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reject_message_tbl`
--

INSERT INTO `reject_message_tbl` (`id`, `title`, `details`) VALUES
(1, 'false-news', 'falsenews');

-- --------------------------------------------------------

--
-- Table structure for table `role_tbl`
--

CREATE TABLE IF NOT EXISTS `role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog_tbl`
--
ALTER TABLE `activitylog_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_details`
--
ALTER TABLE `address_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user_tbl`
--
ALTER TABLE `admin_user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_address_tbl`
--
ALTER TABLE `brand_address_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_dealinfo_tbl`
--
ALTER TABLE `brand_dealinfo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_list`
--
ALTER TABLE `brand_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_user_tbl`
--
ALTER TABLE `brand_user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_info_tbl`
--
ALTER TABLE `device_info_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_tbl`
--
ALTER TABLE `favorite_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_grd_log_tbl`
--
ALTER TABLE `message_grd_log_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_grd_tbl`
--
ALTER TABLE `message_grd_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_log_tbl`
--
ALTER TABLE `message_log_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_user_tbl`
--
ALTER TABLE `mobile_user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_log_tbl`
--
ALTER TABLE `notification_log_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_message_tbl`
--
ALTER TABLE `notification_message_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reject_message_tbl`
--
ALTER TABLE `reject_message_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_tbl`
--
ALTER TABLE `role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog_tbl`
--
ALTER TABLE `activitylog_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `address_details`
--
ALTER TABLE `address_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `admin_user_tbl`
--
ALTER TABLE `admin_user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand_address_tbl`
--
ALTER TABLE `brand_address_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `brand_dealinfo_tbl`
--
ALTER TABLE `brand_dealinfo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `brand_list`
--
ALTER TABLE `brand_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `brand_user_tbl`
--
ALTER TABLE `brand_user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `device_info_tbl`
--
ALTER TABLE `device_info_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `favorite_tbl`
--
ALTER TABLE `favorite_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=297;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `message_grd_log_tbl`
--
ALTER TABLE `message_grd_log_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_grd_tbl`
--
ALTER TABLE `message_grd_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `message_log_tbl`
--
ALTER TABLE `message_log_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `mobile_user_tbl`
--
ALTER TABLE `mobile_user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `notification_log_tbl`
--
ALTER TABLE `notification_log_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notification_message_tbl`
--
ALTER TABLE `notification_message_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reject_message_tbl`
--
ALTER TABLE `reject_message_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_tbl`
--
ALTER TABLE `role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
