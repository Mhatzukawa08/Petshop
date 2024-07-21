<?php
require_once '../../koneksi.php';

session_start();

$id_user = $_COOKIE['id'];
$nama_user = $_COOKIE['nama'];

$id_pemesanan = $_GET['pesanan'];

$nama_toko_session = "";
$nama_toko = "";

if (isset($_GET['toko'])) {
	$id_toko = $_GET['toko'];
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

$checkLogin = false;
$checkToko = false;

// Login
if(isset($_COOKIE['id'])){
	$checkLogin = true;
} else{
	$checkLogin = false;
}

// Session
if(isset($_SESSION['id_toko'])){
	$checkToko = true;

	$id_toko_session = $_SESSION['id_toko'];

	$query = mysqli_query($koneksi, "SELECT * FROM `toko` WHERE id_toko='$id_toko_session' ");
	$dataSsession = mysqli_fetch_array($query);

	$nama_toko_session = $dataSsession['nama_toko'];
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
	<title><?= $nama_toko ?></title>
	<!--[if lt IE 9]>
      <script src="js/respond.js"></script>
  <![endif]-->
	<!-- Font files -->
	<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
	<link href="../../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
	<link href="../../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
	<!-- Fav icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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
								<a class="nav-link" href="../toko/detail-toko.php?toko=<?=$id_toko?>"><?=$nama_toko_session?>
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
	<div class="page container">
		<div class="row layanan">
			<!-- page  starts -->
			<div class="col-lg-12">
				<div class="row">

					<div class="col-lg-12 mt-2">
						<table border="0" width="100%" class="bg-light rounded">
							<tr>
								<td>
									<table border="0" width="100%" class="bg-light">
										<tr>
											<td>
												<label class="text-dark ml-2"><b><?= $nama_toko ?></b></label>
											</td>
										</tr>
									</table>
									<hr style="margin-top: 1px; margin-bottom: 5px;">
								</td>
							</tr>
							<tr>
								<td align="center">
									<?php
									$total_semua_harga = 0;
									$total_semua_jumlah = 0;
									$queryPesananProduk = mysqli_query($koneksi, "SELECT * FROM pesanan_produk WHERE id_pemesanan='$id_pemesanan' ");
									while ($row = mysqli_fetch_assoc($queryPesananProduk)) {
										$id_produk = $row['id_produk'];
										$jumlah = $row['jumlah'];
										$harga = $row['harga'];
										$total_harga = $row['total_harga'];
										$waktu = $row['waktu'];

										$id_pemesanan = $row['id_pemesanan'];

										$total_semua_harga += $total_harga;
										$total_semua_jumlah += $jumlah;

										// Produk
										$queryProduk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk' ");
										$dataProduk = mysqli_fetch_array($queryProduk);
										$nama_produk = $dataProduk['nama_produk'];
										$jenis_produk = $dataProduk['jenis_produk'];
										$harga = $dataProduk['harga'];
										$stok = $dataProduk['stok'];
										$gambar = $dataProduk['gambar'];
										$tanggal = $dataProduk['tanggal'];
									?>
										<hr style="margin-top: 1px; margin-bottom: 5px;">
										<table border="0" width="95%" class="bg-light">
											<tr>
												<td width="8" rowspan="4">
													<img src="../../gambar/produk/<?= $gambar ?>" width="100" data-toggle="modal" data-target="#exampleModal<?= $id_produk ?>">
												</td>
											</tr>
											<tr>
												<td>
													<label class="text-dark" style="margin-left: 10px;"><b><?= $nama_produk ?></b></label>
												</td>
											</tr>
											<tr>
												<td align="right">
													<label class="text-dark"><b>x<?= $jumlah ?></b></label>
												</td>
											</tr>
											<tr>
												<td align="right">
													<label class="text-dark"><b><?= rupiah($total_harga) ?></b></label>
												</td>
											</tr>
										</table>

									<?php
									}
									?>
									<!-- <table border="0" width="95%" class="bg-light">
  										<tr>
  											<td width="8" rowspan="4">
  												<img src="https://petshopindonesia.com/wp-content/uploads/2022/12/i100241-khusus-gojek-whiskas-tuna-7-kg-makanan-kucing-1-1.jpeg.webp" width="100">
  											</td>
  										</tr>
  										<tr>
  											<td>
  												<label class="text-dark"><b>Whiskas</b></label>
  											</td>
  										</tr>
  										<tr>
  											<td align="right">
  												<label class="text-dark"><b>x1</b></label>
  											</td>
  										</tr>
  										<tr>
  											<td align="right">
  												<label class="text-danger"><b>Rp. 100.000</b></label>
  											</td>
  										</tr>
  									</table> -->
								</td>
							</tr>
							<tr>
								<td>
									<hr style="margin-top: 1px; margin-bottom: 5px;">
									<table border="0" width="100%" class="bg-light">
										<tr>
											<td>
												<label class="text-dark ml-2"><b><?= $total_semua_jumlah ?> Produk</b></label>
											</td>
											<td align="right" width="100">
												<label class="text-danger mr-2"><b><?= rupiah($total_semua_harga) ?></b></label>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="pesanProduk" tabindex="-1" aria-labelledby="pesanProdukLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
						<div class="modal-content">
							<form action="post-keranjang-belanja.php" method="post">
								<div class="modal-header">
									<h5 class="modal-title" id="pesanProdukLabel">Pesan Produk</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<input class="form-control" type="text" name="id_user" id="id_user" value="<?=$id_user?>" hidden>
									<input class="form-control" type="text" name="id_toko" id="id_toko" value="<?=$id_toko?>" hidden>
									<input class="form-control" type="text" name="id_pemesanan" id="id_pemesanan" value="<?=$id_pemesanan?>" hidden>
									<div class="form-group mb-3">
										<label for="jumlah">Total Harga</label>
										<label class="form-control"><?=rupiah($total_semua_harga)?></label>
									</div>
									<div class="form-group mb-3">
										<label for="metode_pembayaran">Metode Pembayaran</label>
										<select name="metode_pembayaran" class="form-control" id="metode_pembayaran" required>
											<option value="bayar_online">Bayar Online</option>
											<option value="bayar_ditempat">Bayar Di Tempat</option>
										</select>
									</div>
									<div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                       <button type="submit" id="pesan_produk" name="pesan_produk" class="btn btn-primary">Pesan</button>
                                    </div>
								</div>
							</form>
						</div>
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

	<footer class="bg-light pattern1 no-img">
		<div class="container">
			<
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
	<script>
		function valid() {

			const fileInput = document.querySelector('.inputGambar');
			var filePath = fileInput.value;
			var allowdExternasions = /(\.jpg|\.jpeg|\.png|\.gif|\.mp4|)$/i;

			if (fileInput.files && fileInput.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.querySelector('#img').setAttribute('src', e.target.result);

				};

				reader.readAsDataURL(fileInput.files[0]);

			}
		}
	</script>
	<script src="../../vendor/jquery/jquery.min.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Custom Js -->
	<script src="../../js/custom.js"></script>
	<script src="../../js/plugins.js"></script>
	<!-- Prefix free -->
	<script src="../../js/prefixfree.min.js"></script>
	<script src="../../js/map.js"></script>

	<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>