# Moved to GitLab

# my_blog_website
ATA-BAUM Intern Project

### To-Do
+ ~~FIXME: login.php. ' or 'a'='a'~~
+ ~~FIXME: sidebar.php. Aynı etiketler tekrarlamasın ve en çok olanlardan 7 tanesi gözüksün. Array içerisine nasıl sonradan veri atılır araştır.~~
+ ~~FIXME: login.php. Giriş yaparken kullanıcı adı veya şifre veritabanında yok ise bu hatayı veriyor. Fatal error: Call to a member function fetch() on boolean in /var/www/html/my_blog_website/php/functions.php on line 40~~
+ ~~Tüm değişkenleri tek bir dosyada topla.~~
+ site_basligi, site_bilgisi gibi veritabanından alınan bilgileri cookie olarak tanımla.
+ ~~Single.php dosyasında 'Önceki Gönderi', 'Sonraki Gönderi' olayını hallet.~~
+ ~~Giriş yapmış kullanıcı yorum yapabilsin. Eğer giriş yapmamışsa `Zaten kayıtlı mısınız? Giriş yapın. Henüz kayıt olmadınız mı? Kayıt olun.` gözüksün.~~
+ ~~Üst menü ve alt "Navigate" bölümünü veritabanından çeksin.~~
+ ~~Yönetim Panelini erişilebilir yap.~~
+ ~~Yönetim Panelinin Front-End kısmını tamamla.~~
+ ~~Yönetim Panelinin Back-End kısmını tamamla.~~

### Araştır
+ SQLinjection
+ xss
+ csrf

# Veritabanı
```sql
CREATE TABLE `gonderiler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etiketler` text COLLATE utf8_turkish_ci,
  `yazar` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `gosterim` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL
  PRIMARY KEY (`id`),
  UNIQUE `ad` (`ad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kAd` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kTarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tip` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE `kAd` (`kAd`),
  UNIQUE `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE `website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_basligi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_slogani` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_bilgisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_fb` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_tw` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_gp` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_git` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_inst` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_flickr` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `site_skype` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `hakkimda` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici` int(11) NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gonderi` int(11) NOT NULL,
  `onay` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
```
