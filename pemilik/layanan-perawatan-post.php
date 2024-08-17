<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');


if (isset($_POST['tambah_perawatan'])) {
    $id_toko = $_POST['id_toko'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $jenis_perawatan = $_POST['jenis_perawatan'];
    $harga = $_POST['harga'];

    $query = mysqli_query($koneksi, "INSERT INTO `perawatan` (`id_toko`, `jenis_hewan`, `jenis_perawatan`, `harga`) 
                VALUES ('$id_toko', '$jenis_hewan', '$jenis_perawatan', '$harga' ) ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Tambah perawatan");
                    window.location.href="layanan-perawatan.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Tambah perawatan");
                    window.location.href="layanan-perawatan.php";
                </script>
            ';
    }
}

if (isset($_POST['edit_perawatan'])) {
    $id_perawatan = $_POST['id_perawatan'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $jenis_perawatan = $_POST['jenis_perawatan'];
    $harga = $_POST['harga'];

    $query = mysqli_query($koneksi, "UPDATE `perawatan` SET jenis_hewan='$jenis_hewan', jenis_perawatan='$jenis_perawatan', 
                harga='$harga' WHERE id_perawatan='$id_perawatan' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Edit perawatan");
                    window.location.href="layanan-perawatan.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Edit perawatan");
                    window.location.href="layanan-perawatan.php";
                </script>
            ';
    }
}

if (isset($_POST['hapus_perawatan'])) {
    $id_perawatan = $_POST['id_perawatan'];

    $query = mysqli_query($koneksi, "DELETE FROM `perawatan` WHERE id_perawatan='$id_perawatan' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Hapus perawatan");
                    window.location.href="layanan-perawatan.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Hapus perawatan");
                    window.location.href="layanan-perawatan.php";
                </script>
            ';
    }
}
