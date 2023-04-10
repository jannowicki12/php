-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Kwi 2023, 18:39
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
('cieka', 5000, 'admin@jasno.pl', 1);

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
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `deliverymethod` varchar(50) DEFAULT NULL,
  `paymentmethod` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `cost_order` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `numberstreet` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id_orders`, `deliverymethod`, `paymentmethod`, `firstname`, `lastname`, `email`, `phonenumber`, `cost_order`, `date_order`, `street`, `numberstreet`, `city`, `zipcode`, `Status`) VALUES
(76, 'Courier', 'paymentcard', 'asd', 'asd', 'admin@asd.pl', 123123123, 123, '2023-04-02', 'asd', 0, 'asd', 'asd', 'ZŁOZONO ZAMOWIENIE'),
(77, 'InPostParcelLocker', 'applepay', 'asd', 'asd', 'admin@asd.pl', 123123123, 123, '2023-04-02', 'asd', 0, 'asd', 'asd', 'ZŁOZONO ZAMOWIENIE'),
(78, 'InPostParcelLocker', 'paymentcard', 'asd', 'asd', 'admin@asd.pl', 123123123, 123, '2023-04-02', 'asd', 0, 'asd', 'asd', 'ZŁOZONO ZAMOWIENIE'),
(79, 'Courier', 'paymentcard', 'asd', 'asd', 'admin@asd.pl', 123123123, 123, '2023-04-02', 'asd', 0, 'asd', 'asd', 'ZŁOZONO ZAMOWIENIE'),
(80, 'Courier', 'paymentcard', 'asd', 'asd', 'admin@asd.pl', 123123123, 123, '2023-04-02', 'asd', 0, 'asd', 'asd', 'ZŁOZONO ZAMOWIENIE'),
(81, 'Courier', 'paymentcard', 'asd', 'asd', 'admin@asd.pl', 123123123, 555, '2023-04-02', 'asd', 0, 'asd', 'asd', 'ZŁOZONO ZAMOWIENIE'),
(82, 'Courier', 'paymentcard', 'Jan', 'Nowicki', 'admin@asd.pl', 123123123, 555, '2023-04-10', 'asd', 0, 'asd', 'asd', 'Potwierdzono zamowienie');

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
  `desc` varchar(1000) DEFAULT NULL,
  `sellout` tinyint(1) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `activ` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `name`, `id_category_three`, `img`, `price`, `desc`, `sellout`, `count`, `activ`) VALUES
(0, 'intelsddd', NULL, 'images/zdj.jpg', 2900, 'asdasd       ', 9, 1, 3),
(1, 'szefowska obudowa', NULL, 'images/zdj.jpg', 2000, 'asdasd', 9, 10, 3),
(2, 'cieka', NULL, 'images/zdj.jpg', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 9, 10, 3),
(4, 'asdasd', NULL, 'images/4.jpg', 123, ' asdasdasd', NULL, 12, NULL),
(5, 'fadfa', NULL, 'images/5.jpg', 555, 'elo elo', NULL, 3, NULL);

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
('jan1234@wp.pl', '1234', 26, 0),
('admin@asd.pl', '1234', 27, 1),
('admin@jasno.pl', '1234', 28, 0),
('jan1235@wp.pl', '1234', 29, 0),
('admin@admin.pl', '1234', 30, 1);

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
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

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
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
