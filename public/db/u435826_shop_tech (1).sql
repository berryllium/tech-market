-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 19 2019 г., 00:11
-- Версия сервера: 5.5.64-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u435826_shop_tech`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `name`, `img`) VALUES
(1, 'Умные гаджеты, универсальный инструмент', 'Смартфоны', 'og__f2jtwncwsl2e_overview.png'),
(2, 'Источники питания', 'Зарядные устройства', 'TJzU7zHlQeSR.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house` varchar(10) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `telegram` varchar(100) NOT NULL,
  `vk` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `time1` varchar(100) NOT NULL,
  `time2` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `city`, `street`, `house`, `whatsapp`, `telegram`, `vk`, `instagram`, `time1`, `time2`) VALUES
(1, '89312107181', 'gorkundp@yan.ru', 'Сосновый Бор', 'Красных Фортов, 11/2', '65', 'https://www.whatsapp.com/', 'https://tlgrm.ru/', 'https://vk.com/feed', 'https://www.instagram.com/', '07:00 - 23.00', '10.30 - 20.00');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '5',
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `allow` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `id_prod`, `title`, `rating`, `user`, `email`, `allow`, `text`, `date`) VALUES
(1, 1, 'Apple как всегда на коне!', 5, 'Дмитрий', 'dim1034@yandex.ru', 0, 'Очень доволен покупкой, а в этом магазине и цена радует. Всем рекомендую!', '2019-12-18 19:17:05'),
(2, 2, 'Очень быстрая зарядка', 5, 'Василий', 'vasya1978@mail.ru', 0, 'До этого был другой зарядник, этот лучше', '2019-12-18 20:15:21');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `date`, `status`) VALUES
(1, 'Дмитрий Горкун', 'gorkundp@ya.ru', 'Санкт-Петербург, ул.Космонавтов, д.6', '89312108795', '2019-12-18 19:22:37', 'done'),
(2, 'Дмитрий Горкун', 'gorkundp@ya.ru', 'Новгород, Ленинградская 7', '89312107181', '2019-12-18 19:24:45', ''),
(3, 'Дмитрий Горкун', 'gorkundp@ya.ru', 'Москва', '8931287954', '2019-12-18 21:01:28', '');

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(255) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `src` varchar(150) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `id_prod`, `src`, `alt`) VALUES
(1, 1, '2f58800eea_ewr.jpg', 'ewr.jpg'),
(2, 1, '94d637a5de_og__f2jtwncwsl2e_overview.png', 'og__f2jtwncwsl2e_overview.png'),
(3, 1, 'e8314be2a4_popka_shmelya.jpg', 'попка шмеля.jpg'),
(4, 2, '58d49ca4ae_4174302-t2b.jpg', '4174302-t2b.jpg'),
(5, 2, '719b6142d6_TJzU7zHlQeSR.jpg', 'TJzU7zHlQeSR.jpg'),
(6, 2, 'fe81f4f324_belaya.jpg', 'белая.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `features` text NOT NULL,
  `price_new` int(10) NOT NULL,
  `price_old` int(10) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `detail`, `features`, `price_new`, `price_old`, `id_cat`) VALUES
(1, 'Iphone 11', 'Анонс новых iPhone, как всегда, разделил аудиторию во всем мире на восторженных фанатов, кинувшихся занимать места в очереди за новинкой, хейтеров, которые раз за разом убеждают, что «айфон уже не тот», и, наконец, всех остальных, для которых выход нового поколения самого популярного смартфона — повод задуматься об обновлении своих гаджетов или хотя бы присмотреться к тому, что происходит этой в сфере.', 'Большинство новых технологий (ночной режим, сверхширокоугольная камера, новый процессор) представлены и здесь', 85000, 93500, 1),
(2, 'З/у для Samsung', 'Обыкновенное зарядное устройство для телефонов Samsung', 'Неплохая сила тока для быстрой зарядки', 560, 800, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(255) NOT NULL,
  `id_order` int(200) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `count` int(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Купленные товары';

--
-- Дамп данных таблицы `purchases`
--

INSERT INTO `purchases` (`id`, `id_order`, `id_prod`, `count`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 3),
(3, 3, 1, 1),
(4, 3, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `specifications`
--

CREATE TABLE IF NOT EXISTS `specifications` (
  `id` int(255) NOT NULL,
  `id_prod` int(100) NOT NULL,
  `prop` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL,
  `unit` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Характеристики товаров';

--
-- Дамп данных таблицы `specifications`
--

INSERT INTO `specifications` (`id`, `id_prod`, `prop`, `value`, `unit`) VALUES
(1, 1, 'Процессор', 'SoC Apple A13 Bionic (6 ядер)', ''),
(2, 2, 'Входное напряжение', '12 В', ''),
(3, 2, 'Выходное напряжение', '5 В', ''),
(4, 2, 'Сила тока', '1 А', ''),
(5, 2, 'Цвета', 'черный, белый', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`, `name`) VALUES
(1, 'admin', '5154f2a3a5fbdd51f8298b6297d57766', 'admin', 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
