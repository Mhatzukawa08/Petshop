<?php 
	include('../koneksi.php');

  function kataAcak(): string{
    $acak = "";
    // $kata = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $kata = "1234567890";
    for($i=0; $i<5; $i++){
        $pos = rand(0, strlen($kata)-1);
        $acak .= $kata[$pos];
    }
    return $acak;
  }
  $angkaAcak = kataAcak();

  $user = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user DESC");
  $dataUser = mysqli_fetch_array($user);
  $id_user = $dataUser['id_user']+1;
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
  <title>Halaman Registrasi</title>
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
                    <h1 class="h4 text-gray-900 mb-4" id="title_registrasi">REGISTRASI PELANGGAN</h1>
                    <button type="button" onclick="registrasiUser()" class="btn btn-primary">Pelanggan</button>
                    <button type="button" onclick="registrasiToko()" class="btn btn-primary">Toko</button>
                  </div>
                </div>
                <div id="registrasi">
                  <form class="user" method="post" action="proses-registrasi.php" id="registrasi_user">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control form-control-user" autofocus="" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="nomor_hp">Nomor Hp</label>
                      <input type="number" name="nomor_hp" id="nomor_hp" class="form-control form-control-user" placeholder="Masukkan Nomor Hp" required>
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="alamat">alamat</label>
                      <input type="text" name="alamat" id="alamat" class="form-control form-control-user" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="id_pelanggan">ID Pelanggan</label>
                      <input type="text" name="id_pelanggan" value="pelanggan<?=$id_user?><?=$angkaAcak?>" hidden>
                      <p name="id_pelanggan" class="form-control form-control-user">pelanggan<?=$id_user?><?=$angkaAcak?></p>
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                    </div>
                    <p>Sudah Punya Akun? <a href="../login/">Login</a></p>
                    <input type="submit" name="registrasi_user" class="btn btn-info btn-user btn-block" onclick="sweet()" value="Registrasi">
                  </form>

                  <form class="toko" method="post" enctype="multipart/form-data" action="proses-registrasi.php" id="registrasi_toko" hidden>
                    <div class="form-group">
                      <label for="nama_toko">Nama Toko</label>
                      <input type="text" name="nama_toko" id="nama_toko" class="form-control form-control-user" autofocus="" required placeholder="Masukkan Nama Toko">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="nomor_hp_toko">Nomor Hp (Toko)</label>
                      <input type="text" name="nomor_hp_toko" id="nomor_hp_toko" class="form-control form-control-user" required placeholder="Masukkan Nomor Hp">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="alamat">alamat</label>
                      <input type="text" name="alamat" id="alamat" class="form-control form-control-user" required placeholder="Masukkan Alamat">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="gambar_toko">Gambar Toko</label>
                      <input type="file" name="gambar_toko" id="gambar_toko" class="form-control form-control-user">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="link_instagram">Link Instagram</label>
                      <input type="text" name="link_instagram" id="link_instagram" class="form-control form-control-user" required placeholder="Masukkan Link Instagram">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="hari_operasional">Hari Operasional</label>
                      <input type="text" name="hari_operasional" id="hari_operasional" class="form-control form-control-user" required placeholder="Masukkan Hari Operasional">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="jam_operasional">Jam Operasional</label>
                      <input type="text" name="jam_operasional" id="jam_operasional" class="form-control form-control-user" required placeholder="Masukkan Jam Operasional">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="nama_pemilik">Nama Pemilik</label>
                      <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control form-control-user" required placeholder="Masukkan Nama Pemilik">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="nomor_hp_pemilik">Nomor Hp (Pemilik)</label>
                      <input type="number" name="nomor_hp_pemilik" id="nomor_hp_pemilik" class="form-control form-control-user" required placeholder="Masukkan Nomor Hp">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="username">username</label>
                      <input type="text" name="username" id="username" class="form-control form-control-user" required placeholder="Masukkan Username">
                    </div>
                    <div class="form-group" style="margin-top: -15px;">
                      <label for="password">password</label>
                      <input type="password" name="password" id="password" class="form-control form-control-user" required placeholder="Password">
                    </div>
                    <div class="form-group" style="margin-top: 15px;">
                    </div>
                    <p>Sudah Punya Akun? <a href="../login/">Login</a></p>
                    <input type="submit" name="registrasi_toko" class="btn btn-info btn-user btn-block" onclick="sweet()" value="Registrasi">
                  </form>

                </div>
                <!-- <div class="text-center">
                    Masukkan Username dan Password dengan benar. <br>
                  </div> -->
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

  <script>
    function registrasiUser() {
      document.getElementById('registrasi_user').hidden = false;
      document.getElementById('registrasi_toko').hidden = true;

      var docTitleRegistrasi = document.getElementById('title_registrasi')
      docTitleRegistrasi.innerHTML = 'REGISTRASI PELANGGAN';

      var doc = document.getElementById('registrasi')

      // doc.innerHTML = '<form class="toko" method="post" action="proses-registrasi.php" id="registrasi_toko">' +
      //   '  <div class="form-group">' +
      //   '<label for="nama">Nama</label>' +
      //   '<input type="text" name="nama" id="nama" class="form-control form-control-user" autofocus="" required placeholder="Masukkan Nama">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="nomor_hp">Nomor Hp</label>' +
      //   '<input type="number" name="nomor_hp" id="nomor_hp" class="form-control form-control-user" required placeholder="Masukkan Nomor Hp">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="alamat">alamat</label>' +
      //   '<input type="text" name="alamat" id="alamat" class="form-control form-control-user" required placeholder="Masukkan Alamat">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="username">username</label>' +
      //   '<input type="text" name="username" id="username" class="form-control form-control-user" required placeholder="Masukkan Username">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="password">password</label>' +
      //   '<input type="password" name="password" id="password" class="form-control form-control-user" required placeholder="Password">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: 15px;">' +
      //   '</div>' +
      //   '<p>Sudah Punya Akun? <a href="../login/">Login</a></p>' +
      //   '<input type="submit" name="registrasi_user" class="btn btn-info btn-user btn-block" onclick="sweet()" value="Registrasi">' +
      //   '</form>';

    }

    function registrasiToko() {
      document.getElementById('registrasi_toko').hidden = false;
      document.getElementById('registrasi_user').hidden = true;

      var docTitleRegistrasi = document.getElementById('title_registrasi')
      docTitleRegistrasi.innerHTML = 'REGISTRASI TOKO';

      var doc = document.getElementById('registrasi')

      // doc.innerHTML = '<form class="toko" method="post" action="proses-registrasi.php" id="registrasi_toko">' +
      //   '  <div class="form-group">' +
      //   '<label for="nama_toko">Nama Toko</label>' +
      //   '<input type="text" name="nama_toko" id="nama_toko" class="form-control form-control-user" autofocus="" required placeholder="Masukkan Nama Toko">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="nomor_hp_toko">Nomor Hp (Toko)</label>' +
      //   '<input type="text" name="nomor_hp_toko" id="nomor_hp_toko" class="form-control form-control-user" required placeholder="Masukkan Nomor Hp">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="alamat">alamat</label>' +
      //   '<input type="text" name="alamat" id="alamat" class="form-control form-control-user" required placeholder="Masukkan Alamat">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="gambar_toko">Gambar Toko</label>' +
      //   '<input type="file" name="gambar_toko" id="gambar_toko" class="form-control form-control-user" required>' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="link_instagram">Link Instagram</label>' +
      //   '<input type="text" name="link_instagram" id="link_instagram" class="form-control form-control-user" required placeholder="Masukkan Link Instagram">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="hari_operasional">Hari Operasional</label>' +
      //   '<input type="text" name="hari_operasional" id="hari_operasional" class="form-control form-control-user" required placeholder="Masukkan Hari Operasional">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="jam_operasional">Jam Operasional</label>' +
      //   '<input type="text" name="jam_operasional" id="jam_operasional" class="form-control form-control-user" required placeholder="Masukkan Jam Operasional">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="nama_pemilik">Nama Pemilik</label>' +
      //   '<input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control form-control-user" required placeholder="Masukkan Nama Pemilik">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="nomor_hp_pemilik">Nomor Hp (Pemilik)</label>' +
      //   '<input type="number" name="nomor_hp_pemilik" id="nomor_hp_pemilik" class="form-control form-control-user" required placeholder="Masukkan Nomor Hp">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="username">username</label>' +
      //   '<input type="text" name="username" id="username" class="form-control form-control-user" required placeholder="Masukkan Username">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: -15px;">' +
      //   '<label for="password">password</label>' +
      //   '<input type="password" name="password" id="password" class="form-control form-control-user" required placeholder="Password">' +
      //   '</div>' +
      //   '<div class="form-group" style="margin-top: 15px;">' +
      //   '</div>' +
      //   '<p>Sudah Punya Akun? <a href="../login/">Login</a></p>' +
      //   '<input type="submit" name="registrasi_toko" class="btn btn-info btn-user btn-block" onclick="sweet()" value="Registrasi">' +
      //   '</form>';

    }
  </script>

</body>

</html>