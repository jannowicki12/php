-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Maj 2023, 22:07
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
  `date` int(11) DEFAULT NULL,
  `OdDaty` int(50) NOT NULL,
  `DoDaty` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `todolist`
--

INSERT INTO `todolist` (`id`, `user`, `tytul`, `opis`, `status`, `date`, `OdDaty`, `DoDaty`) VALUES
(1, 'xpaszka', 'fadfafdsaf', 'dafdsafasd', 'ToDo', 1685044914, 0, 0),
(2, 'xpaszka', 'dafadfasdf', 'asdfafdsafafd', 'ToDo', 1685044916, 0, 0),
(3, 'xpaszka', 'dasdsad', 'dasdasd', 'ToDo', 1685044921, 0, 0),
(4, 'xpaszka', 'fadsfdasfadsf', 'dsfadafasdf', 'ToDo', 1685044923, 0, 0),
(5, 'xpaszka', 'dsadsadsa', 'dsadsa', 'ToDo', 1685044933, 0, 0),
(6, 'xpaszka', 'adsdsa', 'adssad', 'ToDo', 1685044948, 0, 0),
(7, 'xpaszka', 'asddsa', 'adsdsa', 'ToDo', 1685044951, 0, 0),
(8, 'xpaszka', 'asddsad', 'sadasdsadas', 'ToDo', 1685045026, 0, 0),
(9, 'xpaszka', 'saddsadsa', 'dassaddsa', 'ToDo', 1685045028, 0, 0),
(10, 'xpaszka', 'dassdadsa', 'dsadsa', 'ToDo', 1685045036, 0, 0);

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
('kuba', 'jan1235@wp.pl', '1234', 5, 0),
('xpaszka', 'admin12@asd.pl', '1234', 6, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
