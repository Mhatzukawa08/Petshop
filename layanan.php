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
      <title>United Pets</title>
      <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
   <![endif]-->
      <!-- Font files -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
      <link href="fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
      <link href="fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
      <link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
      <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- style CSS -->
      <link href="css/style.css" rel="stylesheet">
      <!-- plugins CSS -->
      <link href="css/plugins.css" rel="stylesheet">
      <!-- Colors CSS -->
      <link href="styles/maincolors.css" rel="stylesheet">
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
                     <!-- Start Social Links -->
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
                        <a class="nav-link" href="services.php">Pelayanan
                        </a>
                     </li>
                     <!-- menu item -->
                     <li class="nav-item">
                        <a class="nav-link" href="toko.php">Toko
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
                        <i class="flaticon-dog-with-first-aid-kit-bag icon_br active1"></i>
                     </a>
                     <p class="ket-menu active1"><b>Pelayanan</b></p>
                  </td>
                  <td align="center" width="20%">
                     <a href="toko.php">
                        <i class="flaticon-dog-2 icon_br"></i>
                     </a>
                     <p class="ket-menu"><b>Toko</b></p>
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
         <!-- jumbo-heading -->
         <div class="jumbo-heading" data-aos="fade-up">
            <h1>Detail Pelayanan</h1>
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
                  <li class="breadcrumb-item"><a href="team.html">Pelayanan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Perawatan</li>
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
            <!-- page with sidebar starts -->
            <div class="col-lg-9 page-with-sidebar">
               <h2>Perawatan hewan peliharaan</h2>
               <!-- Image -->
               <p class="h7">Paket perawatan dasar kami meliputi sampo, pengering rambut, pembersihan telinga & trim kuku.</p>
               <p>Prosedur untuk merawat tubuh hewan kesayangan. Hal ini berguna untuk menjaga penampilan dan kesehatan hewan kesayangan, sehingga terjauhi dari berbagai penyakit. Rangkaian perawatan ini terkait pembersihan kuku, bulu, kulit, serta bagian telinga. Tindakan ini perlu dilakukan secara rutin. Hewan kesayangan anda perlu mendapatkan perawatan ini agar tetap bersih dan sehat. Hal ini dapat membebaskan hewan kesayangan bebas dari debu, kulit mati, rambut rontok, kuman, bakteri, dan berbagai masalah lainnya.
               </p>
               <div class="row">
                  <div class="col-md-6">
                     <div class="col-md-12 carousel-1item owl-carousel owl-theme "  data-aos="zoom-out" >
                        <img src="https://www.flokq.com/blog/wp-content/uploads/2020/08/dog-min.png" class="img-fluid rounded" alt="">
                        <img src="https://asset.kompas.com/crops/gL5Oha0bs_Tvj-v1yXU0v0QJwPk=/230x71:798x639/340x340/data/photo/2022/01/02/61d17f19bbde4.jpg" class="img-fluid rounded" alt="">
                        <img src="https://static.sehatq.com/content/review/thumb/1669345358.jpeg" class="img-fluid rounded" alt="">
                     </div>
                     <!-- /col-md-12 -->
                  </div>
                  <!-- /col-md-6 -->
                  <div class="col-md-6">
                     <!-- custom-list -->
                     <ul class="custom pl-0">
                        <li>Alamat : Jln. Handayani</li>
                        <li>Jam Operasional : Senin - Minggu / 08:00 - 21.00 </li>
                        <li>No. Telepon : -</li>
                        <li>No. Whatsapp : -</li>
                        <li>Instagram : -</li>
                     </ul>
                     <!-- /ul -->
                     <!-- Button -->	 
                     <a href="pesan-perawatan.php" class="btn btn-primary mt-3">Lanjutkan Pesanan</a>
                  </div>
                  <!-- /col-md-6 -->
                  <div class="col-md-12 mt-3">
                     <div class="accordion">
                        <!-- collapsible accordion 1 -->
                        <!-- <div class="card">
                           <div class="card-header">
                              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                 Grooming package upgrades
                              </a>
                           </div>
                           <div id="collapseOne" class="collapse show" data-parent=".accordion">
                              <div class="card-body">
                                 <p>Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              </div>
                           </div>
                        </div> -->
                        <!-- /card -->
                        <!-- collapsible accordion 2 -->
                        <!-- <div class="card">
                           <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                 Bath & Grooming details
                              </a>
                           </div>
                           <div id="collapseTwo" class="collapse" data-parent=".accordion">
                              <div class="card-body">
                                 <p>Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              </div>
                           </div>
                        </div> -->
                        <!-- /card -->
                        <!-- collapsible accordion 3 -->
                        <!-- <div class="card">
                           <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                 Nail Trimming & Ear cleaning
                              </a>
                           </div>
                           <div id="collapseThree" class="collapse" data-parent=".accordion">
                              <div class="card-body">
                                 <p>Donec commodo sodales ex, scelerisque laoreet nibh hendrerit id. In aliquet magna nec lobortis maximus. Etiam rhoncus leo a dolor placerat, nec elementum ipsum convall.</p>
                              </div>
                           </div>
                        </div> -->
                        <!-- /card -->
                     </div>
                     <!-- /accordion -->
                  </div>
                  <!-- custom link -->
               </div>
               <!-- /row -->
            </div>
            <!-- /col-lg-9 -->
            <!-- ==== Sidebar ==== -->
            <div class="sidebar col-lg-3 res-margin bg-light card h-50 pattern3">
               <div class="widget-area">
                  <h5 class="sidebar-header">Layanan Kami</h5>
                  <div class="list-group">
                     <a href="layanan.php?url=penitipan" class="list-group-item list-group-item-action">Penitipan</a>
                     <a href="layanan.php?url=perawatan" class="list-group-item list-group-item-action active">Perawatan</a>
                     <a href="layanan.php?url=operasi" class="list-group-item list-group-item-action">Operasi</a>
                     <a href="layanan.php?url=vaksin" class="list-group-item list-group-item-action">Vaksin</a>
                     <a href="produk.php?url=makanan" class="list-group-item list-group-item-action">Makanan</a>
                     <a href="produk.php?url=aksesoris" class="list-group-item list-group-item-action">Aksesoris</a>
                  </div>
                  <!-- /list-group -->
               </div>
               <!-- /widget-area -->
            </div>
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
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!-- Custom Js -->
   <script src="js/custom.js"></script>
   <script src="js/plugins.js"></script>
   <!-- Prefix free -->
   <script src="js/prefixfree.min.js"></script>
</body>
</html>