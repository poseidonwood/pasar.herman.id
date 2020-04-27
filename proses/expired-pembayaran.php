<?php

if(isset($_GET['z'])){
    include "../setting/koneksi.php";
    $id_transaksi = $_GET['z'];
    $q_u = mysqli_query ($koneksi,"update transaksi set status_transaksi='CANCELED' where id_transaksi='$id_transaksi'");
    $q_u_cart = mysqli_query ($koneksi,"update tbl_cart set status='CANCELED NO PAYMENT' where id_transaksi='$id_transaksi'");
       echo"<script>
       		window.location.href='$domain?pesan=expired';</script>";
    
}else{
    include "../setting/koneksi.php";
    echo"
    <script>
		window.location.href='$domain?pesan=whoareyou';</script>";
}
?>