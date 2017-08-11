<?php
  // Değişkenler
  $db; // global; veritabanı değişkeni
  $dbHost='172.17.0.1'; // database.php; veritabanı adresi
  $dbPort='8080'; // database.php; veritabanı portu
  $dbName='blog_backup'; // database.php; veritabanı adı
  $dbUser='blog';//'root'; // database.php; veritabanı kullanıcı adı
  $dbPass='JUsEn0iiKA1uC8h5';//'1234'; // database.php; veritabanı kullanıcı şifresi
  $yPanel = "/admin_panel/material-dashboard/main/index.php"; // Yönetim panelinin URL'si
  $limitAdet=4; // content.php; gonderi limiti adeti
  $limit='0,'.$limitAdet; // content.php; gonderi limiti
  $sorgu; // content.php; SQL sorgusunun bulunduğu değişken
  $karakterLimiti=200; // content.php; gonderi içeriğinin kaç karakteri gözüksün
  $sidebarKategoriAdet=5; // sidebar.php; sidebardaki kategori listesinde kaç adet öğe gözüksün
  $instUser = "natgeo";
  // Parametre olarak verilen mesaj ve hataya görsellik katar ve geri gönderir.
  function hata_mesaji($mesaj, $hata){
    $style = "
      .div {
        width: 460px;
        padding: 8% 0 0;
        margin: auto;
      }
      .div > div {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }
      body {
        background: #76b852; /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: 'Roboto', sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
    ";
    return "<html><head><title>Hata</title><meta charset='utf-8'><style>".$style."</style></head><body>
            <div class='div'>
              <div>
                <div style='text-transform: capitalize;'>
                  <p style='font-size: 24px; font-weight: bold; margin: 0;'>$mesaj</p>
                </div>
                <div style='margin-top: 20px;'>
                  <span>Hata Mesajı: <b>$hata</b></span>
                </div>
              </div>
            </div></body></html>";
  }
  // Veritabanına bağlanma fonksiyonu. Parametreleri; $dbHost='sunucu', $dbPort='sunucu_portu', $dbName='veritabani_adi', $dbUser='veritabani_kullanici_adi', $dbPass='veritabani_parolasi'
  function db_connect($dbHost, $dbPort, $dbName, $dbUser, $dbPass){
    try { global $db;
      $db = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    } catch (PDOException $e) {
      print hata_mesaji("Veritabanına bağlanırken bir hata oluştu!", $e->getMessage());
      die();
    }
  }
  // Parametre olarak verilen sorguyu çalıştırıp değerleri geri ver
  function sorgu_calistir($sorgu, $tur, $dizi=""){
    global $db;
    if (!empty($sorgu)) {
      switch ($tur) {
        case 0:
          return $db -> query($sorgu);
          break;
        case 1:
          return $db -> query($sorgu, PDO::FETCH_ASSOC) -> fetch();
          break;
        case 2:
          return $db -> query($sorgu, PDO::FETCH_ASSOC) -> fetchAll();
          break;
        case 3:
          return $db -> prepare($sorgu) -> execute($dizi);
          break;
        case 4:
          return $db -> exec($sorgu);
          break;
        default:
          return Null;//sorgu_calistir($sorgu, 0, $dizi);
          break;
      }
    }
  }
  // 2017-07-22 formatında verilen tarih değerini Temmuz 2017'ye dönüştür ve geri ver
  function tarih($zaman){
    $aylar = array('01' => "Ocak",
                    '02' => "Şubat",
                    '03' => "Mart",
                    '04' => "Nisan",
                    '05' => "Mayıs",
                    '06' => "Haziran",
                    '07' => "Temmuz",
                    '08' => "Ağustos",
                    '09' => "Eylül",
                    '10' => "Ekim",
                    '11' => "Kasım",
                    '12' => "Aralık"
                  );
    return array('ay' => $aylar[substr($zaman, 5, 2)], 'yil' => substr($zaman, 0, 4));
  }
  // Verilen parametre değerlerini session olarak ekle
  function session_ekle($id, $kAd, $ad, $soyad, $tip){
    $_SESSION['id'] = $id;
    $_SESSION['kAd'] = $kAd;
    $_SESSION['ad'] = $ad;
    $_SESSION['soyad'] = $soyad;
    $_SESSION['tip'] = $tip;
  }
  // PHP ile sayfa yönlendirme
  function yonlendir($url, $statusCode = 303){
    header('Location: ' . $url, True, $statusCode); // Yönlendir
    die(); // Öl
  }
  // Instagram resimlerini getir
  function inst_resim($adet=8){
    global $instUser;
    $resimler = array();
    //$instagram_feed_data = json_decode($json, true);
    $post = json_decode(file_get_contents('http://www.instagram.com/'.$instUser.'/media/'), true)['items'];//$instagram_feed_data['items'];
    if (isset($post)) {
      for ($i=0; $i < $adet; $i++) {
        //$link = $post[$i]['link'];
        //$img_url = $post[$i]['images']['low_resolution']['url'];
        //$caption = isset($post[$i]['caption']) ? $post[$i]['caption']['text'] : '';
        //print "<li><a href=".$link."><img alt='thumbnail' src=".$img_url."></a></li>";
        //$resimler['resim'.$i] = array('link' => $post[$i]['link'], 'resim' => $post[$i]['images']['low_resolution']['url']);
        array_push($resimler, array('link' => $post[$i]['link'], 'resim' => $post[$i]['images']['low_resolution']['url']));
      }
    }
    return $resimler;
  }
?>
