-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.byethost11.com
-- Czas generowania: 07 Sty 2024, 09:46
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `b11_35479412_eee`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Adres_Agencji`
--

CREATE TABLE `Adres_Agencji` (
  `Id_Adresu` int(11) NOT NULL,
  `Miejscowosc` varchar(60) DEFAULT NULL,
  `Ulica` varchar(60) DEFAULT NULL,
  `Nr_Budynku` varchar(4) DEFAULT NULL,
  `Godz_Otwarcia` varchar(5) DEFAULT NULL,
  `Godz_Zamknięcia` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Hotel`
--

CREATE TABLE `Hotel` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(15) DEFAULT NULL,
  `Szczegóły` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Klient`
--

CREATE TABLE `Klient` (
  `Id_Klienta` int(11) NOT NULL,
  `Imie` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `NumerTelefonu` varchar(15) DEFAULT NULL,
  `Kod_pocztowy` varchar(5) DEFAULT NULL,
  `Miejscowość` varchar(60) DEFAULT NULL,
  `Ulica` varchar(60) DEFAULT NULL,
  `Nr_Budynku` varchar(4) DEFAULT NULL,
  `Nr_Mieszkania` varchar(4) DEFAULT NULL,
  `ID_Uzytkownika` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Klient`
--

INSERT INTO `Klient` (`Id_Klienta`, `Imie`, `Nazwisko`, `Email`, `NumerTelefonu`, `Kod_pocztowy`, `Miejscowość`, `Ulica`, `Nr_Budynku`, `Nr_Mieszkania`, `ID_Uzytkownika`) VALUES
(1, 'aaa', 'aaa', 'aaa', '111', NULL, NULL, NULL, NULL, NULL, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kolejka_zapytan`
--

CREATE TABLE `kolejka_zapytan` (
  `id_zapytanie` int(11) NOT NULL,
  `Rodzaj` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Tresc` char(160) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kolejka_zapytan`
--

INSERT INTO `kolejka_zapytan` (`id_zapytanie`, `Rodzaj`, `Status`, `Tresc`) VALUES
(1, 2, 1, 'aaa;aaa;111');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Konta`
--

CREATE TABLE `Konta` (
  `id` int(10) NOT NULL,
  `Login` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Haslo` varchar(60) DEFAULT NULL,
  `Przywilej` int(1) NOT NULL,
  `Id_klienta` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `Konta`
--

INSERT INTO `Konta` (`id`, `Login`, `Haslo`, `Przywilej`, `Id_klienta`) VALUES
(1, 'admin', '$2y$10$41y0T8772O9f5CHNk3N9iewyQ2Dn5X.kUBZ4bmrf0IZAkXjyU7S1C', 1, NULL),
(2, 'pracownik_1', '$2y$10$WasXGtvqUOxbS.NlZdJVYu2CchD8Cr/98meT1vdavn17oIeJhTDS.', 2, NULL),
(3, 'klient_1', '$2y$10$vr6UJOwnNmF0i8APE1stme9/D3vV/IZD6OpOjeVs0FLzEGAkvkhZe', 3, NULL),
(4, 'gosc', '$2y$10$m45IR16JG0KhyWys3WMbc.T2giLQeBp9ueuNEXzqeJrbMBiMoP5ma', 4, NULL),
(5, 'miku', '$2y$10$4eHkMZANq52jjOu6Dn6dre2lUpNYrVhj9GsDZE8k7aqVDRDzS0Nea', 3, NULL),
(6, 'damianek', '$2y$10$AoYK.X7S2vO/gqbxNZt6fO6ianoiOC6rTTKs0SzjDw1eRpSVVW8i.', 3, NULL),
(9, 'liku', '$2y$10$/pbgjwyOY98SzDUvA8tKkekPhc7Tt81.JL.rJtjeOy5HCCPcwGEvS', 3, NULL),
(18, 'aaa', '$2y$10$EGI7L6y3/1Jwb3oN1lIgDuGvRL7MG6T9PW7js4troGxAnJIMkuL62', 3, NULL),
(13, 'janadzi2', '$2y$10$iFRmTuhbo/NUrLTXzVqMG.u.AkewBj4fZH09O9S/krM.UcwwR2dIu', 3, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Kraj`
--

CREATE TABLE `Kraj` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Oferta`
--

CREATE TABLE `Oferta` (
  `Id_Oferty` int(11) NOT NULL,
  `Nazwa` varchar(50) DEFAULT NULL,
  `Kraj` int(11) DEFAULT NULL,
  `Miejscowosc` varchar(60) DEFAULT NULL,
  `Cena` decimal(10,2) DEFAULT NULL,
  `Hotele` int(11) DEFAULT NULL,
  `Wycieczki` int(11) DEFAULT NULL,
  `Ocena` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Pracownik`
--

CREATE TABLE `Pracownik` (
  `Id_Pracownika` int(11) NOT NULL,
  `Imię` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Wydział` varchar(50) DEFAULT NULL,
  `Wynagrodzenie` int(11) DEFAULT NULL,
  `Data_Zatrudnienia` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Uprawnienie`
--

CREATE TABLE `Uprawnienie` (
  `Id` int(11) NOT NULL,
  `Poziom_Uprawnienia` varchar(15) DEFAULT NULL,
  `Dozwolone_Operacje` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Wycieczka`
--

CREATE TABLE `Wycieczka` (
  `Id` int(11) NOT NULL,
  `Nazwa` varchar(15) DEFAULT NULL,
  `Szczegóły` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `Adres_Agencji`
--
ALTER TABLE `Adres_Agencji`
  ADD PRIMARY KEY (`Id_Adresu`);

--
-- Indeksy dla tabeli `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `Klient`
--
ALTER TABLE `Klient`
  ADD PRIMARY KEY (`Id_Klienta`),
  ADD UNIQUE KEY `ID_Uzytkownika` (`ID_Uzytkownika`);

--
-- Indeksy dla tabeli `kolejka_zapytan`
--
ALTER TABLE `kolejka_zapytan`
  ADD PRIMARY KEY (`id_zapytanie`);

--
-- Indeksy dla tabeli `Konta`
--
ALTER TABLE `Konta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_Login` (`Login`),
  ADD KEY `Id_klienta` (`Id_klienta`);

--
-- Indeksy dla tabeli `Kraj`
--
ALTER TABLE `Kraj`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `Oferta`
--
ALTER TABLE `Oferta`
  ADD PRIMARY KEY (`Id_Oferty`);

--
-- Indeksy dla tabeli `Pracownik`
--
ALTER TABLE `Pracownik`
  ADD PRIMARY KEY (`Id_Pracownika`);

--
-- Indeksy dla tabeli `Uprawnienie`
--
ALTER TABLE `Uprawnienie`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `Wycieczka`
--
ALTER TABLE `Wycieczka`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Adres_Agencji`
--
ALTER TABLE `Adres_Agencji`
  MODIFY `Id_Adresu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Klient`
--
ALTER TABLE `Klient`
  MODIFY `Id_Klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `kolejka_zapytan`
--
ALTER TABLE `kolejka_zapytan`
  MODIFY `id_zapytanie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `Konta`
--
ALTER TABLE `Konta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `Kraj`
--
ALTER TABLE `Kraj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Oferta`
--
ALTER TABLE `Oferta`
  MODIFY `Id_Oferty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Pracownik`
--
ALTER TABLE `Pracownik`
  MODIFY `Id_Pracownika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Uprawnienie`
--
ALTER TABLE `Uprawnienie`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `Wycieczka`
--
ALTER TABLE `Wycieczka`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
