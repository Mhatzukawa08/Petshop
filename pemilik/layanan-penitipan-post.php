<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');


if (isset($_POST['tambah_penitipan'])) {
    $id_toko = $_POST['id_toko'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $harga_penitipan = $_POST['harga_penitipan'];
    $harga_makanan = $_POST['harga_makanan'];

    $query = mysqli_query($koneksi, "INSERT INTO `penitipan` (`id_toko`, `jenis_hewan`, `harga`, `harga_makanan`) 
                VALUES ('$id_toko', '$jenis_hewan', '$harga_penitipan', '$harga_makanan' ) ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Tambah penitipan");
                    window.location.href="layanan-penitipan.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Tambah penitipan");
                    window.location.href="layanan-penitipan.php";
                </script>
            ';
    }
}

if (isset($_POST['edit_penitipan'])) {
    $id_penitipan = $_POST['id_penitipan'];
    $harga_penitipan = $_POST['harga_penitipan'];
    $harga_makanan = $_POST['harga_makanan'];

    $query = mysqli_query($koneksi, "UPDATE `penitipan` SET harga='$harga_penitipan', 
                harga_makanan='$harga_makanan' WHERE id_penitipan='$id_penitipan' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Edit penitipan");
                    window.location.href="layanan-penitipan.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Edit penitipan");
                    window.location.href="layanan-penitipan.php";
                </script>
            ';
    }
}

if (isset($_POST['hapus_penitipan'])) {
    $id_penitipan = $_POST['id_penitipan'];

    $query = mysqli_query($koneksi, "DELETE FROM `penitipan` WHERE id_penitipan='$id_penitipan' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Hapus penitipan");
                    window.location.href="layanan-penitipan.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Hapus penitipan");
                    window.location.href="layanan-penitipan.php";
                </script>
            ';
    }
}
