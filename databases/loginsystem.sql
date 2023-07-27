-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 12:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('kjk', 'sd@12', 'sdx'),
('jfh', 'dhh@12', 'd9b4ed6292c18963ad8f7ccb7d6d4f92');

-- --------------------------------------------------------

--
-- Table structure for table `users12`
--

CREATE TABLE `users12` (
  `username` varchar(520) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phonenumber` bigint(50) NOT NULL,
  `birth` date NOT NULL,
  `gender1` varchar(20) NOT NULL,
  `add1` varchar(500) NOT NULL,
  `add2` varchar(500) NOT NULL,
  `coun1` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `postal` int(11) NOT NULL,
  `aname` varchar(500) NOT NULL,
  `anumber` int(11) NOT NULL,
  `acard` varchar(500) NOT NULL,
  `acvv` int(11) NOT NULL,
  `expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users12`
--

INSERT INTO `users12` (`username`, `email`, `password`, `phonenumber`, `birth`, `gender1`, `add1`, `add2`, `coun1`, `city`, `region`, `postal`, `aname`, `anumber`, `acard`, `acvv`, `expiredate`) VALUES
('ankushhh', 'sdsd@12', '75e99c5577f1fd503ceb3b9108e5fde9', 884905453, '2000-02-02', ' female', 'sdd', 'dd', 'America', 'sdd', 'sdd', 524, 'asdd', 2452, 'sddd', 545, '2001-02-02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
