<?php include_once "head.php"; ?>
	<body>
		<!-- Header
		================================================== -->
		<?php $website_bilgileri = sorgu_calistir("SELECT * FROM website"); ?>
		<header id="top">
			<div class="row">
				<div class="header-content twelve columns">
					<h1 id="logo-text"><a href="index.php" title=""><?php echo $website_bilgileri[0]["site_basligi"]; ?></a></h1>
					<p id="intro"><?php echo $website_bilgileri[0]["site_slogani"]; ?></p>
				</div>
			</div>
			<nav id="nav-wrap">
				<a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
				<a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
				<div class="row">
					<ul id="nav" class="nav">
						<li class="current"><a href="index.php">Home</a></li>
						<li class="has-children"><a href="#">Dropdown</a>
							<ul>
								<li><a href="#">Submenu 01</a></li>
								<li><a href="#">Submenu 02</a></li>
								<li><a href="#">Submenu 03</a></li>
							</ul>
						</li>
						<li><a href="demo.php">Demo</a></li>
						<li><a href="archives.php">Archives</a></li>
						<li class="has-children"><a href="single.php">Blog</a>
							<ul>
							<li><a href="blog.php">Blog Entries</a></li>
							<li><a href="single.php">Single Blog</a></li>
							</ul>
						</li>
						<li><a href="page.php">Page</a></li>
					</ul> <!-- end #nav -->
				</div>
			</nav> <!-- end #nav-wrap -->
		</header> <!-- Header End -->
