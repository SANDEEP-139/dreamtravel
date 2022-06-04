-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 06:27 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clickbox_eventmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `hm_admin`
--

CREATE TABLE `hm_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `updated_date` datetime NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `last_activity_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hm_admin`
--

INSERT INTO `hm_admin` (`id`, `username`, `profile`, `email`, `password`, `status`, `updated_date`, `confirm_code`, `last_activity_time`) VALUES
(1, 'admin', 'profileimage/32298972.png', 'abhi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2020-07-03 05:45:09', '', '2021-07-03 05:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `hm_event`
--

CREATE TABLE `hm_event` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_image` text NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_start_time` varchar(100) NOT NULL,
  `event_end_time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hm_event`
--

INSERT INTO `hm_event` (`id`, `user_id`, `event_title`, `event_image`, `short_description`, `long_description`, `country`, `city`, `zipcode`, `address`, `event_start_date`, `event_end_date`, `event_start_time`, `event_end_time`, `status`, `created_date`, `updated_date`) VALUES
(1, 0, 'The Walking Dead', '', '<p>IN YOUR TIME-ZONE: PLAY A RHYTHM ON ANYTHING YOU HAVE (DRUMS, PANS, TREES, CLAP, etc.) KEEPING THE BEAT OF THE &#39;SECONDS TICKING ON THE ATOMIC CLOCK ON THIS APP - &#39;TIME-TO-ALIGN.&nbsp; OUR WORLD WILL BEAT AS ONE!</p>\r\n', '<p><span style=\"color: rgb(40, 40, 40); font-family: Poppins, sans-serif; font-size: 14px;\">Lorem Ipsum is simply dummy text</span></p>\r\n', 'USA', 'OAK PARK', '887987', '767 DEER RUN LANE', '2021-07-30', '2020-01-07', '12:00 AM', '01:30 AM', 1, '2020-07-17 14:12:45', '2020-07-04 19:22:57'),
(2, 0, 'new event', '', '<p>jhgjhgh</p>\r\n', '<p>hkgkugkuiyo kjgkjb</p>\r\n', 'india', 'AZAMGARH', '276202', 'vill+post gosain ki bazar,gomadih tehsil-lalganj', '2021-07-21', '2021-07-23', '12:30 AM', '01:00 AM', 1, '2020-07-04 19:05:06', '2020-07-06 15:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `hm_user`
--

CREATE TABLE `hm_user` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hm_user`
--

INSERT INTO `hm_user` (`id`, `event_id`, `name`, `email`, `phone`, `country`, `city`, `address`, `status`, `created_date`, `updated_date`) VALUES
(1, 1, 'abhi', 'ABHIAZM688@GMAIL.COM', 7880367299, '675577578', 'AZAMGARH', 'vill+post gosain ki bazar,gomadih tehsil-lalganj', 1, '2020-07-04 03:37:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(35) NOT NULL,
  `marks` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`student_id`, `student_name`, `marks`) VALUES
(1, 'John', 39),
(2, 'Mary ', 46),
(3, 'Maya', 65),
(4, 'Rahul', 90),
(5, 'Priya', 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hm_admin`
--
ALTER TABLE `hm_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hm_event`
--
ALTER TABLE `hm_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hm_user`
--
ALTER TABLE `hm_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hm_admin`
--
ALTER TABLE `hm_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hm_event`
--
ALTER TABLE `hm_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hm_user`
--
ALTER TABLE `hm_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
