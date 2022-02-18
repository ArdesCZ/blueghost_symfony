-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 17. úno 2022, 17:00
-- Verze serveru: 10.4.22-MariaDB
-- Verze PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `blueghostorm`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vypisuji data pro tabulku `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220215152128', '2022-02-16 16:02:04', 211);

-- --------------------------------------------------------

--
-- Struktura tabulky `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijmeni` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonni_cislo` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poznamka` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `kontakt`
--

INSERT INTO `kontakt` (`id`, `jmeno`, `prijmeni`, `telefonni_cislo`, `email`, `poznamka`) VALUES
(1, 'Jan', 'Malý', 741258963, 'maly@gmail.com', 'dgdhdhdh'),
(2, 'Pavel', 'Novák', 963258741, 'novak@gmail.com', 'dhhjde'),
(3, 'Pavel', 'Soukup', 369852147, 'soukup@gmail.com', 'setsgsgs'),
(4, 'Jan', 'Pavlas', 369852147, 'pavlas@gmail.com', 'jodjgodg'),
(5, 'Marek', 'Pavlasů', 987456321, 'pavlasu@gmail.com', 'jodjgodgsgsg'),
(6, 'Pan', 'Mráz', 12365799, 'mraz@seznam.cz', 'fdhhv');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexy pro tabulku `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
