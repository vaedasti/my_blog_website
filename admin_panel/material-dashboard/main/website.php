<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$bilgiler = array($_POST['baslik'],
											$_POST['slogan'],
											$_POST['menu_isim_1'],
											$_POST['menu_isim_2'],
											$_POST['menu_isim_3'],
											$_POST['menu_isim_4'],
											$_POST['menu_isim_5'],
											$_POST['menu_isim_6'],
											$_POST['menu_adres_1'],
											$_POST['menu_adres_2'],
											$_POST['menu_adres_3'],
											$_POST['menu_adres_4'],
											$_POST['menu_adres_5'],
											$_POST['menu_adres_6'],
											$_POST['bilgi'],
											$_POST['fb'],
											$_POST['tw'],
											$_POST['gp'],
											$_POST['git'],
											$_POST['inst'],
											$_POST['flickr'],
											$_POST['skype'],
											$_POST['hakkimda']);
		sorgu_calistir("UPDATE website SET site_basligi=?, site_slogani=?, menu_isim_1=?, menu_isim_2=?, menu_isim_3=?, menu_isim_4=?, menu_isim_5=?, menu_isim_6=?, menu_adres_1=?, menu_adres_2=?, menu_adres_3=?, menu_adres_4=?, menu_adres_5=?, menu_adres_6=?, site_bilgisi=?, site_fb=?, site_tw=?, site_gp=?, site_git=?, site_inst=?, site_flickr=?, site_skype=?, hakkimda=? WHERE id=1",3,$bilgiler);
	}
	$bilgiler = sorgu_calistir("SELECT * FROM website", 1);
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-text" data-background-color="rose">
              <h4 class="card-title">Website Bilgileri</h4>
            </div>
            <div class="card-content">
							<form action="#" class="form-horizontal" method="post">
								<div class="row">
									<label class="col-sm-2 label-on-left">Site Başlığı</label>
									<div class="col-sm-10">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="baslik" style="cursor: auto;" value="<?php print $bilgiler['site_basligi'] ?>">
											<span class="help-block">Websitenin başlığı.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Site Sloğanı</label>
									<div class="col-sm-10">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="slogan" style="cursor: auto;" value="<?php print $bilgiler['site_slogani'] ?>">
											<span class="help-block">Websitenin sloğanı.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Menüler İsimleri</label>
									<?php for ($i=1; $i <= 6; $i++) { ?>
										<div class="col-sm-1">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" name="<?php print "menu_isim_$i"; ?>" style="cursor: auto;" value="<?php print $bilgiler['menu_isim_'.$i] ?>">
												<span class="help-block">Menü <?php print $i; ?>. alan ismi.</span>
												<span class="material-input"></span>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Menüler Adresleri</label>
									<?php for ($i=1; $i <= 6; $i++) { ?>
										<div class="col-sm-1">
											<div class="form-group label-floating is-empty">
												<label class="control-label"></label>
												<input type="text" class="form-control" name="<?php print "menu_adres_$i"; ?>" style="cursor: auto;" value="<?php print $bilgiler['menu_adres_'.$i] ?>">
												<span class="help-block">Menü <?php print $i; ?>. alan adresi.</span>
												<span class="material-input"></span>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Site Bilgisi</label>
									<div class="col-sm-10">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="bilgi" style="cursor: auto;" value="<?php print $bilgiler['site_bilgisi'] ?>">
											<span class="help-block">Footer bilgisi.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Facebook</label>
									<div class="col-sm-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="fb" style="cursor: auto;" value="<?php print $bilgiler['site_fb'] ?>">
											<span class="help-block">Facebook adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
									<label class="col-sm-2 label-on-left">Twitter</label>
									<div class="col-sm-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="tw" style="cursor: auto;" value="<?php print $bilgiler['site_tw'] ?>">
											<span class="help-block">Twitter adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Google+</label>
									<div class="col-sm-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="gp" style="cursor: auto;" value="<?php print $bilgiler['site_gp'] ?>">
											<span class="help-block">Google Plus adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
									<label class="col-sm-2 label-on-left">GitHub</label>
									<div class="col-sm-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="git" style="cursor: auto;" value="<?php print $bilgiler['site_git'] ?>">
											<span class="help-block">GitHub adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Instagram</label>
									<div class="col-sm-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="inst" style="cursor: auto;" value="<?php print $bilgiler['site_inst'] ?>">
											<span class="help-block">Instagram adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
									<label class="col-sm-2 label-on-left">Flickr</label>
									<div class="col-sm-4">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="flickr" style="cursor: auto;" value="<?php print $bilgiler['site_flickr'] ?>">
											<span class="help-block">Flickr adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Skype</label>
									<div class="col-sm-10">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="text" class="form-control" name="skype" style="cursor: auto;" value="<?php print $bilgiler['site_skype'] ?>">
											<span class="help-block">Skype adresi.</span>
											<span class="material-input"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Hakkımda</label>
									<div class="col-sm-10" style="padding-top: 20px;">
										<script src="../../ckeditor/ckeditor.js"></script>
										<textarea name="hakkimda" id="editor1" rows="10" cols="80">
											<?php print $bilgiler['hakkimda']; ?>
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
										<button type="submit" class="btn btn-rose btn-fill">Güncelle<div class="ripple-container"></div></button>
									</div>
								</div>
							</form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
	include "php/footer.php";
?>
