-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 05:43 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_exchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `login_user_id` varchar(50) NOT NULL,
  `login_user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_user_id`, `login_user_password`) VALUES
('abc123', 'pa$$word'),
('def456', 'qwerty'),
('ghi789', 'asdfjkl;');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(50) NOT NULL,
  `order_buy_user_id` varchar(50) NOT NULL,
  `order_sell_user_id` varchar(50) NOT NULL,
  `order_ticket_id` int(50) NOT NULL,
  `order_ticket_quantity` int(50) NOT NULL,
  `order_price` double NOT NULL,
  `order_stmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_buy_user_id`, `order_sell_user_id`, `order_ticket_id`, `order_ticket_quantity`, `order_price`, `order_stmp`) VALUES
(1, 'ghi789', 'abc123', 1, 2, 399.98, '2017-03-06 19:20:22'),
(2, 'ghi789', 'def456', 2, 3, 719.97, '2017-03-07 05:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `securities`
--

CREATE TABLE `securities` (
  `securities_user_id` varchar(50) NOT NULL,
  `securities_user_choice` int(50) NOT NULL,
  `securities_user_answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `securities`
--

INSERT INTO `securities` (`securities_user_id`, `securities_user_choice`, `securities_user_answer`) VALUES
('abc123', 1, 'hehe'),
('abc123', 2, 'Baseball'),
('abc123', 3, 'ueiwoq'),
('def456', 1, 'haha'),
('ghi789', 3, 'UUUU');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(50) NOT NULL,
  `ticket_name` varchar(50) NOT NULL,
  `ticket_detail` varchar(100) NOT NULL,
  `ticket_quantity` int(50) NOT NULL,
  `ticket_price` double NOT NULL,
  `ticket_postedby` varchar(50) NOT NULL,
  `ticket_pickup_address` varchar(100) NOT NULL,
  `ticket_stmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `ticket_name`, `ticket_detail`, `ticket_quantity`, `ticket_price`, `ticket_postedby`, `ticket_pickup_address`, `ticket_stmp`) VALUES
(1, '49ers vs. Raiders', 'Oakland Alameda Coliseum, 9/10/18 18:45 PM PST', 5, 199.99, 'abc123', '1234 ayy st., San Jose, CA 12345', '2017-03-01 11:25:17'),
(2, 'Cavaliers vs. Warriors', 'Oracle Arena, 11/27/18 19:15 PM PST', 3, 239.99, 'def456', '2983 Jdsna Blvd, San Francisco, CA 89089', '2017-03-03 09:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_creditcard` varchar(50) NOT NULL,
  `user_create_stmp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `user_creditcard`, `user_create_stmp`) VALUES
('abc123', 'Joe Doe', 'joe@doe.org', '1234567890', '1234 ayy st., San Jose, CA 12345', '49308194032-1721312', '2017-02-22 07:17:17'),
('def456', 'Speed Weed', 'speed456@gmail.com', '4081234560', '2983 Jdsna Blvd, San Francisco, CA 89089', '7894125478659921', '2017-02-28 06:13:49'),
('ghi789', 'Bill Wilson', 'billWilson@ghi.gov', '1239003212', '4U Big St, Santa Clara, CA 89238', '445612345678910', '2017-03-01 01:03:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`login_user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
