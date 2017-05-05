-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 16 Şub 2017, 13:17:55
-- Sunucu sürümü: 5.6.33-cll-lve
-- PHP Sürümü: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `ercecanb_database`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) DEFAULT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sendtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_id_idx` (`sender_id`),
  KEY `receiver_id_idx` (`receiver_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `message`, `sender_id`, `receiver_id`, `sendtime`) VALUES
(1, 'asdfasdf', 1, 1, '0000-00-00 00:00:00'),
(2, 'zxcvzxcvzx', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `logourl` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `title` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `navbar` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `navbar_color` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `navbar_opacity` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slider` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `slider_color` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slider_opacity` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `footer_color` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer_opacity` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `keywords` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `template_id` int(11) DEFAULT NULL,
  `page_text` varchar(5000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `slider_text` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_email` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `contact_info` varchar(1000) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id_idx` (`template_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `name`, `logourl`, `title`, `navbar`, `navbar_color`, `navbar_opacity`, `slider`, `slider_color`, `slider_opacity`, `footer`, `footer_color`, `footer_opacity`, `description`, `keywords`, `template_id`, `page_text`, `slider_text`, `contact_email`, `contact_info`) VALUES
(1, 'home', '', '', 'navbar-1', '', '', 'slider-2', NULL, NULL, 'footer-1', '', '', 'Ana Sayfa', '', 1, '', '<h3>Main page slider text</h3>', '', ''),
(2, 'about', 'logo.jpg', '', 'navbar-1', '', '', 'slider-2', NULL, NULL, 'footer-1', '', '', 'description', 'keywords', 1, '', '', '', ''),
(3, 'products', 'logo.gif', '', 'navbar-1', NULL, NULL, 'slider-2', NULL, NULL, 'footer-1', NULL, NULL, 'description', 'keywords', 1, NULL, NULL, NULL, NULL),
(4, 'references', 'logo.gif', '', 'navbar-1', '', '', 'slider-2', NULL, NULL, 'footer-1', '', '', 'description', 'keywords', 1, NULL, NULL, NULL, NULL),
(5, 'contact', '', '', 'navbar-1', '', '', 'slider-2', NULL, NULL, 'footer-1', '', '', 'description', 'keywords', 1, '', '', 'ercecanbalcioglu@gmail.com', '<h3>Ä°letiÅŸim</h3><h3><h5>Ä°letiÅŸim deneme<br />Tel: 123 12 12<br />Adres: Ankara/ Ã‡ankaya<br />Ä°letiÅŸim deneme</h5><div><br /></div></h3>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `imgurl` varchar(150) COLLATE utf8_turkish_ci DEFAULT NULL,
  `product_id` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=42 ;

--
-- Tablo döküm verisi `photos`
--

INSERT INTO `photos` (`id`, `name`, `imgurl`, `product_id`) VALUES
(24, 'Product-1', 'product_photo.jpg', '55'),
(25, 'Product-1', 'product_photo.jpg', '55'),
(26, 'Product-1', 'product_photo.jpg', '55'),
(27, 'Product-1', 'product_photo.jpg', '55'),
(28, 'Product-1', 'product_photo.jpg', '55'),
(29, 'Product-2', 'product_photo.jpg', '56'),
(30, 'Product-2', 'product_photo.jpg', '56'),
(31, 'Product-2', 'product_photo.jpg', '56'),
(32, 'Product-3', 'product_photo.jpg', '57'),
(33, 'Product-4', 'product_photo.jpg', '58'),
(34, 'Product-4', 'product_photo.jpg', '58'),
(35, 'Product-4', 'product_photo.jpg', '58'),
(36, 'Product-4', 'product_photo.jpg', '58'),
(37, 'Product-4', 'product_photo.jpg', '58'),
(38, 'Product-4', 'product_photo.jpg', '58'),
(39, 'Product-4', 'product_photo.jpg', '58'),
(40, 'Product-4', 'product_photo.jpg', '58'),
(41, 'Product-4', 'product_photo.jpg', '58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `imgurl` varchar(250) NOT NULL,
  `stock` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_name_idx` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `title`, `name`, `imgurl`, `stock`, `price`, `keywords`, `description`, `category`) VALUES
(55, 'Product-1', 'Product-1', 'product_photo.jpg', '1', '1', 'Product-1', 'Product-1', ''),
(56, 'Product-2', 'Product-2', 'product_photo.jpg', '2', '2', 'Product-2', 'Product-2', 'Product-2'),
(57, 'Product-3', 'Product-3', 'product_photo.jpg', '3', '3', 'Product-3', 'Product-3', 'Product-3'),
(58, 'Product-4', 'Product-4', 'product_photo.jpg', '4', '4', 'Product-4;product-product', 'Product-4', 'Product-1'),
(59, 'Product-5', 'Product-5', 'product_photo.jpg', '14', '14', 'Product-5', 'Product-5', 'Product-1'),
(60, 'Product-6', 'Product-6', 'product_photo.jpg', '12', '12', 'Product-6', 'Product-6', 'Product-1'),
(61, 'Product-7', 'Product-7', 'product_photo.jpg', '12', '12', 'Product-7', 'Product-7', 'Product-1'),
(62, 'Product-8', 'Product-8', 'product_photo.jpg', '11', '11', 'Product-8', 'Product-8', 'Product-1'),
(63, 'Product-9', 'Product-9', 'product_photo.jpg', '500', '500', 'Product-9', 'Product-9', 'Product-2'),
(64, 'Product-10', 'Product-10', 'product_photo.jpg', '100', '1000', 'Product-10', 'Product-10', 'Product-2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_list_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `category_name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `parent_id` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=116 ;

--
-- Tablo döküm verisi `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_list_name`, `category_name`, `parent_id`) VALUES
(113, 'Product-1', 'Product-1', ''),
(114, 'Product-2', 'Product-2', ''),
(115, 'Product-3', 'Product-3', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `imgurl` varchar(100) NOT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Tablo döküm verisi `reference`
--

INSERT INTO `reference` (`id`, `title`, `name`, `imgurl`, `keywords`, `description`) VALUES
(13, '', '', 'reference_photo.jpg', '', ''),
(14, '', '', 'reference_photo.jpg', '', ''),
(15, '', '', 'reference_photo.jpg', '', ''),
(16, '', '', 'reference_photo.jpg', '', ''),
(17, '', '', 'reference_photo.jpg', '', ''),
(18, '', '', 'reference_photo.jpg', '', ''),
(19, '', '', 'reference_photo.jpg', '', ''),
(20, '', '', 'reference_photo.jpg', '', ''),
(21, '', '', 'reference_photo.jpg', '', ''),
(22, '', '', 'reference_photo.jpg', '', ''),
(23, '', '', 'reference_photo.jpg', '', ''),
(24, '', '', 'reference_photo.jpg', '', ''),
(25, '', '', 'reference_photo.jpg', '', ''),
(26, '', '', 'reference_photo.jpg', '', ''),
(27, '', '', 'reference_photo.jpg', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliderphotos`
--

CREATE TABLE IF NOT EXISTS `sliderphotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `title` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `date` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=54 ;

--
-- Tablo döküm verisi `sliderphotos`
--

INSERT INTO `sliderphotos` (`id`, `name`, `title`, `description`, `date`) VALUES
(50, 'slider_photo.jpg', 'Slider-1', 'Slider-1', '1'),
(51, 'slider_photo.jpg', 'Slider-2', 'Slider-2', '2'),
(52, 'slider_photo.jpg', 'Slider-3', 'Slider-3', '3'),
(53, 'slider_photo.jpg', 'Slider-4', 'Slider-4', '4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sociallinks`
--

CREATE TABLE IF NOT EXISTS `sociallinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `name`, `url`) VALUES
(1, 'Twitter', 'ercecanbalcioglu.com'),
(2, 'Facebook', 'ercecanbalcioglu.com'),
(3, 'Skype', 'ercecanbalcioglu.com'),
(4, 'Youtube', 'ercecanbalcioglu.com'),
(5, 'Rss', 'ercecanbalcioglu.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `navbar_color` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `navbar_opacity` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `background` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `background_color` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `background_opacity` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `font_size` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `font_family` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `footer_color` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `footer_description` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `footer_opacity` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `logo_navbar` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `logo_favicon` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `is_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `template`
--

INSERT INTO `template` (`id`, `name`, `navbar_color`, `navbar_opacity`, `background`, `background_color`, `background_opacity`, `font_size`, `font_family`, `footer_color`, `footer_description`, `footer_opacity`, `logo_navbar`, `logo_favicon`, `is_on`) VALUES
(1, 'template_1', '', '1', 'background9.jpg', 'Whitesmoke', '', '9', '', '', '<p>				\r\nTasarÄ±mlarÄ±mÄ±z benzersiz bir ÅŸekilde tasarÄ±mcÄ±larÄ±n saray,  klasik motifleri\r\n ve ihtiÅŸamÄ±nÄ± Ã¼rÃ¼nlerimize yansÄ±tarak canlandÄ±rdÄ±ÄŸÄ± Ã¶zgÃ¼n tasarÄ±mlardÄ±r...\r\n\r\nFirmamÄ±z ayrÄ±ca istediÄŸiniz tasarÄ±mÄ±n Ã¼retiminde size yardÄ±mcÄ± olmaktan memnuniyet duyar...						</p>', '0.8', 'logo.jpg', 'favicon-1.jpg', 1),
(2, 'template_7', 'yellow', '0.6', '', 'red', '', '28', '', 'blue', NULL, '0.7', '', '', 0),
(3, 'template_2', '', '0.5', '', '', '', '28', '', '', NULL, '0.5', '', '', 0),
(4, 'template_3', '', '0.5', '', '', '', '28', '', '', NULL, '0.5', '', '', 0),
(5, 'template_4', '', '0.5', '', '', '', '28', '', '', NULL, '0.5', '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL,
  `login_session` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `login_session`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL);

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `receiver_id` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sender_id` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `template_id` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
