-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 21 2024 г., 20:33
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `room_num` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `type` char(100) NOT NULL,
  `subdivision_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subdivitions`
--

CREATE TABLE `subdivitions` (
  `subdivition_id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `type` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subdivitions`
--

INSERT INTO `subdivitions` (`subdivition_id`, `name`, `type`) VALUES
(1, 'Hello', 'Открытый');

-- --------------------------------------------------------

--
-- Структура таблицы `subdivitions_subscribers`
--

CREATE TABLE `subdivitions_subscribers` (
  `id` int(11) NOT NULL,
  `subdivition_id` int(11) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `patronymic` char(50) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `telephones`
--

CREATE TABLE `telephones` (
  `telephone_id` int(11) NOT NULL,
  `telephone_number` char(16) NOT NULL,
  `room_num` int(11) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'sysadmin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(12, 'admin', 'admin', 'admin'),
(13, 'sdfsdf', 'bd9abe38537ecd5f65f15352263acea1', 'sysadmin'),
(14, 'uu', '6277e2a7446059985dc9bcf0a4ac1a8f', 'sysadmin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_num`),
  ADD UNIQUE KEY `subdivision_id` (`subdivision_id`);

--
-- Индексы таблицы `subdivitions`
--
ALTER TABLE `subdivitions`
  ADD PRIMARY KEY (`subdivition_id`);

--
-- Индексы таблицы `subdivitions_subscribers`
--
ALTER TABLE `subdivitions_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subdivition_id` (`subdivition_id`),
  ADD KEY `subscriber_id` (`subscriber_id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Индексы таблицы `telephones`
--
ALTER TABLE `telephones`
  ADD PRIMARY KEY (`telephone_id`),
  ADD KEY `room_num` (`room_num`),
  ADD KEY `subscriber_id` (`subscriber_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk1` FOREIGN KEY (`subdivision_id`) REFERENCES `subdivitions` (`subdivition_id`);

--
-- Ограничения внешнего ключа таблицы `subdivitions_subscribers`
--
ALTER TABLE `subdivitions_subscribers`
  ADD CONSTRAINT `subdivitions_subscribers_ibfk_1` FOREIGN KEY (`subdivition_id`) REFERENCES `subdivitions` (`subdivition_id`),
  ADD CONSTRAINT `subdivitions_subscribers_ibfk_2` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`subscriber_id`);

--
-- Ограничения внешнего ключа таблицы `telephones`
--
ALTER TABLE `telephones`
  ADD CONSTRAINT `telephones_ibfk_1` FOREIGN KEY (`room_num`) REFERENCES `rooms` (`room_num`),
  ADD CONSTRAINT `telephones_ibfk_2` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`subscriber_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
