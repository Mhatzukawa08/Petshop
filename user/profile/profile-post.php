<?php 
    require_once '../../koneksi.php';

    date_default_timezone_set('Asia/Makassar');
    $tanggalSaja = date('Y-m-d');
    $waktuSaja = date('H:i:s');
    $tanggalDanWaktu = date('Y-m-d H:i:s');

    if(isset($_POST['post_profile'])){
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $nomor_hp = $_POST['nomor_hp'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama', nomor_hp='$nomor_hp', alamat='$alamat', 
                                         username='$username', password='$password' WHERE id_user='$id_user' ");    
        
        if($query){
            setcookie("id", $id_user, time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
            setcookie("username", $username, time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu
            setcookie("nama", $nama, time() + (86400 * 7), "/"); // // 24 jam * 7 hari = 1 Minggu

            echo '
                <script>
                    alert("Berhasil Update Data");
                    window.location.href="profile.php";
                </script>
            ';
        }
        else{ 
            echo '
                <script>
                    alert("Gagal Update Data");
                    window.location.href="profile.php";
                </script>
            ';
        }    
    
    }




    else{

    }

?>