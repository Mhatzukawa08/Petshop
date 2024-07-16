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

    if(isset($_POST['pesan_produk'])){
        $id_toko = $_POST['id_toko'];
        $id_user = $_POST['id_user'];
        $id_pemesanan = $_POST['id_pemesanan'];
        $metode_pembayaran = $_POST['metode_pembayaran'];

        $query = mysqli_query($koneksi, "INSERT INTO pesanan_produk_temp (`id_pemesanan`, `id_user`, `id_toko`) VALUES ('$id_pemesanan', '$id_user', '$id_toko')");    
    
        if($query){
            if($metode_pembayaran=="bayar_online"){
                $kata_acak = kataAcak();
    
                $ket_pesanan = 1;   // 1.Produk; 2.penitipan; 3.Perawatan; 4.operasi; 5.vaksin
                $keterangan = "proses"; // pending=masih proses; settlement=berhasil; expire=gagal
                $order_id = orderId();
    
                $queryPesananTemp = mysqli_query($koneksi,"INSERT INTO `tranksaksi` (order_id, id_user, cek_id, ket_pesanan, keterangan) 
                                                        VALUES ('$order_id', '$id_user', '$id_pemesanan', '$ket_pesanan', '$keterangan' ) ");
    
                echo '
                    <script>
                        window.location.href="../../library/midtrans/examples/snap/checkout-process-simple-version.php?pesanan_produk=&order_id='.$kata_acak.'&id_pemesanan='.$id_pemesanan.'&id_user='.$id_user.'&id_toko='.$id_toko.'";
                    </script>
                ';
            } else{
                $query = mysqli_query($koneksi, "UPDATE pesanan_produk SET ket='1', 
                metode_pembayaran='$metode_pembayaran' WHERE id_user='$id_user' AND id_toko='$id_toko' AND ket='0' AND bayar='0' ");    
            
                if($query){
                    echo '
                        <script>
                            alert("Berhasil Menambahkan Pesanan");
                            window.location.href="../profile/keranjang-belanja.php?toko='.$id_toko.'";
                        </script>
                    ';
                    
                } else{ 
                    echo '
                        <script>
                            alert("Gagal Menambahkan Pesanan");
                            window.location.href="../profile/detail-keranjang-belanja.php?toko='.$id_toko.'";
                        </script>
                    ';
                }    
            }
        } else{

        }
    }

    if(isset($_POST['edit_produk'])){
        $id_toko = $_POST['id_toko'];
        $id_user = $_POST['id_user'];
        $metode_pembayaran = $_POST['metode_pembayaran'];

        $query = mysqli_query($koneksi, "UPDATE pesanan_produk SET ket='1', 
            metode_pembayaran='$metode_pembayaran' WHERE id_user='$id_user' AND id_toko='$id_toko' AND ket='0' AND bayar='0' ");    
        
        if($query){
            echo '
                <script>
                    alert("Berhasil Menambahkan Pesanan");
                    window.location.href="../toko/detail-toko.php?toko='.$id_toko.'";
                </script>
            ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Menambahkan Pesanan");
                    window.location.href="../toko/detail-toko.php?toko='.$id_toko.'";
                </script>
            ';
        }    
    
    }

?>