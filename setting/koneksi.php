<?php 
$koneksi = mysqli_connect("localhost","root","","pasar.herman.id");

//sql ambil domain
$connect_data = mysqli_query($koneksi,"select *from domain ");
$show_domain = mysqli_fetch_array($connect_data);
$domain=$show_domain['nm_domain'];
$status = $show_domain['status'];
$device_ip=$_SERVER['REMOTE_ADDR'];
//variable untuk laporan penjualan perbulan
$date_awal = '2020-04-01';
$date_akhir = '2020-04-30';
//variable target penjualan
$target_penjualan = '1051';

//Membuat format tanggal menjadi d M, YY
$date_akhir1 = date_create($date_akhir);
$tanggal_akhir = date_format($date_akhir1,"d M, yy");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
//sql profile
$q_profile = mysqli_query($koneksi,"select *from front_profile");
$f_profile = mysqli_fetch_array($q_profile);
//isi front_profile cuma 1 rows
$title_profile = $f_profile['title'];
$number_profile = $f_profile['number'];
$email_profile = $f_profile['email'];
//end sql profile
?>
