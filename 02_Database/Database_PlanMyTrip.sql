-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Mrz 2021 um 11:18
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;




--
-- Datenbank: `planmytrip`
--
CREATE DATABASE IF NOT EXISTS `planmytrip` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `planmytrip`;


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `traveller`
--

DROP TABLE IF EXISTS `traveller`;
CREATE TABLE `traveller` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- AUTO_INCREMENT
--
ALTER TABLE `traveller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;


--
-- Indizes
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Daten
--
INSERT INTO `traveller` VALUES(1, 'mario', 'phillipp', 'gripp@arcor.de', '$2y$10$EjJWUl24HBFf1AJyKtpJ7uGE3J1.WI06jiYqmJ3p4Qw/4l7qtImUG');


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `idTraveller` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `locationKey` varchar(100) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `intro` text NOT NULL,
  `travelLink` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=742;


--
-- Indizes
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `travLocation` (`idTraveller`,`location`,`locationKey`) USING BTREE;
  
 --
-- Constraints
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`idTraveller`) REFERENCES `traveller` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`idTraveller`) REFERENCES `traveller` (`id`);


--
-- Daten für Tabelle `location`
--
INSERT INTO `location` VALUES(541, 76, 'Germany', 'Germany', 'country', 'Germany', '', 'Both the most populous and the most economically powerful country in the region, Germany is an incredibly diverse nation that offers everything from skiing in the Alps to sunbathing on the coasts, old towns dating back to the Roman Empire and ultramodern ', 'http://en.wikivoyage.org/wiki/Germany', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pointofinterest`
--
DROP TABLE IF EXISTS `pointofinterest`;
CREATE TABLE `pointofinterest` (
  `id` int(11) NOT NULL,
  `idLocation` int(11) NOT NULL,
  `poiName` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `locationKey` varchar(100) NOT NULL,
  `attraction` varchar(100) NOT NULL DEFAULT 'sightseeing',
  `intro` text NOT NULL,
  `infoLink` varchar(255) NOT NULL,
  `poiMap` varchar(255) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- AUTO_INCREMENT
--
ALTER TABLE `pointofinterest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1564;

--
-- Indizes
--
ALTER TABLE `pointofinterest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLocation` (`idLocation`) USING BTREE;
  
--
-- Constraints
--
ALTER TABLE `pointofinterest`
  ADD CONSTRAINT `pointofinterest_ibfk_1` FOREIGN KEY (`idLocation`) REFERENCES `location` (`id`) ON DELETE CASCADE;
COMMIT;

--
-- Daten für Tabelle `pointofinterest`
--
INSERT INTO `pointofinterest` VALUES(1562, 740, 'Diamond Head', 'Oahu', 'Hawaii', 'district', 'Diamond Head is a volcanic tuff cone on the Hawaiian island of Oahu and known to Hawaiians as Lēahi. The Hawaiian name is most likely derived from lae (browridge, promontory) plus ahi (tuna) because the shape of the ridgeline resembles the shape of a tuna\'s dorsal fin. Its English name was given by British sailors in the 19th century, who mistook calcite crystals on the adjacent beach for diamonds.', 'http://en.wikivoyage.org/wiki/Honolulu/Eastern', 'https://maps.google.com/maps/embed/v1/place?key=AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q=21.2613055,-157.8046853', '');
