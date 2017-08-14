<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['kategoriSil'])) {
			sorgu_calistir("DELETE FROM kategoriler
											WHERE id=?",3,array($_POST['kategoriSil']));
		}
		elseif (isset($_POST['kategoriDuzenle']) AND isset($_POST['icerik'])) {
			sorgu_calistir("UPDATE kategoriler
											SET ad=?
											WHERE id=?",3,array($_POST['icerik'], $_POST['kategoriDuzenle']));
		}
	}
?>
<?php
	$kategoriler = sorgu_calistir("SELECT id, ad
																FROM kategoriler
																ORDER BY id", 2);
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-sm-6 col-lg-offset-0 col-sm-offset-3">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">comment</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Kategoriler</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
							<div class="text-right">
								<button class="btn btn-primary" onclick="demo.kategoriEkle(false)" rel="tooltip" data-original-title="Kategori Ekle">
									<i class="material-icons">add_box</i> Ekle
									<div class="ripple-container"></div>
								</button>
							</div>
						</div>
						<div class="material-datatables">
							<div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
								<div class="row">
									<div class="col-sm-12">
										<table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
											<thead>
												<tr role="row">
													<th class="disabled-sorting text-center" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 28px;" aria-sort="ascending">#</th>
													<th class="disabled-sorting" tabindex="1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Ad</th>
													<!--<th class="disabled-sorting" tabindex="2" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Yorum</th>
													<th class="disabled-sorting" tabindex="3" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Gönderi</th>
													<th class="disabled-sorting" tabindex="4" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Tarih</th>-->
													<!--<th class="disabled-sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;" aria-label="Date: activate to sort column ascending">Date</th>-->
													<th class="disabled-sorting text-right" tabindex="-1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 200px;">İşlem</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($kategoriler as $kategori) { ?>
												<tr role="row" class="odd">
													<td tabindex="0" class="text-center"><?php print $kategori['id']; ?></td>
													<td><?php print $kategori['ad']; ?></td>
													<!--<td><?php //print substr($yorum['icerik'], 0, 20); ?></td>
													<td><?php //print substr($yorum['gonderi'], 0, 20); ?></td>
													<td><?php //print $yorum['tarih']; ?></td>-->
													<td class="td-actions text-right">
														<button type="button" rel="tooltip" class="btn btn-success btn-icon edit" data-original-title="Düzenle" onclick="demo.kategoriDuzenle(<?php print $kategori['id']; ?>, '<?php print $kategori['ad']; ?>')" title="">
															<i class="material-icons">edit</i>
															<div class="ripple-container"></div>
														</button>
														<button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" onclick="demo.kategoriSil(<?php print $kategori['id']; ?>)" title="">
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
											<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM kategoriler", 1)['adet']; ?> öğe gösteriliyor</div>
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
<?php
	include "php/footer.php";
?>
