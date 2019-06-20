-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 20 2019 г., 12:24
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `CarId` int(100) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Capacity` varchar(100) NOT NULL,
  `Year` int(100) NOT NULL,
  `Colour` varchar(100) NOT NULL,
  `Speed` int(100) NOT NULL,
  `Price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`CarId`, `Brand`, `Model`, `Capacity`, `Year`, `Colour`, `Speed`, `Price`) VALUES
(1, 'Mersedes', 'S600', '6.0', 2017, '1', 250, 100000),
(2, 'BMW', '130', '2.0', 2001, '2', 200, 2000),
(3, 'Mersedes', '100', '2.0', 2017, '3', 200, 50000),
(4, 'Nissan', 'Primera', '2.0', 2016, '4', 200, 30000),
(5, 'Opel', 'Vectra', '2.0', 2010, '1', 200, 30000),
(6, 'BMW', '230', '2.3', 2010, '1', 200, 10000);

-- --------------------------------------------------------

--
-- Структура таблицы `colour`
--

CREATE TABLE `colour` (
  `ColourId` int(100) NOT NULL,
  `Color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `colour`
--

INSERT INTO `colour` (`ColourId`, `Color`) VALUES
(1, 'white'),
(2, 'red'),
(3, 'black'),
(4, 'blue');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `OrderId` int(100) NOT NULL,
  `CarId` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Payment` enum('cash','credit card') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`OrderId`, `CarId`, `Name`, `Payment`) VALUES
(1, 5, 'Vladimir Labunskyi', 'credit card');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarId`);

--
-- Индексы таблицы `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`ColourId`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `CarId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `colour`
--
ALTER TABLE `colour`
  MODIFY `ColourId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
