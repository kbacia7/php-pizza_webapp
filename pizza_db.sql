-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 08 Kwi 2018, 14:29
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pizza_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `accounts`
--

INSERT INTO `accounts` (`ID`, `login`, `password`, `salt`) VALUES
(1, 'Kamil', 'f2b5eeab09ef0f2205e28128a1503711f8dbdd28f875103d32f043699089ba43', '0be858a063fcc41bc6cd8057fd47c409_NOFCDUCxz]DSoB');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `config`
--

CREATE TABLE `config` (
  `ID` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `position` mediumtext NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `cashChar` varchar(5) NOT NULL,
  `descriptionGallery1` text NOT NULL,
  `descriptionGallery2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `config`
--

INSERT INTO `config` (`ID`, `title`, `position`, `contactNumber`, `cashChar`, `descriptionGallery1`, `descriptionGallery2`) VALUES
(1, 'Pizzeria', '51.588721, 19.141944', '(48) 715-354-234', 'PLN', 'Opis pierwszy', 'Opis drugi  ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery_item`
--

CREATE TABLE `gallery_item` (
  `ID` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleryID` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `gallery_item`
--

INSERT INTO `gallery_item` (`ID`, `description`, `path`, `galleryID`) VALUES
(17, 'sddssd', 'f121a23c223d6e5fa72278f707d7573c0f4448bf2ae13655716d8d5817dcdc13.jpeg', 1),
(18, 'sddssd', 'ea73e307aa6abee8360fa08540e6903b2ca19700d8d841dd48b37db2236db444.jpeg', 1),
(19, 'sddssd', '548251c7fb50d9d8af50bf48cc30c55ff8a206be677a67a0c76754028969e7e6.jpeg', 1),
(20, 'dsddssd', 'ad0498be7efd03cba81754e6f07e63fe627aaf4e84bdb394b904f3151bfe3cdc.jpeg', 2),
(21, 'dsddssd', '8ddcf3a5ca06ed362c997021b9ec40ca0c2cdd0910309353372f36d593edc93e.jpeg', 2),
(25, 'vvv', '9ada6d290b5f420c0b8bc931b459ed4a4099d08cb19b1d91c856c133a6c596b2.jpeg', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_category`
--

CREATE TABLE `menu_category` (
  `ID` int(11) NOT NULL,
  `title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `menu_category`
--

INSERT INTO `menu_category` (`ID`, `title`) VALUES
(34, 'Napoje i soki'),
(41, 'Owoce morza'),
(42, 'Jedzenie dla wegan'),
(150, 'Nazwa menu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_item`
--

CREATE TABLE `menu_item` (
  `ID` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `menu_item`
--

INSERT INTO `menu_item` (`ID`, `title`, `price`, `parent`) VALUES
(67, 'CocaCola', '0.99', 34),
(68, 'Fanta ', '1.11', 34),
(69, 'Sushi z kraba', '4.99', 41),
(70, 'SaÅ‚atka z tofu', '11.92', 42),
(71, 'SaÅ‚atka z marchwi', '111.00', 42),
(72, 'Woda', '0.00', 34),
(73, 'Krewetki z maÅ‚Å¼ami', '4.99', 41),
(74, 'Filet z dÅ¼dÅ¼ownicy', '4.99', 41);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `gallery_item`
--
ALTER TABLE `gallery_item`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `parent` (`parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `config`
--
ALTER TABLE `config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `gallery_item`
--
ALTER TABLE `gallery_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT dla tabeli `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu_category` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
