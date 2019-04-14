-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 apr 2019 om 21:28
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fruit`
--

CREATE TABLE `fruit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `fruit`
--

INSERT INTO `fruit` (`id`, `name`, `season`) VALUES
(1, 'Abrikoos', 'Zomer'),
(2, 'Banaan', 'Jaar'),
(3, 'Citroen', 'Jaar'),
(4, 'Appel', 'Herfst'),
(5, 'Druif', 'Herfst'),
(6, 'Kruisbes', 'Herfst'),
(7, 'Braam', 'Zomer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `order`
--

INSERT INTO `order` (`id`, `customer`) VALUES
(1, 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `order_row`
--

CREATE TABLE `order_row` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `order_row`
--

INSERT INTO `order_row` (`id`, `recipe_id`, `order_id`, `amount`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `receipt`
--

INSERT INTO `receipt` (`id`, `customer`, `phone`, `delivery_date`) VALUES
(1, 'Nu uN', '634116607', '2014-01-01');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `fruit_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_liter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preperation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recipe`
--

INSERT INTO `recipe` (`id`, `fruit_id`, `name`, `price_liter`, `preperation`) VALUES
(1, 4, 'Appeltaartijs', '19.00', 'gooi room bij appel, kers en melk, kook het mengsel en voeg 1 kilo suiker toe. Laat afkoelen bij kamertemperatuur.'),
(2, NULL, 'Chocomousseijs', '12.00', 'Smelt 400 g melkchocolade au bain marie, klop 500 g slagroom op. Meng een ei door de chocolade en schep die door de slagroom. Laat de chocomousse al draaiend opstijven en zet daarna in de koelkast. Max 4 graden celsius afkoelen.'),
(3, NULL, 'Drakenfruitijs', '14.00', 'Schep het drakenfruit leeg. Maak een halve liter slagroom. Schep het fruit door de slagroom. Koel het mensgel'),
(4, NULL, 'Blauwebessenijs', '15.00', 'Kook de blauwe bessen (1000 g). Kook boerenmelk en laat afkoelen. Sla room tot punten. Meng door de afgekoelde melk. Meng de blauwe bessen door de melk. Laat alles afkoelen.'),
(5, 6, 'Kruisbessenijs', '45.50', '2 kilo kruisbessen verpulveren. Mengen met sorbetijs en door de mascarpone scheppen.'),
(6, 7, 'Bramenijs', '16.50', 'Kook de bramen stuk. Voeg 1:1 suiker toe en 1:2 room. Kook de room in, voeg 100 g pure chocolade toe en laat het mengsel afkoelen. Schep slagroom door het mengsel.'),
(7, 3, 'Citroenijs', '9.00', 'Rasp citroenschil. Kook de schil en laat afkoelen. Pers 4 citroenen uit. Meng het sap met 250 g suiker. Klop een halve liter slagroom op. Schep dat door het citroensap. Voeg een halve liter sojamelk toe. Laat het mengsel langzaam afkoelen.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fruit`
--
ALTER TABLE `fruit`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `order_row`
--
ALTER TABLE `order_row`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C76BB9BB59D8A214` (`recipe_id`),
  ADD KEY `IDX_C76BB9BB8D9F6D38` (`order_id`);

--
-- Indexen voor tabel `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_DA88B137BAC115F0` (`fruit_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fruit`
--
ALTER TABLE `fruit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `order_row`
--
ALTER TABLE `order_row`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `order_row`
--
ALTER TABLE `order_row`
  ADD CONSTRAINT `FK_C76BB9BB59D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `FK_C76BB9BB8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `receipt` (`id`);

--
-- Beperkingen voor tabel `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `FK_DA88B137BAC115F0` FOREIGN KEY (`fruit_id`) REFERENCES `fruit` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
