<?php
	include_once "head.php";
	if (isset($_GET['cikis']) AND htmlspecialchars($_GET['cikis']) == 'true') {
		session_unset();
		session_destroy();
	}
?>
<body>
	<!-- Header
	================================================== -->
	<header id="top">
		<div class="row">
			<div class="header-content twelve columns">
				<h1 id="logo-text"><a href="index.php" title=""><?php print $website_bilgileri['site_basligi']; // Websitenin başlığı ?></a></h1>
				<p id="intro"><?php print $website_bilgileri['site_slogani']; // Websitenin sloganı ?></p>
			</div>
		</div>
		<nav id="nav-wrap">
			<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
			<a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
			<div class="row">
				<ul id="nav" class="nav">
					<li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/index.php" AND empty(htmlspecialchars($_GET['kategoriId']))) print "class='current'"; // Eğer sayfa index.php ise ve GET yok ise ?>><a href="index.php">Ana Sayfa</a></li>
					<li class="has-children <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/index.php" AND !empty(htmlspecialchars($_GET['kategoriId']))) print "current";  // Eğer sayfa index.php ise ve GET var ise ?>"><a href="#">Kategoriler</a>
						<ul>
							<?php
		            $kategoriler = sorgu_calistir("SELECT k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY COUNT(k.ad) DESC", 2);
		            $i = 0;
		            foreach ($kategoriler as $kategori) { //for ($i=0; $i < 5; $i++) {
		              if ($i >= 10) break; // Max 5
		              print '<li><a href="index.php?kategoriId='.$kategori['id'].'">'.$kategori['ad'].'</a></li>';
		              $i++;
		            }
		          ?>
						</ul>
					</li>
					<!-- <li><a href="demo.php">Demo</a></li> -->
					<li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/archives.php") print "class='current'"; ?>><a href="archives.php">Arşiv</a></li>
					<!--<li class="has-children"><a href="single.php">Blog</a>
						<ul>
						<li><a href="blog.php">Blog Yazıları</a></li>
						<li><a href="single.php">Single Blog</a></li>
						</ul>
					</li>-->
					<li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/page.php") echo "class='current'"; ?>><a href="page.php">Hakkımda</a></li>
				</ul> <!-- end #nav -->
			</div>
		</nav> <!-- end #nav-wrap -->
	</header> <!-- Header End -->
