-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2019 at 09:39 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_temp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) DEFAULT NULL,
  `psw` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `psw`) VALUES
('vgarg1762', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `username` varchar(20) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `psw` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `title`, `fname`, `lname`, `gender`, `city`, `country`, `contact`, `email`, `psw`) VALUES
('vgarg1762', 'Mr.', 'vishal', 'garg', 'male', 'Auckland', 'New Zealand', '0223943515', 'kjsdhfj@gmail.com', 'Vishalgarg.vg786');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `hid` int(11) AUTO_INCREMENT PRIMARY KEY,
  `hname` varchar(50) DEFAULT NULL,
  `hloc` varchar(50) DEFAULT NULL,
  `hdesc` varchar(500) DEFAULT NULL,
  `haddr` varchar(200) DEFAULT NULL,
  `imgname` varchar(100) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `hcountry` varchar(35) NOT NULL,
 
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hid`, `hname`, `hloc`, `hdesc`, `haddr`, `imgname`, `path`, `type`, `hcountry`) VALUES
(1, 'Hotel Mercury', 'Auckland', 'ioedhfuiohif efj ', 'iuehf io wef ijeipf ieejff iej f', 'PFTV1089.JPG', 'pics/PFTV1089.JPG', 'image/jpeg', 'New Zealand');

-- --------------------------------------------------------

--
-- Table structure for table `h_owner`
--

DROP TABLE IF EXISTS `h_owner`;
CREATE TABLE IF NOT EXISTS `h_owner` (
  `hname` varchar(8) DEFAULT NULL,
  `password` varchar(23) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `o_registered`
--

DROP TABLE IF EXISTS `o_registered`;
CREATE TABLE IF NOT EXISTS `o_registered` (
  `user` varchar(9) DEFAULT NULL,
  `title` varchar(4) DEFAULT NULL,
  `fname` varchar(123) DEFAULT NULL,
  `lname` varchar(234) DEFAULT NULL,
  `add1` varchar(235) DEFAULT NULL,
  `city` varchar(234) DEFAULT NULL,
  `country` varchar(234) DEFAULT NULL,
  `email` varchar(343) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

DROP TABLE IF EXISTS `registered`;
CREATE TABLE IF NOT EXISTS `registered` (
  `username` varchar(20) NOT NULL,
  `psw` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`username`, `psw`) VALUES
('vgarg1762', 'Vishalgarg.vg786');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) DEFAULT NULL,
  `roomtype` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `no_rooms` int(11) DEFAULT NULL,
  `no_guests` int(11) DEFAULT NULL,
  `in_date` date DEFAULT NULL,
  `out_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `hid`, `roomtype`, `username`, `no_rooms`, `no_guests`, `in_date`, `out_date`, `amount`, `status`) VALUES
(1, 1, 'luxury', 'vgarg1762', 1, 1, '2019-10-31', '2019-10-31', 0, 'Not Confirmed'),
(2, 1, 'luxury', 'vgarg1762', 1, 1, '2019-10-31', '2019-10-31', 0, 'Not Confirmed'),
(3, 1, 'luxury', 'vgarg1762', 1, 1, '2019-10-31', '2019-10-31', 0, 'Not Confirmed'),
(4, 1, 'luxury', 'vgarg1762', 1, 1, '2019-10-30', '2019-10-31', 50, 'Not Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE IF NOT EXISTS `room_type` (
  `rtid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) DEFAULT NULL,
  `rtname` varchar(100) DEFAULT NULL,
  `max_guests` int(11) DEFAULT NULL,
  `rtprice` int(11) DEFAULT NULL,
  `no_rooms` int(11) DEFAULT NULL,
  PRIMARY KEY (`rtid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`rtid`, `hid`, `rtname`, `max_guests`, `rtprice`, `no_rooms`) VALUES
(1, 1, 'luxury', 2, 50, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
