-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jan 2023 om 12:36
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzeria`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestelId` int(3) NOT NULL,
  `klantId` int(3) NOT NULL,
  `datumuur` datetime NOT NULL,
  `totaalprijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestelId`, `klantId`, `datumuur`, `totaalprijs`) VALUES
(1, 1, '2022-09-15 10:26:48', 12.75),
(2, 1, '2022-09-15 10:33:56', 38.25),
(3, 5, '2022-09-15 12:23:15', 12.75),
(4, 9, '2022-12-28 11:15:59', 12.75);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelregels`
--

CREATE TABLE `bestelregels` (
  `bestelregelId` int(3) NOT NULL,
  `bestelId` int(3) NOT NULL,
  `productId` int(3) NOT NULL,
  `aantal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestelregels`
--

INSERT INTO `bestelregels` (`bestelregelId`, `bestelId`, `productId`, `aantal`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 3),
(3, 3, 2, 1),
(4, 4, 2, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantid` int(3) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `straat` varchar(50) NOT NULL,
  `nummer` int(3) NOT NULL,
  `postid` int(4) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `promo` tinyint(4) NOT NULL,
  `bemerkingen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantid`, `naam`, `voornaam`, `straat`, `nummer`, `postid`, `telefoonnummer`, `email`, `wachtwoord`, `promo`, `bemerkingen`) VALUES
(5, 'Doe', 'Jane', 'straat', 7, 5, '741854', 'jane@doe.be', '$2y$10$t/IENTCMPJuFqOReQFD3cOoF/ygJbDeX81DRxjCGSphXZ7LnZgJyK', 0, ''),
(6, 'Lacor', 'Tom', 'straat', 157, 6, '456889922', 'tomlacor@gmail.com', 'wachtwoord', 0, ''),
(7, 'Lacor', 'Tom', 'straat', 157, 7, '456', 'tomlacor@gmail.com', 'wachtwoord', 0, ''),
(8, 'Lacor', 'Tom', 'straat', 157, 8, '0', 'tomlacor@gmail.com', 'wachtwoord', 0, ''),
(9, 'Lacor', 'Tom', 'straat', 157, 9, '0457/36.84.02', 'tomlacor@gmail.com', 'wachtwoord', 0, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `postcodes`
--

CREATE TABLE `postcodes` (
  `postid` int(4) NOT NULL,
  `postcode` int(4) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `leverbaar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `postcodes`
--

INSERT INTO `postcodes` (`postid`, `postcode`, `woonplaats`, `leverbaar`) VALUES
(1, 0, 'test', 0),
(2, 9000, 'Gent', 1),
(3, 9030, 'Wondelgem', 0),
(4, 0, '', 0),
(5, 9000, 'Gent', 1),
(6, 2570, 'duffel', 0),
(7, 2570, 'duffel', 0),
(8, 2570, 'duffel', 0),
(9, 2570, 'duffel', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `productid` int(10) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `productinfo` varchar(100) NOT NULL,
  `prijs` float NOT NULL,
  `promotieprijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`productid`, `naam`, `productinfo`, `prijs`, `promotieprijs`) VALUES
(1, 'Margherita', 'Pizza met tomatensaus, mozarella en basilicum', 10, 9.5),
(2, 'Quattro formaggi', 'Pizza met 4 kazen', 12.75, 12),
(3, 'Hawai', 'Met ananas', 10, 9),
(4, 'Funghi', 'Met champignons', 10, 9),
(5, 'Bolognese', 'Met gehakt en tomaat', 12, 10),
(6, 'Calzone', 'Dubbel gevouwen', 12, 10);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestelId`);

--
-- Indexen voor tabel `bestelregels`
--
ALTER TABLE `bestelregels`
  ADD PRIMARY KEY (`bestelregelId`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantid`);

--
-- Indexen voor tabel `postcodes`
--
ALTER TABLE `postcodes`
  ADD PRIMARY KEY (`postid`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestelId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `bestelregels`
--
ALTER TABLE `bestelregels`
  MODIFY `bestelregelId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klantid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `postcodes`
--
ALTER TABLE `postcodes`
  MODIFY `postid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `productid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
