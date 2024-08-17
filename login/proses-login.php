<?php
	include('../koneksi.php');
	
	if(isset($_POST["login"])){
		$id_pelanggan=$_POST['id_pelanggan'];

		$query = mysqli_query($koneksi,"SELECT * FROM user where id_pelanggan='$id_pelanggan'");

		$row = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		
		if ($row > 0){
			setcookie("sebagai", "user", time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
			setcookie("id", $data['id_user'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
			setcookie("id_pelanggan", $data['id_pelanggan'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
			setcookie("nama", $data['nama'], time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
			echo '<script language="javascript">
			alert("Anda berhasil masuk sebagai User");
			window.location="../user/toko/";
			</script>';
		}else{
			echo '<script language="javascript">
			alert("username atau password anda salah");
			window.location="./";
			</script>';
		}
	}

?>