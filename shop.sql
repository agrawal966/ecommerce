-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2019 at 04:46 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `subtotal` float NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int(5) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `full_name`, `email`, `address`, `subtotal`, `order_id`, `user_id`, `order_date`, `status`) VALUES
(1, 'rohit agrawal', 'test2@gmail.com', 'fvasvsdfsd', 12, '5cef5901e2e42', 41, '2019-05-30 09:46:01', 1),
(2, 'rohit agrawal', 'test2@gmail.com', 'fasfsadfasdf', 458, '5cef590daf475', 41, '2019-05-30 09:46:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `qty` int(5) NOT NULL,
  `options` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `name`, `qty`, `options`) VALUES
(1, 1, 5, 'Samsung Gear S3 Frontier Smartwatch ', 1, '{"product_image":"assets\\/uploads\\/product\\/41ehOZgmMML__AC_US218_.jpg"}'),
(2, 2, 4, 'Apple Watch Series 3 ', 2, '{"product_image":"assets\\/uploads\\/product\\/413483RVSaL__AC_US218_.jpg"}');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `quantity`, `price`, `description`, `product_image`, `created`, `updated`) VALUES
(3, ' Nylon Braided Lightning to USB A Cable', 10, 12, '  AmazonBasics Nylon Braided Lightning to USB A Cable - MFi Certified iPhone Charger - Dark Grey, 6-Foot', 'assets/uploads/product/41SUorz6saL__AC_US218_.jpg', '2019-05-29 18:04:35', '2019-05-29 18:04:35'),
(4, 'Apple Watch Series 3 ', 10, 229, '  Apple Watch Series 3 (GPS, 42mm) - Space Gray Aluminium Case with Black Sport Band ', 'assets/uploads/product/413483RVSaL__AC_US218_.jpg', '2019-05-29 18:05:13', '2019-05-29 18:05:13'),
(5, 'Samsung Gear S3 Frontier Smartwatch ', 12, 12, '  Samsung Gear S3 Frontier Smartwatch (Bluetooth), SM-R760NDAAXAR – US Version with Warranty', 'assets/uploads/product/41ehOZgmMML__AC_US218_.jpg', '2019-05-29 18:05:50', '2019-05-29 18:05:50'),
(6, 'Samsung Galaxy Watch ', 12, 12, '  Samsung Galaxy Watch (42mm) Rose Gold (Bluetooth), SM-R810NZDAXAR – US Version with Warranty', 'assets/uploads/product/41ofVkm4TIL__AC_US218_.jpg', '2019-05-29 18:06:10', '2019-05-29 18:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `type` int(2) NOT NULL COMMENT '1 =admin ,2 =user',
  `full_name` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `new_password_key` varchar(200) NOT NULL,
  `new_password_requested` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `full_name`, `email`, `password`, `salt`, `contact_no`, `status`, `created`, `new_password_key`, `new_password_requested`, `image`, `updated`, `last_login`, `ip_address`) VALUES
(1, 1, 'super admin', 'superadmin@test.com', '7ce7ba96c9b51a54e5056a21c3f2d3b4f72c99ad', 'f291e752e1', '1234561010', 1, '2018-11-03 06:25:26', 'dfdaf', 'dfdaf', 'adfdaf', '2018-11-24 11:21:38', '2019-05-30 10:12:55', '::1'),
(40, 2, 'rohit', 'test1@gmail.com', '2f07d3bce12ea06c8e059da2756f5078adafb8f5', '6b8704d7bb', '', 1, '2019-05-29 18:33:57', '', '', '', '2019-05-29 18:33:57', '2019-05-29 18:33:58', '192.168.2.137'),
(41, 2, 'rohit agrawal', 'test2@gmail.com', 'b4c2354960aae76bf6b2ed67f5faf19614c4948a', '164fac75b2', '', 1, '2019-05-30 01:03:55', '', '', '', '2019-05-30 01:03:55', '2019-05-30 10:04:18', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`o_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
