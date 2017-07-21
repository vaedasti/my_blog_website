<?php include_once "head.php"; ?>
	<body>
		<!-- Header
		================================================== -->
		<header id="top">
			<div class="row">
				<div class="header-content twelve columns">
					<h1 id="logo-text"><a href="index.php" title=""><?php echo $website_bilgileri["site_basligi"]; ?></a></h1>
					<p id="intro"><?php echo $website_bilgileri["site_slogani"]; ?></p>
				</div>
			</div>
			<nav id="nav-wrap">
				<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
				<a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
				<div class="row">
					<ul id="nav" class="nav">
						<li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/index.php" AND empty(htmlspecialchars($_GET['kategoriId']))) echo "class='current'"; ?>><a href="index.php">Ana Sayfa</a></li>
						<li class="has-children <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/index.php" AND ! empty(htmlspecialchars($_GET['kategoriId']))) echo "current"; ?>"><a href="#">Kategoriler</a>
							<ul>
								<?php
			            global $db;
			            $kategoriler = sorgu_calistir("SELECT k.id, k.ad FROM gonderiler AS g INNER JOIN kategoriler AS k ON g.kategori=k.id WHERE g.gosterim=1 GROUP BY k.id ORDER BY COUNT(k.ad) DESC");
			            $i = 0;
			            foreach ($kategoriler as $kategori) { //for ($i=0; $i < 5; $i++) {
			              if ($i >= 10) break; // Max 5
			              echo '<li><a href=index.php?kategoriId='.$kategori['id']. ' >'.$kategori['ad'].'</a></li>';
			              $i++;
			            }
			          ?>
							</ul>
						</li>
						<!-- <li><a href="demo.php">Demo</a></li> -->
						<li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/archives.php") echo "class='current'"; ?>><a href="archives.php">Arşiv</a></li>
						<!--<li class="has-children"><a href="single.php">Blog</a>
							<ul>
							<li><a href="<?php $_SERVER['PHP_SELF']; ?>">Blog Yazıları</a></li>
							<li><a href="single.php">Single Blog</a></li>
							</ul>
						</li>-->
						<li <?php if ($_SERVER['PHP_SELF'] == "/my_blog_website/page.php") echo "class='current'"; ?>><a href="page.php">Hakkımda</a></li>
					</ul> <!-- end #nav -->
				</div>
			</nav> <!-- end #nav-wrap -->
		</header> <!-- Header End -->
