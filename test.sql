-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2016 at 07:08 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authetication`
--

CREATE TABLE IF NOT EXISTS `authetication` (
  `user` varchar(60) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(128) CHARACTER SET utf8 NOT NULL,
  `right` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is the users table';

--
-- Dumping data for table `authetication`
--

INSERT INTO `authetication` (`user`, `pass`, `right`) VALUES
('paco', 'paco', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `chaptername` text CHARACTER SET utf8 NOT NULL,
  `chapternum` varchar(2) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`chapter_id`),
  KEY `chapters_class` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chaptername`, `chapternum`, `class_id`) VALUES
(7, 'Introduction to Object-Oriented Concepts.', '1', 1),
(8, 'How to Think in Terms of Object.', '2', 1),
(9, 'Advanced Object-Oriented Concepts.', '3', 1),
(10, 'The Anatomy of a Class.', '4', 1),
(11, 'Class Design Guidelines.', '5', 1),
(12, 'Designing with Objects.', '6', 1),
(13, 'Mastering Inheritance and Composition.', '7', 1),
(14, 'Frameworks and Reuse: Designing with Interfaces and Abstract Classes.', '8', 1),
(15, 'Building Objects and Object-Oriented Design.', '9', 1),
(16, 'Creating Object Models.', '10', 1),
(17, 'Objects and Portable Data: XML and JSON.', '11', 1),
(18, 'Persistent Objects: Serialization, Marshaling, and Relational Databases.', '12', 1),
(19, 'Objects in Web Services, Mobile Apps, and Hybrids.', '13', 1),
(20, 'Objects and Client/Server Applications.', '14', 1),
(21, 'Design Patterns.', '15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` text NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `classname`) VALUES
(1, '406 Object Oriented Programming - Java I');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `idq` int(11) NOT NULL AUTO_INCREMENT,
  `question` int(11) NOT NULL,
  `a_a` int(11) NOT NULL,
  `a_b` int(11) NOT NULL,
  `a_c` int(11) NOT NULL,
  `a_d` int(11) NOT NULL,
  `r_a` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`idq`),
  KEY `questions_chapter` (`chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`idq`, `question`, `a_a`, `a_b`, `a_c`, `a_d`, `r_a`, `chapter_id`, `class_id`) VALUES
(1, 0, 1960, 1970, 1980, 1990, 0, 7, 1),
(2, 0, 0, 0, 0, 0, 0, 7, 1),
(3, 0, 0, 0, 0, 0, 0, 7, 1),
(4, 0, 0, 0, 0, 0, 0, 7, 1),
(5, 0, 0, 0, 0, 0, 0, 7, 1),
(6, 0, 0, 0, 0, 0, 0, 7, 1),
(7, 0, 0, 0, 0, 0, 0, 7, 1),
(8, 0, 0, 0, 0, 0, 0, 7, 1),
(9, 0, 0, 0, 0, 0, 0, 7, 1),
(10, 0, 0, 0, 0, 0, 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `id_right` int(11) NOT NULL,
  `name_right` int(11) NOT NULL,
  PRIMARY KEY (`id_right`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table of rights when you are logged in';

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  KEY `student_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stu_answers`
--

CREATE TABLE IF NOT EXISTS `stu_answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `idq` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `answer` varchar(3) NOT NULL,
  `tdate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stu_tfanswers`
--

CREATE TABLE IF NOT EXISTS `stu_tfanswers` (
  `stfanswers_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `tdate` datetime NOT NULL,
  PRIMARY KEY (`stfanswers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tfquestions`
--

CREATE TABLE IF NOT EXISTS `tfquestions` (
  `idq` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `Value` varchar(1) CHARACTER SET utf8 NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`idq`),
  KEY `charapter_questions` (`chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tfquestions`
--

INSERT INTO `tfquestions` (`idq`, `question`, `Value`, `chapter_id`, `class_id`) VALUES
(1, 'OO languages are defined by encapsulation, inheritance, polymorphism, and composition.', 'T', 7, 1),
(2, 'OO code is meant to replace structured code and has become the dominant development paradigm.', 'F', 7, 1),
(3, 'In OO design, the attributes and behaviors are contained within a single object, whereas in procedural or structured design, the attributes and behaviors are normally separated.', 'T', 7, 1),
(4, 'To ensure data integrity, properly designed OO models should include global data.', 'F', 7, 1),
(5, 'Classes are considered the blueprint for objects. This means that they define the basic building blocks of objects: attributes, behaviors, and methods.', 'T', 7, 1),
(6, 'One of the primary disadvantages of using objects is that the object must reveal all its attributes and behaviors.', 'F', 7, 1),
(7, 'Data hiding requires that all attributes are public and a part of the class interface. ', 'F', 7, 1),
(8, 'In OO, you can reuse a code as many times as you want.', 'T', 7, 1),
(9, 'A subclass inherits attributes from its superclass, which allows it to perform as a superclass.', 'T', 7, 1),
(10, 'There are only two ways to build classes from other classes: inheritance and polymorphism.', 'F', 7, 1),
(11, 'OO languages are defined by encapsulation, inheritance, polymorphism, and composition.', 'T', 7, 1),
(12, 'OO code is meant to replace structured code and has become the dominant development paradigm.', 'F', 7, 1),
(13, 'In OO design, the attributes and behaviors are contained within a single object, whereas in procedural or structured design, the attributes and behaviors are normally separated.', 'T', 7, 1),
(14, 'To ensure data integrity, properly designed OO models should include global data.', 'F', 7, 1),
(15, 'Classes are considered the blueprint for objects. This means that they define the basic building blocks of objects: attributes, behaviors, and methods.', 'T', 7, 1),
(16, 'One of the primary disadvantages of using objects is that the object must reveal all its attributes and behaviors.', 'F', 7, 1),
(17, 'Data hiding requires that all attributes are public and a part of the class interface. ', 'F', 7, 1),
(18, 'In OO, you can reuse a code as many times as you want.', 'T', 7, 1),
(19, 'A subclass inherits attributes from its superclass, which allows it to perform as a superclass.', 'T', 7, 1),
(20, 'There are only two ways to build classes from other classes: inheritance and polymorphism.', 'F', 7, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tfquestions`
--
ALTER TABLE `tfquestions`
  ADD CONSTRAINT `tfquestions_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
