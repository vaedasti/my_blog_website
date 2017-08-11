<?php
	require_once "php/head.php";
	include "php/menu.php";
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
							<a href="#onaylanmamis" role="tab" data-toggle="tab" aria-expanded="true"><!--<i class="material-icons">chat_bubble</i>--> Onaylanmamış (<?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=0", 1)['adet']; ?>)</a>
						</li>
						<li class="">
							<a href="#onaylanmis" role="tab" data-toggle="tab" aria-expanded="false"><!--<i class="material-icons">chat</i>--> Onaylanmış (<?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=1", 1)['adet']; ?>)</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="onaylanmamis">
						<?php
							$yorumlar = sorgu_calistir("SELECT y.id AS id, k.ad AS ad, k.soyad AS soyad, y.icerik AS icerik, y.tarih AS tarih, y.onay AS onay, g.baslik AS gonderi FROM yorumlar AS y INNER JOIN kullanicilar AS k ON y.kullanici=k.id INNER JOIN gonderiler AS g ON y.gonderi=g.id WHERE onay=0", 2);
						?>
						<div class="card">
		          <div class="card-header card-header-icon" data-background-color="purple">
		            <i class="material-icons">comment</i>
		          </div>
		          <div class="card-content">
		            <h4 class="card-title">Onay Bekleyen Yorumlar</h4>
		            <div class="toolbar">
		              <!--        Here you can write extra buttons/actions for the toolbar              -->
		            </div>
		            <div class="material-datatables">
		              <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
										<div class="row">
											<div class="col-sm-12">
												<table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
													<thead>
														<tr role="row">
															<th class="disabled-sorting text-center" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 28px;" aria-sort="ascending">#</th>
															<th class="disabled-sorting" tabindex="1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Ad Soyad</th>
															<th class="disabled-sorting" tabindex="2" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Yorum</th>
															<th class="disabled-sorting" tabindex="3" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Gönderi</th>
															<th class="disabled-sorting" tabindex="4" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Tarih</th>
															<!--<th class="disabled-sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;" aria-label="Date: activate to sort column ascending">Date</th>-->
															<th class="disabled-sorting text-right" tabindex="-1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 200px;">İşlem</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($yorumlar as $yorum) { ?>
														<tr role="row" class="odd">
															<td tabindex="0" class="text-center"><?php print $yorum['id']; ?></td>
															<td><?php print $yorum['ad']." ".$yorum['soyad']; ?></td>
															<td><?php print substr($yorum['icerik'], 0, 20); ?></td>
															<td><?php print substr($yorum['gonderi'], 0, 20); ?></td>
															<td><?php print $yorum['tarih']; ?></td>
															<td class="td-actions text-right">
																<button type="button" name="onayla" value="<?php print $yorum['id']; ?>" onclick="demo.showSwal2('Emin Misiniz!', 'Bu yorumu onaylamak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Onaylandı!', 'Yorum başarılı bir şekilde onaylandı!', null, null, null, null, '<?php print $yorum['id']; ?>', null, null, null)" rel="tooltip" class="btn btn-success btn-icon edit" data-original-title="Onayla" title="">
																	<i class="material-icons">done</i>
																	<div class="ripple-container"></div>
																</button>
																<button type="button" name="sil" value="<?php print $yorum['id']; ?>" onclick="demo.showSwal2('Emin Misiniz!', 'Bu yorumu silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Silindi!', 'Yorum başarılı bir şekilde silindi!', null, null, null, '<?php print $yorum['id']; ?>', null, null, null, null)" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" title="">
																	<i class="material-icons">close</i>
																	<div class="ripple-container"></div>
																</button>
															</td>
														</tr>
														<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=0", 1)['adet']; ?> öğe gösteriliyor</div>
												</div>
											</div>
										</div>
		            </div>
		          </div>
		        <!-- end content-->
		        </div>
		      <!--  end card  -->
					</div>
					<div class="tab-pane" id="onaylanmis">
						<?php
							$yorumlar = sorgu_calistir("SELECT y.id AS id, k.ad AS ad, k.soyad AS soyad, y.icerik AS icerik, y.tarih AS tarih, y.onay AS onay, g.baslik AS gonderi, g.id AS gId FROM yorumlar AS y INNER JOIN kullanicilar AS k ON y.kullanici=k.id INNER JOIN gonderiler AS g ON y.gonderi=g.id WHERE onay=1", 2);
						?>
						<div class="card">
		          <div class="card-header card-header-icon" data-background-color="purple">
		            <i class="material-icons">comment</i>
		          </div>
		          <div class="card-content">
		            <h4 class="card-title">Onaylanan Yorumlar</h4>
		            <div class="toolbar">
		              <!--        Here you can write extra buttons/actions for the toolbar              -->
		            </div>
		            <div class="material-datatables">
		              <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
										<div class="row">
											<div class="col-sm-12">
												<table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
													<thead>
														<tr role="row">
															<th class="disabled-sorting text-center" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 28px;" aria-sort="ascending">#</th>
															<th class="disabled-sorting" tabindex="1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Ad Soyad</th>
															<th class="disabled-sorting" tabindex="2" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Yorum</th>
															<th class="disabled-sorting" tabindex="3" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Gönderi</th>
															<th class="disabled-sorting" tabindex="4" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Tarih</th>
															<!--<th class="disabled-sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;" aria-label="Date: activate to sort column ascending">Date</th>-->
															<th class="disabled-sorting text-right" tabindex="-1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 200px;">İşlem</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($yorumlar as $yorum) { ?>
														<tr role="row" class="odd">
															<td tabindex="0" class="text-center"><?php print $yorum['id']; ?></td>
															<td><?php print $yorum['ad']." ".$yorum['soyad']; ?></td>
															<td><?php print substr($yorum['icerik'], 0, 20); ?></td>
															<td><?php print substr($yorum['gonderi'], 0, 20); ?></td>
															<td><?php print $yorum['tarih']; ?></td>
															<td class="td-actions text-right">
																<button type="button" name="onayiKaldir" value="<?php print $yorum['id']; ?>"  onclick="demo.showSwal2('Emin Misiniz!', 'Bu yorumun onayını kaldırmak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Yorumun onayı başarılı bir şekilde kaldırıldı!', null, null, null, null, null, '<?php print $yorum['id']; ?>', null, null)"  rel="tooltip" class="btn btn-warning btn-icon edit" data-original-title="Onayı Kaldır" title="">
																	<i class="material-icons">restore</i>
																	<div class="ripple-container"></div>
																</button>
																<button type="button" name="sil" value="<?php print $yorum['id']; ?>" onclick="demo.showSwal2('Emin Misiniz!', 'Bu yorumu silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Silindi!', 'Yorum başarılı bir şekilde silindi!', null, null, null, '<?php print $yorum['id']; ?>', null, null, null, null)" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" title="">
																	<i class="material-icons">close</i>
																	<div class="ripple-container"></div>
																</button>
																<a href="../../../single.php?gonderiId=<?php print $yorum['gId']; ?>#comments" target="_blank">
																	<button type="button" rel="tooltip" class="btn btn-icon" data-original-title="Sayfada Aç" title="">
																		<i class="material-icons">open_in_new</i>
																		<div class="ripple-container"></div>
																	</button>
																</a>
															</td>
														</tr>
														<?php } ?>
														</tbody>
													</table>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-5">
													<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=1", 1)['adet']; ?> öğe gösteriliyor</div>
												</div>
											</div>
										</div>
		            </div>
		          </div>
		        <!-- end content-->
		        </div>
		      <!--  end card  -->
					</div>
				</div>
			</div>
    </div>
  </div>
</div>
<?php
	include "php/footer.php";
?>
