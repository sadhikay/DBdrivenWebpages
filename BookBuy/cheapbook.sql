-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 05:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheapbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ssn` varchar(32) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ssn`, `name`, `address`, `phone`) VALUES
('111208693', 'Dr.Khalili', 'Bloomington,Illinios-96304', '6823089631'),
('243012549', 'Elizabeth Diaz', '312 UTA BLVD, Arlington, Texas-76010', '6823078191'),
('253046789', 'Aaron M. Tenenbaum', 'Arlington, Texas', '8328665908'),
('401010207', 'David C Kung', ' Irving, Texas-76089', '8328671619');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(32) NOT NULL,
  `title` varchar(32) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `price` varchar(32) DEFAULT NULL,
  `publisher` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `year`, `price`, `publisher`) VALUES
('9250367890458', 'Introduction to Management', '2015', '50', 'earlybird.co'),
('978-0131997462', 'Data Structures Using C', ' 1989', '30', 'dorrance publishers'),
('978-0262033848', 'Web Data Management', 'July 31, 2009', '93', 'mit press'),
('9780073376257', 'Object-Oriented Software Enginee', ' 2013', '177', 'eagle writers');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `ISBN` varchar(32) NOT NULL,
  `basketID` int(32) NOT NULL,
  `number` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`ISBN`, `basketID`, `number`) VALUES
('9250367890458', 174, '1'),
('9250367890458', 178, '1'),
('9250367890458', 179, '1'),
('978-0131997462', 175, '2'),
('978-0131997462', 176, '1'),
('978-0131997462', 177, '2'),
('978-0131997462', 180, '1'),
('978-0262033848', 175, '4'),
('978-0262033848', 176, '1'),
('978-0262033848', 180, '1'),
('978-0262033848', 181, '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `username` varchar(10) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`username`, `password`, `address`, `phone`, `email`) VALUES
('keerthi', '579096fea2b56d2a9897ea15e3971a08', '1000 greek row, arbor oaks 305', '6823078191', 'keerthi.jammi@mavs.uta.edu'),
('saddy', 'e47c1ab1f594f5287fa2db7dd6c33d01', '1002 greek row drive, Apt 118', '9724088698', 'yerramsetti.sandeep15@mgail.com'),
('sadhika', '49f0bad299687c62334182178bfd75d8', '1000 greek row, arbor oaks 305', '6823078191', 'sadhika.yezzu@mavs.uta.edu'),
('sandeep', '7815696ecbf1c96e6894b779456d330e', '5682,apt,texas', '6828956361', 'sadhika2493@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `shippingorder`
--

CREATE TABLE `shippingorder` (
  `ISBN` varchar(32) NOT NULL,
  `warehouseCode` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `number` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingorder`
--

INSERT INTO `shippingorder` (`ISBN`, `warehouseCode`, `username`, `number`) VALUES
('9250367890458', '8623', 'saddy', '2'),
('9250367890458', '8623', 'sadhika', '1'),
('978-0131997462', '4521', 'keerthi', '1'),
('978-0131997462', '4521', 'saddy', '5'),
('978-0262033848', '5663', 'keerthi', '1'),
('978-0262033848', '5663', 'saddy', '6');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingbasket`
--

CREATE TABLE `shoppingbasket` (
  `basketId` int(13) NOT NULL,
  `username` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingbasket`
--

INSERT INTO `shoppingbasket` (`basketId`, `username`) VALUES
(180, 'keerthi'),
(175, 'saddy'),
(176, 'saddy'),
(177, 'saddy'),
(178, 'saddy'),
(179, 'saddy'),
(181, 'saddy'),
(174, 'sadhika');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `ISBN` varchar(32) NOT NULL,
  `warehouseCode` varchar(32) NOT NULL,
  `number` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`ISBN`, `warehouseCode`, `number`) VALUES
('9250367890458', '8623', '2'),
('978-0131997462', '4521', '8'),
('978-0262033848', '5663', '6'),
('9780073376257', '6862', '4');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouseCode` varchar(32) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouseCode`, `name`, `address`, `phone`) VALUES
('4521', 'Full-Load', 'Arlington, Texas', '6507728188'),
('5663', 'My Warehouse', 'Austin,Texas-76010', '76027718888'),
('6862', 'All-Books', ' Irving, Texas-76089', '97081887747'),
('8623', 'Happy to Help', 'Seattle,Washington-86342', '6822176389');

-- --------------------------------------------------------

--
-- Table structure for table `writtenby`
--

CREATE TABLE `writtenby` (
  `ssn` varchar(32) NOT NULL,
  `ISBN` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writtenby`
--

INSERT INTO `writtenby` (`ssn`, `ISBN`) VALUES
('111208693', '9250367890458'),
('243012549', '978-0262033848'),
('253046789', '978-0131997462'),
('401010207', '9780073376257');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`ISBN`,`basketID`),
  ADD KEY `basketID` (`basketID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `shippingorder`
--
ALTER TABLE `shippingorder`
  ADD PRIMARY KEY (`ISBN`,`warehouseCode`,`username`),
  ADD KEY `warehouseCode` (`warehouseCode`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  ADD PRIMARY KEY (`basketId`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`ISBN`,`warehouseCode`),
  ADD KEY `warehouseCode` (`warehouseCode`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouseCode`);

--
-- Indexes for table `writtenby`
--
ALTER TABLE `writtenby`
  ADD PRIMARY KEY (`ssn`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  MODIFY `basketId` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`basketID`) REFERENCES `shoppingbasket` (`basketId`);

--
-- Constraints for table `shippingorder`
--
ALTER TABLE `shippingorder`
  ADD CONSTRAINT `shippingorder_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `shippingorder_ibfk_2` FOREIGN KEY (`warehouseCode`) REFERENCES `warehouse` (`warehouseCode`),
  ADD CONSTRAINT `shippingorder_ibfk_3` FOREIGN KEY (`username`) REFERENCES `customers` (`username`);

--
-- Constraints for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  ADD CONSTRAINT `shoppingbasket_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customers` (`username`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`warehouseCode`) REFERENCES `warehouse` (`warehouseCode`);

--
-- Constraints for table `writtenby`
--
ALTER TABLE `writtenby`
  ADD CONSTRAINT `writtenby_ibfk_1` FOREIGN KEY (`ssn`) REFERENCES `author` (`ssn`),
  ADD CONSTRAINT `writtenby_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
