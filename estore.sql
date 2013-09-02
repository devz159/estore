-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2013 at 01:25 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estore`
--
CREATE DATABASE IF NOT EXISTS `estore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estore`;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `transaction_date` varchar(20) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_ID`),
  KEY `fgn_user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `fgn_product_ID` (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` varchar(20) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `payment_ref_number` varchar(20) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`payment_ID`),
  KEY `fgn_order_ID` (`order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_confirmation`
--

CREATE TABLE IF NOT EXISTS `payment_confirmation` (
  `payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `confirmee_ID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `timestamp` time DEFAULT NULL,
  `status` int(11) NOT NULL,
  KEY `fgn_payment_ID` (`payment_ID`),
  KEY `fgn_user_ID` (`confirmee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discounted_price` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `return_ID` int(11) NOT NULL AUTO_INCREMENT,
  `return_date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`return_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE IF NOT EXISTS `return_details` (
  `order_ID` int(11) NOT NULL,
  `return_description` varchar(20) NOT NULL,
  KEY `fgn_order_ID` (`order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_receiving`
--

CREATE TABLE IF NOT EXISTS `stock_receiving` (
  `stock_receiving_ID` int(11) NOT NULL AUTO_INCREMENT,
  `received_date` varchar(20) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`stock_receiving_ID`),
  KEY `fgn_user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock_receiving_details`
--

CREATE TABLE IF NOT EXISTS `stock_receiving_details` (
  `product_ID` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  KEY `fgn_product_ID` (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  ADD CONSTRAINT `payment_confirmation_ibfk_1` FOREIGN KEY (`payment_ID`) REFERENCES `payment` (`payment_ID`);

--
-- Constraints for table `return_details`
--
ALTER TABLE `return_details`
  ADD CONSTRAINT `return_details_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`);

--
-- Constraints for table `stock_receiving`
--
ALTER TABLE `stock_receiving`
  ADD CONSTRAINT `stock_receiving_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `stock_receiving_details`
--
ALTER TABLE `stock_receiving_details`
  ADD CONSTRAINT `stock_receiving_details_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
