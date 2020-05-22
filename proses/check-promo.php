<?php
include "../setting/koneksi.php";


$nm_coupon = $_GET['voucher'];
$harga = $_GET['harga_total'];
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
    $category = $coupon['category'];
    if($category=="diskon"){
      $harga_total = $harga- ($nilai * $harga / 100); 
      $tampil = "<strong class='order-total'>Rp. $harga_total </strong><del class='product-old-price'>Rp. $harga</del>";
    }else{
      $harga_total = $harga - $nilai;
    }
    $data = array(
        'nm_voucher' => $coupon['nm_coupon'],
        'nilai' => $coupon['nilai'],
        'ket' => $coupon['ket'],
        'harga_total' => $tampil
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