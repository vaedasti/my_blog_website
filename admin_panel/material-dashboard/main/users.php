<?php
	require_once "php/head.php";
	include "php/menu.php";
?>
<?php
	$kullanicilar = sorgu_calistir("SELECT id, kAd, email, ad, soyad, tel, dTarih, kTarih, tip FROM kullanicilar", 2);
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
													<th class="disabled-sorting text-center" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 70px;" aria-sort="ascending">#</th>
													<th class="disabled-sorting" tabindex="1" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Kullanıcı Adı</th>
													<th class="disabled-sorting" tabindex="2" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">E-Mail</th>
													<th class="disabled-sorting" tabindex="3" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Ad</th>
													<th class="disabled-sorting" tabindex="4" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Soyad</th>
													<th class="disabled-sorting" tabindex="5" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Telefon</th>
													<th class="disabled-sorting" tabindex="6" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Doğum Tarihi</th>
													<th class="disabled-sorting" tabindex="7" aria-controls="datatables" rowspan="1" colspan="1" style="width: 150px;">Kayıt Tarihi</th>
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
												<?php foreach ($kullanicilar as $kullanici) { ?>
												<tr role="row" class="odd">
													<td tabindex="0" class="text-center"><?php print $kullanici['id']; ?></td>
													<td><?php print $kullanici['kAd']; ?></td>
													<td><?php print $kullanici['email']; ?></td>
													<td><?php print $kullanici['ad']; ?></td>
													<td><?php print $kullanici['soyad']; ?></td>
													<td><?php print $kullanici['tel']; ?></td>
													<td><?php print substr($kullanici['dTarih'], 0,10); ?></td>
													<td><?php print substr($kullanici['kTarih'],0,10); ?></td>
													<td class="td-actions text-right">
														<!--<div class="togglebutton">
															<label>
																<input type="checkbox" <?php //if ($kullanici['tip']=="1") print "checked"; ?> name="admin" value="<?php //print $kullanici['id']; ?>">
															</label>
														</div>-->
														<!--<button type="button" rel="tooltip" class="btn btn-primary btn-icon edit" data-original-title="Düzenle" title="" onclick="demo.showSwal('basic')">
															<i class="material-icons">edit</i>
															<div class="ripple-container"></div>
														</button>-->
														<?php if ($kullanici['tip']=="0") { ?>
														<button type="button" rel="tooltip" class="btn btn-success btn-icon edit" data-original-title="Yönetici Yap" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu kullanıcıyı yönetici yapmak istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Tamam!', 'Kullanıcı başarılı bir şekilde yönetici yapıldı!')">
															<i class="material-icons">person</i>
															<div class="ripple-container"></div>
														</button>
														<button type="button" rel="tooltip" class="btn btn-danger btn-icon remove" data-original-title="Sil" title="" onclick="demo.showSwal2('Emin Misiniz!', 'Bu kullanıcıyı silmek istediğinize emin misiniz?', 'warning', 'Evet', 'Hayır', 'Silindi!', 'Kullanıcı başarılı bir şekilde silindi!')">
															<i class="material-icons">close</i>
															<div class="ripple-container"></div>
														</button>
														<?php } ?>
														<!--<a href="#" class="btn btn-simple btn-success btn-icon edit" onclick="demo.showSwal('yorum-onayla')" rel="tooltip" data-original-title="Onayla"><i class="material-icons">done</i></a>
														<a href="#" class="btn btn-simple btn-danger btn-icon remove" onclick="demo.showSwal('yorum-sil')" rel="tooltip" data-original-title="Sil"><i class="material-icons">close</i></a>-->
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
											<div class="dataTables_info" id="datatables_info" role="status" aria-live="polite"><?php print sorgu_calistir("SELECT COUNT(id) AS adet FROM kullanicilar", 1)['adet']; ?> öğe gösteriliyor</div>
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
		<div class="row" style="display:none;">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Profile -
                                        <small class="category">Complete your profile</small>
                                    </h4>
                                    <form lpformnum="1">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Company (disabled)</label>
                                                    <input type="text" class="form-control" disabled="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGP6zwAAAgcBApocMXEAAAAASUVORK5CYII=&quot;);">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Username</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Email address</label>
                                                    <input type="email" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Fist Name</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Adress</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label">Postal Code</label>
                                                    <input type="text" class="form-control">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group label-floating is-empty">
                                                        <label class="control-label"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                                                        <textarea class="form-control" rows="5"></textarea>
                                                    <span class="material-input"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                    <a href="#pablo">
                                        <img class="img" src="../../assets/img/faces/marc.jpg">
                                    </a>
                                </div>
                                <div class="card-content">
                                    <h6 class="category text-gray">CEO / Co-Founder</h6>
                                    <h4 class="card-title">Alec Thompson</h4>
                                    <p class="description">
                                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                    </p>
                                    <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                                </div>
                            </div>
                        </div>
                    </div>
	</div>
</div>
<?php
	include "php/footer.php";
?>
