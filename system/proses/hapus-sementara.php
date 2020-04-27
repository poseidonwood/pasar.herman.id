<?php 
// koneksi database
include '../setting/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 $id_barang = $_GET['id_barang'];
//ambil harga di sementara 
$cek2 = mysqli_query($koneksi,"SELECT *from sementara where id_transaksi ='$id' ");
$query1   =mysqli_fetch_array($cek2);
$ambil_harga= $query1['harga'];
$hapus=mysqli_query($koneksi,"delete from sementara where id_transaksi='$id'");
if($hapus){
   
 //cek saldo 
 /*$query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
 $fetch_saldo = mysqli_fetch_array($query_saldo);
 $saldo_awal = $fetch_saldo['total_saldo'];
 $saldo_akhir = $saldo_awal-$ambil_harga;        
 //simpan transaksi di log saldo
  //update saldo baru
  $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");
 */
   $hapus_log = mysqli_query($koneksi,"delete from log_saldo where id_transaksi='$id'");

// mengalihkan halaman kembali ke index.php
header("location:../pages/forms/transaksi.php?pesan=success-hapus");
}else{
   // mengalihkan halaman kembali ke index.php
header("location:../pages/forms/transaksi.php?pesan=gagal-hapus"); 
}


 
?>