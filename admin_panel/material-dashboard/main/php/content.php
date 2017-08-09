<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php
      	$gonderiler = sorgu_calistir("SELECT g.id AS id, g.baslik AS baslik, g.icerik AS icerik, g.zaman AS tarih, g.etiketler AS etiketler, kl.ad AS kAd, kl.soyad AS kSoyad, k.ad AS kategori, g.gosterim AS goster FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id WHERE g.gosterim=1  ORDER BY tarih DESC LIMIT 0,5", 2);
      ?>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">library_books</i>
          </div>
          <div class="card-content">
            <h4 class="card-title">Son 5 Gönderi</h4>
            <div class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <tr>
                    <th>Başlık</th>
                    <th>İçerik</th>
                    <th>Tarih</th>
                    <th>Yazar</th>
                    <th class="text-right">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($gonderiler as $gonderi) {
                  ?>
                  <tr>
                    <td><?php print $gonderi['baslik']; ?></td>
                    <td><?php print substr(strip_tags($gonderi['icerik']), 0,20)."..."; ?></td>
                    <td><?php print substr($gonderi['tarih'], 0,10); ?></td>
                    <td><?php print $gonderi['kAd']." ".$gonderi['kSoyad']; ?></td>
                    <td class="text-primary td-actions text-right">
                      <!--<form action="postAdd.php" class="form-horizontal" method="get">-->
                        <a href="postAdd.php?duzenle=<?php print $gonderi['id']; ?>" target="_self">
                          <button type="button" rel="tooltip" class="btn btn-primary btn-icon edit" data-original-title="Düzenle" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Yayından Kaldır" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu gönderiyi yayından kaldırmak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Gönderi başarılı bir şekilde yayından kaldırıldı!', null, null, '<?php print $gonderi['id']; ?>', null, null, null, null, null)">
                          <i class="material-icons">chat_bubble</i>
                          <div class="ripple-container"></div>
                        </button>
                      <!--</form>-->
                    </td>
                  </tr>
                  <?php } ?>
                  <!--<tr>
                  <td>Minerva Hooper</td>
                  <td>Curaçao</td>
                  <td>Sinaai-Waas</td>
                  <td class="text-primary">$23,789</td>
                  </tr>
                  <tr>
                  <td>Sage Rodriguez</td>
                  <td>Netherlands</td>
                  <td>Baileux</td>
                  <td class="text-primary">$56,142</td>
                  </tr>
                  <tr>
                  <td>Philip Chaney</td>
                  <td>Korea, South</td>
                  <td>Overland Park</td>
                  <td class="text-primary">$38,735</td>
                  </tr>
                  <tr>
                  <td>Doris Greene</td>
                  <td>Malawi</td>
                  <td>Feldkirchen in Kärnten</td>
                  <td class="text-primary">$63,542</td>
                  </tr>
                  <tr>
                  <td>Mason Porter</td>
                  <td>Chile</td>
                  <td>Gloucester</td>
                  <td class="text-primary">$78,615</td>
                  </tr>-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-text" data-background-color="orange">
            <h4 class="card-title">Onay Bekleyen Yorumlar</h4>
            <p class="category">Toplam <?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=0", 1)['adet']; ?> Yorum</p>
          </div>
          <div class="card-content table-responsive">
            <?php
              $yorumlar = sorgu_calistir("SELECT y.id AS id, k.ad AS ad, k.soyad AS soyad, y.icerik AS icerik, y.tarih AS tarih, y.onay AS onay, g.baslik AS gonderi FROM yorumlar AS y INNER JOIN kullanicilar AS k ON y.kullanici=k.id INNER JOIN gonderiler AS g ON y.gonderi=g.id WHERE onay=0", 2);
            ?>
            <table class="table table-hover header-fixed">
              <thead class="text-warning">
                <tr>
                  <th>Ad Soyad</th>
                  <th>Yorum</th>
                  <th>Gönderi</th>
                  <th>Tarih</th>
                  <th>İşlem</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($yorumlar as $yorum) { ?>
                <tr>
                  <td><?php print $yorum['ad']." ".$yorum['soyad']; ?></td>
                  <td><?php print substr($yorum['icerik'], 0, 15); ?></td>
                  <td><?php print substr($yorum['gonderi'], 0, 15); ?></td>
                  <td><?php print substr($yorum['tarih'], 0,10); ?></td>
                  <td class="td-actions text-right">
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon edit" data-original-title="Onayla" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu yorumu onaylamak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Onaylandı!', 'Yorum başarılı bir şekilde onaylandı!', null, null, null, '<?php print $yorum['id']; ?>', null, null, null)">
                      <i class="material-icons">done</i>
                      <div class="ripple-container"></div>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu yorumu silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Silindi!', 'Yorum başarılı bir şekilde silindi!', null, null, '<?php print $yorum['id']; ?>', null, null, null, null)">
                      <i class="material-icons">close</i>
                      <div class="ripple-container"></div>
                    </button>
                  </td>
                </tr>
                <?php } ?>
                <!--<tr>
                <td>2</td>
                <td>Minerva Hooper</td>
                <td>$23,789</td>
                <td>Curaçao</td>
                </tr>
                <tr>
                <td>3</td>
                <td>Sage Rodriguez</td>
                <td>$56,142</td>
                <td>Netherlands</td>
                </tr>
                <tr>
                <td>4</td>
                <td>Philip Chaney</td>
                <td>$38,735</td>
                <td>Korea, South</td>
                </tr>-->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
