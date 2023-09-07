-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2023 at 03:31 PM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(13, 3, 2, '<b><b>Processed Honey</b></b>', '170', '1', '4.jpeg'),
(14, 3, 1, '<b><b>Zandu Pure Honey</b></b>', '118.00', '2', '1.webp'),
(15, 3, 3, '<b><b>Natural Forest Honey</b></b>', '1,500.00', '1', '5.webp'),
(16, 3, 7, '<b><b>Organic Honey</b></b>', '449.00', '1', '3.webp'),
(17, 3, 15, '<b>Rasna Honey</b>', '325.00', '2', '18.webp'),
(18, 3, 12, '<b>Eucalyptus Flora Honey</b>', '567.00', '1', '14.webp');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(17, 3, 'Mitali kasodariya', 'mi163@gmail.com', '856238769', 'feaudsyg'),
(19, 3, 'vidhi', 'v12@gmail.com', '8976895949', 'hello its to good'),
(20, 3, 'hinal', 'hinal12@gmail.com', '5678904321', 'thank you'),
(21, 3, 'cheshta', 'ch16@gmail.com', '6756453434', 'good'),
(22, 3, 'janvi', 'j9@gmail.com', '8989898989', 'ok good'),
(23, 3, 'mitu', 'm163@gmail.com', '742932', 'fevdjdks'),
(24, 3, 'mita', 'm12@gmail', '213', 'fendsj'),
(25, 3, 'vidhi', 'v12@gmail.com', '39084093', 'fjdb,');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'panding'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 3, 'Tata Motors', '78943', 'mi163@gmail.com', 'credit card', 'flat no. s,a,z,klmfd,Qatar,erfd', '<b><b>Sider Honey</b></b>(1)', '85', 'Wed-Aug-2023', 'Complete'),
(3, 3, 'Tata Motors', '87', 'mi163@gmail.com', '', 'flat no. s,,z,jh,Qatar,vu', '<b>Classic honey</b>(1),<b>Forest Honey</b>(1),<b><b>Zandu Pure Honey</b></b>(1),<b><b>Organic Honey</b></b>(1)', '1418', 'Mon-Aug-2023', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_detail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`) VALUES
(1, 'Zandu Pure Honey', '118.00', 'A unique blend of Sunderban Honey & Tulsi made indigenously.\r\n', '1.webp'),
(2, 'Processed Honey', '170', 'It helps to attain smooth and beautiful skin.\r\nIt is a good antiseptic.\r\nProcessed honey removes toxins from the body.', '4.jpeg'),
(3, 'Natural Forest Honey', '1,500.00', 'Builds Strong Immunity.\r\nAntibacterial and antiviral properties.\r\nHelps in weight loss.', '5.webp'),
(4, 'Sider Honey', '85.00', 'Sidr honey decreases blood levels of harmful cholesterol. Fat deposits in the cardiovascular system are diminished, reducing the risk of heart attacks. It increases blood flow and relieves weariness and shortness of breath.\r\n\r\n', '6.webp'),
(5, 'Classic honey', '251.00', 'This is a highly viscous, luxurious variety of honey made from the nectar of a million different flowers.', '9.webp'),
(7, 'Organic Honey', '449.00', 'Brand Is Apis. Model Name Is Himalaya Honey. Maximum Shelf Life Is 24 Months. Organic Is No. ', '3.webp'),
(8, 'Honeyman Multy Honey', '80.00', 'Dairy & Bakery :DairyBread, Buns & EggsToast, Cake & Muffins\r\n', '8.webp'),
(9, 'Forest Honey', '600.00', 'Forest Raw Honey is sourced from the natural beehives up in the trees of forest packed and sold for direct consumption.', '11.webp'),
(10, 'Regales Delight Honey', '130.00', 'Regales Eucalyptus {organic} honey gives gradual rise in blood sugar levels that is believed to help with hunger levels. \r\nHoney is also known to have antioxidant, antimicrobial and soothing effects.\r\n\r\n', '12.webp'),
(11, 'Eucalyptus Flower Forest Honey', '439.00', 'Order Farm Naturelle Eucalyptus Flower Wild Forest (Jungle) Honey 400g Extra |100% Pure Honey| Raw & Unfiltered|Unprocessed|Lab Tested Honey In Glass Jar with Engraved Virgin Wooden Spoon|Antioxidant, Anti-inflammatory Honey online at Jiomart and save.', '13.webp'),
(12, 'Eucalyptus Flora Honey', '567.00', 'Eucalyptus honey is raw, natural, pure and unprocessed. \r\nIt comes directly from our bee hives kept in their natural form.', '14.webp'),
(13, 'The B Queen Co - Euclapytps Honey |', '279.00', 'Eucalyptus honey - is just like its plant that has high medicinal value and is considered to be very effective against normal cough, cold, and throat infection.', '15.webp'),
(14, 'Langnese Golden Honey', '1,590.00', 'Brand Is Langnese. \r\nModel Name Is Golden Pure Honey 1kg Product Of Germany.', '16.webp'),
(15, 'Rasna Honey', '325.00', 'Brand Is Rasna. Honey Form Is Raw Honey. Model Name Is Honey 1 Kg. Maximum Shelf Life Is 24 Months.', '18.webp'),
(16, 'Nature\'s Nectar Organic Honey', '460.00', 'Nature\'s Nectar Organic Honey Improves metabolism, Strong antiviral and Antibacterial properties.', '19.webp'),
(17, 'DADEV Organic and Raw Honey', '474.00', 'Dadev Raw Honey comes with high pollen counts.\r\nUnprocessed and Raw Forest Honey.', '20.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'CHOTALIYA SAHIL BHUPATBHAI', 'sahil@gmail.com', '123', 'user'),
(2, 'CHOTALIYA SAHIL BHUPATBHAI', 'jaadu@gmail.com', '123', 'admin'),
(3, 'MITALI', 'm163@gmail.com', '123', 'user'),
(4, 'Mitali Kasodariya', 'mittu.kasodariya163@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(8, 3, '2', '<b>Processed Honey</b>', '170', '4.jpeg'),
(9, 3, '1', '<b>Zandu Pure Honey</b>', '118.00', '1.webp'),
(10, 3, '3', '<b>Natural Forest Honey</b>', '1,500.00', '5.webp'),
(11, 3, '7', '<b>Organic Honey</b>', '449.00', '3.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
