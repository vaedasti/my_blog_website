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
						<?php /*
							switch ($_SERVER['PHP_SELF']) {
								case '/my_blog_website/index.php':
									# code...
									break;
								default:
									# code...
									break;
							}*/
						?>
						<li class="current"><a href="<?php $_SERVER['PHP_SELF']; ?>">Ana Sayfa</a></li>
						<!--<li class="has-children"><a href="#">Dropdown</a>
							<ul>
								<li><a href="#">Submenu 01</a></li>
								<li><a href="#">Submenu 02</a></li>
								<li><a href="#">Submenu 03</a></li>
							</ul>
						</li>-->
						<li><a href="demo.php">Demo</a></li>
						<li><a href="archives.php">Arşiv</a></li>
						<li class="has-children"><a href="single.php">Blog</a>
							<ul>
							<li><a href="<?php $_SERVER['PHP_SELF']; ?>">Blog Yazıları</a></li>
							<li><a href="single.php">Single Blog</a></li>
							</ul>
						</li>
						<li><a href="page.php">Page</a></li>
					</ul> <!-- end #nav -->
				</div>
			</nav> <!-- end #nav-wrap -->
		</header> <!-- Header End -->
