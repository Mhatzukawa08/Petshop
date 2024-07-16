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
  <title>Halaman Login</title>
  <!--[if lt IE 9]>
      <script src="js/respond.js"></script>
  <![endif]-->
  <!-- Font files -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700%7CMontserrat:400,500,600,700" rel="stylesheet">
  <link href="../fonts/flaticon/flaticon.css" rel="stylesheet" type="text/css">
  <link href="../fonts/fontawesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">
  <!-- Fav icons -->
  <link rel="apple-touch-icon" sizes="57x57" href="../apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../apple-icon-114x114.png">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- style CSS -->
  <link href="../css/style.css" rel="stylesheet">
  <!-- plugins CSS -->
  <link href="../css/plugins.css" rel="stylesheet">
  <!-- Colors CSS -->
  <link href="../styles/maincolors.css" rel="stylesheet">
</head>

<body class="body">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                  </div>
                  <form class="user" method="POST" action="proses-login.php">
                    <div class="form-group">
                      <input type="text" name="user" class="form-control form-control-user" autofocus="" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="check_karyawan_dokter" value="karyawan_dokter" name="check_karyawan_dokter">
                      <label class="form-check-label" for="check_karyawan_dokter">
                        Login Sebagai Karyawan/dokter
                      </label>
                    </div>
                    <p>Belum Punya Akun? <a href="../registrasi/">Daftar</a></p>
                    <input type="submit" class="btn btn-info btn-user btn-block" value="Login" name="login">
                  </form>
                  <div class="text-center">
                    Masukkan Username dan Password dengan benar. <br>
                  </div>
                  <a href="index.php" style="text-decoration: none;">
                    <div class="text-center">
                      <!-- Ingin menemukan obat yang kalian cari?. <br> -->
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="../js/alert.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>