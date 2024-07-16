<?php 
    require_once '../../koneksi.php';

    date_default_timezone_set('Asia/Makassar');
    $tanggalSaja = date('Y-m-d');
    $waktuSaja = date('H:i:s');
    $tanggalDanWaktu = date('Y-m-d H:i:s');

    function kataAcak(): string{
        $acak = "";
        $kata = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for($i=0; $i<20; $i++){
            $pos = rand(0, strlen($kata)-1);
            $acak .= $kata[$pos];
        }
        return $acak;
    }

    function orderId(): string{
        $acak = "";
        $kata = "1234567890";
        for($i=0; $i<12; $i++){
            $pos = rand(0, strlen($kata)-1);
            $acak .= $kata[$pos];
        }
        return $acak;
    }


    if(isset($_POST['tambah_pesanan_penitipan'])){
        $id_toko = $_POST['id_toko'];
        $id_user = $_POST['id_user'];
        $nama_hewan = $_POST['nama_hewan'];
        $tanggal_penitipan = $_POST['tanggal_penitipan'];
        $jumlah_hari = $_POST['jumlah_hari'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $pesan = $_POST['pesan'];
        $makanan = $_POST['makanan'];
        
        $array_jenis_hewan = $_POST['jenis_hewan'];

        $explode = explode(";;", $array_jenis_hewan);
        $jenis_hewan = $explode[0];
        $harga_perhari = $explode[1];
        $value_harga_makanan = $explode[2];

        $harga_makanan = "0";
        if($makanan == "makanan_pihak_petshop"){
            $harga_makanan = $value_harga_makanan;
        }

        $total_harga_perhari = $harga_perhari+$harga_makanan;
        $total_harga = $total_harga_perhari*$jumlah_hari;
        $waktu = $tanggalDanWaktu;

        $kata_acak = kataAcak();

        // echo "id_pemesanan= $id_pemesanan ;; id_toko= $id_toko ;; id_user= $id_user ;; 
        // nama_hewan= $nama_hewan ;; tanggal_penitipan= $tanggal_penitipan ;; jumlah_hari= $jumlah_hari ;; 
        // metode_pembayaran= $metode_pembayaran ;; pesan= $pesan ;; makanan= $makanan ;;
        // jenis_hewan= $jenis_hewan ;; harga_perhari= $harga_perhari ;; harga_makanan= $harga_makanan ;;  
        // total_harga= $total_harga ;; waktu= $waktu ;; ";

        $query = mysqli_query($koneksi,"INSERT INTO pesanan_penitipan (kode_unik, id_toko, id_user, nama_hewan, jenis_hewan, tanggal_penitipan, 
                                        jumlah_hari, metode_pembayaran, pesan, harga_perhari, harga_makanan, total_harga, ket, waktu) 
                                        VALUES ('$kata_acak', '$id_toko', '$id_user', '$nama_hewan', '$jenis_hewan', '$tanggal_penitipan',
                                        '$jumlah_hari', '$metode_pembayaran', '$pesan', '$harga_perhari', '$harga_makanan', '$total_harga', '0', '$waktu' ) ");

        if($query){
            if($metode_pembayaran=="bayar_online"){
                $queryAmbilIdPesananPenitipan = mysqli_query($koneksi, "SELECT * FROM `pesanan_penitipan` WHERE kode_unik='$kata_acak' ");
                $dataAmbilIdPesananPenitipan = mysqli_fetch_array($queryAmbilIdPesananPenitipan);
                $cek_id = $dataAmbilIdPesananPenitipan['id_pesanan_penitipan'];

                $ket_pesanan = 2;   // 1.Produk; 2.penitipan; 3.perawatan; 4.operasi; 5.vaksin
                $keterangan = "proses"; // pending=masih proses; settlement=berhasil; expire=gagal
                $order_id = orderId();

                $queryPesananTemp = mysqli_query($koneksi,"INSERT INTO `tranksaksi` (order_id, id_user, cek_id, ket_pesanan, keterangan) 
                                                           VALUES ('$order_id', '$id_user', '$cek_id', '$ket_pesanan', '$keterangan' ) ");

                echo '
                    <script>
                        window.location.href="../../library/midtrans/examples/snap/checkout-process-simple-version.php?pesanan_penitipan=&order_id='.$kata_acak.'&id_user='.$id_user.'&id_pesanan_penitipan='.$cek_id.'&total_harga_perhari='.$total_harga_perhari.'&jumlah_hari='.$jumlah_hari.'";
                    </script>
                ';
            } else{
                echo '
                    <script>
                        alert("Berhasil Menambahkan Pesanan");
                        window.location.href="../penitipan/?toko='.$id_toko.'";
                    </script>
                ';
            }
            // echo '
            //     <script>
            //         alert("Berhasil Menambahkan Pesanan");
            //         window.location.href="../penitipan/?toko='.$id_toko.'";
            //     </script>
            // ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Menambahkan Pesanan");
                    window.location.href="../penitipan/?toko='.$id_toko.'";
                </script>
            ';
        }    
    
    }




    else{

    }

?>