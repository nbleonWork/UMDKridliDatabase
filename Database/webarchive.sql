-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 02:16 PM
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
  `photoAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graduates`
--

INSERT INTO `graduates` (`gradID`, `name`, `gradYear`, `gradSemester`, `major`, `photoAddress`) VALUES
(1, 'Awais Alam', 2009, 'Fall', 'BSEEE, BSECE', '../resources/2009/Fall/Awais Alam.jpg'),
(2, 'Ryan Cody', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Ryan Cody.JPG'),
(3, 'Shane Costello', 2009, 'Fall', 'BSSE, CMATH', '../resources/2009/Fall/Shane Costello.jpg'),
(4, 'Ralph Dabiero', 2009, 'Fall', 'BSCIS', '../resources/2009/Fall/Ralph Dabiero.jpg'),
(14, 'Rebecca Decker', 2009, 'Fall', 'BSCIS', '../resources/2009/Fall/Rebecca Decker.jpg'),
(15, 'Ryan Dillon', 2009, 'Fall', 'BSEEE', '../resources/2009/Fall/Ryan Dillon.jpg'),
(16, 'Luke Duncan', 2009, 'Fall', 'BSCIS', '../resources/2009/Fall/Luke Duncan.jpg'),
(17, 'Kenneth Fleszar', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Kenneth Fleszar.jpg'),
(18, 'Jonathan Gietzen', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Jonathan Gietzen.jpg'),
(19, 'Robert Hermonat', 2009, 'Fall', 'BSEEE', '../resources/2009/Fall/Robert Hermonat.jpg'),
(21, 'Robert Lambert', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Robert Lambert.jpg'),
(22, 'David Lee', 2009, 'Fall', 'BSSE', '../resources/2009/Fall/David Lee.jpg'),
(23, 'Lauren Liske', 2009, 'Fall', 'BSEISE', '../resources/2009/Fall/Lauren Liske.jpg'),
(24, 'Raymond Llonillo', 2009, 'Fall', 'BSEEE, BSECE', '../resources/2009/Fall/Raymond Llonillo.jpg'),
(25, 'Laura Lloyd', 2009, 'Fall', 'BSEISE', '../resources/2009/Fall/Laura Lloyd.jpg'),
(26, 'Joseph Lukas', 2009, 'Fall', 'BSCIS', '../resources/2009/Fall/Joseph Lukas.jpg'),
(27, 'Arturo Mendoza', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Arturo Mendoza.jpg'),
(28, 'Christopher Morin', 2009, 'Fall', 'BSEME', '../resources/2009/Fall/Christopher Morin.jpg'),
(29, 'Mustapha Mourtada', 2009, 'Fall', 'BSEEE, BSECE', '../resources/2009/Fall/Mustapha Mourtada.jpg'),
(30, 'Saleem Alhumaidi', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Saleem Alhumaidi.jpg'),
(31, 'Alaa Anani', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Alaa Anani.jpg'),
(32, 'David Anderson', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/David Anderson.jpg'),
(33, 'Jacqueline Anderson', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Jacqueline Anderson.jpg'),
(36, 'Ryan Archer', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Ryan Archer.jpg'),
(37, 'Peter Bankwitz', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Peter Bankwitz.jpg'),
(38, 'Mahmoud Chirazi', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Mahmoud Chirazi.jpg'),
(39, 'Nicole Cicala', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Nicole Cicala.jpg'),
(40, 'Robert Considine', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Robert Considine.jpg'),
(41, 'Jeffrey Crowley', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Jeffrey Crowley.jpg'),
(42, 'Aaron Curley', 2009, 'Winter', 'BSSE', '../resources/2009/Winter/Aaron Curley.jpg'),
(43, 'Mohamad ElGhrawi', 2009, 'Winter', 'BSECE', '../resources/2009/Winter/Mohamad ElGhrawi.jpg'),
(44, 'Mariam Farhat', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Mariam Farhat.jpg'),
(45, 'Matthew Federspiel', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Matthew Federspiel.jpg'),
(46, 'Richard Fernandes', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Richard Fernandes.jpg'),
(47, 'John Gajda', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/John Gajda.jpg'),
(48, 'Kushal Gargesh', 2009, 'Winter', 'BSEEE, BSECE', '../resources/2009/Winter/Kushal Gargesh.jpg'),
(49, 'Bilal Ghalib', 2009, 'Winter', 'BSCIS, CMATH', '../resources/2009/Winter/Bilal Ghalib.jpg'),
(50, 'Angela Giertz', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Angela Giertz.jpg'),
(51, 'Christopher Glab', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Christopher Glab.jpg'),
(52, 'Brandy Gronas', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Brandy Gronas.jpg'),
(53, 'Douglas Halberstadt', 2009, 'Winter', 'BSEEE, BSECE', '../resources/2009/Winter/Douglas Halberstadt.jpg'),
(54, 'Muhammad Javaid', 2009, 'Winter', 'BSEISE', '../resources/2009/Winter/Muhammad Javaid.jpg'),
(55, 'Ali Kassir', 2009, 'Winter', 'BSSE', '../resources/2009/Winter/Ali Kassir.jpg'),
(56, 'Tom Kowalski', 2009, 'Winter', 'BSSE', '../resources/2009/Winter/Tom Kowalski.jpg'),
(57, 'Gierad Laput', 2009, 'Winter', 'BSECE, BSEEE', '../resources/2009/Winter/Gierad Laput.jpg'),
(58, 'Ian Martin', 2009, 'Winter', 'BSEISE', '../resources/2009/Winter/Ian Martin.jpg'),
(59, 'Bhavna Mathur', 2009, 'Winter', 'MSECE', '../resources/2009/Winter/Bhavna Mathur.jpg'),
(60, 'Ahmed Mawari', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Ahmed Mawari.jpg'),
(61, 'Julia Melaragni', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Julia Melaragni.jpg'),
(62, 'Malek Musleh', 2009, 'Winter', 'BSEEE, BSECE', '../resources/2009/Winter/Malek Musleh.jpg'),
(63, 'Even Musu', 2009, 'Winter', 'BSSE, CMATH', '../resources/2009/Winter/Even Musu.jpg'),
(64, 'Ajit Naik', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Ajit Naik.jpg'),
(65, 'Mohamed Nasser', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Mohamed Nasser.jpg'),
(66, 'Ogom Obinor', 2009, 'Winter', 'BSECE', '../resources/2009/Winter/Ogom Obinor.jpg'),
(67, 'Kayed Omar', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Kayed Omar.jpg'),
(68, 'Mohamed Omar', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Mohamed Omar.jpg'),
(69, 'Mukhtar Oudeif', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Mukhtar Oudeif.jpg'),
(70, 'Eric Passmore', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Eric Passmore.jpg'),
(71, 'Rijvana Patel', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Rijvana Patel.jpg'),
(72, 'Paul Pendleton', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Paul Pendleton.jpg'),
(73, 'Daniel Reaume', 2009, 'Winter', 'BSEEE, BSECE', '../resources/2009/Winter/Daniel Reaume.jpg'),
(74, 'Arjun Sabharwal', 2009, 'Winter', 'BSECE', '../resources/2009/Winter/Arjun Sabharwal.jpg'),
(75, 'Sana Saeed', 2009, 'Winter', 'BSEISE', '../resources/2009/Winter/Sana Saeed.jpg'),
(76, 'John Salvia', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/John Salvia.jpg'),
(77, 'Daniel Schuster', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Daniel Schuster.jpg'),
(78, 'Gabriel Scruggs', 2009, 'Winter', 'BSEEE, BSECE', '../resources/2009/Winter/Gabriel Scruggs.jpg'),
(79, 'Dana Shahrouri', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Dana Shahrouri.jpg'),
(80, 'Steven Silverman', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Steven Silverman.jpg'),
(81, 'Jonathon Smereka', 2009, 'Winter', 'BSECE, BSEEE, EMATH', '../resources/2009/Winter/Jonathon Smereka.jpg'),
(82, 'Anthony Soave', 2009, 'Winter', 'BSE-MFGE', '../resources/2009/Winter/Anthony Soave.jpg'),
(83, 'Nathan Supplee', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Nathan Supplee.jpg'),
(84, 'Tommy Toma', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Tommy Toma.jpg'),
(85, 'Crystal Toney', 2009, 'Winter', 'MSEEE', '../resources/2009/Winter/Crystal Toney.jpg'),
(86, 'Angelique Turner', 2009, 'Winter', 'BSEISE', '../resources/2009/Winter/Angelique Turner.jpg'),
(87, 'Victor Vulcu', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Victor Vulcu.jpg'),
(88, 'Brian Warren', 2009, 'Winter', 'BSEEE, BSECE', '../resources/2009/Winter/Brian Warren.jpg'),
(89, 'Robert Wasilevich', 2009, 'Winter', 'BSEISE', '../resources/2009/Winter/Robert Wasilevich.jpg'),
(90, 'Inga Yuditsky', 2009, 'Winter', 'BSEEE', '../resources/2009/Winter/Inga Yuditsky.jpg'),
(91, 'Steven Zdanio', 2009, 'Winter', 'BSEME', '../resources/2009/Winter/Steven Zdanio.jpg'),
(92, 'Kyle Zielinski', 2009, 'Winter', 'BSEISE, BSE-MFGE', '../resources/2009/Winter/Kyle Zielinski.jpg'),
(93, 'Adam Bass', 2010, 'Fall', 'BSEEE, BSECE', '../resources/2010/Fall/Adam Bass.jpg'),
(94, 'Abraham Alhanek', 2010, 'Fall', 'BSEEE', '../resources/2010/Fall/Abraham Alhanek.jpg'),
(95, 'Mohamed Aljahmi', 2010, 'Fall', 'BSEEE', '../resources/2010/Fall/Mohamed Aljahmi.jpg'),
(96, 'Mohamad Awada', 2010, 'Fall', 'BSEEE', '../resources/2010/Fall/Mohamad Awada.jpg');

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
  MODIFY `bioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `graduates`
--
ALTER TABLE `graduates`
  MODIFY `gradID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
