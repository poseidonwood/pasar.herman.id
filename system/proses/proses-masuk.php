<?php 
// koneksi database
include '../setting/koneksi.php';
// menangkap data yang di kirim dari form
date_default_timezone_set("Asia/Jakarta");
$id_barang = $_POST['id_barang'];
$timestamps = date("Y-m-d H:i:s");
$tanggal = $_POST['tanggal'];
$id_transaksi = $_POST['id_transaksi'];
$jenis_transaksi = $_POST['jenis_transaksi'];
$nm_pembeli = $_POST['nm_pembeli'];
$nm_barang = $_POST['nm_barang'];
$qty = $_POST['qty'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$exp = $_POST['exp'];
$keterangan = $_POST['keterangan'];
$harga_beli_satuan = $harga_beli / $qty;
// menyeleksi data inventory berdasarkan id / kode barang
$data_barang = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");
 //mengambil kode barang ada atau tidak
 $cek = mysqli_num_rows($data_barang);
 $sto0    =mysqli_fetch_array($data_barang);
if($cek > 0){
    
    $stok0 = $sto0['qty'];
    $qtyfix= $stok0+$qty;

    $upstok= mysqli_query($koneksi, "UPDATE inventory SET qty ='$qtyfix', nm_barang='$nm_barang',expired= '$exp',harga_jual = '$harga_jual',harga_beli_satuan='$harga_beli_satuan',harga_beli = '$harga_beli',last_upt='$timestamps'  WHERE id_barang='$id_barang'");                
    $simpan0 = mysqli_query($koneksi,"insert into transaksi values(
        '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$id_barang','$nm_barang','$qty','$harga_beli','','','$keterangan')");
     //cek saldo 
     $query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
     $fetch_saldo = mysqli_fetch_array($query_saldo);
     $saldo_awal = $fetch_saldo['total_saldo'];
     $saldo_akhir = $saldo_awal-$harga_beli;        
     //simpan transaksi di log saldo
     $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
      '$id_transaksi','$tanggal','$nm_barang','$qty','$harga_beli','$saldo_awal','$saldo_akhir','Transaksi $jenis_transaksi')");
     
      //update saldo baru
      $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");
   //simpan ke tbl_log
   $simpan_log = mysqli_query($koneksi,"insert into tbl_log values(
    '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$id_barang','$nm_barang','$qty','$harga_beli','','')");

      // menginput data ke database
    $data_stok = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");
    $sto    =mysqli_fetch_array($data_stok);
    $stok = $sto['qty'];
    if($stok<=5){
    $upstok1= mysqli_query($koneksi, "UPDATE inventory SET ket ='MAU HABIS'  WHERE id_barang='$id_barang'");       
    header("location:../pages/forms/masuk.php?pesan=success");
         
    }elseif($stok>=5){
        $upstok2= mysqli_query($koneksi, "UPDATE inventory SET ket ='AMAN'  WHERE id_barang='$id_barang'");                
        header("location:../pages/forms/masuk.php?pesan=success");

    }else{
        $upstok2= mysqli_query($koneksi, "UPDATE inventory SET ket ='HABIS'  WHERE id_barang='$id_barang'");                
        header("location:../pages/forms/masuk.php?pesan=success");

    }
}else{

    $simpan = mysqli_query($koneksi,"insert into inventory values(
        '$id_barang','','$nm_barang','$qty','$harga_beli_satuan','$harga_beli','$harga_jual','$exp','$timestamps','')");
    $simpan01 = mysqli_query($koneksi,"insert into transaksi values(
            '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$id_barang','$nm_barang','$qty','$harga_beli','','','$keterangan')");
    $simpan_log = mysqli_query($koneksi,"insert into tbl_log values(
            '$timestamps','$id_transaksi','$tanggal','$jenis_transaksi','$nm_pembeli','$id_barang','$nm_barang','$qty','$harga_beli','','')");
            
            //cek saldo 
         $query_saldo = mysqli_query($koneksi,"select *from tbl_saldo");
         $fetch_saldo = mysqli_fetch_array($query_saldo);
         $saldo_awal = $fetch_saldo['total_saldo'];
         $saldo_akhir = $saldo_awal-$harga_beli;        
         //simpan transaksi di log saldo
         $simpan_saldo = mysqli_query($koneksi,"insert into log_saldo values(
          '$id_transaksi','$tanggal','$nm_barang','$qty','$harga_beli','$saldo_awal','$saldo_akhir','Transaksi $jenis_transaksi')");
         
          //update saldo baru
          $update_saldo = mysqli_query($koneksi,"update tbl_saldo set total_saldo = '$saldo_akhir' where id_saldo = '1'");   
        if($simpan){
            $data_stok1 = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");
            $sto1    =mysqli_fetch_array($data_stok1);
            $stok1 = $sto1['qty'];
            if($stok1<=5){
            $upstok1= mysqli_query($koneksi, "UPDATE inventory SET ket ='MAU HABIS'  WHERE id_barang='$id_barang'");       
            header("location:../pages/forms/masuk.php?pesan=success");
                 
            }elseif($stok1>=5){
                $upstok3= mysqli_query($koneksi, "UPDATE inventory SET ket ='AMAN'  WHERE id_barang='$id_barang'");                
                header("location:../pages/forms/masuk.php?pesan=success");
        
            }else{
                $upstok3= mysqli_query($koneksi, "UPDATE inventory SET ket ='HABIS'  WHERE id_barang='$id_barang'");                
                header("location:../pages/forms/masuk.php?pesan=success");
        
            }
}else{
	header("location:../pages/forms/masuk.php?pesan=unknown");
}
}

?>

 
