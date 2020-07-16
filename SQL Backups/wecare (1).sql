-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2020 at 04:49 AM
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
  PRIMARY KEY (`claimID`),
  KEY `doctorID` (`doctorID`),
  KEY `FieldAgID` (`FieldAgID`),
  KEY `dataEntryOfficerID` (`dataEntryOfficerID`),
  KEY `medScruID` (`medScruID`),
  KEY `custID` (`custID`),
  KEY `policyID` (`policyID`),
  KEY `hospitalID` (`hospitalID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `custID` int(6) NOT NULL AUTO_INCREMENT,
  `custName` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `custAddress` text NOT NULL,
  `custNIC` varchar(11) NOT NULL,
  `custDOB` date NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `policyID` int(3) NOT NULL,
  PRIMARY KEY (`custID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

DROP TABLE IF EXISTS `customer_contact`;
CREATE TABLE IF NOT EXISTS `customer_contact` (
  `custID` int(6) NOT NULL,
  `custContactNo` int(10) NOT NULL,
  PRIMARY KEY (`custContactNo`),
  KEY `custID` (`custID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust_insurance`
--

DROP TABLE IF EXISTS `cust_insurance`;
CREATE TABLE IF NOT EXISTS `cust_insurance` (
  `custID` int(6) NOT NULL,
  `startDate` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `premium` double NOT NULL,
  `paymentDate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`custID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `password` varchar(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `password`, `empFirstName`, `empLastName`, `gender`, `empDOB`, `empNIC`, `empAddress`, `email`, `empTypeID`) VALUES
(1, 'asdf', 'kamal', 'perera', 'm', '2020-07-01', '1231231231', 'sadscsdcsa', 'sdc@d.com', 'DEO'),
(2, 'asd', 'nimal', 'perera', 'm', '2020-07-01', '1231231456', 'asdsfsdc', 'asd@m.com', 'MGR');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`policyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `med_record`
--

DROP TABLE IF EXISTS `med_record`;
CREATE TABLE IF NOT EXISTS `med_record` (
  `recordID` int(6) NOT NULL AUTO_INCREMENT,
  `custID` int(6) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `healthCondition` text NOT NULL,
  `comments` text,
  PRIMARY KEY (`recordID`),
  KEY `custID` (`custID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE IF NOT EXISTS `time_slot` (
  `slotID` int(6) NOT NULL AUTO_INCREMENT,
  `rosterID` int(4) NOT NULL,
  `day` varchar(10) NOT NULL,
  `timeSlotNo` int(1) NOT NULL,
  PRIMARY KEY (`slotID`),
  KEY `rosterID` (`rosterID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
