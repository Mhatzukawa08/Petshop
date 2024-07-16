<?php
   require_once '../koneksi.php';
   session_start();


   $checkLogin = false;
   $checkToko = false;

   // Login
   if(isset($_COOKIE['id'])){
      $id_user = $_COOKIE['id'];
      $checkLogin = true;
   } else{
     $checkLogin = false;
   }

   $id_toko = "";

   if(isset($_SESSION['id_toko'])){
      $id_toko = $_SESSION['id_toko'];

      $checkToko = true;
      
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
   <!-- page title -->
   <!-- <title>Simpel Pets</title> -->
   <title>Pet Shop</title>
   <!--[if lt IE 9]>
         <script src="js/respond.js"></script>
      <![endif]-->
   <!-- Font files -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
   <link href="../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
   <link href="../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
   <!-- Fav icons -->
   <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
   <!-- Bootstrap core CSS -->
   <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- style CSS -->
   <link href="../css/style.css" rel="stylesheet">
   <!-- plugins CSS -->
   <link href="../css/plugins.css" rel="stylesheet">
   <!-- Colors CSS -->
   <link href="../styles/maincolors.css" rel="stylesheet">
   <!-- LayerSlider CSS -->
   <link rel="stylesheet" href="../vendor/layerslider/css/layerslider.css">
</head>
<!-- ==== body starts ==== -->

<body id="top">
   <!-- Preloader  -->
   <div id="preloader">
      <div class="container h-100">
         <div class="row h-100 justify-content-center align-items-center">
            <div class="preloader-logo">
               <!--logo -->
               <img src="../img/logo.png" alt="" class="img-fluid">
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
      <!-- Navbar Starts -->
      <div class="navbar container-fluid">
         <div class="container ">
            <!-- logo -->
            <a class="nav-brand" href="index.php">
               <img src="../img/logo.png" alt="" class="img-fluid">
            </a>
            <i class="fa fa-shopping-cart text-dark media"></i>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                  <!-- menu item -->
                  <?php 
                     if(!$checkLogin){

                  ?>
                     
                     <li class="nav-item active">
                        <a class="nav-link" href="../user/">Beranda
                        </a>
                     </li>
                  <?php
                     }
                  ?>
                  <?php 
                     if($checkToko){

                  ?>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="toko/detail-toko.php?toko=<?=$id_toko?>"><?=$nama_toko?>
                        </a>
                     </li>
                  <?php
                     }
                  ?>
                  
               
                  <!-- menu item -->
                  <li class="nav-item">
                     <a class="nav-link" href="toko/">Toko
                     </a>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pelayanan
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="penitipan/?toko=<?=$id_toko?>">Penitipan</a></li>
                        <li><a class="dropdown-item" href="perawatan/?toko=<?=$id_toko?>">Perawatan</a></li>
                        <li><a class="dropdown-item" href="operasi/?toko=<?=$id_toko?>">Operasi</a></li>
                        <li><a class="dropdown-item" href="vaksin/?toko=<?=$id_toko?>">Vaksin</a></li>
                     </ul>
                  </li>
                  <!-- menu item -->
                  <li class="nav-item">
                     <a class="nav-link" href="produk/">Produk
                     </a>
                  </li>
                  <!-- menu item -->
                  <?php 
                     if(!$checkLogin){
                  ?>
                     
                     <li class="nav-item">
                        <a class="nav-link" href="../login/">Login
                        </a>
                     </li>
                  <?php
                     } else{
                  ?>
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="profile/">Profil
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
                  <a href="./">
                     <i class="flaticon-people-1 icon_br active1"></i>
                  </a>
                  <p class="ket-menu active1"><b>Beranda</b></p>
               </td>
               <td align="center" width="20%">
                  <a href="toko.php">
                     <i class="flaticon-dog-2 icon_br"></i>
                  </a>
                  <p class="ket-menu"><b>Toko</b></p>
               </td>
               <!-- <td align="center" width="20%">
                  <a href="services.php">
                     <i class="flaticon-dog-with-first-aid-kit-bag icon_br"></i>
                  </a>
                  <p class="ket-menu"><b>Pelayanan</b></p>
               </td> -->
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
   <!-- ==== Slider ==== -->
   <div class="container-fluid p-0">
      <div id="slider" class="overlay-parallax-slider" style="width:1200px;height:650px;margin:0 auto;margin-bottom: 0px;">
         <!-- Slide 1 -->
         <div class="ls-slide overlay2" data-ls="duration:4000; transition2d:7;">
            <!-- bg image  -->
            <img src="https://www.petproject.co.in/images/promo/3/Buy-Food-Banner.jpg" class="ls-bg" alt="" />
            <!-- ls-l  -->
            <!-- <img width="1200" height="376" src="img/slider/slide1-element.png" class="ls-l" alt="" style="top:296px; right:0
                     %;" data-ls="offsetxin:10; offsetyin:120; durationin:1100; rotatein:5; transformoriginin:59.3% 80.3% 0; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:-4;"> -->
            <!-- text  -->
            <div class="ls-l header-wrapper" data-ls="offsetyin:150; durationin:700; delayin:200; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; parallax:true; parallaxlevel:2;">
               <div class="header-text full-width text-light">
                  <h1>Selamat Datang di <span>Moezza Petshop & Animal Care</span></h1>
                  <!--the div below is hidden on small screens  -->
                  <div class="hidden-small">
                     <p class="header-p">Kami menawarkan Produk & Layanan terbaik untuk hewan kesayangan anda.</p>
                  </div>
                  <!--/d-none  -->
               </div>
               <!-- header-text  -->
            </div>
            <!-- ls-l  -->
         </div>
         <!-- ls-slide -->
      </div>
      <!-- /slider -->
   </div>
   <!-- /container-fluid -->
   <!-- ==== Page Content ==== -->

   <!-- /section--><!-- section -->
   <section id="toko" class="container">
      <div class="container">
         <!-- section heading -->
         <div class="section-heading text-center">
            <p class="subtitle">Toko yang tersediakan</p>
            <h2>Mitra kami</h2>
         </div>
         <!-- /section heading -->
         <div class="row">
            <div class="carousel-4items owl-carousel owl-theme">
               <!-- Team member 1 -->
               
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
                  <div class="col-md-12">
                     <div class="team-style1">
                        <div class="team_img">
                           <img src="../gambar/toko/<?=$gambar_toko?>" class="img-fluid" alt="">
                           <!-- social icons -->
                           <ul class="social">
                              <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
                              <li><a href="<?=$link_instagram?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                           </ul>
                        </div>
                        <!-- /team_img -->
                        <div class="team-content">
                           <a href="toko/detail-toko.php?toko=<?=$id_toko?>">
                              <h5 class="title"><?=$nama_toko?></h5>
                           </a>
                           <span class="post">
                              <i class="fas fa-map-marker-alt mr-2 text-danger"></i><?=$alamat?>
                           </span>
                        </div>
                        <!-- /team-content -->
                     </div>
                     <!-- /team-style1 -->
                  </div>
               <?php
               }
               ?>
               
               <!-- -Team member 5 -->
            </div>
            <!-- /owl-carousel -->
         </div>
         <!-- /row -->
      </div>
      <!-- /container -->
   </section>
   <!-- /section ends -->
   <!-- section -->
   
   <!-- /section ends -->
   <!-- section -->
   <section id="pelayanan" class="bg-light pattern1">
      <div class="container">
         <!-- section heading -->
         <div class="section-heading text-center">
            <p class="subtitle">Apa yang kita tawarkan</p>
            <h2>Pelayanan kami</h2>
         </div>
         <!-- /section-heading -->
         <div class="carousel-4items owl-carousel owl-theme container">
            <!-- service 1  -->
            <!-- <div class="col-md-12">
               <div class="serviceBox2"> -->
                  <!-- service icon -->
                  <!-- <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-dog-training-3"></i>
                     </div>
                     
                     <div class="service-content">
                        <h5>Pelatihan</h5>
                     </div>
                  </a> -->
               <!-- </div>
            </div> -->
            <!-- service 2  -->
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-pet-shelter"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Penitipan</h5>
                     </div>
                  </a>
               </div>
            </div>
            <!-- service 3  -->
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-animals-2"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Perawatan</h5>
                     </div>
                  </a>
               </div>
            </div>
            <!-- service 4 -->
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-dog-with-first-aid-kit-bag"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Operasi</h5>
                     </div>
                  </a>
               </div>
            </div>
            <!-- service 5 -->
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-syringe"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Vaksin</h5>
                     </div>
                  </a>
               </div>
            </div>
            <!-- service 6 -->
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-animal-13"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Konsultasi</h5>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-pet-food"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Makanan</h5>
                     </div>
                  </a>
               </div>
            </div>
            <div class="col-md-12">
               <div class="serviceBox2">
                  <!-- service icon -->
                  <a href="layanan.php">
                     <div class="service-icon">
                        <i class="flaticon-game"></i>
                     </div>
                     <!-- service content -->
                     <div class="service-content">
                        <h5>Aksesoris</h5>
                     </div>
                  </a>
               </div>
            </div>
            <!--col-md-12  -->
         </div>
      </div>
      <!-- /container -->
   </section>
   <section id="dokumentasi" class="container-fluid pl-0 pr-0">
      <div class="container">
         <!-- section heading -->
         <div class="section-heading text-center">
            <p class="subtitle">Dokumentasi</p>
            <h2>Galeri</h2>
         </div>
         <!-- /section-heading -->
      </div>
      <!-- owl carousel gallery  -->
      <div class="owl-stage owl-carousel owl-theme top-centered-nav magnific-popup mt-5">
         <?php 
            $queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM dokumentasi ");
            while ($row = mysqli_fetch_assoc($queryDokumentasi)) {
               $id_dokumentasi = $row['id_dokumentasi'];
               $keterangan = $row['keterangan'];
               $gambar = $row['gambar'];
               $waktu = $row['waktu'];
         ?>
            <div class="col-md-12 gallery-img hover-opacity">
               <!-- image -->
               <a href="../gambar/dokumentasi/<?=$gambar?>" title="<?=$keterangan?>">
                  <img src="../gambar/dokumentasi/<?=$gambar?>" class="img-fluid rounded" alt="">
               </a>
            </div>
         <?php
            
            }
         ?>

         <!-- <div class="col-md-12 gallery-img hover-opacity">
            <a href="../gambar/dokumentasi/1-28-123QWErtY456.jpg" title="your caption here">
               <img src="../gambar/dokumentasi/1-28-123QWErtY456.jpg" class="img-fluid rounded" alt="">
            </a>
         </div> -->

      </div>
   </section>
   <footer class="bg-light pattern1">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 text-center ">
               <img src="img/logo.png" class="logo-footer img-fluid" alt="" />
               <!-- <ul class="social-list text-center list-inline">
                  <li class="list-inline-item"><a title="Facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li class="list-inline-item"><a title="Twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a title="Instagram" href="#"><i class="fab fa-instagram"></i></a></li>
               </ul> -->
               <!-- /End Social Links -->
            </div>
         </div>
         <!--/ row-->
         <!-- <div class="row mb-5">
            <div class="credits col-sm-12">
               <p>Copyright 2023 / Designed by <a href="https://www.instagram.com/simpelaja.studio/">Simpel Aja Studio</a></p>
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
   <script src="../vendor/jquery/jquery.min.js"></script>
   <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Custom Js -->
   <script src="../js/custom.js"></script>
   <script src="../js/plugins.js"></script>
   <!-- Prefix free -->
   <script src="../js/prefixfree.min.js"></script><!-- number counter script -->
   <script src="../js/counter.js"></script>
   <!-- maps -->
   <script src="../js/map.js"></script>
   <!-- GreenSock -->
   <script src="../vendor/layerslider/js/greensock.js"></script>
   <!-- LayerSlider script files -->
   <script src="../vendor/layerslider/js/layerslider.transitions.js"></script>
   <script src="../vendor/layerslider/js/layerslider.kreaturamedia.jquery.js"></script>
   <script src="../vendor/layerslider/js/layerslider.load.js"></script>

   <!-- <script>
      let sections = document.querySelectorAll('section');
      let navLink = document.querySelectorAll('div ul li a');

      document.getElementById("nav-item active").innerHTML = "Selamat";

      window.onscroll = () =>{
         sections.forEach(sec =>{
            let top = window.scrollY;
            let offset = sec.offsetTop;
            let height = sec.offsetHeight;
            let id = sec.getAttribute('id');

            if(top >= offset && top < offset+height){
               navLink.forEach(links=>{
                  links.classList.remove('nav-item active')
                  document.querySelector('div ul li a [href*=' +id+ ']').classList.add('nav-item active');
               });
            };
         });
      };

      // window.addEventListener('scroll', function() {
         // let fadeText = document.querySelector('.fade');
         // if (window.scrollY < window.innerHeight) {
         
         //    fadeText.classList.add('nav-item active');
         //    fadeText.classList.remove('nav-item');
         // }
         // });
      
   </script> -->

</body>

</html>