-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 05:21 PM
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
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `members_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `join_date` date DEFAULT current_timestamp(),
  `membership_plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`members_id`, `name`, `email`, `phone`, `join_date`, `membership_plan_id`) VALUES
(2, 'Rafie ', 'rafie@gmail.com', '08977444', '2024-03-06', 5),
(3, 'Al-Habsy', 'al-habsy', '089877876', '2024-03-13', 3),
(4, 'Setiawan', 'setiawan@gmail.com', '08989788', '2024-01-17', 6),
(5, 'Humay', 'humay@gmail.com', '0898787', '2024-03-07', 10),
(6, 'Senja', 'senja@gmail.com', '08989779', '2024-04-03', 12);

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

CREATE TABLE `membership_plan` (
  `membership_plan_id` int(11) NOT NULL,
  `plan_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `duration_months` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`membership_plan_id`, `plan_name`, `price`, `duration_months`) VALUES
(1, 'Sabri Senang', 80000, 1),
(2, 'Sabri Bahagia', 120000, 2),
(3, 'Sabri Tampan', 200000, 3),
(4, 'Sabri Keren', 240000, 4),
(5, 'Sabri Hot', 300000, 5),
(6, 'Sabri Mekar', 360000, 6),
(7, 'Sabri Kolam', 400000, 7),
(8, 'Sabri Terbang', 460000, 8),
(9, 'Sabri Jogging', 500000, 9),
(10, 'Sabri Kaem', 560000, 10),
(11, 'Sabri Figma', 1000000, 11),
(12, 'Sabri Sumatra Menyala Abangkuhh', 12000000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` float NOT NULL,
  `payment_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `member_id`, `payment_date`, `amount`, `payment_method`) VALUES
(1, 2, '2024-04-07', 300000, 'BNI (Bank Negara Indonesia)'),
(2, 3, '2024-03-18', 400000, 'Bank Jago'),
(3, 4, '2024-02-07', 360000, 'BCA (Bank Central Asia)'),
(4, 5, '2024-04-10', 200000, 'Bank Syariah'),
(5, 6, '2024-04-05', 12000000, 'DANA'),
(6, 2, '2024-04-01', 120000, 'BNI (Bank Negara Indonesia)'),
(7, 3, '2024-02-14', 400000, 'Bank Jago'),
(8, 4, '2023-11-08', 360000, 'BCA (Bank Central Asia)'),
(9, 5, '2024-04-03', 200000, 'Bank Syariah'),
(10, 6, '2024-04-01', 12000000, 'DANA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`members_id`),
  ADD KEY `membership_plan_id` (`membership_plan_id`);

--
-- Indexes for table `membership_plan`
--
ALTER TABLE `membership_plan`
  ADD PRIMARY KEY (`membership_plan_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `members_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership_plan`
--
ALTER TABLE `membership_plan`
  MODIFY `membership_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`membership_plan_id`) REFERENCES `membership_plan` (`membership_plan_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`members_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
