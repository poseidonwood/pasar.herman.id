

<?php 
//Stok 0 agar tidak kurang saat di transaksi
//Set MInus Saldo saat transaksi berlangsung
//Saldo berkurang sukses ,, tinggal aktifkan ke action php keluar
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");
$timestamps = date("Y-m-d H:i:s");
$tanggal = $_POST['tanggal'];
$id_transaksi = $_POST['id_transaksi'];
$id_barang = $_POST['id_barang'];
$jenis_transaksi = $_POST['jenis_transaksi'];
$nm_pembeli = $_POST['nm_pembeli'];

//search dulu



// menyeleksi data inventory berdasarkan id / kode barang
$data_barang = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");


 //mengambil stok barang
 $sto    =mysqli_fetch_array($data_barang);
 
 $nm_barang = $sto['nm_barang'];
 $qty_input = 1;
 $harga = $sto['harga_jual'];
 $stok    =$sto['qty'];
 $sisa    =$stok-$qty_input;
 if($sisa<0){
    header("location:../pages/forms/transaksi.php?pesan=unknown");
 }else{

    $cek = mysqli_num_rows($data_barang);

if($cek > 0){
    $cek2 = mysqli_query($koneksi,"SELECT *from inventory where id_barang ='$id_barang' ");
    $query1   =mysqli_fetch_array($cek2);
    $ambil_harga_satuan= $query1['harga_beli_satuan'];
    $harga_satuan = $ambil_harga_satuan*$qty_input;
    $ambil_harga_jual = $query1['harga_jual'];
    $harga_jual = $ambil_harga_jual*$qty_input;
    $untung = $harga_jual - $harga_satuan;

	// menginput data ke database
    $simpan = mysqli_query($koneksi,"insert into sementara values(
    '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$id_barang','$nm_barang','$qty_input','$harga_jual','$harga_satuan','$untung','SEMENTARA')");
   

    if($simpan){
          //cek saldo 
        $query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
        $fetch_saldo = mysqli_fetch_array($query_saldo);
        $saldo_awal = $fetch_saldo['total_saldo'];
        $saldo_akhir = $harga+$saldo_awal;        
        //simpan transaksi di log saldo
        $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
         '$id_transaksi','$tanggal','$nm_barang','$qty_input','$harga','$saldo_awal','$saldo_akhir','Transaksi $jenis_transaksi')");
        
         //update saldo baru
         $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");
           
        $upstok= mysqli_query($koneksi, "UPDATE inventory SET qty='$sisa',last_upt='$timestamps' WHERE id_barang='$id_barang'");                
        
        //cek stok apabila stok = 0 , ganti keterangan stok habis
        $data_qty = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");
        $sto1    =mysqli_fetch_array($data_qty);
        $stok1 = $sto1['qty'];
       if($stok1==0){
           $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='HABIS' WHERE id_barang='$id_barang'");                
          header("location:../pages/forms/transaksi.php?pesan=success");

        }elseif($stok1<=5){
          $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='MAU HABIS' WHERE id_barang='$id_barang'");                
           header("location:../pages/forms/transaksi.php?pesan=success");
      }else{
    $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='AMAN' WHERE id_barang='$id_barang'");                
        // mengalihkan halaman kembali ke keluar.php
        header("location:../pages/forms/transaksi.php?pesan=success");
       }

}else{
	header("location:../pages/forms/transaksi.php?pesan=unknown");
}
}
 }


?>

 
