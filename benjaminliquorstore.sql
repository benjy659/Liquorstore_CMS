-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 10:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benjaminliquorstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AdminID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(256) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `Username`, `PasswordHash`, `AccessLevel`) VALUES
(2, 'benjamin', '$2y$10$AraP7fsg2EdccOGl28ebee5Uxw.M9dDqZF0mHQinnKxWCoVCt7UG.', 2),
(3, 'Dan', '$2y$10$Q0j69aavd4UcVNdD7a9Ar.JXaWAAZ6gvYR7f4uYd3/bpOwJrcJJAe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BrandID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BrandID`, `Name`) VALUES
(5, 'Absolut Vodka'),
(2, 'Bacardi'),
(7, 'Captain Morgan'),
(8, 'Grey Goose'),
(6, 'Hennessy'),
(1, 'Jack Daniel\'s'),
(9, 'Jameson Irish Whiskey'),
(4, 'Johnnie Walker'),
(10, 'Patron Tequila'),
(3, 'Smirnoff');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`) VALUES
(4, 'Cognac'),
(2, 'Rum'),
(5, 'Tequila'),
(3, 'Vodka'),
(1, 'Whiskey');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `DrinkID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `AlcoholContent` decimal(5,2) DEFAULT NULL,
  `Volume` decimal(5,2) DEFAULT NULL,
  `Price` decimal(5,2) DEFAULT NULL,
  `BrandID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`DrinkID`, `Name`, `Description`, `AlcoholContent`, `Volume`, `Price`, `BrandID`, `CategoryID`, `Image`) VALUES
(1, 'Jack Daniel\'s Old No. 7', 'A classic Tennessee whiskey with a smooth and mellow flavor profile characterized by hints of caramel vanilla and oak.', 40.00, 60.00, 70.00, 1, 1, 'images/jack-daniels.jpg'),
(2, 'Bacardi Rum', 'Bacardi is a versatile and popular brand of rum, known for its smooth taste and distinctive flavor profile.', 40.00, 60.00, 80.00, 2, 2, 'images/bacardi.jpg'),
(3, 'Smirnoff Vodka', 'Smirnoff is a well-known brand of vodka that is renowned for its smoothness and versatility. ', 35.00, 60.00, 50.00, 3, 3, 'images/smirnoff.jpg'),
(4, 'Johnnie Walker Black Label', ' Johnnie Walker is a globally recognized brand of Scotch whisky known for its rich history and distinct flavor profile..', 40.00, 60.00, 500.00, 4, 1, 'images/johnnie-walker.jpg'),
(6, 'Henessey', 'Hennessy is a prestigious French cognac renowned for its smoothness and depth of flavor. ', 40.00, 750.00, 100.00, 6, 4, 'images/hennessy.jpg'),
(7, 'Captain Morgan', 'Captain Morgan is a popular brand of rum known for its smooth and slightly sweet flavor profile, often associated with Caribbean-style rums. ', 40.00, 750.00, 35.00, 7, 2, 'images/captain.jpg'),
(8, 'Grey Goose', 'Grey Goose is a premium vodka renowned for its smoothness and purity.', 40.00, 750.00, 40.00, 8, 3, 'images/grey.jpg'),
(10, 'Absolut Vodka', 'Absolut Vodka is another well-known premium vodka brand appreciated for its quality and versatility.', 40.00, 750.00, 70.00, 5, 3, 'images/absolut-vodka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(11) NOT NULL,
  `DrinkID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `AlertLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `DrinkID`, `Quantity`, `AlertLevel`) VALUES
(1, 1, 200, 50),
(2, 3, 40, 50),
(3, 2, 30, 50),
(6, 6, 600, 200),
(7, 7, 500, 20),
(8, 8, 30, 50),
(9, 4, 100, 60),
(10, 10, 100, 30);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `GeneratedAt` datetime DEFAULT NULL,
  `ReportData` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(256) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `PasswordHash`, `AccessLevel`) VALUES
(11, 'james', '$2y$10$xWhLz6EbhuMOwE/5u1TfhOtgDQLYvKKJeQCOHXkZiYNvtGcJ4sSli', 1),
(13, 'Benjamin', '$2y$10$3.SkRZjk6zeeSoDez5eZWOU11hJO5xAANf/BiDNRuzCVKBpPcHdDq', 1),
(15, 'benjy', '$2y$10$Esk.FNU9bgKDoZDXz8yvJuxQHOeBgFj6O/mopPrykX/r4ECBlfk2y', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`DrinkID`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `DrinkID` (`DrinkID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `DrinkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `drinks_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`BrandID`),
  ADD CONSTRAINT `drinks_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`DrinkID`) REFERENCES `drinks` (`DrinkID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
