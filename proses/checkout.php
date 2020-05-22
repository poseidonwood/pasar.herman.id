<?php
include "../setting/koneksi.php";
//include "../setting/sql.php";
date_default_timezone_set("Asia/Jakarta");
$tempo        = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 2));
$timestamps = date("Y-m-d H:i:s");
$trx = date("mds");
$id_transaksi = 'TRX'.$trx;
$tanggal = date("Y-m-d");
$nm_pembeli = htmlentities($_POST['name']);
$email = $_POST['email'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
if($jenis_pembayaran=='COD'){
    $status_transaksi = 'COD';
}else{
    $status_transaksi = 'MENUNGGU PEMBAYARAN';
}
$nm_voucher = $_POST['nm_voucher'];

// cek total pembelian
$sql_c = "select sum(harga_total) as harga_total from tbl_cart where device_ip='$device_ip' and id_transaksi is null and status='' ";
$q_cart = mysqli_query($koneksi,$sql_c);
$f_cart = mysqli_fetch_array($q_cart);
$harga_total1 = $f_cart['harga_total'];
if($nm_voucher==''){
//input ke transaksi 
$sql_t = "insert into transaksi values ('$timestamps','$id_transaksi','$tanggal','$nm_pembeli','$hp','$alamat',null,null,'$harga_total1','$jenis_pembayaran','N','$status_transaksi','$tempo','$device_ip')";
$q_transaksi = mysqli_query($koneksi,$sql_t);
if($q_transaksi){
    $u_cart = mysqli_query($koneksi,"update tbl_cart set id_transaksi = '$id_transaksi' where device_ip = '$device_ip' and id_transaksi is null and status=''");
    //transaksi berhasil -> link ATM 
    //ambil rekening
		$que_rek = mysqli_query($koneksi,"select *from tbl_rekening where active ='Y' and nm_bank ='$jenis_pembayaran'");
        $g_rekening = mysqli_fetch_array($que_rek);
		$nm_rekening = $g_rekening['nm_rekening'];
		$no_rekening = $g_rekening['no_rekening'];
		$foto_bank = $g_rekening['foto'];
    //select jika transfer email jenis pembayran - Tranfer -bank
    if($jenis_pembayaran=='MANDIRI'){
        $method = 'TRANSFER - BANK ';
    }elseif($jenis_pembayaran=='BCA'){
        $method = 'TRANSFER - BANK ';
    }else{
        $method = "BAYAR DI TEMPAT - ";
    }
    include "mail-checkout.php";
}else{

    echo "gagal $harga_total ";
   // window.location.href='$domain';</script>";
    //transaksi gagal masuk ke link -> gagal
}

}else{
    //validasi voucher
$sql_coupon = mysqli_query ($koneksi,"select *from voucher where nm_coupon = '$nm_voucher'");
//cek rows 
$coupon_rows = mysqli_fetch_array($sql_coupon);
$nm_coupon = $coupon_rows['nm_coupon'];
$nilai = $coupon_rows['nilai'];
$category = $coupon_rows['category'];

if($category=="diskon"){
    $harga_total_voucher = $harga_total1 - ($nilai * $harga_total1 / 100); 
  }else{
    $harga_total_voucher = $harga_total1 - $nilai;
  }

if($nm_coupon==''){
    echo "<script>
    window.alert('Maaf kode voucher yang anda masukkan salah !');
    window.location.href='../checkout.php';</script>";

}else{
    // Script Simpan Database 
    $sql_t = "insert into transaksi values ('$timestamps','$id_transaksi','$tanggal','$nm_pembeli','$hp','$alamat','$nm_voucher','$harga_total1','$harga_total_voucher','$jenis_pembayaran','N','$status_transaksi','$tempo','$device_ip')";
    $q_transaksi = mysqli_query($koneksi,$sql_t);
    if($q_transaksi){
        $u_cart = mysqli_query($koneksi,"update tbl_cart set id_transaksi = '$id_transaksi' where device_ip = '$device_ip' and id_transaksi is null and status=''");
        //transaksi berhasil -> link ATM 
        //ambil rekening
            $que_rek = mysqli_query($koneksi,"select *from tbl_rekening where active ='Y' and nm_bank ='$jenis_pembayaran'");
            $g_rekening = mysqli_fetch_array($que_rek);
            $nm_rekening = $g_rekening['nm_rekening'];
            $no_rekening = $g_rekening['no_rekening'];
            $foto_bank = $g_rekening['foto'];
        //select jika transfer email jenis pembayran - Tranfer -bank
        if($jenis_pembayaran=='MANDIRI'){
            $method = 'TRANSFER - BANK ';
        }elseif($jenis_pembayaran=='BCA'){
            $method = 'TRANSFER - BANK ';
        }else{
            $method = "BAYAR DI TEMPAT - ";
        }
        include "mail-checkout.php";
    }else{
    
        echo "gagal $harga_total ";
       // window.location.href='$domain';</script>";
        //transaksi gagal masuk ke link -> gagal
    }
    





    //Akhir simpan database
   
}
}



?>