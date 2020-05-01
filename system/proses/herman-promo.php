<?php 
// koneksi database
include '../../setting/koneksi.php';
// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");



$nm_barang = $_POST['nm_barang'];
$id_barang = $_POST['id_barang'];
$id_promo =  $id_barang."promo";
$jenis_promo = $_POST['jenis_promo'];
$nilai_promo = $_POST['nilai_promo'];
$harga_awal = $_POST['harga_awal'];
$harga_akhir = $_POST['harga_akhir'];
$qty = $_POST['qty'];
$mulai_tanggal = $_POST['mulai_tanggal'];
$sampai_tanggal = $_POST['sampai_tanggal'];

$created = date("Y-m-d H:i:s");

if($jenis_promo=='mingguan'){
    $active = "N";
    $active_mingguan = "Y";
}else{
    $active = "Y";
    $active_mingguan = "N";
}

$q_s = mysqli_query($koneksi,"insert into tbl_promo values('$id_promo','$id_barang','$nm_barang','$jenis_promo','$nilai_promo','$harga_awal','$harga_akhir','$qty','$mulai_tanggal','$sampai_tanggal','$created','$active','$active_mingguan')");

if($q_s){
    //product di hilangkan 
    $u_s = mysqli_query($koneksi,"update tbl_product set active ='N' where id_barang ='$id_barang'");
    header("location:$domain/system/pages/product/?pesan=success");
  //  echo"<script>alert('insert into tbl_promo values($id_promo,$id_barang,$nm_barang,$jenis_promo,$nilai_promo,$harga_awal,$harga_akhir,$qty,$mulai_tanggal,$sampai_tanggal,$created,$active,$active_mingguan,$qty)')</script>";
}else{
    header("location:$domain/system/pages/product/?pesan=fail");

}





?>