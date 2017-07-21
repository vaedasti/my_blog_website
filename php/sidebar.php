    <div id="sidebar" class="four columns">
      <div class="widget widget_search">
        <h3>Ara</h3>
        <form action="#" method="GET">
          <input type="text" name="ara" value="Ara..." onblur="if(this.value == '') { this.value = 'Ara...'; }" onfocus="if (this.value == 'Ara...') { this.value = ''; }" class="text-search">
          <input type="submit" value="" class="submit-search">
        </form>
      </div>
      <div class="widget widget_text">
        <h3>Kullanıcı</h3>
        <a href="login.php">Giriş Yap</a>
      </div>
      <div class="widget widget_categories group">
        <h3>Kategoriler</h3>
        <ul>
          <?php
            global $db;
            $kategoriler = sorgu_calistir("SELECT COUNT(k.ad) AS adet, k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY adet DESC");
            $i = 0;
            foreach ($kategoriler as $kategori) { //for ($i=0; $i < 5; $i++) {
              if ($i >= 5) break; // Max 5
              echo '<li><a href=index.php?kategoriId='.$kategori['id']. ' title=\''.$kategori['ad'].'\'>'.$kategori['ad'].'</a> ('.$kategori['adet'].')</li>'; //$kategoriler[$i]['adet']
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
        <?php // Max 7
          $etiketler = sorgu_calistir("SELECT etiketler FROM gonderiler WHERE gosterim=1;");
          $adet;
          foreach ($etiketler as $row) {
            foreach (explode(', ', $row['etiketler']) as $etiket) {
              echo '<a href=index.php?etiket='.$etiket.'>'.$etiket.'</a>';
            }
          }
        ?>
        </div>
      </div>
      <!--<div class="widget widget_popular">
        <h3>Popular Post.</h3>
        <ul class="link-list">
          <li><a href="#">Sint cillum consectetur voluptate.</a></li>
          <li><a href="#">Lorem ipsum Ullamco commodo.</a></li>
          <li><a href="#">Fugiat minim eiusmod do.</a></li>
        </ul>
      </div>-->
    </div> <!-- end sidebar -->
  </div> <!-- end row -->
</div> <!-- end content-wrap -->
