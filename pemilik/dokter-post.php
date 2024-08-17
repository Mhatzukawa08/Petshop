<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');

if (isset($_POST['tambah_karyawan'])) {
    $id_toko = $_POST['id_toko'];
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "INSERT INTO `karyawan_dokter` (`id_toko`, `nama`, `nomor_hp`, `alamat`, `username`, `password`, `sebagai`, `tanggal`) 
        VALUES ('$id_toko', '$nama', '$nomor_hp', '$alamat', '$username', '$password', 'dokter', '$tanggalDanWaktu')");

    if ($query) {
        echo '
            <script>
                alert("Berhasil Tambah dokter");
                window.location.href="dokter.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Gagal Tambah dokter");
                window.location.href="dokter.php";
            </script>
        ';
    }
}

if (isset($_POST['edit_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $id_toko = $_POST['id_toko'];
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "UPDATE `karyawan_dokter` SET nama='$nama', nomor_hp='$nomor_hp', alamat='$alamat', username='$username', 
            password='$password' WHERE id_karyawan='$id_karyawan' ");

    if ($query) {
        echo '
            <script>
                alert("Berhasil Edit Dokter");
                window.location.href="dokter.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Gagal Edit dokter");
                window.location.href="dokter.php";
            </script>
        ';
    }
}

if (isset($_POST['hapus_karyawan'])) {
    $id_karyawan = $_POST['id_karyawan'];

    $query = mysqli_query($koneksi, "DELETE FROM `karyawan_dokter` WHERE id_karyawan='$id_karyawan' ");

    if ($query) {
        echo '
            <script>
                alert("Berhasil Hapus dokter");
                window.location.href="dokter.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Gagal Hapus dokter");
                window.location.href="dokter.php";
            </script>
        ';
    }
}
