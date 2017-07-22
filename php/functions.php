<?php
  // Parametre olarak verilen mesaj ve hataya görsellik katar ve geri gönderir.
  function hataMesaji($mesaj, $hata){
    return "<div style='text-align: center; width: 50%; height: auto; box-shadow: 0 0 1px #424242; padding: 50px; margin: auto; border-radius: 3px; margin-top: 200px; color: #F44336;'>
            <div style='margin: 10px 0;'>
              <p style='font-size: 24px; font-weight: bold; margin: 0;'>$mesaj</p>
            </div>
            <div style='margin: 10px 0;'>
              <span>Hata mesajı: </span><b>$hata</b>
            </div>
          </div>";
  }
  // Veritabanına bağlanma fonksiyonu. Parametreleri; $dbHost='sunucu', $dbPort='sunucu_portu', $dbName='veritabani_adi', $dbUser='veritabani_kullanici_adi', $dbPass='veritabani_parolasi'
  $db;
  function db_connect($dbHost, $dbPort, $dbName, $dbUser, $dbPass){
    try {
      global $db;
      $db = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
      //$sorgu = $db -> query("", PDO::FETCH_ASSOC);
      //echo "<pre>";
      //print_r($sorgu);
      //if ($sorgu -> rowCount()) {
      //  foreach ($sorgu as $row) {
      //    print_r($row);
      //  }
      //}
      //echo "</pre>";
    } catch (PDOException $e) {
      print hataMesaji("Veritabanına bağlanırken bir hata oluştu!", $e->getMessage());
      die();
    }
  }
  // Parametre olarak verilen sorguyu çalıştırıp değerleri geri veren fonksiyon.
  function sorgu_calistir($sorgu, $hepsi=true){
    global $db;
    if (! empty($sorgu)) {
      if ($hepsi)
        return $db -> query($sorgu, PDO::FETCH_ASSOC) -> fetchall();
      else
        return $db -> query($sorgu, PDO::FETCH_ASSOC) -> fetch();
    }
    return Null;
  }
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
    return array('ay' => $aylar[substr($zaman, 5,2)], 'yil' => substr($zaman, 0,4));
  }
  function redirect($url, $statusCode = 303)
  {
    header('Location: ' . $url, true, $statusCode);
    die();
  }
?>
