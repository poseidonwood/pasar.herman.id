

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
$jenis_transaksi = $_POST['jenis_transaksi'];
$nm_pembeli = $_POST['nm_pembeli'];
$nm_barang = $_POST['nm_barang'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];

// menyeleksi data inventory berdasarkan id / kode barang
$data_barang = mysqli_query($koneksi,"select * from inventory where id_barang='$nm_barang'");
 //mengambil stok barang
 $sto    =mysqli_fetch_array($data_barang);
 $stok    =$sto['qty'];
 $sisa    =$stok-$qty;
 if($sisa<0){
    header("location:../pages/forms/keluar.php?pesan=overstock");
 }else{

    $cek = mysqli_num_rows($data_barang);

if($cek > 0){
    $cek2 = mysqli_query($koneksi,"SELECT id_barang,nm_barang,harga_beli_satuan from inventory where id_barang ='$nm_barang' ");
    $query1   =mysqli_fetch_array($cek2);
    $nm_barang1 = $query1['nm_barang'];
    $ambil_harga_jual= $query1['harga_beli_satuan'];
    $harga_jual = $ambil_harga_jual*$qty;
    $untung = $harga - $harga_jual;

	// menginput data ke database
    $simpan = mysqli_query($koneksi,"insert into transaksi values(
    '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$nm_barang','$nm_barang1','$qty','$harga','$harga_jual','$untung','')");
   

    if($simpan){
         
            //cek saldo 
            $query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
            $fetch_saldo = mysqli_fetch_array($query_saldo);
            $saldo_awal = $fetch_saldo['total_saldo'];
            $saldo_akhir = $harga+$saldo_awal;        
            //simpan transaksi di log saldo
            $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
             '$id_transaksi','$tanggal','$nm_barang','$qty','$harga','$saldo_awal','$saldo_akhir','Transaksi $jenis_transaksi')");
            
             //update saldo baru
             $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");


        $upstok= mysqli_query($koneksi, "UPDATE inventory SET qty='$sisa',last_upt='$timestamps' WHERE id_barang='$nm_barang'");                
        
        //cek stok apabila stok = 0 , ganti keterangan stok habis
        $data_qty = mysqli_query($koneksi,"select * from inventory where id_barang='$nm_barang'");
        $sto1    =mysqli_fetch_array($data_qty);
        $stok1 = $sto1['qty'];
        if($stok1==0){
            $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='HABIS' WHERE id_barang='$nm_barang'");                
            header("location:../pages/forms/keluar.php?pesan=success");

        }elseif($stok1<=5){
            $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='MAU HABIS' WHERE id_barang='$nm_barang'");                
            header("location:../pages/forms/keluar.php?pesan=success");
       }else{
        $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='AMAN' WHERE id_barang='$nm_barang'");                
        // mengalihkan halaman kembali ke keluar.php
        header("location:../pages/forms/keluar.php?pesan=success");
       }
        }else{
            header("location:../pages/forms/keluar.php?pesan=fail");
        
        
        }

}else{
	header("location:../pages/forms/keluar.php?pesan=unknown");
}
}


?>

 
