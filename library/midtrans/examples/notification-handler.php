<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-bddZ_qIC4jOFMGBrQ9fWGzjD';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
} catch (\Exception $e) {
    exit($e->getMessage());
}

include "koneksi.php";

$notif = $notif->getResponse();
$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;

$transaction_status = "";
if (isset($_GET)) {
    $transaction_status = $_GET['transaction_status'];
}
$status_code = $_GET['status_code']; // 200=settlement;; 201=pending;; 404=deny;; 406=gagal/cancel;; 407=expire;;

$username = "";
$kode_unik = "";
$password = "";

$sqlCekTranksaksi = mysqli_query($koneksi, "SELECT * FROM tranksaksi WHERE order_id='$order_id' ");
while ($hasil = mysqli_fetch_assoc($sqlCekTranksaksi)) {
    $username = $hasil['username'];
    $kode_unik = $hasil['kode_unik'];
}

$user = $username . "_" . $kode_unik;


if ($transaction == 'capture') {
    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
            echo "challenge";
            echo "Transaction order_id: " . $order_id . " is challenged by FDS";
        } else {
            echo "bukan challenge";
            // TODO set payment status in merchant's database to 'Success'
            echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
        }
    }
} else if ($transaction == 'settlement' || $transaction_status == 'settlement' || $status_code == '200') {
    // TODO set payment status in merchant's database to 'Settlement'

    // $update = mysqli_query($koneksi, "UPDATE `tranksaksi` SET `keterangan`='settlement' WHERE order_id='$order_id' ");
    $update = mysqli_query($koneksi, "UPDATE `tranksaksi` SET `keterangan`='success' WHERE order_id='$order_id' ");
    // $tambahUser = mysqli_query($koneksi, "INSERT INTO `user` (`username`,`kode_unik`,`nama`,`alamat`,`password`,`order_id`, `urut`) VALUES ('$username','$kode_unik','default','default','$password','$order_id', 'data_masuk' )");

    $sqlCariPassword = mysqli_query($koneksi, "SELECT * FROM tranksaksi order_id='$order_id' ");
    $row = mysqli_fetch_array($sqlCariPassword);
    $cek_id = $row['cek_id'];
    $ket_pesanan = $row['ket_pesanan'];

    if($ket_pesanan=="1"){              // 1 = Pesanan Produk
        $updatePesananProduk = mysqli_query($koneksi, "UPDATE `pesanan_produk` SET `ket`='1' WHERE id_pemesanan='$cek_id' ");

    } else if($ket_pesanan=="2"){       // 2 = Pesanan Penitipan
        $updatePesananPenitipan = mysqli_query($koneksi, "UPDATE `pesanan_penitipan` SET `ket`='1' WHERE id_pesanan_penitipan='$cek_id' ");
        
    } else if($ket_pesanan=="3"){       // 3 = Pesanan Perawatan

    } else if($ket_pesanan=="4"){       // 4 = Pesanan Operasi

    } else if($ket_pesanan=="5"){       // 5 = Pesanan Vaksin


        
    } 

    $tambahUser = mysqli_query($koneksi, "INSERT INTO `user` (`username`,`kode_unik`,`nama`,`alamat`,`password`,`order_id`, `urut`, `dari_tanggal`, `sampai_tanggal`) 
                                          VALUES ('$username','$kode_unik','default','default','$password','$order_id', 'data_masuk', '07:00:00', '16:00:00')");


    echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
} else if ($status_code == '201' || $transaction == 'pending' || $transaction_status == 'pending') {
    // TODO set payment status in merchant's database to 'Pending'
    $update = mysqli_query($koneksi, "UPDATE `tranksaksi` SET `keterangan`='pending' WHERE order_id='$order_id' ");

    if ($update) {
        header("location:../../");
    } else {
        echo "gagal";
    }
    echo "pending";

    echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
} else if ($transaction == 'deny' || $transaction_status == 'deny' || $status_code == '404') {
    // TODO set payment status in merchant's database to 'Denied'
    $update = mysqli_query($koneksi, "UPDATE `tranksaksi` SET `keterangan`='deny' WHERE order_id='$order_id' ");

    if ($update) {
        header("location:../../");
    } else {
        echo "gagal";
    }
    echo "deny";

    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'expire' || $transaction_status == 'expire' || $status_code == '407') {
    // TODO set payment status in merchant's database to 'expire'
    $update = mysqli_query($koneksi, "UPDATE `tranksaksi` SET `keterangan`='expire' WHERE order_id='$order_id' ");

    if ($update) {
        header("location:../../");
    } else {
        echo "gagal";
    }
    echo "expire";

    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel' || $transaction_status == 'cancel' || $status_code == '406') {
    // TODO set payment status in merchant's database to 'Denied'
    $update = mysqli_query($koneksi, "UPDATE `tranksaksi` SET `keterangan`='cancel' WHERE order_id='$order_id' ");

    if ($update) {
        header("location:../../");
    } else {
        echo "gagal";
    }
    echo "cancel";

    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}

function printExampleWarningMessage()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-bddZ_qIC4jOFMGBrQ9fWGzjD\';');
        die();
    }
}
