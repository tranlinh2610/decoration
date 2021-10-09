-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 05:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `decoration_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(255) DEFAULT NULL,
  `ctg_description` text NOT NULL,
  `ctg_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ctg_id`, `ctg_name`, `ctg_description`, `ctg_image`) VALUES
(1, 'Living Room', 'Living Room Decor Tricks for a Standout Space', '49889d72b4ce62217027b97262a113felivingroom.jpg'),
(11, 'Chicken room', 'Apartment hover house', '2a89fad00a088d1f51db672ea1800ca197485493_2490671654577425_8179314827781472256_n.png'),
(12, 'Chicken room 2', 'Apartment hover house 2', 'b34988d5d57690b95595079c7deda8c745C64A49-E3CC-4FE8-8DAA-93ED181C53C1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_details`
--

CREATE TABLE `image_details` (
  `img_id` int(11) NOT NULL,
  `img_product_id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_details`
--

INSERT INTO `image_details` (`img_id`, `img_product_id`, `img_name`) VALUES
(1, 1, 'ad.png'),
(2, 5, 'ad.png'),
(3, 6, '162a6e910d1969f0c01d07a5d98f3e4b4A76F959-31D9-4C49-BADD-BDF58593C379.jpg'),
(4, 6, '162a6e910d1969f0c01d07a5d98f3e4b45C64A49-E3CC-4FE8-8DAA-93ED181C53C1.jpg'),
(5, 6, '162a6e910d1969f0c01d07a5d98f3e4b97485493_2490671654577425_8179314827781472256_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(128) NOT NULL,
  `p_description` text NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_quantity` int(10) NOT NULL,
  `p_price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `p_date_create` datetime NOT NULL,
  `p_date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_description`, `p_image`, `p_quantity`, `p_price`, `category_id`, `p_date_create`, `p_date_update`) VALUES
(1, 'Chinh', 'Linh', '9604f9cd5f5e07ac50dd145959ff2ded45C64A49-E3CC-4FE8-8DAA-93ED181C53C1.jpg', 2000, '200000', 1, '2021-09-12 21:37:13', '0000-00-00 00:00:00'),
(2, 'Nam', 'Chinh', 'edbf2f5e1f6ea84d8ff221b71bb12a7e45C64A49-E3CC-4FE8-8DAA-93ED181C53C1.jpg', 21300, '20000', 1, '2021-09-12 21:48:10', '0000-00-00 00:00:00'),
(3, 'c', 's', '77bf60b28341789170fa2fa71ecd244c97485493_2490671654577425_8179314827781472256_n.png', 340, '210', 1, '2021-09-12 21:49:49', '0000-00-00 00:00:00'),
(4, 'df', 'fd', 'f18ff8ee459d8dd446ab947c7323761197485493_2490671654577425_8179314827781472256_n.png', 30000, '3400', 1, '2021-09-12 21:51:36', '0000-00-00 00:00:00'),
(5, 'csd', 'adee', '52ae7be60b0c707a7048249b48cf2ab597485493_2490671654577425_8179314827781472256_n.png', 30000, '51000', 1, '2021-09-12 21:53:09', '0000-00-00 00:00:00'),
(6, 'adadadcc', 'ádasdasd', '8e5f97224ae80679b882015348e58bb497485493_2490671654577425_8179314827781472256_n.png', 20000, '12000', 1, '2021-09-12 21:54:52', '2021-09-12 22:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_description` varchar(20) NOT NULL,
  `role_status` int(11) NOT NULL,
  `role_create_time` datetime NOT NULL,
  `role_update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_description`, `role_status`, `role_create_time`, `role_update_time`) VALUES
(1, 'Shoper', 'User sell product', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'User', 'User buy product', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Admin', 'Administration', 1, '2021-08-17 18:45:16', '2021-08-17 18:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `user_status` int(11) NOT NULL,
  `user_role_id` int(20) NOT NULL,
  `user_create_time` datetime NOT NULL,
  `user_update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `fullname`, `user_status`, `user_role_id`, `user_create_time`, `user_update_time`) VALUES
(2, 'admin123', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 'administrator', 1, 3, '2021-09-07 15:48:28', '2021-09-07 15:48:28'),
(39, 'tranlinh123', '29059ba0fd27b3ba0a04d96c51904f55', 'tranlinh@gmail.com', 'Tran Linh', 1, 2, '2021-08-18 09:25:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `image_details`
--
ALTER TABLE `image_details`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `FK_ProductImage` (`img_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `FK_CategoryProduct` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fogeign_key_user_role` (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `image_details`
--
ALTER TABLE `image_details`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_details`
--
ALTER TABLE `image_details`
  ADD CONSTRAINT `FK_ProductImage` FOREIGN KEY (`img_product_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_CategoryProduct` FOREIGN KEY (`category_id`) REFERENCES `categories` (`ctg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_UserRole` FOREIGN KEY (`user_role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
