-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 12:15 PM
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
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `unit_quantity` varchar(50) NOT NULL,
  `in_stock` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `unit_price`, `unit_quantity`, `in_stock`, `category_id`) VALUES
(1000, 'Fish Fingers', 2.55, '500 gram', 1500, 1),
(1001, 'Fish Fingers', 5.00, '1000 gram', 750, 1),
(1002, 'Hamburger Patties', 2.35, 'Pack 10', 1200, 1),
(1003, 'Shelled Prawns', 6.90, '250 gram', 300, 1),
(1004, 'Tub Ice Cream', 1.80, '1 Litre', 800, 1),
(1005, 'Tub Ice Cream', 3.40, '2 Litre', 1200, 1),
(2000, 'Panadol', 3.00, 'Pack 24', 2000, 2),
(2001, 'Panadol', 5.50, 'Bottle 50', 1000, 2),
(2002, 'Bath Soap', 2.60, 'Pack 6', 500, 2),
(2003, 'Garbage Bags Small', 1.50, 'Pack 10', 500, 2),
(2004, 'Garbage Bags Large', 5.00, 'Pack 50', 300, 2),
(2005, 'Washing Powder', 4.00, '1000 gram', 800, 2),
(2006, 'Laundry Bleach', 3.55, '2 Litre Bottle', 500, 2),
(3000, 'Cheddar Cheese', 8.00, '500 gram', 1000, 3),
(3001, 'Cheddar Cheese', 15.00, '1000 gram', 1000, 3),
(3002, 'T Bone Steak', 7.00, '1000 gram', 200, 3),
(3003, 'Navel Oranges', 3.99, 'Bag 20', 200, 3),
(3004, 'Bananas', 1.49, 'Kilo', 400, 3),
(3005, 'Peaches', 2.99, 'Kilo', 500, 3),
(3006, 'Grapes', 3.50, 'Kilo', 200, 3),
(3007, 'Apples', 1.99, 'Kilo', 500, 3),
(4000, 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200, 4),
(4001, 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200, 4),
(4002, 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800, 4),
(4003, 'Instant Coffee', 2.89, '200 gram', 500, 4),
(4004, 'Instant Coffee', 5.10, '500 gram', 500, 4),
(4005, 'Chocolate Bar', 2.50, '500 gram', 300, 4),
(5000, 'Dry Dog Food', 5.95, '5 kg Pack', 400, 5),
(5001, 'Dry Dog Food', 1.95, '1 kg Pack', 400, 5),
(5002, 'Bird Food', 3.99, '500g packet', 200, 5),
(5003, 'Cat Food', 2.00, '500g tin', 200, 5),
(5004, 'Fish Food', 3.00, '500g packet', 200, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
