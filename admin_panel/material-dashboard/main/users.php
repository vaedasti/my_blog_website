<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	$kullanicilar = sorgu_calistir("SELECT id, kAd, email, ad, soyad, kTarih, tip
																	FROM kullanicilar", 2);
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">account_box</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Kullanıcılar</h4>
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
													<th class="disabled-sorting text-center" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 70px;" aria-sort="ascending">#</th>
													<th class="disabled-sorting" tabindex="1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Kullanıcı Adı</th>
													<th class="disabled-sorting" tabindex="2" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">E-Mail</th>
													<th class="disabled-sorting" tabindex="3" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Ad</th>
													<th class="disabled-sorting" tabindex="4" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Soyad</th>
													<th class="disabled-sorting" tabindex="7" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Kayıt Tarihi</th>
													<th class="disabled-sorting text-right" tabindex="-1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 200px;">İşlem</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($kullanicilar as $kullanici) { ?>
												<tr role="row" class="odd">
													<td tabindex="0" class="text-center"><?php print $kullanici['id']; ?></td>
													<td><?php print $kullanici['kAd']; ?></td>
													<td><?php print $kullanici['email']; ?></td>
													<td><?php print $kullanici['ad']; ?></td>
													<td><?php print $kullanici['soyad']; ?></td>
													<td><?php print substr($kullanici['kTarih'],0,10); ?></td>
													<td class="td-actions text-right">
														<?php if ($kullanici['tip']=="0") { ?>
														<button type="button" rel="tooltip" class="btn btn-success btn-icon edit" data-original-title="Yönetici Yap" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu kullanıcıyı yönetici yapmak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Kullanıcı başarılı bir şekilde yönetici yapıldı!', null, null, null, null, null, null, null, '<?php print $kullanici['id']; ?>')">
															<i class="material-icons">person</i>
															<div class="ripple-container"></div>
														</button>
														<button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu kullanıcıyı silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Silindi!', 'Kullanıcı başarılı bir şekilde silindi!!', null, null, null, null, null, null, '<?php print $kullanici['id']; ?>', null)">
															<i class="material-icons">close</i>
															<div class="ripple-container"></div>
														</button>
														<?php } ?>
                          </td>
												</tr>
												<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-5">
											<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM kullanicilar", 1)['adet']; ?> öğe gösteriliyor</div>
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
<?php
	include "php/footer.php";
?>
