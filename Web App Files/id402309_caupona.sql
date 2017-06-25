-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2017 at 06:27 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id402309_caupona`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_meta`
--

CREATE TABLE `customers_meta` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers_meta`
--

INSERT INTO `customers_meta` (`id`, `email`) VALUES
(6, ''),
(8, 'hey@gmail.com'),
(7, 'heya@gmail.com'),
(5, 'heythere@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `customer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tabno` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `total` int(4) NOT NULL,
  `timeoforder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `paid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `rest_id`, `customer_email`, `tabno`, `food_id`, `quantity`, `total`, `timeoforder`, `status`, `paid`) VALUES
(8, 2, 'hey@gmail.com', 1, 2, 3, 477, '2017-06-25 00:29:31', 1, 1),
(9, 1, 'hi@gmail.com', 31, 6, 3, 135, '2017-06-25 00:39:06', 0, 0),
(11, 2, 'hey@gmail.com', 1, 1, 2, 240, '2017-06-25 01:48:11', 1, 1),
(12, 2, 'hey@gmail.com', 2, 2, 3, 477, '2017-06-25 02:51:05', 1, 1),
(13, 2, 'hey@gmail.com', 1, 6, 7, 315, '2017-06-25 03:10:40', 1, 1),
(21, 2, 'hey@gmail.com', 2, 1, 10, 1200, '2017-06-25 04:03:04', 1, 1),
(23, 2, 'heythere@gmail.com', 35, 3, 3, 447, '2017-06-25 04:05:41', 1, 1),
(24, 2, 'heythere@gmail.com', 35, 2, 10, 1590, '2017-06-25 04:06:09', 1, 1),
(25, 2, '', 1000, 0, 0, 0, '2017-06-25 04:23:00', 1, 0),
(26, 1, '', 1000, 0, 0, 0, '2017-06-25 04:24:41', 1, 0),
(27, 2, 'heythere@gmail.com', 35, 4, 4, 276, '2017-06-25 04:33:50', 1, 1),
(28, 2, 'heythere@gmail.com', 35, 7, 9, 495, '2017-06-25 04:34:08', 1, 1),
(29, 2, 'heythere@gmail.com', 35, 2, 4, 636, '2017-06-25 04:41:30', 0, 0),
(30, 2, 'heythere@gmail.com', 35, 5, 8, 1240, '2017-06-25 04:42:00', 0, 0),
(31, 2, 'heythere@gmail.com', 35, 6, 6, 270, '2017-06-25 04:42:24', 0, 0),
(33, 2, 'hey@gmail.com', 35, 1, 2, 240, '2017-06-25 05:14:37', 0, 0),
(34, 2, 'hey@gmail.com', 35, 1, 3, 360, '2017-06-25 05:15:01', 0, 0),
(35, 2, 'heythere@gmail.com', 35, 1, 2, 240, '2017-06-25 05:18:48', 0, 0),
(36, 2, 'heythere@gmail.com', 35, 1, 2, 240, '2017-06-25 05:19:36', 0, 0),
(37, 2, 'hey@gmail.com', 35, 1, 2, 240, '2017-06-25 05:25:49', 0, 0),
(38, 2, 'hey@gmail.com', 35, 1, 12, 1440, '2017-06-25 05:27:47', 0, 0),
(39, 2, 'heythere@gmail.com', 31, 1, 5, 600, '2017-06-25 05:33:52', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Restaurents`
--

CREATE TABLE `Restaurents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Restaurents`
--

INSERT INTO `Restaurents` (`id`, `name`) VALUES
(1, 'Hotel Sitara'),
(2, 'Hotel Caupona'),
(3, 'Caupona Café'),
(4, 'Caupona4'),
(5, 'Caupona5');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `food_id` int(1) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `food_id`, `rating`) VALUES
(1, 32, 5),
(2, 34, 3);

-- --------------------------------------------------------

--
-- Table structure for table `univ_menus`
--

CREATE TABLE `univ_menus` (
  `id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `food_item` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `image_url` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(4) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `allergens` int(1) NOT NULL,
  `veg` int(1) NOT NULL,
  `cat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `univ_menus`
--

INSERT INTO `univ_menus` (`id`, `rest_id`, `food_item`, `image_url`, `price`, `description`, `allergens`, `veg`, `cat`) VALUES
(1, 2, 'Manchurian', 'http://cdn3.foodviva.com/static-content/food-images/chinese-recipes/vegetable-manchurian-gravy-recipe/vegetable-manchurian-gravy-recipe.jpg', 120, 'Heavenly balls made of vegetables in a gravy which resembles the nectar of the gods.  Approx. Serving Time : 12 min. No. of Servings:2', 0, 1, 1),
(2, 2, 'Pepperoni Pizza', 'data:image/jpeg;base64,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', 159, 'Disks of dough with a generous spread of cheese and tomato puree with vegetables and pepperoni on it and then slowly baked in an oven to give an amazing taste of heaven. Approx. Serving Time: 20 min. No. of Servings: 2', 1, 0, 2),
(3, 2, 'Alfredo Pasta', 'http://www.topsecretrecipes.com/images/P/olive-garden-alfredo-pasta-copycat-recipe.jpg', 149, 'Macaroni + chesse + heat + mayonnaise + sauce = Alfredo Pasta. Approx. Serving Time: 20 min. No. of Servings:1', 0, 1, 2),
(4, 2, 'Khichdi', 'http://www.vegrecipesofindia.com/wp-content/uploads/2014/07/khichdi-recipe-2.jpg', 69, 'Lentils + Boiled Rice + salt + spices + heat = Kichidi. Approx. Serving Time: 10 min. No. of Servings:1', 0, 1, 2),
(5, 2, 'Paneer Butter Masala', 'http://indianhealthyrecipes.com/wp-content/uploads/2014/11/paneer-butter-masala-recipe-012.jpg', 155, 'Panner + Tomato puree + masala + cream + Heat= Panner Butter Masala. Approx. Serving Time: 10 min. No. of Servings:2', 0, 1, 2),
(6, 2, 'Cappuccino', 'https://static1.squarespace.com/static/524b0cc5e4b052d320043cd2/t/5261693fe4b0c00e49809c00/1382115659249/coffee-cup.jpg?format=2500w', 45, 'Espresso + Milk + Sugar + Cream + Heat = Cappuccino. Approx. Serving Time: 5 min. No. of Servings:1', 0, 1, 4),
(7, 2, 'Black Forest Pastry', 'https://birdys.co.in/birdys_ecom/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_forest_slice_1.jpg', 55, 'Falls magically from the sky. Approx. Serving Time: 5min. No. of Servings:1', 0, 0, 3),
(8, 2, 'Chicken Burger', 'data:image/jpeg;base64,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', 89, 'Bun + Chicken Tikka + Cream + Sause + Cheese + Lettuce + Tomato + Heat = Chicken Burger. Approx. Serving Time: 10 min. No. of Servings:1', 0, 0, 2),
(9, 2, 'Donut', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-KvM2FxHQUiKG0s1c_mmc8cUW74FEg0LtSmmZHiswNJdFRz2-', 79, 'Chocolate + Sweet Vada - Heat = Donut. Approx. Serving Time: 5 min. No. of Servings:1', 0, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_meta`
--
ALTER TABLE `customers_meta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Restaurents`
--
ALTER TABLE `Restaurents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `univ_menus`
--
ALTER TABLE `univ_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_meta`
--
ALTER TABLE `customers_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `Restaurents`
--
ALTER TABLE `Restaurents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `univ_menus`
--
ALTER TABLE `univ_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
