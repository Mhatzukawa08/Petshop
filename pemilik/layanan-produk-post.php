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

if (isset($_POST['tambah_produk'])) {
    $id_toko = $_POST['id_toko'];
    $jenis_produk = $_POST['jenis_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $file_name_image = $_FILES["gambar_produk"]["name"];
    $temp_name_image = $_FILES["gambar_produk"]["tmp_name"];
    $error_image = $_FILES["gambar_produk"]["error"];

    if (!file_exists("../gambar/produk/")) {
        mkdir("../gambar/produk/");
    }

    $array_name_image = explode('.', $file_name_image);
    $ekstensi_image = end($array_name_image);

    $kata_acak = kataAcak();
    $gambar = "$kata_acak.png";

    if ($error_image == 0) {
        if ($ekstensi_image == "png" || $ekstensi_image == "jpg" || $ekstensi_image == "jpeg") {
            move_uploaded_file($temp_name_image, "../gambar/produk/$gambar");

            $query = mysqli_query($koneksi, "INSERT INTO `produk` (`id_toko`, `nama_produk`, `jenis_produk`, `harga`, `stok`, `gambar`) 
                VALUES ('$id_toko', '$nama_produk', '$jenis_produk', '$harga', '$stok', '$gambar') ");

            if ($query) {
                echo '
                        <script>
                            alert("Berhasil Tambah Produk");
                            window.location.href="layanan-produk.php";
                        </script>
                    ';
            } else {
                echo '
                        <script>
                            alert("Gagal Tambah Produk");
                            window.location.href="layanan-produk.php";
                        </script>
                    ';
            }
        } else {
            echo '
                <script>
                    alert("Gambar hanya menerima png, jpg, jpeg");
                    window.location.href="layanan-produk.php";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                alert("Gambar bermasalah");
                window.location.href="layanan-produk.php";
            </script>
        ';
    }
}

if (isset($_POST['edit_produk'])) {
    $id_produk = $_POST['id_produk'];
    $jenis_produk = $_POST['jenis_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $gambar_sebelumnya = $_POST['gambar_sebelumnya'];

    $file_name_image = $_FILES["gambar_produk"]["name"];
    $temp_name_image = $_FILES["gambar_produk"]["tmp_name"];
    $error_image = $_FILES["gambar_produk"]["error"];

    if (!file_exists("../gambar/produk/")) {
        mkdir("../gambar/produk/");
    }

    $array_name_image = explode('.', $file_name_image);
    $ekstensi_image = end($array_name_image);

    $gambar = $gambar_sebelumnya;


    if ($error_image == 0) {
        if ($ekstensi_image == "png" || $ekstensi_image == "jpg" || $ekstensi_image == "jpeg") {
            move_uploaded_file($temp_name_image, "../gambar/produk/$gambar");   //Temp name image itu file nya

            $query = mysqli_query($koneksi, "UPDATE `produk` SET nama_produk='$nama_produk', jenis_produk='$jenis_produk', 
                harga='$harga', stok='$stok' WHERE id_produk='$id_produk' ");

            if ($query) {
                echo '
                        <script>
                            alert("Berhasil Edit Produk");
                            window.location.href="layanan-produk.php";
                        </script>
                    ';
            } else {
                echo '
                        <script>
                            alert("Gagal Edit Produk");
                            window.location.href="layanan-produk.php";
                        </script>
                    ';
            }
        } else {
            echo '
                    <script>
                        alert("Gambar hanya menerima png, jpg, jpeg");
                        window.location.href="layanan-produk.php";
                    </script>
                ';
        }
    } else {
        $query = mysqli_query($koneksi, "UPDATE `produk` SET nama_produk='$nama_produk', jenis_produk='$jenis_produk', 
                harga='$harga', stok='$stok' WHERE id_produk='$id_produk' ");

        if ($query) {
            echo '
                    <script>
                        alert("Berhasil Edit Produk");
                        window.location.href="layanan-produk.php";
                    </script>
                ';
        } else {
            echo '
                    <script>
                        alert("Gagal Edit Produk");
                        window.location.href="layanan-produk.php";
                    </script>
                ';
        }
    }
}

if (isset($_POST['hapus_produk'])) {
    $id_produk = $_POST['id_produk'];

    $query = mysqli_query($koneksi, "DELETE FROM `produk` WHERE id_produk='$id_produk' ");

    if ($query) {
        echo '
                <script>
                    alert("Berhasil Hapus Produk");
                    window.location.href="layanan-produk.php";
                </script>
            ';
    } else {
        echo '
                <script>
                    alert("Gagal Hapus Produk");
                    window.location.href="layanan-produk.php";
                </script>
            ';
    }
}
