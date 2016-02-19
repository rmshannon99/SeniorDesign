-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2016 at 04:02 PM
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
-- Table structure for table `baby_information`
--

CREATE TABLE `baby_information` (
  `BabyInformationID` int(11) NOT NULL,
  `SceneID` int(11) NOT NULL,
  `SceneOption` text NOT NULL,
  `BabyInformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baby_information`
--

INSERT INTO `baby_information` (`BabyInformationID`, `SceneID`, `SceneOption`, `BabyInformation`) VALUES
(1, 3, 'Tell me about Vicky''s birth history', 'She was born term and vaginal delivery. During delivery, she had runs of a fast heart rate and difficult time adjusting.She did not go home with me and stayed in the hospital for a week. They said her perfusion was not good. She was admitted to the NICU immediately after birth and put on antibiotics for a week. She had cultures done of her blood and spinal fluid; nothing grew.'),
(2, 3, 'Does Vicky have any past medical history?', 'She failed hearing screen in the NICU 2 X and we are seeing a ear, nose and throat doctor for that; they are concerned with hearing loss. She had a xray or CT scan of her ears- showed nothing'),
(3, 4, 'Physical Exam', 'VS: BP 145/81, HR 136, Temp 36.3 C, RR 60, SpO2 98% on RA General: alert, active, mild distress secondary to tachypnea and diaphoretic Head: normocephalic and atraumatic, anterior fontanel open and flat Eyes: pupils equal, round and reactive to light, extra-ocular movements intact and normal conjunctivae, eyes brown, EOMI, red reflex present; Eyes bruising under her eyes ENT: moist mucous membranes, mild nasal congestion. Tympanic membranes with serous fluid bilaterally, and oropharynx clear Neck: neck is supple with full active ROM Cardiac: regular rhythm, tachycardia and gallop, normal S1 and S2, +2 femoral/radial pulses'),
(4, 4, 'Review medical hisotry', 'Birth history: born at 39 weeks 5 days via spontaneous vaginal delivery. During delivery, she had runs of fetal tachycardia and her perfusion was thought to be poor immediately after delivery. Due to these factors, she was admitted to the NICU immediately after birth and received antibiotics (ampicillin and gentamicin) for 7 days. All cultures were subsequently negative. \r\n\r\nPast medical history: failed hearing screen in the NICU x2 - is currently followed by ENT for hearing loss. \r\n\r\nCT scan of the temporal bones showed no abnormality in the temporal bones but minimal thinning of the bone overlying each semicircular canal and along the roof of the mastoid. \r\n\r\nShe wears bilateral hearing aids \r\n\r\nPast surgical history: No past surgical history \r\n\r\nAllergies: No known allergies \r\n\r\nSocial history: Vicky lives at home with her parents and 1 dog in suburban PA. She is an only child. There are no smokers in the home. \r\n\r\nFamily history: no pertinent family history \r\n\r\nDevelopmental history: 3rd% for weight for age, meeting all developmental milestones (babbles, sits up unsupported, grabs things with hand \r\n\r\nImmunizations are up to date');

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
-- Table structure for table `scene_table`
--

CREATE TABLE `scene_table` (
  `SceneID` int(11) NOT NULL,
  `SceneInformation` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `E` text NOT NULL,
  `F` text NOT NULL,
  `G` text NOT NULL,
  `H` text NOT NULL,
  `I` text NOT NULL,
  `J` text NOT NULL,
  `K` text NOT NULL,
  `L` text NOT NULL,
  `M` text NOT NULL,
  `N` text NOT NULL,
  `O` text NOT NULL,
  `P` text NOT NULL,
  `Q` text NOT NULL,
  `R` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scene_table`
--

INSERT INTO `scene_table` (`SceneID`, `SceneInformation`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `J`, `K`, `L`, `M`, `N`, `O`, `P`, `Q`, `R`) VALUES
(1, 'Vicky, a 6 month old female has just been brought by her parents into the ER.  The parents approach you, what do you do?', 'Greet the parents. Hello, my name is', 'Introduce yourself', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'We went to the pediatricians for a follow up from her ear infection. The doctor was concerned for mass in the abdomen. The doctor was also concerned because we mentioned that she doesn''t finish her bottle all the time and gets sweaty with feeds. He sent us to the Emergency room to check out this mass in the belly and to have her heart checked out as well. Does she have cancer? We are scared', 'I''m sure Vicky will be fine. Please take a seat', 'We''ll do everything we can to help her. Please take a seat and we will keep you updated', 'It is probably cancer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'You must gather more information about the case. Ask the parents some questions you think are relevant', 'Tell me about Vicky''s birth history', 'Does Vicky have any past medical history?', 'Does Vicky have any allergies?', 'Where do you live? Does anyone smoke?', 'Any history of hearing loss in the family?', 'How is she growing? Can she make sounds, support her head, grab items with her hands?', 'Any recent illness?', 'Are immunizations and shots up to date?', 'What is her typical diet? How does she feed?', 'Any recent injuries, last ear infection, runny nose, cough, wheezing, sore throat , problems with swallowing?', 'How does she breath ? Any congestion?', 'Any heart problems? Any swelling or edema? Playful? Color changes with feeds?', 'Any vomiting, diarrhea, constipation, not tolerating food?', 'Any problems with her peeing, urinary infection, changing her diapers frequently, vaginal discharge, rash?', 'Any pain with movement or swelling in her legs or arms?', 'Any recent rashes, redness, or changes in skin color?', 'Any seizures, or change in activity, tremors or shaking?', ''),
(4, 'The parents need a break after answering so many questions. What do you do next?', 'Physical Exam', 'Review medical hisotry', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 57, 81, 67, 'Angry');

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

-- --------------------------------------------------------

--
-- Table structure for table `student_response_new`
--

CREATE TABLE `student_response_new` (
  `ID` int(11) NOT NULL,
  `SceneID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ChosenOption` text NOT NULL,
  `TextResponse` text NOT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_response_new`
--

INSERT INTO `student_response_new` (`ID`, `SceneID`, `userID`, `ChosenOption`, `TextResponse`, `Feedback`) VALUES
(1, 1, 15, 'Greet the parents. Hello, my name is', 'S1 A', ''),
(2, 2, 15, 'We''ll do everything we can to help her. Please take a seat and we will keep you updated', 'S2 B', ''),
(3, 3, 15, 'Tell me about Vicky''s birth history', 'S3A asdasdasd', ''),
(4, 3, 15, 'Does Vicky have any past medical history?', 'S3B asdasdasdasd', ''),
(5, 4, 15, 'Physical Exam', '', ''),
(6, 4, 15, 'Physical Exam', '', ''),
(7, 4, 15, 'Physical Exam', '', '');

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
(18, 'final', 'asdasd', 'asd', 'asd', 'abc@gmail.com'),
(19, 'ntran', 'asdasd', 'asdasd', 'asdasd', 'emilhuy0506@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baby_information`
--
ALTER TABLE `baby_information`
  ADD PRIMARY KEY (`BabyInformationID`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scene_table`
--
ALTER TABLE `scene_table`
  ADD PRIMARY KEY (`SceneID`);

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
-- Indexes for table `student_response_new`
--
ALTER TABLE `student_response_new`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SceneID` (`SceneID`),
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
-- AUTO_INCREMENT for table `baby_information`
--
ALTER TABLE `baby_information`
  MODIFY `BabyInformationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `scene_table`
--
ALTER TABLE `scene_table`
  MODIFY `SceneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `simulation_configuration`
--
ALTER TABLE `simulation_configuration`
  MODIFY `ConfigurationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_response`
--
ALTER TABLE `student_response`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_response_new`
--
ALTER TABLE `student_response_new`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
