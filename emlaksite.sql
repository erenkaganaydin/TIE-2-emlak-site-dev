-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ara 2023, 00:12:17
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
-- Veritabanı: `emlaksite`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilanlar`
--

CREATE TABLE `ilanlar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilan_durumu` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilan_tipi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `oda_sayisi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `area` decimal(10,2) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `yas` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `oda_sayisi_ek` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `banyo_sayisi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `goruntulenme` int(11) NOT NULL,
  `tarih` datetime DEFAULT current_timestamp(),
  `deleted` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilanlar`
--

INSERT INTO `ilanlar` (`id`, `baslik`, `aciklama`, `ilan_durumu`, `ilan_tipi`, `oda_sayisi`, `price`, `area`, `address`, `city`, `state`, `country`, `latitude`, `longitude`, `yas`, `oda_sayisi_ek`, `banyo_sayisi`, `ad`, `kullanici_adi`, `email`, `telefon`, `goruntulenme`, `tarih`, `deleted`) VALUES
(1, 'Lüx Villa', 'Muhteşem Lüks Villa, Doğanın İçinde Rüya Gibi Yaşam\r\n\r\nSessiz sedasız bir doğanın kucakladığı, lüks ve zarafetin buluştuğu bu muazzam villada, hayalleriniz gerçeğe dönüşüyor. Modern tasarımı ve özenle seçilmiş malzemeleri ile dikkat çeken bu eşsiz mülk, ayrıcalıklı bir yaşam tarzını müjdeliyor.\r\n\r\nÖzellikler:\r\n\r\nGeniş ve Aydınlık:\r\nBu muhteşem villa, geniş ve ferah iç mekanlarıyla sizi karşılıyor. Yüksek tavanlar ve büyük pencereler sayesinde gün boyu doğal ışığı içeri çekerken, ferah bir atmosfer sunuyor.\r\n\r\nLüks Detaylar:\r\nHer ayrıntıda lüksü hissedeceğiniz bu villa, özel tasarlanmış mutfakları, lüks banyoları ve özenle seçilmiş malzemeleri ile dikkat çekiyor. İç mekanın her köşesinde zarafet ve konfor bir araya geliyor.\r\n\r\nManzaralı Bahçe:\r\nVillanın geniş bahçesi, sadece yeşilin değil, aynı zamanda şehir manzarasının da keyfini çıkarmanızı sağlıyor. Bahçe, özel bir tasarım ve bakım ile süslenmiş, özel anlarınızı bu doğal cennette geçirebilirsiniz.\r\n\r\nGüvenlik ve Gizlilik:\r\nGelişmiş güvenlik sistemleri ve yüksek duvarlarla çevrili bu özel villa, size ve sevdiklerinize sakin ve güvenli bir yaşam alanı sunuyor.\r\n\r\nLokasyon:\r\n\r\nBu lüks villamız, şehrin gürültüsünden uzak, ancak şehir merkezine kısa bir mesafede, doğayla iç içe bir konumda yer alıyor.\r\n\r\nEğer sadece en iyisi sizin için yeterliyse ve özel bir yaşam alanına sahip olmak istiyorsanız, bu villa sizin için ideal bir tercih olabilir.\r\n\r\nDetaylı bilgi ve randevu için bize ulaşın. Şimdi hayalinizdeki yaşama bir adım daha yaklaşın.', 'Satılık', 'Villa', '6', '2540000.00', '620.00', 'Örnek Adres Metni', 'İstanbul', 'Central Park', 'Türkiye', '55.000000', '66.000000', '1-5 yıl', '3', '4', 'Yönetici', 'admin', 'dalev1121@gmail.com', '555 555 55 55', 0, '2023-12-27 23:06:08', 0),
(2, 'Aile Apartmanı', 'Aile Apartmanı, sıcak ve huzurlu bir ortamda aile yaşamını en üst düzeyde yaşayabileceğiniz benzersiz bir konut deneyimi sunuyor. Modern tasarımı ve düşünce ile donatılmış geniş iç mekanları, sizin ve sevdiklerinizin rahatlığını ön planda tutuyor. Bu özel apartman, 175 metrekarelik geniş alanıyla ailelerin ihtiyaçlarına cevap verirken, İzmir Aliağa adresinde şehrin kalbindeki konumuyla da avantajlı bir yaşam sunuyor.\r\n\r\nEvdeki 3 oda, ferah ve şık bir şekilde düzenlenmiştir. Her odada özel detaylar ve düzenlemeler, aile bireylerinin kişisel ihtiyaçlarını karşılamak üzere tasarlanmıştır. Yatak odaları, konforlu yatakları ve geniş depolama alanları ile dinlendirici bir uyku deneyimi sunarken, oturma odası, aile birlikteliğini güçlendirmek ve sıcak anlar paylaşmak için ideal bir mekan olarak tasarlanmıştır.\r\n\r\nAile Apartmanı, 2 banyo ile donatılmıştır. Her banyo, modern armatürleri ve özenle seçilmiş malzemeleriyle lüks bir atmosfer sunar. Bu özel apartman, güvenli ve huzurlu bir ortamda aile yaşamınızı daha da özel kılacak.\r\n\r\nEğer modern bir yaşam alanında aile birlikteliğini kutlamak ve huzurlu bir ev ortamında yaşamak istiyorsanız, Aile Apartmanı tam size göre. Detaylı bilgi ve randevu için bize ulaşın, hayalinizdeki aile yaşamına bir adım daha yaklaşın.\r\n\r\n\r\n\r\n\r\n\r\n', 'Kiralık', 'Aile Evi', '3', '7500.00', '175.00', 'İzmir Aliağa', 'İzmir', 'Aliağa', 'Türkiye', '55.000000', '66.000000', '5-10 yıl', '1', '2', 'Kullanıcı Adi', 'admin', 'dalev1121@gmail.com', '555 555 55 55', 2, '2023-12-27 23:12:32', 0),
(3, 'Lüx Daire', 'Eşsiz Lüks ve Konforun Buluşma Noktası: Muhteşem Manzaralı Şehir Merkezindeki Daire\r\n\r\nBu özel daire, şehrin kalbinde, göz kamaştırıcı manzaralara sahip benzersiz bir konumda yer alıyor. Modern tasarımı, lüks detayları ve yüksek kaliteli malzemeleri ile dikkat çeken bu daire, sizi evin konforuyla ağırlamaya hazır.\r\n\r\nGeniş ve Aydınlık Yaşam Alanları: Dairedeki geniş ve aydınlık oturma odası, güneşin doğal ışığıyla aydınlanırken, modern mobilya ve zarif dekorasyon detayları ile şıklığı bir araya getiriyor. Her detay, konforunuz ve lüksünüz düşünülerek tasarlandı.\r\n\r\nTam Donanımlı Mutfak: Mutfak, en son teknolojiye sahip ankastre beyaz eşyalar, özel tasarlanmış tezgahlar ve şık depolama birimleri ile donatılmıştır. Gourmet yemekleri hazırlamak için mükemmel bir ortam sunan bu mutfak, aynı zamanda estetik açıdan da büyüleyici.\r\n\r\nLüks Yatak Odası: Yatak odası, konforlu yatağı, özel tasarlanmış aydınlatmaları ve geniş gardırobunun yanı sıra, şehir manzarasına hakim bir pencere ile size rüya gibi bir gece sunuyor.\r\n\r\nBanyo Spa Deneyimi: Lüks dairenin banyosu, özel tasarımı, geniş duş alanı ve spa tarzı detaylarıyla size kendinizi özel bir spa merkezinde hissettirecek.\r\n\r\nGeniş Balkon ve Manzara: Daire, geniş bir balkon ile dış mekan yaşamınızı zenginleştiriyor. Şehir manzarası, gün batımı ve ışıl ışıl gece manzarası, bu özel balkondan keyif almanızı sağlayacak.\r\n\r\nGüvenlik ve Hizmetler: Daire, güvenlik sistemleriyle donatılmış olup, sakinlerine özel hizmetler sunmaktadır. Kapalı otopark, 24 saat güvenlik, resepsiyon hizmetleri gibi detaylar, yaşamınızı daha güvenli ve konforlu hale getirir.\r\n\r\nBu özel daire, lüksün ve konforun doruk noktasını sunarak, ayrıcalıklı bir yaşam tarzını mümkün kılıyor. Şehrin merkezindeki bu eşsiz konut, aynı zamanda çevresindeki lüks alışveriş merkezleri, restoranlar ve kültürel etkinliklere kolay erişim sağlayarak şehir yaşamının tadını çıkarmanıza olanak tanıyor.', 'Kiralık', 'Apartman', '4', '9000.00', '250.00', 'İstanbul / Kadıköy', 'İzmir', 'Kadıköy', 'Türkiye', '55.000000', '66.000000', '0-1 yıl', '2', '2', 'Kullanıcı Adi', 'admin', 'dalev1121@gmail.com', '555 555 55 55', 3, '2023-12-27 23:15:48', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilan_ozellikleri`
--

CREATE TABLE `ilan_ozellikleri` (
  `id` int(11) NOT NULL,
  `ilan_id` int(11) DEFAULT NULL,
  `ozellik` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` datetime DEFAULT current_timestamp(),
  `deleted` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilan_ozellikleri`
--

INSERT INTO `ilan_ozellikleri` (`id`, `ilan_id`, `ozellik`, `tarih`, `deleted`) VALUES
(11, 2, 'Klima', '2023-12-27 23:12:32', 0),
(12, 2, 'Merkezi Isıtma', '2023-12-27 23:12:32', 0),
(13, 2, 'Çamaşır Odası', '2023-12-27 23:12:32', 0),
(14, 2, 'Alarm', '2023-12-27 23:12:32', 0),
(15, 2, 'TV Kablosu & WIFI', '2023-12-27 23:12:32', 0),
(16, 2, 'Mikrodalga Fırın', '2023-12-27 23:12:32', 0),
(17, 3, 'Klima', '2023-12-27 23:15:48', 0),
(18, 3, 'Yüzme Havuzu', '2023-12-27 23:15:48', 0),
(19, 3, 'Merkezi Isıtma', '2023-12-27 23:15:48', 0),
(20, 3, 'Çamaşır Odası', '2023-12-27 23:15:48', 0),
(21, 3, 'Alarm', '2023-12-27 23:15:48', 0),
(22, 3, 'Pencere Kaplaması', '2023-12-27 23:15:48', 0),
(23, 3, 'Buzdolabı', '2023-12-27 23:15:48', 0),
(24, 3, 'TV Kablosu & WIFI', '2023-12-27 23:15:48', 0),
(25, 3, 'Mikrodalga Fırın', '2023-12-27 23:15:48', 0),
(26, 1, 'Klima', '2023-12-27 23:17:25', 0),
(27, 1, 'Yüzme Havuzu', '2023-12-27 23:17:25', 0),
(28, 1, 'Merkezi Isıtma', '2023-12-27 23:17:25', 0),
(29, 1, 'Çamaşır Odası', '2023-12-27 23:17:25', 0),
(30, 1, 'Spor Salonu', '2023-12-27 23:17:25', 0),
(31, 1, 'Alarm', '2023-12-27 23:17:25', 0),
(32, 1, 'Pencere Kaplaması', '2023-12-27 23:17:25', 0),
(33, 1, 'Buzdolabı', '2023-12-27 23:17:25', 0),
(34, 1, 'TV Kablosu & WIFI', '2023-12-27 23:17:25', 0),
(35, 1, 'Mikrodalga Fırın', '2023-12-27 23:17:25', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilan_resimleri`
--

CREATE TABLE `ilan_resimleri` (
  `id` int(11) NOT NULL,
  `ilan_id` int(11) DEFAULT NULL,
  `resim_path` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` datetime DEFAULT current_timestamp(),
  `deleted` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilan_resimleri`
--

INSERT INTO `ilan_resimleri` (`id`, `ilan_id`, `resim_path`, `tarih`, `deleted`) VALUES
(1, 1, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/d394d9eee7919d9d.jpg', '2023-12-27 23:06:08', 0),
(2, 1, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/3a2d29ba95798a06.jpg', '2023-12-27 23:06:08', 0),
(3, 1, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/6042a99ac601e08c.jpg', '2023-12-27 23:06:08', 0),
(4, 1, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/a16a76f0c0a1e4aa.jpg', '2023-12-27 23:06:08', 0),
(5, 2, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/238c9e91e88b77e4.jpg', '2023-12-27 23:12:32', 0),
(6, 2, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/5ab69719c0156454.jpg', '2023-12-27 23:12:32', 0),
(7, 2, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/71c2c8d5b672c949.jpg', '2023-12-27 23:12:32', 0),
(8, 3, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/6f478b7439d3792d.jpg', '2023-12-27 23:15:48', 0),
(9, 3, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/915d5a21c7f4b6fe.jpg', '2023-12-27 23:15:48', 0),
(10, 3, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/258cd3405df8454b.jpg', '2023-12-27 23:15:48', 0),
(11, 3, 'http://localhost:8080/EmlakSite/TIE-2-emlak-site-dev/uploads/12e7d871f52bdb61.jpg', '2023-12-27 23:15:48', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ilan_tipleri`
--

CREATE TABLE `ilan_tipleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ilan_tipleri`
--

INSERT INTO `ilan_tipleri` (`id`, `adi`, `tarih`, `deleted`) VALUES
(1, 'Aile Evi', '2023-12-26 15:31:46', 0),
(2, 'Apartman', '2023-12-26 15:31:46', 0),
(3, 'Garaj', '2023-12-26 15:31:53', 0),
(4, 'Arsa', '2023-12-26 15:31:53', 0),
(5, 'Ofis', '2023-12-26 15:32:02', 0),
(6, 'Villa', '2023-12-26 15:32:02', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `message` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `name`, `lastname`, `email`, `telefon`, `message`, `tarih`) VALUES
(1, 'Eren Kağan 2', 'Aydın 2', 'ekao2001@gmail.com', '05512096222', 'test', '2023-12-26 13:45:08'),
(2, 'Eren Kağan', 'Aydın', 'erenkaganaydin@gmail.com', '05512096222', 't', '2023-12-26 13:45:48'),
(3, 'Eren Kağan 2', 'Aydın 2', 'ekao2001@gmail.com', '05512096222', 'uy', '2023-12-26 14:22:56'),
(4, 'Örnek Ad', 'Soyad', 'test@gmail.com', '666 666 66 66', 'Deneme mesajı', '2023-12-27 20:26:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozellikler`
--

CREATE TABLE `ozellikler` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ozellikler`
--

INSERT INTO `ozellikler` (`id`, `adi`, `tarih`, `deleted`) VALUES
(1, 'Klima', '2023-12-26 12:58:47', 0),
(2, 'Yüzme Havuzu', '2023-12-26 12:58:47', 0),
(3, 'Merkezi Isıtma', '2023-12-26 12:58:58', 0),
(4, 'Çamaşır Odası', '2023-12-26 12:58:58', 0),
(5, 'Spor Salonu', '2023-12-26 13:54:36', 0),
(6, 'Alarm', '2023-12-26 13:54:36', 0),
(7, 'Pencere Kaplaması', '2023-12-26 13:54:47', 0),
(8, 'Buzdolabı', '2023-12-26 13:54:47', 0),
(9, 'TV Kablosu & WIFI', '2023-12-26 13:54:54', 0),
(10, 'Mikrodalga Fırın', '2023-12-26 13:54:54', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--

CREATE TABLE `sehirler` (
  `id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`id`, `adi`, `resim`, `tarih`, `deleted`) VALUES
(6, 'Ankara', 'images/popular-places/14.jpg', '2023-12-27 23:19:28', 0),
(7, 'Antalya', 'images/popular-places/15.jpg', '2023-12-27 23:20:10', 0),
(9, 'Aydın', 'images/popular-places/12.jpg', '2023-12-27 23:20:10', 0),
(34, 'İstanbul', 'images/popular-places/13.jpg', '2023-12-26 15:44:01', 0),
(35, 'İzmir', 'images/popular-places/10.jpg', '2023-12-26 15:44:01', 0);

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
(1, 'Kullanıcı Adi', '555 555 55 55', 'admin@emlaksitem.com', '12345', 'İzmir/Alsancak Kıbrıs Sehitleri Caddesi', 0, '2023-12-25 21:56:53', '2023-12-25 21:56:53');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ilanlar`
--
ALTER TABLE `ilanlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ilan_ozellikleri`
--
ALTER TABLE `ilan_ozellikleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ilan_resimleri`
--
ALTER TABLE `ilan_resimleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ilan_tipleri`
--
ALTER TABLE `ilan_tipleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ozellikler`
--
ALTER TABLE `ozellikler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoneticibilgileri`
--
ALTER TABLE `yoneticibilgileri`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ilanlar`
--
ALTER TABLE `ilanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `ilan_ozellikleri`
--
ALTER TABLE `ilan_ozellikleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `ilan_resimleri`
--
ALTER TABLE `ilan_resimleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `ilan_tipleri`
--
ALTER TABLE `ilan_tipleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ozellikler`
--
ALTER TABLE `ozellikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `sehirler`
--
ALTER TABLE `sehirler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `yoneticibilgileri`
--
ALTER TABLE `yoneticibilgileri`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
