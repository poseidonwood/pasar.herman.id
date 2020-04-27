<?php
$timestamps = $_GET['id'];
include "../setting/koneksi.php";
$sql_acc = mysqli_query($koneksi,"UPDATE tbl_log set keterangan = 'DATA TER-ACC' where timestamps = '$timestamps'");
if($sql_acc){
    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_log  where timestamps ='$timestamps'");
    while($sql_ambil = mysqli_fetch_array($sql)){
       // $timestamps = $sql_ambil['timestamps'];
        $tanggal =$sql_ambil['tanggal'];
        $jenis_transaksi = $sql_ambil['jenis_transaksi'];
        $nm_pembeli = $sql_ambil['nm_pembeli'];
        $nm_barang = $sql_ambil['nm_barang'];
        $qty = $sql_ambil['qty'];
        $harga = $sql_ambil['harga'];
        $keterangan = $sql_ambil['keterangan'];
        $id_barang = $sql_ambil['id_barang'];	
        $data_barang = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");
        //mengambil stok barang
        $sto    =mysqli_fetch_array($data_barang);
        $stok    =$sto['qty'];
        $sisa    =$stok-$qty;
        // menginput data ke database
      
    $simpan = mysqli_query($koneksi,"insert into transaksi values(
        '$timestamps','$timestamps','$tanggal','$jenis_transaksi','$nm_pembeli','$id_barang','$nm_barang','$qty','$harga','')");
        if($simpan){
            $upstok= mysqli_query($koneksi, "UPDATE inventory SET qty='$sisa',last_upt='$timestamps' WHERE id_barang='$id_barang'");                
            
            //cek stok apabila stok = 0 , ganti keterangan stok habis
            $data_qty = mysqli_query($koneksi,"select * from inventory where id_barang='$id_barang'");
            $sto1    =mysqli_fetch_array($data_qty);
            $stok1 = $sto1['qty'];
            if($stok1==0){
                $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='HABIS' WHERE id_barang='$id_barang'");                
                header("location:../pages/tables/acc_page.php");
    
            }elseif($stok1<=5){
                $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='MAU HABIS' WHERE id_barang='$id_barang'");                
                header("location:../pages/tables/acc_page.php");
           }else{
            $upstok1= mysqli_query($koneksi, "UPDATE inventory SET KET='AMAN' WHERE id_barang='$id_barang'");                
            // mengalihkan halaman kembali ke keluar.php
            header("location:../pages/tables/acc_page.php");
        }
            }else{
                header("location:../pages/tables/acc_page.php");
            
            
            }  
    }
   
}

?>