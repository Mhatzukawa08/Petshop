<?php 
	require_once '../../koneksi.php';
	session_start();
 
	$checkLogin = false;
	$checkToko = false;
 
	// Login
	if(isset($_COOKIE['id'])){
	   $checkLogin = true;
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
  		<div class="container-fluid top-bar" >
  			<div class="container">
  				<div class="row">
  					<div class="col-md-12">
  						<ul class="social-list float-right list-inline">
  							<li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
  							<li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
  							<li class="list-inline-item"><a  title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
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
  	<!-- /nav -->
  	<!-- Jumbotron -->
  	<div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
  	data-top-bottom="background-size: 110%;">
  	<!-- /container -->
  </div>
  <!-- /jumbotron -->
  <!-- ==== Page Content ==== -->
  <div class="page container">
  	<div class="row">
  		<!-- page  starts -->
  		<div class="col-lg-12">
  			<div class="row">
  				<!-- event 1 -->		 
  				<div class="col-lg-12">
  					<div class="col-lg-14 bg-light shadow-sm rounded">
  						<a href="layanan.php">
  							<div class="col-lg-12">
  								<i class="flaticon-vet-with-cat text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Layanan</b></label>
  							</div>
  						</a>
  						<!-- <a href="layanan.php">
  							<div class="col-lg-12">
  								<i class="flaticon-vet-with-cat text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Konsultasi</b></label>
  							</div>
  						</a> -->
  					</div>
  					<br>
  					<div class="col-lg-14 bg-light shadow-sm rounded">
  						<a href="keranjang-belanja.php">
  							<div class="col-lg-12">
  								<i class="flaticon-pet-carrier text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Keranjang Produk</b></label>
  							</div>
  						</a>
						<a href="pesanan.php">
  							<div class="col-lg-12">
  								<i class="flaticon-pet-carrier text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Riwayat pesanan produk</b></label>
  							</div>
  						</a>
						  <!-- <a href="riwayat-pesanan.php">
  							<div class="col-lg-12">
  								<i class="flaticon-pet-carrier text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Riwayat Pesanan</b></label>
  							</div>
  						</a> -->
						<!-- <a href="dikemas.php">
  							<div class="col-lg-12">
  								<i class="flaticon-pet-carrier text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Dikemas</b></label>
  							</div>
  						</a>
  						<a href="dikirim.php">
  							<div class="col-lg-12">
  								<i class="flaticon-dog-3 text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Dikirim</b></label>
  							</div>
  						</a>
  						<a href="selesai.php">
  							<div class="col-lg-12">
  								<i class="flaticon-prize-badge-with-paw-print text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Selesai</b></label>
  							</div>
  						</a> -->
  					</div>
  					<br>
  					<div class="col-lg-14 bg-light shadow-sm rounded">
  						<a href="profile.php">
  							<div class="col-lg-12">
  								<i class="flaticon-animal-13 text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Pengaturan Akun</b></label>
  							</div>
  						</a>
  					</div>
  					<br>
  					<div class="col-lg-14 bg-light shadow-sm rounded">
  						<a href="../../?logout">
  							<div class="col-lg-12">
  								<i class="flaticon-pawprint-3 text-dark h4"></i>
  								<label class="text-dark h6 ml-2"><b>Keluar</b></label>
  							</div>
  						</a>
  					</div>
  				</div>
  				<!--/card-body text-center -->
  				<!-- /card --> 
  			</div>
  			<!--/widget2 -->			
  		</div>
  		<!-- row -->	
  		<!-- /col-md -->
  	</div>
  	<!-- /col-lg-12 -->
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