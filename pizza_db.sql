-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 04 Mar 2018, 20:33
-- Wersja serwera: 10.1.26-MariaDB-0+deb9u1
-- Wersja PHP: 7.2.2-1+0~20180205160742.18+stretch~1.gbpb78b58

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'ELLELE'),
(2, 'ELLELE'),
(3, 'ELLELE'),
(4, 'lamus! heh'),
(5, 'lamus! hehe'),
(6, 'lamus!'),
(7, 'lamus!'),
(8, 'lamus!'),
(9, 'lamus!'),
(10, 'lamus!'),
(11, 'lamus!'),
(12, 'lamus!'),
(13, 'lamus!'),
(14, 'lamus!');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
