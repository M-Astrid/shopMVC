-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2019 г., 09:48
-- Версия сервера: 5.6.41-log
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parlo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Товары для дома', 1, 1),
(2, 'Одежда', 2, 1),
(3, 'Аксессуары', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `content`) VALUES
(1, 'News 1', '2019-10-10 14:41:53', 'News 1 content'),
(2, 'News 2', '2019-10-10 14:42:36', 'News 2 content'),
(3, 'News 3', '2019-10-10 14:42:59', 'News 3 content');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `tel` varchar(64) NOT NULL,
  `comment` text NOT NULL,
  `products` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(191) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `tel`, `comment`, `products`, `date`, `user_id`, `status`) VALUES
(12, 'Admin', '89618259415', 'Это тестовый заказ', '{\"12\":7,\"20\":3}', '2019-12-04 15:05:03', 40, '2'),
(11, 'Павел', '+79132289941', 'Комментарий', '{\"1\":1,\"17\":\"4\",\"24\":1}', '2019-12-04 14:59:55', 41, '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(1) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(1) NOT NULL,
  `is_recommended` int(1) NOT NULL,
  `display` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `img`, `description`, `is_new`, `is_recommended`, `display`) VALUES
(1, 'Светильник', 1, 498426, 30, 1, 'Gl&W', 'product-6.jpg', 'Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара Описание товара ', 1, 0, 1),
(4, 'Стул Складной', 1, 234255, 99.9, 1, '', 'product_1.png', '', 1, 0, 1),
(5, 'Табурет', 1, 344533, 99.9, 0, '', 'product-8.jpg', '', 0, 0, 1),
(12, 'Часы Черные', 1, 654789, 99.9, 1, '', 'product_2.png', '', 1, 1, 1),
(16, 'Рюкзак Черный', 3, 654789, 40, 1, 'D&D', 'product_12-300x300.png', 'Детальное описание товара со всеми его свойствами и характеристиками.', 1, 1, 1),
(17, 'Светильник Белый', 1, 123156, 45, 1, 'D', 'product_6.png', 'Описание товара', 1, 1, 1),
(18, 'Часы Светлые', 1, 123156, 45, 1, 'D', 'product_4-300x300.png', 'Описание товара описание товара описание товара', 1, 1, 1),
(19, 'Парные торшеры', 1, 123156, 65, 1, 'D&D', 'product_4.png', '', 0, 0, 1),
(20, 'Табурет', 1, 654789, 65, 1, 'D&D', 'product_7.png', '', 0, 1, 1),
(21, 'Парка Серая', 2, 654789, 99, 1, '', 'product_9-300x300.png', '', 0, 0, 1),
(22, 'Пальто', 2, 234255, 105, 1, 'D', 'product_10-300x300.png', '', 0, 0, 1),
(23, 'Пиджак', 2, 498426, 77, 1, 'D', 'product_11-300x300.png', '', 0, 1, 1),
(24, 'Рюкзак Серый', 3, 123156, 45, 1, 'D&D', 'product_13.png', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `join_date` int(11) UNSIGNED DEFAULT NULL,
  `cart_products` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role` varchar(64) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `join_date`, `cart_products`, `role`) VALUES
(40, 'Admin', 'admin@mail.ru', '$2y$10$VbLqYAaOzW/CpE30Jy/7j.smQn3vDZdh9QZBPHcvITZqfcsROOVsa', 1575358638, '[]', 'admin'),
(41, 'Павел', '1234@mail.ru', '$2y$10$X9.u40vSZwlTvE52q2R8w.0lpEARJ3/74ZBe8/XugbxsAHtieqyvW', 1575446213, '[]', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_orders_user` (`user_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
