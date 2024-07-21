<?php
require_once '../koneksi.php';
session_start();

$checkLogin = false;
$checkToko = false;

$id_toko = "";

if (isset($_COOKIE['id'])) {
	$checkLogin = true;
	$id_karyawan = $_COOKIE['id'];

	$queryKaryawan = mysqli_query($koneksi, "SELECT * FROM `karyawan_dokter` WHERE id_karyawan='$id_karyawan' ");
	$dataKaryawan = mysqli_fetch_array($queryKaryawan);
	$id_toko = $dataKaryawan['id_toko'];

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
}

function rupiah($angka)
{
	$hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
	return $hasil_rupiah;
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
	<title>Karyawan</title>


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
						<a class="nav-link" href="../staf/">
							<i class="icon-devices_other nav-icon"></i>
							Dashboard
						</a>
					</li> -->
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
						<a class="nav-link active-page dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
								<a class="dropdown-item active-page" href="pesanan-operasi.php">Operasi</a>
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
		<div class="main-container">
			<div class="content-wrapper">
				<div class="row gutters">
					<div class="col-sm-12">
						<div class="table-container">
							<?php

							if (isset($_GET['id_pemesanan'])) {
								$id_pemesanan = $_GET['id_pemesanan'];

								$queryPesananoperasi = mysqli_query($koneksi, "SELECT * FROM pesanan_operasi WHERE id_pemesanan='$id_pemesanan' ");
								$dataPesananoperasi = mysqli_fetch_array($queryPesananoperasi);
								$id_pesanan_operasi = $dataPesananoperasi['id_pesanan_operasi'];
								$kode_unik = $dataPesananoperasi['kode_unik'];
								$id_toko = $dataPesananoperasi['id_toko'];
								$id_user = $dataPesananoperasi['id_user'];
								$nama_hewan = $dataPesananoperasi['nama_hewan'];
								$id_operasi = $dataPesananoperasi['id_operasi'];
								$metode_pembayaran = $dataPesananoperasi['metode_pembayaran'];
								$pesan = $dataPesananoperasi['pesan'];
								$bayar = $dataPesananoperasi['bayar'];
								$ket = $dataPesananoperasi['ket'];
								$waktu = $dataPesananoperasi['waktu'];

								$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
								$dataUser = mysqli_fetch_array($queryUser);
								$nama_user = $dataUser['nama'];

								$queryoperasi = mysqli_query($koneksi, "SELECT * FROM operasi WHERE id_operasi='$id_operasi' ");
								$dataoperasi = mysqli_fetch_array($queryoperasi);
								$id_operasi = $dataoperasi['id_operasi'];
								$id_toko = $dataoperasi['id_toko'];
								$jenis_hewan = $dataoperasi['jenis_hewan'];
								$jenis_operasi = $dataoperasi['jenis_operasi'];
								$harga = $dataoperasi['harga'];

								$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$jenis_hewan' ");
								$dataJenisHewan = mysqli_fetch_array($queryJenisHewan);
								$id_jenis_hewan = $dataJenisHewan['id_jenis_hewan'];
								$jenis_hewan = $dataJenisHewan['jenis_hewan'];

								$jenis_operasi = "";
								$jenis_hewan = "";
								$total_harga = 0;

								$queryPesananoperasi = mysqli_query($koneksi, "SELECT * FROM pesanan_operasi 
									WHERE id_user='$id_user' AND id_pemesanan='$id_pemesanan' AND ket='0' ");
								while ($row = mysqli_fetch_assoc($queryPesananoperasi)) {
									// operasi
									$id_operasi = $row['id_operasi'];

									$queryoperasi = mysqli_query($koneksi, "SELECT * FROM operasi WHERE id_operasi='$id_operasi' ");
									$dataoperasi = mysqli_fetch_array($queryoperasi);
									$id_jenis_hewan = $dataoperasi['jenis_hewan'];
									$jenis_operasi .= $dataoperasi['jenis_operasi'] . ", ";
									// $harga = $dataoperasi['harga'];
									$total_harga += $dataoperasi['harga'];

									$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan' ");
									$dataJenisHewan = mysqli_fetch_array($queryJenisHewan);
									$jenis_hewan = $dataJenisHewan['jenis_hewan'];
								}

							?>
								<div class="col-lg-12 mt-2">
									<table border="0" width="100%" class="bg-light rounded">
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" cellpadding="10">
													<tr>
														<td>
															<h4 class="text-dark"><b>operasi</b></h4>
														</td>
													</tr>
												</table>
												<hr style="margin-top: 1px; margin-bottom: 5px;">
											</td>
										</tr>
										<tr class="mt-4">
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Nama Pemilik</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?= $nama_user ?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr class="mt-4">
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
										<tr class="mt-4">
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: 0px;">
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
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jenis operasi</b></label>
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
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Pesan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?= $pesan ?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Tanggal Pesanan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?= $waktu ?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Total Harga</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?= rupiah($total_harga) ?></b></label>
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
															<label class="text-success mr-2"><b>operasi - <?= $id_pemesanan ?></b></label>
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
															<button class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
															<button class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#modalKonfirmasiPesanan">Konfirmasi</button>

															<!-- Modal -->
															<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
																	<div class="modal-content">
																		<form action="pesanan-operasi-post.php" method="post" enctype="multipart/form-data">
																			<div class="modal-header">
																				<h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
																				<input type="text" class="form-control" id="id_pesanan_operasi" name="id_pesanan_operasi" value="<?= $id_pesanan_operasi ?>" hidden>
																				<div class="mb-3">
																					<label for="keterangan" class="form-label">Keterangan</label>
																					<input type="text" class="form-control" id="keterangan" name="keterangan">
																				</div>
																				<div class="mb-3">
																					<label for="gambar_dokumentasi" class="form-label">Gambar</label>
																					<input type="file" class="form-control" id="gambar_dokumentasi" name="gambar_dokumentasi">
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																				<button type="submit" id="tambah_dokumentasi" name="tambah_dokumentasi" class="btn btn-primary">Simpan</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>

															<!-- Modal -->
															<div class="modal fade" id="modalKonfirmasiPesanan" tabindex="-1" aria-labelledby="modalKonfirmasiPesananLabel" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
																	<div class="modal-content">
																		<form action="pesanan-operasi-post.php" method="post" enctype="multipart/form-data">
																			<div class="modal-header">
																				<h5 class="modal-title" id="modalKonfirmasiPesananLabel">Konfirmasi Pesanan</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
																				<input type="text" class="form-control" id="id_pesanan_operasi" name="id_pesanan_operasi" value="<?= $id_pesanan_operasi ?>" hidden>
																				<div class="mb-3">
																					<label for="keterangan" class="form-label">Klik Konfirmasi jika pesanan telah selesai</label>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																				<button type="submit" id="konfirmasi_pesanan" name="konfirmasi_pesanan" class="btn btn-primary">Simpan</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table class="table m-0">
													<thead>
														<tr>
															<th scope="col">No</th>
															<th scope="col">Waktu</th>
															<th scope="col">Keterangan</th>
															<th scope="col">Gambar</th>
															<th scope="col">Setting</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;

														$queryDokumentasioperasi = mysqli_query($koneksi, "SELECT * FROM `dokumentasi` WHERE id_pilihan_pesanan='3' AND id_pesanan='$id_pesanan_operasi' ");
														while ($row = mysqli_fetch_assoc($queryDokumentasioperasi)) {
															$id_dokumentasi = $row['id_dokumentasi'];
															$waktu = $row['waktu'];
															$keterangan = $row['keterangan'];
															$gambar = $row['gambar'];
														?>
															<tr>
																<th scope="row"><?= $no ?></th>
																<td><?= $waktu ?></td>
																<td><?= $keterangan ?></td>
																<td>
																	<a href="" data-toggle="modal" data-target="#gambarModal<?= $id_dokumentasi ?>">
																		<img width="60px" src="../gambar/dokumentasi/<?= $gambar ?>" alt="">
																	</a>
																</td>
																<td>
																	<a href="" class="mr-2" data-toggle="modal" data-target="#editModal<?= $id_dokumentasi ?>">
																		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
																			<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
																			<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
																		</svg>
																	</a>
																	<a href="" data-toggle="modal" data-target="#hapusModal<?= $id_dokumentasi ?>">
																		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
																			<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
																		</svg>
																	</a>
																</td>
															</tr>

															<!-- Modal -->
															<div class="modal fade" id="gambarModal<?= $id_dokumentasi ?>" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="gambarModalLabel"><?= $keterangan ?></h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<img class="card-img-top img-product" src="../gambar/dokumentasi/<?= $gambar ?>" alt="">
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																		</div>
																	</div>
																</div>
															</div>

															<div class="modal fade" id="editModal<?= $id_dokumentasi ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
																	<div class="modal-content">
																		<form action="pesanan-operasi-post.php" method="post" enctype="multipart/form-data">
																			<div class="modal-header">
																				<h5 class="modal-title" id="editModalLabel">Edit Data</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<input type="text" class="form-control" id="id_dokumentasi" name="id_dokumentasi" value="<?= $id_dokumentasi ?>" hidden>
																				<input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
																				<input type="text" class="form-control" id="id_pesanan_operasi" name="id_pesanan_operasi" value="<?= $id_pesanan_operasi ?>" hidden>
																				<input type="text" class="form-control" id="gambar_sebelumnya" name="gambar_sebelumnya" value="<?= $gambar ?>" hidden>

																				<div class="mb-3">
																					<label for="keterangan" class="form-label">Keterangan</label>
																					<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keterangan ?>">
																				</div>
																				<div class="mb-3">
																					<label for="gambar" class="form-label">Gambar</label>
																					<input type="file" class="form-control" id="gambar_dokumentasi" name="gambar_dokumentasi">
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																				<button type="submit" id="edit_dokumentasi" name="edit_dokumentasi" class="btn btn-primary">Simpan</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>

															<div class="modal fade" id="hapusModal<?= $id_dokumentasi ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
																	<div class="modal-content">
																		<form action="pesanan-operasi-post.php" method="post">
																			<div class="modal-header">
																				<h5 class="modal-title" id="hapusModalLabel"><?= $keterangan ?></h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">&times;</span>
																				</button>
																			</div>
																			<div class="modal-body">
																				<input type="text" class="form-control" id="id_dokumentasi" name="id_dokumentasi" value="<?= $id_dokumentasi ?>" hidden>
																				<input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" value="<?= $id_pemesanan ?>" hidden>
																				<div class="mb-3">
																					<label for="nama_hewan" class="form-label">Menghapus Dokumentasi dan data tidak dapat dipulihkan</label>
																				</div>
																			</div>
																			<div class="modal-footer">
																				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																				<button type="submit" id="hapus_dokumentasi" name="hapus_dokumentasi" class="btn btn-primary">Simpan</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														<?php
															$no++;
														}
														?>
													</tbody>
												</table>

											</td>
										</tr>
									</table>
								</div>
							<?php
							} else {
							?>
								<div class="row row-cols-auto">
									<?php
									$query = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` WHERE id_toko='$id_toko' AND ket='0' AND id_pemesanan>0 
											GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC");

									// $query = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` WHERE id_toko='$id_toko' ");

									while ($hasil = mysqli_fetch_assoc($query)) {
										$id_pesanan_operasi = $hasil['id_pesanan_operasi'];
										$id_pemesanan = $hasil['id_pemesanan'];
										$id_user = $hasil['id_user'];
										$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
										$dataUser = mysqli_fetch_array($queryUser);
										$nama_user = $dataUser['nama'];

										if ($hasil['bayar'] == "0") {
											echo '
												<div class="col mt-2">
													<a href="pesanan-operasi.php?id_pemesanan=' . $hasil['id_pemesanan'] . '">
														<div class="card border-0 shadow" style="text-align: center;" id="btn-awal">
															<div class="card-body"">
																<h4 id="text-awal" style="text-color:red;">' . $nama_user . '</h4>
																<h6 id="text-awal" class="mt-4">Hewan : ' . $hasil['nama_hewan'] . '</h6>
																<h6 id="text-awal" class="mt-4"> Belum Bayar</h6>
															</div>
														</div>
													</a>
												</div>
											';
										} else {
											echo '
												<div class="col mt-2">
													<a href="pesanan-operasi.php?id_pemesanan=' . $hasil['id_pemesanan'] . '" class"">
														<div class="card border-0 shadow" style="text-align: center;" id="btn-awal">
															<div class="card-body"">
																<h4 id="text-awal" >' . $nama_user . '</h4>
																<h6 id="text-awal" class="mt-4">Hewan : ' . $hasil['nama_hewan'] . '</h6>
																<h6 id="text-awal" class="mt-4"> Sudah Bayar</h6>
															</div>
														</div>
													</a>
												</div>
											';
										}
									}
									?>
								</div>
							<?php
							}

							?>

						</div>

					</div>
					<!-- Row end -->

				</div>
				<!-- Content wrapper end -->


			</div>
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