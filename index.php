<?php
   if (isset($_GET['logout'])) {
      setcookie("sebagai", "", time() - 1, "/"); // Menghapus Cookie
      setcookie("id", "", time() - 1, "/"); // Menghapus Cookie
      setcookie("username", "", time() - 1, "/"); // Menghapus Cookie
      setcookie("nama", "", time() - 1, "/"); // Menghapus Cookie
      header("location:user/");
   } else if ($_COOKIE['sebagai'] == "pemilik") {
      header("location:pemilik/");
   }else if ($_COOKIE['sebagai'] == "dokter") {
      header("location:dokter/pesanan-penitipan.php");
   } else if ($_COOKIE['sebagai'] == "karyawan") {
      header("location:staf/");
   } else if ($_COOKIE['sebagai'] == "user") {
      header("location:user/");
   } else {
      header("location:user/");
   }
?>