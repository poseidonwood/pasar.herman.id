<?php 
// koneksi database
include '../setting/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
$query = mysqli_query($koneksi,"Select *from transaksi where id_transaksi='$id'");
$fetch = mysqli_fetch_array($query);
$get_id = $fetch['id_barang'];
$get_qty = $fetch['qty'];
$query1 = mysqli_query($koneksi,"Select *from inventory where id_barang='$get_id'");
$fetch2= mysqli_fetch_array($query1);
$get_stok = $fetch2['qty'];
$update_stok = $get_stok-$get_qty;
$update = mysqli_query($koneksi,"Update inventory set qty ='$update_stok' where id_barang ='$get_id'");
// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from transaksi where id_transaksi='$id'");
if($hapus){
// mengalihkan halaman kembali ke index.php
header("location:../pages/forms/masuk.php?pesan=success-hapus");
}else{
   // mengalihkan halaman kembali ke index.php
header("location:../pages/forms/masuk.php?pesan=gagal-hapus"); 
}


 
?>