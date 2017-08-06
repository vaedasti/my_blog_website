<?php
	if ($_SERVER['PHP_SELF'] == "/admin_panel/material-dashboard/main/php/head.php") {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			require_once "../../../../php/database.php";
			if (isset($_POST['yayinla'])) {
				sorgu_calistir("UPDATE gonderiler SET gosterim=1 WHERE id=".$_POST['yayinla'], 4);
			} else if (isset($_POST['yayinKaldir'])) {
				sorgu_calistir("UPDATE gonderiler SET gosterim=0 WHERE id=".$_POST['yayinKaldir'], 4);
			} else if (isset($_POST['yayinSil'])) {
				sorgu_calistir("DELETE FROM gonderiler WHERE id=".$_POST['yayinSil'], 4);
			} else if (isset($_POST['yorumSil'])) {
				sorgu_calistir("DELETE FROM yorumlar WHERE id=".$_POST['yorumSil'], 4);
			} else if (isset($_POST['yorumOnayla'])) {
				sorgu_calistir("UPDATE yorumlar SET onay=1 WHERE id=".$_POST['yorumOnayla'], 4);
			} else if (isset($_POST['yorumOnayKaldir'])) {
				sorgu_calistir("UPDATE yorumlar SET onay=0 WHERE id=".$_POST['yorumOnayKaldir'], 4);
			} else if (isset($_POST['kullaniciSil'])) {
				sorgu_calistir("DELETE FROM kullanicilar WHERE id=".$_POST['kullaniciSil'], 4);
			} else if (isset($_POST['kullaniciYonetici'])) {
				sorgu_calistir("UPDATE kullanicilar SET tip=1 WHERE id=".$_POST['kullaniciYonetici'], 4);
			} else if (isset($_POST['kategori'])) {
				sorgu_calistir("INSERT INTO kategoriler(ad) VALUES(?)", 3, array($_POST['kategori']));
				print sorgu_calistir("SELECT id FROM kategoriler WHERE ad='".$_POST['kategori']."'",1)['id'];
			}
		}
		die();
	}
	require_once "../../../php/database.php";
	if ($_SERVER['PHP_SELF'] == "/admin_panel/material-dashboard/main/postAdd.php") {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST['baslik'])) {
				$bilgi = array(':baslik' => htmlspecialchars(trim($_POST['baslik'])),
											':kategori' => $_POST['kategori'],
											':etiket' => htmlspecialchars(trim($_POST['etiket'])),
											':icerik' => $_POST['icerik'],
											);
				if (isset($_POST['gonderi'])) {
					$bilgi[':id'] = $_POST['gonderi'];
					sorgu_calistir("UPDATE gonderiler SET baslik=:baslik, icerik=:icerik, etiketler=:etiket, kategori=:kategori WHERE id=:id", 3, $bilgi);
				}
				else {
					$bilgi[':yazar'] = $_SESSION['id'];
					sorgu_calistir("INSERT INTO gonderiler(baslik, icerik, etiketler, yazar, kategori) VALUES(:baslik,:icerik,:etiket,:yazar,:kategori)", 3, $bilgi);
				}
				yonlendir("posts.php");
				//$("")[].click()
			}
		}
	}
	if (!isset($_SESSION['kAd']) OR $_SESSION['tip'] != 1)
		yonlendir("../../../login.php");
?>
<html lang="en" class="perfect-scrollbar-off">
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

		<!--  Material Dashboard CSS-->
		<link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

		<!--  CSS for Demo Purpose, don't include it in your project     -->
		<link href="../assets/css/demo.css" rel="stylesheet" />

		<!--     Fonts and icons
		http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css-->
		<link href="../../../css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	</head>
	<body style="overflow-y: hidden;">
		<div class="wrapper">
			<?php include "sidebar.php"; ?>
			<div class="main-panel">
