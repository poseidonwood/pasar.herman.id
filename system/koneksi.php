<?php 
$koneksi = mysqli_connect("localhost","root","","kedai");
$connect_data = mysqli_query($koneksi,"select *from domain where status ='Y'");
$show_domain = mysqli_fetch_array($connect_data);
$date_awal = '2020-04-01';
$date_akhir = '2020-04-30';
$target_penjualan = '1051';
$date_akhir1 = date_create($date_akhir);
$tanggal_akhir = date_format($date_akhir1,"d M, yy");
$domain=$show_domain['nm_domain'];
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>