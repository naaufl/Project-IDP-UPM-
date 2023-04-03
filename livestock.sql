-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 07:57 AM
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
-- Database: `livestock`
--

-- --------------------------------------------------------

--
-- Table structure for table `livestockdetails`
--

CREATE TABLE `livestockdetails` (
  `id` int(1) NOT NULL,
  `IDNumber` int(255) NOT NULL,
  `Breed` text DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `Gender` text DEFAULT NULL,
  `MotherID` int(255) DEFAULT NULL,
  `FatherID` int(255) DEFAULT NULL,
  `Height` varchar(1000) DEFAULT NULL,
  `Weight` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livestockdetails`
--

INSERT INTO `livestockdetails` (`id`, `IDNumber`, `Breed`, `Birthday`, `Gender`, `MotherID`, `FatherID`, `Height`, `Weight`) VALUES
(1, 1, 'Kelantan-Terengganu', '2021-10-13', 'Male', 103, 203, '154 kg', '156 cm'),
(2, 13, 'Kelantan-Terengganu', '2021-10-13', 'Male', 103, 203, '154 kg', '156 cm'),
(3, 2, 'MElaka-Melaka', '2021-08-17', 'Female', 122, 133, '159 cm', '200 kg'),
(4, 23, 'MElaka-Melaka', '2021-08-17', 'Female', 122, 133, '159 cm', '200 kg');

-- --------------------------------------------------------

--
-- Table structure for table `livestockmedical`
--

CREATE TABLE `livestockmedical` (
  `IDNumber` int(255) DEFAULT NULL,
  `DateMedical` date DEFAULT NULL,
  `Treatment` varchar(1000) DEFAULT NULL,
  `Notes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livestockdetails`
--
ALTER TABLE `livestockdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livestockdetails`
--
ALTER TABLE `livestockdetails`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
