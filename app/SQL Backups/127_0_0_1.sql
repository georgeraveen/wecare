-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2021 at 05:45 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim_case`
--

INSERT INTO `claim_case` (`claimID`, `admitDate`, `dischargeDate`, `icuFromDate`, `icuToDate`, `payableAmount`, `healthCondition`, `doctorComment`, `custFeedback`, `documentDIR`, `custID`, `doctorID`, `medScruID`, `dataEntryOfficerID`, `FieldAgID`, `hospitalID`, `policyID`, `caseStatus`) VALUES
(1, '2020-07-01', '2020-08-08', '2020-08-08', '2020-08-08', 20000, 'Dengue Fever', 'Normal', NULL, NULL, 7, 5, 2, 1, 4, 1, 1, 'Doctor confirmed'),
(2, '2020-10-09', '2020-10-08', '2020-10-12', '2020-10-12', 34000, 'Fracture in leg', NULL, NULL, NULL, 1, NULL, 3, 1, 4, 1, 1, 'Rejected'),
(6, '2020-09-10', '2020-09-19', '2020-09-14', '2020-09-16', 10000, 'DIABETES MELLITUS', NULL, NULL, NULL, 1, 5, 3, 1, 7, 1, 1, 'Processing'),
(10, '2020-09-12', '2020-09-27', '2020-09-27', '2020-09-27', 15000, 'BENIGN ESSENTIAL', NULL, NULL, NULL, 1, 5, 2, 1, 4, 1, 1, 'Doctor pending'),
(12, '2020-10-14', '2020-10-14', '2020-10-14', '2020-10-14', 4000, 'Hyperglycemic Symptoms ', NULL, NULL, NULL, 1, NULL, 2, 1, 7, 1, 1, 'Processing'),
(13, '2020-10-14', '2020-10-14', '2020-10-14', '2020-10-14', 50000, 'BENIGN ESSENTIAL', NULL, NULL, NULL, 1, NULL, 3, 1, 4, 4, 1, 'Completed'),
(15, '2020-11-14', '2020-11-19', '2020-11-12', '2020-11-12', 32000, 'HYPERTENSION', NULL, NULL, NULL, 8, NULL, 3, 1, 7, 1, 1, 'Completed'),
(18, '2020-11-13', '2020-11-14', NULL, NULL, 12000, 'Neuroglycopenic Symptoms ', NULL, NULL, NULL, 14, NULL, 2, 1, 7, 1, 1, 'Initial'),
(19, '2020-11-13', '2020-11-12', '2020-11-28', '2020-11-28', 11000, 'DIABETES MELLITUS', NULL, NULL, NULL, 14, NULL, 2, 1, 4, 1, 1, 'Initial'),
(23, '2020-11-12', '2020-11-06', '2020-11-21', '2020-11-21', NULL, 'Hyperglycemic Symptoms', NULL, NULL, NULL, 1, NULL, 3, 1, 7, 1, 1, 'Initial'),
(24, '2020-12-18', '2020-12-30', NULL, NULL, NULL, 'DEPRESSION', NULL, NULL, NULL, 1, NULL, 2, 1, 4, 1, 1, 'Initial'),
(25, '2021-03-22', '2021-03-23', NULL, NULL, NULL, 'Fever', NULL, NULL, NULL, 20, NULL, 2, 1, 4, 1, 2, 'Initial'),
(26, '2021-03-22', '2021-03-23', NULL, NULL, NULL, 'Hypertension', NULL, NULL, NULL, 14, NULL, 2, 1, 4, 1, 1, 'Initial');

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
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`custID`),
  KEY `policyID` (`policyID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `password`, `hashPass`, `custAddress`, `custNIC`, `custDOB`, `email`, `gender`, `policyID`, `status`) VALUES
(1, 'Cadman Holland', 'asdf', '$2y$11$39NlAEz4tbGMuzJOkuvdKeg0R4yeOnLf6Qb2sscczQsMm/AyIsAvK', 'P.O. Box 227, 8732 Augue Avenue', '123123999V', '1972-04-24', 'Cras.interdum@estac.org', 'm', 1, 1),
(7, 'Hamish Bauer', 'zOa', '$2y$11$UXVr3HDDMBgzO4IGEepeXusYnl0/JNQLlFEk8T6mtRgbF08Dma3aW', 'Ap #696-5435 Sagittis Rd.', '123123993V', '1974-10-04', 'Vestibulum@eunulla.ca', 'm', 1, 1),
(8, 'Alden Bentley', 'auh', '$2y$11$42zyFxjTR7E3BDgDeh80M.TKZoR6QpA5DXhqVTgFVxcYY4futZQQ2', 'P.O. Box 420, 3790 Purus. Ave', '123143999V', '1968-05-14', 'Duis@Quisqueac.ca', 'f', 1, 1),
(9, 'Holmes Kent', 'jYW', '$2y$11$DBD6y7./d4B9Nlay/M.toOf9Q.Z2d/sy.BwMLGIvY7RTFkNnkCmYe', 'Ap #450-2461 Mus. Rd.', '123125999V', '1988-06-06', 'tellus@nuncinterdum.com', 'm', 1, 1),
(10, 'Perry Robinson', 'jYW', '$2y$11$DBD6y7./d4B9Nlay/M.toOf9Q.Z2d/sy.BwMLGIvY7RTFkNnkCmYe', 'P.O. Box 913, 7516 Aliquam Ave', '123123949V', '1975-09-29', 'mi@nunc.co.uk', 'm', 1, 1),
(11, 'Steel Carter', '4z6', '$2y$11$F/8XJP.si.s5Qpf5n4gFEeZfAghS9N75cVTu2Vwnxycu3P2mcPAtG', 'Ap #996-9701 Quis Ave', '123123919V', '1988-04-01', 'sem@acnullaIn.edu', 'm', 1, 1),
(12, 'Ferdinand Bright', 'SB5', '$2y$11$9RGX8oqMj0GL00.IPBXOVuLva1GuuWiDYkXhvLS4ZNdJTXcIOrFau', '4957 Egestas Road.', '123122999V', '1973-06-27', 'risus.Nulla@ut.edus', 'm', 1, 1),
(14, 'Jameson Farley', '5Tx', '$2y$11$G.Tvi/hfjILjIhQEpCijl.dCFBBKCISHn/pXlxCsi.z0tL5dIeT5i', '3422 Morbi St.', '123121999V', '1985-12-20', 'vel@sagittis.ca', 'f', 1, 1),
(15, 'Philip Rutledge', '0RD', '$2y$11$59WkSdoNF11Y1KPkJSoO7OLhBxja8BqpM8ICCOc.xfj.BKv5t7vWC', '8084 Sed St.', '788784446V', '1988-12-24', 'justo.Praesent@interdum.com', 'm', 1, 1),
(16, 'Stephen Allen', 'Way', '$2y$11$bMQGxIOP66yvVdScD4ivVuWmysg6/9nT.xuMytRM.y1TVtfHXjScW', '908-4129 Tristique Street', '123125990V', '1970-04-22', 'malesuada.fames.ac@ww.co.uk', 'm', 1, 1),
(17, 'Vernon Trevino', 'srK', '$2y$11$rW/wAwGE09vc4DNGFP/WQ.ax3MrJR8I9h7n5yh/ZrgHwtkmdq4Qte', 'P.O. Box 730, 981 Massa. Avenue', '788784006V', '1975-04-22', 'quis@interdumCurabitur.edu', 'm', 1, 1),
(18, 'Fulton Noble', '5h2', '$2y$11$nKRb6ysoglnQfitQdvsJyObKsMhQLh/3ajndMiafmMGnx7YyrR.iS', '7457 Mi Rd.', '123219119V', '1978-04-09', 'eu.elit.Nulla@dddd.co.uk', 'o', 2, 1),
(19, 'Darius Roy', '57X', '$2y$11$1RcjBoZ0wIwlg3Q8bzp6E.Rfm18i86sZuFyvsu.xXDCcrnHQndBJq', '997-6815 Et Av.', '788784326V', '1991-12-30', 'rutrum@et.ca', 'o', 2, 1),
(20, 'Griffin Houston', 'u5C', '$2y$11$BrhLrvO0sSJr3qjoK5uM9elFQn0QNBXLm/3LQkkyAu9IrawnO6ab2', '111-6854 Ut St.', '123191999V', '1970-11-20', 'Vivamus.rhoncus@we.com', 'o', 2, 1),
(21, 'Connor Lowery', '8QH', '$2y$11$lBvjMEyLxeFrSKi5by.dJ.qbswRVkrtRjULzwpD5k8laqbUnJDP7W', '112-294 Urna, Street', '788784676V', '1976-11-30', 'vitae@aptenttaciti.org', 'o', 2, 1),
(22, 'Lee Garcia', '2rE', '$2y$11$F.dSXjynlQ9jD9DgdXHG5OC0nUhbRQgysRTUp.jB6CUL6yktMuJ3O', 'Ap #646-2951 Pharetra Rd.', '121021999V', '1969-09-14', 'Donec.egestas@dolorFusce.ca', 'm', 1, 1),
(23, 'Hiram Salas', '57X', '$2y$11$1RcjBoZ0wIwlg3Q8bzp6E.Rfm18i86sZuFyvsu.xXDCcrnHQndBJq', '399-2598 Torquent Rd.', '121024499V', '1986-02-11', 'arcu.Nunc@magna.com', 'f', 2, 1),
(24, 'Eaton Reilly', 'u5C', '$2y$11$BrhLrvO0sSJr3qjoK5uM9elFQn0QNBXLm/3LQkkyAu9IrawnO6ab2', 'P.O. Box 849, 1464 Magna. Street', '451021999V', '1969-11-09', 'blandit@nisl.co.uk', 'f', 2, 1),
(25, 'Tucker Cherry', '8QH', '$2y$11$lBvjMEyLxeFrSKi5by.dJ.qbswRVkrtRjULzwpD5k8laqbUnJDP7W', 'Ap #222-1474 Amet, Road', '341021999V', '1975-07-02', 'amet.ante@sitametlorem.edu', 'm', 2, 1),
(26, 'Hyatt Hurst', '2rE', '$2y$11$F.dSXjynlQ9jD9DgdXHG5OC0nUhbRQgysRTUp.jB6CUL6yktMuJ3O', 'P.O. Box 426, 6843 Vivamus Av.', '651021999V', '1976-07-29', 'eu@fames.ca', 'm', 2, 1),
(27, 'removed', 'fUx', '$2y$11$iiu7OYxKvUuSC05Jpm8efucVOuzwk6VhaD8NxaypkFmT8j2hb3F4y', 'removed', 'removed', '2020-07-01', 'removed', 'o', 1, 0),
(28, 'removed', 'ALn', '$2y$11$VO..kxx2qjrFDH5uEqe/0.OJpOWALB1R0yAghqoXmQBxWs0SiNDEm', 'removed', 'removed', '2020-07-01', 'removed', 'o', 1, 0),
(29, 'removed', 'TfX', '$2y$11$CXVC.oaxKIS77G5vLraDVu7K4/h0qAglLB4jO3GWdkzW//LQfGJqK', 'removed', 'removed', '2020-07-01', 'removed', 'o', 1, 0),
(30, 'removed', 'sRj', '$2y$11$Xq6MZChd66EPy1JTn4PqueDNtbN0HHFDgF3/iW/6dDUYlOcXiFh/C', 'removed', 'removed', '2020-07-01', 'removed', 'o', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

DROP TABLE IF EXISTS `customer_contact`;
CREATE TABLE IF NOT EXISTS `customer_contact` (
  `custID` int(6) NOT NULL,
  `custContactNo` bigint(10) NOT NULL,
  PRIMARY KEY (`custID`,`custContactNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_contact`
--

INSERT INTO `customer_contact` (`custID`, `custContactNo`) VALUES
(1, 6711433182),
(7, 8383752739),
(7, 8577813914),
(8, 2618426675),
(9, 8796009975),
(9, 9367932753),
(10, 6680462305),
(10, 7888944976),
(11, 4327490557),
(11, 7753597210),
(12, 0),
(12, 6966766809),
(12, 6966766855),
(14, 2732020606),
(14, 9413569311),
(15, 1166649415),
(15, 6493111747),
(16, 3417666213),
(17, 2327110114),
(18, 4864028348),
(19, 1513825809),
(19, 1947039929),
(19, 4490139456),
(20, 8981142534),
(21, 6551751805),
(21, 7974197068),
(22, 2593352569),
(22, 3328777239),
(23, 3784150274),
(23, 6555538124),
(24, 2797190899),
(25, 8664374079),
(26, 3476685229);

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
(1, '1993-01-30', 'VIP', '1993-01-30', 'Active'),
(7, '1992-12-07', 'Regular', '1992-12-07', 'Active'),
(8, '1992-05-04', 'Regular', '1992-05-04', 'Active'),
(9, '1992-02-23', 'VIP', '1992-02-23', 'Active'),
(10, '1991-12-30', 'Regular', '1991-12-30', 'Active'),
(11, '1991-07-21', 'Regular', '1991-07-21', 'Active'),
(12, '1991-06-01', 'VIP', '1991-06-01', 'Active'),
(14, '1991-01-31', 'Regular', '1991-01-31', 'Active'),
(15, '1990-09-01', 'VIP', '1990-09-01', 'Active'),
(16, '1990-08-31', 'Regular', '1990-08-31', 'Active'),
(17, '1990-06-19', 'Regular', '1990-06-19', 'Active'),
(18, '1990-03-29', 'Regular', '1990-03-29', 'Active'),
(19, '1990-03-04', 'VIP', '1990-03-04', 'Active'),
(20, '1989-10-10', 'Regular', '1989-10-10', 'Active'),
(21, '1989-04-02', 'Regular', '1989-04-02', 'Active'),
(22, '1989-03-30', 'Regular', '1989-03-30', 'Active'),
(23, '1988-12-24', 'VIP', '1988-12-24', 'Active'),
(24, '1988-12-15', 'Regular', '1988-12-15', 'Active'),
(25, '1988-06-06', 'Regular', '1988-06-06', 'Active'),
(26, '1988-04-01', 'VIP', '1988-04-01', 'Active'),
(27, '2021-03-13', 'VIP', '2021-03-13', 'Active'),
(28, '2021-03-13', 'Regular', '2021-03-13', 'Active'),
(29, '2021-03-13', 'VIP', '2021-03-13', 'Active'),
(30, '2021-03-13', 'VIP', '2021-03-13', 'Active');

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
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`empID`),
  KEY `empTypeID` (`empTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `password`, `hashPass`, `empFirstName`, `empLastName`, `gender`, `empDOB`, `empNIC`, `empAddress`, `email`, `empTypeID`, `status`) VALUES
(1, 'asdf', '$2y$11$d/O5dcEZAqRJDOvPFbcfsO8kPdYPVIZmk28yjwHh/VGqMz6EggPBW', 'Saman', 'Perera', 'm', '2020-07-01', '1231231231', 'Flower road', 'sdc@d.com', 'DEO', 1),
(2, 'asd', '$2y$11$5lngklDjotWxydvMeD44E.uGqE.O8jK0cOaaP7da1Cmnm/YmqZ/bu', 'Nimal', 'Fernando', 'f', '2020-07-01', '1231231456', 'New Lane', 'asd@m.com', 'MED', 1),
(3, 'asdf', '$2y$11$d/O5dcEZAqRJDOvPFbcfsO8kPdYPVIZmk28yjwHh/VGqMz6EggPBW', 'Kasun', 'Silva', 'm', '2020-08-02', '1231231234', 'New Street', 'as@a.c', 'MED', 1),
(4, 'asdf', '$2y$11$d/O5dcEZAqRJDOvPFbcfsO8kPdYPVIZmk28yjwHh/VGqMz6EggPBW', 'Kamani', 'Fernando', 'f', '2020-08-04', '1231231237', 'Kandy', 'aw@a.com', 'FAG', 1),
(5, 'asd', '$2y$11$5lngklDjotWxydvMeD44E.uGqE.O8jK0cOaaP7da1Cmnm/YmqZ/bu', 'Wimal', 'Jayakody', 'm', '2020-08-04', '1231231231', 'Colombo', 'asaf@d.c', 'DOC', 1),
(6, 'asd', '$2y$11$5lngklDjotWxydvMeD44E.uGqE.O8jK0cOaaP7da1Cmnm/YmqZ/bu', 'Sisil', 'Perera', 'm', '2020-08-04', '1231231456', 'Street', 'sdc@d.com', 'MGR', 1),
(7, 'QIX', '$2y$11$uGa4lyJAPgB6/0ffhHyNq.ZrSzuVidgMFlLA3zkEVCSCpl6X9fZty', 'Amali', 'Silva', 'f', '2020-10-20', '3435783456', 'Temple road', 'q@a.a', 'FAG', 1),
(8, 'lwh', '$2y$11$oTUGSnTaUZRdq8Gwxxo/7.c9zKN6h1Q2qBjvYgkCPjNHGVRXgfQsy', 'Ashan', 'Perera', 'm', '2020-11-12', '4574324564', '162/3, ', 'aa@gmail.com', 'DOC', 1),
(10, 'vAN', '$2y$11$gPhUc8EObBPz2EqZ0R9C2.gul52s2Z2DUCWIz.3cS7muW/umhlx52', 'Colombage', 'Fernando', 'm', '2020-11-12', '3333444322', 'sea-street', 'bb@gmail.com', 'DEO', 1);

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
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`hospitalID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hospitalID`, `name`, `address`, `status`) VALUES
(1, 'Lanka Hospitals', 'colomboz', 1),
(2, 'Browns Hospital', 'Ragama', 1),
(3, 'Nawaloka Hospital', 'Colombo 4', 1),
(4, 'Hemas Hospitals', 'New Rd, Colombo 3.', 1);

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

--
-- Dumping data for table `hospital_contact`
--

INSERT INTO `hospital_contact` (`hospitalID`, `hospitalContactNo`) VALUES
(1, 4444),
(1, 333333),
(4, 111234567),
(4, 112345678);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_policy`
--

DROP TABLE IF EXISTS `insurance_policy`;
CREATE TABLE IF NOT EXISTS `insurance_policy` (
  `policyID` int(3) NOT NULL AUTO_INCREMENT,
  `documentDIR` text,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  `vPremium` double DEFAULT NULL,
  `rPremium` double DEFAULT NULL,
  PRIMARY KEY (`policyID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_policy`
--

INSERT INTO `insurance_policy` (`policyID`, `documentDIR`, `date`, `remarks`, `vPremium`, `rPremium`) VALUES
(1, 'policy/', '2020-08-05', 'adasczc', 1000, 800),
(2, '', '2020-11-10', 'sdasdad', 1100, 900),
(3, NULL, '2021-03-12', 'sdsf', 22, 12);

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
(1, 1, '2020-11-24', 'Genetic', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 'integer. Et sollicitudin ac orci phasellus egestas tellus rutrum'),
(2, 21, '2020-12-04', 'Accidental', 'incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 'mattis nunc sed. Et tortor at risus viverra adipiscing at in tellus'),
(4, 21, '2020-12-14', 'Congenital', 'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 'non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 20, '2020-12-11', 'Accidental', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit', 'integer. Et sollicitudin ac orci phasellus egestas tellus rutrum'),
(6, 7, '2020-12-08', 'Accidental', 'esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat', 'non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(7, 12, '2020-12-08', 'Accidental', 'non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit'),
(8, 9, '2020-12-08', 'Accidental', 'Morbi enim nunc faucibus a pellentesque. Viverra nibh cras pulvinar', 'consequat. Duis aute irure dolor in reprehenderit in voluptate velit'),
(9, 9, '2020-12-08', 'Accidental', 'mattis nunc sed. Et tortor at risus viverra adipiscing at in tellus', 'nunc sed. Et tortor at risus viverra adipisc'),
(10, 8, '2020-12-08', 'Accidental', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 'incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
(11, 9, '2020-12-08', 'Accidental', 'integer. Et sollicitudin ac orci phasellus egestas tellus rutrum', 'Et sollicitudin ac orci phasellus egestas tellus'),
(12, 10, '2020-12-04', 'Accidental', 'esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat', 'esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat'),
(13, 17, '2020-12-08', 'Accidental', 'anim id est laborum.', 'integer. Et sollicitudin ac orci phasellus egestas tellus rutrum');

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
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`id`, `type`, `date`, `image`) VALUES
(4, 'VIP', '2021-03-22', 'aa.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roster`
--

DROP TABLE IF EXISTS `roster`;
CREATE TABLE IF NOT EXISTS `roster` (
  `rosterID` int(4) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `managerID` int(4) NOT NULL,
  PRIMARY KEY (`rosterID`),
  KEY `a` (`managerID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roster`
--

INSERT INTO `roster` (`rosterID`, `date`, `managerID`) VALUES
(27, '2021-01-05', 6),
(28, '2021-01-30', 6),
(29, '2021-01-05', 6),
(30, '2021-01-05', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slotID`, `rosterID`, `day`, `timeSlotNo`) VALUES
(120, 27, 1, 1),
(121, 27, 3, 2),
(122, 27, 5, 3),
(123, 28, 2, 1),
(124, 28, 2, 2),
(125, 29, 1, 1),
(126, 29, 3, 2),
(127, 29, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot_med`
--

DROP TABLE IF EXISTS `time_slot_med`;
CREATE TABLE IF NOT EXISTS `time_slot_med` (
  `medScruID` int(4) NOT NULL,
  `slotID` int(5) NOT NULL,
  PRIMARY KEY (`medScruID`,`slotID`),
  KEY `time_slot_med_ibfk_2` (`slotID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot_med`
--

INSERT INTO `time_slot_med` (`medScruID`, `slotID`) VALUES
(2, 120),
(3, 120),
(2, 121),
(3, 121),
(3, 122),
(2, 123),
(3, 123),
(3, 124),
(2, 125),
(3, 125),
(2, 126),
(3, 126),
(3, 127);

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
-- Constraints for table `roster`
--
ALTER TABLE `roster`
  ADD CONSTRAINT `a` FOREIGN KEY (`managerID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD CONSTRAINT `time_slot_ibfk_1` FOREIGN KEY (`rosterID`) REFERENCES `roster` (`rosterID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_slot_med`
--
ALTER TABLE `time_slot_med`
  ADD CONSTRAINT `time_slot_med_ibfk_1` FOREIGN KEY (`medScruID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_slot_med_ibfk_2` FOREIGN KEY (`slotID`) REFERENCES `time_slot` (`slotID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
