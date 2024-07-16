<?php 
    require_once '../../koneksi.php';

    date_default_timezone_set('Asia/Makassar');
    $tanggalSaja = date('Y-m-d');
    $waktuSaja = date('H:i:s');
    $tanggalDanWaktu = date('Y-m-d H:i:s');

    if(isset($_POST['tambah_pesanan_produk'])){
        $id_toko = $_POST['id_toko'];
        // $id_pemesanan = $_POST['id_pemesanan'];
        $id_user = $_POST['id_user'];
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $harga = $_POST['harga'];
        $total_harga = $jumlah*$harga;
        $ket = 0;

        $stok = $_POST['stok']-$jumlah;

        $id_pemesanan = "100";
        $queryPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` ORDER BY id_pemesanan DESC");
        $jumRow = mysqli_num_rows($queryPemesanan);
        $dataIdPemesanan1 = mysqli_fetch_array($queryPemesanan);

        if ($jumRow > 0) {
        $queryCekIdPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_user='$id_user' AND id_toko='$id_toko' AND ket='0' ORDER BY id_pemesanan DESC ");
        $jumRow = mysqli_num_rows($queryCekIdPemesanan);
        $dataIdPemesanan2 = mysqli_fetch_array($queryCekIdPemesanan);

        if ($jumRow > 0) {
            $id_pemesanan = $dataIdPemesanan2['id_pemesanan'];  
        } else{
            $id_pemesanan = $dataIdPemesanan1['id_pemesanan']+1;  
        }
        } else{
            $id_pemesanan = "100";
        }

        $queryDataProduk = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_user='$id_user' AND id_produk='$id_produk' AND ket='0' ");
        $jumRow = mysqli_num_rows($queryDataProduk);
        $dataProduk = mysqli_fetch_array($queryDataProduk);

        $query = "";
        if($jumRow>0){
            // Update
            $jumlah += $dataProduk['jumlah'];
            $total_harga += $dataProduk['total_harga'];
            $id_pesanan = $dataProduk['id_pesanan'];
            $query = mysqli_query($koneksi, "UPDATE pesanan_produk SET jumlah='$jumlah', total_harga='$total_harga' WHERE id_pesanan='$id_pesanan' ");    
        } else {
            // Tambah
            $query = mysqli_query($koneksi, "INSERT INTO pesanan_produk (id_pemesanan, id_user, id_toko, id_produk, jumlah, harga, total_harga, waktu, ket) 
            VALUES ('$id_pemesanan', '$id_user', '$id_toko', '$id_produk', '$jumlah', '$harga', '$total_harga', '$tanggalDanWaktu', '$ket') ");
        }

        
        if($query){
            $queryUpdateProduk = mysqli_query($koneksi, "UPDATE produk SET stok='$stok' WHERE id_produk='$id_produk' ");

            echo '
                <script>
                    alert("Berhasil Menambahkan Pesanan");
                    window.location.href="../produk/";
                </script>
            ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Menambahkan Pesanan");
                    window.location.href="../produk/";
                </script>
            ';
        }    
    
    }




    else{

    }

?>