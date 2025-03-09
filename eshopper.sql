-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2025 at 10:22 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`cart_id`)
) AUTO_INCREMENT=75;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(49, 63, 21, 3),
(73, 5, 6, 10),
(50, 63, 4, 1),
(72, 5, 6, 10),
(71, 5, 6, 10),
(74, 5, 6, 10),
(37, 69, 23, 2),
(70, 5, 6, 10),
(38, 69, 30, 3),
(69, 67, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(70) NOT NULL,
  `cat_image` text NOT NULL,
  `cat_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`cat_id`)
) AUTO_INCREMENT=24;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_image`, `cat_status`) VALUES
(21, 'Night wear', '15608236a.webp', 'active'),
(17, 'Men&#039;s Dresses', 'pexels-photo-1040945.webp', 'active'),
(18, 'Women&#039;s Dresses', 'Blue embroidered Cottotn Fit and Flare Dress 899.jpg', 'active'),
(22, 'Baby&#039;s Dresses', 'pexels-ionela-mat-268382825-19845247.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `state_id` int DEFAULT NULL,
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(60) NOT NULL,
  PRIMARY KEY (`city_id`)
) AUTO_INCREMENT=22;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`state_id`, `city_id`, `city_name`) VALUES
(1, 1, 'surat'),
(1, 2, 'Ahmedabad'),
(1, 3, 'Vadodara'),
(2, 4, 'Ajmer'),
(2, 5, 'Udaipur'),
(2, 6, 'Jodhpur'),
(3, 7, 'Nashik'),
(3, 8, 'Aurangabad'),
(3, 9, 'Solapur'),
(1, 21, 'Valsad'),
(4, 11, 'Gvaliar'),
(5, 12, 'Agra'),
(5, 13, 'Gorakhpur'),
(5, 14, 'Varansi'),
(3, 15, 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `date` text NOT NULL,
  `user_id` int DEFAULT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `add_1` text NOT NULL,
  `add_2` text NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `products` text NOT NULL,
  `subtotal` float NOT NULL,
  `shipping` float NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`order_id`)
) AUTO_INCREMENT=18;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `user_id`, `first_name`, `last_name`, `email`, `mobile`, `add_1`, `add_2`, `country`, `city`, `state`, `zip`, `products`, `subtotal`, `shipping`, `total`) VALUES
(16, 'Monday, 21st October 2024 01:14:57 PM', 67, 'amisha', 'Jogani', 'thummaramisha@gmail.com', '8460757323', 'abcd', 'efg', 'Albania', 'suart', 'Gujarat', '395006', '[{\"product_id\":\"11\",\"product_name\":\"Baby romper\",\"quantity\":\"1\",\"price\":\"599\"},{\"product_id\":\"6\",\"product_name\":\"golden rose dress\",\"quantity\":\"2\",\"price\":\"3299\"},{\"product_id\":\"19\",\"product_name\":\"night wear\",\"quantity\":\"1\",\"price\":\"599\"}]', 7796, 50, 7846),
(17, 'Monday, 21st October 2024 01:20:39 PM', 67, 'ishanvi2', 'Jogani', 'thummaramisha@gmail.com', '8460757323', 'abcd', 'efg', 'Algeria', 'Surat', 'Gujarat', '395006', '[{\"product_id\":\"12\",\"product_name\":\"Baby Dress\",\"quantity\":\"1\",\"price\":\"700\"},{\"product_id\":\"8\",\"product_name\":\"abcd\",\"quantity\":\"1\",\"price\":\"899\"}]', 1599, 50, 1649);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(70) NOT NULL,
  `price1` varchar(60) NOT NULL,
  `price2` varchar(60) NOT NULL,
  `details` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=34;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `name`, `price1`, `price2`, `details`) VALUES
(7, 18, 'mauve-woven-design-rayon-straight-kurta-libas-1.jpg', 'abcd', '1000', '1100', 'abcd'),
(4, 18, 'hand painted organza 3199.webp', 'Hand Printed Organza', '2200', '2299', 'Women Hand Printed Organza'),
(8, 10, 'pexels-ionela-mat-268382825-19845247.jpg', 'abcd', '899', '999', 'abcd'),
(12, 10, 'pexels-vika-glitter-392079-1648377.jpg', 'Baby Dress', '700', '899', 'Baby Dress'),
(6, 18, 'inweave elephant print dress 2999.webp', 'golden rose dress', '3299', '3500', 'women golden rose dress'),
(11, 10, 'pexels-pixabay-459976.jpg', 'Baby romper', '599', '799', 'Baby Romper'),
(13, 22, 'pexels-d-ng-thanh-tu-2922122-5693890.jpg', 'Orange Frock', '999', '1099', 'abcd'),
(14, 22, 'pexels-ionela-mat-268382825-19845247.jpg', 'Mustered Yellow Frock', '1200', '1300', 'abcdef'),
(15, 22, 'pexels-pixabay-459976.jpg', 'Baby Romper', '599', '699', 'abcdef'),
(21, 17, 'pexels-photo-3637179.webp', 'abcd', '1200', '1200', 'abcd'),
(27, 17, 'pexels-photo-3724358.webp', 'abcd', '1200', '1200', 'abcd'),
(19, 21, '17372337a.webp', 'night wear', '599', '699', 'night wear'),
(22, 17, 'fashion-men-s-individuality-black-and-white-157675.webp', 'Mens dress', '1200', '1300', 'abcdeghgj'),
(23, 18, 'free-photo-of-a-woman-in-a-plaid-skirt-and-white-t-shirt.jpeg', 'womens dress', '1300', '1400', 'adhwygdyvb'),
(24, 22, 'free-photo-of-cute-baby-girl-with-her-teddy-bear.jpeg', 'babys dress', '899', '999', 'vqdy'),
(25, 21, '12193381a.webp', 'night wear', '580', '699', 'ajdygffv'),
(28, 17, 'pexels-photo-1040945.webp', 'mens dress', '1300', '1400', 'abcd'),
(30, 18, 'free-photo-of-a-woman-in-a-crop-top-and-leggings-poses-for-a-photo.jpeg', 'women dress', '899', '1199', 'women dress'),
(31, 22, 'pexels-photo-5010748.jpeg', 'baby dress', '499', '599', 'baby dress'),
(32, 17, 'pexels-photo-1043474.webp', 'mens dress', '899', '999', 'mens dress'),
(33, 21, '15900736b.jpg', 'night wear', '499', '599', 'night wear');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(60) NOT NULL,
  PRIMARY KEY (`state_id`)
) AUTO_INCREMENT=8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`) VALUES
(1, 'Gujarat'),
(2, 'Rajasthan'),
(3, 'Maharashtra'),
(4, 'MP'),
(5, 'UP'),
(6, 'Kerala'),
(7, 'Tamilnadu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `confpassword` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `pincode` int NOT NULL,
  PRIMARY KEY (`user_id`)
) AUTO_INCREMENT=78;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `gender`, `dob`, `email`, `password`, `confpassword`, `address`, `state`, `city`, `pincode`) VALUES
(63, 'Amisha', 'Female', '2024-09-25', 'thummaramisha@gmail.com', 'Amisha2123', 'Amisha@123', 'surat', '5', 'Surat', 395006),
(67, 'Ishanvi', 'Female', '2024-09-27', 'ishu@gmail.com', 'Ishanvi@123', 'Ishanvi@123', 'Surat', '1', 'Ahmedabad', 395006);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `wish_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`wish_id`)
) AUTO_INCREMENT=37;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `user_id`, `product_id`) VALUES
(25, 67, 8),
(20, 67, 4),
(36, 67, 19),
(33, 63, 8),
(32, 63, 21),
(31, 63, 4),
(35, 63, 7),
(27, 67, 12),
(28, 67, 6),
(29, 67, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
