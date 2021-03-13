-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql5044.site4now.net
-- Generation Time: Mar 08, 2021 at 02:21 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a6e676_mahmoud`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departid` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departid`, `name`) VALUES
(1, 'ماليات'),
(2, 'ادارة'),
(3, 'شئون');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `jobType` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `departid` int NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeid`, `name`, `jobType`, `address`, `departid`, `phone`) VALUES
(9, 'عبدالسميع', 'عامل', 'اطفيح', 2, '2222222222'),
(14, 'سمير', 'مراقب', 'الجيزة', 2, '01234567'),
(15, 'محمود', 'موارد', 'الفيوم', 2, '01234567'),
(16, 'محمود سمير', 'موارد', 'البرمبل', 2, '01280468644'),
(18, 'ابراهيم', 'صاحب', 'البرمبل', 1, '01234567');

-- --------------------------------------------------------

--
-- Table structure for table `leave_permession`
--

CREATE TABLE `leave_permession` (
  `leaveid` int NOT NULL,
  `Type` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `employeid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leave_permession`
--

INSERT INTO `leave_permession` (`leaveid`, `Type`, `startdate`, `enddate`, `employeid`) VALUES
(3, 'إذن أجازة', '2021-02-21', '2021-03-02', 15),
(12, 'إذن أجازة', '2021-03-20', '2021-03-25', 18),
(13, 'إذن خروج', '2021-03-09', '2021-03-24', 16),
(14, 'إذن خروج', '2021-03-09', '2021-03-24', 16);

-- --------------------------------------------------------

--
-- Table structure for table `medecinepermetion`
--

CREATE TABLE `medecinepermetion` (
  `medperm` int NOT NULL,
  `medid` int NOT NULL,
  `empid` int NOT NULL,
  `quantity` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medecinepermetion`
--

INSERT INTO `medecinepermetion` (`medperm`, `medid`, `empid`, `quantity`, `type`, `Date`) VALUES
(1, 4, 18, 5, 'إذن مجانى', '2021-03-17'),
(3, 2, 9, 6, 'إذن مجانى', '2021-03-18'),
(4, 2, 9, 12, 'إذن مجانى', '2021-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medecineid` int NOT NULL,
  `medname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medecineid`, `medname`) VALUES
(2, 'seforan'),
(4, 'pre');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supplyid` int NOT NULL,
  `supplyname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supplyid`, `supplyname`) VALUES
(3, 'analysis');

-- --------------------------------------------------------

--
-- Table structure for table `supplypermetion`
--

CREATE TABLE `supplypermetion` (
  `suppermid` int NOT NULL,
  `suppid` int NOT NULL,
  `empid` int NOT NULL,
  `quant` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplypermetion`
--

INSERT INTO `supplypermetion` (`suppermid`, `suppid`, `empid`, `quant`, `type`, `Date`) VALUES
(1, 3, 14, 5, 'إذن مجانى', '2021-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int NOT NULL,
  `userName` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `Email`, `password`, `type`) VALUES
(1, 'khaled', 'mem@mhm.com', '506070', '1'),
(29, 'محمود', 'mahww@yahoo.com', 'memrWQE@343', '2'),
(30, 'محمود', 'mahl@yahoo.com', 'MEMas123@', '2'),
(33, 'android developing', 'mahwwww@yahoo.com', 'memrWQE@343', '2'),
(34, 'محمود', 'mahmoudsam45@gmail.com', '123456', '2'),
(35, 'Ahmed', 'mahmoudsam40@yahoo.com', '506070', '2'),
(37, 'محمود', 'mahmou555@yahoo.com', '12345678', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeid`),
  ADD KEY `departid` (`departid`);

--
-- Indexes for table `leave_permession`
--
ALTER TABLE `leave_permession`
  ADD PRIMARY KEY (`leaveid`),
  ADD KEY `leaveempidFk` (`employeid`);

--
-- Indexes for table `medecinepermetion`
--
ALTER TABLE `medecinepermetion`
  ADD PRIMARY KEY (`medperm`) USING BTREE,
  ADD KEY `empfk` (`empid`),
  ADD KEY `medicinFk` (`medid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medecineid`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`supplyid`);

--
-- Indexes for table `supplypermetion`
--
ALTER TABLE `supplypermetion`
  ADD PRIMARY KEY (`suppermid`) USING BTREE,
  ADD KEY `supplyFK` (`suppid`),
  ADD KEY `emplFK` (`empid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leave_permession`
--
ALTER TABLE `leave_permession`
  MODIFY `leaveid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medecinepermetion`
--
ALTER TABLE `medecinepermetion`
  MODIFY `medperm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medecineid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supplyid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplypermetion`
--
ALTER TABLE `supplypermetion`
  MODIFY `suppermid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_permession`
--
ALTER TABLE `leave_permession`
  ADD CONSTRAINT `leaveempidFk` FOREIGN KEY (`employeid`) REFERENCES `employee` (`employeid`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `medecinepermetion`
--
ALTER TABLE `medecinepermetion`
  ADD CONSTRAINT `empfk` FOREIGN KEY (`empid`) REFERENCES `employee` (`employeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicinFk` FOREIGN KEY (`medid`) REFERENCES `medicine` (`medecineid`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `supplypermetion`
--
ALTER TABLE `supplypermetion`
  ADD CONSTRAINT `emplFK` FOREIGN KEY (`empid`) REFERENCES `employee` (`employeid`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `supplyFK` FOREIGN KEY (`suppid`) REFERENCES `supplies` (`supplyid`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
