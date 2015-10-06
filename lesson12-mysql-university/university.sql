-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 07:21 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `course_id` (`course_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `teacher_id`) VALUES
(1, 'piano', 3),
(2, 'math', 6),
(3, 'sport', 2),
(4, 'biology', 5),
(5, 'history', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `faculty_number` int(11) NOT NULL,
  `reg_year` year(4) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `names`, `gender`, `faculty_number`, `reg_year`) VALUES
(1, 'Ivan Ivanov', 'male', 234546, 2013),
(2, 'Petar Petrov', 'male', 344546, 2014),
(3, 'Maria Ivanova', 'female', 343535, 2012),
(4, 'Elena Todorova', 'female', 432542, 2015),
(5, 'Todor Dimitrov', 'male', 344322, 2014),
(6, 'Georgi Georgiev', 'male', 343253, 2013),
(7, 'Maria Georgieva', 'female', 323425, 2015),
(8, 'Kiril Petrov', 'male', 231241, 2014),
(9, 'Plamena Ivanova', 'female', 332215, 2012),
(10, 'Lilia Hristova', 'female', 324235, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `course_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(3, 5),
(4, 3),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `contract_number` int(11) NOT NULL,
  `reg_year` year(4) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `names`, `contract_number`, `reg_year`, `isActive`) VALUES
(1, 'Plamen Ivanov', 2345, 2013, 1),
(2, 'Ivan Petrov', 3446, 2014, 1),
(3, 'Marian Ivanov', 3435, 2012, 1),
(4, 'Elena Todorova', 4342, 2015, 0),
(5, 'Todor Dimitrov', 3422, 2014, 1),
(6, 'Georgi Georgiev', 3253, 2013, 1),
(7, 'Maria Georgieva', 3225, 2015, 0),
(8, 'Kiril Petrov', 2241, 2014, 1),
(9, 'Plamena Ivanova', 3215, 2012, 0),
(10, 'Lilia Hristova', 3245, 2012, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
