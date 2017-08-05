<?php
  include_once "head.php";
  if (isset($_GET['cikis']) AND htmlspecialchars($_GET['cikis']) == 'true') {
    session_unset();
    session_destroy();
  }
?>
<body>
  <!-- Header
  ================================================== -->
  <header id="top">
    <div class="row">
      <div class="header-content twelve columns">
        <h1 id="logo-text"><a href="index.php" title=""><?php print $website_bilgileri['site_basligi']; // Websitenin başlığı ?></a></h1>
        <p id="intro"><?php print $website_bilgileri['site_slogani']; // Websitenin sloganı ?></p>
      </div>
    </div>
    <nav id="nav-wrap">
      <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
      <div class="row">
        <ul id="nav" class="nav">
          <?php
            if(!empty($website_bilgileri['menu_isim_1']) AND !empty($website_bilgileri['menu_adres_1'])) {
              if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_adres_1'] AND empty(htmlspecialchars($_GET['kategoriId'])))
                $class = "current";
              print "<li class='$class'><a href='".$website_bilgileri['menu_adres_1']."'>".$website_bilgileri['menu_isim_1']."</a></li>";
            }
          ?>
          <li class="has-children <?php if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_isim_1'] AND !empty(htmlspecialchars($_GET['kategoriId']))) print "current";  // Eğer sayfa index.php ise ve GET var ise ?>"><a href="#">Kategoriler</a>
            <ul>
              <?php
                $kategoriler = sorgu_calistir("SELECT k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY COUNT(k.ad) DESC", 2);
                $i = 0;
                foreach ($kategoriler as $kategori) { //for ($i=0; $i < 5; $i++) {
                  if ($i >= 10) break; // Max 5
                  print '<li><a href="index.php?kategoriId='.$kategori['id'].'">'.$kategori['ad'].'</a></li>';
                  $i++;
                }
              ?>
            </ul>
          </li>
          <?php
            $class="";
            if(!empty($website_bilgileri['menu_isim_2']) AND !empty($website_bilgileri['menu_adres_2'])) {
              if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_adres_2'])
                $class = "current"; // Eğer sayfa index.php ise ve GET yok ise
              print "<li class='$class'><a href='".$website_bilgileri['menu_adres_2']."'>".$website_bilgileri['menu_isim_2']."</a></li>";
            }
            $class="";
            if(!empty($website_bilgileri['menu_isim_3']) AND !empty($website_bilgileri['menu_adres_3'])) {
              if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_adres_3'])
                $class = "current"; // Eğer sayfa index.php ise ve GET yok ise
              print "<li class='$class'><a href='".$website_bilgileri['menu_adres_3']."'>".$website_bilgileri['menu_isim_3']."</a></li>";
            }
            $class="";
            if(!empty($website_bilgileri['menu_isim_4']) AND !empty($website_bilgileri['menu_adres_4'])) {
              if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_adres_4'])
                $class = "current"; // Eğer sayfa index.php ise ve GET yok ise
              print "<li class='$class'><a href='".$website_bilgileri['menu_adres_4']."'>".$website_bilgileri['menu_isim_4']."</a></li>";
            }
            $class="";
            if(!empty($website_bilgileri['menu_isim_5']) AND !empty($website_bilgileri['menu_adres_5'])) {
              if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_adres_5'])
                $class = "current"; // Eğer sayfa index.php ise ve GET yok ise
              print "<li class='$class'><a href='".$website_bilgileri['menu_adres_5']."'>".$website_bilgileri['menu_isim_5']."</a></li>";
            }
            $class="";
            if(!empty($website_bilgileri['menu_isim_6']) AND !empty($website_bilgileri['menu_adres_6'])) {
              if ($_SERVER['PHP_SELF'] == $website_bilgileri['menu_adres_6'])
                $class = "current"; // Eğer sayfa index.php ise ve GET yok ise
              print "<li class='$class'><a href='".$website_bilgileri['menu_adres_6']."'>".$website_bilgileri['menu_isim_6']."</a></li>";
            }
          ?>
        </ul> <!-- end #nav -->
      </div>
    </nav> <!-- end #nav-wrap -->
  </header> <!-- Header End -->
