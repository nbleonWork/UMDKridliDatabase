-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 03:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `bios`
--

CREATE TABLE `bios` (
  `bioID` int(11) NOT NULL,
  `gradID` int(11) NOT NULL,
  `contactInfo` varchar(500) NOT NULL,
  `miscInfo` varchar(1000) NOT NULL,
  `approvalStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graduates`
--

CREATE TABLE `graduates` (
  `gradID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gradYear` int(11) NOT NULL,
  `gradSemester` varchar(20) NOT NULL,
  `major` varchar(50) NOT NULL,
  `photoAddress` varchar(50) NOT NULL,
  `information` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graduates`
--

INSERT INTO `graduates` (`gradID`, `name`, `gradYear`, `gradSemester`, `major`, `photoAddress`, `information`) VALUES
(1, 'Awais Alam', 2009, 'Fall', 'BSEEE, BSECE', '../resources/2009/Fall/Awais Alam.jpg', ''),
(2, 'Ryan Cody', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Ryan Cody.JPG', ''),
(3, 'Shane Costello', 2009, 'Fall', 'BSSE, CMATH', '../resources/2009/Fall/Shane Costello.jpg', ''),
(4, 'Ralph Dabiero', 2009, 'Fall', 'BSCIS', '../resources/2009/Fall/Ralph Dabiero.jpg', ''),
(5, 'Saleem Alhumaidi', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Saleem Alhumaidi.jpg', ''),
(6, 'Alaa Anani', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Alaa Anani.jpg', ''),
(7, 'David Anderson', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/David Anderson.jpg', ''),
(8, 'Jacqueline Anderson', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Jacqueline Anderson.jpg', ''),
(9, 'Abraham Alhanek', 2010, 'Fall', 'BSEEE', '../resources/2010/Fall/Abraham Alhanek.jpg', ''),
(10, 'Mohamed Aljahmi', 2010, 'Fall', 'BSEEE', '../resources/2010/Fall/Mohamed Aljahmi.jpg', ''),
(11, 'Mohamad Awada', 2010, 'Fall', 'BSEEE', '../resources/2010/Fall/Mohamad Awada.jpg', ''),
(12, 'Adam Bass', 2010, 'Fall', 'BSEEE, BSECE', '../resources/2010/Fall/Adam Bass.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`password`) VALUES
('testpassword');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` int(11) NOT NULL,
  `bioID` int(11) NOT NULL,
  `reportContent` varchar(500) NOT NULL,
  `isSolved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bios`
--
ALTER TABLE `bios`
  ADD PRIMARY KEY (`bioID`),
  ADD KEY `user ID` (`gradID`);

--
-- Indexes for table `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`gradID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `bio ID` (`bioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bios`
--
ALTER TABLE `bios`
  MODIFY `bioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `graduates`
--
ALTER TABLE `graduates`
  MODIFY `gradID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bios`
--
ALTER TABLE `bios`
  ADD CONSTRAINT `user ID` FOREIGN KEY (`gradID`) REFERENCES `graduates` (`gradID`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `bio ID` FOREIGN KEY (`bioID`) REFERENCES `bios` (`bioID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
