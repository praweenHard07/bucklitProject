-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 12:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bucklit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bucklit_users`
--

CREATE TABLE `bucklit_users` (
  `sno` int(11) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `upassword` varchar(200) NOT NULL,
  `en_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mod_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bucklit_users`
--

INSERT INTO `bucklit_users` (`sno`, `uid`, `user_name`, `upassword`, `en_date`, `mod_date`) VALUES
(1, 'admin', 'Admin', '751cb3f4aa17c36186f4856c8982bf27', '2022-12-14 11:19:34', '2022-12-14 11:19:34'),
(2, 'admin2', 'Admin', '751cb3f4aa17c36186f4856c8982bf27', '2022-12-14 11:28:09', '2022-12-14 11:28:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bucklit_users`
--
ALTER TABLE `bucklit_users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bucklit_users`
--
ALTER TABLE `bucklit_users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
