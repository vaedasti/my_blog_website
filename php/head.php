<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->

  <head>
    <!--- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
		<?php $website_bilgileri = sorgu_calistir("SELECT * FROM website", false); ?>
    <title><?php echo $website_bilgileri['site_basligi']; ?></title>
    <meta name="description" content="<?php echo $website_bilgileri['site_bilgisi'] ?>">
    <meta name="author" content="Velat Vurgun">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/media-queries.css">

    <!-- Script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.png" >

    <!-- Bootstrap
    ================================================== -->
  </head>
