-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2014 at 04:52 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kiosk`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year_t`
--

CREATE TABLE IF NOT EXISTS `academic_year_t` (
  `ay_id` int(5) NOT NULL AUTO_INCREMENT,
  `year_start` int(5) DEFAULT NULL,
  `year_end` int(5) DEFAULT NULL,
  PRIMARY KEY (`ay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account_t`
--

CREATE TABLE IF NOT EXISTS `account_t` (
  `account_no` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `member_no` int(5) DEFAULT NULL,
  PRIMARY KEY (`account_no`),
  KEY `member_no` (`member_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account_t`
--

INSERT INTO `account_t` (`account_no`, `username`, `password`, `member_no`) VALUES
(3, 'asdsf', 'adsaf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_t`
--

CREATE TABLE IF NOT EXISTS `attendance_t` (
  `attendance_id` int(12) NOT NULL AUTO_INCREMENT,
  `event_id` int(5) DEFAULT NULL,
  `student_id` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `event_id` (`event_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `building_t`
--

CREATE TABLE IF NOT EXISTS `building_t` (
  `building_no` int(5) NOT NULL AUTO_INCREMENT,
  `code_name` varchar(32) DEFAULT NULL,
  `building_name` varchar(64) DEFAULT NULL,
  `campus_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`building_no`),
  KEY `campus_id` (`campus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campus_t`
--

CREATE TABLE IF NOT EXISTS `campus_t` (
  `campus_id` int(5) NOT NULL AUTO_INCREMENT,
  `campus_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`campus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class_t`
--

CREATE TABLE IF NOT EXISTS `class_t` (
  `class_id` int(12) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(32) DEFAULT NULL,
  `faculty_id` varchar(32) DEFAULT NULL,
  `sem_id` int(5) DEFAULT NULL,
  `subject_code` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`class_id`),
  KEY `student_id` (`student_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `sem_id` (`sem_id`),
  KEY `subject_code` (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department_t`
--

CREATE TABLE IF NOT EXISTS `department_t` (
  `department_id` int(5) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(64) DEFAULT NULL,
  `department_head` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`department_id`),
  KEY `department_head` (`department_head`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `final_grade_t`
--

CREATE TABLE IF NOT EXISTS `final_grade_t` (
  `fg_id` int(12) NOT NULL AUTO_INCREMENT,
  `grade` int(12) DEFAULT NULL,
  `class_id` int(12) DEFAULT NULL,
  PRIMARY KEY (`fg_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `headline_t`
--

CREATE TABLE IF NOT EXISTS `headline_t` (
  `hl_id` int(5) NOT NULL AUTO_INCREMENT,
  `post_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`hl_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member_t`
--

CREATE TABLE IF NOT EXISTS `member_t` (
  `member_id` int(5) NOT NULL AUTO_INCREMENT,
  `member_type` enum('student','personnel') DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member_t`
--

INSERT INTO `member_t` (`member_id`, `member_type`) VALUES
(1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `officer_t`
--

CREATE TABLE IF NOT EXISTS `officer_t` (
  `officer_id` int(5) NOT NULL AUTO_INCREMENT,
  `org_id` int(5) DEFAULT NULL,
  `member_id` int(5) DEFAULT NULL,
  `position_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`officer_id`),
  KEY `org_id` (`org_id`),
  KEY `member_id` (`member_id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization_t`
--

CREATE TABLE IF NOT EXISTS `organization_t` (
  `org_id` int(5) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(64) DEFAULT NULL,
  `room_no` int(5) DEFAULT NULL,
  `department_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`org_id`),
  KEY `room_no` (`room_no`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_t`
--

CREATE TABLE IF NOT EXISTS `personnel_t` (
  `personnel_id` varchar(32) NOT NULL,
  `f_name` varchar(32) DEFAULT NULL,
  `m_name` varchar(32) DEFAULT NULL,
  `l_name` varchar(32) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`personnel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `position_t`
--

CREATE TABLE IF NOT EXISTS `position_t` (
  `position_id` int(5) NOT NULL AUTO_INCREMENT,
  `position_title` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts_t`
--

CREATE TABLE IF NOT EXISTS `posts_t` (
  `post_id` int(5) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(64) DEFAULT NULL,
  `post_description` varchar(255) DEFAULT NULL,
  `attachment` varchar(64) DEFAULT NULL,
  `account_no` int(5) DEFAULT NULL,
  `org_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `account_no` (`account_no`),
  KEY `org_id` (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `posts_t`
--

INSERT INTO `posts_t` (`post_id`, `post_title`, `post_description`, `attachment`, `account_no`, `org_id`) VALUES
(3, 'jshad', 'jasjka', '24268_433288620098338_2085915303_n.jpg', 3, NULL),
(19, 'hey', 'hi im 4c', 'body.jpg', NULL, NULL),
(20, 'hoho', 'hihi', '061120133680.jpg', NULL, NULL),
(21, 'have', 'hello', '061120133679.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `procedure_t`
--

CREATE TABLE IF NOT EXISTS `procedure_t` (
  `precedure_id` int(5) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(5) DEFAULT NULL,
  `order_no` int(5) DEFAULT NULL,
  `precedure_title` varchar(64) DEFAULT NULL,
  `instruction` varchar(255) DEFAULT NULL,
  `officer_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`precedure_id`),
  KEY `transaction_id` (`transaction_id`),
  KEY `officer_id` (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_t`
--

CREATE TABLE IF NOT EXISTS `room_t` (
  `room_no` int(5) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(64) DEFAULT NULL,
  `building_no` int(5) DEFAULT NULL,
  `floor_no` int(2) DEFAULT NULL,
  PRIMARY KEY (`room_no`),
  KEY `building_no` (`building_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_t`
--

CREATE TABLE IF NOT EXISTS `schedule_t` (
  `sched_id` int(12) NOT NULL AUTO_INCREMENT,
  `class_id` int(12) DEFAULT NULL,
  `day` varchar(32) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`sched_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `semester_t`
--

CREATE TABLE IF NOT EXISTS `semester_t` (
  `sem_id` int(5) NOT NULL AUTO_INCREMENT,
  `sem_no` int(2) DEFAULT NULL,
  `ay_no` int(5) DEFAULT NULL,
  PRIMARY KEY (`sem_id`),
  KEY `ay_no` (`ay_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_t`
--

CREATE TABLE IF NOT EXISTS `seminar_t` (
  `event_id` int(5) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(64) DEFAULT NULL,
  `venue` int(5) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_t`
--

CREATE TABLE IF NOT EXISTS `student_t` (
  `student_id` varchar(32) NOT NULL,
  `f_name` varchar(32) DEFAULT NULL,
  `m_name` varchar(32) DEFAULT NULL,
  `l_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_t`
--

CREATE TABLE IF NOT EXISTS `subject_t` (
  `subject_code` varchar(32) NOT NULL,
  `subject_title` varchar(64) DEFAULT NULL,
  `units` int(5) DEFAULT NULL,
  PRIMARY KEY (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_t`
--

CREATE TABLE IF NOT EXISTS `transaction_t` (
  `transaction_id` int(5) NOT NULL AUTO_INCREMENT,
  `transaction_title` varchar(64) DEFAULT NULL,
  `officer_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `officer_id` (`officer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_t`
--
ALTER TABLE `account_t`
  ADD CONSTRAINT `account_t_ibfk_1` FOREIGN KEY (`member_no`) REFERENCES `member_t` (`member_id`);

--
-- Constraints for table `attendance_t`
--
ALTER TABLE `attendance_t`
  ADD CONSTRAINT `attendance_t_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `seminar_t` (`event_id`),
  ADD CONSTRAINT `attendance_t_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`);

--
-- Constraints for table `building_t`
--
ALTER TABLE `building_t`
  ADD CONSTRAINT `building_t_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus_t` (`campus_id`);

--
-- Constraints for table `class_t`
--
ALTER TABLE `class_t`
  ADD CONSTRAINT `class_t_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_t` (`student_id`),
  ADD CONSTRAINT `class_t_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `personnel_t` (`personnel_id`),
  ADD CONSTRAINT `class_t_ibfk_3` FOREIGN KEY (`sem_id`) REFERENCES `semester_t` (`sem_id`),
  ADD CONSTRAINT `class_t_ibfk_4` FOREIGN KEY (`subject_code`) REFERENCES `subject_t` (`subject_code`);

--
-- Constraints for table `department_t`
--
ALTER TABLE `department_t`
  ADD CONSTRAINT `department_t_ibfk_1` FOREIGN KEY (`department_head`) REFERENCES `personnel_t` (`personnel_id`);

--
-- Constraints for table `final_grade_t`
--
ALTER TABLE `final_grade_t`
  ADD CONSTRAINT `final_grade_t_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_t` (`class_id`);

--
-- Constraints for table `headline_t`
--
ALTER TABLE `headline_t`
  ADD CONSTRAINT `headline_t_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts_t` (`post_id`);

--
-- Constraints for table `officer_t`
--
ALTER TABLE `officer_t`
  ADD CONSTRAINT `officer_t_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organization_t` (`org_id`),
  ADD CONSTRAINT `officer_t_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member_t` (`member_id`),
  ADD CONSTRAINT `officer_t_ibfk_3` FOREIGN KEY (`position_id`) REFERENCES `position_t` (`position_id`);

--
-- Constraints for table `organization_t`
--
ALTER TABLE `organization_t`
  ADD CONSTRAINT `organization_t_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `room_t` (`room_no`),
  ADD CONSTRAINT `organization_t_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department_t` (`department_id`);

--
-- Constraints for table `posts_t`
--
ALTER TABLE `posts_t`
  ADD CONSTRAINT `posts_t_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `account_t` (`account_no`),
  ADD CONSTRAINT `posts_t_ibfk_2` FOREIGN KEY (`org_id`) REFERENCES `organization_t` (`org_id`);

--
-- Constraints for table `procedure_t`
--
ALTER TABLE `procedure_t`
  ADD CONSTRAINT `procedure_t_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_t` (`transaction_id`),
  ADD CONSTRAINT `procedure_t_ibfk_2` FOREIGN KEY (`officer_id`) REFERENCES `officer_t` (`officer_id`);

--
-- Constraints for table `room_t`
--
ALTER TABLE `room_t`
  ADD CONSTRAINT `room_t_ibfk_1` FOREIGN KEY (`building_no`) REFERENCES `building_t` (`building_no`);

--
-- Constraints for table `schedule_t`
--
ALTER TABLE `schedule_t`
  ADD CONSTRAINT `schedule_t_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_t` (`class_id`);

--
-- Constraints for table `semester_t`
--
ALTER TABLE `semester_t`
  ADD CONSTRAINT `semester_t_ibfk_1` FOREIGN KEY (`ay_no`) REFERENCES `academic_year_t` (`ay_id`);

--
-- Constraints for table `transaction_t`
--
ALTER TABLE `transaction_t`
  ADD CONSTRAINT `transaction_t_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officer_t` (`officer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
