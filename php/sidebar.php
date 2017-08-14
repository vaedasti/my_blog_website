<div id="sidebar" class="four columns">
  <div class="widget widget_search">
    <h3>Ara</h3>
    <form action="index.php" method="GET">
      <input type="text" name="ara" value="Ara..." onblur="if(this.value == '') { this.value = 'Ara...'; }" onfocus="if (this.value == 'Ara...') { this.value = ''; }" class="text-search">
      <input type="submit" value="" class="submit-search">
    </form>
  </div>
  <div class="widget widget_text group">
    <h3>Kullanıcı</h3>
    <ul>
      <?php
        if (isset($_SESSION['kAd'])) {
          print '<li>'.$_SESSION['kAd'].' - '.$_SESSION['ad']." ".$_SESSION['soyad'].'</li>';
          if ($_SESSION['tip'] == '1')
            print "<li><a href=$yPanel>Yönetim Paneli</a></li>";
          print "<li><a href='?cikis=true'>Çıkış Yap</a></li>";
        }
        else print '<li><a href="login.php">Giriş Yap</a></li>';
      ?>
    </ul>
  </div>
  <div class="widget widget_categories group">
    <h3>Kategoriler</h3>
    <ul>
      <?php
        $kategoriler = sorgu_calistir("SELECT COUNT(k.ad) AS adet, k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY adet DESC", 2);
        $i = 0;
        foreach ($kategoriler as $kategori) {
          if ($i >= $sidebarKategoriAdet) break;
          print '<li><a href=index.php?kategoriId='.$kategori['id']. ' title=\''.$kategori['ad'].'\'>'.$kategori['ad'].'</a> ('.$kategori['adet'].')</li>'; //$kategoriler[$i]['adet']
          $i++;
        }
      ?>
    </ul>
  </div>
  <!--<div class="widget widget_text group">
    <h3>Widget Text.</h3>
    <p>Lorem ipsum Ullamco commodo laboris sit dolore commodo aliquip incididunt fugiat esse dolor aute fugiat minim eiusmod do velit labore fugiat officia ad sit culpa labore in consectetur sint cillum sint consectetur voluptate adipisicing Duis irure magna ut sit amet reprehenderit.</p>
  </div>-->
  <div class="widget widget_tags">
    <h3>Etiketler</h3>
    <div class="tagcloud group">
    <?php
      $dizi = array();
      $etiketler = sorgu_calistir("SELECT etiketler
                                    FROM gonderiler
                                    WHERE gosterim=1;", 2);
      foreach ($etiketler as $row) {
        foreach (explode(', ', $row['etiketler']) as $etiket) {
          if (!in_array($etiket, $dizi))
            $dizi[]=$etiket;
        }
      }
      for ($i=0; $i < count($dizi); $i++) {
        if ($i>=15) break;
        print "<a href='index.php?etiket=$dizi[$i]'>$dizi[$i]</a>";
      }
      $dizi=NULL;
    ?>
    </div>
  </div>
  <div class="widget widget_popular">
    <h3>Popüler Gönderiler</h3>
    <ul class="link-list">
      <?php $populer_posts = sorgu_calistir("SELECT COUNT(y.gonderi) AS adet, g.id AS id, g.baslik AS baslik
                                              FROM gonderiler AS g
                                              INNER JOIN yorumlar AS y ON y.gonderi=g.id
                                              WHERE y.onay=1
                                              GROUP BY y.gonderi
                                              ORDER BY adet DESC
                                              LIMIT 0,5",2); ?>
      <?php foreach ($populer_posts as $post) { ?>
        <li><a href="single.php?gonderiId=<?php print $post['id']; ?>"><?php print $post['baslik']; ?></a></li>
      <?php } ?>
    </ul>
  </div>
</div> <!-- end sidebar -->
</div> <!-- end row -->
</div> <!-- end content-wrap -->
