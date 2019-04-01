-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2019 at 12:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_tools`
--

CREATE TABLE `borrowed_tools` (
  `transaction_id` int(11) NOT NULL,
  `tools` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_tools`
--

INSERT INTO `borrowed_tools` (`transaction_id`, `tools`, `quantity`) VALUES
(29, 6, 2),
(29, 8, 3),
(30, 8, 1),
(31, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrower_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`borrower_id`, `first_name`, `last_name`, `department`, `section`, `position`, `member_id`, `contactnumber`, `email_address`, `Address`) VALUES
(10, 'Jon', 'Snow', 8, 3, 2, 12, '0929231244', 'jonsnow@gmail.com', 'Winterfell'),
(11, 'Arya', 'Stark', 8, 3, 3, 12, '0908230', 'aryae@gmail.com', 'daakd');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `departmentcode` varchar(50) NOT NULL,
  `departmentname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `departmentcode`, `departmentname`) VALUES
(8, 'BSIT', 'Bachelor of Science in Information Technology'),
(9, 'BSED', 'Bachelor of Secondary Education'),
(10, 'BSBA', 'Bachelor of Science in Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `Email`, `username`, `password`) VALUES
(5, 'paul', 'paul@gmail.com', 'paul', '*8FE0E9C2C716ADE93D41A0C0C0E1550E142544AF'),
(8, 'Agot', 'agot@gmail.com', 'agot', '*01A6717B58FF5C7EAFFF6CB7C96F7428EA65FE4C'),
(11, 'admin', 'admin@gmail.com', 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441'),
(12, 'admin', 'admin@gmail.com', 'admin', '*BCDB46F9759BC3C7C2679D4E81145B53EE616059');

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `penalty_id` int(11) NOT NULL,
  `penaltycode` varchar(50) NOT NULL,
  `penaltyname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penalty`
--

INSERT INTO `penalty` (`penalty_id`, `penaltycode`, `penaltyname`) VALUES
(2, 'COM-121', 'Community Service'),
(3, 'REP-101', 'Replacement');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `positionname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `positionname`) VALUES
(2, 'Instructor'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `prepayment`
--

CREATE TABLE `prepayment` (
  `prepayment_id` int(11) NOT NULL,
  `borrower` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  `tools` int(11) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prepayment`
--

INSERT INTO `prepayment` (`prepayment_id`, `borrower`, `penalty`, `tools`, `quantity`, `date`) VALUES
(8, 10, 2, 8, '1', '2019-04-01 08:24:34'),
(9, 11, 2, 8, '2', '2019-04-01 05:23:17'),
(10, 11, 2, 6, '7', '2019-04-01 07:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `sectionname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `sectionname`) VALUES
(3, '1A'),
(4, '1B'),
(5, '2A');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `tool_id` int(11) NOT NULL,
  `tool_name` varchar(50) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tool_id`, `tool_name`, `price`, `quantity`) VALUES
(6, 'Crimper', '122.00', 12),
(8, 'Hammer', '54.00', 49);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `borrower` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_returned` varchar(30) NOT NULL DEFAULT 'Not returned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `borrower`, `date_borrowed`, `date_returned`) VALUES
(29, 10, '2019-04-01 16:19:53', '2019-04-30'),
(30, 11, '2019-04-01 16:30:43', '2019-04-20'),
(31, 11, '2019-04-01 16:26:49', 'Not returned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowed_tools`
--
ALTER TABLE `borrowed_tools`
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `tools` (`tools`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrower_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `section_id` (`section`),
  ADD KEY `department_id` (`department`),
  ADD KEY `position` (`position`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`penalty_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `prepayment`
--
ALTER TABLE `prepayment`
  ADD PRIMARY KEY (`prepayment_id`),
  ADD KEY `penalty` (`penalty`),
  ADD KEY `borrower` (`borrower`),
  ADD KEY `tools` (`tools`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `borrower` (`borrower`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrower_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `penalty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prepayment`
--
ALTER TABLE `prepayment`
  MODIFY `prepayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_tools`
--
ALTER TABLE `borrowed_tools`
  ADD CONSTRAINT `borrowed_tools_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`),
  ADD CONSTRAINT `borrowed_tools_ibfk_2` FOREIGN KEY (`tools`) REFERENCES `tools` (`tool_id`);

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `borrower_ibfk_2` FOREIGN KEY (`section`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `borrower_ibfk_4` FOREIGN KEY (`department`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `borrower_ibfk_5` FOREIGN KEY (`position`) REFERENCES `position` (`position_id`);

--
-- Constraints for table `prepayment`
--
ALTER TABLE `prepayment`
  ADD CONSTRAINT `prepayment_ibfk_1` FOREIGN KEY (`penalty`) REFERENCES `penalty` (`penalty_id`),
  ADD CONSTRAINT `prepayment_ibfk_2` FOREIGN KEY (`borrower`) REFERENCES `borrower` (`borrower_id`),
  ADD CONSTRAINT `prepayment_ibfk_3` FOREIGN KEY (`tools`) REFERENCES `tools` (`tool_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`borrower`) REFERENCES `borrower` (`borrower_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
