<?php
include '../koneksi.php';

session_start();
if (isset($_COOKIE['id'])) {
	$id_pemilik = $_COOKIE['id'];
	$queryPemilik = mysqli_query($koneksi, "SELECT * FROM karyawan_dokter WHERE id_karyawan='$id_pemilik' ");
	$dataPemilik = mysqli_fetch_array($queryPemilik);
	$id_toko = $dataPemilik['id_toko'];

	// Cari Jumlah dokter
	$queryDokter = mysqli_query($koneksi, "SELECT * FROM karyawan_dokter WHERE id_toko='$id_toko' AND sebagai='dokter' ");
	$rowDokter = mysqli_num_rows($queryDokter);

	// Cari Jumlah Karyawan
	$queryKaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan_dokter WHERE id_toko='$id_toko' AND sebagai='karyawan' ");
	$rowKaryawan = mysqli_num_rows($queryKaryawan);

	// Cari Jumlah Jenis Hewan
	$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_toko='$id_toko' ");
	$rowJenisHewan = mysqli_num_rows($queryJenisHewan);

	// Cari Jumlah Pesanan Produk
	$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM pesanan_produk WHERE id_toko='$id_toko' AND bayar='1' ");
	$rowPesananProduk = mysqli_num_rows($queryPesananProduk);

	// Cari Jumlah Pesanan Penitipan
	$queryPesananPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_penitipan WHERE id_toko='$id_toko' AND bayar='1' ");
	$rowPesananPenitipan = mysqli_num_rows($queryPesananPenitipan);

	// Cari Jumlah Pesanan Perawatan
	$queryPesananPerawatan = mysqli_query($koneksi, "SELECT * FROM pesanan_perawatan WHERE id_toko='$id_toko' AND bayar='1' ");
	$rowPesananPerawatan = mysqli_num_rows($queryPesananPerawatan);

	// Cari Jumlah Pesanan Vaksin
	$queryPesananOperasi = mysqli_query($koneksi, "SELECT * FROM pesanan_vaksin WHERE id_toko='$id_toko' AND bayar='1' ");
	$rowPesananOperasi = mysqli_num_rows($queryPesananOperasi);

	// Cari Jumlah Pesanan Vaksin
	$queryPesananVaksin = mysqli_query($koneksi, "SELECT * FROM pesanan_vaksin WHERE id_toko='$id_toko' AND bayar='1' ");
	$rowPesananVaksin = mysqli_num_rows($queryPesananVaksin);

	$jumlahPesanan = $rowPesananProduk + $rowPesananPenitipan + $rowPesananPerawatan + $rowPesananOperasi + $rowPesananVaksin;
} else {
	echo '
			<script>
				window.location.href="jenis-hewan.php";
			</script>
		';
}

function cariData($koneksi): array
{
	$tahunArray = array();

	// Pesanan Produk
	$tahunCek1 = 0;
	$tahunCek2 = 0;
	$sqlProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` ORDER BY waktu DESC ");
	while ($hasil = mysqli_fetch_assoc($sqlProduk)) {
		$tanggal = explode("-", $hasil['waktu']);
		$tahun = $tanggal[0];

		$tahunCek1 = $tahun;
		if ($tahunCek1 != $tahunCek2) {
			$tahunCek2 = $tanggal[0];
			$tahunValueArray["$tahunCek1"] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			array_push($tahunArray, $tahunCek1);
		}
	};

	// Pesanan Penitipan
	$tahunCek1 = 0;
	$tahunCek2 = 0;
	$sqlpenitipan = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` ORDER BY waktu DESC ");
	while ($hasil = mysqli_fetch_assoc($sqlpenitipan)) {
		$tanggal = explode("-", $hasil['waktu']);
		$tahun = $tanggal[0];

		$tahunCek1 = $tahun;
		if ($tahunCek1 != $tahunCek2) {
			$tahunCek2 = $tanggal[0];
			$tahunValueArray["$tahunCek1"] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			array_push($tahunArray, $tahunCek1);
		}
	};

	// Pesanan perawatan
	$tahunCek1 = 0;
	$tahunCek2 = 0;
	$sqlperawatan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` ORDER BY waktu DESC ");
	while ($hasil = mysqli_fetch_assoc($sqlperawatan)) {
		$tanggal = explode("-", $hasil['waktu']);
		$tahun = $tanggal[0];

		$tahunCek1 = $tahun;
		if ($tahunCek1 != $tahunCek2) {
			$tahunCek2 = $tanggal[0];
			$tahunValueArray["$tahunCek1"] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			array_push($tahunArray, $tahunCek1);
		}
	};

	// Pesanan operasi
	$tahunCek1 = 0;
	$tahunCek2 = 0;
	$sqloperasi = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` ORDER BY waktu DESC ");
	while ($hasil = mysqli_fetch_assoc($sqloperasi)) {
		$tanggal = explode("-", $hasil['waktu']);
		$tahun = $tanggal[0];

		$tahunCek1 = $tahun;
		if ($tahunCek1 != $tahunCek2) {
			$tahunCek2 = $tanggal[0];
			$tahunValueArray["$tahunCek1"] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			array_push($tahunArray, $tahunCek1);
		}
	};

	// Pesanan vaksin
	$tahunCek1 = 0;
	$tahunCek2 = 0;
	$sqlvaksin = mysqli_query($koneksi, "SELECT * FROM `pesanan_vaksin` ORDER BY waktu DESC ");
	while ($hasil = mysqli_fetch_assoc($sqlvaksin)) {
		$tanggal = explode("-", $hasil['waktu']);
		$tahun = $tanggal[0];

		$tahunCek1 = $tahun;
		if ($tahunCek1 != $tahunCek2) {
			$tahunCek2 = $tanggal[0];
			$tahunValueArray["$tahunCek1"] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
			array_push($tahunArray, $tahunCek1);
		}
	};

	$tahunArray = array_unique($tahunArray);

	return $tahunArray;
}
// echo json_encode(cariData($koneksi));

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
					<li class="nav-item">
						<a class="nav-link active-page" href="../staf/">
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


			<!-- Page header start -->
			<div class="page-header">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active">Hospital Dashboard</li>
				</ol>
				<div class="site-award">
					<img src="img/award.svg" alt="Hospital Dashboards"> Best PETHOP
				</div>
			</div>
			<!-- Page header end -->

			<!-- Content wrapper start -->
			<div class="content-wrapper">

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-lg col-sm-4 col-12">
						<div class="hospital-tiles">
							<img src="img/hospital/patient.svg" alt="Quality Dashboards" />
							<p>Dokter</p>
							<h2><?= $rowDokter ?></h2>
						</div>
					</div>
					<div class="col-lg col-sm-4 col-12">
						<div class="hospital-tiles">
							<img src="img/hospital/staff.svg" alt="Top Dashboards" />
							<p>Karyawan</p>
							<h2><?= $rowKaryawan ?></h2>
						</div>
					</div>
					<div class="col-lg col-sm-4 col-12">
						<div class="hospital-tiles">
							<img src="img/hospital/cats_10753723.png" alt="Best Dashboards" />
							<p>Jenis Hewan</p>
							<h2><?= $rowJenisHewan ?></h2>
						</div>
					</div>
					<div class="col-lg col-sm-4 col-12">
						<div class="hospital-tiles">
							<img src="img/hospital/checklist_7662415.png" alt="Best Dashboards" />
							<p>Pesanan</p>
							<h2><?= $jumlahPesanan ?></h2>
						</div>
					</div>
				</div>
				<!-- Row end -->

				<!-- Row start -->
				<div class="row gutters">
					<div class="col-lg">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Patients</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col">
										<select name="tahun" id="tahun" onchange="setUpdateData()" class="form-control" aria-label="Default select example">
											<?php
											$variable = cariData($koneksi);
											foreach ($variable as $key => $value) {
												$queryCariData = mysqli_query($koneksi, "SELECT * FROM ");
											?>
												<option value="<?= $value ?>"><?= $value ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="col">
										<select name="pesanan" id="pesanan" onchange="setUpdateData()" class="form-control" aria-label="Default select example">
											<option value="1">Semua</option>
											<option value="2">Produk</option>
											<option value="3">Penitipan</option>
											<option value="4">Perawatan</option>
											<option value="5">Operasi</option>
											<option value="6">Vaksin</option>
										</select>
									</div>
								</div>

								<div id="hospital-line-column-graph"></div>

							</div>
						</div>
					</div>
					<!-- <div class="col-lg-6 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Treatment Type</div>
							</div>
							<div class="card-body">
								<div id="hospital-line-area-graph"></div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<!-- Content wrapper end -->


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
	<!-- <script src="vendor/apex/examples/mixed/hospital-line-column-graph.js"></script> -->
	<script src="vendor/apex/examples/mixed/hospital-line-area-graph.js"></script>
	<script src="vendor/apex/examples/bar/hospital-patients-by-age.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

	<!-- Rating JS -->
	<script src="vendor/rating/raty.js"></script>
	<script src="vendor/rating/raty-custom.js"></script>

	<!-- Main Js Required -->
	<script src="js/main.js"></script>

	<script>
		var dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
		setAllData(dataColumn, dataColumn, dataColumn, dataColumn, dataColumn);

		var selectedTahun = document.getElementById("tahun")
		var tahun = selectedTahun.options[selectedTahun.selectedIndex].value
		var options = {
			chart: {
				height: 500,
				type: 'bar',
				toolbar: {
					show: false,
				},
			},
			series: [
				// {
				// 	name: 'Patients',
				// 	type: 'line',
				// 	data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
				// }, 
				{
					name: 'Produk',
					type: 'bar',
					data: dataColumn
					// data: [323, 442, 335, 527, 143, 222, 117, 231, 322, 222, 112, 16]
				},
				{
					name: 'Penitipan',
					type: 'bar',
					data: dataColumn
					// data: [323, 442, 335, 527, 143, 222, 117, 231, 322, 222, 112, 16]
				},
				{
					name: 'Perawatan',
					type: 'bar',
					data: dataColumn
					// data: [323, 442, 335, 527, 143, 222, 117, 231, 322, 222, 112, 16]
				},
				{
					name: 'Operasi',
					type: 'bar',
					data: dataColumn
					// data: [323, 442, 335, 527, 143, 222, 117, 231, 322, 222, 112, 16]
				},
				{
					name: 'Vaksin',
					type: 'bar',
					data: dataColumn
					// data: [323, 442, 335, 527, 143, 222, 117, 231, 322, 222, 112, 16]
				}
			],
			fill: {
				type: 'solid',
				opacity: [0.2, 1],
			},
			labels: [
				'Jan ' + tahun, 'Feb ' + tahun, 'Mar ' + tahun, 'Apr ' + tahun, 'Mei ' + tahun, 'Juni ' + tahun,
				'Juli ' + tahun, 'Agu ' + tahun, 'Sep ' + tahun, 'Okt ' + tahun, 'Nov ' + tahun, 'Des ' + tahun
			],
			colors: ['#08a597', '#08a597', '#666666', '#888888'],
		}

		var chart = new ApexCharts(
			document.querySelector("#hospital-line-column-graph"),
			options
		);
		chart.render();

		function setUpdateData(){
			var selectedTahun = document.getElementById("tahun")
			var tahun = selectedTahun.options[selectedTahun.selectedIndex].value
			var selectedPesanan = document.getElementById("pesanan")
			var pesanan = selectedPesanan.options[selectedPesanan.selectedIndex].value

			if (pesanan == 1) {
				dataColumn = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
				// setAllData(dataColumn, dataColumn, dataColumn, dataColumn, dataColumn)
				chart.options.series[0] = {
					name : "Coba",
					type: "bar", 
					data: dataColumn
				};

				// chart.update()

				alert("pesanan 1")
			} else {
				if (pesanan == 2) {
					namePesanan = "Produk"
				} else if (pesanan == 3) {
					namePesanan = "Penitipan"
				} else if (pesanan == 4) {
					namePesanan = "Perawatan"
				} else if (pesanan == 5) {
					namePesanan = "Operasi"
				} else if (pesanan == 6) {
					namePesanan = "Vaksin"
				}
			}
		}


		function setDataPesanan() {
			var selectedTahun = document.getElementById("tahun")
			var tahun = selectedTahun.options[selectedTahun.selectedIndex].value
			var selectedPesanan = document.getElementById("pesanan")
			var pesanan = selectedPesanan.options[selectedPesanan.selectedIndex].value

			var dataColumn = []
			var namePesanan = ""
			// alert("tahun: "+tahun+", pesanan: "+pesanan)
			if (pesanan == 1) {
				dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
				setAllData(dataColumn, dataColumn, dataColumn, dataColumn, dataColumn)
				alert("pesanan 1")
			} else {
				if (pesanan == 2) {
					namePesanan = "Produk"
					dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
					setData(namePesanan, dataColumn)
				} else if (pesanan == 3) {
					namePesanan = "Penitipan"
					dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
					setData(namePesanan, dataColumn)
				} else if (pesanan == 4) {
					namePesanan = "Perawatan"
					dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
					setData(namePesanan, dataColumn)
				} else if (pesanan == 5) {
					namePesanan = "Operasi"
					dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
					setData(namePesanan, dataColumn)
				} else if (pesanan == 6) {
					namePesanan = "Vaksin"
					dataColumn = [23, 12, 2, 32, 42, 11, 22, 11, 43, 12, 67, 16];
					setData(namePesanan, dataColumn)
				}

			}
		}

		function setData(namePesanan, dataColumn) {
			var options = {
				chart: {
					height: 500,
					type: 'bar',
					toolbar: {
						show: false,
					},
				},
				series: [{
					name: namePesanan,
					type: 'bar',
					data: dataColumn
					// data: [323, 442, 335, 527, 143, 222, 117, 231, 322, 222, 112, 16]
				}],
				fill: {
					type: 'solid',
					opacity: [0.2, 1],
				},
				labels: [
					'Jan ' + tahun, 'Feb ' + tahun, 'Mar ' + tahun, 'Apr ' + tahun, 'Mei ' + tahun, 'Juni ' + tahun,
					'Juli ' + tahun, 'Agu ' + tahun, 'Sep ' + tahun, 'Okt ' + tahun, 'Nov ' + tahun, 'Des ' + tahun
				],
				colors: ['#08a597', '#08a597', '#666666', '#888888'],
			}

			var chart = new ApexCharts(
				document.querySelector("#hospital-line-column-graph"),
				options
			);
			chart.render();
		}

		function setAllData(produk, penitipan, perawatan, operasi, vaksin) {


		}
	</script>

</body>

</html>