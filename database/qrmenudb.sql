-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Eki 2023, 11:11:27
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `qrmenudb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `IsActive` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Surname`, `Password`, `UserName`, `IsActive`, `IsDeleted`, `Role`) VALUES
(1, 'veysel', 'duran', '1111', 'admin', 1, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `ImageUrl` varchar(250) NOT NULL,
  `IsActive` tinyint(4) DEFAULT NULL,
  `IsDeleted` tinyint(4) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`Id`, `Name`, `ImageUrl`, `IsActive`, `IsDeleted`, `Description`, `CreatedDate`) VALUES
(1, 'Kahvaltılıklar', 'KEYIF-TABAGI_2.jpg', 1, 0, '', '2023-10-29 18:27:20'),
(2, 'Ara Sıcaklar', 'PEYNIR-TABAGI_1.jpg', 1, 0, '', '2023-10-29 18:27:58'),
(3, 'Makarnalar', 'SPAGETTI-NAPOLITEN_1.jpg', 1, 0, '', '2023-10-29 19:56:12'),
(4, 'Pizzalar', 'PEYAZ-PEYNIR-HELLIM-PIZZA_1.jpg', 1, 0, '', '2023-10-29 19:56:14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `ImageUrl` varchar(250) NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `IsDeleted` tinyint(4) NOT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Price` decimal(10,1) NOT NULL,
  `Ingredients` varchar(500) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`Id`, `Name`, `ImageUrl`, `IsActive`, `IsDeleted`, `Description`, `Price`, `Ingredients`, `CategoryId`) VALUES
(1, 'Simit', 'simit.png', 1, 0, 'Tereyağlı Simit', 11.5, 'Tereyağı,Un,Süt', 1),
(2, 'Menemen', 'menemen.jpg', 1, 0, 'Soğansız Menemen', 20.0, 'Soğan', 1),
(3, 'Patates', 'patates.jpg', 1, 0, '', 30.0, '', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
