-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Mar 2023, 20:57
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
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

CREATE TABLE `cart` (
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `cart`
--

INSERT INTO `cart` (`name`, `price`, `user`, `count`) VALUES
('szefowska obudowa', 2000, 'admin@asd.pl', 1),
('asdasd', 123, 'admin@asd.pl', 1),
('intel', 6000, 'admin@asd.pl', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_one`
--

CREATE TABLE `category_one` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `activ` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_three`
--

CREATE TABLE `category_three` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `activ` tinyint(1) DEFAULT NULL,
  `id_category_two` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category_two`
--

CREATE TABLE `category_two` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `activ` tinyint(1) DEFAULT NULL,
  `id_category_one` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_category_three` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `sellout` tinyint(1) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `activ` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `name`, `id_category_three`, `img`, `price`, `desc`, `sellout`, `count`, `activ`) VALUES
(0, 'intel', NULL, 'images/zdj.jpg', 6000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 9, 10, 3),
(1, 'szefowska obudowa', NULL, 'images/zdj.jpg', 2000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 9, 10, 3),
(2, 'cieka', NULL, 'images/zdj.jpg', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 9, 10, 3),
(4, 'asdasd', NULL, 'images/4.jpg', 123, ' asdasdasd', NULL, 12, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `id` int(11) NOT NULL,
  `isadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`email`, `password`, `id`, `isadmin`) VALUES
('admin@asd.pl', '1234', 17, 1),
('admin@wp.pl', '1234', 18, 0),
('jan@wp.pl', '1234', 19, 0),
('jan1235@wp.pl', '1234', 20, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category_one`
--
ALTER TABLE `category_one`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `category_three`
--
ALTER TABLE `category_three`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_two` (`id_category_two`);

--
-- Indeksy dla tabeli `category_two`
--
ALTER TABLE `category_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_one` (`id_category_one`);

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_three` (`id_category_three`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `category_three`
--
ALTER TABLE `category_three`
  ADD CONSTRAINT `category_three_ibfk_1` FOREIGN KEY (`id_category_two`) REFERENCES `category_two` (`id`);

--
-- Ograniczenia dla tabeli `category_two`
--
ALTER TABLE `category_two`
  ADD CONSTRAINT `category_two_ibfk_1` FOREIGN KEY (`id_category_one`) REFERENCES `category_one` (`id`);

--
-- Ograniczenia dla tabeli `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category_three`) REFERENCES `category_three` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
