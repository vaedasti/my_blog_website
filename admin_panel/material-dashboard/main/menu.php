<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if (isset($_POST['menuId']) AND isset($_POST['menuAdi']) AND isset($_POST['menuAdresi'])) {
			sorgu_calistir("UPDATE menu SET adi=?, adresi=? WHERE id=?",3,array($_POST['menuAdi'], $_POST['menuAdresi'], $_POST['menuId']));
			die();
		}
		elseif (isset($_POST['menuAdi']) AND isset($_POST['menuAdresi'])) {
			sorgu_calistir("INSERT INTO menu(adi, adresi) VALUES(?,?)",3,array($_POST['menuAdi'], $_POST['menuAdresi']));
			die();
		}
		elseif (isset($_POST['menuId'])) {
			sorgu_calistir("DELETE FROM menu WHERE id=?",3,array($_POST['menuId']));
			die();
		}
	}
?>
<?php
	$menuler = sorgu_calistir("SELECT id, adi, adresi FROM menu ORDER BY id", 2);
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
						<h4 class="card-title">Menü</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
							<div class="text-right">
								<button class="btn btn-primary" rel="tooltip" data-original-title="Menü Ekle" onclick="demo.menu();">
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
													<th class="disabled-sorting" tabindex="1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Menü adı</th>
													<th class="disabled-sorting" tabindex="2" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Menü adresi</th>
													<!--<th class="disabled-sorting" tabindex="3" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Gönderi</th>
													<th class="disabled-sorting" tabindex="4" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Tarih</th>-->
													<!--<th class="disabled-sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 154px;" aria-label="Date: activate to sort column ascending">Date</th>-->
													<th class="disabled-sorting text-right" tabindex="-1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 200px;">İşlem</th>
												</tr>
											</thead>
											<!--<tfoot>
												<tr>
													<th rowspan="1" colspan="1">Name</th>
													<th rowspan="1" colspan="1">Position</th>
													<th rowspan="1" colspan="1">Office</th>
													<th rowspan="1" colspan="1">Age</th>
													<th rowspan="1" colspan="1">Start date</th>
													<th class="text-right" rowspan="1" colspan="1">Actions</th>
												</tr>
											</tfoot>-->
											<tbody>
												<?php foreach ($menuler as $menu) { ?>
												<tr role="row" class="odd">
													<td tabindex="0" class="text-center"><?php print $menu['id']; ?></td>
													<td><input type="text" name="<?php print $menu['id']; ?>, adi" value="<?php print $menu['adi']; ?>">	</td>
													<td><input type="text" name="<?php print $menu['id']; ?>, adresi" value="<?php print $menu['adresi']; ?>">	</td>
													<!--<td><?php //print substr($yorum['gonderi'], 0, 20); ?></td>
													<td><?php //print $yorum['tarih']; ?></td>-->
													<td class="td-actions text-right">
														<button type="button" rel="tooltip" class="btn btn-warning btn-icon" data-original-title="Güncelle" onclick="demo.menu(<?php print $menu['id']; ?>, $('input[name=\'<?php print $menu['id']; ?>, adi\']').get()[0].value, $('input[name=\'<?php print $menu['id']; ?>, adresi\']').get()[0].value);"><i class="material-icons">cached</i><div class="ripple-container"></div>
														</button>
														<button type="button" rel="tooltip" class="btn btn-danger btn-icon" data-original-title="Sil" onclick="demo.menu(<?php print $menu['id']; ?>);"><i class="material-icons">delete</i><div class="ripple-container"></div>
														</button>
													</td>
												</tr>
												<?php } ?>
													<!--<td tabindex="0" class="sorting_1">Airi Satou</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>33</td>
													<td>2008/11/28</td>
													<td class="text-right">
														<a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>
														<a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
														<a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
													</td>
												</tr>
												<tr role="row" class="even">
													<td tabindex="0" class="sorting_1">Airi Satou</td>
													<td>Accountant</td>
													<td>Tokyo</td>
													<td>33</td>
													<td>2008/11/28</td>
													<td class="text-right">
														<a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>
														<a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
														<a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a>
													</td>
												</tr>-->
												</tbody>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-5">
											<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM menu", 1)['adet']; ?> öğe gösteriliyor</div>
										</div>
										<!--<div class="col-sm-7">
											<div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
												<ul class="pagination">
													<li class="paginate_button first disabled" id="datatables_first"><a href="#" aria-controls="datatables" data-dt-idx="0" tabindex="0">First</a></li>
													<li class="paginate_button previous disabled" id="datatables_previous"><a href="#" aria-controls="datatables" data-dt-idx="1" tabindex="0">Previous</a></li>
													<li class="paginate_button active"><a href="#" aria-controls="datatables" data-dt-idx="2" tabindex="0">1</a></li>
													<li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="3" tabindex="0">2</a></li>
													<li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="4" tabindex="0">3</a></li>
													<li class="paginate_button "><a href="#" aria-controls="datatables" data-dt-idx="5" tabindex="0">4</a></li>
													<li class="paginate_button next" id="datatables_next"><a href="#" aria-controls="datatables" data-dt-idx="6" tabindex="0">Next</a></li>
													<li class="paginate_button last" id="datatables_last"><a href="#" aria-controls="datatables" data-dt-idx="7" tabindex="0">Last</a></li>
												</ul>
											</div>
										</div>-->
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
