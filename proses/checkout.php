<?php
include "../setting/koneksi.php";
$duahari       = mktime(0,0,0,date("n"),date("j")+2,date("Y"));
$tempo        = date("Y-m-d", $duahari);
date_default_timezone_set("Asia/Jakarta");
$timestamps = date("Y-m-d H:i:s");
$trx = date("Ymdhis");
$id_transaksi = 'TRX'.$trx;
$tanggal = date("Y-m-d");
$nm_pembeli = $_POST['name'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$jenis_pembayaran = $_POST['jenis_pembayaran'];
$nm_voucher = $_POST['nm_voucher'];
// cek total pembelian
$sql_c = "select sum(harga_total) as harga_total from tbl_cart where device_ip='$device_ip' ";
$q_cart = mysqli_query($koneksi,$sql_c);
$f_cart = mysqli_fetch_array($q_cart);
$harga_total = $f_cart['harga_total'];
if($nm_voucher==''){
//input ke transaksi 
$sql_t = "insert into transaksi values ('$timestamps','$id_transaksi','$tanggal','$nm_pembeli','$hp','$alamat',null,null,'$harga_total','$jenis_pembayaran','N','MENUNGGU PEMBAYARAN','$tempo','$device_ip')";
$q_transaksi = mysqli_query($koneksi,$sql_t);
if($q_transaksi){
    $u_cart = mysqli_query($koneksi,"update tbl_cart set id_transaksi = '$id_transaksi' where device_ip = '$device_ip'");
    echo "<script>window.location.href='$domain';</script>";
    //transaksi berhasil -> link ATM 
}else{

    echo "gagal $harga_total ";
   // window.location.href='$domain';</script>";
    //transaksi gagal masuk ke link -> gagal
}

}else{
    $q_transaksi = mysqli_query($koneksi,"insert into transaksi values ('$timestamps','$id_transaksi','$tanggal','$nm_pembeli'
    ,'$hp','$alamat','$nm_voucher',null,'','$jenis_pembayaran','N','PENDING,'$tempo','$device_ip'");
    if($q_transaksi){
        echo "<script>window.location.href='$domain';</script>";
        //transaksi berhasil -> link ATM 
    }else{
        echo "<script>window.location.href='$domain';</script>";
        //transaksi gagal masuk ke link -> gagal
    }
}



?>