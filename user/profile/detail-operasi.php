<?php
require_once '../../koneksi.php';

$id_user = $_COOKIE['id'];
$nama_user = $_COOKIE['nama'];

$id_pesanan = "";
if (isset($_GET)) {
	$id_pesanan = $_GET['id_pesanan'];

	$queryPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_operasi WHERE id_pesanan_operasi='$id_pesanan' AND ket='0' ");
	$dataPenitipan = mysqli_fetch_array($queryPenitipan);

	$id_pesanan_operasi = $dataPenitipan['id_pesanan_operasi'];
	$id_pemesanan = $dataPenitipan['id_pemesanan'];
	$id_toko = $dataPenitipan['id_toko'];
	$kode_unik = $dataPenitipan['kode_unik'];
	$id_user = $dataPenitipan['id_user'];
	$nama_hewan = $dataPenitipan['nama_hewan'];
	$id_operasi = $dataPenitipan['id_operasi'];
	$metode_pembayaran = $dataPenitipan['metode_pembayaran'];
	if ($metode_pembayaran == "bayar_online") {
		$metode_pembayaran = "Bayar Online";
	} else if ($metode_pembayaran == "bayar_ditempat") {
		$metode_pembayaran = "Bayar Ditempat";
	}
	$pesan = $dataPenitipan['pesan'];
	$ket = $dataPenitipan['ket'];
	$waktu = $dataPenitipan['waktu'];

	// Toko
	$queryToko = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko' ");
	$dataToko = mysqli_fetch_array($queryToko);

	$nama_toko = $dataToko['nama_toko'];
	$nomor_hp = $dataToko['nomor_hp'];
	$alamat = $dataToko['alamat'];
	$nama_pemilik = $dataToko['nama_pemilik'];
	$gambar_toko = $dataToko['gambar_toko'];
	$link_instagram = $dataToko['link_instagram'];
	$hari_operasional = $dataToko['hari_operasional'];
	$jam_operasional = $dataToko['jam_operasional'];
	$tanggal = $dataToko['tanggal'];

	// Operasi
	$queryOperasi = mysqli_query($koneksi, "SELECT * FROM operasi WHERE id_operasi='$id_operasi' ");
	$dataOperasi = mysqli_fetch_array($queryOperasi);

	$id_jenis_hewan = $dataOperasi['jenis_hewan'];
	$jenis_operasi = $dataOperasi['jenis_operasi'];
	$harga = $dataOperasi['harga'];

	// Jenis Hewan
	$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan' ");
	$dataJenisHewan = mysqli_fetch_array($queryJenisHewan);

	$jenis_hewan = $dataJenisHewan['jenis_hewan'];
}



session_start();

$checkLogin = false;
$checkToko = false;

// Login
if (isset($_COOKIE['id'])) {
	$checkLogin = true;
} else {
	$checkLogin = false;
}

$nama_toko_session = "";
// Session
if (isset($_SESSION['id_toko'])) {
	$checkToko = true;

	$id_toko_session = $_SESSION['id_toko'];
	$query = mysqli_query($koneksi, "SELECT * FROM `toko` WHERE id_toko='$id_toko_session' ");
	$data = mysqli_fetch_array($query);

	$nama_toko_session = $data['nama_toko'];
} else {
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
	<title>United Pets</title>
	<!--[if lt IE 9]>
      <script src="js/respond.js"></script>
  <![endif]-->
	<!-- Font files -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
	<link href="../../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
	<link href="../../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
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
						if (!$checkLogin) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="../">Beranda
								</a>
							</li>
						<?php
						}
						?>
						<?php
						if ($checkToko) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="../toko/detail-toko.php?toko=<?= $id_toko ?>"><?= $nama_toko_session ?>
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
						if ($checkLogin) {

						?>

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
						} else {
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
							</a>
						</li>
					</ul>
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
					<div class="col-lg-12 mt-2">
						<table border="0" width="100%" class="bg-light rounded">
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light">
										<tr>
											<td width="90">
												<img src="../../img/logo.png" width="70" class="ml-2">
											</td>
											<td>
												<a href="../toko/detail-toko.php?toko=<?= $id_toko ?>" class="text-dark"><b><?= $nama_toko ?></b></a>
											</td>
											<td align="right">
												<label class="text-danger mr-2"><b></b></label>
											</td>
										</tr>
									</table>
									<hr style="margin-top: 1px; margin-bottom: 5px;">
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" cellpadding="10">
										<tr>
											<td width="8">
												<i class="flaticon-dog-with-first-aid-kit-bag text-dark h1"></i>
											</td>
											<td>
												<label class="text-dark"><b>Operasi</b></label>
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
												<label class="text-dark ml-2"><b>Nama Hewan</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b><?= $nama_hewan ?></b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Jenis Hewan</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b><?= $jenis_hewan ?></b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Jenis Operasi</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b><?= $jenis_operasi ?></b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Metode Pembayaran</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b><?= $metode_pembayaran ?> </b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Pesan</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b><?= $pesan ?> </b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Tanggal Pesanan</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b><?= $tanggal ?> </b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>Total Harga</b></label>
											</td>
											<td align="right">
												<label class="text-dark mr-2"><b>Rp. <?= $harga ?></b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
					<div class="col-lg-12 mt-2">
						<table border="0" width="100%" class="bg-light rounded">
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light">
										<tr>
											<td>
												<label class="text-dark ml-2"><b>No. Layanan</b></label>
											</td>
											<td align="right">
												<label class="text-success mr-2"><b>Operasi - <?= $id_pesanan ?></b></label>
											</td>
										</tr>
									</table>
									<hr style="margin-top: 1px; margin-bottom: 5px;">
								</td>
							</tr>
							<tr>
								<td>
									<?php
									$queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id_pilihan_pesanan='3' AND id_pesanan='$id_pesanan' ORDER BY waktu ASC ");
									while ($row = mysqli_fetch_assoc($queryDokumentasi)) {
										$id_dokumentasi = $row['id_dokumentasi'];
										$keterangan = $row['keterangan'];
										$gambar = $row['gambar'];
										$waktu = $row['waktu'];

									?>
										<table border="0" width="100%" class="bg-light">
											<tr>
												<td width="100">
													<label class="text-dark ml-2"><?= $waktu ?></label>
												</td>
												<td>
													<label class="text-success"><?= $keterangan ?> <br> <b class="text-primary">
															<a href="" data-toggle="modal" data-target="#exampleModal<?= $id_dokumentasi ?>">Lihat Dokumentasi</a>
														</b></label>
												</td>
											</tr>
										</table>
										<hr style="margin-top: 1px; margin-bottom: 5px; border: 1px dashed;">

										<div class="modal fade" id="exampleModal<?= $id_dokumentasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel"><?= $keterangan ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<img class="card-img-top img-product" src="../../gambar/dokumentasi/<?= $gambar ?>" alt="">
													</div>
												</div>
											</div>
										</div>
									<?php
									}
									?>

									<!-- <table border="0" width="100%" class="bg-light">
  										<tr>
  											<td width="80">
  												<label class="text-dark ml-2">27 Jul 14:23</label>
  											</td>
  											<td>
  												<label class="text-success">kucing anda sedang dimandikan <br> <b class="text-primary">Lihat Dokumentasi</b></label>
  											</td>
  										</tr>
  									</table><hr style="margin-top: 1px; margin-bottom: 5px; border: 1px dashed;">
  									<table border="0" width="100%" class="bg-light">
  										<tr>
  											<td width="80">
  												<label class="ml-2">27 Jul 14:23</label>
  											</td>
  											<td>
  												<label class="">kucing anda sedang dimandikan <br> <b class="text-primary">Lihat Dokumentasi</b></label>
  											</td>
  										</tr>
  									</table><hr style="margin-top: 1px; margin-bottom: 5px; border: 1px dashed;">
  									<table border="0" width="100%" class="bg-light">
  										<tr>
  											<td width="80">
  												<label class="ml-2">27 Jul 14:23</label>
  											</td>
  											<td>
  												<label class="">kucing anda sedang dimandikan <br> <b class="text-primary">Lihat Dokumentasi</b></label>
  											</td>
  										</tr>
  									</table><hr style="margin-top: 1px; margin-bottom: 5px; border: 1px dashed;"> -->
								</td>
							</tr>
						</table>
					</div>
				</div>
				<!-- row -->
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