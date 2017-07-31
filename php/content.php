<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <?php
        // Form GET limitle var mı?
        if (!empty($_GET['limitle']))
          $limit = htmlspecialchars($_GET['limitle']).','.$limitAdet;
        if (!empty($_GET['ara'])) { // ara
          $ara = htmlspecialchars($_GET['ara']);
          print "<h4>Arama sonuçları;</h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND (g.etiketler LIKE '%$ara%' OR k.ad LIKE '%$ara%' OR g.icerik LIKE '%$ara%' OR g.baslik LIKE '%$ara%') ORDER BY zaman DESC";
        }
        elseif (!empty($_GET['kategoriId'])) { // kategori
          $kategori = htmlspecialchars($_GET['kategoriId']);
          print "<h4>".sorgu_calistir("SELECT ad FROM kategoriler WHERE id=$kategori", 1)['ad']." kategorisine ait gönderiler listeleniyor; </h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND k.id=$kategori ORDER BY zaman DESC";
        }
        elseif (!empty($_GET['etiket'])) { // etiket
          $etiket = htmlspecialchars($_GET['etiket']);
          print "<h4>".mb_convert_case($etiket, MB_CASE_TITLE)." etiketine sahip gönderiler listeleniyor;</h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.etiketler LIKE '%$etiket%' ORDER BY zaman DESC";
        }
        elseif (!empty($_GET['zaman'])) { // zaman
          $zaman = htmlspecialchars($_GET['zaman']);
          print "<h4>".tarih($zaman)['ay']." ".tarih($zaman)['yil']." tarihinde yapılan gönderiler listeleniyor;</h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.zaman LIKE '%".substr($zaman, 0, 7)."%' ORDER BY zaman DESC";
        }
        else
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 ORDER BY zaman DESC LIMIT $limit";
        foreach (sorgu_calistir($sorgu, 2) as $gonderi) {
      ?>
      <article class="entry">
        <header class="entry-header">
          <h2 class="entry-title">
            <a href="single.php?gonderiId=<?php print $gonderi['id']; ?>" title="<?php print $gonderi['baslik']; ?>"><?php print $gonderi['baslik']; ?></a>
          </h2>
          <div class="entry-meta">
            <ul>
              <li><?php print $gonderi['zaman']; ?></li>
              <span class="meta-sep">&bull;</span>
              <li><a href="index.php?kategoriId=<?php print $gonderi['kategoriId']; ?>" title="<?php echo $gonderi['kategori']; ?>" rel="category tag"><?php print $gonderi['kategori']; ?></a></li>
              <span class="meta-sep">&bull;</span>
              <li><?php print $gonderi['yazar']; ?></li>
            </ul>
          </div>
        </header>
        <div class="entry-content">
          <p>
            <?php
              if (strlen(htmlspecialchars($gonderi['icerik'])) >= $karakterLimiti) { // Eğer yazı $karakterLimiti karakterden fazlaysa "Devamını Gör" linki çıksın.
                print substr($gonderi['icerik'], 0, $karakterLimiti)."...";
                print '<a href="single.php?gonderiId='.$gonderi['id'].'" title="'.$gonderi['baslik'].'"> Devamını Gör</a>';
              }
              else print $gonderi['icerik'];
            ?>
          </p>
        </div>
      </article> <!-- end entry -->
      <?php
        } //End of foreach
        if (!empty($_GET['limitle'])) {
          print '<div class="pagenav"><p>';
          print '<a rel="prev" href="?limitle='.(explode(',',$limit)[0]+$limitAdet).'">Eski Gönderiler</a>';
          print '<a rel="next" href="?limitle='.(explode(',',$limit)[0]-$limitAdet).'">Yeni Gönderiler</a>';
          print "</p></div>";
        }
        elseif (!isset($_GET['ara']) AND !isset($_GET['kategoriId']) AND !isset($_GET['etiket']) AND !isset($_GET['zaman']))
          print '<div class="pagenav"><p><a rel="prev" href="?limitle='.$limitAdet.'">Eski Gönderiler</a></p></div>';
      ?>
    </div> <!-- end main -->
