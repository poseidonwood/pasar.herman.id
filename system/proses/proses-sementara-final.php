<?php
include '../setting/koneksi.php';


$nm_pembeli = $_POST['nm_pembeli1'];

$update = mysqli_query($koneksi,"update sementara set nm_pembeli ='$nm_pembeli' where keterangan ='SEMENTARA'");
if($update){
    $update1 = mysqli_query($koneksi,"update sementara set keterangan ='DATA TER-ACC' where keterangan ='SEMENTARA'");
    $simpan = mysqli_query($koneksi,"INSERT INTO transaksi (timestamps,id_transaksi,tanggal,jenis_transaksi,nm_pembeli,id_barang,nm_barang,qty,harga,harga_jual,untung,keterangan) SELECT *FROM sementara WHERE keterangan ='DATA TER-ACC'");

    if($simpan){
    $hapus = mysqli_query($koneksi,"delete from sementara where keterangan ='DATA TER-ACC'");
    header("location:../pages/forms/transaksi.php?pesan=success");
   
    }else{
        header("location:../pages/forms/transaksi.php?pesan=fail");
    
    
    }




    //header("location:../pages/forms/transaksi.php");
}else{
	header("location:../pages/forms/transaksi.php?pesan=unknown");
}



?>