-- phpMyAdmin SQL Dump
-- version 4.7.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2016 at 04:51 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs4400_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Info`
--

CREATE TABLE `Payment_Info` (
  `Card_Number` varchar(16) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `CVV` varchar(3) NOT NULL,
  `Exp_Date` date NOT NULL,
  `nameOnCard` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment_Info`
--

INSERT INTO `Payment_Info` (`Card_Number`, `Username`, `CVV`, `Exp_Date`, `nameOnCard`) VALUES
('1049262086675695', 'emily_miller', '776', '2016-09-02', 'Emily Miller'),
('1274412000511069', 'martin_king', '165', '2016-12-16', 'Martin King'),
('2102035186790743', 'noah_brown', '941', '2017-02-17', 'Noah Brown'),
('2478762879689697', 'emma_smith', '163', '2016-11-10', 'Emma Smith'),
('2884938734380048', 'joseph_harris', '522', '2016-09-07', 'Joseph Harris'),
('3028119929894670', 'alexander_hamilton', '323', '2016-06-10', 'Alexander Hamilton'),
('3134251660980529', 'jacob_jones', '523', '2016-12-09', 'Jacob Jones'),
('4029339709587839', 'ian_gonzalez', '442', '2016-11-11', 'Ian Gonzalez'),
('4215162817778808', 'james_monroe', '524', '2017-01-19', 'James Monroe'),
('5190213501377625', 'patrick_jones', '894', '2017-06-10', 'Patrick Jones'),
('5454952398799884', 'olivia_johnson', '165', '2017-04-07', 'Olivia Johnson'),
('6004109402504089', 'david_anderson', '783', '2016-12-14', 'David Anderson'),
('6170235748226421', 'ava_anderson', '891', '2017-05-17', 'Ava Anderson'),
('6571343997108197', 'emily_miller', '901', '2017-01-26', 'Emily Miller'),
('7356403675950935', 'wilson_lee', '215', '2017-04-07', 'Wilson Lee'),
('7508956564490738', 'james_brown', '532', '2016-11-17', 'James Brown'),
('7545297633985886', 'sofia_davis', '945', '2016-10-14', 'Sofia Davis'),
('7581866657020760', 'alexander_hamilton', '981', '2017-04-15', 'Alexander Hamilton'),
('7963444581793040', 'john_smith', '542', '2016-11-16', 'John Smith'),
('8101045471731157', 'emma_smith', '516', '2016-10-14', 'Emma Smith'),
('8761335158118813', 'taylor_davis', '941', '2017-03-18', 'Taylor Davis'),
('8798534140811675', 'martin_wilson', '454', '2017-03-17', 'Martin Wilson'),
('9414223256521984', 'michael_garcia', '516', '2017-02-11', 'Michael Garcia'),
('9819404688257258', 'ava_anderson', '891', '2017-01-21', 'Ava Anderson'),
('9850121863487807', 'david_anderson', '198', '2016-10-22', 'David Anderson'),
('9952590737781935', 'sophia_white', '745', '2016-10-08', 'Sophia White');

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `ReservationID` int(11) NOT NULL,
  `Card_Number` varchar(16) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `IsCancelled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`ReservationID`, `Card_Number`, `Username`, `IsCancelled`) VALUES
(1, '3028119929894670', 'alexander_hamilton', 1),
(2, '6004109402504089', 'david_anderson', 0),
(3, '4029339709587839', 'ian_gonzalez', 0),
(4, '7508956564490738', 'james_brown', 1),
(5, '7963444581793040', 'john_smith', 0),
(6, '2884938734380048', 'joseph_harris', 1),
(7, '8798534140811675', 'martin_wilson', 0),
(8, '5190213501377625', 'patrick_jones', 1),
(9, '9952590737781935', 'sophia_white', 0),
(10, '8761335158118813', 'taylor_davis', 1),
(11, '7356403675950935', 'wilson_lee', 0),
(12, '6170235748226421', 'ava_anderson', 1),
(13, '3028119929894670', 'alexander_hamilton', 0),
(14, '1049262086675695', 'emily_miller', 0),
(15, '2478762879689697', 'emma_smith', 0),
(16, '3134251660980529', 'jacob_jones', 1),
(17, '4215162817778808', 'james_monroe', 0),
(18, '9414223256521984', 'michael_garcia', 0),
(19, '1274412000511069', 'martin_king', 1),
(20, '2102035186790743', 'noah_brown', 0),
(21, '2102035186790743', 'noah_brown', 0),
(22, '5454952398799884', 'olivia_johnson', 1),
(23, '7545297633985886', 'sofia_davis', 0),
(24, '9850121863487807', 'david_anderson', 0),
(25, '4029339709587839', 'ian_gonzalez', 1),
(26, '7508956564490738', 'james_brown', 0),
(27, '7963444581793040', 'john_smith', 0),
(28, '2884938734380048', 'joseph_harris', 0),
(29, '8798534140811675', 'martin_wilson', 0),
(30, '5190213501377625', 'patrick_jones', 0),
(31, '9952590737781935', 'sophia_white', 0),
(32, '8761335158118813', 'taylor_davis', 0),
(33, '7356403675950935', 'wilson_lee', 0),
(34, '9819404688257258', 'ava_anderson', 0),
(35, '3028119929894670', 'alexander_hamilton', 0),
(36, '6571343997108197', 'emily_miller', 0),
(37, '8101045471731157', 'emma_smith', 0),
(38, '3134251660980529', 'jacob_jones', 0),
(39, '4215162817778808', 'james_monroe', 0),
(40, '9414223256521984', 'michael_garcia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Reserves`
--

CREATE TABLE `Reserves` (
  `ReservationID` int(11) NOT NULL,
  `Train_Number` int(11) NOT NULL,
  `Class` varchar(1) NOT NULL,
  `Departure_Date` date NOT NULL,
  `Passenger_Name` varchar(255) NOT NULL,
  `Number_Bags` int(11) NOT NULL,
  `Departs_From` varchar(255) NOT NULL,
  `Arrives_At` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reserves`
--

INSERT INTO `Reserves` (`ReservationID`, `Train_Number`, `Class`, `Departure_Date`, `Passenger_Name`, `Number_Bags`, `Departs_From`, `Arrives_At`) VALUES
(1, 1, '1', '2016-08-13', 'Alexander Hamilton', 2, 'New York', 'Virginia'),
(1, 2, '2', '2016-07-08', 'Phillip Hamilton', 2, 'Virginia', 'New Jersey'),
(2, 1, '2', '2016-08-20', 'David Anderson', 1, 'New York', 'Virginia'),
(2, 2, '1', '2016-07-08', 'Bill Anderson', 2, 'Virginia', 'New Jersey'),
(3, 3, '1', '2016-07-23', 'Ian Gonzalez', 3, 'New York', 'Maryland'),
(3, 4, '2', '2016-07-09', 'Ian Gonzalez', 2, 'West Virginia', 'Maryland'),
(4, 3, '1', '2016-08-19', 'James Brown', 2, 'New York', 'Maryland'),
(4, 4, '2', '2016-08-20', 'James Brown', 3, 'West Virginia', 'Maryland'),
(5, 5, '1', '2016-07-15', 'John Smith', 3, 'Maryland', 'Virginia'),
(5, 6, '1', '2016-07-15', 'John Smith', 1, 'West Virginia', 'New York'),
(6, 5, '1', '2016-08-20', 'Joseph Harris', 2, 'Maryland', 'Virginia'),
(6, 6, '2', '2016-07-22', 'Joseph Harris', 2, 'West Virginia', 'New York'),
(7, 7, '1', '2016-06-10', 'Martin Wilson', 2, 'Maryland', 'New York'),
(7, 8, '1', '2016-08-13', 'Martin Wilson', 2, 'West Virginia', 'Maryland'),
(8, 8, '1', '2016-08-13', 'Patrick Jones', 2, 'West Virginia', 'Maryland'),
(9, 9, '2', '2016-07-08', 'Sophia White', 2, 'Virginia', 'New Jersey'),
(10, 10, '2', '2016-08-20', 'Taylor Davis', 1, 'New York', 'Virginia'),
(11, 2, '1', '2016-07-08', 'Wilson Lee', 2, 'Virginia', 'New Jersey'),
(12, 3, '1', '2016-07-23', 'Ava Anderson', 3, 'New York', 'Maryland'),
(13, 4, '2', '2016-07-09', 'Alexander Hamilton', 2, 'West Virginia', 'Maryland'),
(14, 3, '1', '2016-08-19', 'Emily Miller', 2, 'New York', 'Maryland'),
(15, 4, '2', '2016-08-20', 'Emma Smith', 3, 'West Virginia', 'Maryland'),
(16, 5, '1', '2016-07-15', 'Jacob Jones', 3, 'Maryland', 'Virginia'),
(17, 6, '1', '2016-07-15', 'James Monroe', 1, 'West Virginia', 'New York'),
(18, 5, '1', '2016-08-20', 'Michael Garcia', 2, 'Maryland', 'Virginia'),
(19, 6, '2', '2016-07-22', 'Martin King', 2, 'West Virginia', 'New York'),
(20, 7, '1', '2016-06-10', 'Noah Brown', 2, 'Maryland', 'New York'),
(21, 1, '1', '2016-03-08', 'Noah Brown', 4, 'New York', 'Virginia'),
(22, 2, '1', '2016-04-12', 'Olivia Johnson', 4, 'Virginia', 'New Jersey'),
(23, 3, '2', '2016-04-04', 'Sofia Davis', 2, 'New York', 'Maryland'),
(24, 4, '1', '2016-03-08', 'David Anderson', 3, 'West Virginia', 'Maryland'),
(25, 5, '2', '2016-03-10', 'Ian Gonzalez', 1, 'Maryland', 'Virginia'),
(26, 6, '2', '2016-04-01', 'James Brown', 3, 'West Virginia', 'New York'),
(27, 7, '1', '2016-03-29', 'John Smith', 4, 'Maryland', 'New York'),
(28, 8, '1', '2016-03-09', 'Joseph Harris', 2, 'West Virginia', 'Maryland'),
(29, 9, '2', '2016-03-02', 'Martin Wilson', 2, 'Virginia', 'New Jersey'),
(30, 10, '2', '2016-04-19', 'Patrick Jones', 1, 'New York', 'Virginia'),
(31, 1, '1', '2016-03-08', 'Sophia White', 4, 'New York', 'Virginia'),
(32, 2, '1', '2016-04-12', 'Taylor Davis', 4, 'Virginia', 'New Jersey'),
(33, 3, '2', '2016-04-04', 'Wilson Lee', 2, 'New York', 'Maryland'),
(34, 4, '1', '2016-03-08', 'Ava Anderson', 3, 'West Virginia', 'Maryland'),
(35, 5, '2', '2016-03-10', 'Alexander Hamilton', 1, 'Maryland', 'Virginia'),
(36, 6, '2', '2016-04-01', 'Emily Miller', 3, 'West Virginia', 'New York'),
(37, 7, '1', '2016-03-29', 'Emma Smith', 4, 'Maryland', 'New York'),
(38, 8, '1', '2016-03-09', 'Jacob Jones', 2, 'West Virginia', 'Maryland'),
(39, 9, '2', '2016-03-02', 'James Monroe', 2, 'Virginia', 'New Jersey'),
(40, 10, '2', '2016-04-19', 'Micahel Garcia', 1, 'New York', 'Virginia');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `ReviewID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Train_Number` int(11) NOT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Rating` int(11) NOT NULL,
  `ReviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`ReviewID`, `Username`, `Train_Number`, `Comment`, `Rating`, `ReviewDate`) VALUES
(1, 'olivia_johnson', 2, 'Good experience', 5, '2016-04-13'),
(2, 'ian_gonzalez', 5, NULL, 3, '2016-03-15'),
(3, 'alexander_hamilton', 5, NULL, 4, '2016-03-17'),
(4, 'james_brown', 6, 'Bad train ride', 1, '2016-04-02'),
(5, 'james_monroe', 9, NULL, 5, '2016-03-10'),
(6, 'john_smith', 7, 'Good', 4, '2016-04-01'),
(7, 'joseph_harris', 8, 'Meh', 2, '2016-03-10'),
(8, 'jacob_jones', 8, NULL, 3, '2016-03-10'),
(9, 'martin_wilson', 9, 'Passable', 3, '2016-03-03'),
(10, 'patrick_jones', 10, 'Excellent service', 5, '2016-04-20'),
(11, 'sophia_white', 1, NULL, 3, '2016-03-10'),
(12, 'taylor_davis', 2, 'Great', 4, '2016-04-13'),
(13, 'emma_smith', 7, NULL, 2, '2016-03-31'),
(14, 'ava_anderson', 4, NULL, 1, '2016-03-10'),
(15, 'emily_miller', 6, NULL, 2, '2016-04-05'),
(16, 'wilson_lee', 3, 'Bad', 2, '2016-04-07'),
(17, 'david_anderson', 4, NULL, 4, '2016-03-09'),
(18, 'noah_brown', 1, NULL, 3, '2016-03-11'),
(19, 'sofia_davis', 3, NULL, 4, '2016-04-07'),
(20, 'michael_garcia', 10, NULL, 1, '2016-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `Station`
--

CREATE TABLE `Station` (
  `Name` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Station`
--

INSERT INTO `Station` (`Name`, `Location`) VALUES
('Alexandria Station', 'Virginia'),
('Baltimore Penn Station', 'Maryland'),
('Dover Station', 'New Jersey'),
('Edison Station', 'New Jersey'),
('Gaithersburg Station', 'Maryland'),
('Grand Central Station', 'New York'),
('Hinton Depot Station', 'West Virginia'),
('Penn Station', 'New York'),
('Rockville Station', 'Maryland'),
('White Sulphur Springs Station', 'West Virginia'),
('Yonkers Station', 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `Stop`
--

CREATE TABLE `Stop` (
  `Train_Number` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Arrival_Time` time DEFAULT NULL,
  `Departure_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stop`
--

INSERT INTO `Stop` (`Train_Number`, `Name`, `Arrival_Time`, `Departure_Time`) VALUES
(1, 'Alexandria Station', '04:00:00', NULL),
(1, 'Edison Station', '02:00:00', '02:30:00'),
(1, 'Grand Central Station', NULL, '01:00:00'),
(1, 'Rockville Station', '03:00:00', '03:30:00'),
(2, 'Alexandria Station', NULL, '10:00:00'),
(2, 'Dover Station', '12:00:00', NULL),
(2, 'Hinton Depot Station', '10:00:00', '11:00:00'),
(3, 'Rockville Station', '09:00:00', NULL),
(3, 'White Sulphur Springs Station', '07:00:00', '08:00:00'),
(3, 'Yonkers Station', NULL, '06:00:00'),
(4, 'Baltimore Penn Station', '14:00:00', NULL),
(4, 'Dover Station', '11:00:00', '12:00:00'),
(4, 'Hinton Depot Station', NULL, '10:00:00'),
(5, 'Alexandria Station', '14:00:00', NULL),
(5, 'Dover Station', '11:00:00', '12:00:00'),
(5, 'Gaithersburg Station', NULL, '10:00:00'),
(6, 'Dover Station', '15:00:00', '16:00:00'),
(6, 'Hinton Depot Station', NULL, '14:00:00'),
(6, 'Yonkers Station', '17:00:00', NULL),
(7, 'Edison Station', '05:00:00', '06:00:00'),
(7, 'Grand Central Station', '07:00:00', NULL),
(7, 'Rockville Station', NULL, '04:00:00'),
(8, 'Dover Station', '05:00:00', '06:00:00'),
(8, 'Rockville Station', '07:00:00', NULL),
(8, 'White Sulphur Springs Station', NULL, '04:00:00'),
(9, 'Alexandria Station', NULL, '07:00:00'),
(9, 'Dover Station', '10:00:00', NULL),
(9, 'Rockville Station', '08:00:00', '09:00:00'),
(10, 'Alexandria Station', '10:00:00', NULL),
(10, 'Hinton Depot Station', '08:00:00', '09:00:00'),
(10, 'Penn Station', NULL, '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `System_Info`
--

CREATE TABLE `System_Info` (
  `Id` int(11) NOT NULL,
  `Max_Bags` int(11) NOT NULL,
  `Free_Bags` int(11) NOT NULL,
  `Student_Discount` double(4,2) NOT NULL,
  `Change_Fee` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Train_Route`
--

CREATE TABLE `Train_Route` (
  `Train_Number` int(11) NOT NULL,
  `‘1st_Class_price’` double(4,2) NOT NULL,
  `‘2nd_Class_price’` double(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Train_Route`
--

INSERT INTO `Train_Route` (`Train_Number`, `‘1st_Class_price’`, `‘2nd_Class_price’`) VALUES
(1, 10.00, 20.00),
(2, 10.00, 20.00),
(3, 12.00, 22.00),
(4, 11.00, 21.00),
(5, 14.00, 24.00),
(6, 17.00, 27.00),
(7, 13.00, 23.00),
(8, 15.00, 25.00),
(9, 12.00, 22.00),
(10, 13.00, 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `isManager` tinyint(1) NOT NULL,
  `isStudent` tinyint(1) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Username`, `Password`, `isManager`, `isStudent`, `Email`) VALUES
('alexander_hamilton', 'password', 0, 1, 'ah@gatech.edu'),
('ava_anderson', 'password', 0, 1, 'aa@gatech.edu'),
('david_anderson', 'password', 0, 0, 'da@email.com'),
('emily_miller', 'password', 0, 1, 'em@gatech.edu'),
('emma_smith', 'password', 0, 1, 'es@gatech.edu'),
('ian_gonzalez', 'password', 0, 0, 'ig@email.com'),
('jacob_jones', 'password', 0, 1, 'jj@gatech.edu'),
('james_brown', 'password', 0, 0, 'jb@email.com'),
('james_monroe', 'password', 0, 1, 'jm@gatech.edu'),
('john_smith', 'password', 0, 0, 'js@email.com'),
('joseph_harris', 'password', 0, 0, 'jh@email.com'),
('man_1', 'password', 1, 0, 'm1@man.com'),
('man_2', 'password', 1, 0, 'm2@man.com'),
('man_3', 'password', 1, 0, 'm3@man.com'),
('man_4', 'password', 1, 0, 'm4@man.com'),
('man_5', 'password', 1, 0, 'm6@man.com'),
('martin_king', 'password', 0, 1, 'mk@gatech.edu'),
('martin_wilson', 'password', 0, 0, 'mw@email.com'),
('michael_garcia', 'password', 0, 1, 'mg@gatech.edu'),
('noah_brown', 'password', 0, 1, 'nb@gatech.edu'),
('olivia_johnson', 'password', 0, 1, 'oj@gatech.edu'),
('patrick_jones', 'password', 0, 0, 'pj@email.com'),
('pjztam', 'stuff', 0, 0, 'pjztam@gmail.com'),
('sofia_davis', 'password', 0, 1, 'sd@gatech.edu'),
('sophia_white', 'password', 0, 0, 'sw@email.com'),
('taylor_davis', 'password', 0, 0, 'td@email.com'),
('wilson_lee', 'password', 0, 0, 'wl@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Payment_Info`
--
ALTER TABLE `Payment_Info`
  ADD PRIMARY KEY (`Card_Number`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `Reservation_ToCard_Number` (`Card_Number`);

--
-- Indexes for table `Reserves`
--
ALTER TABLE `Reserves`
  ADD PRIMARY KEY (`ReservationID`,`Train_Number`),
  ADD KEY `Train_Number` (`Train_Number`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `Train_Number` (`Train_Number`);

--
-- Indexes for table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `Stop`
--
ALTER TABLE `Stop`
  ADD PRIMARY KEY (`Train_Number`,`Name`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `System_Info`
--
ALTER TABLE `System_Info`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Train_Route`
--
ALTER TABLE `Train_Route`
  ADD PRIMARY KEY (`Train_Number`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Payment_Info`
--
ALTER TABLE `Payment_Info`
  ADD CONSTRAINT `Payment_Info_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`);

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ToCard_Number` FOREIGN KEY (`Card_Number`) REFERENCES `Payment_Info` (`Card_Number`),
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`);

--
-- Constraints for table `Reserves`
--
ALTER TABLE `Reserves`
  ADD CONSTRAINT `Reserves_ibfk_1` FOREIGN KEY (`Train_Number`) REFERENCES `Stop` (`Train_Number`),
  ADD CONSTRAINT `Reserves_ibfk_2` FOREIGN KEY (`ReservationID`) REFERENCES `Reservation` (`ReservationID`);

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`),
  ADD CONSTRAINT `Review_ibfk_2` FOREIGN KEY (`Train_Number`) REFERENCES `Train_Route` (`Train_Number`);

--
-- Constraints for table `Stop`
--
ALTER TABLE `Stop`
  ADD CONSTRAINT `Stop_ibfk_1` FOREIGN KEY (`Train_Number`) REFERENCES `Train_Route` (`Train_Number`),
  ADD CONSTRAINT `Stop_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `Station` (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
