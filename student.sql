-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 11:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CID` int(10) NOT NULL,
  `CNAME` varchar(30) NOT NULL,
  `FEE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `CNAME`, `FEE`) VALUES
(101, 'PYTHON FULL STACK', 15000),
(102, 'JAVA FULL STACK', 10000),
(103, 'C++,C FULL STACK', 20000),
(104, 'FULL STACK DEVELOPMENT', 25000),
(105, 'NETWORKING', 30000),
(106, 'GAME DEVELOPMENT', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `SID` int(10) NOT NULL,
  `CID` int(10) NOT NULL,
  `FEE` int(10) NOT NULL,
  `DOP` date NOT NULL,
  `FS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`SID`, `CID`, `FEE`, `DOP`, `FS`) VALUES
(1, 103, 20000, '2022-09-13', 'Paid'),
(2, 102, 10000, '2022-09-12', 'Paid'),
(3, 105, 30000, '2022-09-10', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `SID` int(10) NOT NULL,
  `CID` int(10) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `DOJ` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`SID`, `CID`, `FNAME`, `LNAME`, `DOB`, `DOJ`) VALUES
(1, 103, 'SHYAM', 'VISHAAL', '2004-11-18', '2022-09-13'),
(2, 102, 'SHYAM', '', '2004-11-19', '2022-09-14'),
(3, 105, 'VISHAAL', '', '2004-11-20', '2022-09-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD KEY `c` (`CID`),
  ADD KEY `s` (`SID`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `cid` (`CID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `SID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `c` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`),
  ADD CONSTRAINT `s` FOREIGN KEY (`SID`) REFERENCES `info` (`SID`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `cid` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
