<?php
// koneksi database
include '../setting/koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_cart = $_GET['x'];
 //cek apakah inject sql atau tidak
$q_b2 = mysqli_query($koneksi,"select *from tbl_cart where id_cart = '$id_cart'");
$f_b2 = mysqli_fetch_array($q_b2);
$nm_barang = $f_b2['nm_barang'];
// menghapus data dari database
$hapus=mysqli_query($koneksi,"delete from tbl_cart where id_cart='$id_cart'");
if($hapus){
// mengalihkan halaman kembali ke index.php
echo"
        <script>
		window.location.href='$domain?pesan=delete-success&brg=$nm_barang';</script>";
}else{
    echo "gagal";
}

 ?>