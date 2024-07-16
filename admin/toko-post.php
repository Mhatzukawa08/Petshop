<?php
require_once '../koneksi.php';

date_default_timezone_set('Asia/Makassar');
$tanggalSaja = date('Y-m-d');
$waktuSaja = date('H:i:s');
$tanggalDanWaktu = date('Y-m-d H:i:s');

function kataAcak(): string{
    $acak = "";
    $kata = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    for($i=0; $i<15; $i++){
        $pos = rand(0, strlen($kata)-1);
        $acak .= $kata[$pos];
    }
    return $acak;
}

if (isset($_POST['edit_toko'])) {
    $id_toko = $_POST['id_toko'];
    $nama_toko = $_POST['nama_toko'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $link_instagram = $_POST['link_instagram'];
    $hari_operasional = $_POST['hari_operasional'];
    $jam_operasional = $_POST['jam_operasional'];

    $file_name_image = $_FILES["gambar_toko"]["name"];
    $temp_name_image = $_FILES["gambar_toko"]["tmp_name"];
    $error_image = $_FILES["gambar_toko"]["error"];

    if (!file_exists("../gambar/toko/")) {
        mkdir("../gambar/toko/");
    }

    $array_name_image = explode('.', $file_name_image);
    $ekstensi_image = end($array_name_image);

    $gambar = kataAcak().".png";

    if ($error_image == 0) {
        if ($ekstensi_image == "png" || $ekstensi_image == "jpg" || $ekstensi_image == "jpeg") {
            move_uploaded_file($temp_name_image, "../gambar/toko/$gambar");   //Temp name image itu file nya

            $query = mysqli_query($koneksi, "UPDATE `toko` SET nama_toko='$nama_toko', nomor_hp='$nomor_hp', alamat='$alamat', nama_pemilik='$nama_pemilik', 
            gambar_toko='$gambar', link_instagram='$link_instagram', hari_operasional='$hari_operasional', jam_operasional='$jam_operasional' WHERE id_toko='$id_toko' ");

            if ($query) {
                echo '
                        <script>
                            alert("Berhasil Edit Toko");
                            window.location.href="toko.php";
                        </script>
                    ';
            } else {
                echo '
                        <script>
                            alert("Gagal Edit Toko");
                            window.location.href="toko.php";
                        </script>
                    ';
            } 
        } else {
            echo '
                <script>
                    alert("Gambar hanya menerima png, jpg, jpeg");
                    window.location.href="toko.php";
                </script>
            ';
        }
    } else {
        $query = mysqli_query($koneksi, "UPDATE `toko` SET nama_toko='$nama_toko', nomor_hp='$nomor_hp', alamat='$alamat', nama_pemilik='$nama_pemilik', 
            link_instagram='$link_instagram', hari_operasional='$hari_operasional', jam_operasional='$jam_operasional' WHERE id_toko='$id_toko' ");

        if ($query) {
            echo '
                    <script>
                        alert("Berhasil Edit Toko");
                        window.location.href="toko.php";
                    </script>
                ';
        } else {
            echo '
                    <script>
                        alert("Gagal Edit Toko");
                        window.location.href="toko.php";
                    </script>
                ';
        }
    }
}