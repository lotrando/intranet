-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Ned 26. bře 2023, 19:49
-- Verze serveru: 8.0.31
-- Verze PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `intranet`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `types`
--

CREATE TABLE `types` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `svg_icon` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `types`
--

INSERT INTO `types` (`id`, `type_name`, `type_route`, `type_color`, `svg_icon`) VALUES
(1, 'Odstávky a servis', 'oznameni.servis', 'cyan', '<svg class=\"icon text-cyan\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5\"></path></svg>'),
(2, 'Změny služeb', 'oznameni.sluzby', 'yellow', '<svg class=\"icon text-yellow\" width=\"40\" height=\"40\" viewBox=\"0 0 24 24\" stroke-width=\"21\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><circle cx=\"9\" cy=\"7\" r=\"4\"></circle><path d=\"M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2\"></path><path d=\"M16 3.13a4 4 0 0 1 0 7.75\"></path><path d=\"M21 21v-2a4 4 0 0 0 -3 -3.85\"></path></svg>'),
(3, 'Informace', 'oznameni.informace', 'azure', '<svg class=\"icon text-azure\" width=\"40\" height=\"40\" viewBox=\"0 0 24 24\" stroke-width=\"21\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M12 8h.01\"></path><path d=\"M11 12h1v4h1\"></path><path d=\"M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z\"></path></svg>'),
(4, 'Semináře', 'oznameni.seminare', 'purple', '<svg class=\"icon text-purple\" width=\"36\" height=\"36\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M5 11a2 2 0 0 1 2 2v2h10v-2a2 2 0 1 1 4 0v4a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-4a2 2 0 0 1 2 -2z\"></path><path d=\"M5 11v-5a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v5\"></path><path d=\"M6 19v2\"></path><path d=\"M18 19v2\"></path></svg>'),
(5, 'Akord', 'oznameni.akord', 'blue', '<svg class=\"icon text-blue\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><line x1=\"3\" y1=\"21\" x2=\"21\" y2=\"21\"></line><path d=\"M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16\"></path><path d=\"M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4\"></path><line x1=\"10\" y1=\"9\" x2=\"14\" y2=\"9\"></line><line x1=\"12\" y1=\"7\" x2=\"12\" y2=\"11\"></line></svg>'),
(6, 'Kultura', 'oznameni.kultura', 'pink', '<svg class=\"icon text-pink\" width=\"36\" height=\"36\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M13.192 9h6.616a2 2 0 0 1 1.992 2.183l-.567 6.182a4 4 0 0 1 -3.983 3.635h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183z\"></path><path d=\"M15 13h.01\"></path><path d=\"M18 13h.01\"></path><path d=\"M15 16.5c1 .667 2 .667 3 0\"></path><path d=\"M8.632 15.982a4.037 4.037 0 0 1 -.382 .018h-1.5a4 4 0 0 1 -3.983 -3.635l-.567 -6.182a2 2 0 0 1 1.992 -2.183h6.616a2 2 0 0 1 2 2\"></path><path d=\"M6 8h.01\"></path><path d=\"M9 8h.01\"></path><path d=\"M6 12c.764 -.51 1.528 -.63 2.291 -.36\"></path></svg>'),
(7, 'Normální', 'oznameni.normalni', 'muted', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon text-muted\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0\"></path><path d=\"M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1\"></path><circle cx=\"12\" cy=\"7.5\" r=\".5\" fill=\"currentColor\"></circle></svg>'),
(8, 'Důležité', 'oznameni.important', 'red', '<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"icon text-red\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke=\"currentColor\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path stroke=\"none\" d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z\"></path><path d=\"M12 9v4\"></path><path d=\"M12 17h.01\"></path></svg>');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
