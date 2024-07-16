<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');


if (isset($_POST['konfirmasi_pesanan'])) {
    $id_pesanan_produk = $_POST['id_pesanan_produk'];
    $id_pemesanan = $_POST['id_pemesanan'];

    $query = mysqli_query($koneksi, "UPDATE pesanan_produk SET selesai='1' WHERE id_pemesanan='$id_pemesanan' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Konfirmasi Pesanan");
                    window.location.href="pesanan-produk.php?id_pesanan_produk=' . $id_pesanan_produk . '";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Konfirmasi Pesanan");
                    window.location.href="pesanan-produk.php?id_pesanan_produk=' . $id_pesanan_produk . '";
                </script>
            ';
    }
}

