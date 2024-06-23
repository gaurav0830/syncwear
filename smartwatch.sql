-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2024 at 08:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartwatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `productid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `name`, `quantity`, `price`) VALUES
(51, 5, 103, 'Colorfit 3', 1, 2500),
(52, 5, 101, 'Colorfit 1', 1, 3699),
(53, 0, 102, 'Colorfit 2', 1, 4000),
(54, 0, 101, 'Colorfit 1', 1, 3699),
(69, 9, 102, 'Colorfit 2', 1, 4000),
(72, 0, 103, 'Colorfit 3', 1, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `zipid` varchar(100) NOT NULL,
  `totalproduct` varchar(100) NOT NULL,
  `totalprice` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `name`, `address`, `phone`, `payment`, `zipid`, `totalproduct`, `totalprice`, `status`, `created_at`) VALUES
(6, 8, 'gau', 'fvtgtv', 2147483647, 'Online', '575006', '101 (2) , 102 (2) , 104 (4) ', '34', 'pending', '2024-05-13 15:09:42.223376'),
(8, 8, 'gau', 'dcecxec', 343566788, 'Online', '575006', '101 (3) , 104 (1) ', '15', 'pending', '2024-05-14 13:23:35.060431'),
(9, 8, 'gauravr', 'vjdxvehjx', 2147483647, 'COD', '575006', '103 (1) 104 (1) ', '6', 'pending', '2024-05-16 09:05:01.073356'),
(18, 8, 'gauravr', 'vgvtb', 2147483647, 'Online', '575006', '102 (1) 101 (1) ', '7', 'pending', '2024-05-16 11:39:28.331458'),
(19, 8, 'gau', 'ecec', 243445667, 'Online', '575006', '102 (3) 143 (2) ', '19', 'pending', '2024-05-17 16:43:46.162737');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `imgname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `quantity`, `Price`, `imgname`) VALUES
(102, 'Colorfit 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti mollitia nulla perspiciatis, perfe', 1, 4000, 'card2.jpg'),
(103, 'Colorfit 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti mollitia nulla perspiciatis, perfe', 16, 2500, 'card4.jpg'),
(104, 'Colorfit 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. ', 0, 4800, 'card6.jpg'),
(105, 'Colorfit 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti mollitia nulla perspiciatis.', 25, 3100, 'card7.jpg'),
(106, 'colorfit 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti mollitia nulla perspiciatis.', 20, 6200, 'card8.jpg'),
(107, 'colorfit 7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti mollitia nulla perspiciatis.', 11, 6500, 'card9.jpg'),
(143, 'Colorfit 10', 'dfrevre', 10, 3600, 'card1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `pass`) VALUES
(8, 'gau', 'R', 'bhav@gmail.com', 8),
(9, 'gaurav', 'r', 'gau@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
