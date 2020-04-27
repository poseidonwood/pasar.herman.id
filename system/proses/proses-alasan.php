<?php 
// koneksi database
include '../setting/koneksi.php';
// menangkap data yang di kirim dari form
$tanggal = $_POST['tanggal'];
$alasan = $_POST['alasan'];
    $simpan0 = mysqli_query($koneksi,"insert into alasan_saldo values(
        '','$alasan','$tanggal')");
      if($simpan0){
        echo "<script>
        alert('Data Berhasil Disimpan');
        window.location.href='../';
        </script>";
      }else{
	header("location:../");
}


?>

 
