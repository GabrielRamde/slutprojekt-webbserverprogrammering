-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 14 maj 2021 kl 18:40
-- Serverversion: 10.4.17-MariaDB
-- PHP-version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `bilblogg`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `anvandare`
--

CREATE TABLE `anvandare` (
  `anvandarnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `anvandare`
--

INSERT INTO `anvandare` (`anvandarnamn`, `email`, `password`, `status`) VALUES
('GabbidiN', 'gara02001@utb.vaxjo.se', 'gabbe0218', 2),
('Ompah', 'edve02001@utb.vaxjo.se', 'Tjorven!', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `inlagg`
--

CREATE TABLE `inlagg` (
  `anvandarnamn` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `inlaggID` int(10) UNSIGNED NOT NULL,
  `beskrivning` varchar(2000) COLLATE utf8_swedish_ci NOT NULL,
  `Typ` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `anvandare`
--
ALTER TABLE `anvandare`
  ADD PRIMARY KEY (`anvandarnamn`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `anvandarnamn` (`anvandarnamn`) USING BTREE;

--
-- Index för tabell `inlagg`
--
ALTER TABLE `inlagg`
  ADD PRIMARY KEY (`inlaggID`),
  ADD KEY `anvandarnamn` (`anvandarnamn`) USING BTREE;

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `inlagg`
--
ALTER TABLE `inlagg`
  MODIFY `inlaggID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `inlagg`
--
ALTER TABLE `inlagg`
  ADD CONSTRAINT `inlagg_ibfk_1` FOREIGN KEY (`anvandarnamn`) REFERENCES `anvandare` (`anvandarnamn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
