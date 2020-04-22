<?php
include "koneksi.php";
//sql profile
$q_profile = mysqli_query($koneksi,"select *from front_profile");
$f_profile = mysqli_fetch_array($q_profile);
//isi front_profile cuma 1 rows
$title_profile = $f_profile['title'];
$number_profile = $f_profile['number'];
$email_profile = $f_profile['email'];
//end sql profile

//sql category product
$q_category = mysqli_query($koneksi,"select *from category_product");
//end  category product

//sql cart
$q_cart = mysqli_query($koneksi,"select id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total,SUM(harga_total)  as total from tbl_cart GROUP BY 	
id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total DESC");
//sql count cart
$q_count_cart = mysqli_query($koneksi,"select count(*) as total_cart from tbl_cart");
$f_count_cart = mysqli_fetch_array($q_count_cart);
$total_cart = $f_count_cart['total_cart'];
//end  cart

?>