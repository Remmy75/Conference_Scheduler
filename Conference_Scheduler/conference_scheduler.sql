-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 05:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conference_scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `category_name`) VALUES
(13, '80\'s Rock'),
(14, 'Unknown Rumors'),
(15, 'Terrible Terrible Hype'),
(16, 'Mashups'),
(17, 'Lack of Sleep Does Help Programming'),
(18, 'Kitchen Excercises'),
(19, 'Around The TV'),
(20, 'Overrated'),
(21, 'Build me a Lego Fort'),
(22, 'Gone Again'),
(23, 'Lonely Place For You TO Be'),
(24, 'If You Need a Friend'),
(25, 'Sorrowful Books'),
(26, 'One Love, One Lip'),
(27, 'The End is Near');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `conference_num` int(11) NOT NULL,
  `conference_name` varchar(50) NOT NULL,
  `conference_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`conference_num`, `conference_name`, `conference_location`) VALUES
(3, 'Test Conference', 'State Office Building'),
(4, 'Second Test', 'State Office Building');

-- --------------------------------------------------------

--
-- Table structure for table `conference_locations`
--

CREATE TABLE `conference_locations` (
  `conference_locationsID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `conference_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_locations`
--

INSERT INTO `conference_locations` (`conference_locationsID`, `locationID`, `conference_num`) VALUES
(2, 2, 3),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(12, 8, 4),
(13, 9, 4),
(14, 10, 4),
(15, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `conference_schedule`
--

CREATE TABLE `conference_schedule` (
  `scheduleID` int(11) NOT NULL,
  `conference_num` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference_speakers`
--

CREATE TABLE `conference_speakers` (
  `conference_titleID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `conference_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conference_speakers`
--

INSERT INTO `conference_speakers` (`conference_titleID`, `titleID`, `conference_num`) VALUES
(1, 8, 3),
(2, 9, 3),
(3, 10, 3),
(4, 11, 3),
(5, 12, 3),
(6, 13, 3),
(7, 14, 3),
(8, 15, 3),
(9, 16, 3),
(10, 17, 3),
(11, 18, 3),
(12, 19, 3),
(13, 20, 3),
(14, 21, 3),
(15, 22, 3),
(16, 23, 3),
(17, 24, 3),
(18, 25, 3),
(19, 26, 3),
(20, 27, 3),
(21, 28, 3),
(22, 29, 3),
(23, 30, 3),
(24, 31, 3),
(25, 32, 3),
(26, 33, 3),
(27, 34, 3),
(28, 35, 3),
(29, 36, 3),
(30, 37, 3),
(31, 8, 4),
(32, 9, 4),
(33, 10, 4),
(34, 11, 4),
(35, 12, 4),
(36, 13, 4),
(37, 15, 4),
(38, 16, 4),
(39, 14, 4),
(40, 17, 4),
(41, 18, 4),
(42, 19, 4),
(43, 20, 4),
(44, 21, 4),
(45, 22, 4),
(46, 23, 4),
(47, 24, 4),
(48, 25, 4),
(49, 26, 4),
(50, 27, 4),
(51, 28, 4),
(52, 29, 4),
(53, 30, 4),
(54, 31, 4);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipID`, `Name`) VALUES
(2, 'Wifi'),
(3, 'Projector'),
(4, '50 Seats'),
(5, 'Whiteboard'),
(6, 'Laptop'),
(7, 'HDMI Cords'),
(8, 'Dual Monitors'),
(9, 'Tablet'),
(10, 'Remote'),
(11, 'Speakers');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationID` int(11) NOT NULL,
  `bldg_name` varchar(50) NOT NULL,
  `room_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`locationID`, `bldg_name`, `room_num`) VALUES
(2, 'State Office Building', 'vr-222'),
(3, 'State Office Building', 'Conference A'),
(4, 'State Office Building', 'Conference B'),
(5, 'State Office Building', 'Auditorium'),
(6, 'State Office Building', 'Conference C'),
(7, 'State Office Building', 'Conference D'),
(8, 'State Office Building', 'Break Room'),
(9, 'State Office Building', 'LS-335'),
(10, 'State Office Building', 'SPED A'),
(11, 'State Office Building', 'Press Room');

-- --------------------------------------------------------

--
-- Table structure for table `location_equip`
--

CREATE TABLE `location_equip` (
  `location_equipID` int(11) NOT NULL,
  `equipID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_equip`
--

INSERT INTO `location_equip` (`location_equipID`, `equipID`, `locationID`) VALUES
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `location_title`
--

CREATE TABLE `location_title` (
  `location_titleID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `session_number` int(11) NOT NULL,
  `conference_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_title`
--

INSERT INTO `location_title` (`location_titleID`, `locationID`, `titleID`, `session_number`, `conference_num`) VALUES
(1047, 2, 8, 1, 3),
(1048, 2, 9, 2, 3),
(1049, 2, 10, 3, 3),
(1050, 2, 11, 4, 3),
(1051, 2, 12, 5, 3),
(1052, 3, 13, 1, 3),
(1053, 3, 14, 2, 3),
(1054, 3, 15, 3, 3),
(1055, 3, 16, 4, 3),
(1056, 3, 17, 5, 3),
(1057, 4, 18, 1, 3),
(1058, 4, 19, 2, 3),
(1059, 4, 20, 3, 3),
(1060, 4, 21, 4, 3),
(1061, 4, 22, 5, 3),
(1062, 5, 23, 1, 3),
(1063, 5, 24, 2, 3),
(1064, 5, 25, 3, 3),
(1065, 5, 26, 4, 3),
(1066, 5, 27, 5, 3),
(1067, 6, 28, 1, 3),
(1068, 6, 29, 2, 3),
(1069, 6, 30, 3, 3),
(1070, 6, 31, 4, 3),
(1071, 6, 32, 5, 3),
(1072, 7, 33, 1, 3),
(1073, 7, 34, 2, 3),
(1074, 7, 35, 3, 3),
(1075, 7, 36, 4, 3),
(1076, 7, 37, 5, 3),
(1077, 8, 8, 1, 4),
(1078, 9, 9, 1, 4),
(1079, 10, 10, 1, 4),
(1080, 11, 11, 1, 4),
(1081, 8, 12, 2, 4),
(1082, 9, 13, 2, 4),
(1083, 10, 14, 2, 4),
(1084, 11, 15, 2, 4),
(1085, 8, 16, 3, 4),
(1086, 9, 17, 3, 4),
(1087, 10, 18, 3, 4),
(1088, 11, 19, 3, 4),
(1089, 8, 20, 4, 4),
(1090, 9, 21, 4, 4),
(1091, 10, 22, 4, 4),
(1092, 11, 23, 4, 4),
(1093, 8, 24, 5, 4),
(1094, 9, 25, 5, 4),
(1095, 10, 26, 5, 4),
(1096, 11, 27, 5, 4),
(1097, 8, 28, 6, 4),
(1098, 9, 29, 6, 4),
(1099, 10, 30, 6, 4),
(1100, 11, 31, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speakerID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`speakerID`, `fName`, `lName`) VALUES
(6, 'Will', 'Remaklus'),
(7, 'Tonya', 'Jones'),
(8, 'Bruce', 'Willis'),
(9, 'Kurt', 'Cobain'),
(10, 'Puddles', 'Pity Party'),
(11, 'Axl', 'Rose'),
(12, 'Jani', 'Lane'),
(13, 'Scooby', 'Doo'),
(14, 'Dean', 'Koontz'),
(15, 'Ed', 'Greenwood'),
(16, 'Richard', 'Knaak'),
(17, 'Buddy', 'Holly'),
(18, 'Sabastian', 'Bach'),
(19, 'Kip', 'Winger'),
(20, 'Alyssa', 'Milano'),
(21, 'Jolly', 'Rancher'),
(22, 'Hippity', 'Hop'),
(23, 'Funky', 'Winkerbean'),
(24, 'Tanis', 'Half-elven'),
(25, 'Sturm', 'Brightblade'),
(26, 'Tasselhoff', 'Burrfoot'),
(27, 'Drizzt', 'Do\'Urden'),
(28, 'Raistlin', 'Majere'),
(29, 'Royce', 'Gracie'),
(30, 'Evander', 'Holyfield'),
(31, 'Minnie', 'Mouse'),
(32, 'Lane', 'Staley'),
(33, 'Han', 'Solo'),
(34, 'Thomas', 'Magnum Sr'),
(35, 'Fox', 'Mulder');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `titleID` int(11) NOT NULL,
  `title_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`titleID`, `title_name`) VALUES
(8, 'Extreme Pop'),
(9, 'Hold ME'),
(10, 'Holy Cow This Is Taking Forever'),
(11, 'Nakitomi Plaza'),
(12, 'Killing in a Bad Moon'),
(13, 'Tweakers'),
(14, '80\'s Hair Bands'),
(15, 'War Pigs'),
(16, 'Trump Won?'),
(17, 'Morbid Metals'),
(18, 'Whole Lotta Sabbath'),
(19, 'Hotel Rescue'),
(20, 'This is All in PHP'),
(21, 'Spaghetti Code is my First Name'),
(22, 'What do you get when you lose all your data on a SSD?'),
(23, 'PTSSD'),
(24, 'Why does Python live on land?'),
(25, 'Because its above C Level'),
(26, 'Hotel Full of Secrets'),
(27, 'Iron Maiden who?'),
(28, 'Golden Teardrops'),
(29, 'Fred Scott Really Likes Cyndi Lauper'),
(30, 'Here We Are Again'),
(31, 'Space Travel with a Wookie'),
(32, 'Who\'s Arguing?'),
(33, 'Dancing With the Stars was Made by Communists'),
(34, 'Who\'s on first?'),
(35, 'Three Stooges'),
(36, 'Paper Clips hurt'),
(37, 'Last One Thank God');

-- --------------------------------------------------------

--
-- Table structure for table `title_categories`
--

CREATE TABLE `title_categories` (
  `title_categoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_categories`
--

INSERT INTO `title_categories` (`title_categoryID`, `categoryID`, `titleID`) VALUES
(6, 13, 8),
(7, 14, 9),
(8, 15, 10),
(9, 16, 11),
(10, 17, 12),
(11, 18, 13),
(12, 13, 14),
(13, 14, 15),
(14, 15, 16),
(15, 16, 17),
(16, 17, 18),
(17, 18, 19),
(18, 13, 20),
(19, 14, 21),
(20, 15, 22),
(21, 16, 23),
(22, 17, 24),
(23, 18, 25),
(24, 13, 26),
(25, 14, 27),
(26, 15, 28),
(27, 16, 29),
(28, 17, 30),
(29, 18, 31),
(30, 13, 32),
(31, 14, 33),
(32, 15, 34),
(33, 16, 35),
(34, 17, 36),
(35, 18, 37);

-- --------------------------------------------------------

--
-- Table structure for table `title_needs`
--

CREATE TABLE `title_needs` (
  `title_needsID` int(11) NOT NULL,
  `equipID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `title_speakers`
--

CREATE TABLE `title_speakers` (
  `title_speakerID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `speakerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_speakers`
--

INSERT INTO `title_speakers` (`title_speakerID`, `titleID`, `speakerID`) VALUES
(3, 8, 6),
(4, 9, 7),
(5, 10, 8),
(6, 11, 9),
(7, 12, 10),
(8, 13, 11),
(9, 14, 12),
(10, 15, 13),
(11, 16, 14),
(12, 17, 15),
(13, 18, 16),
(14, 19, 17),
(15, 20, 18),
(16, 21, 19),
(17, 22, 20),
(18, 23, 21),
(19, 24, 22),
(20, 25, 23),
(21, 26, 24),
(22, 27, 25),
(23, 28, 26),
(24, 30, 27),
(25, 31, 28),
(26, 32, 29),
(27, 33, 30),
(28, 34, 31),
(29, 35, 32),
(30, 36, 33),
(31, 37, 34),
(32, 29, 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`conference_num`);

--
-- Indexes for table `conference_locations`
--
ALTER TABLE `conference_locations`
  ADD PRIMARY KEY (`conference_locationsID`),
  ADD KEY `FK_Locations_locationsID` (`locationID`),
  ADD KEY `FK_Conferences_conference_num_CL` (`conference_num`);

--
-- Indexes for table `conference_schedule`
--
ALTER TABLE `conference_schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `FK_Conferences_conference_num` (`conference_num`),
  ADD KEY `FK_Title_titleID` (`titleID`),
  ADD KEY `FK_Locations_locationID` (`locationID`);

--
-- Indexes for table `conference_speakers`
--
ALTER TABLE `conference_speakers`
  ADD PRIMARY KEY (`conference_titleID`),
  ADD KEY `FK_Title_titleID_CS` (`titleID`),
  ADD KEY `FK_Conferences_conference_num_CS` (`conference_num`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `location_equip`
--
ALTER TABLE `location_equip`
  ADD PRIMARY KEY (`location_equipID`),
  ADD KEY `FK_Equipment_equipID` (`equipID`),
  ADD KEY `FK_Locations_locationID_LE` (`locationID`);

--
-- Indexes for table `location_title`
--
ALTER TABLE `location_title`
  ADD PRIMARY KEY (`location_titleID`),
  ADD KEY `FK_locations_locationID_LT` (`locationID`),
  ADD KEY `FK_title_titleID_LT` (`titleID`),
  ADD KEY `FK_conferences_conference_num_LT` (`conference_num`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`speakerID`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`titleID`);

--
-- Indexes for table `title_categories`
--
ALTER TABLE `title_categories`
  ADD PRIMARY KEY (`title_categoryID`),
  ADD KEY `FK_Category_categoryID` (`categoryID`),
  ADD KEY `FK_Title_titleID_TC` (`titleID`);

--
-- Indexes for table `title_needs`
--
ALTER TABLE `title_needs`
  ADD PRIMARY KEY (`title_needsID`),
  ADD KEY `FK_Title_titleID_TN` (`titleID`),
  ADD KEY `FK_Equipment_equipID_TN` (`equipID`);

--
-- Indexes for table `title_speakers`
--
ALTER TABLE `title_speakers`
  ADD PRIMARY KEY (`title_speakerID`),
  ADD KEY `FK_Title_titleID_TS` (`titleID`),
  ADD KEY `FK_Speakers_speakerID_TS` (`speakerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `conference_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conference_locations`
--
ALTER TABLE `conference_locations`
  MODIFY `conference_locationsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `conference_schedule`
--
ALTER TABLE `conference_schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conference_speakers`
--
ALTER TABLE `conference_speakers`
  MODIFY `conference_titleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location_equip`
--
ALTER TABLE `location_equip`
  MODIFY `location_equipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `location_title`
--
ALTER TABLE `location_title`
  MODIFY `location_titleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `titleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `title_categories`
--
ALTER TABLE `title_categories`
  MODIFY `title_categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `title_needs`
--
ALTER TABLE `title_needs`
  MODIFY `title_needsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_speakers`
--
ALTER TABLE `title_speakers`
  MODIFY `title_speakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conference_locations`
--
ALTER TABLE `conference_locations`
  ADD CONSTRAINT `FK_Conferences_conference_num_CL` FOREIGN KEY (`conference_num`) REFERENCES `conferences` (`conference_num`),
  ADD CONSTRAINT `FK_Locations_locationsID` FOREIGN KEY (`locationID`) REFERENCES `locations` (`locationID`);

--
-- Constraints for table `conference_schedule`
--
ALTER TABLE `conference_schedule`
  ADD CONSTRAINT `FK_Conferences_conference_num` FOREIGN KEY (`conference_num`) REFERENCES `conferences` (`conference_num`),
  ADD CONSTRAINT `FK_Locations_locationID` FOREIGN KEY (`locationID`) REFERENCES `locations` (`locationID`),
  ADD CONSTRAINT `FK_Title_titleID` FOREIGN KEY (`titleID`) REFERENCES `title` (`titleID`);

--
-- Constraints for table `conference_speakers`
--
ALTER TABLE `conference_speakers`
  ADD CONSTRAINT `FK_Conferences_conference_num_CS` FOREIGN KEY (`conference_num`) REFERENCES `conferences` (`conference_num`),
  ADD CONSTRAINT `FK_Title_titleID_CS` FOREIGN KEY (`titleID`) REFERENCES `title` (`titleID`);

--
-- Constraints for table `location_equip`
--
ALTER TABLE `location_equip`
  ADD CONSTRAINT `FK_Equipment_equipID` FOREIGN KEY (`equipID`) REFERENCES `equipment` (`equipID`),
  ADD CONSTRAINT `FK_Locations_locationID_LE` FOREIGN KEY (`locationID`) REFERENCES `locations` (`locationID`);

--
-- Constraints for table `location_title`
--
ALTER TABLE `location_title`
  ADD CONSTRAINT `FK_conferences_conference_num_LT` FOREIGN KEY (`conference_num`) REFERENCES `conferences` (`conference_num`),
  ADD CONSTRAINT `FK_locations_locationID_LT` FOREIGN KEY (`locationID`) REFERENCES `locations` (`locationID`),
  ADD CONSTRAINT `FK_title_titleID_LT` FOREIGN KEY (`titleID`) REFERENCES `title` (`titleID`);

--
-- Constraints for table `title_categories`
--
ALTER TABLE `title_categories`
  ADD CONSTRAINT `FK_Category_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `FK_Title_titleID_TC` FOREIGN KEY (`titleID`) REFERENCES `title` (`titleID`);

--
-- Constraints for table `title_needs`
--
ALTER TABLE `title_needs`
  ADD CONSTRAINT `FK_Equipment_equipID_TN` FOREIGN KEY (`equipID`) REFERENCES `equipment` (`equipID`),
  ADD CONSTRAINT `FK_Title_titleID_TN` FOREIGN KEY (`titleID`) REFERENCES `title` (`titleID`);

--
-- Constraints for table `title_speakers`
--
ALTER TABLE `title_speakers`
  ADD CONSTRAINT `FK_Speakers_speakerID_TS` FOREIGN KEY (`speakerID`) REFERENCES `speakers` (`speakerID`),
  ADD CONSTRAINT `FK_Title_titleID_TS` FOREIGN KEY (`titleID`) REFERENCES `title` (`titleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
