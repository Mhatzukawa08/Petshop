<?php
    require_once '../../koneksi.php';

    date_default_timezone_set('Asia/Makassar');
    $tanggalSaja = date('Y-m-d');
    $waktuSaja = date('H:i:s');
    $tanggalDanWaktu = date('Y-m-d H:i:s');

    function kataAcak(): string
    {
        $acak = "";
        $kata = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for ($i = 0; $i < 20; $i++) {
            $pos = rand(0, strlen($kata) - 1);
            $acak .= $kata[$pos];
        }
        return $acak;
    }

    function orderId(): string
    {
        $acak = "";
        $kata = "1234567890";
        for ($i = 0; $i < 12; $i++) {
            $pos = rand(0, strlen($kata) - 1);
            $acak .= $kata[$pos];
        }
        return $acak;
    }




    if (isset($_POST['pesan_vaksin'])) {
        $id_toko = $_POST['id_toko'];
        $id_user = $_POST['id_user'];
        $nama_hewan = $_POST['nama_hewan'];
        $id_vaksin = $_POST['jenis_hewan'];
        $vaksin_ke = $_POST['vaksin_ke'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $pesan = $_POST['pesan'];
        $ket = 0;
        $waktu = $tanggalDanWaktu;

        $kode_unik = kataAcak();

        $query = mysqli_query($koneksi, "INSERT INTO pesanan_vaksin (kode_unik, id_toko, id_user, nama_hewan, id_vaksin, vaksin_ke, 
                                                metode_pembayaran, pesan, ket, waktu) 
                                                VALUES ('$kode_unik', '$id_toko', '$id_user', '$nama_hewan', '$id_vaksin', '$vaksin_ke', 
                                                '$metode_pembayaran', '$pesan', '0', '$waktu' ) ");

        if ($query) {
            if ($metode_pembayaran == "bayar_online") {
                
                $queryCekHarga = mysqli_query($koneksi, "SELECT * FROM `vaksin` WHERE id_vaksin='$id_vaksin' ");
                $dataCekHarga = mysqli_fetch_array($queryCekHarga);
                $harga_vaksin = "";
                
                if($vaksin_ke=="1"){
                    $harga_vaksin = $dataCekHarga['vaksin_1'];
                } else if($vaksin_ke=="2"){
                    $harga_vaksin = $dataCekHarga['vaksin_2'];
                } else if($vaksin_ke=="3"){
                    $harga_vaksin = $dataCekHarga['vaksin_3'];
                }
                
                $queryAmbilIdPesananVaksin = mysqli_query($koneksi, "SELECT * FROM `pesanan_vaksin` WHERE kode_unik='$kode_unik' ");
                $dataAmbilIdPesananVaksin = mysqli_fetch_array($queryAmbilIdPesananVaksin);
                $cek_id = $dataAmbilIdPesananVaksin['id_pesanan_vaksin'];

                $ket_pesanan = 5;   // 1.Produk; 2.penitipan; 3.Perawatan; 4.operasi; 5.vaksin
                $keterangan = "proses"; // pending=masih proses; settlement=berhasil; expire=gagal
                $order_id = orderId();

                $queryPesananTemp = mysqli_query($koneksi, "INSERT INTO `tranksaksi` (order_id, id_user, cek_id, ket_pesanan, keterangan) 
                                                        VALUES ('$kode_unik', '$id_user', '$cek_id', '$ket_pesanan', '$keterangan' ) ");

                echo "order_id: $kode_unik, id: $id_pesanan_operasi, cek_id: $cek_id, id_user:$id_user, harga: $harga_vaksin, vaksin ke:$vaksin_ke ";

                // echo '
                //     <script>
                //         window.location.href="../../library/midtrans/examples/snap/checkout-process-simple-version.php?pesanan_vaksin&order_id=' . $kata_acak . '&id_pesanan_operasi=' . $cek_id . '&id_user=' . $id_user . '&harga_vaksin=' . $harga_vaksin . '&vaksin_ke=' . $vaksin_ke . '";
                //     </script>
                // ';
            } else {
                echo '
                    <script>
                        alert("Berhasil Menambahkan Pesanan");
                        window.location.href="../vaksin/?toko=' . $id_toko . '";
                    </script>
                ';
            }
            // echo '
            //     <script>
            //         alert("Berhasil Menambahkan Pesanan");
            //         window.location.href="../perawatan/?toko='.$id_toko.'";
            //     </script>
            // ';
        } else {
            echo '
                <script>
                    alert("Gagal Menambahkan Pesanan");
                    window.location.href="../perawatan/?toko=' . $id_toko . '";
                </script>
            ';
        }
    }
?>