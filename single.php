<?php
  require_once "php/database.php";
  // Eğer GET yok ise anasayfaya yönlendir
  if (empty(htmlspecialchars($_GET['gonderiId']))) echo "<script>window.location.replace('index.php');</script>";
  include_once "php/header.php";
  $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, g.etiketler,k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1 AND g.id=".htmlspecialchars($_GET['gonderiId']);
  $gonderi = sorgu_calistir($sorgu, 0);
?>
<!-- Content
================================================== -->
<div id="content-wrap">
  <div class="row">
    <div id="main" class="eight columns">
      <article class="entry">
        <header class="entry-header">
          <h2 class="entry-title"><?php print $gonderi['baslik']; ?></h2>
          <div class="entry-meta">
            <ul>
              <li><?php print $gonderi['zaman']; ?></li>
              <span class="meta-sep">&bull;</span>
              <li><a href="index.php?kategoriId=<?php print $gonderi['kategoriId']; ?>" title="<?php print $gonderi['kategori']; ?>" rel="category tag"><?php print $gonderi['kategori']; ?></a></li>
              <span class="meta-sep">&bull;</span>
              <li><?php print $gonderi['yazar']; ?></li>
            </ul>
          </div>
        </header>
        <!--
        <div class="entry-content-media">
          <div class="post-thumb">
            <img src="images/m-farmerboy.jpg">
          </div>
        </div>-->
        <div class="entry-content">
          <!-- <p class="lead">Lorem ipsum Nisi enim est proident est magna occaecat dolore proident eu</p> -->
          <?php print $gonderi['icerik']; ?>
        </div>
        <p class="tags">
          <span>Etiketler :</span>
          <?php
            foreach (explode(", " ,$gonderi['etiketler']) as $etiket)
              print '<a href="index.php?etiket='.$etiket.'">'.$etiket.'</a>, ';
            $gonderi=null;
          ?>
          <!-- <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a> -->
        </p>
        <ul class="post-nav group">
          <?php
            // Önceki gönderi
            $gonderi = $db -> query("SELECT id, baslik FROM gonderiler WHERE gosterim=1 AND id=".(htmlspecialchars($_GET['gonderiId'])-1), PDO::FETCH_ASSOC);
            //print_r($gonderi);
            if ($gonderi->rowCount() == 1) {
              $gonderi = $gonderi->fetch();
              print '<li class="prev"><a rel="prev" href="?gonderiId='.$gonderi['id'].'"><strong>Önceki Gönderi</strong>'.$gonderi['baslik'].'</a></li>';
            }
            //else print '<li class="prev"><strong>Hata</strong>Önceki Gönderi Bulunamadı.</li>';
            // Sonraki gönderi
            $gonderi = $db -> query("SELECT id, baslik FROM gonderiler WHERE gosterim=1 AND id=".(htmlspecialchars($_GET['gonderiId'])+1), PDO::FETCH_ASSOC);
            //print_r($gonderi);
            if ($gonderi->rowCount() == 1) {
              $gonderi = $gonderi->fetch();
              print '<li class="next"><a rel="next" href="?gonderiId='.$gonderi['id'].'"><strong>Sonraki Gönderi</strong>'.$gonderi['baslik'].'</a></li>';
            }
            //else print '<li class="next"><strong>Hata</strong>Önceki Gönderi Bulunamadı.</li>';
          ?>
          <!--<li class="prev"><a rel="prev" href="#"><strong>Önceki Gönderi</strong>Başlık</a></li>-->
          <!--<li class="next"><a rel="next" href="#"><strong>Sonraki Gönderi</strong>Başlık</a></li>-->
        </ul>
      </article>
      <!-- Comments
      ================================================== -->
      <div id="comments">
        <?php
          $adet = sorgu_calistir("SELECT COUNT(y.id) AS adet FROM yorumlar as y INNER JOIN gonderiler AS g ON y.gonderi=g.id WHERE g.id=".htmlspecialchars($_GET['gonderiId']), 0);
          if ($adet['adet'] > 0) {
            print "<h3>".$adet['adet']." Yorum</h3>"; $adet = null;
            $yorumlar = sorgu_calistir("SELECT k.ad AS ad, k.soyad AS soyad, y.tarih AS zaman, y.icerik AS yorum FROM yorumlar as y INNER JOIN gonderiler AS g ON y.gonderi=g.id INNER JOIN kullanicilar AS k ON k.id=y.kullanici WHERE g.id=".htmlspecialchars($_GET['gonderiId'])." ORDER BY y.tarih DESC");
            foreach ($yorumlar as $yorum) {
        ?>
        <!-- commentlist -->
        <ol class="commentlist">
          <li class="depth-1">
            <div class="avatar">
              <img width="50" height="50" class="avatar" src="images/user-01.png" alt="">
            </div>
            <div class="comment-content">
              <div class="comment-info">
                <cite><?php print $yorum['ad']." ".$yorum['soyad']; ?></cite>
                <div class="comment-meta">
                  <time class="comment-time" datetime="<?php print $yorum['zaman']; ?>"><?php print $yorum['zaman']; ?></time>
                  <!--<span class="sep">/</span><a class="reply" href="#">Reply</a>-->
                </div>
              </div>
              <div class="comment-text">
                <?php print htmlspecialchars($yorum['yorum']); ?>
                <!--<p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate, facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>-->
              </div>
            </div>
          </li>
          <!--<li class="thread-alt depth-1">
            <div class="avatar">
              <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
            </div>
            <div class="comment-content">
              <div class="comment-info">
                <cite>John Doe</cite>
                <div class="comment-meta">
                  <time class="comment-time" datetime="2014-07-12T24:05">Jul 12, 2014 @ 24:05</time>
                  <span class="sep">/</span><a class="reply" href="#">Reply</a>
                </div>
              </div>
              <div class="comment-text">
                <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et tantas semper delicatissimi.</p>
              </div>
            </div>
            <ul class="children">
              <li class="depth-2">
                <div class="avatar">
                  <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                </div>
                <div class="comment-content">
                  <div class="comment-info">
                    <cite>Kakashi Hatake</cite>
                    <div class="comment-meta">
                      <time class="comment-time" datetime="2014-07-12T25:05">Jul 12, 2014 @ 25:05</time>
                      <span class="sep">/</span><a class="reply" href="#">Reply</a>
                    </div>
                  </div>
                  <div class="comment-text">
                    <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris</p>
                  </div>
                </div>
                <ul class="children">
                  <li class="depth-3">
                    <div class="avatar">
                      <img width="50" height="50" class="avatar" src="images/user-03.png" alt="">
                    </div>
                    <div class="comment-content">
                      <div class="comment-info">
                        <cite>John Doe</cite>
                        <div class="comment-meta">
                          <time class="comment-time" datetime="2014-07-12T25:15">July 12, 2014 @ 25:15</time>
                          <span class="sep">/</span><a class="reply" href="#">Reply</a>
                        </div>
                      </div>
                      <div class="comment-text">
                        <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="depth-1">
            <div class="avatar">
              <img width="50" height="50" class="avatar" src="images/user-02.png" alt="">
            </div>
            <div class="comment-content">
              <div class="comment-info">
                <cite>Hinata Hyuga</cite>
                <div class="comment-meta">
                  <time class="comment-time" datetime="2014-07-12T25:15">July 12, 2014 @ 25:15</time>
                  <span class="sep">/</span><a class="reply" href="#">Reply</a>
                </div>
              </div>
              <div class="comment-text">
                <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
              </div>
            </div>
          </li>-->
        </ol> <!-- Commentlist End -->
        <?php }} ?>
        <!-- respond -->
        <?php if (isset($_SESSION['kAd']) AND !empty($_SESSION['kAd'])) { ?>
        <div class="respond">
          <h3>Yorum Yaz</h3>
          <!-- form -->
          <form name="contactForm" id="contactForm" method="post" action="">
            <fieldset>
              <input type="hidden" name="gonderiId" value="<?php print $_GET['gonderiId']; ?>" />
              <!--<div class="group">
                <label for="cName">Name <span class="required">*</span></label>
                <input name="cName" type="hidden" id="cName" size="35" value="" disabled />
              </div>-->
              <!--<div class="group">
                <label for="cWebsite">Website</label>
                <input name="cWebsite" type="text" id="cWebsite" size="35" value="" />
              </div>-->
              <!--<<div class="group">
                <label for="cEmail">Email <span class="required">*</span></label>
                <input name="cEmail" type="text" id="cEmail" size="35" value="" />
              </div>-->
              <div class="message group">
                <label  for="cMessage">Yorumunuz <span class="required">*</span></label>
                <textarea name="cMessage" id="cMessage" rows="10" cols="50" ></textarea>
              </div>
              <button type="submit" class="submit">Gönder</button>
            </fieldset>
          </form> <!-- Form End -->
        </div> <!-- Respond End -->
        <?php } else { ?>
        <div class="respond">
          <h3>Yorum Yaz</h3>
          <div class="group">
            <i>Zaten kayıtlı mısınız? <a href="login.php">Giriş</a> yapın.<br/>Henüz kayıt olmadınız mı? <a href="login.php">Kayıt</a> olun.</i>
          </div>
        </div>
        <?php } ?>
      </div>  <!-- Comments End -->
    </div> <!-- main End -->
<?php
  include_once "php/sidebar.php";
  include_once "php/footer.php";
?>
