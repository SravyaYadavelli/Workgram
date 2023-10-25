create database workgram;
use workgram;

-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2020 at 03:38 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE IF NOT EXISTS `freelancers` (
  `username` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `qualification` varchar(500) NOT NULL,
  `skillset` varchar(500) NOT NULL,
  `exp` varchar(500) NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`username`, `name`, `email`, `mobile`, `qualification`, `skillset`, `exp`, `photo`) VALUES
('raj', 'raj', 'nagasrinu482@gmail.com', '9989273669', 'mtech', 'java,python', '5', 'img2.jpg'),
('ramesh', 'ramesh', 'nagasrinu482@gmail.com', '9989273669', 'mtech', 'java,python', '5', 'Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `role`, `status`) VALUES
('srinu', 'srinu', '3', 'yes'),
('ram', 'ram', '3', 'yes'),
('admin', 'admin', '1', 'yes'),
('raj', 'raj', '2', 'yes'),
('ramesh', 'ramesh', '2', 'yes'),
('venu', 'venu', '3', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `wid` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `rating` varchar(1) NOT NULL,
  `rdate` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `wid`, `username`, `rating`, `rdate`) VALUES
(1, '2', 'srinu', '5', '18/08/2020'),
(2, '3', 'venu', '3', '19/08/2020');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `wid` varchar(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `review` varchar(5000) NOT NULL,
  `rdate` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `wid`, `username`, `review`, `rdate`) VALUES
(5, '2', 'srinu', 'hello', '18/08/2020'),
(6, '2', 'srinu', 'go', '18/08/2020'),
(7, '2', 'srinu', 'get', '18/08/2020'),
(8, '2', 'srinu', 'getsdsf', '18/08/2020'),
(9, '2', 'srinu', 'done', '18/08/2020'),
(10, '3', 'venu', 'hgddgdggghgghj', '19/08/2020'),
(11, '3', 'venu', 'gjhkhjljlk;', '19/08/2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `mobile`, `address`, `email`) VALUES
('ram', 'ram', '9876543212', 'vizag', 'ram@gmail.com'),
('srinu', 'srinu', '9989273669', 'hyderabad', 'nagasrinu482@gmail.com'),
('venu', 'venu', '9989273669', 'hyderabad', 'ram@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE IF NOT EXISTS `workshops` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `wdate` varchar(500) NOT NULL,
  `wtime` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(500) NOT NULL,
  `topics` varchar(500) NOT NULL,
  `banner` varchar(500) NOT NULL,
  `reglink` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `username`, `name`, `wdate`, `wtime`, `description`, `location`, `topics`, `banner`, `reglink`) VALUES
(2, 'raj', 'python workshop', '12-12-2020', '9am-12pm', 'abc', 'hyderabad', 'xyz', 'image.png', 'www.voidmaintechnologies.com'),
(3, 'ramesh', 'java workshop', '12-12-2020', '9am-12pm', 'oops', 'hyderabad', 'xyz', 'Desert.jpg', 'www.voidmaintechnologies.com');
