-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 12:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careersads`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(50) NOT NULL,
  `categ_image` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categ_id`, `categ_name`, `categ_image`, `updated_at`, `created_at`) VALUES
(1, 'Education', '', '2020-11-12 15:36:23', '2020-11-12 15:36:23'),
(2, 'Medicinal', '', '2020-11-12 15:36:23', '2020-11-12 15:36:23'),
(5, 'test2', '1605211929.jpg', '2020-11-13 15:09:59', '2020-11-12 18:12:09'),
(14, 'Test3', '1605293999.jpg', '2020-11-13 17:00:00', '2020-11-13 17:00:00'),
(22, 'Services', '1605712991.jpg', '2020-11-18 13:23:11', '2020-11-18 13:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `masseges`
--

CREATE TABLE `masseges` (
  `msg_id` int(11) NOT NULL,
  `msg_name` varchar(30) NOT NULL,
  `msg_email` varchar(50) NOT NULL,
  `msg_phone` varchar(20) NOT NULL,
  `msg_text` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `masseges`
--

INSERT INTO `masseges` (`msg_id`, `msg_name`, `msg_email`, `msg_phone`, `msg_text`, `updated_at`, `created_at`) VALUES
(1, 'tawfeeq', 'tawfeeq@gmail.com', '0799311294', 'test TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST TEST', '2020-11-21 21:46:18', '2020-11-21 21:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_description` varchar(500) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `post_phone` varchar(20) NOT NULL,
  `post_email` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_type_id` int(11) NOT NULL,
  `categ_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_description`, `post_name`, `post_phone`, `post_email`, `updated_at`, `created_at`, `post_type_id`, `categ_id`, `sub_id`) VALUES
(1, 'title', 'Description', 'name', '0799331294', 'test@gmail.com', '2020-11-14 17:39:45', '2020-11-14 17:39:45', 1, 14, 8),
(2, 'title2', 'Description2', 'name2', '0799331294', 'tsest2@gmail.com', '2020-11-14 17:43:13', '2020-11-14 17:43:13', 2, 1, 2),
(3, 'test4', 'test4', 'tt', '123456789', 'test@gmail.com', '2020-11-17 22:31:30', '2020-11-17 22:31:30', 1, 14, 8),
(4, 'title3', 'mn,mn,m', 'name3', '0799331294', 'tawfeeq@gmail.com', '2020-11-18 18:52:29', '2020-11-18 18:52:29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_types`
--

CREATE TABLE `post_types` (
  `post_type_id` int(11) NOT NULL,
  `post_type_name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_types`
--

INSERT INTO `post_types` (`post_type_id`, `post_type_name`, `updated_at`, `created_at`) VALUES
(1, 'Job Seekers', '2020-11-14 17:12:30', '2020-11-14 17:12:30'),
(2, 'Vacancies', '2020-11-14 17:12:30', '2020-11-14 17:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `categ_id` int(11) NOT NULL,
  `categ_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`sub_id`, `sub_name`, `updated_at`, `created_at`, `categ_id`, `categ_name`) VALUES
(1, 'Mathematics Teacher ', '2020-11-12 15:38:19', '2020-11-12 15:38:19', 1, 'Education'),
(2, 'English teacher', '2020-11-12 15:38:19', '2020-11-12 15:38:19', 1, 'Education'),
(7, 'physics', '2020-11-13 16:10:14', '2020-11-13 16:10:14', 1, 'Education'),
(8, 'Test3', '2020-11-13 19:05:40', '2020-11-13 17:01:08', 14, 'Test3'),
(9, 'social services', '2020-11-18 13:23:55', '2020-11-18 13:23:55', 22, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `user_phone`, `password`, `updated_at`, `created_at`, `user_type_id`) VALUES
(3, 'tawfeeq2', 'tawfeeq2@gmail.com', '0788454317', '$2y$10$EoH1UH/TuaOwIM9yeyblg.r5P8EVZ37HSTyko0ODfX.5qQbRgPfui', '2020-11-15 05:49:12', '2020-11-15 05:49:12', 2),
(4, 'tawfeeq3', 'tawfeeq3@gmail.com', '1234567898', '$2y$10$5XoDx3kkm/89DlgeAxzmKOjdeX7aFl3kRuO96DNRpdabuG.q50knK', '2020-11-15 06:22:51', '2020-11-15 06:22:51', 2),
(5, 'admin', 'admin@gmail.com', '0799999999', '$2y$10$3Ns.5wd5bELpQA1VWmccpOvOBRZ7UIpBpqnantLM/NmEcgsWgpBj6', '2020-11-15 06:29:59', '2020-11-15 06:29:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type`, `updated_at`, `created_at`) VALUES
(1, 'admin', '2020-11-11 15:50:43', '2020-11-11 15:50:43'),
(2, 'guest', '2020-11-11 15:50:43', '2020-11-11 15:50:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indexes for table `masseges`
--
ALTER TABLE `masseges`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_type_id` (`post_type_id`),
  ADD KEY `categ_id` (`categ_id`),
  ADD KEY `subcateg_id` (`sub_id`);

--
-- Indexes for table `post_types`
--
ALTER TABLE `post_types`
  ADD PRIMARY KEY (`post_type_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `categorie_name` (`categ_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `masseges`
--
ALTER TABLE `masseges`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_types`
--
ALTER TABLE `post_types`
  MODIFY `post_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `categ_id` FOREIGN KEY (`categ_id`) REFERENCES `categories` (`categ_id`),
  ADD CONSTRAINT `post_type_id` FOREIGN KEY (`post_type_id`) REFERENCES `post_types` (`post_type_id`),
  ADD CONSTRAINT `subcateg_id` FOREIGN KEY (`sub_id`) REFERENCES `subcategories` (`sub_id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categorie_name` FOREIGN KEY (`categ_id`) REFERENCES `categories` (`categ_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`user_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
