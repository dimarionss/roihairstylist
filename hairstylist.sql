-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2020 г., 09:51
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hairstylist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `shoutbox`
--

CREATE TABLE `shoutbox` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL COMMENT 'Почта',
  `password` varchar(250) NOT NULL COMMENT 'Пароль',
  `name` varchar(250) NOT NULL COMMENT 'Имя',
  `instagram` varchar(250) NOT NULL COMMENT 'Ник инстаграм',
  `phonenumber` varchar(250) NOT NULL COMMENT 'Номер телефона',
  `usluga` varchar(250) NOT NULL COMMENT 'Тип услуги'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `instagram`, `phonenumber`, `usluga`) VALUES
(16, 'yurevich.home@gmail.com', '789', 'Zm2411', '@dmitriy_roi', '380935221315', ',,,,,,,,,');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `shoutbox`
--
ALTER TABLE `shoutbox`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `shoutbox`
--
ALTER TABLE `shoutbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
