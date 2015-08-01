-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 16 2015 г., 12:39
-- Версия сервера: 5.5.43-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `vizov_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ru',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `sort_id`, `slug`, `title`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'almaty', 'Алматы', 'ru', '2015-07-13 00:13:23', '2015-07-13 00:13:23'),
(2, 2, 'astana', 'Астана', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(3, 3, 'aktau', 'Актау', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(4, 4, 'aktobe', 'Актобе', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(5, 5, 'atyrau', 'Атырау', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(6, 6, 'zhezkazgan', 'Жезказган', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(7, 7, 'karaganda', 'Караганда', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(8, 8, 'kokshetau', 'Кокшетау', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(9, 9, 'kostanay', 'Костанай', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(10, 10, 'kyzylorda', 'Кызылорда', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(11, 11, 'pavlodar', 'Павлодар', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(12, 12, 'petropavlovsk', 'Петропавловск', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(13, 13, 'semey', 'Семей', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(14, 14, 'taldykorgan', 'Талдыкорган', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(15, 15, 'taraz', 'Тараз', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(16, 16, 'temirtau', 'Темиртау', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(17, 17, 'uralsk', 'Уральск', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(18, 18, 'ust-kamenogorsk', 'Усть-Каменогорск', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(19, 19, 'shymkent', 'Шымкент', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24'),
(20, 20, 'ekibastuz', 'Экибастуз', 'ru', '2015-07-13 00:13:24', '2015-07-13 00:13:24');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_01_15_105324_create_roles_table', 1),
('2015_01_15_114412_create_role_user_table', 1),
('2015_01_26_115212_create_permissions_table', 1),
('2015_01_26_115523_create_permission_role_table', 1),
('2015_02_09_132439_create_permission_user_table', 1),
('2015_06_18_094702_create_pages_table', 1),
('2015_06_18_094710_create_cities_table', 1),
('2015_06_19_070634_create_profiles_table', 1),
('2015_07_13_055609_create_services_table', 1),
('2015_07_13_055620_create_section_table', 1),
('2015_07_13_055631_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ru',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `images` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_city_id_foreign` (`city_id`),
  KEY `posts_service_id_foreign` (`service_id`),
  KEY `posts_section_id_foreign` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `sort_id`, `user_id`, `city_id`, `service_id`, `section_id`, `slug`, `title`, `title_description`, `meta_description`, `price`, `deal`, `description`, `image`, `images`, `address`, `phone`, `email`, `comment`, `lang`, `views`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 5, 1, 1, 2, 'b-title-1', 'B Title 1', '', '', '25000', 'on', 'B Title 1 Description', 'main-0-image-06UKEQa2wY.jpg', 'a:3:{i:0;a:2:{s:5:"image";s:22:"0-image-06UKEQa2wY.jpg";s:10:"mini_image";s:27:"mini-0-image-06UKEQa2wY.jpg";}i:2;a:2:{s:5:"image";s:22:"2-image-IYVzqUiPN5.jpg";s:10:"mini_image";s:27:"mini-2-image-IYVzqUiPN5.jpg";}i:4;a:2:{s:5:"image";s:22:"4-image-soQsUZagB3.jpg";s:10:"mini_image";s:27:"mini-4-image-soQsUZagB3.jpg";}}', 'Address', '+77072421111', 'buser@mail.kz', 'all', '', 0, 1, '2015-07-13 01:39:49', '2015-07-13 01:55:16'),
(3, 0, 5, 1, 1, 3, 'title-2', 'Title 2', '', '', '22000', '', '', 'main-0-image-4djHfc4vJf.jpg', 'a:1:{i:0;a:2:{s:5:"image";s:22:"0-image-4djHfc4vJf.jpg";s:10:"mini_image";s:27:"mini-0-image-4djHfc4vJf.jpg";}}', 'Address', '+77072421111', 'buser@mail.kz', 'all', '', 0, 1, '2015-07-13 01:57:27', '2015-07-13 01:57:27'),
(5, 1, 5, 2, 1, 2, 'aliquam-accusantium-ut-repellendus-perferendis-culpa', 'Aliquam accusantium ut repellendus perferendis culpa.', 'Aliquam accusantium ut repellendus perferendis culpa.', 'Sit voluptates sint ut odio vitae. Dolorum omnis ut quam assumenda itaque ipsum est. Omnis consequatur odio dolorem nisi sed assumenda.', '5225', '', 'Alias libero autem dolorem aut ut. Esse dolorem soluta velit aut. Sunt sequi illum quo adipisci perferendis veniam vel. Ullam beatae saepe quas omnis eos sit saepe.', NULL, '', '294 Devon Fords Suite 040\nPort Danyka, ID 60182-9005', '(864)137-3515x545', 'Pearline.Frami@Schamberger.com', '', '', 0, 1, '2015-07-13 04:43:06', '2015-07-13 04:43:06'),
(7, 1, 9, 2, 1, 2, 'qui-rerum-quas-minus-unde-consequatur-provident', 'Qui rerum quas minus unde consequatur provident.', 'Qui rerum quas minus unde consequatur provident.', 'Quo id impedit inventore illum molestias vero ut. Dolore labore dolorum asperiores quam praesentium sunt. Velit accusamus commodi voluptate temporibus sint vero.', '7568', '', 'Inventore est occaecati quo consequuntur. Iure dolor asperiores perferendis veritatis qui. Corporis ut vitae dignissimos aut molestiae est sed.', NULL, '', '8825 Myrtle Harbor\nCummerataside, KS 32758-8701', '04310399780', 'Octavia.Franecki@Kris.com', '', '', 0, 1, '2015-07-13 04:44:20', '2015-07-13 04:44:20'),
(10, 1, 6, 1, 1, 2, 'voluptates-fugiat-debitis-mollitia-consequuntur', 'Voluptates fugiat debitis mollitia consequuntur.', 'Voluptates fugiat debitis mollitia consequuntur.', 'Vitae quo qui excepturi et quod et. Nulla omnis modi accusantium ut vitae rerum. Cum temporibus quos quam error ratione qui.', '8446', '', 'Dolorem dignissimos voluptates ut est ad ex. Eveniet in repellendus aperiam id repellat. Sequi modi ipsam in nihil vitae. Esse est quia eum vel rerum.', NULL, '', '425 Jared Motorway\nLake Kellie, WI 76944', '(191)730-7979', 'Gleichner.Alf@Wisoky.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(11, 2, 6, 1, 1, 2, 'officia-in-quia-ut-aperiam-earum-ut', 'Officia in quia ut aperiam earum ut.', 'Officia in quia ut aperiam earum ut.', 'Libero aliquid repudiandae quae sint quo. Mollitia omnis earum itaque est. Aut eos ut qui.\nSaepe cumque alias mollitia enim. Aut aspernatur nam quae et atque dolores quam.', '8220', '', 'Cupiditate sunt odit animi voluptatem culpa atque. Ut minus autem laboriosam harum consequatur nihil autem. Molestiae vitae voluptatum et fugit deleniti aut eos.', NULL, '', '81191 Marjolaine Groves\nNew Terenceview, DE 57727', '(985)328-0605x68705', 'eBraun@Wilkinson.net', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(12, 3, 8, 1, 1, 3, 'voluptas-eum-suscipit-accusamus-aut-nostrum', 'Voluptas eum suscipit accusamus aut nostrum.', 'Voluptas eum suscipit accusamus aut nostrum.', 'In eum quibusdam expedita ratione. Enim odio et doloribus quis.', '7776', '', 'Dolore in quia tempore omnis et ad et. Quia adipisci dolorum id. Possimus ullam dolores itaque iste.\nEius cupiditate qui et quis assumenda expedita culpa. Atque qui qui quas adipisci aut molestias.', NULL, '', '957 Prohaska Circle\nSouth Jennyferchester, IA 43032-7901', '+98(7)0056988457', 'Freida12@gmail.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(13, 4, 7, 1, 1, 3, 'odit-et-beatae-occaecati-molestiae-perferendis-autem', 'Odit et beatae occaecati molestiae perferendis autem.', 'Odit et beatae occaecati molestiae perferendis autem.', 'Odio est aut deleniti. Aliquid quidem voluptates quis mollitia. In earum quae tempore eum vero.', '3303', '', 'Dignissimos in est voluptatem rerum commodi mollitia iusto. Quaerat possimus impedit suscipit sed. Quos in perspiciatis molestiae provident iure aspernatur. Porro est voluptatem suscipit ex omnis.', NULL, '', '586 Demetrius Lodge\nLake Delphinefort, OK 92354-3954', '795-927-3859', 'Myron51@hotmail.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(14, 5, 6, 1, 1, 3, 'libero-molestiae-occaecati-tenetur', 'Libero molestiae occaecati tenetur.', 'Libero molestiae occaecati tenetur.', 'Totam occaecati velit qui facere deserunt. Illo voluptas quas dolorem eum iusto dolorem rem. Non esse porro dolores quam accusamus. Reprehenderit nihil dolorem sit sit non error.', '7534', '', 'Ut doloremque alias et eum unde. Magni libero consequatur eaque delectus. Sequi illo nihil maxime corrupti nam. Et aut eum sit.', NULL, '', '19414 Everette Center Suite 509\nLittleville, AZ 90045', '925.440.6990', 'zKoepp@Bergnaum.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(15, 6, 8, 2, 1, 2, 'voluptatum-libero-eum-laboriosam-id-unde-impedit', 'Voluptatum libero eum laboriosam id unde impedit.', 'Voluptatum libero eum laboriosam id unde impedit.', 'Est magnam facere debitis possimus hic aperiam consequuntur et. Et eum excepturi eos id id sit deleniti similique. Unde aliquid laboriosam neque officiis.', '7469', '', 'Nam numquam unde qui cupiditate. Quo quod quae iste voluptatem placeat ratione quaerat est. Expedita ipsum omnis porro delectus ut dolores doloremque.', NULL, '', '5404 Walker Lane\nNew Jany, ND 25122', '1-646-182-0572', 'Ubaldo14@Kshlerin.info', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(16, 7, 6, 1, 1, 2, 'in-sit-et-enim', 'In sit et enim.', 'In sit et enim.', 'Qui qui nesciunt ut sequi. Voluptate non molestiae ab ut similique. Possimus sed tenetur suscipit voluptatem enim sed iste.', '7728', '', 'Debitis aliquid esse in voluptates similique. Odit in et nobis enim nihil quisquam eum. Et laudantium perspiciatis est id non et illum.', NULL, '', '29660 Madaline Meadows\nEast Ephraimmouth, CO 49410', '1-943-886-2667', 'Loma.Hyatt@King.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(17, 8, 6, 1, 1, 2, 'ipsum-assumenda-voluptate-non', 'Ipsum assumenda voluptate non.', 'Ipsum assumenda voluptate non.', 'Magnam eos sit deserunt ut. Porro soluta et quia atque harum facilis est. Dolorem ullam ut inventore aut illum voluptatem ut.', '5618', '', 'Dicta officia omnis magni sit perspiciatis quisquam nihil. Culpa earum vel numquam et non hic odio. Et eligendi quidem quis et. Error asperiores quia neque corrupti recusandae.', NULL, '', '6157 Legros Keys Suite 935\nLake Waylonbury, MD 77068-6098', '(557)224-1826', 'Cummerata.Amparo@hotmail.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(18, 9, 8, 1, 1, 2, 'nam-qui-repellendus-dolor-sit', 'Nam qui repellendus dolor sit.', 'Nam qui repellendus dolor sit.', 'Quisquam reprehenderit et quasi dolor voluptatem qui quia. Expedita tenetur omnis quo. Praesentium officia est iste eum voluptatem. Explicabo ut delectus veniam sunt libero.', '7534', '', 'Rem voluptatibus omnis et quae itaque. Non cum sint in nesciunt. Quia omnis expedita et dolorem molestias similique.', NULL, '', '561 Dewitt Points\nEast Jadefort, MI 98242', '(047)658-2909x370', 'cOHara@Champlin.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(19, 10, 5, 2, 1, 3, 'dolores-ipsum-esse-est-voluptas-incidunt', 'Dolores ipsum esse est voluptas incidunt.', 'Dolores ipsum esse est voluptas incidunt.', 'Eaque ea iusto consequuntur a facere. Laborum maxime consequatur impedit totam. Est aut nemo quos voluptate. Assumenda dolor earum voluptatibus enim.', '7897', '', 'Ut sed est et reiciendis doloremque ab. Quos earum et facilis molestiae. Rerum eligendi aut aperiam ipsa nam recusandae dolor qui. Deserunt numquam voluptatem possimus tenetur.', NULL, '', '712 Moore Creek\nEast Claudiechester, CT 98494', '491.297.2868', 'ySpencer@Shields.net', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(20, 11, 7, 2, 1, 2, 'rerum-dicta-suscipit-omnis', 'Rerum dicta suscipit omnis.', 'Rerum dicta suscipit omnis.', 'Debitis aut debitis quisquam laboriosam voluptatem maxime. Omnis excepturi odit iure sed quo. Quis pariatur quo dolor itaque similique eligendi. Nisi exercitationem sequi quia.', '1803', '', 'Laborum ipsam aspernatur fugiat veniam quia tempore. Ad sapiente sit atque et. Quidem quia nam laudantium voluptate quis dolorum. Iure minima magni totam odit repellat maiores.', NULL, '', '3608 Rowena Locks\nNorth Noblemouth, AR 53570-4155', '(871)065-7862x1354', 'Eduardo.Bode@Fay.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(21, 12, 8, 1, 1, 2, 'cupiditate-quia-odio-aperiam-distinctio-natus-aperiam', 'Cupiditate quia odio aperiam distinctio natus aperiam.', 'Cupiditate quia odio aperiam distinctio natus aperiam.', 'Cum qui quasi consequatur facilis dolore totam totam. Minus sed illo explicabo est ipsa. Sit similique ut velit necessitatibus aut pariatur.', '6280', '', 'Sint reiciendis vero facilis nobis dolorem ea. Delectus eveniet nesciunt ut voluptas. Veniam cum quam harum ut.', NULL, '', '3231 Broderick Point\nEast Maximo, AZ 95977-7466', '1-688-182-2266x07354', 'Miller.Kianna@King.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(22, 13, 9, 2, 1, 3, 'nihil-officia-quas-a-quia-officia', 'Nihil officia quas a quia officia.', 'Nihil officia quas a quia officia.', 'Ut quo hic excepturi possimus. Voluptatem vitae cupiditate deleniti cupiditate et. Voluptatem molestias doloremque nemo sit aut optio.', '4260', '', 'Nam qui sit non nihil ipsum. Quia rerum quis tempore officia. Quia fugit exercitationem enim. Ab qui maxime ea et qui reprehenderit. Dolore non accusamus molestiae magni sit.', NULL, '', '104 Fisher Grove Apt. 743\nLake Jeremie, PA 93859', '1-759-461-8418x9427', 'Emile77@Kohler.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(23, 14, 8, 1, 1, 3, 'non-voluptatibus-dolor-ipsam', 'Non voluptatibus dolor ipsam.', 'Non voluptatibus dolor ipsam.', 'Voluptas vel in itaque animi perferendis itaque quia occaecati. Fugiat sed dicta architecto. Sapiente quia impedit eius dignissimos. Dolorum optio repellat facilis voluptatum.', '6714', '', 'Cupiditate ea fugit delectus sit eum. Pariatur quia dolores itaque assumenda. Et sint temporibus nulla.', NULL, '', '65351 Murazik Extension\nTitustown, MI 15235-2304', '+93(6)6227842446', 'Colten31@Koch.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(24, 15, 7, 2, 1, 3, 'repellendus-aut-incidunt-quia-sed-molestiae-quibusdam', 'Repellendus aut incidunt quia sed molestiae quibusdam.', 'Repellendus aut incidunt quia sed molestiae quibusdam.', 'Doloribus minus numquam aut perferendis quo ullam. Voluptatem eveniet fugiat ipsam et dicta rerum.', '6736', '', 'Et hic eius voluptatem dolor. Nesciunt repellat ut deserunt non possimus expedita beatae tempora. Sint ex necessitatibus tenetur dicta. Consequuntur qui aut exercitationem.', NULL, '', '424 Koch Gardens\nMoenview, TX 87248', '(952)013-8595', 'vMcDermott@gmail.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(25, 16, 6, 1, 1, 3, 'voluptates-adipisci-nihil-veritatis-culpa-officia-laborum', 'Voluptates adipisci nihil veritatis culpa officia laborum.', 'Voluptates adipisci nihil veritatis culpa officia laborum.', 'Doloribus itaque molestiae est maiores. Error voluptatibus aspernatur id voluptate sint aut dolor. Fugiat rerum placeat neque tempore nobis explicabo ratione. Cum dolorem ut adipisci voluptatibus.', '8228', '', 'Officiis ea quo qui voluptas cum sunt. Nam adipisci quisquam perspiciatis sunt.', NULL, '', '43282 Layne Causeway\nPort Benedictport, OR 77481-2435', '040-565-6977x179', 'Lauryn81@yahoo.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(26, 17, 8, 2, 1, 3, 'aspernatur-ipsum-sed-in-quia-dolor-ut', 'Aspernatur ipsum sed in quia dolor ut.', 'Aspernatur ipsum sed in quia dolor ut.', 'Est consequatur vitae et. Consequatur veniam nemo fugiat dolores consequatur. Consequuntur voluptates laudantium voluptatem aut dolor consectetur. Est commodi vitae corrupti.', '8965', '', 'Est rerum sunt et aliquam illo. Est perferendis deleniti ad. Ut atque error consequuntur itaque. Sint ut inventore nulla eos at sunt commodi doloremque.', NULL, '', '9807 Georgianna Meadows Suite 398\nKaleyville, ID 22816-3009', '(834)813-2928', 'Brant97@Olson.info', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(27, 18, 5, 2, 1, 2, 'ea-ea-laboriosam-id-illo', 'Ea ea laboriosam id illo.', 'Ea ea laboriosam id illo.', 'Doloremque quia voluptas possimus saepe non rerum id. Eligendi ex laboriosam aut. Dolores ut fugit sequi et quis. Nesciunt facere aut rerum laborum voluptas hic harum. Magni illum saepe earum quos.', '6799', '', 'At aut sunt aut eum vero. Fugiat sed sit minus labore dolores et quaerat. Ipsam rerum neque doloremque accusantium. Omnis placeat est corrupti odio perferendis.', NULL, '', '588 Adelle Trail\nNorth Marisashire, FL 34608', '(333)413-1320x74534', 'Gusikowski.Dayton@hotmail.com', '', '', 0, 1, '2015-07-13 04:45:16', '2015-07-13 04:45:16'),
(28, 19, 7, 2, 1, 2, 'eveniet-deserunt-alias-unde-quasi-aut', 'Eveniet deserunt alias unde quasi aut.', 'Eveniet deserunt alias unde quasi aut.', 'Dolorem minima repudiandae esse quae. Possimus voluptas est nihil sunt incidunt. Molestiae soluta deserunt sunt.', '8033', '', 'Similique doloribus voluptatem ipsum mollitia. Itaque expedita qui eius molestiae velit. Accusamus eos sit voluptatem.', NULL, '', '86590 Myron Bypass Apt. 115\nPort Gustave, WV 50588-2106', '1-758-510-5903x8224', 'cVolkman@gmail.com', '', '', 0, 1, '2015-07-13 04:45:17', '2015-07-13 04:45:17'),
(29, 20, 9, 2, 1, 3, 'beatae-aut-voluptatem-dolorem-ut-recusandae', 'Beatae aut voluptatem dolorem ut recusandae.', 'Beatae aut voluptatem dolorem ut recusandae.', 'Saepe voluptate rerum sed pariatur numquam rerum. Repellat possimus aut vel minus odit. Soluta pariatur in deleniti saepe qui delectus iusto dolor. Sit consequatur libero et eum.', '7365', '', 'Error omnis odit laudantium. Et ipsam est perferendis voluptatem illo temporibus. Explicabo corrupti at dolor neque nulla adipisci molestiae. Quia nobis nulla qui.', NULL, '', '889 Schultz Prairie Apt. 314\nEast Cathryn, MD 42089', '02243827257', 'Wisozk.Thelma@hotmail.com', '', '', 0, 1, '2015-07-13 04:45:17', '2015-07-13 04:45:17');

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `section_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `portfolio` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  KEY `profiles_city_id_foreign` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`id`, `sort_id`, `user_id`, `city_id`, `section_id`, `stars`, `phone`, `skills`, `address`, `website`, `avatar`, `about`, `portfolio`, `created_at`, `updated_at`) VALUES
(2, 0, 5, 1, 3, 0, '+77072421111', 'PHP', 'Address', 'www.mysite.com', 'ava-t5a8FIwRW0xkb5woyjOX.jpg', '', '', '2015-07-13 01:13:40', '2015-07-13 01:53:50'),
(3, 0, 6, 1, 2, 0, '', '', '', '', '', '', '', '2015-07-13 04:34:32', '2015-07-13 04:34:32'),
(4, 0, 7, 1, 3, 0, '', '', '', '', '', '', '', '2015-07-13 04:35:04', '2015-07-13 04:35:04'),
(5, 0, 8, 1, 4, 0, '', '', '', '', '', '', '', '2015-07-13 04:35:54', '2015-07-13 04:35:54'),
(6, 0, 9, 1, 2, 0, '', '', '', '', '', '', '', '2015-07-13 04:36:23', '2015-07-13 04:36:23');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 1, '2015-07-13 00:28:48', '2015-07-13 00:28:48'),
(2, 'Moderator', 'moderator', NULL, 1, '2015-07-13 00:28:48', '2015-07-13 00:28:48'),
(3, 'User', 'user', NULL, 1, '2015-07-13 00:28:48', '2015-07-13 00:28:48');

-- --------------------------------------------------------

--
-- Структура таблицы `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-07-13 00:32:15', '2015-07-13 00:32:15'),
(2, 1, 2, '2015-07-13 00:33:26', '2015-07-13 00:33:26'),
(4, 3, 5, '2015-07-13 01:13:40', '2015-07-13 01:13:40'),
(5, 3, 6, '2015-07-13 04:34:32', '2015-07-13 04:34:32'),
(6, 3, 7, '2015-07-13 04:35:04', '2015-07-13 04:35:04'),
(7, 3, 8, '2015-07-13 04:35:54', '2015-07-13 04:35:54'),
(8, 3, 9, '2015-07-13 04:36:23', '2015-07-13 04:36:23');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ru',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `section_service_id_foreign` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `sort_id`, `service_id`, `slug`, `title`, `image`, `title_description`, `meta_description`, `text`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'vskrytie-zamkov', 'Вскрытие замков', 'locked26.png', '', '', '', 'ru', 1, '2015-07-13 00:20:23', '2015-07-13 02:38:08'),
(3, 2, 1, 'kliningovye-uslugi', 'Клининговые услуги', 'cleaning2.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:39:25'),
(4, 3, 1, 'obrazovatelnye-uslugi', 'Образовательные услуги', 'book283.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:39:34'),
(5, 4, 1, 'uslugi-nyani', 'Услуги няни', 'medical68.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:39:50'),
(6, 5, 1, 'uslugi-perevozchika', 'Услуги перевозчика', 'logistics3.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:40:20'),
(7, 6, 1, 'uslugi-santekhnika', 'Услуги сантехника', 'pipe9.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:41:00'),
(8, 7, 1, 'uslugi-sborochno-plotnitskie', 'Услуги сборочно-плотницкие', 'toolbox3.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:41:17'),
(9, 8, 1, 'uslugi-elektrika', 'Услуги электрика', 'light105.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:44:49'),
(10, 9, 1, 'ustanovka-i-sborka', 'Установка и сборка', 'setting4.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:43:14'),
(11, 10, 1, 'yuridichesko-posrednicheskie-uslugi', 'Юридическо-посреднические услуги', 'law.png', '', '', '', 'ru', 1, '2015-07-13 00:20:24', '2015-07-13 02:43:50'),
(12, 11, 2, 'remont-avto', 'Ремонт авто', 'vehicle18.png', '', '', '', 'ru', 1, '2015-07-13 00:21:03', '2015-07-13 00:21:03'),
(13, 12, 2, 'remont-bytovoy-tekhniki', 'Ремонт бытовой техники', 'kitchen51.png', '', '', '', 'ru', 1, '2015-07-13 00:21:03', '2015-07-13 00:21:03'),
(14, 13, 2, 'remont-domov-i-kvartir', 'Ремонт домов и квартир', 'gear63.png', '', '', '', 'ru', 1, '2015-07-13 00:21:03', '2015-07-13 00:21:03'),
(15, 14, 2, 'remont-obuvi', 'Ремонт обуви', 'mountain22.png', '', '', '', 'ru', 1, '2015-07-13 00:21:03', '2015-07-13 00:21:03'),
(16, 15, 2, 'remont-odezhdy', 'Ремонт одежды', 'winter-clothes.png', '', '', '', 'ru', 1, '2015-07-13 00:21:04', '2015-07-13 00:21:04'),
(17, 16, 2, 'remont-i-restavratsiya-mebeli', 'Ремонт и реставрация мебели', 'sofa.png', '', '', '', 'ru', 1, '2015-07-13 00:21:04', '0000-00-00 00:00:00'),
(18, 17, 2, 'khimchistka', 'Химчистка', 'washing11.png', '', '', '', 'ru', 1, '2015-07-13 00:21:04', '2015-07-13 00:21:04');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sort_id` int(11) NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ru',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `sort_id`, `route`, `slug`, `title`, `title_description`, `meta_description`, `text`, `lang`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'call', 'uslugi-vyzova', 'Услуги вызова', '', '', '', 'ru', 1, '2015-07-13 00:19:35', '2015-07-13 00:19:35'),
(2, 2, 'repair', 'uslugi-remonta', 'Услуги ремонта', '', '', '', 'ru', 1, '2015-07-13 00:19:35', '2015-07-13 00:19:35');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ip`, `location`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A5 Admin', 'a5.admin@vizov.kz', '127.0.0.1', '["127.0.0.1"]', '$2y$10$.tho5/X6nw7oE24MY1JQx.SfvaC3w0TBx7PIifSgJrmG.F15TX9Nm', 'ylgyVzwchlpokvaVDbDtdreIQzqan6NGKwJuj7qIj22v02qLnUMy5yZOtxJW', 1, '2015-07-13 00:32:15', '2015-07-13 04:34:07'),
(2, 'D5 Admin', 'd5.admin@vizov.kz', '127.0.0.1', '["127.0.0.1"]', '$2y$10$DwLkhtf8Qh3HYnGDTWiM7uBaEvi0yH2.be0KEa9DuKaITHxLJimxO', '4PkKXWAVzLCvao2oSAgaTVbrJph0W1WbYy6LRg33arEWAyqDiPlSdV5KLDs2', 1, '2015-07-13 00:33:26', '2015-07-13 00:37:35'),
(5, 'Пользователь Б', 'buser@mail.kz', '127.0.0.1', 'a:1:{i:0;s:9:"127.0.0.1";}', '$2y$10$/qwJNTPN2NJkGDViPwREP.KTJSX7.zijVRYs9Wwx1Vp3SaIlkrHve', 'Rp2ArtOLtN4pC4b6wmUlXjXcSmyRKvbH2r8FCJIq3dfU25HVQXrJpF3LgLc3', 1, '2015-07-13 01:13:40', '2015-07-13 02:34:33'),
(6, 'Пользователь С', 'cuser@mail.kz', '127.0.0.1', 'a:1:{i:0;s:9:"127.0.0.1";}', '$2y$10$9wXUtPnxbqTY07SjD92.9u695SyytwZz4EXCfIHtQ/UKrKDtIzusW', 'oAW8b7igKv576ueNTLQFSUX0CT8kQxFJXNcXs27He320odBRJ793t1p88T4R', 1, '2015-07-13 04:34:32', '2015-07-13 04:34:45'),
(7, 'Пользователь В', 'vuser@mail.kz', '127.0.0.1', 'a:1:{i:0;s:9:"127.0.0.1";}', '$2y$10$zoZ7nr7afBGjoivFOJWvoOusDSCXo4K.l5knYmx8tNYFniUS9NpY2', 'JEJcefwsVc0TDCSXqSujuQRnJMlokKYNBar7D4OSTro9RPE3ibGJdfM5510V', 1, '2015-07-13 04:35:04', '2015-07-13 04:35:11'),
(8, 'Пользователь Г', 'guser@mail.kz', '127.0.0.1', 'a:1:{i:0;s:9:"127.0.0.1";}', '$2y$10$9rYsqVKcK6DgUQxk6yTXfOLzM1qN51LqLphx9c0BZBSz1TsBrP9rm', 'bY6ygONgEGt1hV7ovfIPoj6DbmaQf8rxOzZtgWW1VxOSLG3P2RtGKdqVw98l', 1, '2015-07-13 04:35:54', '2015-07-13 04:36:03'),
(9, 'Пользователь Д', 'duser@mail.kz', '127.0.0.1', 'a:1:{i:0;s:9:"127.0.0.1";}', '$2y$10$4zhvDjc/rSb0KVmjSt3s0.4Wsag7g8DVjIcRBppqZq8Ek91KeUAjK', 'lxIk5ohbLoq5H6QBil1AZ61wMZYJHilqCJXTP9ugNmN2nA9gnYA8AjzmxpkQ', 1, '2015-07-13 04:36:22', '2015-07-13 04:36:36');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `posts_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `posts_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
