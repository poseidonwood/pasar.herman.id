<?php

// koneksi database
include '../setting/koneksi.php';
 
// menangkap data id yang di kirim dari url
$kode = $_POST['coupon'];

//sql
$q_kode = mysqli_query($koneksi,"select *from coupon where nm_coupon = '$kode'");

//cek numrows
$cek = mysqli_num_rows($q_kode);

if($cek>0){
    //cek status nya aktif atau tidak
  $q_coupon = mysqli_query($koneksi,"select *from coupon where nm_coupon = '$kode' and status='Y'");
  $cek1 = mysqli_num_rows($q_coupon);
  if($cek1>0){
      $f_coupon = mysqli_fetch_array($q_kode);
      $nm_coupon = $f_coupon['nm_coupon'];
      $nilai = $f_coupon['nilai'];
      header("location:../pages/forms/transaksi.php?result=success&coupon=$nm_coupon");
  }else{
    header("location:../pages/forms/transaksi.php?result=expired");

  }
}else{
    header("location:../pages/forms/transaksi.php?result=fail");
}