<?php
	require_once '../../koneksi.php';
	session_start();

	$nama = "-";
	$nomor_hp = "-";
	$alamat = "-";
	$tanggal = "-";
	$id_pelanggan = "-";

	$checkLogin = false;
	$checkToko = false;
	
	// Login
	include '../notifikasi.php';

	if(isset($_COOKIE['id'])){
	   	$checkLogin = true;
		
	   	$id_user = $_COOKIE['id'];
		$nama_user = $_COOKIE['nama'];

		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
		$data = mysqli_fetch_assoc($query);

		$nama = $data['nama'];
		$nomor_hp = $data['nomor_hp'];
		$alamat = $data['alamat'];
		$tanggal = $data['tanggal'];
		$id_pelanggan = $data['id_pelanggan'];
	} else{
		$checkLogin = false;
	}

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
	<title>Profile</title>
	<!--[if lt IE 9]>
      <script src="js/respond.js"></script>
  <![endif]-->
	<!-- Font files -->
	<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
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
						<a href="profile.php">
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
			<!-- <div class="col" style="margin-top: 20px;">
				<label for="">Nama</label>
				<input type="text" class="form-control" placeholder="Nama" aria-label="Nama">
			</div> -->
			<div class="col-md-6">
				<label for="nama" class="form-label">Nama</label>
				<label class="form-control" id="nama" style="margin-top: -5px;"><?=$nama?></label>
			</div>
			<div class="col-md-6">
				<label for="nomor" class="form-label">Nomor HP</label>
				<label class="form-control" id="nomor" style="margin-top: -5px;"><?=$nomor_hp?></label>
			</div>
			<div class="col-12 mt-2">
				<label for="alamat" class="form-label">Alamat</label>
				<label class="form-control" style="margin-top: -5px;"><?=$alamat?></label>
			</div>
			<div class="col-12 mt-2">
				<label for="id_pelanggan" class="form-label">id_pelanggan</label>
				<label class="form-control" style="margin-top: -5px;"><?=$id_pelanggan?></label>
			</div>
			<div class="col-12 mt-2">
				<button type="submit" class="btn btn-primary" style="width: 100%;" data-bs-toggle="modal" data-bs-target="#editData">Edit Data</button>
			</div>

			<div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataModal" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editDataModal">Update Data</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="profile-post.php" method="post">
							<div class="modal-body">
								<div class="mb-2">
									<label for="nama" class="form-label">Nama</label>
									<input type="text" class="form-control" id="id_user" name="id_user" value="<?=$id_user?>" hidden>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?=$nama?>" >
								</div>
								<div class="mb-2">
									<label for="nomor_hp" class="form-label">Nomor Hp</label>
									<input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Masukkan Nomor Hpp" value="<?=$nomor_hp?>" >
								</div>
								<div class="mb-2">
									<label for="alamat" class="form-label">Alamat</label>
									<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?=$alamat?>" >
								</div>
								<div class="mb-2">
									<label for="id_pelanggan" class="form-label">id_pelanggan</label>
									<label class="form-control" ><?=$id_pelanggan?></label>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary" name="post_profile">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

	<footer class="bg-light pattern1 m-bottom no-img">
		<div class="container">
			<div class="row">
				<!-- <div class="credits col-sm-12">
					<p>Copyright 2022 / Designed by <a href="http://www.ingridkuhn.com">Simpel Aja Studio</a></p>
				</div> -->
			</div>
			<!--/col-lg-12-->
		</div>
		<!--/ container -->
		<!-- Go To Top Link -->
		<div class="page-scroll hidden-sm hidden-xs">
			<!-- <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a> -->
		</div>
		<!--/page-scroll-->
	</footer>
	<!-- <script src="../../vendor/jquery/jquery.min.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../js/custom.js"></script>
	<script src="../../js/plugins.js"></script>
	<script src="../../js/prefixfree.min.js"></script> -->

	<script src="../../vendor/jquery/jquery.min.js"></script>
   <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="../../js/custom.js"></script>
   <script src="../../js/plugins.js"></script>
   <script src="../../js/prefixfree.min.js"></script>
   <script src="../../js/map.js"></script>

	<script>
		// var myModal = document.getElementById('myModal')
		// var myInput = document.getElementById('myInput')

		// myModal.addEventListener('shown.bs.modal', function () {
		// 	myInput.focus()
		// })
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	   
</body>

</html>