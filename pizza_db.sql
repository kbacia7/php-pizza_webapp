-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 22 Kwi 2018, 12:22
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 7.2.4

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
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `salt` text COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `firstName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `accounts`
--

INSERT INTO `accounts` (`ID`, `login`, `password`, `salt`, `admin`, `firstName`, `lastName`) VALUES
(1, 'admin', '575954f88b8e22f91fa86945754cfb80a07a1513c045fa877e49a05aef5ec035', '938526a2d9fe391993e81ae24394321eKKYlZreQq82WhXz', 1, 'Adam', 'Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `config`
--

CREATE TABLE `config` (
  `ID` int(11) NOT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `position` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contactNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cashChar` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `descriptionGallery1` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `descriptionGallery2` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `config`
--

INSERT INTO `config` (`ID`, `title`, `position`, `contactNumber`, `cashChar`, `descriptionGallery1`, `descriptionGallery2`) VALUES
(1, 'Pizzeria', '51.588721, 19.141944', '(48) 715-354-234', 'zł', 'Opis pierwszy', 'Opis drugi  ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_message`
--

CREATE TABLE `contact_message` (
  `ID` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `dateSend` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contact_room`
--

CREATE TABLE `contact_room` (
  `ID` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery_item`
--

CREATE TABLE `gallery_item` (
  `ID` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `galleryID` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `gallery_item`
--

INSERT INTO `gallery_item` (`ID`, `description`, `path`, `galleryID`) VALUES
(17, 'Opis 1', 'f121a23c223d6e5fa72278f707d7573c0f4448bf2ae13655716d8d5817dcdc13.jpeg', 1),
(18, 'Opis 2', 'ea73e307aa6abee8360fa08540e6903b2ca19700d8d841dd48b37db2236db444.jpeg', 1),
(19, 'Opis 3', '548251c7fb50d9d8af50bf48cc30c55ff8a206be677a67a0c76754028969e7e6.jpeg', 1),
(20, 'Ndt.', 'ad0498be7efd03cba81754e6f07e63fe627aaf4e84bdb394b904f3151bfe3cdc.jpeg', 2),
(21, 'Ndt.', '8ddcf3a5ca06ed362c997021b9ec40ca0c2cdd0910309353372f36d593edc93e.jpeg', 2),
(25, 'Ndt.', '9ada6d290b5f420c0b8bc931b459ed4a4099d08cb19b1d91c856c133a6c596b2.jpeg', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_category`
--

CREATE TABLE `menu_category` (
  `ID` int(11) NOT NULL,
  `title` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `menu_category`
--

INSERT INTO `menu_category` (`ID`, `title`) VALUES
(34, 'Napoje i soki'),
(41, 'Owoce morza'),
(42, 'Jedzenie dla wegan');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menu_item`
--

CREATE TABLE `menu_item` (
  `ID` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `menu_item`
--

INSERT INTO `menu_item` (`ID`, `title`, `price`, `parent`) VALUES
(67, 'CocaCola', '1.50', 34),
(68, 'Fanta ', '1.50', 34),
(69, 'Sushi z kraba', '12.00', 41),
(70, 'Sałatka z tofu', '5.00', 42),
(71, 'Sałatka z marchwi', '5.00', 42),
(72, 'Woda', '0.50', 34),
(73, 'Krewetki z małżami', '19.00', 41);

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
-- Indeksy dla tabeli `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `roomID` (`roomID`),
  ADD KEY `author` (`author`);

--
-- Indeksy dla tabeli `contact_room`
--
ALTER TABLE `contact_room`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `contact_room_ibfk_1` (`owner`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT dla tabeli `config`
--
ALTER TABLE `config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT dla tabeli `contact_room`
--
ALTER TABLE `contact_room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `gallery_item`
--
ALTER TABLE `gallery_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT dla tabeli `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `contact_message`
--
ALTER TABLE `contact_message`
  ADD CONSTRAINT `contact_message_ibfk_1` FOREIGN KEY (`roomID`) REFERENCES `contact_room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_message_ibfk_2` FOREIGN KEY (`author`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `contact_room`
--
ALTER TABLE `contact_room`
  ADD CONSTRAINT `contact_room_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu_category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
