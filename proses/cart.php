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
    $id_barang_promo = $_GET['y'];
    $id_promo = $_GET['z'];
    $harga_promo = $_GET['v'];
    //SELECT CART CEK ADA BARANG YANG SAMA ATAU TIDAK
    $q_c_promo = mysqli_query($koneksi,"select *from tbl_cart where id_barang ='$id_barang_promo' and harga='$harga_promo' and id_transaksi is null and status ='' and device_ip = '$device_ip'");
    $f_r_promo = mysqli_num_rows($q_c_promo);
    if($f_r_promo>0){
        $f_c_promo = mysqli_fetch_array($q_c_promo);
        $qty_b_promo = $f_c_promo['qty']+1;
        $id_cart_promo = $f_c_promo['id_cart'];

    
    //select promo
    $q_p_promo = mysqli_query($koneksi,"select *from tbl_promo where id_promo = '$id_promo'");
    $f_p_promo = mysqli_fetch_array($q_p_promo);
    $nm_barang_promo = $f_p_promo['nm_barang'];
    $harga_t_promo = $harga_promo*$qty_b_promo;
   
     $q_u_promo = mysqli_query($koneksi,"update tbl_cart set qty = '$qty_b_promo',harga_total='$harga_t_promo' where id_barang ='$id_barang_promo' and harga='$harga_promo'");
            if($q_u_promo){
                // echo "<script>alert ('Simpan Update')</script>";

                echo"
                <script>
                window.location.href='$domain?pesan=success&brg=$nm_barang_promo';</script>";
            }else{
                echo "<pre>";
                echo print_r($q_u_promo);
                echo "</pre>";
            //  echo "<script>alert ('Gagal Update yz')</script>";
            }
    }else{
    include "../setting/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $id_barang_promo = $_GET['y'];
    $id_promo = $_GET['z'];
    $harga_promo = $_GET['v'];
    $qty_promo = 1;
    $created_date = date("Y-m-d H:i:s");
    $selectedTime = $created_date;
    $endTime = strtotime("+30 minutes", strtotime($selectedTime));
    $created_promo = date('Y-m-d H:i:s', $endTime);
    $id_cart_promo = date("YmdHis");

    //select promo
    $q_p_promo = mysqli_query($koneksi,"select *from tbl_promo where id_promo = '$id_promo'");
    $f_p_promo = mysqli_fetch_array($q_p_promo);
    $nm_barang_promo = $f_p_promo['nm_barang'];
    $harga_akhir_promo = $f_p_promo['harga_akhir'];
    $harga_t_promo = $harga_akhir_promo*$qty_promo;
    $jenis_promo =$f_p_promo['jenis_promo'];
    //check satuan
    //select barang
    $q_b_promo = mysqli_query($koneksi,"select *from tbl_product where id_barang = '$id_barang_promo'");
    $f_b_promo = mysqli_fetch_array($q_b_promo);
    $id_satuan_promo = $f_b_promo['id_satuan'];
    
   
  $q_promo = mysqli_query($koneksi,"INSERT INTO tbl_cart VALUES ('$id_cart_promo',NULL,'$id_barang_promo','$nm_barang_promo','$qty_promo','$id_satuan_promo','$harga_akhir_promo','$harga_t_promo','$device_ip','$created_promo','')");
    if($q_promo){
        // echo "<script>alert ('Sukses simpan')</script>";
        echo"
        <script>
		window.location.href='$domain?pesan=success&brg=$nm_barang_promo';</script>";
    }else{
        //echo "<script>alert ('Gagal simpan')</script>";
        echo "<pre>";
                echo print_r($q_promo);
                echo "</pre>";
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