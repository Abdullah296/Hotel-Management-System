-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3333
-- Generation Time: Nov 27, 2021 at 06:32 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_ID` int(10) UNSIGNED NOT NULL COMMENT 'Booking ID is unique for each booking and auto increments. when a booking will be made this id will be send to client to track his/her booking.',
  `From_Date` date NOT NULL COMMENT 'From_Date is the starting date of booking.',
  `To_Date` date NOT NULL COMMENT 'To_Date is the ending date of a booking.',
  `Booking_Date` date NOT NULL COMMENT 'Booking_Date is represents the date at which this booking were placed.',
  `Price_of_Booking` float UNSIGNED NOT NULL COMMENT 'Price stores the price at which this booking was done.',
  `Room_Number` int(10) UNSIGNED NOT NULL COMMENT 'Forgen Key from Room Table.',
  `User_ID` int(10) UNSIGNED NOT NULL COMMENT 'Forgen Key from User Table'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_ID`, `From_Date`, `To_Date`, `Booking_Date`, `Price_of_Booking`, `Room_Number`, `User_ID`) VALUES
(1, '2021-11-01', '2021-11-02', '2021-11-02', 5000, 101, 4),
(2, '2021-11-30', '2021-12-09', '0000-00-00', 5000, 101, 4),
(3, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4),
(4, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4),
(5, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4),
(6, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4),
(7, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4),
(8, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4),
(9, '0000-00-00', '0000-00-00', '0000-00-00', 5000, 101, 4);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_Number` int(10) UNSIGNED NOT NULL COMMENT 'A 3 digit Room number 1st digit shows the floor on which room is located, and other 2 digit show number of the room on that floor.',
  `Area` float UNSIGNED NOT NULL COMMENT 'Area of the Room in feet squar',
  `Price` decimal(10,2) NOT NULL COMMENT 'Booking price of the room in PKR.',
  `Discription` mediumblob NOT NULL COMMENT 'Discription contains all the serivices and full details of the room.',
  `Internet` char(1) CHARACTER SET ascii NOT NULL DEFAULT 'T' COMMENT 'Internet is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `BathTub` char(1) NOT NULL DEFAULT 'T' COMMENT 'BathTub is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `NewsPaper` char(1) NOT NULL DEFAULT 'T' COMMENT 'News Paper is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `Shower` char(1) NOT NULL DEFAULT 'T' COMMENT 'Shower is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `Iron` char(1) NOT NULL DEFAULT 'T' COMMENT 'Iron is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.',
  `Ironing_Table` char(1) NOT NULL DEFAULT 'T' COMMENT 'Table for ironing is one of the serivices of the room.\r\n\r\nIt is one char long and can have only two different values T means True and F means False, here True means serivice is available and Flase means service is not available.\r\n\r\nBy Default its value is T.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_Number`, `Area`, `Price`, `Discription`, `Internet`, `BathTub`, `NewsPaper`, `Shower`, `Iron`, `Ironing_Table`) VALUES
(101, 25, '5000.00', '', 'T', 'T', 'T', 'T', 'T', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `SerialNo` int(5) NOT NULL,
  `floor` varchar(20) NOT NULL,
  `Price` int(5) NOT NULL,
  `Available` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`SerialNo`, `floor`, `Price`, `Available`) VALUES
(1, 'Ground', 5000, 1),
(2, 'First', 10000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(10) UNSIGNED NOT NULL COMMENT 'User_ID uniquly identfies a user and auto incremented.',
  `First_Name` varchar(50) NOT NULL COMMENT 'First Name of the user.',
  `Last_Name` varchar(50) NOT NULL COMMENT 'Last Name of the user.',
  `E_mail_ID` varchar(50) NOT NULL COMMENT 'E-mail ID of the user, at this id user will be updated about the booking status.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `First_Name`, `Last_Name`, `E_mail_ID`) VALUES
(4, 'Abdullah', '.', 'abd296@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `fk_Booking_User_1` (`User_ID`),
  ADD KEY `fk_Booking_Room_1` (`Room_Number`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_Number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Booking ID is unique for each booking and auto increments. when a booking will be made this id will be send to client to track his/her booking.', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User_ID uniquly identfies a user and auto incremented.', AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_Booking_Room_1` FOREIGN KEY (`Room_Number`) REFERENCES `room` (`Room_Number`),
  ADD CONSTRAINT `fk_Booking_User_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
