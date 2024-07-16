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
	<div id="loading-wrapper">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
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
						<a class="nav-link" href="../staf/">
							<i class="icon-devices_other nav-icon"></i>
							Dashboard
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
						<a class="nav-link active-page" href="index.html">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Tranksaksi</p>
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
							<div class="table-responsive">
								<table class="table m-0">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Pesanan</th>
											<th scope="col">Harga</th>
											<th scope="col">Pembayaran</th>
											<th scope="col">Waktu</th>
											<th scope="col">Informasi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$resultType = array();
										$arrayWaktu = array();
										$noArray = 0;

										// Pesanan Produk
										$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_toko='$id_toko' AND bayar='1' AND id_pemesanan>0 
											GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC ");
										while ($row = mysqli_fetch_assoc($queryPesananProduk)) {

											$id_pemesanan = $row['id_pemesanan'];
											$harga = 0;
											$queryProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_pemesanan='$id_pemesanan' ");
											while ($rowProduk = mysqli_fetch_assoc($queryProduk)) {
												$harga += $rowProduk['total_harga'];
											}

											$resultType[$noArray]["id_pilihan"] = "0";
											$resultType[$noArray]["id_pesanan"] = $row['id_pemesanan'];
											$resultType[$noArray]["harga"] = $harga;
											$resultType[$noArray]["metode_pembayaran"] = $row['metode_pembayaran'];
											$resultType[$noArray]["waktu"] = $row['waktu'];

											$arrayWaktu[$noArray] = $row['waktu'];
											$noArray++;
										}

										// PesananPenitipan
										$queryPesananPenitipan = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` WHERE id_toko='$id_toko' AND bayar='1' ");
										while ($row = mysqli_fetch_assoc($queryPesananPenitipan)) {
											$resultType[$noArray]["id_pilihan"] = "1";
											$resultType[$noArray]["id_pesanan"] = $row['id_pesanan_penitipan'];
											$resultType[$noArray]["harga"] = $row['total_harga'];
											$resultType[$noArray]["metode_pembayaran"] = $row['metode_pembayaran'];
											$resultType[$noArray]["waktu"] = $row['waktu'];

											$arrayWaktu[$noArray] = $row['waktu'];
											$noArray++;
										}
										// PesananPerawatan
										$queryPesananPerawatan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE id_toko='$id_toko' AND bayar='1' AND id_pemesanan>0 
											GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC");
										while ($row = mysqli_fetch_assoc($queryPesananPerawatan)) {
											$id_perawatan = $row['id_perawatan'];

											$queryPerawatan = mysqli_query($koneksi, "SELECT * FROM `perawatan` WHERE id_perawatan='$id_perawatan' ");
											$dataPerawatan = mysqli_fetch_array($queryPerawatan);

											$resultType[$noArray]["id_pilihan"] = "2";
											$resultType[$noArray]["id_pesanan"] = $row['id_pemesanan'];
											$resultType[$noArray]["harga"] = $dataPerawatan['harga'];
											$resultType[$noArray]["metode_pembayaran"] = $row['metode_pembayaran'];
											$resultType[$noArray]["waktu"] = $row['waktu'];

											$arrayWaktu[$noArray] = $row['waktu'];
											$noArray++;
										}
										// PesananOperasi
										$queryPesananOperasi = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` WHERE id_toko='$id_toko' AND bayar='1' ");
										while ($row = mysqli_fetch_assoc($queryPesananOperasi)) {
											$id_operasi = $row['id_operasi'];
											$queryoperasi = mysqli_query($koneksi, "SELECT * FROM `operasi` WHERE id_operasi='$id_operasi' ");
											$dataoperasi = mysqli_fetch_array($queryoperasi);

											$resultType[$noArray]["id_pilihan"] = "3";
											$resultType[$noArray]["id_pesanan"] = $row['id_pesanan_operasi'];
											$resultType[$noArray]["harga"] = $dataoperasi['harga'];
											$resultType[$noArray]["metode_pembayaran"] = $row['metode_pembayaran'];
											$resultType[$noArray]["waktu"] = $row['waktu'];

											$arrayWaktu[$noArray] = $row['waktu'];
											$noArray++;
										}
										// PesananVaksin
										$queryPesananVaksin = mysqli_query($koneksi, "SELECT * FROM `pesanan_vaksin` WHERE id_toko='$id_toko' AND bayar='1' ");
										while ($row = mysqli_fetch_assoc($queryPesananVaksin)) {
											$vaksin_ke = $row['vaksin_ke'];
											$id_vaksin = $row['id_vaksin'];
											$queryVaksin = mysqli_query($koneksi, "SELECT * FROM `vaksin` WHERE id_vaksin='$id_vaksin' ");
											$dataVaksin = mysqli_fetch_array($queryVaksin);

											$harga = 0;
											if ($vaksin_ke == "1") {
												$harga = $dataVaksin['vaksin_1'];
											} else if ($vaksin_ke == "2") {
												$harga = $dataVaksin['vaksin_2'];
											} else if ($vaksin_ke == "3") {
												$harga = $dataVaksin['vaksin_3'];
											}

											$resultType[$noArray]["id_pilihan"] = "4";
											$resultType[$noArray]["id_pesanan"] = $row['id_pesanan_vaksin'];
											$resultType[$noArray]["harga"] = $harga;
											$resultType[$noArray]["metode_pembayaran"] = $row['metode_pembayaran'];
											$resultType[$noArray]["waktu"] = $row['waktu'];

											$arrayWaktu[$noArray] = $row['waktu'];
											$noArray++;
										}

										// echo json_encode($resultType);
										// echo "<br><br><br>";

										array_multisort($arrayWaktu, SORT_DESC, $resultType);
										// echo json_encode($resultType);
										// print_r($resultType);

										$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_toko='$id_toko' AND bayar='1' ");
										$queryPesananPenitipan = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` WHERE id_toko='$id_toko' AND bayar='1' ");
										$queryPesananPerawatan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE id_toko='$id_toko' AND bayar='1' ");
										$queryPesananOperasi = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` WHERE id_toko='$id_toko' AND bayar='1' ");
										$queryPesananVaksin = mysqli_query($koneksi, "SELECT * FROM `pesanan_vaksin` WHERE id_toko='$id_toko' AND bayar='1' ");

										$dataPesananProduk = mysqli_fetch_array($queryPesananProduk);
										$dataPenitipan = mysqli_fetch_array($queryPesananPenitipan);
										$dataPerawatan = mysqli_fetch_array($queryPesananPerawatan);
										$dataOperasi = mysqli_fetch_array($queryPesananOperasi);
										$dataVaksin = mysqli_fetch_array($queryPesananVaksin);

										foreach ($resultType as $no => $row) {
											$nomor = $no;
											$id_pilihan = $row['id_pilihan'];
											$id_pesanan = $row['id_pesanan'];
											$harga = $row['harga'];
											$metode_pembayaran = $row['metode_pembayaran'];
											$waktu = $row['waktu'];

											$pilihan = "";
											if ($id_pilihan == "0") {
												$pilihan = "Pesanan Produk";
											} else if ($id_pilihan == "1") {
												$pilihan = "Pesanan Penitipan";
											} else if ($id_pilihan == "2") {
												$pilihan = "Pesanan Perawatan";
											} else if ($id_pilihan == "3") {
												$pilihan = "Pesanan Operasi";
											} else if ($id_pilihan == "4") {
												$pilihan = "Pesanan Vaksin";
											}

											if ($metode_pembayaran == "bayar_ditempat") {
												$metode_pembayaran = "Bayar Di Tempat";
											} else if ($metode_pembayaran == "bayar_online") {
												$metode_pembayaran = "Bayar Online";
											}

										?>
											<tr>
												<th scope="row"><?= $nomor + 1 ?></th>
												<td><?= $pilihan ?></td>
												<td><?= rupiah($harga) ?></td>
												<td><?= $metode_pembayaran ?></td>
												<td><?= $waktu ?></td>
												<td>
													<?php

													if ($id_pilihan == "0") {	//Produk
														echo '
															<a href="" class="mr-2" data-toggle="modal" data-target="#editModalProduk' . $id_pesanan . '">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
																	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
																	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
																</svg>
															</a>
														';
													} else if ($id_pilihan == "1") {		//Penitipan
														echo '
															<a href="" class="mr-2" data-toggle="modal" data-target="#editModalPenitipan' . $id_pesanan . '">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
																	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
																	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
																</svg>
															</a>
														';
													} else if ($id_pilihan == "2") {	//Perawatan
														echo '
															<a href="" class="mr-2" data-toggle="modal" data-target="#editModalPerawatan' . $id_pesanan . '">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
																	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
																	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
																</svg>
															</a>
														';
													} else if ($id_pilihan == "3") {	//Operasi
														echo '
															<a href="" class="mr-2" data-toggle="modal" data-target="#editModalOperasi' . $id_pesanan . '">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
																	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
																	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
																</svg>
															</a>
														';
													} else if ($id_pilihan == "4") {	//Vaksin
														echo '
															<a href="" class="mr-2" data-toggle="modal" data-target="#editModalVaksin' . $id_pesanan . '">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
																	<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
																	<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
																</svg>
															</a>
														';
													}
													?>
												</td>
											</tr>



										<?php
											$no++;
										}
										?>
									</tbody>
								</table>

								<?php

								foreach ($resultType as $no => $value) {
									$id_pesanan = $value['id_pesanan'];
								?>
									<div class="modal fade" id="editModalProduk<?= $id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="editModalLabel">Rincian Data Produk</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="table-responsive">
														<table class="table m-0">
															<thead>
																<tr>
																	<th>Nama Produk</th>
																	<th>Jumlah</th>
																	<th>Total Harga</th>
																</tr>
															</thead>
															<?php
															$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_pemesanan='$id_pesanan' ");
															$dataPesananProduk = mysqli_fetch_array($queryPesananProduk);
															$id_user = $dataPesananProduk['id_user'];

															$queryUser = mysqli_query($koneksi, "SELECT * FROM `user` WHERE id_user='$id_user' ");
															$dataUser = mysqli_fetch_array($queryUser);
															$nama_user = $dataUser['nama'];
															?>
															<tr>
																<div class="mb-3">
																	<label for="nama_user" class="form-label">Nama Pembeli</label>
																	<label class="form-control" id="nama_user" name="nama_user"><?= $nama_user ?></label>
																</div>
															</tr>
															<?php

															$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_pemesanan='$id_pesanan' ");
															while ($row = mysqli_fetch_assoc($queryPesananProduk)) {
																$id_produk = $row['id_produk'];
																$jumlah = $row['jumlah'];
																$harga = $row['harga'];
																$total_harga = $row['total_harga'];
																$waktu = $row['waktu'];
																$bayar = $row['bayar'];

																$queryProduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
																$data = mysqli_fetch_array($queryProduk);
																$nama_produk = $data['nama_produk'];
															?>
																<tr>
																	<td><?= $nama_produk ?></td>
																	<td><?= $jumlah ?></td>
																	<td><?= rupiah($total_harga) ?></td>
																</tr>

															<?php
															}
															?>
														</table>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="editModalPenitipan<?= $id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
											<div class="modal-content">
												<form action="pesanan-perawatan-post.php" method="post" enctype="multipart/form-data">
													<div class="modal-header">
														<h5 class="modal-title" id="editModalLabel">Rincian Data Penitipan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<?php
														$queryModalPenitipan = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` WHERE id_pesanan_penitipan='$id_pesanan' ");
														$dataModalPenitipan = mysqli_fetch_array($queryModalPenitipan);
														$kode_unik = $dataModalPenitipan['kode_unik'];
														$id_user = $dataModalPenitipan['id_user'];
														$nama_hewan = $dataModalPenitipan['nama_hewan'];
														$jenis_hewan = $dataModalPenitipan['jenis_hewan'];
														$tanggal_penitipan = $dataModalPenitipan['tanggal_penitipan'];
														$jumlah_hari = $dataModalPenitipan['jumlah_hari'];
														$metode_pembayaran = $dataModalPenitipan['metode_pembayaran'];
														$pesan = $dataModalPenitipan['pesan'];
														$harga_perhari = $dataModalPenitipan['harga_perhari'];
														$harga_makanan = $dataModalPenitipan['harga_makanan'];
														$total_harga = $dataModalPenitipan['total_harga'];
														$bayar = $dataModalPenitipan['bayar'];
														$ket = $dataModalPenitipan['ket'];
														$waktu = $dataModalPenitipan['waktu'];

														$queryModalUser = mysqli_query($koneksi, "SELECT * FROM `user` WHERE id_user='$id_user' ");
														$dataModalUser = mysqli_fetch_array($queryModalUser);
														$nama_user = $dataModalUser['nama'];
														?>
														<div class="mb-3">
															<label for="nama_user" class="form-label">Nama Pemilik</label>
															<label class="form-control" id="nama_user" name="nama_user"><?= $nama_user ?></label>
														</div>
														<div class="mb-3">
															<label for="nama_hewan" class="form-label">Nama Hewan</label>
															<label class="form-control" id="nama_hewan" name="nama_hewan"><?= $nama_hewan ?></label>
														</div>
														<div class="mb-3">
															<label for="jenis_hewan" class="form-label">Jenis Hewan</label>
															<label class="form-control" id="jenis_hewan" name="jenis_hewan"><?= $jenis_hewan ?></label>
														</div>
														<div class="mb-3">
															<label for="jumlah_hari" class="form-label">Jumlah Hari</label>
															<label class="form-control" id="jumlah_hari" name="jumlah_hari"><?= $jumlah_hari ?></label>
														</div>
														<div class="mb-3">
															<label for="pesan" class="form-label">Pesan</label>
															<label class="form-control" id="pesan" name="pesan"><?= $pesan ?></label>
														</div>
														<div class="mb-3">
															<label for="harga_perhari" class="form-label">Harga Perhari</label>
															<label class="form-control" id="harga_perhari" name="harga_perhari"><?= rupiah($harga_perhari) ?></label>
														</div>
														<div class="mb-3">
															<label for="harga_makanan" class="form-label">Harga Makanan</label>
															<label class="form-control" id="harga_makanan" name="harga_makanan"><?= rupiah($harga_makanan) ?></label>
														</div>
														<div class="mb-3">
															<label for="total_harga" class="form-label">Total Harga</label>
															<label class="form-control" id="total_harga" name="total_harga"><?= rupiah($total_harga) ?></label>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal fade" id="editModalPerawatan<?= $id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="editModalLabel">Rincian Data Perawatan</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<?php

													$queryModalPesananPerawatan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE id_pemesanan='$id_pesanan'");
													$dataModalPesananPerawatan = mysqli_fetch_array($queryModalPesananPerawatan);
													$id_user = $dataModalPesananPerawatan['id_user'];
													$nama_hewan = $dataModalPesananPerawatan['nama_hewan'];
													$id_perawatan = $dataModalPesananPerawatan['id_perawatan'];
													$pesan = $dataModalPesananPerawatan['pesan'];

													$queryModalUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
													$dataModalUser = mysqli_fetch_array($queryModalUser);
													$nama_user = $dataModalUser['nama'];

													$queryModalPerawatan = mysqli_query($koneksi, "SELECT * FROM perawatan WHERE id_perawatan='$id_perawatan'");
													$dataModalPerawatan = mysqli_fetch_array($queryModalPerawatan);
													$id_jenis_hewan = $dataModalPerawatan['jenis_hewan'];

													$queryModalJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan'");
													$dataModalJenisHewan = mysqli_fetch_array($queryModalJenisHewan);
													$jenis_hewan = $dataModalJenisHewan['jenis_hewan'];
													?>
													<div class="mb-2">
														<label for="nama_user" class="form-label">Nama Pemilik</label>
														<label class="form-control" id="nama_user" name="nama_user"><?= $nama_user ?></label>
													</div>
													<div class="mb-2">
														<label for="nama_hewan" class="form-label">Nama Hewan</label>
														<label class="form-control" id="nama_hewan" name="nama_hewan"><?= $nama_hewan ?></label>
													</div>
													<div class="mb-2">
														<label for="jenis_hewan" class="form-label">Jenis Hewan</label>
														<label class="form-control" id="jenis_hewan" name="jenis_hewan"><?= $jenis_hewan ?></label>
													</div>
													<div class="mb-2">
														<label for="pesan" class="form-label">Pesan</label>
														<label class="form-control" id="pesan" name="pesan"><?= $pesan ?></label>
													</div>

													<div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th>Nama Perawatan</th>
																	<th>Harga</th>
																</tr>
															</thead>
															<?php
															$total_harga = 0;
															$queryOperasi = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE id_pemesanan='$id_pesanan' ");

															while ($row = mysqli_fetch_assoc($queryOperasi)) {
																$id_perawatan = $row['id_perawatan'];

																$queryModalPerawatan = mysqli_query($koneksi, "SELECT * FROM perawatan WHERE id_perawatan='$id_perawatan'");
																$dataModalPerawatan = mysqli_fetch_array($queryModalPerawatan);
																$jenis_perawatan = $dataModalPerawatan['jenis_perawatan'];
																$harga = $dataModalPerawatan['harga'];

																$total_harga += $harga;
															?>
																<tr>
																	<td><?= $jenis_perawatan ?></td>
																	<td><?= rupiah($harga) ?></td>
																</tr>

															<?php
															}
															?>
															<tr>

															</tr>
															<tr style="border-top: #cccccc 1px solid;">
																<td>
																	<h6>Total Harga</h6>
																</td>
																<td><?= rupiah($total_harga) ?></td>
															</tr>
														</table>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
												</div>
											</div>
										</div>
									</div>
									<div class="modal fade" id="editModalOperasi<?= $id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
											<div class="modal-content">
												<form action="pesanan-perawatan-post.php" method="post" enctype="multipart/form-data">
													<div class="modal-header">
														<h5 class="modal-title" id="editModalLabel">Rincian Data Operasi</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<?php
														$queryModalOperasi = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` WHERE id_pesanan_operasi='$id_pesanan' ");
														$dataModalOperasi = mysqli_fetch_array($queryModalOperasi);
														$id_user = $dataModalOperasi['id_user'];
														$nama_hewan = $dataModalOperasi['nama_hewan'];
														$id_operasi = $dataModalOperasi['id_operasi'];
														$pesan = $dataModalOperasi['pesan'];

														$queryModalUser = mysqli_query($koneksi, "SELECT * FROM `user` WHERE id_user='$id_user' ");
														$dataModalUser = mysqli_fetch_array($queryModalUser);
														$nama_user = $dataModalUser['nama'];

														$queryModalOperasi = mysqli_query($koneksi, "SELECT * FROM `operasi` WHERE id_operasi='$id_operasi' ");
														$dataModalOperasi = mysqli_fetch_array($queryModalOperasi);
														$id_jenis_hewan = $dataModalOperasi['jenis_hewan'];
														$jenis_operasi = $dataModalOperasi['jenis_operasi'];
														$harga = $dataModalOperasi['harga'];

														$queryModalJenisHewan = mysqli_query($koneksi, "SELECT * FROM `jenis_hewan` WHERE id_jenis_hewan='$id_jenis_hewan' ");
														$dataModalJenisHewan = mysqli_fetch_array($queryModalJenisHewan);
														$jenis_hewan = $dataModalJenisHewan['jenis_hewan'];
														?>
														<div class="mb-3">
															<label for="nama_user" class="form-label">Nama Pemilik</label>
															<label class="form-control" id="nama_user" name="nama_user"><?= $nama_user ?></label>
														</div>
														<div class="mb-3">
															<label for="nama_hewan" class="form-label">Nama Hewan</label>
															<label class="form-control" id="nama_hewan" name="nama_hewan"><?= $nama_hewan ?></label>
														</div>
														<div class="mb-3">
															<label for="jenis_hewan" class="form-label">Jenis Hewan</label>
															<label class="form-control" id="jenis_hewan" name="jenis_hewan"><?= $jenis_hewan ?></label>
														</div>
														<div class="mb-3">
															<label for="pesan" class="form-label">Pesan</label>
															<label class="form-control" id="pesan" name="pesan"><?= $pesan ?></label>
														</div>
														<div class="mb-3">
															<label for="jenis_operasi" class="form-label">Jenis Operasi</label>
															<label class="form-control" id="jenis_operasi" name="jenis_operasi"><?= $jenis_operasi ?></label>
														</div>
														<div class="mb-3">
															<label for="harga" class="form-label">Harga</label>
															<label class="form-control" id="harga" name="harga"><?= rupiah($harga) ?></label>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal fade" id="editModalVaksin<?= $id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
											<div class="modal-content">
												<form action="pesanan-perawatan-post.php" method="post" enctype="multipart/form-data">
													<div class="modal-header">
														<h5 class="modal-title" id="editModalLabel">Rincian Data Vaksin</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<?php
														$queryModalVaksin = mysqli_query($koneksi, "SELECT * FROM `pesanan_vaksin` WHERE id_pesanan_vaksin='$id_pesanan' ");
														$dataModalVaksin = mysqli_fetch_array($queryModalVaksin);
														$id_user = $dataModalVaksin['id_user'];
														$nama_hewan = $dataModalVaksin['nama_hewan'];
														$id_vaksin = $dataModalVaksin['id_vaksin'];
														$vaksin_ke = $dataModalVaksin['vaksin_ke'];
														$pesan = $dataModalVaksin['pesan'];

														$queryModalUser = mysqli_query($koneksi, "SELECT * FROM `user` WHERE id_user='$id_user' ");
														$dataModalUser = mysqli_fetch_array($queryModalUser);
														$nama_user = $dataModalUser['nama'];

														$queryModalVaksin = mysqli_query($koneksi, "SELECT * FROM `vaksin` WHERE id_vaksin='$id_vaksin' ");
														$dataModalVaksin = mysqli_fetch_array($queryModalVaksin);
														$id_jenis_hewan = $dataModalVaksin['jenis_hewan'];
														$vaksin_1 = $dataModalVaksin['vaksin_1'];
														$vaksin_2 = $dataModalVaksin['vaksin_2'];
														$vaksin_3 = $dataModalVaksin['vaksin_3'];

														$harga = 0;
														if ($vaksin_ke == "1") {
															$harga = $vaksin_1;
														} else if ($vaksin_ke == "2") {
															$harga = $vaksin_2;
														} else if ($vaksin_ke == "3") {
															$harga = $vaksin_3;
														}

														$queryModalJenisHewan = mysqli_query($koneksi, "SELECT * FROM `jenis_hewan` WHERE id_jenis_hewan='$id_jenis_hewan' ");
														$dataModalJenisHewan = mysqli_fetch_array($queryModalJenisHewan);
														$jenis_hewan = $dataModalJenisHewan['jenis_hewan'];
														?>
														<div class="mb-3">
															<label for="nama_user" class="form-label">Nama Pemilik</label>
															<label class="form-control" id="nama_user" name="nama_user"><?= $nama_user ?></label>
														</div>
														<div class="mb-3">
															<label for="nama_hewan" class="form-label">Nama Hewan</label>
															<label class="form-control" id="nama_hewan" name="nama_hewan"><?= $nama_hewan ?></label>
														</div>
														<div class="mb-3">
															<label for="jenis_hewan" class="form-label">Jenis Hewan</label>
															<label class="form-control" id="jenis_hewan" name="jenis_hewan"><?= $jenis_hewan ?></label>
														</div>
														<div class="mb-3">
															<label for="pesan" class="form-label">Pesan</label>
															<label class="form-control" id="pesan" name="pesan"><?= $pesan ?></label>
														</div>
														<div class="mb-3">
															<label for="vaksin_ke" class="form-label">Vaksin Ke</label>
															<label class="form-control" id="vaksin_ke" name="vaksin_ke"><?= $vaksin_ke ?></label>
														</div>
														<div class="mb-3">
															<label for="harga" class="form-label">Harga</label>
															<label class="form-control" id="harga" name="harga"><?= rupiah($harga) ?></label>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								<?php
								}

								?>
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