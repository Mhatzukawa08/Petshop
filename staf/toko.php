<?php 
	require_once '../koneksi.php';
	session_start();
 
	$checkLogin = false;
	$checkToko = false;
 
	if(isset($_COOKIE['id'])){
	  $checkLogin = true;
	  $id_user = $_COOKIE['id'];

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
								<a class="dropdown-item" href="hospital-doctors-list.html">Produk</a>
							</li>
							<li>
								<a class="dropdown-item" href="hospital-doctors-list.html">Penitipan</a>
							</li>
							<li>
								<a class="dropdown-item" href="hospital-locations.html">Perawatan</a>
							</li>
							<li>
								<a class="dropdown-item" href="hospital-reviews.html">Operasi</a>
							</li>
							<li>
								<a class="dropdown-item active-page" href="layanan-vaksin.php">Vaksin</a>
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
								<a class="dropdown-item" href="hospital-doctors-list.html">Produk</a>
							</li>
							<li>
								<a class="dropdown-item" href="hospital-doctors-list.html">Penitipan</a>
							</li>
							<li>
								<a class="dropdown-item" href="hospital-locations.html">Perawatan</a>
							</li>
							<li>
								<a class="dropdown-item" href="hospital-reviews.html">Operasi</a>
							</li>
							<li>
								<a class="dropdown-item" href="blog.html">Vaksin</a>
							</li>
						</ul>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="index.html">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
								<path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
							</svg>
							<p>Tranksaksi</p>
						</a>
					</li> -->

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
						<img src="img/bg1.jpeg" class="img-fluid mt-4" alt="">
					</div>
					<div class="col-lg-6 col-sm-12 col-12">
						<h4>RINCIAN TOKO</h4>

						<div class="mb-3 mt-4">
							<label for="nama_toko" class="form-label">Nama Toko</label>
							<input type="text" class="form-control" id="nama_toko" disabled>
						</div>
						<div class="mb-3">
							<label for="nomor_hp" class="form-label">Nomor HP</label>
							<input type="text" class="form-control" id="nomor_hp" disabled>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" class="form-control" id="alamat" disabled>
						</div>
						<div class="mb-3">
							<label for="nama_pemilik" class="form-label">Nama Pemilik</label>
							<input type="text" class="form-control" id="nama_pemilik" disabled>
						</div>
						<div class="mb-3">
							<label for="link_instagram" class="form-label">Link Instagram</label>
							<input type="text" class="form-control" id="link_instagram" disabled>
						</div>
						<div class="mb-3">
							<label for="hari_operasional" class="form-label">Hari Operasional</label>
							<input type="text" class="form-control" id="hari_operasional" disabled>
						</div>
						<button type="button" class="btn btn-primary form-control">Edit</button>
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