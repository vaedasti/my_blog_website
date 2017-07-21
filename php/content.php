<?php
  // SELECT g.id, g.baslik, g.icerik, g.zaman, g.etiketler, k.ad AS 'kategori', u.kAd as 'kullanici' FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS u ON g.yazar=u.id WHERE g.gosterim=0;
?>
<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <?php
        // Form GET var mı?
        if (! empty($_GET['ara'])) {
          $ara = htmlspecialchars($_GET['ara']);
          echo "Arama yapıldı. Değer: $ara";
        }
        elseif (! empty($_GET['kategoriId'])) {
          $kategori = htmlspecialchars($_GET['kategoriId']);
          echo "Kategoriye tıklandı. Değer: $kategori";
        }
        elseif (! empty($_GET['etiket'])) {
          $etiket = htmlspecialchars($_GET['etiket']);
          echo "Etikete tıklandı. Değer: $etiket";
        }
        else {
          $limit = '0,3';
          if (! empty($_GET['old_posts']))
            $limit = htmlspecialchars($_GET['old_posts']).',3';
          $gonderiler = sorgu_calistir("SELECT g.id, g.baslik, g.icerik, g.zaman, k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 ORDER BY zaman DESC LIMIT ".$limit);
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
          <p><?php
                if (strlen(htmlspecialchars($gonderi['icerik'])) >= 200) {
                  echo substr(htmlspecialchars($gonderi['icerik']), 0, 200);
                  // Eğer yazı 250 karakterden fazlaysa "Devamını Gör" linki çıksın.
                  echo '<a href=single.php?gonderiId='.$gonderi['id'].' title=\''.$gonderi['baslik'].'\'> Devamını Gör</a>';
                }
                else
                  echo htmlspecialchars($gonderi['icerik']);
              ?>
          </p>
        </div>
      </article> <!-- end entry -->
      <?php
        } //End of foreach
        echo '<div class="pagenav"><p>';
        if (! empty($_GET['old_posts'])) {
          echo '<a rel=prev href=?old_posts='.(explode(',',$limit)[0]+3).'>Eski Gönderiler</a>';
          echo '<a rel=next href=?old_posts='.(explode(',',$limit)[0]-3).'>Yeni Gönderiler</a></p></div>';
        }
        else
          echo '<a rel=prev href=?old_posts=3>Eski Gönderiler</a></p></div>';
      } // End of else ?>
    </div> <!-- end main -->
