<?php
require_once '../../koneksi.php';
session_start();

$id_user = $_COOKIE['id'];
$nama_user = $_COOKIE['nama'];

$checkLogin = false;
$checkToko = false;

// Login
if(isset($_COOKIE['id'])){
	$checkLogin = true;
} else{
	$checkLogin = false;
    header("location:../../login/");
}

if (isset($_SESSION['id_toko'])) {
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
    header("location:../toko/");
 }

  $arraySemuaData = array();

  $queryMemisahkanBerdasaknaIdJenisHewan = mysqli_query($koneksi, "SELECT * FROM `perawatan` WHERE id_toko='$id_toko' ORDER BY jenis_hewan ASC ");
  while ($row = mysqli_fetch_assoc($queryMemisahkanBerdasaknaIdJenisHewan)) {
    $id_perawatan = $row['id_perawatan'];
    $id_toko = $row['id_toko'];
    $jenis_hewan = $row['jenis_hewan'];
    $jenis_perawatan = $row['jenis_perawatan'];
    $harga = $row['harga'];

    // $arrayData = array(
    //   "id_perawatan" => $id_perawatan,
    //   "id_toko" => $id_toko,
    //   "jenis_hewan" => $jenis_hewan,
    //   "jenis_perawatan" => $jenis_perawatan,
    //   "harga" => $harga
    // );

    $arrayData = array(
      $id_perawatan,
      $id_toko,
      $jenis_hewan,
      $jenis_perawatan,
      $harga
    );
    array_push($arraySemuaData, $arrayData);

  };

  $jsonArray = json_encode($arraySemuaData);


  $id_pemesanan = "100";
  $queryPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` ORDER BY id_pemesanan ");
  $jumRow = mysqli_num_rows($queryPemesanan);
  $dataIdPemesanan1 = mysqli_fetch_array($queryPemesanan);

  if ($jumRow > 0) {
      $queryCekIdPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE id_user='$id_user' AND ket='0' ORDER BY id_pemesanan ");
      $jumRow = mysqli_num_rows($queryCekIdPemesanan);
      $dataIdPemesanan2 = mysqli_fetch_array($queryCekIdPemesanan);

      if ($jumRow > 0) {
        $id_pemesanan = $dataIdPemesanan2['id_pemesanan'];  
      } else{
        $id_pemesanan = $dataIdPemesanan1['id_pemesanan']+1;  
      }
  } else{
      $id_pemesanan = "100";
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
    <title>Vaksin</title>
    <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
    <![endif]-->
    <!-- Font files -->
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
                        <!-- Start Social Links -->
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
                        <!-- menu item -->
                        <li class="nav-item">
							<a class="nav-link" href="../toko/detail-toko.php?toko=<?=$id_toko?>"><?=$nama_toko?>
							</a>
						</li>
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

							<li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pelayanan
                                </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../penitipan/">Penitipan</a></li>
                                    <li><a class="dropdown-item" href="../perawatan/">Perawatan</a></li>
                                    <li><a class="dropdown-item" href="../operasi/">Operasi</a></li>
                                    <li><a class="dropdown-item active" href="../vaksin/">Vaksin</a></li>
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
                        <li class="nav-item">
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
                        <a href="./">
                            <i class="flaticon-people-1 icon_br"></i>
                        </a>
                        <p class="ket-menu"><b>Beranda</b></p>
                    </td>
                    <td align="center" width="20%">
                        <a href="toko.php">
                            <i class="flaticon-dog-2 icon_br"></i>
                        </a>
                        <p class="ket-menu"><b>Toko</b></p>
                    </td>
                    <td align="center" width="20%">
                        <a href="services.php">
                            <i class="flaticon-dog-with-first-aid-kit-bag icon_br active1"></i>
                        </a>
                        <p class="ket-menu active1"><b>Pelayanan</b></p>
                    </td>
                    <td align="center" width="20%">
                        <a href="produk.php">
                            <i class="flaticon-food icon_br"></i>
                        </a>
                        <p class="ket-menu"><b>Produk</b></p>
                    </td>
                    <td align="center" width="20%">
                        <a href="../profile/">
                            <i class="flaticon-placeholder icon_br"></i>
                        </a>
                        <p class="ket-menu"><b>Profil</b></p>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /navbar -->
    </nav>
    <!-- /nav -->
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;" data-top-bottom="background-size: 110%;">
        <div class="container">
            <!-- jumbo-heading -->
            <div class="jumbo-heading" data-aos="fade-up">
                <h1>Pesanan</h1>
                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="../toko/detail-toko.php?toko=<?= $id_toko ?>"><?= $nama_toko ?></a></li>
                        <li class="breadcrumb-item" aria-current="page">Operasi</li>
                    </ol>
                </nav>
                <!-- /breadcrumb -->
            </div>
            <!-- /jumbo-heading -->
        </div>
        <!-- /container -->
    </div>
    <!-- /jumbotron -->
    <!-- ==== Page Content ==== -->
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="sidebar col-lg-3 res-margin bg-light card h-50 pattern3">
                    <div class="widget-area">
                        <h5 class="sidebar-header">Layanan Kami</h5>
                        <div class="list-group">
                            <a href="../penitipan/?toko=<?= $id_toko ?>" class="list-group-item list-group-item-action">Penitipan</a>
                            <a href="../perawatan/?toko=<?= $id_toko ?>" class="list-group-item list-group-item-action">Perawatan</a>
                            <a href="../operasi/?toko=<?= $id_toko ?>" class="list-group-item list-group-item-action">Operasi</a>
                            <a href="../vaksin/?toko=<?= $id_toko ?>" class="list-group-item list-group-item-action active">Vaksin</a>
                        </div>
                        <!-- /list-group -->
                    </div>
                    <!-- /widget-area -->
                </div>
                <!-- page with sidebar starts -->
                <div class="col-lg-9 page-with-sidebar">
                    <h2>Input Data Dengan Benar</h2>
                    <!-- Image -->
                    <form action="vaksin-post.php" method="POST">
                        <input type="text" name="id_toko" class="form-control" id="id_toko" value="<?=$id_toko?>" hidden>
                        <input type="text" name="id_user" class="form-control" id="id_user" value="<?=$id_user?>" hidden>
                        <input type="text" name="id_toko" class="form-control" id="id_toko" value="<?=$id_toko?>" hidden>
                        <div class="form-group">
                            <label for="nama_hewan">Nama Hewan</label>
                            <input type="text" name="nama_hewan" class="form-control" id="nama_hewan" placeholder="Nama Hewan" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_hewan">Jenis Hewan</label>
                            <select name="jenis_hewan" class="form-control" id="jenis_hewan" required>
                                <option></option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM `jenis_hewan` WHERE id_toko='$id_toko' ");
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $id_jenis_hewan = $row['id_jenis_hewan'];
                                    $id_toko = $row['id_toko'];
                                    $jenis_hewan = $row['jenis_hewan'];

                                    $queryCekJenisHewan = mysqli_query($koneksi, "SELECT * FROM `vaksin` WHERE jenis_hewan='$id_jenis_hewan' ");
                                    $rowCekJenisHewan = mysqli_num_rows($queryCekJenisHewan);
                                    $data = mysqli_fetch_array($queryCekJenisHewan);
                                    if ($rowCekJenisHewan > 0) {
                                        $id_vaksin = $data['id_vaksin'];
                                        $vaksin1 = $data['vaksin_1'];
                                        $vaksin2 = $data['vaksin_2'];
                                        $vaksin3 = $data['vaksin_3'];
                                ?>
                                        <!-- <option value="<?= $id_vaksin . ";" . $vaksin1 . ";" . $vaksin2 . ";" . $vaksin3 ?>"><?= $jenis_hewan ?></option> -->
                                        <option value="<?= $id_vaksin ?>"><?= $jenis_hewan ?></option>

                                <?php
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleFormControlInput1">Usia Hewan</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Usia Hewan">
                        </div> -->
                        <div class="form-group">
                            <label for="vaksin">Vaksin Ke-</label>
                            <select name="vaksin_ke" class="form-control" id="vaksin">
                                <!-- <option>- Pilih -</option> -->
                                <option value="1">Pertama</option>
                                <option value="2">Kedua</option>
                                <option value="3">Ketiga</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
  						<label for="exampleFormControlInput1">Pengantaran</label>
  						<select name="" class="form-control" id="exampleFormControlInput1">
  							<option>- Pilih -</option>
  							<option>Dijemput</option>
  							<option>Antar Ketoko</option>
  						</select>
  					</div> -->
                        <!-- <div class="form-group">
  						<label for="exampleFormControlInput1">Antar</label>
  						<select name="" class="form-control" id="exampleFormControlInput1">
  							<option>- Pilih -</option>
  							<option>Kurir</option>
  							<option>Ambil Ketoko</option>
  						</select>
  					</div> -->
                        <div class="form-group">
                            <label for="metode_pembayaran">Metode Pembayaran</label>
                            <select name="metode_pembayaran" class="form-control" id="metode_pembayaran" required>
                                <option value="bayar_online">Bayar Online</option>
                                <option value="bayar_ditempat">Bayar Di Tempat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="3" name="pesan"></textarea>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="pesan_vaksin" class="btn btn-primary mt-3">Lanjutkan Pesanan</button>
                        </div>
                    </form>
                    <!-- /row -->
                </div>
                <!-- /col-lg-9 -->
                <!-- ==== Sidebar ==== -->
                
                <!-- /sidebar -->
            </div>
            <!-- /row-->
        </div>
        <!-- /container-->
    </div>
    <!--/container-fluid-->
    <!-- ==== footer ==== -->
    <footer class="bg-light pattern1 m-bottom no-img">
        <div class="container">
            <div class="row">
                <div class="credits col-sm-12">
                    <p>Copyright 2022 / Designed by <a href="http://www.ingridkuhn.com">Simpel Aja Studio</a></p>
                </div>
            </div>
            <!--/col-lg-12-->
        </div>
        <!--/ container -->
        <!-- Go To Top Link -->
        <div class="page-scroll hidden-sm hidden-xs media1">
            <a href="#top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
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