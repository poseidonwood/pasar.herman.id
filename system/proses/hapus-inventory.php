<?php 
// koneksi database
include '../setting/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from inventory where id_barang='$id'");
if($hapus){
    echo '<script language="javascript">';
    echo 'alert("Hapus data berhasil!!")';
    echo '</script>';
// mengalihkan halaman kembali ke index.php
header("location:../pages/tables/inventory.php");
}else{
    echo '<script language="javascript">';
    echo 'alert("Gagal Hapus Data)';
    echo '</script>';
   // mengalihkan halaman kembali ke index.php
header("location:../"); 
}


 
?>