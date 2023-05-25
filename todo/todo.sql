-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Maj 2023, 19:05
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
(24, 'xpajsh', 'asddasd', 'fffff       ', 'InProgress', 0, 1321052400, 1685033167),
(35, 'xpajsh', 'asddsa', 'asdasd   ', 'ToDo', 1685022477, 1321052400, 1685033167),
(36, 'xpajsh', 'Stworzyc wlasna strone ToDo', 'Rozbudowana strona ToDo', 'Done', 1685023820, 1321052400, 1685033167),
(37, 'xpaszka', 'Rozpoczecie kursu', 'asdas', 'ToDo', 1685024474, 1321052400, 1685033167),
(38, 'xpaszka', 'asddsa', 'asddsa ', 'Done', 1685024954, 1321052400, 1685033167),
(39, 'xpaszka', 'asddas', 'asdasd ', 'InProgress', 1685025009, 1321052400, 1685033167),
(40, 'xpaszka', 'asddsa', 'adsasd', 'ToDo', 1685025066, 1321052400, 1685033167),
(41, 'xpaszka', 'asddsa', 'asdsad', 'ToDo', 1685032454, 1321052400, 1685033167),
(42, 'xpaszka', 'ZAHAFHAH', 'asdasdsa', 'ToDo', 1685033167, 1321052400, 1685033167),
(43, 'xpaszka', 'asd', ' asdsad ', 'InProgress', 1685033234, 1321052400, 1685033167),
(44, 'xpaszka', 'dadas', ' daasd ', 'ToDo', 1685033392, 1321052400, 1685033167),
(45, 'xpaszka', 'ccccccc', 'asddsa', 'ToDo', 1685034088, -2147483648, -2147483648),
(46, 'xpaszka', 'Rozpoczecie kursu', 'aaaaaaaa', 'ToDo', 1685034123, 2147483647, 2147483647),
(47, 'xpaszka', 'fffffff', 'fffffffffffffffff', 'ToDo', 1685034220, 1321052400, 1334181600),
(48, 'xpaszka', 'fffffffff', 'ffddddddddddddd', 'ToDo', 1685034244, 1676674800, 1682373600),
(49, 'xpaszka', 'fffffffff', 'ffddddddddddddd', 'ToDo', 1685034256, 1676674800, 1682373600);

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
('chujek123', 'jan1235@wp.pl', '1234', 5, 0),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
