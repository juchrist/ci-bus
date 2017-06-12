-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2017 at 10:11 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `checkup`
--

-- --------------------------------------------------------

--
-- Table structure for table `ailments`
--

CREATE TABLE IF NOT EXISTS `ailments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `symptoms` text,
  `prevention` text,
  `causes` text,
  `remedy` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ailments`
--

INSERT INTO `ailments` (`id`, `name`, `symptoms`, `prevention`, `causes`, `remedy`) VALUES
(3, 'Headache', 'You will feel like your head is being smashed on a wall as it will be so strong and perhaps hot. Also the veins in the head might show.', 'Give yourself enough rest and sleep comfortably. Avoid over-working yourself and thinking too much', 'Lack of Adequate sleep, Overworking of ones self, Collision with another object.', 'Take any Analgesic or Pain reliever such as Paracetamol, Pentax, Panadol e.t.c');

-- --------------------------------------------------------

--
-- Table structure for table `ailments_graph`
--

CREATE TABLE IF NOT EXISTS `ailments_graph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `percentage` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `a_id` (`a_id`),
  KEY `a_id_2` (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ailments_graph`
--


-- --------------------------------------------------------

--
-- Table structure for table `ailments_pictures`
--

CREATE TABLE IF NOT EXISTS `ailments_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `link` varchar(70) NOT NULL,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ailments_pictures`
--


-- --------------------------------------------------------

--
-- Table structure for table `ailment_videos`
--

CREATE TABLE IF NOT EXISTS `ailment_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(10) NOT NULL,
  `link` varchar(70) NOT NULL,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `a_id` (`a_id`),
  KEY `a_id_2` (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ailment_videos`
--


-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE IF NOT EXISTS `clinic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `body` text NOT NULL,
  `date_created` varchar(20) NOT NULL,
  `time_created` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `clinic`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `othernames` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `grad_school` varchar(50) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `license_nos` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `rank` int(11) NOT NULL,
  `pow` text NOT NULL,
  `started_practice` varchar(10) NOT NULL,
  `mobile_number` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `doctors`
--


-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE IF NOT EXISTS `following` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `following` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `following`
--


-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `state` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hospitals`
--


-- --------------------------------------------------------

--
-- Table structure for table `hospital_images`
--

CREATE TABLE IF NOT EXISTS `hospital_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(55) NOT NULL,
  `h_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `h_id` (`h_id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hospital_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `hos_reviews`
--

CREATE TABLE IF NOT EXISTS `hos_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer` text NOT NULL,
  `rate` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `h_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hos_reviews`
--


-- --------------------------------------------------------

--
-- Table structure for table `hos_services`
--

CREATE TABLE IF NOT EXISTS `hos_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) NOT NULL,
  `service` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `h_id` (`h_id`),
  KEY `h_id_2` (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hos_services`
--


-- --------------------------------------------------------

--
-- Table structure for table `hos_treatment`
--

CREATE TABLE IF NOT EXISTS `hos_treatment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `a_id` (`a_id`),
  UNIQUE KEY `h_id` (`h_id`),
  KEY `a_id_2` (`a_id`),
  KEY `h_id_2` (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hos_treatment`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(70) NOT NULL,
  `reciever` varchar(70) NOT NULL,
  `topic` text NOT NULL,
  `body` text NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL,
  `read` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sender` (`sender`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` int(11) NOT NULL,
  `othernames` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `picture` int(11) NOT NULL,
  `occupation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `patients`
--


-- --------------------------------------------------------

--
-- Table structure for table `u_wallet`
--

CREATE TABLE IF NOT EXISTS `u_wallet` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `subscriber` int(11) NOT NULL,
  `sub_type` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_wallet`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
