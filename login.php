<?php require_once "php/database.php"; ?>
<html>
  <!-- https://codepen.io/colorlib/pen/rxddKy -->
  <head>
    <meta charset="utf-8">
    <title>Giriş</title>
    <meta name="author" content="Velat Vurgun">
    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >

    <script type="text/javascript">
      function git(mesaj, url){
        //Hoşgeldiniz Administrator.
        document.getElementsByClassName('login-form')[0].style="display: none;";
        document.getElementsByClassName('register-form')[0].style="display: none;";
        document.getElementsByClassName('yonlendir')[0].innerHTML="<h3>"+mesaj+"</h3>Yönlendiriliyorsunuz. Eğer tarayıcınız yönlendirmeyi desteklemiyorsa lütfen aşağıdaki linke tıklayınız.";
        setTimeout(function(){
          window.location.replace(url);
        }, 3000);
      }
      function uyari(mesaj){
        document.getElementsByClassName('uyari')[0].style='display: block';
        document.getElementsByClassName("uyari")[0].innerHTML=mesaj;
      }
    </script>
    <!-- Bootstrap
    ================================================== -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="js/jquery-1.10.2.min.js" charset="utf-8"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:300);
      .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
      }
      .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
      }
      .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
      }
      .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
      }
      .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
      }
      .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
      }
      .form .message a {
        color: #4CAF50;
        text-decoration: none;
      }
      .form .uyari {
        display: none;
      }
      .form .register-form {
        display: none;
      }
      .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
      }
      .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
      }
      .container .info {
        margin: 50px auto;
        text-align: center;
      }
      .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
      }
      .container .info span {
        color: #4d4d4d;
        font-size: 12px;
      }
      .container .info span a {
        color: #000000;
        text-decoration: none;
      }
      .container .info span .fa {
        color: #EF3B3A;
      }
      body {
        background: #76b852; /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }
    </style>
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <form class="register-form" action="#" method="post">
          <input type="hidden" name="kayit" value="true" required/>
          <input type="text" placeholder="kullanıcı adı" name="kAd" required/>
          <input type="text" placeholder="isim" name="isim" required/>
          <input type="text" placeholder="soyisim" name="sIsim"/>
          <input type="password" placeholder="parola" name="parola" required/>
          <input type="email" placeholder="email adresi" name="email" required/>
          <input type="date" placeholder="doğum tarihi" name="dTarih"/>
          <input type="number" placeholder="telefon" name="tel"/>
          <button>kaydol</button>
          <p class="message">Zaten üye misin? <a href="#">Giriş Yap</a></p>
        </form>
        <form class="login-form" action="#" method="post">
          <input type="hidden" name="giris" value="true"/>
          <input type="text" placeholder="kullanıcı adı" name="kAd" required autofocus="true"/>
          <input type="password" placeholder="parola" name="parola" required/>
          <button>giris yap</button>
          <p class="message">Üye değil misin? <a href="#">Kayıt Ol</a></p>
        </form>
        <div class="yonlendir"></div>
        <p class="message uyari"></p>
        <p class="message"><a href="/my_blog_website">Anasayfa</a></p>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $('.message a').click(function(){
      $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
  </script>
  <?php
    $yPanel = "/my_blog_website/admin_panel/light-bootstrap-dashboard-master/dashboard.html";
    setcookie("kAd", "admin", time() + (86400 * 30), "/"); // 86400 = 1 day
    //$_SESSION['kAd'] = "admin";
    //$_SESSION['tip'] = "0";
    //if (isset($_SESSION['kAd'])) print_r($_SESSION);
    //else echo "No Session";
    if (isset($_SESSION['kAd']) AND ! empty($_SESSION['kAd'])){// { // Zaten giriş yapmış ise anasayfaya yönlendir.
      if ($_SESSION['tip'] == "1") echo '<script>git("Hoşgeldiniz '.$_SESSION['kAd'].'", "'.$yPanel.'");</script>'; // Yönetim Panel
      else echo '<script>git("Hoşgeldiniz '.$_SESSION['kAd'].'", "/my_blog_website");</script>'; // Anasayfa
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (htmlspecialchars($_POST['kayit']) == 'true') {
        $bilgi = array(
          'kAd' => trim($_POST['kAd']),
          'isim' => mb_convert_case(trim($_POST['isim']), MB_CASE_TITLE),
          'sIsim' => mb_convert_case(trim($_POST['sIsim']), MB_CASE_TITLE),
          'parola' => trim($_POST['parola']),
          'email' => trim($_POST['email']),
          'dTarih' => $_POST['dTarih'],
          'tel' => $_POST['tel']
        );
        $sor = sorgu_calistir("SELECT kAd, email FROM kullanicilar WHERE kAd='".$bilgi['kAd']."' OR email='".$bilgi['email']."'", false);
        if (count($sor) > 1)
          echo "<script>$('.message a').click();uyari('Bu Kullanıcı Adına veya E-Mail\'e sahip zaten bir kullanıcı var!');</script>";
        else {
          if (empty($bilgi['dTarih'])) $bilgi['dTarih'] = "NULL";
          else $bilgi['dTarih'] = "'".$bilgi['dTarih']."'";
          $kayit = sorgu_calistir("INSERT INTO kullanicilar(kAd, parola, email, ad, soyad, tel, dTarih) VALUES('".$bilgi['kAd']."', '".$bilgi['parola']."', '".$bilgi['email']."', '".$bilgi['isim']."', '".$bilgi['sIsim']."', '".$bilgi['tel']."', ".$bilgi['dTarih'].")");
          if (! empty($kayit)) {// Kayıt gerçekleştiyse
            // SESSION EKLE
            $_SESSION['kAd'] = $bilgi['kAd'];
            echo '<script>git("Hoşgeldiniz '.$bilgi['isim'].'", "/my_blog_website");</script>'; // Anasayfa
            //redirect("index.php");
          }
        }
      }
      elseif (htmlspecialchars($_POST['giris']) == 'true') {
        if (! htmlspecialchars(empty($_POST['kAd'])) AND ! htmlspecialchars(empty($_POST['parola']))) {
          // if its empty; Fatal error: Call to a member function fetch() on boolean in /var/www/html/my_blog_website/login.php on line 196
          $sor = sorgu_calistir("SELECT id, kAd, ad, soyad, tip FROM kullanicilar WHERE kAd='".htmlspecialchars($_POST['kAd'])."' AND parola=".htmlspecialchars($_POST['parola']), false);
          if (count($sor) >= 4) {
            // SESSION EKLE
            $_SESSION['kAd'] = $sor['kAd'];
            $_SESSION['tip'] = $sor['tip'];
            // Set a 200 (okay) response code.
            http_response_code(200);
            if ($_SESSION['tip'] == 1) // session var ise scripti çalıştır. Burada session ekle.
              echo '<script>git("Hoşgeldiniz '.$sor['ad'].'", "'.$yPanel.'");</script>'; // Admin Panel
            else echo '<script>git("Hoşgeldiniz '.$sor['ad'].'", "/my_blog_website");</script>'; // Anasayfa
          }
          else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<script>uyari('Böyle bir kullanıcı yok. Lütfen bilgileriniz kontrol edip tekrar giriniz.');</script>";
          }
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<script>uyari('Lütfen alanları boş bırakmayın!');</script>";
        }
      }
    } //else { // Not a POST request, set a 403 (forbidden) response code.
      //http_response_code(403);
      //echo "There was a problem with your submission, please try again.";
    //}
  ?>
</html>
