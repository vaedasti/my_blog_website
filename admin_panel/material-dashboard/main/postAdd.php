<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	if (isset($_GET['duzenle'])) {
		$gonderi = sorgu_calistir("SELECT g.id AS id, g.baslik AS baslik, g.icerik AS icerik, g.zaman AS tarih, g.etiketler AS etiketler, kl.ad AS kAd, kl.soyad AS kSoyad, k.ad AS kategori, g.gosterim AS goster
															FROM gonderiler AS g
															INNER JOIN kategoriler AS k ON g.kategori=k.id
															INNER JOIN kullanicilar AS kl ON g.yazar=kl.id
															WHERE g.id=".$_GET['duzenle'], 1);
	}
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <form action="#" class="form-horizontal" method="post">
						<?php if (isset($_GET['duzenle'])) print "<input type='hidden' name='gonderi' value='".$_GET['duzenle']."'>"; ?>
            <div class="card-header card-header-text" data-background-color="rose">
              <h4 class="card-title"><?php if (isset($gonderi)) print "Gönderi Düzenle"; else print "Gönderi Ekle"; ?></h4>
            </div>
            <div class="card-content">
							<div class="row">
								<div class="col-sm-6 col-lg-3 col-xs-4">
									<div class="form-group label-floating <?php if (!isset($gonderi)) print "is-empty"; ?>">
										<label class="control-label">Başlık <small>*</small></label>
										<input class="form-control" type="text" name="baslik" required="true" aria-required="true" style="cursor: auto;" value="<?php if (isset($gonderi)) print $gonderi['baslik']; ?>">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-sm-6 col-lg-3 col-xs-4">
									<div class="form-group label-floating">
										<label class="control-label">Yazar</label>
										<input type="text" disabled="" class="form-control" value="<?php if (isset($gonderi)) print $gonderi['kAd']." ".$gonderi['kSoyad']; else print $_SESSION['ad']." ".$_SESSION['soyad'] ?>">
										<span class="material-input"></span>
									</div>
								</div>
								<div class="col-sm-6 col-lg-3 col-xs-4">
									<!--<div class="col-md-12">-->
										<div class="col-md-8 col-lg-8 col-xs-8">
											<select class="selectpicker dropdown-toggle" name="kategori" aria-expanded="false" data-style="btn btn-primary" role="button" title="Kategori Seç" required>
												<?php
													foreach (sorgu_calistir("SELECT * FROM kategoriler",2) as $kategori) {
														if (isset($gonderi)) {
															if ($gonderi['kategori'] == $kategori['ad'])
																print "<option value='".$kategori['id']."' selected>".$kategori['ad']."</option>";
															else
																print "<option value='".$kategori['id']."'>".$kategori['ad']."</option>";
														}
														else
															print "<option value='".$kategori['id']."'>".$kategori['ad']."</option>";
												} ?>
											</select>
										</div>
										<div class="col-md-4 col-lg-4 col-xs-4" align="center">
											<button type="button" class="btn btn-warning" rel="tooltip" data-original-title="Kategori Ekle" onclick="demo.kategoriEkle()">
												<i class="material-icons">add_box</i>
												<div class="ripple-container"></div>
											</button>
										</div>
									<!--</div>-->
								</div>
								<div class="col-sm-6 col-lg-3 col-xs-4">
									<div class="form-group label-floating <?php if (!isset($gonderi)) print "is-empty"; ?>">
										<label class="control-label">Etiketler</label>
										<input class="form-control" name="etiket" type="text" aria-required="false" style="cursor: auto;" value="<?php if (isset($gonderi)) print $gonderi['etiketler']; ?>">
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<script src="../../ckeditor/ckeditor.js"></script>
								<div class="col-md-12">
									<textarea name="icerik" id="editor1" rows="10" cols="80">
										<?php if (isset($gonderi))
											print $gonderi['icerik'];
										?>
									</textarea>
									<script>
										// Replace the <textarea id="editor1"> with a CKEditor
										// instance, using default configuration.
										CKEDITOR.replace( 'editor1' );
									</script>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 form-footer text-right">
									<button type="submit" class="btn btn-rose btn-fill"><?php if(isset($gonderi)) print "Güncelle"; else print "Ekle"; ?><div class="ripple-container"></div></button>
								</div>
							</div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	include "php/footer.php";
?>
