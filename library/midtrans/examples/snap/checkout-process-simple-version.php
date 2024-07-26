<?php
    // This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
    // Please refer to this docs for snap popup:
    // https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

    namespace Midtrans;

    require_once dirname(__FILE__) . '/../../Midtrans.php';
    // Set Your server key
    // can find in Merchant Portal -> Settings -> Access keys
    Config::$serverKey = 'SB-Mid-server-bddZ_qIC4jOFMGBrQ9fWGzjD';
    Config::$clientKey = 'SB-Mid-client-0s2Zn970TPP422VS';

    // non-relevant function only used for demo/example purpose
    printExampleWarningMessage();

    // Uncomment for production environment
    // Config::$isProduction = true;
    Config::$isSanitized = Config::$is3ds = true;

    include "../koneksi.php";

    // Required
    // Kode Unik
    $order_id = "";
    $id_user = "";

    // Array
    $item_details = array (

    );
    if(isset($_GET)){
        $order_id = $_GET['order_id'];
        $id_user = $_GET['id_user'];

        if(isset($_GET['pesanan_produk'])){
            $id_toko = $_GET['id_toko'];

            $query = mysqli_query($koneksi, "SELECT * FROM `pesanan_produk` WHERE id_user='$id_user' AND id_toko='$id_toko' ");
            while($row = mysqli_fetch_assoc($query)){
                $id_pesanan = $row['id_pesanan'];
                $id_pemesanan = $row['id_pemesanan'];
                $id_user = $row['id_user'];
                $id_produk = $row['id_produk'];
                $jumlah = $row['jumlah'];
                $harga = $row['harga'];
                $total_harga = $row['total_harga'];
                $waktu = $row['waktu'];
                $ket = $row['ket'];

                $queryProduk = mysqli_query($koneksi, "SELECT * FROM produk where id_produk='$id_produk' ");
		        $data = mysqli_fetch_array($queryProduk);
                $nama_produk = $data['nama_produk'];

                $valueAddItem = array(
                    'id' => "$id_pesanan",
                    'price' => $harga,
                    'quantity' => $jumlah,
                    'name' => "$nama_produk"
                );

                array_push($item_details, $valueAddItem);
            }

        } else if(isset($_GET['pesanan_penitipan'])){
            $id_pesanan_penitipan = $_GET['id_pesanan_penitipan'];
            $total_harga_perhari = $_GET['total_harga_perhari'];
            $jumlah_hari = $_GET['jumlah_hari'];
            $order_id = $_GET['order_id'];

            $valueAddItem = array(
                'id' => "$id_pesanan_penitipan",
                'price' => $total_harga_perhari,
                'quantity' => $jumlah_hari,
                'name' => "Hari Penitipan"
            );

            array_push($item_details, $valueAddItem);

        } else if(isset($_GET['pesanan_perawatan'])){
            $id_pesanan_perawatan = $_GET['id_pesanan_perawatan'];
            $harga_per_perawatan = $_GET['harga_per_perawatan'];
            $jenis_perawatan = $_GET['jenis_perawatan'];
            $order_id = $_GET['order_id'];

            $valueAddItem = array(
                'id' => "$id_pesanan_perawatan",
                'price' => $harga_per_perawatan,
                'quantity' => 1,
                'name' => "$jenis_perawatan"
            );

            array_push($item_details, $valueAddItem);

        } else if(isset($_GET['pesanan_operasi'])){
            $id_pesanan_operasi = $_GET['id_pesanan_operasi'];
            $harga_per_operasi = $_GET['harga_per_operasi'];
            $jenis_operasi = $_GET['jenis_operasi'];
            $order_id = $_GET['order_id'];

            $valueAddItem = array(
                'id' => "$id_pesanan_operasi",
                'price' => $harga_per_operasi,
                'quantity' => 1,
                'name' => "$jenis_operasi"
            );

            array_push($item_details, $valueAddItem);
            
        } else if(isset($_GET['pesanan_vaksin'])){
            $id_pesanan_vaksin = $_GET['id_pesanan_vaksin'];
            $harga_vaksin = $_GET['harga_vaksin'];
            $vaksin_ke = "Vaksin Ke-".$_GET['vaksin_ke'];
            $order_id = $_GET['order_id'];

            $valueAddItem = array(
                'id' => "$id_pesanan_vaksin",
                'price' => $harga_per_vaksin,
                'quantity' => 1,
                'name' => "$vaksin_ke"
            );

            array_push($item_details, $valueAddItem);
        }
    }

    $nama = "";
    $email = "";
    $nomor_hp = "";

    $sqlTranksaksi = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user' ");
    while($tranksaksi=mysqli_fetch_assoc($sqlTranksaksi)){
        // $id_tranksaksi = $tranksaksi['no'];
        $nama = $tranksaksi['nama'];
        $email = "email@gmail.com";
        $nomor_hp = $tranksaksi['nomor_hp'];
    }
    

    $transaction_details = array(
        'order_id' => $order_id,
        'gross_amount' => 1000, // no decimal allowed for creditcard
    );
    // Optional
    // $item_details = array (
    //     array(
    //         'id' => "$order_id",
    //         'price' => 1200,
    //         'quantity' => 1,
    //         'name' => "Pesan Penitipan"
    //     ),
    // );
    // Optional
    $customer_details = array(
        'first_name'    => "$nama",
        'email'         => "$email",
        'phone'         => "$nomor_hp"
        // 'billing_address'  => $billing_address,
        // 'shipping_address' => $shipping_address
    );
    // Fill transaction details
    $transaction = array(
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    );

    $snap_token = '';
    try {
        $snap_token = Snap::getSnapToken($transaction);
    }
    catch (\Exception $e) {
        echo $e->getMessage();
    }
    // echo "snapToken = ".$snap_token;

    function printExampleWarningMessage() {
        if (strpos(Config::$serverKey, 'your ') != false ) {
            echo "<code>";
            echo "<h4>Please set your server key from sandbox</h4>";
            echo "In file: " . __FILE__;
            echo "<br>";
            echo "<br>";
            echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-bddZ_qIC4jOFMGBrQ9fWGzjD\';');
            die();
        } 
    }

?>

<!DOCTYPE html>
<html>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <body>
        <br><br>
        <div class="container">
            <div class="card">
            <div class="card-body">
                <p>Registrasi Berhasil, Selesaikan Pembayaran Sekarang</p>
                <button id="pay-button" class="btn btn-primary">PILIH METODE PEMBAYARAN</button>
            
                <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
                <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
                <script type="text/javascript">
                    document.getElementById('pay-button').onclick = function(){
                        // SnapToken acquired from previous step
                        snap.pay('<?php echo $snap_token?>');
                    };
                </script>
                
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
