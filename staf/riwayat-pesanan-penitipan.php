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
						<a class="nav-link active-page dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
								<a class="dropdown-item active-page" href="riwayat-pesanan-penitipan.php">Penitipan</a>
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

							if (isset($_GET['id_pesanan_penitipan'])) {
								$id_pesanan_penitipan = $_GET['id_pesanan_penitipan'];

								$queryPesananPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_penitipan WHERE id_pesanan_penitipan='$id_pesanan_penitipan' ");
								$dataPesananPenitipan = mysqli_fetch_array($queryPesananPenitipan);
								$kode_unik = $dataPesananPenitipan['kode_unik'];
								$id_user = $dataPesananPenitipan['id_user'];
								$nama_hewan = $dataPesananPenitipan['nama_hewan'];
								$jenis_hewan = $dataPesananPenitipan['jenis_hewan'];
								$tanggal_penitipan = $dataPesananPenitipan['tanggal_penitipan'];
								$jumlah_hari = $dataPesananPenitipan['jumlah_hari'];
								$metode_pembayaran = $dataPesananPenitipan['metode_pembayaran'];
								$pesan = $dataPesananPenitipan['pesan'];
								$harga_perhari = $dataPesananPenitipan['harga_perhari'];
								$harga_makanan = $dataPesananPenitipan['harga_makanan'];
								$total_harga = $dataPesananPenitipan['total_harga'];
								$bayar = $dataPesananPenitipan['bayar'];
								$ket = $dataPesananPenitipan['ket'];
								$waktu = $dataPesananPenitipan['waktu'];

								$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
								$dataUser = mysqli_fetch_array($queryUser);
								$nama_user = $dataUser['nama'];

							?>
								<div class="col-lg-12 mt-2">
									<table border="0" width="100%" class="bg-light rounded">
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" cellpadding="10">
													<tr>
														<td>
															<h4 class="text-dark"><b>Penitipan</b></h4>
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
										<tr class="mt-4">
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: 0px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Tanggal Penitipan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?= $tanggal_penitipan ?></b></label>
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
															<label class="text-dark ml-2"><b>Jumlah Hari</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?= $jumlah_hari ?> Hari</b></label>
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
															<label class="text-dark ml-2"><b>Total Harga</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b>Rp. <?= $total_harga ?></b></label>
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
															<label class="text-success mr-2"><b>Penitipan - <?= $id_pesanan_penitipan ?></b></label>
														</td>
													</tr>
												</table>
												<hr style="margin-top: 1px; margin-bottom: 5px;">
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
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;

														$queryDokumentasiPenitipan = mysqli_query($koneksi, "SELECT * FROM `dokumentasi` WHERE id_pilihan_pesanan='1' AND id_pesanan='$id_pesanan_penitipan' ");
														while ($row = mysqli_fetch_assoc($queryDokumentasiPenitipan)) {
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
									$query = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` WHERE id_toko='$id_toko' AND bayar='1' AND ket='1' ");

									while ($hasil = mysqli_fetch_assoc($query)) {
										$id_pesanan_penitipan = $hasil['id_pesanan_penitipan'];
										$id_user = $hasil['id_user'];
										$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
										$dataUser = mysqli_fetch_array($queryUser);
										$nama_user = $dataUser['nama'];

										$id_pesanan_penitipan = $hasil['id_pesanan_penitipan'];

										if ($hasil['bayar'] == "0") {
											echo '
												<div class="col mt-2">
													<a href="riwayat-pesanan-penitipan.php?id_pesanan_penitipan=' . $hasil['id_pesanan_penitipan'] . '">
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
													<a href="riwayat-pesanan-penitipan.php?id_pesanan_penitipan=' . $hasil['id_pesanan_penitipan'] . '" class"">
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