<?php
	require_once "../../../php/database.php";
	if (!isset($_SESSION['kAd']) OR $_SESSION['tip'] != 1)
		yonlendir("../../../");
	if ($_SERVER['PHP_SELF'] == "/my_blog_website/admin_panel/material-dashboard/main/postAdd.php") {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$bilgi = array('baslik' => htmlspecialchars(trim($_POST['baslik'])),
										'kategori' => $_POST['kategori'],
										'etiket' => htmlspecialchars(trim($_POST['etiket'])),
										'icerik' => $_POST['icerik'],
										);
			if (isset($_POST['gonderi']))
				sorgu_calistir("UPDATE gonderiler SET baslik=?, icerik=?, etiketler=?, kategori=?) WHERE id=?", 3, array($bilgi['baslik'], $bilgi['icerik'], $bilgi['etiket'], $bilgi['kategori'], $_POST['gonderi']));
			else
				sorgu_calistir("INSERT INTO gonderiler(baslik, icerik, etiketler, yazar, kategori) VALUES(?,?,?,?,?)", 3, array($bilgi['baslik'],$bilgi['icerik'],$bilgi['etiket'],$_SESSION['id'],$bilgi['kategori']));
			yonlendir("posts.php");
			//$("")[].click()
		}
	}
?>
<html lang="en"> <!-- class="perfect-scrollbar-on" -->
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
		<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Yönetim Paneli</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS     -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

		<!--  Material Dashboard CSS    -->
		<link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="../assets/css/demo.css" rel="stylesheet" />

		<!--     Fonts and icons
		http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css     -->
		<link href="../../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="wrapper">
			<?php include "sidebar.php"; ?>
			<div class="main-panel">
