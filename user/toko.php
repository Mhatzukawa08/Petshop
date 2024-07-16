<?php 
    require_once '../koneksi.php';
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
      <title>Toko</title>
      <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
   <![endif]-->
      <!-- Font files -->
      <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
      <link href="../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
      <link href="../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
      <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
      <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <!-- Bootstrap core CSS -->
      <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- style CSS -->
      <link href="../css/style.css" rel="stylesheet">
      <!-- plugins CSS -->
      <link href="../css/plugins.css" rel="stylesheet">
      <!-- Colors CSS -->
      <link href="../styles/maincolors.css" rel="stylesheet">
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
                  <img src="img/logo.png" alt="" class="img-fluid">
               </a>
               <i class="fa fa-shopping-cart text-dark media"></i>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda
                        </a>
                     </li>
                     <!-- menu item -->
                     <li class="nav-item active">
                        <a class="nav-link" href="toko.php">Toko
                        </a>
                     </li>
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="services.php">Pelayanan
                        </a>
                     </li>
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk
                        </a>
                     </li>
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="user/profil.php">Profil
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
                     <a href="services.php">
                        <i class="flaticon-dog-with-first-aid-kit-bag icon_br"></i>
                     </a>
                     <p class="ket-menu"><b>Pelayanan</b></p>
                  </td>
                  <td align="center" width="20%">
                     <a href="toko.php">
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
                     <a href="user/profil.php">
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
      <div class="jumbotron jumbotron-fluid" data-center="background-size: 100%;"
      data-top-bottom="background-size: 110%;">
      <div class="container" >
         <div class="jumbo-heading" data-aos="fade-up">
            <!-- jumbo-heading -->
            <h1>Toko</h1>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Toko</li>
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
         <!-- page  starts -->
         <div class="col-lg-12">
            <div class="row mt-2">
               <!-- event 1 -->		 
               <?php 
                  $query = mysqli_query($koneksi, "SELECT * FROM `toko` ");
                  while($row = mysqli_fetch_assoc($query)){
                     $id_toko = $row['id_toko'];
                     $nama_toko = $row['nama_toko'];
                     $nomor_hp = $row['nomor_hp'];
                     $alamat = $row['alamat'];
                     $nama_pemilik = $row['nama_pemilik'];
                     $gambar_toko = $row['gambar_toko'];
                     $link_instagram = $row['link_instagram'];
               ?>
                  <div class="col-lg-4 col-6 col-md-4 mt-2">
                     <div class="card-img">
                        <!-- image event --> 
                        <a href="detail-toko.php?toko=<?=$id_toko?>">
                           <img class="card-img-top img-product"
                            src="../gambar/toko/<?=$gambar_toko?>" alt="">
                        </a>
                     </div>
                     <div class="card-body text-left">
                        <!-- event info -->  
                        <a href="detail-toko.php?toko=<?=$id_toko?>">
                           <h6 class="card-title"><?=$nama_toko?></h6>
                        </a>
                        <ul class="list-unstyled colored-icons">
                           <li><span><i class="fas fa-map-marker-alt mr-2"></i><?=$alamat?></span></li>
                           <li><span><i class="fa fa-phone mr-2"></i><?=$nomor_hp?></span></li>
                        </ul>
                        <!-- button -->   
                     </div>
                     <!--/card-body text-center -->   
                     <!-- /card --> 
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
               </div>
            </div> -->
            <div class="col-md-12 mt-5">
               <!-- pagination -->
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
   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Custom Js -->
   <script src="../js/custom.js"></script>
   <script src="../js/plugins.js"></script>
   <!-- Prefix free -->
   <script src="../js/prefixfree.min.js"></script>
</body>
</html>