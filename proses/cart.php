<?php

if(isset($_GET['x'])){
    include "../setting/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $id_barang = $_GET['x'];
    $harga_get = $_GET['h'];
    //SELECT CART CEK ADA BARANG YANG SAMA ATAU TIDAK
    $q_c = mysqli_query($koneksi,"select *from tbl_cart where id_barang ='$id_barang' and harga='$harga_get' and id_transaksi is null and status ='' and device_ip = '$device_ip'");
    $f_r = mysqli_num_rows($q_c);
    if($f_r>0){
        $qty = 1;
        $f_c = mysqli_fetch_array($q_c);
        $qty_b = $f_c['qty']+1;
        $f_r_g = $f_c['id_cart'];

    //select barang
    $q_b = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang'");
    $f_b = mysqli_fetch_array($q_b);
    $nm_barang = $f_b['nm_barang'];
    $harga_b = $harga_get * $qty_b;
    $id_satuan = $f_b['id_satuan'];
   
  $q_upt = mysqli_query($koneksi,"update tbl_cart set qty = '$qty_b',harga_total='$harga_b' where id_cart = '$f_r_g'");
    if($q_upt){
        echo"
        <script>
		window.location.href='$domain?pesan=success&brg=$nm_barang';</script>";
    }else{
        echo "<script>alert ('Gagal')</script>";
    }
    }else{
        $qty = 1;
    $created_date = date("Y-m-d H:i:s");
    $selectedTime = $created_date;
    $endTime = strtotime("+30 minutes", strtotime($selectedTime));
    $created = date('Y-m-d H:i:s', $endTime);
    $id_cart = date("YmdHis");

    //select barang
    $q_b = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang' ");
    $f_b = mysqli_fetch_array($q_b);
    $nm_barang = $f_b['nm_barang'];
    $harga = $f_b['harga_jual'];
    $id_satuan = $f_b['id_satuan'];
    $harga_t = $harga*$qty;
   
  $q_i = mysqli_query($koneksi,"INSERT INTO tbl_cart VALUES ('$id_cart',NULL,'$id_barang','$nm_barang','$qty','$id_satuan','$harga','$harga_t','$device_ip','$created','')");
    if($q_i){
        echo"
        <script>
		window.location.href='$domain?pesan=success&brg=$nm_barang';</script>";
    }else{
        echo "<script>alert ('Gagal')</script>";
    }
    }
    
}if(isset($_GET['y'])){
    include "../setting/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $id_barang = $_GET['y'];
    $id_promo = $_GET['z'];
    $harga_promo = $_GET['v'];
    //SELECT CART CEK ADA BARANG YANG SAMA ATAU TIDAK
    $q_c = mysqli_query($koneksi,"select *from tbl_cart where id_barang ='$id_barang' and harga='$harga_promo' and id_transaksi is null and status ='' and device_ip = '$device_ip'");
    $f_r = mysqli_num_rows($q_c);
    if($f_r>0){
        $f_c = mysqli_fetch_array($q_c);
        $qty_b = $f_c['qty']+1;
        $created = date("Y-m-d H:i:s");
        $id_cart = date("YmdHis");
        $f_r_i = $f_c['id_cart'];

    
    //select promo
    $q_p = mysqli_query($koneksi,"select *from tbl_promo where id_promo = '$id_promo'");
    $f_p = mysqli_fetch_array($q_p);
    $nm_barang = $f_p['nm_barang'];
    $harga_t = $harga_promo*$qty_b;
   
     $q_u = mysqli_query($koneksi,"update tbl_cart set qty = '$qty_b',harga_total='$harga_t' where id_barang ='$id_barang' and harga='$harga_promo'");
    if($q_u){
        echo "<script>alert ('Gagal Update yz')</script>";

        echo"
        <script>
		window.location.href='$domain?pesan=success&brg=$nm_barang';</script>";
    }else{
        echo "<script>alert ('Gagal Update yz')</script>";
    }
    }else{
        $qty = 1;
    $created = date("Y-m-d H:i:s");
    $id_cart = date("YmdHis");

    //select promo
    $q_p = mysqli_query($koneksi,"select *from tbl_promo where id_promo = '$id_promo'");
    $f_p = mysqli_fetch_array($q_p);
    $nm_barang = $f_p['nm_barang'];
    $harga_akhir = $f_p['harga_akhir'];
    $harga_t = $harga_akhir*$qty;
    $jenis_promo =$f_p['jenis_promo'];
    //check satuan
    //select barang
    $q_b = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang'");
    $f_b = mysqli_fetch_array($q_b);
    $id_satuan = $f_b['id_satuan'];
    
   
  $q_i = mysqli_query($koneksi,"INSERT INTO tbl_cart VALUES ('$id_cart',NULL,'$id_barang','$nm_barang','$qty','$id_satuan','$harga_akhir','$harga_t','$device_ip','$created','')");
    if($q_i){
        echo "<script>alert ('Gagal simpan')</script>";
        echo"
        <script>
		window.location.href='$domain?pesan=success&brg=$nm_barang';</script>";
    }else{
        echo "<script>alert ('Gagal simpan')</script>";
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