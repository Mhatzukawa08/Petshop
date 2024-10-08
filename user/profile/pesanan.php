<?php
	require_once '../../koneksi.php';
	session_start();

	$id_user = $_COOKIE['id'];
	$nama_user = $_COOKIE['nama'];

	$checkLogin = false;
	$checkToko = false;
 
	// Login
	include '../notifikasi.php';
 
	$nama_toko = "";
	// Session
	if(isset($_SESSION['id_toko'])){
	$checkToko = true;
 
	$id_toko = $_SESSION['id_toko'];
	$query = mysqli_query($koneksi, "SELECT * FROM `toko` WHERE id_toko='$id_toko' ");
	$data = mysqli_fetch_array($query);
 
	$id_toko = $data['id_toko'];
	$nama_toko = $data['nama_toko'];
	$nomor_hp = $data['nomor_hp'];
	$alamat = $data['alamat'];
	$nama_pemilik = $data['nama_pemilik'];
	$gambar_toko = $data['gambar_toko'];
	$link_instagram = $data['link_instagram'];
	$hari_operasional = $data['hari_operasional'];
	$jam_operasional = $data['jam_operasional'];
	$tanggal = $data['tanggal'];
 
	} else{
	   $checkToko = false;
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- page title -->
	<title>Pesanan</title>
	<!--[if lt IE 9]>
      <script src="js/respond.js"></script>
  <![endif]-->
	<!-- Font files -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
	<link href="../../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
	<link href="../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
	<!-- Fav icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="../../apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="../../apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="../../apple-icon-114x114.png">
	<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
	<!-- Bootstrap core CSS -->
	<link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- style CSS -->
	<link href="../../css/style.css" rel="stylesheet">
	<!-- plugins CSS -->
	<link href="../../css/plugins.css" rel="stylesheet">
	<!-- Colors CSS -->
	<link href="../../styles/maincolors.css" rel="stylesheet">
</head>
<!-- ==== body starts ==== -->

<body id="top">
	<!-- Preloader  -->
	<div id="preloader">
		<div class="container h-100">
			<div class="row h-100 justify-content-center align-items-center">
				<div class="preloader-logo">
					<!--logo -->
					<img src="img/logo.png" alt="" class="img-fluid">
					<!--preloader circle -->
					<div class="lds-ring">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
				<!--/preloader logo -->
			</div>
			<!--/row -->
		</div>
		<!--/container -->
	</div>
	<!--/Preloader ends -->
	<nav id="main-nav" class="navbar-expand-xl fixed-top">
		<!-- Start Top Bar -->
		<div class="container-fluid top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="social-list float-right list-inline">
							<li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="list-inline-item"><a title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
						</ul>
						<!-- /End Social Links -->
					</div>
					<!-- col-md-12 -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- End Top bar -->
		<!-- Navbar Starts -->
		<div class="navbar container-fluid">
			<div class="container ">
				<!-- logo -->
				<a class="nav-brand" href="index.php">
					<img src="../../img/logo.png" alt="" class="img-fluid">
				</a>
				<i class="fa fa-shopping-cart text-dark media"></i>
				<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
						<?php 
							if(!$checkLogin){
						?>
							<li class="nav-item">
							<a class="nav-link" href="../">Beranda
							</a>
							</li>
						<?php
							}
						?>
						<?php 
							if($checkToko){
						?>
							<li class="nav-item">
								<a class="nav-link" href="../toko/detail-toko.php?toko=<?=$id_toko?>"><?=$nama_toko?>
							</a>
							</li>
						<?php
							}
						?>
						<!-- menu item -->
						<li class="nav-item">
							<a class="nav-link" href="../toko/">Toko
							</a>
						</li>
						<!-- menu item -->
						<?php 
							if($checkLogin){

						?>
							<!-- <li class="nav-item" name="nav-pelayanan">
							<a class="nav-link" href="../penitipan/?toko=<?=$id_toko?>">Pelayanan
							</a>
							</li> -->

							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Pelayanan
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="../penitipan/">Penitipan</a></li>
								<li><a class="dropdown-item" href="../perawatan/">Perawatan</a></li>
								<li><a class="dropdown-item" href="../operasi/">Operasi</a></li>
								<li><a class="dropdown-item" href="../vaksin/">Vaksin</a></li>
							</ul>
							</li>
						<?php
							} else{
							?>
							<li class="nav-item" name="nav-pelayanan">
								<a class="nav-link" href="../../login/">Pelayanan
								</a>
							</li>
							<?php
							}
						?>
						<!-- menu item -->
						<li class="nav-item">
							<a class="nav-link" href="../produk/">Produk
							</a>
						</li>
						<!-- menu item -->
						<li class="nav-item active">
							<a class="nav-link" href="../profile/">Profil
								<span style="color: white;" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
									<?= $notifikasi ?>
								</span>
							</a>
						</li>
  					</ul>
					<!--/ul -->
				</div>
				<!--collapse -->
			</div>
			<!-- /container -->
		</div>
		<!-- sub menu -->
		<div class="bottom-fixed shadow-sm text-dark">
			<table width="100%" border="0" cellpadding="5" class="menu">
				<tr>
					<td align="center" width="20%" class="br-icon">
						<a href="../../">
							<i class="flaticon-people-1 icon_br"></i>
						</a>
						<p class="ket-menu"><b>Beranda</b></p>
					</td>
					<td align="center" width="20%">
						<a href="../../services.php">
							<i class="flaticon-dog-with-first-aid-kit-bag icon_br"></i>
						</a>
						<p class="ket-menu"><b>Pelayanan</b></p>
					</td>
					<td align="center" width="20%">
						<a href="../../toko.php">
							<i class="flaticon-dog-2 icon_br"></i>
						</a>
						<p class="ket-menu"><b>Toko</b></p>
					</td>
					<td align="center" width="20%">
						<a href="../../produk.php">
							<i class="flaticon-food icon_br"></i>
						</a>
						<p class="ket-menu"><b>Produk</b></p>
					</td>
					<td align="center" width="20%">
						<a href="profil.php">
							<i class="flaticon-placeholder icon_br active1"></i>
						</a>
						<p class="ket-menu active1"><b>Profil</b></p>
					</td>
				</tr>
			</table>
		</div>
		<!-- /navbar -->
	</nav>
	<div class="page container">
		<div class="row layanan">
			<!-- page  starts -->
			<div class="col-lg-12">
				<div class="row">
					<!-- event 1 -->
					
					<?php
					$query = mysqli_query($koneksi, "SELECT * FROM pesanan_produk WHERE id_user='$id_user' AND ket='1' AND selesai='0' AND id_pemesanan>0 
					GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC");
					while ($row = mysqli_fetch_assoc($query)) {
						$id_pemesanan = $row['id_pemesanan'];
						$id_toko = $row['id_toko'];

						$queryToko = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko' ");
						$data = mysqli_fetch_array($queryToko);
						$nama_toko = $data['nama_toko'];

						$jumlah_jenis_produk = 0;
						$jumlah_produk = 0;
						$total_harga = 0;
						$queryPesanan = mysqli_query($koneksi, "SELECT * FROM pesanan_produk WHERE id_pemesanan='$id_pemesanan' ");
						while ($rowPesanan = mysqli_fetch_assoc($queryPesanan)) {
							$jumlah_jenis_produk ++;
							$jumlah_produk += $rowPesanan['jumlah'];
							$total_harga += $rowPesanan['total_harga'];
						}

					?>
						<div class="col-lg-4 mt-2">
							<table border="0" width="100%" class="bg-light rounded">
								<tr>
									<td align="center">
										<table border="0" width="95%" class="bg-light">
											<tr>
												<td>
													<label class="text-dark"><b><?=$nama_toko?></b></label>
												</td>
											</tr>
										</table>
										<hr style="margin-top: 1px; margin-bottom: 5px;">
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" width="100%" class="bg-light">
											<tr>
												<td>
													<label class="text-dark ml-2"><b>Jenis Produk</b></label>
												</td>
												<td align="right" width="103">
													<label class="text-dark mr-2"><b><?=$jumlah_jenis_produk?> Jenis</b></label>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" width="100%" class="bg-light" style="margin-top: -12px;">
											<tr>
												<td>
													<label class="text-dark ml-2"><b>Jumlah Produk</b></label>
												</td>
												<td align="right" width="103">
													<label class="text-dark mr-2"><b><?=$jumlah_produk?> Produk</b></label>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr">
									<td>
										<table border="0" width="100%" class="bg-light" style="margin-top: -10px;">
											<tr>
												<td>
													<label class="text-dark ml-2"><b>Total Bayar </b></label>
												</td>
												<td align="right" width="103">
													<label class="text-danger mr-2"><b>Rp. <?=$total_harga?></b></label>
												</td>
											</tr>
										</table>
									</td>
									</tr>
									<tr>
										<td>
											<hr style="margin-top: 10px; margin-bottom: 1px;">
											<a href="detail-pesanan.php?toko=<?=$id_toko?>&pesanan=<?=$id_pemesanan?>">
												<table border="0" width="100%" class="">
													<tr class="bg-success rounded">
														<td align="center" style="cursor: pointer;">
															<label class="text-white" style="cursor: pointer;"><b>Tampilkan Pesanan</b></label>
														</td>
													</tr>
												</table>
												<hr style="margin-top: 1px; margin-bottom: 5px;">
											</a>
										</td>
									</tr>
							</table>
						</div>	
					<?php


					}

					// $queryToko = mysqli_query($koneksi, "SELECT * FROM toko ");
					// while ($row = mysqli_fetch_assoc($queryToko)) {
					// 	$id_toko = $row['id_toko'];
					// 	$nama_toko = $row['nama_toko'];
					// 	$nomor_hp = $row['nomor_hp'];
					// 	$alamat = $row['alamat'];
					// 	$nama_pemilik = $row['nama_pemilik'];
					// 	$gambar_toko = $row['gambar_toko'];
					// 	$link_instagram = $row['link_instagram'];
					// 	$hari_operasional = $row['hari_operasional'];
					// 	$jam_operasional = $row['jam_operasional'];
					// 	$tanggal = $row['tanggal'];
						
					// 	$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM pesanan_produk WHERE id_user='$id_user' 
					// 		AND id_toko='$id_toko'  AND ket='0' ");

					// 	$jumlah_jenis_produk = 0;
					// 	$jumlah_produk = 0;
					// 	$total_harga = 0;
					// 	while ($rowData = mysqli_fetch_assoc($queryPesananProduk)) {
					// 		$jumlah_jenis_produk++;
					// 		$jumlah_produk+=$rowData['jumlah'];
					// 		$total_harga+=$rowData['total_harga'];
					// 	}

					// 	$rowPesananProduk = mysqli_num_rows($queryPesananProduk);
					// 	$dataPesananProduk = mysqli_fetch_array($queryPesananProduk);
						

					// 	if($rowPesananProduk>0){

					?>

						<!-- <div class="col-lg-4 mt-2">
							<table border="0" width="100%" class="bg-light rounded">
								<tr>
									<td align="center">
										<table border="0" width="95%" class="bg-light">
											<tr>
												<td>
													<label class="text-dark"><b><?=$nama_toko?></b></label>
												</td>
											</tr>
										</table>
										<hr style="margin-top: 1px; margin-bottom: 5px;">
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" width="100%" class="bg-light">
											<tr>
												<td>
													<label class="text-dark ml-2"><b>Jenis Produk</b></label>
												</td>
												<td align="right" width="103">
													<label class="text-dark mr-2"><b><?=$jumlah_jenis_produk?> Jenis</b></label>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" width="100%" class="bg-light" style="margin-top: -12px;">
											<tr>
												<td>
													<label class="text-dark ml-2"><b>Jumlah Produk</b></label>
												</td>
												<td align="right" width="103">
													<label class="text-dark mr-2"><b><?=$jumlah_produk?> Produk</b></label>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr">
									<td>
										<table border="0" width="100%" class="bg-light" style="margin-top: -10px;">
											<tr>
												<td>
													<label class="text-dark ml-2"><b>Total Bayar </b></label>
												</td>
												<td align="right" width="103">
													<label class="text-danger mr-2"><b>Rp. <?=$total_harga?></b></label>
												</td>
											</tr>
										</table>
									</td>
									</tr>
									<tr>
										<td>
											<hr style="margin-top: 10px; margin-bottom: 1px;">
											<a href="detail-keranjang-belanja.php?toko=<?=$id_toko?>">
												<table border="0" width="100%" class="">
													<tr class="bg-success rounded">
														<td align="center" style="cursor: pointer;">
															<label class="text-white" style="cursor: pointer;"><b>Tampilkan Pesanan</b></label>
														</td>
													</tr>
												</table>
												<hr style="margin-top: 1px; margin-bottom: 5px;">
											</a>
										</td>
									</tr>
							</table>
						</div> -->

					<?php
					// 	}
					// }
					?>
					<!-- <div class="col-lg-4 mt-2">
						<table border="0" width="100%" class="bg-light rounded">
							<tr>
								<td align="center">
									<table border="0" width="95%" class="bg-light">
										<tr>
											<td>
												<label class="text-dark"><b>Simpel Shop</b></label>
											</td>
										</tr>
									</table>
									<hr style="margin-top: 1px; margin-bottom: 5px;">
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Jenis Produk</b></label>
											</td>
											<td align="right" width="103">
												<label class="text-dark mr-2"><b>3 Jenis</b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -10px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Jumlah Produk</b></label>
											</td>
											<td align="right" width="103">
												<label class="text-dark mr-2"><b>5 Produk</b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr">
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -10px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Total Bayar </b></label>
											</td>
											<td align="right" width="103">
												<label class="text-danger mr-2"><b>Rp. 100.000</b></label>
											</td>
										</tr>
									</table>
								</td>
								</tr>
								<tr>
									<td>
										<hr style="margin-top: 10px; margin-bottom: 1px;">
										<a href="detail-keranjang-belanja.php">
											<table border="0" width="100%" class="">
												<tr class="bg-success rounded">
													<td align="center" style="cursor: pointer;">
														<label class="text-white" style="cursor: pointer;"><b>Tampilkan Pesanan</b></label>
													</td>
												</tr>
											</table>
											<hr style="margin-top: 1px; margin-bottom: 5px;">
										</a>
									</td>
								</tr>
						</table>
					</div> -->
					<!--/widget2 -->
				</div>
				<!-- /col-md -->
			</div>
			<!-- /col-lg-12 -->
		</div>
		<!-- /row -->
	</div>
	<!-- /row -->
	</div>

	<footer class="bg-light pattern1 m-bottom no-img">
		<div class="container">
			<!-- <div class="row">
				<div class="credits col-sm-12">
					<p>Copyright 2022 / Designed by <a href="http://www.ingridkuhn.com">Simpel Aja Studio</a></p>
				</div>
			</div> -->
			<!--/col-lg-12-->
		</div>
		<!--/ container -->
		<!-- Go To Top Link -->
		<div class="page-scroll hidden-sm hidden-xs">
			<!-- <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a> -->
		</div>
		<!--/page-scroll-->
	</footer>
	<!--/ footer-->
	<!-- Bootstrap core & Jquery -->
	<script src="../../vendor/jquery/jquery.min.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Custom Js -->
	<script src="../../js/custom.js"></script>
	<script src="../../js/plugins.js"></script>
	<!-- Prefix free -->
	<script src="../../js/prefixfree.min.js"></script>
</body>

</html>