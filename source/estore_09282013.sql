-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2013 at 01:53 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_ID`),
  KEY `fgn_user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_ID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` date DEFAULT NULL,
  `order_ID` int(11) NOT NULL,
  `payment_ref_number` varchar(20) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`payment_ID`),
  KEY `fgn_order_ID` (`order_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payment`
--


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

--
-- Dumping data for table `payment_confirmation`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `product_date` date DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`product_ID`),
  UNIQUE KEY `product_name` (`product_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_name`, `product_date`, `color`, `category`, `description`, `user_ID`, `status`) VALUES
(2, 't4', '2013-09-25', 'Red', 'Handbag', 'sd', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE IF NOT EXISTS `product_price` (
  `price_ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_ID` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`price_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`price_ID`, `product_ID`, `start_date`, `end_date`, `price`, `quantity`) VALUES
(2, 2, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `return_ID` int(11) NOT NULL AUTO_INCREMENT,
  `return_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`return_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `return`
--


-- --------------------------------------------------------

--
-- Table structure for table `return_details`
--

CREATE TABLE IF NOT EXISTS `return_details` (
  `order_ID` int(11) NOT NULL,
  `return_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `stock_receiving`
--

CREATE TABLE IF NOT EXISTS `stock_receiving` (
  `stock_receiving_ID` int(11) NOT NULL AUTO_INCREMENT,
  `product_ID` int(11) NOT NULL,
  `received_date` date DEFAULT NULL,
  `user_ID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`stock_receiving_ID`),
  KEY `fgn_product_ID` (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `stock_receiving`
--


-- --------------------------------------------------------

--
-- Table structure for table `stock_receiving_details`
--

CREATE TABLE IF NOT EXISTS `stock_receiving_details` (
  `product_ID` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_receiving_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(75) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `username`, `password`, `email`, `firstname`, `middlename`, `lastname`, `contact_number`, `user_level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'admin', 'admin', 'admin', '1234', 1, 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.com', 'user', 'user', 'user', '12345', 0, 1);
