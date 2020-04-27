<?php 
// koneksi database
include '../setting/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from transaksi where id_transaksi='$id'");
if($hapus){
// mengalihkan halaman kembali ke index.php
header("location:../pages/forms/keluar.php?pesan=success-hapus");
}else{
   // mengalihkan halaman kembali ke index.php
header("location:../pages/forms/keluar.php?pesan=gagal-hapus"); 
}


 
?>