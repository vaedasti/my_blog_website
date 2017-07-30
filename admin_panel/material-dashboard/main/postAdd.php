<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	//$gonderiler = sorgu_calistir("SELECT g.id AS id, g.baslik AS baslik, g.icerik AS icerik, g.zaman AS tarih, g.etiketler AS etiketler, kl.ad AS kAd, kl.soyad AS kSoyad, k.ad AS kategori, g.gosterim AS goster FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id", 2);
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form method="get" action="/" class="form-horizontal" _lpchecked="1">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Elements</h4>
						</div>
						<div class="card-content">
							<div class="row">
								<label class="col-sm-2 label-on-left">With help</label>
								<div class="col-sm-10">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" class="form-control" value="" style="cursor: auto;">
										<span class="help-block">A block of help text that breaks onto a new line.</span>
										<span class="material-input"></span></div>
									</div>
								</div>
								<div class="row">
									<label class="col-sm-2 label-on-left">Password</label>
									<div class="col-sm-10">
										<div class="form-group label-floating is-empty">
											<label class="control-label"></label>
											<input type="password" class="form-control" value="" style="cursor: auto;">
<span class="material-input"></span></div>
</div>
</div>
<div class="row">
<label class="col-sm-2 label-on-left">Placeholder</label>
<div class="col-sm-10">
<div class="form-group label-floating is-empty">
<label class="control-label"></label>
<input type="text" class="form-control" placeholder="placeholder">
<span class="material-input"></span></div>
</div>
</div>
<div class="row">
<label class="col-sm-2 label-on-left">Disabled</label>
<div class="col-sm-10">
<div class="form-group label-floating is-empty">
<label class="control-label"></label>
<input type="text" placeholder="Disabled input here..." disabled="" class="form-control">
<span class="material-input"></span></div>
</div>
</div>
<div class="row">
<label class="col-sm-2 label-on-left">Static control</label>
<div class="col-sm-10">
<div class="form-group">
<p class="form-control-static">hello@creative-tim.com</p>
</div>
</div>
</div>
<div class="row">
<label class="col-sm-2 label-on-left">Checkboxes and radios</label>
<div class="col-sm-10 checkbox-radios">
<div class="checkbox">
<label>
<input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span> First Checkbox
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span> Second Checkbox
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="optionsRadios" checked="true"><span class="circle"></span><span class="check"></span> First Radio
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="optionsRadios"><span class="circle"></span><span class="check"></span> Second Radio
</label>
</div>
</div>
</div>
<div class="row">
<label class="col-sm-2 label-on-left">Inline checkboxes</label>
<div class="col-sm-10">
<div class="checkbox checkbox-inline">
<label>
<input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>a
</label>
</div>
<div class="checkbox checkbox-inline">
<label>
<input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>b
</label>
</div>
<div class="checkbox checkbox-inline">
<label>
<input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>c
</label>
</div>
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
