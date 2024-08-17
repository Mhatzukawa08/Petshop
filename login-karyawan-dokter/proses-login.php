<?php
	include('../koneksi.php');
	
	if(isset($_POST["login"])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];

		$query = "";
        $query = mysqli_query($koneksi,"SELECT * FROM karyawan_dokter where username='$user' AND password='$pass'");

		$row = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		
		if ($row > 0){
			if ($data['sebagai'] == "pemilik"){
				setcookie("sebagai", "pemilik", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("id", $data['id_karyawan'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("username", $data['username'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				echo '<script language="javascript">
				alert("Anda berhasil masuk sebagai Pemilik");
				window.location="../pemilik/";
				</script>';
			}
			else if ($data['sebagai'] == "dokter"){
				setcookie("sebagai", "dokter", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("id", $data['id_karyawan'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("username", $data['username'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				echo '<script language="javascript">
				alert("Anda berhasil masuk sebagai Dokter");
				window.location="../dokter/pesanan-penitipan.php";
				</script>';
			}
			else if ($data['sebagai'] == "karyawan"){
				setcookie("sebagai", "karyawan", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("id", $data['id_karyawan'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("username", $data['username'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				echo '<script language="javascript">
				alert("Anda berhasil masuk sebagai karyawan");
				window.location="../staf/pesanan-produk.php";
				</script>';
			}
		}else{
			echo '<script language="javascript">
			alert("username atau password anda salah");
			window.location="./";
			</script>';
		}
	}

?>