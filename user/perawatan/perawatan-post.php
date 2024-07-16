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
    


    if(isset($_POST['pesan_perawatan'])){
        $id_toko = $_POST['id_toko'];
        $id_user = $_POST['id_user'];
        $nama_hewan = $_POST['nama_hewan'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $pesan = $_POST['pesan'];
        $ket = 0;
        $waktu = $tanggalDanWaktu;
        $kata_acak = kataAcak();
        
        $id_pemesanan = "100";
        $queryPemesanan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` ORDER BY id_pemesanan DESC");
        $jumRow = mysqli_num_rows($queryPemesanan);
        $dataIdPemesanan1 = mysqli_fetch_array($queryPemesanan);

        if ($jumRow > 0) {
            $id_pemesanan = $dataIdPemesanan1['id_pemesanan']+1;  
        } else{
            $id_pemesanan = "100";
        }

        $cekSuccess = true;
        $jenis_perawatan = $_POST['jenis_perawatan'];
        $nama_perawatan = "";
        $harga = 0;
        foreach($jenis_perawatan as $nilai){
            $explode = explode(";;", $nilai);
            $id_perawatan = $explode[0];
            $nama_perawatan .= $explode[1].", ";
            $harga_per_perawatan = $explode[2];
            $harga+=$harga_per_perawatan;

            $query = mysqli_query($koneksi,"INSERT INTO pesanan_perawatan (id_pemesanan, kode_unik, id_toko, id_user, nama_hewan, id_perawatan, 
                                            metode_pembayaran, pesan, ket, waktu) 
                                            VALUES ('$id_pemesanan', '$kata_acak', '$id_toko', '$id_user', '$nama_hewan', '$id_perawatan', 
                                            '$metode_pembayaran', '$pesan', '0', '$waktu' ) ");

            if(!$query){
                $cekSuccess=false;
                echo "gagal";
            }

            // echo "'$id_pemesanan', '$kata_acak', '$id_user', '$nama_hewan', '$id_perawatan', 
            // '$metode_pembayaran', '$pesan', '0', '$waktu'";
        }


        
        if($cekSuccess){
            if($metode_pembayaran=="bayar_online"){
                $queryAmbilIdPesananperawatan = mysqli_query($koneksi, "SELECT * FROM `pesanan_perawatan` WHERE kode_unik='$kata_acak' ");
                $dataAmbilIdPesananperawatan = mysqli_fetch_array($queryAmbilIdPesananperawatan);
                $cek_id = $dataAmbilIdPesananperawatan['id_pesanan_perawatan'];

                $ket_pesanan = 3;   // 1.Produk; 2.perawatan; 3.perawatan; 4.operasi; 5.vaksin
                $keterangan = "proses"; // pending=masih proses; settlement=berhasil; expire=gagal
                $order_id = orderId();

                $queryPesananTemp = mysqli_query($koneksi,"INSERT INTO `tranksaksi` (order_id, id_user, cek_id, ket_pesanan, keterangan) 
                                                           VALUES ('$order_id', '$id_user', '$cek_id', '$ket_pesanan', '$keterangan' ) ");


                echo '
                    <script>
                        window.location.href="../../library/midtrans/examples/snap/checkout-process-simple-version.php?pesanan_perawatan=&order_id='.$kata_acak.'&id_pesanan_perawatan='.$cek_id.'&id_user='.$id_user.'&harga_per_perawatan='.$harga.'&jenis_perawatan='.$nama_perawatan.'";
                    </script>
                ';
            } else{
                echo '
                    <script>
                        alert("Berhasil Menambahkan Pesanan");
                        window.location.href="../perawatan/?toko='.$id_toko.'";
                    </script>
                ';
            }
            // echo '
            //     <script>
            //         alert("Berhasil Menambahkan Pesanan");
            //         window.location.href="../perawatan/?toko='.$id_toko.'";
            //     </script>
            // ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Menambahkan Pesanan");
                    window.location.href="../perawatan/?toko='.$id_toko.'";
                </script>
            ';
        }    
    
    }




    else{

    }

?>