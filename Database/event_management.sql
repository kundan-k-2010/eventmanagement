-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 06:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `profession` varchar(250) NOT NULL,
  `locality` varchar(250) NOT NULL,
  `guest_number` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `name`, `age`, `dob`, `profession`, `locality`, `guest_number`, `address`, `created`, `modified`, `deleted`) VALUES
(1, 'wordpress', 34, '11/30/2020', 'Employed', 'gdfgfd', 3, 'FLAT', '2020-11-08 00:00:00', '2020-11-08 01:00:35', 0),
(2, 'test1122', 34, '11/18/2020', 'Student', 'pune', 2, 'FLAT 203', '2020-11-08 12:39:46', '2020-11-08 06:16:49', 0),
(3, 'red', 45, '11/11/2020', 'Employed', 'gaya', 2, 'skgkasg asjjdhs', '2020-11-09 04:37:47', '0000-00-00 00:00:00', 0),
(4, 'dfg', 77, '11/18/2020', 'Employed', 'aaaa', 2, 'edsfs dhfg hgfhfg', '2020-11-09 04:42:17', '2020-11-09 04:42:34', 0),
(5, 'gfhf', 33, '11/19/2020', 'Student', 'goa', 1, 'ghfg fgjg', '2020-11-09 05:10:42', '0000-00-00 00:00:00', 0),
(6, 'hkjh', 22, '11/13/2020', 'Student', 'goa', 2, 'fjgljfd llfjdgj lfdg', '2020-11-09 05:14:41', '2020-11-09 05:16:31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
