<?php
//include('dbconnected.php');
include('koneksidb.php');

$id = $_GET['id_mhs'];
$nama = $_GET['nama_mhs'];
$fakultas = $_GET['fakultas_mhs'];

//query update
$query = "UPDATE mhs SET nama='$nama' , fakultas='$fakultas' WHERE id='$id' ";

if (mysql_query($query)) {
	# credirect ke page index
	header("location:pagemhs.php");	
}
else{
	echo "ERROR, data gagal diupdate". mysql_error();
}

//mysql_close($host);
?>