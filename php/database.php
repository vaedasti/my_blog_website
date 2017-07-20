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
  function db_connect($dbHost, $dbPort, $dbName, $dbUser, $dbPass){
    try {
      $db = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbname;charset=utf-8", $dbuser, $dbPass);
      foreach ($db->query('SELECT * FROM kategoriler') as $row) {
        print_r($row);
      }
    } catch (PDOException $e) {
      print hataMesaji("Veritabanına bağlanırken bir hata oluştu!", $e->getMessage());
      die();
    }
  }
  db_connect($dbHost='172.17.0.2', $dbPort='80', $dbname='blog', $dbUser='blog_mysql', $dbPass='bf06R8SLp44rigvc');
?>
