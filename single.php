<?php
  require_once "php/database.php";
  // Eğer GET yok ise anasayfaya yönlendir
  if (empty($_GET['gonderiId']))
    yonlendir("index.php");//echo "<script>window.location.replace('index.php');</script>";
  include_once "php/header.php";
  if (isset($_SESSION['id']) AND isset($_POST['cMessage']))
    sorgu_calistir("INSERT INTO yorumlar(kullanici, icerik, gonderi) VALUES(?,?,?)", 3, array($_SESSION['id'], htmlspecialchars($_POST['cMessage']), $_GET['gonderiId']));
  if ($_GET['gonderiId'] > 0) {
    $sorgu = "SELECT g.id, g.baslik, g.icerik, g.zaman, g.etiketler,k.ad AS kategori, k.id AS kategoriId, kl.ad AS yazar
              FROM gonderiler AS g
              INNER JOIN kategoriler AS k ON g.kategori=k.id
              INNER JOIN kullanicilar AS kl ON g.yazar=kl.id
              WHERE g.gosterim=1
              AND g.id=".strip_tags($_GET['gonderiId']);
    $gonderi = sorgu_calistir($sorgu, 1);
  } else yonlendir("index.php");
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
        <div class="entry-content">
          <!-- <p class="lead">Lorem ipsum Nisi enim est proident est magna occaecat dolore proident eu</p> -->
          <?php print $gonderi['icerik']; ?>
        </div>
        <p class="tags">
          <span>Etiketler :</span>
          <?php
            foreach (explode(", " ,$gonderi['etiketler']) as $etiket)
              print '<a href="index.php?etiket='.$etiket.'">'.$etiket.'</a>, ';
          ?>
        </p>
        <ul class="post-nav group">
          <?php
            // Önceki gönderi
            $gonderi = $db -> query("SELECT id, baslik
                                      FROM gonderiler
                                      WHERE gosterim=1
                                      AND id=".(htmlspecialchars($_GET['gonderiId'])-1), PDO::FETCH_ASSOC);
            //print_r($gonderi);
            if ($gonderi->rowCount() == 1) {
              $gonderi = $gonderi->fetch();
              print '<li class="prev"><a rel="prev" href="?gonderiId='.$gonderi['id'].'"><strong>Önceki Gönderi</strong>'.$gonderi['baslik'].'</a></li>';
            }
            // Sonraki gönderi
            $gonderi = $db -> query("SELECT id, baslik
                                      FROM gonderiler
                                      WHERE gosterim=1
                                      AND id=".(htmlspecialchars($_GET['gonderiId'])+1), PDO::FETCH_ASSOC);
            //print_r($gonderi);
            if ($gonderi->rowCount() == 1) {
              $gonderi = $gonderi->fetch();
              print '<li class="next"><a rel="next" href="?gonderiId='.$gonderi['id'].'"><strong>Sonraki Gönderi</strong>'.$gonderi['baslik'].'</a></li>';
            }
          ?>
        </ul>
      </article>
      <!-- Comments
      ================================================== -->
      <div id="comments">
        <?php
          $adet = sorgu_calistir("SELECT COUNT(y.id) AS adet
                                  FROM yorumlar as y
                                  INNER JOIN gonderiler AS g ON y.gonderi=g.id
                                  WHERE g.id=".strip_tags($_GET['gonderiId'])."
                                  AND y.onay=1", 1);
          if ($adet['adet'] > 0) {
            print "<h3>".$adet['adet']." Yorum</h3>"; $adet = null;
            $yorumlar = sorgu_calistir("SELECT k.ad AS ad, k.soyad AS soyad, y.tarih AS zaman, y.icerik AS yorum
                                        FROM yorumlar as y
                                        INNER JOIN gonderiler AS g ON y.gonderi=g.id
                                        INNER JOIN kullanicilar AS k ON k.id=y.kullanici
                                        WHERE g.id=".htmlspecialchars($_GET['gonderiId'])."
                                        AND y.onay=1
                                        ORDER BY y.tarih DESC", 2);
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
                <?php print strip_tags($yorum['yorum']); ?>
                <!--<p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate, facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>-->
              </div>
            </div>
          </li>
        </ol> <!-- Commentlist End -->
        <?php }} ?>
        <!-- respond -->
        <?php if (isset($_SESSION['kAd']) AND !empty($_SESSION['kAd'])) { ?>
        <div class="respond">
          <h3>Yorum Yaz</h3>
          <!-- form -->
          <form name="contactForm" id="contactForm" method="post" action="#">
            <fieldset>
              <div class="message group">
                <label  for="cMessage">Yorumunuz <span class="required">*</span></label>
                <textarea name="cMessage" id="cMessage" rows="10" cols="50" required></textarea>
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
