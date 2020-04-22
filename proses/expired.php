<?php

if(isset($_GET['z'])){
    include "../setting/koneksi.php";
    $id_promo = $_GET['z'];
    $q_u = mysqli_query ($koneksi,"update tbl_promo set active ='N' where id_promo ='$id_promo'");
    if($q_u){
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