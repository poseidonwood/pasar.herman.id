<?php
// koneksi database
include '../setting/koneksi.php';

$cek = mysqli_query($koneksi,"SELECT * from transaksi where nm_barang ='' and id_barang is not null");
if($cek > 0){
    while($d = mysqli_fetch_array($cek)){
        $data = $d['id_barang'];
        $cek2 = mysqli_query($koneksi,"SELECT id_barang,nm_barang from inventory where id_barang ='$data' ");
        $sto1    =mysqli_fetch_array($cek2);
        $id_barang = $sto1['id_barang'];
        $nm_barang = $sto1['nm_barang'];
       
    }
    $excecute = mysqli_query($koneksi,"UPDATE transaksi set nm_barang='$nm_barang' where id_barang ='$id_barang'");
    echo "data berhasil di update";
}else{
    echo "tidak ada data yang tersedia";
}


?>