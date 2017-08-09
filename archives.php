<?php
require_once "php/database.php";
include_once "php/header.php";
?>
<!-- Content
================================================== -->
<div id="content-wrap">
	<div class="row">
		<div id="main" class="eight columns">
			<section class="page">
			<h2>Arşiv</h2>
			<p class="lead"></p>
			<div class="row archive-list">
				<div class="twelve columns">
					<h4>Son 10 Gönderi</h4>
		      	<ul>
              <?php
                $gonderiler = sorgu_calistir("SELECT id, baslik FROM gonderiler WHERE gosterim=1 ORDER BY zaman DESC LIMIT 0,10", 2);
                foreach ($gonderiler as $gonderi) {
                  print "<li><a href='single.php?gonderiId=".$gonderi['id']."'>".$gonderi['baslik']."</a></li>";
                }
              ?>
		      	</ul>
				</div>
				<div class="twelve columns">
					<h4>Aylara göre</h4>
			      	<ul>
                <?php
                  $a;
                  $deger = sorgu_calistir("SELECT zaman FROM gonderiler ORDER BY zaman DESC", 2);
                  foreach ($deger as $key) {
                    $tarih = tarih($key['zaman']);
                    if(empty($a) OR $a != $tarih)
                      print "<li><a href='index.php?zaman=".substr($key['zaman'], 0,7)."'>".$tarih['ay']." ".$tarih['yil']."</a></li>";
                    $a = $tarih;
                  }
                ?>
			      	</ul>
				</div>
			</div> <!-- end row -->
	      <div class="row archive-list">
					<div class="twelve columns">
						<h4>Kategorilere göre</h4>
			      	<ul>
                <?php
                  $kategoriler = sorgu_calistir("SELECT COUNT(k.ad) AS adet, k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY adet DESC", 2);
                  foreach ($kategoriler as $kategori) {
                    print '<li><a href=index.php?kategoriId='.$kategori['id']. ' title=\''.$kategori['ad'].'\'>'.$kategori['ad'].'</a></li>'; //$kategoriler[$i]['adet']
                  }
                ?>
			      	</ul>
					</div>
					<div class="twelve columns">
						<h4>Site haritası</h4>
			      	<ul>
                <?php $menuler = sorgu_calistir("SELECT * FROM menu ORDER BY id",2); foreach ($menuler as $menu) { ?>
                  <li><a href='<?php print $menu['adresi']; ?>'><?php print $menu['adi']; ?></a></li>
                <?php } ?>
			      	</ul>
					</div>
	      </div>
	    </section> <!-- End page -->
		</div> <!-- End main -->
<?php
	include_once "php/sidebar.php";
	include_once "php/footer.php";
?>
