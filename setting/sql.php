<?php
include "koneksi.php";
$ip = $_SERVER['REMOTE_ADDR'];
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
$q_cart = mysqli_query($koneksi,"select id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total,status,SUM(harga_total)  as total from tbl_cart where device_ip='$device_ip' and id_transaksi is null and status='' GROUP BY 	
id_cart,id_transaksi,id_barang,nm_barang,qty,id_satuan,harga,harga_total,status DESC");
//sql count cart
$q_count_cart = mysqli_query($koneksi,"select count(*) as total_cart from tbl_cart where device_ip='$device_ip'  and id_transaksi is null and status=''");
$f_count_cart = mysqli_fetch_array($q_count_cart);
$total_cart = $f_count_cart['total_cart'];
//end  cart

//checkout jika kosong tidak boleh masuk ke halaman checkout
$q_check = mysqli_query($koneksi,"select *from tbl_cart where device_ip='$device_ip' and id_transaksi is null");
$f_check_rows = mysqli_num_rows($q_check);

//sql myorder
$q_order = mysqli_query($koneksi,"select * from tbl_cart where id_transaksi is not null and device_ip='$device_ip' and status='' order by created desc");
$f_order = mysqli_fetch_array($q_order);
//end my order
$order_id_transaksi = $f_order['id_transaksi'];
//id _transaksi
$q_transaksi = mysqli_query($koneksi,"select *from transaksi where device_ip = '$device_ip' and id_transaksi ='$order_id_transaksi'");
$f_transaksi = mysqli_fetch_array($q_transaksi);
    $transaksi_id_transaksi = $f_transaksi['id_transaksi'];	
    $transaksi_nm_pembeli = $f_transaksi['nm_pembeli'];
    $transaksi_alamat = $f_transaksi['alamat'];
    $transaksi_hp = $f_transaksi['hp'];
    $transaksi_jenis=$f_transaksi['jenis_pembayaran'];
    $transaksi_harga = $f_transaksi['harga_total'];
    $transaksi_status_transaksi = $f_transaksi['status_transaksi'];
    $transaksi_device_ip = $f_transaksi['device_ip'];
    
//select semua transaksi berdasar kan device id ini
$q_transaksi1 = mysqli_query($koneksi,"select *from transaksi where device_ip = '$device_ip' and status_transaksi = 'MENUNGGU PEMBAYARAN' or status_transaksi ='COD'  order by timestamps desc");
$q_transaksi2 = mysqli_query($koneksi,"select *from transaksi where device_ip = '$device_ip' and status_transaksi = 'CANCELED' or status_transaksi ='FINISH'  order by timestamps desc");

//myorder count notifikasi
$q_not_order = mysqli_query($koneksi,"select * from tbl_cart where id_transaksi is not null and device_ip='$device_ip' and status='' order by created desc limit 1");
$q_get_id = mysqli_fetch_array($q_not_order);
$get_id = $q_get_id['id_transaksi'];
$q_id = mysqli_query($koneksi,"select *from transaksi where id_transaksi = '$get_id' and status_transaksi = 'MENUNGGU PEMBAYARAN' or status_transaksi ='COD' and device_ip='$device_ip'");
$f_not_order = mysqli_num_rows($q_id);

//ambil rekening
$q_rek = mysqli_query($koneksi,"select *from tbl_rekening where active ='Y'");
//end rekening



?>