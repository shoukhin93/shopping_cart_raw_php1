-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2018 at 10:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tut`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `image`, `price`, `quantity`) VALUES
(15, 'w', 'images/38B62B2800000578-3803995-image-a-113_1474633837284.jpg', 32.00, 10),
(17, 'poi', 'images/b12d8cb1e607dfc0bc47c9a6ac857cde.jpg', 42.00, 23),
(23, 'ee', 'images/5ad35c5a03eb9attend2.jpg', 32.00, 23);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_info`
--

CREATE TABLE `shipping_info` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `total_money` double NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_info`
--

INSERT INTO `shipping_info` (`id`, `username`, `total_money`, `payment_status`, `order_time`) VALUES
(4, 'asdf', 0, 'pending', '2018-04-11 14:02:49'),
(5, 'qwer', 0, 'pending', '2018-04-12 03:30:17'),
(6, 'qwer', 0, 'pending', '2018-04-12 03:30:45'),
(7, 'qwer', 0, 'pending', '2018-04-12 03:33:11'),
(8, 'jui', 0, 'pending', '2018-04-12 03:37:56'),
(9, 'jui', 0, 'pending', '2018-04-12 03:45:10'),
(10, 'jui', 0, 'pending', '2018-04-16 08:11:24'),
(11, 'admin', 42, 'pending', '2018-04-16 08:16:53'),
(12, 'jui', 42, 'pending', '2018-04-16 08:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `full_address` varchar(30) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`username`, `password`, `first_name`, `last_name`, `contact_no`, `full_address`, `zipcode`) VALUES
('asdf', 'asdf', 'asdf', 'asdf', '123', 'asdf', 123),
('jui', 'jui', 'jui', 'jui', 'jui', 'jui', 45),
('qwer', 'qwer', 'qwer', 'qwer', 'qwer', 'qwer', 12);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_info`
--

CREATE TABLE `voucher_info` (
  `v_id` int(11) NOT NULL,
  `item_name` int(11) NOT NULL,
  `ordered_quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_info`
--

INSERT INTO `voucher_info` (`v_id`, `item_name`, `ordered_quantity`, `unit_price`) VALUES
(1, 15, 1, 33),
(1, 12, 1, 66),
(1, 15, 1, 33),
(1, 12, 1, 66),
(1, 15, 1, 33),
(1, 12, 1, 66),
(2, 0, 1, 33),
(3, 0, 1, 33),
(4, 0, 1, 32),
(5, 0, 2, 42),
(6, 0, 1, 42),
(7, 0, 2, 42),
(8, 0, 2, 42),
(9, 0, 1, 42),
(10, 0, 1, 42),
(11, 0, 1, 42),
(12, 0, 1, 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_info`
--
ALTER TABLE `shipping_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `shipping_info`
--
ALTER TABLE `shipping_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
