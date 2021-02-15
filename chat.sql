-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 05:13 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `LatestMesseger` (IN `UserId` INT)  NO SQL
BEGIN 
CREATE TEMPORARY TABLE MESSENGERSHOLDER (USERID INT);

INSERT INTO MESSENGERSHOLDER SELECT  (CASE WHEN `MessageFrom`= UserId THEN MessageTo WHEN `MessageTo`=UserId THEN `MessageFrom` END) FROM `messageregister` WHERE `MessageFrom` = UserId ||`MessageTo`=UserId ORDER BY `messageregister`.`Date` DESC;

CREATE TEMPORARY TABLE MYLATESTMESSENGERS(USERID INT, FNAME VARCHAR(33), LNAME VARCHAR(33), USERAVATAR VARCHAR(512));
INSERT INTO MYLATESTMESSENGERS SELECT  MESSENGERSHOLDER.USERID,(SELECT `users`.`FName` FROM `users` WHERE `users`.`ID` = MESSENGERSHOLDER.USERID), (SELECT `users`.`LName` FROM `users` WHERE `users`.`ID` = MESSENGERSHOLDER.USERID), (SELECT `users`.`UserAvatar` FROM `users` WHERE `users`.`ID` = MESSENGERSHOLDER.USERID)  FROM MESSENGERSHOLDER;


DROP TABLE MESSENGERSHOLDER;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NewUser` (IN `Fname` VARCHAR(35), IN `Lname` VARCHAR(35), IN `Age` INT, IN `Address` INT, IN `Email` TEXT, IN `Uname` VARCHAR(35), IN `Pass` VARCHAR(32))  NO SQL
    SQL SECURITY INVOKER
BEGIN
DECLARE LastId INT DEFAULT 0;
START TRANSACTION;
INSERT INTO `users` (`FName`, `LName`, `Age`, `Address`,`EmailAddress`,`Username`) VALUES (Fname,Lname,Age,Address,Email,Uname);
SELECT MAX(`users`.`ID`) INTO LastId FROM `users`;
INSERT INTO `user_authenication`(`ID`,`USERNAME`,`user_authenication`.`PASSWORD`) VALUES
(LastId,Uname,Pass);

INSERT INTO `currentlocation`(`UserId`, `Latitude`, `Longitude`, `IsOnline`) VALUES (LastId, 0,0,0);
COMMIT;
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Address` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`ID`, `Address`) VALUES
(0, 'NONE'),
(1, 'Banepa'),
(2, 'Kathmandu'),
(3, 'Pokhara');

-- --------------------------------------------------------

--
-- Table structure for table `currentlocation`
--

CREATE TABLE `currentlocation` (
  `UserId` int(11) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `IsOnline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currentlocation`
--

INSERT INTO `currentlocation` (`UserId`, `Latitude`, `Longitude`, `IsOnline`) VALUES
(1, 0, 0, 1),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friend list`
--

CREATE TABLE `friend list` (
  `UserID1` int(10) NOT NULL,
  `UserID2` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend list`
--

INSERT INTO `friend list` (`UserID1`, `UserID2`) VALUES
(2, 1),
(1, 2),
(1, 1),
(1, 1),
(4, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messageregister`
--

CREATE TABLE `messageregister` (
  `ID` int(11) NOT NULL,
  `MessageFrom` int(11) NOT NULL,
  `MessageTo` int(11) NOT NULL,
  `Message_Type` varchar(1) NOT NULL DEFAULT 'T',
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Messages` text NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `DeleteStatus` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageregister`
--

INSERT INTO `messageregister` (`ID`, `MessageFrom`, `MessageTo`, `Message_Type`, `Date`, `Messages`, `Latitude`, `Longitude`, `DeleteStatus`) VALUES
(1, 2, 1, 'T', '2019-09-18 16:21:42', 'hii', 0, 0, 0),
(4, 1, 2, 'T', '2019-09-18 18:00:08', 'hii', 0, 0, 0),
(5, 2, 1, 'T', '2019-09-18 18:00:24', 'ðŸ˜', 0, 0, 0),
(6, 2, 1, 'I', '2019-09-18 18:01:25', 'upload_files/611797275img4.jpg', 0, 0, 0),
(7, 2, 1, 'T', '2019-09-18 18:01:32', 'Message is deleted.', 0, 0, 1),
(8, 2, 1, 'T', '2019-09-18 18:02:41', 'ðŸ¥µðŸ¥¶ðŸ˜–', 0, 0, 0),
(9, 2, 1, 'T', '2019-09-18 18:03:46', 'ðŸ¥µðŸ¥¶ðŸ˜–', 0, 0, 0),
(10, 1, 2, 'T', '2019-09-18 18:03:46', 'hiiðŸ¤¤', 0, 0, 0),
(17, 1, 2, 'T', '2019-09-19 08:47:06', 'hey', 0, 0, 0),
(18, 1, 2, 'I', '2019-09-19 08:47:25', 'upload_files/652277429external structure.png', 0, 0, 0),
(19, 4, 2, 'T', '2019-11-15 18:30:14', 'hi', 0, 0, 0),
(20, 4, 2, 'T', '2019-11-17 14:58:03', 'hey', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stared`
--

CREATE TABLE `stared` (
  `ID` int(11) NOT NULL,
  `FromStar` int(11) NOT NULL,
  `ToStar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `UserId` int(11) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FName` varchar(33) NOT NULL,
  `LName` varchar(33) NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` int(11) NOT NULL,
  `PhoneNo` bigint(20) NOT NULL,
  `MobileNo` bigint(20) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `EmailAddress` text NOT NULL,
  `UserAvatar` varchar(50) NOT NULL DEFAULT 'upload_files/avatar/useravatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FName`, `LName`, `Age`, `Address`, `PhoneNo`, `MobileNo`, `Username`, `EmailAddress`, `UserAvatar`) VALUES
(1, 'luniva', 'taujale', 17, 1, 0, 0, 'luniva', 'taujaleluniva@gmail.com', 'upload_files/avatar/useravatar.jpg'),
(2, 'Rishu', 'Rajbanshi', 16, 2, 0, 0, 'rishu', 'rishu@gmail.com', 'upload_files/avatar/useravatar.jpg'),
(3, 'luni', 'taujale', 14, 1, 0, 0, 'luni', 'luni@gmail.com', 'upload_files/avatar/useravatar.jpg'),
(4, 'luni', 'taujale', 15, 1, 0, 0, 'luni', 'luni@gmail.com', 'upload_files/avatar/useravatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_authenication`
--

CREATE TABLE `user_authenication` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(25) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authenication`
--

INSERT INTO `user_authenication` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'luniva', 'a3b8050669e7084d24065e5f5b301584'),
(2, 'rishu', '2f7d89c40258ce36d39ac484dd81072b'),
(3, 'luni', 'a3b8050669e7084d24065e5f5b301584'),
(4, 'luni', '353e3b70a535eb88db2df771831508bf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `currentlocation`
--
ALTER TABLE `currentlocation`
  ADD UNIQUE KEY `UserId` (`UserId`),
  ADD KEY `UserId_2` (`UserId`),
  ADD KEY `Latitude` (`Latitude`),
  ADD KEY `Longitude` (`Longitude`);

--
-- Indexes for table `messageregister`
--
ALTER TABLE `messageregister`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MessageFrom` (`MessageFrom`),
  ADD KEY `MessageTo` (`MessageTo`);

--
-- Indexes for table `stared`
--
ALTER TABLE `stared`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FromStar` (`FromStar`),
  ADD KEY `ToStar` (`ToStar`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD KEY `Latitude` (`Latitude`,`Longitude`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `Address` (`Address`);

--
-- Indexes for table `user_authenication`
--
ALTER TABLE `user_authenication`
  ADD UNIQUE KEY `USERID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messageregister`
--
ALTER TABLE `messageregister`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `stared`
--
ALTER TABLE `stared`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `messageregister`
--
ALTER TABLE `messageregister`
  ADD CONSTRAINT `messageregister_ibfk_1` FOREIGN KEY (`MessageFrom`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `messageregister_ibfk_2` FOREIGN KEY (`MessageTo`) REFERENCES `users` (`ID`);

--
-- Constraints for table `stared`
--
ALTER TABLE `stared`
  ADD CONSTRAINT `stared_ibfk_1` FOREIGN KEY (`FromStar`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `stared_ibfk_2` FOREIGN KEY (`ToStar`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Address` FOREIGN KEY (`Address`) REFERENCES `addresses` (`ID`);

--
-- Constraints for table `user_authenication`
--
ALTER TABLE `user_authenication`
  ADD CONSTRAINT `UserAuthData` FOREIGN KEY (`ID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
