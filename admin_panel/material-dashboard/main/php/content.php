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
                    <td><?php print substr(htmlspecialchars($gonderi['icerik']), 0,20)."..."; ?></td>
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
                        <button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Yayından Kaldır" title="" onclick="demo.showSwal('yorum-sil')"><i class="material-icons">chat_bubble</i><div class="ripple-container"></div>
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
        <div class="card card-nav-tabs">
          <div class="card-header card-header-tabs" data-background-color="rose">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <span class="nav-tabs-title">Tasks:</span>
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="active">
                    <a href="#profile" data-toggle="tab">
                      <i class="material-icons">bug_report</i>
                      Bugs
                    <div class="ripple-container"></div></a>
                  </li>
                  <li class="">
                    <a href="#messages" data-toggle="tab">
                      <i class="material-icons">code</i>
                      Website
                    <div class="ripple-container"></div></a>
                  </li>
                  <li class="">
                    <a href="#settings" data-toggle="tab">
                      <i class="material-icons">cloud</i>
                      Server
                    <div class="ripple-container"></div></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-content">
            <div class="tab-content">
              <div class="tab-pane active" id="profile">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                          </label>
                        </div>
                      </td>
                      <td>Sign contract for "What are conference organizers afraid of?"</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes">
                          </label>
                        </div>
                      </td>
                      <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes">
                          </label>
                        </div>
                      </td>
                      <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                      </td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                          </label>
                        </div>
                      </td>
                      <td>Create 4 Invisible User Experiences you Never Knew About</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="messages">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                          </label>
                        </div>
                      </td>
                      <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                      </td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes">
                          </label>
                        </div>
                      </td>
                      <td>Sign contract for "What are conference organizers afraid of?"</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="settings">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes">
                          </label>
                        </div>
                      </td>
                      <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes" checked>
                          </label>
                        </div>
                      </td>
                      <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                      </td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="optionsCheckboxes">
                          </label>
                        </div>
                      </td>
                      <td>Sign contract for "What are conference organizers afraid of?"</td>
                      <td class="td-actions text-right">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                        </button>
                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                          <i class="material-icons">close</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                    <button type="button" rel="tooltip" class="btn btn-success btn-icon edit" data-original-title="Onayla" title="" onclick="demo.showSwal('yorum-onayla')">
                      <i class="material-icons">done</i>
                      <div class="ripple-container"></div>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" title="" onclick="demo.showSwal('yorum-sil')">
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
