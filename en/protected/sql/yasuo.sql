-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jún 18. 16:30
-- Kiszolgáló verziója: 10.4.10-MariaDB
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webprog_beadando`
--

DELIMITER $$
--
-- Eljárások
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `asdasd` ()  MODIFIES SQL DATA
BEGIN
DECLARE counter INT;
DECLARE time INT;
SET counter = 0;
SET time = 500;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dorepeat` ()  BEGIN
    DECLARE total_value INT;
   SET total_value = 0;

   WHILE total_value <= 10 DO
   UPDATE asdasd SET asdasd.timer=asdasd.timer+1;
     SET total_value = total_value + 1;
     DO sleep(1);
   END WHILE;

  END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `asdasd`
--

CREATE TABLE `asdasd` (
  `timer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `asdasd`
--

INSERT INTO `asdasd` (`timer`) VALUES
(508),
(518),
(518);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `bugDangerLevel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `bug`
--

INSERT INTO `bug` (`id`, `username`, `subject`, `message`, `bugDangerLevel`) VALUES
(13, 'tesztelek', 'elmegy', 'elmegy', 0),
(14, 'tesztelek', 'zavar', 'zavar', 3),
(15, 'tesztelek', 'bajvan', 'bajvan', 3),
(16, 'tesztelek', 'elmegyf', 'elmegyf', 2),
(17, 'tesztelek', 'elmegyf', 'elmegyf', 0),
(18, 'tesztelek', 'elmegyf', 'elmegyf', 1),
(19, 'tesztelek', 'elmegyf', 'elmegyf', 2),
(20, 'tesztelek', 'elmegyf', 'elmegyf', 0),
(21, 'tesztelek', 'elmegy', 'elmegy', 3),
(22, 'tesztelek', 'zavar', 'zavar', 0),
(23, 'tesztelek', 'bajvan', 'bajvan', 0),
(24, 'tesztelek', 'elmegyf', 'elmegyf', 2),
(25, 'tesztelek', 'elmegyf', 'elmegyf', 2),
(26, 'tesztelek', 'elmegyf', 'elmegyf', 1),
(27, 'tesztelek', 'elmegyf', 'elmegyf', 1),
(28, 'tesztelek', 'elmegyf', 'elmegyf', 0),
(29, 'anyád', 'igen', 'nem', 2),
(30, 'tesztelek', 'fdfgfd', 'bvcbfh', 3),
(31, 'tesztelek', 'gfdg', 'gdfg', 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `skin` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `level` int(2) NOT NULL DEFAULT 1,
  `cash` int(200) NOT NULL DEFAULT 100,
  `permission` int(1) NOT NULL DEFAULT 1,
  `skin1_owned` tinyint(1) NOT NULL DEFAULT 0,
  `skin2_owned` tinyint(1) NOT NULL DEFAULT 0,
  `skin3_owned` tinyint(1) NOT NULL DEFAULT 0,
  `skin4_owned` tinyint(1) NOT NULL DEFAULT 0,
  `stregth_point` tinyint(4) NOT NULL DEFAULT 0,
  `healt_point` tinyint(4) NOT NULL DEFAULT 0,
  `skill_point` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `skin`, `level`, `cash`, `permission`, `skin1_owned`, `skin2_owned`, `skin3_owned`, `skin4_owned`, `stregth_point`, `healt_point`, `skill_point`) VALUES
(16, 'tesztelek', 'asdasd@asd.asd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 4, 18, 70, 2, 0, 0, 0, 1, 0, 127, 0),
(27, 'longidass', 'longidas1@gmail.com', '1798a15d09fd38eaaa10af3e06cd39c98c484501', 2, 6, 150, 3, 0, 1, 0, 0, 0, 0, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bug`
--
ALTER TABLE `bug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
