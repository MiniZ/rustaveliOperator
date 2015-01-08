-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 14, 2014 at 10:08 PM
-- Server version: 5.5.19
-- PHP Version: 5.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinema`
--

CREATE TABLE IF NOT EXISTS `users` (
    `username` text NOT NULL,
    `password` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


INSERT INTO `rustavel_newoperator`.`user` (`username`, `password`) 
VALUES ('anano', 'paroli');






-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
`ID` int(11) NOT NULL,
  `filmID` int(11) NOT NULL,
  `ActyonTypeID` int(11) NOT NULL,
  `ActionDate` datetime NOT NULL,
  `RecordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`ID`, `filmID`, `ActyonTypeID`, `ActionDate`, `RecordDate`) VALUES
(5, 1, 2, '2014-12-14 00:00:00', '2014-12-14 20:45:30'),
(6, 2, 2, '2014-12-14 00:00:00', '2014-12-14 20:45:32'),
(7, 1, 1, '2014-12-15 00:00:00', '2014-12-14 21:11:28'),
(8, 1, 2, '2014-12-14 00:00:00', '2014-12-14 21:34:18'),
(9, 1, 1, '2014-12-15 00:00:00', '2014-12-14 21:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `actiontypes`
--

CREATE TABLE IF NOT EXISTS `actiontypes` (
`ID` int(11) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `actiontypes`
--

INSERT INTO `actiontypes` (`ID`, `Name`) VALUES 
(1, 'დაჯავშნა'),
(2, 'ინფორმაცია'),
(3, 'სხვადასხვა'),
(4, 'სულ');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
`ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Description` longtext NOT NULL,
  `DateFrom` datetime NOT NULL,
  `DateTo` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`ID`, `Name`, `Image`, `Description`, `DateFrom`, `DateTo`) VALUES
(1, 'წყნარი ოკეანის ტიტანები', 'uploads/img337590312.jpg', 'განმარტება', '2014-12-05 00:00:00', '2014-12-16 00:00:00'),
(2, 'რაღაც ფილმი', './uploads/img337590328.jpg', 'დადწა', '2014-12-14 00:00:00', '2014-12-16 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `actiontypes`
--
ALTER TABLE `actiontypes`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `actiontypes`
--
ALTER TABLE `actiontypes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
