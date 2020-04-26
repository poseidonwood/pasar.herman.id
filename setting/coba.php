<?php
include 'koneksi.php';


//validasi cart jika created > jam sekarang maka update created - 15 menit dan status='canceled'
$q_cart_validasi = mysqli_query($koneksi,"select *from tbl_cart where device_ip = '$device_ip' and status='' and id_transaksi is null");
while($f_cart_array = mysqli_fetch_array($q_cart_validasi)){
    $created = $f_cart_array['created'];
    $compare_date = date("Y-m-d H:i:s");
   echo $created;
   echo "<br>";
   if($created ==''){
       echo"tidak ada data";
   }
}
?>