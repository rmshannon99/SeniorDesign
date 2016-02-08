-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2016 at 06:19 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `ID` int(11) NOT NULL,
  `Question` varchar(1000) DEFAULT NULL,
  `OptionA` varchar(1000) DEFAULT NULL,
  `OptionB` varchar(1000) DEFAULT NULL,
  `OptionC` varchar(1000) DEFAULT NULL,
  `OptionD` varchar(1000) DEFAULT NULL,
  `CorrectOption` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`ID`, `Question`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `CorrectOption`) VALUES
(1, 'What is your name?', 'Reed', 'Jason', 'Xiruo', 'Aleah', 'Reed'),
(2, 'Where are you from?', 'UK', 'USA', 'China', 'Vietnam', 'USA'),
(3, 'How are you you?', '18', '19', '20', '21', '21');

-- --------------------------------------------------------

--
-- Table structure for table `simulation_configuration`
--

CREATE TABLE `simulation_configuration` (
  `ConfigurationID` int(11) NOT NULL,
  `BloodPressure` int(11) NOT NULL,
  `HeartRate` int(11) NOT NULL,
  `AirwayRespiratory` int(11) NOT NULL,
  `ParentState` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simulation_configuration`
--

INSERT INTO `simulation_configuration` (`ConfigurationID`, `BloodPressure`, `HeartRate`, `AirwayRespiratory`, `ParentState`) VALUES
(1, 100, 100, 100, 'Happy');

-- --------------------------------------------------------

--
-- Table structure for table `student_response`
--

CREATE TABLE `student_response` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `ChosenOption` varchar(10) DEFAULT NULL,
  `TextResponse` varchar(1000) DEFAULT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table stores student''s reponses';

--
-- Dumping data for table `student_response`
--

INSERT INTO `student_response` (`ID`, `userID`, `QuestionID`, `ChosenOption`, `TextResponse`, `Feedback`) VALUES
(1, 12, 1, 'Reed', 'A', 'Whatever'),
(2, 12, 2, 'UK', 'A', 'Whatever'),
(3, 12, 3, '18', 'A', 'Whatever'),
(4, 13, 1, 'Jason', 'B', ''),
(5, 13, 2, 'USA', 'B', ''),
(6, 13, 3, '19', 'B', ''),
(7, 15, 1, 'Xiruo', 'C', ''),
(8, 15, 2, 'China', 'C', ''),
(9, 15, 3, '20', 'C', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `userID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`userID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`) VALUES
(1, 'admin', 'asdasd', 'Nhan', 'Tran', 'ntt38@drexel.edu'),
(12, 'testtest1', 'asd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(13, 'testtest2', 'asd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(14, 'testtest3', 'asd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(15, 'ntt38', 'asdasd', 'asd', 'asd', 'huyemil@hotmail.no'),
(16, 'asd', 'asdasd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(17, 'asdasd', 'asdasd', 'asd', 'asd', 'jeg96@drexel.edu'),
(18, 'final', 'asdasd', 'asd', 'asd', 'abc@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `simulation_configuration`
--
ALTER TABLE `simulation_configuration`
  ADD PRIMARY KEY (`ConfigurationID`);

--
-- Indexes for table `student_response`
--
ALTER TABLE `student_response`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QuestionID` (`QuestionID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `simulation_configuration`
--
ALTER TABLE `simulation_configuration`
  MODIFY `ConfigurationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_response`
--
ALTER TABLE `student_response`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
