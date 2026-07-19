-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2026 at 03:12 PM
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
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `studenttable`
--

CREATE TABLE `studenttable` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studenttable`
--

INSERT INTO `studenttable` (`id`, `firstname`, `lastname`, `email`, `pos`) VALUES
(1, 'Muhammad', 'Sulman', 'sulman@example.com', 'BS Information Technology'),
(2, 'Ali', 'Khan', 'ali.khan@example.com', 'BS Computer Science'),
(3, 'Ahmed', 'Raza', 'ahmed.raza@example.com', 'Software Engineering'),
(4, 'Usman', 'Malik', 'usman.malik@example.com', 'BS Information Technology'),
(5, 'Hamza', 'Sheikh', 'hamza.sheikh@example.com', 'Computer Engineering'),
(6, 'Hassan', 'Butt', 'hassan.butt@example.com', 'Data Science'),
(7, 'Ahsan', 'Iqbal', 'ahsan.iqbal@example.com', 'Cyber Security'),
(8, 'Bilal', 'Ahmed', 'bilal.ahmed@example.com', 'Artificial Intelligence'),
(10, 'Huzaifa', 'Javed', 'huzaifa.javed@example.com', 'Software Engineering'),
(11, 'Abdullah', 'Farooq', 'abdullah.farooq@example.com', 'Information Systems'),
(12, 'Talha', 'Yousaf', 'talha.yousaf@example.com', 'Data Science'),
(13, 'Saad', 'Hussain', 'saad.hussain@example.com', 'Artificial Intelligence'),
(14, 'Umar', 'Nawaz', 'umar.nawaz@example.com', 'Cyber Security'),
(15, 'Danish', 'Ali', 'danish.ali@example.com', 'BS Information Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studenttable`
--
ALTER TABLE `studenttable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studenttable`
--
ALTER TABLE `studenttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
