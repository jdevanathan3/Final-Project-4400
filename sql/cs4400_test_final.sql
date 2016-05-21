-- phpMyAdmin SQL Dump
-- version 4.7.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2016 at 01:12 AM
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
('0123456789012345', 'taylor_davis', '345', '2018-02-01', 'Jayy'),
('1049262086675695', 'emily_miller', '776', '2016-09-02', 'Emily Miller'),
('1234567890123456', 'man_1', '903', '2017-02-01', 'Jayy'),
('1274412000511069', 'martin_king', '165', '2016-12-16', 'Martin King'),
('1337133713371337', 'david_anderson', '133', '3012-02-01', 'derp'),
('1395069483958703', 'patrick', '123', '2017-12-01', 'John Doe'),
('1591591591591591', 'pjztam', '123', '2017-12-01', 'Patrick Tam'),
('1993199319931993', 'MasterTest', '123', '2018-02-01', 'Jay'),
('2102035186790743', 'noah_brown', '941', '2017-02-17', 'Noah Brown'),
('2342234223422342', 'david_anderson', '234', '2018-02-01', 'Jayy'),
('2478762879689697', 'emma_smith', '163', '2016-11-10', 'Emma Smith'),
('2884938734380048', 'joseph_harris', '522', '2016-09-07', 'Joseph Harris'),
('3028119929894670', 'alexander_hamilton', '323', '2016-06-10', 'Alexander Hamilton'),
('3123234234234123', 'ptupakula3', '222', '2018-05-01', 'Pranathi '),
('3134251660980529', 'jacob_jones', '523', '2016-12-09', 'Jacob Jones'),
('3455322233444223', 'ptupakula3', '212', '2017-04-01', 'Pranathi '),
('3649437203561423', 'anon', '092', '2016-10-14', 'Anon'),
('3854936584392564', 'yuanhan2', '375', '2017-12-01', 'Bob Jones'),
('3948257693825768', 'pjztam6', '475', '2018-12-01', 'Patrick Tam'),
('4029339709587839', 'ian_gonzalez', '442', '2016-11-11', 'Ian Gonzalez'),
('4215162817778808', 'james_monroe', '524', '2017-01-19', 'James Monroe'),
('4444444444444444', 'Jay', '023', '2021-02-01', 'Jay Devanathan'),
('5190213501377625', 'patrick_jones', '894', '2017-06-10', 'Patrick Jones'),
('5454952398799884', 'olivia_johnson', '165', '2017-04-07', 'Olivia Johnson'),
('5678901234567890', 'taylor_davis', '456', '2026-02-01', 'Jay Devanathan'),
('6170235748226421', 'ava_anderson', '891', '2017-05-17', 'Ava Anderson'),
('6571343997108197', 'emily_miller', '901', '2017-01-26', 'Emily Miller'),
('7356403675950935', 'wilson_lee', '215', '2017-04-07', 'Wilson Lee'),
('7508956564490738', 'james_brown', '532', '2016-11-17', 'James Brown'),
('7529480012549359', 'pjztam5', '852', '2017-08-01', 'John Doe'),
('7545297633985886', 'sofia_davis', '945', '2016-10-14', 'Sofia Davis'),
('7581866657020760', 'alexander_hamilton', '981', '2017-04-15', 'Alexander Hamilton'),
('7859275432914641', 'pjztam2', '132', '2018-05-01', 'Patrick Tam'),
('7894561234567145', 'pjztam5', '639', '2016-08-01', 'Patrick Tam'),
('7963444581793040', 'john_smith', '542', '2016-11-16', 'John Smith'),
('8101045471731157', 'emma_smith', '516', '2016-10-14', 'Emma Smith'),
('8761335158118813', 'taylor_davis', '941', '2017-03-18', 'Taylor Davis'),
('8798534140811675', 'martin_wilson', '454', '2017-03-17', 'Martin Wilson'),
('9414223256521984', 'michael_garcia', '516', '2017-02-11', 'Michael Garcia'),
('9819404688257258', 'ava_anderson', '891', '2017-01-21', 'Ava Anderson'),
('9952590737781935', 'sophia_white', '745', '2016-10-08', 'Sophia White'),
('9999999999999999', 'MasterTest', '123', '2019-02-01', 'Jayyy');

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `ReservationID` int(11) NOT NULL,
  `Card_Number` varchar(16) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `IsCancelled` tinyint(1) NOT NULL,
  `Price` double(6,2) NOT NULL,
  `ReserveDate` date DEFAULT NULL,
  `CancelDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`ReservationID`, `Card_Number`, `Username`, `IsCancelled`, `Price`, `ReserveDate`, `CancelDate`) VALUES
(1, '3028119929894670', 'alexander_hamilton', 1, 82.00, '2016-01-08', '2016-01-09'),
(2, NULL, 'david_anderson', 0, 190.00, '2016-02-08', NULL),
(3, '4029339709587839', 'ian_gonzalez', 0, 220.00, '2016-02-07', NULL),
(4, '7508956564490738', 'james_brown', 1, 94.00, '2016-02-08', '2016-04-26'),
(5, '7963444581793040', 'john_smith', 0, 190.00, '2016-02-07', NULL),
(6, '2884938734380048', 'joseph_harris', 1, 86.00, '2016-01-13', '2016-01-14'),
(7, '8798534140811675', 'martin_wilson', 0, 160.00, '2016-01-11', NULL),
(8, '5190213501377625', 'patrick_jones', 1, 66.00, '2016-03-07', '2016-03-08'),
(9, '9952590737781935', 'sophia_white', 0, 90.00, '2016-01-03', NULL),
(10, '8761335158118813', 'taylor_davis', 1, 76.00, '2016-02-10', '2016-02-11'),
(11, '7356403675950935', 'wilson_lee', 0, 90.00, '2016-01-27', NULL),
(12, '6170235748226421', 'ava_anderson', 1, 66.00, '2016-02-09', '2016-02-10'),
(13, '3028119929894670', 'alexander_hamilton', 0, 96.00, '2016-01-20', NULL),
(14, '1049262086675695', 'emily_miller', 0, 56.00, '2016-02-15', NULL),
(15, '2478762879689697', 'emma_smith', 0, 120.00, '2016-02-10', NULL),
(16, '3134251660980529', 'jacob_jones', 1, 64.40, '2016-01-13', '2016-01-14'),
(17, '4215162817778808', 'james_monroe', 0, 80.00, '2016-02-10', NULL),
(18, '9414223256521984', 'michael_garcia', 0, 60.00, '2016-02-12', NULL),
(19, '1274412000511069', 'martin_king', 1, 69.20, '2016-02-16', '2016-02-17'),
(20, '2102035186790743', 'noah_brown', 0, 64.00, '2016-01-13', NULL),
(21, '2102035186790743', 'noah_brown', 0, 112.00, '2016-02-08', NULL),
(22, '5454952398799884', 'olivia_johnson', 1, 74.00, '2016-02-10', '2016-02-11'),
(23, '7545297633985886', 'sofia_davis', 0, 120.00, '2016-01-12', NULL),
(24, NULL, 'david_anderson', 0, 120.00, '2016-02-08', NULL),
(25, '4029339709587839', 'ian_gonzalez', 1, 68.00, '2016-02-10', '2016-02-11'),
(26, '7508956564490738', 'james_brown', 0, 150.00, '2016-01-04', NULL),
(27, '7963444581793040', 'john_smith', 0, 140.00, '2016-01-07', NULL),
(28, '2884938734380048', 'joseph_harris', 0, 80.00, '2016-01-13', NULL),
(29, '8798534140811675', 'martin_wilson', 0, 90.00, '2016-01-12', NULL),
(30, '5190213501377625', 'patrick_jones', 0, 130.00, '2016-01-12', NULL),
(31, '9952590737781935', 'sophia_white', 0, 140.00, '2016-02-16', NULL),
(32, '8761335158118813', 'taylor_davis', 1, 80.00, '2016-02-09', '2016-04-24'),
(33, '7356403675950935', 'wilson_lee', 0, 150.00, '2016-02-08', NULL),
(34, '9819404688257258', 'ava_anderson', 0, 96.00, '2016-02-17', NULL),
(35, '3028119929894670', 'alexander_hamilton', 0, 72.00, '2016-02-09', NULL),
(36, '6571343997108197', 'emily_miller', 0, 120.00, '2016-02-01', NULL),
(37, '8101045471731157', 'emma_smith', 0, 112.00, '2016-02-23', NULL),
(38, '3134251660980529', 'jacob_jones', 0, 64.00, '2016-02-17', NULL),
(39, '4215162817778808', 'james_monroe', 0, 72.00, '2016-02-01', NULL),
(40, '9414223256521984', 'michael_garcia', 0, 104.00, '2016-01-13', NULL),
(41, '3028119929894670', 'alexander_hamilton', 0, 56.00, '2016-04-24', NULL),
(42, '3028119929894670', 'alexander_hamilton', 1, 69.20, '2016-04-24', '2016-04-26'),
(43, '3028119929894670', 'alexander_hamilton', 0, 80.00, '2016-04-24', NULL),
(44, '4444444444444444', 'Jay', 0, 100.00, '2016-04-24', NULL),
(45, '4444444444444444', 'Jay', 1, 78.00, '2016-04-12', '2016-04-24'),
(46, '4444444444444444', 'Jay', 1, 56.00, '2016-04-24', '2016-04-24'),
(47, '3028119929894670', 'alexander_hamilton', 0, 0.00, '2016-04-24', NULL),
(48, '4444444444444444', 'Jay', 1, 68.00, '2016-04-24', '2016-04-24'),
(49, '4444444444444444', 'Jay', 0, 220.00, '2016-04-24', NULL),
(50, '7859275432914641', 'pjztam2', 1, 150.00, '2016-04-24', '2016-04-24'),
(51, '9952590737781935', 'sophia_white', 0, 0.00, '2016-04-24', NULL),
(52, '4444444444444444', 'Jay', 0, 150.00, '2016-04-24', NULL),
(53, '4444444444444444', 'Jay', 0, 0.00, '2016-04-24', NULL),
(54, '3028119929894670', 'alexander_hamilton', 0, 0.00, '2016-04-24', NULL),
(55, '8761335158118813', 'taylor_davis', 0, 104.00, '2016-04-24', NULL),
(56, '8761335158118813', 'taylor_davis', 0, 168.00, '2016-04-24', NULL),
(57, '3028119929894670', 'alexander_hamilton', 0, 168.00, '2016-04-24', NULL),
(58, NULL, 'david_anderson', 0, 390.00, '2016-03-09', NULL),
(59, NULL, 'david_anderson', 0, 220.00, '2016-04-24', NULL),
(60, '3455322233444223', 'ptupakula3', 0, 208.00, '2016-04-24', NULL),
(61, NULL, 'david_anderson', 1, 110.00, '2016-04-24', '2016-04-24'),
(62, '1337133713371337', 'david_anderson', 1, 70.00, '2016-04-24', '2016-04-24'),
(63, '7859275432914641', 'pjztam2', 0, 120.00, '2016-04-24', NULL),
(64, '1993199319931993', 'MasterTest', 1, 69.20, '2016-04-24', '2016-04-24'),
(65, NULL, 'MasterTest', 0, 170.00, '2016-04-24', NULL),
(66, '1993199319931993', 'MasterTest', 0, 144.00, '2016-04-24', NULL),
(67, '1993199319931993', 'MasterTest', 1, 80.80, '2016-04-24', '2016-04-24'),
(68, NULL, 'MasterTest', 0, 80.00, '2016-04-24', NULL),
(69, '1993199319931993', 'MasterTest', 1, 250.00, '2016-04-25', '2016-04-25'),
(70, NULL, 'MasterTest', 0, 104.00, '2016-04-25', NULL),
(71, '9999999999999999', 'MasterTest', 0, 120.00, '2016-04-25', NULL),
(72, NULL, 'MasterTest', 0, 104.00, '2016-04-25', NULL),
(73, '1591591591591591', 'pjztam', 0, 220.00, '2016-04-25', NULL),
(74, '1591591591591591', 'pjztam', 0, 180.00, '2016-04-25', NULL),
(75, '7894561234567145', 'pjztam5', 0, 468.00, '2016-04-25', NULL),
(76, '7529480012549359', 'pjztam5', 1, 72.00, '2016-04-25', '2016-04-25'),
(77, '3948257693825768', 'pjztam6', 1, 110.00, '2016-04-25', '2016-04-25'),
(78, '3948257693825768', 'pjztam6', 1, 130.00, '2016-04-25', '2016-04-25'),
(79, '3948257693825768', 'pjztam6', 0, 88.00, '2016-04-25', NULL),
(80, '3948257693825768', 'pjztam6', 0, 72.00, '2016-04-25', NULL),
(81, NULL, 'pjztam6', 0, 0.00, '2016-04-25', NULL),
(82, '3948257693825768', 'pjztam6', 1, 48.00, '2016-04-25', '2016-04-25'),
(83, '3948257693825768', 'pjztam6', 1, 72.00, '2016-04-25', '2016-04-25'),
(84, '7529480012549359', 'pjztam5', 0, 104.00, '2016-04-25', NULL),
(85, NULL, 'pjztam5', 0, 272.00, '2016-04-25', NULL),
(86, NULL, 'yuanhan2', 0, 180.00, '2016-04-25', NULL),
(87, NULL, 'alexander_hamilton', 0, 120.00, '2016-04-25', NULL),
(88, '3854936584392564', 'yuanhan2', 0, 230.00, '2016-04-25', NULL),
(89, NULL, 'yuanhan2', 0, 100.00, '2016-04-25', NULL),
(90, '3028119929894670', 'alexander_hamilton', 1, 66.00, '2016-04-25', '2016-04-25'),
(91, '3028119929894670', 'alexander_hamilton', 1, 110.00, '2016-04-25', '2016-04-25'),
(92, '3028119929894670', 'alexander_hamilton', 1, 56.00, '2016-04-25', '2016-04-25'),
(93, '1395069483958703', 'patrick', 0, 100.00, '2016-04-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reserves`
--

CREATE TABLE `Reserves` (
  `ReservationID` int(11) NOT NULL,
  `Train_Number` varchar(11) NOT NULL DEFAULT '',
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
(1, '2', '2', '2016-03-08', 'Phillip Hamilton', 2, 'Alexandria Station', 'Dover Station'),
(1, '352 Express', '1', '2016-05-13', 'Alexander Hamilton', 2, 'Grand Central Station', 'Alexandria Station'),
(2, '2', '1', '2016-03-08', 'Bill Anderson', 2, 'Alexandria Station', 'Dover Station'),
(2, '352 Express', '2', '2016-05-20', 'David Anderson', 1, 'Grand Central Station', 'Alexandria Station'),
(3, '3', '1', '2016-05-23', 'Ian Gonzalez', 3, 'Yonkers Station', 'Rockville Station'),
(3, '4', '2', '2016-03-09', 'Ian Gonzalez', 2, 'Hinton Depot Station', 'Baltimore Penn Station'),
(4, '3', '1', '2016-05-19', 'James Brown', 2, 'Yonkers Station', 'Rockville Station'),
(4, '4', '2', '2016-05-20', 'James Brown', 3, 'Hinton Depot Station', 'Baltimore Penn Station'),
(5, '5', '1', '2016-03-15', 'John Smith', 3, 'Gaithersburg Station', 'Alexandria Station'),
(5, '6', '1', '2016-03-15', 'John Smith', 1, 'Hinton Depot Station', 'Yonkers Station'),
(6, '5', '1', '2016-05-20', 'Joseph Harris', 2, 'Gaithersburg Station', 'Alexandria Station'),
(6, '6', '2', '2016-03-22', 'Joseph Harris', 2, 'Hinton Depot Station', 'Yonkers Station'),
(7, '7', '1', '2016-02-10', 'Martin Wilson', 2, 'Rockville Station', 'Grand Central Station'),
(7, '8', '1', '2016-05-13', 'Martin Wilson', 2, 'White Sulphur Springs Station', 'Rockville Station'),
(8, '8', '1', '2016-05-13', 'Patrick Jones', 2, 'White Sulphur Springs Station', 'Rockville Station'),
(9, '9', '2', '2016-03-08', 'Sophia White', 2, 'Alexandria Station', 'Dover Station'),
(10, '10', '2', '2016-05-20', 'Taylor Davis', 1, 'Penn Station', 'Alexandria Station'),
(11, '2', '1', '2016-03-08', 'Wilson Lee', 2, 'Alexandria Station', 'Dover Station'),
(12, '3', '1', '2016-05-23', 'Ava Anderson', 3, 'Yonkers Station', 'Rockville Station'),
(13, '4', '2', '2016-03-09', 'Alexander Hamilton', 2, 'Hinton Depot Station', 'Baltimore Penn Station'),
(14, '3', '1', '2016-05-19', 'Emily Miller', 2, 'Yonkers Station', 'Rockville Station'),
(15, '4', '2', '2016-05-20', 'Emma Smith', 3, 'Hinton Depot Station', 'Baltimore Penn Station'),
(16, '5', '1', '2016-03-15', 'Jacob Jones', 3, 'Gaithersburg Station', 'Alexandria Station'),
(17, '6', '1', '2016-03-15', 'James Monroe', 1, 'Hinton Depot Station', 'Yonkers Station'),
(18, '5', '1', '2016-05-20', 'Michael Garcia', 2, 'Gaithersburg Station', 'Alexandria Station'),
(19, '6', '2', '2016-05-22', 'Martin King', 2, 'West Virginia', 'New York'),
(20, '7', '1', '2016-05-10', 'Noah Brown', 2, 'Maryland', 'New York'),
(21, '352 Express', '1', '2016-03-08', 'Noah Brown', 4, 'New York', 'Virginia'),
(22, '2', '1', '2016-05-12', 'Olivia Johnson', 4, 'Virginia', 'New Jersey'),
(23, '3', '2', '2016-05-04', 'Sofia Davis', 2, 'New York', 'Maryland'),
(24, '4', '1', '2016-03-08', 'David Anderson', 3, 'West Virginia', 'Maryland'),
(25, '5', '2', '2016-03-10', 'Ian Gonzalez', 1, 'Maryland', 'Virginia'),
(26, '6', '2', '2016-05-01', 'James Brown', 3, 'West Virginia', 'New York'),
(27, '7', '1', '2016-05-29', 'John Smith', 4, 'Maryland', 'New York'),
(28, '8', '1', '2016-03-09', 'Joseph Harris', 2, 'West Virginia', 'Maryland'),
(29, '9', '2', '2016-03-02', 'Martin Wilson', 2, 'Virginia', 'New Jersey'),
(30, '10', '2', '2016-05-19', 'Patrick Jones', 1, 'New York', 'Virginia'),
(31, '352 Express', '1', '2016-03-08', 'Sophia White', 4, 'New York', 'Virginia'),
(33, '3', '2', '2016-05-04', 'Wilson Lee', 2, 'New York', 'Maryland'),
(34, '4', '1', '2016-03-08', 'Ava Anderson', 3, 'West Virginia', 'Maryland'),
(35, '5', '2', '2016-03-10', 'Alexander Hamilton', 1, 'Maryland', 'Virginia'),
(36, '6', '2', '2016-05-01', 'Emily Miller', 3, 'West Virginia', 'New York'),
(37, '7', '1', '2016-04-29', 'Emma Smith', 4, 'Maryland', 'New York'),
(38, '8', '1', '2016-03-09', 'Jacob Jones', 2, 'West Virginia', 'Maryland'),
(39, '9', '2', '2016-03-02', 'James Monroe', 2, 'Virginia', 'New Jersey'),
(40, '10', '2', '2016-05-19', 'Micahel Garcia', 1, 'New York', 'Virginia'),
(41, '9', '1', '2016-04-24', 'Test', 2, 'Alexandria Station', 'Dover Station'),
(43, '3', '1', '2016-05-13', 'Df', 3, 'Yonkers Station', 'Rockville Station'),
(43, '352 Express', '1', '2016-04-27', 'Pranathi Tupakula', 3, 'Grand Central Station', 'Alexandria Station'),
(44, '9', '1', '2016-04-24', 'kewon', 3, 'Alexandria Station', 'Dover Station'),
(47, '352 Express', '2', '2016-06-27', 'Test', 4, 'Grand Central Station', 'Alexandria Station'),
(49, '2', '1', '2016-04-30', 'Pranathi', 0, 'Alexandria Station', 'Dover Station'),
(49, '9', '1', '2016-06-03', 'Jay', 4, 'Alexandria Station', 'Dover Station'),
(51, '3', '2', '2016-06-01', 'Jay', 3, 'Yonkers Station', 'Rockville Station'),
(51, '352 Express', '1', '2016-07-22', 'Pranathi', 4, 'Grand Central Station', 'Alexandria Station'),
(52, '4', '2', '2016-05-31', 'Jay', 3, 'Hinton Depot Station', 'Baltimore Penn Station'),
(53, '352 Express', '2', '2016-06-27', 'Pranathi Tupakula', 4, 'Grand Central Station', 'Alexandria Station'),
(54, '2', '1', '2016-04-26', 'Hayy', 3, 'Alexandria Station', 'Dover Station'),
(54, '352 Express', '2', '2016-05-26', 'Test', 4, 'Grand Central Station', 'Alexandria Station'),
(54, '9', '2', '2017-07-21', 'Jayy', 3, 'Alexandria Station', 'Dover Station'),
(55, '352 Express', '2', '2016-08-17', 'Yuanhan', 3, 'Grand Central Station', 'Alexandria Station'),
(56, '3', '2', '2016-09-24', 'Patrick Senpai', 4, 'Yonkers Station', 'Rockville Station'),
(57, '3', '2', '2016-05-11', 'Test', 4, 'Yonkers Station', 'Rockville Station'),
(59, '6', '1', '2016-09-29', 'Patrick pls finish', 2, 'Hinton Depot Station', 'Yonkers Station'),
(59, '9', '2', '2016-06-10', 'Dopeness', 3, 'Alexandria Station', 'Dover Station'),
(60, '352 Express', '2', '2019-08-16', 'Pranathi Tupakula', 4, 'Grand Central Station', 'Alexandria Station'),
(60, '6', '1', '2016-04-29', 'Pranathi Tupakula', 0, 'Hinton Depot Station', 'Yonkers Station'),
(63, '8', '2', '2016-04-24', 'Kira Yamato', 2, 'Dover Station', 'Rockville Station'),
(65, '9', '2', '2016-05-19', 'well....', 4, 'Alexandria Station', 'Dover Station'),
(66, '2', '2', '2016-05-12', 'Test', 4, 'Alexandria Station', 'Dover Station'),
(68, '352 Express', '2', '2016-04-29', 'Test', 2, 'Grand Central Station', 'Rockville Station'),
(70, '9', '1', '2016-04-25', 'dopester', 4, 'Alexandria Station', 'Dover Station'),
(71, '2', '1', '2016-04-29', 'Joe', 4, 'Alexandria Station', 'Hinton Depot Station'),
(72, '9', '1', '2016-04-29', 'Dwayne', 4, 'Alexandria Station', 'Dover Station'),
(73, '9', '2', '2016-04-30', 'stuff', 3, 'Alexandria Station', 'Dover Station'),
(74, '2', '2', '2016-04-26', 'dgadfgsagf', 4, 'Alexandria Station', 'Dover Station'),
(75, '2', '2', '2016-04-25', 'Patrick Tam', 3, 'Alexandria Station', 'Hinton Depot Station'),
(75, '3', '1', '2016-04-30', 'Bob Jones', 3, 'White Sulphur Springs Station', 'Rockville Station'),
(75, '4', '1', '2016-05-18', 'Patrick Tam', 4, 'Hinton Depot Station', 'Dover Station'),
(75, '5', '1', '2016-04-27', 'Patrick Tam', 1, 'Gaithersburg Station', 'Dover Station'),
(79, '352 Express', '1', '2016-04-28', 'patrick tam', 3, 'Grand Central Station', 'Edison Station'),
(80, '2', '1', '2016-04-26', 'stuff person', 0, 'Alexandria Station', 'Hinton Depot Station'),
(84, '9', '1', '2016-04-29', 'Bob Jones', 4, 'Alexandria Station', 'Dover Station'),
(85, '3', '2', '2016-04-28', 'Stuff2', 4, 'Yonkers Station', 'Rockville Station'),
(85, '9', '1', '2016-04-28', 'stuff1', 4, 'Alexandria Station', 'Dover Station'),
(86, '2', '2', '2016-04-28', 'stuff', 4, 'Alexandria Station', 'Dover Station'),
(87, '2', '1', '2016-05-18', 'stuff2', 4, 'Alexandria Station', 'Dover Station'),
(88, '2', '2', '2016-08-16', 'stuff', 4, 'Alexandria Station', 'Dover Station'),
(89, '9', '1', '2016-05-25', 'stuff 3', 3, 'Alexandria Station', 'Dover Station'),
(93, '9', '1', '2016-04-29', 'fuck this class', 3, 'Alexandria Station', 'Dover Station');

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `ReviewID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Train_Number` varchar(11) NOT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Rating` int(11) NOT NULL,
  `ReviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`ReviewID`, `Username`, `Train_Number`, `Comment`, `Rating`, `ReviewDate`) VALUES
(1, 'olivia_johnson', '2', 'Good experience', 5, '2016-04-13'),
(2, 'ian_gonzalez', '5', NULL, 3, '2016-03-15'),
(3, 'alexander_hamilton', '5', NULL, 4, '2016-03-17'),
(4, 'james_brown', '6', 'Bad train ride', 1, '2016-04-02'),
(5, 'james_monroe', '9', NULL, 5, '2016-03-10'),
(6, 'john_smith', '7', 'Good', 4, '2016-04-01'),
(7, 'joseph_harris', '8', 'Meh', 2, '2016-03-10'),
(8, 'jacob_jones', '8', NULL, 3, '2016-03-10'),
(9, 'martin_wilson', '9', 'Passable', 3, '2016-03-03'),
(10, 'patrick_jones', '10', 'Excellent service', 5, '2016-04-20'),
(11, 'sophia_white', '352 Express', NULL, 3, '2016-03-10'),
(12, 'taylor_davis', '2', 'Great', 4, '2016-04-13'),
(13, 'emma_smith', '7', NULL, 2, '2016-03-31'),
(14, 'ava_anderson', '4', NULL, 1, '2016-03-10'),
(15, 'emily_miller', '6', NULL, 2, '2016-04-05'),
(16, 'wilson_lee', '3', 'Bad', 2, '2016-04-07'),
(17, 'david_anderson', '4', NULL, 4, '2016-03-09'),
(18, 'noah_brown', '352 Express', NULL, 3, '2016-03-11'),
(19, 'sofia_davis', '3', NULL, 4, '2016-04-07'),
(20, 'michael_garcia', '10', NULL, 1, '2016-04-21'),
(21, 'ptupakula3', '2', 'hella nice.', 5, '2016-04-24'),
(22, 'man_1', '3', 'gucci', 5, '2016-04-24'),
(23, 'Jay', '2', 'fantastic!', 5, '2016-04-24'),
(26, 'Jay', '9', 'great training! such fabulous', 5, '2016-04-24'),
(27, 'pjztam', '352 Express', 'stuff', 5, '2016-04-24'),
(28, 'pjztam', '352 Express', '', 5, '2016-04-24'),
(29, 'pjztam', '5', 'It sucked', 1, '2016-04-24'),
(30, 'taylor_davis', '5', '', 1, '2016-04-24'),
(31, 'ptupakula3', '5', 'I would rather walk a 100 miles.', 1, '2016-04-24'),
(32, 'MasterTest', '352 Express', 'Should have named it pineapple express', 2, '2016-04-24'),
(33, 'pjztam6', '352 Express', 'Smelled weird', 2, '2016-04-25'),
(34, 'alexander_hamilton', '7', '', 4, '2016-04-25'),
(35, 'alexander_hamilton', '8', 'decent', 4, '2016-04-25'),
(36, 'alexander_hamilton', '8', '', 5, '2016-04-25');

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
  `Train_Number` varchar(11) NOT NULL DEFAULT '',
  `Name` varchar(255) NOT NULL,
  `Arrival_Time` time DEFAULT NULL,
  `Departure_Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stop`
--

INSERT INTO `Stop` (`Train_Number`, `Name`, `Arrival_Time`, `Departure_Time`) VALUES
('10', 'Alexandria Station', '10:00:00', NULL),
('10', 'Hinton Depot Station', '08:00:00', '09:00:00'),
('10', 'Penn Station', NULL, '07:00:00'),
('2', 'Alexandria Station', NULL, '10:00:00'),
('2', 'Dover Station', '13:00:00', NULL),
('2', 'Hinton Depot Station', '11:00:00', '12:00:00'),
('3', 'Rockville Station', '09:00:00', NULL),
('3', 'White Sulphur Springs Station', '07:00:00', '08:00:00'),
('3', 'Yonkers Station', NULL, '06:00:00'),
('352 Express', 'Alexandria Station', '04:00:00', NULL),
('352 Express', 'Edison Station', '02:00:00', '02:30:00'),
('352 Express', 'Grand Central Station', NULL, '01:00:00'),
('352 Express', 'Rockville Station', '03:00:00', '03:30:00'),
('4', 'Baltimore Penn Station', '14:00:00', NULL),
('4', 'Dover Station', '11:00:00', '12:00:00'),
('4', 'Hinton Depot Station', NULL, '10:00:00'),
('5', 'Alexandria Station', '14:00:00', NULL),
('5', 'Dover Station', '11:00:00', '12:00:00'),
('5', 'Gaithersburg Station', NULL, '10:00:00'),
('6', 'Dover Station', '15:00:00', '16:00:00'),
('6', 'Hinton Depot Station', NULL, '14:00:00'),
('6', 'Yonkers Station', '17:00:00', NULL),
('7', 'Edison Station', '05:00:00', '06:00:00'),
('7', 'Grand Central Station', '07:00:00', NULL),
('7', 'Rockville Station', NULL, '04:00:00'),
('8', 'Dover Station', '05:00:00', '06:00:00'),
('8', 'Rockville Station', '07:00:00', NULL),
('8', 'White Sulphur Springs Station', NULL, '04:00:00'),
('9', 'Alexandria Station', NULL, '07:00:00'),
('9', 'Dover Station', '10:00:00', NULL),
('9', 'Rockville Station', '08:00:00', '09:00:00');

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

--
-- Dumping data for table `System_Info`
--

INSERT INTO `System_Info` (`Id`, `Max_Bags`, `Free_Bags`, `Student_Discount`, `Change_Fee`) VALUES
(1, 4, 2, 0.80, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `Train_Route`
--

CREATE TABLE `Train_Route` (
  `Train_Number` varchar(11) NOT NULL DEFAULT '',
  `1st_Class_price` double(6,2) NOT NULL,
  `2nd_Class_price` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Train_Route`
--

INSERT INTO `Train_Route` (`Train_Number`, `1st_Class_price`, `2nd_Class_price`) VALUES
('10', 100.00, 130.00),
('2', 90.00, 120.00),
('3', 70.00, 150.00),
('352 Express', 80.00, 100.00),
('4', 90.00, 120.00),
('5', 60.00, 90.00),
('6', 100.00, 120.00),
('7', 80.00, 100.00),
('8', 80.00, 120.00),
('9', 70.00, 90.00);

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
('anon', 'password', 0, 1, 'anon@gatech.edu'),
('ava_anderson', 'password', 0, 1, 'aa@gatech.edu'),
('david_anderson', 'password', 0, 0, 'da@email.com'),
('emily_miller', 'password', 0, 1, 'em@gatech.edu'),
('emma_smith', 'password', 0, 1, 'es@gatech.edu'),
('ian_gonzalez', 'password', 0, 0, 'ig@email.com'),
('jacob_jones', 'password', 0, 1, 'jj@gatech.edu'),
('james_brown', 'password', 0, 0, 'jb@email.com'),
('james_monroe', 'password', 0, 1, 'jm@gatech.edu'),
('Jay', 'gggg', 0, 1, 'jaysp3@gmail.com'),
('john_smith', 'password', 0, 0, 'js@email.com'),
('joseph_harris', 'password', 0, 0, 'jh@email.com'),
('kazari', 'password', 0, 0, 'kazari@gmail.com'),
('man_1', 'password', 1, 1, 'm1@man.com'),
('man_2', 'password', 1, 0, 'm2@man.com'),
('man_3', 'password', 1, 0, 'm3@man.com'),
('man_4', 'password', 1, 0, 'm4@man.com'),
('man_5', 'password', 1, 0, 'm6@man.com'),
('martin_king', 'password', 0, 1, 'mk@gatech.edu'),
('martin_wilson', 'password', 0, 0, 'mw@email.com'),
('MasterTest', 'password', 0, 1, 'masterTest@gmail.com'),
('michael_garcia', 'password', 0, 1, 'mg@gatech.edu'),
('noah_brown', 'password', 0, 1, 'nb@gatech.edu'),
('olivia_johnson', 'password', 0, 1, 'oj@gatech.edu'),
('patrick', 'stuff', 0, 0, 'patrick@gmail.com'),
('patrick_jones', 'password', 0, 0, 'pj@email.com'),
('pjztam', 'stuff', 0, 0, 'pjztam@gmail.com'),
('pjztam2', 'stuff', 0, 0, 'pjztam2@gmail.com'),
('pjztam3', 'password', 0, 0, 'pjztam3@gmail.com'),
('pjztam5', 'password', 0, 1, 'pjztam5@gmail.com'),
('pjztam6', 'stuff', 0, 1, 'pjztam6@gmail.com'),
('ptupakula3', 'password', 0, 1, 'ptupakula3@gatech.edu'),
('saten_ruiko', 'password', 0, 0, 'saten_ruiko@gmail.com'),
('sofia_davis', 'password', 0, 1, 'sd@gatech.edu'),
('sophia_white', 'password', 0, 0, 'sw@email.com'),
('taylor_davis', 'password', 0, 1, 'td@email.com'),
('uiharu_kazari', 'password', 0, 0, 'uiharu.kazari@gmail.com'),
('wilson_lee', 'password', 0, 0, 'wl@email.com'),
('yuanhan2', 'password', 0, 0, 'yuanhan2@gmail.com');

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
  ADD PRIMARY KEY (`ReservationID`,`Train_Number`) USING BTREE,
  ADD KEY `Reserves_ibfk_1` (`Train_Number`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `Username` (`Username`),
  ADD KEY `Train_Number` (`Train_Number`) USING BTREE;

--
-- Indexes for table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `Stop`
--
ALTER TABLE `Stop`
  ADD PRIMARY KEY (`Train_Number`,`Name`) USING BTREE,
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
  ADD PRIMARY KEY (`Train_Number`) USING BTREE,
  ADD UNIQUE KEY `Train_Number` (`Train_Number`) USING BTREE;

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
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`),
  ADD CONSTRAINT `Reservation_ToCard_Number` FOREIGN KEY (`Card_Number`) REFERENCES `Payment_Info` (`Card_Number`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Reserves`
--
ALTER TABLE `Reserves`
  ADD CONSTRAINT `Reserves_ibfk_1` FOREIGN KEY (`Train_Number`) REFERENCES `Train_Route` (`Train_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Reserves_ibfk_2` FOREIGN KEY (`ReservationID`) REFERENCES `Reservation` (`ReservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`),
  ADD CONSTRAINT `Review_ibfk_2` FOREIGN KEY (`Train_Number`) REFERENCES `Train_Route` (`Train_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Stop`
--
ALTER TABLE `Stop`
  ADD CONSTRAINT `Stop_ibfk_1` FOREIGN KEY (`Train_Number`) REFERENCES `Train_Route` (`Train_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Stop_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `Station` (`Name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
