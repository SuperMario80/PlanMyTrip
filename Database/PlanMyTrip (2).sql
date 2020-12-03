DROP DATABASE IF EXISTS `PlanMyTrip`;

CREATE DATABASE IF NOT EXISTS `PlanMyTrip` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `PlanMyTrip`;




-- Tabellenstruktur für Tabelle `traveller`
--

-- DROP TABLE IF EXISTS `traveller`;

CREATE TABLE `traveller` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `idLocation` int(11),
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) UNIQUE NOT NULL,
  `password` varchar(100) NOT NULL
);


-- ALTER TABLE traveller

	-- ADD FOREIGN KEY (idLocation) REFERENCES location(id) ON DELETE SET NULL;

  
desc `traveller`;



INSERT INTO `traveller` (`idLocation`,`firstName`, `lastName`, `email`, `password`) VALUES
('1', 'Peter', 'Pan', 'peterpan@hotmail.com', MD5('3456'));






 -- location Tabelle erstellen
-- DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
	`id` int(11) PRIMARY KEY AUTO_INCREMENT,
	`idTraveller` int(11),
	`idPoi` int(11),
    `location` varchar(100) NOT NULL,
	`category` varchar(100) NOT NULL,
	`country` varchar(100) NOT NULL ,
	`region` varchar(100) NOT NULL DEFAULT 'default',
	`wikivoyage` varchar(100),
	`info` varchar(100),
	`note` varchar(10)
);

/* nachträgliches Einfügen der Fremdschlüssel `idTraveller` und `idPoi`. 
   Zu Beachten ist hierbei dass beim löschen des zugehörigen `traveller` der gesamte Datensatz der Spalte `location` gelöscht wird(ON DELETE CASCADE). 
   Eine `location` kann also nicht ohne zugehörigen `traveller` existieren und somit auch kein `pointOfInterest` der widerum mit dem Primärschlüssel der Tabelle 'location' verknüpft ist*/
   
-- ALTER TABLE location
	-- ADD FOREIGN KEY (idTraveller) REFERENCES traveller(id) ON DELETE CASCADE,
	-- ADD FOREIGN KEY (idPoi) REFERENCES pointofinterest(id) ON DELETE SET NULL;
	
	

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`idTraveller`, `idPoi`, `location`, `category`, `country`, `region`, `wikivoyage`, `info`, `note`) VALUES
('1', '1', 'New York City', 'city', 'United States', 'New York','','','');

desc `location`;







  

 -- pointofinterest Tabelle erstellen
-- DROP TABLE IF EXISTS `pointofinterest`;
CREATE TABLE `pointofinterest` (
	`id` int(11) PRIMARY KEY AUTO_INCREMENT,
	`idLocation` int(11),
    `point` varchar(100) NOT NULL,
	`city` varchar(100) DEFAULT NULL,
	`Region` varchar(100) NOT NULL DEFAULT 'default',
	`country` varchar(100) NOT NULL,
	`attraction` varchar(100) NOT NULL DEFAULT 'sightseeing',
	`info` varchar(100) NOT NULL DEFAULT 'undefined',
	`wikipedia` varchar(10) NOT NULL,
	`opentripmap` varchar(10),
	`note` varchar(10) NOT NULL
);

/* nachträgliches Einfügen des Fremdschlüssels `idLocation`. 
   Zu Beachten ist hierbei dass beim löschen der zugehörigen Location der gesamte Datensatz der Spalte `pointofinterest` gelöscht wird(ON DELETE CASCADE). 
   Ein `pointofinterest` kann also nicht ohne zugehörigen `location` existieren*/
   
-- ALTER TABLE pointofinterest
	-- ADD FOREIGN KEY (idLocation) REFERENCES location(id) ON DELETE CASCADE;
	
	

--
-- Daten für Tabelle `pointofinterest`
--

INSERT INTO `pointofinterest` (`idLocation`, `point`, `city`, `region`, `country`, `attraction`, `info`, `wikipedia`, `opentripmap`, `note`) VALUES
('1', 'Statue of Liberty', 'New York City', 'New York', 'United States', 'topattractions','','','','');

desc `pointofinterest`;




DROP VIEW IF EXISTS `SavedTrip`;
CREATE VIEW `SavedTrip` (`idTraveller`, `location`, `point`, `category`, `country`, `region`, `attraction`, `LocationInfo`, `PoiInfo`, `wikivoyage`, `wikipedia`,`opentripmap`, `LocationNote`,`PoiNote`) AS
	SELECT tr.id, lo.location, poi.point, lo.category, lo.country, lo.region, poi.attraction, lo.info, poi.info, lo.wikivoyage, poi.wikipedia,poi.opentripmap, lo.note, poi.note
		From traveller as tr
			inner join location as lo
				on tr.id = lo.idTraveller 
			LEFT OUTER JOIN pointofinterest as poi 
				on lo.id = poi.idLocation;
                         
SELECT `location`, `point`, `country`, `region`, `attraction`, `LocationInfo`, `PoiInfo`, `wikivoyage`, `wikipedia`,`opentripmap`, `LocationNote`,`PoiNote` FROM `SavedTrip`;

