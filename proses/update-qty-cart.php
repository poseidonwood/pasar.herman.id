<?php
include "../setting/koneksi.php";


$id_cart = $_GET['id_cart'];
$qty = $_GET['qty'];

$update = mysqli_query($koneksi,"update tbl_cart set qty = '$qty' where id_cart = '$id_cart'");
if($update){
  $sql = mysqli_query ($koneksi,"select *from tbl_cart where id_cart = '$id_cart'");
  $cart = mysqli_fetch_array($sql);
  $harga=$cart['harga'];
   
  $data = array(
      'qty' => $cart['qty']
  );
  $harga_b = $harga *$cart['qty'];
  $u_harga = mysqli_query($koneksi,"update tbl_cart set harga_total = '$harga_b' where id_cart = '$id_cart'");
  echo json_encode($data);
}


?>