<!-- https://codepen.io/colorlib/pen/rxddKy -->
<?php require_once "php/database.php"; ?>
<?php
  if (! empty($_SESSION['kAd'])) {
    # code... Redirect
  }
  else {
    $bilgi = array(
      'kAdi' => $_POST['kAdi'],
      'isim' => $_POST['isim'],
      'sIsim' => $_POST['sIsim'],
      'parola' => $_POST['parola'],
      'tel' => $_POST['tel'],
      'dTarih' => $_POST['dTarih'],
      'email' => $_POST['email']
    );
    if (! empty($bilgi['isim'])) {
      # Kayıt
      //echo "<script></script>";
      die();
    }
    else { # Giriş
      if (! empty($bilgi['kAdi']) && ! empty($bilgi['parola'])) { // Here......................
        echo '<script>
                function yonlendir(){
                  git("Hoşgeldiniz '.$bilgi['isim'].'", /my_blog_website");
                }</script>';
        //die();
      }
    }
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="<?php echo $website_bilgileri['site_bilgisi'] ?>">
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
        document.getElementsByClassName('yonlendir')[0].innerHTML="<h3>"+mesaj+"</h3>Yönlendiriliyorsunuz.Eğer tarayıcınız yönlendirmeyi desteklemiyorsa lütfen aşağıdaki linke tıklayınız.";
        setTimeout(function(){
          window.location.replace(url);
        }, 3000);
      }
    </script>
    <!-- Bootstrap
    ================================================== -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
  </head>
  <body onload="yonlendir();">
    <div class="login-page">
      <div class="form">
        <form class="register-form" action="#" method="post">
          <input type="text" placeholder="kullanıcı adı" name="kAdi"/>
          <input type="text" placeholder="isim" name="isim"/>
          <input type="text" placeholder="soyisim" name="sIsim"/>
          <input type="password" placeholder="parola" name="parola"/>
          <input type="number" placeholder="telefon" name="tel"/>
          <input type="date" placeholder="doğum tarihi" name="dTarih"/>
          <input type="email" placeholder="email adresi" name="email"/>
          <button>kaydol</button>
          <p class="message">Zaten üye misin? <a href="#">Giriş Yap</a></p>
        </form>
        <form class="login-form" action="#" method="post">
          <input type="text" placeholder="kullanıcı adı" name="kAdi"/>
          <input type="password" placeholder="parola" name="parola"/>
          <button>giris yap</button>
          <p class="message">Üye değil misin? <a href="#">Kayıt Ol</a></p>
        </form>
        <div class="yonlendir"></div>
        <p class="message"><a href="/my_blog_website/">Anasayfa</a></p>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $('.message a').click(function(){
      $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
  </script>
</html>
