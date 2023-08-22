-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 04:46 PM
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
-- Database: `bidding_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `bid_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=bid,2=confirmed,3=cancelled',
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `product_id`, `bid_amount`, `status`, `date_created`) VALUES
(2, 5, 1, 7500, 1, '2020-10-27 14:18:50'),
(4, 5, 3, 155000, 1, '2020-10-27 16:37:29'),
(5, 10, 12, 500000, 1, '2023-08-03 14:22:05'),
(6, 11, 12, 100000000000, 1, '2023-08-03 14:22:51'),
(7, 12, 12, 2.22222e32, 1, '2023-08-03 14:24:01'),
(8, 15, 4, 3.40282e38, 1, '2023-08-05 17:09:53'),
(9, 16, 6, 8888, 1, '2023-08-05 17:11:51'),
(10, 17, 6, 8889, 1, '2023-08-05 17:12:55'),
(11, 21, 9, 565656, 1, '2023-08-08 13:11:03'),
(12, 29, 8, 2e37, 1, '2023-08-10 14:56:13'),
(13, 30, 14, 250000, 1, '2023-08-10 15:03:03'),
(14, 31, 14, 30000000, 1, '2023-08-10 15:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'PAINTING'),
(9, 'ankush12'),
(13, 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `email`, `otp`) VALUES
(1, 'motisariyaankush@gmail.com', 614050),
(4, '21bmiit145@gmail.com', 350755),
(7, '21bmiit152@gmail.com', 636841),
(10, 'ankushmotisariya@gmail.com', 451674),
(11, 'ankushmotisariya35@gmail.com', 611342);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `start_bid` float NOT NULL,
  `regular_price` float NOT NULL,
  `bid_end_datetime` datetime NOT NULL,
  `img_fname` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `start_bid`, `regular_price`, `bid_end_datetime`, `img_fname`, `date_created`) VALUES
(4, 6, 'ankush', 'njsdn', 10, 12630, '2024-07-31 17:00:00', '4.jpg', '2023-07-31 14:53:02'),
(5, 6, 'j', 'nmlnmlk', 7890, 5550, '2024-07-05 18:00:00', '5.jpg', '2023-07-31 14:53:38'),
(6, 6, 'km', 'mnnkn', 10, 540, '2023-07-10 14:53:00', '6.jpg', '2023-07-31 14:54:07'),
(7, 6, 'kmkjk', 'jnj', 40, 89000000, '2023-07-31 14:54:00', '7.png', '2023-07-31 14:54:31'),
(8, 6, 'mjm', 'mjmmm', 20000000, 111211000000, '2025-07-28 14:54:00', '8.webp', '2023-07-31 14:55:19'),
(10, 6, 'ff', 'DFGHJ', 1, 100, '2027-07-25 16:20:00', '10.jpg', '2023-07-31 16:20:29'),
(12, 9, 'asd', 'saDD12', 21210, 2220, '2023-08-03 14:25:00', '12.jpg', '2023-08-03 13:13:39'),
(14, 13, 'seller', 'seller', 2121, 2121, '2023-08-10 15:05:00', '14.jpg', '2023-08-10 14:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'patingauctionsysteam', 'kingofembrodary@gmail.com', '8849048885', '1691483520_narnia-lion-1920x1080.jpg', '&lt;p&gt;oction &lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;br&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `emailotp` int(6) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Subscriber',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `emailotp`, `contact`, `address`, `city`, `type`, `date_created`) VALUES
(6, 'ankush', 'ankush', '3a0135f9157447e16da5c17863f1531c', '', 0, '', '', '', 1, '2023-07-31 14:57:29'),
(25, 'daksh', 'daksh', '879c8e97dd5961fdcc7dcaf24e98f75d', 'asndk@12gmail.com', 5454, '8849048885', 'sckkdkk', 'sdmnfmnf', 3, '2023-08-08 17:22:00'),
(40, 'hjhjhhj', 'nnnnnnnnnnn', '632ed9515fb18441d9ead12c5687bde9', 'kkkjkkkkk12@gmail.com', 2121, '455556', '5659865nsadkjfknknncnkjsncklnc', 'knkkjkm', 1, '2023-08-12 13:04:40'),
(41, 'nnnnnnnnn', 'lololo', '80ef61a9478f668711adb7df30543230', 'hhhhhhhhh23@gmail.com', 54545, '878788784', '5l;kljlkjkl', 'hhhh', 3, '2023-08-12 13:11:21'),
(42, 'klklklklklklklklklklklk', 'POPOPO', '586182b7b0d8da982dfc4ed2cbf2d08c', 'KKKKKJJK@12GMAIL.COM', 21221, '656565', '.HJHKJKLJKKL', 'LJKKJ', 1, '2023-08-12 13:13:23'),
(43, 'KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK', 'WWWWWW', '0dcb2a84abeabb4fdedcfebb06b2765c', 'JKLJLJLKJKLJ@565656GMAIL.COM', 23232154, '5454854', 'MLLJLKKLJHKJLKK', 'KJLKJ.KJLJK', 3, '2023-08-12 13:16:17'),
(44, 'ankush2525', 'ankush2525', 'a513e0cfdcc2656ea82bd834705d3a96', 'ankushmotisariya35@gmail.com', 611342, '88490488885', 'awkjdljl', 'kmdskmm', 3, '2023-08-12 20:15:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
