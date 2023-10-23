-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(14, 31, 14, 30000000, 1, '2023-08-10 15:03:48'),
(15, 48, 15, 45000, 1, '2023-09-12 13:56:50'),
(16, 49, 15, 500000, 1, '2023-09-12 13:59:29'),
(17, 53, 16, 1000000, 1, '2023-09-23 16:45:13'),
(18, 54, 16, 2.22222e22, 1, '2023-09-23 16:47:01'),
(19, 55, 17, 500000, 1, '2023-10-02 18:29:03'),
(20, 56, 17, 1115000, 1, '2023-10-02 18:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(6, 'PAINTING'),
(9, 'ankush12'),
(13, 'seller'),
(15, 'ankush'),
(16, 'black painting');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `email`, `otp`) VALUES
(35, 'ankushmotisariya@gmail.com', 738528),
(38, 'jjj@12gmail.com', 364628),
(39, '021@12gmail.com', 697305),
(41, 'ghgh@gmail.com', 766008),
(45, '21bmiit152@gmail.com', 998674),
(46, 'ankushmotisariya35@gmail.com', 618972);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `start_bid`, `regular_price`, `bid_end_datetime`, `img_fname`, `date_created`) VALUES
(6, 6, 'km', 'mnnkn', 10, 540, '2024-04-25 16:37:00', '6.jpg', '2023-07-31 14:54:07'),
(7, 6, 'kmkjk', 'jnj', 40, 89000000, '2023-07-31 14:54:00', '7.png', '2023-07-31 14:54:31'),
(8, 6, 'mjm', 'mjmmm', 20000000, 111211000000, '2023-10-24 21:00:00', '8.webp', '2023-07-31 14:55:19'),
(14, 13, 'seller', 'seller', 2121, 2121, '2024-08-10 15:05:00', '14.jpg', '2023-08-10 14:58:57'),
(15, 14, 'hhhh', 'njjj', 10, 200, '2023-09-12 14:01:00', '15.jpg', '2023-09-12 13:55:07'),
(17, 16, 'black painting', 'jadknfknjFNjsdfnj', 100, 100000, '2024-04-23 16:37:00', '17.jpg', '2023-10-02 18:22:41'),
(18, 16, 'black painting', 'afnjjnafknf', 150, 100, '2024-07-18 16:35:00', '18.jpg', '2023-10-23 16:36:32'),
(19, 15, 'black painting', 'jbnmjj', 50, 50, '2023-10-24 21:00:00', '19.jpg', '2023-10-23 16:39:46');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Pating Auction Systeam', 'KINGOFEMBROIDARY@GMAIL.COM', '8849048885', '1691483520_narnia-lion-1920x1080.jpg', '&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;NAME :ANKUSH MOTISARIYA &lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/p&gt;&lt;/span&gt;&lt;/sup&gt;&lt;br&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;EMAIL: KINGOFEMBROIDARY@GMAIL.COM&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/sup&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;MOBILENO: 8849048885&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/sup&gt;&lt;/p&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;/sup&gt;&lt;/p&gt;&lt;/span&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;MY PROJECT MEMBER&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;span style=&quot;color:rgb(0,0,0);font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;NAME :&amp;nbsp; MANSI KAKADIYA &lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/p&gt;&lt;/span&gt;&lt;/sup&gt;&lt;br&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;EMAIL: KAKADIYAMANSI84@GMAIL.COM&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/sup&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;MOBILENO: 9054265057&lt;/i&gt;&lt;/u&gt;&lt;/sup&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;MY PROJECT MEMBER&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;/i&gt;&lt;/u&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;color:rgb(0,0,0);font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;NAME :&amp;nbsp; TAXIL LAKHANI &lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/p&gt;&lt;/span&gt;&lt;/sup&gt;&lt;br&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;EMAIL: TAXIL.LAKHANI3143@GMAIL.COM&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/sup&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;sup&gt;&lt;u&gt;&lt;i&gt;&lt;b&gt;MOBILENO: 9924139884&lt;/i&gt;&lt;/u&gt;&lt;/sup&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;/p&gt;&lt;/span&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;/p&gt;&lt;/span&gt;&lt;span style=&quot;color:rgb(0,0,0);font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;/p&gt;&lt;/span&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&lt;u&gt;&lt;i&gt;&lt;b style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;/i&gt;&lt;/u&gt;&lt;/span&gt;&lt;/p&gt;&lt;span style=&quot;color:rgb(0,0,0);font-size: 18px;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;p style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/p&gt;&lt;/span&gt;&lt;p style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/p&gt;&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-size: 18px;&quot;&gt;&lt;span style=&quot;color:rgb(0,0,0);font-size: 18px;&quot;&gt;&lt;p style=&quot;font-size: 18px; color: rgb(0, 0, 0);&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;/p&gt;&lt;/span&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;/span&gt;');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `emailotp`, `contact`, `address`, `city`, `type`, `date_created`) VALUES
(6, 'ankush', 'ankush', '3a0135f9157447e16da5c17863f1531c', '', 0, '', '', '', 1, '2023-07-31 14:57:29'),
(51, 'ankushhh', 'djfjdjj', '423ad732794a0af8f2ea8cb32c2e5bdc', '21bmiit152@gmail.com', 933166, '8849048885', 'sjdf', 'jfwkd`', 2, '2023-09-23 16:38:48'),
(52, 'daksh', 'daksh', '879c8e97dd5961fdcc7dcaf24e98f75d', 'ankushmotisariya35@gmail.com', 393769, '8849802554', 'kadsnnk', 'kdskmk', 3, '2023-09-23 16:40:52'),
(53, 'jdfj', 'kkkk', 'fa7f08233358e9b466effa1328168527', 'jjj@12gmail.com', 364628, '8848048885', 'sdfklk', 'kds', 2, '2023-09-23 16:44:46'),
(54, 'daskjjjk', 'kkkkkkk', 'c08ac56ae1145566f2ce54cbbea35fa3', '021@12gmail.com', 697305, '8875645787', 'dvkjk', 'kdf', 2, '2023-09-23 16:46:52'),
(55, 'jayho', 'jayho', 'c2479e0d79e423394e8a5ad2229fd047', '21bmiit152@gmail.com', 215491, '8849048885', 'DSNFNFNKDMN', 'KSDMFM', 0, '2023-10-02 18:24:20'),
(56, 'popo', 'popo', '3b2285b348e95774cb556cb36e583106', 'ghgh@gmail.com', 766008, '7567920122', 'kdfjgjkkkjkisjkj', 'mdskk', 2, '2023-10-02 18:35:54'),
(57, 'bhbb', 'HHHHH', '7971bcadb02c26ffe55143b547a064b7', '21bmiit152@gmail.com', 353868, '8849048885', 'wmfkk', 'dsKMKFMK', 2, '2023-10-18 18:57:55'),
(58, 'ankush', 'hhh', 'a3aca2964e72000eea4c56cb341002a4', '21bmiit152@gmail.com', 998674, '8849048885', 'hgffg', 'hjgj', 2, '2023-10-23 16:34:36'),
(59, 'ANKUSH', 'ankush25', '3a0135f9157447e16da5c17863f1531c', 'ankushmotisariya35@gmail.com', 618972, '8849048885', 'adjbkfjkkjkj', 'surat', 3, '2023-10-23 16:42:13');

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
