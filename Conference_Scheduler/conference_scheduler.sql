-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 11:48 PM
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
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `conference_num` int(11) NOT NULL,
  `conference_name` varchar(50) NOT NULL,
  `conference_location` varchar(50) NOT NULL,
  `start_time` time NOT NULL DEFAULT '00:08:00',
  `end_time` time NOT NULL DEFAULT '00:17:00',
  `lunch` time NOT NULL DEFAULT '00:12:00',
  `session_length` int(11) NOT NULL,
  `break_length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference_locations`
--

CREATE TABLE `conference_locations` (
  `conference_locationsID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference_schedule`
--

CREATE TABLE `conference_schedule` (
  `scheduleID` int(11) NOT NULL,
  `conferenceID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conference_speakers`
--

CREATE TABLE `conference_speakers` (
  `conference_titleID` int(11) NOT NULL,
  `titleID` int(11) NOT NULL
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
  `title_name` int(11) NOT NULL
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
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`conference_num`);

--
-- Indexes for table `conference_locations`
--
ALTER TABLE `conference_locations`
  ADD PRIMARY KEY (`conference_locationsID`);

--
-- Indexes for table `conference_schedule`
--
ALTER TABLE `conference_schedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `conference_speakers`
--
ALTER TABLE `conference_speakers`
  ADD PRIMARY KEY (`conference_titleID`);

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
  ADD PRIMARY KEY (`location_equipID`);

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
-- Indexes for table `title_needs`
--
ALTER TABLE `title_needs`
  ADD PRIMARY KEY (`title_needsID`);

--
-- Indexes for table `title_speakers`
--
ALTER TABLE `title_speakers`
  ADD PRIMARY KEY (`title_speakerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
  MODIFY `conference_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conference_locations`
--
ALTER TABLE `conference_locations`
  MODIFY `conference_locationsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conference_schedule`
--
ALTER TABLE `conference_schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conference_speakers`
--
ALTER TABLE `conference_speakers`
  MODIFY `conference_titleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location_equip`
--
ALTER TABLE `location_equip`
  MODIFY `location_equipID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speakerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `titleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_needs`
--
ALTER TABLE `title_needs`
  MODIFY `title_needsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_speakers`
--
ALTER TABLE `title_speakers`
  MODIFY `title_speakerID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
