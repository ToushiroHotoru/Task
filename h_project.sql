-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 18 2021 г., 14:11
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `h_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `game_id`, `text`) VALUES
(4, 21, 17, '123'),
(5, 21, 17, 'hui'),
(6, 21, 17, 'look'),
(7, 21, 17, 'look'),
(8, 21, 17, 'll'),
(9, 21, 17, 'll'),
(10, 21, 9, '123'),
(11, 21, 9, 'dasda'),
(13, 21, 4, 'qwer'),
(14, 21, 4, 'asdf'),
(15, 21, 4, 'lkjoium,.'),
(16, 21, 4, 'suka'),
(17, 21, 4, 'suka'),
(18, 21, 4, 'asd'),
(19, 21, 4, 'adsfasdf'),
(20, 21, 4, 'check'),
(23, 21, 19, 'guhafsdfds'),
(25, 21, 19, 'comment'),
(26, 31, 19, 'just check again');

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `game_id`) VALUES
(94, 21, 11),
(95, 21, 9),
(97, 21, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `url_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `title`, `body`, `preview`, `created_at`, `url_address`) VALUES
(1, 'game #1', 'This is game #1 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia ', 'assets/img/1.jpg', '2021-08-20 12:25:53', 'gsdfg8q34hf9pq8h43qh'),
(2, 'game #2', 'just text', 'assets/img/2.jpg', '2021-08-20 12:27:16', 'nkiepghdonfjaoieonf893fyh9h9f2qh89h92hf3'),
(3, 'game #3', 'just text and something else', 'assets/img/3.jpg', '2021-08-24 08:17:15', 'qweqweaalfjnoieaw93829h4oiuhf9ah23'),
(4, 'game #4', 'i need you the most moooost', 'assets/img/4.jpg', '2021-08-24 08:18:41', 'gksdfjgorij23894uiopahfhlllll8239999'),
(8, 'test 11', 'nice booty', 'assets/img/090493ed-84a3-4663-94a2-e46e4da8f785.png', '2021-09-24 12:53:22', 'Zs5Jqv30EB5m1dortfUXW4DnXYF2gyGr'),
(9, 'test 12', 'ahegao', 'assets/img/IMG_20190317_103613_643.jpg', '2021-09-24 12:57:30', 'Oe48G7wNRdcWsBBWM'),
(10, 'test 13', 'hot chic', 'assets/img/0740ce24269c515d9a95119a07aaca663ba8e530_s2_n2.png', '2021-09-24 12:58:11', 'XuBsgbDaYdUvgX2iR'),
(11, 'test 14', 'wraith', 'assets/img/0BpG1hcT2k8.jpg', '2021-09-24 12:59:51', 'VFTT81dv2bA8qxzOPraPd9tYdeTl19lFNxYFvwDJi7mjx172mZz4F7UW'),
(12, 'test 15 ', '1234', 'assets/img/bAc6iD-Sg8A.jpg', '2021-09-24 13:31:06', 'kh7jq6ImjxdbW5QtC8JXsXefh4izEygK03GolGWQ'),
(13, 'test 16', 'big img', 'assets/img/692362.png', '2021-09-24 13:31:54', 'Yx3w5HYoljiyuwM5w'),
(14, 'random try', 'desc', 'assets/img/5ae9d1e1-f4ec-4373-b8a8-91933858b530.png', '2021-09-24 15:59:38', 'xrWyViOJvOM5wDG9gCMChkhHhxGYd4jsMA8BoUP'),
(15, 'random', 'rand', 'assets/img/Anime-Ero-Anime-artist-gao-(gaolukchup)-6670286.jpeg', '2021-09-24 16:00:35', '3e6rV'),
(16, 'yes it is work', 'one more horny', 'assets/img/f4e72e2a-f899-426a-a0b9-a168d79e2adb.png', '2021-09-24 16:07:15', 'HZCw'),
(17, '\'\'\'', '000', 'assets/img/anime-girl-in-girls-frontline-ga-1080x2280.jpg', '2021-10-04 14:37:39', 'OHWP6ZpMC8wx0SPhQH6ftxHniTHYUqsCDgS'),
(18, 'another', 'this is another img', 'assets/img/0d00a932f6232c1940b437579e87a25f.jpg', '2021-10-12 16:17:44', 'MHUjajSDpFjPI5HEW1Ohb5jI8Tp2Bl7oXXcvZ4QMIZyv22eM'),
(19, '1234', '1234', 'assets/img/924569.png', '2021-10-12 17:27:24', 'p2JGoYl0D5iPOhUG4Ca6vcdx8xehmHOlgI');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `email`, `url_address`, `is_admin`) VALUES
(15, 'bulma', '$2y$10$L5Onv2jpoGorhjbEchLd4eMbnvTQ2dTB1EPuITvS7En7YUm9h1Noi', '2021-09-21 08:55:46', 'bulma@gmail.com', 'ozh4o6ZcHhEYOY5QUtKwQs29e47EY3h3FjegMLkeVgt1zhUYuLR6U', 0),
(18, 'akira', '$2y$10$/HdtSCoIX73fSevs0U2ijeGGbj/t9nN2B3C3mstsMjWcUlHjfpX.e', '2021-09-21 09:29:53', 'akira@gmail.com', 'wxCiYgNkJGIaZ8Mke6s', 0),
(19, 'rohin', '$2y$10$YHfLbgH22l2tswtEby6n/uWnr6VdMSgJSHsCfCcGs31GVs0gsmRui', '2021-09-21 09:30:50', 'rohin@gmail.com', 'Aev5Y64DylRFNKTX5YOCWKddNR', 0),
(21, 'papich', '$2y$10$dBwPrs79uDUuc90cJGRlhO6.t6AA7fiTP5ESR3WxYurBRuuQTP5AC', '2021-09-21 09:41:23', 'papich@gmail.com', 'hgsjeEILf', 1),
(22, 'zigi', '$2y$10$UKvUHmCEr/jVDnwIS0NVf.FaIIzw.RXZ0HTsdWDMFXSSz8CK2cWDq', '2021-09-21 11:13:56', 'zigi@gmail.com', '76Au849QV2Z2Cw3b0Rd0KUYzbkjYxVIYVuRrgqDfnvXO5vXFETKtQwPToC', 1),
(24, 'ronin', '$2y$10$ELaaPA.VqlK9iodm7RlTxeEmCWjKiux0F7siE5vnTq4jMDbnm9lMi', '2021-09-23 11:47:24', 'ronin@gmail.com', 'Z70I2Rm45gXrHSARnzHKlCB5VnVqkTusFbHVSQW7yPFLs', 0),
(25, 'Zelda', '$2y$10$feeYwTWx7gRFcbQcB/xEke39eelX1HQxS/GVW8SsTtXmGK9EYQiVq', '2021-10-06 14:56:45', 'zelda@gmail.com', 'YyWqj7Kt0Ojl', 0),
(26, 'asdf', '$2y$10$4av9nxVD/iNfkBEWBrlRvucmzCVUQkL2X8tvQm6LzLkpfs4x6h3qO', '2021-10-12 16:19:11', 'adf@gmail.com', 'P7w6IdEHO2NglSjLGDle', 0),
(27, 'qwer', '$2y$10$204FjEnmukXhUvdEGvnpP.3A0BV.xpiAeRvO09f5GsFu3TbKU78JC', '2021-10-12 16:19:35', 'qwer@gmai.com', 'Qg6T0zlqtpDXjsCx4W95OK6', 0),
(28, '12341', '$2y$10$BfIxeXw4AQk9sZracvmYGuntaFAYl0lAu/S4WxuZi5yDpHBPncsvC', '2021-10-12 16:21:09', 'asdf@gmail.com', 'Ctv08VG3tm30xiIy5UhUJNt6zFL', 0),
(29, 'asuma', '$2y$10$MkRfWDLvXvrGj9TbPobgSubXaS6jj74VSmAW8wMOF5rVYx2QD6M1O', '2021-10-13 18:35:37', 'asuma@gmail.com', 'JO32t3vxXmLZHUMkM2ICUbICQSftqO6', 0),
(30, 'mesi', '$2y$10$VLkxgcIR3zXr.BQGqkXWfOrPsQKU3iYeWz2l0GXa1OcyyXdC/.hbu', '2021-10-14 08:49:54', 'mesi@gmail.com', 'LDCirEzLwHAaolHSqwE3HXyuMvi3KBSnUGcb0', 0),
(31, 'alrex', '$2y$10$ulztFC0rMIk00.M6fjE.He72QuLZ15qbnVxDizy0GZEdAOd4YqYve', '2021-10-15 07:09:08', 'alrex.axy@gmail.com', '1IyUtgmQWc4hKnAjoz', 0),
(32, 'toushiro', '$2y$10$PBhN8Mzx35CoSHBNnxmr2u8Q8TLZYFsIwJHQ8z73G1xgNo/RfkUIa', '2021-10-15 15:37:29', 'toushirohotoru@gmail.com', 'Nt2ANPmKGajg3b58Lr0R1tQKONFrvccmJTXqJhj', 0),
(33, 'lightfruit', '$2y$10$BpnRhDBbDGyEsxlS5WRVmOht8nilrYz.kWkT0aVlaYhAf6QZZ3ePW', '2021-10-18 09:37:27', 'lightfruit234@gmail.com', 'mzpDk5e7nAVju0Z0VhjpqBD8diIDzVKZuPbuv6QFezBsp04o', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_address` (`url_address`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
