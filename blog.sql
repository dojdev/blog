-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 09 2016 г., 02:28
-- Версия сервера: 5.5.47-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=203 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `user_id`) VALUES
(1, 'И так начнем!', 'Повседневная практика показывает, что консультация с широким активом влечет за собой процесс внедрения и модернизации модели развития.', '2016-03-26 20:03:07', 0),
(2, 'Продолжим', 'С другой стороны начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации направлений прогрессивного развития.', '2016-03-26 20:04:30', 0),
(3, 'Еще один пост', 'Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности требуют от нас анализа направлений прогрессивного развития.', '2016-03-26 20:06:01', 0),
(4, 'Снова пост', 'Не следует, однако забывать, что постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание новых предложений.', '2016-03-26 20:06:36', 0),
(183, 'title', 'content', NULL, NULL),
(197, 'posts title ', 'posts content', '2016-04-09 01:53:42', 0),
(198, 'sensation', 'some', '2016-04-09 01:54:03', 0),
(199, 'sensation', 'some', '2016-04-09 01:55:58', 0),
(200, 'sensation', 'some', '2016-04-09 01:56:05', 0),
(201, 'sensation', 'some', '2016-04-09 01:57:58', 0),
(202, 'ff', 'fff', '2016-04-09 02:08:34', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'author1', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'author2', '81dc9bdb52d04dc20036dbd8313ed05335'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
