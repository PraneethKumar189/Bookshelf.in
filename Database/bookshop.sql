-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 08:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `author` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cover_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author`, `price`, `cover_image`) VALUES
(101, 'A Search In Secret India', 'Paul Brunton', '451.00', 0x383145626e4e3048364c4c2e5f41435f5546313030302c313030305f514c38305f2e6a7067),
(102, 'Ikegai', 'Hector Garcia', '319.00', 0x3831344c2b767130316d4c2e5f41435f5546313030302c313030305f514c38305f2e6a7067),
(103, 'The Art Of War', 'Sun Tzu', '199.00', 0x7468652d6172742d6f662d7761722d37342e6a7067),
(104, 'Karvalo', 'KP Thejaswi', '133.00', 0x30345f62366464653536352d643133612d343833332d613636642d6636326261386436343332612e6a7067),
(105, 'Kafka on the Shore', 'Haruki Murakami', '412.00', 0x4b61666b614f6e54686553686f72652e6a7067),
(106, 'A mans search for meaning of l', 'Unknown', '565.00', 0x36316e5473704d2b42594c2e5f41435f5546313030302c313030305f514c38305f2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

CREATE TABLE `book_order` (
  `order_id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `umail1` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`order_id`, `uname`, `bname`, `price`, `order_date`, `umail1`) VALUES
(16, 'kiran', 'Ikegai', '319.00', '2024-05-01 03:25:22', 'kiran@gmail'),
(17, 'kiran', 'The Art Of War', '199.00', '2024-05-01 03:25:25', 'kiran@gmail'),
(18, 'kiran', 'Karvalo', '133.00', '2024-05-01 03:25:29', 'kiran@gmail'),
(19, 'Sharath', 'Ikegai', '319.00', '2024-05-01 03:30:03', 'sharath@gmail.com'),
(20, 'Sharath', 'The Art Of War', '199.00', '2024-05-01 03:30:10', 'sharath@gmail.com'),
(23, 'praneeth', 'The Art Of War', '199.00', '2024-05-02 06:26:24', 'praneeth@gmail.com'),
(28, 'praneeth', 'Kafka on the Shore', '412.00', '2024-05-10 11:00:21', 'praneeth@gmail.com'),
(29, 'praneeth', 'Kafka on the Shore', '412.00', '2024-05-10 11:00:25', 'praneeth@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `fname` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pswd` varchar(20) DEFAULT NULL,
  `pno` varchar(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`fname`, `email`, `pswd`, `pno`, `address`) VALUES
('praneeth', 'praneeth@gmail.com', '1893', '9535171483', 'yedapadav'),
('kumar', 'kumar@gmail.com', '18883', '9535171483', 'yedapadav'),
('kiran', 'kiran@gmail', '1990', '9535171483', 'yedapadav'),
('Sharath', 'sharath@gmail.com', '1893', '9535171483', 'yedapadav');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_order`
--
ALTER TABLE `book_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_order`
--
ALTER TABLE `book_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
