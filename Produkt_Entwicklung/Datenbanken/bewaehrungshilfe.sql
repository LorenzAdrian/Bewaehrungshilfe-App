-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Okt 2019 um 11:36
-- Server-Version: 10.1.39-MariaDB
-- PHP-Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bewaehrungshilfe`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aktivität`
--

CREATE TABLE `aktivität` (
  `Zeitstempel` date NOT NULL,
  `PID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `aktivität`
--

INSERT INTO `aktivität` (`Zeitstempel`, `PID`) VALUES
('2019-01-27', 1),
('2019-02-25', 3),
('2019-03-02', 1),
('2019-03-08', 4),
('2019-04-21', 4),
('2019-05-07', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `arbeitsgruppe`
--

CREATE TABLE `arbeitsgruppe` (
  `AGID` int(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Standort` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `arbeitsgruppe`
--

INSERT INTO `arbeitsgruppe` (`AGID`, `Name`, `Standort`) VALUES
(1, 'Gruppe 1', 1),
(2, 'Gruppe 2', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `betreuer`
--

CREATE TABLE `betreuer` (
  `BID` int(30) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Passwort` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TelNr` varchar(20) NOT NULL,
  `Stellenzeichen` varchar(30) DEFAULT NULL,
  `Zimmernr` varchar(10) NOT NULL,
  `Vertretung` int(30) DEFAULT NULL,
  `AGID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `betreuer`
--

INSERT INTO `betreuer` (`BID`, `Vorname`, `Nachname`, `Username`, `Passwort`, `Email`, `TelNr`, `Stellenzeichen`, `Zimmernr`, `Vertretung`, `AGID`) VALUES
(1, 'Max', 'Miller', 'maxmiller', 'passwort1', 'max.miller@berlin.de', '123456789', 'STZ 123', 'ZNR 1', NULL, 1),
(2, 'Susanne', 'Schmidt', 'susanneschmidt', 'passwort2', 'susanne.schmidt@berlin.de', '987654321', 'STZ 321', 'ZNR 2', NULL, 2),
(3, 'Raining', 'Man', 'betuser', '$2y$10$atYyS5N.X.Rd0srrhYVZ9uw7LBkDDQCN9RDr08Qf0DtaxsUySt03a', 'betuser@gmail.com', '43587345', 'STZ 123', '12', 2, 1),
(6, 'Silvana ', 'Sills', 'betuser5', '$2y$10$3.LpqlnQAvoCGPp9Bi4Vn.2SmSEtTa7jGgVOlgK365.J4q67nNhY.', 'betuser5@web.de', '31234', 'STZ 454', '234', NULL, 1),
(7, 'Geht', 'Das', 'betuser6', '$2y$10$ePTnGnKVhxDrTp2GvMgq9.4Ywk5Tl8/46rShxFrpwtXx85MzJ1x4a', 'betuser6@web.de', '34235', '2345', '123', NULL, 1),
(8, 'Hans', 'Peter', 'betuser7', '$2y$10$OcHjtNz/hL1kty/lI40Qi.ctznhjGCs86Swevgfs8gVXEz7ttOEje', 'test@web.de', '235234', '123123', '234', 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht`
--

CREATE TABLE `nachricht` (
  `NID` int(30) NOT NULL,
  `Zeitstempel` datetime NOT NULL,
  `Text` text NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht`
--

INSERT INTO `nachricht` (`NID`, `Zeitstempel`, `Text`, `BezugID`, `Status`, `BID`, `PID`, `BSender`) VALUES
(1, '2019-01-17 09:37:12', 'Hallo, ich habe Probleme bei der Arbeitsplatzsuche', NULL, 'neu', 1, 1, 0),
(2, '2019-01-17 10:54:23', 'Ich werde mit Ihrer Vermittlerin bei der Arbeitsagentur sprechen', 1, 'neu', 1, 1, 1),
(3, '2019-02-23 15:05:53', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', NULL, 'gelesen', 1, 2, 1),
(4, '2019-02-23 16:44:02', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica', 3, 'neu', 1, 2, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test`
--

CREATE TABLE `nachricht_test` (
  `Zeitstempel` char(30) DEFAULT NULL,
  `Text` char(30) DEFAULT NULL,
  `Status` char(30) DEFAULT NULL,
  `BID` char(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht_test`
--

INSERT INTO `nachricht_test` (`Zeitstempel`, `Text`, `Status`, `BID`, `PID`, `BSender`) VALUES
('13.10.2019 - 14:39', 'Test Nachricht', 'neu', '4', 1, '0'),
('2019-10-13 14:41:25', 'Test Nachricht', 'neu', NULL, 1, '0'),
('2019-10-13 14:41:25', 'Test Nachricht', 'neu', NULL, 1, '0'),
('2019-10-13 14:41:25', 'Test Nachricht', 'neu', NULL, 1, '0'),
('2019-10-13 14:41:25', '    Test', 'neu', NULL, 1, '0');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test2`
--

CREATE TABLE `nachricht_test2` (
  `Zeitstempel` datetime NOT NULL,
  `Text` text NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht_test2`
--

INSERT INTO `nachricht_test2` (`Zeitstempel`, `Text`, `BezugID`, `Status`, `BID`, `PID`, `BSender`) VALUES
('2019-10-13 14:55:22', 'NULL', 0, 'neu', 4, 1, 0),
('2019-10-14 10:00:00', 'NULL', 0, 'neu', 3, 10, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test3`
--

CREATE TABLE `nachricht_test3` (
  `NID` int(30) NOT NULL,
  `Zeitstempel` datetime NOT NULL,
  `Text` text NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht_test3`
--

INSERT INTO `nachricht_test3` (`NID`, `Zeitstempel`, `Text`, `BezugID`, `Status`, `BID`, `PID`, `BSender`) VALUES
(1, '2019-10-13 14:55:22', 'NULL', 0, 'neu', 4, 1, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test4`
--

CREATE TABLE `nachricht_test4` (
  `NID` int(30) NOT NULL,
  `Zeitstempel` datetime NOT NULL,
  `Text` text NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht_test4`
--

INSERT INTO `nachricht_test4` (`NID`, `Zeitstempel`, `Text`, `BezugID`, `Status`, `BID`, `PID`, `BSender`) VALUES
(1, '2019-10-13 14:55:22', 'NULL', 0, 'neu', 3, 10, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test5`
--

CREATE TABLE `nachricht_test5` (
  `NID` int(30) NOT NULL,
  `Zeitstempel` datetime NOT NULL,
  `Text` text NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht_test5`
--

INSERT INTO `nachricht_test5` (`NID`, `Zeitstempel`, `Text`, `BezugID`, `Status`, `BID`, `PID`, `BSender`) VALUES
(1, '2019-10-13 14:55:22', 'NULL', 0, 'neu', 3, 10, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test6`
--

CREATE TABLE `nachricht_test6` (
  `NID` int(30) NOT NULL,
  `Zeitstempel` datetime NOT NULL,
  `Text` varchar(500) NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nachricht_test6`
--

INSERT INTO `nachricht_test6` (`NID`, `Zeitstempel`, `Text`, `BezugID`, `Status`, `BID`, `PID`, `BSender`) VALUES
(1, '2019-10-13 14:55:22', 'NULL', 0, 'neu', 3, 10, 0),
(2, '0000-00-00 00:00:00', 'NULL', 0, 'neu', 3, 10, 4),
(3, '2019-10-14 10:00:00', 'NULL', 0, 'neu', 3, 10, 4),
(4, '2019-10-14 10:00:00', 'NULL', 0, 'neu', 3, 10, 4),
(5, '2019-10-14 10:00:00', 'NULL', 0, 'neu', 3, 10, 4),
(6, '2019-10-14 10:00:00', 'NULL', 0, 'neu', 3, 10, 4),
(7, '2019-10-14 10:00:00', 'Dies ist eine Testnachricht', 0, 'gelesen', 3, 10, 4),
(8, '2019-10-15 00:00:00', '  Dies ist die Testnachricht am 15.10.2019', 2, 'neu', 3, 10, 4),
(9, '2019-10-15 00:00:00', 'Eine weitere Nachricht zum Testen', 2, 'neu', 3, 10, 4),
(10, '2019-10-16 00:00:00', '  Das ist eine Testnachricht ', 2, 'neu', 3, 10, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachricht_test7`
--

CREATE TABLE `nachricht_test7` (
  `NID` int(30) NOT NULL,
  `Zeitstempel` datetime NOT NULL,
  `Text` text NOT NULL,
  `BezugID` int(30) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `BID` int(30) DEFAULT NULL,
  `PID` int(30) DEFAULT NULL,
  `BSender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `proband`
--

CREATE TABLE `proband` (
  `PID` int(30) NOT NULL,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Passwort` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `TelNr` varchar(20) NOT NULL,
  `Aktenzeichen` varchar(10) DEFAULT NULL,
  `Betreuungsanfang` date DEFAULT NULL,
  `Betreuungsende` date DEFAULT NULL,
  `BID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `proband`
--

INSERT INTO `proband` (`PID`, `Vorname`, `Nachname`, `Username`, `Passwort`, `Email`, `TelNr`, `Aktenzeichen`, `Betreuungsanfang`, `Betreuungsende`, `BID`) VALUES
(1, 'Norbert', 'Meyer', 'norbertmeyer', 'passwort3', 'n.meyer@gmx.de', '555666777', 'AZ 123', '2019-02-15', '2019-08-15', 1),
(2, 'Robert', 'Hansen', 'roberthansen', 'passwort4', 'roha@1und1.de', '111222333', 'AZ 467', '2019-01-09', '2019-07-03', 1),
(3, 'Klaus', 'Schoppe', 'klausschoppe', 'passwort5', 'kschoppe@gmx.de', '88225566', 'AZ 890', '2019-04-15', '2019-10-10', 2),
(4, 'Herbert', 'Kling', 'herbertkling', 'passwort6', 'hekli@googlemail.com', '121255577', 'AZ 135', '2019-05-02', '2019-11-20', 2),
(5, 'Immergut', 'Drauf', 'probuser1', '$2y$10$9AV5rCnP59T0D7rH0OqqBOy6QmpHE1uVHDue7wmvhmY72Bc3dd6sO', 'probuser@gmail.com', '2345343', 'STZ 123', NULL, '0000-00-00', 3),
(8, 'Fritz', 'Fischer', 'prouser2', '$2y$10$ssbLNV1JR0.fhTPzw7epk.a4lap4M9gtk7FtVHHiHFCbpL8z0/MlG', 'probuser@gamil.com', '1238425', 'AZ 1233', NULL, '2020-12-02', 3),
(9, 'Boob', 'Baumeister', 'probuser3', '$2y$10$0ED7SQEtfBlvu0o79kscOeg.eXM5zLvAh8ZQunjZr8S9IqRzDGhau', 'probuser3@gmail.com', '4358213', 'AZ 234', NULL, '2020-05-12', 3),
(10, 'Thomas', 'Lokomotive', 'probuser4', '$2y$10$9ny1ymYnXH2kY0BYa3ktTerbepfY9JSdGjBLW7IOayOhdMwILOGO6', 'probuser4@gmail.com', '23452345', 'AZ 123', NULL, '2020-06-25', 3),
(11, 'Leonardo', 'Turtle', 'probuser5', '$2y$10$0WLRbS5XPweVIufNAYvq6.0426sMPfQwxd27OpQ03bGdwih2qcnuu', 'probuser5@gmail.com', '234234', 'AZ 123', NULL, '0000-00-00', 3),
(12, 'Oliver', 'Queen', 'probuser6', '$2y$10$Gf6kpWKfczPIcMNJkp96pOAnO6Qrs6OeQ1vj6v8YLx5kyIYifKRxG', 'probuser6@gmail.com', '2342381', 'AZ 34532', NULL, '2020-08-23', 3),
(13, 'Fritz', 'Walter', 'probuser7', '$2y$10$461WHl4krMV5sVKGTHmGZuBbH/fuArhzKNXIgsqTOgI0d1nyAAhQW', 'probuser7@gmail.com', '136247', 'AZ 2184', NULL, '2020-08-21', 3),
(14, 'Susi', 'Strauss', 'probuser8', '$2y$10$oXevzP/tAwUzEwCr9iS4e.b9CMAX9sH71eOxDQEiqH3c06HQVZsru', 'prouser8@gmail.com', '2340975', 'AZ 793', NULL, '2020-02-14', 3),
(15, 'Steffi', 'Mahl', 'probuser9', '$2y$10$4tVV3VrkWEMS6tsg/s8iyeQbTTBaVqQfKAabQzIs9mcL2qOxw6uFS', 'probuser9@gmail.com', '20934823', 'AZ  742', NULL, '2020-02-23', 3),
(16, 'Petra', 'Mai', 'probuser10', '$2y$10$7SDnYwbZqif2IcQNZcIdm.7BA/inTCuJHPWzVByWIya77VDW3gDde', 'probuser10@gmail.com', '235538', 'AZ 3875', NULL, '2020-05-12', 3),
(17, 'Hans', 'MÃ¼ller', 'probuser11', '$2y$10$w.Mr34iS6MIk6wqaQQWsAOSbQ3je8rsRwkkVwJaM5RgeiuIW0.JIW', 'prouser11@gmail.com', '454387', 'Az 7583', NULL, '2020-06-15', 3),
(18, 'Peter', 'Frei', 'probuser12', '$2y$10$hrVjnxQ/D4ecGh819IWBxu7SeLZjEVTPX5dQZ2yq2t8q97SJwYriG', 'probuser12@gmail.com', '235253', 'AZ 784', NULL, '2020-03-16', 3),
(19, 'Klaus', 'Koerper', 'probuser13', '$2y$10$C6rV3LBEdGtf5XRvpC.xXunNuUrjqzv5GXyIjKO37v1bo7EVyopz2', 'probuser13@gmail.com', '23425', 'AZ 1235', NULL, '2020-08-15', 3),
(20, 'Samson', 'Schulz', 'probuser14', '$2y$10$ss9fWJ8cC7RQ/GwrIwAcKOESt1F4F2CgaHmPArru0440zORzgRR4u', 'probuser14@gmail.com', '239487', 'AZ 2347', NULL, '2020-05-17', 3),
(21, 'Gabi', 'Klaus', 'probuser15', '$2y$10$4S2SaTzB2DRaCzzwwyMZD.YXfqfEOUE1igP4w6MXkySYra4mB72Gy', 'probuser15@gmail.com', '23451', 'AZ 759', NULL, '2020-02-18', 3),
(22, 'Erik', 'Jaeger', 'probuser16', '$2y$10$NpFyL1c60d/35jii2YdqFuFkJkA6hEezzK3/wWegwSCGHuPxvU1qm', 'probuser16@gmail.com', '2345288', 'AZ 12351', NULL, '2020-09-25', 3),
(23, 'Armin', 'Arlert', 'probuser17', '$2y$10$JZX5ZSn8tLfMkuflQZIvgOTGp71yw47YmOlFPntiiQ36XlhZ0QfJe', 'probuser17@gmail.com', '234556234', 'AZ 435', NULL, '2020-05-27', 3),
(24, 'Martin', 'Hall', 'probuser18', '$2y$10$S8NH2KAerInkJgHg6MTzi.jy2OEFyPxr2vb5nJSRDBQXzSy6dEGEe', 'probuser18@gmail.com', '23455321', 'AZ 165', NULL, '2020-04-20', 3),
(25, 'Thomas', 'Lewandowski', 'probuser19', '$2y$10$IpmlALcgKRwN2pkKHsEt8.tprbdSBIiw1hPuz2tYCf3rtPpE.m9.2', 'probuser19@gmail.com', '23452375', 'AZ 3435', NULL, '2020-09-10', 3),
(26, 'Mikasa', 'Ackermann', 'probuser20', '$2y$10$GTclU88MIFSeOmYEATXsfeOFxmj1UQaGjmNn9.0eVig4DPbsUxKbe', 'probuser20@gmail.com', '234523', 'AZ 20', NULL, '2020-05-18', 3),
(27, 'Dieter', 'Machlow', 'probuser21', '$2y$10$JbrwGdDSWw9q9PFl5aEcvOH8s0qoehN6ct45uZeCRwDVBKivmX9eK', 'probuser21@gmail.com', '3254537', 'AZ 5643', NULL, '2020-06-28', 3),
(30, 'Silvana', 'Sillls', 'probuser23', '$2y$10$7aMcFQNOG01tzq771NSZauUtzRqSdQnsxWugxP0cyBIRAE8EHgYNS', 'probuser23@web.de', '453628', 'AZ 123', NULL, '2020-10-15', 3),
(31, 'Test', 'User', 'prouser24', '$2y$10$ID2JM9x8vK7M9iHchgyrC.b1BNTTH7j66Op6MRMFggiBftuq4gbe.', 'probuser24@web.de', '235345', 'AZ 234', NULL, '2020-10-16', 6),
(32, 'Macht', 'Nicht', 'probuser24', '$2y$10$SEqqoOIy8abPA7UtSU0XKuKhJ0bGBIyCiUFhFG3Pm4xEMf4pcWLeS', 'probuser24@gmail.com', '564526', 'AZ 123', NULL, '2020-10-18', 6),
(33, 'SIvya', 'Sillls', 'Probuser30', '$2y$10$hec7PaSs3xa5yw8elqM3ee8NdSEZTCxLMB1EY/F/lrFwwVDB8KVYC', 'probuser30@gmail.com', '453264', 'AZ 234', NULL, '2020-10-20', 6),
(34, 'Sansibar', 'Sylt', 'probuser31', '$2y$10$5oAUiLmtyBTX/0D77ytfsOLpek9HtZ4dR.tlnTQwqnhy3s6TkCZ.O', 'probuser31@gmail.com', '3345345', 'AZ 234', NULL, '2020-10-20', 3),
(36, 'Tesst', 'User', 'testprobuser', '$2y$10$ZGpU89Dqr0DVjk7L/H//7.7pPy1rzaRomCKwOiyUA9xI43b2lFYc2', 'testprobuser@gmail.com', '1235', 'AZ456', NULL, '2020-10-20', 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `standort`
--

CREATE TABLE `standort` (
  `SID` int(30) NOT NULL,
  `Straße` varchar(50) NOT NULL,
  `Hausnr` varchar(5) NOT NULL,
  `PLZ` varchar(5) NOT NULL,
  `Ort` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `standort`
--

INSERT INTO `standort` (`SID`, `Straße`, `Hausnr`, `PLZ`, `Ort`) VALUES
(1, 'Berliner Straße', '55', '12345', 'Berlin'),
(2, 'Hamburger Straße', '15', '10555', 'Berlin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `termin`
--

CREATE TABLE `termin` (
  `TID` int(30) NOT NULL,
  `Beginn` datetime NOT NULL,
  `Ende` datetime NOT NULL,
  `Titel` varchar(100) NOT NULL,
  `Status` varchar(1) NOT NULL,
  `BID` int(30) NOT NULL,
  `PID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `termin`
--

INSERT INTO `termin` (`TID`, `Beginn`, `Ende`, `Titel`, `Status`, `BID`, `PID`) VALUES
(1, '2019-02-05 15:15:00', '2019-02-05 16:15:00', 'Besprechung Bewährungsauflagen', 'b', 1, 1),
(2, '2019-03-17 10:00:00', '2019-03-17 10:30:00', 'Besprechung Arbeitssuche', 'o', 1, 2),
(4, '2019-01-23 14:00:00', '2019-01-23 14:30:00', 'Besprechung Arbeitsplatzwechsel', 'o', 2, 4),
(5, '2019-07-02 10:00:00', '2019-07-02 12:00:00', 'Boob Baumeister', '2', 3, 9),
(7, '2019-07-03 10:00:00', '2019-07-03 12:00:00', 'Immergut Drauf', '3', 3, 5),
(8, '2019-07-04 12:00:00', '2019-07-04 14:00:00', 'Leonardo Turtle', '1', 3, 11),
(9, '2019-07-08 10:00:00', '2019-07-08 12:00:00', 'Oliver Queen', '2', 3, 12),
(10, '2019-07-09 09:00:00', '2019-07-09 10:30:00', 'Thomas Lokomotive', '1', 3, 10),
(11, '2019-07-27 12:00:00', '2019-07-27 14:00:00', 'Test', '2', 3, 5),
(12, '2019-07-24 12:00:00', '2019-07-24 12:30:00', 'Termin', '2', 3, 5),
(14, '2019-07-29 10:00:00', '2019-07-29 12:00:00', 'BliBlasd', '2', 3, 12),
(15, '2019-07-18 12:00:00', '2019-07-18 15:00:00', 'TestEventPrototyp', '2', 3, 17),
(16, '2019-07-17 10:00:00', '2019-07-17 12:00:00', 'Letzter Test', '1', 3, 15),
(17, '2019-08-08 12:00:00', '2019-08-08 14:00:00', 'Ander', '2', 3, 12),
(18, '2019-07-10 10:00:00', '2019-07-10 12:00:00', 'Erik Jaeger', '3', 3, 22),
(19, '2019-07-11 12:00:00', '2019-07-11 14:00:00', 'Erik Jaeger 2', '1', 3, 22),
(20, '2019-07-12 09:00:00', '2019-07-12 11:00:00', 'Erik Jaeger', '3', 3, 22),
(21, '2019-10-16 10:00:00', '2019-10-16 12:00:00', 'Test', '2', 3, 8),
(22, '2019-10-14 14:00:00', '2019-10-14 16:00:00', 'Christoph', '1', 3, 8);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aktivität`
--
ALTER TABLE `aktivität`
  ADD PRIMARY KEY (`Zeitstempel`,`PID`),
  ADD KEY `PID` (`PID`);

--
-- Indizes für die Tabelle `arbeitsgruppe`
--
ALTER TABLE `arbeitsgruppe`
  ADD PRIMARY KEY (`AGID`),
  ADD KEY `Standort` (`Standort`);

--
-- Indizes für die Tabelle `betreuer`
--
ALTER TABLE `betreuer`
  ADD PRIMARY KEY (`BID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `TelNr` (`TelNr`),
  ADD KEY `Vertretung` (`Vertretung`),
  ADD KEY `AGID` (`AGID`);

--
-- Indizes für die Tabelle `nachricht`
--
ALTER TABLE `nachricht`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `BID` (`BID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `BezugID` (`BezugID`);

--
-- Indizes für die Tabelle `nachricht_test3`
--
ALTER TABLE `nachricht_test3`
  ADD PRIMARY KEY (`NID`);

--
-- Indizes für die Tabelle `nachricht_test4`
--
ALTER TABLE `nachricht_test4`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `BID` (`BID`);

--
-- Indizes für die Tabelle `nachricht_test5`
--
ALTER TABLE `nachricht_test5`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `PID` (`PID`);

--
-- Indizes für die Tabelle `nachricht_test6`
--
ALTER TABLE `nachricht_test6`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `BID` (`BID`),
  ADD KEY `PID` (`PID`);

--
-- Indizes für die Tabelle `nachricht_test7`
--
ALTER TABLE `nachricht_test7`
  ADD PRIMARY KEY (`NID`),
  ADD KEY `BID` (`BID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `BezugID` (`BezugID`);

--
-- Indizes für die Tabelle `proband`
--
ALTER TABLE `proband`
  ADD PRIMARY KEY (`PID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `TelNr` (`TelNr`),
  ADD KEY `BID` (`BID`);

--
-- Indizes für die Tabelle `standort`
--
ALTER TABLE `standort`
  ADD PRIMARY KEY (`SID`);

--
-- Indizes für die Tabelle `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`TID`),
  ADD KEY `BID` (`BID`),
  ADD KEY `PID` (`PID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `arbeitsgruppe`
--
ALTER TABLE `arbeitsgruppe`
  MODIFY `AGID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `betreuer`
--
ALTER TABLE `betreuer`
  MODIFY `BID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `nachricht`
--
ALTER TABLE `nachricht`
  MODIFY `NID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `nachricht_test3`
--
ALTER TABLE `nachricht_test3`
  MODIFY `NID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `nachricht_test4`
--
ALTER TABLE `nachricht_test4`
  MODIFY `NID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `nachricht_test5`
--
ALTER TABLE `nachricht_test5`
  MODIFY `NID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `nachricht_test6`
--
ALTER TABLE `nachricht_test6`
  MODIFY `NID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `nachricht_test7`
--
ALTER TABLE `nachricht_test7`
  MODIFY `NID` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `proband`
--
ALTER TABLE `proband`
  MODIFY `PID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT für Tabelle `standort`
--
ALTER TABLE `standort`
  MODIFY `SID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `termin`
--
ALTER TABLE `termin`
  MODIFY `TID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `aktivität`
--
ALTER TABLE `aktivität`
  ADD CONSTRAINT `aktivität_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `proband` (`PID`);

--
-- Constraints der Tabelle `arbeitsgruppe`
--
ALTER TABLE `arbeitsgruppe`
  ADD CONSTRAINT `arbeitsgruppe_ibfk_1` FOREIGN KEY (`Standort`) REFERENCES `standort` (`SID`);

--
-- Constraints der Tabelle `betreuer`
--
ALTER TABLE `betreuer`
  ADD CONSTRAINT `betreuer_ibfk_1` FOREIGN KEY (`Vertretung`) REFERENCES `betreuer` (`BID`),
  ADD CONSTRAINT `betreuer_ibfk_2` FOREIGN KEY (`AGID`) REFERENCES `arbeitsgruppe` (`AGID`);

--
-- Constraints der Tabelle `nachricht`
--
ALTER TABLE `nachricht`
  ADD CONSTRAINT `nachricht_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `betreuer` (`BID`),
  ADD CONSTRAINT `nachricht_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `proband` (`PID`),
  ADD CONSTRAINT `nachricht_ibfk_3` FOREIGN KEY (`BezugID`) REFERENCES `nachricht` (`NID`);

--
-- Constraints der Tabelle `nachricht_test4`
--
ALTER TABLE `nachricht_test4`
  ADD CONSTRAINT `nachricht_test4_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `betreuer` (`BID`);

--
-- Constraints der Tabelle `nachricht_test5`
--
ALTER TABLE `nachricht_test5`
  ADD CONSTRAINT `nachricht_test5_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `proband` (`PID`);

--
-- Constraints der Tabelle `nachricht_test6`
--
ALTER TABLE `nachricht_test6`
  ADD CONSTRAINT `nachricht_test6_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `betreuer` (`BID`),
  ADD CONSTRAINT `nachricht_test6_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `proband` (`PID`);

--
-- Constraints der Tabelle `nachricht_test7`
--
ALTER TABLE `nachricht_test7`
  ADD CONSTRAINT `nachricht_test7_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `betreuer` (`BID`),
  ADD CONSTRAINT `nachricht_test7_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `proband` (`PID`),
  ADD CONSTRAINT `nachricht_test7_ibfk_3` FOREIGN KEY (`BezugID`) REFERENCES `nachricht` (`NID`);

--
-- Constraints der Tabelle `proband`
--
ALTER TABLE `proband`
  ADD CONSTRAINT `proband_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `betreuer` (`BID`);

--
-- Constraints der Tabelle `termin`
--
ALTER TABLE `termin`
  ADD CONSTRAINT `termin_ibfk_1` FOREIGN KEY (`BID`) REFERENCES `betreuer` (`BID`),
  ADD CONSTRAINT `termin_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `proband` (`PID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
