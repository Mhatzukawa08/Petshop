<?php 
	$checkLogin = false;
    $notifikasi = 0;
    if (isset($_COOKIE['id'])) {
		$id_user = $_COOKIE['id'];
		$checkLogin = true;

		// mencari notifikasi
		$queryDokumentasi = mysqli_query($koneksi, "SELECT * FROM `dokumentasi` WHERE id_user='$id_user' AND notification='0' ");
		while($row = mysqli_fetch_assoc($queryDokumentasi)){
			$id_pilihan_pesanan = $row['id_pilihan_pesanan'];
			$id_pesanan = $row['id_pesanan'];
			$notification = $row['notification'];

			if($id_pilihan_pesanan == 1){
				$queryCekPesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` WHERE id_pesanan_penitipan='$id_pesanan' AND ket='0' ");
                $rowCekPesanan = mysqli_num_rows($queryCekPesanan);
                if($rowCekPesanan>0){
                    $notifikasi+=$rowCekPesanan;
                }
			} else if($id_pilihan_pesanan == 2){
				$queryCekPesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE id_pesanan_perawatan='$id_pesanan' AND ket='0' ");
                $rowCekPesanan = mysqli_num_rows($queryCekPesanan);
                if($rowCekPesanan>0){
                    $notifikasi+=$rowCekPesanan;
                }
			} else if($id_pilihan_pesanan == 3){
				$queryCekPesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_operasi` WHERE id_pesanan_operasi='$id_pesanan' AND ket='0' ");
                $rowCekPesanan = mysqli_num_rows($queryCekPesanan);
                if($rowCekPesanan>0){
                    $notifikasi+=$rowCekPesanan;
                }
			} else if($id_pilihan_pesanan == 4){
				$queryCekPesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_vaksin` WHERE id_pesanan_vaksin='$id_pesanan' AND ket='0' ");
                $rowCekPesanan = mysqli_num_rows($queryCekPesanan);
                if($rowCekPesanan>0){
                    $notifikasi+=$rowCekPesanan;
                }
			}
		}
	} else{
		$checkLogin = false;
    }
?>