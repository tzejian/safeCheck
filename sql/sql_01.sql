-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 06:36 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rogerproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `id` int(4) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `employeeId` int(8) NOT NULL,
  `department` varchar(20) NOT NULL,
  `isCheck` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`id`, `firstName`, `lastName`, `employeeId`, `department`, `isCheck`) VALUES
(1, 'tzejian', 'lee', 12345678, 'Department B', 1),
(2, 'roger', 'chow', 12345677, 'Department A', 1),
(3, 'qweqwe', 'Lee', 12345676, 'Department B', 1),
(4, 'piop', 'lili', 12345675, 'Department D', 1),
(5, 'olol', 'ytuy', 12345674, 'Department C', 1),
(6, 'baka', 'yarou', 12345673, 'Department A', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
