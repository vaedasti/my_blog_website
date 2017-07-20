<?php
  /*
  CREATE TABLE `blog`.`gonderiler` ( `id` INT NOT NULL AUTO_INCREMENT ,
                                    `baslik` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL ,
                                    `icerik` TEXT CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL ,
                                    `zaman` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                                    `etiketler` TEXT CHARACTER SET utf8 COLLATE utf8_turkish_ci NULL DEFAULT NULL ,
                                    `yazar` INT NOT NULL , `kategori` INT NOT NULL ,
                                    `gosterim` BOOLEAN NOT NULL DEFAULT TRUE ,
                                  PRIMARY KEY (`id`)) ENGINE = InnoDB;
  CREATE TABLE `blog`.`kategoriler` ( `id` INT NOT NULL AUTO_INCREMENT ,
                                    `ad` VARCHAR(255) NOT NULL ,
                                  PRIMARY KEY (`id`)) ENGINE = InnoDB;
  CREATE TABLE `blog`.`kullanicilar` ( `id` INT NOT NULL AUTO_INCREMENT ,
                                    `kAd` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL ,
                                    `parola` VARCHAR(255) NOT NULL ,
                                    `email` VARCHAR(255) NOT NULL ,
                                    `ad` VARCHAR(255) NOT NULL ,
                                    `soyad` VARCHAR(55) NULL ,
                                    `tel` INT NULL , `dTarih` TIMESTAMP NULL ,
                                    `kTarih` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                                    `tip` INT(3) NOT NULL DEFAULT '0' ,
                                    PRIMARY KEY (`id`),
                                    UNIQUE `kAd` (`kAd`),
                                    UNIQUE `email` (`email`)) ENGINE = InnoDB;
  CREATE TABLE `blog`.`yorumlar` ( `id` INT NOT NULL AUTO_INCREMENT ,
                                    `kullanici` INT NOT NULL ,
                                    `icerik` TEXT CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL ,
                                    `tarih` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                                    `gonderi` INT NOT NULL ,
                                  PRIMARY KEY (`id`)) ENGINE = InnoDB;
  CREATE TABLE `blog`.`website` ( `id` INT NOT NULL AUTO_INCREMENT ,
                                  `site_basligi` VARCHAR(255) NOT NULL ,
                                  `site_slogani` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_bilgisi` VARCHAR(255) NOT NULL ,
                                  `site_fb` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_tw` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_gp` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_git` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_inst` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_flickr` VARCHAR(255) NULL DEFAULT NULL ,
                                  `site_skype` VARCHAR(255) NULL DEFAULT NULL ,
                                PRIMARY KEY (`id`)) ENGINE = InnoDB;
  */
  // prepare("INSERT INTO b_gonderiler(baslik, icerik, etiketler, yazar, kategori), VALUES(?,?,?,?,?)")
  // execute(array($baslik, $icerik, $etiketler, $yazar, $kategori))
  require_once "php/database.php";
  include_once "php/header.php";
  include_once "php/content.php";
  include_once "php/sidebar.php";
  include_once "php/footer.php";
?>
