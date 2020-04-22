<?php

if(isset($_GET['x'])){
    include "../setting/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $id_barang = $_GET['x'];
    //SELECT CART CEK ADA BARANG YANG SAMA ATAU TIDAK
    $q_c = mysqli_query($koneksi,"select *from tbl_cart where id_barang ='$id_barang'");
    $f_r = mysqli_num_rows($q_c);
    if($f_r>0){
        $qty = 1;
        $f_c = mysqli_fetch_array($q_c);
        $qty_b = $f_c['qty']+1;
        $harga = $f_c['harga'];
        $created = date("Y-m-d H:i:s");
        $id_cart = date("YmdHis");

    //select barang
    $q_b = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang'");
    $f_b = mysqli_fetch_array($q_b);
    $nm_barang = $f_b['nm_barang'];
    $harga_b = $harga * $qty_b;
    $id_satuan = $f_b['id_satuan'];
   
  $q_u = mysqli_query($koneksi,"update tbl_cart set qty = '$qty_b',harga_total='$harga_b' where id_barang = '$id_barang'");
    if($q_u){
        echo"
        <script>
		window.location.href='$domain';</script>";
    }else{
        echo "<script>alert ('Gagal')</script>";
    }
    }else{
        $qty = 1;
    $created = date("Y-m-d H:i:s");
    $id_cart = date("YmdHis");

    //select barang
    $q_b = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang'");
    $f_b = mysqli_fetch_array($q_b);
    $nm_barang = $f_b['nm_barang'];
    $harga = $f_b['harga_jual'];
    $id_satuan = $f_b['id_satuan'];
    $harga_t = $harga*$qty;
   
  $q_i = mysqli_query($koneksi,"INSERT INTO tbl_cart VALUES ('$id_cart',NULL,'$id_barang','$nm_barang','$qty','$id_satuan','$harga','$harga_t','$created')");
    if($q_i){
        echo"
        <script>
		window.location.href='$domain';</script>";
    }else{
        echo "<script>alert ('Gagal')</script>";
    }
    }
    
}else{
    include "../setting/koneksi.php";
    echo"
    <script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
}
?>