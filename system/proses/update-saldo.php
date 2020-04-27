<?php
include '../setting/koneksi.php';

date_default_timezone_set("Asia/Jakarta");
$timestamps = date("YmdHis");
$tanggal = date("Y-m-d");
$nominal1 = $_POST['nominal_awal'];
$nominal = $_POST['nominal_akhir'];
$alasan = $_POST['alasan'];
if($nominal1>$nominal){
   $nominal_total= $nominal1 - $nominal;
   $u = mysqli_query($koneksi,"UPDATE `tbl_saldo` SET `total_saldo` = '$nominal' WHERE `tbl_saldo`.`id_saldo` = 1;");
 $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
    '$timestamps','$tanggal','Ubah Saldo','0','$nominal_total','$nominal1','$nominal','$alasan')");
    header("location:../");
}else{
   $nominal_total= $nominal - $nominal1;
   $u = mysqli_query($koneksi,"UPDATE `tbl_saldo` SET `total_saldo` = '$nominal' WHERE `tbl_saldo`.`id_saldo` = 1;");
 $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
    '$timestamps','$tanggal','Ubah Saldo - $alasan','0','$nominal_total','$nominal1','$nominal','Saldo Plus # ')");
    header("location:../");
}

   