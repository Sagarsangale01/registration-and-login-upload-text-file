-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 01:55 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siddhitechtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeedetail`
--

CREATE TABLE IF NOT EXISTS `employeedetail` (
`employee_pk` int(8) NOT NULL,
  `employee_firstName` varchar(20) NOT NULL,
  `employee_lastName` varchar(20) NOT NULL,
  `employee_gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `employee_dateofBirth` date NOT NULL,
  `employee_email` varchar(30) NOT NULL,
  `employee_mobileNo` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `employee_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employeedetail`
--

INSERT INTO `employeedetail` (`employee_pk`, `employee_firstName`, `employee_lastName`, `employee_gender`, `employee_dateofBirth`, `employee_email`, `employee_mobileNo`, `password`, `employee_status`, `status`) VALUES
(3, 'Sagar', 'Sangale', '', '2018-12-13', 'admin@gmial.com', '2147483647', 'e3afed0047b08059d0fada10f400c1e5', 'Active', '1'),
(4, 'Sagar', 'Sangale', '', '2018-12-13', 'admin@gmial.com', '2147483647', 'e3afed0047b08059d0fada10f400c1e5', 'Active', '1'),
(5, 'Sagar', 'Sangale', '', '2018-12-12', 'admin@gmial.com', '2147483647', 'e3afed0047b08059d0fada10f400c1e5', 'Active', '1'),
(6, 'Sagar', 'Sangale', '', '2018-12-13', 'admin@gmial.com', '2147483647', 'e3afed0047b08059d0fada10f400c1e5', 'Active', '1'),
(7, 'Sagar', 'Sangale', '', '2018-12-13', 'admin@gmial.com', '9595078808', 'e3afed0047b08059d0fada10f400c1e5', 'Active', '1'),
(8, 'Sagar', 'Sangale', '', '2018-12-13', 'admin@gmial.com', '9595078808', 'e3afed0047b08059d0fada10f400c1e5', 'Active', '1');

-- --------------------------------------------------------

--
-- Table structure for table `textdata`
--

CREATE TABLE IF NOT EXISTS `textdata` (
`text_file_pk` int(6) NOT NULL,
  `text_file_data` text NOT NULL,
  `file_location` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `textdata`
--

INSERT INTO `textdata` (`text_file_pk`, `text_file_data`, `file_location`) VALUES
(1, '20181125-20:38:16.143 000014A8 - ERROR: ERROR: 2 RLEvent::TryToOpen()<br />20181125-20:38:18.538 000014A8 - ERROR: ERROR: 2 RLEvent::TryToOpen()<br /><br />', 'uploads/2693956.log');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeedetail`
--
ALTER TABLE `employeedetail`
 ADD PRIMARY KEY (`employee_pk`);

--
-- Indexes for table `textdata`
--
ALTER TABLE `textdata`
 ADD PRIMARY KEY (`text_file_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeedetail`
--
ALTER TABLE `employeedetail`
MODIFY `employee_pk` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `textdata`
--
ALTER TABLE `textdata`
MODIFY `text_file_pk` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
