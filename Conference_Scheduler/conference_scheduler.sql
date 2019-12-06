-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 05:01 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `conference_num` int(11) NOT NULL,
  `conference_name` varchar(50) NOT NULL,
  `conference_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference_locations`
--

CREATE TABLE `conference_locations` (
  `conference_locationsID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `conference_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationID` int(11) NOT NULL,
  `bldg_name` varchar(50) NOT NULL,
  `room_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_equip`
--

CREATE TABLE `location_equip` (
  `location_equipID` int(11) NOT NULL,
  `equipID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location_title`
--

CREATE TABLE `location_title` (
  `location_titleID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `conference_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speakerID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `phone_num` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `titleID` int(11) NOT NULL,
  `title_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `title_categories`
--

CREATE TABLE `title_categories` (
  `title_categoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `conference_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conference_locations`
--
ALTER TABLE `conference_locations`
  MODIFY `conference_locationsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conference_schedule`
--
ALTER TABLE `conference_schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conference_speakers`
--
ALTER TABLE `conference_speakers`
  MODIFY `conference_titleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_equip`
--
ALTER TABLE `location_equip`
  MODIFY `location_equipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_title`
--
ALTER TABLE `location_title`
  MODIFY `location_titleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `titleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `title_categories`
--
ALTER TABLE `title_categories`
  MODIFY `title_categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `title_needs`
--
ALTER TABLE `title_needs`
  MODIFY `title_needsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `title_speakers`
--
ALTER TABLE `title_speakers`
  MODIFY `title_speakerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
