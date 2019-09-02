-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2019 at 12:22 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `credit` int(10) UNSIGNED NOT NULL DEFAULT '100000',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `credit`, `email`) VALUES
('$name', '$username', '$password', 100000, '$email'),
('', 'asd', 'asdas', 100000, ''),
('sdfg', 'asdf', 'sdg', 100000, 'dsgsd'),
('dfhgfg', 'asgadg', 'sgs', 100000, 'gdfgdf'),
('dfgh', 'dfg', 'fdg', 100000, 'dfg'),
('nachiket', 'nachiket', 'rait@dyp', 100000, 'nachiket@gmail.com'),
('keke', 'ram', 'kelkar', 100000, 'kelkar@gmail.com'),
('dfg', 'sdas', 'af', 100000, 'fg'),
('dcfgf', 'sdf', 'sdfsdg', 100000, 'dfgdfg'),
('shailaja', 'shailaja', 'rait@dyp', 100000, 'asd@gmail.com'),
('siddharth', 'sid', 'rait@dyp', 100000, 'sid@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
