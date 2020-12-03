-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Nov 2020 um 12:57
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

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

-- --------------------------------------------------------

DROP DATABASE IF EXISTS `PlanMyTrip`;

CREATE DATABASE IF NOT EXISTS `PlanMyTrip` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `PlanMyTrip`;



--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `idTraveller` int(11) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL DEFAULT 'default',
  `intro` varchar(255) DEFAULT NULL,
  `travelLink` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`id`, `idTraveller`, `location`, `classification`, `country`, `region`, `intro`, `travelLink`, `notes`) VALUES
(1, 1, 'New York City', 'city', 'United States', 'New York', '', '', ''),
(2, 2, 'Germany', 'country', 'Germany', '', '', '', ''),
(3, 1, 'California', 'region', 'United States', 'California', '', '', ''),
(4, 2, 'Sweden', 'country', 'Sweden', '', '', '', ''),
(5, 1, 'Patagonia', 'region', 'Argentinia', 'Patagoinia', '', '', '');


-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pointofinterest`
--

CREATE TABLE `pointofinterest` (
  `id` int(11) NOT NULL,
  `idLocation` int(11) DEFAULT NULL,
  `poiName` varchar(100) NOT NULL,
  `attraction` varchar(100) NOT NULL DEFAULT 'sightseeing',
  `intro` varchar(255) DEFAULT 'undefined',
  `infoLink` varchar(255) NOT NULL,
  `poiMap` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pointofinterest`
--

INSERT INTO `pointofinterest` (`id`, `idLocation`, `poiName`, `attraction`, `intro`, `infoLink`, `poiMap`, `notes`) VALUES
(1, 1, 'Statue of Liberty', 'topattractions', '', '', '', ''),
(2, 3, 'Golden Gate Bridge', 'sightseeing', 'undefined', '', NULL, ''),
(3, 2, 'Castle Neuschwanstein', 'sightseeing', 'undefined', '', NULL, ''),
(4, 3, 'Fishermans Wharf', 'sightseeing', 'undefined', '', NULL, ''),
(5, 2, 'Zugspitze', 'sightseeing', 'undefined', '', NULL, ''),
(6, 2, 'Reichstag', 'sightseeing', 'undefined', '', NULL, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `traveller`
--

CREATE TABLE `traveller` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `traveller`
--

INSERT INTO `traveller` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Peter', 'Pan', 'peterpan@hotmail.com', 'def7924e3199be5e18060bb3e1d547a7');
INSERT INTO `traveller` (`id`, `firstName`, `lastName`, `email`, `password`) VALUES
(2, 'Peter', 'Altmaier', 'vip@hotmail.com', 'eeee');






--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTraveller` (`idTraveller`);

--
-- Indizes für die Tabelle `pointofinterest`
--
ALTER TABLE `pointofinterest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLocation` (`idLocation`);

--
-- Indizes für die Tabelle `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `location`

ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `pointofinterest`
--
ALTER TABLE `pointofinterest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `traveller`
--
ALTER TABLE `traveller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`idTraveller`) REFERENCES `traveller` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `pointofinterest`
--
ALTER TABLE `pointofinterest`
  ADD CONSTRAINT `pointofinterest_ibfk_1` FOREIGN KEY (`idLocation`) REFERENCES `location` (`id`) ON DELETE CASCADE;



  
  
DROP VIEW IF EXISTS `SavedTrip`;
CREATE VIEW `SavedTrip` (`idTraveller`, `idLocation`,`location`, `poiName`, `category`, `country`, `region`, `attraction`, `LocationInfo`, `PoiInfo`, `wikivoyage`, `wikipedia`,`opentripmap`, `LocationNote`,`PoiNote`) AS
	SELECT tr.id, lo.id, poi.id, lo.location, poi.poiName, lo.classification, lo.country, lo.region, poi.attraction, lo.intro, poi.intro, lo.travelLink, poi.infoLink, poi.poiMap, lo.notes, poi.notes
		From traveller as tr
			Right OUTER JOIN location as lo
				on tr.id = lo.idTraveller 
			LEFT OUTER JOIN pointofinterest as poi 
				on lo.id = poi.idLocation
                Where tr.id = 2
			ORDER BY tr.id, lo.location;
			
			
			
			
SELECT `location`, `point`, `country`, `region`, `attraction`, `LocationInfo`, `PoiInfo`, `wikivoyage`, `wikipedia`,`opentripmap`, `LocationNote`,`PoiNote` FROM `SavedTrip` WHERE idTraveller = 3;
			

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
