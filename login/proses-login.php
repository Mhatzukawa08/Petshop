<?php
	include('../koneksi.php');
	
	if(isset($_POST["login"])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];

		$query = "";
		if(isset($_POST['check_karyawan_dokter']) == "karyawan_dokter"){
			$query = mysqli_query($koneksi,"SELECT * FROM karyawan_dokter where username='$user' AND password='$pass'");
		} else{
			$query = mysqli_query($koneksi,"SELECT * FROM user where username='$user' and password='$pass'");
		}

		$row = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		
		if ($row > 0){
			if(isset($_POST['check_karyawan_dokter']) == "karyawan_dokter"){
				if ($data['sebagai'] == "dokter"){
					setcookie("sebagai", "dokter", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					setcookie("id", $data['id_karyawan'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					setcookie("username", $data['username'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					echo '<script language="javascript">
					alert("Anda berhasil masuk sebagai Dokter");
					window.location="../admin/jenis-hewan.php";
					</script>';
				}
				elseif ($data['sebagai'] == "karyawan"){
					setcookie("sebagai", "karyawan", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					setcookie("id", $data['id_karyawan'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					setcookie("username", $data['username'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
					echo '<script language="javascript">
					alert("Anda berhasil masuk sebagai karyawan");
					window.location="../staf/jenis-hewan.php";
					</script>';
				}
				
			}
			else{
				setcookie("sebagai", "user", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("id", $data['id_user'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("username", $data['username'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
				echo '<script language="javascript">
				alert("Anda berhasil masuk sebagai User");
				window.location="../user/toko/";
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