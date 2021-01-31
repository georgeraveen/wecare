-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2021 at 07:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wecare`
--
CREATE DATABASE IF NOT EXISTS `wecare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wecare`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_module`
--

DROP TABLE IF EXISTS `auth_module`;
CREATE TABLE IF NOT EXISTS `auth_module` (
  `moduleID` int(4) NOT NULL AUTO_INCREMENT,
  `moduleName` varchar(10) NOT NULL,
  `moduleGroupNo` int(4) NOT NULL,
  `webpage` varchar(30) NOT NULL,
  PRIMARY KEY (`moduleID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_module`
--

INSERT INTO `auth_module` (`moduleID`, `moduleName`, `moduleGroupNo`, `webpage`) VALUES
(1, 'home', 1, 'home.php');

-- --------------------------------------------------------

--
-- Table structure for table `claim_case`
--

DROP TABLE IF EXISTS `claim_case`;
CREATE TABLE IF NOT EXISTS `claim_case` (
  `claimID` int(7) NOT NULL AUTO_INCREMENT,
  `admitDate` date DEFAULT NULL,
  `dischargeDate` date DEFAULT NULL,
  `icuFromDate` date DEFAULT NULL,
  `icuToDate` date DEFAULT NULL,
  `payableAmount` double DEFAULT NULL,
  `healthCondition` text,
  `doctorComment` text,
  `custFeedback` text,
  `documentDIR` text,
  `custID` int(4) DEFAULT NULL,
  `doctorID` int(4) DEFAULT NULL,
  `medScruID` int(4) DEFAULT NULL,
  `dataEntryOfficerID` int(4) DEFAULT NULL,
  `FieldAgID` int(4) DEFAULT NULL,
  `hospitalID` int(3) DEFAULT NULL,
  `policyID` int(4) DEFAULT NULL,
  `caseStatus` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`claimID`),
  KEY `doctorID` (`doctorID`),
  KEY `FieldAgID` (`FieldAgID`),
  KEY `dataEntryOfficerID` (`dataEntryOfficerID`),
  KEY `medScruID` (`medScruID`),
  KEY `custID` (`custID`),
  KEY `policyID` (`policyID`),
  KEY `hospitalID` (`hospitalID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim_case`
--

INSERT INTO `claim_case` (`claimID`, `admitDate`, `dischargeDate`, `icuFromDate`, `icuToDate`, `payableAmount`, `healthCondition`, `doctorComment`, `custFeedback`, `documentDIR`, `custID`, `doctorID`, `medScruID`, `dataEntryOfficerID`, `FieldAgID`, `hospitalID`, `policyID`, `caseStatus`) VALUES
(1, '2020-07-01', '2020-08-07', '2020-08-08', '2020-08-08', 20000, 'Dengue Fever', 'Normal', NULL, NULL, 7, 5, 2, 1, 4, 1, 1, 'Doctor confirmed'),
(2, '2020-10-09', '2020-10-08', '2020-10-12', '2020-10-12', 34000, 'Fracture in leg', NULL, NULL, NULL, 1, NULL, 3, 1, 4, 1, 1, 'Rejected'),
(6, '2020-09-10', '2020-09-19', '2020-09-14', '2020-09-16', 10000, 'accxzcz', NULL, NULL, NULL, 1, 5, 3, 1, 7, 1, 1, 'Processing'),
(10, '2020-09-12', '2020-09-27', '2020-09-27', '2020-09-27', 15000, 'ascdbbbbbbbbbbbbbb', NULL, NULL, NULL, 1, NULL, 2, 1, 4, 1, 1, 'Processing'),
(12, '2020-10-14', '2020-10-14', '2020-10-14', '2020-10-14', 4000, 'sdfbbbbbbbbbbbbbbbnnnnnnnnnnnnnnnnnnnn', NULL, NULL, NULL, 1, NULL, 2, 1, 7, 1, 1, 'Processing'),
(13, '2020-10-14', '2020-10-14', '2020-10-14', '2020-10-14', 50000, 'sfgr', NULL, NULL, NULL, 1, NULL, 3, 1, 4, 1, 1, 'Processed'),
(15, '2020-11-14', '2020-11-19', '2020-11-12', '2020-11-12', 32000, 'dsdcsdc', NULL, NULL, NULL, 8, NULL, 3, 1, 7, 1, 1, 'Initial'),
(18, '2020-11-13', '2020-11-14', NULL, NULL, 12000, NULL, NULL, NULL, NULL, 14, NULL, 2, 1, 7, 1, 1, 'Initial'),
(19, '2020-11-13', '2020-11-12', '2020-11-28', '2020-11-28', 11000, NULL, NULL, NULL, NULL, 14, NULL, 2, 1, 4, 1, 1, 'Initial'),
(23, '2020-11-12', '2020-11-06', '2020-11-21', '2020-11-21', NULL, 'ghg', NULL, NULL, NULL, 1, NULL, 3, 1, 7, 1, 1, 'Initial'),
(24, '2020-12-18', '2020-12-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 2, 1, 4, 1, 1, 'Initial');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `custID` int(6) NOT NULL AUTO_INCREMENT,
  `custName` varchar(40) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `hashPass` varchar(255) NOT NULL,
  `custAddress` text NOT NULL,
  `custNIC` varchar(11) NOT NULL,
  `custDOB` date NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `policyID` int(3) NOT NULL,
  PRIMARY KEY (`custID`),
  KEY `policyID` (`policyID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `password`, `hashPass`, `custAddress`, `custNIC`, `custDOB`, `email`, `gender`, `policyID`) VALUES
(1, 'Sunil', 'asdf', '$2y$11$39NlAEz4tbGMuzJOkuvdKeg0R4yeOnLf6Qb2sscczQsMm/AyIsAvK', 'Negombo', '123123999V', '2020-08-04', 'sdc@d.com', 'm', 1),
(7, 'Anil', 'zOa', '$2y$11$UXVr3HDDMBgzO4IGEepeXusYnl0/JNQLlFEk8T6mtRgbF08Dma3aW', 'Colombo', '123123993V', '2020-09-27', 'as@m.c', 'm', 1),
(8, 'Janani', 'auh', '$2y$11$42zyFxjTR7E3BDgDeh80M.TKZoR6QpA5DXhqVTgFVxcYY4futZQQ2', 'Galle', '123143999V', '2020-10-14', 'as@s.co', 'f', 1),
(9, 'Amara', NULL, '$2y$11$OG94VSbypFZDjz3vHnpXtOr9WLIvJAZmoUjx9s11OV6EIKz3sq1tS', 'Kandy', '123125999V', '2020-10-18', 's@s.com', 'm', 1),
(10, 'Nimal', 'jYW', '$2y$11$DBD6y7./d4B9Nlay/M.toOf9Q.Z2d/sy.BwMLGIvY7RTFkNnkCmYe', 'Colombo', '123123949V', '2020-10-18', 'z@z.z', 'm', 1),
(11, 'Kasun', '4z6', '$2y$11$F/8XJP.si.s5Qpf5n4gFEeZfAghS9N75cVTu2Vwnxycu3P2mcPAtG', 'Jaffna', '123123919V', '2020-10-18', 'z@z.z', 'm', 1),
(12, 'Raveen', 'SB5', '$2y$11$9RGX8oqMj0GL00.IPBXOVuLva1GuuWiDYkXhvLS4ZNdJTXcIOrFau', 'New street', '123122999V', '2020-11-11', 'georgeraveen@gmail.co', 'm', 1),
(14, 'Nimaya', '5Tx', '$2y$11$G.Tvi/hfjILjIhQEpCijl.dCFBBKCISHn/pXlxCsi.z0tL5dIeT5i', 'Matara', '123121999V', '2014-03-05', 'janani96wasana@gmail.com', 'f', 1),
(15, 'Colombage George Raveen Fernando', '0RD', '$2y$11$59WkSdoNF11Y1KPkJSoO7OLhBxja8BqpM8ICCOc.xfj.BKv5t7vWC', '162/3, sea-street', '788786', '2020-11-06', 'georgeraveen@gmail.com', 'm', 1),
(16, 'Raveen George', 'Way', '$2y$11$bMQGxIOP66yvVdScD4ivVuWmysg6/9nT.xuMytRM.y1TVtfHXjScW', 'dhhfgf', '444444', '2020-11-05', 'georgeraveen@hotmail.com', 'm', 1),
(17, 'Raveen George', 'srK', '$2y$11$rW/wAwGE09vc4DNGFP/WQ.ax3MrJR8I9h7n5yh/ZrgHwtkmdq4Qte', 'xxxxxxxxxx', '33332221', '2020-11-11', 'georgeraveen@hotmail.com', 'm', 1),
(18, 'aaaaaaaaaaaaaaa', '5h2', '$2y$11$nKRb6ysoglnQfitQdvsJyObKsMhQLh/3ajndMiafmMGnx7YyrR.iS', '162/3, St.Sebastian Lane,Sea-street\r\n162/3, Sea-street', '123333311', '2020-11-11', 'asdd@gmail.com', 'o', 2),
(19, 'bbbbbbbbbb', '57X', '$2y$11$1RcjBoZ0wIwlg3Q8bzp6E.Rfm18i86sZuFyvsu.xXDCcrnHQndBJq', '162/3, St.Sebastian Lane,Sea-street\r\n162/3, Sea-street', '123333311', '2020-11-11', 'asdd@gmail.com', 'o', 2),
(20, 'ccccccccccc', 'u5C', '$2y$11$BrhLrvO0sSJr3qjoK5uM9elFQn0QNBXLm/3LQkkyAu9IrawnO6ab2', '162/3, St.Sebastian Lane,Sea-street\r\n162/3, Sea-street', '12333369', '2020-11-05', 'asdqd@gmail.com', 'o', 2),
(21, 'ccccccccccx', '8QH', '$2y$11$lBvjMEyLxeFrSKi5by.dJ.qbswRVkrtRjULzwpD5k8laqbUnJDP7W', '162/3, St.Sebastian Lane,Sea-street', '12333363', '2020-11-19', 'asdqd@gmail.com', 'f', 2),
(22, 'Sahan Dissanayake', '2rE', '$2y$11$F.dSXjynlQ9jD9DgdXHG5OC0nUhbRQgysRTUp.jB6CUL6yktMuJ3O', '162/3, St.Sebastian Lane,Sea-street\r\n162/3, Sea-street', '222442222', '2021-01-05', 'georgeraveen@hotmail.com', 'm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

DROP TABLE IF EXISTS `customer_contact`;
CREATE TABLE IF NOT EXISTS `customer_contact` (
  `custID` int(6) NOT NULL,
  `custContactNo` int(10) NOT NULL,
  PRIMARY KEY (`custID`,`custContactNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_contact`
--

INSERT INTO `customer_contact` (`custID`, `custContactNo`) VALUES
(7, 123),
(7, 345),
(8, 111111),
(9, 2222222),
(9, 3333333),
(14, 2222885),
(14, 11119992),
(16, 4566),
(16, 444499),
(17, 2223311),
(18, 94771414),
(18, 99622222),
(19, 992222),
(19, 9471414),
(20, 947141),
(20, 4992222),
(21, 0),
(21, 947167),
(21, 4992224),
(22, 9622222),
(22, 47714149);

-- --------------------------------------------------------

--
-- Table structure for table `cust_insurance`
--

DROP TABLE IF EXISTS `cust_insurance`;
CREATE TABLE IF NOT EXISTS `cust_insurance` (
  `custID` int(6) NOT NULL,
  `startDate` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `paymentDate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`custID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_insurance`
--

INSERT INTO `cust_insurance` (`custID`, `startDate`, `type`, `paymentDate`, `status`) VALUES
(21, '2020-11-23', 'VIP', '2020-11-16', 'Active'),
(22, '2021-01-04', 'VIP', '2021-01-04', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `data_entry`
--

DROP TABLE IF EXISTS `data_entry`;
CREATE TABLE IF NOT EXISTS `data_entry` (
  `empID` int(3) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `empID` int(3) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `empID` int(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) DEFAULT NULL,
  `hashPass` varchar(255) NOT NULL,
  `empFirstName` varchar(20) NOT NULL,
  `empLastName` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `empDOB` date NOT NULL,
  `empNIC` varchar(12) NOT NULL,
  `empAddress` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `empTypeID` varchar(3) NOT NULL,
  PRIMARY KEY (`empID`),
  KEY `empTypeID` (`empTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `password`, `hashPass`, `empFirstName`, `empLastName`, `gender`, `empDOB`, `empNIC`, `empAddress`, `email`, `empTypeID`) VALUES
(1, 'asdf', '$2y$11$d/O5dcEZAqRJDOvPFbcfsO8kPdYPVIZmk28yjwHh/VGqMz6EggPBW', 'Saman', 'Perera', 'm', '2020-07-01', '1231231231', 'Flower road', 'sdc@d.com', 'DEO'),
(2, 'asd', '$2y$11$5lngklDjotWxydvMeD44E.uGqE.O8jK0cOaaP7da1Cmnm/YmqZ/bu', 'Nimal', 'Fernando', 'f', '2020-07-01', '1231231456', 'New Lane', 'asd@m.com', 'MED'),
(3, 'asdf', '$2y$11$d/O5dcEZAqRJDOvPFbcfsO8kPdYPVIZmk28yjwHh/VGqMz6EggPBW', 'Kasun', 'Silva', 'm', '2020-08-02', '1231231234', 'New Street', 'as@a.c', 'MED'),
(4, 'asdf', '$2y$11$d/O5dcEZAqRJDOvPFbcfsO8kPdYPVIZmk28yjwHh/VGqMz6EggPBW', 'Kamani', 'Fernando', 'f', '2020-08-04', '1231231237', 'Kandy', 'aw@a.com', 'FAG'),
(5, 'asd', '$2y$11$5lngklDjotWxydvMeD44E.uGqE.O8jK0cOaaP7da1Cmnm/YmqZ/bu', 'Wimal', 'Jayakody', 'm', '2020-08-04', '1231231231', 'Colombo', 'asaf@d.c', 'DOC'),
(6, 'asd', '$2y$11$5lngklDjotWxydvMeD44E.uGqE.O8jK0cOaaP7da1Cmnm/YmqZ/bu', 'Sisil', 'Perera', 'm', '2020-08-04', '1231231456', 'Street', 'sdc@d.com', 'MGR'),
(7, 'QIX', '$2y$11$uGa4lyJAPgB6/0ffhHyNq.ZrSzuVidgMFlLA3zkEVCSCpl6X9fZty', 'Amali', 'Silva', 'f', '2020-10-20', '3435783456', 'Temple road', 'q@a.a', 'FAG'),
(8, 'lwh', '$2y$11$oTUGSnTaUZRdq8Gwxxo/7.c9zKN6h1Q2qBjvYgkCPjNHGVRXgfQsy', 'Ashan', 'Perera', 'm', '2020-11-12', '4574324564', '162/3, ', 'aa@gmail.com', 'DOC'),
(10, 'vAN', '$2y$11$gPhUc8EObBPz2EqZ0R9C2.gul52s2Z2DUCWIz.3cS7muW/umhlx52', 'Colombage', 'Fernando', 'm', '2020-11-12', '3333444322', 'sea-street', 'bb@gmail.com', 'DEO');

-- --------------------------------------------------------

--
-- Table structure for table `employee_auth`
--

DROP TABLE IF EXISTS `employee_auth`;
CREATE TABLE IF NOT EXISTS `employee_auth` (
  `empTypeID` varchar(3) NOT NULL,
  `moduleID` int(4) NOT NULL,
  `creat` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `delet` tinyint(1) NOT NULL,
  `view` tinyint(1) NOT NULL,
  PRIMARY KEY (`empTypeID`,`moduleID`),
  KEY `moduleID` (`moduleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_auth`
--

INSERT INTO `employee_auth` (`empTypeID`, `moduleID`, `creat`, `edit`, `delet`, `view`) VALUES
('DEO', 1, 0, 1, 0, 0),
('MGR', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

DROP TABLE IF EXISTS `employee_contact`;
CREATE TABLE IF NOT EXISTS `employee_contact` (
  `empID` int(4) NOT NULL,
  `empContactNo` int(10) NOT NULL,
  PRIMARY KEY (`empContactNo`),
  KEY `empID` (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`empID`, `empContactNo`) VALUES
(1, 0),
(2, 444),
(7, 323),
(7, 343122),
(7, 11211111),
(8, 22222),
(8, 771414996),
(10, 33323121),
(10, 571414996);

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

DROP TABLE IF EXISTS `employee_types`;
CREATE TABLE IF NOT EXISTS `employee_types` (
  `empTypeID` varchar(3) NOT NULL,
  `typeName` varchar(10) NOT NULL,
  PRIMARY KEY (`empTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_types`
--

INSERT INTO `employee_types` (`empTypeID`, `typeName`) VALUES
('DEO', 'dataEntry'),
('DOC', 'doctor'),
('FAG', 'fieldAgent'),
('MED', 'medScrut'),
('MGR', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `field_agt`
--

DROP TABLE IF EXISTS `field_agt`;
CREATE TABLE IF NOT EXISTS `field_agt` (
  `empID` int(3) NOT NULL,
  `area` varchar(20) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `hospitalID` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`hospitalID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalID`, `name`, `address`) VALUES
(1, 'Lanka Hospital', 'colombo');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_contact`
--

DROP TABLE IF EXISTS `hospital_contact`;
CREATE TABLE IF NOT EXISTS `hospital_contact` (
  `hospitalID` int(3) NOT NULL,
  `hospitalContactNo` int(10) NOT NULL,
  PRIMARY KEY (`hospitalID`,`hospitalContactNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_policy`
--

DROP TABLE IF EXISTS `insurance_policy`;
CREATE TABLE IF NOT EXISTS `insurance_policy` (
  `policyID` int(3) NOT NULL AUTO_INCREMENT,
  `documentDIR` text NOT NULL,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  `vPremium` double DEFAULT NULL,
  `rPremium` double DEFAULT NULL,
  PRIMARY KEY (`policyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_policy`
--

INSERT INTO `insurance_policy` (`policyID`, `documentDIR`, `date`, `remarks`, `vPremium`, `rPremium`) VALUES
(1, 'policy/', '2020-08-05', 'adasczc', 1000, 800),
(2, '', '2020-11-10', 'sdasdad', 1100, 900);

-- --------------------------------------------------------

--
-- Table structure for table `med_record`
--

DROP TABLE IF EXISTS `med_record`;
CREATE TABLE IF NOT EXISTS `med_record` (
  `recordID` int(6) NOT NULL AUTO_INCREMENT,
  `custID` int(6) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `healthCondition` text NOT NULL,
  `comments` text,
  PRIMARY KEY (`recordID`),
  KEY `custID` (`custID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_record`
--

INSERT INTO `med_record` (`recordID`, `custID`, `date`, `type`, `healthCondition`, `comments`) VALUES
(1, 1, '2020-11-24', 'Genetic', 'Geneticaaa', 'cc'),
(2, 21, '2020-12-04', 'Accidental', 'aaaaaabb', 'qqqqqqqqqqqqqq'),
(4, 21, '2020-12-14', 'Congenital', 'mmmmccc', 'nnccc'),
(5, 20, '2020-12-11', 'Accidental', 'qqqqqqqqq', 'qqqqqqqqqq'),
(6, 7, '2020-12-08', 'Accidental', 'aaa', 'zzzzz'),
(7, 12, '2020-12-08', 'Accidental', 'aaa', 'aa'),
(8, 9, '2020-12-08', 'Accidental', 'wwww', 'w'),
(9, 9, '2020-12-08', 'Accidental', 'a', 'a'),
(10, 8, '2020-12-08', 'Accidental', 'q', 'q'),
(11, 9, '2020-12-08', 'Accidental', 'qq', 'qq'),
(12, 10, '2020-12-04', 'Accidental', 'a', 'q'),
(13, 17, '2020-12-08', 'Accidental', 'aaaaaaaa', 'aaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `med_scrutinizer`
--

DROP TABLE IF EXISTS `med_scrutinizer`;
CREATE TABLE IF NOT EXISTS `med_scrutinizer` (
  `empID` int(3) NOT NULL,
  `expLevel` int(1) NOT NULL,
  PRIMARY KEY (`empID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `over_paid`
--

DROP TABLE IF EXISTS `over_paid`;
CREATE TABLE IF NOT EXISTS `over_paid` (
  `claimID` int(6) NOT NULL,
  `overPaidAmount` double NOT NULL,
  `remark` text NOT NULL,
  PRIMARY KEY (`claimID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

DROP TABLE IF EXISTS `roster`;
CREATE TABLE IF NOT EXISTS `roster` (
  `rosterID` int(4) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `managerID` int(4) NOT NULL,
  PRIMARY KEY (`rosterID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`rosterID`, `date`, `managerID`) VALUES
(25, '2021-01-05', 6),
(27, '2021-01-05', 6),
(28, '2021-01-30', 6);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE IF NOT EXISTS `time_slot` (
  `slotID` int(6) NOT NULL AUTO_INCREMENT,
  `rosterID` int(4) NOT NULL,
  `day` int(11) NOT NULL,
  `timeSlotNo` int(1) NOT NULL,
  PRIMARY KEY (`slotID`),
  KEY `rosterID` (`rosterID`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slotID`, `rosterID`, `day`, `timeSlotNo`) VALUES
(116, 25, 1, 1),
(117, 25, 3, 2),
(118, 25, 5, 3),
(120, 27, 1, 1),
(121, 27, 3, 2),
(122, 27, 5, 3),
(123, 28, 2, 1),
(124, 28, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot_med`
--

DROP TABLE IF EXISTS `time_slot_med`;
CREATE TABLE IF NOT EXISTS `time_slot_med` (
  `medScruID` int(4) NOT NULL,
  `slotID` int(5) NOT NULL,
  PRIMARY KEY (`medScruID`,`slotID`),
  KEY `slotID` (`slotID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot_med`
--

INSERT INTO `time_slot_med` (`medScruID`, `slotID`) VALUES
(1, 116),
(2, 116),
(2, 117),
(3, 117),
(3, 118),
(1, 120),
(2, 120),
(2, 121),
(3, 121),
(3, 122),
(1, 123),
(3, 123),
(1, 124);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claim_case`
--
ALTER TABLE `claim_case`
  ADD CONSTRAINT `claim_case_ibfk_1` FOREIGN KEY (`doctorID`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_case_ibfk_2` FOREIGN KEY (`FieldAgID`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_case_ibfk_3` FOREIGN KEY (`dataEntryOfficerID`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_case_ibfk_4` FOREIGN KEY (`medScruID`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_case_ibfk_5` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_case_ibfk_6` FOREIGN KEY (`policyID`) REFERENCES `insurance_policy` (`policyID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `claim_case_ibfk_7` FOREIGN KEY (`hospitalID`) REFERENCES `hospital` (`hospitalID`) ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`policyID`) REFERENCES `insurance_policy` (`policyID`);

--
-- Constraints for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD CONSTRAINT `customer_contact_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cust_insurance`
--
ALTER TABLE `cust_insurance`
  ADD CONSTRAINT `cust_insurance_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_entry`
--
ALTER TABLE `data_entry`
  ADD CONSTRAINT `data_entry_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`empTypeID`) REFERENCES `employee_types` (`empTypeID`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_auth`
--
ALTER TABLE `employee_auth`
  ADD CONSTRAINT `employee_auth_ibfk_1` FOREIGN KEY (`empTypeID`) REFERENCES `employee_types` (`empTypeID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_auth_ibfk_2` FOREIGN KEY (`moduleID`) REFERENCES `auth_module` (`moduleID`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD CONSTRAINT `employee_contact_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `field_agt`
--
ALTER TABLE `field_agt`
  ADD CONSTRAINT `field_agt_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_contact`
--
ALTER TABLE `hospital_contact`
  ADD CONSTRAINT `hospital_contact_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `hospital` (`hospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `med_record`
--
ALTER TABLE `med_record`
  ADD CONSTRAINT `med_record_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `med_scrutinizer`
--
ALTER TABLE `med_scrutinizer`
  ADD CONSTRAINT `med_scrutinizer_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `over_paid`
--
ALTER TABLE `over_paid`
  ADD CONSTRAINT `over_paid_ibfk_1` FOREIGN KEY (`claimID`) REFERENCES `claim_case` (`claimID`) ON UPDATE CASCADE;

--
-- Constraints for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD CONSTRAINT `time_slot_ibfk_1` FOREIGN KEY (`rosterID`) REFERENCES `roster` (`rosterID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_slot_med`
--
ALTER TABLE `time_slot_med`
  ADD CONSTRAINT `time_slot_med_ibfk_1` FOREIGN KEY (`medScruID`) REFERENCES `employee` (`empID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `time_slot_med_ibfk_2` FOREIGN KEY (`slotID`) REFERENCES `time_slot` (`slotID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
