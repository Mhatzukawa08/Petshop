<?php
	include('../koneksi.php');
    date_default_timezone_set('Asia/Makassar');
    $tanggalSaja = date('Y-m-d');
    $waktuSaja = date('H:i:s');
    $tanggalDanWaktu = date('Y-m-d H:i:s');

	function kataAcak(): string{
        $acak = "";
        $kata = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for($i=0; $i<15; $i++){
            $pos = rand(0, strlen($kata)-1);
            $acak .= $kata[$pos];
        }
        return $acak;
    }


	if(isset($_POST['registrasi_user'])){
		$nama = $_POST['nama'];
		$nomor_hp = $_POST['nomor_hp'];
		$alamat = $_POST['alamat'];
		$id_pelanggan = $_POST['id_pelanggan'];
	
		$query = mysqli_query($koneksi,"INSERT INTO user (`nama`, `nomor_hp`, `alamat`, `id_pelanggan`, `tanggal`) 
		VALUES ('$nama', '$nomor_hp', '$alamat', '$id_pelanggan', '$tanggalDanWaktu') ");
		
		if ($query){
			echo '<script language="javascript">
					alert("Berhasil Membuat Akun");
					window.location="../login/";
				</script>';
		}else{
			echo '<script language="javascript">
			alert("Gagal Membuat Akun");
			window.location="../registrasi/";
			</script>';
		}
	} 

	if(isset($_POST['registrasi_toko'])){
		$nama_toko = $_POST['nama_toko'];
		$nomor_hp_toko = $_POST['nomor_hp_toko'];
		$alamat = $_POST['alamat'];
		$link_instagram = $_POST['link_instagram'];
		$hari_operasional = $_POST['hari_operasional'];
		$jam_operasional = $_POST['jam_operasional'];
		$nama_pemilik = $_POST['nama_pemilik'];
		$nomor_hp_pemilik = $_POST['nomor_hp_pemilik'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$queryCariToko = mysqli_query($koneksi, "SELECT * FROM toko ORDER BY tanggal DESC");
		$data = mysqli_fetch_array($queryCariToko);
		$id_toko = $data['id_toko']+1;

		$file_name_image = $_FILES["gambar_toko"]["name"];
        $temp_name_image = $_FILES["gambar_toko"]["tmp_name"];
        $error_image = $_FILES["gambar_toko"]["error"];
        
        if (!file_exists("../gambar/toko")) {
            mkdir("../gambar/toko");
        }

        $array_name_image = explode('.', $file_name_image);
        $ekstensi_image = end($array_name_image);  

        $kata_acak = kataAcak();
        $gambar = "$kata_acak.$ekstensi_image";
        move_uploaded_file($temp_name_image, "../gambar/toko/$gambar");

	
		if($error_image == 0){
			if($ekstensi_image=="png" ||$ekstensi_image=="jpg" ||$ekstensi_image=="jpeg"){
				$queryTambahToko = mysqli_query($koneksi,"INSERT INTO `toko` (`id_toko`, `nama_toko`, `nomor_hp`, `alamat`, `nama_pemilik`, `gambar_toko`, `link_instagram`, `hari_operasional`, `jam_operasional`, `tanggal`) 
				VALUES ('$id_toko', '$nama_toko', '$nomor_hp_toko', '$alamat', '$nama_pemilik', '$gambar', '$link_instagram', '$hari_operasional', '$jam_operasional', '$tanggalDanWaktu') ");

				$queryTambahDokter = mysqli_query($koneksi,"INSERT INTO `karyawan_dokter` (`id_toko`, `nama`, `nomor_hp`, `alamat`, `username`, `password`, `sebagai`, `tanggal`) 
				VALUES ('$id_toko', '$nama_pemilik', '$nomor_hp_pemilik', '$alamat', '$username', '$password', 'pemilik', '$tanggalDanWaktu') ");
				
				if ($queryTambahToko && $queryTambahDokter){
					echo '<script language="javascript">
							alert("Berhasil Membuat Akun");
							window.location="../login/";
						</script>';
				}else{
					echo '<script language="javascript">
					alert("Gagal Membuat Akun");
					window.location="../registrasi/";
					</script>';
				}
			} else{
				echo '<script language="javascript">
						alert("Gambar Hanya Boleh png, jpg, jpeg");
						window.location="../registrasi/";
					</script>';
			}
		} else{
			echo '<script language="javascript">
					alert("Gambar Tidak Boleh Kosong");
					window.location="../registrasi/";
				</script>';
		}
	}

	

?>