-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2020 at 08:44 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saveold`
--

-- --------------------------------------------------------

--
-- Table structure for table `elderlypeople`
--

CREATE TABLE `elderlypeople` (
  `ep_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ep_key` text NOT NULL,
  `ep_name` text NOT NULL,
  `ep_lastname` text NOT NULL,
  `ep_birthday` text NOT NULL,
  `ep_sex` tinyint(4) NOT NULL,
  `ep_height` int(11) NOT NULL,
  `ep_weight` int(11) NOT NULL,
  `ep_adress` text NOT NULL,
  `ep_img` text NOT NULL,
  `ep_nameCaretaker` text NOT NULL,
  `ep_numberphone` text NOT NULL,
  `ep_numberphone_1` text NOT NULL,
  `ep_numberphone_2` text NOT NULL,
  `ep_linetoken` text NOT NULL,
  `ep_linetoken_1` text NOT NULL,
  `ep_linetoken_2` text NOT NULL,
  `ep_lat` double NOT NULL,
  `ep_long` double NOT NULL,
  `ep_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `elderlypeople`
--

INSERT INTO `elderlypeople` (`ep_id`, `user_id`, `ep_key`, `ep_name`, `ep_lastname`, `ep_birthday`, `ep_sex`, `ep_height`, `ep_weight`, `ep_adress`, `ep_img`, `ep_nameCaretaker`, `ep_numberphone`, `ep_numberphone_1`, `ep_numberphone_2`, `ep_linetoken`, `ep_linetoken_1`, `ep_linetoken_2`, `ep_lat`, `ep_long`, `ep_update`) VALUES
(83, 77, '1d826ca0d73e', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2019-09-09 09:50:38'),
(84, 78, 'cefbfd6992fe', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2019-09-09 09:51:25'),
(85, 79, '68b066016b72', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2019-09-09 09:54:22'),
(86, 80, 'e5747349d65f', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2019-09-09 09:54:23'),
(87, 81, '5e9d3530463d', 'เราเอง', 'Thegame', '10/26/1994', 1, 167, 50, '36 / 4 ม.2 ต.พานทอง', '5e9d3530463d.jpg', 'บดีศร', '0987827478', '0987827477', '0987827476', 'nXmPIlHiQvk7is9JokfOKulHVN8EaKEQtJOqpOrknXd', 'SVHlx8rD6OH4hIspGlVqt91FSWGnMRofouYIxSGMPsQ', 'KnYh76jIkZa9HvQG5uxiKuQue8LQPBL8YCwSd1yukZV', 13.46706378656876, 101.08661675908661, '2019-10-03 12:43:39'),
(88, 82, '34d59b344640', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2019-09-09 11:04:01'),
(89, 83, 'd2ad2b3503bf', 'บุญยง', 'มั่นคง', '07/06/1995', 1, 160, 54, '34 / 8 ม.100 ต.เนินหอม', 'd2ad2b3503bf.jpg', 'Yupin', '0864029597', '', '', 'J8p2VjZFwFtY6eVczbSCgS0EmSI75wE7ZKveiNlhlaj', 'wjEoYTHYUqtGtRbWNxiwktqtXMpSRdkWoo3ZVIL2htB', 'wwy1w5xsrxLNteAjZhYU9C5Vz4yiTBxesmq3xJaHcPj', 13.353393262605975, 100.98682032023041, '2020-03-20 05:31:59'),
(90, 84, 'ed09803f65c5', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2020-02-21 02:36:26'),
(91, 85, 'cb3d42478930', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2020-03-20 05:38:16'),
(92, 86, '9ad0efc5a0b1', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2020-03-20 05:38:25'),
(93, 87, '294697322313', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2020-03-20 05:38:26'),
(94, 88, '653d1841d721', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2020-03-20 05:38:28'),
(95, 89, '25feef2148b3', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', 0, 0, '2020-03-20 05:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `eventtime`
--

CREATE TABLE `eventtime` (
  `time_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  `time_6` text NOT NULL,
  `time_7` text NOT NULL,
  `time_8` text NOT NULL,
  `time_9` text NOT NULL,
  `time_10` text NOT NULL,
  `time_11` text NOT NULL,
  `time_12` text NOT NULL,
  `time_13` text NOT NULL,
  `time_14` text NOT NULL,
  `time_15` text NOT NULL,
  `time_16` text NOT NULL,
  `time_17` text NOT NULL,
  `time_18` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `eventtime`
--

INSERT INTO `eventtime` (`time_id`, `ep_id`, `time_6`, `time_7`, `time_8`, `time_9`, `time_10`, `time_11`, `time_12`, `time_13`, `time_14`, `time_15`, `time_16`, `time_17`, `time_18`) VALUES
(81, 83, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(82, 84, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(83, 85, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(84, 86, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(85, 87, 'fffs', 'sss', 'ffert', '', '', '', '', '', '', '', '', '', ''),
(86, 88, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(87, 89, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(88, 90, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(89, 91, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(90, 92, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(91, 93, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(92, 94, '', '', '', '', '', '', '', '', '', '', '', '', ''),
(93, 95, '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fgemailtb`
--

CREATE TABLE `fgemailtb` (
  `fgid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keymd5` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `lc_id` int(11) NOT NULL,
  `ep_id` int(11) NOT NULL,
  `lc_lat` double NOT NULL,
  `lc_long` double NOT NULL,
  `accident` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lc_id`, `ep_id`, `lc_lat`, `lc_long`, `accident`) VALUES
(59, 83, 0, 0, 0),
(60, 84, 0, 0, 0),
(61, 85, 0, 0, 0),
(62, 86, 0, 0, 0),
(63, 87, 14.15856, 101.34471, 1),
(64, 88, 0, 0, 0),
(65, 89, 14.15851, 101.34475, 1),
(66, 90, 0, 0, 0),
(67, 91, 0, 0, 0),
(68, 92, 0, 0, 0),
(69, 93, 0, 0, 0),
(70, 94, 0, 0, 0),
(71, 95, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text,
  `password` text,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `email`, `username`, `password`, `name`) VALUES
(77, '', '1d826ca0d73e', '1234', 'Anonymous'),
(78, '', 'cefbfd6992fe', '1234', 'Anonymous'),
(79, '', '68b066016b72', '1234', 'Anonymous'),
(80, '', 'e5747349d65f', '1234', 'Anonymous'),
(81, 'love45422@gmail.com', 'teecoldly', 'love4542', 'Teecoldy Thegame'),
(82, '', '34d59b344640', '1234', 'Anonymous'),
(83, 'yupin.s@fitm.kmutnb.ac.th', 'yupin', 'kmutnbacth', 'yupin_tokenline 2'),
(84, '', 'ed09803f65c5', '1234', 'Anonymous'),
(85, '', 'cb3d42478930', '1234', 'Anonymous'),
(86, '', '9ad0efc5a0b1', '1234', 'Anonymous'),
(87, '', '294697322313', '1234', 'Anonymous'),
(88, '', '653d1841d721', '1234', 'Anonymous'),
(89, '', '25feef2148b3', '1234', 'Anonymous');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elderlypeople`
--
ALTER TABLE `elderlypeople`
  ADD PRIMARY KEY (`ep_id`);

--
-- Indexes for table `eventtime`
--
ALTER TABLE `eventtime`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `ep_id` (`ep_id`);

--
-- Indexes for table `fgemailtb`
--
ALTER TABLE `fgemailtb`
  ADD PRIMARY KEY (`fgid`),
  ADD KEY `fgemailtb_ibfk_1` (`user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`lc_id`),
  ADD KEY `ep_id` (`ep_id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elderlypeople`
--
ALTER TABLE `elderlypeople`
  MODIFY `ep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `eventtime`
--
ALTER TABLE `eventtime`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `fgemailtb`
--
ALTER TABLE `fgemailtb`
  MODIFY `fgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventtime`
--
ALTER TABLE `eventtime`
  ADD CONSTRAINT `eventtime_ibfk_1` FOREIGN KEY (`ep_id`) REFERENCES `elderlypeople` (`ep_id`);

--
-- Constraints for table `fgemailtb`
--
ALTER TABLE `fgemailtb`
  ADD CONSTRAINT `fgemailtb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`ep_id`) REFERENCES `elderlypeople` (`ep_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
