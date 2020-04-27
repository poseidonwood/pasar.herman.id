<?php
include "../../setting/koneksi.php";


if(isset($_POST['id_barang'])){
   $id_barang = $_POST['id_barang'];

   $query = "select count(*) as cntUser from inventory where id_barang='$id_barang'";
   $query1 = mysqli_query($koneksi,"select *from inventory where id_barang='$id_barang'");
   $ambil = mysqli_fetch_array($query1);
   $nm_barang = $ambil['nm_barang'];
   $result = mysqli_query($koneksi,$query);
   $response = "<span style='color: green;'>Tersedia.</span>";
   $response1 = $nm_barang;

   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Sudah terpakai untuk  $response1.</span>";
         }
   
   }

   echo $response;
   
   die;
}