<?php
// koneksi database
include '../setting/koneksi.php';
// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");
$timestamps = date("Y-m-d H:i:s");
$tanggal = date("Y-m-d");
$id_barang = $_POST['id_barang'];
$nm_barang = $_POST['nm_barang'];
$qty = $_POST['qty'];
$harga_beli = $_POST['harga_beli'];
//$harga_beli_satuan = $harga_beli / $qty;
$harga_jual = $_POST['harga_jual'];
$expired = $_POST['exp'];
$keterangan = $_POST['ket'];

$upstok1= mysqli_query($koneksi, "UPDATE inventory SET nm_barang='$nm_barang',qty='$qty',harga_jual='$harga_jual', harga_beli='$harga_beli',
expired = '$expired',ket='$keterangan',last_upt='$timestamps' WHERE id_barang='$id_barang'"); 
if($upstok1){
     //simpan ke tbl_log
     $q = mysqli_query($koneksi,"select *from transaksi where id_barang = '$id_barang' and jenis_transaksi ='Masuk' order by tanggal desc");
     $f = mysqli_fetch_array($q);
     $nm_pembeli = $f['nm_pembeli'];
     $simpan_log = mysqli_query($koneksi,"insert into tbl_log values('$timestamps','$id_barang','$tanggal','Edit','$nm_pembeli','$id_barang','$nm_barang','$qty','$harga_beli','Inventory','')");
    
   if($simpan_log){
    header("location:../pages/tables/inventory.php");
   }else{
       echo "<script>alert('$nm_pembeli')</script>";
   }
}else{
    header("location:../");

}          

?>