<?php
require_once '../koneksi.php';
session_start();

$checkLogin = false;
$checkToko = false;

if (isset($_COOKIE['id'])) {
	$checkLogin = true;
	$id_dokter = $_COOKIE['id'];

	$queryDokter = mysqli_query($koneksi, "SELECT * FROM `karyawan_dokter` WHERE id_karyawan='$id_dokter' ");
	$dataDokter = mysqli_fetch_array($queryDokter);
	$id_toko = $dataDokter['id_toko'];

	$queryToko = mysqli_query($koneksi, "SELECT * FROM `toko` WHERE id_toko='$id_toko' ");
	$data = mysqli_fetch_array($queryToko);

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
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description" content="Responsive Bootstrap Dashboards">
	<meta name="author" content="Bootstrap Gallery">
	<link rel="shortcut icon" href="img/favicon.ico" />

	<!-- Title -->
	<title>Dokter</title>


	<!-- *************
			************ Common Css Files *************
			************ -->
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="fonts/style.css">

	<!-- Main css -->
	<link rel="stylesheet" href="css/main.min.css">


	<!-- *************
			************ Vendor Css Files *************
		************ -->

</head>

<body>

	<!-- Loading starts -->
	
	<!-- Loading ends -->

	<!-- Header start -->
	<header class="header">
		<div class="container-fluid">

			<!-- Row start -->
			<div class="row gutters">
				<div class="col-sm-4 col-4">
					<a href="index.html" class="logo">E <span>PETSHOP</span></a>
				</div>
			</div>
			<!-- Row end -->

		</div>
	</header>
	<!-- Header end -->

	<!-- *************
			************ Header section end *************
		************* -->


	<div class="container-fluid">


		<!-- Navigation start -->
		<nav class="navbar navbar-expand-lg custom-navbar">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar" aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</button>
			<div class="collapse navbar-collapse" id="royalHospitalsNavbar">
				<ul class="navbar-nav">
					<!-- <li class="nav-item">
						<a class="nav-link" href="index.html">
							<i class="icon-devices_other nav-icon"></i>
							Dashboard
						</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link active-page" href="toko.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Toko</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="karyawan.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Karyawan</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="jenis-hewan.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Jenis Hewan</p>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Jenis Layanan</p>
						</a>
						<ul class="dropdown-menu" aria-labelledby="doctoRs">
							<li>
								<a class="dropdown-item" href="layanan-produk.php">Produk</a>
							</li>
							<li>
								<a class="dropdown-item" href="layanan-penitipan.php">Penitipan</a>
							</li>
							<li>
								<a class="dropdown-item" href="layanan-perawatan.php">Perawatan</a>
							</li>
							<li>
								<a class="dropdown-item" href="layanan-operasi.php">Operasi</a>
							</li>
							<li>
								<a class="dropdown-item" href="layanan-vaksin.php">Vaksin</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Pesanan Layanan</p>
						</a>
						<ul class="dropdown-menu" aria-labelledby="doctoRs">
							<li>
								<a class="dropdown-item" href="pesanan-produk.php">Produk</a>
							</li>
							<li>
								<a class="dropdown-item" href="pesanan-penitipan.php">Penitipan</a>
							</li>
							<li>
								<a class="dropdown-item" href="pesanan-perawatan.php">Perawatan</a>
							</li>
							<li>
								<a class="dropdown-item" href="pesanan-operasi.php">Operasi</a>
							</li>
							<li>
								<a class="dropdown-item" href="pesanan-vaksin.php">Vaksin</a>
							</li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Riwayat Pesanan</p>
						</a>
						<ul class="dropdown-menu" aria-labelledby="doctoRs">
							<li>
								<a class="dropdown-item" href="riwayat-pesanan-produk.php">Produk</a>
							</li>
							<li>
								<a class="dropdown-item" href="riwayat-pesanan-penitipan.php">Penitipan</a>
							</li>
							<li>
								<a class="dropdown-item" href="riwayat-pesanan-perawatan.php">Perawatan</a>
							</li>
							<li>
								<a class="dropdown-item" href="riwayat-pesanan-operasi.php">Operasi</a>
							</li>
							<li>
								<a class="dropdown-item" href="riwayat-pesanan-vaksin.php">Vaksin</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tranksaksi.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Tranksaksi</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../?logout">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Logout</p>
						</a>
					</li>

				</ul>
			</div>
		</nav>
		<!-- Navigation end -->


		<!-- *************
				************ Main container start *************
			************* -->
		<div class="main-container">

			<!-- Page header end -->

			<!-- Content wrapper start -->
			<div class="content-wrapper">

				<!-- <div class="row gutters">
					<div class="col-sm-12 col-12">
						<h4>RINCIAN TOKO</h4>

						<div class="mb-3">
							<label for="nama_toko" class="form-label">Nama Toko</label>
							<input type="text" class="form-control" id="nama_toko">
						</div>
						<div class="mb-3">
							<label for="nomor_hp" class="form-label">Nomor HP</label>
							<input type="text" class="form-control" id="nomor_hp">
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" class="form-control" id="alamat">
						</div>
						<div class="mb-3">
							<label for="nama_pemilik" class="form-label">Nama Pemilik</label>
							<input type="text" class="form-control" id="nama_pemilik">
						</div>
						<div class="mb-3">
							<label for="nama_toko" class="form-label">Gambar Toko</label>
							<button type="text" class="form-control" id="nama_toko">klik untuk melihat gambar</button>
						</div>
						<div class="mb-3">
							<label for="link_instagram" class="form-label">Link Instagram</label>
							<input type="text" class="form-control" id="link_instagram">
						</div>
						<div class="mb-3">
							<label for="hari_operasional" class="form-label">Hari Operasional</label>
							<input type="text" class="form-control" id="hari_operasional">
						</div>
						<button type="button" class="btn btn-primary form-control">Edit</button>
					</div>
				</div> -->

				<div class="row gutters">
					<div class="col-lg-6 col-sm-12 col-12 mb-4">
						<h4>GAMBAR TOKO</h4>
						<img src="../gambar/toko/<?=$gambar_toko?>" class="img-fluid mt-4" alt="">
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<h4>RINCIAN TOKO</h4>

						<div class="mb-3 mt-4">
							<label for="nama_toko" class="form-label">Nama Toko</label>
							<p type="text" value="" class="form-control" id="nama_toko"><?= $nama_toko ?></p>
						</div>
						<div class="mb-3">
							<label for="nomor_hp" class="form-label">Nomor HP</label>
							<p class="form-control" id="nomor_hp"><?= $nomor_hp ?></p>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<p class="form-control" id="alamat"><?= $alamat ?></p>
						</div>
						<div class="mb-3">
							<label for="nama_pemilik" class="form-label">Nama Pemilik</label>
							<p class="form-control" id="nama_pemilik"><?= $nama_pemilik ?></p>
						</div>
						<div class="mb-3">
							<label for="link_instagram" class="form-label">Link Instagram</label>
							<p class="form-control" id="link_instagram"><?= $link_instagram ?></p>
						</div>
						<div class="mb-3">
							<label for="jam_operasional" class="form-label">Hari Operasional</label>
							<p class="form-control" id="jam_operasional"><?= $hari_operasional ?></p>
						</div>
						<div class="mb-3">
							<label for="hari_operasional" class="form-label">Jam Operasional</label>
							<p class="form-control" id="hari_operasional"><?= $jam_operasional ?></p>
						</div>
						<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#editData">Edit</button>

						<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="editDataTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<form action="toko-post.php" method="post" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="editDataTitle">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<input type="text" class="form-control" id="id_toko" name="id_toko" value="<?= $id_toko ?>" hidden>
											<div class="mb-3">
												<label for="nama_toko" class="form-label">Nama Toko</label>
												<input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?= $nama_toko ?>" required>
											</div>
											<div class="mb-3">
												<label for="nomor_hp" class="form-label">Nomor Hp</label>
												<input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?= $nomor_hp ?>" required>
											</div>
											<div class="mb-3">
												<label for="alamat" class="form-label">Alamat</label>
												<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required>
											</div>
											<div class="mb-3">
												<label for="nama_pemilik" class="form-label">Nama Pemilik</label>
												<input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="<?= $nama_pemilik ?>" required>
											</div>
											<div class="mb-3">
												<label for="gambar_toko" class="form-label">Gambar Toko</label>
												<input type="file" class="form-control" id="gambar_toko" name="gambar_toko">
											</div>
											<div class="mb-3">
												<label for="link_instagram" class="form-label">Link Instagram</label>
												<input type="text" class="form-control" id="link_instagram" name="link_instagram" value="<?= $link_instagram ?>" required>
											</div>
											<div class="mb-3">
												<label for="hari_operasional" class="form-label">Hari Operasional</label>
												<input type="text" class="form-control" id="hari_operasional" name="hari_operasional" value="<?= $hari_operasional ?>" required>
											</div>
											<div class="mb-3">
												<label for="jam_operasional" class="form-label">Jam Operasional</label>
												<input type="text" class="form-control" id="jam_operasional" name="jam_operasional" value="<?= $jam_operasional ?>" required>
											</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" id="edit_toko" name="edit_toko" class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>


		</div>
		<!-- *************
				************ Main container end *************
			************* -->

		<footer class="main-footer">© Bootstrap Gallery 2023</footer>

	</div>

	<!-- *************
			************ Required JavaScript Files *************
		************* -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/moment.js"></script>


	<!-- *************
			************ Vendor Js Files *************
		************* -->

	<!-- Apex Charts -->
	<script src="vendor/apex/apexcharts.min.js"></script>
	<script src="vendor/apex/examples/mixed/hospital-line-column-graph.js"></script>
	<script src="vendor/apex/examples/mixed/hospital-line-area-graph.js"></script>
	<script src="vendor/apex/examples/bar/hospital-patients-by-age.js"></script>

	<!-- Rating JS -->
	<script src="vendor/rating/raty.js"></script>
	<script src="vendor/rating/raty-custom.js"></script>

	<!-- Main Js Required -->
	<script src="js/main.js"></script>

</body>

</html>