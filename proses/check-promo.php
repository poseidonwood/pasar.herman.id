<?php
include "../setting/koneksi.php";


$nm_coupon = $_GET['voucher'];
if($nm_coupon==''){
    $data = array(
        'ket' => ''
    );

    echo json_encode($data);
}else{
  $sql = mysqli_query ($koneksi,"select *from voucher where nm_coupon = '$nm_coupon'");
  //cek rows 
  $coupon_rows = mysqli_num_rows($sql);
  $coupon = mysqli_fetch_array($sql);

  if($coupon_rows>0){
    $nilai=$coupon['nilai'];   
    $data = array(
        'nm_voucher' => $coupon['nm_coupon'],
        'nilai' => $coupon['nilai'],
        'ket' => $coupon['ket']
    );
   // $u_harga = mysqli_query($koneksi,"update tbl_cart set harga_total = '$harga_b' where id_cart = '$id_cart'");
    echo json_encode($data);
  }else{
    $data = array(
        'ket' => 'Kode Voucher Salah'
    );
    echo json_encode($data);

  }

  
}


?>