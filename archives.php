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
					<h2>Arşiv.</h2>
					<p class="lead">Lorem ipsum Nisi enim est proident est magna occaecat dolore proident eu ex sunt consectetur consectetur dolore enim nisi exercitation adipisicing magna culpa commodo deserunt ut do Ut occaecat. Lorem ipsum Veniam consequat quis.</p>
					<div class="row archive-list">
						<div class="twelve columns">
							<h4>Son 10 Gönderi.</h4>
				      	<ul>
                  <?php
                    $gonderiler = sorgu_calistir("SELECT id, baslik FROM gonderiler WHERE gosterim=1 ORDER BY zaman DESC LIMIT 0,10");
                    foreach ($gonderiler as $gonderi) {
                      echo '<li><a href=single.php?gonderiId='.$gonderi['id'].'</a>'.$gonderi['baslik'].'</li>';
                    }
                  ?>
				      	</ul>
						</div>
						<div class="twelve columns">
							<h4>Aylara göre.</h4>
					      	<ul>
                    <?php
                      $a;
                      $deger = sorgu_calistir("SELECT zaman FROM gonderiler ORDER BY zaman DESC");
                      foreach ($deger as $key) {
                        $tarih = tarih($key['zaman']);
                        if (empty($a) OR ($a['ay'] != $tarih['ay'] AND $a['yil'] != $tarih['yil']))
                          echo "<li><a href='index.php?zaman=".$key['zaman']."'>".$tarih['ay']." ".$tarih['yil']."</a></li>";
                        $a = $tarih;
                      }
                    ?>
					      	</ul>
						</div>
					</div> <!-- end row -->
			      <div class="row archive-list">
						<div class="twelve columns">
							<h4>Kategorilere göre.</h4>
				      	<ul>
                  <?php
                    global $db;
                    $kategoriler = sorgu_calistir("SELECT COUNT(k.ad) AS adet, k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY adet DESC");
                    $i = 0;
                    foreach ($kategoriler as $kategori) { //for ($i=0; $i < 5; $i++) {
                      if ($i >= 5) break; // Max 5
                      echo '<li><a href=index.php?kategoriId='.$kategori['id']. ' title=\''.$kategori['ad'].'\'>'.$kategori['ad'].'</a></li>'; //$kategoriler[$i]['adet']
                      $i++;
                    }
                  ?>
				      	</ul>
						</div>
						<div class="twelve columns">
							<h4>Site haritası.</h4>
				      	<ul>
				      		<li><a href="">Arşiv</a></li>
				      		<li><a href="">Anasayfa</a></li>
				      		<li><a href="">Hakkımda</a></li>
				      		<li><a href="">Blog</a></li>
				      	</ul>
						</div>
			      </div>
				</section> <!-- End page -->
   		</div> <!-- End main -->
      <?php
        include_once "php/sidebar.php";
        include_once "php/footer.php";
      ?>
