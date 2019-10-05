-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2019 at 02:33 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTION_LOG`
--

CREATE TABLE `TRANSACTION_LOG` (
  `stock_id` int(12) NOT NULL,
  `holder` varchar(12) NOT NULL,
  `VOL` int(6) NOT NULL,
  `VAL` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TRANSACTION_LOG`
--

INSERT INTO `TRANSACTION_LOG` (`stock_id`, `holder`, `VOL`, `VAL`) VALUES
(540777, 'nachiket', 1, 516),
(540777, 'nachiket', 1, 516),
(540750, 'nachiket', 1, 118);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TRANSACTION_LOG`
--
ALTER TABLE `TRANSACTION_LOG`
  ADD KEY `holder` (`holder`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TRANSACTION_LOG`
--
ALTER TABLE `TRANSACTION_LOG`
  ADD CONSTRAINT `s_id` FOREIGN KEY (`stock_id`) REFERENCES `BSE_DATA` (`SC_CODE`) ON DELETE CASCADE,
  ADD CONSTRAINT `u_id` FOREIGN KEY (`holder`) REFERENCES `user` (`username`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
