<?php
  require_once "functions.php"; // functions.php dosyasını içeri aktar
  db_connect($dbHost, $dbPort, $dbName, $dbUser, $dbPass); // veritabanı bağlantısını yap
  if(!isset($_SESSION)) // Session tanımsız ise ve içi boş değil ise
    @session_start(); // Session'ı başlat
?>
