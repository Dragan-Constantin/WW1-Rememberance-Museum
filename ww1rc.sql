-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2024 at 11:59 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ww1rc`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `category` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(255) DEFAULT 'image',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `title`, `description`, `category`, `file_path`, `upload_date`, `type`) VALUES
(1, 'mail banner 1', 'A cover image for the noreply notification emails', 'Dashboard', 'view/img/lego-ww1.jpg', '2024-06-03 10:44:22', 'image'),
(2, 'mail banner 2', 'A cover image for the noreply notification emails', 'Dashboard', 'view/img/mail-change-password.jpg', '2024-06-03 10:44:22', 'image'),
(3, 'mail banner 3', 'A cover image for the noreply notification emails', 'Dashboard', 'view/img/mail-cover-lego-war.png', '2024-06-03 10:44:22', 'image'),
(4, 'undraw_profile.svg', 'A default profile image', 'Dashboard', 'view/img/undraw_profile.svg', '2024-06-03 10:44:22', 'image'),
(5, 'profile picture 1', 'A default profile image', 'Dashboard', 'view/img/undraw_profile_1.svg', '2024-06-03 10:44:22', 'image'),
(6, 'profile picture 2', 'A default profile image', 'Dashboard', 'view/img/undraw_profile_2.svg', '2024-06-03 10:44:22', 'image'),
(7, 'profile picture 3', 'A default profile image', 'Dashboard', 'view/img/undraw_profile_3.svg', '2024-06-03 10:44:22', 'image'),
(8, 'Home Hero', 'A hero image for the homepage', 'Homepage', 'assets/images/ww.avif', '2024-06-03 10:44:22', 'image'),
(9, 'Museum Outside', 'A photo of the outside of the museum', 'Homepage', 'assets/images/WW1.jpg', '2024-06-03 10:44:22', 'image'),
(10, 'School Trips Card', 'A photo to illustrate school trips', 'Homepage', 'assets/images/school-trips.jpeg', '2024-06-03 10:44:22', 'image'),
(11, 'Events Card', 'A photo to illustrate the events', 'Homepage', 'assets/images/trenches.jpeg', '2024-06-03 10:44:22', 'image'),
(12, 'Current Exhibition', 'A photo of the current exhibition at the museum', 'Homepage', 'assets/images/20240523_131926.jpg', '2024-06-03 10:44:22', 'image'),
(13, 'Image 1', 'First photo of the about page', 'About', 'assets/images/20240523_130619.jpg', '2024-06-03 10:44:22', 'image'),
(14, 'Image 2', 'Second photo of the about page', 'About', 'assets/images/20240523_130255.jpg', '2024-06-03 10:44:22', 'image'),
(15, 'Image 3', 'Second photo of the about page', 'About', 'assets/images/20240523_133214.jpg', '2024-06-03 10:44:22', 'image'),
(16, 'Image 4', 'Second photo of the about page', 'About', 'assets/images/20240523_132029.jpg', '2024-06-03 10:44:22', 'image'),
(17, 'Volunteering Form Image', 'An illustration for the recruiting form', 'Help Us', 'assets/images/we-need-you.jpg', '2024-06-03 10:44:22', 'image'),
(18, 'Contact Form Image', 'An illustration for the contact form', 'Contact', 'assets/images/contact-form.jpg', '2024-06-03 10:44:22', 'image'),
(19, 'Gift Shop 1', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-1.jpg', '2024-06-03 10:44:22', 'image'),
(20, 'Gift Shop 2', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-2.jpg', '2024-06-03 10:44:22', 'image'),
(21, 'Gift Shop 3', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-3.jpg', '2024-06-03 10:44:22', 'image'),
(22, 'Gift Shop 4', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-4.jpg', '2024-06-03 10:44:22', 'image'),
(23, 'Gift Shop 5', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-5.jpg', '2024-06-03 10:44:22', 'image'),
(24, 'Gift Shop 6', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-6.jpg', '2024-06-03 10:44:22', 'image'),
(25, 'Gift Shop 7', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-7.jpg', '2024-06-03 10:44:22', 'image'),
(26, 'Gift Shop 8', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-8.jpg', '2024-06-03 10:44:22', 'image'),
(27, 'Gift Shop 9', 'A photo for the gift shop', 'Gift Shop', 'assets/images/giftshop-9.jpg', '2024-06-03 10:44:22', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `business_hours`
--

DROP TABLE IF EXISTS `business_hours`;
CREATE TABLE IF NOT EXISTS `business_hours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `closed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `day` (`day`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_hours`
--

INSERT INTO `business_hours` (`id`, `day`, `open_time`, `close_time`, `closed`) VALUES
(1, 'Monday', NULL, NULL, 1),
(2, 'Tuesday', NULL, NULL, 1),
(3, 'Wednesday', '00:00:00', '00:00:00', 0),
(4, 'Thursday', '00:00:00', '00:00:00', 0),
(5, 'Friday', NULL, NULL, 1),
(6, 'Saturday', '00:00:00', '00:00:00', 0),
(7, 'Sunday', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE IF NOT EXISTS `candidates` (
  `CandidateID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Age` int DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PostCode` varchar(10) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`CandidateID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`CandidateID`, `FirstName`, `LastName`, `Age`, `Address`, `Email`, `PostCode`, `Phone`) VALUES
(1, 'John', 'Smith', 30, '123 Main St', 'john.smith@example.com', '12345', '555-1234');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_date`, `end_date`) VALUES
(1, 'Trench Warfare Exhibit', 'Explore the trenches of WW1', '2024-07-01', '2024-08-01'),
(2, 'WW1 Airshow', 'A showcase of WW1 aircraft', '2024-06-15', '2024-06-15'),
(3, 'History of WW1 Lecture', 'A lecture on the history of WW1', '2024-07-15', '2024-07-15'),
(4, 'WW1 Reenactment', 'Experience a WW1 battle reenactment', '2024-06-25', '2024-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `publication_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `publication_date`) VALUES
(1, 'New Exhibit: Trench Warfare', 'We are excited to announce our new exhibit on trench warfare!', '2024-06-01'),
(2, 'Upcoming Airshow', 'Join us for a spectacular WW1 airshow this summer!', '2024-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `testimonial`, `date`) VALUES
(1, 'Jane Doe', 'A wonderful museum experience!', '2024-05-25'),
(2, 'Bob Johnson', 'Informative and engaging exhibits.', '2024-05-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
