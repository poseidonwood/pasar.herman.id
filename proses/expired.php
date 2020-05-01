<?php

if(isset($_GET['z'])){
    include "../setting/koneksi.php";
    $id_promo = $_GET['z'];
    $q_u = mysqli_query ($koneksi,"update tbl_promo set active ='N' where id_promo ='$id_promo'");
    if($q_u){
        //ambil id _barang
        $s_i = mysqli_query($koneksi,"select *from tbl_promo where id_promo = '$id_promo'");
        $f_i = mysqli_fetch_array ($s_i);
        $id_barang = $f_i['id_barang'];
        $q_i = mysqli_query ($koneksi,"update tbl_product set active ='Y' where id_barang ='$id_barang'");

        echo"
        <script>
		window.location.href='$domain';</script>";
    }
}else{
    include "../setting/koneksi.php";
    echo"
    <script>
		window.alert('Anda Tidak Diperbolehkan Masuk');
		window.location.href='$domain';</script>";
}
?>