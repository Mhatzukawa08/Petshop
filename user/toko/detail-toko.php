<?php
   require_once '../../koneksi.php';
   session_start();

   $checkLogin = false;
   $checkToko = false;

   // setcookie("coba_data", "coba_data", time() + (86400 * 30), "/"); // // 24 jam * 7 hari = 1 Minggu

   // setcookie("sebagai", "", time()-1, "/"); // 24 jam * 7 hari = 1 Minggu
   // setcookie("id", "", time()-1, "/"); // 24 jam * 7 hari = 1 Minggu
   // setcookie("username", "", time()-1, "/"); // 24 jam * 7 hari = 1 Minggu
   // setcookie("nama", "", time()-1, "/"); // 24 jam * 7 hari = 1 Minggu


   // Login
   if(isset($_COOKIE['id'])){
     $checkLogin = true;
     $id_user = $_COOKIE['id'];
   } else{
     $checkLogin = false;
   }
   
   if (isset($_GET['toko'])) {
      $checkToko = true;
      
      $id_toko = $_GET['toko'];
      $_SESSION['id_toko'] = $id_toko;

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

      // $id_pemesanan = "100";
      // $queryPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` ORDER BY id_pemesanan ");
      // $jumRow = mysqli_num_rows($queryPemesanan);
      // $dataIdPemesanan1 = mysqli_fetch_array($queryPemesanan);

      // if ($jumRow > 0) {
      //    $queryCekIdPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_user='$id_user' AND ket='0' ORDER BY id_pemesanan ");
      //    $jumRow = mysqli_num_rows($queryCekIdPemesanan);
      //    $dataIdPemesanan2 = mysqli_fetch_array($queryCekIdPemesanan);

      //    if ($jumRow > 0) {
      //       $id_pemesanan = $dataIdPemesanan2['id_pemesanan'];  
      //    } else{
      //       $id_pemesanan = $dataIdPemesanan1['id_pemesanan']+1;  
      //    }
      // } else{
      //    $id_pemesanan = "100";
      // }

   } else {
      header("location:../toko/");
   }


   function rupiah($angka)
   {

      $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
      return $hasil_rupiah;
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
   <title>Detail Toko</title>
   <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
   <link href="../../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
   <link href="../../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">

   <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
   <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
   <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
   <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
   <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../../css/style.css" rel="stylesheet">
   <link href="../../css/plugins.css" rel="stylesheet">
   <link href="../../styles/maincolors.css" rel="stylesheet">
</head>

<body id="top">
   <div id="preloader">
      <div class="container h-100">
         <div class="row h-100 justify-content-center align-items-center">
            <div class="preloader-logo">
               <img src="../../img/logo.png" alt="" class="img-fluid">
               <div class="lds-ring">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <nav id="main-nav" class="navbar-expand-xl fixed-top">
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
            <a class="nav-brand" href="../toko/detail-toko.php?toko=<?=$id_toko?>">
               <img src="../../img/logo.png" alt="" class="img-fluid">
            </a>
            <i class="fa fa-shopping-cart text-dark media"></i>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <!-- menu item -->
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
                  <li class="nav-item active">
                     <a class="nav-link" href="detail-toko.php?toko=<?=$id_toko?>"><?=$nama_toko?>
                     </a>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item">
                     <a class="nav-link" href="../toko/">Toko
                     </a>
                  </li>
                  <!-- menu item -->
                  
                     <!-- <li class="nav-item" name="nav-pelayanan">
                        <a class="nav-link" href="../penitipan/?toko=<?=$id_toko?>">Pelayanan
                        </a>
                     </li> -->

                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Pelayanan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li><a class="dropdown-item" href="../penitipan/?toko=<?=$id_toko?>">Penitipan</a></li>
                           <li><a class="dropdown-item" href="../perawatan/?toko=<?=$id_toko?>">Perawatan</a></li>
                           <li><a class="dropdown-item" href="../operasi/?toko=<?=$id_toko?>">Operasi</a></li>
                           <li><a class="dropdown-item" href="../vaksin/?toko=<?=$id_toko?>">Vaksin</a></li>
                        </ul>
                     </li>
                  
                  <!-- menu item -->
                  <li class="nav-item">
                     <a class="nav-link" href="../produk/">Produk
                     </a>
                  </li>
                  <?php 
                     if(!$checkLogin){
                  ?>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="../../login/">Login
                        </a>
                     </li>
                  <?php
                     } else{
                  ?>
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="../profile/">Profil
                        </a>
                     </li>
                  <?php
                     }
                  ?>
                  
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
                  <a href="../">
                     <i class="flaticon-people-1 icon_br"></i>
                  </a>
                  <p class="ket-menu"><b>Beranda</b></p>
               </td>
               <td align="center" width="20%">
                  <a href="services.php">
                     <i class="flaticon-dog-with-first-aid-kit-bag icon_br"></i>
                  </a>
                  <p class="ket-menu"><b>Pelayanan</b></p>
               </td>
               <td align="center" width="20%">
                  <a href="../toko/">
                     <i class="flaticon-dog-2 icon_br active1"></i>
                  </a>
                  <p class="ket-menu active1"><b>Toko</b></p>
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
            <h1>Detail Toko</h1>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../">Beranda</a></li>
                  <li class="breadcrumb-item"><a href="../toko/">Toko</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?= $nama_toko ?></li>
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
   <div class="page container">
      <div class="row">
         <!-- page with sidebar starts -->
         <div class="col-lg-9 page-with-sidebar">
            <div class="row">
               <!-- Image -->
               <div class="col-lg-5 text-center">
                  <img src="../../gambar/toko/<?= $gambar_toko ?>" class="img-fluid rounded" alt="">
               </div>
               <!-- /col-md-5 -->
               <div class="col-lg-7">
                  <h2 class="res-margin"><?= $nama_toko ?></h2>
                  <!-- <h5 class="text-tertiary">Grosir & Eceran</h5> -->
                  <!-- custom list -->
                  <ul class="custom pl-0">
                     <li>Alamat : <?= $alamat ?></li>
                     <li>Jam Operasional : <?= $hari_operasional ?> / <?= $jam_operasional ?> </li>
                     <li>No. Telepon : +<?= $nomor_hp ?></li>
                     <!-- <li>Whatsapp : <a href="whatsapp://send?abid=<?=$nomor_hp?>&text=Maaf Mengganggu. Ingin Konsultasi">Send Message</a></li> -->
                     <li>Whatsapp : <a href="https://api.whatsapp.com/send?phone=<?=$nomor_hp?>">Send Message</a></li>
                     <li><a target="_blank" href="<?= $link_instagram ?>">Instagram</a></li>
                  </ul>
               </div>
               <!-- /col-md-7 -->
            </div>
            <!-- /ul -->
            <div class="row">
               <!-- page  starts -->
               <div class="col-lg-12">
                  <div class="btn-group mt-2" role="group" aria-label="Basic example">
                     <button type="button" class="btn btn-primary">All</button>
                     <button type="button" class="btn btn-secondary">Food</button>
                     <button type="button" class="btn btn-secondary">Aks</button>
                  </div>
                  <div class="row mt-2">
                     <!-- event 1 -->
                     <?php
                     $query = mysqli_query($koneksi, "SELECT * FROM `produk` WHERE id_toko='$id_toko' ");
                     while ($row = mysqli_fetch_assoc($query)) {
                        $id_produk = $row['id_produk'];
                        $nama_produk = $row['nama_produk'];
                        $jenis_produk = $row['jenis_produk'];
                        $harga = $row['harga'];
                        $stok = $row['stok'];
                        $gambar = $row['gambar'];
                        $tanggal = $row['tanggal'];
                     ?>

                        <div class="col-lg-4 col-6 col-md-4 mt-2">
                           <div class="card-img">
                              <!-- image event -->
                              <a href="" data-toggle="modal" data-target="#exampleModal<?= $id_produk ?>">
                                 <img class="card-img-top img-product1" src="../../gambar/produk/<?= $gambar ?>" alt="">
                              </a>
                           </div>
                           <div class="card-body text-left">
                              <!-- event info -->
                              <a href="" data-toggle="modal" data-target="#exampleModal<?= $id_produk ?>">
                                 <h6 class="card-title"><?= $nama_produk ?></h6>
                              </a>
                              <ul class="list-unstyled colored-icons">
                                 <li><span><?= $jenis_produk ?></span></li>
                                 <li><span>Stok: <?= $stok ?></span></li>
                                 <li><span></i>Harga: <?= rupiah($harga) ?></span></li>
                              </ul>
                              <!-- button -->
                           </div>
                           <!--/card-body text-center -->
                           <!-- /card -->
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $id_produk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                              <div class="modal-content">
                                 <form action="toko-post.php" method="post">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel"><?= $nama_produk ?></h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <img class="card-img-top img-product" src="../../gambar/produk/<?= $gambar ?>" alt="">
                                       <label><?= rupiah($harga) ?></label>
                                       <div class="form-group mb-3">
                                          <label for="jumlah">Masukkan Jumlah</label>
                                          <input class="form-control" type="number" name="jumlah" id="jumlah" minlength="1" maxlength="3" min="1" max="<?=$stok?>" value="1" required>
                                          <!-- <input class="form-control" type="text" hidden name="id_pemesanan" id="id_pemesanan" value="<?= $id_pemesanan ?>"> -->
                                          <input class="form-control" type="text" hidden name="id_user" id="id_user" value="<?= $id_user ?>">
                                          <input class="form-control" type="text" hidden name="id_produk" id="id_produk" value="<?= $id_produk ?>">
                                          <input class="form-control" type="text" hidden name="harga" id="harga" value="<?= $harga ?>">
                                          <input class="form-control" type="text" hidden name="id_toko" id="id_toko" value="<?= $id_toko ?>">
                                          <input class="form-control" type="text" hidden name="stok" id="stok" value="<?= $stok ?>">
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                       <?php 
                                          if($checkLogin){
                                             echo '
                                                <button type="submit" id="tambah_pesanan_produk" name="tambah_pesanan_produk" class="btn btn-primary">Pesan</button>
                                             ';
                                          } else{
                                             echo '
                                                <a href="../../login/" class="btn btn-primary">Pesan</a>
                                             ';
                                          }
                                       ?>
                                       <!-- <button type="submit" id="tambah_pesanan_produk" name="tambah_pesanan_produk" class="btn btn-primary">Pesan</button> -->
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>

                     <?php
                     }
                     ?>


                     <!-- <div class="col-lg-4 col-6 col-md-4 mt-2">
                        <div class="card-img">
                           <a href="event-single.html">
                              <img class="card-img-top img-product" src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//89/MTA-3192155/jerhigh_jerhigh-duo-milky-strawberry-makanan-hewan--50-g-_full02.jpg" alt="">
                           </a>
                        </div>
                        <div class="card-body text-left">
                           <a href="event-single.html">
                              <h6 class="card-title">NYC Adoption Fair</h6>
                           </a>
                           <ul class="list-unstyled colored-icons">
                              <li><span><i class="fas fa-calendar-alt mr-2"></i>2th February at 4pm</span></li>
                              <li><span><i class="fas fa-map-marker-alt mr-2"></i>Washington Square Park</span></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-4 col-6 col-md-4 mt-2">
                        <div class="card-img">
                           <a href="event-single.html">
                              <img class="card-img-top img-product" src="https://lzd-img-global.slatic.net/g/p/1fb3e5366b7a7d489a4babaf883adc55.jpg_720x720q80.jpg_.webp" alt="">
                           </a>
                        </div>
                        <div class="card-body text-left">
                           <a href="event-single.html">
                              <h6 class="card-title">NYC Adoption Fair</h6>
                           </a>
                           <ul class="list-unstyled colored-icons">
                              <li><span><i class="fas fa-calendar-alt mr-2"></i>2th February at 4pm</span></li>
                              <li><span><i class="fas fa-map-marker-alt mr-2"></i>Washington Square Park</span></li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-lg-4 col-6 col-md-4 mt-2">
                        <div class="card-img">
                           <a href="event-single.html">
                              <img class="card-img-top img-product" src="https://id-test-11.slatic.net/p/902f2e18aed911960a8a4c58e91b4e7b.jpg" alt="">
                           </a>
                        </div>
                        <div class="card-body text-left">
                           <a href="event-single.html">
                              <h6 class="card-title">NYC Adoption Fair</h6>
                           </a>
                           <ul class="list-unstyled colored-icons">
                              <li><span><i class="fas fa-calendar-alt mr-2"></i>2th February at 4pm</span></li>
                              <li><span><i class="fas fa-map-marker-alt mr-2"></i>Washington Square Park</span></li>
                           </ul>
                        </div>
                     </div> -->
                  </div>
                  <div class="col-md-12 mt-5">
                     <nav aria-label="pagination">
                        <ul class="pagination float-right">
                           <li class="page-item"><a class="page-link active" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                     </nav>
                     <!-- /nav -->
                  </div>
                  <!-- /col-md -->
               </div>
               <!-- /col-lg-12 -->
            </div>
           <!-- <h4 class="mt-3">Lokasi Kami</h4>
            <div id="map-canvas" class="mt-5"></div> -->
            <!-- custom link --> 
         </div>
         <!-- /page-with-sidebar -->
         <!-- ==== Sidebar ==== -->
         <div class="sidebar col-lg-3 res-margin bg-light card h-50 pattern3">
            <div class="widget-area">
               <h5 class="sidebar-header">Layanan Kami</h5>
               <div class="list-group">
                  <a href="../penitipan/?toko=<?=$id_toko?>" class="list-group-item list-group-item-action">Penitipan</a>
                  <a href="../perawatan/?toko=<?=$id_toko?>" class="list-group-item list-group-item-action">Perawatan</a>
                  <a href="../operasi/?toko=<?=$id_toko?>" class="list-group-item list-group-item-action">Operasi</a>
                  <a href="../vaksin/?toko=<?=$id_toko?>" class="list-group-item list-group-item-action">Vaksin</a>
                  <!-- <a href="#" class="list-group-item list-group-item-action">Konsultasi</a>
                  <a href="#" class="list-group-item list-group-item-action">Makanan</a>
                  <a href="#" class="list-group-item list-group-item-action">Aksesoris</a> -->
               </div>
               <!-- /list-group -->
            </div>
            <!-- /widget-area -->
         </div>
         <!--/sidebar -->
      </div>
      <!-- /row -->
   </div>
   <!--/container-fluid-->
   <!-- ==== footer ==== -->
   <footer class="bg-light pattern1 m-bottom">
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
   <script src="../../js/map.js"></script>

   <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>