-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2024 at 05:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'username', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'customer', 'customer@gmail.com', 'customer', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `qty`, `price`, `image`, `login_id`, `tag`, `description`) VALUES
(2, 'African Lily', 20, 100.00, 'upload/African-Lily.jpg', 1, 'plant', 'African lily'),
(3, 'Decoration Plantt', 50, 500.00, 'upload/plant decor.jpg', 1, 'supplies', 'asd'),
(4, 'Pebbles', 500, 670.00, 'upload/pebbles.jpg', 1, 'decor', 'Elevate your home decor with our set of 50 exquisite Decoration Pebbles. Crafted with meticulous attention to detail, these pebbles are the perfect addition to your creative projects. Their smooth, polished surfaces and diverse colors lend an elegant touch to floral arrangements, centerpieces, or aquariums. Whether you&#039;re embellishing your garden or designing a unique interior display, our Decoration Pebbles offer endless possibilities. Enhance your space with these versatile, high-quality stones and let your imagination run wild.'),
(5, 'Plant showcase', 50, 200.00, 'upload/plant showcase.jpg', 1, 'decor', 'Introducing our Plant Showcase – a stunning piece of wooden craftsmanship designed to elegantly display your botanical treasures. Crafted from high-quality wood, this showcase adds a touch of rustic charm to your space while providing a perfect backdrop for your beloved plants. With its spacious, adjustable shelves and minimalist design, it&#039;s a versatile and stylish solution for showcasing your indoor garden. Bring the beauty of nature indoors and create a warm, inviting atmosphere with our Wooden Plant Showcase, a perfect addition to any decor.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
