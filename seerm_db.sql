-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 06:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seerm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` int(3) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role`, `created_date`) VALUES
(1, 'admin', '', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-10-01 13:23:49'),
(2, 'anji', '', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2020-11-12 19:55:39'),
(3, 'Ad', '', '25f9e794323b453885f5181f1b624d0b', 2, '2020-11-12 19:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `id` bigint(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `state` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `aadhar_number` varchar(40) NOT NULL,
  `pan_no` varchar(12) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(4) NOT NULL,
  `area_of_expertise` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `name`, `email`, `password`, `phone`, `state`, `city`, `aadhar_number`, `pan_no`, `role`, `status`, `area_of_expertise`, `created_date`) VALUES
(6, 'anji', 'anji@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8008172097', 'AP', 'hyd', '', '', 'admin', 1, 'Auditing and Compliance,Annual Filing', '2020-10-01 13:13:36'),
(8, 'ramesh', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9494874443', 'AP', 'hyd', '', '', 'advisor', 1, 'Company Registration', '2020-10-01 13:46:10'),
(9, 'suresh', 'suersh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9000101211', 'TS', 'Hyderabad', '', '', 'advisor', 0, 'Trademark Registration', '2020-10-01 15:26:22'),
(10, 'Sashi', 'sashidhar.value@gmail.com', 'd4574e41059080f2de5e5b9550ba7062', '9000013940', 'AP', 'Hyderabad', '', '', 'advisor', 0, 'Company Registration', '2020-10-08 19:16:42'),
(12, 'Ad', 'asa@asas.com', 'a29d1598024f9e87beab4b98411d48ce', '1234567891', 'TS', 'Hyderbad', '', '', 'advisor', 0, 'Company Registration', '2020-10-10 18:11:26'),
(13, 'Sashigst', 'sashidhar.value@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9999999999', 'AP', 'KKD', '', '', 'advisor', 1, 'Company Registration,Auditing and Compliance,Trademark Registration,Annual Filing,GST', '2020-10-13 21:21:24'),
(14, 'venkateshh', 'venkateshh4589@gmail.com', 'a46eb306864970fee1198f4e2e8ffc70', '9704166639', 'TS', 'HYDERABAD', '', '', 'advisor', 0, '', '2020-10-20 10:40:08'),
(15, 'Trademark Advisor', 'asa@asas.com', 'eabc3287326b6f9dd0c3bd15521b51fd', '9000001221', 'AP', 'Hyderabad', '', '', 'advisor', 0, 'Trademark Registration', '2020-10-23 10:07:02'),
(16, 'AnnualFiling Advisor', 'venkateshh4589@gmail.com', 'd4574e41059080f2de5e5b9550ba7062', '9440666682', 'AP', 'Hyderabad', '', '', 'advisor', 0, 'Company Registration,Trademark Registration,Annual Filing', '2020-10-23 17:55:11'),
(17, 'Login', 'a@a.com', '25f9e794323b453885f5181f1b624d0b', '8008288441', 'AP', 'Hyderabad', '', '', 'advisor', 1, 'Auditing and Compliance', '2020-10-23 18:02:52'),
(18, 'Ad', 'sas@saasas.com', '25f9e794323b453885f5181f1b624d0b', '9000013442', 'AP', 'Hyderabad', '9893892232323', 'q234n23n42', 'advisor', 1, 'Auditing and Compliance', '2020-11-12 19:58:46'),
(19, 'PF Advisor', 'qweq@sdfsdf.com', '827ccb0eea8a706c4c34a16891f84e7b', '8008288443', 'AP', 'Hyderabad', '989238923423423', 'Afwerwdwer', 'advisor', 1, 'PF', '2021-02-06 07:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(12) NOT NULL,
  `sr_id` int(6) NOT NULL,
  `comment` text NOT NULL,
  `created_by` enum('1','2','3','') NOT NULL,
  `name` varchar(20) NOT NULL,
  `uploaded_docs` varchar(255) NOT NULL,
  `uploads_count` int(6) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp(),
  `comment_private` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `sr_id`, `comment`, `created_by`, `name`, `uploaded_docs`, `uploads_count`, `created_date`, `updated_date`, `comment_private`) VALUES
(4, 149, 'hi this is the private message between advisor and admin', '1', '', '[]', 0, '2020-10-10 21:32:50', '2020-10-10 21:32:50', 1),
(5, 149, 'this is the public message visible to the customer also', '1', '', '[]', 0, '2020-10-10 21:37:04', '2020-10-10 21:37:04', 0),
(6, 149, '  Hi  I am customer from 149 request reagarding company registration', '3', '', '[]', 0, '2020-10-10 21:38:36', '2020-10-10 21:38:36', 0),
(7, 166, 'Test Message', '1', '', '[]', 0, '2020-10-12 20:57:28', '2020-10-12 20:57:28', 0),
(8, 177, 'test message', '1', '', '[]', 0, '2020-10-13 03:11:36', '2020-10-13 03:11:36', 0),
(9, 177, 'Test mssage 2', '1', '', '[]', 0, '2020-10-13 03:11:56', '2020-10-13 03:11:56', 0),
(10, 177, 'Hi Advisor, please call to customer and take up this work', '2', '', '[]', 0, '2020-10-23 17:57:50', '2020-10-23 17:57:50', 0),
(11, 178, 'I am admin , please close this work', '2', '', '[]', 0, '2020-10-23 18:05:21', '2020-10-23 18:05:21', 0),
(12, 178, 'OK admin i will check it aftr calling customer', '2', '', '[]', 0, '2020-10-23 18:05:56', '2020-10-23 18:05:56', 0),
(13, 178, 'we started your work, please uploa your documents', '1', '', '[]', 0, '2020-10-23 18:09:39', '2020-10-23 18:09:39', 0),
(14, 178, 'Looks like this customer did not clear his dues, please follow up', '1', '', '[]', 0, '2020-10-23 18:10:33', '2020-10-23 18:10:33', 1),
(15, 178, 'i am uploading documents', '3', '', '[\"pp.txt\"]', 1, '2020-10-23 18:14:12', '2020-10-23 18:14:12', 0),
(16, 180, 'Received payment through Google Pay', '1', '', '[]', 0, '2020-10-23 18:33:20', '2020-10-23 18:33:20', 0),
(17, 181, 'Hi Customer, please pay 20,000 thorigh this link\r\n\r\n', '1', '', '[]', 0, '2020-10-23 18:33:47', '2020-10-23 18:33:47', 0),
(18, 180, 'please pay using this link\r\n\r\nhttps://imjo.in/pajfAT', '1', '', '[]', 0, '2020-10-23 18:35:57', '2020-10-23 18:35:57', 0),
(19, 181, 'Test Message', '1', '', '[]', 0, '2020-10-26 23:28:55', '2020-10-26 23:28:55', 0),
(20, 181, 'test', '1', '', '[\"users.doc.docx\"]', 1, '2020-10-26 23:32:31', '2020-10-26 23:32:31', 0),
(21, 179, 'dear shasi gst docs are uploaded here pls find ', '1', '', '[\"PfMPChallengerQuestionBank.csv\"]', 1, '2020-10-27 07:38:19', '2020-10-27 07:38:19', 0),
(22, 179, 'hi second doc', '1', '', '[\"student_tsc (6).xlsx\"]', 1, '2020-10-27 07:39:18', '2020-10-27 07:39:18', 0),
(23, 177, 'asda', '1', '', '[]', 0, '2020-11-12 20:01:57', '2020-11-12 20:01:57', 0),
(24, 177, 'sa', '1', '', '[]', 0, '2020-11-12 20:02:12', '2020-11-12 20:02:12', 0),
(25, 181, 'gjjg', '1', '', '[]', 0, '2020-11-12 20:06:29', '2020-11-12 20:06:29', 0),
(26, 179, 'fhgj', '1', '', '[]', 0, '2020-11-12 20:07:03', '2020-11-12 20:07:03', 0),
(27, 178, 'vvn', '2', '', '[]', 0, '2020-11-12 20:14:40', '2020-11-12 20:14:40', 0),
(28, 178, 'vvn', '2', '', '[]', 0, '2020-11-12 20:14:40', '2020-11-12 20:14:40', 0),
(29, 178, 'please send documents before 10 Nov, else this ticket will be closed', '2', '', '[]', 0, '2020-11-12 20:17:20', '2020-11-12 20:17:20', 0),
(30, 178, 'please send documents before 10 Nov, else this ticket will be closed', '2', '', '[]', 0, '2020-11-12 20:17:20', '2020-11-12 20:17:20', 0),
(31, 178, 'ghgjhgj', '3', '', '[]', 0, '2020-11-12 20:25:45', '2020-11-12 20:25:45', 0),
(32, 178, 'ghgjhgj new', '3', '', '[]', 0, '2020-11-12 20:26:16', '2020-11-12 20:26:16', 0),
(33, 180, 'one doc attached', '1', '', '[\"code_designs_doc.docx\"]', 1, '2020-11-15 08:34:51', '2020-11-15 08:34:51', 0),
(34, 180, 'one doc', '1', '', '[\"code_designs_doc.docx\"]', 1, '2020-11-15 08:39:19', '2020-11-15 08:39:19', 0),
(35, 183, 'Test', '1', 'admin', '[]', 0, '2021-02-02 08:19:18', '2021-02-02 08:19:18', 0),
(36, 183, 'Tes 2', '1', 'admin', '[]', 0, '2021-02-02 08:19:46', '2021-02-02 08:19:46', 0),
(37, 175, 'sadsfasd', '2', 'ramesh', '[]', 0, '2021-02-02 08:20:36', '2021-02-02 08:20:36', 0),
(38, 183, 'Test', '2', 'ramesh', '[]', 0, '2021-02-02 08:22:55', '2021-02-02 08:22:55', 0),
(39, 183, 'test doc', '1', 'admin', '[\"ppt_5ff832200e3c5.ppt\"]', 1, '2021-02-03 22:00:04', '2021-02-03 22:00:04', 0),
(40, 183, 'two files selected  for this comment', '1', 'admin', '[\"ppt_5ff832200e3c5.ppt\",\"ppt_5dbd2f6d612ab.pdf\"]', 2, '2021-02-03 22:06:08', '2021-02-03 22:06:08', 0),
(41, 185, 'This is a test message', '2', 'PF Advisor', '[\"WhatsApp Image 2021-02-03 at 15.26.27.jpeg\"]', 1, '2021-02-06 07:43:34', '2021-02-06 07:43:34', 0),
(42, 185, 'Test message 1', '2', 'PF Advisor', '[]', 0, '2021-02-06 07:47:36', '2021-02-06 07:47:36', 0),
(43, 185, 'Test message 1', '2', 'PF Advisor', '[]', 0, '2021-02-06 07:47:36', '2021-02-06 07:47:36', 0),
(44, 186, 'PF advisor , please take this and contact customer for more details.', '1', 'admin', '[]', 0, '2021-02-06 07:51:22', '2021-02-06 07:51:22', 0),
(45, 186, 'Sure Admin', '2', 'PF Advisor', '[]', 0, '2021-02-06 07:52:36', '2021-02-06 07:52:36', 0),
(46, 186, 'Test Message', '1', 'admin', '[\"WhatsApp Image 2021-02-03 at 15.26.27.jpeg\"]', 1, '2021-02-06 07:54:37', '2021-02-06 07:54:37', 0),
(47, 186, 'Test Message \r\n\r\n', '1', 'admin', '[\"WhatsApp Image 2021-02-03 at 15.26.27.jpeg\"]', 1, '2021-02-06 07:55:50', '2021-02-06 07:55:50', 0),
(48, 187, 'hi ur ticket is unser proces ', '1', 'admin', '[]', 0, '2021-02-16 03:07:53', '2021-02-16 03:07:53', 0),
(49, 175, 'I completed my work, here is the GST form', '2', 'ramesh', '[]', 0, '2021-03-25 20:59:35', '2021-03-25 20:59:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(6) NOT NULL,
  `customer_sr_id` int(5) NOT NULL,
  `customer_sr_category` varchar(30) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `customer_email` varchar(55) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` bigint(11) NOT NULL,
  `due_date` datetime NOT NULL,
  `opportunity_cost` int(4) NOT NULL,
  `opportunity_status` varchar(20) NOT NULL,
  `lead_status` varchar(25) NOT NULL,
  `priority` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_sr_id`, `customer_sr_category`, `customer_name`, `title`, `customer_email`, `customer_password`, `customer_phone`, `due_date`, `opportunity_cost`, `opportunity_status`, `lead_status`, `priority`, `created_date`, `updated_date`) VALUES
(10, 149, 'Company Registration', 'anji', 'test', 'anjikatakam@gmail.com', 'f80acb518605dc27dfff68ff8f0eb1a9', 8008172097, '2020-10-28 00:00:00', 5, 'Work In Progress', 'Hot Lead', 'high', '2020-10-10 21:28:45', '2020-10-10 21:28:45'),
(11, 150, 'GST', 'anji reddy', 'gst enqiry', 'anjikatakam@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 947545545445, '2020-10-30 00:00:00', 2, 'New', 'Warm Lead', 'medium', '2020-10-10 21:41:16', '2020-10-10 21:41:16'),
(12, 166, 'Company Registration', 'Test', 'test555555', 'test@test.com', 'd41d8cd98f00b204e9800998ecf8427e', 2222222222, '0000-00-00 00:00:00', 100, 'New', 'Cold Lead', 'medium', '2020-10-12 20:59:59', '2020-10-12 20:59:59'),
(13, 177, 'Annual Filing', 'Sashiistestingnow', 'Annual Registration', 'sashi@sashi.com', 'd41d8cd98f00b204e9800998ecf8427e', 90000000, '2020-10-26 00:00:00', 2500, 'New', 'Hot Lead', 'high', '2020-10-13 03:08:59', '2020-10-13 03:08:59'),
(14, 178, 'Auditing and Compliance', 'Sashi', 'need', 'sashidhar.value@gmail.com', '09ed92e5211b3f97d64f1bf629dd22c4', 0, '2020-10-27 00:00:00', 0, 'Work In Progress', 'Warm Lead', 'high', '2020-10-23 18:07:59', '2020-10-23 18:07:59'),
(15, 180, 'Annual Filing', 'Customer1', 'veryurgent', 'c@c.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '2020-10-25 00:00:00', 5000, 'Qualified', 'Hot Lead', 'high', '2020-10-23 18:23:07', '2020-10-23 18:23:07'),
(16, 181, 'Annual Filing', 'some', 'Taxfiling', 'f@d.com', 'd41d8cd98f00b204e9800998ecf8427e', 2343, '2020-10-27 00:00:00', 500, 'Qualified', 'Hot Lead', 'high', '2020-10-23 18:29:32', '2020-10-23 18:29:32'),
(17, 179, 'GST', 'Venkateshh', 'I need GST Registration', 'anjikatakam@gmail.com', 'cfa717d104d282ccfaa87aa66b33c923', 8008172097, '2020-10-30 00:00:00', 4, 'Work In Progress', 'Hot Lead', 'high', '2020-10-27 07:48:39', '2020-10-27 07:48:39'),
(18, 177, 'Annual Filing', 'Sashidhar Penumala', 'Annual Registration', 'sashidhar.value@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 90000000, '2020-10-26 00:00:00', 2500, 'Work In Progress', 'Hot Lead', 'high', '2020-11-12 20:23:07', '2020-11-12 20:23:07'),
(19, 183, 'Company Registration', 'Sashi', 'Sashi is Testing 2-feb', 'sashi@Sashi1.com', 'd41d8cd98f00b204e9800998ecf8427e', 9000000000, '2100-02-03 00:00:00', 20, 'New', 'Hot Lead', 'high', '2021-02-02 08:22:02', '2021-02-02 08:22:02'),
(20, 184, 'Auditing and Compliance', 'Anji reddy', 'feb04srreq', 'anjitest@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 7879878754, '2021-02-27 00:00:00', 5, 'New', 'Warm Lead', 'low', '2021-02-03 21:50:16', '2021-02-03 21:50:16'),
(21, 184, 'Auditing and Compliance', 'Anji reddy', 'feb04srreq', 'anjikatakam.php@gmail.com', '97e0e4e79544a7d4ee6d0d6c3ccb2162', 7879878754, '2021-02-06 00:00:00', 5, 'Work In Progress', 'Warm Lead', 'low', '2021-02-03 22:08:18', '2021-02-03 22:08:18'),
(22, 185, 'PF', 'Ramesh', 'Feb6', 'asdasda@qweqwe.com', 'd41d8cd98f00b204e9800998ecf8427e', 9000013940, '2221-08-31 00:00:00', 34, 'New', 'Hot Lead', 'high', '2021-02-06 07:42:27', '2021-02-06 07:42:27'),
(23, 186, 'PF', 'Feb5', 'Feb62', 'qw2@wwe.com', 'd41d8cd98f00b204e9800998ecf8427e', 8008288125, '2221-08-31 00:00:00', 23, 'New', 'Hot Lead', 'high', '2021-02-06 07:50:49', '2021-02-06 07:50:49'),
(24, 187, 'GST', 'Anjaneyl', 'GST enqir', 'test@gmail.com', '28f1e5da7198404f6f3fc7ed39586188', 8008172097, '2021-02-25 00:00:00', 5, 'Work In Progress', 'Warm Lead', 'high', '2021-02-16 03:06:45', '2021-02-16 03:06:45'),
(25, 190, 'Auditing and Compliance', 'Anji', 'GST Registration ', 'sad@asda.com', '9d76e7894dcc1314f108ce191a3bb053', 8088923423, '2021-03-31 00:00:00', 20, 'Work In Progress', 'Hot Lead', 'medium', '2021-03-25 20:58:23', '2021-03-25 20:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `sr_categories`
--

CREATE TABLE `sr_categories` (
  `sc_id` int(6) NOT NULL,
  `sr_category` varchar(40) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sr_categories`
--

INSERT INTO `sr_categories` (`sc_id`, `sr_category`, `created_date`, `updated_date`) VALUES
(1, 'Company Registration', '2020-09-30 19:24:53', '2020-09-30 19:24:53'),
(2, 'Auditing and Compliance', '2020-09-30 19:24:53', '2020-09-30 19:24:53'),
(3, 'Trademark Registration', '2020-09-30 19:25:18', '2020-09-30 19:25:18'),
(4, 'Annual Filing', '2020-09-30 19:25:18', '2020-09-30 19:25:18'),
(5, 'GST', '2020-09-30 19:25:33', '2020-09-30 19:25:33'),
(6, 'PF', '2020-10-23 18:01:00', '2020-10-23 18:01:00'),
(7, 'Business Registrations', '2020-10-23 18:18:49', '2020-10-23 18:18:49'),
(8, 'Business Maintenance', '2020-10-23 18:19:01', '2020-10-23 18:19:01'),
(9, 'Income tax ', '2020-10-26 00:01:29', '2020-10-26 00:01:29'),
(10, 'incometax expert', '2020-10-27 07:41:39', '2020-10-27 07:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `sr_requests`
--

CREATE TABLE `sr_requests` (
  `sr_request` bigint(12) NOT NULL,
  `title` varchar(85) NOT NULL,
  `sr_category` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact_number` bigint(12) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(45) NOT NULL,
  `city` varchar(25) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `due_date` date DEFAULT NULL,
  `opportunity_cost` int(6) NOT NULL,
  `lead_status` varchar(25) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `opportunity_status` varchar(20) NOT NULL,
  `advisor` varchar(50) NOT NULL,
  `upload_files` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sr_requests`
--

INSERT INTO `sr_requests` (`sr_request`, `title`, `sr_category`, `description`, `contact_number`, `customer_name`, `email`, `location`, `city`, `created_date`, `due_date`, `opportunity_cost`, `lead_status`, `priority`, `opportunity_status`, `advisor`, `upload_files`) VALUES
(149, 'test', 'Company Registration', 'test request service description', 8008172097, 'anji', 'anjikatakam@gmail.com', '', '', '2020-10-10 21:22:22', '2020-10-28', 5, 'Hot Lead', 'high', 'Work In Progress', '8', ''),
(150, 'gst enqiry', 'GST', 'gst desc', 947545545445, 'anji reddy', 'anjikatakam@gmail.com', '', '', '2020-10-10 21:40:27', '2020-10-30', 2, 'Warm Lead', 'medium', 'Qualified', '', ''),
(155, 'hi', 'Company Registration', 'hi', 9745454545, '', '', '', '', '2020-10-11 20:26:59', NULL, 0, 'Warm Lead', '', 'Done', '', ''),
(156, 'ssdfsdf', 'Company Registration', 'sdfd', 2323232323, '', '', '', '', '2020-10-11 20:29:02', NULL, 0, 'Warm Lead', '', 'Closed', '', ''),
(157, 'test', 'Annual Filing', 'test', 4444444444, '', '', '', '', '2020-10-11 20:30:18', NULL, 0, 'Warm Lead', '', 'Closed', '', ''),
(158, 'test2', 'Auditing and Compliance', 'test', 5555555, '', '', '', '', '2020-10-11 20:30:54', NULL, 0, 'Warm Lead', '', 'Qualified', '', ''),
(159, 'test4', 'Company Registration', 'test4', 5555555555, '', '', '', '', '2020-10-11 20:31:08', NULL, 0, 'Warm Lead', '', 'Done', '', ''),
(160, 'tes', 'Company Registration', 'sdf', 34234343, '', '', '', '', '2020-10-11 20:31:37', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(161, 'tes', 'Company Registration', 'sdf', 34234343, '', '', '', '', '2020-10-11 20:31:38', NULL, 0, 'Warm Lead', '', 'Closed', '', ''),
(162, 'test333', 'Company Registration', 'test', 0, '', '', '', '', '2020-10-11 20:31:59', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(163, 'test5555555', 'Company Registration', 'erererer', 2323232, '', '', '', '', '2020-10-11 20:32:40', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(164, 'test67675', 'Auditing and Compliance', 's', 44445, '', '', '', '', '2020-10-11 20:35:23', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(165, 'test444444', 'Annual Filing', 't', 333333, '', '', '', '', '2020-10-11 20:35:52', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(166, 'test555555', 'Company Registration', 'sdf', 2222222222, 'Test', 'test@test.com', '', '', '2020-10-11 20:36:11', '0000-00-00', 100, 'Cold Lead', 'medium', 'New', '8', ''),
(168, 'testtoday', 'Company Registration', 'ddd', 232323232, '', '', '', '', '2020-10-12 21:03:56', NULL, 0, 'Warm Lead', '', 'New', '10', ''),
(171, 'sss', 'Company Registration', 'sdfd', 2323, '', '', '', '', '2020-10-12 21:26:57', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(172, 'sss', 'Company Registration', 'sdfd', 2323, '', '', '', '', '2020-10-12 21:26:57', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(173, 'sssdddddddd', 'Company Registration', 'ssss', 0, '', '', '', '', '2020-10-12 21:27:21', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(174, 'sssdddddddd', 'Company Registration', 'ssss', 0, '', '', '', '', '2020-10-12 21:27:21', NULL, 0, 'Warm Lead', '', 'New', '12', ''),
(175, 'pppppppppp', 'Company Registration', 'sss', 33, '', '', '', '', '2020-10-12 21:28:04', NULL, 0, 'Warm Lead', '', 'New', 'ramesh', ''),
(176, 'Sashi is Testing', 'Trademark Registration', 'Sashi s Testing', 111111111, '', '', '', '', '2020-10-12 21:35:28', NULL, 0, 'Warm Lead', '', 'New', '9', ''),
(177, 'Annual Registration', 'Annual Filing', 'I am i need for my annual edirting', 90000000, 'Sashidhar Penumala', 'sashidhar.value@gmail.com', 'L1', 'C1', '2020-10-12 21:39:55', '2020-10-26', 2500, 'Hot Lead', 'high', 'Work In Progress', '16', ''),
(178, 'need', 'Auditing and Compliance', 'dsf', 0, 'Sashi', 'sashidhar.value@gmail.com', 'Hyderabad', 'Hyderabad', '2020-10-23 09:57:47', '2020-10-27', 0, 'Warm Lead', 'high', 'Work In Progress', 'Ad', ''),
(179, 'I need GST Registration', 'GST', 'gst', 8008172097, 'Venkateshh', 'anjikatakam@gmail.com', 'Hyderabad', 'Hyderabad', '2020-10-23 10:04:00', '2020-10-30', 4, 'Hot Lead', 'high', 'Work In Progress', 'Sashigst', ''),
(180, 'veryurgent', 'Annual Filing', 'dfsdf', 0, 'Customer1', 'c@c.com', 'Gunti', 'Guntur', '2020-10-23 18:22:15', '2020-10-25', 5000, 'Hot Lead', 'high', 'Qualified', '13', ''),
(181, 'Taxfiling', 'Annual Filing', 'fsdfs', 2343, 'some', 'f@d.com', '', '', '2020-10-23 18:27:08', '2020-10-27', 500, 'Hot Lead', 'high', 'Qualified', '', ''),
(182, 'ticket31jan2021', 'Company Registration', 'hi', 898155424, '', '', '', '', '2021-01-30 20:46:59', NULL, 0, 'Warm Lead', '', 'New', '', ''),
(183, 'Sashi is Testing 2-feb', 'Company Registration', 'Sashi is Testing 2-feb Sashi is Testing 2-feb Sashi is Testing 2-feb Sashi is Testing 2-feb Sashi is Testing 2-feb Sashi is Testing 2-feb Sashi is Testing 2-feb Sashi is Testing 2-feb', 9000000000, 'Sashi', 'sashi@Sashi1.com', '', '', '2021-02-02 08:18:47', '2100-02-03', 20, 'Hot Lead', 'high', 'New', 'ramesh', ''),
(184, 'feb04srreq', 'Auditing and Compliance', 'feb4Thursday', 7879878754, 'Anji reddy', 'anjikatakam.php@gmail.com', '', '', '2021-02-03 21:49:28', '2021-02-06', 5, 'Warm Lead', 'low', 'Work In Progress', '', ''),
(185, 'Feb6', 'PF', 'eFEb6', 9000013940, 'Ramesh', 'asdasda@qweqwe.com', '', '', '2021-02-06 07:36:59', '2221-08-31', 34, 'Hot Lead', 'high', 'New', 'PF Advisor', ''),
(186, 'Feb62', 'PF', 'feb62', 8008288125, 'Feb5', 'qw2@wwe.com', 'Hyderabad', 'Hyderabad', '2021-02-06 07:49:35', '2221-08-31', 23, 'Hot Lead', 'high', 'New', 'PF Advisor', ''),
(187, 'GST enqir', 'GST', 'gdfgf', 8008172097, 'Anjaneyl', 'test@gmail.com', '', '', '2021-02-16 03:04:41', '2021-02-25', 5, 'Warm Lead', 'high', 'Work In Progress', 'Sashigst', ''),
(188, 'HGEKFDLLCUOS5TLM42ANLEGH http://google.com/638', 'Business Registrations', '', 0, 'HGEKFDLLCUOS5TLM42ANLEGH http://google.c', 'jayheisavetheworld@gmail.com', 'ÃÂ ÃÂ¾Ã‘ÂÃ‘ÂÃÂ¸Ã‘Â', 'ÃÅ“ÃÂ¾Ã‘ÂÃÂºÃÂ²ÃÂ°', '2021-03-04 03:48:53', NULL, 0, '', '', 'New', '', ''),
(189, 'Tes', 'Auditing and Compliance', '', 0, 'Sashi', 'sashi@sashi.com', 'Hyderabad', 'Hyderabad', '2021-03-25 20:18:34', NULL, 0, '', '', 'New', 'Sashigst', ''),
(190, 'GST Registration ', 'Auditing and Compliance', 'GST Registration ', 8088923423, 'Anji', 'sad@asda.com', '', '', '2021-03-25 20:56:38', '2021-03-31', 20, 'Hot Lead', 'medium', 'Work In Progress', '', ''),
(191, 'asdasdf', 'Trademark Registration', '', 0, 'Venkatv', 'venat@asd.com', 'Hyderabad', 'Hyderabad', '2021-03-25 21:02:08', NULL, 0, '', '', 'New', 'Sashigst', '');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(6) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_code`, `created_date`) VALUES
(1, 'Andhra Pradesh', 'AP', '2020-10-01 10:08:47'),
(2, 'Telangana', 'TS', '2020-10-01 10:08:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `sr_categories`
--
ALTER TABLE `sr_categories`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indexes for table `sr_requests`
--
ALTER TABLE `sr_requests`
  ADD PRIMARY KEY (`sr_request`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advisors`
--
ALTER TABLE `advisors`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sr_categories`
--
ALTER TABLE `sr_categories`
  MODIFY `sc_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sr_requests`
--
ALTER TABLE `sr_requests`
  MODIFY `sr_request` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
