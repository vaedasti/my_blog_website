<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <?php
        $limit = '0,3'; // kaç adet gönderi gözüksün
        $sorgu; // SQL sorgusu //$limitle=false; // $limit: eski gönderiler gösterilsin mi?
        // Form GET old_posts var mı?
        if (!empty($_GET['limit']))
          $limit = htmlspecialchars($_GET['limit']).',3';
        if (! empty($_GET['ara'])) {
          $ara = htmlspecialchars($_GET['ara']);
          print "<h4>Arama sonuçları;</h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND (g.etiketler LIKE '%".$ara."%' OR k.ad LIKE '%".$ara."%' OR g.icerik LIKE '%".$ara."%') ORDER BY zaman DESC";
        }
        elseif (!empty($_GET['kategoriId'])) {
          $kategori = htmlspecialchars($_GET['kategoriId']);
          print "<h4>".sorgu_calistir("SELECT ad FROM kategoriler WHERE id=".$kategori, false)['ad']." kategorisine ait gönderiler listeleniyor; </h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND k.id=".$kategori." ORDER BY zaman DESC";
        }
        elseif (!empty($_GET['etiket'])) {
          $etiket = htmlspecialchars($_GET['etiket']);
          print "<h4>".mb_convert_case($etiket, MB_CASE_TITLE)." etiketine sahip gönderiler listeleniyor;</h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.etiketler LIKE '%".$etiket."%' ORDER BY zaman DESC";
        }
        elseif (!empty($_GET['zaman'])) {
          $zaman = htmlspecialchars($_GET['zaman']);
          print "<h4>".tarih($zaman)['ay']." ".tarih($zaman)['yil']." tarihinde yapılan gönderiler listeleniyor;</h4><hr />";
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.zaman LIKE '%".substr($zaman, 0, 7)."%' ORDER BY zaman DESC";
          // echo "<li><a href='index.php?zaman=".$key['zaman']."'>".$aylar[substr($key['zaman'], 5,2)]." ".substr($key['zaman'], 0,4)."</a></li>";
        }
        else
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 ORDER BY zaman DESC LIMIT ".$limit;
        $gonderiler = sorgu_calistir($sorgu);
        foreach ($gonderiler as $gonderi) {
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
              if (strlen(htmlspecialchars($gonderi['icerik'])) >= 200) { // Eğer yazı 250 karakterden fazlaysa "Devamını Gör" linki çıksın.
                print substr(htmlspecialchars($gonderi['icerik']), 0, 200);
                print '<a href="single.php?gonderiId='.$gonderi['id'].'" title="'.$gonderi['baslik'].'"> Devamını Gör</a>';
              }
              else print htmlspecialchars($gonderi['icerik']);
            ?>
          </p>
        </div>
      </article> <!-- end entry -->
      <?php
        } //End of foreach
        if (!empty($_GET['limitle'])) {
          print '<div class="pagenav"><p>';
          print '<a rel="prev" href="?limit='.(explode(',',$limit)[0]+3).'">Eski Gönderiler</a>';
          print '<a rel="next" href="?limit='.(explode(',',$limit)[0]-3).'">Yeni Gönderiler</a>';
          print "</p></div>";
        }
        else
          print '<div class="pagenav"><p><a rel="prev" href="?limit=3">Eski Gönderiler</a></p></div>';
      ?>
    </div> <!-- end main -->
