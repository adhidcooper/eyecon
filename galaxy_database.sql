-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 03:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaxy_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `visible`) VALUES
(1, 'FOSSIL', 1),
(2, 'JOHN JACOBS', 1),
(5, 'P-O-L-I-C-E', 1),
(6, 'TITAN eye', 1),
(7, 'VINCENT CHASE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quality` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_title`, `ip_address`, `quality`) VALUES
(38, 42, 'Zero light T-n42', '::1', 1),
(40, 26, 'Fossil G Ware 40', '127.0.0.1', 1),
(41, 43, 'Mens node c64', '127.0.0.1', 1),
(42, 46, 'VC Bold-Men 03', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `visible`) VALUES
(1, 'Specticals', 1),
(2, 'Lens', 1),
(7, 'Frames', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `date` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `views`, `visible`, `date`) VALUES
(26, 1, 1, 'Fossil G Ware 40', 1025, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'FOSSIL eyeglasses 1.jpeg', 'Fossil G ware 40 ', 0, 0, ''),
(27, 1, 1, 'OLD GOLD Lady 47', 1200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'FOSSIL eyeglasses 2.jpeg', 'OLD GOLD Lady 47', 0, 0, ''),
(28, 1, 1, 'OLD GOLD men 84', 1502, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'FOSSIL eyeglasses 3.jpeg', 'OLD GOLD men 84', 0, 0, ''),
(29, 1, 1, 'FB-Fork18', 1102, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'FOSSIL eyeglasses 4.jpeg', 'FB FOSSIL 18 Fork', 0, 0, ''),
(30, 1, 2, 'JJ NXB-12', 1240, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'JohnJacobs-eyeglasses 1.jpeg', '12 JJ NXB ', 0, 0, ''),
(31, 1, 2, 'JJ NXB-12 Light', 1200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'JohnJacobs-eyeglasses 5.jpeg', 'JJ NXB-12 Light', 0, 0, ''),
(32, 1, 2, 'JJ NXB-12 BEAST', 1240, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'JohnJacobs-eyeglasses 4.jpeg', 'JJ NXB-12 BEAST', 0, 0, ''),
(34, 1, 2, 'React Series T-4', 1122, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'JohnJacobs-eyeglasses 3.jpeg', 'React Series T-4', 0, 0, ''),
(35, 1, 2, 'NB16 JJ x03', 1142, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'JohnJacobs-eyeglasses 2.jpeg', 'NB16 JJ x03', 0, 0, ''),
(36, 1, 5, 'P Night-Eyeshades M1', 950, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'P-O-L-I-C-E type 4 glass.jpeg', 'P Night-Eyeshades M1', 0, 0, ''),
(37, 1, 5, 'P Bright-Eyeshades M9', 980, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'P-O-L-I-C-E type 5 glass.jpeg', 'P Bright-Eyeshades M9', 0, 0, ''),
(39, 1, 5, 'M Night black M32', 1532, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'P-O-L-I-C-E type 2 glass.png', 'M Night Black M32', 0, 0, ''),
(40, 1, 5, 'Jet-Cruze Prime-10', 1602, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'P-O-L-I-C-E type 3 glass.jpeg', 'Jet Cruze Prime 10', 0, 0, ''),
(41, 1, 6, 'hex light T-n40', 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'TITANeye+ glass 1.jpeg', 'Titan hex light T-n40', 0, 0, ''),
(42, 1, 6, 'Zero light T-n42', 1040, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'TITANeye+ glass 3.jpeg', 'Titan eye zero light t-n42', 0, 0, ''),
(43, 1, 6, 'Mens node c64', 1480, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'TITANeye+ glass 4.jpeg', 'Mens node c64 Titan', 0, 0, ''),
(44, 1, 6, 'Ladies Node c84 ', 1480, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'TITANeye+ glass 5.jpeg', 'Ladies Node c84', 0, 0, ''),
(45, 1, 6, 'Fragment-864', 1420, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'TITANeye+ glass 6.jpeg', 'Fragment Titan Eye 864', 0, 0, ''),
(46, 1, 7, 'VC Bold-Men 03', 1542, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'vincent chase-eyeglasses_1.jpeg', 'Vincent chase VC Bold men 03', 0, 0, ''),
(47, 1, 7, 'VC Women-x303', 1542, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'vincent chase-eyeglasses_2.jpeg', 'Vincent chase VC Women x303', 0, 0, ''),
(49, 1, 7, 'Vice Polo-L4', 1582, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'vincent chase-eyeglasses_4.jpeg', 'Vice polo l4 Vincent chase', 0, 0, ''),
(50, 1, 7, 'Vice Polo-L5', 1582, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'vincent chase-eyeglasses_5.jpeg', 'Vice Polo L5 Vincent chase', 0, 0, ''),
(51, 1, 7, 'Nord cool-max-3', 1082, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'vincent chase-eyeglasses_6.jpeg', 'Nord cool max3 Vincent chase\r\n', 0, 1, 'February 13, 2022'),
(52, 1, 5, 'Jet-Cruze Hex-32', 1542, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'P-O-L-I-C-E type 1 glass.jpeg', 'Jet Cruze Hex 32 Police', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'guest',
  `visible` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `name`, `email`, `password`, `country`, `city`, `contact`, `user_address`, `image`, `role`, `visible`) VALUES
(10, '127.0.0.1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'India', '', '', '', 'admin.png', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
