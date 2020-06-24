-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2020 at 07:12 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitterStyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `text` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`id`, `userId`, `postId`, `text`, `creationDate`) VALUES
(1, 4, 13, 'Comment for tweet with id 13', '2020-06-17 15:18:11'),
(2, 2, 30, 'Comment for tweet with id 13', '2020-06-17 15:54:45'),
(3, 2, 23, 'Comment for tweet with id 23', '2020-06-17 15:55:17'),
(4, 2, 18, 'Comment for tweet with id 18', '2020-06-17 15:55:38'),
(5, 2, 13, 'Comment for tweet with id 13', '2020-06-17 15:56:24'),
(6, 2, 9, 'Comment for tweet with id 9', '2020-06-17 15:56:40'),
(7, 2, 8, 'Comment for tweet with id 8', '2020-06-17 15:56:57'),
(8, 2, 5, 'Comment for tweet with id 5', '2020-06-17 15:57:19'),
(9, 2, 4, 'Comment for tweet with id 4', '2020-06-17 15:57:31'),
(10, 2, 3, 'Comment for tweet with id 3', '2020-06-17 15:57:44'),
(11, 5, 33, 'Comment for tweet with id 33', '2020-06-17 15:58:11'),
(12, 5, 30, 'Comment for tweet with id 30', '2020-06-17 15:58:21'),
(13, 5, 23, 'Comment for tweet with id 23', '2020-06-17 15:58:32'),
(14, 5, 18, 'Comment for tweet with id 18\r\n', '2020-06-17 15:58:44'),
(15, 5, 16, 'Comment for tweet with id 16', '2020-06-17 15:58:59'),
(16, 5, 11, 'Comment for tweet with id 11', '2020-06-17 15:59:12'),
(17, 5, 16, 'Comment for Alina\'s tweet with id 16', '2020-06-18 03:47:06'),
(18, 4, 33, 'xxx', '2020-06-18 10:24:38'),
(19, 4, 33, 'comment something to see how works', '2020-06-18 12:06:14'),
(20, 5, 36, 'it\'s working but not very well\r\n', '2020-06-18 12:30:29'),
(21, 4, 33, 'comment on Alina\'s post', '2020-06-19 06:44:05'),
(22, 2, 35, 'comment today 19.06', '2020-06-19 11:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `recipientId` int(11) NOT NULL,
  `messageText` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isRead` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`id`, `senderId`, `recipientId`, `messageText`, `creationDate`, `isRead`) VALUES
(1, 2, 4, 'first message', '2020-06-19 11:46:39', 0),
(4, 4, 2, 'Oana to Alina', '2020-06-19 12:56:29', 1),
(5, 4, 2, 'Oana\'s second message to Alina', '2020-06-19 12:57:59', 0),
(6, 4, 5, 'Oana\'s first message to Catalin', '2020-06-19 13:00:07', 0),
(7, 4, 5, 'Oana\'s second message to Catalin', '2020-06-19 13:01:40', 0),
(8, 4, 2, 'Oana\'s third message to Alina', '2020-06-19 13:06:39', 0),
(9, 4, 2, 'Oana\'s fourth message to Alina', '2020-06-19 13:09:51', 1),
(10, 4, 2, 'another message to Alina', '2020-06-19 13:22:55', 1),
(11, 5, 4, 'Catalin to Oana', '2020-06-19 14:52:58', 1),
(12, 2, 4, 'Sunday message from Alina to Oana', '2020-06-21 08:56:04', 0),
(13, 2, 4, 'Second message today to Oana', '2020-06-21 08:59:23', 1),
(14, 5, 2, 'Catalin\'s message to Oana', '2020-06-21 09:05:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Tweet`
--

CREATE TABLE `Tweet` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Tweet`
--

INSERT INTO `Tweet` (`id`, `userId`, `text`, `creationDate`) VALUES
(3, 4, 'tweet1', '2020-06-16 07:18:42'),
(4, 4, 'tweet 2', '2020-06-16 07:42:33'),
(5, 4, 'tweet 3', '2020-06-16 07:45:34'),
(6, 2, 'Alina\'s first tweet', '2020-06-16 07:53:01'),
(7, 2, 'Alina\'s second tweet', '2020-06-16 07:59:43'),
(8, 5, 'Catalin\'s first tweet', '2020-06-16 08:03:39'),
(9, 4, 'tweet something', '2020-06-16 08:46:29'),
(10, 2, 'tweet exercise', '2020-06-16 14:30:02'),
(11, 2, 'Another Tweet', '2020-06-16 14:33:51'),
(13, 5, 'Catalin\'s smart tweet', '2020-06-16 14:37:42'),
(16, 2, 'Alina\'s 3rd tweet', '2020-06-16 14:44:26'),
(18, 4, 'tweet 12', '2020-06-16 15:33:00'),
(19, 4, 'tweet13', '2020-06-16 15:36:44'),
(23, 4, 'tweet14', '2020-06-16 15:41:55'),
(30, 4, 'tweet 17', '2020-06-17 03:32:16'),
(33, 2, 'tweet18', '2020-06-17 03:52:43'),
(34, 4, 'This is a longer tweet text to see how appears on page', '2020-06-18 11:57:57'),
(35, 4, 'This is a longer tweet text to see how appears on page', '2020-06-18 12:03:44'),
(36, 4, 'trying to write a longer tweet but seems not to work', '2020-06-18 12:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Alina', 'alina@gmail.com', '$2y$10$SsTdq2C./SpjDqntUP9.dOYujh9Y.vbRddZZ1KAh0AmLQ9Knk0Y.i'),
(4, 'Oana', 'oana@gmail.com', '$2y$10$c.VTnJeeF3CIGXSTmOwSrObkWtc/Lh6bzQWI3PvqRgLXdSPbKInDi'),
(5, 'Catalin', 'catalin@gmail.com', '$2y$10$.s7DugpMIKXCbOPwvV1jCe0O6EolN3xIz4gSlF9wf0dNOmnQu1Aom'),
(6, 'Alina Matei', 'alinamateiii@gmail.com', '$2y$10$z0J40T7iBqzfKEVp8IiFceSw2GO4lzoqByGIX93f65JLvZcjc.HmG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senderId` (`senderId`),
  ADD KEY `recipientId` (`recipientId`);

--
-- Indexes for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Tweet`
--
ALTER TABLE `Tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `Tweet` (`id`);

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`senderId`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`recipientId`) REFERENCES `Users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `Tweet`
--
ALTER TABLE `Tweet`
  ADD CONSTRAINT `Tweet_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
