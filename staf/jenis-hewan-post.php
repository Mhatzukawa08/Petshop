<?php 
    require_once '../koneksi.php';

    date_default_timezone_set('Asia/Makassar');
    $tanggalSaja = date('Y-m-d');
    $waktuSaja = date('H:i:s');
    $tanggalDanWaktu = date('Y-m-d H:i:s');

    if(isset($_POST['tambah_jenis_hewan'])){
        $id_toko = $_POST['id_toko'];
        $jenis_hewan = $_POST['jenis_hewan'];

        $query = mysqli_query($koneksi, "INSERT INTO `jenis_hewan` (`id_toko`, `jenis_hewan`) VALUES ('$id_toko', '$jenis_hewan') ");

        if($query){
            echo '
                <script>
                    alert("Berhasil Menambahkan Jenis Hewan");
                    window.location.href="jenis-hewan.php";
                </script>
            ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Menambahkan  Jenis Hewan");
                    window.location.href="jenis-hewan.php";
                </script>
            ';
        }    
    }

	if(isset($_POST['edit_jenis_hewan'])){
        $id_jenis_hewan = $_POST['id_jenis_hewan'];
        // $id_pemesanan = $_POST['id_pemesanan'];
        $jenis_hewan = $_POST['jenis_hewan'];

        $query = mysqli_query($koneksi, "UPDATE `jenis_hewan` SET jenis_hewan='$jenis_hewan' WHERE id_jenis_hewan='$id_jenis_hewan' ");

        if($query){
            echo '
                <script>
                    alert("Berhasil Edit Jenis Hewan");
                    window.location.href="jenis-hewan.php";
                </script>
            ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Edit Jenis Hewan");
                    window.location.href="jenis-hewan.php";
                </script>
            ';
        }
    }

	if(isset($_POST['hapus_jenis_hewan'])){
        $id_jenis_hewan = $_POST['id_jenis_hewan'];

        $query = mysqli_query($koneksi, "DELETE FROM `jenis_hewan` WHERE id_jenis_hewan='$id_jenis_hewan' ");

        if($query){
            echo '
                <script>
                    alert("Berhasil Hapus Jenis Hewan");
                    window.location.href="jenis-hewan.php";
                </script>
            ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Hapus Jenis Hewan");
                    window.location.href="jenis-hewan.php";
                </script>
            ';
        }
    }

?>