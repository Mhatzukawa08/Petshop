<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');


if (isset($_POST['tambah_operasi'])) {
    $id_toko = $_POST['id_toko'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $jenis_operasi = $_POST['jenis_operasi'];
    $harga = $_POST['harga'];

    $query = mysqli_query($koneksi, "INSERT INTO `operasi` (`id_toko`, `jenis_hewan`, `jenis_operasi`, `harga`) 
                VALUES ('$id_toko', '$jenis_hewan', '$jenis_operasi', '$harga' ) ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Tambah operasi");
                    window.location.href="layanan-operasi.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Tambah operasi");
                    window.location.href="layanan-operasi.php";
                </script>
            ';
    }
}

if (isset($_POST['edit_operasi'])) {
    $id_operasi = $_POST['id_operasi'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $jenis_operasi = $_POST['jenis_operasi'];
    $harga = $_POST['harga'];

    $query = mysqli_query($koneksi, "UPDATE `operasi` SET jenis_hewan='$jenis_hewan', jenis_operasi='$jenis_operasi', 
                harga='$harga' WHERE id_operasi='$id_operasi' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Edit operasi");
                    window.location.href="layanan-operasi.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Edit operasi");
                    window.location.href="layanan-operasi.php";
                </script>
            ';
    }
}

if (isset($_POST['hapus_operasi'])) {
    $id_operasi = $_POST['id_operasi'];

    $query = mysqli_query($koneksi, "DELETE FROM `operasi` WHERE id_operasi='$id_operasi' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Hapus operasi");
                    window.location.href="layanan-operasi.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Hapus operasi");
                    window.location.href="layanan-operasi.php";
                </script>
            ';
    }
}
