-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Ara 2023, 07:12:15
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `emlak_sitesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticibilgileri`
--

CREATE TABLE `yoneticibilgileri` (
  `Id` int(11) NOT NULL,
  `AdSoyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `Telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `EPosta` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `Sifre` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `Adres` text COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `Deleted` int(1) NOT NULL DEFAULT 0,
  `UpdateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `CreateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yoneticibilgileri`
--

INSERT INTO `yoneticibilgileri` (`Id`, `AdSoyad`, `Telefon`, `EPosta`, `Sifre`, `Adres`, `Deleted`, `UpdateTime`, `CreateTime`) VALUES
(1, 'Mine Tugay', '555 555 55 55', 'admin@emlaksitem.com', '1234', 'İzmir/Alsancak Kıbrıs Sehitleri Caddesi', 0, '2023-12-25 21:56:53', '2023-12-25 21:56:53');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `yoneticibilgileri`
--
ALTER TABLE `yoneticibilgileri`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `yoneticibilgileri`
--
ALTER TABLE `yoneticibilgileri`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
