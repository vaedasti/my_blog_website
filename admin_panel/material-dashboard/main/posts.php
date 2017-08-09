<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	$gonderiler = sorgu_calistir("SELECT g.id AS id, g.baslik AS baslik, g.icerik AS icerik, g.zaman AS tarih, g.etiketler AS etiketler, kl.ad AS kAd, kl.soyad AS kSoyad, k.ad AS kategori, g.gosterim AS goster FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id INNER JOIN kullanicilar AS kl ON g.yazar=kl.id ORDER BY tarih DESC", 2);
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-6 col-lg-offset-0 col-sm-offset-3">
				<!--<h3 class="title text-center">Page Subcategories</h3>
				<br>-->
				<div class="nav-center">
					<ul class="nav nav-pills nav-pills-primary nav-pills-icons" role="tablist">
						<li class="active">
							<a href="#no-show" role="tab" data-toggle="tab" aria-expanded="true"><!--<i class="material-icons">chat_bubble</i>--> Yayınlanmamış (<?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM gonderiler WHERE gosterim=0", 1)['adet']; ?>)</a>
						</li>
						<li class="">
							<a href="#show" role="tab" data-toggle="tab" aria-expanded="false"><!--<i class="material-icons">chat</i>--> Yayınlanmış (<?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM gonderiler WHERE gosterim=1", 1)['adet']; ?>)</a>
						</li>
						<!--  color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"  -->
						<!--<li class="active">
							<a href="#description-1" role="tab" data-toggle="tab" aria-expanded="true">
								<i class="material-icons">info</i> Description
							</a>
						</li>
						<li class="">
							<a href="#schedule-1" role="tab" data-toggle="tab" aria-expanded="false">
								<i class="material-icons">location_on</i> Location
							</a>
						</li>
						<li class="">
							<a href="#tasks-1" role="tab" data-toggle="tab" aria-expanded="false">
								<i class="material-icons">gavel</i> Legal Info
							</a>
						</li>
						<li class="">
							<a href="#tasks-2" role="tab" data-toggle="tab" aria-expanded="false">
								<i class="material-icons">help_outline</i> Help Center
							</a>
						</li>-->
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="no-show">
						<?php
							foreach ($gonderiler as $gonderi) {
								if ($gonderi['goster'] == "0") {
						?>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><?php print $gonderi['baslik']; ?></h4>
								<p class="category"><?php print $gonderi['kAd']." ".$gonderi['kSoyad']; ?> - <?php print $gonderi['kategori']; ?> - <?php print $gonderi['tarih']; ?></p>
							</div>
							<div class="card-content">
								<?php
									$icerik = strip_tags($gonderi['icerik']);
									if (strlen($icerik)>500) {
										$icerik = substr($icerik, 0, 500)."...";
									}
									print $icerik;
									?>
								<br>
								<div class="bootstrap-tagsinput">
									<?php
										foreach (explode(", ", $gonderi['etiketler']) as $etiket) {
											print '<span class="tag label label-info">'.$etiket.'<span data-role="remove"></span></span> ';
										}
									?>
									<!--<span class="tag label label-info">Amsterdam<span data-role="remove"></span></span>
									<span class="tag label label-info">Washington<span data-role="remove"></span></span>
									<span class="tag label label-info">Sydney<span data-role="remove"></span></span>
									<span class="tag label label-info">Beijing<span data-role="remove"></span></span>
									<input type="text" placeholder="">-->
								</div>
								<hr>
								<div class="col-md-12" align="center">
									<form action="postAdd.php" class="form-horizontal" method="get">
										<a href="postAdd.php?duzenle=<?php print $gonderi['id']; ?>" target="_self">
											<button type="button" class="btn btn-primary">
												<i class="material-icons">edit</i> Düzenle
												<div class="ripple-container"></div>
											</button>
										</a>
										<button type="button" name="yayinla" class="btn btn-success" onclick="demo.showSwal2('Emin Misiniz!', 'Bu gönderiyi yayınlamak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Gönderi başarılı bir şekilde yayınlandı!', '<?php print $gonderi['id']; ?>', null, null, null, null, null, null, null)">
											<i class="material-icons">chat</i> Yayınla
											<div class="ripple-container"></div>
										</button>
										<button type="button" name="yayinSil" class="btn btn-danger" onclick="demo.showSwal2('Emin Misiniz!', 'Bu gönderiyi silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Gönderi başarılı bir şekilde silindi!', null, '<?php print $gonderi['id']; ?>', null, null, null, null, null, null, null)">
											<i class="material-icons">delete</i> Sil
											<div class="ripple-container"></div>
										</button>
									</form>
									<!--<button type="button" class="btn"><i class="material-icons">open_in_new</i> Sayfada Aç<div class="ripple-container"></div></button>-->
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>
					<div class="tab-pane" id="show">
						<?php
							foreach ($gonderiler as $gonderi) {
								if ($gonderi['goster'] == "1") {
						?>
						<div class="card">
							<div class="card-header">
								<h4 class="card-title"><?php print $gonderi['baslik']; ?></h4>
								<p class="category"><?php print $gonderi['kAd']." ".$gonderi['kSoyad']; ?> - <?php print $gonderi['kategori']; ?> - <?php print $gonderi['tarih']; ?></p>
							</div>
							<div class="card-content">
								<?php
									$icerik = strip_tags($gonderi['icerik']);
									if (strlen($icerik)>500) {
										$icerik = substr($icerik, 0, 500)."...";
									}
									print $icerik;
								?>
								<br>
								<div class="bootstrap-tagsinput">
									<?php
										foreach (explode(", ", $gonderi['etiketler']) as $etiket) {
											print '<span class="tag label label-info">'.$etiket.'<span data-role="remove"></span></span> ';
										}
									?>
									<!--<span class="tag label label-info">Amsterdam<span data-role="remove"></span></span>
									<span class="tag label label-info">Washington<span data-role="remove"></span></span>
									<span class="tag label label-info">Sydney<span data-role="remove"></span></span>
									<span class="tag label label-info">Beijing<span data-role="remove"></span></span>
									<input type="text" placeholder="">-->
								</div>
								<hr>
								<div class="col-md-12" align="center">
									<form action="postAdd.php" class="form-horizontal" method="get">
										<button type="submit" name="duzenle" value="<?php print $gonderi['id']; ?>" class="btn btn-primary"><i class="material-icons">edit</i> Düzenle<div class="ripple-container"></div></button>
										<button type="button" name="yayındanKaldir" class="btn btn-rose" onclick="demo.showSwal2('Emin Misiniz!', 'Bu gönderiyi yayından kaldırmak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Gönderi başarılı bir şekilde yayından kaldırıldı!', null, null, '<?php print $gonderi['id']; ?>', null, null, null, null, null)"><i class="material-icons">chat_bubble</i> Yayından Kaldır<div class="ripple-container"></div></button>

										<button type="button" name="yayinSil" class="btn btn-danger" onclick="demo.showSwal2('Emin Misiniz!', 'Bu gönderiyi silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Gönderi başarılı bir şekilde silindi!', null, '<?php print $gonderi['id']; ?>', null, null, null, null, null, null, null)"><i class="material-icons">delete</i> Sil<div class="ripple-container"></div></button>
										<a href="../../../single.php?gonderiId=<?php print $gonderi['id']; ?>" target="_blank">
											<button type="button" class="btn"><i class="material-icons">open_in_new</i> Sayfada Aç<div class="ripple-container"></div></button>
										</a>
									</form>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>
					<!--<div class="tab-pane active" id="description-1">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Description about product</h4>
								<p class="category">More information here</p>
							</div>
							<div class="card-content">
								Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
								<br>
								<br> Dramatically visualize customer directed convergence without revolutionary ROI.
							</div>
						</div>
					</div>
					<div class="tab-pane" id="schedule-1">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Location of the product</h4>
								<p class="category">More information here</p>
							</div>
							<div class="card-content">
								Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
								<br>
								<br> Dramatically maintain clicks-and-mortar solutions without functional solutions.
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tasks-1">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Legal info of the product</h4>
								<p class="category">More information here</p>
							</div>
							<div class="card-content">
								Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
								<br>
								<br>Dynamically innovate resource-leveling customer service for state of the art customer service.
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tasks-2">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Help center</h4>
								<p class="category">More information here</p>
							</div>
							<div class="card-content">
								From the seamless transition of glass and metal to the streamlined profile, every detail was carefully considered to enhance your experience. So while its display is larger, the phone feels just right.
								<br>
								<br> Another Text. The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include "php/footer.php";
?>
