<?php 
// koneksi database
include '../setting/koneksi.php';
// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");
$timestamps = date("Y-m-d H:i:s");
$tanggal = $_POST['tanggal'];
$id_transaksi = $_POST['id_transaksi'];
$jenis_transaksi = $_POST['jenis_transaksi'];
$nm_pembeli = $_POST['nm_pembeli'];
$harga = $_POST['harga'];

$upstok1= mysqli_query($koneksi, "UPDATE transaksi SET nm_pembeli='$nm_pembeli' , harga='$harga' WHERE id_transaksi='$id_transaksi'");                
header("location:../pages/forms/keluar.php?pesan=success");
