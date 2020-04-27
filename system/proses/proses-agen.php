<?php 
// koneksi database
include '../setting/koneksi.php';
// menangkap data yang di kirim dari form
$tanggal = $_POST['tanggal'];
$alamat = $_POST['alamat'];
$nm_agen = $_POST['nm_agen'];
    $simpan0 = mysqli_query($koneksi,"insert into tbl_agen values(
        '','$nm_agen','$alamat','$tanggal')");
      if($simpan0){
        header("location:../pages/forms/masuk.php?pesan=success");
      }else{
	header("location:../pages/forms/masuk.php?pesan=unknown");
}


?>

 
