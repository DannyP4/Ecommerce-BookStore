-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 05:43 PM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `email` text NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `mypassword`, `created_at`) VALUES
(1, 'admin.first@gmail.com', 'admin.first@gmail.com', '$2y$10$DQn3CsswUp7ctGTXylcffu6S6n.dlxvxzErcJQeNkgMnqmxWS0FVS', '2025-06-05 17:03:49'),
(2, 'admin2@gmail.com', 'admin2', '$2y$10$.qAX3xAowNdzvW8LkzFIk.UbBcaUYjk.pCZHQApKOv66VU0M02C3O', '2025-06-05 18:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(3) NOT NULL,
  `pro_amount` int(3) NOT NULL,
  `pro_file` varchar(200) NOT NULL,
  `user_id` int(3) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pro_id`, `pro_name`, `pro_image`, `pro_price`, `pro_amount`, `pro_file`, `user_id`, `create_at`) VALUES
(73, 1, 'Node', 'node.png', 20, 1, 'node.pdf', 7, '2025-06-07 15:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`) VALUES
(1, 'Design', 'Explore the art and science of visual communication. Our design books cover everything from graphic design principles to user experience, helping you bring ideas to life through creativity and strategy.', 'des.jpg', '2025-06-05 16:19:45'),
(2, 'Programming', 'Master the building blocks of modern technology. Whether you\'re a beginner or an experienced developer, our programming books span languages, frameworks, and best practices to sharpen your coding skills.                                                      ', 'programming_20evolution.jpg', '2025-06-05 16:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `user_id` int(3) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `username`, `fname`, `lname`, `token`, `price`, `user_id`, `create_at`) VALUES
(23, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX8eXHp65tXrQ3P5yWhpHBZ', '20', 6, '2025-06-06 22:22:23'),
(24, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX9S5Hp65tXrQ3PqWgSFMkN', '30', 6, '2025-06-06 23:13:36'),
(25, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX9VhHp65tXrQ3P4mFz5ZoZ', '20', 6, '2025-06-06 23:17:20'),
(26, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX9fcHp65tXrQ3PMivRHx0Y', '20', 6, '2025-06-06 23:27:34'),
(27, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX9gcHp65tXrQ3PGZZxXl7N', '10', 6, '2025-06-06 23:28:37'),
(28, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX9oSHp65tXrQ3PhOkkUrgt', '30', 6, '2025-06-06 23:36:42'),
(29, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RX9rkHp65tXrQ3PajC7DLsU', '20', 6, '2025-06-06 23:40:07'),
(30, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RXA3YHp65tXrQ3Py9KcZ9oY', '20', 6, '2025-06-06 23:52:19'),
(31, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RXOl7Hp65tXrQ3PKmTtmDRP', '30', 7, '2025-06-07 15:34:20'),
(32, 'longpd1911@gmail.com', 'long12', 'abc', 'abcd', 'tok_1RXOoSHp65tXrQ3PtLUZR2BI', '20', 6, '2025-06-07 15:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(3) NOT NULL,
  `file` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `category_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `file`, `description`, `status`, `category_id`, `created_at`) VALUES
(1, 'Node Basics', 'node.png', 20, 'node.pdf', 'Node.js is a powerful JavaScript runtime built on Chrome\'s V8 engine, designed for building scalable and efficient server-side applications. With its non-blocking I/O model and event-driven architecture, Node.js is ideal for real-time applications like chat apps, APIs, and microservices.', 1, 2, '2025-06-01 20:00:12'),
(2, 'Django Basics', 'django.png', 10, 'django.pdf', 'Django is a high-level Python framework that emphasizes rapid development and clean, pragmatic design. It comes with a robust ORM, built-in admin panel, and security features that make it ideal for building secure and scalable web applications quickly.', 1, 2, '2025-06-01 20:00:12'),
(3, 'Html5 Basics', 'html5.jpg', 30, 'html5.pdf', 'HTML5 introduces the modern structure of web content, offering semantic tags and multimedia capabilities without the need for external plugins. It\'s the foundation of every website, making it essential for anyone starting their web development journey.', 1, 2, '2025-06-01 20:00:12'),
(5, 'Photoshop Book', 'Photoshop-logo.png', 40, 'pts.pdf', 'Adobe Photoshop is the industry-standard tool for image editing, graphic design, and digital art creation. From retouching photos to creating complex compositions, it offers a wide range of tools to bring your visual ideas to life.', 1, 1, '2025-06-06 20:10:35'),
(6, 'System Design', 'System-Design.jpg', 30, 'sys-des.pdf', 'System Design is a critical skill for backend developers and architects, covering how to build scalable, resilient, and maintainable software systems. It includes concepts like load balancing, data partitioning, caching strategies, and service decoupling.', 1, 1, '2025-06-07 15:12:52'),
(7, 'Canva Design', 'canva.jpg', 20, 'canva.pdf', 'Canva is a user-friendly online design tool that empowers anyone to create stunning visuals for social media, marketing, and branding. With drag-and-drop functionality and a vast library of templates, it\'s perfect for both beginners and professionals.\n\n', 1, 1, '2025-06-07 15:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `created_at`) VALUES
(5, 'long1234', 'abclmao@mailforspam.com', '$2y$10$lz88v4lM6BLSlfygbegCwO4LC4J2F789njbWl8nva8/cWyK5XsZD6', '2025-05-18 18:22:55'),
(6, 'long12', 'longpd1911@gmail.com', '$2y$10$DQn3CsswUp7ctGTXylcffu6S6n.dlxvxzErcJQeNkgMnqmxWS0FVS', '2025-05-31 18:47:22'),
(7, 'long12', 'longpd1911_2@gmail.com', '$2y$10$4X.F6w9GWrL6xSF7vvCzn.0BvpTl.HmNA2GJH422AaBJL4/iXYPEq', '2025-06-02 18:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pro_id`, `pro_name`, `pro_image`, `pro_price`, `user_id`, `create_at`) VALUES
(21, 2, 'Django', 'django.png', 10, 6, '2025-06-07 14:04:49'),
(22, 1, 'Node', 'node.png', 20, 6, '2025-06-07 14:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
