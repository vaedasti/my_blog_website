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
										<!--<div class="row">
											<div class="col-md-6">
												<div class="dataTables_length" id="datatables_length">
													<label class="form-group">Show
														<select name="datatables_length" aria-controls="datatables" class="form-control input-sm">
															<option value="10">10</option>
															<option value="25">25</option>
															<option value="50">50</option>
															<option value="-1">All</option>
														</select> entries
													</label>
												</div>
											</div>
											<div class="col-sm-6">
												<div id="datatables_filter" class="dataTables_filter">
													<label class="form-group">
														<input type="search" class="form-control input-sm" placeholder="Search records" aria-controls="datatables">
													</label>
												</div>
											</div>
										</div>-->
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
													<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=0", 1)['adet']; ?> öğe gösteriliyor</div>
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
										<!--<div class="row">
											<div class="col-md-6">
												<div class="dataTables_length" id="datatables_length">
													<label class="form-group">Show
														<select name="datatables_length" aria-controls="datatables" class="form-control input-sm">
															<option value="10">10</option>
															<option value="25">25</option>
															<option value="50">50</option>
															<option value="-1">All</option>
														</select> entries
													</label>
												</div>
											</div>
											<div class="col-sm-6">
												<div id="datatables_filter" class="dataTables_filter">
													<label class="form-group">
														<input type="search" class="form-control input-sm" placeholder="Search records" aria-controls="datatables">
													</label>
												</div>
											</div>
										</div>-->
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
													<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM yorumlar WHERE onay=1", 1)['adet']; ?> öğe gösteriliyor</div>
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
