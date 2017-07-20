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
        $ara = htmlspecialchars($_GET["ara"]);
        if (! empty($ara)){
          echo "Arama yapıldı. Değer: $ara";
        }
        else {
          $oldPost = htmlspecialchars($_GET["old_post"]);
          if (! empty($oldPost)){
            // gönderilerden ilk "$oldPost" tanesini getirme.
          }
          for ($i=3; $i < 15; $i++) {
            if ($i>5) {
              echo "<div class='old-posts'><div class='tagcloud'>";
              if (! empty($oldPost)) // To-Do
                echo "<a href='?old_posts=".($i-3)."' title='Yeni Gönderiler'><i class='fa fa-arrow-left'></i> Yeni Gönderiler</a>";
              echo "<a href='?old_posts=".($i-1)."' title='Eski Gönderiler' style='float: right;'>Eski Gönderiler <i class='fa fa-arrow-right'></i></a></div></div>";
              break;
            }
      ?>
      <article class="entry">
        <header class="entry-header">
          <h2 class="entry-title">
            <?php echo "<a href='single.php?gonderiId=$i' title='Başlık $i'>Başlık $i</a>"; ?>
          </h2>
          <div class="entry-meta">
            <ul>
              <li><?php echo "Tarih"; ?></li>
              <span class="meta-sep">&bull;</span>
              <li><?php echo "<a href='single.php?kategoriId=1' title='Kategori' rel='category tag'>Kategori</a>"; ?></li>
              <span class="meta-sep">&bull;</span>
              <li><?php echo "Yazar"; ?></li>
            </ul>
          </div>
        </header>
        <div class="entry-content">
          <?php // Eğer yazı 250 karakterden fazlaysa "Devamını Gör" linki çıksın.
            $a="İçerik: dhjskhajdhskahdkjshajkhdjkavbkdb vhj shfdjkshjkh kjdfhjk shdjkfahjkdsh fjalhdjskh fajkhd sjklafh dkjsahf kjdsha kfjldhs aldhjskhajdhskahdkjshajkhdjkavbkdb vhj shfdjkshjkh kjdfhjk shdjkfahjkdsh fjalhdjskh fajkhd sjklafh dkjsahf kjdsha kfjldhs aldhjskhajdhskahdkjshajkhdjkavbkdb vhj shfdjkshjkh kjdfhjk shdjkfahjkdsh fjalhdjskh fajkhd sjklafh dkjsahf kjdsha kfjldhs al";
            echo "<p>$a</p>";
          ?>
        </div>
      </article> <!-- end entry -->
      <?php }} //End of for & else ?>
    </div> <!-- end main -->
    <div id="sidebar" class="four columns">
      <div class="widget widget_search">
        <h3>Ara</h3>
        <form action="" method="get">
          <input type="text" name="ara" value="Ara..." onblur="if(this.value == '') { this.value = 'Ara...'; }" onfocus="if (this.value == 'Ara...') { this.value = ''; }" class="text-search">
          <input type="submit" value="" class="submit-search">
        </form>
      </div>
      <div class="widget widget_categories group">
          <h3>Kategoriler</h3>
        <ul>
          <?php for ($i=1; $i <= 5; $i++) { // Max 5 ?>
              <li><?php echo "<a href='single.php?kategoriId=$i' title='Kategori $i'> Kategori $i" . "</a> (#count)"; ?></li>
          <?php } ?>
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
            for ($i=1; $i <= 7; $i++) {
              echo "<a href='single.php?etiket=$i'>Etiket $i</a>";
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
