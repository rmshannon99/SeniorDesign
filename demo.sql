

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE `baby_information` (
  `BabyInformationID` int(11) NOT NULL,
  `SceneID` int(11) NOT NULL,
  `SceneOption` text NOT NULL,
  `BabyInformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `baby_information` (`BabyInformationID`, `SceneID`, `SceneOption`, `BabyInformation`) VALUES
(1, 3, 'Tell me about Vicky''s birth history', 'She was born term and vaginal delivery. During delivery, she had runs of a fast heart rate and difficult time adjusting.She did not go home with me and stayed in the hospital for a week. They said her perfusion was not good. She was admitted to the NICU immediately after birth and put on antibiotics for a week. She had cultures done of her blood and spinal fluid; nothing grew.'),
(2, 3, 'Does Vicky have any past medical history?', 'She failed hearing screen in the NICU 2 X and we are seeing a ear, nose and throat doctor for that; they are concerned with hearing loss. She had a xray or CT scan of her ears- showed nothing'),
(3, 3, 'Where do you live? Does anyone smoke?', 'Nobody smokes'),
(4, 3, 'Any history of hearing loss in the family?', 'No'),
(5, 3, 'How is she growing? Can she make sounds, support her head, grab items with her hands?', 'Doctor says she meeting her milestones, sits with support, holds her head up, babbles and grabs a rattle and brings it to her other hand. She is low on her weight within the growth chart. Has not been eating well , tires with a bottle'),
(6, 3, 'Any recent illness?', 'No fevers, had ear infection a week ago, this is her second ear infection this year'),
(7, 3, 'Are immunizations and shots up to date?', 'Yes'),
(8, 3, 'What is her typical diet? How does she feed?', 'She is on yellow vegetables and cereal. She is typically sweaty and tired with feeds.'),
(9, 3, 'Any recent injuries, last ear infection, runny nose, cough, wheezing, sore throat , problems with swallowing?', 'Last ear infection a week ago and put on Amoxcillin and another one two months ago. I think she might have a sinus infection because she has this discoloration under her eyes Head: Denies head injury; Eyes: no redness or tearing; Nose: a Denies congestion, runny nose, nose bleeds; Mouth and throat: Denies difficulty opening mouth or swallowing, mouth sores.'),
(10, 3, 'How does she breath ? Any congestion?', 'breaths fast sometimes; denies any wheezing, rhonchi, coarse breath sounds.'),
(11, 3, 'Any heart problems? Any swelling or edema? Playful? Color changes with feeds?', 'Sweaty with feeds, they said she had elevated BP at PCP and doctor said she had a murmur'),
(12, 3, 'Any vomiting, diarrhea, constipation, not tolerating food?', 'No, none of that.'),
(13, 3, 'Any problems with her peeing, urinary infection, changing her diapers frequently, vaginal discharge, rash?', 'No'),
(14, 3, 'Any pain with movement or swelling in her legs or arms?', 'She is able to sit in her infant seat, holds her heads, moves all her legs and hands well; grabs objects, NO joint redness or swelling, denies extremity swelling or discoloration'),
(15, 3, 'Any recent rashes, redness, or changes in skin color?', 'No'),
(16, 3, 'Any seizures, or change in activity, tremors or shaking?', 'Nothing like that. She only gets sweaty with feeds.'),
(17, 3, 'Any past surgeries?', 'No, nothing like that.'),
(18, 3, 'Does Vicky have any allergies?', 'No allergies'),
(19, 4, 'Review medical hisotry', 'Birth history: born at 39 weeks 5 days via spontaneous vaginal delivery. During delivery, she had runs of fetal tachycardia and her perfusion was thought to be poor immediately after delivery. Due to these factors, she was admitted to the NICU immediately after birth and received antibiotics (ampicillin and gentamicin) for 7 days. All cultures were subsequently negative. \r\n\r\nPast medical history: failed hearing screen in the NICU x2 - is currently followed by ENT for hearing loss. \r\n\r\nCT scan of the temporal bones showed no abnormality in the temporal bones but minimal thinning of the bone overlying each semicircular canal and along the roof of the mastoid. \r\n\r\nShe wears bilateral hearing aids \r\n\r\nPast surgical history: No past surgical history \r\n\r\nAllergies: No known allergies \r\n\r\nSocial history: Vicky lives at home with her parents and 1 dog in suburban PA. She is an only child. There are no smokers in the home. \r\n\r\nFamily history: no pertinent family history \r\n\r\nDevelopmental history: 3rd% for weight for age, meeting all developmental milestones (babbles, sits up unsupported, grabs things with hand \r\n\r\nImmunizations are up to date'),
(20, 4, 'Physical Exam', 'VS: BP 145/81, HR 136, Temp 36.3 C, RR 60, SpO2 98% on RA General: alert, active, mild distress secondary to tachypnea and diaphoretic Head: normocephalic and atraumatic, anterior fontanel open and flat Eyes: pupils equal, round and reactive to light, extra-ocular movements intact and normal conjunctivae, eyes brown, EOMI, red reflex present; Eyes bruising under her eyes ENT: moist mucous membranes, mild nasal congestion. Tympanic membranes with serous fluid bilaterally, and oropharynx clear Neck: neck is supple with full active ROM Cardiac: regular rhythm, tachycardia and gallop, normal S1 and S2, +2 femoral/radial pulses'),
(21, 6, 'Ultrasound', 'Large heterogeneous mass within the midline abdomen extending to the RUQ with areas of clarification. Primary differential consideration is Neuroblastoma. Heterogeneity within the right lobe of the liver adjacent to the above-described mass, concerning for possible metastatic disease.'),
(22, 6, 'EKG/ Echocardiogram', 'Tachycardia to 150s, concern for mild left ventricular dysfunction.'),
(23, 6, 'Complete Blood Count with diff and plts, BNP', 'No new information'),
(24, 6, 'ABG', 'No new information'),
(25, 6, 'Urinalysis', 'VMA/HVA Urine '),
(26, 6, 'Chest X-ray', 'Calcified abdominal mass, likely neuroblastoma. mild cardiomegaly.'),
(27, 7, 'BNP', '732 (H)'),
(28, 7, 'CMP', 'Normal'),
(29, 7, 'PT/PTT', 'Normal'),
(30, 7, 'CRP', '<0.5'),
(31, 7, 'ESR', '5'),
(32, 7, 'Amylase Lipase', 'Normal'),
(33, 7, 'VBG', 'K=3.2 (L), Hgb=10.6 (L), Hct=31 (L), Ica=1.24 (H)'),
(34, 7, 'Urinalysis', 'VMA/HVA Urine 550 (H) / 418 (H)'),
(35, 7, 'Alpha-1-Fetoprotein', '32.3'),
(36, 7, 'Beta HCG', '<2.4'),
(37, 7, 'CBC with diff', 'Normal');


CREATE TABLE `question_table` (
  `ID` int(11) NOT NULL,
  `Question` varchar(1000) DEFAULT NULL,
  `OptionA` varchar(1000) DEFAULT NULL,
  `OptionB` varchar(1000) DEFAULT NULL,
  `OptionC` varchar(1000) DEFAULT NULL,
  `OptionD` varchar(1000) DEFAULT NULL,
  `CorrectOption` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `question_table` (`ID`, `Question`, `OptionA`, `OptionB`, `OptionC`, `OptionD`, `CorrectOption`) VALUES
(1, 'What is your name?', 'Reed', 'Jason', 'Xiruo', 'Aleah', 'Reed'),
(2, 'Where are you from?', 'UK', 'USA', 'China', 'Vietnam', 'USA'),
(3, 'How are you you?', '18', '19', '20', '21', '21');


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

INSERT INTO `scene_table` (`SceneID`, `SceneInformation`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `J`, `K`, `L`, `M`, `N`, `O`, `P`, `Q`, `R`) VALUES
(1, 'Vicky, a 6 month old female has just been brought by her parents into the ER.  The parents approach you, what do you do?', 'Greet the parents. "Hello, my name is _____. What brings you in today?"', 'Introduce yourself', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'We went to the pediatricians for a follow up from her ear infection. The doctor was concerned for mass in the abdomen. The doctor was also concerned because we mentioned that she doesn''t finish her bottle all the time and gets sweaty with feeds. He sent us to the Emergency room to check out this mass in the belly and to have her heart checked out as well. Does she have cancer? We are scared', 'I''m sure Vicky will be fine. Please take a seat', 'We''ll do everything we can to help her. Please take a seat and we will keep you updated', 'It is probably cancer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'You must gather more information about the case. Ask the parents some questions you think are relevant', 'Tell me about Vicky''s birth history', 'Does Vicky have any past medical history?', 'Does Vicky have any allergies?', 'Where do you live? Does anyone smoke?', 'Any history of hearing loss in the family?', 'How is she growing? Can she make sounds, support her head, grab items with her hands?', 'Any recent illness?', 'Are immunizations and shots up to date?', 'What is her typical diet? How does she feed?', 'Any recent injuries, last ear infection, runny nose, cough, wheezing, sore throat , problems with swallowing?', 'How does she breath ? Any congestion?', 'Any heart problems? Any swelling or edema? Playful? Color changes with feeds?', 'Any vomiting, diarrhea, constipation, not tolerating food?', 'Any problems with her peeing, urinary infection, changing her diapers frequently, vaginal discharge, rash?', 'Any pain with movement or swelling in her legs or arms?', 'Any recent rashes, redness, or changes in skin color?', 'Any seizures, or change in activity, tremors or shaking?', ''),
(4, 'The parents need a break after answering so many questions. What do you do next?', 'Physical Exam', 'Review medical hisotry', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'You step into the waiting room. Vicki''s parents leap forward. "What''s going on with my baby?"', 'Your baby is going to be fine. We just need to run some tests.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'You must decide which tests to perform on Vicky and extrapolate information from the tests you choose.', 'Chest X-ray', 'Ultrasound', 'EKG/ Echocardiogram', 'Complete Blood Count with diff and plts, BNP', 'ABG', 'Urinalysis', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'Do you want to order any labs?', 'CBC with diff', 'BNP', 'CMP', 'PT/PTT', 'CRP', 'ESR', 'Amylase Lipase', 'Urinalysis', 'Alpha-1-Fetoprotein', 'Beta HCG', '', '', '', '', '', '', '', ''),
(8, 'The parents run up to you as you look over the test and lab results. "Nobody will tell us what''s going on! What is happening with Vicky?". Here is your guess:', 'Vicky has Neuroblastoma.', 'Vicky has Wilm''s tumor.', 'Vicky has new onset heart failure.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


CREATE TABLE `simulation_configuration` (
  `ConfigurationID` int(11) NOT NULL,
  `BloodPressure` int(11) NOT NULL,
  `HeartRate` int(11) NOT NULL,
  `AirwayRespiratory` int(11) NOT NULL,
  `ParentState` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `simulation_configuration` (`ConfigurationID`, `BloodPressure`, `HeartRate`, `AirwayRespiratory`, `ParentState`) VALUES
(1, 57, 81, 67, 'Angry');

CREATE TABLE `student_response` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `QuestionID` int(11) DEFAULT NULL,
  `ChosenOption` varchar(10) DEFAULT NULL,
  `TextResponse` varchar(1000) DEFAULT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table stores student''s reponses';


CREATE TABLE `student_response_new` (
  `ID` int(11) NOT NULL,
  `SceneID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `ChosenOption` text NOT NULL,
  `TextResponse` text NOT NULL,
  `Feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_response_new` (`ID`, `SceneID`, `userID`, `ChosenOption`, `TextResponse`, `Feedback`) VALUES
(11, 1, 15, 'Greet the parents. "Hello, my name is _____. What brings you in today?"', '', 'Common ! Please works !'),
(12, 2, 15, 'We''ll do everything we can to help her. Please take a seat and we will keep you updated', '', 'Common ! Please works !'),
(13, 3, 15, 'Does Vicky have any past medical history?', 'Test', 'Common ! Please works !'),
(14, 3, 15, 'What is her typical diet? How does she feed?', 'asdasd', 'Common ! Please works !'),
(15, 4, 15, 'Physical Exam', 'asdasdasdasdasd', 'Common ! Please works !'),
(16, 4, 15, 'Review medical hisotry', '', 'Common ! Please works !'),
(17, 5, 15, 'Your baby is going to be fine. We just need to run some tests.', '', 'Common ! Please works !'),
(18, 6, 15, 'ABG', 'sadasdasdasdasd', 'Common ! Please works !'),
(19, 7, 15, 'PT/PTT', 'asdasdasd', 'Common ! Please works !'),
(20, 7, 15, 'CBC with diff', 'asdasd', 'Common ! Please works !'),
(21, 7, 15, 'Alpha-1-Fetoprotein', 'asdasd', 'Common ! Please works !'),
(22, 8, 15, 'Vicky has new onset heart failure.', '', 'Common ! Please works !'),
(23, 1, 12, 'Introduce yourself', 'sdasd', ''),
(24, 2, 12, 'We''ll do everything we can to help her. Please take a seat and we will keep you updated', 'sdasdasdasdasd', ''),
(25, 3, 12, 'How does she breath ? Any congestion?', 'asdasdasdasdasd', ''),
(26, 3, 12, 'Any recent rashes, redness, or changes in skin color?', 'sadasdasdasdasd', ''),
(27, 3, 12, 'How is she growing? Can she make sounds, support her head, grab items with her hands?', 'sadasdasdasd', ''),
(28, 5, 12, 'Your baby is going to be fine. We just need to run some tests.', '', ''),
(29, 6, 12, 'Chest X-ray', 'asdasdasd', ''),
(30, 6, 12, 'Urinalysis', 'asdasdasd', ''),
(31, 7, 12, 'BNP', 'asdasdasdas', ''),
(32, 8, 12, 'Vicky has Wilm''s tumor.', '', ''),
(33, 1, 13, 'Greet the parents. "Hello, my name is _____. What brings you in today?"', '', ''),
(34, 2, 13, 'I''m sure Vicky will be fine. Please take a seat', '', ''),
(35, 3, 13, 'Tell me about Vicky''s birth history', '', ''),
(36, 5, 13, 'Your baby is going to be fine. We just need to run some tests.', '', ''),
(37, 6, 13, 'EKG/ Echocardiogram', '', ''),
(38, 7, 13, 'CMP', '', ''),
(39, 8, 13, 'Vicky has Neuroblastoma.', '', '');


CREATE TABLE `user_information` (
  `userID` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_information` (`userID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`) VALUES
(1, 'admin', 'asdasd', 'Nhan', 'Tran', 'ntt38@drexel.edu'),
(12, 'testtest1', 'asdasd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(13, 'testtest2', 'asdasd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(14, 'testtest3', 'asd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(15, 'ntt38', 'asdasd', 'Nhan', 'Tran', 'emilhuy0506@gmail.com'),
(16, 'asd', 'asdasd', 'asd', 'asd', 'emilhuy0506@gmail.com'),
(17, 'asdasd', 'asdasd', 'asd', 'asd', 'jeg96@drexel.edu'),
(18, 'final', 'asdasd', 'asd', 'asd', 'abc@gmail.com'),
(19, 'ntran', 'asdasd', 'asdasd', 'asdasd', 'emilhuy0506@gmail.com');

ALTER TABLE `baby_information`
  ADD PRIMARY KEY (`BabyInformationID`);


ALTER TABLE `question_table`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `scene_table`
  ADD PRIMARY KEY (`SceneID`);

ALTER TABLE `simulation_configuration`
  ADD PRIMARY KEY (`ConfigurationID`);

ALTER TABLE `student_response`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `QuestionID` (`QuestionID`),
  ADD KEY `userID` (`userID`);

ALTER TABLE `student_response_new`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SceneID` (`SceneID`),
  ADD KEY `userID` (`userID`);

ALTER TABLE `user_information`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `baby_information`
  MODIFY `BabyInformationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

ALTER TABLE `question_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `scene_table`
  MODIFY `SceneID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `simulation_configuration`
  MODIFY `ConfigurationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `student_response`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `student_response_new`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

ALTER TABLE `user_information`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
