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
					<li class="nav-item">
						<a class="nav-link" href="../pemilik/">
							<i class="icon-devices_other nav-icon"></i>
							Dashboard
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="toko.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Toko</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dokter.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Dokter</p>
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
						<a class="nav-link active-page dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
								<a class="dropdown-item active-page" href="layanan-penitipan.php">Penitipan</a>
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
		<div class="main-container">
			<div class="content-wrapper">
				<div class="row gutters">
					<div class="col-sm-12">
						<button class="btn btn-primary mt-4 mb-4" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
						<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<form action="layanan-penitipan-post.php" method="post" enctype="multipart/form-data">
										<div class="modal-header">
											<h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<input type="text" class="form-control" id="id_toko" name="id_toko" value="<?= $id_toko ?>" hidden>
											<div class="mb-3">
												<label for="jenis_hewan" class="form-label">Jenis Hewan</label>
												<select name="jenis_hewan" class="form-control" id="jenis_hewan" required>
													<?php
													$query = mysqli_query($koneksi, "SELECT * FROM `jenis_hewan` WHERE id_toko='$id_toko' ");
													while ($row = mysqli_fetch_assoc($query)) {
														$id_jenis_hewan = $row['id_jenis_hewan'];
														$id_toko = $row['id_toko'];
														$jenis_hewan = $row['jenis_hewan'];

														$cekPenitipan = mysqli_query($koneksi, "SELECT * FROM penitipan WHERE jenis_hewan='$id_jenis_hewan' ");
														$rowPenitipan = mysqli_num_rows($cekPenitipan);
														if ($rowPenitipan == 0) {


													?>
															<option value="<?= $id_jenis_hewan ?>"><?= $jenis_hewan ?></option>
													<?php
														}
													}

													?>
												</select>
											</div>
											<div class="mb-3">
												<label for="harga_penitipan" class="form-label">Harga Penitipan Perhari</label>
												<input type="number" class="form-control" id="harga_penitipan" name="harga_penitipan">
											</div>
											<div class="mb-3">
												<label for="harga_makanan" class="form-label">Harga Makanan</label>
												<input type="number" class="form-control" id="harga_makanan" name="harga_makanan">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" id="tambah_penitipan" name="tambah_penitipan" class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="table-container">
							<div class="table-responsive">
								<table class="table m-0">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Jenis Hewan</th>
											<th scope="col">Harga Penitipan</th>
											<th scope="col">Harga Makanan</th>
											<th scope="col">Settings</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$queryPenitipan = mysqli_query($koneksi, "SELECT * FROM penitipan WHERE id_toko='$id_toko'");

										$no = 1;
										while ($row = mysqli_fetch_assoc($queryPenitipan)) {
											$id_penitipan = $row['id_penitipan'];
											$id_jenis_hewan = $row['jenis_hewan'];
											$harga = $row['harga'];
											$harga_makanan = $row['harga_makanan'];

											$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan'");
											$data = mysqli_fetch_array($queryJenisHewan);
											$jenis_hewan = $data['jenis_hewan'];
										?>
											<tr>
												<th scope="row"><?= $no ?></th>
												<td><?= $jenis_hewan ?></td>
												<td><?= rupiah($harga) ?></td>
												<td><?= rupiah($harga_makanan) ?></td>

												<td>
													<a href="" class="mr-2" data-toggle="modal" data-target="#editModal<?= $id_penitipan ?>">
														<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
															<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
															<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
														</svg>
													</a>
													<a href="" data-toggle="modal" data-target="#hapusModal<?= $id_penitipan ?>">
														<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
															<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
														</svg>
													</a>
												</td>
											</tr>

											<div class="modal fade" id="editModal<?= $id_penitipan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
													<div class="modal-content">
														<form action="layanan-penitipan-post.php" method="post" enctype="multipart/form-data">
															<div class="modal-header">
																<h5 class="modal-title" id="editModalLabel">Edit Data</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<input type="text" class="form-control" id="id_penitipan" name="id_penitipan" value="<?= $id_penitipan ?>" hidden>

																<div class="mb-3">
																	<label for="jenis_hewan" class="form-label">Jenis Hewan</label>
																	<input type="text" class="form-control" id="jenis_hewan" name="jenis_hewan" value="<?= $jenis_hewan ?>" disabled>
																</div>
																<div class="mb-3">
																	<label for="harga_penitipan" class="form-label">Harga Penitipan</label>
																	<input type="number" class="form-control" id="harga_penitipan" name="harga_penitipan" value="<?= $harga ?>">
																</div>
																<div class="mb-3">
																	<label for="harga_makanan" class="form-label">Harga Makanan</label>
																	<input type="number" class="form-control" id="harga_makanan" name="harga_makanan" value="<?= $harga_makanan ?>">
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																<button type="submit" id="edit_penitipan" name="edit_penitipan" class="btn btn-primary">Simpan</button>
															</div>
														</form>
													</div>
												</div>
											</div>

											<div class="modal fade" id="hapusModal<?= $id_penitipan ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
													<div class="modal-content">
														<form action="layanan-penitipan-post.php" method="post">
															<div class="modal-header">
																<h5 class="modal-title" id="hapusModalLabel"><?= $jenis_hewan ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="mb-3">
																	<label for="nama_hewan" class="form-label">Menghapus Penitipan akan menghapus data yang berhubungan</label>
																	<input type="text" class="form-control" id="id_penitipan" name="id_penitipan" value="<?= $id_penitipan ?>" hidden>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																<button type="submit" id="hapus_penitipan" name="hapus_penitipan" class="btn btn-primary">Simpan</button>
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
							</div>
						</div>

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