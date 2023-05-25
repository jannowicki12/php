-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Maj 2023, 16:57
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `todo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `todolist`
--

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `tytul` varchar(50) DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `todolist`
--

INSERT INTO `todolist` (`id`, `user`, `tytul`, `opis`, `status`, `date`) VALUES
(24, 'xpajsh', 'asddasd', 'fffff       ', 'InProgress', 0),
(35, 'xpajsh', 'asddsa', 'asdasd   ', 'ToDo', 1685022477),
(36, 'xpajsh', 'Stworzyc wlasna strone ToDo', 'Rozbudowana strona ToDo', 'Done', 1685023820),
(37, 'xpaszka', 'Rozpoczecie kursu', 'asdas', 'InProgress', 1685024474),
(38, 'xpaszka', 'asddsa', 'asddsa ', 'Done', 1685024954),
(39, 'xpaszka', 'asddas', 'asdasd ', 'ToDo', 1685025009),
(40, 'xpaszka', 'asddsa', 'adsasd', 'ToDo', 1685025066);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `id`, `rank`) VALUES
('xpajsh', 'jan@wp.pl', '1234', 2, 2),
('janek', 'jasnow41@gmail.com', '1234', 4, 1),
('user123', 'jan1235@wp.pl', '1234', 5, 0),
('xpaszka', 'admin12@asd.pl', '1234', 6, 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
