-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 02:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatdetails`
--

CREATE TABLE `chatdetails` (
  `id` int(211) NOT NULL,
  `chaterid` int(211) NOT NULL,
  `myid` int(211) NOT NULL,
  `sms` text NOT NULL,
  `incoming_send` timestamp NOT NULL DEFAULT current_timestamp(),
  `outgoing_send` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatdetails`
--

INSERT INTO `chatdetails` (`id`, `chaterid`, `myid`, `sms`, `incoming_send`, `outgoing_send`) VALUES
(1, 12, 16, 'hello', '2021-07-12 08:18:31', '2021-07-12 08:18:31'),
(2, 12, 16, 'Hello', '2021-07-12 08:20:25', '2021-07-12 08:20:25'),
(3, 12, 16, 'hi', '2021-07-12 10:17:48', '2021-07-12 10:17:48'),
(4, 16, 12, 'how are you', '2021-07-12 10:20:37', '2021-07-12 10:20:37'),
(5, 12, 16, 'fine. and you??', '2021-07-12 10:20:56', '2021-07-12 10:20:56'),
(6, 16, 12, 'I am also fine', '2021-07-12 10:21:32', '2021-07-12 10:21:32'),
(7, 12, 16, 'what are you doing?', '2021-07-12 10:25:20', '2021-07-12 10:25:20'),
(8, 16, 12, 'I am working now', '2021-07-12 10:25:39', '2021-07-12 10:25:39'),
(9, 12, 16, 'nice to meet you', '2021-07-12 10:29:24', '2021-07-12 10:29:24'),
(10, 16, 12, 'me too', '2021-07-12 10:39:32', '2021-07-12 10:39:32'),
(11, 12, 16, 'hell', '2021-07-12 11:14:40', '2021-07-12 11:14:40'),
(12, 12, 16, 'hello dare', '2021-07-12 11:14:52', '2021-07-12 11:14:52'),
(13, 12, 16, 'how are you', '2021-07-12 11:14:57', '2021-07-12 11:14:57'),
(14, 12, 16, 'hello', '2021-07-12 11:31:38', '2021-07-12 11:31:38'),
(15, 12, 16, 'hi', '2021-07-12 11:31:48', '2021-07-12 11:31:48'),
(16, 12, 16, 'what', '2021-07-12 11:32:32', '2021-07-12 11:32:32'),
(17, 12, 16, 'hello', '2021-07-12 11:33:02', '2021-07-12 11:33:02'),
(18, 12, 16, 'hi', '2021-07-12 11:33:15', '2021-07-12 11:33:15'),
(19, 16, 12, 'sorry', '2021-07-12 11:33:36', '2021-07-12 11:33:36'),
(20, 16, 12, 'I am so sorry', '2021-07-12 11:33:47', '2021-07-12 11:33:47'),
(21, 16, 12, 'for late', '2021-07-12 11:33:51', '2021-07-12 11:33:51'),
(22, 12, 19, 'hello', '2021-07-12 12:16:09', '2021-07-12 12:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(211) NOT NULL,
  `fname` varchar(21) NOT NULL,
  `lname` varchar(21) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(211) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Online'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `fname`, `lname`, `email`, `image`, `password`, `status`) VALUES
(12, 'Abir', 'Khan', 'abir@gmail.com', '1626010510PicsArt_09-16-08.49.40.png', '12345', 'Offline'),
(13, 'Shaki', 'Hussain', 'shaki@gmail.com', '1626061798PicsArt_10-26-07.21.02.jpg', '123456', 'Offline'),
(14, 'Asad', 'Hossen', 'asad@gmail.com', '16260630714.jpg', 'asad', 'Offline'),
(15, 'Shakib', 'Khan', 'shakib@gmail.com', '1626063111PicsArt_06-07-11.34.03.jpg', '12345', 'Offline'),
(16, 'Selim', 'Reza', 'selim@gmail.com', '16260631551625483229620.png', 'selim', 'Offline'),
(17, 'Jone ', 'Doe', 'jone@gmail.com', '1626063230inu2.png', 'jone', 'Offline'),
(18, 'Mithu', 'Hossen', 'mithu@gmail.com', '1626063268new10.png', 'mithu', 'offline'),
(19, 'new', 'User', 'new@gmail.com', '1626091803inu2.png', '12345', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatdetails`
--
ALTER TABLE `chatdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatdetails`
--
ALTER TABLE `chatdetails`
  MODIFY `id` int(211) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(211) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
