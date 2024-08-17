<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');


if (isset($_POST['tambah_vaksin'])) {
    $id_toko = $_POST['id_toko'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $vaksin_1 = $_POST['vaksin_1'];
    $vaksin_2 = $_POST['vaksin_2'];
    $vaksin_3 = $_POST['vaksin_3'];

    $query = mysqli_query($koneksi, "INSERT INTO `vaksin` (`id_toko`, `jenis_hewan`, `vaksin_1`, `vaksin_2`, `vaksin_3`) 
                VALUES ('$id_toko', '$jenis_hewan', '$vaksin_1', '$vaksin_2', '$vaksin_3' ) ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Tambah vaksin");
                    window.location.href="layanan-vaksin.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Tambah vaksin");
                    window.location.href="layanan-vaksin.php";
                </script>
            ';
    }
}

if (isset($_POST['edit_vaksin'])) {
    $id_vaksin = $_POST['id_vaksin'];
    $jenis_hewan = $_POST['jenis_hewan'];
    $vaksin_1 = $_POST['vaksin_1'];
    $vaksin_2 = $_POST['vaksin_2'];
    $vaksin_3 = $_POST['vaksin_3'];

    $query = mysqli_query($koneksi, "UPDATE `vaksin` SET jenis_hewan='$jenis_hewan', vaksin_1='$vaksin_1', 
                vaksin_2='$vaksin_2', vaksin_3='$vaksin_3' WHERE id_vaksin='$id_vaksin' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Edit vaksin");
                    window.location.href="layanan-vaksin.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Edit vaksin");
                    window.location.href="layanan-vaksin.php";
                </script>
            ';
    }
}

if (isset($_POST['hapus_vaksin'])) {
    $id_vaksin = $_POST['id_vaksin'];

    $query = mysqli_query($koneksi, "DELETE FROM `vaksin` WHERE id_vaksin='$id_vaksin' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Hapus vaksin");
                    window.location.href="layanan-vaksin.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Hapus vaksin");
                    window.location.href="layanan-vaksin.php";
                </script>
            ';
    }
}
