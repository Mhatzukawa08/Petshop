<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');

function kataAcak(): String
{
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($permitted_chars);
    $random_string = '';
    for ($i = 0; $i < 15; $i++) {
        $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

if (isset($_POST['tambah_jadwal'])) {
    $id_pesanan_operasi = $_POST['id_pesanan_operasi'];
    $id_pemesanan = $_POST['id_pemesanan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $jadwal = "$tanggal $waktu";
    $ket_jadwal = $_POST['ket_jadwal'];

    $query = mysqli_query($koneksi, "UPDATE `pesanan_operasi` SET jadwal='$jadwal', ket_jadwal='$ket_jadwal' WHERE id_pesanan_operasi='$id_pesanan_operasi' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Tambah Jadwal");
                    window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Tambah Jadwal");
                    window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                </script>
            ';
    }
}

if (isset($_POST['tambah_dokumentasi'])) {
    $id_pilihan_pesanan = "3";
    $id_pesanan_operasi = $_POST['id_pesanan_operasi'];
    $id_pemesanan = $_POST['id_pemesanan'];
    $keterangan = $_POST['keterangan'];

    $file_name_image = $_FILES["gambar_dokumentasi"]["name"];
    $temp_name_image = $_FILES["gambar_dokumentasi"]["tmp_name"];
    $error_image = $_FILES["gambar_dokumentasi"]["error"];

    if (!file_exists("../gambar/dokumentasi/")) {
        mkdir("../gambar/dokumentasi/");
    }

    $array_name_image = explode('.', $file_name_image);
    $ekstensi_image = end($array_name_image);

    $kata_acak = kataAcak();
    $gambar = "$kata_acak.png";

    if ($error_image == 0) {
        if ($ekstensi_image == "png" || $ekstensi_image == "jpg" || $ekstensi_image == "jpeg") {
            move_uploaded_file($temp_name_image, "../gambar/dokumentasi/$gambar");

            $query = mysqli_query($koneksi, "INSERT INTO `dokumentasi` (`id_pilihan_pesanan`, `id_pesanan`, `keterangan`, `gambar`, `waktu`) 
                VALUES ('$id_pilihan_pesanan', '$id_pesanan_operasi', '$keterangan', '$gambar', '$tanggalDanWaktu') ");

            if ($query) {
                echo '
                        <script>
                            alert("Berhasil Tambah Dokumentasi");
                            window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                        </script>
                    ';
            } else {
                echo '
                        <script>
                            alert("Gagal Tambah Dokumentasi");
                            window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                        </script>
                    ';
            }
        } else {
            echo '
                <script>
                    alert("Gambar hanya menerima png, jpg, jpeg");
                    window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("Gambar bermasalah");
                window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
            </script>
        ';
    }
}

if (isset($_POST['edit_dokumentasi'])) {
    $id_pemesanan = $_POST['id_pemesanan'];
    $id_dokumentasi = $_POST['id_dokumentasi'];
    $keterangan = $_POST['keterangan'];
    $gambar_sebelumnya = $_POST['gambar_sebelumnya'];

    $file_name_image = $_FILES["gambar_dokumentasi"]["name"];
    $temp_name_image = $_FILES["gambar_dokumentasi"]["tmp_name"];
    $error_image = $_FILES["gambar_dokumentasi"]["error"];

    if (!file_exists("../gambar/dokumentasi/")) {
        mkdir("../gambar/dokumentasi/");
    }

    $array_name_image = explode('.', $file_name_image);
    $ekstensi_image = end($array_name_image);

    $gambar = kataAcak().".png";

    if ($error_image == 0) {
        if ($ekstensi_image == "png" || $ekstensi_image == "jpg" || $ekstensi_image == "jpeg") {
            move_uploaded_file($temp_name_image, "../gambar/dokumentasi/$gambar");   //Temp name image itu file nya

            $query = mysqli_query($koneksi, "UPDATE `dokumentasi` SET keterangan='$keterangan', gambar='$gambar' WHERE id_dokumentasi='$id_dokumentasi' ");

            if ($query) {
                echo '
                        <script>
                            alert("Berhasil Edit Dokumentasi");
                            window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                        </script>
                    ';
            } else {
                echo '
                        <script>
                            alert("Gagal Edit Dokumentasi");
                            window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                        </script>
                    ';
            } 
        } else {
            echo '
                <script>
                    alert("Gambar hanya menerima png, jpg, jpeg");
                    window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                </script>
            ';
        }
    } else {
        $query = mysqli_query($koneksi, "UPDATE `dokumentasi` SET keterangan='$keterangan' WHERE id_dokumentasi='$id_dokumentasi' ");

        if ($query) {
            echo '
                    <script>
                        alert("Berhasil Edit Dokumentasi");
                        window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                    </script>
                ';
        } else {
            echo '
                    <script>
                        alert("Gagal Edit Dokumentasi");
                        window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                    </script>
                ';
        }
    }
}

if (isset($_POST['hapus_dokumentasi'])) {
    $id_dokumentasi = $_POST['id_dokumentasi'];
    $id_pemesanan = $_POST['id_pemesanan'];

    $query = mysqli_query($koneksi, "DELETE FROM `dokumentasi` WHERE id_dokumentasi='$id_dokumentasi' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Hapus Dokumentasi");
                    window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Hapus Dokumentasi");
                    window.location.href="pesanan-operasi.php?id_pemesanan=' . $id_pemesanan . '";
                </script>
            ';
    }
}

if (isset($_POST['konfirmasi_pesanan'])) {
    $id_pesanan_operasi = $_POST['id_pesanan_operasi'];
    $id_pemesanan = $_POST['id_pemesanan'];

    $query = mysqli_query($koneksi, "UPDATE pesanan_operasi SET ket='1', bayar='1' WHERE id_pesanan_operasi='$id_pesanan_operasi' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Konfirmasi Pesanan");
                    window.location.href="riwayat-pesanan-operasi.php?id_pesanan_operasi=' . $id_pesanan_operasi . '";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Konfirmasi Pesanan");
                    window.location.href="riwayat-pesanan-operasi.php?id_pesanan_operasi=' . $id_pesanan_operasi . '";
                </script>
            ';
    }
}