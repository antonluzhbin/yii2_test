CREATE DATABASE IF NOT EXISTS `yii2_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yii2_test`;

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `book_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `book_reader` (
  `book_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `reader` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `author` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Автор 2', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(2, 'Автор 3', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(3, 'Автор 4', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(4, 'Автор 5', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(5, 'Автор 6', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(6, 'Автор 7', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(7, 'Автор 8', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(8, 'Автор 9', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(9, 'Автор 10', '2015-03-06 16:14:40', '2015-03-06 16:14:40');

INSERT INTO `book` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Книга 2', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(2, 'Книга 3', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(3, 'Книга 4', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(4, 'Книга 5', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(5, 'Книга 6', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(6, 'Книга 7', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(7, 'Книга 8', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(8, 'Книга 9', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(9, 'Книга 10', '2015-03-06 16:14:40', '2015-03-06 16:14:40');

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(7, 2),
(2, 5),
(3, 7),
(9, 9),
(8, 4),
(9, 4),
(3, 5),
(6, 3),
(5, 2),
(3, 6),
(1, 5),
(8, 8),
(4, 3),
(5, 6),
(5, 1),
(2, 5),
(8, 3),
(3, 8),
(2, 1),
(2, 3),
(5, 8),
(4, 5),
(5, 8),
(8, 5),
(9, 8),
(7, 2),
(9, 8),
(8, 6),
(7, 3),
(2, 3);

INSERT INTO `book_reader` (`book_id`, `reader_id`) VALUES
(9, 9),
(6, 8),
(9, 4),
(1, 5),
(6, 8),
(2, 1),
(1, 7),
(6, 3),
(2, 7),
(4, 8),
(1, 9),
(7, 7),
(2, 6),
(1, 1),
(9, 3),
(4, 7),
(6, 8),
(5, 1),
(1, 6),
(6, 4),
(7, 6),
(3, 2),
(2, 5),
(1, 8),
(5, 5);

INSERT INTO `reader` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Читатель 2', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(2, 'Читатель 3', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(3, 'Читатель 4', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(4, 'Читатель 5', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(5, 'Читатель 6', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(6, 'Читатель 7', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(7, 'Читатель 8', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(8, 'Читатель 9', '2015-03-06 16:14:40', '2015-03-06 16:14:40'),
(9, 'Читатель 10', '2015-03-06 16:14:40', '2015-03-06 16:14:40');
