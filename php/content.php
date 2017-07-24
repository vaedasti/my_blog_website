<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <?php
        $limit = '0,3'; // kaç adet gönderi gözüksün
        $sorgu; $showOld=true; // $showOld: eski gönderiler gösterilsin mi?
        // Form GET old_posts var mı?
        if (! empty($_GET['old_posts']))
          $limit = htmlspecialchars($_GET['old_posts']).',3';
        if (! empty($_GET['ara'])) {
          echo "<h4>Arama sonuçları;</h4><hr />";
          $ara = htmlspecialchars($_GET['ara']);
          $showOld=false;
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND (g.etiketler LIKE '%".$ara."%' OR k.ad LIKE '%".$ara."%' OR g.icerik LIKE '%".$ara."%') ORDER BY zaman DESC";
        }
        elseif (! empty($_GET['kategoriId'])) {
          $kategori = htmlspecialchars($_GET['kategoriId']);
          //echo "<h4>".$kategori." kategorisine ait gönderiler listeleniyor; </h4><hr />";
          $showOld=false;
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND k.id=".$kategori." ORDER BY zaman DESC";
        }
        elseif (! empty($_GET['etiket'])) {
          $etiket = htmlspecialchars($_GET['etiket']);
          echo "<h4>".mb_convert_case($etiket, MB_CASE_TITLE)." etiketine sahip gönderiler listeleniyor;</h4><hr />";
          $showOld=false;
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.etiketler LIKE '%".$etiket."%' ORDER BY zaman DESC";
        }
        elseif (! empty($_GET['zaman'])) {
          $zaman = htmlspecialchars($_GET['zaman']);
          echo "<h4>".tarih($zaman)['ay']." ".tarih($zaman)['yil']." tarihinde yapılan gönderiler listeleniyor;</h4><hr />";
          $showOld=false;
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.zaman LIKE '%".substr($zaman, 0,7)."%' ORDER BY zaman DESC";
          // echo "<li><a href='index.php?zaman=".$key['zaman']."'>".$aylar[substr($key['zaman'], 5,2)]." ".substr($key['zaman'], 0,4)."</a></li>";
        }
        else {
          $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 ORDER BY zaman DESC LIMIT ".$limit;
        }
        $gonderiler = sorgu_calistir($sorgu);
        foreach ($gonderiler as $gonderi) {
      ?>
      <article class="entry">
        <header class="entry-header">
          <h2 class="entry-title">
            <?php echo '<a href=single.php?gonderiId='.$gonderi['id'].' title=\''.$gonderi['baslik'].'\'>'.$gonderi['baslik'].'</a>'; ?>
          </h2>
          <div class="entry-meta">
            <ul>
              <li><?php echo $gonderi['zaman']; ?></li>
              <span class="meta-sep">&bull;</span>
              <li><?php echo '<a href=index.php?kategoriId='.$gonderi['kategoriId'].' title='.$gonderi['kategori'].' rel=\'category tag\'>'.$gonderi['kategori'].'</a>'; ?></li>
              <span class="meta-sep">&bull;</span>
              <li><?php echo $gonderi['yazar']; ?></li>
            </ul>
          </div>
        </header>
        <div class="entry-content">
          <p>
            <?php
              if (strlen(htmlspecialchars($gonderi['icerik'])) >= 200) {
                echo substr(htmlspecialchars($gonderi['icerik']), 0, 200);
                // Eğer yazı 250 karakterden fazlaysa "Devamını Gör" linki çıksın.
                echo '<a href=single.php?gonderiId='.$gonderi['id'].' title=\''.$gonderi['baslik'].'\'> Devamını Gör</a>';
              }
              else echo htmlspecialchars($gonderi['icerik']);
            ?>
          </p>
        </div>
      </article> <!-- end entry -->
      <?php
        } //End of foreach
        if ($showOld) {
          echo '<div class="pagenav"><p>';
          if (! empty($_GET['old_posts'])) {
            echo '<a rel=prev href=?old_posts='.(explode(',',$limit)[0]+3).'>Eski Gönderiler</a>';
            echo '<a rel=next href=?old_posts='.(explode(',',$limit)[0]-3).'>Yeni Gönderiler</a></p></div>';
          }
          else
            echo '<a rel=prev href=?old_posts=3>Eski Gönderiler</a></p></div>';
        }
      ?>
    </div> <!-- end main -->
