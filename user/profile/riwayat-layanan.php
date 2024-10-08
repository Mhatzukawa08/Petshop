<?php 
	require_once '../../koneksi.php';
	session_start();

	$id_user = $_COOKIE['id'];
	$nama_user = $_COOKIE['nama'];
 
	$checkLogin = false;
	$checkToko = false;
 
	// Login
	include '../notifikasi.php';
 
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
    	<title>Pesanan Layanan</title>
      <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
    <![endif]-->
    	<!-- Font files -->
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
    					<!-- event 1 -->		 
    					<?php 
							$queryPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_penitipan WHERE id_user='$id_user' AND ket='1' ");
							while ($row = mysqli_fetch_assoc($queryPenitipan)) {
								$keterangan = "Belum Ada aksi";

								$jenis_pesanan = "Penitipan";

								$id_pesanan_penitipan = $row['id_pesanan_penitipan'];
								$kode_unik = $row['kode_unik'];
								$id_toko = $row['id_toko'];
								$id_user = $row['id_user'];
								$nama_hewan = $row['nama_hewan'];
								$jenis_hewan = $row['jenis_hewan'];
								$tanggal_penitipan = $row['tanggal_penitipan'];
								$jumlah_hari = $row['jumlah_hari'];
								$metode_pembayaran = $row['metode_pembayaran'];
								$pesan = $row['pesan'];
								$harga_perhari = $row['harga_perhari'];
								$harga_makanan = $row['harga_makanan'];
								$total_harga = $row['total_harga'];
								$bayar = $row['bayar'];
								$ket = $row['ket'];
								$waktu = $row['waktu'];

								$queryToko = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko' ");
								$dataToko = mysqli_fetch_array($queryToko);

								$nama_toko = $dataToko['nama_toko'];
								$nomor_hp = $dataToko['nomor_hp'];
								$alamat = $dataToko['alamat'];
								$nama_pemilik = $dataToko['nama_pemilik'];
								$gambar_toko = $dataToko['gambar_toko'];
								$link_instagram = $dataToko['link_instagram'];
								$hari_operasional = $dataToko['hari_operasional'];
								$jam_operasional = $dataToko['jam_operasional'];
								$tanggal = $dataToko['tanggal'];

								// Dokumentasi Terakhir
								$queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id_pilihan_pesanan='1' 
									AND id_pesanan='$id_pesanan_penitipan' ORDER BY waktu DESC ");
								$jumlahRow = mysqli_num_rows($queryDokumentasi);
								$dataDokumentasi = mysqli_fetch_array($queryDokumentasi);

								if($jumlahRow>0){
									$keterangan = $dataDokumentasi['keterangan'];
									$gambar = $dataDokumentasi['gambar'];
									$waktu = $dataDokumentasi['waktu'];
								}

								?>
								<div class="col-lg-4 mt-4">
									<table border="0" width="100%" class="bg-light rounded">
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<!-- <td width="22%">
															<img src="../../img/logo.png" width="50" class="ml-2">
														</td> -->
														<td>
															<label class="text-dark" style="margin-left: 12px;"><b><?=$nama_toko?></b></label>
														</td>
														<td align="right">
															<label class="text-danger mr-2"><b>Selesai</b></label>
														</td>
													</tr>
												</table><hr style="margin-top: 1px; margin-bottom: 5px;">
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" cellpadding="10">
													<tr>
														<td width="8">
															<i class="flaticon-pet-shelter text-dark h1"></i>
														</td>
														<td>
															<label class="text-dark"><b><?=$jenis_pesanan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td><hr style="margin-top: 10px; margin-bottom: 1px;">
												<a href="detail-penitipan.php?id_pesanan=<?=$id_pesanan_penitipan?>">
													<table border="0" width="100%" class="bg-success">
														<tr>
															<td align="center">
																<b class="text-white">Lihat Dokumentasi</b>
															</td>
														</tr>
													</table><hr style="margin-top: 1px; margin-bottom: 5px;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Nama Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$nama_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jenis Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jenis_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Tanggal Penitipan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$tanggal_penitipan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jumlah Hari</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jumlah_hari?> Hari</b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Total Harga</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b>Rp. <?=$total_harga?></b></label>
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
															<!-- <i class="flaticon-grooming-1 text-success ml-2"></i> -->
															<label class="text-success" style="margin-left: 8px; margin-right: 8px;"><b><?=$keterangan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
								<?php
							}
						?>
							
						<?php
						?>
					</div>

					<div class="row">
						<?php 
							$queryPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_perawatan WHERE id_user='$id_user' AND ket='1' AND id_pemesanan>0 
							GROUP BY id_pemesanan HAVING count(*) > 0 ");
							// SELECT * FROM riwayat_pesanan WHERE id_user='$id_user' AND selesai='0' AND id_pemesanan>0 
                            //              GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC
							while ($row = mysqli_fetch_assoc($queryPenitipan)) {
								$keterangan = "Belum Ada aksi";

								$jenis_pesanan = "Perawatan";

								$id_pesanan_perawatan = $row['id_pesanan_perawatan'];
								$id_pemesanan = $row['id_pemesanan'];
								$kode_unik = $row['kode_unik'];
								$id_toko = $row['id_toko'];
								$id_user = $row['id_user'];
								$nama_hewan = $row['nama_hewan'];
								$id_perawatan = $row['id_perawatan'];
								$metode_pembayaran = $row['metode_pembayaran'];
								$pesan = $row['pesan'];
								$ket = $row['ket'];
								$waktu = $row['waktu'];

								// Toko
								$queryToko = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko' ");
								$dataToko = mysqli_fetch_array($queryToko);

								$nama_toko = $dataToko['nama_toko'];
								$nomor_hp = $dataToko['nomor_hp'];
								$alamat = $dataToko['alamat'];
								$nama_pemilik = $dataToko['nama_pemilik'];
								$gambar_toko = $dataToko['gambar_toko'];
								$link_instagram = $dataToko['link_instagram'];
								$hari_operasional = $dataToko['hari_operasional'];
								$jam_operasional = $dataToko['jam_operasional'];
								$tanggal = $dataToko['tanggal'];

								$jenis_hewan = "";
								$total_harga = 0;
								$jumlah = 0;
								$jenis_perawatan = "";

								// Perawatan
								$queryCariPesananPerawatan = mysqli_query($koneksi, "SELECT * FROM pesanan_perawatan WHERE id_pemesanan='$id_pemesanan' ");
								while ($rowCariPesananPerawatan = mysqli_fetch_assoc($queryCariPesananPerawatan)) {
									$id_perawatan = $rowCariPesananPerawatan['id_perawatan'];
									$queryPerawatan = mysqli_query($koneksi, "SELECT * FROM perawatan WHERE id_perawatan='$id_perawatan' ");
									$dataPerawatan = mysqli_fetch_array($queryPerawatan);
	
									$id_jenis_hewan = $dataPerawatan['jenis_hewan'];
									$jenis_perawatan .= $dataPerawatan['jenis_perawatan'].", ";
									$total_harga += $dataPerawatan['harga'];

									$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan' ");
									$dataJenisHewan = mysqli_fetch_array($queryJenisHewan);
	
									$jenis_hewan = $dataJenisHewan['jenis_hewan'];

									$jumlah++;
									
								}

								// Dokumentasi Terakhir
								$queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id_pilihan_pesanan='2' 
									AND id_pesanan='$id_pesanan_perawatan' ORDER BY waktu DESC ");
								$jumlahRow = mysqli_num_rows($queryDokumentasi);
								$dataDokumentasi = mysqli_fetch_array($queryDokumentasi);

								if($jumlahRow>0){
									$keterangan = $dataDokumentasi['keterangan'];
									$gambar = $dataDokumentasi['gambar'];
									$waktu = $dataDokumentasi['waktu'];
								}

								// $queryPerawatan = mysqli_query($koneksi, "SELECT * FROM perawatan WHERE id_perawatan='$id_perawatan' ");
								// $dataPerawatan = mysqli_fetch_array($queryPerawatan);

								// $nama_toko = $dataToko['nama_toko'];
								// $nomor_hp = $dataToko['nomor_hp'];
								// $alamat = $dataToko['alamat'];
								// $nama_pemilik = $dataToko['nama_pemilik'];
								// $gambar_toko = $dataToko['gambar_toko'];
								// $link_instagram = $dataToko['link_instagram'];
								// $hari_operasional = $dataToko['hari_operasional'];
								// $jam_operasional = $dataToko['jam_operasional'];
								// $tanggal = $dataToko['tanggal'];

								?>
								<div class="col-lg-4 mt-4">
									<table border="0" width="100%" class="bg-light rounded">
									<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<!-- <td width="22%">
															<img src="../../img/logo.png" width="50" class="ml-2">
														</td> -->
														<td>
															<label class="text-dark" style="margin-left: 12px;"><b><?=$nama_toko?></b></label>
														</td>
														<td align="right">
															<label class="text-danger mr-2"><b>Selesai</b></label>
														</td>
													</tr>
												</table><hr style="margin-top: 1px; margin-bottom: 5px;">
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" cellpadding="10">
													<tr>
														<td width="8">
															<i class="flaticon-animals-2 text-dark h1"></i>
														</td>
														<td>
															<label class="text-dark"><b><?=$jenis_pesanan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td><hr style="margin-top: 10px; margin-bottom: 1px;">
												<a href="detail-perawatan.php?id_pesanan=<?=$id_pesanan_perawatan?>">
													<table border="0" width="100%" class="bg-success">
														<tr>
															<td align="center">
																<b class="text-white">Lihat Dokumentasi</b>
															</td>
														</tr>
													</table><hr style="margin-top: 1px; margin-bottom: 5px;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Nama Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$nama_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jenis Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jenis_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jumlah Perawatan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jumlah?> Jenis</b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Total Harga</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b>Rp. <?=$total_harga?></b></label>
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
															<!-- <i class="flaticon-grooming-1 text-success ml-2"></i> -->
															<label class="text-success" style="margin-left: 8px; margin-right: 8px;"><b><?=$keterangan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
							<?php
							}
						?>
					</div>

					<div class="row">
						<?php 
							$queryPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_operasi WHERE id_user='$id_user' AND ket='1' ");
							// SELECT * FROM riwayat_pesanan WHERE id_user='$id_user' AND selesai='0' AND id_pemesanan>0 
                            //              GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC
							while ($row = mysqli_fetch_assoc($queryPenitipan)) {
								$keterangan = "Belum Ada aksi";
			
								$jenis_pesanan = "Operasi";

								$id_pesanan_operasi = $row['id_pesanan_operasi'];
								$id_pemesanan = $row['id_pemesanan'];
								$kode_unik = $row['kode_unik'];
								$id_toko = $row['id_toko'];
								$id_user = $row['id_user'];
								$nama_hewan = $row['nama_hewan'];
								$id_operasi = $row['id_operasi'];
								$metode_pembayaran = $row['metode_pembayaran'];
								$pesan = $row['pesan'];
								$ket = $row['ket'];
								$waktu = $row['waktu'];

								// Toko
								$queryToko = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko' ");
								$dataToko = mysqli_fetch_array($queryToko);

								$nama_toko = $dataToko['nama_toko'];
								$nomor_hp = $dataToko['nomor_hp'];
								$alamat = $dataToko['alamat'];
								$nama_pemilik = $dataToko['nama_pemilik'];
								$gambar_toko = $dataToko['gambar_toko'];
								$link_instagram = $dataToko['link_instagram'];
								$hari_operasional = $dataToko['hari_operasional'];
								$jam_operasional = $dataToko['jam_operasional'];
								$tanggal = $dataToko['tanggal'];

								$queryOperasi = mysqli_query($koneksi, "SELECT * FROM operasi WHERE id_operasi='$id_operasi' ");
								$dataOperasi = mysqli_fetch_array($queryOperasi);
								$id_jenis_hewan = $dataOperasi['jenis_hewan'];
								$jenis_operasi = $dataOperasi['jenis_operasi'];
								$total_harga = $dataOperasi['harga'];

								$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan' ");
								$dataJenisHewan = mysqli_fetch_array($queryJenisHewan);
								$jenis_hewan = $dataJenisHewan['jenis_hewan'];

								// Dokumentasi Terakhir
								$queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id_pilihan_pesanan='3' 
									AND id_pesanan='$id_pesanan_operasi' ORDER BY waktu DESC ");
								$jumlahRow = mysqli_num_rows($queryDokumentasi);
								$dataDokumentasi = mysqli_fetch_array($queryDokumentasi);

								if($jumlahRow>0){
									$keterangan = $dataDokumentasi['keterangan'];
									$gambar = $dataDokumentasi['gambar'];
									$waktu = $dataDokumentasi['waktu'];
								}
	

								?>
								<div class="col-lg-4 mt-4">
									<table border="0" width="100%" class="bg-light rounded">
									<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<!-- <td width="22%">
															<img src="../../img/logo.png" width="50" class="ml-2">
														</td> -->
														<td>
															<label class="text-dark" style="margin-left: 12px;"><b><?=$nama_toko?></b></label>
														</td>
														<td align="right">
															<label class="text-danger mr-2"><b>Selesai</b></label>
														</td>
													</tr>
												</table><hr style="margin-top: 1px; margin-bottom: 5px;">
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" cellpadding="10">
													<tr>
														<td width="8">
															<i class="flaticon-dog-with-first-aid-kit-bag text-dark h1"></i>
														</td>
														<td>
															<label class="text-dark"><b><?=$jenis_pesanan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td><hr style="margin-top: 10px; margin-bottom: 1px;">
												<a href="detail-operasi.php?id_pesanan=<?=$id_pesanan_operasi?>">
													<table border="0" width="100%" class="bg-success">
														<tr>
															<td align="center">
																<b class="text-white">Lihat Dokumentasi</b>
															</td>
														</tr>
													</table><hr style="margin-top: 1px; margin-bottom: 5px;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Nama Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$nama_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jenis Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jenis_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jenis Operasi</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jenis_operasi?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Total Harga</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b>Rp. <?=$total_harga?></b></label>
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
															<!-- <i class="flaticon-grooming-1 text-success ml-2"></i> -->
															<label class="text-success" style="margin-left: 8px; margin-right: 8px;"><b><?=$keterangan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
							<?php
							}
						?>
					</div>

					<div class="row">
						<?php 							
							$queryPenitipan = mysqli_query($koneksi, "SELECT * FROM pesanan_vaksin WHERE id_user='$id_user' AND ket='1' ");
							// SELECT * FROM riwayat_pesanan WHERE id_user='$id_user' AND selesai='0' AND id_pemesanan>0 
                            //              GROUP BY id_pemesanan HAVING count(*) > 0 ORDER BY id_pemesanan ASC
							while ($row = mysqli_fetch_assoc($queryPenitipan)) {
								$keterangan = "Belum Ada aksi";
							
								$jenis_pesanan = "Vaksin";

								$id_pesanan_vaksin = $row['id_pesanan_vaksin'];
								$kode_unik = $row['kode_unik'];
								$id_toko = $row['id_toko'];
								$id_user = $row['id_user'];
								$nama_hewan = $row['nama_hewan'];
								$id_vaksin = $row['id_vaksin'];
								$vaksin_ke = $row['vaksin_ke'];
								$metode_pembayaran = $row['metode_pembayaran'];
								$pesan = $row['pesan'];
								$ket = $row['ket'];
								$waktu = $row['waktu'];

								// Toko
								$queryToko = mysqli_query($koneksi, "SELECT * FROM toko WHERE id_toko='$id_toko' ");
								$dataToko = mysqli_fetch_array($queryToko);

								$nama_toko = $dataToko['nama_toko'];
								$nomor_hp = $dataToko['nomor_hp'];
								$alamat = $dataToko['alamat'];
								$nama_pemilik = $dataToko['nama_pemilik'];
								$gambar_toko = $dataToko['gambar_toko'];
								$link_instagram = $dataToko['link_instagram'];
								$hari_operasional = $dataToko['hari_operasional'];
								$jam_operasional = $dataToko['jam_operasional'];
								$tanggal = $dataToko['tanggal'];

								$queryVaksin = mysqli_query($koneksi, "SELECT * FROM vaksin WHERE id_vaksin='$id_vaksin' ");
								$dataVaksin = mysqli_fetch_array($queryVaksin);
								$id_jenis_hewan = $dataVaksin['jenis_hewan'];
								$vaksin_1 = $dataVaksin['vaksin_1'];
								$vaksin_2 = $dataVaksin['vaksin_2'];
								$vaksin_3 = $dataVaksin['vaksin_3'];

								$harga = 0;
								$vaksin = "";

								if($vaksin_ke == "1"){
									$harga = $vaksin_1;
									$vaksin = "Pertama";
								} else if($vaksin_ke == "2"){
									$harga = $vaksin_2;
									$vaksin = "Kedua";
								} else if($vaksin_ke == "3"){
									$harga = $vaksin_3;
									$vaksin = "Ketiga";
								} 

								$queryJenisHewan = mysqli_query($koneksi, "SELECT * FROM jenis_hewan WHERE id_jenis_hewan='$id_jenis_hewan' ");
								$dataJenisHewan = mysqli_fetch_array($queryJenisHewan);
								$jenis_hewan = $dataJenisHewan['jenis_hewan'];

								// Dokumentasi Terakhir
								$queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM dokumentasi WHERE id_pilihan_pesanan='4' 
									AND id_pesanan='$id_pesanan_vaksin' ORDER BY waktu DESC ");
								$jumlahRow = mysqli_num_rows($queryDokumentasi);
								$dataDokumentasi = mysqli_fetch_array($queryDokumentasi);

								if($jumlahRow>0){
									$keterangan = $dataDokumentasi['keterangan'];
									$gambar = $dataDokumentasi['gambar'];
									$waktu = $dataDokumentasi['waktu'];
								}

								?>
								<div class="col-lg-4 mt-4">
									<table border="0" width="100%" class="bg-light rounded">
									<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<!-- <td width="22%">
															<img src="../../img/logo.png" width="50" class="ml-2">
														</td> -->
														<td>
															<label class="text-dark" style="margin-left: 12px;"><b><?=$nama_toko?></b></label>
														</td>
														<td align="right">
															<label class="text-danger mr-2"><b>Selesai</b></label>
														</td>
													</tr>
												</table><hr style="margin-top: 1px; margin-bottom: 5px;">
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" cellpadding="10">
													<tr>
														<td width="8">
															<i class="flaticon-syringe text-dark h1"></i>
														</td>
														<td>
															<label class="text-dark"><b><?=$jenis_pesanan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td><hr style="margin-top: 10px; margin-bottom: 1px;">
												<a href="detail-vaksin.php?id_pesanan=<?=$id_pesanan_vaksin?>">
													<table border="0" width="100%" class="bg-success">
														<tr>
															<td align="center">
																<b class="text-white">Lihat Dokumentasi</b>
															</td>
														</tr>
													</table><hr style="margin-top: 1px; margin-bottom: 5px;">
												</a>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Nama Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$nama_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Jenis Hewan</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$jenis_hewan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Vaksin Ke</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b><?=$vaksin?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table border="0" width="100%" class="bg-light" style="margin-top: -16px;">
													<tr>
														<td>
															<label class="text-dark ml-2"><b>Harga Pervaksin</b></label>
														</td>
														<td align="right">
															<label class="text-dark mr-2"><b>Rp. <?=$harga?></b></label>
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
															<!-- <i class="flaticon-grooming-1 text-success ml-2"></i> -->
															<label class="text-success" style="margin-left: 8px; margin-right: 8px;"><b><?=$keterangan?></b></label>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</div>
							<?php
							}
						?>
					</div>
    			</div>
    			<!-- /col-lg-12 -->
    		</div>
    		<!-- /row -->
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