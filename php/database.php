<?php
  require_once "functions.php"; // functions.php dosyasını içeri aktar
  db_connect($dbHost='172.17.0.1', $dbPort='8080', $dbName='blog', $dbUser="root", $dbPass='1234'); // veritabanı bağlantısını yap
  if(!isset($_SESSION)) // Session tanımsız ise ve içi boş değil ise
    @session_start(); // Session'ı başlat
?>
